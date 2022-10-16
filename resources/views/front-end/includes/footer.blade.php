{{-- @if( Schema::hasTable('site_managements'))

    @php

        $footer = \App\SiteManagement::getMetaValue('footer_settings');

        $search_menu = \App\SiteManagement::getMetaValue('search_menu');

        $menu_title = DB::table('site_managements')->select('meta_value')->where('meta_key', 'menu_title')->get()->first();

        $page_id='';

        if (!empty(Route::getCurrentRoute()) && Route::getCurrentRoute()->uri() != '/' && Route::getCurrentRoute()->uri() != 'home') {

            if (Request::segment(1) == 'page' && !empty(Request::segment(2))) {

                $selected_page_data = APP\Page::getPageData(Request::segment(2));

                $selected_page = !empty($selected_page_data) ? APP\Page::find($selected_page_data->id) : '';

                $page_id = !empty($selected_page) ? $selected_page->id : '';

            }

        } else {

            $page_id = APP\SiteManagement::getMetaValue('homepage')['home'];

        }

        $page_footer = Helper::getPageFooter($page_id);

        $selected_footer = !empty($footer['footer_style']) ? $footer['footer_style'] : '';

        $role = Auth::user() ? Auth::user()->getRoleNames()[0] : '';

    @endphp

    @if (!empty($page_footer) && $page_footer == 'style2')

        @if (file_exists(resource_path('views/extend/front-end/includes/footers/footer2.blade.php'))) 

            @include('extend.front-end.includes.footers.footer2')

        @else 

            @include('front-end.includes.footers.footer2')

        @endif

    @elseif (!empty($page_footer) && $page_footer == 'style3')

        @if (file_exists(resource_path('views/extend/front-end/includes/footers/footer3.blade.php'))) 

            @include('extend.front-end.includes.footers.footer3')

        @else 

            @include('front-end.includes.footers.footer3')

        @endif

    @elseif (!empty($selected_footer) && $selected_footer == 'style2') 

        @if (file_exists(resource_path('views/extend/front-end/includes/footers/footer2.blade.php'))) 

            @include('extend.front-end.includes.footers.footer2')

        @else 

            @include('front-end.includes.footers.footer2')

        @endif

    @elseif (!empty($selected_footer) && $selected_footer == 'style3') 

        @if (file_exists(resource_path('views/extend/front-end/includes/footers/footer3.blade.php'))) 

            @include('extend.front-end.includes.footers.footer3')

        @else 

            @include('front-end.includes.footers.footer3')

        @endif

    @else

        @if (file_exists(resource_path('views/extend/front-end/includes/footers/footer1.blade.php'))) 

            @include('extend.front-end.includes.footers.footer1')

        @else 

            @include('front-end.includes.footers.footer1')

        @endif

    @endif

    {{-- <footer id="wt-footer" class="wt-footer wt-haslayout">

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

                                <div class="wt-footercol wt-widgetcompany">

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

                                <div class="wt-footercol wt-widgetcompany">

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

                        <p class="wt-copyrights"><span>{{{ !empty($footer['copyright']) ? $footer['copyright'] : 'Worketic. All Rights Reserved. Amentotech.'  }}}</p>

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

@endif--}}
@include('front-end.includes.footers.footer3')
