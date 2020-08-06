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
            @if(Session::has('flash_message_error'))
            <div class="alert alert-danger" role="alert">
             {!! Session('flash_message_error') !!}
            </div>
            @endif
            @if(Session::has('flash_message_errortwo'))
            <div class="alert alert-danger" role="alert">
             {!! Session('flash_message_errortwo') !!}
            </div>
            @endif
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>Add Product Attribute</h1>
                  <small>Product Attribute list</small>
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
                              <a class="btn btn-add " href="{{url('/viewproductattribute')}}"> 
                              <i class="fa fa-list"></i>  Product Attribute List </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                              <div class="form-group">
                                 <label>Product Name&nbsp;&nbsp;:</label>{{$product->product_name}}
                              </div>
                              <div class="form-group">
                                 <label>Product Color&nbsp;&nbsp;:</label>{{$product->product_color}}
                              </div>
                              <div class="form-group">
                                 <label>Product Code&nbsp;&nbsp;:</label>{{$product->product_code}}
                              </div>
                              <form  class="form-inline"action="{{url('/admin/addproductattribute/'.$product->sno)}}" method="post">{{csrf_field()}}
                              <input type="hidden" class="from-control" id="product_id" name="product_id" value="{{$product->sno}}">
                                 <input type="text" class="form-control mb-2 mr-sm-2" id="sku" name="sku" placeholder="SKU">
                                 <input type="text" class="form-control mb-2 mr-sm-2" id="size" name="size" placeholder="SIZE">
                                 <input type="text" class="form-control mb-2 mr-sm-2" id="price" name="price" placeholder="PRICE">
                                 <input type="text" class="form-control mb-2 mr-sm-2" id="stock" name="stock" placeholder="STOCK">
                                 <br><br>
                                 <button type="submit" class="btn btn-success">Add Attribute</button>                         
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
 <!--*********** View Product Attributes Starts Here**********************-->
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
                              <button class="btn btn-exp btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Table Data</button>
                              <ul class="dropdown-menu exp-drop" role="menu">
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'json',escape:'false'});"> 
                                    <img src="assets/dist/img/json.png" width="24" alt="logo"> JSON</a>
                                 </li>
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});">
                                    <img src="assets/dist/img/json.png" width="24" alt="logo"> JSON (ignoreColumn)</a>
                                 </li>
                                 <li><a href="#" onclick="$('#dataTableExample1').tableExport({type:'json',escape:'true'});">
                                    <img src="assets/dist/img/json.png" width="24" alt="logo"> JSON (with Escape)</a>
                                 </li>
                                 <li class="divider"></li>
                                 <li><a href="#" onclick="$('#dataTableExample1').tableExport({type:'xml',escape:'false'});">
                                    <img src="assets/dist/img/xml.png" width="24" alt="logo"> XML</a>
                                 </li>
                                 <li><a href="#" onclick="$('#dataTableExample1').tableExport({type:'sql'});"> 
                                    <img src="assets/dist/img/sql.png" width="24" alt="logo"> SQL</a>
                                 </li>
                                 <li class="divider"></li>
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'csv',escape:'false'});"> 
                                    <img src="assets/dist/img/csv.png" width="24" alt="logo"> CSV</a>
                                 </li>
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'txt',escape:'false'});"> 
                                    <img src="assets/dist/img/txt.png" width="24" alt="logo"> TXT</a>
                                 </li>
                                 <li class="divider"></li>
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'excel',escape:'false'});"> 
                                    <img src="assets/dist/img/xls.png" width="24" alt="logo"> XLS</a>
                                 </li>
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'doc',escape:'false'});">
                                    <img src="assets/dist/img/word.png" width="24" alt="logo"> Word</a>
                                 </li>
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'powerpoint',escape:'false'});"> 
                                    <img src="assets/dist/img/ppt.png" width="24" alt="logo"> PowerPoint</a>
                                 </li>
                                 <li class="divider"></li>
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'png',escape:'false'});"> 
                                    <img src="assets/dist/img/png.png" width="24" alt="logo"> PNG</a>
                                 </li>
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});"> 
                                    <img src="assets/dist/img/pdf.png" width="24" alt="logo"> PDF</a>
                                 </li>
                              </ul>
                           </div>
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>Attribute Id</th>
                                       <th>Product Id</th>
                                       <th>SKU</th>
                                       <th>SIZE</th>
                                       <th>Price</th>
                                       <th>Stock</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 @foreach($attributes as $attribute)
                                    <tr>
                                       <th>{{$attribute->attribute_id}}</th>
                                       <td>{{$attribute->product_id}}</td>
                                       <form action="{{url('/admin/editattribute/'.$attribute->attribute_id)}}" method="post">{{csrf_field()}}
                                       <td><input name="upsku" id="upsku" value="{{$attribute->sku}}"></td>
                                       <td><input name="upsize" id="upsize" value="{{$attribute->size}}"></td>
                                       <td><input name="upprice" id="upprice" value="{{$attribute->price}}"></td>
                                       <td><input name="upstock" id="upstock" value="{{$attribute->stock}}"></td>
                                       <td><input type="submit" value="update" class="btn btn-warning"><a href="{{url('/admin/deleteattribute/'.$attribute->attribute_id)}}" class="btn btn-danger">Delete</a></td>
                                       </form>
                                    </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
   <!--*********** View Product Attributes Starts Here**********************-->
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
         <footer class="main-footer">
            <strong>Copyright &copy; 2016-2017 <a href="#">thememinister</a>.</strong> All rights reserved.
         </footer>
      </div>
@endsection
