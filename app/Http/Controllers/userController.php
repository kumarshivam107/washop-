<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
Use App\User;
use Auth;
use Session;
use App\Address;
use App\Country;
use App\Cart;
class userController extends Controller
{
    //Creating Login/Register Page:-
    public function userlogin(){
        return view('wayshop.users.userlogin');
    }
    //Creating a Normal User:-
    public function userRegister(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $usercount = User::where(['email'=>$data['email']])->count();
            if($usercount>0){
                return redirect('login-register')->with('flash_message_error','Email is Already Exists');
            }
            else{
                if($data['password']==$data['cpassword']){
                    $user = new User;
                    $user->name = $data['name'];
                    $user->email = $data['email'];
                    $user->password = bcrypt($data['password']);
                    $user->save();
                    return redirect('login-register')->with('flash_message_success','User Created.');
                }
                else{
                    return redirect('login-register')->with('flash_message_error','Password Doesnot Match.');
                }
            }
        }
        else{
            echo "Invalid url";
        }
    }

    //Login a Normal User:-
    public function userslogin(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            if(Auth::attempt(['email'=>$data['uemail'],'password'=>$data['upassword'],'admin_status'=>0])){
                Session::put('user_email',$data['uemail']);
                Session::put('login_status',true);
                if(Session::get('session_id')==''){
                    return redirect('/cart');
                }
                else{
                    $sessionCart = Cart::where(['session_id'=>Session::get('session_id')])->count();
                    if($sessionCart==0){
                        Session::forget('session_id');
                        return redirect('/cart');
                    }
                    else{
                        Cart::where(['session_id'=>Session::get('session_id')])->update(['user_email'=>$data['uemail']]);
                        return redirect('/cart');
                    }
                }
                
            }
            else{
                return redirect('/login-register')->with('flash_message_error','Invalid Email or Password');
            }

        }
        else{
            echo "invalid Url";
        }
    }

    //Crating a Logout Page:-
    public function userslogout(Request $request){
        Auth::logout();
        session::flush();
        return redirect('/')->with('flash_message_success','You are Successfully Logout');
    }

    //Creating a My Account Page:-
    public function myaccount(){
        return view('wayshop.users.myaccount');
    }

    //Creating Change Password Page:-
    public function changepassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            if($data['new_password']==$data['cnew_password']){
                $session_id = Session::get('user_email');
                $userpass = User::where(['email'=>$session_id])->first();
                $password = $userpass->password;
                if(Hash::check($data['old_password'],$password)){
                    User::where(['email'=>$session_id])->update(['password'=>bcrypt($data['new_password'])]);
                    return redirect('/myaccount/changepassword')->with('flash_message_success','Your Password Has Been Updated');
                }
                else{
                    return redirect('/myaccount/changepassword')->with('flash_message_error','Old Password is Wrong');
                }
            }
            else{
                return redirect('/myaccount/changepassword')->with('flash_message_error','New Password and Confirm Password is not Match.');
            }
            
           
        }
        return view('wayshop.users.changepassword');
    }

    //Creating a Page for Address Page:-
    public function myaddress(Request $request){
        if($request->isMethod('post')){
            if(Session::get('login_status')==true){
                $data = $request->all();
                $address = new address;
                $address->user_email =Session::get('user_email');
                $address->full_address = $data["myaddress"];
                $address->village = $data['village'];
                $address->district = $data['dist'];
                $address->state = $data['state'];
                $address->country = $data['country'];
                $address->pincode =$data['pincode'];
                $address->remark = $data['remarks'];
                $address->save();
                return redirect('/myaccount/myaddress')->with('flash_message_success','You are Successfully Added a Address');
            }
            else{
                return redirect("/myaccount/myaddress")->with('flash_message_error','You Must Login First.Kindly Login!');
            }
        }
        $address = Address::where(['user_email'=>Session::get('user_email')])->get();
        $countries = Country::get();
        return view('wayshop.users.myaddress')->with(compact('address','countries'));
    }

    //Creating a Checkout Page:-
    public function checkout(Request $request){
        if($request->isMethod('post')){
            $data= $request->all();
            $address_id = $data['selectAddress'];
            if(Session::get('address_id')==''){
                Session::put('address_id',$address_id);
            }
            else{
                Session::forget('address_id');
                Session::put('address_id',$address_id);
            }
            return redirect('/order-review');
        }
        $email =  Session::get('user_email');
        $address = Address::where(['user_email'=>$email])->get();
        return view('wayshop.users.checkout')->with(compact('address'));
    }

    //Creating a Page For Edit Address:-
    public function editaddress(Request $request,$id){
        if($request->isMethod('post')){
            if(Session::get('login_status')==true){
                $data = $request->all();
                $address = new address;
                $address->user_email =Session::get('user_email');
                $address->full_address = $data["myaddress"];
                $address->village = $data['village'];
                $address->district = $data['dist'];
                $address->state = $data['state'];
                $address->country = $data['country'];
                $address->pincode =$data['pincode'];
                $address->remark = $data['remarks'];
                $address->where(['address_id'=>$id])->update(['full_address'=>$data['myaddress'],'village'=>$data['village'],'district'=>$data['dist'],'state'=>$data['state'],'country'=>$data['country'],'pincode'=>$data['pincode'],'remark'=>$data['remarks']]);
                return redirect('/checkout')->with('flash_message_success','You are Successfully Added a Address');
            }
            else{
                return redirect("/checkout")->with('flash_message_error','You Must Login First.Kindly Login!');
            }
        }
        $email = Session::get('user_email');
        $countries = Country::get();
        $addressDetail = Address::where(['address_id'=>$id])->first();
        // Country DropDown Code:-
        $country_dropdown = "<option class='form-control' value=''>Select</option>";
        foreach($countries as $country){
            if($country->country_code == $addressDetail->country){
                $selected ='selected';
            }
            else{
                $selected= '';
            }
            $country_dropdown .="<option class='form-control' value=".$country->country_code." ".$selected.">".$country->country_name."</option>";
        }
        
        if($addressDetail->user_email==$email){
            return view('wayshop.users.editaddress')->with(compact('addressDetail','country_dropdown'));
        }
        else{
            echo "You are not Allowwed to Edit This Address.";
        }
    }

    //Creating a Page For Order Review Page:-
    public function orderReview(){
        if(Session::get('login_status')==true){
            $email = Session::get('user_email');
            $usercart = Cart::where(['user_email'=>$email])->get();
            //Coding of Address Details:-
            $address_id = Session::get('address_id');
            $address = Address::where(['address_id'=>$address_id])->first();
            return view('wayshop.users.orderreview')->with(compact('usercart','address'));    
        }
        else{
            echo "You are not allowed to Access the Page. Kindly Login the Record.";
        }
        
    }
    
}