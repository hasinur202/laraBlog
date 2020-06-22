@extends('admin.layouts.app')

@section('main-content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.layouts.pagehead')

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">


        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Permission</h3>
              </div>


              @include('includes.message')
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('permission.update', $permission->id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="card-body">
                
                <div class="col-lg-6 mx-auto">
                  <div class="form-group">
                    <label for="name">Permission Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $permission->name }}">
                  </div>

                  <div class="form-group">
                    <label for="for">Permission for</label>
                    <select name="for" id="for" class="form-control">
                      @if($permission->for == 'user')
                        <option value="user" selected >User</option>
                        <option value="post">Post</option>
                        <option value="other">Other</option>

                      @elseif ($permission->for == 'post')
                        <option value="user">User</option>
                        <option value="post" selected >Post</option>
                        <option value="other">other</option>

                      @elseif ($permission->for == 'other')
                        <option value="user">User</option>
                        <option value="post">Post</option>
                        <option value="other" selected >Other</option>
                      @endif
                        
                    </select>
                    </div>

                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Update</button>
                      <a class="btn btn-warning" href="{{ route('permission.index') }}">Back</a>
                    </div>

                </div>


                
            </div>
          

                
              </form>
            </div>
          
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


@endsection