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
                <h3 class="card-title">
                    post details
                    <a href="{{route('admin.post.edit', $post->id)}}" class="col-1"><i class="fas fa-edit"></i></a>
                </h3>
              </div>
                    <table class="table table-hover text-nowrap">
                            <tr>
                                <th>ID</th>
                                <td>{{$post->id}}</td>
                            </tr>
                            <tr>
                                <th>Title</th>
                                <td>{{$post->title}}</td>
                            </tr>
                    </table>
            </div>
            </div>
      </div>
@endsection
