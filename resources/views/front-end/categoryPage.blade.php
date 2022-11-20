
@php
    $ctgs = \App\Category::latest()->get();
@endphp

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Arbeits-hilfe | Kategorien</title>

    <!-- SEO Meta Tags-->
    <meta name="description" content="Arbeitshilfe - Such- & Angebotsportal">
    <meta name="keywords" content="bootstrap, business, creative agency, construction, services, e-commerce, mobile app showcase, multipurpose, shop, ui kit, marketing, seo, landing, html5, css3, javascript, gallery, slider, touch, creative">
    <meta name="author" content="Arbeitshilfe">

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
    <link rel="stylesheet" media="screen" href="{{ asset('css/lightgallery.min.css') }}" />
    <link rel="stylesheet" media="screen" href="{{ asset('css/tiny-slider.css') }}" />
    <link rel="stylesheet" media="screen" href="{{ asset('css/fontawesome/fontawesome.min.css') }}" />
    <link rel="stylesheet" media="screen" href="{{ asset('css/fontawesome/fontawesome-all.min.css') }}" />
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="{{ asset('css/theme.min.css') }}">
    <link rel="stylesheet" media="screen" href="{{ asset('css/aboutusHeader.css') }}">
    <link rel="stylesheet" media="screen" href="{{ asset('css/themify-icons.css') }}">
    <link rel="stylesheet" media="screen" href="{{ asset('css/linearicons.css') }}">
    <link rel="stylesheet" media="screen" href="{{ asset('css/responsiveCategory.css') }}">

    <!-- Page loading styles-->
    <style>
        body{
          background-color: white;
        }
        /* Hide scrollbar for Chrome, Safari and Opera */
        .hidden-overflow::-webkit-scrollbar {
        display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .hidden-overflow {
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
        }
        .hidden-overflow{
            overflow: auto;
            max-height: 530px;
        }
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
            -webkit-animation: load3 .0s infinite linear;
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
        .wt-header .wt-navigation > ul > li > a{
          color: black;
        }
  /* scroll mouse animation */
  .scroll-down {
  border: 2px solid black;
  border-radius: 20px;
  bottom: 60px;
  height: 50px;
  left: 0;
  margin: 0 auto;
  position: absolute;
  right: 0;
  width: 30px;
  opacity: 50%
}
.scroll-down::before {
  animation: scrollDownAnimation 2s infinite;
  background-color: black;
  border-radius: 100%;
  content: '';
  height: 6px;
  left: 0;
  margin: 0 auto;
  position: absolute;
  right: 0;
  top: 10px;
  width: 6px;
}
@-moz-keyframes scrollDownAnimation {
  0% {
    opacity: 0;
    transform: translate(0, 0);
  }
  40% {
    opacity: 1;
  }
  80% {
    opacity: 0;
    transform: translate(0, 20px);
  }
  100% {
    opacity: 0;
  }
}
@-webkit-keyframes scrollDownAnimation {
  0% {
    opacity: 0;
    transform: translate(0, 0);
  }
  40% {
    opacity: 1;
  }
  80% {
    opacity: 0;
    transform: translate(0, 20px);
  }
  100% {
    opacity: 0;
  }
}
@-o-keyframes scrollDownAnimation {
  0% {
    opacity: 0;
    transform: translate(0, 0);
  }
  40% {
    opacity: 1;
  }
  80% {
    opacity: 0;
    transform: translate(0, 20px);
  }
  100% {
    opacity: 0;
  }
}
@keyframes scrollDownAnimation {
  0% {
    opacity: 0;
    transform: translate(0, 0);
  }
  40% {
    opacity: 1;
  }
  80% {
    opacity: 0;
    transform: translate(0, 20px);
  }
  100% {
    opacity: 0;
  }
}
 /* end scroll mouse animation */
.mb-0{
  margin-bottom: -1rem !important;
}
.wt-username h3{
  color: black !important;
}
.wt-username span{
  color: black !important;
}
.wt-headereleven .wt-navigation > ul > li:hover > a{
  color: black;
  opacity: 60%; 
}
.btn-outline-primary {
    color: #7772f1;
    border-color: #7772f1;
}
.btn-outline-primary:hover {
    color: #fff;
    background-color: #5ad9ac;
    border-color: #5ad9ac;
}
.display-3{
  font-weight: 300;
  font-family: "Lato",sans-serif;
  font-size: 3.25rem;
}
.display-2{
  font-size: 2rem;
  font-weight: 400;
  font-family: "Lato",sans-serif;
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
<main class="cs-page-wrapper">

    <header id="wt-header" class="wt-header wt-headereleven wt-headerwrap mb-0">
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
                                                href="{{ route('main.about') }}">Über uns</a>
                                        </li>
                                        <li style="order: 2;"><a
                                                href="https://arbeitshilfe.website/search-results?type=freelancer">
                                                Freelancer anzeigen
                                            </a></li>
                                        {{-- <li style="order: 4;"><a href="https://arbeitshilfe.website/search-results?type=job">
                                                Jobs durchsuchen
                                            </a></li> --}}
                                        <li style="order: 5;"><a
                                                href="https://arbeitshilfe.website/search-results?type=service">
                                                Dienste durchsuchen
                                            </a></li>
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
    <section class="position-relative mb-md-5 py-lg-0 py-md-5 py-5">

        <div class="container-fluid pr-lg-0 jarallax" data-jarallax data-type="scale-opacity" data-speed="0.25">
          <div class="row no-gutters">

            <!-- Content -->
            <div class="col-md-5 order-md-1 order-2 align-self-center d-flex justify-content-lg-end justify-content-center mt-xl-n5 py-lg-6 text-md-left text-center">
              <div class="pb-3 py-md-6" style="max-width: 460px;">
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
                <h1 class="display-3 mb-lg-5 text-dark">Wo Ideen auf Fähigkeiten treffen
                </h1>
                <div class="d-flex align-items-center justify-content-lg-start justify-content-center mb-sm-5 mb-4 pb-lg-4 pb-2">
                  <div class="media flex-sm-row flex-column align-items-center">
                    <div class="display-4 mr-sm-2 mb-sm-0 mb-2 text-dark">24h</div>
                    <div class="media-body pl-sm-1">
                      <h2 class="mb-0 font-size-sm text-sm-left">Support</h2>
                    </div>
                  </div>
                  <div class="mx-sm-4 px-3 px-md-1 px-lg-3 font-size-lg text-primary">•</div>
                  <div class="media flex-sm-row flex-column align-items-center">
                    <div class="display-4 mr-sm-2 mb-sm-0 mb-2 text-dark">30+</div>
                    <div class="media-body pl-sm-1">
                      <h2 class="mb-0 font-size-sm text-sm-left">Kategorien</h2>
                    </div>
                  </div>
                </div>
                <a href="#" class="btn btn-lg btn-outline-primary pr-4" data-scroll="" id="zeigsmir">
                  Zeig's mir
                  <i class="cxi-arrow-down ml-2"></i>
                </a>
              </div>
            </div>
  
            <!-- Parallax elements -->
            <div class="col-md-7 order-md-2 order-1 mx-lg-auto mx-auto mb-lg-n6">
              <div class="mb-lg-n6">
                <div class="mt-lg-n5 position-relative">
                  <img width="1101" height="1197" 
                  onerror="this.src='{{ asset('images/category_01.png') }}'" alt="Parallax element" 
                  class="position-relative" id="freepik_stories-interview" style="z-index: 1;" data-jarallax-element="14" data-disable-parallax-down="lg">
                  </div>
              </div>
            </div>
          </div>
  
         
</div>
        
      </section>   

        <!-- Trending products (carousel) -->
        <section class="{{-- bg-secondary bg-no-repeat bg-size-cover --}} py-2 py-дп-0" style="background-color: #f6f7fa  !important;" id="categories">
            <div class="container">
              <div class="row">
    
                <!-- Components -->
                <div class="col-md-6 pr-lg-6 pr-md-4 py-lg-6 py-5 text-md-left text-center">
                  <div class="d-flex flex-column justify-content-between h-100">
                    <div>
                      <h2 class="mb-3 display-2">Über 30+ Kategorien</h2>
                      <p class="pb-md-3 text-muted">Wähle eine Kategorie aus und entdecke spannende Aufträge</p>
                    </div>

                    

                    <div class="row mx-n2 hidden-overflow">
                        @foreach ($ctgs as $ctg)
                            <div class="col-sm-6 mb-3 px-2">
                                <a href="https://arbeitshilfe.website/search-results?type={{ $ctg->title }}" class="card card-hover cs-heading-highlight align-items-center h-100 p-4 text-decoration-0">
                                <img width="40" height="40" src="{{ asset("uploads/categories/$ctg->image") }}" alt="{{ $ctg->title }}" class="mx-auto my-3">
                                <div class="card-body p-0 text-center">
                                    <h3 class="h6 mb-3">{{ $ctg->title }}</h3>
                                </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="pt-md-4">
                      <div class="scroll-down"></div>
                    </div>
                  </div>
                  <hr class="mt-5 border-dark opacity-10 d-md-none">
                </div>
    
                <span class="divider-vertical d-none d-md-block"></span>
    
                <!-- Documentation -->
                <div class="col-md-6 pl-lg-6 pl-md-4 py-lg-6 py-5 text-md-left text-center">
                  <div class="d-flex flex-column justify-content-between h-100">
                    <div>
                      <h2 class="mb-3 display-2">Documentation</h2>
                      <p class="pb-md-3 text-muted">Anstatt umständlich im Internet zu suchen, erfasse Sie ihren Auftrag und erhalten schnell und übersichtlich vergleichbare Angebote.</p>
                      <a href="html/documentation/dev-setup.html" class="d-block">
                        <img src="{{ asset("images/documentation.png") }}" class="d-block mx-auto mb-3" alt="Documentation">
                      </a>
                    </div>
                    <div class="pt-md-4">
                     {{--  <a href="html/documentation/dev-setup.html" class="btn btn-primary mt-2 mt-md-3">Online documentation</a> --}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>


</main>

    


<!-- Main theme script-->
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/tiny-slider.js') }}"></script>
<script src="{{ asset('js/smooth-scroll.polyfills.min.js') }}"></script>
<script src="{{ asset('js/simplebar.min.js') }}"></script>
<script src="{{ asset('js/progressbar.min.js') }}"></script>

<script src="{{ asset('js/theme.min.js') }}"></script>
<script>
  /* Anmelden button */
  $("#wt-loginbtn").click(function(){
        $(".wt-loginformhold").show();
    });
    $('.wt-loginformhold a').click(function(){
        $(".wt-loginformhold").hide();
    });
  $(document).ready(function (){
      $("#zeigsmir").click(function (){
          $('html, body').animate({
            scrollTop: $('#categories').offset().top -100
          }, 1500);
      });
      setTimeout(function(){
        $('#freepik_stories-interview').attr('src','{{ asset("images/interview-animate.svg") }}');
      },3400);
  });
</script>

</body>
</html>