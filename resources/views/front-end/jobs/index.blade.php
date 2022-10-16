
@php
    use App\Profile;
    $savedJobs = Profile::where("user_id",auth()->user()->id)->first()->saved_jobs;
    $savedJobs = unserialize($savedJobs);
@endphp

@extends(file_exists(resource_path('views/extend/front-end/master.blade.php')) ? 

'extend.front-end.master':

 'front-end.master', ['body_class' => 'wt-innerbgcolor'] )

@section('title'){{ $job_list_meta_title }} @stop

@section('description', $job_list_meta_desc)

@section('content')
    {{-- New codes ## --}}

    {{-- Breadcumb --}}
    @if (Session::has('payment_message'))

        @php $response = Session::get('payment_message') @endphp
        <div class="flash_msg">

            <flash_messages :message_class="'{{{$response['code']}}}'" :time ='5' :message="'{{{ $response['message'] }}}'" v-cloak></flash_messages>

        </div>
    @endif
    <section class="page-title">
        <div class="container">
            <div class="title-outer">
                <h1 class="goodkitH1">Aufträge Entdecken</h1>
                <ul class="page-breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li>Jobs</li>
                </ul> 
            </div>
        </div>

        {{-- Back to top button --}}
        {{-- <a class="btn-scroll-top show" href="#top" data-scroll="" data-fixed-element="">
            <span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span>
            <i class="btn-scroll-top-icon ai-arrow-up">   </i>
        </a> --}}
    </section>


    {{-- <section class="ls-section">
        <div class="auto-container">
            <div class="row">

                <!-- Filters Column -->
                @if (file_exists(resource_path('views/extend/front-end/jobs/filters.blade.php'))) 

                    @include('extend.front-end.jobs.filters')

                @else 

                    @include('front-end.jobs.filters')

                @endif
                
                <!-- Content Column -->
                <div class="content-column col-lg-8 col-md-12 col-sm-12">
                    @if (!empty($keyword))
                        <div class="mb-3"><span>{{ trans('lang.01') }} {{$jobs->count()}} of {{$Jobs_total_records}} results for <em>"{{{$keyword}}}"</em></span></div>
                    @endif

                    <div class="ls-outer">

                        @if (!empty($jobs) && $jobs->count() > 0)

                                @foreach ($jobs as $job)

                                    @php

                                        $job = \App\Job::find($job->id);

                                        //$description = strip_tags(stripslashes($job->description));

                                        $description = strip_tags(stripslashes($job->description));

                                        $featured_class = $job->is_featured == 'true' ? 'wt-featured' : '';

                                        $user = Auth::user() ? \App\User::find(Auth::user()->id) : '';

                                        $project_type  = Helper::getProjectTypeList($job->project_type);

                                    @endphp

                                    <!-- Job Block -->
                                    <div class="job-block {{$featured_class}}">
                                        
                                        @if ($job->is_featured == 'true')
                                            <span class="wt-featuredtag"><img src="images/featured.png" alt="{{{ trans('ph.is_featured') }}}" data-tipso="Plus Member" class="template-content tipso_style"></span>
                                        @endif

                                        <div class="inner-box">
                                            <div class="content">
                                                <span class="company-logo mt-3"><img src="https://creativelayers.net/themes/superio/images/resource/company-logo/1-2.png" alt=""></span>

                                                @if (!empty($job->employer->slug))
                                                    <a href="{{ url('profile/'.$job->employer->slug) }}"><i class="fa fa-check-circle"></i> {{{ Helper::getUserName($job->employer->id) }}}</a>
                                                @endif

                                                <h4 class="mt-3"><a href="{{ url('job/'.$job->slug) }}">{{{$job->title}}}</a></h4>
                                                <p>{{ str_limit(html_entity_decode($description), 200) }}</p>
                                                <ul class="job-info">
                                                    <li><span class="icon flaticon-briefcase"></span> Segment</li>
                                                    <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                                                    <li><span class="icon flaticon-clock-3"></span> 11 hours ago</li>
                                                    <li><span class="icon flaticon-money"></span> $35k - $45k</li>
                                                </ul>
                                                <ul class="job-other-info">

                                                    @if (!empty($job->project_level))

                                                        <li class="privacy"><i class="fas fa-dollar-sign"></i>{{{Helper::getProjectLevel($job->project_level)}}}</li>

                                                    @endif

                                                    @if (!empty($job->location->title))

                                                        <li class="time"><i class="fas fa-map-marker-alt"></i> {{{ $job->location->title }}}</li>

                                                    @endif

                                                    <li class="privacy"><i class="far fa-folder"></i> {{{ trans('lang.type') }}} {{{$project_type}}}</li>

                                                    <li class="required"><i class="far fa-clock"></i> {{{ Helper::getJobDurationList($job->duration)}}}</li>

                                                    <li class="tag"><i class="fas fa-tag"></i> {{{ trans('lang.job_id') }}} {{{$job->code}}}</li>
                                                    
                                                </ul>
                                                
                                                @if (!empty($user->profile->saved_jobs) && in_array($job->id, unserialize($user->profile->saved_jobs)))

                                                    <button style="pointer-events: none" class="bookmark-btn"><span class="fas fa-heart text-danger"></span></button>

                                                @else

                                                    <button class="bookmark-btn" id="job-{{$job->id}}" @click.prevent="add_wishlist('job-{{$job->id}}', {{$job->id}}, 'saved_jobs', '{{trans("lang.saved")}}')" v-cloak><span class="far fa-heart"></span></button>

                                                @endif

                                            </div>
                                        </div>
                                    </div>

                                @endforeach

                                @if ( method_exists($jobs,'links') )

                                    {{ $jobs->links('pagination.custom') }}

                                @endif

                            @else

                                @if (file_exists(resource_path('views/extend/errors/no-record.blade.php'))) 

                                    @include('extend.errors.no-record')

                                @else 

                                    @include('errors.no-record')

                                @endif

                            @endif




                        <!-- Listing Show More -->
                        <div class="ls-show-more">
                            <p>Showing 36 of 497 Jobs</p>
                            <div class="bar"><span class="bar-inner" style="width: 40%"></span></div>
                            <button class="show-more">Show More</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section id="jobFilter" class="ls-section">
        <jobfilter-section 
        :categories="{{ json_encode($categories) }}"
        :locations="{{ json_encode($locations) }}"
        :skills="{{ json_encode($skills) }}"
        :project_length="{{ json_encode($project_length) }}"
        :jobs="{{ json_encode($jobs) }}"
        :my_saved_jobs="{{ json_encode($saved_jobs) }}"
        ></jobfilter-section>
    </section>
    
    {{-- End --}}

    @endsection

