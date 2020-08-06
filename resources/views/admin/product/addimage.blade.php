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
                  <h1>Add Image</h1>
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
                        <div class="form-group">
                                 <label>Product Name&nbsp;&nbsp;:</label>{{$productDetail->product_name}}
                              </div>
                              <div class="form-group">
                                 <label>Product Color&nbsp;&nbsp;:</label>{{$productDetail->product_color}}
                              </div>
                              <div class="form-group">
                                 <label>Product Code&nbsp;&nbsp;:</label>{{$productDetail->product_code}}
                              </div>
                           <form class="col-sm-6" enctype="multipart/form-data" action="{{url('/admin/addimage/'.$productDetail->sno)}}" method="post">{{csrf_field()}}
                              <div class="form-group">
                                 <label>Add Alternative Image</label>
                                <input type="file" name="image[]" class="form-control"  multiple="multiple">
                              </div>
                                 <button type="submit" class="btn btn-success">Save</button>                         
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="#">
                                 <h4>Add customer</h4>
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
                                       <th>Product Id</th>
                                       <th>Images</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 @foreach($altimage as $altimage)
                                    <tr>
                                       <th>{{$altimage->altimage_id}}</th>
                                       <td>{{$altimage->product_id}}</td>
                                       @if(!empty($altimage->alt_image))
                                       <td>
                                       <img src="{{asset('/uploads/altimages/'.$altimage->alt_image)}}" alt="Product Image" style="width:100px;">
                                       </td>
                                       @endif
                                       <td>
                                          <a class="btn btn-danger" href="{{url('/admin/delete-alt-image/'.$altimage->altimage_id)}}"><i class="glyphicon glyphicon-trash"></i></a>
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
@endsection