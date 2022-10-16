@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')

@section('content')

<style>

    .wt-header .wt-navigation>ul>.menu-item-has-children:after, .wt-header .wt-navigation > ul > li > a {

    color: #767676 !important;
}

    .wt-header .wt-navigationarea .wt-userlogedin .wt-username span, .wt-header .wt-navigationarea .wt-userlogedin .wt-username h3 {

    color: #767676;
}
.wt-main {
    background: #ffffff;
    margin-bottom: 0rem;
}

</style>

    <div class="freelancer-profile wt-dbsectionspace" id="user_profile">

        <div class="container-fluid">
        {!! Form::open(['url' => url('employer/store-profile-settings'), 'class' =>'wt-userform', 'id' => 'employer_data', '@submit.prevent' => 'submitEmployerProfile']) !!}
            <div class="row justify-content-center">

                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 wt-insightsitemholder">

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

                            <div class="wt-personalskillshold lare-employer-profile tab-pane active fade show" id="wt-profile">

                                

                                    <div class="wt-yourdetails wt-tabsinfo">

                                        @if (file_exists(resource_path('views/extend/back-end/employer/profile-settings/personal-detail/detail.blade.php')))

                                            @include('extend.back-end.employer.profile-settings.personal-detail.detail')

                                        @else

                                            @include('back-end.employer.profile-settings.personal-detail.detail')

                                        @endif

                                    </div>

                                    @if($show_emplyr_inn_sec === 'true')

                                        <div class="wt-skills d-none">

                                            @if (file_exists(resource_path('views/extend/back-end/employer/profile-settings/personal-detail/employer-detail.blade.php')))

                                                @include('extend.back-end.employer.profile-settings.personal-detail.employer-detail')

                                            @else

                                                @include('back-end.employer.profile-settings.personal-detail.employer-detail')

                                            @endif

                                        </div>

                                    @endif

                                    <div class="wt-location wt-tabsinfo">

                                        @if (file_exists(resource_path('views/extend/back-end/employer/profile-settings/personal-detail/location.blade.php')))

                                            @include('extend.back-end.employer.profile-settings.personal-detail.location')

                                        @else

                                            @include('back-end.employer.profile-settings.personal-detail.location')

                                        @endif

                                    </div>

                                    <div class="wt-updatall pb-5 pl-4">

                                        {{-- <i class="ti-announcement"></i>

                                        <span>{{{ trans('lang.save_changes_note') }}}</span> --}}

                                        {!! Form::submit(trans('lang.btn_save'), ['class' => 'btn btn-primary lift shadow-none', 'id'=>'submit-profile']) !!}

                                    </div>

                                

                            </div>

                </div>

                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

                    <div>

                        <div class="wt-profilephoto wt-tabsinfo">

                            @if (file_exists(resource_path('views/extend/back-end/employer/profile-settings/personal-detail/profile_photo.blade.php')))

                                @include('extend.back-end.employer.profile-settings.personal-detail.profile_photo')

                            @else

                                @include('back-end.employer.profile-settings.personal-detail.profile_photo')

                            @endif

                        </div>
                        
                    </div>

                    <div class="wt-bannerphoto wt-tabsinfo">

                        @if (file_exists(resource_path('views/extend/back-end/employer/profile-settings/personal-detail/profile_banner.blade.php')))

                            @include('extend.back-end.employer.profile-settings.personal-detail.profile_banner')

                        @else

                            @include('back-end.employer.profile-settings.personal-detail.profile_banner')

                        @endif

                    </div>
                </div>

            </div>
        {!! form::close(); !!}
        </div>

    </div>

@endsection

