@extends(file_exists(resource_path('views/extend/front-end/master.blade.php')) ?

'extend.front-end.master':

 'front-end.master', ['body_class' => 'wt-innerbgcolor'] )

@section('title'){{ $job->title }} @stop

@section('description', "$job->description")

@section('content')

<style>
.wt-userlisting-breadcrumb li + li {
    border-left: 1px solid #767676;
}

</style>

    @php $breadcrumbs = Breadcrumbs::generate('jobDetail',$job->slug); @endphp

    {{-- @if (file_exists(resource_path('views/extend/front-end/includes/inner-banner.blade.php')))

        @include('extend.front-end.includes.inner-banner', 

            ['title' => trans('lang.job_detail'), 'inner_banner' => $job_inner_banner, 'show_banner' => 'true' ]

        )

    @else 

        @include('front-end.includes.inner-banner', 

            ['title' =>  trans('lang.job_detail'), 'inner_banner' => $job_inner_banner, 'show_banner' => 'true' ]

        )

    @endif --}}

    <div class="pt-10" id="jobs">

        <div class="container-fluid">

            <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 float-left">
                </div>

                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 col-xl-7">
                    <h1>Auftrag</h1>
                </div>

                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 float-left">
                </div>
            </div>

            <div class="row">

                {{-- <div class="job-single wt-haslayout">

                    <div id="jobs" class="wt-twocolumns wt-haslayout">

                        @if (Session::has('error'))

                            <div class="flash_msg">

                                <flash_messages :message_class="'danger'" :time='5' :message="'{{{ Session::get('error') }}}'" v-cloak></flash_messages>

                            </div>

                        @endif --}}

                        @if (!empty($job))

                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 float-left">

                            @if (file_exists(resource_path('views/extend/front-end/jobs/sidebar/wt-sharejob-widget.blade.php')))

                                @include('extend.front-end.jobs.sidebar.wt-sharejob-widget')
                    
                            @else
                        
                                @include('front-end.jobs.sidebar.wt-sharejob-widget')
                        
                            @endif

                        </div>    
                        

                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <div class="card">
                                    <div class="card-body">

                                        @if (!empty($job->is_featured) && $job->is_featured === 'true')

                                            <span class="wt-featuredtag"><img src="{{{ asset('images/featured.png') }}}" alt="{{ trans('lang.img') }}" data-tipso="Plus Member" class="template-content tipso_style"></span>

                                        @endif

                                        @if (

                                            !empty($job->professional_level) ||

                                            !empty($job->title) ||

                                            !empty($location['title'])  ||

                                            !empty($job->project_type) ||

                                            !empty($job->duration)

                                            )

                                            <div class="wt-proposalhead">

                                                
                                                @if (!empty($job->title))
                                                
                                                    @foreach ($job_cats as $cat)
                                                    <span class="float-right text-muted">{{ $cat->title }}</span>    
                                                    @endforeach
                                                    

                                                    <h1>{{{ $job->title }}}</h1>

                                                @endif

                                                @if (

                                                    !empty($job->professional_level) ||

                                                    !empty($location['title'])  ||

                                                    !empty($job->price) ||

                                                    !empty($job->duration)

                                                    )
                                                    <hr class="mt-5">
                                                        <ul class="wt-userlisting-breadcrumb wt-userlisting-breadcrumbvtwo mt-4 mb-4">

                                                            @if (!empty($job->project_level))

                                                                <li>

                                                                    <span>

                                                                        <img class="wt-job-icon" src="{{asset('images/job-icons/job-level.png')}}">

                                                                        {{{Helper::getProjectLevel($job->project_level)}}}

                                                                    </span>

                                                                </li>

                                                            @endif

                                                            @if (!empty($job->location->title))

                                                                <li>
                                                                    <span class="d-flex align-items-center">
                                                                    {{-- <img src="{{{asset(Helper::getLocationFlag($job->location->flag))}}}" alt="{{ trans('lang.img') }}"> --}}
                                                                    <i class="material-symbols-outlined">home_pin</i>
                                                                    <small>{{{ $job->location->title }}}</small>
                                                                    </span>
                                                                </li>

                                                            @endif

                                                            {{-- @if (!empty($job->project_type))

                                                                <li><span class="wt-clicksavefolder"><img class="wt-job-icon" src="{{asset('images/job-icons/job-type.png')}}"> {{ trans('lang.type') }} {{{$project_type}}}</span></li>

                                                            @endif --}}

                                                            @if (!empty($job->duration))

                                                                <li>
                                                                    <span class="wt-dashboradclock d-flex align-items-center">
                                                                        <i class="material-symbols-outlined">schedule</i>
                                                                    {{-- <img class="wt-job-icon" src="{{asset('images/job-icons/job-duration.png')}}"> --}}
                                                                    <small>{{ trans('lang.duration') }} {{{ Helper::getJobDurationList($job->duration) }}}</small>
                                                                    </span>
                                                                </li>

                                                            @endif

                                                            {{-- @if (!empty($job->price))

                                                                <li>
                                                                    <span>
                                                                        Preis: 
                                                                        <i class="wt-budget">{{ !empty($symbol['symbol']) ? $symbol['symbol'] : '$' }}</i> 
                                                                        {{{ $job->price }}}
                                                                    </span>
                                                                </li>

                                                            @endif --}}

                                                        </ul>
                                                    <hr class="mb-2">

                                                @endif

                                            </div>

                                        @endif
                                        
                                        @auth
                                        <div class="mt-4">
                                            @php
                                                $nameColor = new \App\NameThumbColor();
                                                
                                                $user = !empty(Auth::user()) ? Auth::user() : '';
                            
                                                $role = !empty($user) ? $user->getRoleNames()->first() : array();
                            
                                                $user_image = !empty($profile) ? $profile->avater : '';
                            
                                                $employer_job = \App\Job::select('status')->where('user_id', Auth::user()->id)->first();
                            
                                                $profile_image = !empty($user_image) ? '/uploads/users/'.$user->id.'/'.$user_image : 'images/user-login.png';
                            
                                                $payment_settings = \App\SiteManagement::getMetaValue('commision');
                            
                                                $payment_module = !empty($payment_settings) && !empty($payment_settings[0]['enable_packages']) ? $payment_settings[0]['enable_packages'] : 'true';
                            
                                                $employer_payment_module = !empty($payment_settings) && !empty($payment_settings[0]['employer_package']) ? $payment_settings[0]['employer_package'] : 'true';
                            
                                            @endphp

                                            @if($profile->avater != "")
                                                <figure class="wt-userimg">
                        
                                                    <img src="{{{ asset(Helper::getImageWithSize('uploads/users/'.$profile->user_id, $profile->avater, 'listing')) }}}" alt="{{ trans('lang.profile_photo') }}">
                        
                                                </figure>
                                            @else
                                            {{-- If no avatar get Name initials --}}
                                                <figure class="wt-userimg">
                                                    <div class="name-thumb-sm" style="background-color: {{ $nameColor->getColor(ucfirst(substr(Auth::user()->first_name,0,1))) }} !important">
                                                        {{ ucfirst(substr(\App\User::find($job->employer->id)->first_name,0,1)). ucfirst(substr(\App\User::find($job->employer->id)->last_name,0,1)) }}
                                                    </div>
                                                </figure>
                                            @endif

                                            <div class="wt-username">

                                                <h3>{{{ Helper::getUserName($job->employer->id) }}}</h3>
                                                
                                                <span class="mt-2">{{ trans('lang.member_since') }}: {{ Helper::getUserMemberSince($job->employer->id) }}</span>
                                                {{-- <span>{{{ !empty(Auth::user()->profile->tagline) ? str_limit(Auth::user()->profile->tagline, 26, '') : Helper::getAuthRoleName() }}}</span> --}}
                        
                                            </div>
                                        </div>
                                        @endauth

                                        <div class="wt-projectdetail-holder mt-5">

                                            @if (!empty($job->description))
        
                                                <div class="wt-projectdetail">
        
                                                    {{-- <div class="wt-title">
        
                                                        <h3>{{ trans('lang.project_detail') }}</h3>
        
                                                    </div> --}}
        
                                                    <div class="wt-description">
        
                                                        <p>
                                                            @php echo htmlspecialchars_decode(stripslashes($job->description)); @endphp
                                                        </p>
                                                    </div>
        
                                                </div>
        
                                            @endif
        
                                            @if (!empty($job->skills) && $job->skills->count() > 0)
        
                                                <div class="wt-skillsrequired">
        
                                                    <div class="wt-title">
        
                                                        <h3>{{ trans('lang.skills_req') }}</h3>
        
                                                    </div>
        
                                                    <div class="wt-tag wt-widgettag">
        
                                                        @foreach ($job->skills as $skill)
        
                                                            <a href="{{{url('search-results?type=job&skills%5B%5D='.$skill->slug)}}}">{{{ $skill->title }}}</a>
        
                                                        @endforeach
        
                                                    </div>
        
                                                </div>
        
                                            @endif
        
                                            @if (!empty($attachments) && $job->show_attachments === 'true' && !empty($job->employer))
        
                                                <div class="wt-attachments">
        
                                                    <div class="wt-title">
        
                                                        <h3>{{ trans('lang.attachments') }}</h3>
        
                                                    </div>
        
                                                    <ul class="wt-attachfile">
        
                                                        @foreach ($attachments as $attachment)
        
                                                            <li>
        
                                                                <span>{{{Helper::formateFileName($attachment)}}}</span>
        
                                                                <em>
        
                                                                    @if (Storage::disk('local')->exists('uploads/jobs/'.$job->employer->id.'/'.$attachment))
        
                                                                        {{ trans('lang.file_size') }} {{{Helper::bytesToHuman(Storage::size('uploads/jobs/'.$job->employer->id.'/'.$attachment))}}}
        
                                                                    @endif
        
                                                                    <a href="{{{route('getfile', ['type'=>'jobs','attachment'=>$attachment,'id'=>$job->user_id])}}}"><i class="lnr lnr-download"></i></a>
        
                                                                </em>
        
                                                            </li>
        
                                                        @endforeach
        
                                                    </ul>
        
                                                </div>
        
                                            @endif
        
                                        </div>

                                        <div class="btn d-flex justify-content-center">
                                            <a href="javascript:void(0);" @click.prevent="check_auth('{{{ url('job/proposal/'.$job->slug) }}}')" class="btn btn-primary lift shadow-none">{{{ trans('lang.send_propsal') }}}</a>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            {{-- Project Description --}}
                            {{-- <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-8 float-left">

                                <div class="wt-projectdetail-holder">

                                    @if (!empty($job->description))

                                        <div class="wt-projectdetail">

                                            <div class="wt-title">

                                                <h3>{{ trans('lang.project_detail') }}</h3>

                                            </div>

                                            <div class="wt-description">

                                                @php echo htmlspecialchars_decode(stripslashes($job->description)); @endphp

                                            </div>

                                        </div>

                                    @endif

                                    @if (!empty($job->skills) && $job->skills->count() > 0)

                                        <div class="wt-skillsrequired">

                                            <div class="wt-title">

                                                <h3>{{ trans('lang.skills_req') }}</h3>

                                            </div>

                                            <div class="wt-tag wt-widgettag">

                                                @foreach ($job->skills as $skill)

                                                    <a href="{{{url('search-results?type=job&skills%5B%5D='.$skill->slug)}}}">{{{ $skill->title }}}</a>

                                                @endforeach

                                            </div>

                                        </div>

                                    @endif

                                    @if (!empty($attachments) && $job->show_attachments === 'true' && !empty($job->employer))

                                        <div class="wt-attachments">

                                            <div class="wt-title">

                                                <h3>{{ trans('lang.attachments') }}</h3>

                                            </div>

                                            <ul class="wt-attachfile">

                                                @foreach ($attachments as $attachment)

                                                    <li>

                                                        <span>{{{Helper::formateFileName($attachment)}}}</span>

                                                        <em>

                                                            @if (Storage::disk('local')->exists('uploads/jobs/'.$job->employer->id.'/'.$attachment))

                                                                {{ trans('lang.file_size') }} {{{Helper::bytesToHuman(Storage::size('uploads/jobs/'.$job->employer->id.'/'.$attachment))}}}

                                                            @endif

                                                            <a href="{{{route('getfile', ['type'=>'jobs','attachment'=>$attachment,'id'=>$job->user_id])}}}"><i class="lnr lnr-download"></i></a>

                                                        </em>

                                                    </li>

                                                @endforeach

                                            </ul>

                                        </div>

                                    @endif

                                </div>

                            </div> --}}

                        @endif

                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 float-left">

                            @if (file_exists(resource_path('views/extend/front-end/jobs/sidebar/index.blade.php')))

                                @include('extend.front-end.jobs.sidebar.index')

                            @else

                                @include('front-end.jobs.sidebar.index')

                            @endif

                        </div>

                    {{-- </div>

                </div> --}}

            </div>

        </div>

    </div>

@endsection

@push('scripts')

    <script>

        var popupMeta = {

            width: 400,

            height: 400

        }

        $(document).on('click', '.social-share', function(event){

            event.preventDefault();



            var vPosition = Math.floor(($(window).width() - popupMeta.width) / 2),

                hPosition = Math.floor(($(window).height() - popupMeta.height) / 2);



            var url = $(this).attr('href');

            var popup = window.open(url, 'Social Share',

                'width='+popupMeta.width+',height='+popupMeta.height+

                ',left='+vPosition+',top='+hPosition+

                ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');



            if (popup) {

                popup.focus();

                return false;

            }

        })

    </script>

@endpush

