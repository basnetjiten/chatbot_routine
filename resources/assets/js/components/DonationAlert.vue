<template>
    <div v-if="seen" class="container" id="alert">
        <!-- <div class="row justify-content-center ">

             <img src="http://i.stack.imgur.com/SBv4T.gif" alt="this slowpoke moves" height=250 width=500/>
         </div>
         <br>
         <h1 id="hello" class="row justify-content-center my-element  animate__infinite">{{trans[0]}}
             donated {{trans[1]}}</h1>

         &lt;!&ndash;<audio id="myaudio" src="{{($path)}}" type="audio" muted></audio>&ndash;&gt;-->

        <!--
                <input class="checkbox" type="checkbox" checked="checked" aria-label="Tick the checkbox to open/close the prompt"/>
        -->
        <!--
                <audio id="myaudio" src="{{asset('./storage/donation.mp3')}}" type="audio" muted></audio>
        -->
        <div class="message_container">
            <div class="message" augmented-ui="exe tl-clip br-clip">
                <div class="noti" augmented-ui="exe tl-clip br-clip">{{trans[0]}}
                    donated Rs.{{trans[1]}}
                </div>
                <p>{{trans[2]}}</p>
            </div>

        </div>

    </div>

</template>

<script>
    export default {
        props: ['path', 'streamer'],

        mounted() {

            window.Echo.channel('donation-alert' + this.streamer).listen(
                'DonationAlertEvent', (transaction) => {
                    this.trans.push(transaction.donor.name);
                    this.trans.push(transaction.amount);
                    this.trans.push(transaction.message);
                    this.seen = true;
                    let audio = new Audio(this.path); // path to file
                    audio.play();
                    setTimeout(() => {
                        this.trans = [];
                        this.seen = false;
                        audio.pause();
                    }, 14002);
                }
            );


        },
        data() {
            return {

                seen: false,
                trans: [],
                user_id: '',


            }
        }


    }
</script>
