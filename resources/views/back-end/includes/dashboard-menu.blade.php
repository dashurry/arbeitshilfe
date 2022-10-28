@auth

@php

    $nameColor = new \App\NameThumbColor();

    $user = !empty(Auth::user()) ? Auth::user() : '';

    $role = !empty($user) ? $user->getRoleNames()->first() : array();

    $profile = \App\User::find($user->id)->profile;

    $setting = \App\SiteManagement::getMetaValue('footer_settings');

    $payment_settings = \App\SiteManagement::getMetaValue('commision');

    $payment_module = !empty($payment_settings) && !empty($payment_settings[0]['enable_packages']) ? $payment_settings[0]['enable_packages'] : 'true';

    $employer_payment_module = !empty($payment_settings) && !empty($payment_settings[0]['employer_package']) ? $payment_settings[0]['employer_package'] : 'true';

    $copyright = !empty($setting) ? $setting['copyright'] : 'Arbeitshilfe All Rights Reserved';

@endphp
<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">

        <div id="dismiss" class="shadow">
            <i class="material-symbols-outlined">arrow_back</i>
        </div>

        <div class="sidebar-header text-center">
            @if($profile->avater != "")
                <figure>
                    <img class="rounded-circle" src="{{{ asset(Helper::getImageWithSize('uploads/users/'.$user->id, $profile->avater, 'listing')) }}}" alt="{{ trans('lang.profile_photo') }}">
                </figure>
            @else
                <figure>
                    <div class="name-thumb" style="background-color: {{ $nameColor->getColor(ucfirst(substr(Auth::user()->first_name,0,1))) }} !important">
                        {{ ucfirst(substr(Auth::user()->first_name,0,1)) }}{{ ucfirst(substr(Auth::user()->last_name,0,1)) }}
                    </div>
                </figure>
            @endif
            <h3>👋 Hallo!</h3>
                <h3>
                    <a href="{{{ url(route('showUserProfile', ['slug' => Auth::user()->slug])) }}}">
                        {{{ !empty(Auth::user()) ? Helper::getUserName(Auth::user()->id) : 'No Name' }}}
                    </a>
                </h3>
            @if ($role === 'employer')

                @if (Helper::getAccessType() == 'both' || Helper::getAccessType() == 'jobs')

                    <div><a href="{{{ url(route('employerPostJob')) }}}" class="btn btn-primary lift">{{{ trans('lang.post_job') }}}</a></div>

                @else

                    <div><a href="{{{ url(route('showUserProfile', ['slug' => Auth::user()->slug])) }}}" class="btn shadow-none lift">{{{ trans('lang.view_profile') }}}</a></div>

                @endif

            @elseif ($role === 'freelancer')

                @if (Helper::getAccessType() == 'both' || Helper::getAccessType() == 'services')

                    <div>
                        <a href="{{{ url(route('freelancerPostService')) }}}" class="btn btn-primary lift">{{{ trans('lang.post_service') }}}</a>
                    </div>

                @else

                    <div><a href="{{{ url(route('showUserProfile', ['slug' => Auth::user()->slug])) }}}" class="btn shadow-none lift">{{{ trans('lang.view_profile') }}}</a></div>

                @endif

            @endif
        </div>

        <ul class="list-unstyled components">
            {{-- Admin Dashboard --}}
            @if ($role === 'admin')
                <p>Dummy Heading</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">{{ trans('lang.manage_articles') }}</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="{{{ route('articles') }}}">{{ trans('lang.articles') }}</a>
                        </li>
                        <li>
                            <a href="{{{ route('articleCategories') }}}">{{ trans('lang.categories') }}</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{{ route('orderList') }}}"><i class="material-symbols-outlined">shopping_cart</i>{{ trans('lang.orders') }}</a>
                </li>
                <li>
                    <a href="{{{ route('allJobs') }}}"><i class="material-symbols-outlined">work</i>{{ trans('lang.all_jobs') }}</a>
                </li>
                @if (Helper::getAccessType() == 'both' || Helper::getAccessType() == 'services')
                    <li>
                        <a href="{{{ route('allServices') }}}"><i class="material-symbols-outlined">work</i>{{ trans('lang.services') }}</a>
                    </li>
                    <li>
                        <a href="{{{ route('ServiceOrders') }}}"><i class="material-symbols-outlined">work</i>{{ trans('lang.service_orders') }}</a>
                    </li>
                @endif
                <li>
                    <a href="{{{ route('reviewOptions') }}}"><i class="material-symbols-outlined">tune</i>{{ trans('lang.review_options') }}</a>
                </li>
                <li>
                    <a href="{{{ route('userListing') }}}"><i class="material-symbols-outlined">person</i>{{ trans('lang.manage_users') }}</a>
                </li>
                <li>
                    <a href="{{{ route('emailTemplates') }}}"><i class="material-symbols-outlined">mail</i>{{ trans('lang.email_templates') }}</a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">{{ trans('lang.pages') }}</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="{{{ route('pages') }}}">{{ trans('lang.all_pages') }}</a>
                        </li>
                        <li>
                            <a href="{{{ route('pages') }}}">{{ trans('lang.add_pages') }}</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{{ route('createPackage') }}}"><i class="material-symbols-outlined">package</i>{{ trans('lang.packages') }}</a>
                </li>
                <li>
                    <a href="{{{ route('adminPayouts') }}}"><i class="material-symbols-outlined">payments</i>{{ trans('lang.payouts') }}</a>
                </li>
                @if (empty(\App\SiteManagement::getMetaValue('homepage')))
                    <li>
                        <a href="{{{ route('homePageSettings') }}}"><i class="material-symbols-outlined">grid_view</i>{{ trans('lang.home_page_settings') }}</a>
                    </li>
                @endif
                <li>
                    <i class="material-symbols-outlined">settings</i>
                    <a href="#adminSubmenu" data-toggle="collapse" aria-expanded="false">{{ trans('lang.settings') }}</a>
                    <ul class="collapse list-unstyled" id="adminSubmenu">
                        <li>
                            <a href="{{{ route('adminProfile') }}}">{{ trans('lang.acc_settings') }}</a>
                        </li>
                        <li>
                            <a href="{{{ url('admin/settings') }}}">{{ trans('lang.general_settings') }}</a>
                        </li>
                        <li>
                            <a href="{{{ route('resetPassword') }}}">{{ trans('lang.reset_pass') }}</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <i class="material-symbols-outlined">settings</i>
                    <a href="#settingsSubmenu" data-toggle="collapse" aria-expanded="false">{{ trans('lang.taxonomies') }}</a>
                    <ul class="collapse list-unstyled" id="settingsSubmenu">
                        <li>
                            <a href="{{{ route('skills') }}}">{{ trans('lang.skills') }}</a>
                        </li>
                        <li>
                            <a href="{{{ route('categories') }}}">{{ trans('lang.job_cats') }}</a>
                        </li>
                        <li>
                            <a href="{{{ route('departments') }}}">{{ trans('lang.dpts') }}</a>
                        </li>
                        <li>
                            <a href="{{{ route('languages') }}}">{{ trans('lang.langs') }}</a>
                        </li>
                        <li>
                            <a href="{{{ route('locations') }}}">{{ trans('lang.locations') }}</a>
                        </li>
                        <li>
                            <a href="{{{ route('badges') }}}">{{ trans('lang.badges') }}</a>
                        </li>
                        <li>
                            <a href="{{{ route('deliveryTime') }}}">{{ trans('lang.delivery_time') }}</a>
                        </li>
                        <li>
                            <a href="{{{ route('ResponseTime') }}}">{{ trans('lang.response_time') }}</a>
                        </li>
                    </ul>
                </li>
            @endif
            {{-- End of Admin Dashboard --}}
            {{-- Employer/Freelancer Dashboard --}}
            @if ($role === 'employer' || $role === 'freelancer' )
                <li class="active">
                    <a href="{{{ url($role.'/dashboard') }}}"><i class="material-symbols-outlined">dashboard</i>{{ trans('lang.dashboard') }}</a>
                </li>
                <li>
                    <a href="{{{ route('message') }}}"><i class="material-symbols-outlined">textsms</i>{{ trans('lang.msg_center') }}</a>
                </li>
                <li>
                    <a href="#profileSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="material-symbols-outlined">settings</i>{{ trans('lang.settings') }}
                    </a>
                    <ul class="collapse list-unstyled" id="profileSubmenu">
                        <li>
                            <a href="{{{ url($role.'/profile') }}}">{{ trans('lang.profile_settings') }}</a>
                        </li>
                        <li>
                            <a href="{{{ route('manageAccount') }}}">{{ trans('lang.acc_settings') }}</a>
                        </li>
                    </ul>
                </li>
                {{-- Employer --}}
                @if ($role === 'employer')
                    @if (Helper::getAccessType() == 'both' || Helper::getAccessType() == 'jobs')
                        <li>
                            <a href="#jobsSubmenu" data-toggle="collapse" aria-expanded="false">
                                <i class="material-symbols-outlined">work_outline</i>{{ trans('lang.jobs') }}
                            </a>
                            <ul class="collapse list-unstyled" id="jobsSubmenu">
                                <li>
                                    <a href="{{{ route('employerManageJobs') }}}">{{ trans('lang.manage_job') }}</a>
                                </li>
                                <li>
                                    <a href="{{{ url('employer/jobs/completed') }}}">{{ trans('lang.completed_jobs') }}</a>
                                </li>
                                <li>
                                    <a href="{{{ url('employer/jobs/hired') }}}">{{ trans('lang.ongoing_jobs') }}</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    @if (Helper::getAccessType() == 'both' || Helper::getAccessType() == 'services')
                        <li>
                            <a href="#manageServiceSubmenu" data-toggle="collapse" aria-expanded="false">
                                <i class="material-symbols-outlined">work</i>{{ trans('lang.manage_services') }}
                            </a>
                            <ul class="collapse list-unstyled" id="manageServiceSubmenu">
                                <li>
                                    <a href="{{{ url('employer/services/hired') }}}">{{ trans('lang.ongoing_services') }}</a>
                                </li>
                                <li>
                                    <a href="{{{ url('employer/services/completed') }}}">{{ trans('lang.completed_services') }}</a>
                                </li>
                                <li>
                                    <a href="{{{ url('employer/services/cancelled') }}}">{{ trans('lang.cancelled_services') }}</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    <li>
                        <a href="#invoiceSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="material-symbols-outlined">receipt_long</i>{{ trans('lang.invoices') }}
                        </a>
                        <ul class="collapse list-unstyled" id="invoiceSubmenu">
                            @if ($employer_payment_module === 'true' )
                                <li>
                                    <a href="{{{ url('employer/package/invoice') }}}">{{ trans('lang.pkg_inv') }}</a>
                                </li>
                            @endif
                            <li>
                                <a href="{{{ url('employer/project/invoice') }}}">{{ trans('lang.project_inv') }}</a>
                            </li>
                        </ul>
                    </li>
                    @if ($employer_payment_module === 'true' )
                        <li>
                            <a href="{{{ url('dashboard/packages/'.$role) }}}"><i class="material-symbols-outlined">package</i>{{ trans('lang.packages') }}</a>
                        </li>
                    @endif
                    {{-- Freelancer --}}
                    @elseif ($role === 'freelancer')
                        <li>
                            <a href="#freelancerProjectsSubmenu" data-toggle="collapse" aria-expanded="false">
                                <i class="material-symbols-outlined">receipt_long</i>{{ trans('lang.all_projects') }}
                            </a>
                            <ul class="collapse list-unstyled" id="freelancerProjectsSubmenu">
                                <li>
                                    <a href="{{{ url('freelancer/jobs/completed') }}}">{{ trans('lang.completed_projects') }}</a>
                                </li>
                                <li>
                                    <a href="{{{ url('freelancer/jobs/cancelled') }}}">{{ trans('lang.cancelled_projects') }}</a>
                                </li>
                                <li>
                                    <a href="{{{ url('freelancer/jobs/hired') }}}">{{ trans('lang.ongoing_projects') }}</a>
                                </li>
                            </ul>
                        </li>
                        @if (Helper::getAccessType() == 'both' || Helper::getAccessType() == 'services')
                            <li>
                                <a href="#freelancerServiceSubmenu" data-toggle="collapse" aria-expanded="false">
                                    <i class="material-symbols-outlined">receipt_long</i>{{ trans('lang.manage_services') }}
                                </a>
                                <ul class="collapse list-unstyled" id="freelancerServiceSubmenu">
                                    <li>
                                        <a href="{{{ route('ServiceListing', ['status'=>'posted']) }}}">{{ trans('lang.posted_services') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{{ route('ServiceListing', ['status'=>'hired']) }}}">{{ trans('lang.ongoing_services') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{{ route('ServiceListing', ['status'=>'completed']) }}}">{{ trans('lang.completed_services') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{{ route('ServiceListing', ['status'=>'cancelled']) }}}">{{ trans('lang.cancelled_services') }}</a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        <li>
                            <a href="{{{ route('showFreelancerProposals') }}}"><i class="material-symbols-outlined">science</i>{{ trans('lang.proposals') }}</a>
                        </li>
                        @if ($payment_module === 'true' )
                            <li>
                                <a href="#freelancerInvoiceSubmenu" data-toggle="collapse" aria-expanded="false">
                                    <i class="material-symbols-outlined">receipt_long</i>{{ trans('lang.invoices') }}</a>
                                </a>
                                <ul class="collapse list-unstyled" id="freelancerInvoiceSubmenu">
                                    <li>
                                        <a href="{{{ url('freelancer/package/invoice') }}}">{{ trans('lang.pkg_inv') }}</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{{ url('dashboard/packages/'.$role) }}}"><i class="material-symbols-outlined">package</i>{{ trans('lang.packages') }}</a>
                            </li>
                        @endif
                    
                @endif
                <li>
                    <a href="{{{ url($role.'/saved-items') }}}"><i class="material-symbols-outlined">favorite_border</i>{{ trans('lang.saved_items') }}</a>
                </li>
            @endif
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('dashboard-logout-form').submit();">
                    <i class="material-symbols-outlined">logout</i>{{ trans('lang.logout') }}
                </a>
                <form id="dashboard-logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </nav>

    
    <!-- Page Content -->
    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fas fa-align-left"></i>
                    <span>Toggle Sidebar</span>
                </button>
            </div>
        </nav>
    </div>
</div>

@endauth