@extends('admin.layouts.app')

  @section('headSection')
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
  @endsection

@section('main-content')

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.layouts.pagehead')

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Users</h3>
          @can('users.create', Auth::user())
          <a style="margin-left: 45%;" class="btn btn-success" href="{{ route('user.create') }}">Add New</a>
          @endcan

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body">
          @include('includes.message')
        <div class="card">

            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SI. No</th>
                  <th>Users Name</th>
                  <th>Email</th>
                  <th>Assigned Roles</th>
                  <th>Status</th>
                  @can('users.update', Auth::user())
                  <th>Edit</th>
                  @endcan
                  @can('users.delete', Auth::user())
                  <th>Delete</th>
                  @endcan
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)

                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>
                      @foreach($user->roles as $role)
                        {{ $role->name }}, 
                      
                       @endforeach
                  </td>
                  <td>{{ $user->status? 'Active' : 'Not Active' }}</td>
                  
                  @can('users.update', Auth::user())
                  <td><a href="{{ route('user.edit', $user->id) }}"><i class="fas fa-edit"></i></a></td>
                  @endcan

                  @can('users.delete', Auth::user())
                  <td>
                    <form id="delete-form-{{ $user->id }}" method="post" action="{{ route('user.destroy', $user->id) }}" style="display:none">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    </form>

                    <a href=" {{ route('user.index') }} " onclick="
                      if(confirm('Are you sure to delete this?'))
                      { 
                        event.preventDefault();document.getElementById('delete-form-{{ $user->id }}').submit();
                      }
                      else
                      {
                        event.preventDefault();
                      }"><i class="fas fa-trash-alt"></i></a>
                  </td>
                  @endcan
                </tr>
              @endforeach
           
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
         
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>

@endsection
  

@section('footerSection')
  <script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
  <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.js') }}"></script>
  <script>
  $(function () {
    $("#example1").DataTable();
   
  });
</script>
@endsection