<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
        <link href="{{asset('backend/')}}/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        
        
    </head>
    <body class="sb-nav-fixed">
     <div id="app">
        <div id="topbar" v-show="$route.path === '/'|| $route.path=== '/register' || $route.path==='/forget' ? false : true">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark" >
            
                <router-link class="navbar-brand" to="/home">My Dashboard</router-link>                
                <router-link class="item-right" style="text-align: right;" to="/logout">Logout</router-link>
           
        </nav>
    </div>
        <div id="layoutSidenav">

           <div id="sidebar" v-show="$route.path === '/'|| $route.path=== '/register' || $route.path==='/forget' ? false : true">
            <div id="layoutSidenav_nav" >
                <nav class="sb-sidenav  sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            
                            <router-link class="nav-link" to="/home">Home</router-link>
                            <router-link class="nav-link bg-danger color-white" to="/pos">POS</router-link>
                            <router-link class="nav-link bg-info color-white" to="/report">Report</router-link>
                            <router-link class="nav-link" to="/order">Today Order</router-link>
                            
                            <router-link class="nav-link" to="/customer">Customer</router-link> 
                            <router-link class="nav-link" to="/employee">Employee</router-link>   
                            <router-link class="nav-link" to="category">Category</router-link>
                            <router-link class="nav-link" to="/supplier">Supplier</router-link>
                            <router-link class="nav-link" to="/product">Product</router-link>
                            <router-link class="nav-link" to="/expense">Expense</router-link>
                            <router-link class="nav-link" to="/given-salary">Pay Salary</router-link>
                            <router-link class="nav-link" to="/salary">All Salary</router-link>
                            
                            
                            <router-link class="nav-link bg-info color-white" to="/stock">Stok</router-link>
                            
                            
                        </div>
                    </div>
                   
                </nav>
            </div>
          </div>
            <div id="layoutSidenav_content">
                  <router-view></router-view>
                
                
            </div>
        </div>
        </div>
        

        
        
        <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
  
        
        <!-- <script src="{{asset('backend/dist/')}}/js/scripts.js"></script> -->
        
        
        
        
        <!-- <script src="{{asset('backend/dist/')}}/assets/demo/datatables-demo.js"></script> -->
        
        
        

    </body>
</html>
