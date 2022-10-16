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
	.wt-userlisting-breadcrumb li span, .wt-userlisting-breadcrumb li a{
		font-size: 1rem;
	}
	.wt-contenthead .wt-title h2 {
    width: auto;
}
.wt-userlistingvtwo {
    padding: 30px;
    background: #fafafa;
}
</style>

	<div class="wt-haslayout wt-dbsectionspace la-manage-jobs-holder">

		<div class="manage-jobs" id="manageJob">

			<div class="row justify-content-center">

				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 wt-insightsitemholder">

							<div class="wt-dashboardbox">

						{{-- <div class="wt-dashboardboxtitle"> --}}
						<div class="border-bottom">

							<h2>{{ trans('lang.manage_job') }}</h2>

						</div>

						<div class="wt-dashboardboxcontent wt-jobdetailsholder">

							@if (!empty($job_details) && $job_details->count() > 0)

								<div class="wt-freelancerholder">

									<div class="wt-tabscontenttitle">

										<h2>{{ trans('lang.posted_jobs') }}</h2>

									</div>

									<div class="row">

										@foreach ($job_details as $job)

										<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 float-left">

											@if (file_exists(resource_path('views/extend/front-end/jobs/sidebar/wt-sharejob-widget.blade.php')))
				
												@include('extend.front-end.jobs.sidebar.wt-sharejob-widget')
									
											@else
										
												@include('front-end.jobs.sidebar.wt-sharejob-widget')
										
											@endif
				
										</div> 

											<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 col-xl-7 mb-5">
												
															@php

																$image = '';

																$duration  =  \App\Helper::getJobDurationList($job->duration);

																$user_name = $job->employer->first_name.' '.$job->employer->last_name;

																$proposals = \App\Proposal::where('job_id', $job->id)->where('status', '!=', 'cancelled')->get();

																$employer_img = \App\Profile::select('avater')->where('user_id', $job->employer->id)->first();

																$image = !empty($employer_img->avater) ? '/uploads/users/'.$job->employer->id.'/'.$employer_img->avater : '';

																$verified_user = \App\User::select('user_verified')->where('id', $job->employer->id)->pluck('user_verified')->first();

																$project_type  = Helper::getProjectTypeList($job->project_type);

															@endphp
															
															<div class="card">
																
																<div class="wt-managejobcontent">

															<div class="wt-userlistinghold wt-featured wt-userlistingvtwo bg-transparent pt-0">

																@if (!empty($job->is_featured) && $job->is_featured === 'true')

																	<span class="wt-featuredtag"><img src="{{{ asset('images/featured.png') }}}" alt="{{ trans('lang.is_featured') }}" data-tipso="Plus Member" class="template-content tipso_style"></span>

																@endif

																<div class="row">

																	<div class="col-9">

																		<div class="wt-contenthead">
																			
																			@if (!empty($user_name) || !empty($job->title) )

																				<div class="wt-title">

																					@if (!empty($user_name))

																						<a href="{{{ url('profile/'.$job->employer->slug) }}}">

																						@if ($verified_user === 1)

																							<i class="material-symbols-outlined">verified</i>

																						@endif

																						{{{ $user_name }}}</a>

																					@endif

																					<p><small>{{ trans('lang.member_since') }}: {{ Helper::getUserMemberSince($job->employer->id) }}</small></p>

																					@if (!empty($job->title))

																						<h2><a href="{{{ url('job/'.$job->slug) }}}">{{{ $job->title }}}</a></h2>

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
																					
																						{{-- <li>
																							<span class="wt-dashboraddoller">
																								<i>{{ !empty($symbol) ? $symbol['symbol'] : '$' }}</i>
																								<i class="text-muted ti-money"></i>
																								{{{ $job->price }}}
																							</span>
																						</li> --}}

																					@endif

																					@if (!empty($job->location->title))

																						<li>
																							<span class="d-flex align-items-center">
																							{{-- <img src="{{{asset(Helper::getLocationFlag($job->location->flag))}}}" alt="{{ trans('lang.img') }}"> --}}
																							<i class="material-symbols-outlined">place</i>
																							<small>{{{ $job->location->title }}}</small>
																							</span>
																						</li>

																					@endif

																					@if (!empty($job->project_type))

																					{{-- <li><a href="javascript:void(0);" class="wt-clicksavefolder"><img class="wt-job-icon" src="{{asset('images/job-icons/job-type.png')}}"> {{{ trans('lang.type') }}} {{{ $project_type }}}</a></li> --}}

																					@endif

																					@if (!empty($job->duration)  && !is_array($duration))

																						<li>
																							<span class="wt-dashboradclock d-flex align-items-center">
																								{{-- <img class="wt-job-icon" src="{{asset('images/job-icons/job-duration.png')}}"> --}}
																								<i class="material-symbols-outlined">date_range</i>
																								{{-- {{ trans('lang.duration') }} --}}
																								<small>{{{ $duration }}}</small>
																							</span>
																						</li>

																					@endif

																				</ul>

																			@endif

																		</div>

																	</div>

																	<div class="col-3">

																		@foreach ($job->categories as $cat)
																			<span class="float-right text-muted pt-3">{{ $cat->title }}</span>    
																		@endforeach

																		<span class="float-right pt-5">{!! QrCode::size(100)->generate(Request::url('job/'.$job->slug)); !!}</span>
																	</div>

																</div>

																<div class="wt-rightarea">

																	<div class="wt-btnarea">

																		<a href="{{{ url('job/'.$job->slug) }}}" class="btn btn-outline-dark lift mr-3 mb-3">{{ trans('lang.view_detail') }}</a>

																		<a href="{{{ url('job/edit-job/'.$job->slug) }}}" class="btn btn-outline-dark lift mr-3 mb-3">{{ trans('lang.edit_job') }}</a>

																		@if ($proposals->count() > 0)

																			<a href="{{{ url('employer/dashboard/job/'.$job->slug.'/proposals') }}}" class="btn btn-outline-dark lift mb-3">{{ trans('lang.view_proposals') }}</a>

																		@endif

																	</div>

																	{{-- <div class="wt-hireduserstatus">

																		<h4>{{{ $proposals->count() }}}</h4><span>{{ trans('lang.proposals') }}</span>

																		@if ($proposals->count() > 0)

																			<ul class="wt-hireduserimgs">

																				@foreach ($proposals as $proposal)

																					@php

																						$profile = \App\User::find($proposal->freelancer_id)->profile;

																						$user_image = !empty($profile) ? $profile->avater : '';

																						$profile_image = !empty($user_image) ? '/uploads/users/'.$proposal->freelancer_id.'/'.$user_image : 'images/user-login.png';

																					@endphp

																					<li><figure><img src="{{{ asset($profile_image) }}}" alt="{{ trans('lang.profile_img') }}" class="mCS_img_loaded"></figure></li>

																				@endforeach

																			</ul>

																		@endif

																	</div> --}}

																	<div class="text-right">
																		<button @click="deleteProject('{{ $job->id }}')" class="text-danger bg-transparent">Löschen</button>
																		@if($job->status == 'hired')
																		<button @click="completeJob('{{ $job->id }}')" class="text-success"><i class="material-symbols-outlined"></i>check_circle</button>	
																		@endif
																	</div>

																</div>

															</div>

														</div>

													</div>

											</div>

											<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 float-left">

												<aside id="wt-sidebar" class="wt-sidebar">



													<div class="wt-proposalsr d-flex flex-column">
												
														<div class="wt-proposalsrcontent">
												
															<span class="wt-proposalsicon">

																<i class="material-symbols-outlined">keyboard_double_arrow_down</i>

																<i class="material-symbols-outlined fa-1x">attach_money</i>

															</span>
												
															<div class="wt-title">
												
																<h3>{{ !empty($symbol['symbol']) ? $symbol['symbol'] : '$' }} {{{ $job->price }}}</h3>
												
																<span>{{ trans('lang.client_budget') }}</span>
												
															</div>
												
														</div>
												
														@if (file_exists(resource_path('views/extend/front-end/jobs/sidebar/wt-jobproposals-widget.blade.php')))
												
															@include('extend.front-end.jobs.sidebar.wt-jobproposals-widget')
												
														@else
												
															@include('front-end.jobs.sidebar.wt-jobproposals-widget')
												
														@endif

													</div>
												
												</aside>
					
											</div>

										@endforeach

									</div>

								</div>

								@if (method_exists($job_details,'links'))

									{{ $job_details->links('pagination.custom') }}

								@endif

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

			</div>

		</div>

	</div>

@endsection
