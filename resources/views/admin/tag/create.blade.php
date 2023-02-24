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
                <li class="breadcrumb-item"><a href="{{route('admin.tag.index')}}">Tags</a></li>
                <li class="breadcrumb-item active">Create</li>
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
                <h3 class="card-title">Create tag</h3>
              </div>
                <!-- /.card-header -->
                <!-- form start -->
              <form action="{{route('admin.tag.store')}}" method="post">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputText1">Name</label>
                    <input type="text" name="tagName" class="form-control" id="exampleInputText1" placeholder="tag name">
                      @error('tagName')
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
