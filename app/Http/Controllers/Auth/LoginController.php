<?php

/**

 * Class LoginController.

 *

 * @category Worketic

 *

 * @package Worketic

 * @author  Amentotech <theamentotech@gmail.com>

 * @license http://www.amentotech.com Amentotech

 * @link    http://www.amentotech.com

 */



namespace App\Http\Controllers\Auth;

use App\EmailTemplate;
use App\Helper;
use App\Http\Controllers\Controller;
use App\Mail\GeneralEmailMailable;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Redirect;

use Spatie\Permission\Models\Role;

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Schema;

use Session;

use View;



/**

 * Class LoginController

 *

 */

class LoginController extends Controller

{

    /*

    |--------------------------------------------------------------------------

    | Login Controller

    |--------------------------------------------------------------------------

    |

    | This controller handles authenticating users for the application and

    | redirecting them to your home screen. The controller uses a trait

    | to conveniently provide its functionality to your applications.

    |

    */



    use AuthenticatesUsers;



    /**

     * Where to redirect users after login.

     *

     * @param string $request request attributes

     *

     * @return authenticated users

     */

    protected function authenticated(Request $request, $user)

    {

        if (Schema::hasTable('users')) {

            // if (!empty($user->verification_code)) {

            //     Session::flash('error', trans('lang.verification_code_not_verified'));

            //     Auth::logout();

            //     return Redirect::to('/');

            // } else {

                $user_id = Auth::user()->id;

                $user_role_type = User::getUserRoleType($user_id);

                if (empty($user_role_type)) {

                    Session::flash('error', trans('Unfortunately you have been logged out due to in-sufficient role privileges for you account, For Further details contact to administrator'));

                    Auth::logout();

                    return Redirect::to('/');

                }

                $user_role = $user_role_type->role_type;

                if ($user_role === 'freelancer') {

                    return Redirect::to('freelancer/dashboard');

                } elseif ($user_role === 'employer') {

                    return Redirect::to('employer/dashboard');

                } else {

                    return Redirect::to(url()->previous());

                }

            // }

        }

    }





    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        if (Schema::hasTable('users')) {

            $this->middleware('guest')->except('logout');

        }

    }

    public function ctgLogin(Request $req)
    {
        $this->validate($req,[
            "email" => "required | exists:users,email",
            "password" => "required"
        ],[
            "email.required" => "Email is required",
            "email.exists" => "This email doesn't exist",
            "password.required" => "Password is required",
        ]);
        $credentials = $req->only('email','password');

        if(Auth::attempt($credentials,$req->remember))
        {
            return ["status" => "OK", "url" => route('main.category')];
        }
        else
        {
            return ["status" => "FAIL","msg"=>"Failed to login. Check your password and try again later"];
        }
    }


    public function customLogin(Request $req)
    {
        $this->validate($req,[
            "email" => "required|exists:users,email",
            "password" => "required",
        ],[
            "email.required" => "Email field is empty",
            "email.exists" => "No account was found with this email",
            "password" => "Password field is empty"
        ]);

        if($req->remember == true)
        {
            $remember = true;
        }
        else
        {
            $remember = false;
        }

        $userData = User::where("email",$req->email)->first();
        $hashedPass = $req->password;
    
        // Check if the password is correct or not
        if(Hash::check($hashedPass,$userData->password))
        {
            // if correct, check the user is verified or not
            if($userData->user_verified == 1){
                // if user is verified, make login here
                $loginCredentials = [
                    "email" => $req->email,
                    "password" => $req->password,
                    "user_verified" => 1
                ];

                if(Auth::attempt($loginCredentials,$remember))
                {
                    $user_role_type = User::getUserRoleType($userData->id);
                    $user_role = $user_role_type->role_type;

                    $redirectTo = "";

                    if (
                        $user_role === 'freelancer'
                    ) {
                        $redirectTo = '/freelancer/dashboard';
                    } elseif ($user_role === 'employer') {
                        $redirectTo = '/employer/dashboard';
                    } else {
                        $redirectTo = "/";
                    }

                    return [
                        "status" => "ok",
                        "redirect_url" => $redirectTo,
                        "re" => $req->remember,
                    ];
                }
                else
                {
                    return [
                        "status" => "Login failed",
                        "msg" => "Failed to login, try again later"
                    ];
                }

                


            }
            else{
                // if not verified send error response
                return [
                    "status" => "unverified_user",
                    "msg" => "We sent you a verification code to your email. Verify your account before logging in"
                ];
            }
        }
        else
        {
            return [
                "status" => "password_missmatch",
                "msg" => "Password is wrong"
            ];
        }
    }

    public function resendVerificationCode(Request $req)
    {
        $this->validate($req,[
            "email" => "required|exists:users,email"
        ]);

        if (!empty(config('mail.username')) && !empty(config('mail.password'))) {
            $user = User::where("email",$req->email)->first();
            if($user->user_verified == 0)
            {
                $email_params = array();
                $template = DB::table('email_types')->select('id')

                ->where('email_type', 'verification_code')->get()->first();

                if (!empty($template->id)) {

                    $template_data = EmailTemplate::getEmailTemplateByID($template->id);

                    $email_params['verification_code'] = $user->verification_code;

                    $email_params['name'] = Helper::getUserName($user->id);

                    $email_params['email'] = $user->email;

                    Mail::to($user->email)

                        ->send(

                            new GeneralEmailMailable(

                                'verification_code',

                                $template_data,

                                $email_params

                            )

                        );
                }
                return [
                    "status" => "ok",
                ];
            }
        }
    }

    public function verifyCode(Request $req)
    {
        $this->validate($req,[
            "email" => "required|exists:users,email",
            "code" => "required",
        ],[
            "code.required" => "Please insert your verification code"
        ]);

        $user = User::where("email",$req->email)->first();

        if($req->code == $user->verification_code)
        {
            $user->user_verified = 1;
            $user->verification_code = null;
            $user->save();
            return [
                "status" => "ok",
                "msg" => "Verification was successfull. You can login your account now"
            ];
        }
        else
        {
            return [
                "status" => "invalid_code",
                "msg" => "Code did not match"
            ];
        }


    }

}

