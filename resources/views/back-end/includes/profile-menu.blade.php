<div class="dropdown-menu" aria-labelledby="navbarDropdown">
    @if ($role === 'admin')
        {{-- Dashboard --}}
        <div class="dropright">
            <div class="dropdown-toggle dropdown-item d-flex align-items-center" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-symbols-outlined text-primary mr-3">dashboard</i>{{ trans('lang.manage_articles') }}
            </div>
            <div class="dropdown-menu">
                <a href="{{{ route('articles') }}}" class="dropdown-item">{{ trans('lang.articles') }}</a>
                <a href="{{{ route('articleCategories') }}}" class="dropdown-item">{{ trans('lang.categories') }}</a>
            </div>
        </div>
        {{-- Assignments --}}
        <a href="{{{ route('orderList') }}}" class="dropdown-item d-flex align-items-center">
            <i class="material-symbols-outlined text-primary mr-3">shopping_cart</i>{{ trans('lang.orders') }}
        </a>
        @if (Helper::getAccessType() == 'both' || Helper::getAccessType() == 'jobs')
            {{-- All Jobs --}}
            <a href="{{{ route('allJobs') }}}" class="dropdown-item d-flex align-items-center">
                <i class="material-symbols-outlined text-primary mr-3">work</i>{{ trans('lang.all_jobs') }}
            </a>
        @endif
        @if (Helper::getAccessType() == 'both' || Helper::getAccessType() == 'services')
            {{-- All Services --}}
            <a href="{{{ route('allServices') }}}" class="dropdown-item d-flex align-items-center">
                <i class="material-symbols-outlined text-primary mr-3">work</i>{{ trans('lang.services') }}
            </a>
            {{-- All Service Assignments --}}
            <a href="{{{ route('ServiceOrders') }}}" class="dropdown-item d-flex align-items-center">
                <i class="material-symbols-outlined text-primary mr-3">assignment</i>{{ trans('lang.service_orders') }}
            </a>
        @endif
        {{-- Review Options --}}
        <a href="{{{ route('reviewOptions') }}}" class="dropdown-item d-flex align-items-center">
            <i class="material-symbols-outlined text-primary mr-3">tune</i>{{ trans('lang.review_options') }}
        </a>
        {{-- Users Listing --}}
        <a href="{{{ route('userListing') }}}" class="dropdown-item d-flex align-items-center">
            <i class="material-symbols-outlined text-primary mr-3">group</i>{{ trans('lang.manage_users') }}
        </a>
        {{-- Email Templates --}}
        <a href="{{{ route('emailTemplates') }}}" class="dropdown-item d-flex align-items-center">
            <i class="material-symbols-outlined text-primary mr-3">mail</i>{{ trans('lang.email_templates') }}
        </a>
        {{-- Website Pages and create new Page --}}
        <div class="dropright">
            <div class="dropdown-toggle dropdown-item d-flex align-items-center" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-symbols-outlined text-primary mr-3">Web</i>{{ trans('lang.pages') }}
            </div>
            <div class="dropdown-menu">
                <a href="{{{ route('pages') }}}" class="dropdown-item">{{ trans('lang.all_pages') }}</a>
                <a href="{{{ route('createPage') }}}" class="dropdown-item">{{ trans('lang.add_pages') }}</a>
            </div>
        </div>
        {{-- Packages --}}
        <a href="{{{ route('createPackage') }}}" class="dropdown-item d-flex align-items-center">
            <i class="material-symbols-outlined text-primary mr-3">inventory_2</i>{{ trans('lang.packages') }}
        </a>
        @if (empty(\App\SiteManagement::getMetaValue('homepage')))
            {{-- Home Page Settings --}}
            <a href="{{{ route('homePageSettings') }}}" class="dropdown-item d-flex align-items-center">
                <i class="material-symbols-outlined text-primary mr-3">settings</i>{{ trans('lang.home_page_settings') }}
            </a>
        @endif
        {{-- Settings --}}
        <div class="dropright">
            <div class="dropdown-toggle dropdown-item d-flex align-items-center" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-symbols-outlined text-primary mr-3">settings</i>{{ trans('lang.settings') }}
            </div>
            <div class="dropdown-menu">
                <a href="{{{ route('adminProfile') }}}" class="dropdown-item">{{ trans('lang.acc_settings') }}</a>
                <a href="{{{ route('settings') }}}" class="dropdown-item">{{ trans('lang.general_settings') }}</a>
                <a href="{{{ route('resetPassword') }}}" class="dropdown-item">{{ trans('lang.reset_pass') }}</a>
            </div>
        </div>
        {{-- Categories --}}
        <div class="dropright">
            <div class="dropdown-toggle dropdown-item d-flex align-items-center" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-symbols-outlined text-primary mr-3">memory</i>{{ trans('lang.taxonomies') }}
            </div>
            <div class="dropdown-menu">
                <a href="{{{ route('skills') }}}" class="dropdown-item">{{ trans('lang.skills') }}</a>
                <a href="{{{ route('categories') }}}" class="dropdown-item">{{ trans('lang.job_cats') }}</a>
                <a href="{{{ route('departments') }}}" class="dropdown-item">{{ trans('lang.dpts') }}</a>
                <a href="{{{ route('languages') }}}" class="dropdown-item">{{ trans('lang.langs') }}</a>
                <a href="{{{ route('locations') }}}" class="dropdown-item">{{ trans('lang.locations') }}</a>
                <a href="{{{ route('badges') }}}" class="dropdown-item">{{ trans('lang.badges') }}</a>
                <a href="{{{ route('deliveryTime') }}}" class="dropdown-item">{{ trans('lang.delivery_time') }}</a>
                <a href="{{{ route('ResponseTime') }}}" class="dropdown-item">{{ trans('lang.response_time') }}</a>
            </div>
        </div>
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