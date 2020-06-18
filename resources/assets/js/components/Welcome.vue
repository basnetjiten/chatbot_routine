<template>
    <div class="content">
        <br>

        <div class="container-fluid" align="center">
            <div class="test">
                <div class="card card-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->

                    <div class="widget-user-header text-white " style="background-image:url('/img/user-cover.jpg')">
                        <div class="widget-user-image pb-5">
                            <img class="img-circle" :src="getProfilePhoto()" alt="User Avatar">
                            <h3 class="widget-user-username ">{{currentUserName}}</h3>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2">Name</label>

                                <div class="col-sm-12">
                                    <input type="" v-model="form.name" class="form-control"
                                           id="inputName" placeholder="Name"
                                           :class="{ 'is-invalid': form.errors.has('name') }">
                                    <has-error :form="form" field="name"></has-error>
                                </div>
                            </div>

                            <div class="col-md-12">

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail">Email</label>
                                        <input v-model="form.email" type="email" name="email"
                                               id="inputEmail"
                                               placeholder="Email Address"
                                               class="form-control"
                                               :class="{ 'is-invalid': form.errors.has('email') }">
                                        <has-error :form="form" field="email"></has-error>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="inputPhone">Phone</label>
                                        <input v-model="form.phone" type="text" name="phone"
                                               id="inputPhone"
                                               placeholder="Phone no."
                                               class="form-control"
                                               :class="{ 'is-invalid': form.errors.has('phone') }">
                                        <has-error :form="form" field="phone"></has-error>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-12">

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputAmount">Donation Amount</label>
                                        <input v-model="form.amount" type="number" name="amount"
                                               id="inputAmount"
                                               placeholder="50"
                                               class="form-control"
                                               :class="{ 'is-invalid': form.errors.has('amount') }">
                                        <has-error :form="form" field="amount"></has-error>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="currency">Currency</label>
                                        <select name="currency" v-model="form.currency" id="currency"
                                                class="form-control"
                                                :class="{ 'is-invalid': form.errors.has('currency') }">
                                            <option value="nrs">NRS</option>
                                            <option value="inr">INR</option>
                                        </select>
                                        <has-error :form="form" field="currency"></has-error>
                                    </div>

                                </div>
                            </div>


                            <div class="form-group ">
                                <label for="inputMessage"
                                       class="col-sm-2 control-label">Message</label>

                                <div class="col-sm-12">
                                                    <textarea rows="5" v-model="form.message" class="form-control"
                                                              id="inputMessage" placeholder="Your message.."
                                                              :class="{ 'is-invalid': form.errors.has('message') }"></textarea>
                                    <has-error :form="form" field="message"></has-error>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-12">
                                    <button @click.prevent="proceedPayment" type="submit"
                                            class="btn btn-success">Donate
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>

        <!-- Modal -->
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
             aria-hidden="true">
            <div class="modal-dialog  modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Online Payment Partners</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <khalti-demo v-on:exit="closeModal" :amount=donatedAmount :merchant_extra="donatedAmount">

                        </khalti-demo>
                    </div>

                </div>
            </div>
        </div>
    </div>

</template>

<script>
    import $ from 'jquery'

    import VueKhalti from "./KhaltiDemo.vue";

    export default {

        components: {
            VueKhalti
        },
        props: {
            streamer: {
                type: Array,
            }
        },


        data() {
            return {
                donatedAmount: 0,
                currentUserName: '',
                currentUserPhoto: '',

                form: new Form({
                    name: '',
                    email: '',
                    amount: '',
                    phone: '',
                    message: '',
                    userId: Number(this.streamer[0].id)
                })
            }
        },
        mounted() {
            console.log('Component mountedd.');
            console.log(this.streamer[0].id);

            this.currentUserName = this.streamer[0].username;
            this.currentUserPhoto = this.streamer[0].photo;
            //console.log(this.streamer);

        },
        methods: {
            getProfilePhoto() {


                return this.currentUserPhoto;
            },
            closeModal() {
                setTimeout(() => {
                    $('#addNew').modal('hide');
                }, 1000);

            },
            redirectPayment() {
                window.location.href = `http://127.0.0.1:8000/alert/` + this.form.amount;
                // window.location = `https://google.com`;
                // this.$router.push("https://google.com");
                console.log("running");
            },
            proceedPayment() {


                this.form.post('/payment')
                    .then((response) => {
                        console.log("payment saved");

                        console.log(response.data);
                        this.donatedAmount = response.data * 100;
                        $('#addNew').modal('show');
                        /* Fire.$emit('AfterCreate');
                        // $('#addNew').modal('hide');

                         toast({
                             type: 'success',
                             title: 'User Created in successfully'
                         });*/
                        // this.$Progress.finish();

                    })
                    .catch(() => {

                    })
            }
        }
    }
</script>
<style scoped>
    .modal-dialog {
        height: 90%;
    }

    /* = 90% of the .modal-backdrop block = %90 of the screen */

    .modal-content {
        height: 100%; /* = 100% of the .modal-dialog block */

    }

    .card-body {

        height: 90%;
    }

    .widget-user-header {

        background-position: center center;
        background-size: cover;
        height: 220px !important;
        overflow-y: hidden;
    }
</style>