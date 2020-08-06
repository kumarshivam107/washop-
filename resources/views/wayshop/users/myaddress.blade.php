@extends('wayshop.layouts.master')
@section('content')
@if(Session::has('flash_message_success'))
<div class="alert alert-success" role="alert">
    {!! Session('flash_message_success') !!}
</div>
@endif

@if(Session::has('flash_message_error'))
<div class="alert alert-success" role="alert">
    {!! Session('flash_message_error') !!}
</div>
@endif
<section class="existing-address">
    <!--******** The Existing Address Show Here*****************-->
    <div class="container my-2">
        <div class="row">
            @foreach($address as $address)
            <div class="col-md-4 col-lg-5 col-6">
                <h2>{{$address->remark}}</h2>
                <p><span>{{$address->full_address}}</span>,&nbsp;<span>Village:-{{$address->village}}</span>,&nbsp;District:-{{$address->district}}&nbsp;,State:-{{$address->state}},&nbsp;Pincode:-{{$address->pincode}},&nbsp;Country:-{{$address->country}}
                </p>
            </div>
            @endforeach
        </div>
        <p class="my-3">Add A New Address:-&nbsp;&nbsp; <button id="addressBtn" class="btn btn-success">Add a
                Address</button></p>
    </div>
    <!--******** The Existing Address Close Here*****************-->
    <div class="container my-2" id="addAddress" style="display:none;">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12 offset-3">
                <h2 class="text-center">Add Address</h2>
                <form action="{{url('/myaccount/myaddress')}}" method="post">{{csrf_field()}}
                    <div class="form-group">
                        <label for="address">Full Address</label>
                        <input type="text" class="form-control" id="myaddress" name="myaddress"
                            placeholder="Enter your Full Address">
                    </div>
                    <div class="form-group">
                        <label for="village">Village/Town</label>
                        <input type="text" class="form-control" id="village" name="village"
                            placeholder="Enter Village Name">
                    </div>
                    <div class="form-group">
                        <label for="dist">District</label>
                        <input type="text" class="form-control" id="dist" name="dist" placeholder="Enter District Name">
                    </div>
                    <div class="form-group">
                        <label for="village">State</label>
                        <input type="text" class="form-control" id="state" name="state" placeholder="Enter State Name">
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        <select name="country" id="country" class="form-control">
                            <option class="form-control" value="" selected>Select</option>
                            @foreach($countries as $country)
                            <option class="form-control" value="{{$country->country_code}}">{{$country->country_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pincode">Pin Code</label>
                        <input type="text" class="form-control" id="pincode" name="pincode"
                            placeholder="Enter Pincode Number">
                    </div>
                    <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <select name="remarks" id="remarks" class="form-control">
                            <option class="form-control" value="" selected>Select</option>
                            <option class="form-control" value="Home">Home</option>
                            <option class="form-control" value="Office">Office</option>
                            <option class="form-control" value="Others">Others</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection