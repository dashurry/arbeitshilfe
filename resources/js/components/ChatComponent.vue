<template>
    <div>
        <div class="wt-dashboardboxtitle wt-titlemessages" v-if="user">
            <a href="javascript:void(0);" class="wt-back"><i class="ti-arrow-left"></i></a>
            <div class="wt-userlogedin">
                <figure class="wt-userimg">
                    <img :src="user.selected_user_image" alt="image description">
                </figure>
                <div class="wt-username">
                    <h3><i class="material-symbols-outlined">verified</i> {{user.selected_user_name}}</h3>
                    <span>{{user.selected_user_tagline}}</span>
                </div>
            </div>
            <a :href="url+'/profile/'+user.selected_user_slug" class="wt-viewprofile">{{ trans('lang.view_profile') }}</a>
        </div>
        <div class="wt-dashboardboxcontent wt-dashboardholder wt-offersmessages">
            <ul v-if="users">
                <li>
                    <div class="wt-verticalscrollbar wt-dashboardscrollbar">
                        <chat-users></chat-users>
                    </div>
                </li>
                <li>
                    <chat-area :empty_error="this.empty_field" :chat_host="this.host" :chat_port="this.port"></chat-area>
                </li>
            </ul>
            <div class="wt-chatarea wt-chatarea-empty" v-else>
                <figure class="wt-chatemptyimg">
                    <img :src="no_record_img" alt="img description">
                    <figcaption><h3>{{ trans('lang.no_chat_message') }}</h3></figcaption>
                </figure>
            </div>
        </div>
    </div>
</template>
<script>
import Event from '../event.js';
    export default{
        props:['no_msg', 'empty_field', 'host', 'port'],
        data() {
            return {
                users: true,
                url:APP_URL,
                no_record_img: APP_URL+'/images/message-img.png',
                chat_users:[],
                id:'',
                user:'',
            }
        },
        methods: {
            // Fetch a list of users from the server
            getUsers() {
                // Save a reference to the current Vue instance (`this`) in a variable called `self`
                let self = this;

                // Make an HTTP GET request to the specified URL using the Axios library
                axios.get(APP_URL + '/message-center/get-users')
                // When the response is received, execute the following code
                .then(function (response) {
                    // Check the type of the response data
                    if (response.data.type == 'error') {
                    // If the response is an error, set the `users` property of the current Vue instance to `false`
                    self.users = false;
                    // Emit an event called 'chat-users' with the current list of users (stored in the `chat_users` property) as an argument
                    Event.$emit('chat-users', { users:self.chat_users });
                    } else {
                    // If the response is not an error, emit an event called 'chat-users' with the list of users from the response as an argument
                    Event.$emit('chat-users', { users:response.data });
                    }
                });
            },
        },


        mounted() {
            Event.$on('active-user', (data) => {
                this.id = data.id;
                this.user = data.user;
            })
        },
        created: function () {
            this.getUsers();
        }
    }
</script>
