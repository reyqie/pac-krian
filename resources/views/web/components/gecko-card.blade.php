<div class="card gecko-card">
    <div id="carouselExampleIndicators{{ $ipnu->id }}" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
            @foreach ($ipnu->galleryIpnus as $index => $galleryIpnu)
            <button type="button" data-bs-target="#carouselExampleIndicators{{ $ipnu->id }}"
                data-bs-slide-to="{{ $index }}" class="{{ $loop->first ? 'active' : '' }}" aria-current="true"
                aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach ($ipnu->galleryIpnus as $galleryIpnu)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <a href="{{ Storage::url('ipnus/' . $galleryIpnu->url) }}">
                    <img src="{{ Storage::url('ipnus/' . $galleryIpnu->url) }}" alt="Ipnu Image">
                </a>
            </div>
            @endforeach
        </div>
    </div>



    <div class="id-number position-absolute align-items-center d-flex justify-content-center">
        <h1>{{ $ipnu->id }}</h1>
    </div>

    <div class="card-body">
        <div class="row mt-2">
            <div class="col-lg-12">
                <div style="background-color: #0e111e; border-radius: 5px; padding: 5px 10px; width: 130px;">
                    <p class="card-text">Nama Lengkap</p>
                </div>
                <p class=" text-capitalize ms-1 mt-2">{{ $ipnu->name }}</p>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-7 col-md-7 col-sm-7 col-7">
                <div style="background-color: #0e111e; border-radius: 5px; padding: 5px 10px; width: 78px;">
                    <p class="card-text">Jabatan</p>
                </div>
                <p class="text-capitalize ms-1 mt-2">{{ $ipnu->position }}</p>
            </div>

            <div class="col-lg-5 col-md-5 col-sm-5 col-5">
                <div style="background-color: #0e111e; border-radius: 5px; padding: 5px 10px; width: 88px;">
                    <p class="card-text">Kelahiran</p>
                </div>
                <p class="text-capitalize ms-1 mt-2">{{ \Carbon\Carbon::parse($ipnu->born)->translatedFormat('d M Y') }}</p>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-12">
                <div style="background-color: #0e111e; border-radius: 5px; padding: 5px 10px; width: 73px;">
                    <p class="card-text">Alamat</p>
                </div>
                <p class="text-capitalize ms-1 mt-2">{{ $ipnu->address }}</p>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-12 family text-center">
                <!-- <h5 class="card-title">Masa Khidmat</h5> -->
                <div style="background-color: #0e111e; border-radius: 50px; padding: 5px 10px; width: 120px; margin: 20px auto 0;">
                    <p class="card-text text-capitalize">{{ $ipnu->periode1 }} - {{ $ipnu->periode2 }}</p>
                </div>
            </div>
        </div>
    </div>
</div>