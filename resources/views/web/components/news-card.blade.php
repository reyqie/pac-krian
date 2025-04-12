@php
    use Illuminate\Support\Str;
@endphp

<div class="card news-card">
    <div id="carouselExampleIndicators{{ $new->id }}" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
            @foreach ($new->galleryNews as $index => $galleryNew)
            <button type="button" data-bs-target="#carouselExampleIndicators{{ $new->id }}"
                data-bs-slide-to="{{ $index }}" class="{{ $loop->first ? 'active' : '' }}" aria-current="true"
                aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach ($new->galleryNews as $galleryNew)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <a href="{{ Storage::url('news/' . $galleryNew->url) }}">
                    <img src="{{ Storage::url('news/' . $galleryNew->url) }}" alt="News Image">
                </a>
            </div>
            @endforeach
        </div>
    </div>

    <!-- <div class="id-number position-absolute align-items-center d-flex justify-content-center">
        <h1>{{ $new->id }}</h1>
    </div> -->

    <div class="card-body">
        <div class="row mt-2 ps-3 pe-3">
            <div class="col-lg-12">
                <h3 class=" text-capitalize ms-1 mt-2">{{ $new->title }}</h3>
            </div>
        </div>

        <div class="row mt-5 ps-3 pe-3">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <p class="text-capitalize ms-1 mt-2" style="text-indent: 2em; text-align: justify;">{{ Str::words($new->content, 30, '...') }}</p>
            </div>
        </div>

        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-auto ms-3 mb-3">
                <div style="background-color: #0e111e; margin-top: 10px; border-radius: 7px; padding: 5px 10px; display: inline-block;">
                    <a href="{{ route('news-details', $new->id) }}" style="text-decoration: none;">Baca Selengkapnya</a>
                </div>
            </div>

            <div class="col-auto me-3 mb-3 ms-3">
                <div style="background-color: #0e111e; margin-top: 10px; border-radius: 7px; padding: 3px 7px; display: inline-block; color: white;">
                    {{ \Carbon\Carbon::parse($new->date_event)->translatedFormat('d F Y') }}
                </div>
            </div>
        </div>
    </div>
</div>