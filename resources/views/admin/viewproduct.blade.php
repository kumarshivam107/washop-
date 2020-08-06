@extends('admin.layouts.master');
@section('content');
   <body class="hold-transition sidebar-mini">
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>Product</h1>
                  <small>Product List</small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
            <div class="alert alert-success"  id="alertupdate" style="display:none" role="alert">
            Status Updated Successfully.
         </div>
               <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="#">
                                 <h4>View Product</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                 <a class="btn btn-add" href="{{url('/addproduct')}}"> <i class="fa fa-plus"></i> Add Product
                                 </a>  
                              </div>
                              
                           </div>
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>Id</th>
                                       <th>Product Name</th>
                                       <th>Category Id</th>
                                       <th>Product Code</th>
                                       <th>Product Color</th>
                                       <th>Description</th>
                                       <th>Image</th>
                                       <th>Price</th>
                                       <th>Feature Product</th>
                                       <th>Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 @foreach($products as $product)
                                    <tr>
                                       <th>{{$product->sno}}</th>
                                       <td>{{$product->product_name}}</td>
                                       <td>{{$product->parent_id}}</td>
                                       <td>{{$product->product_code}}</td>
                                       <td>{{$product->product_color}}</td>
                                       <td>{{$product->product_desc}}</td>
                                       @if(!empty($product->image))
                                       <td>
                                       <img src="{{asset('/uploads/products/'.$product->image)}}" alt="Product Image" style="width:100px;">
                                       </td>
                                       @endif                                     
                                       <td>{{$product->product_price}}</td>
                                       <td>
                               <input type="checkbox" class="featureStatus btn btn-success" rel="{{$product->sno}}"
                               data-toggle="toggle" data-on="Enabled" data-of="Disabled" data-onstyle="success" data-offstyle="danger"
                               @if($product['feature_product']=="1") checked @endif>
                               <div id="myElem" style="display:none;" class="alert alert-success">Status Enabled</div>
                               </td>
                                       <td>
                               <input type="checkbox" class="ProductStatus btn btn-success" rel="{{$product->sno}}"
                               data-toggle="toggle" data-on="Enabled" data-of="Disabled" data-onstyle="success" data-offstyle="danger"
                               @if($product['status']=="1") checked @endif>
                               <div id="myElem" style="display:none;" class="alert alert-success">Status Enabled</div>
                               </td>
                                       <td><a class="btn btn-warning" href="{{url('/editproduct/'.$product->sno)}}"><i class='fas fa-edit' style='font-size:16px'></i></a>
                                          <a class="btn btn-danger" href="{{url('/deleteproduct/'.$product->sno)}}"><i class="glyphicon glyphicon-trash"></i></a>
                                          <a class="btn btn-danger" href="{{url('/admin/addproductattribute/'.$product->sno)}}"><i class="fa fa-paperclip" style="font-size:16px"></i></a>
                                          <a class="btn btn-primary" href="{{url('/admin/addimage/'.$product->sno)}}"><i class='fas fa-camera' style='font-size:16px'></i></a>
                                       </td>
                                    </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
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
      <!-- ./wrapper -->
      <script src='https://kit.fontawesome.com/a076d05399.js'></script>
@endsection