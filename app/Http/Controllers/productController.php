<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\attributes;
use App\altimage;
use Image;
use Illuminate\Support\Facades\Input;
use RealRashid\SweetAlert\Facades\Alert;
use App\orderProduct;
class productController extends Controller
{
    // To create a Page for Adding Product Attributes:-
    public function addattribute(Request $request,$id){
        if($request->isMethod('post')){
            $data = $request->all();
            // Prevent Duplicate Entry of the SKU:-
            $skucount = Attributes::where('sku',$data['sku'])->count();
            if($skucount>0){
                return redirect('/admin/addproductattribute/'.$id)->with('flash_message_error','SKU Already Exists.');
            }
            // Prevent Duplicate Entry of Size:-
            $sizecount = Attributes::where(['product_id'=>$id,'size'=>$data['size']])->count();
            if($sizecount>0){
                return redirect('/admin/addproductattribute/'.$id)->with('flash_message_errortwo','Size Already Exists.');
            }
            $attribute = new Attributes;
            $attribute->product_id = $id;
            $attribute->sku = $data['sku'];
            $attribute->size = $data['size'];
            $attribute->price = $data['price'];
            $attribute->stock = $data['stock'];
            $attribute->save();
            return redirect('/admin/addproductattribute/'.$id)->with('flash_message_success','Product Attribute Added Successfully.');
        }
        $product = Products::where(['sno'=>$id])->first();
        $attributes = Attributes::where(['product_id'=>$id])->get();
        return view('admin.product.addproductattribute')->with(compact('product','attributes'));
    }

    // To Delete Product Attribute:-
    public function deleteattribute($id){
        Attributes::where(['attribute_id'=>$id])->delete();
        Alert::success('Success','Successfully Deleted The Attributes From Database');
        return redirect()->back();
    }

    // To Update the Attribute From the Database:-
    public function editattribute(Request $request,$id){
        if($request->isMethod('post')){
            $data = $request->all();
            $attribute = new Attributes;
            $attribute->sku = $data['upsku'];
            $attribute->size = $data['upsize'];
            $attribute->price = $data['upprice'];
            $attribute->stock = $data['upstock'];
            Attributes::where(['attribute_id'=>$id])->update(['sku'=> $data['upsku'],'size'=>$data['upsize'],'price'=>$data['upprice'],'stock'=>$data['upstock']]);
            
            return redirect()->back()->with('flash_message_successtwo','Attributes are updated successfully');
        }
    }

    //To add Alternative Images into Database:-
    public function addimage(Request $request,$id){
        if($request->isMethod('post')){
            if($request->hasfile('image')){
                $img_tmp = $request->file('image');
                foreach($img_tmp as $file){
                    $altimage = New Altimage;
                    $altimage->product_id = $id;
                    $extension = $file->getClientOriginalExtension();
                    $filename = rand(111,9999).'.'.$extension;
                    $image_path = 'uploads/altimages/'.$filename;

                    // Image Reseize
                    image::make($file)->save($image_path);
                    $altimage->alt_image = $filename;
                    $altimage->save();
                }
            }
            return redirect()->back()->with('flash_message_success','Image Has Been Added Successfully');
        }
        $altimage = Altimage::where(['product_id'=>$id])->get();
        $productDetail = Products::where(['sno'=>$id])->first();
        return view('admin.product.addimage')->with(compact('productDetail','altimage'));
    }

    //To Delete Image From the Database:-
    public function deleteimage($id){
        $altimage = Altimage::where(['altimage_id'=>$id])->first();
        $imgname = $altimage->alt_image;
        $img_path ='uploads/altimages/'.$imgname;
        //echo "<pre>";print_r($img_path);die;
        if(file_exists($img_path)){
            unlink($img_path);
        }
        $altimage = Altimage::where(['altimage_id'=>$id])->delete();
        Alert::success('Success','Image Has Been Deleted Successfully.');
        return redirect()->back();
    }

    //View orders in Admin Panel:-
    public function vieworder(){
        $orderProduct = OrderProduct::get();
        return view('admin.orders.vieworder')->with(compact('orderProduct'));
    }
}
