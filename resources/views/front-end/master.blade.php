@extends('master')

@push('stylesheets')

@endpush



@push('PackageStyle')

    <link href="{{ asset('css/dd.css') }}" rel="stylesheet">

@endpush



@section('header')

	@if (file_exists(resource_path('views/extend/includes/header.blade.php')))

		@include('extend.includes.header')

	@else 

		@include('includes.header')

	@endif

@endsection



@section('slider')

	@yield('homeSlider')

@endsection



@section('main')

@stack('stylesheets')

<main id="wt-main" class="wt-main  wt-haslayout {{ !empty($body_class) ? $body_class : '' }}">

	@yield('content')
		
</main>

@endsection



@section('footer')

	@if (file_exists(resource_path('views/extend/front-end/includes/footer.blade.php')))

		@include('extend.front-end.includes.footer')

	@else 

		@include('front-end.includes.footer')

	@endif

@endsection



@push('scripts')
<script src="{{ asset('js/jquery.dd.min.js') }}"></script>	
<script>

	jQuery('.wt-btndemotoggle').on('click', function() {

		var _this = jQuery(this);

		_this.parents('.wt-demo-sidebar').toggleClass('wt-demoshow');

	});

	jQuery(document).ready(function(e) {

		try {

			jQuery("body select.locations").msDropDown();

		} catch(e) {

			alert(e.message);

		}

	});

</script>

@stack('scripts')

@endpush

