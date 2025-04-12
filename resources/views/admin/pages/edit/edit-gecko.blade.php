@extends('layouts.dashboard')

@section('content')

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper" style="background-color: #252635">
        <div class="page-header">
            <h3 class="page-title text-white"> Edit Data IPNU </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-secondary"></a>Edit Data</li>
                    <li class="breadcrumb-item active text-white" aria-current="page">IPNU</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card" style="background-color: #161B2F">
                    <div class="card-body text-white">
                        <form class="forms-sample" method="POST"
                            action="{{ route('ipnu.update', ['ipnu' => $ipnu->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputName1">Nama Lengkap</label>
                                <input required type="text" name="name" class="form-control text-white"
                                    id="exampleInputName1" placeholder="Masukkan nama lengkap" value="{{ $ipnu->name }}"
                                    style="background-color: #0E111E; border: 3px solid #252635;">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Jabatan</label>
                                <input required type="text" name="position" class="form-control text-white"
                                    id="exampleInputName1" placeholder="Jabatan" value="{{ $ipnu->position }}"
                                    style="background-color: #0E111E; border: 3px solid #252635;">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputCity1">Kelahiran</label>
                                <input required type="text" name="born" class="form-control text-white"
                                    id="exampleInputCity1" placeholder="Tanggal Kelahiran" value="{{ $ipnu->born }}"
                                    style="background-color: #0E111E; border: 3px solid #252635;">
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Alamat</label>
                                <textarea required class="form-control text-white" name="address" id="exampleTextarea1"
                                    id="exampleTextarea1" rows="4"
                                    style="background-color: #0E111E; border: 3px solid #252635;" placeholder="Masukkan Alamat">{{ $ipnu->address }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputCity1">Masa Khidmat Tahun Awal</label>
                                <input required type="text" name="periode1" class="form-control text-white"
                                    id="exampleInputCity1" placeholder="Masukkan tahun awal jabatan" value="{{ $ipnu->periode1 }}"
                                    style="background-color: #0E111E; border: 3px solid #252635;">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputCity1">Masa Khidmat Tahun Akhir</label>
                                <input required type="text" name="periode2" class="form-control text-white"
                                    id="exampleInputCity1" placeholder="Masukkan tahun akhir jabatan" value="{{ $ipnu->periode2 }}"
                                    style="background-color: #0E111E; border: 3px solid #252635;">
                            </div>
                            <div class="form-group">
                                <label>Upload Gambar</label>
                                <input type="file" name="url[]" class="file-upload-default" id="profilePhotoInput"
                                    multiple>
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control text-white file-upload-info" disabled
                                        placeholder="Upload Gambar"
                                        style="background-color: #0E111E; border: 3px solid #252635;">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-gradient-primary py-3" type="button"
                                            onclick="document.getElementById('profilePhotoInput').click()">Upload</button>
                                    </span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                            <a href="{{ route('ipnu.index') }}" class="btn btn-light">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        @include('admin.partials.footer')
        <!-- partial -->
    </div>
</div>
<!-- main-panel ends -->
@endsection

@section('scripts')
<script>
    document.getElementById('profilePhotoInput').addEventListener('change', function() {
        var fileNames = [];
        for (var i = 0; i < this.files.length; i++) {
            fileNames.push(this.files[i].name);
        }
        document.querySelector('.file-upload-info').value = fileNames.join(', '); 
    });

    $(document).ready(function(){
        $('#exampleInputCity1').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
            language: 'id',
        });
    });

</script>
@endsection