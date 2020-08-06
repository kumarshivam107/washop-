<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\categories;
class categoryController extends Controller
{
    //To create a Add Category Page:-
    public function addCategory(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $category = new Categories;
            $category->category_name = $data['category_name'];
            $category->parent_id = $data["parent_id"];
            $category->url = $data['category_url'];
            $category->description = $data['category_desc'];
            $category->save();
            return redirect()->back()->with('flash_meassage_success','You Are Successfully Added a Category.');
        }
        $levels = Categories::where(['parent_id'=>0])->get();
        return view("admin.category.addcategory")->with(compact('levels'));
    }

    //To Craete a Category View Page:-
    public function viewcategory(){
        $category = Categories::get();
        return view('admin.category.viewcategory')->with(compact('category'));
    }

    //To Create a Edit Category Page:-
    public function editcategory(Request $request,$id){
        if($request->isMethod('post')){
            $data= $request->all();
            $category = new Categories;
            $category->category_name = $data['category_name'];
            $category->parent_category = $data['parent_category'];
            $category->url = $data['category_url'];
            $category->description = $data['category_desc'];
            Categories::where(['id'=>$id])->update(['category_name'=>$data['category_name'],'parent_category'=>$data['parent_category'],'url'=>$data['category_url'],'description'=>$data['category_desc']]);
            return redirect()->back()->with('flash_message_success','Category Detaikls Updated Suceessfully');
        }
        $categoryDetail = Categories::where(['id'=>$id])->first();
        //Category Dropdown Code:-
        $category = Categories::get();
        $dropdown = "<option value='' selected disabled></option>";
        foreach($category as $category){
            if($categoryDetail->id==$category->id){
                $selected='selected';
            }
            else{
                $selected='';
            }
            $dropdown .= "<option value='".$category->id."' ".$selected.">".$category->category_name."</option>";   
        }
        return view('admin.category.editcategory')->with(compact('categoryDetail','dropdown'));
    }

    //To Create a Delete Category Page:-
    public function deletecategory(Request $request,$id){
        Categories::where('id',$id)->delete();
        Alert::success('Success','Successfully Deleted The Category From Database');
        return redirect()->back();
    }

    // To Create a Page For Updating the Status:-
    public function update_status(Request $request,$id=null){
        $data= $request->all();
        Categories::where('id',$data['id'])->update(['status'=>$data['status']]);
    }
}
