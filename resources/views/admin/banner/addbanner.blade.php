@extends ('admin.layouts.master');
@section('content')
 <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
         @if(Session::has('flash_message_error'))
            <div class="alert alert-success" role="alert">
             {!! Session('flash_message_error') !!}
            </div>
            @endif
            @if(Session::has('flash_message_errortwo'))
            <div class="alert alert-success" role="alert">
             {!! Session('flash_message_errortwo') !!}
            </div>
            @endif
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
                  <h1>Add Banner</h1>
                  <small>Banner list</small>
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
                              <a class="btn btn-add " href="{{url('/admin/viewbanner')}}"> 
                              <i class="fa fa-list"></i>  Banner List </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" enctype="multipart/form-data" action="{{url('/admin/addbanner')}}" method="post">{{csrf_field()}}
                              <div class="form-group">
                                 <label>Banner Name</label>
                                 <input type="text" class="form-control" placeholder="Enter Banner Name" name="banner_name" id="banner_name" required>
                              </div>
                              <div class="form-group">
                                 <label>Style</label>
                                 <input type="text" class="form-control" placeholder="Enter Banner Style" name="banner_style" id="banner_style" required>
                              </div>
                              <div class="form-group">
                                 <label>Sort Order</label>
                                 <input type="text" class="form-control" placeholder="Enter Sort Order" name="sort_order" id="sort_order" required>
                              </div>
                              <div class="form-group">
                                 <label>Banner Content</label>
                                 <input type="text" class="form-control" placeholder="Enter Banner Content Here" name="banner_content" id="banner_content" required>
                              </div>
                              <div class="form-group">
                                 <label>Banner Image</label>
                                 <input type="file" name="image">
                              </div>
                              <div class="form-group">
                                 <label>Banner Link</label>
                                 <input type="text" class="form-control" placeholder="Enter Banner Content Here" name="banner_link" id="banner_link" required>
                              </div>
                                 <button type="submit" class="btn btn-success">Add Banner</button>                         
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