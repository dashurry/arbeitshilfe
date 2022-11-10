<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Arbeits-hilfe | Über uns</title>

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
    <link rel="stylesheet" media="screen" href="{{ asset('css/lightgallery.min.css') }}" />
    <link rel="stylesheet" media="screen" href="{{ asset('css/tiny-slider.css') }}" />
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
        .blockquote::before {
            color: #5ad9ac;
        }
        mark {
        margin: 0 -0.4em;
        padding: 0.1em 0.4em;
        border-radius: 0.8em 0.3em;
        background: transparent;
        background-image: linear-gradient(
            to right,
            rgba(255, 225, 0, 0.1),
            rgba(255, 225, 0, 0.7) 4%,
            rgba(255, 225, 0, 0.3)
        );
        -webkit-box-decoration-break: clone;
        box-decoration-break: clone;
        }
        .wt-header .wt-navigation > ul > li > a {
            color: black;
            opacity: 60%;
        }
        .wt-header .wt-navigation > ul > li > a:hover {
            color: black;
            opacity: 60%;
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
  text-decoration: none;
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
                            <img width="120px" src="{{ asset("images/arbeitshilfetext.svg") }}" alt="Logo"></a></strong>
                    <div class="wt-rightarea">
                        <nav id="wt-nav" class="wt-nav navbar-expand-xl"><button type="button" data-toggle="collapse"
                                data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                aria-label="Toggle navigation" class="navbar-toggler"><i
                                    class="lnr lnr-menu"></i></button>
                            <div id="navbarNav" class="collapse navbar-collapse wt-navigation">
                                <ul class="navbar-nav">
                                    <li class=" " style="order: 2;"><a
                                            href="{{ route('main.howitworks') }}">Wie
                                            funktioniert Arbeits-Hilfe</a></li>
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


    <!-- Page title-->
    <section class="py-md-6 py-5 jarallax" data-jarallax data-speed="0.6">
        <div class="container-fluid pr-lg-0 jarallax">
            <div class="row no-gutters">
                <div class="col-md-5 align-self-center d-flex justify-content-lg-end justify-content-center mt-xl-n5 py-lg-6 text-md-left text-center">
                    <div class="pb-3 pt-md-6" style="max-width: 460px;">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt breadcrumb-light justify-content-center mb-sm-4">
                    <li class="breadcrumb-item">
                        <a href="https://arbeitshilfe.website/">
                            <i class="cxi-home text-dark"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item active text-dark" aria-current="page">Über uns</li>
                </ol>
            </nav>
            <h1 class="display-1 text-dark text-center anim" data-aos="fade-up">ÜBER UNS</h1>
            <p class="mb-lg-1 mb-sm-5 pb-3 lead text-center text-dark opacity-60 ml-0">
                Unser Unternehmen ist seit 2021 neu im Dienstleistung Marketing tätig.</p>
                <p class="mb-lg-1 mb-sm-5 pb-3 lead text-center text-dark opacity-60 ml-0">
                    Wir sind stolz darauf, Ihnen Qualität und vorbildlichen Service zu bieten.</p>
                <p class="mb-lg-6 mb-sm-5 pb-3 lead text-center text-dark opacity-60 ml-0">
                    Wir <mark>vereinen Privatpersonen</mark>, die mit Ihren täglichen Tätigkeit Ihr Finanzielles Budget auf zu bessern.</p>
                    </div>
                </div>
                <div class="col-md-7 mx-lg-auto mx-auto mb-lg-n6">
                        <div class="mb-lg-n6">
                            <div class="mt-lg-n5 position-relative">
                                <img width="1101" height="1197" alt="" id="freepik_stories-interview">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="d-flex flex-md-row flex-column justify-content-between">
                <div class="media flex-lg-row flex-column align-items-center mb-md-0 mb-4 px-lg-0 px-sm-5 px-4 pb-md-0 pb-2 text-lg-left text-center">
                  <img src="{{ asset("images/SEOContent.svg") }}" alt="SEO Content Strategy" class="mr-lg-3 mb-lg-0 mb-3">
                  <div class="media-body pl-lg-1">
                    <h5 class="mb-0 text-dark">SEO Content Strategy</h5>
                  </div>
                </div>
                <span class="divider-vertical divider-light d-md-block d-none"></span>
                <div class="media flex-lg-row flex-column align-items-center mb-md-0 mb-4 px-lg-0 px-sm-5 px-4 pb-md-0 pb-2 text-lg-left text-center">
                  <img src="{{ asset("images/megaphone.svg") }}" alt="SEO Content Strategy" class="mr-lg-3 mb-lg-0 mb-3">
                  <div class="media-body pl-lg-1">
                    <h5 class="mb-0 text-dark">Content Marketing</h5>
                  </div>
                </div>
                <span class="divider-vertical divider-light d-md-block d-none"></span>
                <div class="media flex-lg-row flex-column align-items-center mb-md-0 mb-4 px-lg-0 px-sm-5 px-4 pb-md-0 pb-2 text-lg-left text-center">
                  <img src="{{ asset("images/website.svg") }}" alt="SEO Content Strategy" class="mr-lg-3 mb-lg-0 mb-3">
                  <div class="media-body pl-lg-1">
                    <h5 class="mb-0 text-dark">Website &amp; Social Media Marketing</h5>
                  </div>
                </div>
              </div>
        </div>
    </section>


    <!-- Page content -->
    <!-- Shaped bg -->
    <div class="jarallax" data-jarallax data-speed="0.8">


        <!-- Parallax bg -->
        <div class="jarallax-img" style="background-image: url({{ asset('images/06.svg') }});"></div>

        <section class="container mt-md-4 pt-lg-6 pt-5 pb-4 bg-no-repeat bg-position-center-bottom pt-14" style="background-image: url({{ asset('images/bg-shape-aboutus.svg') }})">
            
    
            <!-- Carousel -->
            
                  <div class="blockquote-card card box-shadow border-0 mb-md-4" data-aos="fade-right">
                    <div class="card-body mt-sm-4 mx-xl-5 mx-sm-4 pb-0">
                      <blockquote class="blockquote">
                        <p class="lead">Eine neugestaltende Plattform, die den Austausch zwischen qualifizierten Freiberufler, Mitglieder
                                        und Auftraggebern in einem vereint: <span class="highlight-container"><span class="highlight">Das ist die Sichtweise von Arbeits-Hilfe.</span></span></p>
                      </blockquote>
                    </div>
                    <div class="card-footer mb-sm-4 mx-xl-5 mx-sm-4 pt-0 border-0 media align-items-center">
                      <img class="mr-3 rounded-circle loaded tns-complete" src="{{ asset("images/CEOimage.jpg") }}" width="72" alt="Author">
                      <div class="media-body">
                        <h3 class="h6 mb-0">Karim Tariq</h3>
                        <span class="font-size-sm text-muted">CEO, Arbeits-Hilfe </span>
                      </div>
                    </div>
                  </div>
          </section>

        {{-- Approach --}}
        <section class="pt-lg-3 pb-4 mt-5">
            <div class="container" data-aos="fade-right">
                <h3 class="h6 mb-2 text-uppercase">Unser Vorgehen</h3>
                <h2 class="h1 mb-lg-5 mb-4">So machen wir das.</h2>
            </div>

            <!-- Carousel -->
            <div class="container px-0" data-aos="fade-left">
                <div class="cs-carousel cs-nav-outside mt-n4 ml-lg-n5">
                    <div class="tns-outer" id="tns1-ow">
                        <div class="tns-nav" aria-label="Carousel Pagination" style="display: none;"><button type="button"
                                data-nav="0" aria-controls="tns1" style="display:none"
                                aria-label="Carousel Page 1 (Current Slide)" class="tns-nav-active"></button><button
                                type="button" data-nav="1" tabindex="-1" aria-controls="tns1" style="display:none"
                                aria-label="Carousel Page 2"></button><button type="button" data-nav="2" tabindex="-1"
                                aria-controls="tns1" style="display:none" aria-label="Carousel Page 3"></button><button
                                type="button" data-nav="3" tabindex="-1" aria-controls="tns1" style="display:none"
                                aria-label="Carousel Page 4"></button></div>

                        <div id="tns1-mw" class="tns-ovh">
                            <div class="tns-inner" id="tns1-iw">
                                <div class="cs-carousel-inner pt-4 pl-lg-5  tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal"
                                    data-carousel-options="{
                          &quot;loop&quot;: false,
                          &quot;controls&quot;: false,
                          &quot;responsive&quot;: {
                            &quot;0&quot;: {
                              &quot;items&quot;: 1
                            },
                            &quot;576&quot;: {
                              &quot;items&quot;: 2
                            },
                            &quot;768&quot;: {
                              &quot;items&quot;: 3
                            },
                            &quot;992&quot;: {
                              &quot;items&quot;: 4
                            }
                          }
                        }" id="tns1" style="transition-duration: 0s; transform: translate3d(0%, 0px, 0px);">

                                    <!-- Horizontal step item -->
                                    <div class="cs-step pt-2 px-3 tns-item tns-slide-active" id="tns1-item0">
                                        <div class="cs-step-head mb-3">
                                            <span class="cs-step-indicator">01</span>
                                            <span class="cs-step-line"></span>
                                        </div>
                                        <div class="cs-step-body">
                                            <h3 class="h5 mb-2">Vertrauen</h3>
                                            <p class="mb-0 text-muted">Arbeits-hilfe ist so konzipiert, dass du jederzeit geschützt bist. <br>Auf Vertrauen und Sicherheit ausgelegt.</p>
                                        </div>
                                    </div>

                                    <!-- Horizontal step item -->
                                    <div class="cs-step pt-2 px-3 tns-item tns-slide-active" id="tns1-item1">
                                        <div class="cs-step-head mb-3">
                                            <span class="cs-step-indicator">02</span>
                                            <span class="cs-step-line"></span>
                                        </div>
                                        <div class="cs-step-body">
                                            <h3 class="h5 mb-2">Netzwerk</h3>
                                            <p class="mb-0 text-muted">Bei Arbeits-Hilfe baue Sie sich ein einzigartiges Nationales
                                                Netzwerk auf, dass für alle Profitabel ist.</p>
                                        </div>
                                    </div>

                                    <!-- Horizontal step item -->
                                    <div class="cs-step pt-2 px-3 tns-item tns-slide-active" id="tns1-item2">
                                        <div class="cs-step-head mb-3">
                                            <span class="cs-step-indicator">03</span>
                                            <span class="cs-step-line"></span>
                                        </div>
                                        <div class="cs-step-body">
                                            <h3 class="h5 mb-2">Unabhängig</h3>
                                            <p class="mb-0 text-muted">Arbeits-Hilfe sichert Ihnen
                                                Unabhängigkeit und selbst Autorität zurück.</p>
                                        </div>
                                    </div>

                                    <!-- Horizontal step item -->
                                    <div class="cs-step pt-2 px-3 tns-item tns-slide-active" id="tns1-item3">
                                        <div class="cs-step-head mb-3">
                                            <span class="cs-step-indicator">04</span>
                                        </div>
                                        <div class="cs-step-body">
                                            <h3 class="h5 mb-2">Freiheit</h3>
                                            <p class="mb-0 text-muted">Setzen Sie Ihre Fähigkeiten für sich selbst ein
                                                und gewinnen Sie dadurch mehr Zeit für Ihre Träume.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Presentation -->
        <section class="container pt-lg-6 pt-5 pb-4 video-container" data-aos="zoom-in">
            <div class="jumbotron position-relative bg-size-cover bg-position-center bg-no-repeat text-center mb-0 py-sm-6 py-5"
                style="background-image: url({{ asset('images/home-background.jpg') }});">
                <div class="bg-overlay rounded opacity-60"></div>
                <div class="bg-overlay-content my-5 py-5" id="video-gallery">
                    <a class="cs-video-btn cs-video-btn-lg my-3" href="https://www.youtube.com/watch?v=Z1xMJmXbUDU&ab_channel=AlexaDigitalMedia" data-gallery-video></a>
                    <div class="pt-1"></div>
                </div>
            </div>
        </section>


        <!-- Core values -->
        <section class="mt-md-4 pt-lg-6 pt-5 pb-md-6 pb-sm-5 pb-4 bg-no-repeat bg-position-center"
            style="background-image: url({{ asset('images/abstract.svg') }});">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <h2 class="h1 mb-5 text-sm-left text-center" data-aos="fade-right">Die Grundwerte, für die wir stehen</h2>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-sm-6 mb-5">
                                <div class="text-sm-left text-center"  data-aos="fade-up">
                                    <img class="mb-4 core-values" src="{{ asset('images/thumbsup.svg') }}" width="48"
                                        alt="Icon box image">
                                    <h3 class="h5 mb-2">Respekt</h3>
                                    <p class="mb-0 text-muted">Zusammen für Vielfalt und Respekt – Faire Geschäfte untereinander – Das Richtige tun.</p>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-5">
                                <div class="text-sm-left text-center"  data-aos="fade-up">
                                    <img class="mb-4 core-values-two" src="{{ asset('images/transparency.svg') }}" width="48"
                                        alt="Icon box image">
                                    <h3 class="h5 mb-2">Transparenz</h3>
                                    <p class="mb-0 text-muted">Wir legen sehr grossen Wert auf Ehrlichkeit
                                        &amp; Offenheit. </p>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-5">
                                <div class="text-sm-left text-center"  data-aos="fade-up">
                                    <img class="mb-4 core-values-three" src="{{ asset('images/commitment.svg') }}" width="48"
                                        alt="Icon box image">
                                    <h3 class="h5 mb-2">Verbindlichkeit</h3>
                                    <p class="mb-0 text-muted">Die Arbeit, zum vereinbarten Zeitpunkt, am richtigen
                                        Ort, sauber &amp; professionell ausführen.</p>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-5">
                                <div class="text-sm-left text-center"  data-aos="fade-up">
                                    <img class="mb-4 core-values-four" src="{{ asset('images/together.svg') }}" width="48"
                                        alt="Icon box image">
                                    <h3 class="h5 mb-2">Zusammenarbeit</h3>
                                    <p class="mb-0 text-muted">Gemeinsam miteinander und nicht
                                        gegeneinander.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Collage -->
        <section class="container pt-lg-6 pt-5 pb-4">
            <div class="row">
                <div class="col-md-3 d-md-block d-flex" data-jarallax-element="-10" data-disable-parallax-down="md">
                    <div class="mb-md-grid-gutter mr-md-0 mr-grid-gutter">
                        <img src="{{ asset('images/Photo1.jpg') }}" alt="Photo 1" class="d-block rounded">
                    </div>
                    <div>
                        <img src="{{ asset('images/Photo2.jpg') }}" alt="Photo 2" class="d-block rounded">
                    </div>
                </div>
                <div class="col-md-4 col-6 mt-sm-n5 mt-n4" data-jarallax-element="15" data-disable-parallax-down="md">
                    <img src="{{ asset('images/Photo3.jpg') }}" alt="Photo 3" class="d-block rounded">
                </div>
                <div class="col-md-5 col-6 align-self-end mt-md-0 mt-sm-n5 mt-n4" data-jarallax-element="-10"
                    data-disable-parallax-down="md">
                    <img src="{{ asset('images/Photo4.jpg') }}" alt="Photo 4" class="d-block rounded">
                </div>
                <div class="col-md-8 col-10 mt-md-n6 mt-sm-n5 mt-n4 mx-auto rounded bg-light box-shadow-sm"
                    data-jarallax-element="-15" data-disable-parallax-down="md">
                    <div class="py-5 px-sm-5 px-4">
                        <h2>Arbeits-Hilfe.ch verbindet</h2>
                        <p class="mb-0 text-muted">Wie oben schon erwähnt, vereinen wir, qualifizierten Freiberufler, Mitglieder &amp; Auftraggeber in
                            einem. Unsere Digitale Portale bietet Ihnen und Ihrer Zukunft einen direkten Weg Ihre
                            Lebensplanung vor dem gewünschten Träumen zu Realisieren.</p>
                    </div>
                </div>
            </div>
        </section>
    </div> <!-- / Shaped bg -->


    <!-- Awards alt (with illustration) -->
    <section class="container mt-md-4 pt-lg-6 pt-5 pb-4">
        <div class="row align-items-center">
            <div class="col-md-3 col-sm-4 col-6 mx-auto mb-sm-0 mb-grid-gutter">
                <div class="cs-parallax mx-auto" id="scene">
                    <div class="cs-parallax-layer" data-depth="0.05"><img src="{{ asset('images/girlholdingawards.svg') }}"
                            alt="Layer-1"></div>
                    <div class="cs-parallax-layer" data-depth="0.15"><img src="{{ asset('images/award1.svg') }}"
                            alt="Layer-2"></div>
                    <div class="cs-parallax-layer" data-depth="0.1"><img src="{{ asset('images/award2.svg') }}"
                            alt="Layer-3"></div>
                </div>
            </div>
            <div class="col-lg-8 offset-lg-1 col-md-9 col-sm-8" data-aos="fade-right">
                <h2 class="h1 mb-lg-5 pb-md-3 text-sm-left text-center">Wir sind stolz auf unsere Visionen.
                </h2>
                <div class="row">
                    <div class="col-md-6 mb-4 pb-2">
                        <div class="media flex-sm-row flex-column align-items-center px-sm-0 px-3 text-sm-left text-center">
                            <img class="mr-sm-3 mb-sm-0 mb-3" src="{{ asset('images/fingerprint---filled-(24x24)@2x.svg') }}" width="40"
                                alt="Clutch">
                            <div class="media-body px-sm-0 px-4">
                                <p class="mb-0">unkompliziert neue Aufträge erhalten</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 pb-2">
                        <div class="media flex-sm-row flex-column align-items-center px-sm-0 px-3 text-sm-left text-center">
                            <img class="mr-sm-3 mb-sm-0 mb-3" src="{{ asset('images/search-2(24x24)@2x.svg') }}" width="40"
                                alt="UpCity">
                            <div class="media-body px-sm-0 px-4">
                                <p class="mb-0">unkompliziert sich als Freiberufler finden lassen</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 pb-2">
                        <div class="media flex-sm-row flex-column align-items-center px-sm-0 px-3 text-sm-left text-center">
                            <img class="mr-sm-3 mb-sm-0 mb-3" src="{{ asset('images/mouse---filled-(24x24)@2x.svg') }}" width="40"
                                alt="Forbes Agency Council">
                            <div class="media-body px-sm-0 px-4">
                                <p class="mb-0">unkompliziert Aufträge inserieren</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 pb-2">
                        <div class="media flex-sm-row flex-column align-items-center px-sm-0 px-3 text-sm-left text-center">
                            <img class="mr-sm-3 mb-sm-0 mb-3" src="{{ asset('images/wallet(24x24)@2x.svg') }}" width="40"
                                alt="Top Developers">
                            <div class="media-body px-sm-0 px-4">
                                <p class="mb-0">mit nur wenigen Klicks Geld verdienen</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Form seo analyse alt -->
    <section class="container mt-lg-6 mt-md-5 py-5 px-lg-5 px-sm-4 rounded bg-no-repeat bg-position-center bg-size-cover"
        style="background-image: url({{ asset('images/bg-shape-alt.jpg') }})">
        <h2 class="pb-2 text-light text-center">Erhalten Sie eine kostenlose Beratung</h2>
        <form class="row" id="consultForm">
            @csrf
            <div class="col-lg-3 col-sm-6">
                <div class="form-group">
                    <label for="analyse-name" class="text-light">Name</label>
                    <input name="name" id="analyse-name" class="form-control" type="text" placeholder="Ihr Name" required>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="form-group">
                    <label for="analyse-email" class="text-light">Email</label>
                    <input id="analyse-email" class="form-control" type="email" placeholder="Ihre E-Mail" required name="email">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="analyse-url" class="text-light">Tel.</label>
                    <div class="d-sm-flex">
                        <input id="analyse-tel" class="form-control" type="tel" placeholder="079" name="phone">
                        <button type="submit" class="btn btn-dark mt-sm-0 mt-5 ml-sm-grid-gutter">Senden</button>
                    </div>
                </div>
            </div>
        </form>
    </section>


    <!-- Shaped bg -->
    <div class="bg-no-repeat bg-position-center" style="background-image: url({{ asset('images/07.svg') }});">


    <!-- Asked questions -->
    <section class="py-lg-6 py-5 bg-no-repeat bg-position-center-top"
        style="background-image: url({{ asset('images/bg-shape2.svg') }})">
        <div class="container mt-md-4">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-7" data-aos="fade-right">
                    <h2 class="h1 pb-md-3">Häufig gestellte Fragen</h2>

                    <!-- Accordion made of cards -->
                    <div class="accordion" id="accordionQuestions">

                        <!-- Card -->
                        <div class="card">
                            <div class="card-header pt-0" id="questionsHeadingOne">
                                <h5 class="accordion-heading">
                                    <a href="#questionsCollapseOne" role="button" data-toggle="collapse"
                                        aria-expanded="true" aria-controls="questionsCollapseOne">
                                        <span class="accordion-indicator mt-n1"></span>
                                        Gibt es Vorabkosten für die Rekrutierung oder vertragliche Kosten?
                                    </a>
                                </h5>
                            </div>
                            <div class="collapse show" id="questionsCollapseOne" aria-labelledby="questionsHeadingOne"
                                data-parent="#accordionQuestions">
                                <div class="card-body">
                                    Wir verlangen eine anfängliche Anzahlung von 500 $, die als Gutschrift auf Ihre erste Rechnung angewendet wird, sobald Sie eine Miete machen. Wenn Sie sich entscheiden, nicht fortzufahren, wird Ihre Anzahlung vollständig zurückerstattet.
                                </div>
                            </div>
                        </div>

                        <!-- Card -->
                        <div class="card">
                            <div class="card-header" id="questionsHeadingTwo">
                                <h5 class="accordion-heading">
                                    <a href="#questionsCollapseTwo" role="button" data-toggle="collapse"
                                        aria-expanded="false" aria-controls="questionsHeadingTwo" class="collapsed">
                                        <span class="accordion-indicator mt-n1"></span>
                                        Was passiert, wenn ich mit einem Freelancer nicht zufrieden bin?
                                    </a>
                                </h5>
                            </div>
                            <div class="collapse" id="questionsCollapseTwo" aria-labelledby="questionsHeadingTwo"
                                data-parent="#accordionQuestions">
                                <div class="card-body">
                                    Wir erlauben unseren Kunden, eine Probezeit mit bis zu drei Experten aus unserem Netzwerk pro Position zu beginnen. Obwohl wir alle Bewerber gründlich prüfen, um Talent und Intelligenz sicherzustellen, verstehen wir, dass nicht jede Person perfekt zu jedem Unternehmen passt. Aus diesem Grund erlauben wir unseren Kunden, mit mehreren Experten für jede Position zu arbeiten, bevor sie sich für einen Kandidaten entscheiden, mit dem sie sich sicher und wohl fühlen.
                                </div>
                            </div>
                        </div>

                        <!-- Card -->
                        <div class="card">
                            <div class="card-header" id="questionsHeadingThree">
                                <h5 class="accordion-heading">
                                    <a href="#questionsCollapseThree" role="button" data-toggle="collapse"
                                        aria-expanded="false" aria-controls="questionsCollapseThree" class="collapsed">
                                        <span class="accordion-indicator mt-n1"></span>
                                        Wie oft wird mir etwas in Rechnung gestellt? Wie werden Zahlungen und Rechnungen abgewickelt?
                                    </a>
                                </h5>
                            </div>
                            <div class="collapse" id="questionsCollapseThree" aria-labelledby="questionsHeadingThree"
                                data-parent="#accordionQuestions">
                                <div class="card-body">
                                    Wir stellen unseren Kunden in der Regel zweimal im Monat Rechnungen aus, obwohl es hier eine gewisse Flexibilität gibt. Die Rechnungen werden mit Netto 10 Bedingungen erstellt, so dass unsere Kunden die Möglichkeit haben, die Kosten vor der Bearbeitung zu überprüfen.
                                </div>
                            </div>
                        </div>

                        <!-- Card -->
                        <div class="card">
                            <div class="card-header" id="questionsHeadingFour">
                                <h5 class="accordion-heading">
                                    <a href="#questionsCollapseFour" role="button" data-toggle="collapse"
                                        aria-expanded="false" aria-controls="questionsCollapseFour" class="collapsed">
                                        <span class="accordion-indicator mt-n1"></span>
                                        Welche Zahlungsarten akzeptieren Sie?
                                    </a>
                                </h5>
                            </div>
                            <div class="collapse" id="questionsCollapseFour" aria-labelledby="questionsHeadingFour"
                                data-parent="#accordionQuestions">
                                <div class="card-body">
                                    Wir akzeptieren derzeit alle gängigen Kreditkarten, ACH, Banküberweisungen und PayPal.
                                    All payments are processed securely by <a href="https://stripe.com/">Stripe</a>.
                                </div>
                            </div>
                        </div>

                        <!-- Card -->
                        <div class="card">
                            <div class="card-header" id="questionsHeadingFive">
                                <h5 class="accordion-heading">
                                    <a href="#questionsCollapseFive" role="button" data-toggle="collapse"
                                        aria-expanded="false" aria-controls="questionsCollapseFive" class="collapsed">
                                        <span class="accordion-indicator mt-n1"></span>
                                        Was ist Arbeits-Hilfe?
                                    </a>
                                </h5>
                            </div>
                            <div class="collapse" id="questionsCollapseFive" aria-labelledby="questionsHeadingFive"
                                data-parent="#accordionQuestions">
                                <div class="card-body">
                                    Wir sind die Plattform zum Finden und Auflisten von Fernjobs. 
                                </div>
                            </div>
                        </div>

                        <!-- Card -->
                        <div class="card">
                            <div class="card-header" id="questionsHeadingSix">
                                <h5 class="accordion-heading">
                                    <a href="#questionsCollapseSix" role="button" data-toggle="collapse"
                                        aria-expanded="false" aria-controls="questionsCollapseSix" class="collapsed">
                                        <span class="accordion-indicator mt-n1"></span>
                                        Hallo. Ich brauche eine Rechnung.
                                    </a>
                                </h5>
                            </div>
                            <div class="collapse" id="questionsCollapseSix" aria-labelledby="questionsHeadingSix"
                                data-parent="#accordionQuestions">
                                <div class="card-body">
                                    Okay, das war keine Frage, aber wir werden sie trotzdem beantworten. Die E-Mail, die Sie nach dem Einstellen Ihres Angebots erhalten, dient gleichzeitig als Rechnung. Wenn das nicht ausreicht, kontaktieren Sie uns und wir erstellen eine Rechnung für Sie. Achten Sie darauf, dass Sie alle speziellen Anweisungen wie Abteilungscode, Mehrwertsteuer usw. angeben.
                                </div>
                            </div>
                        </div>

                        <!-- Card -->
                        <div class="card">
                            <div class="card-header" id="questionsHeadingSeven">
                                <h5 class="accordion-heading">
                                    <a href="#questionsCollapseSeven" role="button" data-toggle="collapse"
                                        aria-expanded="false" aria-controls="questionsCollapseSeven" class="collapsed">
                                        <span class="accordion-indicator mt-n1"></span>
                                        Wie kann ich eine Rückerstattung beantragen?
                                    </a>
                                </h5>
                            </div>
                            <div class="collapse" id="questionsCollapseSeven" aria-labelledby="questionsHeadingSeven"
                                data-parent="#accordionQuestions">
                                <div class="card-body">
                                    Kontaktieren Sie uns und bitten Sie um eine vollständige Rückerstattung innerhalb von 30 Tagen nach Veröffentlichung des Angebots. Wir werden Ihre Zahlung per Kreditkarte zurückerstatten. Das war's.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 col-md-5 col-sm-10 mt-md-0 mt-5">
                    <div class="cs-parallax mx-auto" id="FAQ">
                        <div class="cs-parallax-layer" data-depth="0.05"><img src="{{ asset('images/01.svg') }}"
                                alt="Layer-1"></div>
                        <div class="cs-parallax-layer" data-depth="0.1"><img src="{{ asset('images/question.svg') }}"
                                alt="Layer-2"></div>
                        <div class="cs-parallax-layer" data-depth="0.13"><img src="{{ asset('images/bubble1.svg') }}"
                                alt="Layer-3"></div>
                        <div class="cs-parallax-layer" data-depth="0.16"><img src="{{ asset('images/bubble2.svg') }}"
                                alt="Layer-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Careers -->
    <section class="mt-md-4 py-lg-6 py-5 bg-secondary bg-no-repeat bg-position-center-bottom"
        style="background-image: url({{ asset('images/bg-shape3.svg') }});">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-sm-5 col-10 mx-auto mb-sm-0 mb-5">
                    <div class="cs-parallax mx-auto" id="job">
                        <div class="cs-parallax-layer" data-depth="0.05"><img src="{{ asset('images/Layer1.svg') }}"
                                alt="Layer-1"></div>
                        <div class="cs-parallax-layer" data-depth="0.1"><img src="{{ asset('images/Layer2.svg') }}"
                                alt="Layer-2"></div>
                        <div class="cs-parallax-layer" data-depth="0.13"><img src="{{ asset('images/Layer3.svg') }}"
                                alt="Layer-3"></div>
                        <div class="cs-parallax-layer" data-depth="0.16"><img src="{{ asset('images/Layer4.svg') }}"
                                alt="Layer-4"></div>
                        <div class="cs-parallax-layer" data-depth="0.19"><img src="{{ asset('images/Layer5.svg') }}"
                                alt="Layer-5"></div>
                    </div>
                </div>
                <div class="col-md-6 offset-lg-2 offset-md-1 col-sm-7" data-aos="fade-left">
                    <h2 class="h1 pb-md-3">Karriere bei Arbeits-hilfe</h2>
                    <p class="mb-lg-5 lead">Sind Sie bereit, uns bei unserer Mission zu unterstützen,
                        die digitale Wende in der Schweiz voranzutreiben? Wir stellen
                        ein!</p>
                        <p class=" pb-md-3 lead">Schick uns deine Bewerbungsunterlagen an <a href="">info@arbeitshilfe.website</a></p>
                    <a href="careers.html" class="btn btn-lg btn-primary">
                        Siehe Karrieren
                        <i class="cxi-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

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
<script src="{{ asset('js/jarallax.min.js') }}"></script>
<script src="{{ asset('js/jarallax-element.min.js') }}"></script>
<script src="{{ asset('js/parallax.min.js') }}"></script>
<script src="{{ asset('js/simplebar.min.js') }}"></script>
<script src="{{ asset('js/aos.js') }}"></script>
<script src="{{ asset('js/progressbar.min.js') }}"></script>

<script src="{{ asset('js/theme.min.js') }}"></script>
<script>
    lightGallery(document.getElementById('video-gallery'));
    $("#wt-loginbtn").click(function(){
        $(".wt-loginformhold").show();
    });
    $('.wt-loginformhold a').click(function(){
        $(".wt-loginformhold").hide();
    });

  /* parallax */
  var scene = document.getElementById('scene');
    var parallaxInstance = new Parallax(scene);

    var scene = document.getElementById('FAQ');
    var parallaxInstance = new Parallax(scene);

    var scene = document.getElementById('job');
    var parallaxInstance = new Parallax(scene);

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }

    $('#consultForm').submit(function (e) { 
        e.preventDefault();
        // 
        var formdata = new FormData();
        formdata.append("name",$('#analyse-name').val());
        formdata.append("email",$('#analyse-email').val());
        formdata.append("phone",$('#analyse-tel').val());
        formdata.append("_token",$('#consultForm input[name="_token"]').val());

        $.ajax({
            type:'post',
            url:'{{ route('consult') }}',
            data:formdata,
            cache:false,
            contentType:false,
            processData:false,
            success:function(resp){
                if(resp == 0){
                    $('#consultForm').trigger('reset');


                }
            },
            error:function(err){
                console.error(err.responseText);
            }
        })
     })
     /* SVG Animation */
        setTimeout(function(){
            $('#freepik_stories-interview').attr('src','{{ asset("images/company-animate.svg") }}');
        },3000);
        
      /* AOS Animation */
        AOS.init();

        /* Video module */
        lightGallery(document.getElementById('video-gallery'));
</script>
</body>
</html>