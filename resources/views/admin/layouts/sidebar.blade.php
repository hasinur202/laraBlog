  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.home') }}" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Hasin's Blog</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item has-treeview menu-open">
              <li class="nav-item">
                <a href="{{ route('post.index') }}" class="nav-link"><i class="far fa-circle nav-icon"></i> Posts</a>
              </li>

              @can('posts.category',Auth::user())
              <li class="nav-item">
                <a href="{{ route('category.index') }}" class="nav-link"><i class="far fa-circle nav-icon"></i> Categories</a>
              </li>
              @endcan

              @can('posts.tag',Auth::user())
              <li class="nav-item">
                <a href="{{ route('tag.index') }}" class="nav-link"><i class="far fa-circle nav-icon"></i> Tags</a>
              </li>
              @endcan
              
              <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link"><i class="far fa-circle nav-icon"></i> Users</a>
              </li>
              @can('posts.role',Auth::user())
              <li class="nav-item">
                <a href="{{ route('role.index') }}" class="nav-link"><i class="far fa-circle nav-icon"></i> Roles</a>
              </li>
              @endcan

              @can('posts.permission',Auth::user())
              <li class="nav-item">
                <a href="{{ route('permission.index') }}" class="nav-link"><i class="far fa-circle nav-icon"></i> Permissions</a>
              </li>
              @endcan

          </li>

          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Layout Options
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
          </li>
      
       </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>