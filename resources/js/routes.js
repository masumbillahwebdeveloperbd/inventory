let login =require('./components/auth/login.vue').default;
let register =require('./components/auth/register.vue').default;
let forget =require('./components/auth/forget.vue').default;
let logout =require('./components/auth/logout.vue').default;
let home=require('./components/home.vue').default;

let pos=require('./components/pos/pointofsale.vue').default;
//for report
let report=require('./components/report/index.vue').default;
//for order
let order=require('./components/order/order.vue').default;
let vieworder=require('./components/order/viewOrder.vue').default;
let searchorder=require('./components/order/searchOrder.vue').default;
let searchmonthorder=require('./components/order/searchOrderMonth.vue').default;

//for stock
let stock=require('./components/product/stock.vue').default;
let editstock=require('./components/product/edit-stock.vue').default;
//for customer
let customer=require('./components/customer/index.vue').default;
let storecustomer=require('./components/customer/create.vue').default;
let editcustomer=require('./components/customer/edit.vue').default;
//for employee
let employee=require('./components/employee/index.vue').default;
let storeemployee=require('./components/employee/create.vue').default;
let editemployee=require('./components/employee/edit.vue').default;


let supplier=require('./components/supplier/index.vue').default;
let storesupplier=require('./components/supplier/create.vue').default;
let editsupplier=require('./components/supplier/edit.vue').default;
//for category
let category = require('./components/category/index.vue').default;
let storecategory = require('./components/category/create.vue').default;
let editcategory = require('./components/category/edit.vue').default;

//for product
let product = require('./components/product/index.vue').default;
let storeproduct = require('./components/product/create.vue').default;
let editproduct=require('./components/product/edit.vue').default;
//for expense
let expense=require('./components/expense/expense.vue').default;
let storeexpense = require('./components/expense/create.vue').default;
let editexpense = require('./components/expense/edit.vue').default;
//for salary
let salary=require('./components/salary/all_employee.vue').default;
let paysalary=require('./components/salary/create.vue').default;
let allsalary=require('./components/salary/index.vue').default;
let viewsalary=require('./components/salary/view.vue').default;
let editsalary=require('./components/salary/edit.vue').default;

export const routes = [
  { path: '/', component: login, name:'/'},
  { path: '/register', component:register, name:'register'},
  { path: '/forget', component:forget, name:'forget'},
  { path: '/logout', component:logout, name:'logout'},
  { path: '/home', component:home, name:'home'},

  //for stck
  { path: '/stock', component:stock, name:'stock'},
  { path: '/edit-stock/:id', component: editstock, name:'edit-stock'},
  //for customer
  { path: '/customer', component:customer, name:'customer'},
  { path: '/store-customer', component:storecustomer, name:'store-customer'},
  { path: '/edit-customer/:id', component: editcustomer, name:'edit-customer' },
  //for employee
  { path: '/employee', component:employee, name:'employee'},
  { path: '/store-employee', component:storeemployee, name:'store-employee'},
  { path: '/edit-employee/:id', component: editemployee, name:'edit-employee' },

  { path: '/supplier', component:supplier, name:'supplier'},
  { path: '/store-supplier', component:storesupplier, name:'store-supplier'},
  { path: '/edit-supplier/:id', component: editsupplier, name:'edit-supplier' },

  //for category
  
  { path: '/store-category', component: storecategory, name:'store-category' },
  { path: '/category', component: category, name:'category' },
  { path: '/edit-category/:id', component: editcategory, name:'edit-category' },

  //for product
  
  
  { path: '/product', component: product, name:'product' },
  { path: '/store-product', component: storeproduct, name:'store-product' },
  { path: '/edit-product/:id', component: editproduct, name:'edit-product'},

  //for expense
  { path: '/expense', component: expense, name:'expense' },
  { path: '/store-expense', component: storeexpense, name:'store-expense'},
  { path:'/edit-expense', component:editexpense, name:'edit-expense'},
  
  //for salary
  { path: '/given-salary', component: salary, name:'given-salary'},
  { path:'/pay-salary/:id', component:paysalary, name:'pay-salary'},
  { path: '/salary', component: allsalary, name:'salary'},
  { path:'/view-salary/:id', component:viewsalary, name:'view-salary'},
  { path:'/edit-salary/:id', component:editsalary, name:'edit-salary'},

  //for pos
  { path: '/pos', component: pos, name:'pos'},
  //for order
  { path:'/order',component:order,name:'order'},
  { path:'/view-order/:id', component:vieworder, name:'view-order'},
  { path:'/searchorder',component:searchorder,name:'searchorder'},
  { path:'/search-month-order',component:searchmonthorder,name:'search-month-order'},
  { path:'/report',component:report,name:'report'},
  
  
]