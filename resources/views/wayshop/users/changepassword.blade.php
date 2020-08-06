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
<section class="change-password my-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-10 offset-lg-3">
                <form action="{{url('/myaccount/changepassword')}}" method="post">{{csrf_field()}}
                    <div class="form-group">
                        <label for="oldpassword">Your Old Password</label>
                        <input type="password" id="old_password" name="old_password" placeholder="Enter Your Old Password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="newpassword">New Password</label>
                        <input type="password" id="new_password" name="new_password" placeholder="New Password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="cnewpassword">Confirm Password</label>
                        <input type="password" id="cnew_password" name="cnew_password" placeholder="Confirm Password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection