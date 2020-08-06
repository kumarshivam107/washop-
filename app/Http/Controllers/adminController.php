<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;
use Session;
use Image;
use App\Products;
use App\Categories;
class adminController extends Controller
{
    // Creating the Admin Login Page:-
    public function adminlogin(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            if (Auth::attempt(['email'=>$data['username'],'password'=>$data['password'],'admin_status'=>1])){
                return redirect('admin/dashboard');
            }
            else{
                return redirect('/admin')->with('flash_message_error','Invalid Username or Passwword');
            }
        }
        return view('admin.adminlogin');
    }

    // Craeting a Admin Dashboard:-
    public function admindashboard(){
        return view("admin.admindash");
    }

    // Creating a Logout Button:-
    public function adminlogout(){
        session::flush();
        return redirect('/admin')->with('flash_message_success','You Are Sucessfully Logout.');
    }

    //Creting a Page for Adding a Product:-
    public function addproduct(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $product = new Products;
            $product->parent_id = $data['product_id'];
            $product->subcategory_id = $data['subcat_id'];
            $product->product_name = $data['product_name'];
            $product->product_color = $data['product_color'];
            $product->product_code  = $data['product_code'];
            $product->product_desc = $data['product_desc'];
            $product->product_price = $data['product_price'];
            if($request->hasfile('image')){
                echo $img_tmp = $request->file('image');
                if($img_tmp->isValid()){
                    $extension = $img_tmp->getClientOriginalExtension();
                    $filename = rand(111,9999).'.'.$extension;
                    $image_path = 'uploads/products/'.$filename;

                    // Image Reseize
                    image::make($img_tmp)->resize(500,500)->save($image_path);
                    $product->image = $filename;
                }
            }
            $product->save();
            return redirect('/addproduct')->with('flash_message_success','You are Successfully Added the Product');
        }
        //Category Dropdowwn Menu Code:-
        $categories = Categories::where(['parent_id'=>0])->get();
        $category_dropdown ="<option value='' select >Select</option>";
        foreach($categories as $category){
            $category_dropdown .= "<option value='".$category->id."' class='category_drop'>".$category->category_name."</option>";
        }
        return view("admin.addproduct")->with(compact('category_dropdown'));
    }

    //Creating a Page For Product View Page:-
    public function viewProduct(){
        $products =Products::get();
        return view("admin.viewproduct")->with(compact('products'));
    }

    //Creating a Page for Editing the Product Data page:-
    public function editproduct(Request $request,$id){
        if($request->isMethod('post')){
            $data = $request->all();
            $product = new Products;
            $product->product_id = $data['product_id'];
            $product->product_name = $data['product_name'];
            $product->product_color = $data['product_color'];
            $product->product_code = $data['product_code'];
            $product->product_desc = $data['product_desc'];
            $product->product_price = $data['product_price'];
            Products::where(['sno'=>$id])->update(['product_id'=> $data['product_id'],'product_name'=>$data['product_name'],'product_color'=>$data['product_color'],'product_code'=>$data['product_code'],'product_desc'=>$data['product_desc'],'product_price'=>$data['product_price']]);
            return redirect()->back()->with('flash_message_success','Product Details Has Benn Updated');
        }
        $productDetail = Products::where(['sno'=>$id])->first();
        // Category DropDown Code:-
        $categories = Categories::get();
        $category_dropdown = "<option value='' selected disabled>Select</option>";
        foreach($categories as $category){
            if($category->id==$productDetail->product_id){
                $selected="selected";
            }
            else{
                $selected="";
            }
            $category_dropdown .= "<option value='".$category->id."' ".$selected.">".$category->category_name."</option>";
        }
        return view("admin.editproduct")->with(compact('productDetail','category_dropdown'));
    }

    // Creating a Page For Deleting the Product From the Database:-
    public function deleteproduct($id){
            Products::where('sno',$id)->delete();
            Alert::success('Success', 'Successfully Deleted The Product!');
            return redirect()->back();
    }
    
    //To Create a Update Status page:-
    public function update_status(Request $request,$id=null){
        $data = $request->all();
        Products::where('sno',$data['id'])->update(['status'=>$data['status']]);
    }

    //To Fetching Sub-Categories:-
    public function getsubcategory($id){
        echo $id;
            $category= Categories::where(['parent_id'=>$id])->get();
            $data="<option val='' selected>Select</option>";
            foreach($category as $category){
                $data .= "<option value='".$category->id."'>".$category->category_name."</option>";
            }
        // return response()->json(['success' => true, 'data' => $data]);
        return $data;
    }

    //To Update the Feature Product Status
    public function featurestatus(Request $request){
        if($request->isMethod('post')){
            $rdata = $request->all();
            $product= Products::where(['sno'=>$rdata['id']])->first();
            $feature_data = $product->feature_product;
            if($feature_data==1){
                Products::where(['sno'=>$rdata['id']])->update(['feature_product'=>0]);
                $data= "Status Updated";
                return $data;
            }
            else{
                Products::where(['sno'=>$rdata['id']])->update(['feature_product'=>1]);
                $data = "Status Updated";
                return $data;
            }

        }
    }

    //
    
}
