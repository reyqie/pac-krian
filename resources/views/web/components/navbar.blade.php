<nav class="navbar navbar-expand-lg navbar-dark sticky-top pt-3 pb-3">
    <div class=" container">
        <a class="navbar-brand" href="/">
             <h4 class="fw-bold" style="color: #39db4a">PELAJAR NU KRIAN</h4>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mx-auto mb-2 mb-lg-0 ">
                <li class="nav-item active">
                    <a class="nav-link me-5" style="{{ Route::is('home') ? 'color: #39db4a' : 'color: #ffffff' }}" aria-current="page"
                        href="{{ route('home') }}">Beranda</a>
                </li>
                <a class="nav-link me-5" style="{{ Route::is('ipnu') ? 'color: #39db4a' : 'color: #ffffff' }}"
                    href="{{ route('ipnu') }}">IPNU</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-5" style="{{ Route::is('ippnu') ? 'color: #39db4a' : 'color: #ffffff' }}"
                        href="{{ route('ippnu') }}">IPPNU</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="{{ Route::is('news') ? 'color: #39db4a' : 'color: #ffffff' }}" href="{{ route('news') }}">Berita Acara</a>
                </li>
            </ul>

            <div class="btn-call">
                <a href="https://instagram.com/pac_ipnuippnu_krian" target="_blank">
                    <i class="fab fa-instagram"></i>&nbsp;
                    Instagram
                </a>
            </div>
        </div>
    </div>
</nav>