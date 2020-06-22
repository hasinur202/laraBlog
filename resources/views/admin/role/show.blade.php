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
          <h3 class="card-title">Roles</h3>
          <a style="margin-left: 45%;" class="btn btn-success" href="{{ route('role.create') }}">Add New</a>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body">

        <div class="card">
          <div class="card-header">
                @include('includes.message')
            </div>

            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SI. No</th>
                  <th>Role Name</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)

                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $role->name }}</td>
                  <td><a href="{{ route('role.edit', $role->id) }}"><i class="fas fa-edit"></i></a></td>
                  <td>
                    <form id="delete-form-{{ $role->id }}" method="post" action="{{ route('role.destroy', $role->id) }}" style="display:none">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    </form>

                    <a href=" {{ route('role.index') }} " onclick="
                      if(confirm('Are you sure to delete this?'))
                      { 
                        event.preventDefault();document.getElementById('delete-form-{{ $role->id }}').submit();
                      }
                      else
                      {
                        event.preventDefault();
                      }"><i class="fas fa-trash-alt"></i></a>
                  </td>
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