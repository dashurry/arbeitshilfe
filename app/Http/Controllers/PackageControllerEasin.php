<?php

/**

 * Class PackageController.

 *

 * @category Arbeitshilfe

 *

 * @package Arbeitshilfe

 * @author  Mauro Frappietro <hello@maurofrappietro.com>

 * @license https://maurofrappietro.com/ Arbeitshilfe

 * @version <PHP: 1.0.0>

 * @link    https://maurofrappietro.com/

 */



namespace App\Http\Controllers;



use App\Package;

use View;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use function Opis\Closure\serialize;

use Session;

use Spatie\Permission\Models\Role;

use App\Helper;

use Auth;

use DB;

use App\Job;

use App\Proposal;

use App\Badge;

use App\SiteManagement;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;





/**

 * Class PackageController

 *

 */

class PackageController extends Controller

{



    /**

     * Defining scope of the variable

     *

     * @access protected

     * @var    array $package

     */

    protected $package;



    /**

     * Create a new controller instance.

     *

     * @param instance $package instance

     *

     * @return void

     */

    public function __construct(Package $package)

    {

        $this->package = $package;

    }



    /**

     * Display a listing of the resource.

     *

     * @param string $role_type role type

     *

     * @return \Illuminate\Http\Response

     */

    public function index($role_type)

    {

        if (Auth::user() && Auth::user()->getRoleNames()[0] != "admin") {

            $role = Role::where('role_type', $role_type)->first();

            $package_options = Helper::getPackageOptions($role_type);

            $packages = $this->package::all()->where('role_id', $role->id)->where('trial', 0);

            $purchase_packages = DB::table('items')->select('product_id')->where('subscriber', Auth::user()->id)->get()->pluck('product_id')->toArray();

            $currency   = SiteManagement::getMetaValue('commision');

            $symbol = !empty($currency) && !empty($currency[0]['currency']) ? Helper::currencyList($currency[0]['currency']) : array();

            if (file_exists(resource_path('views/extend/back-end/package/index.blade.php'))) {

                return View::make('extend.back-end.package.index', compact('packages', 'package_options', 'purchase_packages', 'symbol'));

            } else {

                return View::make('back-end.package.index', compact('packages', 'package_options', 'purchase_packages', 'symbol'));

            }

            if (Auth::user()->getRoleNames()[0] != $role_type) {

                abort(404);

            }

        } else {

            abort(404);

        }

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        if (!empty($_GET['keyword'])) {

            $keyword = $_GET['keyword'];

            $packages = $this->package::where('title', 'like', '%' . $keyword . '%')->orderBy('role_id', 'desc')->paginate(10)->setPath('');

            $pagination = $packages->appends(

                array(

                    'keyword' => Input::get('keyword')

                )

            );

        } else {

            $packages = $this->package::orderBy('role_id', 'desc')->paginate(10);

        }

        $employer_trial = $this->package::select('trial')->where('role_id', 2)->where('trial', 1)->get();

        $freelancer_trial = $this->package::select('trial')->where('role_id', 3)->where('trial', 1)->get();

        $roles = Role::where('name', '!=', 'admin')->get();

        $durations = Helper::getPackageDurationList();

        $badges = Badge::select('id', 'title')->get()->pluck('title', 'id');

        $delete_title = trans("lang.ph_delete_confirm_title");

        $delete_message = trans("lang.ph_package_delete_message");

        $deleted = trans("lang.ph_delete_title");

        if (file_exists(resource_path('views/extend/back-end/admin/packages/index.blade.php'))) {

            return view(

                'extend.back-end.admin.packages.index',

                compact(

                    'packages',

                    'delete_title',

                    'delete_message',

                    'deleted',

                    'durations',

                    'roles',

                    'badges',

                    'employer_trial',

                    'freelancer_trial'

                )

            );

        } else {

            return view(

                'back-end.admin.packages.index',

                compact(

                    'packages',

                    'delete_title',

                    'delete_message',

                    'deleted',

                    'durations',

                    'roles',

                    'badges',

                    'employer_trial',

                    'freelancer_trial'

                )

            );

        }

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param mixed $request \Illuminate\Http\Request

     *

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        $server_verification = Helper::arbeitshilfeIsDemoSite();

        if (!empty($server_verification)) {

            Session::flash('error', $server_verification);

            return Redirect::back();

        }

        // $this->validate(

        //     $request,

        //     [

        //         'package_title' => 'required',

        //         // 'package_subtitle' => 'required',

        //         'package_price' => 'required',

        //     ]

        // );

        // $this->package->savePackage($request);

        // Session::flash('message', trans('lang.save_package'));

        // return Redirect::back();

        $this->validate($request,[
            'package_title' => 'required',
            'package_price' => 'required',
            "roles" => "required"
        ]);

        $package = new Package();
        $package->title = $request->package_title;
        $package->subtitle = $request->package_subtitle;
        $package->slug = Str::slug($request->package_title,"-");
        $package->cost = $request->package_price;
        $package->role_id = $request->roles;


        if($request->roles == 2)
        {
            $package->options = serialize($request->employer);
        }
        elseif($request->roles == 3){
            $package->options = serialize($request->freelancer);
        }


        if(!empty($request->trial))
        {
            $package->trial = 1;
        }
        else
        {
            $package->trial = 0;
        }
        
        $package->save();

        Session::flash('message', trans('lang.save_package'));
        return Redirect::back();
    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param string $slug package slug

     *

     * @return \Illuminate\Http\Response

     */

    public function edit($slug)

    {

        if (!empty($slug)) {

            $package = $this->package::where('slug', $slug)->first();

            $options = unserialize($package->options);

            $no_of_services = !empty($options['no_of_services']) ? $options['no_of_services'] : null; 

            $no_of_featured_services = !empty($options['no_of_featured_services']) ? $options['no_of_featured_services'] : null; 

            $roles = Role::where('name', '!=', 'admin')->pluck('name', 'id')->toArray();

            $durations = \App\Helper::getPackageDurationList();

            $badges = Badge::select('id', 'title')->get()->pluck('title', 'id');

            $employer_trial = $this->package::select('trial')->where('role_id', 2)->where('trial', 1)->get();

            $freelancer_trial = $this->package::select('trial')->where('role_id', 3)->where('trial', 1)->get();

            $package_duration = unserialize($package['options'])['duration'];

            if (!empty($package)) {

                if (file_exists(resource_path('views/extend/back-end/admin/packages/edit.blade.php'))) {

                    return View::make(

                        'extend.back-end.admin.packages.edit',

                        compact(

                            'no_of_services',

                            'no_of_featured_services',

                            'package',

                            'options',

                            'durations',

                            'roles',

                            'badges',

                            'employer_trial',

                            'freelancer_trial',

                            'package_duration'

                        )

                    );

                } else {

                    return View::make(

                        'back-end.admin.packages.edit',

                        compact(

                            'no_of_services',

                            'no_of_featured_services',

                            'package',

                            'options',

                            'durations',

                            'roles',

                            'badges',

                            'employer_trial',

                            'freelancer_trial',

                            'package_duration'

                        )

                    );

                }

            }

        }

    }



    /**

     * Update packages.

     *

     * @param string $request string

     * @param string $slug    integer

     *

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, $slug)

    {

        $server_verification = Helper::arbeitshilfeIsDemoSite();

        if (!empty($server_verification)) {

            Session::flash('error', $server_verification);

            return Redirect::back();

        }

        $this->validate(

            $request,

            [

                'package_title' => 'required',

            ]

        );

        $this->package->updatePackage($request, $slug);

        Session::flash('message', trans('lang.package_updated'));

        return Redirect::to('admin/packages');

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param $package $request $req->attribute

     *

     * @return \Illuminate\Http\Response

     */

    public function destroy(Request $request)

    {

        $server = Helper::arbeitshilfeIsDemoSiteAjax();

        if (!empty($server)) {

            $json['type'] = 'error';

            $json['message'] = $server->getData()->message;

            return $json;

        }

        $json = array();

        $id = $request['id'];

        if (!empty($id)) {

            $this->package::where('id', $id)->delete();

            $json['type'] = 'success';

            $json['message'] = trans('lang.package_deleted');

            return $json;

        }

    }



    /**

     * Get package options.

     *

     * @param integer $request $request->attributes

     *

     * @return settings

     */

    public function getPackageOptions(Request $request)

    {

        $json = array();

        if ($request['slug']) {

            $package = $this->package::where('slug', $request['slug'])->first();

            $options = unserialize($package->options);

            if (!empty($options)) {

                $json['type'] = 'success';

                if ($options['banner_option'] == 'true') {

                    $json['banner_option'] = 'true';

                }

                if ($options['private_chat'] == 'true') {

                    $json['private_chat'] = 'true';

                }

            } else {

                $json['type'] = 'error';

            }

            return $json;

        }

    }



    /**

     * Get user purchase package.

     *

     * @return settings

     */

    public function getPurchasePackage()

    {

        $json = array();

        $server = Helper::arbeitshilfeIsDemoSiteAjax();

        if (!empty($server)) {

            $json['type'] = 'server_error';

            $json['message'] = $server->getData()->message;

            return $json;

        }

        if (Auth::user()) {

            $purchase_packages = DB::table('items')

                ->join('packages', 'packages.id', '=', 'items.product_id')

                ->where('packages.trial', 0)

                ->where('subscriber', Auth::user()->id)->get();

            if ($purchase_packages->count() == 0) {

                $json['type'] = 'success';

                return $json;

            } else {

                $json['type'] = 'error';

                $json['message'] = trans('lang.cannot_purchase_more_then_one_pkg');

            }

            return $json;

        } else {

            abort(404);

        }

    }



    /**

     * Get user purchase package.

     *

     * @return settings

     */

    public function getTopPackages($role)

    {

        $json = array();

        if ($role == 'employer') {

            $packages = $this->package->where('role_id', 2)->where('trial', 0)->take(3)->orderByDesc('id')->get();

        } else if($role == 'freelancer')  {

            $packages = $this->package->where('role_id', 3)->where('trial', 0)->take(3)->orderByDesc('id')->get();

        }

        $most_popular = DB::select("SELECT product_id, COUNT(product_id) FROM items WHERE type ='package' GROUP BY product_id ORDER BY COUNT(product_id) DESC LIMIT 1");

        $popular = !empty($most_popular) ? $most_popular[0]->product_id : '';

        $package_options = Helper::getNewPackageOptions($role);

        $top_packages = array();

        if (!empty($packages)) {

            foreach ($packages as $key => $package) {

                $top_packages[$key]['id'] = $package->id;

                $top_packages[$key]['title'] =  $package->title;

                $top_packages[$key]['subtitle'] =  $package->subtitle;

                $top_packages[$key]['slug'] = $package->slug;

                $top_packages[$key]['cost'] = $package->cost;

                $top_packages[$key]['badge_id'] = $package->badge_id;

                $top_packages[$key]['most_popular'] = $popular == $package->id ? true : false;

                if (Schema::hasColumn('packages', 'image') && !empty($package->image)) {

                    $top_packages[$key]['image'] = $package->image;

                } else {

                    $top_packages[$key]['image'] = '';

                }

                $top_packages[$key]['options'] = !empty($package->options) ? unserialize($package->options) : '';

                $currency   = SiteManagement::getMetaValue('commision');

                $symbol = !empty($currency) && !empty($currency[0]['currency']) ? Helper::currencyList($currency[0]['currency']) : array();

                $top_packages[$key]['symbol'] = !empty($symbol['symbol']) ? $symbol['symbol'] : '$';

            }

        }

        if (!empty($top_packages)) {

            $json['type'] = 'success';

            $json['packages'] = $top_packages;

            $json['package_options'] = $package_options;

            return $json;

        } else {

            $json['type'] = 'error';

            return $json;

        }

    }



    /**

     * Upload Image to temporary folder.

     *

     * @param mixed $request request attributes

     *

     * @return \Illuminate\Http\Response

     */

    public function uploadTempImage(Request $request)

    {

        $path = Helper::PublicPath() . '/uploads/packages/temp/';

        if (!empty($request['uploaded_image'])) {

            return Helper::uploadTempImage($path, $request['uploaded_image']);

        }

    }

}

