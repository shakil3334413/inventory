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
                                    <h1 class="h4 text-gray-900 mb-4">Edit Category</h1>
                                </div>
                                <form @submit.prevent="update" enctype="multipart/form-data">
                                     <div class="col-md-12 col-lg-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Category</label>
                                                <input type="text" v-model="form.category_name" class="form-control" id="category_name" placeholder="Enter Category Name" />
                                                <small class="text-danger" v-if="errors.category_name">{{errors.category_name[0]}}</small>
                                            </div>
                                        </div>
                                   <br><br>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Update</button>
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
        axios.get('/api/category/'+id)
        .then(({data})=>(this.form=data))
        .catch("error");
    },
    data(){
        return{
            form:{
                category_name:'',
            },
            errors:{}
        }
    },
    methods:{
        update(){
            let id=this.$route.params.id;
            axios.patch('/api/category/'+id,this.form)
            .then(res=>{
                this.$router.push({name:'CategoryAll'})
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
