<template>
    <div class="container">
        <div class="row">
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
                            <h3 class="card-title">Routine Request Chat</h3>
                            <div class="card-tools">
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
                        <div class="card-footer">
                            <input @keydown="sendTypingEvent"
                                   @keyup.enter="sendMessage"
                                   v-model="newMessage"
                                   type="text"
                                   name="message"
                                   placeholder="Enter your message..."
                                   class="form-control">
                            <!--<form action="#" method="post">
                                <div class="input-group">

                                    <span class="input-group-append">
              <button type="button" class="btn btn-primary">Send</button>
            </span>
                                </div>
                            </form>-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-2">
                <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Note:</h5>
                    Your requested routine will appear here
                </div>
            </div>
            <div class="col-12">

                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fa fa-globe"></i> Islington.
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>

                    <!-- Table row -->
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead >
                                <tr>
                                    <th>Day</th>
                                    <th>Time</th>
                                    <th style="width: 10%">Class Type</th>
                                    <th style="width: 16%">Module Code</th>
                                    <th>Module Title</th>
                                    <th>Lecturer</th>
                                    <th>Group</th>
                                    <th>Block</th>
                                    <th>Room</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{routine.day}}</td>
                                    <td>{{routine.time}}</td>
                                    <td>{{routine.class_type}}</td>
                                    <td>{{routine.module_code}}</td>
                                    <td>{{routine.module_title}}</td>
                                    <td>{{routine.lecturer}}</td>
                                    <td>{{routine.group}}</td>
                                    <td>{{routine.block}}</td>
                                    <td>{{routine.room}}</td>

                                </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>


                </div>
                <!-- /.invoice -->
            </div>


        </div>
    </div>
</template>

<script>

    export default {

        data() {
            return {
                user: [],
                routine: [],
                messageDate: '',

                /* day: '',
                 time: '',
                 class_type: '',
                 module_code: '',
                 module_title: '',
                 lecturer: '',
                 group: '',
                 block: '',
                 room: '',*/
                messages: [],
                newMessage: '',
                activeUser: false,
                typingTimer: false,
            };
        },
        mounted() {
           // console.log(window.user);
            this.user= window.user;

        },

        created() {

            this.fetchMessages();
            this.fetchMyRoutine();


            window.Echo.channel('pchat' + window.user.id).listen('ChatEvent', (event) => {

                this.routine = event.chat;
            });

        },
        methods: {

            fetchMyRoutine() {
                axios.post('myroutine', {id: window.user.id}).then(response => {
                    this.routine = response.data;
                    moment.locale('en');

                    var date = moment(this.routine.created_at);


                    var dt = moment(date, "YYYY-MM-DD HH:mm:ss");

                    this.messageDate = dt.format('MMM DD HH:mm a');
                })
            },
            fetchMessages() {
                axios.post('fetchMessage',{id:window.user.id}).then(response => {
                    this.messages = response.data;


                })
            },
            sendMessage() {
                this.messages.push({
                    user: window.user,
                    message: this.newMessage
                });
                axios.post('messages', {message: this.newMessage, id: 1});
                this.newMessage = '';
            },
            sendTypingEvent() {
                /*window.Echo.join('chat')
                    .whisper('typing', this.user);*/
                //console.log(this.user.username + ' is typing now')
            }

        }
    }
</script>

<style scoped>
    .card-body {
        overflow-y: auto;

    }


</style>

