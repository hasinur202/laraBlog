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
                <h3 class="card-title">Roles</h3>
              </div>


              @include('includes.message')
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('role.store') }}" method="post">
                {{ csrf_field() }}
                <div class="card-body">
                
                <div class="col-lg-6 mx-auto">
                  <div class="form-group">
                    <label for="name">Role Title</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Role Name">
                  </div>

                <div class="row">
                <div class="col-lg-4 float-left">
                  <label for="name">Posts Permissions</label>
                  @foreach ($permissions as $permission)
                    @if($permission->for == 'post')
                  <div class="checkbox">
                    <label><input type="checkbox" name="permission[]" value="{{ $permission->id }}"> {{ $permission->name }}</label>
                  </div>
                    @endif
                  @endforeach
                </div>
                <div class="col-lg-4 float-right">
                  <label for="name">User Permissions</label>
                  @foreach ($permissions as $permission)
                    @if($permission->for == 'user')
                  <div class="checkbox">
                    <label><input type="checkbox" name="permission[]" value="{{ $permission->id }}"> {{ $permission->name }}</label>
                  </div>
                    @endif
                  @endforeach
                </div>

                <div class="col-lg-4 float-right">
                  <label for="name">Other Permissions</label>
                  @foreach ($permissions as $permission)
                    @if($permission->for == 'other')
                  <div class="checkbox">
                    <label><input type="checkbox" name="permission[]" value="{{ $permission->id }}"> {{ $permission->name }}</label>
                  </div>
                    @endif
                  @endforeach
                </div>
                </div>

                
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-warning" href="{{ route('role.index') }}">Back</a>
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