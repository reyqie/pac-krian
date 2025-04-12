<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Style Bootstrap 5.2.3 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    {{-- Font Style --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- styling css --}}
    <link rel="stylesheet" href="{{ asset('web/css/splash.css') }}">

    {{-- favicon --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    {{-- title name --}}
    <title>Pelajar NU Krian</title>
</head>

<body>
    <div class="container-fluid">
        <div class="container">
            <video autoplay loop muted plays-inline class="bg-video">
                <source src="web/images/splash-video.mp4" type="video/mp4">
            </video>

            <img src="{{ url("web/images/logo-pac.jpg") }}" alt="Logo PAC Krian" class="logo-image border border-primary rounded-circle">
            <div class="location-title text-light">
                <p class="d-inline-block me-3">Krian</p> 
                <img src="{{ url("web/images/circle_icon.png") }}" alt="Circle" class="circle-icon">
                <p class="d-inline-block ms-3 me-3">Sidoarjo</p>
                <img src="{{ url("web/images/circle_icon.png") }}" alt="Circle" class="circle-icon">
                <p class="d-inline-block ms-3 me-3">Jawa Timur</p>
            </div>

            <div class="name-title text-light">
                <p><span class="type"></span></p>
            </div>

            <div class="box-view">
                <a href="{{ route('welcome-animation') }}" class="text-light">Masuk <i class="fa-solid fa-chevron-right ms-3"></i></a>
            </div>

            <div class="box-redirect text-center">
                <div class="box-redirect-website d-inline-block me-4">
                    <a href="/" class="d-block text-dark title">Website Resmi</a>
                    <a href="/"><img src="{{ url("web/images/web_icon.png") }}" alt="Website Icon"></a>
                    <a href="/" class="desc">PAC IPNU IPPNU Krian</a>
                </div>
            </div>

            <div class="ordering">
                <div class="section-ordering">
                    <img src="{{ url("web/images/logo-ipnu.png") }}" alt="Offline Image"
                        class="d-inline-block offline-image">
                    <div class="text-ordering text-light d-inline-block mt-3">
                        <h6>IPNU</h6>
                        <p>Ikatan Pelajar Nahdlatul Ulama</p>
                    </div>
                </div>
                <div class="section-ordering">
                    <img src="{{ url("web/images/logo-ippnu.png") }}" alt="Online Image"
                        class="d-inline-block online-image">
                    <div class="text-ordering text-light d-inline-block mt-3">
                        <h6>IPPNU</h6>
                        <p>Ikatan Pelajar Putri Nahdlatul Ulama</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>

    <script>
        var typed = new Typed(".type", {
            strings: ["PELAJAR NU KRIAN"],
            typeSpeed: 100,
            loop: true,
            backSpeed: 100
        })
    </script>

    {{-- Bootstrap 5.2.5 JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>