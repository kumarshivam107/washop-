<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;
use App\order;
use Auth;
use App\OrderProduct;
use App\cart;
use DB;
use App\Product;
use Session;

class orderController extends Controller
{
    //Creating a Page For Placing Order Page:-
    public function placeorder(Request $request){
        if($request->isMethod('post')){
            if(Auth::check()){
                $data= $request->all();
                $address_id = $data['add_id'];
                $address = Address::where(['address_id'=>1])->first();
                $order = new Order;
                $order->user_name = Auth::user()->name;
                $order->user_email = Auth::user()->email;
                $order->full_address = $address->full_address;
                $order->country = $address->country;
                $order->payment_method = $data['paymentMethod'];
                $order->grand_total = $data['grand_total'];
                $order->save();
                
                $order_id = DB::getPdo()->lastinsertID();
                $user_email = Auth::user()->email;
                $usercarts = Cart::where(['user_email'=>$user_email])->get();
                //echo "<pre>";print_r($usercarts);die;
                foreach($usercarts as $cart){
                    $orderProduct = new OrderProduct;
                    $orderProduct->order_id= $order_id;
                    $orderProduct->product_id= $cart->product_id;
                    $orderProduct->product_name = $cart->product_name;
                    $orderProduct->product_size = $cart->size;
                    $orderProduct->quantity = $cart->quantity;
                    $orderProduct->total_ammount = $cart->product_price;
                    $orderProduct->user_id =Auth::user()->id;
                    $orderProduct->user_email = Auth::user()->email;

                    $orderProduct->save();
                    Session::put('grand_total',$data['grand_total']);
                    Session::put('order_id',$order_id);
                    if($data['paymentMethod']=='cod'){
                        return redirect('/thanks');
                    }
                    else{
                        return redirect('/paymentgateway');
                    }
                    
                }
            }
            else{
                echo "You are not Allowed to Access the url";
            }
            
        }
    }

    //Creating a thanks Page:-
    public function thanks(){
        $user_email = Auth::user()->email;
        Cart::where(['user_email'=>$user_email])->delete();
        return view('wayshop.orders.thanks');
    }

    //Creating a Page For My Orders Section:-
    public function myorders(){
        $orders = OrderProduct::where(['user_email'=>Auth::user()->email])->get();
        return view('wayshop.orders.myorders')->with(compact('orders','productName'));
    }

    //Craeting a Page For View Details Of order:-
    public function viewDetails($id){
        $orderDetail = Order::where(['user_email'=>Auth::user()->email,'order_id'=>$id])->get();
        return view('wayshop.orders.viewdetails')->with(compact('orderDetail'));
    }

    //Craeting a Page For Accepting a Payment Online:-
    public function paymentgateway(){
        return view('wayshop.orders.paymentgateway');
    }
}
