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
                  <h1>Edit Banner</h1>
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
                           <form class="col-sm-6" enctype="multipart/form-data" action="{{url('/admin/editbanner/'.$bannerDetail->banner_id)}}" method="post">{{csrf_field()}}
                              <div class="form-group">
                                 <label>Banner Name</label>
                                 <input type="text" class="form-control" value="{{$bannerDetail->name}}" name="banner_name" id="banner_name" required>
                              </div>
                              <div class="form-group">
                                 <label>Style</label>
                                 <input type="text" class="form-control" value="{{$bannerDetail->style}}" name="banner_style" id="banner_style" required>
                              </div>
                              <div class="form-group">
                                 <label>Sort Order</label>
                                 <input type="text" class="form-control" value="{{$bannerDetail->sort_order}}" name="sort_order" id="sort_order" required>
                              </div>
                              <div class="form-group">
                                 <label>Banner Content</label>
                                 <input type="text" class="form-control" value="{{$bannerDetail->content}}" name="banner_content" id="banner_content" required>
                              </div>
                              <div class="form-group">
                                 <label>Banner Image</label>
                                 <input type="file" name="image" id="image">
                                 <input type="hidden" name="current_image" value="{{$bannerDetail->image}}">
                                 <image src="{{asset('/uploads/banner/'.$bannerDetail->image)}}" style="width:250px;">
                              </div>
                              <div class="form-group">
                                 <label>Banner Link</label>
                                 <input type="text" class="form-control" value="{{$bannerDetail->link}}" name="banner_link" id="banner_link" required>
                              </div>
                                 <button type="submit" class="btn btn-success">Edit Banner</button>                         
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