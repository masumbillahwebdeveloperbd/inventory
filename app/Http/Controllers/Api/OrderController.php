<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DateTime;

class OrderController extends Controller
{
    public function TotalOrder(){
    	$todayDate=Date('d/m/Y');
    	$data=DB::table('orders')
    	->join('customers','orders.customer_id','customers.id')
    	->where('orders.order_date',$todayDate)
    	->select('customers.name','orders.*')
    	->orderBy('orders.id','DESC')
    	->get();
    	return response()->json($data);
    }
    public function OrderDetails1($id){
    	$data1=DB::table('orders')
    	      ->join('customers','orders.customer_id','customers.id')
    	      ->where('orders.id',$id)
    	      ->select('customers.name','customers.phone','customers.address','orders.*')
    	      ->first();
    	return response()->json($data1);
    }
    public function OrderDetails2($id){
    	$data2=DB::table('order_details')
    	       ->join('products','order_details.product_id','products.id')
    	       ->where('order_details.order_id',$id)
    	       ->select('order_details.pro_quantity','order_details.product_price','order_details.pro_quantity','order_details.sub_total','products.*')
    	       ->get();
    	return response()->json($data2);
    }
    public function searchDate($id){
    	$formatDate=new DateTime($id);
    	$newFormateDate=$formatDate->format('d/m/Y');

    	$order=DB::table('orders')
    	       ->join('customers','orders.customer_id','customers.id')
    	       ->where('orders.order_date',$newFormateDate)
    	       ->select('customers.name','orders.*')
    	       ->get();

    	return response()->json($order);
    }
    public function searchMonth($id){
    	

    	$order=DB::table('orders')
    	       ->join('customers','orders.customer_id','customers.id')
    	       ->where('orders.order_month',$id)
    	       ->select('customers.name','orders.*')
    	       ->get();

    	return response()->json($order);
    }
}
