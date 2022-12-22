<template>
    <div class="chat">
        <div class="chat-header clearfix">
            <div class="row">
                <div class="col-lg-6" v-if="threadDetails != null">
                    <a :href="`/profile/${threadDetails.participant.user_slug}`">
                        <img v-if="threadDetails.participant.thumb != null" :src="threadDetails.participant.thumb" :alt="threadDetails.participant.thumb_alter">
                        <img v-else :src="threadDetails.participant.thumb_alter" v-bind:style="{'background' : threadDetails.participant.thumb_color}">
                    </a>
                    <div class="chat-about">
                        <h6 class="m-b-0">{{ threadDetails.participant.name }}</h6>
                        <small>Last seen: 2 hours ago</small><br>
                        <!-- <small>
                            <a v-if="!loadingConv" :href="`/job/${threadDetails.project.slug}`" class="text-dark"> @ {{ threadDetails.project.name.substring(0, 30) }}...</a>
                        </small> -->
                    </div>
                </div>
                <div class="col-lg-6 hidden-sm text-right">
                    <a href="javascript:void(0);" class="btn btn-outline-secondary"><i class="fa fa-camera"></i></a>
                    <a href="javascript:void(0);" class="btn btn-outline-primary" @click="openFileDialogue"><i class="fa fa-image"></i></a>
                    <a href="javascript:void(0);" class="btn btn-outline-info" @click="togglePeopleList"><i class="fa fa-cogs"></i></a>
                    <a href="javascript:void(0);" class="btn btn-outline-warning"><i class="fa fa-question"></i></a>
                </div>
            </div>
        </div>
        <div class="chat-history">
            <!-- Typing -->
            <div v-if="participantTyping">
                <div class="d-flex">
                    <div class="d-flex">
                            <img :src="threadDetails.participant.thumb" :alt="threadDetails.participant.thumb_alter" v-if="threadDetails.participant.thumb != null" width="50" height="50" class="rounded-circle">
                        <div class="thumb" v-bind:style="{'background' : threadDetails.participant.thumb_color}" v-else>{{ threadDetails.participant.thumb_alter }}</div>
                    </div>
                    <div class="ml-3 d-flex align-items-center">
                        <div class="ml-4">
                            <div class="dot-typing"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End -->
            <ul class="m-b-0">
                <template v-for="(mg,i) in msg">
                    <li v-if="mg.sent_by != user_id" :key="i" class="clearfix" >
                        <div class="message-data text-right">
                            <span class="message-data-time">{{ mg.created_at }}</span>
                            <template v-if="threadDetails != null">
                                <img v-if="threadDetails.participant.thumb != null" :src="threadDetails.participant.thumb" :alt="threadDetails.participant.thumb_alter">
                                <img v-else :src="threadDetails.participant.thumb_alter" v-bind:style="{'background' : threadDetails.participant.thumb_color}">
                            </template>
                            <img v-else :src="threadDetails.participant.thumb_alter" v-bind:style="{'background' : threadDetails.participant.thumb_color}">
                        </div>
                        <!-- Display a message div if the message object (mg) has no file attached -->
                        <div v-if="mg.hasFile == 0" class="message other-message float-right">{{ mg.msg }}</div>
                        <!-- Display a message div if the message object has a file attached and the file type is "other" -->
                        <div v-else-if="mg.hasFile == 1 && mg.fileType == 'other'" class="message other-message float-right">
                            {{ mg.msg }}
                            <hr>
                            <!-- Display a link to the file with an icon and the file name -->
                            <a href="#">
                                <i class="material-symbols-outlined">draft</i><br>
                                <!-- Display the file name -->
                                <small>{{ mg.file }}</small>
                            </a> 
                        </div>
                        <!-- Display a div if the message object has a file attached and the file type is "image" -->
                        <div v-else-if="mg.hasFile == 1 && mg.fileType == 'image'" class="message other-message float-right">
                            {{ mg.msg }}
                            <hr>
                            <!-- Display a link to the file with an icon and the file name -->
                            <a :href="`/uploads/conversation/${$route.params.id}/${mg.file}`" target="_blank">
                                <i class="material-symbols-outlined">draft</i><br>
                                <!-- Display the file name -->
                                <small>{{ mg.file }}</small>
                            </a>
                        </div>
                    </li>
                    <li v-else :key="i" class="clearfix">
                        <div class="message-data">
                            <span class="message-data-time">{{ mg.created_at }}</span>
                        </div>
                        <!-- Display a message div if the message object (mg) has no file attached -->
                        <div v-if="mg.hasFile == 0" class="message my-message">{{ mg.msg }}</div> 
                        <!-- Display a message div if the message object has a file attached and the file type is "other" -->
                        <div v-else-if="mg.hasFile == 1 && mg.fileType == 'other'" class="message my-message">
                            {{ mg.msg }}
                            <hr>
                            <!-- Display a link to the file with an icon and the file name -->
                            <a href="#">
                                <i class="material-symbols-outlined">draft</i><br>
                                <!-- Display the file name -->
                                <small>{{ mg.file }}</small>
                            </a> 
                        </div>
                        <!-- Display a div if the message object has a file attached and the file type is "image" -->
                        <div v-else-if="mg.hasFile == 1 && mg.fileType == 'image'" class="message my-message">
                            {{ mg.msg }}
                            <hr>
                            <!-- Display a link to the file with an icon and the file name -->
                            <a :href="`/uploads/conversation/${$route.params.id}/${mg.file}`" target="_blank">
                                <i class="material-symbols-outlined">draft</i><br>
                                <!-- Display the file name -->
                                <small>{{ mg.file }}</small>
                            </a>
                        </div>                                  
                    </li>
                </template>
            </ul>
            
        </div>
        <div class="chat-message clearfix">
            <div class="input-group mb-0">
                <div class="input-group-prepend">
                    <input type="file" hidden id="msgFile" @change="fileChange">
                    <span class="input-group-text"  @click="sendMessage"><i class="fa fa-send"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Enter text here..." v-model="msgText" title="Press shift + enter for new line" id="msg-textarea"
                @keydown.exact="sendTypingEvent"
                @keydown.enter.exact.prevent="sendMessage"
                @keydown.enter.shift.exact.prevent="newLine($event)">                                    
            </div>
            <!-- Container for uploaded Files -->
            <div class="d-flex justify-content-between alert alert-warning" v-if="msgForm.hasFile">
            <div>{{ msgForm.msgFile.name }}</div>
            <button title="Remove file" @click="removeFile" class="bg-transparent"><i class="material-symbols-outlined">close</i></button>
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
            threadDetails: null,
            loadingMsg: true,
            loadingConv: true,
            msg: [],
            user_id: USERID,
            msgForm : new Form({
                msgText: "",
                msgFile: null,
                convId: this.$route.params.id,
                userOnline: false,
                hasFile: false,
            }),
            msgText: "",
            sentAudio : new Audio("/audio/msg_sent.wav"),
            msgGetAudio : new Audio("/audio/msg_get.mp3"),
            participantOnline: false,
            participantTyping: false,
            chatChannel: Echo.join(`Conversation.${this.$route.params.id}`),
            typingTimer: false,
        }
    },
    methods: {
        togglePeopleList() {
        // this.showPeopleList = !this.showPeopleList; // Toggle the value of showPeopleList when the button is clicked
            this.$root.$refs.CHAT_CONTAINER.toggleActive();
        },
        limitedMsgString(text){
            if(text.length > 16){
                text = text.substring(0,16)+"...";
            }
            return text;
        },
        getConversationDetail(){
            axios.get("/get-conversation-details",{
                params:{
                    convId : this.$route.params.id
                }
            }).then(resp=>{
                return resp.data;
            }).then(data=>{
                this.loadingConv = false;
                if(data.status == "ok"){
                    this.threadDetails = data.data;
                }
                else{
                    this.$router.push({
                        name: 'conv.no-chat',
                    });
                }
            }).catch(err=>{
                this.loadingConv = false;
                console.error(err.response.data);
                this.$router.push({
                    name: 'conv.no-chat',
                });
            });
        },
        getMessages(){
            axios.get("/get-messages",{
                params: {
                    convId : this.$route.params.id,
                }
            }).then(resp=>{
                return resp.data;
            }).then(data=>{
                this.loadingMsg = false;
                this.msg = data;
            }).catch(err=>{
                console.error(err.response.data);
            })
        },
        async sendMessage(){
            // Check if the msgText property is an empty string
            if (this.msgText === "" && this.msgForm.hasFile != true) {
                // Show an error message or alert to inform the user that the message cannot be empty
                this.$toast.warning('Die Nachricht kann nicht leer sein', '');
                return;
            }
             // Update the msgForm object with the current msgText and participantOnline status
            this.msgForm.msgText = this.msgText;
            this.msgForm.userOnline = this.participantOnline,
            // Reset the msgText to an empty string
            this.msgText = "";
            
            // Check if the msgForm has a file attached
            if (this.msgForm.hasFile != true) {
                // Create a new message object for the client side
                var newMessage  = {
                id: null, // placeholder for the message ID (to be assigned by the server)
                conversation_id: this.$route.params.id, // ID of the current conversation
                msg: this.msgForm.msgText, // message text
                hasFile: this.msgForm.file != null ? 1 : 0, // flag indicating if the message has a file attached (1 = yes, 0 = no)
                file: null, // placeholder for the file object (if present)
                fileType: null, // placeholder for the file type (if present)
                sent_by: this.user_id, // ID of the user who sent the message
                seen: 'unseen', // flag indicating if the message has been seen by the recipient (unseen, seen)
                created_at: "Today - " + moment().format("hh:mm A"), // timestamp for when the message was created (formatted as "Today - hh:mm A")
                updated_at: moment(), // timestamp for when the message was last updated
                }
                // Add the new message object to the beginning of the msg array
                this.msg.unshift(newMessage );
                // Play the sentAudio file
                this.sentAudio.play();
                
                // Create a new message object for the server side
                var formattedMessage = {
                id: null, // placeholder for the message ID (to be assigned by the server)
                conversation_id: this.$route.params.id, // ID of the current conversation
                msg: this.limitedMsgString(this.msgForm.msgText), // message text (truncated if necessary)
                hasFile: this.msgForm.file != null ? 1 : 0, // flag indicating if the message has a file attached (1 = yes, 0 = no)
                file: null, // placeholder for the file object (if present)
                fileType: null, // placeholder for the file type (if present)
                sent_by: this.user_id, // ID of the user who sent the message
                seen: this.participantOnline == true ? 'seen' : 'unseen', // flag indicating if the message has been seen by the recipient (unseen, seen) based on the participantOnline status
                created_at: moment().format("YYYY-MM-DD HH:mm:ss"), // timestamp for when the message was created (formatted as "YYYY-MM-DD HH:mm:ss")
                updated_at: moment(), // timestamp for when the message was last updated
                }
                // Commit the UPDATE_MESSAGE_FOR_SENDER mutation to the Vuex store, passing in the new message object as an argument
                this.$store.commit("Conversation/UPDATE_MESSAGE_FOR_SENDER",formattedMessage);
                // Stop typing event after sending one message
                this.chatChannel
                .whisper("typing",{
                    typing: false,
                    userId: this.user_id,
                })
            }

            // Store message in server and send other user a notification
            await this.msgForm.post("/send-my-message").then(resp=>{
                return resp.data;
            }).then(data=>{
                console.log(data);
                if(data.status == "ok"){
                    if(this.msgForm.hasFile == true)
                    {
                        this.msg.unshift(data.msg);
                        this.$store.commit("Conversation/UPDATE_MESSAGE_FOR_SENDER",data.msg);
                        // Stop typing event after sending one message
                        this.chatChannel
                        .whisper("typing",{
                            typing: false,
                            userId: this.user_id,
                        })
                        this.sentAudio.play();
                    }
                    if(this.participantOnline){
                        this.msg[0].seen = "seen";
                    }
                    this.msgForm.reset();
                    $("#msgFile").val("");
                }
                else{
                    this.$swal("Failed","Message was not sent","error");
                }
            }).catch(err=>{
                console.error(err.response.data);
            });
        },
        newLine(){
            this.msgText += '\n';
            var textarea = document.getElementById('msg-textarea');
            textarea.focus();
        },
        sendTypingEvent(){
             this.chatChannel
             .whisper("typing",{
                 typing: this.msgText!=""?true:false,
                 userId : this.user_id,
             });
        },
        openFileDialogue(){
            $('#msgFile').trigger("click");
        },
        fileChange(e){
            let file = e.target.files[0];
            if(file){
                this.msgForm.msgFile = file;
                this.msgForm.hasFile = true;
            }
            else{
                this.msgForm.msgFile = null;
                this.msgForm.hasFile = false;
            }
        },
        removeFile(){
            $('#msgFile').val("");
            this.msgForm.hasFile = false;
            this.msgForm.file = null;
        }
    },
    mounted(){
        
        this.getConversationDetail();
        this.getMessages();
        // pusher channel
        this.chatChannel
        .here(user=>{
            console.log(user);
            user.forEach((item,i)=>{

                    if(this.threadDetails != null) {
                        if(item.id == this.threadDetails.participant.id){
                        this.participantOnline = true;
                    }

                    let userData = {
                        id: item.id,
                        status: 'online'
                    }
                    this.$store.commit("Conversation/TOGGLE_USER_PRESENCE",userData);
                }
            })
        })
        .joining((user)=>{

            if(user.id == this.threadDetails.participant.id){
                this.participantOnline = true;
                if(this.participantOnline){
                    this.msg[0].seen = "seen";
                }
            }

            let userData = {
                id: user.id,
                status: "online",
            }

            this.$store.commit("Conversation/TOGGLE_USER_PRESENCE",userData);
        })
        .leaving((user)=>{
            if(user.id == this.threadDetails.participant.id){
                this.participantOnline = false;
            }
            let userData = {
                id: user.id,
                status: "offline",
            }

            this.$store.commit("Conversation/TOGGLE_USER_PRESENCE",userData);
        })
        .listenForWhisper("typing",(resp)=>{
            if(resp.typing == true){
                this.participantTyping = true;

                if(this.typingTimer)
                {
                    clearTimeout(this.typingTimer);
                }
                this.typingTimer = setTimeout(()=>{
                    this.participantTyping = false;
                },3000);
            }
            else{
                this.participantTyping = false;
            }
        })
        .listen(`.new-message`,(data)=>{
            this.msgGetAudio.play();
            this.msg.unshift(data.message);
        })
        // Use setTimeout to delay the execution of the following code block
        setTimeout(() => {
        // Commit the "SEEN" mutation to the "Conversation" module in the store
        this.$store.commit("Conversation/SEEN", this.$route.params.id);

        // Make a POST request to the "/make-last-msg-seen" endpoint
        axios.post("/make-last-msg-seen", {
            convId: this.$route.params.id
        }).then(resp => {
            // Return the data from the response
            return resp.data;
        }).then(data => {
            // Do something with the data received from the server
        }).catch(err => {
            // Log the error message if there is an error in the request
            console.error(err.response.data);
        });
        }, 1500);

    }
}
</script>

<style scoped>
.chat-history{
    height: 68vh;
    overflow-y: auto;
    overflow-x: hidden;
}
</style>