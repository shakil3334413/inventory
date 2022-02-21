<template>
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <router-link to="/expense" class="btn btn-success">All Expense</router-link>
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-form">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Add Expense</h1>
                                </div>
                                <form @submit.prevent="store" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <label>Amount</label>
                                                <input type="text" v-model="form.amount" class="form-control" id="amount" placeholder="Enter Amount" />
                                                <small class="text-danger" v-if="errors.amount">{{errors.amount[0]}}</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Date</label>
                                                <input type="date" v-model="form.expense_date" class="form-control" id="expense_date" aria-describedby="expense_date"/>
                                                <small class="text-danger" v-if="errors.expense_date">{{errors.expense_date[0]}}</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Details</label>
                                                <textarea v-model="form.details" class="form-control" id="details" cols="30" rows="3" placeholder="Details"></textarea>
                                                <small class="text-danger" v-if="errors.details">{{errors.details[0]}}</small>
                                            </div>
                                        </div>
                                    </div>
                                    <br />
                                    <br />
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Add</button>
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
        if(!User.loggedIn()){
            this.$router.push({name:'login'})
        }
    },
    data(){
        return{
            form:{
                details:null,
                amount:null,
                expense_date:null,
            },
            errors:{}
        }
    },
    methods:{
        store(){
            axios.post('/api/expense',this.form)
            .then(res=>{
                this.$router.push({name:'Expense'})
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
