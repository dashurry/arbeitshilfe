<div class="wt-widget la-empinfo-holder wt-user-service card">

    {{-- <div class="wt-companysdetails"> --}}
    <div>

        {{-- <figure class="wt-companysimg">

            <img src="{{{ asset(Helper::getUserProfileBanner($seller->id, 'small')) }}}" alt="{{ trans('lang.profile_img') }}">

        </figure> --}}

        <div class="wt-companysinfo">

            <figure class="mt-5">
                <img src="{{{asset(Helper::getProfileImage($seller->id))}}}" alt="{{ trans('lang.profile_img') }}">
            </figure>

            <div class="wt-userprofile p-0">

                <div class="wt-title">

                    <h3>			

                        <a href="{{{ url('profile/'.$seller->slug) }}}" class="d-flex align-items-center justify-content-center">

                            @if ($seller->user_verified === 1) <i class="material-symbols-outlined">verified</i> @endif &nbsp;{{{ Helper::getUserName($seller->id) }}}

                        </a>

                    </h3>

                    {{ trans('lang.member_since') }}&nbsp;{{  \Carbon\Carbon::parse($seller->created_at)->format('Y-m-d') }}	<a href="javascript:;">@ {{$seller->slug}}</a> 

                    {{-- <a href="{{{ url('profile/'.$seller->slug) }}}" class="wt-btn">View Profile</a> --}}

                </div>

                <div>
                    <a href="{{{ url('profile/'.$seller->slug) }}}" class="btn btn-success mb-4 lift shadow-none">View Profile</a>
                </div>

            </div>

        </div>

    </div>

</div>

