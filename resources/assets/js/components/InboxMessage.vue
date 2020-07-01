<template>
    <div class="container">
        <div class="row" v-if="$gate.isAdmin()">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Routine</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <div class="col-12 mt-2">
                <div class="col-12 mt-2">
                    <div class="card card-primary direct-chat direct-chat-primary">
                        <div class="card-header">
                            <h3 class="card-title">Routine Requested Chat</h3>
                            <div class="card-tools">
                                <span data-toggle="tooltip" title="3 New Messages" class="badge badge-light">3</span>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts"
                                        data-widget="chat-pane-toggle">
                                    <i class="fas fa-comments"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-widget="remove"><i
                                        class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">


                            <div class="direct-chat-messages">

                                <div class="direct-chat-msg" v-for="(message) in messages">
                                    <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-left">{{ message.user.name }}</span>
                                        <span class="direct-chat-timestamp float-right">{{messageDate}}</span>
                                    </div>
                                    <!--
                                                                        <img class="direct-chat-img" src="/img/bg-img/bc1.jpg" alt="message user image">
                                    -->

                                    <div class="direct-chat-text">
                                        {{ message.message }}
                                    </div>
                                </div>


                            </div>

                        </div>
                        <!--<div class="card-footer">
                            <input @keydown="sendTypingEvent"
                                   @keyup.enter="sendMessage"
                                   v-model="newMessage"
                                   type="text"
                                   name="message"
                                   placeholder="Enter your message..."
                                   class="form-control">
                            &lt;!&ndash;<form action="#" method="post">
                                <div class="input-group">

                                    <span class="input-group-append">
              <button type="button" class="btn btn-primary">Send</button>
            </span>
                                </div>
                            </form>&ndash;&gt;
                        </div>-->
                    </div>
                </div>
            </div>



        </div>
        <div v-if="!$gate.isAdmin()">
            <not-found></not-found>
        </div>
    </div>

</template>

<script>

    export default {
        props: ['user'],

        data() {
            return {
                messageDate:'',
                messages: [],
                newMessage: '',
                routineRequestMessage: '',
                requestingUserId: '',
                users: [],
                activeUser: false,
                typingTimer: false,
            };
        },

        created() {
            //cant listen to own message

            this.fetchMessages();

            window.Echo.channel('pchat' + 1).listen('ChatEvent', (event) => {
                this.messages.push(event.chat);
                this.users = event.chat.user;
                this.routineRequestMessage = event.chat.message;
                console.log(this.routineRequestMessage);
                this.requestingUserId = event.chat.user_id;
                axios.post('sendRoutines', {message: this.routineRequestMessage, id: this.requestingUserId});

            });


        },
        methods: {
            fetchMessages() {
               if(this.$gate.isAdmin()){
                   axios.get('messages').then(response => {
                       this.messages = response.data;

                       moment.locale('en');

                       var date = moment(this.messages.created_at);


                       var dt = moment(date, "YYYY-MM-DD HH:mm:ss");

                       this.messageDate = dt.format('MMM DD HH:mm a');
                   });
               }

            },
            sendMessage() {
                this.messages.push({
                    user: this.users,
                    message: this.newMessage
                });

                axios.post('sendRoutines', {message: this.routineRequestMessage, id: this.requestingUserId});
                this.newMessage = '';
            },
            sendTypingEvent() {
                /* window.Echo.join('chat')
                     .whisper('typing', this.user);*/
                // console.log(this.user.username + ' is typing now')
            }

        }
    }
</script>

<style scoped>
    .card-body {
        overflow-y: auto;

    }


</style>

