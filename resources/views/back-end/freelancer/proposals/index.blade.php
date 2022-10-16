@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')

@section('content')

<style>
.wt-main {
    background: #ffffff;
    margin-bottom: 0rem;
}
.wt-saveitem-breadcrumb li span, .wt-saveitem-breadcrumb li a{
    font-size: 16px;
}
.icon{
    font-size: 1.125rem;
}
</style>
    <div class="wt-haslayout wt-dbsectionspace">

        <div class="row justify-content-center">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 wt-insightsitemholder" id="proposals">

                        <div class="wt-dashboardbox">

                            {{-- <div class="wt-dashboardboxtitle border-0 pb-0"> --}}
                            <div class="border-0 pb-0 pl-5">

                                <h2>{{ trans('lang.all_proposals') }}</h2>

                            </div>

                            <div class="wt-dashboardboxcontent wt-jobdetailsholder">

                                <div class="wt-completejobholder">

                                    @if (!empty($proposals) && $proposals->count() > 0)

                                        <div class="wt-managejobcontent">

                                            @foreach ($proposals as $proposal)

                                                @php

                                                    $freelancer_proposal = \App\Proposal::find($proposal->id);

                                                    $duration = Helper::getJobDurationList($proposal->job->duration);

                                                    $status_btn = $proposal->status == 'cancelled' ? trans('lang.view_reason') : trans('lang.view_detail');

                                                    $detail_link = $proposal->status == 'hired' ? url('freelancer/job/'.$proposal->job->slug) : 'javascript:void(0);';

                                                    $user_name = Helper::getUserName($proposal->job->employer->id);

                                                @endphp

                                                <div class="wt-userlistinghold wt-featured wt-userlistingvtwo card shadow-none">

                                                    @if (!empty($proposal->job->is_featured) && $proposal->job->is_featured === 'true')

                                                        <span class="wt-featuredtag"><img src="{{{ asset('images/featured.png') }}}" alt="{{ trans('lang.is_featured') }}" data-tipso="Plus Member" class="template-content tipso_style"></span>

                                                    @endif

                                                    <div class="wt-userlistingcontent wt-userlistingcontentvtwo">

                                                        <div class="row">

                                                                <span class="company-logo mt-3 ml-2">
                                                                    <img src="https://creativelayers.net/themes/superio/images/resource/company-logo/1-2.png" alt="">
                                                                </span>

                                                            {{-- <div class="wt-contenthead col-9 ml-4"> --}}
                                                            <div class="col-7 ml-4">

                                                                @if (!empty($user_name) || !empty($proposal->job->title) )

                                                                    {{-- <div class="wt-title"> --}}
                                                                        <div class="mb-3">

                                                                        @if (!empty($user_name))

                                                                        <a class="d-flex align-items-center" href="{{{ url('profile/'.$proposal->job->employer->slug) }}}">

                                                                            @if ($proposal->job->employer->user_verified === 1)

                                                                            <i class="material-symbols-outlined">verified</i>

                                                                            @endif

                                                                            &nbsp;{{{ $user_name }}}</a>

                                                                        @endif

                                                                        @if (!empty($proposal->job->title))

                                                                            <h2>{{{ $proposal->job->title }}}</h2>

                                                                        @endif
                                                                        
                                                                    </div>

                                                                @endif





                                                                @if (!empty($proposal->job->price) ||

                                                                    !empty($location['title'])  ||

                                                                    !empty($proposal->job->project_type) ||

                                                                    !empty($proposal->job->duration)

                                                                    )

                                                                    <ul class="d-flex mb-3">

                                                                        <li class="d-flex align-items-center mr-3 text-muted"><i class="icon material-symbols-outlined mr-2">date_range</i> {{ $proposal->created_at->diffForHumans() }}</li>

                                                                        <li class="d-flex align-items-center text-muted"><i class="icon material-symbols-outlined mr-2">payments</i> {{ $proposal->job->price }} Fr</li>

                                                                    </ul>

                                                                    <ul class="job-other-info d-flex">

                                                                        <li class="time d-flex align-items-center"><i class="material-symbols-outlined">home_pin</i> {{ $proposal->job->location['title'] }}</li>

                                                                        <li class="required d-flex align-items-center"><i class="material-symbols-outlined">schedule</i> {{ $proposal->job->duration }}</li>

                                                                        <li class="tag d-flex align-items-center"><i class="material-symbols-outlined">fingerprint</i> @lang('lang.job_id') - {{ $proposal->job->code }}</li>

                                                                        @foreach ($proposal->job->categories as $cat)
                                                                        <li class="cat d-flex align-items-center"><i class="material-symbols-outlined">layers</i>{{ $cat->title }}</li>
                                                                        @endforeach

                                                                    </ul>

                                                                    

                                                                @endif

                                                            </div>

                                                            <div class="wt-rightarea la-pending-jobs col-3 border-left d-flex align-items-center">

                                                                <div class="wt-hireduserstatus">

                                                                    <h4>{{{ Helper::displayProposalStatus($proposal->status) }}}</h4>

                                                                    @if ( $proposal->status != 'pending' )

                                                                        <a href="{{{ url('freelancer/job/'.$proposal->job->slug) }}}" class="wt-btn">

                                                                            {{$status_btn}}

                                                                        </a>

                                                                    @endif

                                                                </div>

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

                            @if ( method_exists($proposals,'links') )

                                {{ $proposals->links('pagination.custom') }}

                            @endif

                        </div>

            </div>

        </div>

    </div>

@endsection

