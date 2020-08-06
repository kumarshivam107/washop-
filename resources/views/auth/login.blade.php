@extends('wayshop.layouts.master')
@section('content')
    <!-- Login- Register page Of the -->
    
    <!-- Start Contact Us  -->
    <div class="contact-box-main">
        <div class="container">
            @if(Session::has('flash_message_success'))
            <div class="alert alert-success" role="alert">
            {!! Session('flash_message_success') !!}
            </div>
            @endif

            @if(Session::has('flash_message_error'))
            <div class="alert alert-danger" role="alert">
            {!! Session('flash_message_error') !!}
            </div>
            @endif
            <div class="row">
            <div class="col-lg-5 col-sm-12">
             <div class="contact-form-right">
                 <h2>New User SignUp !</h2>
                 <form action="{{url('/user-register')}}" method="post">{{csrf_field()}}
                     <div class="row">
                         <div class="col-md-12">
                             <div class="form-group">
                                 <input type="text" class="form-control" placeholder="Your Name" id="name" name="name" required data-error="Please Enter Your Name">
                                 <div class="help-block with-errors"></div>
                             </div>

                         </div>
                         <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Email" id="email" name="email" required data-error="Please Enter Your Email">
                                <div class="help-block with-errors"></div>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Choose Password" id="password" name="password" required data-error="Please Enter Your Password">
                                <div class="help-block with-errors"></div>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Confirm Password" id="cpassword" name="cpassword" required data-error="Please Enter Your Password">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="submit-button text-center">
                                <button class="btn hvr-hover" id="submit" type="submit">Signup</button>
                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                <div class="clearfix"></div>
                            </div>

                        </div>
                     </div>
                 </form>
             </div>

         </div>
         <div class="col-lg-1 col-sm-12" id="or">
          OR
         </div>
         <div class="col-lg-6 col-sm-12">
            <div class="contact-form-right">
                <h2>Already a Member ? Just SignIn !</h2>
                <form action="{{url('/user-login')}}" method="post" id="contactForm LoginForm"> {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                               <input type="text" class="form-control" placeholder="Your Email" id="uemail" name="uemail" required data-error="Please Enter Your Email">
                               <div class="help-block with-errors"></div>
                           </div>

                       </div>
                       <div class="col-md-12">
                           <div class="form-group">
                               <input type="password" class="form-control" placeholder="Password" id="upassword" name="upassword" required data-error="Please Enter Your Password">
                               <div class="help-block with-errors"></div>
                           </div>

                       </div>
                       <div class="col-md-12">
                           <div class="submit-button text-center">
                               <button class="btn hvr-hover" type="submit">Login</button>
                               <div id="msgSubmit" class="h3 text-center hidden"></div>
                               <div class="clearfix"></div>
                           </div>

                       </div>
                    </div>
                </form>
            </div>
         </div>
            </div>
        </div>
</div>
    <!-- End Cart -->
@endsection