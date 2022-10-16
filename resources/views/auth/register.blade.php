@extends(file_exists(resource_path('views/extend/front-end/master.blade.php')) ? 'extend.front-end.master' : 'front-end.master')
@section('content')
<style>
    .wt-header .wt-navigation>ul>.menu-item-has-children:after, .wt-header .wt-navigation > ul > li > a {
    color: #767676 !important;
}
.wt-formbannervtwo {
    display:none !important;
}
.wt-header{
    display: none;
}
body {
    background-image: url(../images/background5.svg);
    position: relative;
    background-repeat: no-repeat;
    top: 0rem;
    background-size: 101rem;
    background-position-x: -1rem;
}
.js-main-footer-wrapper{
    display: none;
}
</style>
@php
    $employees      = Helper::getEmployeesList();
    $departments    = App\Department::all();
    $locations      = App\Location::select('title', 'id')->get()->pluck('title', 'id')->toArray();
    $roles          = Spatie\Permission\Models\Role::all()->toArray();
    $register_form = App\SiteManagement::getMetaValue('reg_form_settings');
    $reg_one_title = !empty($register_form) && !empty($register_form[0]['step1-title']) ? $register_form[0]['step1-title'] : trans('lang.join_for_good');
    $reg_one_subtitle = !empty($register_form) && !empty($register_form[0]['step1-subtitle']) ? $register_form[0]['step1-subtitle'] : trans('lang.join_for_good_reason');
    $reg_two_title = !empty($register_form) && !empty($register_form[0]['step2-title']) ? $register_form[0]['step2-title'] : trans('lang.pro_info');
    $reg_two_subtitle = !empty($register_form) && !empty($register_form[0]['step2-subtitle']) ? $register_form[0]['step2-subtitle'] : '';
    $term_note = !empty($register_form) && !empty($register_form[0]['step2-term-note']) ? $register_form[0]['step2-term-note'] : trans('lang.agree_terms');
    $reg_three_title = !empty($register_form) && !empty($register_form[0]['step3-title']) ? $register_form[0]['step3-title'] : trans('lang.almost_there');
    $reg_three_subtitle = !empty($register_form) && !empty($register_form[0]['step3-subtitle']) ? $register_form[0]['step3-subtitle'] : trans('lang.acc_almost_created_note');
    $register_image = !empty($register_form) && !empty($register_form[0]['register_image']) ? '/uploads/settings/home/'.$register_form[0]['register_image'] : 'images/work.jpg';
    $reg_page = !empty($register_form) && !empty($register_form[0]['step3-page']) ? $register_form[0]['step3-page'] : '';
    $reg_four_title = !empty($register_form) && !empty($register_form[0]['step4-title']) ? $register_form[0]['step4-title'] : trans('lang.congrats');
    $reg_four_subtitle = !empty($register_form) && !empty($register_form[0]['step4-subtitle']) ? $register_form[0]['step4-subtitle'] : trans('lang.acc_creation_note');
    $show_emplyr_inn_sec = !empty($register_form) && !empty($register_form[0]['show_emplyr_inn_sec']) ? $register_form[0]['show_emplyr_inn_sec'] : 'true';
    $show_reg_form_banner = !empty($register_form) && !empty($register_form[0]['show_reg_form_banner']) ? $register_form[0]['show_reg_form_banner'] : 'true';
    $reg_form_banner = !empty($register_form) && !empty($register_form[0]['reg_form_banner']) ? $register_form[0]['reg_form_banner'] : null;
    $selected_registration_type = !empty($register_form) && !empty($register_form[0]['registration_type']) ? $register_form[0]['registration_type'] : 'multiple';
    $breadcrumbs_settings = \App\SiteManagement::getMetaValue('show_breadcrumb');
    $show_breadcrumbs = !empty($breadcrumbs_settings) ? $breadcrumbs_settings : 'true';
@endphp
@php $breadcrumbs = Breadcrumbs::generate('registerPage'); @endphp
@if (file_exists(resource_path('views/extend/front-end/includes/inner-banner.blade.php'))) 
    @include('extend.front-end.includes.inner-banner', 
        ['title' => trans('lang.join_for_free'), 'inner_banner' => $reg_form_banner, 'path' => 'uploads/settings/home/', 'show_banner' => $show_reg_form_banner ]
    )
@else 
    {{-- @include('front-end.includes.inner-banner', 
        ['title' =>  trans('lang.join_for_free'), 'inner_banner' => $reg_form_banner, 'path' => 'uploads/settings/home/', 'show_banner' => $show_reg_form_banner ]
    ) --}}
@endif
<div class="wt-haslayout wt-main-section mt-8" id="registration">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xs-12 col-sm-12 col-md-10 push-md-1 col-lg-8 push-lg-2">
                <div class="preloader-section" v-if="loading" v-cloak>
                    <div class="preloader-holder">
                        <div class="loader"></div>
                    </div>
                </div>
                <div class="wt-registerhead" v-if="step != 3" v-cloak>
                    <div class="wt-title">
                        <h1 class="goodkitH1">Register
                            {{-- {{{ $reg_one_title }}} --}}
                        </h1>
                    </div>
                    <div class="wt-description">
                        <p>{{{ $reg_one_subtitle }}}</p>
                    </div>
                </div>
                <form method="POST"  class="row" @submit.prevent="checkStep2('{{ trans('lang.email_not_config') }}')" id="register_form" v-if="step != 3" v-cloak>
                    @csrf
                    <div class="col-sm-6 mb-3">

                        <label class="form-label" for="reg-fn">{{ trans('lang.ph_first_name') }}<sup class="text-danger ms-1">*</sup></label>
                        <input type="text" name="first_name" class="form-control" placeholder="{{{ trans('lang.ph_first_name') }}}" v-bind:class="{ 'is-invalid': form_step1.is_first_name_error }" v-model="first_name">
                        <span class="help-block" v-if="form_step1.first_name_error">
                            <strong v-cloak>@{{form_step1.first_name_error}}</strong>
                        </span>
                    </div>

                    <div class="col-sm-6 mb-3">
                        <label class="form-label" for="reg-fn">{{ trans('lang.ph_last_name') }}<sup class="text-danger ms-1">*</sup></label>
                        <input type="text" name="last_name" class="form-control" placeholder="{{{ trans('lang.ph_last_name') }}}" v-bind:class="{ 'is-invalid': form_step1.is_last_name_error }" v-model="last_name">
                        <span class="help-block" v-if="form_step1.last_name_error">
                            <strong v-cloak>@{{form_step1.last_name_error}}</strong>
                        </span>
                    </div>

                    <div class="col-sm-12 mb-3">
                        <label class="form-label" for="reg-fn">{{ trans('lang.ph_email') }}<sup class="text-danger ms-1">*</sup></label>
                        <input id="user_email" type="email" class="form-control" name="email" placeholder="{{{ trans('lang.ph_email') }}}" value="{{ old('email') }}" v-bind:class="{ 'is-invalid': form_step1.is_email_error }" v-model="user_email">
                        <span class="help-block" v-if="form_step1.email_error">
                            <strong v-cloak>@{{form_step1.email_error}}</strong>
                        </span>
                    </div>

                    @if (!empty($locations))
                    <div class="col-sm-12 mb-3">
                        <label class="form-label" for="reg-fn">Location<sup class="text-danger ms-1">*</sup></label>
                        {!! Form::select('locations', $locations, null, array('placeholder' => trans(''), 'class'=>'form-control', 'v-bind:class' => '{ "is-invalid": form_step2.is_locations_error }')) !!}
                        <span class="help-block" v-if="form_step2.locations_error">
                            <strong v-cloak>@{{form_step2.locations_error}}</strong>
                        </span>
                    </div>
                    @endif
                    
                    <div class="col-sm-6 mb-3">
                        <label class="form-label" for="reg-fn">{{ trans('lang.ph_pass') }}<sup class="text-danger ms-1">*</sup></label>
                        <input id="password" type="password" class="form-control" name="password" placeholder="{{{ trans('lang.ph_pass') }}}" v-bind:class="{ 'is-invalid': form_step2.is_password_error }">
                        <span class="help-block" v-if="form_step2.password_error">
                            <strong v-cloak>@{{form_step2.password_error}}</strong>
                        </span>
                    </div>

                    <div class="col-sm-6 mb-3">
                        <label class="form-label" for="reg-fn">{{ trans('lang.ph_retry_pass') }}<sup class="text-danger ms-1">*</sup></label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{{ trans('lang.ph_retry_pass') }}}" v-bind:class="{ 'is-invalid': form_step2.is_password_confirm_error }">
                        <span class="help-block" v-if="form_step2.password_confirm_error">
                            <strong v-cloak>@{{form_step2.password_confirm_error}}</strong>
                        </span>
                    </div>

                    <div class="col-sm-12 mb-3 mt-3">
                        <fieldset class="wt-formregisterstart">
                            <div class="wt-title wt-formtitle">
                                <h4>{{{ trans('lang.start_as') }}}</h4>
                            </div>
                            @if(!empty($roles))
                                <ul class="wt-accordionhold wt-formaccordionhold accordion">
                                    @foreach ($roles as $key => $role)
                                        @if (!in_array($role['id'] == 1, $roles))
                                            <li v-bind:class="{ 'role-is-invalid': form_step2.is_role_error }">
                                                <div class="wt-accordiontitle" id="headingOne" data-toggle="collapse" data-target="#collapseOne">
                                                    <span class="wt-radio">
                                                    <input id="wt-company-{{$key}}" type="radio" name="role" value="{{{ $role['role_type'] }}}" checked="" v-model="user_role" v-on:change="selectedRole(user_role)">
                                                    <label for="wt-company-{{$key}}">
                                                        {{ $role['name'] === 'freelancer' ? trans('lang.freelancer') : trans('lang.employer')}}
                                                        <span>
                                                            ({{ $role['name'] === 'freelancer' ? trans('lang.signup_as_freelancer') : trans('lang.signup_as_country')}})
                                                        </span>
                                                    </label>
                                                    </span>
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                                <span class="help-block" v-if="form_step2.role_error">
                                    <strong v-cloak>@{{form_step2.role_error}}</strong>
                                </span>
                            @endif
                        </fieldset>
                    </div>

                    <div class="col-sm-12 mb-3">
                        <div class="wt-checkboxholder">
                            <span class="wt-checkbox">
                                <input id="termsconditions" type="checkbox" name="termsconditions" checked="">
                                <label for="termsconditions"><span>{{{ $term_note }}}</span></label>
                                <span class="help-block" v-if="form_step2.termsconditions_error">
                                    <strong style="color: red;" v-cloak>{{trans('lang.register_termsconditions_error')}}</strong>
                                </span>
                            </span>
                        </div>
                    </div>

                    <div class="col-sm-12 mb-3 text-center">
                        <button type="button" @click.prevent="checkStep2('{{ trans('lang.email_not_config') }}')" class="btn btn-primary" type="submit">Sign up</button>
                    </div>

                </form>


                <div class="wt-joinformc" v-if="step === 3" v-cloak>
                    <form method="POST" action="" class="wt-formtheme wt-formregister" id="verification_form">
                        <div class="wt-registerhead">
                            <div class="wt-title">
                                <h3>{{{ $reg_three_title }}}</h3>
                            </div>
                            <div class="wt-description">
                                <p>{{{ $reg_three_subtitle }}}</p>
                            </div>
                        </div>
                        <figure class="wt-joinformsimg">
                            <img src="{{ asset($register_image)}}" alt="{{{ trans('lang.verification_code_img') }}}">
                        </figure>
                        <fieldset>
                            <div class="form-group">
                                <label>
                                    {{{ trans('lang.verify_code_note') }}}
                                    @if (!empty($reg_page))
                                        <a target="_blank" href="{{{url($reg_page)}}}">
                                            {{{ trans('Warum brauch ich ein Bestätigungscode?') }}}
                                        </a>
                                    @else
                                        <a href="javascript:void(0)" class="text-primary">
                                            {{{ trans('Warum brauch ich ein Bestätigungscode?') }}}
                                        </a>
                                    @endif
                                </label>
                                <input type="text" name="code" class="form-control" placeholder="{{{ trans('lang.enter_code') }}}">
                            </div>
                            <div class="form-group wt-btnarea text-center">
                                <a href="#" @click.prevent="verifyCode()" class="btn btn-primary">{{{ trans('lang.continue') }}}</a>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
