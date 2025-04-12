@extends('layouts.dashboard')

@section('content')

<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper" style="background-color: #252635;">
    <div class="page-header">
      <h3 class="page-title text-white">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-home"></i>
        </span> Dashboard
      </h3>
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item active text-white" aria-current="page">
            <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
          </li>
        </ul>
      </nav>
    </div>
    <div class="row">
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
          <div class="card-body">
            <img src="{{ asset('admin/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Total Data IPNU<i
                class="mdi mdi-chart-line mdi-24px float-end"></i>
            </h4>
            <h2 class="mb-5">{{ $ipnus }}</h2>
            <h6 class="card-text">Data Terupdate</h6>
          </div>
        </div>
      </div>
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
          <div class="card-body">
            <img src="{{ asset('admin/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Total Data IPPNU<i
                class="mdi mdi-bookmark-outline mdi-24px float-end"></i>
            </h4>
            <h2 class="mb-5">{{ $ippnus }}</h2>
            <h6 class="card-text">Data Terupdate</h6>
          </div>
        </div>
      </div>
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
          <div class="card-body">
            <img src="{{ asset('admin/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Total Semua Data<i class="mdi mdi-diamond mdi-24px float-end"></i>
            </h4>
            <h2 class="mb-5">{{ $totalData }}</h2>
            <h6 class="card-text">Data IPNU & IPPNU</h6>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card" style="background-color: #161B2F">
          <div class="card-body">
            <h4 class="card-title text-white">Data IPNU Ditambahkan</h4>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr class="text-center">
                    <th class="text-white" style="background-color: #161B2F;"> Foto </th>
                    <th class="text-white" style="background-color: #161B2F;"> Nama </th>
                    <th class="text-white" style="background-color: #161B2F;"> Jabatan </th>
                    <th class="text-white" style="background-color: #161B2F;"> Kelahiran </th>
                    <th class="text-white" style="background-color: #161B2F;"> Alamat </th>
                    <th class="text-white" style="background-color: #161B2F;"> Periode </th>
                    <th class="text-white" style="background-color: #161B2F;"> Status </th>
                    <th class="text-white" style="background-color: #161B2F;"> Waktu </th>
                  </tr>
                </thead>
                <br><br>
                <tbody>
                  @foreach ($latestIpnus as $ipnu)
                  <tr>
                    <td class="text-center" style="background-color: #161B2F; border: 3px solid #252635;">
                      @foreach ($ipnu->galleryIpnus as $galleryIpnu)
                        <img src="{{ Storage::url('ipnus/' . $galleryIpnu->url) }}" class="me-2" alt="image">
                      @endforeach
                    </td>
                    <td class="text-capitalize text-white text-wrap"
                      style="font-size: 12px; background-color: #161B2F; border: 3px solid #252635;">
                      {{ $ipnu->name }}
                    </td>
                    <td class="text-capitalize text-white text-wrap"
                      style="font-size: 12px; background-color: #161B2F; border: 3px solid #252635;">
                      {{ $ipnu->position }}
                    </td>
                    <td class="text-capitalize text-white text-wrap"
                      style="font-size: 12px; background-color: #161B2F; border: 3px solid #252635;">
                      {{ $ipnu->born }}
                    </td>
                    <td class="text-capitalize text-white text-wrap"
                      style="font-size: 12px; background-color: #161B2F; border: 3px solid #252635;">
                      {{ $ipnu->address }}
                    </td>
                    <td class="text-capitalize text-white text-wrap"
                      style="font-size: 12px; background-color: #161B2F; border: 3px solid #252635;">
                      {{ $ipnu->periode1 }} - {{ $ipnu->periode2 }}
                    </td>
                    <td class="text-center" style="background-color: #161B2F; border: 3px solid #252635;">
                      <label class="badge badge-gradient-success">Terbaru</label>
                    </td>
                    <td class="text-center text-white" style="background-color: #161B2F; border: 3px solid #252635;"> {{
                      $ipnu->created_at->diffForHumans() }}
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card" style="background-color: #161B2F">
          <div class="card-body">
            <h4 class="card-title text-white">Data IPPNU Ditambahkan</h4>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr class="text-center">
                    <th class="text-white" style="background-color: #161B2F"> Foto </th>
                    <th class="text-white" style="background-color: #161B2F"> Nama </th>
                    <th class="text-white" style="background-color: #161B2F"> Jabatan </th>
                    <th class="text-white" style="background-color: #161B2F"> Kelahiran </th>
                    <th class="text-white" style="background-color: #161B2F"> Alamat </th>
                    <th class="text-white" style="background-color: #161B2F"> Periode </th>
                    <th class="text-white" style="background-color: #161B2F"> Status </th>
                    <th class="text-white" style="background-color: #161B2F"> Waktu </th>
                  </tr>
                </thead>
                <br><br>
                <tbody>
                  @foreach ($latestIppnus as $ippnu)
                  <tr>
                    <td class="text-center" style="background-color: #161B2F; border: 3px solid #252635;">
                      @foreach ($ippnu->galleryIppnus as $galleryIppnu)
                        <img src="{{ Storage::url('ippnus/' . $galleryIppnu->url) }}" class="me-2" alt="image">
                      @endforeach
                    </td>
                    <td class="text-capitalize text-white text-wrap"
                      style="font-size: 12px; background-color: #161B2F; border: 3px solid #252635;">
                      {{ $ippnu->name }}
                    </td>
                    <td class="text-capitalize text-white text-wrap"
                      style="font-size: 12px; background-color: #161B2F; border: 3px solid #252635;">
                      {{ $ippnu->position }}
                    </td>
                    <td class="text-capitalize text-white text-wrap"
                      style="font-size: 12px; background-color: #161B2F; border: 3px solid #252635;">
                      {{ $ippnu->born }}
                    </td>
                    <td class="text-capitalize text-white text-wrap"
                      style="font-size: 12px; background-color: #161B2F; border: 3px solid #252635;">
                      {{ $ippnu->address }}
                    </td>
                    <td class="text-capitalize text-white text-wrap"
                      style="font-size: 12px; background-color: #161B2F; border: 3px solid #252635;">
                      {{ $ippnu->periode1 }} - {{ $ippnu->periode2 }}
                    </td>
                    <td class="text-center" style="background-color: #161B2F; border: 3px solid #252635;">
                      <label class="badge badge-gradient-success">Terbaru</label>
                    </td>
                    <td class="text-center text-white" style="background-color: #161B2F; border: 3px solid #252635;"> {{
                      $ippnu->created_at->diffForHumans() }} </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- partial:partials/_footer.html -->
    @include('admin.partials.footer')
    <!-- partial -->
  </div>
  <!-- content-wrapper ends -->
</div>
<!-- main-panel ends -->

@endsection