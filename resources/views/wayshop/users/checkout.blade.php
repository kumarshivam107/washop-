@extends('wayshop.layouts.master')
@section('content')
<section class="address-selection">
    <div class="container">
        <h1>Select a Address From Your Saved Address</h1>
        <!--******** The Existing Address Show Here*****************-->
        <form action="{{url('/checkout')}}" method="post">{{csrf_field()}}
            <div class="container my-2">
                <div class="row">
                    @foreach($address as $address)
                    <div class="col-md-5 col-lg-5 col-10">
                        <input class="form-check-input seleAddress" type="radio" name="selectAddress" 
                            value="{{$address->address_id}}">
                        <label class="form-check-label">
                            <h2>{{$address->remark}}</h2>
                            <p><span>{{$address->full_address}}</span>,&nbsp;<span>Village:-{{$address->village}}</span>,&nbsp;District:-{{$address->district}}&nbsp;,State:-{{$address->state}},&nbsp;Pincode:-{{$address->pincode}},&nbsp;Country:-{{$address->country}}
                            </p>
                            <label>
                    </div>
                    <div class="col-md-1 col-lg-1 col-2">
                        <a href="{{url('/editaddress/'.$address->address_id)}}"><i class="fa fa-edit"
                                title="Edit-Address" style="font-size:24px"></i></a>
                    </div>
                    @endforeach
                </div>
                <p class="my-2">Add A New Address:-&nbsp;&nbsp; <a id="addressBtn"
                        href="{{url('/myaccount/myaddress')}}" class="btn btn-success">Add a
                        Address</a></p>
                <div class="d-flex flex-row-reverse">
                    <button type="submit" class="btn btn-primary" onclick="return seleAddress();" >Order Review</button>
                    <div>
                    </div>
                </div>
            </div>
        </form>
</section>

@endsection