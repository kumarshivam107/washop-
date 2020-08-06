@extends('wayshop.layouts.master')
@section('content')
<div class="container pt-5 pb-5">
<div class="text-center">
<h1>Thanks for Purchasing With Us.</h1>
<h2>Your COD Order Has Been Placed and Your order Number is {{ Session::get('grand_total') }} .</h2>
<p>Please Kept Exactly Rs. {{ Session::get('grand_total') }} Exactly At The Time of Delivery For Hassle Free Delivery.</p>
</div>
</div>
@endsection

<?php
Session::forget('order_id');
Session::forget('grand_total');
?>
