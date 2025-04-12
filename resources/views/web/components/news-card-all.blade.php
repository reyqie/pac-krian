@php
    use Illuminate\Support\Str;
@endphp

<div class="card news-card-all">
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
        <div class="row mt-2 ps-1 pe-1">
            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                <h2 class=" text-capitalize ms-1 mt-2 card-title">{{ $new->title }}</h2>
            </div>
        </div>

        <div class="row ps-1 pe-1">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <p class="text-capitalize ms-1 mt-2" style="font-size: 8px; text-indent: 2em; text-align: justify;">{{ Str::words($new->content, 10, '...') }}</p>
            </div>
        </div>

        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-auto">
                <div style="font-size: 10px; background-color: #0e111e; border-radius: 7px; padding: 5px 10px; display: inline-block;">
                    <a href="{{ route('news-details', $new->id) }}" style="text-decoration: none;">Baca Selengkapnya</a>
                </div>
            </div>

            <div class="col-auto">
                <div style="font-size: 8px; background-color: #0e111e; margin-top: 5px; border-radius: 7px; padding: 3px 7px; display: inline-block;">
                    {{ \Carbon\Carbon::parse($new->date_event)->translatedFormat('d F Y') }}
                </div>
            </div>
        </div>
    </div>
</div>