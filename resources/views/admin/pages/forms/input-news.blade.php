@extends('layouts.dashboard')

@section('content')

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper" style="background-color: #252635">
        <div class="page-header">
            <h3 class="page-title text-white"> Input Berita Acara </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-secondary"></a>Input Data</li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Berita Acara</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card" style="background-color: #161B2F">
                    <div class="card-body text-white">
                        <form class="forms-sample" method="POST" action="{{ route('news.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Judul Berita</label>
                                <input required type="text" name="title" class="form-control text-white"
                                    id="exampleInputName1" placeholder="Masukkan judul berita"
                                    style="background-color: #0E111E; border: 3px solid #252635;">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputCity1">Tanggal Kegiatan</label>
                                <input required type="text" name="date_event" class="form-control text-white"
                                    id="exampleInputCity1" placeholder="Tanggal Kegiatan"
                                    style="background-color: #0E111E; border: 3px solid #252635;">
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Isi Konten</label>
                                <textarea required class="form-control text-white" name="content" id="exampleTextarea1"
                                    id="exampleTextarea1" rows="30"
                                    style="background-color: #0E111E; border: 3px solid #252635;" placeholder="Masukkan isi konten"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Upload Foto</label>
                                <input required type="file" name="url[]" class="file-upload-default"
                                    id="profilePhotoInput" multiple>
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