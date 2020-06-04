 <template>
    <div>
        
     
        <!-- Icon Cards-->
       <div class="row card container">
          <div class="card-header">
            
            Reports
          </div>

          
          
  <div class="card-body">
  <div class="row">
    
    <div class="col-md-3">
     
     <router-link to="/searchorder">
      <button type="button" class="btn btn-success" style="width:250px; height:50px;">
      Order Search By Day</button>
     </router-link>
    </div>
       <div class="col-md-3">
     
     <router-link to="/search-month-order">     <button type="button" class="btn btn-primary" style="width:250px; height:50px;">Order Search By Month</button>
      </router-link>
    </div>
       <div class="col-md-3">
     
     <router-link to="/search-month-order">     <button type="button" class="btn btn-info" style="width:250px; height:50px;">Income Search By Month</button>
      </router-link>
    </div>
       <div class="col-md-3">
     
     <router-link to="/search-month-order">     <button type="button" class="btn nn" style="width:250px; height:50px; background-color:purple;">Expense Search By Month</button>
      </router-link>
    </div>
    
  </div>





                
         </div>
          
       </div>
   </div>
</template>

<script>
  
</script>

<style>
  
.nn button:hover{
background:black;
}
</style>
