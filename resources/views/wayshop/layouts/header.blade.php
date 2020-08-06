 <!-- Start Main Top -->
 <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">
                                <li>
                                <i class="fa fa-shopping-cart"></i> Off 10%! Shop Now Man
                                </li>
                                <li>
                                <i class="fa fa-shopping-cart"></i>50% - 80% off on Fashion
                                </li>
                                <li>
                                 <i class="fa fa-shopping-cart"></i> 20% off Entire Purchase Promo code: offT20
                                </li>
                                <li>
                                 <i class="fa fa-shopping-cart"></i> Off 50%! Shop Now
                                </li>
                                <li>
                                <i class="fa fa-shopping-cart"></i> Off 10%! Shop Now Man
                                </li>
                                <li>
                                <i class="fa fa-shopping-cart"></i> 50% - 80% off on Fashion
                                </li>
                                <li>
                                <i class="fa fa-shopping-cart"></i> 20% off Entire Purchase Promo code: offT20
                                </li>
                                <li>
                                <i class="fa fa-shopping-cart"></i> Off 50%! Shop Now
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="right-phone-box">
                        <p>Call US :- <a href="#">+91 8986344241</a></p>
                    </div>
                    <div class="our-link">
                        <ul>
                        @if(empty(Auth::check()))
                        <li><a href="{{url('/login-register')}}">Login</a></li>
                        <li><a href="{{url('/admin')}}">Admin Login</a></li>
                        @else
                            <li><a href="{{url('/myaccount')}}">My Account</a></li>
                            <li><a href="{{url('/userlogout')}}">Logout</a></li>
                        @endif
                            <li><a href="#">our Services</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="index.html"><img src="{{asset('frontend/images/logo.png')}}" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="{{url('/')}}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{url('/aboutus')}}">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{url('/contactus')}}">Contact Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{url('/cart')}}">Cart</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->