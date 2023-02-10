@extends(file_exists(resource_path('views/extend/front-end/master.blade.php')) ? 'extend.front-end.master' : 'front-end.master')
@section('content')
@php
    $employees      = Helper::getEmployeesList();
    $departments    = App\Department::all();
    $locations      = App\Location::select('title', 'id')->get()->pluck('title', 'id')->toArray();
    $roles          = Spatie\Permission\Models\Role::all()->toArray();
    $register_form = App\SiteManagement::getMetaValue('reg_form_settings');
    $reg_one_title = !empty($register_form) && !empty($register_form[0]['step1-title']) ? $register_form[0]['step1-title'] : trans('lang.register');
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
@endif
<div class="container" id="registration">
        <div class="row justify-content-center">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                {{-- Loader --}}
                <div class="preloader-section" v-if="loading" v-cloak>
                    <div class="preloader-holder">
                        <div class="loader"></div>
                    </div>
                </div>

                <div v-if="step != 3" v-cloak>
                    {{-- Header --}}
                    <div class="jumbotron jumbotron-fluid bg-transparent">
                        <div class="container text-center">
                            <h1 class="display-4">{{{ $reg_one_title }}}</h1>
                            <p>{{{ $reg_one_subtitle }}}</p>
                            <hr class="my-4">
                        </div>
                    </div>
                    {{-- Form --}}
                    <form method="POST" class="row" @submit.prevent="checkStep2('{{ trans('lang.email_not_config') }}')" id="register_form">
                        @csrf

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="first_name">{{ trans('lang.ph_first_name') }}<sup class="text-danger">*</sup></label>
                                <input id="first_name" type="text" name="first_name" class="form-control" placeholder="{{{ trans('lang.ph_first_name') }}}" v-bind:class="{ 'is-invalid': form_step1.is_first_name_error }" v-model="first_name">
                                <div class="invalid-feedback" v-if="form_step1.first_name_error">
                                    <p v-cloak>@{{form_step1.first_name_error}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="last_name">{{ trans('lang.ph_last_name') }}<sup class="text-danger">*</sup></label>
                                <input id="last_name" type="text" name="last_name" class="form-control" placeholder="{{{ trans('lang.ph_last_name') }}}" v-bind:class="{ 'is-invalid': form_step1.is_last_name_error }" v-model="last_name">
                                <div class="invalid-feedback" v-if="form_step1.last_name_error">
                                    <p v-cloak>@{{form_step1.last_name_error}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="user_email">{{ trans('lang.ph_email') }}<sup class="text-danger">*</sup></label>
                                <input id="user_email" type="email" class="form-control" name="email" placeholder="{{{ trans('lang.ph_email') }}}" value="{{ old('email') }}" v-bind:class="{ 'is-invalid': form_step1.is_email_error }" v-model="user_email">
                                <div class="invalid-feedback" v-if="form_step1.email_error">
                                    <p v-cloak>@{{form_step1.email_error}}</p>
                                </div>
                            </div>
                        </div>

                        @if (!empty($locations))
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="locations">Standort<sup class="text-danger">*</sup></label>
                                    {!! Form::select('locations', $locations, null, array('placeholder' => trans('lang.select_locations'), 'id'=>'locations','class'=>'form-control', 'v-bind:class' => '{ "is-invalid": form_step2.is_locations_error }')) !!}
                                    <div class="invalid-feedback" v-if="form_step2.locations_error">
                                        <p v-cloak>@{{form_step2.locations_error}}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="password">{{ trans('lang.ph_pass') }}<sup class="text-danger">*</sup></label>
                                <input id="password" type="password" class="form-control" name="password" placeholder="{{{ trans('lang.ph_pass') }}}" v-bind:class="{ 'is-invalid': form_step2.is_password_error }">
                                <div class="invalid-feedback" v-if="form_step2.password_error">
                                    <p v-cloak>@{{form_step2.password_error}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="password-confirm">{{ trans('lang.ph_retry_pass') }}<sup class="text-danger">*</sup></label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{{ trans('lang.ph_retry_pass') }}}" v-bind:class="{ 'is-invalid': form_step2.is_password_confirm_error }">
                                <div class="invalid-feedback" v-if="form_step2.password_confirm_error">
                                    <p v-cloak>@{{form_step2.password_confirm_error}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 mb-3 mt-3">
                            <fieldset class="d-flex align-items-start flex-column">
                                <div class="card-body">
                                    <h4>{{{ trans('lang.start_as') }}}</h4>
                                @if(!empty($roles))
                                    <ul>
                                        @foreach ($roles as $key => $role)
                                            @if (!in_array($role['id'] == 1, $roles))
                                                <li v-bind:class="{ 'role-is-invalid': form_step2.is_role_error }">
                                                    <div class="form-check">
                                                        <input class="form-check-input" id="user_role_{{$key}}" type="radio" name="role" value="{{{ $role['role_type'] }}}" checked="" v-model="user_role" v-on:change="selectedRole(user_role)">
                                                        <label class="form-check-label" for="user_role_{{$key}}">
                                                            {{ $role['name'] === 'freelancer' ? trans('lang.freelancer') : trans('lang.employer')}}
                                                            <span>
                                                                ({{ $role['name'] === 'freelancer' ? trans('lang.signup_as_freelancer') : trans('lang.signup_as_employer')}})
                                                            </span>
                                                        </label>
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                    <div class="invalid-feedback" v-if="form_step2.role_error">
                                        <p v-cloak>@{{form_step2.role_error}}</p>
                                    </div>
                                @endif
                                </div>
                            </fieldset>
                        </div>

                        <div class="col-sm-12 mb-3">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" id="termsconditions" type="checkbox" name="termsconditions" checked="">
                                    <label class="form-check-label" for="termsconditions">{{{ $term_note }}}</label>
                                    <div class="invalid-feedback" v-if="form_step2.termsconditions_error">
                                        <p v-cloak>{{trans('lang.register_termsconditions_error')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 mb-3 text-center">
                            <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_SITE_KEY') }}"></div>
                            <button type="button" @click.prevent="checkStep2('{{ trans('lang.email_not_config') }}')" class="btn btn-lg btn-primary lift"
                            type="submit">Sign up</button>
                        </div>

                    </form>
                </div>
                <div v-if="step === 3" v-cloak>
                    {{-- Header --}}
                    <div class="jumbotron jumbotron-fluid bg-transparent">
                        <div class="container text-center" v-cloak>
                            <h1 class="display-4">{{{ $reg_three_title }}}</h1>
                            <p>{{{ $reg_three_subtitle }}}</p>
                            <hr class="my-4">
                        </div>
                    </div>
                    {{-- Code Confirmation Form --}}
                    <form method="POST" action="" id="verification_form">
                        <fieldset class="d-flex align-items-center flex-column">
                            <div class="card-body text-center">
                                <div class="form-group">
                                    <label>{{{ trans('lang.verify_code_note') }}}
                                        @if (!empty($reg_page))
                                            <a target="_blank" href="{{{url($reg_page)}}}">{{{ trans('lang.why_need_code') }}}</a>
                                        @else
                                            <a href="javascript:void(0)" class="text-primary">{{{ trans('lang.why_need_code') }}}</a>
                                        @endif
                                    </label>
                                    <input type="text" name="code" class="form-control" placeholder="{{{ trans('lang.enter_code') }}}">
                                </div>
                                <button class="btn btn-lg btn-primary lift" type="submit" @click.prevent="verifyCode()">
                                    <a href="#" class="text-white">{{{ trans('lang.continue') }}}</a>
                                </button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
