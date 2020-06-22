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
                <h3 class="card-title">Update Admin</h3>
              </div>

              @include('includes.message')
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('user.update', $user->id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="card-body">
                
                <div class="col-lg-6 mx-auto">
                  <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="@if(old('name')){{ old('name') }}@else{{ $user->name }}@endif ">
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="@if(old('email')){{ old('email') }}@else{{ $user->email }}@endif ">
                  </div>

                  <div class="form-group">
                    <label for="phone">Phone No.</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="@if(old('phone')){{ old('phone') }}@else{{ $user->phone }}@endif">
                  </div>

                  <div class="form-group">
                      <div class="checkbox">
                        <label>Status <input style="margin-left:10px;" type="checkbox" name="status" value="1" 
                            @if (old('status') == 1 || $user->status == 1)
                                checked
                            @endif ></label>
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="assign_role">Assign Role</label>
                      <div class="checkbox">
                        @foreach ($roles as $role)
                        <label style="margin-right: 30px;">
                          <input  type="checkbox" name="role[]" value="{{ $role->id }}"
                          @foreach ($user->roles as $user_role)
                              @if ($user_role->id == $role->id)
                                  checked
                              @endif

                          @endforeach
                          > {{ $role->name}}
                        </label>
                        @endforeach
                      </div>
                  </div>
                
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a class="btn btn-warning" href="{{ route('user.index') }}">Back</a>
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