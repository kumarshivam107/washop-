@extends('admin.layouts.master')
@section('content')

         <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
         @if(Session::has('flash_message_success'))
            <div class="alert alert-success" role="alert">
             {!! Session('flash_message_success') !!}
            </div>
            @endif
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>Edit Product</h1>
                  <small>Product list</small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add " href="{{url('/viewproduct')}}"> 
                              <i class="fa fa-list"></i>  Product List </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" enctype="multipart/form-data" action="{{url('/editproduct/'.$productDetail->sno)}}" method="post">{{csrf_field()}}
                           <div class="form-group">
                                 <label>Category</label>
                                 <select id="product_id" name="product_id" class="form-control">
                                    <?php echo $category_dropdown ?>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label>Product Name</label>
                                 <input type="text" class="form-control" value="{{$productDetail->product_name}}" name="product_name" id="product_name" required>
                              </div>
                              <div class="form-group">
                                 <label>Product Color</label>
                                 <input type="text" class="form-control" value="{{$productDetail->product_color}}" name="product_color" id="product_color" required>
                              </div>
                              <div class="form-group">
                                 <label>Product Code</label>
                                 <input type="text" class="form-control" value="{{$productDetail->product_code}}" name="product_code" id="product_code" required>
                              </div>
                              <div class="form-group">
                                 <label>Product Description</label>
                                 <textarea type="text" class="form-control" name="product_desc" id="product_desc" required>{{$productDetail->product_desc}}</textarea>
                              </div>
                              <div class="form-group">
                                 <label>Product Image</label>
                                 <input type="file" name="image">
                              </div>
                              <div class="form-group">
                                 <label>Price</label>
                                 <input type="text" class="form-control" value="{{$productDetail->product_price}}" name="product_price" id="product_price" required>
                              </div>       
                                 <button type="submit" class="btn btn-success">Save</button>                         
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
         <footer class="main-footer">
            <strong>Copyright &copy; 2016-2017 <a href="#">thememinister</a>.</strong> All rights reserved.
         </footer>
      </div>
@endsection