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
                                    <h1 class="h4 text-gray-900 mb-4">Give  Employee Salray</h1>
                                </div>
                                <form @submit.prevent="salaraypaid" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input type="text" v-model="form.name" class="form-control" id="exampleInputFirstName" placeholder="Enter First Name" />
                                                <small class="text-danger" v-if="errors.name">{{errors.name[0]}}</small>
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Salary</label>
                                            <input type="text" v-model="form.salary" class="form-control" id="salary" placeholder="Salary" />
                                            <small class="text-danger" v-if="errors.salary">{{errors.salary[0]}}</small>
                                        </div>
                                        </div>
                                    </div>
                                   <div class="row">
                                       <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Join Date</label>
                                            <input type="date" v-model="form.date"  class="form-control" id="date"/>
                                            <small class="text-danger" v-if="errors.date">{{errors.date[0]}}</small>
                                        </div>
                                   </div>
                                   </div>
                                   <br><br>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Pay Salary</button>
                                    </div>
                                </form>
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
        let id=this.$route.params.id;
        axios.get('/api/employee/'+id)
        .then(({data})=>(this.form=data))
        .catch("error");
    },
    data(){
        return{
            form:{
                data:null,
            },
            errors:{}
        }
    },
    methods:{
        salaraypaid(){
            let id=this.$route.params.id;
            axios.post('/api/give/salary/'+id,this.form)
            .then(res=>{
                this.$router.push({name:'EmployeeSalary'})
                Notify.success()
            })
            .catch(error=>this.errors=error.response.data.errors)
            .catch( Notify.error())
        }
    }
}
</script>

<style>

</style>
