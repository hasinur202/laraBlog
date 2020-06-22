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
                <h3 class="card-title">Update Tag</h3>
              </div>


              @include('includes.message')
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('tag.update', $tag->id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="card-body">
                
                <div class="col-lg-6 mx-auto">
                  <div class="form-group">
                    <label for="name">Tag Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $tag->name }}">
                  </div>

                  <div class="form-group">
                    <label for="subtitle">Tag Slug</label>
                    <input type="text" class="form-control" id="subtitle" name="slug" value="{{ $tag->slug }}">
                  </div>
                
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a class="btn btn-warning" href="{{ route('tag.index') }}">Back</a>
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