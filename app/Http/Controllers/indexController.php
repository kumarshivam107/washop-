<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banners;
use App\Categories;
use App\Products;
use App\Altimage;
use App\Attributes;
use App\Cart;
Use Session;
Use DB;
use Auth;
use App\Contact;
use Illuminate\Support\Str; 
class indexController extends Controller
{
    // Creating The Index Page
    public function index(){
        $banners = Banners::get();
        $category = Categories::with('category')->where(['parent_id'=>0])->get();
        $product = Products::get();
        return view('wayshop.index')->with(compact('banners','category','product'));
    }


    //Creating a Product View Page:-
    public function productdetail($id){
        $fid=1;
        $altimages = Altimage::where(['product_id'=>$id])->get(); 
        $attribute = Attributes::where(['product_id'=>$id])->get();
        $productdetail = Products::where(['sno'=>$id])->first();
        $featureProduct = Products::where(['feature_product'=>$fid])->get();
        return view('wayshop.productdetail')->with(compact('productdetail','altimages','attribute','featureProduct'));
    }

    //Category Wise product listing:-
    public function categorylist($id){
        $banners = Banners::get();
        $category = Categories::with('category')->where(['parent_id'=>0])->get();
        $product = Products::where(['subcategory_id'=>$id])->get();
        return view('wayshop.categorylist')->with(compact('banners','category','product'));
    }

    //Getting Updated Price:-
    public function updatedprice($id){
        $attribute = Attributes::where(['attribute_id'=>$id])->first();
        $data = $attribute->price;
        return $data;
    }
    //Adding Cart:-
    public function addcart(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $xx = Session::get('session_id');
            //echo "<pre>";print_r($session);die;
            if($xx==''){
                $session_id = Str::random(40);
                Session::put('session_id',$session_id);
            }
            else{
                $session_id = Session::get('session_id');   
            }
            if(Session::get('login_status')==true){
                $user_email = Session::get('user_email');
            }
            else{
                $user_email ='';
            }

            $rrr = Attributes::where(['attribute_id'=>$data['selectsize']])->first();
            $size= $rrr->size;
            $exists = Cart::where(['product_id'=>$data['product_id'],'size'=>$size])->count();
            if($exists>0){
                return redirect()->back()->With('flash_message_error','product is Already in Cart.');
            }
            else{
                $cart = new Cart;
                $cart->product_id = $data['product_id'];
                $cart->product_name = $data['cart-name'];
                $cart->product_price = $data['cart-price'];
                $cart->image = $data['cart-image'];
                $cart->quantity = $data['cart-quantity'];
                $cart->session_id = $session_id;
                $cart->size = $size;
                $cart->user_email = $user_email;
                $cart->save();
                return redirect()->back()->With('flash_message_succeess','product has been Successfully added to cart.');
            }
        }
    }

    //Cart Page:-
    public function cart(){
        if(Auth::check()){
            $email = Session::get('user_email');
            $usercart = Cart::where(['user_email'=>$email])->get();
            return view('wayshop.cart')->with(compact('usercart'));
        }
        else{
            $session_id = Session::get('session_id');
            $usercart = Cart::where(['session_id'=>$session_id])->get();
            return view('wayshop.cart')->with(compact('usercart'));

        }

    }

    //Deleting The Product From The Cart Page:-
    public function deletecart($id){
        $session = Session::get('session_id');
        Cart::where(['cart_id'=>$id,'session_id'=>$session])->delete();
        return redirect('/cart')->with('flash_deletecart_success','Cart Item Has Been Deleted Successfully');
    }

    //Updating the Quantity From the Cart page:-
    public function updatequantity($mark,$id){
        if($mark=='plus'){
            $quantity=1;
            DB::table('carts')->where('cart_id',$id)->increment('quantity',$quantity);
            return redirect('/cart')->with('flash_message_success','Quantity Has Been updated');
        }
        else if($mark=='minus'){
            $quantity=-1;
            DB::table('carts')->where('cart_id',$id)->increment('quantity',$quantity);
            return redirect('/cart')->with('flash_message_success','Quantity Has Been updated');
        }
        else{
            $info ="Invalid Markup";
            echo "<pre>";print_r($info);die;
        }
    }

    //Creating a Route For About Us Page:-
    public function aboutus(){
        return view('wayshop.front.aboutus');
    }

    public function contactus(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $contact = new Contact;
            $contact->name = $data['name'];
            $contact->email = $data['email'];
            $contact->subject = $data['subject'];
            $contact->message = $data['message'];
            $contact->save();
            return redirect('/contactus')->with('flash_message_success','We Will Recorded Your Query. We will Contact You Soon.');
        }
        return view('wayshop.front.contactus');
    }

}
