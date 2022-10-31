@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')

@section('content')

<style>

    .wt-header .wt-navigation>ul>.menu-item-has-children:after, .wt-header .wt-navigation > ul > li > a {

    color: #767676 !important;

}

    .wt-header .wt-navigationarea .wt-userlogedin .wt-username span, .wt-header .wt-navigationarea .wt-userlogedin .wt-username h3 {

    color: #767676;

}
.wt-formbannervtwo {
        display: none;
    }
.wt-uploadingbar em a {
    top: 0px;
    z-index: 2;
    right: 10px;
    position: absolute;
    color: red;
    font-size: 0.9rem;
    font-weight: bolder;
}
</style>

    <div class="container">

        <div id="user_profile">

            <div class="preloader-section" v-if="loading" v-cloak>

                <div class="preloader-holder">

                    <div class="loader"></div>

                </div>

            </div>

                {!! Form::open(['url' => '', 'id' => 'freelancer_profile', '@submit.prevent'=>'submitFreelancerProfile']) !!}
                    <div class="row justify-content-center">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            @if (file_exists(resource_path('views/extend/back-end/freelancer/profile-settings/tabs.blade.php'))) 

                                        @include('extend.back-end.freelancer.profile-settings.tabs')

                                    @else 

                                        @include('back-end.freelancer.profile-settings.tabs')

                            @endif
                        </div>

                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">

                                        @if (Session::has('message'))

                                            <div class="flash_msg">

                                                <flash_messages :message_class="'success'" :time ='5' :message="'{{{ Session::get('message') }}}'" v-cloak></flash_messages>

                                            </div>

                                        @endif

                                        @if ($errors->any())

                                            <ul class="wt-jobalerts">

                                                @foreach ($errors->all() as $error)

                                                    <div class="flash_msg">

                                                        <flash_messages :message_class="'danger'" :time ='10' :message="'{{{ $error }}}'" v-cloak></flash_messages>

                                                    </div>

                                                @endforeach

                                            </ul>

                                        @endif

                                        <div class="pt-5 tab-pane active fade show" id="wt-skills">

                                            

                                                <div class="mb-5">

                                                    @if (file_exists(resource_path('views/extend/back-end/freelancer/profile-settings/personal-detail/detail.blade.php'))) 

                                                        @include('extend.back-end.freelancer.profile-settings.personal-detail.detail')

                                                    @else 

                                                        @include('back-end.freelancer.profile-settings.personal-detail.detail')

                                                    @endif

                                                </div>

                                                <div class="mb-5">

                                                    @if (file_exists(resource_path('views/extend/back-end/freelancer/profile-settings/personal-detail/location.blade.php'))) 

                                                        @include('extend.back-end.freelancer.profile-settings.personal-detail.location')

                                                    @else 

                                                        @include('back-end.freelancer.profile-settings.personal-detail.location')

                                                    @endif

                                                </div>

                                                <div class="mb-5">

                                                    @if (file_exists(resource_path('views/extend/back-end/freelancer/profile-settings/personal-detail/skill.blade.php'))) 

                                                        @include('extend.back-end.freelancer.profile-settings.personal-detail.skill')   

                                                    @else 

                                                        @include('back-end.freelancer.profile-settings.personal-detail.skill')   

                                                    @endif 

                                                </div>

                                                <div class="wt-videos-holder wt-tabsinfo la-footer-setting mb-3">

                                                    @if (file_exists(resource_path('views/extend/back-end/freelancer/profile-settings/personal-detail/videos.blade.php'))) 

                                                        @include('extend.back-end.freelancer.profile-settings.personal-detail.videos')   

                                                    @else 

                                                        @include('back-end.freelancer.profile-settings.personal-detail.videos')   

                                                    @endif 

                                                </div>

                                                <div class="wt-updatall pb-5 pl-4">

                                                    {{-- <i class="ti-announcement"></i> --}}

                                                    {{-- <span>{{{ trans('lang.save_changes_note') }}}</span> --}}

                                                    {!! Form::submit(trans('lang.btn_save'), ['class' => 'btn btn-primary lift shadow-none', 'id'=>'submit-profile']) !!}

                                                </div>


                                        </div>

                                </div>

                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

                            <div class="pt-5">
                                
                                <div class="wt-profilephoto wt-tabsinfo">

                                    @if (file_exists(resource_path('views/extend/back-end/freelancer/profile-settings/personal-detail/profile_photo.blade.php'))) 

                                        @include('extend.back-end.freelancer.profile-settings.personal-detail.profile_photo') 

                                    @else 

                                        @include('back-end.freelancer.profile-settings.personal-detail.profile_photo') 

                                    @endif

                                </div>

                            </div>

                            @if (!empty($options) && $options['banner_option'] === 'true')

                                                    <div class="wt-bannerphoto wt-tabsinfo">

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

