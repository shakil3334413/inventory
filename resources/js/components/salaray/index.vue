<template>
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-12">
             <router-link to="/given-salary" class="btn btn-success">Give Salary</router-link>
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-form">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">All Salary</h1>
                                </div>
                               <div class="table-responsive p-3">
                                    <table class="table align-items-center table-flush" id="dataTable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Employee Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Employee Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr v-for="item in salary" :key="item.id">
                                                <td>{{item.employee.name}}</td>
                                                <td style="display: flex;">
                                                     <router-link :to="{ name: 'SalaryShow', params: { id: item.employee_id }}" class="btn btn-info btn-sm m-1">View Details</router-link>
                                                </td>
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
        if(!User.loggedIn()){
            this.$router.push({name:'login'})
        }
    },
    data(){
        return{
            salary:[],
        }
    },
    methods:{
        index(){
            axios.get('/api/salary')
            .then(({data})=>(this.salary=data))
            .catch()
        }
    },
    created(){
        this.index();
    }
}
</script>

<style>

</style>
