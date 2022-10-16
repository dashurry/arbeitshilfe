{{-- <footer id="wt-footer" class="wt-footertwo wt-haslayout">

    <div class="wt-footer-bg" style="background-image:url({{{ !empty($footer['footer_bg']) ? asset('uploads/settings/footer/'. $footer['footer_bg']) : ''}}})"></div>

    @if (!empty($footer))

        <div class="wt-footerholder wt-haslayout">

            <div class="container">

                <div class="row">

                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">

                        <div class="wt-footerlogohold">

                            @if (!empty($footer['footer_logo']))

                                <strong class="wt-logo"><a href="{{{ url('/') }}}"><img src="{{{ asset(\App\Helper::getFooterLogo($footer['footer_logo'])) }}}" alt="company logo here"></a></strong>

                            @endif

                            @if (!empty($footer['description']))

                                <div class="wt-description">

                                    <p>{{{ str_limit($footer['description'], 150)  }}}</p>

                                </div>

                            @endif

                            @php Helper::displaySocials(); @endphp

                        </div>

                    </div>

                    @if (!empty($footer['menu_title_1']) || !empty($footer['menu_pages_1']))

                        <div class="col-12 col-sm-6 col-md-3 col-lg-3">

                            <div class="wt-footercol">

                                @if (!empty($footer['menu_title_1']))

                                    <div class="wt-fwidgettitle">

                                        <h3>{{{ $footer['menu_title_1'] }}}</h3>

                                    </div>

                                @endif

                                @if(!empty($footer['menu_pages_1']))

                                    <ul class="wt-fwidgetcontent">

                                        @foreach($footer['menu_pages_1'] as $menu_1_page)

                                            @php  $page = \App\Page::where('id', $menu_1_page)->first(); @endphp

                                            @if (!empty($page))

                                                <li><a href="{{{ url('page/'.$page->slug) }}}">{{{ $page->title }}}</a></li>

                                            @endif

                                        @endforeach

                                    </ul>

                                @endif

                            </div>

                        </div>

                    @endif

                    @if (!empty($search_menu) || !empty($menu_title))

                        <div class="col-12 col-sm-6 col-md-3 col-lg-3">

                            <div class="wt-footercol wt-widgetexplore">

                                @if (!empty($menu_title))

                                    <div class="wt-fwidgettitle">

                                        <h3>{{ $menu_title->meta_value }}</h3>

                                    </div>

                                @endif

                                <ul class="wt-fwidgetcontent">

                                    @foreach($search_menu as $key => $page)

                                        <li><a href="{!! url($page['url']) !!}">{{$page['title']}}</a></li>

                                    @endforeach

                                </ul>

                            </div>

                        </div>

                    @endif

                </div>

            </div>

        </div>

    @endif

    <div class="wt-haslayout wt-footerbottom">

        <div class="container">

            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <p class="wt-copyrights">{{{ !empty($footer['copyright']) ? $footer['copyright'] : 'Worketic. All Rights Reserved. Amentotech.'  }}}</p>

                    @if(!empty($footer['pages']))

                        <nav class="wt-addnav">

                            <ul>

                                @foreach($footer['pages'] as $menu_page)

                                    @php $page = \App\Page::where('id', $menu_page)->first(); @endphp

                                    @if (!empty($page))

                                        <li><a href="{{{ url('page/'.$page->slug) }}}">{{{ $page->title }}}</a></li>

                                    @endif

                                @endforeach

                            </ul>

                        </nav>

                    @endif

                </div>

            </div>

        </div>

    </div>

</footer>

@push('scripts')

<script>

    footer_element = $('main').hasClass('wt-innerbgcolor');

    if (footer_element) {

        $('.wt-footertwo').addClass('wt-innerbgcolor')

    }

</script>

@endpush --}}
{{-- <style>
    
    #menu-footer-navigation{
  font-size: 1rem;
  font-weight: 600;
  margin-top: 0!important;
  padding-left: 0;
  list-style: none;
  font-family: "Nunito", sans-serif;
}
#menu-footer-navigation li{
  margin-top: 0!important;
  width: auto;
  list-style: none;
}
#menu-footer-navigation li a{
  padding-left: 1.5rem!important;
  padding-right: 1.5rem!important;
  color: #323232;
    font-family: "DM Sans", sans-serif;
    font-weight: 700;
    letter-spacing: .18em;
    font-size: .875rem;
    text-transform: uppercase;
}
#menu-footer-navigation li a:hover{
  color: #6658ea;
}
.main-footer__second-stage{
  border-top: 1px solid rgba(39,49,82,.15);
    color: rgba(39,49,82,.5);
    font-size: .75rem;
    padding-top: 2rem;
    margin-top: 2rem;
}
#menu-legal-navigation li a{
    color: rgba(39,49,82,.5);
}
#menu-legal-navigation li a:hover{
  color: #6658ea;
}
#menu-legal-navigation li a:after{
  margin-left: 1rem!important;
    margin-right: 1rem!important;
    content: "|";
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
</style> --}}
	<footer class="text-center pb-5">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-2">
					<a href="#" class="d-block mx-auto d-flex align-items-center justify-content-center arbeitshilfe-logo">
						{{-- <img src="{{ asset("images/arbeitshilfetext.svg") }}" alt="Arbeitshilfe" class="d-block adjustable-element" style="max-width: 100%;max-height: 100%;width: auto;height: auto;flex-shrink: 0;"> --}}
						</a>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-auto">
						<div>
							<ul class="d-flex align-items-center justify-content-center flex-wrap">
								<li class="p-3 text-uppercase">
									<a href="https://arbeits-hilfe.ch/" class="text-dark">Home</a>
								</li>
								<li class="p-3 text-uppercase">
									<a href="https://arbeits-hilfe.ch/page/uber-uns" class="text-dark">Über uns</a>
								</li>
								<li class="p-3 text-uppercase">
									<a href="https://arbeits-hilfe.ch/page/kontakt" class="text-dark">Kontakt</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				
					<div class="row justify-content-between border-top pt-4 mt-4 text-muted h6 font-weight-light">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<span>© Copyright 2022. All rights reserved.</span>
						</div>

						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-2">
							
								<ul class="d-flex align-items-center justify-content-center flex-wrap">
									<li class="p-3">
										<a href="https://arbeits-hilfe.ch/terms-conditions" class="text-muted">Terms and Conditions</a>
									</li>
									<li class="p-3">
										<a href="https://arbeits-hilfe.ch/privacy-policy" class="text-muted">Privacy Policy</a>
									</li>
									<li class="p-3">
										<a href="https://arbeits-hilfe.ch/short-code-policies" class="text-muted">Short Code Policies</a>
									</li>
								</ul>
						</div>
						
					</div>
			</div>
	</footer> 