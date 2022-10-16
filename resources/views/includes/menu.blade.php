{{-- <nav id="wt-nav" class="wt-nav navbar-expand-lg">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"

        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

        <i class="lnr lnr-menu"></i>

    </button>

    <div class="collapse navbar-collapse wt-navigation" id="navbarNav">

        <ul class="navbar-nav">

            @if (!empty($pages) || Schema::hasTable('pages'))

                @php $order=''; $page_order=''; @endphp

                @foreach ($pages as $key => $page)

                    @php

                        $page_order = DB::table('metas')

                                        ->select('meta_value')

                                        ->where('meta_key', 'page_order')

                                        ->where('metable_type', 'App\Page')

                                        ->where('metable_id', $page->id)->first();

                        $order = !empty($page_order->meta_value) ? $page_order->meta_value : '';

                        $page_has_child = App\Page::pageHasChild($page->id); $pageID = Request::segment(2);

                        $show_page = \App\SiteManagement::where('meta_key', 'show-page-'.$page->id)->select('meta_value')->pluck('meta_value')->first();

                    @endphp

                    @if ($page->relation_type == 0 && ($show_page == 'true' || $show_page == true))

                        <li 

                            class="{{!empty($page_has_child) ? 'menu-item-has-children page_item_has_children' : '' }} @if ($pageID == $page->slug ) current-menu-item @endif"

                            style="{{!empty($order) ? 'order:'.$order : 'order:99' }}"

                        >

                            <a href="{{url('page/'.$page->slug)}}">{{{$page->title}}}</a>

                            @if (!empty($page_has_child))

                                <ul class="sub-menu">

                                    @foreach($page_has_child as $parent)

                                        @php $child = App\Page::getChildPages($parent->child_id);@endphp

                                        @if (!empty($child))

                                            <li class="@if ($pageID == $child->slug ) current-menu-item @endif">

                                                <a href="{{url('page/'.$child->slug.'/')}}">

                                                    {{{$child->title}}}

                                                </a>

                                            </li>

                                        @endif

                                    @endforeach

                                </ul>

                            @endif

                        </li>

                    @endif

                @endforeach

            @endif

            @php

                $inner_page  = App\SiteManagement::getMetaValue('inner_page_data');

                $add_f_navbar = !empty($inner_page) && !empty($inner_page[0]['add_f_navbar']) ? $inner_page[0]['add_f_navbar'] : '';

                $add_emp_navbar = !empty($inner_page) && !empty($inner_page[0]['add_emp_navbar']) ? $inner_page[0]['add_emp_navbar'] : '';

                $add_job_navbar = !empty($inner_page) && !empty($inner_page[0]['add_job_navbar']) ? $inner_page[0]['add_job_navbar'] : '';

                $add_service_navbar = !empty($inner_page) && !empty($inner_page[0]['add_service_navbar']) ? $inner_page[0]['add_service_navbar'] : '';

                $add_article_navbar = !empty($inner_page) && !empty($inner_page[0]['add_article_navbar']) ? $inner_page[0]['add_article_navbar'] : '';

                $menu_settings  = App\SiteManagement::getMetaValue('menu_settings');

                $freelancer_order = !empty($menu_settings['pages']) ? Helper::getArrayIndex($menu_settings['pages'], 'id', 'freelancers') : ""; 

                $employer_order = !empty($menu_settings['pages']) ? Helper::getArrayIndex($menu_settings['pages'], 'id', 'employers') : ''; 

                $job_order = !empty($menu_settings['pages']) ? Helper::getArrayIndex($menu_settings['pages'], 'id', 'jobs') : ''; 

                $service_order = !empty($menu_settings['pages']) ? Helper::getArrayIndex($menu_settings['pages'], 'id', 'services') : ''; 

                $article_order = !empty($menu_settings['pages']) ? Helper::getArrayIndex($menu_settings['pages'], 'id', 'articles') : ''; 

            @endphp

            @if ($add_article_navbar !== 'false')

                <li style="{{!empty($article_order) ? 'order:'.$article_order : 'order:99' }}">

                    <a href="{{url('articles')}}">

                        {{{ trans('lang.articles') }}}

                    </a>

                </li>

            @endif

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

            @if ($add_f_navbar !== 'false')

                <li style="{{!empty($freelancer_order) ? 'order:'.$freelancer_order : 'order:99' }}">

                    <a href="{{url('search-results?type=freelancer')}}">

                        {{{ trans('lang.view_freelancers') }}}

                    </a>

                </li>

            @endif

            @if ($add_emp_navbar !== 'false')

            <li style="{{!empty($employer_order) ? 'order:'.$employer_order : 'order:99' }}">

                <a href="{{url('search-results?type=employer')}}">

                    {{{ trans('lang.view_employers') }}}

                </a>

            </li>

            @endif

            @if ($add_job_navbar !== 'false')

                @if ($type =='jobs' || $type == 'both')

                    <li style="{{!empty($job_order) ? 'order:'.$job_order : 'order:99' }}">

                        <a href="{{url('search-results?type=job')}}">

                            {{{ trans('lang.browse_jobs') }}}

                        </a> 

                    </li>

                @endif

            @endif

            @if ($add_service_navbar !== 'false')

                @if ($type =='services' || $type == 'both')

                    <li style="{{!empty($service_order) ? 'order:'.$service_order : 'order:99' }}">

                        <a href="{{url('search-results?type=service')}}">

                            {{{ trans('lang.browse_services') }}}

                        </a>

                    </li>

                @endif

            @endif
            @endauth

            @php 

                $order=''; $page_order=''; 

                $custom_menus = !empty($menu_settings['custom_links']) ? $menu_settings['custom_links'] : '';

                // dd($custom_menus);

            @endphp

            @if (!empty($custom_menus))

                @foreach($custom_menus as $custom_key => $custom_value)

                    @if ($custom_value['relation_type'] == 'parent')

                        @php 

                            $order = Helper::getCustomMenuPageOrder($custom_value['custom_slug']);

                        @endphp

                        <li style="{{!empty($order) ? 'order:'.$order : 'order:99' }}">

                            <a href="{{ empty($custom_value['custom_link']) || $custom_value['custom_link'] == '#' ? 'javascript:void(0)' : $custom_value['custom_link'] }}">

                                {{$custom_value['custom_title']}}

                            </a>

                            @php 

                            $custom_menu_child = Helper::getCustomMenuChild($custom_value['custom_slug']);

                            @endphp

                            @if (!empty($custom_menu_child))

                                <ul class="sub-menu">

                                    @foreach($custom_menu_child as $custom_child)

                                        @if (!empty($custom_child) && !empty($custom_child['type']) && $custom_child['type'] == 'custom_menu')

                                            <li>

                                                <a href="{{empty($custom_child['link']) || $custom_child['link'] == '#' ? 'javascript:void(0)' : $custom_child['link']}}">

                                                    {{{$custom_child['title']}}}

                                                </a>

                                            </li>

                                        @elseif (!empty($custom_child)) 

                                            <li class="@if ($pageID == $custom_child['slug'] ) current-menu-item @endif">

                                                <a href="{{url('page/'.$custom_child['slug'].'/')}}">

                                                    {{{$custom_child['title']}}}

                                                </a>

                                            </li>

                                        @endif

                                    @endforeach

                                </ul>

                            @endif

                        </li>

                    @endif

                @endforeach

            @endif

        </ul>

    </div>

</nav> --}}

<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    @if (!empty($logo) || Schema::hasTable('site_managements'))
        <a class="navbar-brand d-lg-none" href="{{ route('home') }}"><img src="{{{ asset($logo) }}}" alt="{{{ trans('Logo') }}}"></a>
    @endif
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse flex-on-mobile" id="navbarSupportedContent">

        <ul class="navbar-nav justify-content-end justify-content-start-mobile w-100">

            <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                <div class="dropdown-menu p-4" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item mt-0 pb-2 bg-transparent" href="{{ route("main.about") }}">About Us</a>
                    <a class="dropdown-item pb-2 bg-transparent" href="{{ route("main.howitworks") }}">How it works ?</a>
                    <a class="dropdown-item pb-2 bg-transparent" href="#">Contact</a>
                    <a class="dropdown-item pb-2 bg-transparent" href="#">FAQ</a>
                </div>
            </li>
            
        </ul>
        @if (!empty($logo) || Schema::hasTable('site_managements'))
            <img class="d-lg-block d-none px-lg-6" src="{{{ asset($logo) }}}" alt="{{{ trans('Logo') }}}" style="cursor: pointer;" onclick="window.location.href='/'">
        @endif
        

        <ul class="navbar-nav justify-content-start flex-direction-mobile w-100">
            @guest
            
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account</a>
                <div class="dropdown-menu p-4" aria-labelledby="navbarDropdown">

                <a href="" class="dropdown-item mt-0 d-flex align-items-center pb-2 bg-transparent" data-toggle="modal" data-target="#modalSignIn">
                    <div class="d-flex text-primary mr-3">
                        {{-- <img src="{{ asset('images/user.svg') }}" alt="" style="width: 1.5rem; height: 1.5em;"> --}}
                        <span class="material-symbols-outlined">group</span>
                      </div>Sign In</a>

                <a href="{{ route("register") }}" class="d-flex align-items-center dropdown-item pb-2 bg-transparent">
                    <div class="d-flex text-primary mr-3">
                        {{-- <img src="{{ asset('images/key.svg') }}" alt="" style="width: 1.5rem; height: 1.5em;"> --}}
                        <span class="material-symbols-outlined">key</span>
                      </div>Register</a>
                </div>
            </li>

            @endguest

            @auth
                <li class="nav-item mr-5 navigation-more">
                    <a href="#" class="nav-link">.....</a>
                </li>
                @php
                    $nameColor = new \App\NameThumbColor();
                    
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

                <li class="nav-item wt-userlogedin">

                    @if(!empty($profile) && $profile->avater != "")
                        <figure class="wt-userimg">

                            <img src="{{{ asset(Helper::getImage('uploads/users/' . Auth::user()->id, $profile->avater, '' , 'user.jpg')) }}}" alt="{{{ trans('lang.user_avatar') }}}">

                        </figure>
                    @else
                        <figure class="wt-userimg">
                            <div class="name-thumb-sm" style="background-color: {{ $nameColor->getColor(ucfirst(substr(Auth::user()->first_name,0,1))) }} !important">
                                {{ ucfirst(substr(Auth::user()->first_name,0,1)). ucfirst(substr(Auth::user()->last_name,0,1)) }}
                            </div>
                        </figure>
                    @endif
                    {{-- <figure class="wt-userimg">
                        <div class="name-thumb-sm" style="background-color: {{ $nameColor->getColor(ucfirst(substr(Auth::user()->first_name,0,1))) }} !important">
                            {{ ucfirst(substr(Auth::user()->first_name,0,1)). ucfirst(substr(Auth::user()->last_name,0,1)) }}
                        </div>
                    </figure> --}}

                    <div class="wt-username">

                        <h3>{{{ Helper::getUserName(Auth::user()->id) }}}</h3>

                        <span>{{{ Helper::getAuthRoleName(Auth::user()->id) }}}</span>
                        {{-- <span>{{{ !empty(Auth::user()->profile->tagline) ? str_limit(Auth::user()->profile->tagline, 26, '') : Helper::getAuthRoleName() }}}</span> --}}

                    </div>

                    @if (file_exists(resource_path('views/extend/back-end/includes/profile-menu.blade.php'))) 

                        @include('extend.back-end.includes.profile-menu')

                    @else 

                        @include('back-end.includes.profile-menu')

                    @endif

                </li>

                <li class="nav-item dropdown bell-notification">
                    <span v-if="unseenNotification > 0" class="badge badge-danger badge-pill notify-badge">@{{ unseenNotification }}</span>
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-symbols-outlined">notifications</i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <template v-if="userNotifications.length > 0">
                            <template v-for="(not,i) in userNotifications">
                                {{-- Job hired notification --}}
                                <a v-if="not.type=='job_hired'" class="dropdown-item notify-item" :key="i" :class="{'unseen' : not.seen==0}" :href="not.url!=null?not.url:'#'" @click="notificationOpen(not.id,i)">
                                    <div class="d-flex justify-content-around">
                                        <span class="icon">
                                            <i class="material-symbols-outlined">notifications</i>
                                        </span>
                                        <span>@{{ not.body }}</span>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <vue-moments-ago class="timer" prefix="" suffix="ago" :date="not.created_at" lang="en"></vue-moments-ago>
                                    </div>
                                </a>

                                {{-- Proposal Sent Notification --}}
                                <a class="dropdown-item notify-item" :key="i" v-if="not.type=='job_proposal'" :class="{'unseen' : not.seen==0}" :href="not.url!=null?not.url:'#'" @click="notificationOpen(not.id,i)">
                                    <div class="msg-item d-flex justify-content-start">
                                        {{-- <span class="icon"><i class="material-symbols-outlined">notifications</i></span> --}}

                                        <div class="msg-img">
                                            <div class="user-thumb-alt" >
                                            <img v-if="not.sender.avater!=null" :src="`/uploads/users/${not.sender.user_id}/${not.sender.avater}`" alt="">
                                            {{-- use Name Initials --}}
                                            <div v-else class="user-thumb-alt" :style="`background-color: ${not.user_init_color} !important`">
                                                @{{ not.user_init }}
                                            </div>
                                        </div>
                                        </div>

                                        <div class="msg-body" v-html="not.body">
                                        </div>

                                        {{-- <div v-html="not.body">
                                        </div> --}}
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <vue-moments-ago class="timer" prefix="" suffix="ago" :date="not.created_at" lang="en"></vue-moments-ago>
                                    </div>
                                </a>

                            </template>
                        </template>
                        <template v-else>
                            <div class="no-notification">
                                <span class="material-symbols-outlined">highlight_off</span>
                                <p>Sie haben im Moment keine Benachrichtigung</p>
                            </div>
                        </template>
                        

                    </div>
                </li>

                <li class="nav-item dropdown">
                    <span v-if="unseenMsg > 0" class="badge badge-danger badge-pill notify-badge">@{{ unseenMsg }}</span>
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-symbols-outlined">textsms</i>
                    </a>

                    <div class="dropdown-menu p-2" aria-labelledby="navbarDropdown">

                        <template v-if="conversations.length > 0">
                            <div class="msg-item d-flex justify-content-start" v-for="(conv,i) in conversations" :key="i"
                            :class="conv.last_msg.seen =='unseen'?'unseen':''" @click="openMsg(conv.id)">
                                <div class="msg-img">
                                    <div v-if="conv.participant.thumb == null" 
                                    class="user-thumb-alt" :style="{'background-color' : conv.participant.thumb_color}">@{{ conv.participant.thumb_alter }}</div>
                                    <img v-else :src="conv.participant.thumb" :alt="conv.participant.thumb_alter">
                                </div>
                                <div class="msg-body">
                                    <p class="user-name">@{{ conv.participant.name }}</p>
                                    <p class="msg-details">@{{ conv.last_msg.msg }}</p>
                                    <vue-moments-ago class="msg-timer" prefix="" suffix="ago" :date="conv.last_msg.created_at" lang="en"></vue-moments-ago>
                                </div>
                            </div>
                        </template>

                        <template v-else>
                            <div class="no-notification">
                                <span class="material-symbols-outlined">highlight_off</span>
                                <p>Sie haben derzeit keine Nachrichten</p>
                            </div>
                        </template>

                    </div>

                </li>

            @endauth
        </ul>

    </div>
  </div>
</nav>