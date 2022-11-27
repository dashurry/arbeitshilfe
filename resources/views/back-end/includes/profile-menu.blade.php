<div id="wt-profiledashboard" class="dropdown-menu" aria-labelledby="navbarDropdown">
    @if ($role === 'admin')

        <li class="menu-item-has-children">

            <span class="wt-dropdowarrow"><i class="material-symbols-outlined"></i></span>

            <a href="javascript:void(0)">

                <i class="ti-layers"></i>

                <span>{{ trans('lang.manage_articles') }}</span>

            </a>

            <ul class="sub-menu">

                <li><a href="{{{ route('articles') }}}">{{ trans('lang.articles') }}</a></li>

                <li><a href="{{{ route('articleCategories') }}}">{{ trans('lang.categories') }}</a></li>

            </ul>

        </li>

        <li>

            <a href="{{{ route('orderList') }}}">

                <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                <span>{{ trans('lang.orders') }}</span>

            </a>

        </li>

        @if (Helper::getAccessType() == 'both' || Helper::getAccessType() == 'jobs')

            <li>

                <a href="{{{ route('allJobs') }}}">

                    <i class="material-symbols-outlined">work</i>

                    <span>{{ trans('lang.all_jobs') }}</span>

                </a>

            </li>

        @endif

        @if (Helper::getAccessType() == 'both' || Helper::getAccessType() == 'services')

            <li>

                <a href="{{{ route('allServices') }}}">

                    <i class="material-symbols-outlined">work</i>

                    <span>{{ trans('lang.services') }}</span>

                </a>

            </li>

            <li>

                <a href="{{{ route('ServiceOrders') }}}">

                    <i class="material-symbols-outlined">work</i>

                    <span>{{ trans('lang.service_orders') }}</span>

                </a>

            </li>

        @endif

        <li>

            <a href="{{{ route('reviewOptions') }}}">

                <i class="ti-check-box"></i>

                <span>{{ trans('lang.review_options') }}</span>

            </a>

        </li>

        <li>

            <a href="{{{ route('userListing') }}}">

                <i class="ti-user"></i>

                <span>{{ trans('lang.manage_users') }}</span>

            </a>

        </li>

        <li>

            <a href="{{{ route('emailTemplates') }}}">

                <i class="ti-email"></i>

                <span>{{ trans('lang.email_templates') }}</span>

            </a>

        </li>

        <li class="menu-item-has-children">

            <span class="wt-dropdowarrow"><i class="material-symbols-outlined"></i></span>

            <a href="{{{ route('pages') }}}">

                <i class="ti-layers"></i>

                <span>{{ trans('lang.pages') }}</span>

            </a>

            <ul class="sub-menu">

                <li><a href="{{{ route('pages') }}}">{{ trans('lang.all_pages') }}</a></li>

                <li><a href="{{{ route('createPage') }}}">{{ trans('lang.add_pages') }}</a></li>

            </ul>

        </li>

        <li>

            <a href="{{{ route('createPackage') }}}">

                <i class="ti-package"></i>

                <span>{{ trans('lang.packages') }}</span>

            </a>

        </li>
        @if (empty(\App\SiteManagement::getMetaValue('homepage')))

            <li>

                <a href="{{{ route('homePageSettings') }}}">

                    <i class="material-symbols-outlined">dashboard</i>

                    <span>{{ trans('lang.home_page_settings') }}</span>

                </a>

            </li>

        @endif

        <li class="menu-item-has-children">

            <span class="wt-dropdowarrow"><i class="material-symbols-outlined"></i></span>

            <a href="{{{ route('adminProfile') }}}">

                <i class="material-symbols-outlined">settings</i>

                <span>{{ trans('lang.settings') }}</span>

            </a>

            <ul class="sub-menu">

                <li><a href="{{{ route('adminProfile') }}}">{{ trans('lang.acc_settings') }}</a></li>

                <li><a href="{{{ route('settings') }}}">{{ trans('lang.general_settings') }}</a></li>

                <li><a href="{{{ route('resetPassword') }}}">{{ trans('lang.reset_pass') }}</a></li>

            </ul>

        </li>

        <li class="menu-item-has-children">

            <span class="wt-dropdowarrow"><i class="ti-layers"></i></span>

            <a href="{{{ route('categories') }}}">

                <i class="ti-layers"></i>

                <span>{{ trans('lang.taxonomies') }}</span>

            </a>

            <ul class="sub-menu">

                <li><a href="{{{ route('skills') }}}">{{ trans('lang.skills') }}</a></li>

                <li><a href="{{{ route('categories') }}}">{{ trans('lang.job_cats') }}</a></li>

                <li><a href="{{{ route('departments') }}}">{{ trans('lang.dpts') }}</a></li>

                <li><a href="{{{ route('languages') }}}">{{ trans('lang.langs') }}</a></li>

                <li><a href="{{{ route('locations') }}}">{{ trans('lang.locations') }}</a></li>

                <li><a href="{{{ route('badges') }}}">{{ trans('lang.badges') }}</a></li>

                <li><a href="{{{ route('deliveryTime') }}}">{{ trans('lang.delivery_time') }}</a></li>

                <li><a href="{{{ route('ResponseTime') }}}">{{ trans('lang.response_time') }}</a></li>

            </ul>

        </li>

    @endif
    {{-- Both Roles --}}
    @if ($role === 'employer' || $role === 'freelancer' )
            {{-- Dashboard --}}
            <a href="{{{ url($role.'/dashboard') }}}" class="dropdown-item d-flex align-items-center">
                <i class="material-symbols-outlined text-primary mr-3">dashboard</i>{{ trans('lang.dashboard') }}
            </a>
            {{-- Message --}}
            <a href="{{{ route('message') }}}" class="dropdown-item d-flex align-items-center">
                <i class="material-symbols-outlined text-primary mr-3">textsms</i>{{ trans('lang.msg_center') }}
            </a>
            {{-- Settings --}}
            <div class="dropright">
                <div class="dropdown-toggle dropdown-item d-flex align-items-center" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-symbols-outlined text-primary mr-3">settings</i>{{ trans('lang.settings') }}
                </div>
                <div class="dropdown-menu">
                    <a href="{{{ url($role.'/profile') }}}" class="dropdown-item">{{ trans('lang.profile_settings') }}</a>
                    <a href="{{{ route('manageAccount') }}}" class="dropdown-item">{{ trans('lang.acc_settings') }}</a>
                </div>
            </div>
        {{-- Employer Menu --}}
        @if ($role === 'employer')
            @if (Helper::getAccessType() == 'both' || Helper::getAccessType() == 'jobs')
                {{-- create Job --}}
                <a href="{{{ route('employerPostJob') }}}" class="dropdown-item d-flex align-items-center">
                    <i class="material-symbols-outlined text-primary mr-3">note_add</i>{{{ trans('lang.post_job') }}}
                </a>
                {{-- Jobs list --}}
                <div class="dropright">
                    <div class="dropdown-toggle dropdown-item d-flex align-items-center" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-symbols-outlined text-primary mr-3">work_outline</i>{{ trans('lang.jobs') }}
                    </div>
                    <div class="dropdown-menu">
                        <a href="{{{ route('employerManageJobs') }}}" class="dropdown-item">{{ trans('lang.manage_job') }}</a>
                        <a href="{{{ url('employer/jobs/completed') }}}" class="dropdown-item">{{ trans('lang.completed_projects') }}</a>
                        <a href="{{{ url('employer/jobs/hired') }}}" class="dropdown-item">{{ trans('lang.ongoing_projects') }}</a>
                    </div>
                </div>
            @endif
            @if (Helper::getAccessType() == 'both' || Helper::getAccessType() == 'services')
                {{-- Services --}}
                <div class="dropright">
                    <div class="dropdown-toggle dropdown-item d-flex align-items-center" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-symbols-outlined text-primary mr-3">work</i>{{ trans('lang.manage_services') }}
                    </div>
                    <div class="dropdown-menu">
                        <a href="{{{ url('employer/services/hired') }}}" class="dropdown-item">{{ trans('lang.ongoing_services') }}</a>
                        <a href="{{{ url('employer/services/completed') }}}" class="dropdown-item">{{ trans('lang.completed_services') }}</a>
                        <a href="{{{ url('employer/services/cancelled') }}}" class="dropdown-item">{{ trans('lang.cancelled_services') }}</a>
                    </div>
                </div>
            @endif
            {{-- Invoice --}}
            <div class="dropright">
                <div class="dropdown-toggle dropdown-item d-flex align-items-center" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-symbols-outlined text-primary mr-3">receipt_long</i>{{ trans('lang.invoices') }}
                </div>
                <div class="dropdown-menu">
                    @if ($employer_payment_module === 'true' )
                        <a href="{{{ url('employer/package/invoice') }}}" class="dropdown-item">{{ trans('lang.pkg_inv') }}</a>
                    @endif
                    <a href="{{{ url('employer/project/invoice') }}}" class="dropdown-item">{{ trans('lang.project_inv') }}</a>
                </div>
            </div>
            @if ($employer_payment_module === 'true' )
                {{-- Packages --}}
                <a href="{{{ url('dashboard/packages/'.$role) }}}" class="dropdown-item d-flex align-items-center">
                    <i class="material-symbols-outlined text-primary mr-3">storefront</i>{{ trans('lang.packages') }}
                </a>
            @endif
        {{-- Freelancer Menu --}}
        @elseif ($role === 'freelancer')
            <div class="dropright">
                <div class="dropdown-toggle dropdown-item d-flex align-items-center" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-symbols-outlined text-primary mr-3">work</i>{{ trans('lang.all_projects') }}
                </div>
                <div class="dropdown-menu">
                    <a href="{{{ url('freelancer/jobs/completed') }}}" class="dropdown-item">{{ trans('lang.completed_projects') }}</a>
                    <a href="{{{ url('freelancer/jobs/cancelled') }}}" class="dropdown-item">{{ trans('lang.cancelled_projects') }}</a>
                    <a href="{{{ url('freelancer/jobs/hired') }}}" class="dropdown-item">{{ trans('lang.ongoing_projects') }}</a>
                </div>
            </div>
            @if (Helper::getAccessType() == 'both' || Helper::getAccessType() == 'services')
                <div class="dropright">
                    <div class="dropdown-toggle dropdown-item d-flex align-items-center" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-symbols-outlined text-primary mr-3">work</i>{{ trans('lang.manage_services') }}
                    </div>
                    <div class="dropdown-menu">
                        <a href="{{{ route('ServiceListing', ['status'=>'posted']) }}}" class="dropdown-item">{{ trans('lang.posted_services') }}</a>
                        <a href="{{{ route('ServiceListing', ['status'=>'hired']) }}}" class="dropdown-item">{{ trans('lang.ongoing_services') }}</a>
                        <a href="{{{ route('ServiceListing', ['status'=>'completed']) }}}" class="dropdown-item">{{ trans('lang.completed_services') }}</a>
                        <a href="{{{ route('ServiceListing', ['status'=>'cancelled']) }}}" class="dropdown-item">{{ trans('lang.cancelled_services') }}</a>
                    </div>
                </div>
            @endif
            {{-- Proposals --}}
            <a href="{{{ route('showFreelancerProposals') }}}" class="dropdown-item d-flex align-items-center">
                <i class="material-symbols-outlined text-primary mr-3">science</i>{{ trans('lang.proposals') }}
            </a>
            @if ($payment_module === 'true' )
                <div class="dropright">
                    <div class="dropdown-toggle dropdown-item d-flex align-items-center" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-symbols-outlined">receipt_long</i>{{ trans('lang.invoices') }}
                    </div>
                    <div class="dropdown-menu">
                        <a href="{{{ url('freelancer/package/invoice') }}}" class="dropdown-item">{{ trans('lang.pkg_inv') }}</a>
                    </div>
                </div>
                {{-- Packages --}}
                <a href="{{{ url('dashboard/packages/'.$role) }}}" class="dropdown-item d-flex align-items-center">
                    <i class="material-symbols-outlined text-primary mr-3">storefront</i>{{ trans('lang.packages') }}
                </a>
            @endif
        @endif
        {{-- Favorite --}}
        <a href="{{{ url($role.'/saved-items') }}}" class="dropdown-item d-flex align-items-center">
            <i class="material-symbols-outlined text-primary mr-3">favorite_border</i>{{ trans('lang.saved_items') }}
        </a>
    @endif
    {{-- Logout --}}
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('profile-logout-form').submit();" class="dropdown-item d-flex align-items-center">
        <i class="material-symbols-outlined text-primary mr-3">logout</i>{{{trans('lang.logout')}}}
    </a>
    <form id="profile-logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        {{ csrf_field() }}
    </form>
</div>