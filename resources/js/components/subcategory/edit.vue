   

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
                    <h1 class="h4 text-gray-900 mb-4"> Sub-Category Update</h1>
                  </div>

      <form class="user" @submit.prevent="subcategoryUpdate">

        <div class="form-group">

          <div class="form-row">
            <div class="col-md-12">
         <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter Your Category Name" v-model="form.subcategory_name">
  <small class="text-danger" v-if="errors.subcategory_name"> {{ errors.subcategory_name[0] }} </small>
           

            </div> 
            
          </div>
        </div>
       
         
 


        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Update</button>
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
        subcategory_name: '',
       
        
      },
      errors:{}
    }
  },
  created(){
    if (!User.loggedIn()) {
        this.$router.push({name: '/'})
      }
    else{
  	let id = this.$route.params.id
  	axios.get('/api/subcategory/'+id)
  	.then(({data}) => (this.form = data))
  	.catch(console.log('error'))
    }
  },

  methods:{
    
  subcategoryUpdate(){
  	  let id = this.$route.params.id
       axios.patch('/api/subcategory/'+id,this.form)
       .then(() => {
        this.$router.push({ name: 'subcategory'})
        Notification.success()
       })
       .catch(error =>this.errors = error.response.data.errors)
     },
  } 


  }
   
</script>


<style type="text/css">
  
</style>