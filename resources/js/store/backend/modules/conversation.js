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
    // Method to get all conversation data
    getAllConversation({ commit }) {
      // Make a GET request to the /get-conversations endpoint using axios
      axios.get("/get-conversations")
        // If the request is successful, return the response data
        .then(resp => resp.data)
        // Use the commit method to commit the SET_CONVERSATION mutation with the data as the payload
        .then(data => commit("SET_CONVERSATION", data))
        // If there is an error, log the error message to the console
        .catch(err => console.error(err.response.data));
    },
  };
  

  const mutations = {
    // Mutation to set the conversation data in the state object
    SET_CONVERSATION(state, data) {
      // Set the conversations property of the state object to the data.data property
      state.conversations = data.data;
      // Set the unseen property of the state object to the data.unseen property
      state.unseen = data.unseen;
    },
    // Mutation to add a new conversation to the state object
    PUSH_NEW_CONVERSATION(state, data) {
        // Check if the type property of the data object is "new_conversation_created"
        if (data.type == "new_conversation_created") {
        // Add the msg property of the data object to the beginning of the conversations array in the state object
        state.conversations.unshift(data.msg);
        // Increment the unseen property of the state object by 1
        state.unseen += 1;
        }
    },
  
    // Mutation to mark a conversation as seen
    SEEN(state, convId) {
        // Iterate over the conversations array in the state object
        state.conversations.forEach((item, i) => {
        // Check if the id property of the item is equal to convId
        if (item.id == convId) {
            // Check if the seen property of the last_msg property of the item is equal to "unseen"
            if (item.last_msg.seen == "unseen") {
            // Set the seen property to "seen"
            item.last_msg.seen = "seen";
            // Decrement the unseen property of the state object by 1
            state.unseen -= 1;
            }
        }
        });
    },
  
    // Mutation to handle receiving a new message
    RECIEVE_NEW_MSG(state, data) {
        // Check if the type property of the data object is "new_msg"
        if (data.type == "new_msg") {
        // Set the conv variable to the data property of the data object
        // Set the convId variable to the id property of the conv object
        var conv = data.data;
        let convId = conv.id;
    
        // Iterate over the conversations array in the state object
        state.conversations.forEach((item, i) => {
            // Check if the id property of the item is equal to convId
            if (item.id == convId) {
            // Set the last_msg property of the item to the last_msg property of the conv object
            item.last_msg = conv.last_msg;
    
            // Set the newVal variable to the item
            var newVal = item;
            // Check if the index of the item in the conversations array is greater than 0
            if (state.conversations.indexOf(i > 0)) {
                // Remove the item from the array and add newVal to the beginning of the array
                state.conversations.splice(i, 1);
                state.conversations.unshift(newVal);
            }
    
            // Check if an element with the id "chat-conversation-" followed by the convId variable does not exist in the DOM
            if (!document.getElementById("chat-conversation-" + convId)) {
                // Increment the unseen property of the state object by 1
                state.unseen += 1;
            }
            }
        });
        }
    },
  
    // Mutation to update a message for the sender
    UPDATE_MESSAGE_FOR_SENDER(state, msg) {
        // Iterate over the conversations array in the state object
        state.conversations.forEach((item, i) => {
        // Check if the id property of the item is equal to the conversation_id property of the msg object
        if (item.id == msg.conversation_id) {
            // Set the last_msg property of the item to the msg object
            item.last_msg = msg;
    
            // Set the newVal variable to the item
            var newVal = item;
            // Check if the index of the item in the conversations array is greater than 0
            if (state.conversations.indexOf(i > 0)) {
            // Remove the item from the array and add newVal to the beginning of the array
            state.conversations.splice(i, 1);
            state.conversations.unshift(newVal);
            }
        }
        });
    },
  
    // Mutation to toggle a user's online presence
    TOGGLE_USER_PRESENCE(state, data) {
        // Iterate over the conversations array in the state object
        state.conversations.forEach((item, i) => {
        // Check if the id property of the participant property of the item is equal to the id property of the data object
        if (item.participant.id == data.id) {
            // Check if the status property of the data object is equal to "online"
            if (data.status == "online") {
            // Set the is_online property of the participant property of the item to true
            item.participant.is_online = true;
            } else {
            // Set the is_online property of the participant property of the item to false
            item.participant.is_online = false;
            }
        }
        });
    } 
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}