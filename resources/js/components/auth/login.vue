<template>
	<div>
	
	<div class="row" style="margin-top:20px;">
                            <div class="col-md-2"></div>
                            <div class="col-md-6">
                                <div class="card" style="width: 18rem;">
                                      <div class="card-header">
                                        Login
                                      </div>
                                      <form @submit.prevent="login">
                                      <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" class="form-control" v-model="form.email" id="email" name="email" aria-describedby="emailHelp">
                                        <small class="text-danger" v-if="errors.email">{{errors.email[0]}}</small>
                                      </div>
                                         <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" v-model="form.password" aria-describedby="emailHelp">
                                        <small class="text-danger" v-if="errors.password">{{errors.password[0]}}</small>
                                      </div>
                               
                                      
                                      <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                      </div>
                                      <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                    

                                    </form>
                                     <div class="mt-3"> <router-link to="/register">Register Account</router-link></div>
                                      <div> <router-link to="/forget">Forgot Password</router-link></div>
                                    </div>
                                </div>
                            <div class="col-md-4"></div>

                            
        </div>
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
          email:null,
          password:null
        },
        errors:{}
      }
    },
    methods:{
        login(){
          axios.post('/api/auth/login',this.form)
          .then(res=>{
            User.responseAfterLogin(res)
            Toast.fire({
                  icon: 'success',
                  title: 'Signed in successfully'
                })
            this.$router.push({name:'home'})
          })
          .catch(error =>this.errors=error.response.data.errors)
      /*    .catch(Toast.fire({
            icon: 'warning',
            title: 'Email or password wrong'
          }))*/       
            
        }
    }
  }
</script>

<style>

</style>