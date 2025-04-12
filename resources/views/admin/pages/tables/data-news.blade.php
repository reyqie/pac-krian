@extends('layouts.dashboard')

@section('content')

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper" style="background-color: #252635">
        <div class="page-header">
            <h3 class="page-title text-white"> Tabel Berita Acara </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-secondary"><a>Tabel</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Berita Acara</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card" style="background-color: #161B2F">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="card-title text-white">Berita Acara</h4>
                            <a href="{{ route('news.export') }}" class="btn btn-success">
                                <i class="fa fa-file-excel"></i> Export to Excel
                            </a>
                        </div>
                        <br>
                        <table class="table table-striped" style="table-layout: fixed width: 100%;">
                            <thead>
                                <tr class="text-center">
                                    <th class="text-white"
                                        style="width: 10%; background-color: #161B2F; border: 3px solid #252635;"> ID </th>
                                    <th class="text-white"
                                        style="width: 20%; background-color: #161B2F; border: 3px solid #252635;"> Judul Berita </th>
                                    <th class="text-white"
                                        style="width: 60%; background-color: #161B2F; border: 3px solid #252635;"> Isi Konten </th>
                                    <th class="text-white"
                                        style="width: 10%; background-color: #161B2F; border: 3px solid #252635;"> Gambar </th>
                                    <th class="text-white"
                                        style="width: 10%; background-color: #161B2F; border: 3px solid #252635;"> Aksi </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($news as $new)
                                <tr class="text-center">
                                    <td class="py-1 text-white"
                                        style="width: 10%; font-size: 12px; background-color: #161B2F; border: 3px solid #252635;">
                                        {{ $new->id }}
                                    </td>
                                    <td class="text-capitalize text-white text-wrap"
                                        style="font-size: 12px; line-height: 1.7;  background-color: #161B2F; border: 3px solid #252635;">
                                        {{ $new->title }}
                                    </td>
                                    <td class="text-capitalize text-white text-white text-wrap"
                                        style="font-size: 12px; background-color: #161B2F; border: 3px solid #252635; text-align: left;">
                                        {{ $new->content }}
                                    </td>
                                    <!-- <td class="text-white"
                                        style="font-size: 12px; background-color: #161B2F; border: 3px solid #252635;">
                                        {{ \Carbon\Carbon::parse($new->born)->translatedFormat('d M Y') }}
                                    </td> -->
                                    <td style="background-color: #161B2F; border: 3px solid #252635;">
                                        <div class="d-flex flex-column align-items-center">
                                            @foreach ($new->galleryNews as $galleryNew)
                                            <img class="d-block mb-2"
                                                src="{{ Storage::url('news/' . $galleryNew->url) }}" alt="Image"
                                                width="100">
                                            @endforeach
                                        </div>
                                    </td>

                                    <td style="background-color: #161B2F; border: 3px solid #252635;">
                                        <div class="d-flex flex-column">
                                            <form action="{{ route('news.edit', ['news' => $new->id]) }}"
                                                method="GET">
                                                <button type="submit"
                                                    class="btn btn-gradient-dark btn-icon-text mb-2 ps-4 pe-4">
                                                    <i class="mdi mdi-file-check btn-icon-prepend"></i>Edit
                                                </button>
                                            </form>
                                            <form id="delete-form-{{ $new->id }}"
                                                action="{{ route('news.destroy', $new->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    class="btn btn-gradient-danger btn-icon-text ps-3 pe-3"
                                                    onclick="confirmDelete({{ $new->id }})">
                                                    <i class="mdi mdi-delete btn-icon-prepend"></i>Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <br><br>
                        <div class="d-flex justify-content-center">
                            {{ $news->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- partial:../../partials/_footer.html -->
        @include('admin.partials.footer')
        <!-- partial -->
    </div>
    <!-- content-wrapper ends -->
</div>
<!-- main-panel ends -->
@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(id) {
    Swal.fire({
        title: 'Anda yakin?',
        text: 'Ingin menghapus data ini?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Hapus',
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
            Swal.fire('Terhapus!', '', 'Sukses');
        } 
    });
    }
</script>