@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')

@section('content')

<style>

    .wt-header .wt-navigation>ul>.menu-item-has-children:after, .wt-header .wt-navigation > ul > li > a {

    color: #767676 !important;

}

    .wt-header .wt-navigationarea .wt-userlogedin .wt-username span, .wt-header .wt-navigationarea .wt-userlogedin .wt-username h3 {

    color: #767676;

}

</style>

    <div class="wt-dbsectionspace wt-haslayout la-ed-freelancer">

        <div class="container-fluid">

            <div class="row justify-content-center">

                <div class="col-12 col-sm-12 col-md-12 col-lg-12 wt-insightsitemholder">

                        
                            <div class="freelancer-profile" id="user_profile">

                                <div class="preloader-section" v-if="loading" v-cloak>

                                    <div class="preloader-holder">

                                        <div class="loader"></div>

                                    </div>

                                </div>

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

                        <div class="wt-dashboardbox wt-dashboardtabsholder">

                            @if (file_exists(resource_path('views/extend/back-end/freelancer/profile-settings/tabs.blade.php'))) 

                                @include('extend.back-end.freelancer.profile-settings.tabs')

                            @else 

                                @include('back-end.freelancer.profile-settings.tabs')

                            @endif

                            <div class="wt-tabscontent tab-content">

                                <div class="wt-educationholder" id="wt-education">

                                    {!! Form::open(['url' => url('freelancer/store-experience-settings'), 'class' =>'wt-formtheme wt-userform', 'id' => 'experience_form', '@submit.prevent'=>'submitExperienceEduction']) !!}

                                        <div class="wt-userexperience wt-tabsinfo">

                                            @if (file_exists(resource_path('views/extend/back-end/freelancer/profile-settings/experience-education/experience.blade.php'))) 

                                                @include('extend.back-end.freelancer.profile-settings.experience-education.experience')

                                            @else 

                                                @include('back-end.freelancer.profile-settings.experience-education.experience')

                                            @endif

                                        </div>

                                        <div class="wt-userexperience wt-tabsinfo">

                                            @if (file_exists(resource_path('views/extend/back-end/freelancer/profile-settings/experience-education/education.blade.php'))) 

                                                @include('extend.back-end.freelancer.profile-settings.experience-education.education')

                                            @else 

                                                @include('back-end.freelancer.profile-settings.experience-education.education')

                                            @endif

                                        </div>

                                        <div class="wt-updatall">

                                            {{-- <i class="ti-announcement"></i> --}}

                                            {{-- <span>{{{ trans('lang.save_changes_note') }}}</span> --}}

                                            {!! Form::submit(trans('lang.btn_save'), ['class' => 'btn btn-primary', 'id'=>'submit-profile']) !!}

                                        </div>

                                    {!! form::close(); !!}

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection

@section('bootstrap_script')

    <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>

@stop

