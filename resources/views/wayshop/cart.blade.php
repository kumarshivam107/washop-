@extends('wayshop.layouts.master')
@section('content')
<!-- Start All Title Box -->
<div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Cart</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Product Name</th>
                                    <th>Size</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $totalAmmount =0; ?>
                                @foreach($usercart as $usercart)
                                <tr>
                                    <td class="thumbnail-img">
                                        <a href="#">
									<img class="img-fluid" src="{{asset('uploads/products/'.$usercart->image)}}" alt="" />
								</a>
                                    </td>
                                    <td>
									<h3>{{$usercart->product_name}}</h3>
                                    </td>
                                    <td>{{$usercart->size}}</td>
                                    <td class="price-pr">
                                        <p>{{$usercart->product_price}}</p>
                                    </td>
                                    <td class="quantity-box"><a href="{{url('/update-quantity/plus/'.$usercart->cart_id)}}"><i class="fa fa-plus" style="font-size:24px; margin-right:3px;"></i></a><input type="number" style="width:60%;!important" class="quantity" size="4" value="{{$usercart->quantity}}" min="0" step="1" class="c-input-text qty text"><a href="{{url('/update-quantity/minus/'.$usercart->cart_id)}}"><i class="fa fa-minus" style="font-size:24px; margin-left:3px;"></i></a><</td>
                                    <td class="total-pr">
                                        <p>{{$usercart->product_price*$usercart->quantity}}</p>
                                    </td>
                                    <td class="remove-pr"><a href="{{url('/deletecart/'.$usercart->cart_id)}}"><i class="fa fa-trash-o" style="font-size:24px"></i></a></td>
                                </tr> 
                                <?php $totalAmmount += ($usercart->product_price*$usercart->quantity) ?>
                                @endforeach           
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-12 col-sm-12">
                    <div class="order-box">
                        <h3>Order summary</h3>
                        <div class="d-flex">
                            <h4>Sub Total</h4>
                            <div class="ml-auto font-weight-bold">Rs.&nbsp;<?php echo $totalAmmount ?> </div>
                        </div>
                        <div class="d-flex">
                            <h4>Discount</h4>
                            <div class="ml-auto font-weight-bold">Rs.&nbsp;0</div>
                        </div>
                        <hr class="my-1">
                        <div class="d-flex">
                            <h4>Tax</h4>
                            <div class="ml-auto font-weight-bold">Rs.&nbsp;0</div>
                        </div>
                        <div class="d-flex">
                            <h4>Shipping Cost</h4>
                            <div class="ml-auto font-weight-bold"> Free </div>
                        </div>
                        <hr>
                        <div class="d-flex gr-total">
                            <h5>Grand Total</h5>
                            <div class="ml-auto h5">Rs.&nbsp;<?php echo $totalAmmount ?></div>
                        </div>
                        <hr> </div>
                </div>
                <div class="col-12 d-flex shopping-box"><a href="{{url('/checkout')}}" class="ml-auto btn hvr-hover">Checkout</a> </div>
            </div>

        </div>
    </div>
   
    <!-- End Cart -->
@endsection