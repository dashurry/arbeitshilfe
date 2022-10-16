@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')

@section('content')

<style>

.wt-header .wt-navigation>ul>.menu-item-has-children:after, .wt-header .wt-navigation > ul > li > a {
    color: #767676 !important;
}
.wt-header .wt-navigationarea .wt-userlogedin .wt-username span, .wt-header .wt-navigationarea .wt-userlogedin .wt-username h3 {
    color: #767676;
}
body h2{
    font-family: 'Poppins', Arial, Helvetica, sans-serif !important;
    color: #313889;
}
.wt-main {
    background: #ffffff;
    margin-bottom: 0rem;
}
.btn-outline-light {
    background-color: transparent;
    background-image: none;
    border: 1px solid #dadce0;
}
.btn-outline-light:hover {
    color: #212529;
    background-color: transparent;
    border: 1px solid #dadce0;
}
a { color: inherit; }
a:hover { color: inherit; }

.card {
    word-wrap: break-word;
    background-clip: border-box;
    background-color: #fff;
    border: 0 solid #eceef3;
    border-radius: 0.75rem;
    box-shadow: 0 3px 3px -1px rgb(10 22 70 / 10%), 0 0 1px 0 rgb(10 22 70 / 6%);
    display: flex;
    flex-direction: column;
    min-width: 0;
    position: relative;
}
.pattern{
    background-color: #8BC6EC;
    background-position-x: 50%;
/* background-image: linear-gradient(135deg, #8BC6EC 0%, #9599E2 100%); */
background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.com/svgjs' width='1800' height='560' preserveAspectRatio='none' viewBox='0 0 1800 560'%3e%3cg mask='url(%26quot%3b%23SvgjsMask1006%26quot%3b)' fill='none'%3e%3crect width='1800' height='560' x='0' y='0' fill='rgba(149%2c 153%2c 226%2c 1)'%3e%3c/rect%3e%3cpath d='M0%2c857.195C159.486%2c853.412%2c294.911%2c753.959%2c428.461%2c666.698C561.07%2c580.052%2c736.254%2c506.925%2c772.194%2c352.649C808.519%2c196.723%2c655.271%2c64.829%2c604.007%2c-86.843C564.3%2c-204.322%2c562.019%2c-327.49%2c505.076%2c-437.651C434.407%2c-574.366%2c380.689%2c-750.775%2c235.071%2c-800.58C89.845%2c-850.25%2c-53.937%2c-727.992%2c-199.238%2c-678.542C-337.491%2c-631.49%2c-503.527%2c-629.513%2c-597.079%2c-517.372C-690.339%2c-405.581%2c-668.298%2c-243.055%2c-683.34%2c-98.25C-697.762%2c40.588%2c-724.27%2c178.607%2c-683.236%2c312.024C-638.599%2c457.159%2c-560.416%2c592.634%2c-441.726%2c687.34C-315.868%2c787.765%2c-160.969%2c861.013%2c0%2c857.195' fill='%23696fd6'%3e%3c/path%3e%3cpath d='M1800 1220.071C1932.87 1220.454 2090.866 1253.379 2185.984 1160.603 2282.733 1066.2359999999999 2221.41 899.741 2260.924 770.4970000000001 2293.295 664.617 2395.945 585.055 2395.799 474.337 2395.6459999999997 358.262 2335.85 249.27100000000002 2260.122 161.30200000000002 2184.245 73.16000000000003 2079.511 20.00999999999999 1970.29-19.95399999999995 1854.915-62.16999999999996 1725.274-126.20600000000002 1613.456-75.31100000000004 1501.3519999999999-24.284999999999968 1506.335 142.89999999999998 1419.841 230.58999999999997 1323.7440000000001 328.01599999999996 1142.496 332.15999999999997 1087.8110000000001 457.603 1032.713 583.993 1087.653 733.749 1146.047 858.65 1204.117 982.858 1295.44 1092.058 1415.444 1158.3809999999999 1531.4189999999999 1222.4769999999999 1667.493 1219.6889999999999 1800 1220.071' fill='%23c1c4ee'%3e%3c/path%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask1006'%3e%3crect width='1800' height='560' fill='white'%3e%3c/rect%3e%3c/mask%3e%3c/defs%3e%3c/svg%3e");
/* background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.com/svgjs' width='2000' height='560' preserveAspectRatio='none' viewBox='0 0 2000 560'%3e%3cg mask='url(%26quot%3b%23SvgjsMask1035%26quot%3b)' fill='none'%3e%3crect width='2000' height='560' x='0' y='0' fill='rgba(149%2c 153%2c 226%2c 1)'%3e%3c/rect%3e%3cpath d='M0%2c804.472C148.996%2c784.903%2c204.061%2c594.75%2c324.245%2c504.535C432.096%2c423.577%2c583.45%2c410.687%2c666.323%2c304.3C759.065%2c185.243%2c857.568%2c26.316%2c807.731%2c-116.134C756.42%2c-262.796%2c548.811%2c-272.587%2c429.622%2c-372.27C336.111%2c-450.478%2c299.102%2c-588.579%2c186.627%2c-635.592C70.046%2c-684.322%2c-59.649%2c-647.117%2c-184.707%2c-629.054C-329.814%2c-608.095%2c-506.17%2c-632.595%2c-602.047%2c-521.676C-697.932%2c-410.747%2c-651.217%2c-239.747%2c-647.93%2c-93.158C-645.142%2c31.196%2c-628.761%2c150.679%2c-584.367%2c266.872C-537.418%2c389.753%2c-480.836%2c508.497%2c-384.027%2c597.558C-274.803%2c698.041%2c-147.15%2c823.799%2c0%2c804.472' fill='%23696fd6'%3e%3c/path%3e%3cpath d='M2000 1186.53C2126.466 1192.257 2275.527 1219.1860000000001 2368.221 1132.963 2461.899 1045.824 2394.791 880.87 2451.755 766.31 2511.939 645.273 2714.555 593.579 2703.411 458.865 2692.499 326.957 2491.747 309.03200000000004 2405.613 208.534 2318.743 107.17599999999999 2318.007-61.26400000000001 2201.611-126.62300000000005 2081.37-194.14099999999996 1922.603-189.04100000000005 1796.346-133.58100000000002 1674.609-80.10699999999997 1611.2 49.59899999999999 1541.983 163.12599999999998 1482.5639999999999 260.584 1426.789 363.071 1423.969 477.179 1421.312 584.695 1489.8029999999999 675.115 1526.836 776.087 1567.604 887.2429999999999 1563.1680000000001 1022.9780000000001 1652.604 1100.559 1744.58 1180.3429999999998 1878.367 1181.022 2000 1186.53' fill='%23c1c4ee'%3e%3c/path%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask1035'%3e%3crect width='2000' height='560' fill='white'%3e%3c/rect%3e%3c/mask%3e%3c/defs%3e%3c/svg%3e"); */
/* background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.com/svgjs' width='1800' height='560' preserveAspectRatio='none' viewBox='0 0 1800 560'%3e%3cg mask='url(%26quot%3b%23SvgjsMask1009%26quot%3b)' fill='none'%3e%3crect width='1800' height='560' x='0' y='0' fill='rgba(149%2c 153%2c 226%2c 1)'%3e%3c/rect%3e%3cpath d='M0%2c485.388C98.649%2c499.953%2c201.429%2c496.46%2c291.336%2c453.327C387.583%2c407.152%2c486.179%2c338.507%2c518.332%2c236.714C549.965%2c136.568%2c468.245%2c38.762%2c455.2%2c-65.448C441.808%2c-172.429%2c506.495%2c-296.473%2c440.877%2c-382.022C375.56%2c-467.179%2c241.984%2c-443.34%2c139.914%2c-476.503C33.97%2c-510.925%2c-63.403%2c-611.317%2c-170.498%2c-580.662C-277.549%2c-550.02%2c-308.665%2c-414.708%2c-378.62%2c-328.076C-445.568%2c-245.167%2c-547.198%2c-185.792%2c-572.867%2c-82.366C-599.408%2c24.573%2c-583.608%2c147.805%2c-518.855%2c236.953C-456.814%2c322.368%2c-336.055%2c329.161%2c-240.838%2c374.752C-159.509%2c413.693%2c-89.204%2c472.217%2c0%2c485.388' fill='%23696fd6'%3e%3c/path%3e%3cpath d='M1800 1310.825C1935.987 1286.586 2043.181 1185.983 2137.352 1084.9299999999998 2215.674 1000.884 2250.51 891.7280000000001 2290.81 784.145 2328.2889999999998 684.093 2360.127 585.61 2364.384 478.854 2369.404 352.953 2383.361 218.96800000000002 2317.63 111.471 2247.926-2.5230000000000246 2130.025-91.255 1999.192-118.38499999999999 1871.639-144.83500000000004 1745.844-83.43399999999997 1626.2-31.908000000000015 1518.6100000000001 14.427000000000021 1413.223 70.26400000000001 1343.157 164.14299999999997 1275.779 254.41899999999998 1269.461 370.31899999999996 1244.086 480.072 1216.155 600.876 1165.257 717.907 1186.896 839.995 1212.121 982.319 1260.7240000000002 1132.713 1375.363 1220.749 1492.495 1310.7 1654.606 1336.74 1800 1310.825' fill='%23c1c4ee'%3e%3c/path%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask1009'%3e%3crect width='1800' height='560' fill='white'%3e%3c/rect%3e%3c/mask%3e%3c/defs%3e%3c/svg%3e"); */
}
</style>

    <section class="wt-haslayout wt-dbsectionspace wt-insightuser" id="dashboard">

        @if (Session::has('message'))

            <div class="flash_msg">

                <flash_messages :message_class="'success'" :time ='5' :message="'{{{ Session::get('message') }}}'" v-cloak></flash_messages>

            </div>

            @php session()->forget('message');  @endphp

        @endif
        
        <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card mb-5 pattern">
                    <div class="card-body d-flex align-content-center justify-content-center align-items-center">
                        <div class="col-5">
                            <h1 class="text-white mb-4">👋 Krüezi! <br>
                                <span class="text-uppercase">{{{ !empty(Auth::user()) ? Helper::getUserName(Auth::user()->id) : 'No Name' }}}</span>
                            </h1>
                        </div>
                            <div class="col-5">
                                <img class="" src="{{ asset("images/illustrations/Company-cuate.svg") }}" alt="">
                            </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            
            {{-- <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card {{ $notify_class }}">
                    <div class="card-body text-center">
                        <figure class="wt-userlistingimg">
                            <i class="ti-comments fa-2x"></i>
                        </figure>
                        <h3 class="wt-title">{{ trans('lang.new_msgs') }}</h3>
                        <a href="{{{ route('message') }}}" class="btn btn-sm btn-outline-light lift shadow-none">{{ trans('lang.click_view') }}</a>
                    </div>
                </div>
            </div> --}}

            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                <div class="wt-insightsitemholder">

                    <div class="row">

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3">
                            <div class="card {{ $notify_class }}">
                                <div class="card-body text-center">
                                    <figure class="wt-userlistingimg">
                                        <a href="{{ url('message-center') }}">
                                        <i class="material-symbols-outlined fa-2x text-white p-2 rounded-circle bg-primary">sms</i>
                                        {{-- {{ Helper::getImages('uploads/settings/icon',$latest_new_message_icon, 'book') }} --}}
                                        <p class="h6 font-semibold text-muted text-sm mt-2">{{ trans('lang.new_msgs') }}</p>
                                        </a>
                                    </figure>
                                    {{-- <a href="{{ url('message-center') }}" class="btn btn-sm btn-outline-light lift shadow-none">{{ trans('lang.click_view') }}</a> --}}
                                </div>
                            </div>
                        </div>

                        @if ($access_type == 'jobs' || $access_type== 'both')

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3">
                            <div class="card {{ $notify_class }}">
                                <div class="card-body text-center">
                                    <figure class="wt-userlistingimg">
                                        <a href="{{{ url('employer/dashboard/manage-jobs') }}}">
                                            <i class="material-symbols-outlined fa-2x text-white p-2 rounded-circle bg-success">rate_review</i>
                                            {{-- {{ Helper::getImages('uploads/settings/icon',$latest_proposals_icon, 'layers') }} --}}
                                            <p class="h6 font-semibold text-muted text-sm mt-2">{{ trans('lang.latest_proposals') }}</p>
                                        </a>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if (!empty($enable_package) && $enable_package === 'true')

                            @if (!empty($package))
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3">
                                <div class="card {{ $notify_class }}">
                                    <div class="card-body">
                                        <countdown

                                        date="{{$expiry_date}}"

                                        :image_url="'{{{ Helper::getDashExpiryImages('uploads/settings/icon',$latest_package_expiry_icon, 'img-21.png') }}}'"

                                        :title=trans('lang.check_pkg_expiry')

                                        :package_url="'{{url('dashboard/packages/employer')}}'"

                                        :current_package="'{{$package->title}}'"

                                        >

                                        </countdown>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">

                                <div class="wt-insightsitem wt-dashboardbox user_current_package">

                                    <countdown

                                    date="{{$expiry_date}}"

                                    :image_url="'{{{ Helper::getDashExpiryImages('uploads/settings/icon',$latest_package_expiry_icon, 'img-21.png') }}}'"

                                    :title=trans('lang.check_pkg_expiry')

                                    :package_url="'{{url('dashboard/packages/employer')}}'"

                                    :current_package="'{{$package->title}}'"

                                    >

                                    </countdown>

                                </div>

                            </div> --}}

                            @endif

                        @endif

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3">
                            <div class="card {{ $notify_class }}">
                                <div class="card-body text-center">
                                    <figure class="wt-userlistingimg">
                                        <a href="{{ url('employer/saved-items') }}">
                                            <i class="material-symbols-outlined fa-2x text-white p-2 rounded-circle bg-warning">favorite</i>
                                            {{-- {{ Helper::getImages('uploads/settings/icon',$latest_saved_item_icon, 'lnr lnr-heart') }} --}}
                                            <p class="h6 font-semibold text-muted text-sm mt-2">{{ trans('lang.view_saved_items') }}</p>
                                        </a>
                                    </figure>
                                </div>
                            </div>
                        </div>

                        

                        @if ($access_type == 'jobs' || $access_type== 'both')

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3">
                            <div class="card {{ $notify_class }}">
                                <div class="card-body text-center">
                                    <figure class="wt-userlistingimg">
                                        <a href="{{{ url('employer/jobs/cancelled') }}}">
                                            <i class="material-symbols-outlined fa-2x text-white p-2 rounded-circle bg-danger">block</i>
                                            {{-- {{ Helper::getImages('uploads/settings/icon',$latest_cancel_job_icon, 'cross-circle') }} --}}
                                            <p class="h6 font-semibold text-muted text-sm mt-2">{{ trans('lang.total_cancelled_jobs') }}</p>
                                        </a>
                                    </figure>
                                    {{-- <h3 class="wt-title">{{Helper::getTotalJobs('cancelled')}}</h3> --}}
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3">
                            <div class="card {{ $notify_class }}">
                                <div class="card-body text-center">
                                    <figure class="wt-userlistingimg">
                                        <a href="{{{ url('employer/jobs/hired') }}}">
                                            <i class="material-symbols-outlined fa-2x text-white p-2 rounded-circle bg-info">history</i>
                                            {{-- {{ Helper::getImages('uploads/settings/icon',$latest_ongoing_job_icon, 'cloud-sync') }} --}}
                                            <p class="h6 font-semibold text-muted text-sm mt-2">{{ trans('lang.total_ongoing_jobs') }}</p>
                                        </a>
                                    </figure>
                                    {{-- <h3 class="wt-title">{{Helper::getTotalJobs('hired')}}</h3> --}}
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3">
                            <div class="card {{ $notify_class }}">
                                <div class="card-body text-center">
                                    <figure class="wt-userlistingimg">
                                        <a href="{{{ url('employer/jobs/completed') }}}">
                                            <i class="material-symbols-outlined fa-2x text-white p-2 rounded-circle bg-success">thumb_up</i>
                                            {{-- {{ Helper::getImages('uploads/settings/icon',$latest_completed_job_icon, 'checkmark-circle') }} --}}
                                            <p class="h6 font-semibold text-muted text-sm mt-2">{{ trans('lang.total_completed_jobs') }}</p>
                                        </a>
                                    </figure>
                                    {{-- <h3 class="wt-title">{{Helper::getTotalJobs('completed')}}</h3> --}}
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3">
                            <div class="card {{ $notify_class }}">
                                <div class="card-body text-center">
                                    <figure class="wt-userlistingimg">
                                        <a href="{{{ route('employerManageJobs') }}}">
                                            <i class="material-symbols-outlined fa-2x text-white p-2 rounded-circle bg-primary">cloud_upload</i>
                                            {{-- {{ Helper::getImages('uploads/settings/icon',$latest_posted_job_icon, 'enter') }} --}}
                                            <p class="h6 font-semibold text-muted text-sm mt-2">{{ trans('lang.total_posted_jobs') }}</p>
                                        </a>
                                    </figure>
                                    {{-- <h3 class="wt-title">{{Helper::getTotalJobs('posted')}}</h3> --}}
                                </div>
                            </div>
                        </div>

                        @endif

                        @if ($access_type == 'services' || $access_type== 'both')

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3">
                            <div class="card {{ $notify_class }}">
                                <div class="card-body text-center">
                                    <figure class="wt-userlistingimg">
                                        <a href="{{{ url('employer/services/hired') }}}">
                                            <i class="material-symbols-outlined fa-2x text-white p-2 rounded-circle bg-info">history</i>
                                            {{-- {{ Helper::getImages('uploads/settings/icon',$ongoing_services_icon, 'gift') }} --}}
                                            <p class="h6 font-semibold text-muted text-sm mt-2">{{ trans('lang.total_ongoing_services') }}</p>
                                        </a>
                                    </figure>
                                    {{-- <h3 class="wt-title">{{{ Auth::user()->purchasedServices->count() }}}</h3> --}}
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3">
                            <div class="card {{ $notify_class }}">
                                <div class="card-body text-center">
                                    <figure class="wt-userlistingimg">
                                        <a href="{{{ url('employer/services/completed') }}}">
                                            <i class="material-symbols-outlined fa-2x text-white p-2 rounded-circle bg-success">check_circle</i>
                                            {{-- {{ Helper::getImages('uploads/settings/icon',$completed_services_icon, 'gift') }} --}}
                                            <p class="h6 font-semibold text-muted text-sm mt-2">{{ trans('lang.total_completed_services') }}</p>
                                        </a>
                                    </figure>
                                    {{-- <h3 class="wt-title">{{{ Auth::user()->completedServices->count() }}}</h3> --}}
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3">
                            <div class="card {{ $notify_class }}">
                                <div class="card-body text-center">
                                    <figure class="wt-userlistingimg">
                                        <a href="{{{ url('employer/services/cancelled') }}}">
                                            <i class="material-symbols-outlined fa-2x text-white p-2 rounded-circle bg-danger">delete</i>
                                            {{-- {{ Helper::getImages('uploads/settings/icon',$cancelled_services_icon, 'gift') }} --}}
                                            <p class="h6 font-semibold text-muted text-sm mt-2">{{ trans('lang.total_cancelled_services') }}</p>
                                        </a>
                                    </figure>
                                    {{-- <h3 class="wt-title">{{{ Auth::user()->cancelledServices->count() }}}</h3> --}}
                                </div>
                            </div>
                        </div>

                        @endif

                    </div>

                </div>

            </div>

        </div>

        @if ($access_type == 'jobs' || $access_type== 'both')

            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 wt-insightsitemholder">
                            
                            <div class="wt-dashboardbox wt-ongoingproject la-ongoing-projects wt-earningsholder">

                                <div class="wt-dashboardboxtitle wt-titlewithsearch">

                                    <h2>{{ trans('lang.ongoing_project') }}</h2>

                                </div>

                                @if (!empty($ongoing_jobs) && $ongoing_jobs->count() > 0)

                                    <div class="wt-dashboardboxcontent wt-hiredfreelance">

                                        <table class="wt-tablecategories wt-freelancer-table">

                                            <thead>

                                                <tr>

                                                    <th>{{trans('lang.project_title')}}</th>

                                                    <th>{{trans('lang.hired_freelancers')}}</th>

                                                    <th>{{trans('lang.project_cost')}}</th>

                                                    <th>{{trans('lang.actions')}}</th>

                                                </tr>

                                            </thead>

                                            <tbody>

                                                @foreach ($ongoing_jobs as $project)

                                                    @php

                                                        $proposal_freelancer = $project->proposals->where('status', 'hired')->pluck('freelancer_id')->first();

                                                        $freelancer = !empty($proposal_freelancer) ? \App\User::find($proposal_freelancer) : ''; 

                                                        $user_name = Helper::getUsername($proposal_freelancer);

                                                    @endphp

                                                    <tr>

                                                        <td data-th="Project title"><span class="bt-content"><a target="_blank" href="{{{ url('job/'.$project->slug) }}}">{{{ $project->title }}}</a></span></td>

                                                        @if (!empty($freelancer))

                                                            <td data-th="Hired freelancer">

                                                                <span class="bt-content">

                                                                    <a href="{{{url('profile/'.$freelancer->slug)}}}">

                                                                        @if ($freelancer->user_verified)

                                                                            <i class="material-symbols-outlined">verified</i>

                                                                        @endif

                                                                        {{{$user_name}}}

                                                                    </a>

                                                                </span>

                                                            </td>

                                                        @endif

                                                        <td data-th="Project cost"><span class="bt-content">{{ !empty($symbol['symbol']) ? $symbol['symbol'] : '$' }}{{$project->price}}</span></td>

                                                        <td data-th="Actions">

                                                            <span class="bt-content">

                                                                <div class="wt-btnarea">

                                                                    <a href="{{{ url('employer/dashboard/job/'.$project->slug.'/proposals') }}}" class="wt-btn">{{ trans('lang.view_detail') }}</a>

                                                                </div>

                                                            </span>

                                                        </td>

                                                    </tr>

                                                @endforeach

                                            </tbody>

                                        </table>

                                    </div>

                                @else

                                    @if (file_exists(resource_path('views/extend/errors/no-record.blade.php'))) 

                                        @include('extend.errors.no-record')

                                    @else 

                                        @include('errors.no-record')

                                    @endif

                                @endif

                            </div>

                </div>

            </div>

        @endif

    </section>

@endsection
