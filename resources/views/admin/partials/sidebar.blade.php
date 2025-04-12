<nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color: #0E111E;">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a class="nav-link">
        <div class="nav-profile-image">
          <img src="{{ Storage::url('profile/' . Auth::user()->profile_photo_path) }}" alt="profile" />

          <span class="login-status online"></span>
          <!--change to offline or busy as needed-->
        </div>
        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold mb-2 text-secondary">{{ Auth::user()->name }}</span>
          <span class="text-secondary text-small">Super User</span>
        </div>
        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
      </a>
    </li>

    <br>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <span class="menu-title text-secondary">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#forms" aria-expanded="false" aria-controls="forms">
        <span class="menu-title text-secondary">Input Data</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-format-list-bulleted menu-icon"></i>
      </a>
      <div class="collapse" id="forms">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('ipnu.create') }}">Input Data IPNU</a>
            <a class="nav-link" href="{{ route('ippnu.create') }}">Input Data IPPNU</a>
            <a class="nav-link" href="{{ route('news.create') }}">Input Data Berita</a>
          </li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
        <span class="menu-title text-secondary">Tabel Data</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-table-large menu-icon"></i>
      </a>
      <div class="collapse" id="tables">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('ipnu.index') }}">Data IPNU</a>
            <a class="nav-link" href="{{ route('ippnu.index') }}">Data IPPNU</a>
            <a class="nav-link" href="{{ route('news.index') }}">Data Berita</a>
          </li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a href="{{ route('profile') }}" class="nav-link">
        <span class="menu-title text-secondary">Profil</span>
        <i class="mdi mdi-account menu-icon"></i>
      </a>
    </li>
  </ul>
</nav>