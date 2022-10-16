import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

let prefix = "/message-center"

import EasinChatBox from "../components/chat/ChatBox.vue";
import NoChat from "../components/chat/NoChat.vue";
import ChatArea from "../components/chat/ChatArea.vue";
const routes = new VueRouter({
    mode: 'history',
    linkExactActiveClass: "chat-user-active",
    linkActiveClass: "chat-user-active",
    routes: [
        {
            path: prefix+"/",
            name: "chat-center",
            component: EasinChatBox,
            redirect: {
                name: "conv.no-chat",
            },
            children: [
                {
                    path: "",
                    name: "conv.no-chat",
                    component: NoChat,
                },
                {
                    path: "t/:id",
                    name: "conv-thread",
                    component: ChatArea,
                }
            ]
        }
    ]
});

export default routes;