<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CartController extends Controller
{
    public function AddToCart($id){
    	$product=DB::table('products')->where('id',$id)->first();
    	if($product->product_quantity==1){
    		return false;
    	}
        $check=DB::table('pos')->where('pro_id',$id)->first();
        if($check){
        DB::table('pos')->where('pro_id',$id)->increment('pro_quantity');

    	$pos=DB::table('pos')->where('pro_id',$id)->first();
    	$subtotal=$pos->pro_quantity*$pos->product_price;
    	DB::table('pos')->where('pro_id',$id)->update(['sub_total'=>$subtotal]);
        }
        else{
        $data=array();
    	$data['pro_id']=$id;
    	$data['pro_name']=$product->product_name;
    	$data['pro_quantity']=1;
    	$data['product_price']=$product->selling_price;
    	$data['sub_total']=$product->selling_price;
    	DB::table('pos')->insert($data);
        }
    	
    	return response()->json('done');
    }
    public function CartProduct(){
    	$product=DB::table('pos')->get();
    	return response()->json($product);
    }
    public function removeToCart($id){
    	DB::table('pos')->where('id',$id)->delete();
    	return response()->json('done');
    }
    public function Increment($id){
    	DB::table('pos')->where('id',$id)->increment('pro_quantity');
    	$product=DB::table('pos')->where('id',$id)->first();
    	$subtotal=$product->pro_quantity*$product->product_price;
    	DB::table('pos')->where('id',$id)->update(['sub_total'=>$subtotal]);

    }
    public function Decrement($id){
    	DB::table('pos')->where('id',$id)->decrement('pro_quantity');
    	$product=DB::table('pos')->where('id',$id)->first();
    	$subtotal=$product->pro_quantity*$product->product_price;
    	DB::table('pos')->where('id',$id)->update(['sub_total'=>$subtotal]);
    }
    public function Vats(){
    	$vat=DB::table('extra')->first();
    	return response()->json($vat);
    }
    public function orderDone(Request $request){
    	$validatedData = $request->validate([
           'customer_id' => 'required',
           'payby' => 'required',
         ]);

         $data=array();
         $data['customer_id']=$request->customer_id;
         $data['qty']=$request->qty;
         $data['sub_total']=$request->subTotal;
         $data['vat']=$request->vat;
         $data['total']=$request->total;
         $data['payby']=$request->payby;
         $data['pay']=$request->pay;
         $data['due']=$request->due;
         $data['order_date']=date('d/m/Y');
         $data['order_month']=date('F');
         $data['order_year']=date('Y');
         $order_id=DB::table('orders')->insertGetId($data);

         $contents=DB::table('pos')->get();

         $odata=array();
         foreach ($contents as $content) {
         	$odata['order_id']=$order_id;
         	$odata['product_id']=$content->pro_id;
         	$odata['pro_quantity']=$content->pro_quantity;
         	$odata['product_price']=$content->product_price;
         	$odata['sub_total']=$content->sub_total;
            DB::table('order_details')->insert($odata);	

            DB::table('products')
                 ->where('id',$content->pro_id)
                 ->update(['product_quantity' => DB::raw('product_quantity -' .$content->pro_quantity)]);

         }

         DB::table('pos')->delete();
         return response('done');
    }
}
