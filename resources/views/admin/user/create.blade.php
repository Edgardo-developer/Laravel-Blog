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
                <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">Tags</a></li>
                <li class="breadcrumb-item active">User</li>
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
                <h3 class="card-title">Create User</h3>
              </div>
                    <!-- /.card-header -->
                    <!-- form start -->
              <form action="{{route('admin.user.store')}}" method="post">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputText1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputText1" placeholder="User name" value="{{old('name')}}">
                      @error('name')
                        <div class="text-danger">{{$message}}</div>
                      @enderror
                  </div>
                    <div class="form-group">
                    <label for="exampleInputText1">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputText1" placeholder="User email" value="{{old('email')}}">
                        @error('email')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                  </div>
                <div class="form-group">
                        <label>Select Category</label>
                        <select class="custom-select" name="role">
                          @foreach($roles as $role_id => $role)
                                <option value="{{$role_id}}">{{$role}}</option>
                          @endforeach
                        </select>
                      @error('category_id')
                            <p>{{$message}}</p>
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
