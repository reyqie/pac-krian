<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row"
  style="background-color: #0E111E;">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start"
    style="background-color: #0E111E;">
    <a class="navbar-brand brand-logo" href="{{ route('dashboard') }}">
      <h4 class="fw-bold d-inline-block" style="color: #39db4a"><b>PELAJAR NU KRIAN</b></h4>
    </a>
    <a class="navbar-brand brand-logo-mini" href="{{ route('dashboard') }}"><img
        src="{{ asset('admin/images/logo-mini.svg') }}" alt="logo" /></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-stretch">
    <!-- <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button> -->
    <div class="search-field d-none d-md-block">
      <form class="d-flex align-items-center h-100" action="{{ route('search') }}" method="GET">
        <div class="input-group">
          <div class="input-group-prepend bg-transparent">
            <i class="input-group-text border-0 mdi mdi-magnify"></i>
          </div>
          <input type="text" name="query" class="form-control bg-transparent border-0 text-white"
            placeholder="Cari data....">
        </div>
      </form>
    </div>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown"
          aria-expanded="false">
          <div class="nav-profile-img">
            <img src="{{ Storage::url('profile/' . Auth::user()->profile_photo_path)}}" alt="image">
            <span class="availability-status online"></span>
          </div>
          <div class="nav-profile-text me-1">
            <p class="mb-1 text-white">{{ Auth::user()->name }}</p>
          </div>
        </a>
        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
          <a class="dropdown-item text-white bg-dark"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
            <i class="mdi mdi-logout me-2 text-primary"></i> Signout
          </a>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
      data-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>