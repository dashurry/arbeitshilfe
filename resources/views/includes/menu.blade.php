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
            <ul class="navbar-nav ml-auto align-items-center">
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
            <ul class="navbar-nav ml-auto align-items-center">
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
                            {{-- Profile Image --}}
                            @if(!empty($profile) && $profile->avater != "")
                                <img width="36" height="36" class="rounded-circle mr-3" src="{{{ asset(Helper::getImage('uploads/users/' . Auth::user()->id, $profile->avater, '' , 'user.jpg')) }}}" alt="{{{ trans('lang.user_avatar') }}}">
                            @else
                                {{-- Profile Initials --}}
                                <figure class="wt-userimg">
                                    <div class="name-thumb-sm" style="background-color: {{ $nameColor->getColor(ucfirst(substr(Auth::user()->first_name,0,1))) }} !important">
                                        {{ ucfirst(substr(Auth::user()->first_name,0,1)). ucfirst(substr(Auth::user()->last_name,0,1)) }}
                                    </div>
                                </figure>
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
                    {{-- Message Notification --}}
                    <li class="nav-item dropdown bell-notification">
                        <a class="nav-link d-flex align-items-start" href id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-symbols-outlined">notifications</i>
                            <span v-if="unseenNotification > 0" class="badge badge-danger badge-pill">@{{ unseenNotification }}</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <template v-if="userNotifications.length > 0">
                                <template v-for="(not,i) in userNotifications">
                                    {{-- Job hired notification --}}
                                    <a v-if="not.type=='job_hired'" :key="i" class="dropdown-item" :class="{'bg-info' : not.seen==0}" :href="not.url!=null?not.url:'#'" @click="notificationOpen(not.id,i)">
                                        <div class="d-flex justify-content-around">
                                            <p>@{{ not.body }}</p>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <vue-moments-ago class="timer" prefix="" suffix="ago" :date="not.created_at" lang="en"></vue-moments-ago>
                                        </div>
                                    </a>

                                    {{-- Proposal Sent Notification --}}
                                    <a v-if="not.type=='job_proposal'" :key="i" class="dropdown-item text-wrap" :class="{'bg-info' : not.seen==0}" :href="not.url!=null?not.url:'#'" @click="notificationOpen(not.id,i)">
                                        <div class="media">
                                            <img v-if="not.sender.avater!=null" class="mr-3 rounded-circle" :src="`/uploads/users/${not.sender.user_id}/${not.sender.avater}`" alt="" width="40" height="40">
                                            {{-- use Name Initials --}}
                                            <div v-else class="user-thumb-alt" :style="`background-color: ${not.user_init_color} !important`">
                                                @{{ not.user_init }}
                                            </div>
                                            <div class="media-body" v-html="not.body">
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <vue-moments-ago class="timer" prefix="" suffix="ago" :date="not.created_at" lang="en"></vue-moments-ago>
                                        </div>
                                    </a>
                                </template>
                            </template>
                            <template v-else>
                                <div class="p-3 text-center">
                                    <span class="material-symbols-outlined">highlight_off</span>
                                    <p>Sie haben im Moment keine Benachrichtigung</p>
                                </div>
                            </template>
                            
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <span v-if="unseenMsg > 0" class="badge badge-danger badge-pill notify-badge">@{{ unseenMsg }}</span>
                        <a class="nav-link" href id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                        <h6>@{{ conv.participant.name }}</h6>
                                        <p class="msg-details">@{{ conv.last_msg.msg }}</p>
                                        <vue-moments-ago class="msg-timer" prefix="" suffix="ago" :date="conv.last_msg.created_at" lang="en"></vue-moments-ago>
                                    </div>
                                </div>
                            </template>

                            <template v-else>
                                <div class="p-3 text-center">
                                    <span class="material-symbols-outlined">highlight_off</span>
                                    <p>Sie haben derzeit keine Nachrichten</p>
                                </div>
                            </template>

                        </div>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>
</div>