<template>
    <div class="container">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="chat-box" :id="`chat-conversation-${this.$route.params.id}`">
                    <div class="card chat-app">
                        <div id="plist" class="people-list">
                            <template v-if="conversations.length > 0">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-search"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Search...">
                                </div>
                                <ul class="list-unstyled chat-list mt-2 mb-0">
                                    <!-- Iterate over each conversation in the conversations array -->
                                    <router-link v-for="(conv, i) in conversations" :key="i" :to="{name: 'conv-thread', params: {id: conv.id}}">
                                        <!-- Add a click event listener to the <li> element -->
                                        <!-- Add a class of "active" if the current route's id parameter matches the id of the conversation -->
                                        <li @click="setActive(conv.id)" class="clearfix" :class="{ 'active': $route.params.id === conv.id }">
                                            <!-- If the conversation's participant has a thumbnail image, display it. Otherwise, display a div element
                                            with a class of "user-thumb-alt" and a background color specified by conv.participant.thumb_color -->
                                            <div v-if="conv.participant.thumb == null" class="user-thumb-alt" :style="{'background-color' : conv.participant.thumb_color}">{{ conv.participant.thumb_alter }}</div>
                                            <img :src="conv.participant.thumb" :alt="conv.participant.thumb_alter">
                                            <div class="about">
                                                <!-- Display the conversation's participant's name -->
                                                <div class="name">{{ conv.participant.name }}</div>
                                                <div v-if="conv.participant.is_online" class="status"> <i class="fa fa-circle online"></i> online </div>
                                                <div v-else class="status"> <i class="fa fa-circle offline"></i>
                                                <!-- Display the time that the conversation's last message was created using the vue-moments-ago component -->
                                                <vue-moments-ago :key="i" prefix="" suffix="ago" :date="conv.last_msg.created_at" lang="en"></vue-moments-ago>
                                                </div>                                            
                                            </div>
                                        </li>
                                    </router-link>
                                </ul>
                            </template>
                        </div>
                        <router-view :key="$route.fullPath"></router-view>                     
                    </div>
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
        return {
            threadDetails: {},
            loadingMsg: true,
            loadingConv: true,
            user_id: USERID,
        }
    },
    computed : {
        conversations(){
            return this.$store.getters["Conversation/convs"];
        }
    },
    methods: {
        // The setActive method uses the $router.push method to update the active route based on the ID of the clicked <li> element.
        setActive(id) {
        // Use the $router.push method to update the active route
        this.$router.push({ name: 'conv-thread', params: { id } });
        }
    }
}
</script>