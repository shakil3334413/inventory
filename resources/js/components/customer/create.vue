<template>
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <router-link to="/customer" class="btn btn-success">All Customer</router-link>
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-form">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Add Customer</h1>
                                </div>
                                <form @submit.prevent="store" enctype="multipart/form-data">
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
                                                <label>Email</label>
                                                <input type="email" v-model="form.email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address" />
                                                <small class="text-danger" v-if="errors.email">{{errors.email[0]}}</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" v-model="form.phone" class="form-control" id="Phone" placeholder="Phone" />
                                                <small class="text-danger" v-if="errors.phone">{{errors.phone[0]}}</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea v-model="form.address" class="form-control" id="address" cols="30" rows="3" placeholder="Address"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="file" class="custom-file-input" id="customFile" @change="onFileSelected" />
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                                <small class="text-danger" v-if="errors.photo"> {{ errors.photo[0] }} </small>
                                            </div>
                                            <div class="col-md-6">
                                                <img :src="form.photo" style="height: 40px; width: 40px;" />
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
                name:null,
                email:null,
                phone:null,
                address:null,
                photo:null,
            },
            errors:{}
        }
    },
    methods:{
        onFileSelected(event){
            let file = event.target.files[0];
            if (file.size > 1048770) {
                Notify.image_validation()
            }else{
            let reader = new FileReader();
            reader.onload = event =>{
                this.form.photo = event.target.result
            // console.log(event.target.result);
            };
            reader.readAsDataURL(file);
            }
        },
        store(){
            axios.post('/api/customer',this.form)
            .then(res=>{
                this.$router.push({name:'Customer'})
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
