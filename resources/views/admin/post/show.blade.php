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
          <h3 class="card-title">Post</h3>

          @can('posts.create', Auth::user())
            <a style="margin-left: 45%;" class="btn btn-success" href="{{ route('post.create') }}">Add New</a>
          @endcan

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
          <div class="card-header">
                @include('includes.message')
            </div>
        </div>
     
             <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SI. No</th>
                  <th>Post Name</th>
                  <th>Post Title</th>
                  <th>Slug</th>
                  <th>Status</th>
                  <th>Created At</th>
                  @can('posts.update', Auth::user())
                  <th>Edit</th>
                  @endcan
                  @can('posts.delete', Auth::user())
                  <th>Delete</th>
                  @endcan
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)

                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $post->title }}</td>
                  <td>{{ $post->subtitle }}</td>
                  <td>{{ $post->slug }}</td>
                  <td>
                    @if ($post->status == 0) Not Published
                    @else Published
                    @endif
                  </td>
                  <td>{{ $post->created_at->diffForHumans() }}</td>

                  @can('posts.update', Auth::user())
                  <td><a href="{{ route('post.edit', $post->id) }}"><i class="fas fa-edit"></i></a></td>
                  @endcan

                  @can('posts.delete', Auth::user())
                  <td>
                    <form id="delete-form-{{ $post->id }}" method="post" action="{{ route('post.destroy', $post->id) }}" style="display:none">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    </form>

                    <a href=" {{ route('post.index') }} " onclick="
                      if(confirm('Are you sure to delete this?'))
                      { 
                        event.preventDefault();document.getElementById('delete-form-{{ $post->id }}').submit();
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
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
  <script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
  <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.js') }}"></script>
  
@endsection