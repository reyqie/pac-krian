@extends('layouts.app')

@section('title', 'Data Pengurus Harian IPPNU')

@section('content')

{{-- title section--}}
<div class="container title-section">
    <div class="row">
        <div class="title col-md-6 col-sm-12">
            <h4>IPPNU</h4>
            <h1 class="mt-1">Data Pengurus Harian IPPNU</h1>
        </div>

        <div class="search col-md-6 col-sm-12 position-relative">
            <form action="{{ route('ippnu.search') }}" method="GET">
                <div class="input-group">
                    <i class="fas fa-search"></i>
                    <input type="text" name="query" id="search-query" class="form-control"
                        placeholder="Cari data ippnu..." aria-label="Search">
                </div>
            </form>
        </div>
    </div>
</div>

{{-- data egg section --}}
<div class="container data-gecko-section">
    <div class="row">
        @if($ippnus->isEmpty())
        <div class="col-12 text-center">
            @include('errors.empty-search')
        </div>
        @else
        @foreach ($ippnus as $ippnu)
        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 d-flex justify-content-center">
            @include('web.components.egg-card', compact('ippnu'))
        </div>
        @endforeach
        @endif
    </div>
</div>

@endsection