@extends('layouts.app')

@section('title', 'Pelajar NU Krian - Website Resmi PAC IPNU IPPNU Krian')

@section('content')

{{-- hero section --}}
<div class="container hero-section">
    <div class="row align-items-center">
        <div class="hero-title col-md-6">
            <h1 class="title">
                <section>Pelajar NU Krian</section>, Website Resmi PAC IPNU IPPNU Krian
            </h1>
            <p class="description">Pimpinan Anak Cabang Ikatan Pelajar Nahdlatul Ulama - Ikatan Pelajar Putri Nahdlatul Ulama Kecamatan Krian.</p>
            <div class="button">
                <a href="{{ route('news') }}">Lihat Berita</a>
            </div>
        </div>

        <div class="hero-image col-md-6 d-flex justify-content-end">
            <img src="{{ asset('web/images/logo-pac.jpg') }}" alt="Hero Image" class="border rounded-circle">
        </div>
    </div>
</div>

{{-- category section --}}
<div class="container category-section">
    <div class="row justify-content-center">
        <h4 class="text-center">PAC IPNU IPPNU KRIAN</h4>
        <h1 class="text-center mt-1">Support By</h1>

        <div class="col-lg-3 col-md-6 col-sm-12 text-center d-flex justify-content-center">
            <div class="category-box pt-5">
                <img src="{{ asset('web/images/logo-nu.png') }}" alt="Category Image1" class="border rounded-circle">
                <h3>Nahdlatul Ulama</h3>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 text-center d-flex justify-content-center">
            <div class="category-box pt-5">
                <img src="{{ asset('web/images/logo-muslimat.png') }}" alt="Category Image2" class="border rounded-circle">
                <h3>Muslimat NU</h3>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 text-center d-flex justify-content-center">
            <div class="category-box pt-5">
                <img src="{{ asset('web/images/logo-ansor.png') }}" alt="Category Image3" class="border rounded-circle">
                <h3>GP Ansor</h3>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 text-center d-flex justify-content-center">
            <div class="category-box pt-5">
                <img src="{{ asset('web/images/logo-banser.png') }}" alt="Category Image4" class="border rounded-circle">
                <h3>Banser</h3>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
    <div class="col-lg-3 col-md-6 col-sm-12 text-center d-flex justify-content-center">
        <div class="category-box pt-5">
            <img src="{{ asset('web/images/logo-cbp.png') }}" alt="Category Image1" class="border rounded-circle">
            <h3>CBP</h3>
        </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 text-center d-flex justify-content-center">
            <div class="category-box pt-5">
                <img src="{{ asset('web/images/logo-kpp.png') }}" alt="Category Image2" class="border rounded-circle">
                <h3>KPP</h3>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 text-center d-flex justify-content-center">
            <div class="category-box pt-5">
                <img src="{{ asset('web/images/logo-mpk.png') }}" alt="Category Image3" class="border rounded-circle">
                <h3>MPK</h3>
            </div>
        </div>
    </div>
</div>

{{-- description section --}}
<div class="container description-section">
    <div class="row">
        <div class="description-image col-lg-6 col-md-12 d-flex justify-content-center">
            <img src="{{ asset('web/images/desc-image.jpeg') }}" alt="Description Image">
        </div>

        <div class="description-text col-lg-6 col-md-12">
            <h4>TENTANG PAC IPNU IPPNU KRIAN</h4>
            <h1 class="mt-1">PAC IPNU IPPNU Krian <br><span>itu apa sih?</span></h1>
            <p style="text-align: justify">“PAC IPNU IPPNU KRIAN  adalah rumah bagi para pelajar Nahdlatul Ulama di Krian — tempat tumbuh, belajar, dan berproses. Melalui semangat ke-NU-an, PAC IPNU IPPNU Krian hadir untuk membina generasi muda yang cerdas, berakhlak, dan siap memimpin. Kami aktif dalam kegiatan keagamaan, pendidikan, sosial, hingga pelestarian budaya, demi menciptakan pelajar yang tidak hanya unggul secara ilmu, tapi juga kokoh dalam iman dan tradisi.”</p>
            <img src="{{ asset('web/images/desc-detail-image.png') }}" alt="Description Detail Image">
        </div>
    </div>
</div>

@endsection