<?php

/**

 * Class ResetPasswordController

 *

 * @category Arbeitshilfe

 *

 * @package Arbeitshilfe

 * @author  Mauro Frappietro <hello@maurofrappietro.com>

 * @license https://maurofrappietro.com/ Arbeitshilfe

 * @version <PHP: 1.0.0>

 * @link    https://maurofrappietro.com/

 */

namespace App\Http\Controllers\Auth;



use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\ResetsPasswords;

use Illuminate\Support\Facades\Password;

/**

 * Class ResetPasswordController

 *

 */

class ResetPasswordController extends Controller

{

    /*

    |--------------------------------------------------------------------------

    | Password Reset Controller

    |--------------------------------------------------------------------------

    |

    | This controller is responsible for handling password reset requests

    | and uses a simple trait to include this behavior. You're free to

    | explore this trait and override any methods you wish to tweak.

    |

    */



    use ResetsPasswords;



    /**

     * Where to redirect users after resetting their password.

     *

     * @var string

     */

    protected $redirectTo = '/';



    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        $this->middleware('guest');

    }

}

