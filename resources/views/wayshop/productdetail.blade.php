@extends('wayshop.layouts.master')
@section('content')
<!-- Start All Title Box -->
<div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Shop Detail</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Shop Detail </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"> <img class="d-block w-100" src="{{asset('uploads/products/'.$productdetail->image)}}" alt="First slide"> </div>
                            @foreach($altimages as $altimage)
                            <div class="carousel-item"> <img class="d-block w-100" src="{{asset('uploads/altimages/'.$altimage->alt_image)}}" alt="Second slide"> </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev"> 
						<i class="fa fa-angle-left" aria-hidden="true"></i>
						<span class="sr-only">Previous</span> 
					</a>
                        <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next"> 
						<i class="fa fa-angle-right" aria-hidden="true"></i> 
						<span class="sr-only">Next</span> 
					</a>
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-1" data-slide-to="0" class="active">
                                <img class="d-block w-100 img-fluid" src="{{asset('uploads/products/'.$productdetail->image)}}" alt="" />
                            </li>
                            @foreach($altimages as $altimage)
                            <li data-target="#carousel-example-1" data-slide-to="0" class="active">
                                <img class="d-block w-100 img-fluid" src="{{asset('uploads/altimages/'.$altimage->alt_image)}}" alt="" />
                            </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                <form action="{{url('/addcart')}}" method="post">{{csrf_field()}}
                    <div class="single-product-details">
                    <input type="hidden" name="product_id" id="product_id" value="{{$productdetail->sno}}">
                    <input type="hidden" name="cart-name" id="cart-name" value="{{$productdetail->product_name}}">
                    <input type="hidden" name="cart-price" id="cart-price" value="{{$productdetail->product_price}}">
                    <input type="hidden" name="cart-image" id="cart-image" value="{{$productdetail->image}}">
                        <h2>{{$productdetail->product_name}}</h2>
                        <h5 id="productPrice"> <del>&#x20B9;{{1.5*$productdetail->product_price}}</del>&nbsp;&nbsp;&#x20B9; {{$productdetail->product_price}}</h5>
                        <p class="available-stock"><span> More than 20 available / <a href="#">8 sold </a></span>
                            <p>
                                <h4>Short Description:</h4>
                                <p>{{$productdetail->product_desc}}</p>
                                <ul>
                                    <li>
                                        <div class="form-group size-st">
                                            <label class="size-label">Size</label>
                                            <select id="selectsize" name="selectsize" class="form-control">
                                    @foreach($attribute as $attribute)
									<option value="{{$attribute->attribute_id}}">{{$attribute->size}}</option>
									@endforeach
								</select>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group quantity-box">
                                            <label class="control-label">Quantity</label>
                                            <input class="form-control" name="cart-quantity" id="cart-quantity" value="1" min="1" max="20" type="number">
                                        </div>
                                    </li>
                                </ul>

                                <div class="price-box-bar">
                                    <div class="cart-and-bay-btn">
                                        <button class="btn hvr-hover" data-fancybox-close="" type="submit">Add to cart</button>
                                    </div>
                                </div>

                                <div class="add-to-btn">
                                    <div class="add-comp">
                                        <a class="btn hvr-hover" href="#"><i class="fa fa-heart"></i> Add to wishlist</a>
                                        <a class="btn hvr-hover" href="#"><i class="fa fa-angle-double-up"></i> Add to Compare</a>
                                    </div>
                                    <div class="share-bar">
                                        <a class="btn hvr-hover" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                        <a class="btn hvr-hover" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a class="btn hvr-hover" href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                                        <a class="btn hvr-hover" href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                    </div>
                </form>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Featured Products</h1>
                    </div>
                    <div class="featured-products-box owl-carousel owl-theme">
                    @foreach($featureProduct as $featureProduct)
                        <div class="item">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <img src="{{asset('uploads/products/'.$featureProduct->image)}}" class="img-fluid" alt="Image">
                                    <div class="mask-icon">
                                        <ul>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="fa fa-heart"></i></a></li>
                                        </ul>
                                        <a class="cart" href="{{url('/')}}">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="why-text">
                                    <h4>{{$featureProduct->product_name}}</h4>
                                    <h5> &#x20B9;&nbsp;{{$featureProduct->product_price}}</h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
    <!-- End Cart -->
@endsection