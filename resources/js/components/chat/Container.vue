<template>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row justify-content-center align-content-center align-items-start">
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    
                        <div class="d-flex justify-content-center align-content-center align-items-center border-bottom mb-5">
                            <h2>Chat</h2>
                        </div>

                        <template v-if="conversations.length > 0">
                            <!-- Only render the following content if there are conversations -->
                            <div>
                                <!-- Iterate over each conversation in the conversations array -->
                                <router-link v-for="(conv, i) in conversations" :key="i" :to="{name: 'conv-thread', params: {id: conv.id}}">
                                <!-- Create a div element with a class of "d-flex align-items-center badge badge-pill alert-info flex-row justify-start mb-5"
                                    and a class of "unseen" if the conversation's last message has not been seen -->
                                <div class="d-flex align-items-center badge badge-pill alert-info flex-row justify-start mb-5" :class="{'unseen' : conv.last_msg.seen=='unseen'}">
                                    <div>
                                    <!-- If the conversation's participant has a thumbnail image, display it. Otherwise, display a div element
                                        with a class of "user-thumb-alt" and a background color specified by conv.participant.thumb_color -->
                                    <div v-if="conv.participant.thumb == null" class="user-thumb-alt" :style="{'background-color' : conv.participant.thumb_color}">{{ conv.participant.thumb_alter }}</div>
                                    <img v-else :src="conv.participant.thumb" :alt="conv.participant.thumb_alter" class="rounded-circle" width="50" height="50">
                                    </div>
                                    <div class="pl-2">
                                    <!-- Display the conversation's participant's name -->
                                    <p class="h6 text-dark">{{ conv.participant.name }}</p>
                                    <!-- If the conversation's last message was sent by the current user, display "You : " followed by the message.
                                        Otherwise, just display the message. If the message has a file, display "Sent a file" instead of the message -->
                                    <p class="h6 text-dark font-weight-light">{{ conv.last_msg.sent_by==user_id?'You : ':'' }} {{ conv.last_msg.hasFile==1?'Sent a file':conv.last_msg.msg }}</p>
                                    <!-- Display the time that the conversation's last message was created using the vue-moments-ago component -->
                                    <vue-moments-ago :key="i" class="text-dark" prefix="" suffix="ago" :date="conv.last_msg.created_at" lang="en"></vue-moments-ago>
                                    </div>
                                </div>
                                </router-link>
                            </div>
                        </template>


                        <template v-else>
                            <div class="no-notification p-5"><span class="material-symbols-outlined mb-3">highlight_off</span> <p>Sie haben derzeit keine Nachrichten</p></div>
                        </template>

                    
                    </div>

                    <router-view :key="$route.fullPath"></router-view>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import VueMomentsAgo from "vue-moments-ago";
export default {
    components: {
        VueMomentsAgo
    },
    data(){
        return{
            user_id: USERID,
        }
    },
    computed : {
        conversations(){
            return this.$store.getters["Conversation/convs"];
        },
    }
}
</script>
