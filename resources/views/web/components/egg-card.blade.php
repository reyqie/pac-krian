<div class="card gecko-card">
    <div id="carouselExampleIndicators{{ $ippnu->id }}" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
            @foreach ($ippnu->galleryIppnus as $index => $galleryIppnu)
            <button type="button" data-bs-target="#carouselExampleIndicators{{ $ippnu->id }}"
                data-bs-slide-to="{{ $index }}" class="{{ $loop->first ? 'active' : '' }}" aria-current="true"
                aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach ($ippnu->galleryIppnus as $galleryIppnu)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <a href="{{ Storage::url('ippnus/' . $galleryIppnu->url) }}">
                    <img src="{{ Storage::url('ippnus/' . $galleryIppnu->url) }}" alt="IPPNU Image">
                </a>
            </div>
            @endforeach
        </div>
    </div>



    <div class="id-number position-absolute align-items-center d-flex justify-content-center">
        <h1>{{ $ippnu->id }}</h1>
    </div>

    <div class="card-body">
        <div class="row mt-2">
            <div class="col-lg-12">
                <div style="background-color: #0e111e; border-radius: 5px; padding: 5px 10px; width: 130px;">
                    <p class="card-text">Nama Lengkap</p>
                </div>
                <p class=" text-capitalize ms-1 mt-2">{{ $ippnu->name }}</p>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-7 col-md-7 col-sm-7 col-7">
                <div style="background-color: #0e111e; border-radius: 5px; padding: 5px 10px; width: 78px;">
                    <p class="card-text">Jabatan</p>
                </div>
                <p class="text-capitalize ms-1 mt-2">{{ $ippnu->position }}</p>
            </div>

            <div class="col-lg-5 col-md-5 col-sm-5 col-5">
                <div style="background-color: #0e111e; border-radius: 5px; padding: 5px 10px; width: 88px;">
                    <p class="card-text">Kelahiran</p>
                </div>
                <p class="text-capitalize ms-1 mt-2">{{ \Carbon\Carbon::parse($ippnu->born)->translatedFormat('d M Y') }}</p>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-12">
                <div style="background-color: #0e111e; border-radius: 5px; padding: 5px 10px; width: 73px;">
                    <p class="card-text">Alamat</p>
                </div>
                <p class="text-capitalize ms-1 mt-2">{{ $ippnu->address }}</p>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-12 family text-center">
                <!-- <h5 class="card-title">Masa Khidmat</h5> -->
                <div style="background-color: #0e111e; border-radius: 50px; padding: 5px 10px; width: 120px; margin: 20px auto 0;">
                    <p class="card-text text-capitalize">{{ $ippnu->periode1 }} - {{ $ippnu->periode2 }}</p>
                </div>
            </div>
        </div>
    </div>
</div>