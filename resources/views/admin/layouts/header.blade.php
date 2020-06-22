<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i style="margin-right:10px; font-size:20px;" class="fas fa-angle-down"></i>
        </a>

        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                 <b style="color:green;"> {{ Auth::user()->name }} </b>
                  <span class="float-right text-sm text-danger"><i style="color:blue;" class="fas fa-signal"></i></span>
                </h3>
                <p class="text-sm">
                    @foreach (Auth::user()->roles as $role)
                      {{ $role->name }} 
                    @endforeach
                </p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> Member Since: {{ Auth::user()->created_at->toFormattedDateString() }}</p>
              </div>
            </div>
            <!-- Message End -->
          </a>

          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
             Profile <i class="far fa-address-card mr-2 float-right"></i>
          </a>

          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
              Logout <i class="fas fa-sign-out-alt mr-2 float-right"></i>
          </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>  
        </div>
      </li>
    </ul>
  </nav>