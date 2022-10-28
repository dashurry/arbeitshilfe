<template>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row justify-content-center align-content-center align-items-start">
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    
                        <div class="d-flex justify-content-center align-content-center align-items-center border-bottom">
                            <h2>Chat</h2>
                        </div>

                        <template v-if="conversations.length > 0">
                            <div>
                                <router-link v-for="(conv,i) in conversations" :key="i" :to="{name: 'conv-thread', params: {id: conv.id}}">
                                    <div class="p-2 card bg-primary flex-row justify-content-start" :class="{'unseen' : conv.last_msg.seen=='unseen'}">
                                        <div>
                                            <div v-if="conv.participant.thumb == null" class="user-thumb-alt" :style="{'background-color' : conv.participant.thumb_color}">{{ conv.participant.thumb_alter }}</div>
                                            <img v-else :src="conv.participant.thumb" :alt="conv.participant.thumb_alter" class="rounded-circle" width="50" height="50">
                                        </div>
                                        <div class="card-body p-0 pl-2">
                                            <p class="h6 text-white">{{ conv.participant.name }}</p>
                                            <p class="h6 text-white font-weight-light">{{ conv.last_msg.sent_by==user_id?'You : ':'' }} {{ conv.last_msg.hasFile==1?'Sent a file':conv.last_msg.msg }}</p>
                                            <vue-moments-ago :key="i" class="text-white" prefix="" suffix="ago" :date="conv.last_msg.created_at" lang="en"></vue-moments-ago>
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

<style scoped>
.wt-main {
    background: #ffffff;
    margin-bottom: 0rem;
}
</style>

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
