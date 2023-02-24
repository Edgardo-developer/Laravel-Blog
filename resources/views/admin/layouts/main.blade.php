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
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
            <div class="row">
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                      <div class="inner">
                        <h3>{{$data['users']}}</h3>

                        <p>Users</p>
                      </div>
                      <div class="icon">
                          <i class="fas fa-users"></i>
                      </div>
                      <a href="{{route('admin.user.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                      <div class="inner">
                        <h3>{{$data['posts']}}<sup style="font-size: 20px">%</sup></h3>

                        <p>Posts</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-newspaper"></i>
                      </div>
                      <a href="{{route('admin.post.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                      <div class="inner">
                        <h3>{{$data['categories']}}</h3>

                        <p>Category</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-th-list"></i>
                      </div>
                      <a href="{{route('admin.category.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                      <div class="inner">
                        <h3>{{$data['tags']}}</h3>

                        <p>Tags</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-tags"></i>
                      </div>
                      <a href="{{route('admin.tag.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                <!-- ./col -->
                </div>
      </div>
@endsection
