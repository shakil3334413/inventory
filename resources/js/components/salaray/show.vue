<template>
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-12">
             <router-link to="/salary" class="btn btn-success">Back </router-link>
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-form">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">All Time Salary</h1>
                                </div>
                               <div class="table-responsive p-3">
                                    <table class="table align-items-center table-flush" id="dataTable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Employee Name</th>
                                                <th>Ammount</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                 <th>Employee Name</th>
                                                <th>Ammount</th>
                                                <th>Date</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr v-for="item in salary" :key="item.id">
                                                <td>{{item.employee.name}}</td>
                                                <td>{{item.amount}}</td>
                                                <td>{{item.date}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    created(){
        this.index();
    },
    data(){
        return{
            salary:[],
        }
    },
    methods:{
        index(){
            let id=this.$route.params.id;
            axios.get('/api/salary/show/'+id)
            .then(({data})=>(this.salary=data))
            .catch()
        }
    }
}
</script>

<style>

</style>
