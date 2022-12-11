<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
        {{-- Logo on mobile Screens --}}
        @if (!empty($logo) || Schema::hasTable('site_managements'))
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{{ asset($logo) }}}" alt="{{{ trans('Logo') }}}">
            </a>
        @endif
        {{-- Navigation on mobile Screens --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            {{-- Navigation --}}
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href>Über uns</a>
                        <a class="dropdown-item" href>Wie funktioniert es?</a>
                        <a class="dropdown-item" href>Kontakt</a>
                        <a class="dropdown-item" href>FAQ</a>
                    </div>
                </li>
                {{-- User not logged in - Navigation --}}
                @guest
                    <li class="nav-item dropdown">
                        <a class="nav-link" href id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            {{-- Sign in --}}
                            <a href class="dropdown-item d-flex align-items-center" data-toggle="modal" data-target="#modalSignIn">
                                <div class="d-flex text-primary mr-3">
                                    <span class="material-symbols-outlined">group</span>
                                </div>Sign In
                            </a>
                            {{-- Register --}}
                            <a href="{{ route("register") }}" class="dropdown-item d-flex align-items-center">
                                <div class="d-flex text-primary mr-3">
                                    <span class="material-symbols-outlined">key</span>
                                </div>Register
                            </a>
                        </div>
                    </li>
                @endguest
            </ul>
            <ul class="navbar-nav ml-auto">
                {{-- User logged in --}}
                @auth
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
                    {{-- Profile Avatar --}}
                    <li class="nav-item dropdown d-flex align-items-center">
                        <div class="nav-link media" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if(!empty($profile) && $profile->avater != "")
                                {{-- Profile Image --}}
                                <b-avatar class="mr-3" variant="info" src="{{{ asset(Helper::getImage('uploads/users/' . Auth::user()->id, $profile->avater, '' , 'user.jpg')) }}}" alt="{{{ trans('lang.user_avatar') }}}"></b-avatar>
                            @else
                                {{-- Profile Initials --}}
                                <b-avatar class="mr-3" style="background-color: {{ $nameColor->getColor(ucfirst(substr(Auth::user()->first_name,0,1))) }} !important" src="{{{ asset(Helper::getImage('uploads/users/' . Auth::user()->id, $profile->avater, '' , 'user.jpg')) }}}" alt="{{{ trans('lang.user_avatar') }}}">
                                    {{ ucfirst(substr(Auth::user()->first_name,0,1)). ucfirst(substr(Auth::user()->last_name,0,1)) }}
                                </b-avatar>
                            @endif
                            {{-- Profile Name and Role --}}
                            <div class="media-body">
                                <h6 class="m-0">{{{ Helper::getUserName(Auth::user()->id) }}}</h6>
                                <p class="m-0"><small>{{{ Helper::getAuthRoleName(Auth::user()->id) }}}</small></p>
                            </div>
                        </div>
                        {{-- Profile Dropdown Menu --}}
                        @if (file_exists(resource_path('views/extend/back-end/includes/profile-menu.blade.php'))) 
                            @include('extend.back-end.includes.profile-menu')
                        @else 
                            @include('back-end.includes.profile-menu')
                        @endif
                    </li>
                    <li class="d-flex align-items-center">
                        {{-- Job Notification --}}
                        <b-avatar variant="light" class="bg-transparent shadow-none" button v-if="unseenNotification > 0" :badge="unseenNotification" badge-variant="danger" badge-top alt="notification bell" @click="$bvToast.show('notification-toast')">
                            <i class="material-symbols-outlined">notifications</i>
                        </b-avatar>
                        <template v-if="userNotifications.length > 0">
                            <template v-for="(notification,index) in userNotifications">
                                    {{-- Toast Proposals Notification --}}
                                    <div v-if="notification.type=='job_proposal' && notification.seen==0">
                                        <b-toast id="notification-toast" variant="warning" solid>
                                            <template #toast-title>
                                                <a class="d-flex flex-grow-1 align-items-baseline" :key="notification.key" :href="notification.url!=null?notification.url:'#'" @click="notificationOpen(notification.id,index)">
                                                    <b-img blank blank-color="#ff5555" class="mr-2" width="12" height="12"></b-img>
                                                    <strong class="mr-auto">Neuer Vorschlag</strong>
                                                    <small class="text-muted mr-2">
                                                        <vue-moments-ago prefix="" suffix="ago" :date="notification.created_at" lang="en"></vue-moments-ago>
                                                    </small>
                                                </a>
                                            </template>
                                            <div v-html="notification.body"></div>
                                        </b-toast>
                                    </div>
                                    {{-- Toast Job hired Notification --}}
                                    <div v-if="notification.type=='job_hired' && notification.seen==0">
                                        <b-toast id="notification-toast" variant="warning" solid>
                                            <template #toast-title>
                                                <b-link class="d-flex flex-grow-1 align-items-baseline" :key="notification.key" :href="notification.url!=null?notification.url:'#'" @click="notificationOpen(notification.id,index)">
                                                    <b-img blank blank-color="#ff5555" class="mr-2" width="12" height="12"></b-img>
                                                    <strong class="mr-auto">Neuer Vorschlag</strong>
                                                    <small class="text-muted mr-2">
                                                        <vue-moments-ago prefix="" suffix="ago" :date="notification.created_at" lang="en"></vue-moments-ago>
                                                    </small>
                                                </b-link>
                                            </template>
                                            <div v-html="notification.body"></div>
                                        </b-toast>
                                    </div>
                            </template>
                        </template>
                    </li>
                    <li class="d-flex align-items-center">
                        {{-- Message Notification --}}
                        <b-avatar
                            variant="light"
                            class="bg-transparent shadow-none"
                            button
                            type="notification"
                            v-if="unseenMsg > 0"
                            v-bind:badge="unseenMsg"
                            badge-variant="danger"
                            badge-top
                            alt="notification message"
                            @click="$bvToast.show('conversations-toast')"
                            >
                            <i class="material-symbols-outlined">textsms</i>
                        </b-avatar>
                        <template v-if="conversations.length > 0">
                            <template v-for="(conversation,index) in conversations">
                                {{-- Toast Message Notification --}}
                                <div v-if="unseenMsg > 0 && conversation.last_msg.seen != 'seen'">
                                    <b-toast id="conversations-toast" variant="warning" solid>
                                        <template #toast-title>
                                            <a class="d-flex flex-grow-1 align-items-baseline" :key="conversation.key" href="#" :class="conversation.last_msg.seen =='unseen'?'unseen':''" @click="openMsg(conversation.id)">
                                                <b-img blank blank-color="#ff5555" class="mr-2" width="12" height="12"></b-img>
                                                {{-- header --}}
                                                <strong class="mr-auto">Neue Nachricht</strong>
                                                <small class="text-muted mr-2">
                                                    <vue-moments-ago prefix="" suffix="ago" :date="conversation.last_msg.created_at" lang="en"></vue-moments-ago>
                                                </small>
                                            </a>
                                        </template>
                                        <div>
                                            <h6 class="m-0">@{{ conversation.participant.name }}</h6>
                                            <p class="m-0"><small>@{{ conversation.last_msg.msg }}</small></p>
                                        </div>
                                    </b-toast>
                                </div>
                            </template>   
                        </template>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>
</div>