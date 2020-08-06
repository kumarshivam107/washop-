@extends('wayshop.layouts.master')
@section('content')
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Contact Us</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active"> Contact Us </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Contact Us  -->
<div class="contact-box-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <div class="contact-info-left">
                    <h2>CONTACT INFO</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna diam, maximus ut
                        ullamcorper quis, placerat id eros. Duis semper justo sed condimentum rutrum. Nunc tristique
                        purus turpis. Maecenas vulputate. </p>
                    <ul>
                        <li>
                            <p><i class="fa fa-map-marker" style="font-size:24px;"></i>Address: Shivam Kumar. B-56
                                Charch <br> Wali Galli, New Ashok Nagar,<br> New Delhi,110096 </p>
                        </li>
                        <li>
                            <p><i class="fa fa-phone-square"></i>Phone: <a href="#">+91-8986344241</a></p>
                        </li>
                        <li>
                            <p><i class="fa fa-envelope"></i>Email: <a href="#">krshivam4545@gmail.com</a></p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8 col-sm-12">
                @if(Session::has('flash_message_success'))
                <div class="alert alert-success" role="alert">
                    {!! Session('flash_message_success') !!}
                </div>
                @endif
                <div class="contact-form-right">
                    <h2>GET IN TOUCH</h2>
                    <p>If You Have Facing Any Trobule During Shopping. Please Write Us. We Will Solve Your Query As Soon
                        As Possible.</p>
                    <form action="{{url('/contactus')}}" method="post">{{csrf_field()}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Your Name" required data-error="Please enter your name">
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group">
                                    <input type="email" placeholder="Your Email" id="email" class="form-control"
                                        name="email" required data-error="Please enter your email">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="subject" name="subject"
                                        placeholder="Subject" required data-error="Please enter your Subject">
                                    <div class="help-block with-errors"></div>
                                </div>


                                <div class="form-group">
                                    <textarea class="form-control" id="message" name="message"
                                        placeholder="Your Message" rows="4" data-error="Write your message"
                                        required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <button class="btn btn-success" id="submit" type="submit">Send Message</button>
                            </div>
                            <div class="submit-button text-center">
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