@extends ('admin.layouts.master');
@section('content')
 <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
         @if(Session::has('flash_meassage_success'))
            <div class="alert alert-success" role="alert">
             {!! Session('flash_meassage_success') !!}
            </div>
            @endif
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>Add Category</h1>
                  <small>Category list</small>
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
                           <form class="col-sm-6" action="{{url('/admin/addcategory')}}" method="post">{{csrf_field()}}
                              <div class="form-group">
                                 <label>Category Name</label>
                                 <input type="text" class="form-control" placeholder="Enter Category Name" name="category_name" id="category_name" required>
                              </div>
                              <div class="form-group">
                                 <label>Parent Category</label>
                                 <select name="parent_id" id="parent_id" class="form-control">
                                    <option value="0">Parent Category</option>
                                    @foreach($levels as $level)
                                    <option value="{{$level->id}}">{{$level->category_name}}</option>
                                    @endforeach
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label>Url</label>
                                 <input type="text" class="form-control" placeholder="Enter Category Url" name="category_url" id="category_url" required>
                              </div>
                              <div class="form-group">
                                 <label>Category Description</label>
                                 <textarea type="text" class="form-control" placeholder="Enter Category Description" name="category_desc" id="category_desc" required></textarea>
                              </div>
                                 <button type="submit" class="btn btn-success">Add Category</button>                         
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