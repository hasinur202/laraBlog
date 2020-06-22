@extends('admin.layouts.app')
@section('headSection')
  <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
@endsection

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
                <h3 class="card-title">Update Post</h3>
              </div>

              @include('includes.message')

              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('post.update', $post->id)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
              
              <div class="card-body">
                <div class="col-lg-6 float-left">
                  <div class="form-group">
                    <label for="title">Post Titles</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
                  </div>

                  <div class="form-group">
                    <label for="subtitle">Post Sub Titles</label>
                    <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ $post->subtitle }}">
                  </div>

                  <div class="form-group">
                    <label for="slug">Post Slugs</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{ $post->slug }}">
                  </div>
                  @can('posts.publish', Auth::user())
                  <div class="form-check">
                      <input type="checkbox" name="status" class="form-check-input" id="exampleCheck1" value="1" @if ($post->status==1)
                        {{ 'checked' }}
                      @endif>
                      <label class="form-check-label" for="exampleCheck1">Publish</label>
                  </div>
                  @endcan
                </div>

     
                <div class="col-lg-6 float-right col px-md-5">
                  <div class="form-group" style="width: 50%;">
                      <label for="image">File input</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="image">
                            <label class="custom-file-label" for="image">Choose file</label>
                          </div>
                        </div>
                    </div>
                  
                    <div class="form-group">
                      <label>Select Category</label>
                      <select name="categories[]" class="select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                          @foreach ($post->categories as $postCat)
                            @if ($postCat->id == $category->id)
                          
                            selected
                          
                            @endif
                          @endforeach
                        >{{ $category->name }}</option>
                      @endforeach
                      </select>
                    </div>
                <!-- /.form-group -->

                  <div class="form-group">
                    <label>Select Tags</label>
                    <select name="tags[]" class="select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                    @foreach ($tags as $tag)
                      <option value="{{ $tag->id }}"
                          @foreach ($post->tags as $postTag)
                            @if ($postTag->id == $tag->id)
                          
                            selected
                          
                            @endif
                          @endforeach
                      >{{ $tag->name }}</option>
                    @endforeach
                    </select>
                  </div>
                </div>
                

                </div>
                <!-- /.card-body -->
                <div class="card card-outline card-info">
                  <div class="card-header">
                    <h3 class="card-title">
                      Write Post Body Here
                      <small>Simple and fast</small>
                    </h3>
                    <!-- tools box -->
                    <div class="card-tools">
                    <button type="button" class="btn btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      
                    </div>
                    <!-- /. tools -->
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body pad">
                    <textarea id="editor" class="textarea" placeholder="Place some text here" name="body" style="height: 200px; width: 100%; font-size: 16px; line-height: 18px; border: 1px solid #dddddd; padding:10px;">
                    {{ $post->body }}
                </textarea>
                  </div>
                </div>

            <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <a class="btn btn-warning" href="{{ route('post.index') }}">Back</a>
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
@section('footerSection')
<script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
  $(document).ready(function() {
      $('.select2').select2();
      $('.select2').select2();
  });
</script>

@endsection(