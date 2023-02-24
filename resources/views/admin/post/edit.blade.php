@extends('admin.main.index')
@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard v3</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.main')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.post.index')}}">Posts</a></li>
                <li class="breadcrumb-item active">Post</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
            <div class="col-5"><div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit post</h3>
              </div>
                    <!-- /.card-header -->
                    <!-- form start -->
              <form action="{{route('admin.post.edit', $post->id)}}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('patch')
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputText1">Name</label>
                    <input type="text" name="title" class="form-control" id="exampleInputText1" value="{{$post->title}}">
                      @error('title')
                        <div class="text-danger">{{$message}}</div>
                      @enderror
                  </div>
                    <div class="form-group">
                        <label for="summernote">Post Content</label>
                        <textarea name="content" id="summernote" style="height: 100px">{{$post->content}}</textarea>
                        @error('content')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Select Category</label>
                        <select class="custom-select" name="category_id">
                          @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                @if($category->id === $post->category_id)
                                    selected
                                @endif
                                >{{$category->title}}</option>
                          @endforeach
                        </select>
                            @error('category_id')
                            <p>{{$message}}</p>
                            @enderror
                      </div>
                    <div class="form-group">
                      <label>Choose tags</label>
                      <select class="select2" multiple="multiple"
                              data-placeholder="Select a State"
                              style="width: 100%;"
                              name="tag_ids[]">
                        @foreach($tags as $tag)
                              <option value="{{$tag->id}}"
                              @if(!is_null($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()))
                                  selected
                              @endif
                              >{{$tag->title}}</option>
                          @endforeach
                      </select>
                        @error('tag_ids')
                        <p>{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group w-50 d-flex flex-column">
                        <label for="exampleInputFile">Add preview</label>
                        @if($post->preview_image !== "")
                        <img src="{{url('storage/', $post->preview_image)}}" alt="" width="150" height="150" style="object-fit: cover">
                        @endif
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="preview_image" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">
                            </label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                          </div>
                        </div>
                        @error('preview_image')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group w-50 d-flex flex-column">
                        <label for="exampleInputFile">Add main photo</label>
                        @if($post->main_image !== "")
                        <img src="{{url('storage/', $post->main_image)}}" alt="" width="150" height="150" style="object-fit: cover">
                        @endif
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="main_image" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">
                            </label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                          </div>
                        </div>
                        @error('main_image')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                  <!-- /.card-body -->

                <div class="card-footer">
                    <input type="submit" class="btn btn-primary" placeholder="Submit">
                </div>
              </form>
            </div>
            </div>
      </div>
@endsection
