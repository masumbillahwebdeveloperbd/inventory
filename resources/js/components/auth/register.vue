<template>
	<div class="container">
	
	<form @submit.prevent="signup">
	<div class="row">	
		<div class="col-md-6 offset-md-3">
<h2 class="text-center">Register Form</h2>
  <div class="form-row">
     <div class="form-group col-md-12">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" placeholder="Full Name" v-model="form.name">
      <small class="text-danger" v-if="errors.name">{{errors.name[0]}}</small>
     </div>
      <div class="form-group col-md-12">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4"  placeholder="Enter Email" v-model="form.email">
      <small class="text-danger" v-if="errors.email">{{errors.email[0]}}</small>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="inputPassword4" v-model="form.password">
      <small class="text-danger" v-if="errors.password">{{errors.password[0]}}</small>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Confirm Password</label>
      <input type="password" class="form-control" id="inputPassword4" v-model="form.password_confirmation">
    </div>
  </div>
  

  <button type="submit" class="btn btn-primary">Sign in</button>
  
</div>
</div>
</form>
<router-link to="/">Allready Have an Account</router-link>

</div>



</template>

<script>

  export default{
    created(){
      if(User.loggedIn()){
        this.$router.push({name:'home'})
      }
    },
    data(){
      return{
        form:{
          name:null,
          email:null,
          password:null,
          password_confirmation:null
        },
        errors:{}
      }
    },
    methods:{
        signup(){
          axios.post('/api/auth/signup',this.form)
          .then(res=>{
            User.responseAfterLogin(res)
            Toast.fire({
                  icon: 'success',
                  title: 'Signed in successfully'
                })
            this.$router.push({name:'home'})
          })
          .catch(error =>this.errors=error.response.data.errors)
       
        }
    }
  }
</script>

<style>

</style>