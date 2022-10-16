@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@section('content')
    <section class="wt-haslayout wt-dbsectionspace">
        <div class="row">
            <div class=" col-sm-12 col-md-12 col-lg-10 push-lg-1 col-xl-8 push-xl-2" id="packages">
                <div class="preloader-section" v-if="loading" v-cloak>
                    <div class="preloader-holder">
                        <div class="loader"></div>
                    </div>
                </div>
                <div class="wt-dashboardbox">
                @if (Session::has('message'))
                    <div class="flash_msg">
                        <flash_messages :message_class="'success'" :time ='5' :message="'{{{ Session::get('message') }}}'" v-cloak></flash_messages>
                    </div>
                    @php session()->forget('message') @endphp;
                @elseif (Session::has('error'))
                    <div class="flash_msg">
                        <flash_messages :message_class="'danger'" :time ='5' :message="'{{{ str_replace("'s", " ",Session::get('error')) }}}'" v-cloak></flash_messages>
                    </div>
                    @php session()->forget('error') @endphp;
                @endif
                <div class="sj-checkoutjournal">
                    <div class="sj-title">
                        <h3>{{{trans('lang.checkout')}}}</h3>
                    </div>
                    @php
                        session()->put(['product_id' => e($service->id)]);
                        session()->put(['product_title' => e($service->title)]);
                        session()->put(['product_price' => e($service->price)]);
                        session()->put(['type' => 'project']);
                        session()->put(['project_type' => 'service']);
                        session()->put(['service_seller' => $freelancer->id]);
                    @endphp
                    <table class="sj-checkouttable">
                        <thead>
                            <tr>
                                <th>{{trans('lang.item_title')}}</th>
                                <th>{{trans('lang.details')}}</th>
                            </tr>
                        </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="sj-producttitle">
                                            <div class="sj-checkpaydetails">
                                                @if (!empty($service->title))
                                                    <h4>{{{$service->title}}}</h4>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ !empty($symbol['symbol']) ? $symbol['symbol'] : '$' }}{{{$service->price}}} </td>
                                </tr>
                                <tr>
                                    <td>{{ trans('lang.freelancer') }}</td>
                                    <td>{{{ $freelancer_name }}}</td>
                                </tr>
                                <tr>
                                    <td>{{ trans('lang.total') }}</td>
                                    <td>{{ !empty($symbol['symbol']) ? $symbol['symbol'] : '$' }}{{{$service->price}}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @if (!empty($payment_gateway))
                        <div class="sj-checkpaymentmethod">
                            <div class="sj-title">
                                <h3>{{ trans('lang.select_pay_method') }}</h3>
                            </div>
                            <ul class="sj-paymentmethod">
                                @foreach ($payment_gateway as $gatway)
                                    <li>
                                        @if ($gatway == "paypal")
                                            <a href="{{{url('paypal/ec-checkout')}}}">
                                                <i class="fa fa-paypal"></i>
                                                <span><em>{{ trans('lang.pay_amount_via') }}</em> {{ Helper::getPaymentMethodList($gatway)['title']}} {{ trans('lang.pay_gateway') }}</span>
                                            </a>
                                        @elseif ($gatway == "stripe")
                                            <a href="javascrip:void(0);" v-on:click.prevent="getStriprForm">
                                                <i class="fab fa-stripe-s"></i>
                                                <span><em>{{ trans('lang.pay_amount_via') }}</em> {{ Helper::getPaymentMethodList($gatway)['title']}} {{ trans('lang.pay_gateway') }}</span>
                                            </a>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <b-modal size="lg" ref="myModalRef" hide-footer class="la-pay-stripe" :no-close-on-backdrop="true">
                    <template v-slot:modal-title>
                        {{ trans('lang.stripe_payment')}} 
                        <span>{{ trans('lang.stripe_form_note')}}  </span>
                    </template>
                    <div class="d-block text-center">
                        <form class="wt-formtheme wt-form-paycard" method="POST" id="stripe-payment-form" role="form" action="" @submit.prevent='submitStripeFrom'>
                            {{ csrf_field() }}
                            <fieldset>
                                <div class="form-row">
                                    <div class="form-group col-lg-4 {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label>{{ trans('lang.name') }}</label>
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-lg-4 {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label>{{ trans('lang.email') }}</label>
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-lg-4 {{ $errors->has('phone') ? ' has-error' : '' }}">
                                        <label>{{ trans('lang.phone') }}</label>
                                        <input id="phone" type="number" class="form-control" name="phone" value="{{ old('phone') }}" autofocus>
                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">{{ trans('lang.address1') }}</label>
                                    <input type="text" class="form-control" name="line1" id="inputAddress" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress2">{{ trans('lang.address2') }}</label>
                                    <input type="text" class="form-control" name="line2" id="inputAddress2" placeholder="">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-lg-6">
                                        <label for="inputCity">{{ trans('lang.city') }}</label>
                                        <input type="text" class="form-control" name="city" id="inputCity">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="inputState">{{ trans('lang.state') }}</label>
                                        <input type="text" class="form-control" name="state" id="inputState">
                                    </div>
                                    <div class="form-group col-lg-2">
                                    <label for="inputPostal">{{ trans('lang.postal_code') }}</label>
                                    <input type="text" class="form-control" name="postal_code" id="inputPostal">
                                    </div>
                                </div>
                                <div class="form-group wt-inputwithicon {{ $errors->has('card_no') ? ' has-error' : '' }}">
                                    <label>{{ trans('lang.card_no') }}</label>
                                    <img src="{{!empty($stripe_img) ? asset('uploads/settings/payment/'.$stripe_img) : ''}}">
                                    <input id="card_no" type="text" class="form-control" name="card_no" value="{{ old('card_no') }}" autofocus>
                                    @if ($errors->has('card_no'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('card_no') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('ccExpiryMonth') ? ' has-error' : '' }}">
                                    <label>{{ trans('lang.expiry_month') }}</label>
                                    <input id="ccExpiryMonth" type="number" class="form-control" name="ccExpiryMonth" value="{{ old('ccExpiryMonth') }}" min="1" max="12" autofocus>
                                    @if ($errors->has('ccExpiryMonth'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('ccExpiryMonth') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('ccExpiryYear') ? ' has-error' : '' }}">
                                    <label>{{ trans('lang.expiry_year') }}</label>
                                    <input id="ccExpiryYear" type="text" class="form-control" name="ccExpiryYear" value="{{ old('ccExpiryYear') }}" autofocus>
                                    @if ($errors->has('ccExpiryYear'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('ccExpiryYear') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group wt-inputwithicon {{ $errors->has('cvvNumber') ? ' has-error' : '' }}">
                                    <label>{{ trans('lang.cvc_no') }}</label>
                                    <img src="{{asset('images/pay-img.png')}}">
                                    <input id="cvvNumber" type="text" class="form-control" name="cvvNumber" value="{{ old('cvvNumber') }}" autofocus>
                                    @if ($errors->has('cvvNumber'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('cvvNumber') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group wt-btnarea">
                                    <input type="submit" name="button" class="wt-btn" value="Pay {{ !empty($symbol['symbol']) ? $symbol['symbol'] : '$' }}{{$service->price}}">
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </b-modal>
            </div>
        </div>
    </section>
@endsection
