<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Supplier;
use DB;
use Image;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier=Supplier::all();
        return response()->json($supplier);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validatedData = $request->validate([
         'name' => 'required',
         'email' => 'required',
         'phone' => 'required|unique:suppliers',
        ]);

            if($request->photo){
                   $position = strpos($request->photo, ';');
                   $sub=substr($request->photo, 0 ,$position);
                   $ext=explode('/', $sub)[1];
                   $name=time().".".$ext;
                   $img=Image::make($request->photo)->resize(240,200);
                   $upload_path='backend/supplier/';
                   $image_url=$upload_path.$name;
                   $img->save($image_url);

                   $supplier = new Supplier;
                   $supplier->name = $request->name;
                   $supplier->email = $request->email;
                   $supplier->phone = $request->phone;
                   $supplier->address = $request->address;
                   $supplier->shopname = $request->shopname;
                   $supplier->photo =  $image_url;
                   $supplier->save();
            }else{
                   $supplier = new Supplier;
                   $supplier->name = $request->name;
                   $supplier->email = $request->email;
                   $supplier->phone = $request->phone;
                   $supplier->address = $request->address;
                   $supplier->shopname = $request->shopname;
                   $supplier->save();
            }
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier=Supplier::findorfail($id);
        return response()->json($supplier);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['shopname']=$request->shopname;
        $image=$request->newphoto;
      if ($image) {
           $position = strpos($image, ';');
           $sub=substr($image, 0 ,$position);
           $ext=explode('/', $sub)[1];
           $name=time().".".$ext;
           $img=Image::make($image)->resize(240,200);
           $upload_path='backend/supplier/';
           $image_url=$upload_path.$name;
           $success=$img->save($image_url);
       if  ($success) {
             $data['photo']=$image_url;
             $img=DB::table('suppliers')->where('id',$id)->first();
             $image_path = $img->photo;
             $done=unlink($image_path);
             $user=DB::table('suppliers')->where('id',$id)->update($data); 
           }
       }else{
           $oldlogo=$request->photo;       
           $data['photo']=$oldlogo;  
           DB::table('suppliers')->where('id',$id)->update($data); 
        
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $supplier=Supplier::findorfail($id);
        $photo=$supplier->photo;
        if($photo){
          unlink($photo);
          Supplier::find($id)->delete();
        }
        else{
          Supplier::find($id)->delete();
        }
    }
}
