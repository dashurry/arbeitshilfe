@extends('master')

@push('stylesheets')

    @stack('backend_stylesheets')

    <link href="{{ asset('css/chosen.css') }}" rel="stylesheet">

	<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

    <link href="{{ asset('css/dbresponsive.css') }}" rel="stylesheet">

    <link href="{{ asset('css/emojionearea.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/basictable.css') }}" rel="stylesheet">
@endpush
@yield('css')

@section('header')

    @if (file_exists(resource_path('views/extend/includes/header.blade.php')))

        @include('extend.back-end.includes.header')

    @else 

        @include('back-end.includes.header')

    @endif

@endsection

@section('main')
    <!-- Dark Overlay element -->
    <div class="overlay"></div>
	{{-- <main id="wt-main" class="wt-main wt-haslayout"> --}}
    <main id="wt-main" class="container">

        @if (Auth::user())

            @if (file_exists(resource_path('views/extend/back-end/includes/dashboard-menu.blade.php')))

                @include('extend.back-end.includes.dashboard-menu')

            @else 

                @include('back-end.includes.dashboard-menu')

            @endif

		@endif

		@yield('content')

    </main>



@endsection

@push('scripts')

    <script src="{{ asset('js/chosen.jquery.js') }}"></script>

    <script src="{{ asset('js/jquery.basictable.min.js') }}"></script>

    <script>

        jQuery('.chosen-select').chosen();

        jQuery('.wt-tablecategories').basictable({

            breakpoint: 767,

        });

        jQuery('.wt-ordertable').basictable({ breakpoint: 420,});

    </script>

    <script>
        $(function(){
            $('#wt-btnmenutoggle').click(function(){
                
                if($("#wt-sidebarwrapper")){
                    let menuStatus = $('#wt-sidebarwrapper').data("menu");
                    
                    if(menuStatus=="open"){
                        $("#wt-sidebarwrapper").data("menu","close");
                        $("#wt-sidebarwrapper").addClass("sidebarClose");
                    }
                    else{
                        $("#wt-sidebarwrapper").data("menu","open");
                        $("#wt-sidebarwrapper").removeClass("sidebarClose");
                    }
                }

            });
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function () {

            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>

@endpush

