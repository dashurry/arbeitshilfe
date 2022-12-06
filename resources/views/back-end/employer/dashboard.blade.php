@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@section('content')
    <section id="dashboard">
        @if (Session::has('message'))
            <div class="flash_msg">
                <flash_messages :message_class="'success'" :time ='5' :message="'{{{ Session::get('message') }}}'" v-cloak></flash_messages>
            </div>
            @php session()->forget('message');  @endphp
        @endif
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="row">
                    {{-- Message Navigation Card --}}
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3">
                        <div class="card {{ $notify_class }}">
                            <div class="card-body text-center">
                                <a href="{{ url('message-center') }}">
                                    <figure class="m-2">
                                        <i class="material-symbols-outlined text-white p-2 rounded-circle bg-primary">sms</i>
                                        <p class="h6 font-semibold text-muted text-sm mt-2">{{ trans('lang.new_msgs') }}</p>
                                    </figure>
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($access_type == 'jobs' || $access_type== 'both')
                    {{-- Manage Jobs Navigation Card --}}
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3">
                            <div class="card {{ $notify_class }}">
                                <div class="card-body text-center">
                                    <a href="{{{ url('employer/dashboard/manage-jobs') }}}">
                                        <figure class="m-2">
                                            <i class="material-symbols-outlined text-white p-2 rounded-circle bg-success">rate_review</i>
                                            {{-- {{ Helper::getImages('uploads/settings/icon',$latest_proposals_icon, 'layers') }} --}}
                                            <p class="h6 font-semibold text-muted text-sm mt-2">{{ trans('lang.latest_proposals') }}</p>
                                        </figure>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (!empty($enable_package) && $enable_package === 'true')
                        @if (!empty($package))
                            {{-- Package Navigation Card --}}
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3">
                                <div class="card {{ $notify_class }}">
                                    <div class="card-body">
                                        <countdown
                                            date="{{$expiry_date}}"
                                            :image_url="'{{{ Helper::getDashExpiryImages('uploads/settings/icon',$latest_package_expiry_icon, 'img-21.png') }}}'"
                                            :title=trans('lang.check_pkg_expiry')
                                            :package_url="'{{url('dashboard/packages/employer')}}'"
                                            :current_package="'{{$package->title}}'">
                                        </countdown>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                    {{-- Liked Navigation Card --}}
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3">
                        <div class="card {{ $notify_class }}">
                            <div class="card-body text-center">
                                <figure class="m-2">
                                    <a href="{{ url('employer/saved-items') }}">
                                        <i class="material-symbols-outlined text-white p-2 rounded-circle bg-warning">favorite</i>
                                        <p class="h6 font-semibold text-muted text-sm mt-2">{{ trans('lang.view_saved_items') }}</p>
                                    </a>
                                </figure>
                            </div>
                        </div>
                    </div>
                    @if ($access_type == 'jobs' || $access_type== 'both')
                        {{-- Cancelled Jobs Navigation Card --}}
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3">
                            <div class="card {{ $notify_class }}">
                                <div class="card-body text-center">
                                    <figure class="m-2">
                                        <a href="{{{ url('employer/jobs/cancelled') }}}">
                                            <i class="material-symbols-outlined text-white p-2 rounded-circle bg-danger">block</i>
                                            <p class="h6 font-semibold text-muted text-sm mt-2">{{ trans('lang.total_cancelled_jobs') }}</p>
                                        </a>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        {{-- Ongoing Jobs Navigation Card --}}
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3">
                            <div class="card {{ $notify_class }}">
                                <div class="card-body text-center">
                                    <a href="{{{ url('employer/jobs/hired') }}}">
                                        <figure class="m-2">
                                            <i class="material-symbols-outlined text-white p-2 rounded-circle bg-info">history</i>
                                            <p class="h6 font-semibold text-muted text-sm mt-2">{{ trans('lang.total_ongoing_jobs') }}</p>
                                        </figure>
                                    </a>
                                </div>
                            </div>
                        </div>
                        {{-- Completed Jobs Navigation Card --}}
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3">
                            <div class="card {{ $notify_class }}">
                                <div class="card-body text-center">
                                    <a href="{{{ url('employer/jobs/completed') }}}">
                                        <figure class="m-2">
                                            <i class="material-symbols-outlined text-white p-2 rounded-circle bg-success">thumb_up</i>
                                            <p class="h6 font-semibold text-muted text-sm mt-2">{{ trans('lang.total_completed_jobs') }}</p>
                                        </figure>
                                    </a>
                                </div>
                            </div>
                        </div>
                        {{-- Posted Jobs Navigation Card --}}
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3">
                            <div class="card {{ $notify_class }}">
                                <div class="card-body text-center">
                                    <a href="{{{ route('employerManageJobs') }}}">
                                        <figure class="m-2">
                                            <i class="material-symbols-outlined text-white p-2 rounded-circle bg-primary">cloud_upload</i>
                                            <p class="h6 font-semibold text-muted text-sm mt-2">{{ trans('lang.total_posted_jobs') }}</p>
                                        </figure>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($access_type == 'services' || $access_type== 'both')
                        {{-- Ongoing Orders Navigation Card --}}
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3">
                            <div class="card {{ $notify_class }}">
                                <div class="card-body text-center">
                                    <a href="{{{ url('employer/services/hired') }}}">
                                        <figure class="m-2">
                                            <i class="material-symbols-outlined text-white p-2 rounded-circle bg-info">history</i>
                                            <p class="h6 font-semibold text-muted text-sm mt-2">{{ trans('lang.total_ongoing_services') }}</p>
                                        </figure>
                                    </a>
                                </div>
                            </div>
                        </div>
                        {{-- Completed Orders Navigation Card --}}
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3">
                            <div class="card {{ $notify_class }}">
                                <div class="card-body text-center">
                                    <a href="{{{ url('employer/services/completed') }}}">
                                        <figure class="m-2">
                                            <i class="material-symbols-outlined text-white p-2 rounded-circle bg-success">check_circle</i>
                                            <p class="h6 font-semibold text-muted text-sm mt-2">{{ trans('lang.total_completed_services') }}</p>
                                        </figure>
                                    </a>
                                </div>
                            </div>
                        </div>
                        {{-- Cancelled Orders Navigation Card --}}
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3">
                            <div class="card {{ $notify_class }}">
                                <div class="card-body text-center">
                                    <a href="{{{ url('employer/services/cancelled') }}}">
                                        <figure class="m-2">
                                            <i class="material-symbols-outlined text-white p-2 rounded-circle bg-danger">delete</i>
                                            <p class="h6 font-semibold text-muted text-sm mt-2">{{ trans('lang.total_cancelled_services') }}</p>
                                        </figure>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @if ($access_type == 'jobs' || $access_type== 'both')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    {{-- Title --}}
                    <div class="border-bottom mb-4 mt-5">
                        <h1>{{ trans('lang.ongoing_project') }}</h1>
                    </div>
                    @if (!empty($ongoing_jobs) && $ongoing_jobs->count() > 0)
                        {{-- Table --}}
                        <div>
                            <b-table-simple responsive>
                                <b-thead head-variant="light">
                                    <b-tr>
                                        <b-th>{{trans('lang.project_title')}}</b-th>
                                        <b-th>{{trans('lang.hired_freelancers')}}</b-th>
                                        <b-th>{{trans('lang.project_cost')}}</b-th>
                                        <b-th>{{trans('lang.actions')}}</b-th>
                                    </b-tr>
                                </b-thead>
                                <b-tbody>
                                    @foreach ($ongoing_jobs as $project)
                                        @php
                                            $proposal_freelancer = $project->proposals->where('status', 'hired')->pluck('freelancer_id')->first();
                                            $freelancer = !empty($proposal_freelancer) ? \App\User::find($proposal_freelancer) : ''; 
                                            $user_name = Helper::getUsername($proposal_freelancer);
                                        @endphp
                                        <b-tr>
                                            <b-td data-th="Project title">
                                                    <a class="text-dark" target="_blank" href="{{{ url('job/'.$project->slug) }}}">{{{ $project->title }}}</a>
                                            </b-td>
                                            @if (!empty($freelancer))
                                                <b-td data-th="Hired freelancer text-center">
                                                    <a href="{{{url('profile/'.$freelancer->slug)}}}" class="text-dark">
                                                        @if ($freelancer->user_verified)
                                                            <i class="material-symbols-outlined">verified</i>
                                                        @endif
                                                        {{{$user_name}}}
                                                    </a>
                                                </b-td>
                                            @endif
                                            <b-td data-th="Project cost">
                                                <span class="bt-content">{{ !empty($symbol['symbol']) ? $symbol['symbol'] : '$' }}{{$project->price}}</span>
                                            </b-td>
                                            <b-td data-th="Actions">
                                                    <b-button squared size="sm" variant="success" href="{{{ url('employer/dashboard/job/'.$project->slug.'/proposals') }}}">{{ trans('lang.view_detail') }}</b-button>
                                            </b-td>
                                        </b-tr>
                                    @endforeach
                                </b-tbody>
                            </b-table>
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
        @endif
    </section>
@endsection
