<template>
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-12">
             <router-link to="/category/create" class="btn btn-success">Category Create</router-link>
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="login-form">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">All Category</h1>
                                </div>
                                <input type="text" v-model="searchItem" placeholder="Search Your Item" class="form-control" style="width:300px;">
                               <div class="table-responsive p-3">
                                    <table class="table align-items-center table-flush" id="dataTable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Category Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Category Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr v-for="category in filterSearch" :key="category.id">
                                                <td>{{category.category_name}}</td>
                                                <td style="display: flex;">
                                                    <router-link :to="{ name: 'CategoryEdit', params: { id: category.id }}" class="btn btn-info btn-sm m-1">Edit</router-link>
                                                    <a @click="categoryDelete(category.id)" class="btn btn-danger btn-sm m-1">Delete</a>
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
            categories:[],
            searchItem:''
        }
    },
    computed:{
        filterSearch(){
            return this.categories.filter(category=>{
                return category.category_name.match(this.searchItem)
            })
        }
    },
    methods:{
        index(){
            axios.get('/api/category')
            .then(({data})=>(this.categories=data))
            .catch()
        },
          categoryDelete(id){
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't delete your data!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                axios.delete('/api/category/'+id)
                .then(()=>{
                    this.categories=this.categories.filter(category=>{
                        return category.id !=id
                    })
                })
                .catch(()=>{
                     this.$router.push({name:'CategoryAll'})
                })
                Swal.fire(
                'Deleted!',
                'Your Data has been deleted.',
                'success'
                )
            }
            })
        }
    },
    created(){
        this.index();
    }
}
</script>

<style>

</style>
