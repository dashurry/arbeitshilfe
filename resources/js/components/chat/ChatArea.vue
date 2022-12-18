<template>
    <div class="container">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="chat-box" :id="`chat-conversation-${this.$route.params.id}`">
                    <div class="alert alert-info">
                        <div>
                            <div class="d-flex align-items-center font-weight-bold h5" v-if="!loadingConv">
                                <a :href="`/profile/${threadDetails.participant.user_slug}`" class="text-dark">{{ threadDetails.participant.name }}</a>

                                <div v-if="participantOnline">
                                    <span class="online-status online"></span><small class="ml-2">Online</small>
                                </div>
                                <div v-else>
                                    <span class="online-status"></span>
                                </div>

                            </div>
                            <a v-if="!loadingConv" :href="`/job/${threadDetails.project.slug}`" class="text-dark">@ {{ threadDetails.project.name }}</a>
                        </div>
                    </div>
                <!-- Chat Box -->
                <div class="d-flex flex-column-reverse">
                    <!-- Loader -->
                    <div class="text-center" v-if="loadingMsg">
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Laden...</span>
                        </div>
                    </div> 
                    <!-- Welcome Msg -->
                    <div class="text-center" v-if="!loadingMsg && msg.length < 1">
                        <h1 class="text-success"><i class="material-symbols-outlined">check_circle</i></h1>
                        <h4>Willkommen</h4>
                        <h3>Senden Sie eine Nachricht, um loszulegen</h3>
                    </div>

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

                    <div v-if="msgForm.hasFile && msgForm.busy">
                        <div class="d-flex justify-content-end">
                            <div>
                                <div class="text-white bg-primary p-2 badge-pill">
                                    <span class="h6 font-weight-light">Senden... <span class="ml-3 spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>



                    <template v-for="(mg,i) in msg">

                        <div class="mt-5" :key="i" v-if="mg.sent_by != user_id">
                            <h6 class="text-dark ml-5"><small>{{ mg.created_at }}</small></h6>
                            <div class="d-flex align-items-center">
                                <div class="d-flex">
                                    <template v-if="!loadingConv && threadDetails.participant.thumb != null">
                                        <img :src="threadDetails.participant.thumb" :alt="threadDetails.participant.thumb_alter" v-if="threadDetails.participant.thumb != null" width="50" height="50" class="rounded-circle">
                                    </template>
                                    <div class="thumb" v-bind:style="{'background' : threadDetails.participant.thumb_color}" v-else>{{ threadDetails.participant.thumb_alter }}</div>
                                </div>
                                <div class="ml-2">
                                    <div class="p-2">
                                        <div v-if="mg.hasFile == 1 && mg.fileType == 'other'">
                                            <h2><i class="material-symbols-outlined">draft</i></h2>
                                            <a class="document" href="#">{{ mg.file }}</a>
                                        </div>
                                        <div v-if="mg.hasFile == 1 && mg.fileType == 'image'">
                                            <a :href="`/uploads/conversation/${$route.params.id}/${mg.file}`" target="_blank">
                                                <img :src="`/uploads/conversation/${$route.params.id}/${mg.file}`" alt="">
                                            </a>
                                        </div>
                                        <h4><span class="badge badge-pills badge-light shadow p-3 font-weight-normal">{{ mg.msg }}</span></h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5" :key="i" v-else>
                            <h6 class="text-dark d-flex justify-content-end"><small>{{ mg.created_at }}</small></h6>
                            <div class="w-100 d-flex align-items-center justify-content-end">
                                <div>
                                    <div class="p-2 d-flex">
                                        <div v-if="mg.hasFile == 1 && mg.fileType == 'other'">
                                            <h2><i class="material-symbols-outlined">draft</i></h2>
                                            <a class="document" href="#">{{ mg.file }}</a>
                                        </div>
                                        <div v-if="mg.hasFile == 1 && mg.fileType == 'image'">
                                            <a :href="`/uploads/conversation/${$route.params.id}/${mg.file}`" target="_blank">
                                                <img :src="`/uploads/conversation/${$route.params.id}/${mg.file}`" alt="" width="200" height="200">
                                            </a>
                                        </div>
                                        <h4><span class="badge badge-pills alert-info p-3 shadow font-weight-normal">{{ mg.msg }}</span></h4>
                                        <span v-if="i == 0" class="ml-3 msg-seen" :title="mg.seen=='seen'?`Seen by ${threadDetails.participant.name}`:'Message Delivered'">
                                            <i class="material-symbols-outlined" v-if="!msgForm.busy">check</i>
                                            <i v-if="mg.seen=='seen'" class="material-symbols-outlined">check</i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>  
                </div>

                <div class="d-flex justify-content-between alert alert-warning" v-if="msgForm.hasFile">
                    <div>{{ msgForm.msgFile.name }}</div>
                    <button title="Remove file" @click="removeFile" class="bg-transparent"><i class="material-symbols-outlined">close</i></button>
                </div>
                    
                <div class="d-flex flex-wrap align-items-center" v-if="threadDetails.conv_status=='open'">
                    <!-- Buttons -->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                        <div class="mb-3">
                            <button class="btn btn-outline-info" title="Add photo, video , files" @click="openFileDialogue">
                                <i class="material-symbols-outlined">image</i>
                            </button>
                            <input type="file" hidden id="msgFile" @change="fileChange">
                            <button title="Send message" @click="sendMessage" class="btn btn-lg btn-outline-success ml-3">
                                <i class="material-symbols-outlined">check_circle</i>
                            </button>
                        </div>
                    </div>
                    <!-- Textarea -->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">  
                        <div class="w-100">
                            <textarea class="form-control" placeholder="Type here..." v-model="msgText" title="Press shift + enter for new line" id="msg-textarea"
                            @keydown.exact="sendTypingEvent"
                            @keydown.enter.exact.prevent="sendMessage"
                            @keydown.enter.shift.exact.prevent="newLine($event)"
                            ></textarea>
                        </div>
                    </div>
                </div>
                <div class="msg-type-area" v-else>
                    <p class="text-center text-muted">You can't reply to this conversation</p>
                </div>

            
                    <div class="card chat-app">
                        <template v-if="conversations.length > 0">
                                <div id="plist" class="people-list">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Search...">
                                    </div>
                                    <ul class="list-unstyled chat-list mt-2 mb-0">
                                        <!-- Iterate over each conversation in the conversations array -->
                                        <router-link v-for="(conv, i) in conversations" :key="i" :to="{name: 'conv-thread', params: {id: conv.id}}">
                                            <li class="clearfix">
                                                <!-- If the conversation's participant has a thumbnail image, display it. Otherwise, display a div element
                                                with a class of "user-thumb-alt" and a background color specified by conv.participant.thumb_color -->
                                                <div v-if="conv.participant.thumb == null" class="user-thumb-alt" :style="{'background-color' : conv.participant.thumb_color}">{{ conv.participant.thumb_alter }}</div>
                                                <img :src="conv.participant.thumb" :alt="conv.participant.thumb_alter">
                                                <div class="about">
                                                    <!-- Display the conversation's participant's name -->
                                                    <div class="name">{{ conv.participant.name }}</div>
                                                    <div class="status"> <i class="fa fa-circle offline"></i>
                                                    <!-- Display the time that the conversation's last message was created using the vue-moments-ago component -->
                                                    <vue-moments-ago :key="i" prefix="" suffix="ago" :date="conv.last_msg.created_at" lang="en"></vue-moments-ago>
                                                    </div>                                            
                                                </div>
                                            </li>
                                            <li class="clearfix active">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                                                <div class="about">
                                                    <div class="name">Aiden Chavez</div>
                                                    <div class="status"> <i class="fa fa-circle online"></i> online </div>
                                                </div>
                                            </li>
                                            <li class="clearfix">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="avatar">
                                                <div class="about">
                                                    <div class="name">Mike Thomas</div>
                                                    <div class="status"> <i class="fa fa-circle online"></i> online </div>
                                                </div>
                                            </li>                                    
                                            <li class="clearfix">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                                                <div class="about">
                                                    <div class="name">Christian Kelly</div>
                                                    <div class="status"> <i class="fa fa-circle offline"></i> left 10 hours ago </div>
                                                </div>
                                            </li>
                                            <li class="clearfix">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar8.png" alt="avatar">
                                                <div class="about">
                                                    <div class="name">Monica Ward</div>
                                                    <div class="status"> <i class="fa fa-circle online"></i> online </div>
                                                </div>
                                            </li>
                                            <li class="clearfix">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="avatar">
                                                <div class="about">
                                                    <div class="name">Dean Henry</div>
                                                    <div class="status"> <i class="fa fa-circle offline"></i> offline since Oct 28 </div>
                                                </div>
                                            </li>
                                        </router-link>
                                    </ul>
                                </div>
                        </template>
                        <div class="chat">
                            <div class="chat-header clearfix">
                                <div class="row">
                                    <div class="col-lg-6">
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
                                        <a href="javascript:void(0);" class="btn btn-outline-info"><i class="fa fa-cogs"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-outline-warning"><i class="fa fa-question"></i></a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="chat-history">
                                <ul class="m-b-0">
                                    <template v-for="(mg,i) in msg">
                                        <li v-if="mg.sent_by != user_id" :key="i" class="clearfix" >
                                            <div class="message-data text-right">
                                                <span class="message-data-time">{{ mg.created_at }}</span>
                                                <img v-if="threadDetails.participant.thumb != null" :src="threadDetails.participant.thumb" :alt="threadDetails.participant.thumb_alter">
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
                                        <span class="input-group-text"  @click="sendMessage"><i class="fa fa-send"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Enter text here..." v-model="msgText" title="Press shift + enter for new line" id="msg-textarea"
                                    @keydown.exact="sendTypingEvent"
                                    @keydown.enter.exact.prevent="sendMessage"
                                    @keydown.enter.shift.exact.prevent="newLine($event)">                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Container for uploaded Files -->
                    <div class="d-flex justify-content-between alert alert-warning" v-if="msgForm.hasFile">
                    <div>{{ msgForm.msgFile.name }}</div>
                    <button title="Remove file" @click="removeFile" class="bg-transparent"><i class="material-symbols-outlined">close</i></button>
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
    computed : {
        conversations(){
            return this.$store.getters["Conversation/convs"];
        },
    },
    methods: {
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
            user.forEach((item,i)=>{
                if(item.id == this.threadDetails.participant.id){
                    this.participantOnline = true;
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
        })
        .leaving((user)=>{
            if(user.id == this.threadDetails.participant.id){
                this.participantOnline = false;
            }
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
        // 
        setTimeout(()=>{

            this.$store.commit("Conversation/SEEN",this.$route.params.id);
            axios.post("/make-last-msg-seen",{
                convId : this.$route.params.id
            }).then(resp=>{
                return resp.data;
            }).then(data=>{
                // 
            }).catch(err=>{
                console.error(err.response.data);
            })
            
            
        },1500);
    }
}
</script>

<style scoped>
.chat-history{
    height: 75vh;
    overflow-y: auto;
    overflow-x: hidden;
}
</style>