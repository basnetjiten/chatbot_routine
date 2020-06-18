<template>
    <div id="parent" v-bind="$props">

        <vue-khalti ref="khaltiCheckout" v-bind:amount=this.amount v-bind:merchant_extra=this.merchant_extra

                    v-bind="khaltiConfig">

            <div class="card" style="width: 18rem;">
                <img @click="onKhaltiClick" class="card-img-top" src='/img/khalti.png' alt="Card image cap">

            </div>
        </vue-khalti>
    </div>
</template>


<script>
    import VueKhalti from 'vue-khalti'
    import * as $props from "vue";

    export default {

        props: {

            productIdentity: {
                type: null,
                default: "1234567890"
            },
            productName: {
                type: String,
                default: "Dragon"
            },
            productUrl: {
                type: String,
                default: "http://gameofthrones.com/buy/Dragons"
            },
            amount: {
                type: Number,
                default: 0
            },
            merchant_extra: {
                type: Number
            }
        },

        components: {
            VueKhalti
        },
        data() {
            return {
                khaltiConfig: {
                    "publicKey": "test_public_key_d58fdb8714d348cba5eb494c2aba08ec",
                    "productIdentity": this.productIdentity,
                    "productName": this.productName,
                    "productUrl": this.productUrl,
                    "amount": this.amount,
                    "merchant_extra": this.merchant_extra,
                    "eventHandler": {
                        onSuccess(payload) {
                            console.log(payload);
                            let payloadd = {
                                "token": payload.token,
                                "amount": payload.amount
                            };
                            console.log(payloadd);
                            let config = {
                                headers: {
                                    'Access-Control-Allow-Origin': '*',
                                    'Access-Control-Allow-Methods':'POST,GET,OPTIONS,PUT,DELETE',
                                    'Authorization': 'Key test_secret_key_0476ec42aaf6486292de29f7168777e7',
                                    'Accept': "application/json",
                                    'Access-Control-Allow-Headers': 'Access-Control-Allow-Headers, Content-Type, X-Requested-With, X-CSRF-Token, Origin, origin, x-csrf-token, access-control-allow-headers'

                                }
                            };
                            axios.post("https://khalti.com/api/v2/payment/verify/", payloadd, config)
                                .then(response => {
                                    console.log(response.data);
                                    let user = response.data.user;

                                    axios.post("/updateSuccessTransaction", user)
                                        .then(() => {
                                            //toast message
                                        })

                                        .catch(error => {
                                            console.log(error);
                                        });


                                })
                                .catch(error => {
                                    console.log(error);
                                });

                        },
                        onError(error) {

                            console.log(error);
                        },
                        onClose() {
                            console.log('widget is closing');
                            // console.log($props.value);
                            /* axios.post('/dispatchAlert', this.paymentData)
                                 .then(() => {
                                     toast({
                                         type: 'success',
                                         title: 'Payment successful'
                                     });
                                 });*/
                        }
                    }
                }
            }
        },
        methods: {
            onKhaltiClick() {
                const khaltiCheckout = this.$refs.khaltiCheckout;
                khaltiCheckout.onClick();
                this.$emit('exit', true);
            }

        }
    }
</script>
