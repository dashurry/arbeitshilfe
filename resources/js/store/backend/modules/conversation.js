import axios from "axios";

const state = {
    conversations: [],
    unseen: 0,
};

const getters = {
    convs : state => {
        return state.conversations;
    }
};

const actions = {
    getAllConversation({commit}) {
        axios.get("/get-conversations").then(resp => {
            return resp.data;
        }).then(data => {
            commit("SET_CONVERSATION",data);
        }).catch(err => {
            console.error(err.response.data);
        })
    },
};

const mutations = {
    SET_CONVERSATION(state, data){
        state.conversations = data.data;
        state.unseen = data.unseen;
    },
    PUSH_NEW_CONVERSATION(state,data){
        if(data.type == "new_conversation_created"){
            state.conversations.unshift(data.msg);
            state.unseen += 1;
        }
    },
    SEEN(state,convId){
        state.conversations.forEach((item,i) => {
            if(item.id == convId){
                if(item.last_msg.seen == "unseen"){
                    item.last_msg.seen = "seen";
                    state.unseen -= 1;
                }
            }
        });
    },
    RECIEVE_NEW_MSG(state,data){
        if(data.type == "new_msg"){
            var conv = data.data;
            let convId = conv.id;
            // Check if this conversation already exists or not
            state.conversations.forEach((item,i)=>{
                // If exists in the array
                if (item.id == convId) {
                    item.last_msg = conv.last_msg;

                    var newVal = item;
                    if (state.conversations.indexOf(i > 0)) {
                        state.conversations.splice(i, 1);
                        state.conversations.unshift(newVal);
                    }

                    if (!document.getElementById("chat-conversation-"+convId))
                    {
                        state.unseen +=1;
                    }
                }
            })
            // End
        }
    },
    UPDATE_MESSAGE_FOR_SENDER(state,msg){
        state.conversations.forEach((item,i)=>{
            if(item.id == msg.conversation_id){
                item.last_msg = msg;

                var newVal = item;
                if(state.conversations.indexOf(i > 0))
                {
                    state.conversations.splice(i,1);
                    state.conversations.unshift(newVal);
                }
            }
        })
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}