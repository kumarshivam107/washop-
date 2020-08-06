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
                  <h1>Edit Category</h1>
                  <small>Category List</small>
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
                              <a class="btn btn-add " href="{{url('/admin/viewcategory')}}"> 
                              <i class="fa fa-list"></i>  Category List </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" action="{{url('/admin/editcategory/'.$categoryDetail->id)}}" method="post">{{csrf_field()}}
                           <div class="form-group">
                                 <label>Category Name</label>
                                 <input type="text" class="form-control" value="{{$categoryDetail->category_name}}" name="category_name" id="category_name" required>
                            </div>
                           <div class="form-group">
                                 <label>Parent Category</label>
                                 <select id="parent_category" name="parent_category" class="form-control">
                                <?php echo $dropdown ?>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label>Url</label>
                                 <input type="text" class="form-control" value="{{$categoryDetail->url}}" name="category_url" id="category_url" required>
                              </div>
                              <div class="form-group">
                                 <label>Category Description</label>
                                 <input type="text" class="form-control" value="{{$categoryDetail->description}}" name="category_desc" id="category_desc" required>
                              </div>   
                                 <button type="submit" class="btn btn-success">Edit Category</button>                         
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
