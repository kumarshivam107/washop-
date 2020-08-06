@extends('wayshop.layouts.master')
@section('content')
<div class="cart-box-main pb-0">
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
                                        <img class="img-fluid" src="{{asset('uploads/products/'.$usercart->image)}}"
                                            alt="" />
                                    </a>
                                </td>
                                <td>
                                    <h3>{{$usercart->product_name}}</h3>
                                </td>
                                <td>{{$usercart->size}}</td>
                                <td class="price-pr">
                                    <p>{{$usercart->product_price}}</p>
                                </td>
                                <td class="quantity-box"><a
                                        href="{{url('/update-quantity/plus/'.$usercart->cart_id)}}"><i
                                            class="fa fa-plus" style="font-size:24px; margin-right:3px;"></i></a><input
                                        type="number" style="width:60%;!important" class="quantity" size="4"
                                        value="{{$usercart->quantity}}" min="0" step="1"
                                        class="c-input-text qty text"><a
                                        href="{{url('/update-quantity/minus/'.$usercart->cart_id)}}"><i
                                            class="fa fa-minus" style="font-size:24px; margin-left:3px;"></i></a>
                                    </td>
                                <td class="total-pr">
                                    <p>{{$usercart->product_price*$usercart->quantity}}</p>
                                </td>
                                <td class="remove-pr"><a href="{{url('/deletecart/'.$usercart->cart_id)}}"><i
                                            class="fa fa-trash-o" style="font-size:24px"></i></a></td>
                                            <?php $totalAmmount += ($usercart->product_price*$usercart->quantity)  ?>
                                            @endforeach
                            </tr>
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
                        <div class="ml-auto font-weight-bold">
                            Rs.&nbsp;<?php echo $totalAmmount  ?>
                        </div>
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
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>

    <!--Address Section Strts Here --->
    <div class="container my-2">
        <div class="row">
            <div class="col-md-8 col-lg-8 col-10">
                <label class="form-check-label">
                    <h1>Your Selected Address</h1>
                    <p><span>{{$address->full_address}}</span>,&nbsp;<span>Village:-{{$address->village}}</span>,&nbsp;District:-{{$address->district}}&nbsp;,State:-{{$address->state}},&nbsp;Pincode:-{{$address->pincode}},&nbsp;Country:-{{$address->country}}
                    </p>
                    <label>
            </div>
        </div>
        <hr>
    </div>
    <!-- Address Section Close Here -->
    <!--  Payment Section  Here -->
    <div class="container pb-1">
        <h2>Select a Payment Method:-</h2>
        <form action="{{url('/place-order')}}" method="post">{{csrf_field()}}
            <input type="hidden" name="grand_total" id="grand_total" value="<?php echo $totalAmmount ?>">
            <input type="hidden" name="add_id" id="add_id" value="{{$address->address_id}}">
            <div class="form-check">
                <input class="form-check-input cod" type="radio" name="paymentMethod" id="cod" value="cod" checked>
                <label class="form-check-label" for="cod">
                    Cash on Deliver (COD)
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input online" type="radio" name="paymentMethod" id="online" value="online">
                <label class="form-check-label" for="online">
                    Online Payment
                </label>
            </div>
        <div class="d-flex flex-row-reverse">
            <button class="btn btn-primary" type="submit" onclick="return placeorder();">Place Order</button>
        </div>
        </form>
    </div>
    @endsection