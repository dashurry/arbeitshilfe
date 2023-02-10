<!doctype html>

<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->

<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->

<!--[if IE 8]>			<html class="no-js lt-ie9" lang=""> <![endif]-->

<!--[if gt IE 8]><!-->

<html class="no-js" lang="" dir="{{Helper::getTextDirection()}}">

<!--<![endif]-->



<head>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	@if (trim($__env->yieldContent('title')))

		<title>@yield('title')</title>

	@else 

		<title>{{ config('app.name') }}</title>

	@endif

	<meta name="description" content="@yield('description')">

	<meta name="keywords" content="@yield('keywords')">

	<meta name="csrf-token" content="{{ csrf_token() }}">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	@auth
		<meta name="isLoggedIn" content="true">
		<meta name="userType" content="{{{ Helper::getAuthRoleName() }}}">
	@endauth
	@guest
	<meta name="isLoggedIn" content="false">
	<meta name="userType" content="null">
	@endguest

	<link rel="apple-touch-icon" href="apple-touch-icon.png">

	<link rel="icon" href="{{{ asset(Helper::getSiteFavicon()) }}}" type="image/x-icon">

	@stack('PackageStyle')

	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

	<link href="{{ asset('css/normalize-min.css') }}" rel="stylesheet">

	<link href="{{ asset('css/scrollbar-min.css') }}" rel="stylesheet">

	<!-- https://material.io/resources/icons/?style=round -->
	<link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
	
    <link href="{{ asset('css/fontawesome/fontawesome-all.min.css') }}" rel="stylesheet">

	<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

	<link href="{{ asset('css/themify-icons.css') }}" rel="stylesheet">

	<link href="{{ asset('css/jquery-ui-min.css') }}" rel="stylesheet">

	<link href="{{ asset('css/linearicons.css') }}" rel="stylesheet">

	@stack('sliderStyle')

	<link href="{{ asset("css/chosen.css") }}" rel="stylesheet">

	<link href="{{ asset('css/main.css') }}" rel="stylesheet">

	<link href="{{ asset('css/aos.css') }}" rel="stylesheet">

	<link href="{{ asset('css/custom.css') }}" rel="stylesheet">

	@if(Helper::getTextDirection() == 'rtl')

		<link href="{{ asset('css/rtl.css') }}" rel="stylesheet">

	@endif

	<link href="{{ asset('css/responsive.css') }}" rel="stylesheet">



	<link href="{{ asset('css/color.css') }}" rel="stylesheet">

	<link href="{{ asset('css/maintwo.css') }}" rel="stylesheet">

	@php echo \App\Typo::setSiteStyling(); @endphp

    <link href="{{ asset('css/transitions.css') }}" rel="stylesheet">

	@stack('stylesheets')

	<script type="text/javascript">

		var APP_URL = {!! json_encode(url('/')) !!}

		var readmore_trans = {!! json_encode(trans('lang.read_more')) !!}

		var less_trans = {!! json_encode(trans('lang.less')) !!}

		var Map_key = {!! json_encode(Helper::getGoogleMapApiKey()) !!}

		var APP_DIRECTION = {!! json_encode(Helper::getTextDirection()) !!}

	</script>

	@if (Auth::user())

		<script type="text/javascript">

			var USERID = {!! json_encode(Auth::user()->id) !!}
			
			
			window.Laravel = {!! json_encode([

			'csrfToken'=> csrf_token(),

			'user'=> [

				'authenticated' => auth()->check(),

				'id' => auth()->check() ? auth()->user()->id : null,

				'name' => auth()->check() ? auth()->user()->first_name : null,

				'image' => !empty(auth()->user()->profile->avater) ? asset('uploads/users/'.auth()->user()->id .'/'.auth()->user()->profile->avater) : asset('images/user-login.png'),

				'image_name' => !empty(auth()->user()->profile->avater) ? auth()->user()->profile->avater : '',

				]

				])

			!!};

		</script>

	@endif

	<script>

		window.trans = <?php

		$lang_files = File::files(resource_path() . '/lang/' . App::getLocale());

		$trans = [];

		foreach ($lang_files as $f) {

			$filename = pathinfo($f)['filename'];

			$trans[$filename] = trans($filename);

		}

		echo json_encode($trans);

		?>;

	</script>

</head>



<body class="wt-login {{Helper::getBodyLangClass()}} {{Helper::getTextDirection()}} {{empty(Request::segment(1)) ? 'home-wrapper' : '' }}">

	{{ \App::setLocale(env('APP_LANG')) }}

	<!--[if lt IE 8]>

		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>

	<![endif]-->

	@php

		$general_settings = !empty(App\SiteManagement::getMetaValue('settings')) ? App\SiteManagement::getMetaValue('settings') : array();

		$enable_loader = !empty($general_settings) && !empty($general_settings[0]['enable_loader']) ? $general_settings[0]['enable_loader'] : true;

	@endphp

	@if (!empty($enable_loader) && ($enable_loader === true || $enable_loader === 'true'))

		<div class="preloader-outer">

			<div class="preloader-holder">

				<div class="loader"></div>

			</div>

		</div>

	@endif

	<div id="wt-wrapper" class="wt-wrapper wt-haslayout">

		<div class="wt-contentwrapper">

			@yield('header')

			@yield('slider')

			@yield('main')

			@yield('footer')

		</div>

	</div>
	@guest
		<div class="modal fade bg-transparent" id="modalSignIn" tabindex="-1" aria-labelledby="modalSignInHeading" aria-modal="true" role="dialog">
			<div class="modal-dialog modal-md modal-dialog-centered" role="document">
				<div class="modal-content rounded-top-start-3 rounded-bottom-end-3">
					<div class="modal-body">
						<!-- Close -->
						<button class="btn-close" data-dismiss="modal" type="button" aria-label="Close"></button>

						<!-- Heading -->
						<h1 class="mb-4 text-center" id="modalSignInHeading" v-if="!needVerify">
							{{{trans('lang.sign_in') }}}
						</h1>
						<h3 class="mb-4 text-center" id="modalSignInHeading" v-if="needVerify">
							Account Verification
						</h3>
						<!-- Text -->
						<p class="text-center" v-if="!needVerify">
							Sie haben noch kein Konto?
							<a href="{{{ route('register') }}}" class="text-primary">{{{ trans('lang.create_account') }}}</a>
						</p>
						
						<p class="text-center" v-if="needVerify">
							@{{ verifyMsg }}
						</p>
						<div class="alert alert-success fade show" role="alert" v-if="verificationSuccess">
							<strong>Congrats!</strong> @{{ verificationSuccessMsg }}
						</div>
						<!-- Form -->
						<form class="mb-6 text-center" @submit.prevent="signIn">
							@csrf
							<input type="hidden" name="redirect" id="loginRedirect">
							<div v-if="!needVerify">
								<!-- Email -->
								<div class="form-group">
									<div class="input-group signinform">
										<input id="email" type="email" name="email" class="form-control" 
										:class="{'is-invalid' : errEmail.error==true}" placeholder="Email" autofocus v-model="loginForm.email">
									</div>
									<div class="invalid-feedback d-block" role="alert" v-if="errEmail.error">
										@{{ errEmail.msg }}
									</div>
									
								</div>
								<!-- Password -->
								<div class="form-group">
									<div class="input-group signinform">
										<input id="password" type="password" name="password" class="form-control" :class="{'is-invalid' : passError.error==true}" placeholder="Password" v-model="loginForm.password">
										<div class="invalid-feedback d-block" role="alert" v-if="passError.error">
											@{{ passError.msg }}
										</div>

									</div>
								</div>
								<div class="form-group">
									<span class="text-left">
										<label class="" for="remember">
											<input id="remember" type="checkbox" name="remember" v-model="loginForm.remember"> &nbsp;{{{ trans('lang.keep_me_logged_in') }}}
										</label>
									</span>
								</div>
								<!-- Button -->
								<button class="btn btn-lg w-50 btn-primary lift" type="submit" :disabled="isLoginBusy==true">
									<span v-if="!isLoginBusy">{{{ trans('lang.sign_in') }}}</span>
									<span v-if="isLoginBusy" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
								</button>
								<!-- Link -->
								<div class="mt-4 text-center">
									@if (Route::has('password.request'))

										<a href="{{ route('password.request') }}" class="wt-forgot-password text-primary krtzy">{{{ trans('lang.forget_pass') }}}</a>

									@endif
								</div>
							</div>


							<div v-if="needVerify">
								<!-- Verify Code -->
								<div class="form-group">
									<div class="input-group signinform">
										<input id="code" type="text" class="form-control" placeholder="Verification code" v-model="code" :class="{'is-invalid' : codeError.error==true}">
										<div class="input-group-append">
											<button type="button" class="eye-btn"><i class="fas fa-key"></i></button>
										</div>
									</div>
									<span class="invalid-feedback d-block" role="alert" v-if="codeError.error">
										@{{ codeError.msg }}
									</span>
								</div>
								<!-- Button -->
								<button @click.prevent="verifyCode" class="btn w-100 btn-primary" type="button" :disabled="isVerifyBusy==true">
									<span v-if="!isVerifyBusy">Verify</span>
									<span v-if="isVerifyBusy" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
								</button>
								<!-- Link -->
								<div class="mt-4 text-center">
									<button @click.prevent="resendVerifyCode" href="#" class="btn text-primary" v-if="!codeSent" :disabled="sendingCodeLoader==true">
										<span v-if="!sendingCodeLoader">Resend Code</span>
										<span v-if="sendingCodeLoader" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
									</button>
									<span v-if="codeSent" class="text-muted">Verfication code has been sent. Check your email</span>
								</div>
								<div class="mt-2 text-center">
									<a href="#" @click.prevent="needVerify=false" class="text-muted"><i class="fas fa-arrow-left"> &nbsp; Go back to login page</i></a>
								</div>
							</div>

							
						</form>

						
						
					</div>
				</div>
			</div>
		</div>
	@endguest
	
	<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
	
	<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
	// reCAPTCHA API
	<script src="https://www.google.com/recaptcha/api.js"></script>
	
	@yield('bootstrap_script')
	<script src="{{ asset('js/app.js') }}"></script>
	
	<script src="{{ asset('js/vendor/jquery-library.js') }}"></script>
	
    <script src="{{ asset('js/jquery-ui-min.js') }}"></script>

	<script src="{{ asset("js/chosen.min.js") }}"></script>
    @stack('scripts')
	<script src="{{ asset('js/aos.js') }}"></script>
	<script>
		// AOS Plugin
		$(window).on("load", function() {
				AOS.init();
				setTimeout(() => {AOS.refresh();}, 500);
				setTimeout(() => {AOS.refresh();}, 1000);
				setTimeout(() => {AOS.refresh();}, 1500);
		});
		$(window).on("scroll", function() {
				AOS.refresh();
		});
		// Chosen Select Plugin
		if($('.chosen-select').length){
            $(".chosen-select").chosen();
        };
		// Loader
        jQuery(window).load(function () {			
			jQuery(".preloader-outer").delay(500).fadeOut();			
            jQuery(".pins").delay(500).fadeOut("slow");			
        });
		// Authenticate user
		@if (auth()->check())
				window.authUser = {!! json_encode(auth()->user()->id) !!}; 
		@else
				window.authUser = null;
		@endif
		// multi-level dropdown 
		$(document).ready(function() {
			$(".dropright > div").on("click", function(o) {
				// open and close same dropdown
				// remove from all dropdown-menu the class show
				$(this).next("div").hasClass("show") ? $(this).removeClass("show") : $(".dropright >.dropdown-menu").each(function() {
				$(this).removeClass("show")
				// toggle dropdown on this element
				}), $(this).next("div").toggleClass("show"), o.stopPropagation(), o.preventDefault()
			})
		});
		// To keep URLs intact with link inside multi-level dropdown
		$('.dropright > .dropdown-menu > a').click(function () {
			window.location = $(this).attr('href');
		});
		/**
		 * This function adds or removes the class "dropdown-toggle justify-content-between align-items-center"
		 * from the `a` element with the class "nav-link" based on the screen size.
		 * If the screen size is less than 1024px, the class is added.
		 * If the screen size is greater than or equal to 1024px, the class is removed.
		 */
		function addDropdownToggleClass() {
		// Get the screen width
		var screenWidth = window.innerWidth;

		// Get all nav link elements
		var navLinks = document.querySelectorAll('.nav-link');

		// If the screen width is less than 1024px
		if (screenWidth < 1024) {
			// Add the dropdown toggle class to all nav link elements
			navLinks.forEach(function(navLink) {
			navLink.classList.add('dropdown-toggle', 'd-flex', 'justify-content-between', 'align-items-center');
			});
		} else {
			// Remove the dropdown toggle class from all nav link elements
			navLinks.forEach(function(navLink) {
			navLink.classList.remove('dropdown-toggle', 'd-flex', 'justify-content-between', 'align-items-center');
			});
		}
		}
		// call the function on page load
		window.addEventListener('load', addDropdownToggleClass);
		// call the function when the screen size changes
		window.addEventListener('resize', addDropdownToggleClass);

		// reCAPTCHA callback function to handle the token
		function onSubmit(token) {
			document.getElementById("register_form").submit();
		}
	</script>
</body>
</html>

