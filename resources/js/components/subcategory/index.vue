  

<template>
  
  <div>

 <div class="row" style="padding-left: 18px;">
  <router-link to="/store-subcategory" class="btn btn-primary">Add SubCategory </router-link>
   
 </div>
<br>
   <input type="text" v-model="searchTerm" class="form-control" style="width: 300px;" placeholder="Search Here">


<br>

   <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Sub-Category List</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Sub-Category Name</th>
                        <th>Category Name</th>
                          <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="subcategory in filtersearch" :key="subcategory.id">
                        <td> {{ subcategory.subcategory_name }} </td>
                        <td> {{ subcategory.category_name }} </td>
                       
            <td>
   <router-link :to="{name: 'edit-subcategory', params:{id:subcategory.id}}" class="btn btn-sm btn-primary">Edit</router-link>

 <a @click="deleteCategory(subcategory.id)" class="btn btn-sm btn-danger"><font color="#ffffff">Delete</font></a>
            </td>
                      </tr>
                    
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
          <!--Row-->


   
  </div>


</template>



<script type="text/javascript">
  
  export default {
    data(){
      return{
        subcategories:[],
        searchTerm:''
      }
    },
    computed:{
      filtersearch(){
      return this.subcategories.filter(subcategory => {
         return subcategory.subcategory_name.match(this.searchTerm)
      }) 
      }
    },
 
  methods:{
    allSubcategory(){
      axios.get('/api/subcategory/')
      .then(({data}) => (this.subcategories = data))
      .catch()
    },
  deleteCategory(id){
             Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.value) {
                axios.delete('/api/subcategory/'+id)
               .then(() => {
                this.subcategories = this.subcategories.filter(subcategory => {
                  return subcategory.id != id
                })
               })
               .catch(() => {
                this.$router.push({name: 'subcategory'})
               })
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
              }
            })

  } 

  },
  created(){
    if (!User.loggedIn()) {
        this.$router.push({name: '/'})
      }
    this.allSubcategory();
  } 
  

  } 
</script>


<style type="text/css">
  #em_photo{
    height: 40px;
    width: 40px;
  }
</style>