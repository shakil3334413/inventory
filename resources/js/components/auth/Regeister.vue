<template>
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-6">
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-form">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Register</h1>
                                </div>
                                <form @submit.prevent="singup">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" v-model="form.name" class="form-control" id="exampleInputFirstName" placeholder="Enter First Name" />
                                        <small class="text-danger" v-if="errors.name">{{errors.name[0]}}</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" v-model="form.email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address" />
                                        <small class="text-danger" v-if="errors.email">{{errors.email[0]}}</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" v-model="form.password" class="form-control" id="exampleInputPassword" placeholder="Password" />
                                        <small class="text-danger" v-if="errors.password">{{errors.password[0]}}</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Repeat Password</label>
                                        <input type="password" v-model="form.password_confirmation" class="form-control" id="exampleInputPasswordRepeat" placeholder="Repeat Password" />
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                                    </div>
                                </form>
                                <hr />
                                <div class="text-center">
                                    <router-link to="/" class="font-weight-bold small">Already have an account?</router-link>
                                </div>
                                <div class="text-center"></div>
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
                name:null,
                email:null,
                password:null,
                confirm_password:null
            },
            errors:{}
        }
    },
    methods:{
        singup(){
            axios.post('api/auth/singup',this.form)
            .then(res=>{
                User.responseAfterLogin(res)
                this.$router.push({name:'home'})
                Toast.fire({
                icon: 'success',
                title: 'SingUp in successfully'
                })
            })
            .catch(error=>this.errors=error.response.data.errors)
            .catch(
                Toast.fire({
                icon: 'error',
                title: 'Account Not Created'
                })
            )
        }
    }
}
</script>

<style>

</style>
