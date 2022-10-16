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
    .btn-outline-dark {
    color: #343a40;
    background-color: transparent;
    background-image: none;
    border: 1px solid rgba(0,0,0,.085);
}
.btn-outline-dark:hover{
    border-color: rgba(118,109,244,.35) !important;
    background-color: transparent;
    color: #343a40;
}
</style>

    <section class="wt-haslayout wt-dbsectionspace">

        <div class="row wt-insightsitemholder">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-9" id="dashboard">
                
                        <div class="wt-dashboardbox wt-dashboardtabsholder wt-saveitemholder">

                            <div class="wt-dashboardtabs">

                                <ul class="wt-tabstitle nav navbar-nav">

                                    <li class="nav-item lift">

                                        <a class="active" data-toggle="tab" href="#wt-skills">{{ trans('lang.saved_jobs') }}</a>

                                    </li>

                                    <li class="nav-item lift"><a data-toggle="tab" href="#wt-education">{{ trans('lang.followed_companies') }}</a></li>

                                    <li class="nav-item lift"><a data-toggle="tab" href="#wt-awards">{{ trans('lang.liked_freelancers') }}</a></li>

                                </ul>

                            </div>

                            <div class="wt-tabscontent tab-content tab-savecontent">

                                <div class="wt-personalskillshold tab-pane active fade show" id="wt-skills">

                                    <div class="wt-yourdetails">

                                        <div class="wt-tabscontenttitle">

                                            <h2>{{ trans('lang.saved_jobs') }}</h2>

                                        </div>

                                        @if (!empty($saved_jobs))

                                            <div class="wt-dashboradsaveitem">

                                                @foreach($saved_jobs as $job_id)

                                                    @php

                                                        $job = \App\Job::where('id', $job_id)->first();

                                                        $duration  =  Helper::getJobDurationList($job->duration);

                                                        $user_name = $job->employer->first_name.' '.$job->employer->last_name;

                                                        $verified_user = \App\User::select('user_verified')

                                                            ->where('id', $job->employer->id)->pluck('user_verified')->first();

                                                        $project_type  = Helper::getProjectTypeList($job->project_type);

                                                    @endphp

                                                    <div class="wt-userlistinghold wt-featured wt-dashboradsaveditems">

                                                        @if (!empty($job->is_featured) && $job->is_featured === 'true')

                                                            <span class="wt-featuredtag"><img src="{{{ asset('images/featured.png') }}}" alt="{{ trans('lang.img') }}" data-tipso="Plus Member" class="template-content tipso_style"></span>

                                                        @endif

                                                        <div class="wt-userlistingcontent">

                                                            <div class="wt-contenthead wt-dashboardsavehead">

                                                                @if (!empty($user_name) || !empty($job->title) )

                                                                    <div class="wt-title">

                                                                        @if (!empty($user_name))

                                                                        <a href="{{{ url('profile/'.$job->employer->slug) }}}">@if($verified_user === 1)

                                                                            <i class="material-symbols-outlined">verified</i>@endif&nbsp;{{{ $user_name }}}</a>

                                                                        @endif

                                                                        @if (!empty($job->title))

                                                                            <h2><a href="{{ url('job/'.$job->slug) }}">{{{ $job->title }}}</a></h2>

                                                                        @endif

                                                                    </div>

                                                                @endif

                                                                @if (!empty($job->price) ||

                                                                    !empty($job->location->title)  ||

                                                                    !empty($job->project_type) ||

                                                                    !empty($job->duration)

                                                                    )

                                                                    <ul class="wt-saveitem-breadcrumb wt-userlisting-breadcrumb">

                                                                        @if (!empty($job->price))

                                                                            <li><span class="wt-dashboraddoller"><i>{{ !empty($symbol) ? $symbol['symbol'] : '$' }}</i> {{{ $job->price }}}</span></li>

                                                                        @endif

                                                                        @if (!empty($job->location->title))

                                                                            <li><span><img src="{{{asset(Helper::getLocationFlag($job->location->flag))}}}" alt="{{ trans('lang.img') }}"> {{{ $job->location->title }}}</span></li>

                                                                        @endif

                                                                        @if (!empty($job->project_type))

                                                                            <li><a href="javascript:void(0);" class="wt-clicksavefolder"><i class="far fa-folder"></i> {{ trans('lang.type') }} {{{ $project_type }}}</a></li>

                                                                        @endif

                                                                        @if (!empty($job->duration))

                                                                            <li><span class="wt-dashboradclock"><i class="far fa-clock"></i> {{ trans('lang.duration') }} {{{ $duration }}}</span></li>

                                                                        @endif

                                                                    </ul>

                                                                @endif

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

                                    @if ( method_exists($saved_jobs,'links') )

                                        {{ $saved_jobs->links('pagination.custom') }}

                                    @endif

                                </div>

                                <div class="wt-educationholder tab-pane fade" id="wt-education">

                                    <div class="wt-userexperience wt-followcompomy">

                                        <div class="wt-tabscontenttitle mb-2">

                                            <h2>{{ trans('lang.followed_companies') }}</h2>

                                            <hr>
                                        </div>

                                        @if (!empty($saved_employers))

                                            <div class="wt-focomponylist">

                                                @foreach ($saved_employers as $employer)

                                                    @php

                                                        $emp = \App\User::find($employer);

                                                        $profile = \App\User::find($employer)->profile;

                                                        $user_image = !empty($profile) ? $profile->avater : '';

                                                        $profile_image = !empty($user_image) ? '/uploads/users/'.$employer.'/'.$user_image : 'images/user-login.png';

                                                        $user_name = Helper::getUserName($employer);

                                                        $verified_user = \App\User::select('user_verified')->where('id', $emp->id)->pluck('user_verified')->first();

                                                    @endphp
                                            
                                                            <div class="wt-followedcompnies">

                                                                <div class="wt-userlistinghold wt-userlistingsingle d-flex pb-0">
        
                                                                    <figure class="wt-userlistingimg">
        
                                                                        <img src="{{{ asset($profile_image) }}}" alt="image description">
        
                                                                    </figure>
        
                                                                    <div class="wt-userlistingcontent pt-0">
        
                                                                        <div class="wt-contenthead wt-followcomhead">
        
                                                                            <div class="wt-title mt-0">
        
                                                                                <a href="{{{ url('profile/'.$emp->slug) }}}">
        
                                                                                    @if($verified_user === 1)
        
                                                                                    <i class="material-symbols-outlined">verified</i> {{ trans('lang.verified_company') }}</a>
        
                                                                                    @endif
        
                                                                                <h3><a href="{{ url('profile/'.$emp->slug) }}">{{{ $user_name }}}</a></h3>
        
                                                                            </div>
        
                                                                        </div>
        
                                                                    </div>
        
                                                                </div>

                                                                {{-- <div class="row justify-content-center">

                                                                    <ul class="wt-followcompomy-breadcrumb wt-userlisting-breadcrumb pb-5 pr-3">
    
                                                                        <li><a class="btn btn-outline-dark shadow-none lift" href="{{{ url('profile/'.$emp->slug) }}}"> {{ trans('lang.open_jobs') }}  </a></li>

                                                                        <li><a class="btn btn-outline-dark shadow-none lift" href="{{{ url('profile/'.$emp->slug) }}}"> {{ trans('lang.full_profile') }}</a></li>

                                                                        <li>
                                                                            wt-savefollow
                                                                            <a href="javascript:void(0);" class="btn btn-outline-dark shadow-none lift"> {{ trans('lang.following') }}</a>
                                                                        </li>

                                                                    </ul>
                                                                    
                                                                </div> --}}
        
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

                                    @if ( method_exists($saved_employers,'links') )

                                        {{ $saved_employers->links('pagination.custom') }}

                                    @endif

                                </div>

                                <div class="wt-awardsholder tab-pane fade" id="wt-awards">

                                    <div class="wt-addprojectsholder wt-likefreelan la-likefreelanfav">

                                        <div class="wt-tabscontenttitle">

                                            <h2>{{ trans('lang.liked_freelancers') }}</h2>

                                        </div>

                                        @if (!empty($saved_freelancers))

                                        <div class="wt-likedfreelancers wt-haslayout">

                                            @foreach ($saved_freelancers as $key => $freelancer)

                                                @php

                                                    $user = \App\User::find($freelancer);

                                                    $profile = \App\User::find($freelancer)->profile;

                                                    $rating = !empty($profile->rating) ? $profile->rating : 0;

                                                    $user_image = !empty($profile) ? $profile->avater : '';

                                                    $profile_image = !empty($user_image) ? '/uploads/users/'.$freelancer.'/'.$user_image : 'images/user.jpg';

                                                    $user_name = Helper::getUserName($freelancer);

                                                    $reviews = \App\Review::where('receiver_id', $freelancer)->count();

                                                    $proposal = \App\Proposal::select('job_id')->where('freelancer_id', $user->id)->pluck('job_id')->first();

                                                    $employer_id = !empty($proposal) ? \App\Job::select('user_id')->where('id', $proposal)->pluck('user_id')->first() : '';

                                                    $job = !empty($employer_id) ? \App\Job::where('user_id', $employer_id)->first() : '';

                                                    $featured_class = (!empty($job) && $job->is_featured == 'true') ? 'wt-featured' : '';

                                                    $verified_user = \App\User::select('user_verified')->where('id', $freelancer)->pluck('user_verified')->first();

                                                    $avg_rating = \App\Review::where('receiver_id', $user->id)->sum('avg_rating');

                                                    $user_rating  = $avg_rating != 0 ? round($avg_rating/\App\Review::count()) : 0;

                                                    $user_reviews = \App\Review::where('receiver_id', $user->id)->get();

                                                    $stars  = $user_reviews->sum('avg_rating') != 0 ? $user_reviews->sum('avg_rating')/20*100 : 0;

                                                @endphp

                                                <div class="wt-userlistinghold {{$featured_class}}">

                                                    @if ( !empty($job->is_featured) && $job->is_featured == 'true')

                                                        <span class="wt-featuredtag"><img src="{{{ asset('images/featured.png') }}}" alt="{{{ trans('ph.is_featured') }}}" data-tipso="Plus Member" class="template-content tipso_style"></span>

                                                    @endif

                                                    <figure class="wt-userlistingimg">

                                                        <img src="{{{ asset($profile_image) }}}" alt="{{ trans('lang.profile_img') }}">

                                                    </figure>

                                                    <div class="wt-userlistingcontent">

                                                        <div class="wt-contenthead">

                                                            <div class="wt-title">

                                                                <a href="{{{ url('profile/'.$user->slug) }}}">

                                                                    @if($verified_user === 1) <i class="material-symbols-outlined">verified</i> @endif

                                                                    {{{ $user_name }}}</a>

                                                                <h2><a href="{{ url('profile/'.$user->slug) }}">{{{ $profile->tagline }}}</a></h2>

                                                            </div>

                                                            <ul class="wt-userlisting-breadcrumb">

                                                                @if (!empty($profile->hourly_rate))

                                                                    <li><span><i class="far fa-money-bill-alt"></i>

                                                                        {{ !empty($symbol) ? $symbol['symbol'] : '$' }}{{{ $profile->hourly_rate }}} {{ trans('lang.per_hour') }}</span>

                                                                    </li>

                                                                @endif

                                                                <li><span><img src="{{{asset(Helper::getLocationFlag($user->location->flag))}}}" alt="{{{ trans('lang.locations') }}}"> {{{ $user->location->title }}}</span></li>

                                                                <li class="wt-btndisbaled"><a href="javascript:void(0);" class="wt-clicksave"><i class="fa fa-heart"></i> Saved</a></li>

                                                            </ul>

                                                        </div>

                                                        <div class="wt-rightarea">

                                                            <span class="wt-stars"><span style="width: {{ $stars }}%;"></span></span>

                                                            <span class="wt-starcontent">{{{ $rating }}}/<sub>5</sub> <em>({{{ $reviews }}} {{ trans('lang.feedbacks') }})</em></span>

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

                                    @if ( method_exists($saved_freelancers,'links') )

                                        {{ $saved_freelancers->links('pagination.custom') }}

                                    @endif

                                </div>

                            </div>

                        </div>
                    

            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">

                <aside id="wt-sidebar" class="wt-sidebar wt-dashboardsave">

                    <div class="card-hover card mb-3">
                        <div class="card-body">
                            <div class="wt-proposalsr">

                                <div class="wt-proposalsrcontent">

                                    <figure>

                                        {{ Helper::getImages('images','save-1.png', 'graduation-hat') }}

                                    </figure>

                                    <div class="wt-title">

                                        <h3>{{{ count($saved_jobs) }}}</h3>

                                        <span>{{ trans('lang.jobs_you_saved') }}</span>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card card-hover mb-3">
                        <div class="card-body">
                            <div class="wt-proposalsr">

                                <div class="wt-proposalsrcontent wt-componyfolow">

                                    <figure>

                                        {{ Helper::getImages('images','save-2.png', 'apartment') }}

                                    </figure>

                                    <div class="wt-title">

                                        <h3>{{{ count($saved_employers) }}}</h3>

                                        <span>{{ trans('lang.compnies_followed') }}</span>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card card-hover mb-3">
                        <div class="card-body">
                            <div class="wt-proposalsr">

                                <div class="wt-proposalsrcontent  wt-freelancelike">

                                    <figure>

                                        {{ Helper::getImages('images','save-3.png', 'users') }}

                                    </figure>

                                    <div class="wt-title">

                                        <h3>{{{ count($saved_freelancers) }}}</h3>

                                        <span>{{ trans('lang.freelancers_liked') }}</span>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                </aside>

            </div>

        </div>

    </section>

@endsection

