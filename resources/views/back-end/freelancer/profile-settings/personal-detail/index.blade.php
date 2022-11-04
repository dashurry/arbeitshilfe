@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master') @section('content') 
  <div class="container">
    <div id="user_profile">
        {{-- Loader --}}
        <div class="preloader-section" v-if="loading" v-cloak>
            <div class="preloader-holder">
                <div class="loader"></div>
            </div>
        </div>
        {{-- Form --}} 
        {!! Form::open(['url' => '', 'id' => 'freelancer_profile', '@submit.prevent'=>'submitFreelancerProfile']) !!} 
        <div class="row justify-content-center">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
                @if (file_exists(resource_path('views/extend/back-end/freelancer/profile-settings/tabs.blade.php'))) 
                    @include('extend.back-end.freelancer.profile-settings.tabs') 
                @else 
                    @include('back-end.freelancer.profile-settings.tabs') 
                @endif 
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                {{-- Session Alert Message --}}
                @if (Session::has('message')) 
                    <div class="flash_msg">
                        <flash_messages :message_class="'success'" :time='5' :message="'{{{ Session::get('message') }}}'" v-cloak></flash_messages>
                    </div>
                @endif 
                @if ($errors->any()) 
                    <ul class="wt-jobalerts">
                        @foreach ($errors->all() as $error) 
                            <div class="flash_msg">
                                <flash_messages :message_class="'danger'" :time='10' :message="'{{{ $error }}}'" v-cloak></flash_messages>
                            </div>
                        @endforeach
                    </ul>
                @endif
                <div class="pt-5" id="wt-skills">
                {{-- Personal Details --}}
                <div class="mb-5"> 
                    @if (file_exists(resource_path('views/extend/back-end/freelancer/profile-settings/personal-detail/detail.blade.php'))) 
                        @include('extend.back-end.freelancer.profile-settings.personal-detail.detail') 
                    @else
                        @include('back-end.freelancer.profile-settings.personal-detail.detail')
                    @endif
                </div>
                {{-- Location + Map --}}
                <div class="mb-5">
                    @if (file_exists(resource_path('views/extend/back-end/freelancer/profile-settings/personal-detail/location.blade.php')))
                        @include('extend.back-end.freelancer.profile-settings.personal-detail.location')
                    @else
                        @include('back-end.freelancer.profile-settings.personal-detail.location')
                    @endif
                </div>
                {{-- Skills --}}
                <div class="mb-5">
                    @if (file_exists(resource_path('views/extend/back-end/freelancer/profile-settings/personal-detail/skill.blade.php')))
                        @include('extend.back-end.freelancer.profile-settings.personal-detail.skill')
                    @else
                        @include('back-end.freelancer.profile-settings.personal-detail.skill')
                    @endif
                </div>
                {{-- Video --}}
                <div class="mb-3">
                    @if (file_exists(resource_path('views/extend/back-end/freelancer/profile-settings/personal-detail/videos.blade.php')))
                        @include('extend.back-end.freelancer.profile-settings.personal-detail.videos')
                    @else
                        @include('back-end.freelancer.profile-settings.personal-detail.videos')
                    @endif
                </div>
                {{-- Submit Button --}}
                <div class="mb-5 mt-5"> {!! Form::submit(trans('lang.btn_save'), ['class' => 'btn btn-lg btn-primary lift shadow-none', 'id'=>'submit-profile']) !!} </div>
            </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
            <div class="pt-5">
                {{-- Profile Image Upload --}}
                <div class="mb-3">
                    @if (file_exists(resource_path('views/extend/back-end/freelancer/profile-settings/personal-detail/profile_photo.blade.php')))
                        @include('extend.back-end.freelancer.profile-settings.personal-detail.profile_photo')
                    @else
                        @include('back-end.freelancer.profile-settings.personal-detail.profile_photo')
                    @endif
                </div>
            </div> 
                {{-- Banner Image Upload --}}
                @if (!empty($options) && $options['banner_option'] === 'true')
                    <div class="wt-bannerphoto wt-tabsinfo d-none">
                        @if (file_exists(resource_path('views/extend/back-end/freelancer/profile-settings/personal-detail/profile_banner.blade.php')))
                            @include('extend.back-end.freelancer.profile-settings.personal-detail.profile_banner')
                        @else
                            @include('back-end.freelancer.profile-settings.personal-detail.profile_banner')
                        @endif
                    </div>
                @endif
            </div>
        </div>
        {!! form::close(); !!}
    </div>
  </div>
@endsection