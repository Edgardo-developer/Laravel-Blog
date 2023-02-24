@extends('personal.layouts.index')
@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard v3</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('personal.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Edit</li>
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
                <h3 class="card-title">Edit Category</h3>
              </div>
                    <!-- /.card-header -->
                    <!-- form start -->
              <form action="{{route('personal.comment.update', $comment->id)}}" method="post">
                  @csrf
                  @method('patch')
                <div class="card-body">
                  <div class="form-group">
                    <textarea name="message" class="form-control" style="width: 100%">{{ trim($comment->message) }}</textarea>
                      @error('message')
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
