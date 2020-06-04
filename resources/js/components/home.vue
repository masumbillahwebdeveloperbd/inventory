<template>
	<div>
	<main>
    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Last Day Sell Tk- {{sell}}</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Last Day Collection Tk- {{collection}}</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Last Day Due Tk- {{due}}</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Last Day Expense Tk- {{expense}}</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body">Last Month Sell Tk- {{sell}}</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-dark text-white mb-4" style="background:tomato!impotant;">
                                    <div class="card-body">Last Month Collection Tk- {{collection}}</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Today Due Tk- {{due}}</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Today Expense Tk- {{expense}}</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
              <div class="table-responsive">
           
                <table class="table table-bordered" id="" width="100%" cellspacing="0">

                  <thead>
                    <tr>
                      <th>Name</th> 
                      <th>Code</th>
                      <th>Photo</th>
                      
                      
                      <th>Status</th>
                      <th>Quantity</th>                
                      
                    </tr>
                  </thead>
                
                  <tbody>

                    <tr v-for="product in products" :key="product.id">
                      <td>{{ product.product_name}}</td>
                      <td>{{ product.product_code}}</td>
                      <td><img :src="product.image" id="em_photo"></td>
                      
                      
                      <td v-if="product.product_quantity>=1"><span class="badge badge-success">Re-Order</span>
                      </td>
                      <td v-else=""><span class="badge badge-danger">Stock Out</span></td>
                      <td>{{ product.product_quantity }}</td>
                      
                      
                    </tr>
        
                  </tbody>
                </table>
              </div>
            </div>
                        
                    </div>
                   
  </main>
	
	</div>
</template>

<script>
  export default{
    created(){
      if(!User.loggedIn()){
        this.$router.push({name:'/'})
      }
    },
    data(){
        return{
            sell:null,
            collection:null,
            expense:null,
            due:null,
            products:[]
        }
    },
    mounted(){
        this.todaySell();
        this.todayCollection();
        this.todayDue();
        this.todayExpense();
        this.reOrder();
    },
    methods:{
        todaySell(){
            axios.get('/api/sell-today')
            .then(({data})=>(this.sell=data))
            .catch()
        },
        
        todayCollection(){
            axios.get('/api/collection-today')
            .then(({data})=>(this.collection=data))
            .catch()
        },
        todayDue(){
            axios.get('/api/due-today')
            .then(({data})=>(this.due=data))
            .catch()
        },
        todayExpense(){
            axios.get('/api/expense-today')
            .then(({data})=>(this.expense=data))
            .catch()
        },
        reOrder(){
            axios.get('/api/re-order')
            .then(({data}) => (this.products = data))
            .catch()
        }
        
    }
  }
</script>

<style>

</style>