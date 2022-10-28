<template>
<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
    <div class="chat-box" :id="`chat-conversation-${this.$route.params.id}`">
        <div class="card">
            <div class="title card-body">
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
        <div class="msg" v-if="participantTyping">
            <div class="single-msg">
                <div class="img">
                        <img :src="threadDetails.participant.thumb" :alt="threadDetails.participant.thumb_alter" v-if="threadDetails.participant.thumb != null">
                    <div class="thumb" v-bind:style="{'background' : threadDetails.participant.thumb_color}" v-else>{{ threadDetails.participant.thumb_alter }}</div>
                </div>
                <div class="msg-body">
                    <div class="msg-text" style="padding: 13px 35px;">
                        <div class="dot-typing"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End -->

        <div class="msg sent-by-me" v-if="msgForm.hasFile && msgForm.busy">
            <div class="single-msg">
                <div class="msg-body">
                    <div class="msg-text bg-sent">
                        <span>Senden... <span class="ml-3 spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></span>
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
                    <div class="ml-2 card">
                        <div class="card-body">
                            <div class="file-info" v-if="mg.hasFile == 1 && mg.fileType == 'other'">
                                <h2><i class="fas fa-file"></i></h2>
                                <a class="document" href="#">{{ mg.file }}</a>
                            </div>
                            <div class="file-info" v-if="mg.hasFile == 1 && mg.fileType == 'image'">
                                <a class="file-img" :href="`/uploads/conversation/${$route.params.id}/${mg.file}`" target="_blank">
                                    <img :src="`/uploads/conversation/${$route.params.id}/${mg.file}`" alt="">
                                </a>
                            </div>
                            <span>{{ mg.msg }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5 sent-by-me" :key="i" v-else>
                <h6 class="text-dark d-flex justify-content-end"><small>{{ mg.created_at }}</small></h6>
                <div class="w-100 d-flex align-items-center justify-content-end">
                    <div class="card">
                        <div class="card-body bg-primary">
                            <div class="file-info" v-if="mg.hasFile == 1 && mg.fileType == 'other'">
                                <h2><i class="fas fa-file"></i></h2>
                                <a class="document" href="#">{{ mg.file }}</a>
                            </div>
                            <div class="file-info" v-if="mg.hasFile == 1 && mg.fileType == 'image'">
                                <a class="file-img" :href="`/uploads/conversation/${$route.params.id}/${mg.file}`" target="_blank">
                                    <img :src="`/uploads/conversation/${$route.params.id}/${mg.file}`" alt="">
                                </a>
                            </div>
                            <span class="text-light">{{ mg.msg }}</span>
                            <span v-if="i == 0" class="ml-3 msg-seen" :title="mg.seen=='seen'?`Seen by ${threadDetails.participant.name}`:'Message Delivered'">
                                <i class="fas fa-check" v-if="!msgForm.busy"></i>
                                <i v-if="mg.seen=='seen'" class="fas fa-check"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            
        </template>

        


        <!-- <div class="msg sent-by-me">
            <span class="time">Today 2:40 AM</span>
            <div class="single-msg">
                <div class="msg-body">
                    <div class="msg-text bg-sent">
                        <div class="file-info">
                            <h2><i class="fas fa-file"></i></h2>
                            <a class="document" href="#">Project.pdf</a>
                        </div>
                        <span>This?
                        </span>
                    </div>
                </div>
            </div>
            <span class="msg-seen"><i class="fas fa-check"></i><i class="fas fa-check"></i></span>
        </div> -->

        
    </div>
    <div class="msg-type-area d-flex" v-if="threadDetails.conv_status=='open'">
        <div class="file-area" v-if="msgForm.hasFile">
            <p>{{ msgForm.msgFile.name }}</p>
            <button title="Remove file" @click="removeFile"><i class="fas fa-times"></i></button>
        </div>
        <div class="input-area">
            <button title="Add photo, video , files" @click="openFileDialogue">
                <i class="material-symbols-outlined">image</i>
            </button>
            <input type="file" hidden id="msgFile" @change="fileChange">
        </div>
        <div class="type-area">
            <textarea placeholder="Type here..." v-model="msgText" title="Press shift + enter for new line" id="msg-textarea"
            @keydown.exact="sendTypingEvent"
            @keydown.enter.exact.prevent="sendMessage"
            @keydown.enter.shift.exact.prevent="newLine($event)"
            ></textarea>
        </div>
        <div class="send-area">
            <button title="Send message" @click="sendMessage">
                <i class="fas fa-paper-plane"></i>
            </button>
        </div>
    </div>
    <div class="msg-type-area" v-else>
        <p class="text-center text-muted">You can't reply to this conversation</p>
    </div>

    </div>
</div>
</template>

<script>
export default {
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
            this.msgForm.msgText = this.msgText;
            this.msgForm.userOnline = this.participantOnline,
            this.msgText = "";
            if(this.msgForm.hasFile != true)
            {
                // Create new message on client side
                var newMsg = {
                    id: null,
                    conversation_id: this.$route.params.id,
                    msg: this.msgForm.msgText,
                    hasFile: this.msgForm.file!=null?1:0,
                    file: null,
                    fileType: null,
                    sent_by: this.user_id,
                    seen: 'unseen',
                    created_at: "Today - "+moment().format("hh:mm A"),
                    updated_at: moment(),
                }
                this.msg.unshift(newMsg);
                this.sentAudio.play();

                var newMsg2 = {
                    id: null,
                    conversation_id: this.$route.params.id,
                    msg: this.limitedMsgString(this.msgForm.msgText),
                    hasFile: this.msgForm.file!=null?1:0,
                    file: null,
                    fileType: null,
                    sent_by: this.user_id,
                    seen: this.participantOnline==true?'seen':'unseen',
                    created_at: moment().format("YYYY-MM-DD HH:mm:ss"),
                    updated_at: moment(),
                }
                this.$store.commit("Conversation/UPDATE_MESSAGE_FOR_SENDER",newMsg2);
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

<style>

</style>