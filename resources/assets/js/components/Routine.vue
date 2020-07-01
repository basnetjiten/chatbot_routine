<style>
    .widget-user-header {
        background-position: center center;
        background-size: cover;
        height: 250px !important;
    }

    .widget-user .card-footer {
        padding: 0;
    }

</style>


<template>
    <div class="container">
        <div class="row" v-if="$gate.isAdmin()">
            <!-- tab -->
            <div class="col-md-12">
                <div class="card">
                    <h5 class="md-5">Add New Routine</h5>
                    <div class="card-body">
                        <div class="tab-content">

                            <!-- Setting Tab -->
                            <div class="tab-pane active show" id="settings">
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label for="inputDay" class="col-sm-2 control-label">Day</label>

                                        <div class="col-sm-12">
                                            <input type="Text" v-model="form.day" class="form-control" id="inputDay"
                                                   placeholder="UserDay"
                                                   :class="{ 'is-invalid': form.errors.has('day') }">
                                            <has-error :form="form" field="day"></has-error>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputTime" class="col-sm-2 control-label">Time</label>

                                        <div class="col-sm-12">
                                            <input type="text" v-model="form.time" class="form-control"
                                                   id="inputTime" placeholder="Email"
                                                   :class="{ 'is-invalid': form.errors.has('time') }">
                                            <has-error :form="form" field="time"></has-error>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputClassType" class="col-sm-2 control-label">Class Type</label>

                                        <div class="col-sm-12">
                                            <input type="Text" v-model="form.class_type" class="form-control"
                                                   id="inputClassType" placeholder="Email"
                                                   :class="{ 'is-invalid': form.errors.has('class_type') }">
                                            <has-error :form="form" field="time"></has-error>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputModuleCode" class="col-sm-2 control-label">Module Code</label>

                                        <div class="col-sm-12">
                                            <input type="Text" v-model="form.module_code" class="form-control"
                                                   id="inputModuleCode" placeholder="Email"
                                                   :class="{ 'is-invalid': form.errors.has('module_code') }">
                                            <has-error :form="form" field="module_code"></has-error>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="inputModuleTitle" class="col-sm-2 control-label">Module
                                            Title</label>

                                        <div class="col-sm-12">
                                            <input type="Text" v-model="form.module_title" class="form-control"
                                                   id="inputModuleTitle" placeholder="Module Title"
                                                   :class="{ 'is-invalid': form.errors.has('module_title') }">
                                            <has-error :form="form" field="module_title"></has-error>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="inputLecturer" class="col-sm-2 control-label">Lecturer</label>

                                        <div class="col-sm-12">
                                            <input type="Text" v-model="form.lecturer" class="form-control"
                                                   id="inputLecturer" placeholder="Module Title"
                                                   :class="{ 'is-invalid': form.errors.has('lecturer') }">
                                            <has-error :form="form" field="lecturer"></has-error>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="inputGroup" class="col-sm-2 control-label">Group</label>

                                        <div class="col-sm-12">
                                            <input type="Text" v-model="form.group" class="form-control"
                                                   id="inputGroup" placeholder="Module Title"
                                                   :class="{ 'is-invalid': form.errors.has('group') }">
                                            <has-error :form="form" field="group"></has-error>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="inputBlock" class="col-sm-2 control-label">Block</label>

                                        <div class="col-sm-12">
                                            <input type="Text" v-model="form.block" class="form-control"
                                                   id="inputBlock" placeholder="block"
                                                   :class="{ 'is-invalid': form.errors.has('block') }">
                                            <has-error :form="form" field="block"></has-error>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="inputRoom" class="col-sm-2 control-label">Room</label>

                                        <div class="col-sm-12">
                                            <input type="Text" v-model="form.room" class="form-control"
                                                   id="inputRoom" placeholder="block"
                                                   :class="{ 'is-invalid': form.errors.has('room') }">
                                            <has-error :form="form" field="room"></has-error>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-12">
                                            <button @click.prevent="createRoutine" type="submit"
                                                    class="btn btn-success">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- end tabs -->
        </div>
        <div v-if="!$gate.isAdmin()">
            <not-found></not-found>
        </div>
    </div>
</template>


<script>
    export default {
        data() {
            return {
                donationLink: '',
                streamersAlertLink: '',
                form: new Form({
                    day: '',
                    time: '',
                    class_type: '',
                    module_code: '',
                    module_title: '',
                    lecturer: '',
                    group: '',
                    block: '',
                    room: ''
                }),

            }
        },
        mounted() {

            // console.log('Component mounted.');
        },

        methods: {


            getProfilePhoto() {

                let photo = (this.form.photo.length > 200) ? this.form.photo : "img/profile/" + this.form.photo;
                return photo;
            },


            createRoutine() {
                this.$Progress.start();

                this.form.post('routines')
                    .then(() => {
                        Fire.$emit('AfterCreate');

                        toast({
                            type: 'success',
                            title: 'User Created in successfully'
                        });
                        this.$Progress.finish();

                    })
                    .catch(() => {

                    })
            },
            updateProfile(e) {
                let file = e.target.files[0];
                let reader = new FileReader();

                let limit = 1024 * 1024 * 2;
                if (file['size'] > limit) {
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'You are uploading a large file',
                    });
                    return false;
                }

                reader.onloadend = (file) => {
                    this.form.photo = reader.result;
                }
                reader.readAsDataURL(file);
            },


        },


    }
</script>
