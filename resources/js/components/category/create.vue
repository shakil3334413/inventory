<template>
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <router-link to="/category" class="btn btn-success">All Category</router-link>
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-form">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Add Category</h1>
                                </div>
                                 <form @submit.prevent="store" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Category</label>
                                                <input type="text" v-model="form.category_name" class="form-control" id="category_name" placeholder="Enter Category Name" />
                                                <small class="text-danger" v-if="errors.category_name">{{errors.category_name[0]}}</small>
                                            </div>
                                        </div>

                                    </div>
                                   <br><br>
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
                category_name:null,
            },
            errors:{}
        }
    },
    methods:{
         store(){
            axios.post('/api/category',this.form)
            .then(res=>{
                Notify.success()
                this.$router.push({name:'CategoryAll'})
            })
            .catch(error=>this.errors=error.response.data.errors)
            .catch( Notify.error())
        }
    }
}
</script>

<style>

</style>
