@extends('wayshop.layouts.master')
@section('content')
<div class="container my-4">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Order Id</th>
                <th scope="col">Ordered Product</th>
                <th scope="col">Product Size</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total Ammount</th>
                <th scope="col">Order Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody id="orderBody">
            @foreach($orders as $order)
            <tr>
                <th>{{$order->order_id}}</th>
                <td>{{$order->product_name}}</td>    
                <td>{{$order->product_size}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->total_ammount}}</td>
                <td>{{$order->created_at}}</td>
                <td><a class="btn btn-success" href="{{url('/myorders/viewDetails/'.$order->order_id)}}">View Details</a></td>
            </tr>
            }
        @endforeach
        </tbody>
    </table>
</div>
<script>
$(document).ready(function(){

});
</script>
@endsection