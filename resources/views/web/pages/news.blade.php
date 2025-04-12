@extends('layouts.app')

@section('title', 'Berita Acara Kegiatan')

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
        @if($news->isEmpty())
        <div class="col-12 text-center">
            @include('errors.empty-search')
        </div>
        @else
        @foreach ($news as $new)
        <div class="col-12 col-md-6 col-lg-6 d-flex justify-content-center">
            @include('web.components.news-card', compact('new'))
        </div>
        @endforeach
        @endif
    </div>
    <br><br>
    <div class="d-flex justify-content-center">
        {{ $news->links() }}
    </div>
</div>

@endsection