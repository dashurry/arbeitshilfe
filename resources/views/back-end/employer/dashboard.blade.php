@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')

@section('content')
    <section class="wt-haslayout wt-dbsectionspace wt-insightuser" id="dashboard">

        @if (Session::has('message'))

            <div class="flash_msg">

                <flash_messages :message_class="'success'" :time ='5' :message="'{{{ Session::get('message') }}}'" v-cloak></flash_messages>

            </div>

            @php session()->forget('message');  @endphp

        @endif

        <div class="row">
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
