@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master') 
    @section('content') 
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div id="user_profile">
                        {{-- Loader --}}
                        <div class="preloader-section" v-if="loading" v-cloak>
                            <div class="preloader-holder">
                                <div class="loader"></div>
                            </div>
                        </div>
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
                        <div>
                            {{-- Profile Settings Tabs --}}
                            @if (file_exists(resource_path('views/extend/back-end/freelancer/profile-settings/tabs.blade.php')))
                                @include('extend.back-end.freelancer.profile-settings.tabs')
                            @else
                                @include('back-end.freelancer.profile-settings.tabs')
                            @endif
                            <div class="mt-5" id="wt-education"> 
                                {{-- Form --}}
                                {!! Form::open(['url' => url('freelancer/store-experience-settings'), 'class' =>'form', 'id' => 'experience_form', '@submit.prevent'=>'submitExperienceEduction']) !!}
                                {{-- Profile Experience Component --}}
                                <fieldset>
                                    @if (file_exists(resource_path('views/extend/back-end/freelancer/profile-settings/experience-education/experience.blade.php'))) 
                                        @include('extend.back-end.freelancer.profile-settings.experience-education.experience')
                                    @else
                                        @include('back-end.freelancer.profile-settings.experience-education.experience')
                                    @endif
                                </fieldset>
                                {{-- Profile Education Component --}}
                                <div class="wt-userexperience wt-tabsinfo">
                                    @if (file_exists(resource_path('views/extend/back-end/freelancer/profile-settings/experience-education/education.blade.php')))
                                        @include('extend.back-end.freelancer.profile-settings.experience-education.education')
                                    @else
                                        @include('back-end.freelancer.profile-settings.experience-education.education')
                                    @endif
                                </div>
                                {{-- Submit Form --}}
                                {!! Form::submit(trans('lang.btn_save'), ['class' => 'btn btn-lg btn-primary', 'id'=>'submit-profile']) !!} {!! form::close(); !!}
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