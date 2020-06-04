 <template>
    <div>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Search Order</li>
        </ol>
        <!-- Icon Cards-->
       <div class="row container">
         <div class="card col-lg-12">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Search Orders 
           
          </div>
          <div class="row">
            <div class="col-lg-6">
              <form>
              <div class="card-body">
                  <div class="form-group">
                  <div class="form-row">
                   <div class="col-md-12">
                    <div class="form-group">
               <label for="exampleFormControlSelect2">Search By Date</label>
                <input type="date" required="" class="form-control" v-model="dat">
              </div>
                   </div><br>
                   <button @click.prevent="searchDate(dat)" class="btn btn-success">Search</button>
                 </div>
                </div>     
              </div>
                
              </form>
            </div>
            

          </div>
          <!-- mm -->
            <div class="card-body">
              <div class="table-responsive">
                
            
                <table class="table table-bordered" id="" width="100%" cellspacing="0">

                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Quantity</th>
                      <th>Subtotal</th>
                      <th>Vat</th>
                      <th>Total</th>
                      <th>Pay</th>
                      <th>Due</th>
                    </tr>
                  </thead>
                
                  <tbody>

                    <tr v-for="order in orders" :key="order.id">
                      <td>{{order.name}}</td>
                      <td>{{order.qty}}</td>
                      <td>{{order.sub_total}}</td>
                      <td>{{order.sub_total*order.vat*0.01}}</td>
                      <td>{{order.total}}</td>
                      <td>{{order.pay}}</td>
                      <td>{{order.due}}</td>
                  
                    </tr> 
        
                  </tbody>
                </table>
              </div>
            </div>
            
        
          <!-- mm -->
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
         </div>
       </div>
   </div>
</template>

<script>

    export default {
      mounted(){
            if (!User.loggedIn()) {
               this.$router.push({ name:'/' })
            } 
        },
        data(){
          return{
            
              dat :'',
            orders:[],
          }
        },
        

        methods:{   
          searchDate(id){
            
            axios.get('/api/search-date/'+id)
            .then(({data}) => (this.orders = data))
            .catch(console.log('error'))
          },
      
          
          
        },

      
    }



  
</script>

<style>
  
#add_new{
  float: right;
}

</style>
