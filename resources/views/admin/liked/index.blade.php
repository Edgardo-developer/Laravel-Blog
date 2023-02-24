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
              @if(isset($posts))
                  @foreach($posts as $post)
                      <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td class="d-flex align-items-center">
                            <a href="{{route('admin.post.show', $post->id)}}" class="col-1"><i class="far fa-eye"></i></a>
                            <a href="{{route('admin.post.edit', $post->id)}}" class="col-1"><i class="fas fa-edit"></i></a>
                            <form action="{{route('admin.post.delete', $post->id)}}" method="post" class="mb-0">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="post_id" value="{{$post->id}}">
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
        <!-- /.card -->
  </div>
</div>
