<template>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h1 class="text-center">Donation Cash Flow</h1>
            </div>
        </div>
        <div class="row mt-5" v-if="arrPositive.length > 0">
            <div class="col">

                <line-chart
                        :chartData="arrPositive"
                        :options="chartOptions"
                        :chartColors="positiveChartColors"
                        label="Rs"
                />
            </div>
        </div>

        <div class="row mt-5" v-if="$gate.isAuthorOrUser() && loading && noDonors">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header ">
                        <h3 class="card-title">Transaction Details</h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <tbody>


                            <tr v-for="user in users.data" :key="user.id">


                                <td>
                                    <div>
                                        <b>
                                            {{user.name}}
                                        </b>
                                        donated
                                        <b>
                                            Rs. {{user.amount}}
                                        </b>
                                    </div>
                                    <div class="mt-2">
                                        {{user.message}}
                                    </div>
                                </td>


                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <pagination :data="users" @pagination-change-page="getResults"></pagination>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>


    </div>
</template>

<script>
    import moment from "moment";
    import LineChart from './LineChart.vue';

    export default {
        components: {
            LineChart
        },
        data() {
            return {
                noDonors: false,
                loading: false,
                users: {},
                transactions: [],
                arrPositive: [],

                positiveChartColors: {
                    borderColor: "#007bff",
                    pointBorderColor: "#0E1428",
                    pointBackgroundColor: "#AFD6AC",
                    backgroundColor: ""
                },

                chartOptions: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: false
                }
            };
        },

        async created() {


            axios.get("transaction").then(({data}) => {
                    console.log(data.length > 0);
                    if (data.length === 0) {
                        this.arrPositive.push({date: 0, y: 0});
                    } else {

                        data.forEach(d => {
                            const date = moment(d.created_at, "YYYYMMDD").format("MM/DD");
                            this.arrPositive.push({date, total: Number(d.amount)});

                        });
                        this.loadDonors();
                        this.loading = true;
                        this.noDonors=true;
                    }


                }
            )
            ;


        },
        methods: {
            loadDonors() {
                if (this.$gate.isAuthorOrUser()) {
                    axios.get("donors").then(({data}) => {
                        this.users = data
                    });
                }
            }
            ,
            getResults(page = 1) {
                axios.get('donors?page=' + page)
                    .then(response => {
                        this.users = response.data;
                    });
            }
            ,
        }
    }
    ;
</script>

<style scoped>
    .card-body {
        overflow-y: auto;

    }
</style>

