@extends('layouts.app')

@section('title', 'Details Berita Acara Kegiatan')

@section('content')

{{-- title section--}}
<div class="container title-section">
    <div class="row">
        <div class="title col-md-6 col-sm-12">
            <h4>BERITA ACARA</h4>
            <h1 class="mt-1">Data Berita Acara Kegiatan</h1>
        </div>

        <div class="search col-md-6 col-sm-12 position-relative">
            <form action="{{ route('news.search') }}" method="GET">
                <div class="input-group">
                    <i class="fas fa-search"></i>
                    <input type="text" name="query" class="form-control" placeholder="Cari data berita acara..."
                        aria-label="Search">
                </div>
            </form>
        </div>
    </div>
</div>

{{-- data news section --}}
<div class="container data-news-section">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 d-flex justify-content-center">
            @include('web.components.news-details-card', ['newDetail' => $newDetails])
        </div>
    </div>
</div>

{{-- data news section all --}}
<div class="container data-news-section">
    <div class="row">
        @foreach ($newsAll as $new)
        <div class="col-6 col-md-3 col-lg-3 d-flex justify-content-center">
            @include('web.components.news-card-all', compact('new'))
        </div>
        @endforeach
        </div>
    </div>
</div>

@endsection