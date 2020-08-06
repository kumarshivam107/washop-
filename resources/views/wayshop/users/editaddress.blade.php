@extends('wayshop.layouts.master')
@section('content')
<div class="container my-2" id="addAddress">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12 offset-3">
                <h2 class="text-center">Edit Address</h2>
                <form action="{{url('/editaddress/'.$addressDetail->address_id)}}" method="post">{{csrf_field()}}
                    <div class="form-group">
                        <label for="address">Full Address</label>
                        <input type="text" class="form-control" id="myaddress" name="myaddress"
                         value="{{$addressDetail->full_address}}">
                    </div>
                    <div class="form-group">
                        <label for="village">Village/Town</label>
                        <input type="text" class="form-control" id="village" name="village"
                            value="{{$addressDetail->village}}">
                    </div>
                    <div class="form-group">
                        <label for="dist">District</label>
                        <input type="text" class="form-control" id="dist" name="dist" value="{{$addressDetail->district}}">
                    </div>
                    <div class="form-group">
                        <label for="village">State</label>
                        <input type="text" class="form-control" id="state" name="state" value="{{$addressDetail->state}}">
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        <select name="country" id="country" class="form-control">
                           <?php echo $country_dropdown; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pincode">Pin Code</label>
                        <input type="text" class="form-control" id="pincode" name="pincode"
                            value="{{$addressDetail->pincode}}">
                    </div>
                    <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <select name="remarks" id="remarks" class="form-control">
                            <option class="form-control" value="">Select</option>
                            <option class="form-control" value="Home" selected>Home</option>
                            <option class="form-control" value="Office">Office</option>
                            <option class="form-control" value="Others">Others</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection