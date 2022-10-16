@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')

@section('content')

<style>
    body h2{
        font-family: 'Poppins', Arial, Helvetica, sans-serif !important;
        color: #313889;
    }
    .wt-main {
        background: #ffffff;
        margin-bottom: 0rem;
    }
</style>

    <div class="row justify-content-center">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 wt-insightsitemholder">

            
                    <div class="wt-dashboardbox">

                        <div class="wt-dashboardboxtitle border-0 pb-0">

                            <h2>{{ trans('lang.completed_jobs') }}</h2>

                        </div>

                        <div class="wt-dashboardboxcontent wt-jobdetailsholder">

                            <div class="wt-freelancerholder">

                                @if(!empty($completed_jobs) && $completed_jobs->count() > 0 )

                                    <div class="wt-managejobcontent wt-verticalscrollbar mCustomScrollbar _mCS_1">

                                        @foreach ($completed_jobs as $job_id)

                                            @php

                                                $job = \App\Job::where('id', $job_id->job_id)->first();

                                                $duration  =  \App\Helper::getJobDurationList($job->duration);

                                                $user_name = $job->employer->first_name.' '.$job->employer->last_name;

                                                $verified_user = \App\User::select('user_verified')->where('id', $job->employer->id)->pluck('user_verified')->first();

                                                $project_type  = Helper::getProjectTypeList($job->project_type);

                                            @endphp

                                            <div class="wt-userlistinghold wt-featured wt-userlistingvtwo">

                                                @if (!empty($job->is_featured) && $job->is_featured === 'true')

                                                    <span class="wt-featuredtag"><img src="{{{ asset('images/featured.png') }}}" alt="{{ trans('lang.is_featured') }}" data-tipso="Plus Member" class="template-content tipso_style"></span>

                                                @endif

                                                <div class="wt-userlistingcontent wt-userlistingcontentvtwo">

                                                    <div class="wt-contenthead">

                                                        @if (!empty($user_name) || !empty($job->title) )

                                                            <div class="wt-title">

                                                                @if (!empty($user_name))

                                                                <a href="{{{ url('profile/'.$job->employer->slug) }}}">@if($verified_user === 1)<i class="material-symbols-outlined">verified</i>@endif&nbsp;{{{ $user_name }}}</a>

                                                                @endif

                                                                @if (!empty($job->title))

                                                                    <h2>{{{ $job->title }}}</h2>

                                                                @endif

                                                            </div>

                                                        @endif

                                                        @if (!empty($job->price) ||

                                                            !empty($location['title'])  ||

                                                            !empty($job->project_type) ||

                                                            !empty($job->duration)

                                                            )

                                                            <ul class="wt-saveitem-breadcrumb wt-userlisting-breadcrumb">

                                                                @if (!empty($job->price))

                                                                    <li><span class="wt-dashboraddoller"><i>{{ !empty($symbol) ? $symbol['symbol'] : '$' }}</i> {{{ $job->price }}}</span></li>

                                                                @endif

                                                                @if (!empty($job->location->title))

                                                                    <li><span><img src="{{{asset(App\Helper::getLocationFlag($job->location->flag))}}}" alt="{{{ trans('lang.locations') }}}"> {{{ $job->location->title }}}</span></li>

                                                                @endif

                                                                @if (!empty($job->project_type))

                                                                    <li><a href="javascript:void(0);" class="wt-clicksavefolder"><img class="wt-job-icon" src="{{asset('images/job-icons/job-type.png')}}"> {{ trans('lang.type') }} {{{ $project_type }}}</a></li>

                                                                @endif

                                                                @if (!empty($job->duration) && !is_array($duration))

                                                                    <li><span class="wt-dashboradclock"><img class="wt-job-icon" src="{{asset('images/job-icons/job-duration.png')}}"> {{ trans('lang.duration') }} {{{ $duration }}}</span></li>

                                                                @endif

                                                            </ul>

                                                        @endif

                                                    </div>

                                                    <div class="wt-rightarea">

                                                        <div class="wt-btnarea">

                                                            <span> {{ trans('lang.project_completed') }}</span>

                                                            <a href="{{{ url('freelancer/job/'.$job->slug) }}}" class="wt-btn">{{ trans('lang.view_detail') }}</a>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        @endforeach

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

                        @if ( method_exists($completed_jobs,'links') )

                            {{ $completed_jobs->links('pagination.custom') }}

                        @endif

                    </div>
                

        </div>
    </div>

@endsection

