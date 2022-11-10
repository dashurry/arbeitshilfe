<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Arbeits-hilfe | Wie funktioniert</title>

    <!-- SEO Meta Tags-->
    <meta name="description" content="Arbeits-hilfe - Such- & Angebotsportal">
    <meta name="keywords" content="bootstrap, business, creative agency, construction, services, e-commerce, mobile app showcase, multipurpose, shop, ui kit, marketing, seo, landing, html5, css3, javascript, gallery, slider, touch, creative">
    <meta name="author" content="Arbeits-hilfe">

    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset("images/favicons/apple-touch-icon.png") }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset("images/favicons/favicon-32x32.png") }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset("images/favicons/favicon-16x16.png") }}">
    <link rel="manifest" href="{{ asset("images/favicons/site.webmanifest") }}">
    <link rel="mask-icon" color="#5bbad5" href="{{ asset("images/favicons/safari-pinned-tab.svg") }}">
    <meta name="msapplication-TileColor" content="#766df4">
    <meta name="theme-color" content="#ffffff">

    <!-- Vendor Styles-->
    <link rel="stylesheet" media="screen" href="{{ asset('css/simplebar.min.css') }}" />
    <link rel="stylesheet" media="screen" href="{{ asset('css/aos.css') }}" />
    <link rel="stylesheet" media="screen" href="{{ asset('css/tiny-slider.css') }}" />
    <link rel="stylesheet" media="screen" href="{{ asset('css/lightgallery.min.css') }}" />
    <link rel="stylesheet" media="screen" href="{{ asset('css/fontawesome/fontawesome.min.css') }}" />
    <link rel="stylesheet" media="screen" href="{{ asset('css/fontawesome/fontawesome-all.min.css') }}" />
    <link rel="stylesheet" media="screen" href="{{ asset('css/aboutusHeader.css') }}">
    <link rel="stylesheet" media="screen" href="{{ asset('css/themify-icons.css') }}">
    <link rel="stylesheet" media="screen" href="{{ asset('css/linearicons.css') }}">
    <link rel="stylesheet" media="screen" href="{{ asset('css/responsiveAboutUs.css') }}">

    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="{{ asset('css/theme.min.css') }}">

    <!-- Page loading styles-->
    <style>
        /*Preloader Style*/
        .preloader-outer {
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            position: fixed;
            background: #fff;
        }
        .loader {
            width: 15px;
            height: 15px;
            border-radius: 50%;
            position: relative;
            -webkit-animation: load3 .5s infinite linear;
            animation: load3 0.8s infinite linear;
            -webkit-transform: translateZ(0);
            -ms-transform: translateZ(0);
            transform: translateZ(0);
            background: #ff5851;
            background: -moz-linear-gradient(left, #ff5851 10%, rgba(255, 88, 81, 0) 42%);
            background: -webkit-linear-gradient(left, #ff5851 10%, rgba(255, 88, 81, 0) 42%);
            background: -o-linear-gradient(left, #ff5851 10%, rgba(255, 88, 81, 0) 42%);
            background: -ms-linear-gradient(left, #ff5851 10%, rgba(255, 88, 81, 0) 42%);
            background: linear-gradient(to right, #ff5851 10%, rgba(255, 88, 81, 0) 42%);
        }
        .loader:before {
            width: 50%;
            height: 50%;
            border-radius: 100% 0 0 0;
            position: absolute;
            top: 0;
            left: 0;
            content: '';
        }
        .loader:after {
            background: #fff;
            width: 75%;
            height: 75%;
            border-radius: 50%;
            content: '';
            margin: auto;
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
        }
        .preloader-holder{
            top: 50%;
            left: 50%;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            position: relative;
            background: #fff;
            margin: -15px 0 0 -15px;
            -webkit-box-shadow: 0 0 20px 0 rgba(0,0,0,0.25);
            box-shadow: 0 0 20px 0 rgba(0,0,0,0.25);
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-align-content: center;
            -ms-flex-line-pack: center;
        }
        @-webkit-keyframes load3 {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
        }
        @keyframes load3 {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
        }
        .preloader-section{
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            position: fixed;
            background: rgba(0,0,0,0.4);
        }
        .highlight-container, .highlight {
        position: relative;
        }

        .highlight-container {
        display: inline-block;
        }
        .highlight-container:before {
        content: " ";
        display: block;
        height: 90%;
        width: 100%;
        margin-left: -3px;
        margin-right: -3px;
        position: absolute;
        background: rgba(234, 221, 6, 0.3);
        transform: rotate(2deg);
        top: -1px;
        left: -1px;
        border-radius: 20% 25% 20% 24%;
        padding: 10px 3px 3px 10px;
        }
        .pt-14{
            padding-top: 14rem !important;
        }
        .wt-header .wt-navigation > ul > li > a {
            color: black;
        }
        .wt-header .wt-navigation > ul > li > a:hover {
            color: black;
        }
        .greenDots li{
          margin-top: 0.5rem!important;
        }
        li::marker {
          color: #5ad9ac;
        }
        .cs-video-btn{
          background-color: #5ad9ac;
        }
        .cs-video-btn:hover{
          box-shadow: 0 0 0 1rem #d8f5eb;
        }
        .crunch-button {
    text-align: center;
    -webkit-transition: all .6s ease!important;
    transition: all .6s ease!important;
    font-weight: 700;
    font-size: 1rem
}

.crunch-button__full-background {
    overflow: hidden;
    position: relative;
    z-index: 1;
    background-color: transparent;
    display: -webkit-inline-box;
    display: inline-flex;
    -webkit-box-align: center;
    align-items: center;
    -webkit-box-pack: center;
    justify-content: center;
    border-radius: 100rem;
    min-width: 100%;
    padding: .875rem 2rem
}

@media (min-width: 768px) {
    .crunch-button__full-background {
        min-width:15rem
    }
}

@media (min-width: 992px) {
    .crunch-button__full-background {
        min-width:17.5rem
    }
}

@media (min-width: 1200px) {
    .crunch-button__full-background {
        min-width:20rem
    }
}

.crunch-button__full-background:after,.crunch-button__full-background:before {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    border-radius: 100rem
}

.crunch-button__full-background:after {
    border: 1px solid transparent;
    left: 0;
    bottom: 0;
    width: 100%
}

.crunch-button__full-background:before {
    display: block;
    height: 100%;
    z-index: -1;
    -webkit-transition: all .4s ease-in-out;
    transition: all .4s ease-in-out
}

.crunch-button__full-background:focus:before,.crunch-button__full-background:hover:before {
    left: 0;
    right: auto
}

.crunch-button__full-background:focus:before,.crunch-button__full-background:hover:before {
    width: 0;
    right: 0;
    left: auto
}

.crunch-button__full-background:before {
    width: 100%;
    left: 0;
    right: auto
}

.crunch-button__full-background--secondary-color {
    color: #fff
}

.crunch-button__full-background--secondary-color:after {
    border-color: #273152
}

.crunch-button__full-background--secondary-color:before {
    background-color: #273152
}

.crunch-button__full-background--secondary-color:focus,.crunch-button__full-background--secondary-color:hover {
    background-color: transparent;
    color: #273152
}
.crunch-button__full-background:after,.crunch-button__full-background:before {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    border-radius: 100rem
}

.crunch-button__full-background:after {
    border: 1px solid transparent;
    left: 0;
    bottom: 0;
    width: 100%
}

.crunch-button__full-background:before {
    display: block;
    height: 100%;
    z-index: -1;
    -webkit-transition: all .4s ease-in-out;
    transition: all .4s ease-in-out
}

.crunch-button__full-background:focus:before,.crunch-button__full-background:hover:before {
    left: 0;
    right: auto
}

.crunch-button__full-background:focus:before,.crunch-button__full-background:hover:before {
    width: 0;
    right: 0;
    left: auto
}

.crunch-button__full-background:before {
    width: 100%;
    left: 0;
    right: auto
}

.crunch-button__full-background--primary-color {
    color: #fff
}

.crunch-button__full-background--primary-color:after {
    border-color: #5ad9ac
}

.crunch-button__full-background--primary-color:before {
    background-color: #5ad9ac
}

.crunch-button__full-background--primary-color:focus,.crunch-button__full-background--primary-color:hover {
    background-color: transparent;
    color: #5ad9ac
}
@media (min-width: 1200px) {
  .c-mt-6 {
      margin-top: 3rem
  }
}
a:-webkit-any-link {
    text-decoration: none
}

a:focus,a:hover {
    text-decoration: none;
    color: currentColor;
    cursor: pointer
}

a:active,a:focus {
    outline: none
}
.link {
  position: relative;
  transition: -webkit-clip-path 275ms ease;
  transition: clip-path 275ms ease;
  transition: clip-path 275ms ease, -webkit-clip-path 275ms ease;
}
.link:hover span::before, .link:focus span::before {
  -webkit-clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
          clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
}
.link span {
  position: relative;
  display: inline-block;
  color: #5ad9ac;
}
.link span::before {
  position: absolute;
  content: attr(data-content);
  color: #5ad9ac;
  text-decoration: underline;
  -webkit-text-decoration-color: #5ad9ac;
          text-decoration-color: #5ad9ac;
  -webkit-clip-path: polygon(0 0, 0 0, 0% 100%, 0 100%);
          clip-path: polygon(0 0, 0 0, 0% 100%, 0 100%);
  transition: -webkit-clip-path 275ms ease;
  transition: clip-path 275ms ease;
  transition: clip-path 275ms ease, -webkit-clip-path 275ms ease;
}
.wt-username h3{
  color: black !important;
}
.wt-username span{
  color: black !important;
}
#menu-footer-navigation{
  font-size: 1rem;
  font-weight: 600;
  margin-top: 0!important;
  padding-left: 0;
  list-style: none;
}
#menu-footer-navigation li{
  margin-top: 0!important;
  width: auto;
  list-style: none;
}
#menu-footer-navigation li a{
  padding-left: 1.5rem!important;
  padding-right: 1.5rem!important;
  color: #273152;
}
#menu-footer-navigation li a:hover{
  color: #5ad9ac;
}
.main-footer__second-stage{
  border-top: 1px solid rgba(39,49,82,.15);
    color: rgba(39,49,82,.5);
    font-size: .75rem;
    padding-top: 2rem;
    margin-top: 2rem;
}
.list-unstyled {
    padding-left: 0;
    list-style: none;
}
.list-unstyled li{
  list-style: none;
  display: flex;
}
.list-unstyled li a{
  display: block;
}
#menu-legal-navigation li a{
    color: rgba(39,49,82,.5);
}
#menu-legal-navigation li a:hover{
  color: #5ad9ac;
}
#menu-legal-navigation li a:after{
  margin-left: 1rem!important;
    margin-right: 1rem!important;
    content: "|";
}
      </style>
  
      <!-- Page loading scripts-->
      <script>
        (function () {
          window.onload = function () {
            var preloader = document.querySelector('.preloader-outer');
            setTimeout(function () {
              preloader.remove();
            }, 1000);
          };
        })();
      </script>

</head>

<!-- Body-->
<body>
 
    <!-- Page loading spinner-->
    <div class="preloader-outer">
        <div class="preloader-holder">
            <div class="loader"></div>
        </div>
    </div>

<!-- Main content-->
<!-- Wraps everything except footer to push footer to the bottom of the page if there is little content -->
<main class="cs-page-wrapper position-relative">

<header id="wt-header" class="wt-header wt-headereleven wt-headerwrap">
    <div class="wt-navigationarea" id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><strong class="wt-logo"><a
                            href="https://arbeitshilfe.website">
                            <img width="120" src="{{ asset("images/arbeitshilfetext.svg") }}" alt="Logo"></a></strong>
                    <div class="wt-rightarea">
                        <nav id="wt-nav" class="wt-nav navbar-expand-xl"><button type="button" data-toggle="collapse"
                                data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                aria-label="Toggle navigation" class="navbar-toggler"><i
                                    class="lnr lnr-menu"></i></button>
                            <div id="navbarNav" class="collapse navbar-collapse wt-navigation">
                                <ul class="navbar-nav">
                                  <li class=" " style="order: 2;"><a
                                    href="{{ route('main.about') }}">Über uns</a></li>
                                    <li class=" " style="order: 99;margin-right: 2.5rem;"><a
                                            href="{{ route('main.category') }}">Dienstleistungen</a>
                                    </li>
                                    @auth
                                    <li style="order: 2;"><a
                                            href="https://arbeitshilfe.website/search-results?type=freelancer">
                                            Freelancer anzeigen
                                        </a></li>
                                    <li style="order: 4;"><a href="https://arbeitshilfe.website/search-results?type=job">
                                            Jobs durchsuchen
                                        </a></li>
                                    <li style="order: 5;"><a
                                            href="https://arbeitshilfe.website/search-results?type=service">
                                            Dienste durchsuchen
                                        </a></li>
                                        @endauth
                                </ul>
                            </div>
                        </nav>
                        @auth
                                        @php
                                            $user = !empty(Auth::user()) ? Auth::user() : '';
                                            $role = !empty($user) ? $user->getRoleNames()->first() : array();
                                            $profile = \App\User::find(Auth::user()->id)->profile;
                                            $user_image = !empty($profile) ? $profile->avater : '';
                                            $employer_job = \App\Job::select('status')->where('user_id', Auth::user()->id)->first();
                                            $profile_image = !empty($user_image) ? '/uploads/users/'.$user->id.'/'.$user_image : 'images/user-login.png';
                                            $payment_settings = \App\SiteManagement::getMetaValue('commision');
                                            $payment_module = !empty($payment_settings) && !empty($payment_settings[0]['enable_packages']) ? $payment_settings[0]['enable_packages'] : 'true';
                                            $employer_payment_module = !empty($payment_settings) && !empty($payment_settings[0]['employer_package']) ? $payment_settings[0]['employer_package'] : 'true';
                                        @endphp
                                        <div class="wt-userlogedin" style="display: block;">
                                            <figure class="wt-userimg">
                                                <img src="{{{ asset(Helper::getImage('uploads/users/' . Auth::user()->id, $profile->avater, '' , 'user.jpg')) }}}" alt="{{{ trans('lang.user_avatar') }}}">
                                            </figure>
                                            <div class="wt-username">
                                                <h3>{{{ Helper::getUserName(Auth::user()->id) }}}</h3>
                                                <span>{{{ !empty(Auth::user()->profile->tagline) ? str_limit(Auth::user()->profile->tagline, 26, '') : Helper::getAuthRoleName() }}}</span>
                                            </div>
                                            @if (file_exists(resource_path('views/extend/back-end/includes/profile-menu.blade.php'))) 
                                                @include('extend.back-end.includes.profile-menu')
                                            @else 
                                                @include('back-end.includes.profile-menu')
                                            @endif
                                        </div>
                                    @endauth
                        @guest
                        <div class="wt-loginarea">
                            <div class="wt-loginoption wt-loginoptionvtwo"><a href="javascript:void(0);"
                                    id="wt-loginbtn" class="wt-btn">Anmelden</a>
                                <div class="wt-loginformhold">
                                    <div class="wt-loginheader"><span>Anmelden</span>
                                        <a href="javascript:;"><i class="fa fa-times"></i></a></div>
                                    <form method="POST" action="{{ route('login') }}"
                                        class="wt-formtheme wt-loginform do-login-form">
                                            @csrf
                                        <fieldset>
                                            <div class="form-group"><input id="email" type="email" name="email"
                                                    placeholder="Email" required="required" autofocus="autofocus"
                                                    class="form-control"></div>
                                            <div class="form-group"><input id="password" type="password" name="password"
                                                    placeholder="Password" required="required" class="form-control">
                                            </div>
                                            <div class="wt-logininfo"><button href="javascript:;" type="submit"
                                                    class="wt-btn do-login-button">Anmelden</button> <span
                                                    class="wt-checkbox"><input id="remember" type="checkbox"
                                                        name="remember"> <label for="remember">Lass mich angemeldet</label></span></div>
                                        </fieldset>
                                        <div class="wt-loginfooterinfo"><a
                                                href="https://arbeitshilfe.website/password/reset"
                                                class="wt-forgot-password">Passwort vergessen?</a> <a
                                                href="https://arbeitshilfe.website/register">Benutzerkonto anlegen</a></div>
                                    </form>
                                </div>
                            </div> <a href="https://arbeitshilfe.website/register" class="wt-btn">Jetzt beitreten</a>
                        </div>   
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<section class="d-flex min-vh-100 pt-lg-6 pt-5 jarallax" data-jarallax="" data-speed="0.8">
    <div class="container d-flex flex-column justify-content-lg-around justify-content-center py-5">
      <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-10 order-lg-1 order-2 mx-auto text-lg-left text-center align-self-md-center">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-alt breadcrumb-light justify-content-center mb-sm-4">
                <li class="breadcrumb-item">
                    <a href="https://arbeitshilfe.website/">
                        <i class="cxi-home text-dark"></i>
                    </a>
                </li>
                <li class="breadcrumb-item active text-dark" aria-current="page">Wie
                  funktioniert Arbeits-Hilfe</li>
            </ol>
        </nav>
          <h1 class="display-3 mb-lg-5 pb-lg-3 text-secondary aos-init aos-animate" style="font-size: 3.25rem;font-weight: 300;" data-aos="fade-up">
            Opportunity is <span class="text-dark">Everywhere</span>
          </h1>
          <a href="javascript:void(0);" data-aos="fade-up" class="crunch-button crunch-button__full-background crunch-button__full-background--primary-color c-mt-6 d-none d-md-inline-flex aos-init aos-animate" rel="nofollow" id="mehr">Mehr...</a>
          <div class="d-sm-inline-block d-block mt-sm-0 mt-4 ml-sm-4 pl-lg-3 pl-sm-2 aos-init aos-animate" id="video-gallery" data-aos="fade-up">
            <a href="https://youtu.be/I7yVBOrqqW0" class="cs-video-btn mr-lg-3 mr-2" data-gallery-video></a>
            <span class="font-size-sm font-weight-bold text-dark">Play video</span>
        </div>
        </div>
        <div class="col-lg-6 col-md-8 col-sm-10 order-lg-2 order-1 mx-auto mb-lg-0 mb-sm-5 mb-4">
          <img width="1500" height="865" id="freepik_stories-interview" alt="">
        </div>
      </div>
    </div>
</section>

  <section style="background: #f6f7fa !important;padding-top: 5rem;" id="firstStep">
      <div class="container py-lg-4" style="max-width: 1140px;">
          <h2 class="h1 mb-0 text-center aos-init aos-animate" style="font-weight: 300;" data-aos="fade-up">So läuft das bei uns</h2>
          {{-- Step 1 --}}
          <div style="padding-top: 6.25rem;padding-bottom: 6.25rem;">
            <div class="row align-items-center">
              <div class="col-md-6 order-md-2 aos-init aos-animate" data-aos="zoom-in">
                <img width="420" height="348" src="{{ asset("images/accept-tasks-animate.svg") }}" class="d-block mx-auto" alt="">
                </div>
                <div class="col-md-6 order-md-1">
                  <div class="row no-gutters">
                    <div class="col col-auto">
                      <span class="d-block text-primary position-relative aos-init aos-animate" style="line-height: 1.1;font-size: 2rem;color: #5ad9ac!important;font-weight: 700!important;margin-left: 2rem;margin-right: 2rem;" data-aos="zoom-in">#1
                        <img src="{{ asset("images/decor1.svg") }}" alt="" class="position-absolute d-none" style="display: block!important;width: 6.875rem;height: 6.875rem;transform: translate(-40%,-30%);opacity: .3;top: 0;left: 0;max-width: 300%;" width="132" height="102">
                        </span>
                      </div>
                      <div class="col">
                        <div class="position-relative" style="max-width: 20.5rem;padding-right: 2rem;z-index: 1;">
                          <h3 class="mb-0 aos-init aos-animate" style="font-size: 2rem;font-weight: 300;color:#323232;line-height: 1.2;" data-aos="fade-up">Starten Sie von jedem Ort aus</h3>
                          <div class="mt-4 aos-init aos-animate" data-aos="fade-up">
                            <p class="mb-0" style="line-height: 1.75;">Unser Anmeldeprozess ist einfach. Sie können auf Ihrem Telefon, Ihrem Laptop oder in der Filiale beginnen.</p>
                            <p class="mb-0" style="margin-top: 2rem;line-height: 1.75;">Wenn Sie bereit sind, klicken Sie auf den Link unten
                              <br>
                                <a href="https://arbeitshilfe.website/register" class="link"><span data-content="Durchstarten">Durchstarten</span></a>
                              </p>
                            </div>
                            <img src="{{ asset("images/stepdots1.svg") }}" class="d-block position-absolute" style="width: auto;left: -3rem;bottom: -10rem;max-width: calc(100vw - 3rem);height: 245px !important;z-index: -1;" width="575.25" height="245">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
          {{-- Step 2 --}}
          <div style="padding-top: 6.25rem;padding-bottom: 6.25rem;">
            <div class="row align-items-center">
              <div class="col-md-6 aos-init aos-animate" data-aos="zoom-in">
                <img width="420" height="251" src="{{ asset("images/Messaging fun-pana.svg") }}" class="d-block mx-auto" alt="">
                </div>
                <div class="col-md-6">
                  <div class="row no-gutters">
                    <div class="col col-auto">
                      <span class="d-block text-primary position-relative aos-init aos-animate" style="line-height: 1.1;font-size: 2rem;color: #5ad9ac!important;font-weight: 700!important;margin-left: 2rem;margin-right: 2rem;" data-aos="zoom-in">#2
                        <img src="{{ asset("images/decor2.svg") }}" alt="" class="position-absolute d-none" style="display: block!important;width: 6.875rem;height: 6.875rem;transform: translate(-25%,-45%);opacity: .3;top: 0;left: 0;max-width: 300%;">
                        </span>
                      </div>
                      <div class="col">
                        <div class="position-relative" style="max-width: 20.5rem;padding-right: 2rem;">
                          <h3 class="mb-0 aos-init aos-animate" data-aos="fade-up" style="font-size: 2rem;font-weight: 300;color:#323232;line-height: 1.2;">Sagen Sie uns, wer Sie sind</h3>
                          <div class="mt-4 aos-init aos-animate" data-aos="fade-up">
                            <p class="mb-0">Alles, was wir für den Anfang brauchen, ist:</p>
                            <div>
                              <ul class="greenDots" style="margin-top: 1.5rem!important;">
                                <li>Social Security</li>
                                <li>Bankkontoinformationen</li>
                                <li>Kredit-/Debitkarte</li>
                                <li>Älter als 18 Jahre sein</li>
                              </ul>
                            </div>
                            <p style="margin-top: 2em;">Ihre Informationen werden nicht weitergegeben oder an Dritte verkauft!</p>
                          </div>
                            <img src="{{ asset("images/stepdots2.svg") }}" class="d-block position-absolute" style="left: -190%;bottom: -9rem;max-width: calc(100vw - 3rem);width: auto;height: 295px;" width="579" height="295">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
          </div>
                  {{-- Step 3 --}}
                  <div style="padding-top: 6.25rem;padding-bottom: 6.25rem;">
                    <div class="row align-items-center">
                      <div class="col-md-6 order-md-2 aos-init aos-animate" data-aos="zoom-in">
                        <img width="420" height="296" src="{{ asset("images/Payment Information-pana.svg") }}" class="d-block mx-auto" alt="Test">
                        </div>
                        <div class="col-md-6 order-md-1">
                          <div class="row no-gutters">
                            <div class="col col-auto">
                              <span class="d-block text-primary position-relative aos-init aos-animate" style="line-height: 1.1;font-size: 2rem;color: #5ad9ac!important;font-weight: 700!important;margin-left: 2rem;margin-right: 2rem;" data-aos="zoom-in">#3
                                <img src="{{ asset("images/decor3.svg") }}" class="d-none position-absolute" style="display: block!important;width: 6.875rem;height: 6.875rem;transform: translate(-40%,-30%);opacity: .3;top: 0;left: 0;max-width: 300%;" width="114" height="110">
                                </span>
                              </div>
                              <div class="col">
                                <div class="position-relative" style="max-width: 20.5rem;padding-right: 2rem;">
                                  <h3 class="mb-0 aos-init aos-animate" data-aos="fade-up" style="font-size: 2rem;font-weight: 300;color:#323232;line-height: 1.2;text-transform: none;">Wählen Sie eine Zahlungsoption</h3>
                                  <div class="mt-4 aos-init aos-animate" data-aos="fade-up">
                                    <p class="mb-0" style="line-height: 1.75;">Wir sind flexibel und versuchen, mit Ihnen zu arbeiten. Es werden Ihnen mehrere Optionen angeboten, die alle Anreize für einen frühen .... bieten:</p>
                                    <div>
                                      <ul class="greenDots" style="margin-top: 1.5rem!important;">
                                        <li>eine Vielzahl von ....</li>
                                        <li>eine Vielzahl von ....</li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
      </div>
  </section>

  <section class="text-white overflow-hidden text-center text-md-left" style="background-position: left 75% bottom -50%;min-height: 25rem;background-image: url({{ asset("images/bgd__pattern.svg") }});background-repeat: no-repeat;background-color: #5ad9ac!important;">
    <div class="container" style="max-width: 1140px;">
      <div class="row">
        <div class="col-md-6 order-md-2">
          <div style="padding-top: 6.25rem;padding-left: 3rem;padding-bottom: 5rem;">
            <h2 data-aos="fade-up" class="aos-init aos-animate text-white" style="font-size: 2.625rem;margin-bottom: 0;font-weight: 600;line-height: 1.2;">Made for you</h2>
            <div class="aos-init aos-animate" data-aos="fade-up" style="line-height: 1.5;font-size: 1.25rem;margin-top: 1.5rem;">
              
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam justo mi, aliquet a sollicitudin vitae, gravida eget lacus.
                </p>
                <p>Ready?</p>
              </div>
              <a href="https://application.kafene.com/applications/new" target="_blank" data-aos="fade-up" class="crunch-button crunch-button__full-background crunch-button__full-background--secondary-color c-mt-6 aos-init aos-animate" rel="nofollow">Start Now</a>
            </div>
          </div>
          <div class="col-md-6 order-md-1">
            <div class="position-relative" style="padding-top: 0!important;margin-top: 1.5rem;margin-bottom: 1.5rem;">
              <img width="1342" height="1490" src="{{ asset("images/applicationImage.png") }}" style="width: 120%;max-width: 120%;right: 0;height: auto!important;" class="d-block position-absolute aos-init aos-animate" alt="Footer Call to Action Image" data-aos="fade-up">
              </div>
            </div>
          </div>
        </div>
      </section>
</main>

<div class="js-main-footer-wrapper">
	<footer class="text-center" style="padding-top: 5rem;padding-bottom: 5rem;">
		<div class="container" style="max-width: 1140px;">
			<div class="row align-items-center justify-content-between">
				<div class="col-12 col-md-auto">
					<a href="#" class="d-block mx-auto d-flex align-items-center justify-content-center" style="width: 9rem;height: 3rem;">
						<img src="{{ asset("images/arbeitshilfetext.svg") }}" alt="Arbeitshilfe" class="d-block adjustable-element" style="max-width: 100%;max-height: 100%;width: auto;height: auto;flex-shrink: 0;">
						</a>
					</div>
					<div class="col-12 col-md-auto">
						<div>
							<ul id="menu-footer-navigation" class="d-flex align-items-center justify-content-center flex-wrap list-unstyled mb-0">
								<li id="menu-item-113">
									<a href="https://arbeitshilfe.website/" aria-current="page" style="color: #5ad9ac;padding-left: 0!important;padding-right: 1.5rem!important;">Home</a>
								</li>
								<li id="menu-item-112">
									<a href="https://arbeitshilfe.website/page/uber-uns">Über uns</a>
								</li>
								<li id="menu-item-110">
									<a href="https://arbeitshilfe.website/page/kontakt">Kontakt</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="main-footer__second-stage">
					<div class="row justify-content-between">
						<div class="col-12 col-md-auto order-md-2">
							<div class="menu-legal-navigation-container">
								<ul id="menu-legal-navigation" class="list-unstyled d-flex align-items-center justify-content-center flex-wrap">
									<li id="menu-item-104">
										<a href="https://arbeitshilfe.website/terms-conditions">Terms and Conditions</a>
									</li>
									<li id="menu-item-105">
										<a href="https://arbeitshilfe.website/privacy-policy">Privacy Policy</a>
									</li>
									<li id="menu-item-288">
										<a href="https://arbeitshilfe.website/short-code-policies">Short Code Policies</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-12 col-md-auto order-md-1">
							<span class="main-footer__copyrights d-block c-mt-3 c-mt-md-0">© Copyright 2021. All rights reserved.</span>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>   

<!-- Main theme script-->
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/tiny-slider.js') }}"></script>
<script src="{{ asset('js/smooth-scroll.polyfills.min.js') }}"></script>
<script src="{{ asset('js/lightgallery.min.js') }}"></script>
<script src="{{ asset('js/lg-video.min.js') }}"></script>
<script src="{{ asset('js/simplebar.min.js') }}"></script>
<script src="{{ asset('js/progressbar.min.js') }}"></script>
<script src="{{ asset('js/aos.js') }}"></script>
<script src="{{ asset('js/theme.min.js') }}"></script>
<script>
  /* Anmelden button */
  $("#wt-loginbtn").click(function(){
        $(".wt-loginformhold").show();
    });
    $('.wt-loginformhold a').click(function(){
        $(".wt-loginformhold").hide();
    });
/* AOS Animation */
  AOS.init();
  /* Video module */
  lightGallery(document.getElementById('video-gallery'));
  /* scroll to button */
  $("#mehr").click(function (){
          $('html, body').animate({
            scrollTop: $('#firstStep').offset().top -100
          }, 1500);
      });
      /* Hero animation */
      setTimeout(function(){
        $('#freepik_stories-interview').attr('src','{{ asset("images/design-inspiration-animate.svg") }}');
      },2000);
</script>
</body>
</html>