// Import the Vue and VueRouter libraries
import Vue from "vue";
import VueRouter from "vue-router";

// Tell Vue to use the VueRouter library
Vue.use(VueRouter);

// Create a variable called "prefix" and assign it the value "/message-center"
let prefix = "/message-center";


// Import the ChatBox, NoChat, and ChatArea components
import EasinChatBox from "../components/chat/ChatBox.vue";
import NoChat from "../components/chat/NoChat.vue";
import ChatArea from "../components/chat/ChatArea.vue";

// Create an array of routes for the Vue Router
const routes = new VueRouter({
    // Use the HTML5 history API to enable clean URLs
    // The mode property is set to 'history' to enable clean URLs (without the # symbol)
    mode: 'history',
    // Add the "chat-user-active" class to the active route link
    // the main difference between linkExactActiveClass and linkActiveClass is that linkExactActiveClass is only applied 
    // to links that point to the exact route being displayed, while linkActiveClass is applied to links that point to 
    // routes that are part of the current route hierarchy.
    linkExactActiveClass: "chat-user-active",
    linkActiveClass: "chat-user-active",
    // Define the routes for the application
    routes: [
        {
            // Set the path for the root route to be prefixed with the value of the "prefix" variable
            path: prefix+"/",
            // Give the route a name
            name: "chat-center",
            // Set the ChatBox component as the component for this route
            component: EasinChatBox,
            // Redirect to the "conv-thread" route if the user visits the root route
            redirect: {
                name: "conv-thread", // Redirect to the "conv-thread" route
            },
            // Define child routes for the root route
            children: [
                {
                    // Set the path for the child route to be prefixed with "t/:id"
                    path: "thread/:id",
                    // Give the child route a name
                    name: "conv-thread",
                    // Set the ChatArea component as the component for this child route
                    component: ChatArea,
                },
                {
                    // Set the path for the child route to be an empty string (the root of the parent route)
                    path: "",
                    // Give the child route a name
                    name: "conv.no-chat",
                     // Set the NoChat component as the component for this child route
                    component: NoChat,
                }
            ]
        }
    ]
});


export default routes;