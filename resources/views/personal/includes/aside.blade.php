<aside class="main-sidebar sidebar-dark-primary elevation-4 pt-3">

    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
            <a href="{{route('personal.index')}}" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
            <li class="nav-item">
                <a href="{{route('personal.liked.index')}}" class="nav-link">
                    <i class="nav-icon far fa-heart"></i>
                    <p>Likes</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('personal.comment.index')}}" class="nav-link">
                    <i class="nav-icon far fa-comment"></i>
                    <p>Comments</p>
                </a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar -->
  </aside>
