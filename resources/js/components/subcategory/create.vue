 

<template>
  
  <div>

 <div class="row" style="padding-left: 18px;">
  <router-link to="/subcategory" class="btn btn-primary">All Sub-Category </router-link>
   
 </div>



    <div class="row justify-content-center">
      <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Add Sub-Category</h1>
                  </div>

      <form class="user" @submit.prevent="subcategoryInsert">

        <div class="form-group">

          <div class="form-row">
            <div class="col-md-6">
              <label for="exampleFormControlSelect1">Sub-Category Name</label>
         <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Your Sub-Category Name" v-model="form.subcategory_name">
  <small class="text-danger" v-if="errors.subcategory_name"> {{ errors.subcategory_name[0] }} </small>
            </div> 

            <div class="col-md-6">
      <label for="exampleFormControlSelect1">Category Name</label>
  <select class="form-control" id="exampleFormControlSelect1" v-model="form.category_id">
     <option :value="category.id" v-for="category in categories">{{ category.category_name }}</option>
                       
                      </select>   
        
            </div>
            
          </div>
        </div>
       
         
 


        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </div>
        
      </form>
                  <hr>
                  <div class="text-center">
  
  
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</template>



<script type="text/javascript">
  
  export default {
    data(){
    return {
      form:{
        subcategory_name: null,
        category_id: null,
        
      },
      errors:{},
      categories:{},
    }
  },

  methods:{
    
  subcategoryInsert(){
       axios.post('/api/subcategory',this.form)
       .then(() => {
        this.$router.push({ name: 'subcategory'})
        Notification.success()
       })
       .catch(error =>this.errors = error.response.data.errors)
     },
  }, 

  created(){
    if (!User.loggedIn()) {
        this.$router.push({name: '/'})
      }
    else{
    axios.get('/api/category/')
    .then(({data}) => (this.categories = data))
    }
  } 


  }
   
</script>


<style type="text/css">
  
</style>