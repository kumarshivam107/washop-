<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use RealRashid\SweetAlert\Facades\Alert;
use Image;
use App\Banners;
class bannerController extends Controller
{
    // To Craete a Page For Adding Banner
    public function addbanner(Request $request){
        if($request->isMethod('post')){
            $data= $request->all();
            $banner = new Banners;
            $banner->name = $data['banner_name'];
            $banner->style = $data['banner_style'];
            $banner->sort_order = $data['sort_order'];
            $banner->content = $data['banner_content'];
            $banner->link = $data['banner_link'];
            if($request->hasfile('image')){
                echo $img_tmp = $request->file('image');
                if($img_tmp->isValid()){
                    $extension = $img_tmp->getClientOriginalExtension();
                    $filename = rand(111,9999).'.'.$extension;
                    $image_path = 'uploads/banner/'.$filename;

                    // Image Reseize
                    image::make($img_tmp)->resize(500,500)->save($image_path);
                    $banner->image = $filename;
                }
                else{
                    return redirect('/admin/addbanner')->with('flash_message_error','Invalid File Format');
                }
            }
            else{
                return redirect('/admin/addbanner')->with('flash_message_errortwo','Invali Format');
            }
            $banner->save();
            return redirect('/admin/addbanner')->with('flash_message_success','You are Successfully Added the  Banner');
        }
        return view('admin.banner.addbanner');
    }

    // To Create a Page For View Banner
    public function viewbanner(){
        $banner =Banners::get();
        return view('admin.banner.viewbanner')->with(compact('banner'));
    }

    // To Create a Page For Edit Banner
    public function editbanner(Request $request,$id){
        if($request->isMethod('post')){
            $data= $request->all();
            $banner = new Banners;
            $banner->name = $data['banner_name'];
            $banner->style = $data['banner_style'];
            $banner->sort_order = $data['sort_order'];
            $banner->content = $data['banner_content'];
            $banner->link = $data['banner_link'];
            if($request->hasfile('image')){
                echo $img_tmp = $request->file('image');
                if($img_tmp->isValid()){
                    $extension = $img_tmp->getClientOriginalExtension();
                    $filename = rand(111,9999).'.'.$extension;
                    $image_path = 'uploads/banner/'.$filename;

                    // Image Reseize
                    image::make($img_tmp)->save($image_path);
                    $banner->image = $filename;
                }
            }
            else{
                $filename=$data['current_image'];
            }
            Banners::where(['banner_id'=>$id])->update(['name'=>$data['banner_name'],'style'=>$data['banner_style'],'sort_order'=>$data['sort_order'],'content'=>$data['banner_content'],'link'=>$data['banner_link'],'image'=>$filename]);
            return redirect()->back()->with('flash_message_success','Banner Has Been Edited Sucessfully');
        }
        $bannerDetail = Banners::where(['banner_id'=>$id])->first();
        return view('admin.banner.editbanner')->with(compact('bannerDetail'));
    }

    // To Create a Route For Deleting the Banner
    public function deletebanner($id){
        Banners::where('banner_id',$id)->delete();
        Alert::success('Success','Successfully Deleted the Product');
        return redirect()->back();
    }
}
