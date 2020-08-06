@extends('admin.layouts.master')
@section('content')
<body class="hold-transition sidebar-mini">
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>Order History</h1>
                  <small>Order list</small>
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
                              <a>
                                 <h4>Order History</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                  
                              </div>
                           </div>
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>Order Id</th>
                                       <th>Custmor Name</th>
                                       <th>Custmor Email</th>
                                       <th>Product Id</th>
                                       <th>Product Name</th>
                                       <th>Product Size</th>
                                       <th>Quantity</th>
                                       <th>Total Ammount</th>
                                       <th>View Detail</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 @foreach($orderProduct as $orderProduct)
                                    <tr>
                                       <td>{{$orderProduct->order_id}}</td>
                                       <td>{{$orderProduct->user_id}}</td>
                                       <td>{{$orderProduct->user_email}}</td>
                                       <td>{{$orderProduct->product_id}}</td>
                                       <td>{{$orderProduct->product_name}}</td>
                                       <td>{{$orderProduct->product_size}}</td>
                                       <td>{{$orderProduct->quantity}}</td>
                                       <td>{{$orderProduct->total_ammount}}</td>
                                       <td><a class="btn btn-success">View Detail</button></td>
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
@endsection