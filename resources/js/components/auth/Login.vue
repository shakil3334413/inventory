<template>
<div class="row justify-content-md-center">
    <div class="col-md-6">
        <div class="card shadow-sm my-5">
            <div class="card-body p-0">
                <div class="login-form">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                    </div>
                    <form class="user" @submit.prevent="login">
                        <div class="form-group">
                            <input type="email" v-model="form.email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Email Address" />
                            <small class="text-danger" v-if="errors.email">{{errors.email[0]}}</small>
                        </div>
                        <div class="form-group">
                            <input type="password" v-model="form.password" class="form-control" id="password" placeholder="Password" />
                            <small class="text-danger" v-if="errors.password">{{errors.password[0]}}</small>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                                <input type="checkbox" class="custom-control-input" id="customCheck" />
                                <label class="custom-control-label" for="customCheck">Remember Me</label>
                            </div>
                        </div>
                        <div class="form-group">
                             <input type="submit"  id="" class="btn btn-primary btn-block" value="Login">
                        </div>
                    </form>
                    <hr />
                    <div class="text-center">
                         <router-link to="/register" class="font-weight-bold small">Create an Account!</router-link>
                    </div>
                    <div class="text-center"></div>
                </div>
            </div>
        </div>
    </div>
</div>

</template>

<script>
export default {

    created(){
        if(User.loggedIn()){
            this.$router.push({name:'home'})
        }else{
            this.$router.push({name:'login'})
        }

    },
    data(){
        return{
            form:{
                email:null,
                password:null
            },
            errors:{}
        }
    },
    methods:{
        login(){
            axios.post('api/auth/login',this.form)
            .then(res=>{
                User.responseAfterLogin(res)
                this.$router.push({name:'home'})
                Toast.fire({
                icon: 'success',
                title: 'Signed in successfully'
                })
            })
            .catch(error=>this.errors=error.response.data.errors)
            .catch(
                Toast.fire({
                icon: 'error',
                title: 'Email or Password Invalid'
                })
            )
        }
    }
}
</script>

<style>

</style>

