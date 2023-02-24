@extends('personal.layouts.index')
@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Comments</h1>
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
                <div class="col-6 mt-3">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Responsive Hover Table</h3>

                        <div class="card-tools">
                          <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                              <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                        <!-- /.card-header -->
                      <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                          <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                          @if(isset($comments))
                              @foreach($comments as $comment)
                                  <tr>
                                    <td>{{$comment->id}}</td>
                                    <td>{{$comment->message}}</td>
                                    <td class="d-flex align-items-center">
                                        <a href="{{route('personal.comment.edit', $comment->id)}}" class="col-1"><i class="fas fa-edit"></i></a>
                                        <form action="{{route('personal.comment.delete', $comment->id)}}" method="post" class="mb-0">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                            <button type="submit" class="btn">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                              @endforeach
                          @endif
                          </tbody>
                        </table>
                      </div>
                        <!-- /.card-body -->
                    </div>
              </div>
            </div>
      </div>
@endsection
