@extends('wayshop.layouts.master')
@section('content')
<div class="container my-2">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Order Id</th>
                <th scope="col">Full Address</th>
                <th scope="col">Country</th>
                <th scope="col">Payment Method</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orderDetail as $orderDetail)
            <tr>
                <th>{{$orderDetail->order_id}}</th>
                <td>{{$orderDetail->full_address}}</td>
                <td>{{$orderDetail->country}}</td>
                <td>{{$orderDetail->payment_method}}</td>
                <td>Status</td>
                <td><a class="btn btn-danger">Cancel Order</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection