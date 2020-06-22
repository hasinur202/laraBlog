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
                <h3 class="card-title">Add Admin</h3>
              </div>


              @include('includes.message')
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('user.store') }}" method="post">
                {{ csrf_field() }}
                <div class="card-body">
                
                <div class="col-lg-6 mx-auto">
                  <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="User Name" value="{{ old('name') }}">
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                  </div>

                  <div class="form-group">
                    <label for="phone">Phone No.</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone number" value="{{ old('phone') }}">
                  </div>

                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{ old('password') }}">
                  </div>

                  <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                  </div>

                  <div class="form-group">
                      <div class="checkbox">
                        <label >Status <input style="margin-left:10px;" type="checkbox" name="status" 
                            @if(old('status') == 1)
                                checked
                            @endif
                        value="1"></label>
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="assign_role">Assign Role</label>
                      <div class="checkbox">
                        @foreach ($roles as $role)
                        <label style="margin-right: 30px;">
                          <input  type="checkbox" name="role[]" value="{{ $role->id }}"> {{ $role->name}}
                        </label>
                        @endforeach
                      </div>
                  </div>
                
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
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