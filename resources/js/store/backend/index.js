import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

import Conversation from "./modules/conversation";

export default new Vuex.Store({
    modules: {
        Conversation,
    }
});