<template>
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-form">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">All Employee</h1>
                                </div>
                                <input type="text" v-model="searchItem" placeholder="Search Your Item" class="form-control" style="width:300px;">
                               <div class="table-responsive p-3">
                                    <table class="table align-items-center table-flush" id="dataTable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Salary</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Salary</th>
                                                 <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr v-for="employee in filterSearch" :key="employee.id">
                                                <td>{{employee.name}}</td>
                                                <td>{{employee.email}}</td>
                                                <td>{{employee.phone}}</td>
                                                <td>{{employee.salary}} Tk</td>
                                                <td style="display: flex;">
                                                    <router-link :to="{ name: 'SalaryCreate', params: { id: employee.id }}" class="btn btn-info btn-sm m-1">Pay Salary</router-link>
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
            employees:[],
            searchItem:''
        }
    },
    computed:{
        filterSearch(){
            return this.employees.filter(employee=>{
                return employee.name.match(this.searchItem)
            })
        }
    },
    methods:{
        index(){
            axios.get('/api/employee')
            .then(({data})=>(this.employees=data))
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
