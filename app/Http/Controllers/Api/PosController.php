<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use DateTime;

class PosController extends Controller
{
    public function GetProduct($id){
    	$product=DB::table('products')
    	       ->where('category_id',$id)
    	       ->get();
    	return response()->json($product);
    }
    public function sellToday(){
        
        $yesterday = Carbon::yesterday();
        $formatDate=new DateTime($yesterday);
        $newFormateDate=$formatDate->format('d/m/Y');


    	$data=DB::table('orders')
    	          ->where('order_date',$newFormateDate)
    	          ->sum('total');
    	return response()->json($data);
    }
    public function collectionToday(){
    	$todayDate=Date('d/m/Y');
    	$data=DB::table('orders')
    	          ->where('order_date',$todayDate)
    	          ->sum('pay');
    	return response()->json($data);
    }
    public function dueToday(){
    	$todayDate=Date('d/m/Y');
    	$data=DB::table('orders')
    	          ->where('order_date',$todayDate)
    	          ->sum('due');
    	return response()->json($data);
    }
    public function expenseToday(){
    	$todayDate=Date('d/m/Y');
    	$data=DB::table('expenses')
    	          ->where('expense_date',$todayDate)
    	          ->sum('amount');
    	return response()->json($data);
    }
    public function reOrder(){
    	$product=DB::table('products')
    	->where('product_quantity','<',5)
    	->get();
    	return response()->json($product);

    }
}
