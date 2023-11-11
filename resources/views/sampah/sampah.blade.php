@extends('layout.template')

@section('container')
    <div class="pagetitle">
        <h1>Kalkulator Bank Sampah</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item active">Kalkulator Bank Sampah</li>
            </ol>
        </nav>
    </div>
    <a href="/tambahsampah" class="btn btn-primary btn-sm mb-3 custom-button"><i class="bi bi-folder-plus"></i> Tambah
        Sampah</a>
    <div class="pagetitle">
        <div class="card">
            <div class="card-body mt-2">
                <!-- Page Title -->
                <div class="pagetitle">
                    <h1 class="mb-1 text-center">Data Sampah</h1>
                    <h6 class="text-center">Sampah yang ada</h6>
                </div>
                <!-- End Page Title -->
                <!-- Search Bar -->
                <div class="search-bar row g-3 justify-content-center mt-2" data-aos="fade-up">
                    <div class="col-auto">
                        <form class="search-form" action="/sampah" method="get">
                            <div class="input-group">
                                <input type="search" class="form-control" name="search" id="exampleFormControlInput1"
                                    placeholder="Ketik Nama Sampah">
                                <button type="submit" class="btn btn-info"><i class="bi bi-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="col-auto">
                        <a href="/sampah" type="button" class="btn btn-info"><i class="bi bi-arrow-repeat"></i></a>
                    </div>
                </div>
                <!-- End Search -->

                <div class="card-title text-center">
                    <!-- Kategori Tombol -->
                    <div class="text-center">
                        <button type="button" class="btn btn-info" data-filter="all">All</button>
                        <button type="button" class="btn btn-info" data-filter="Kertas">Kertas</button>
                        <button type="button" class="btn btn-info" data-filter="Plastik">Plastik</button>
                        <button type="button" class="btn btn-info" data-filter="Logam">Logam</button>
                        <button type="button" class="btn btn-info" data-filter="Kaca">Kaca</button>
                    </div>

                </div>

                <!-- List Data Sampah -->
                <div class="row mt-4" id="sampahContainer">
                    @foreach ($dataSampah as $sampah)
                        <div class="col-md-3">
                            <div class="card mb-3">
                                <img src="{{ asset('storage/gambar_sampah/' . $sampah->gambar) }}"
                                    alt="{{ $sampah->nama_sampah }}" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $sampah->nama_sampah }}</h5>
                                    <p class="card-text">{{ $sampah->jenis_sampah }}</p>
                                    <a href="#" class="btn btn-primary" btn-sm data-bs-toggle="modal"
                                        data-bs-target="#detailModal{{ $sampah->id }}">
                                        Detail
                                    </a>
                                    <a href="#" class="btn btn-danger" btn-sm data-bs-toggle="modal"
                                        data-bs-target="#hapusModal{{ $sampah->id }}">
                                        Hapus
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Detail -->
                        <div class="modal fade" id="detailModal{{ $sampah->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="detailModalLabel{{ $sampah->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="detailModalLabel{{ $sampah->id }}">
                                            {{ $sampah->nama_sampah }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Jenis Sampah : {{ $sampah->jenis_sampah }}</p>
                                        <p>Harga : {{ $sampah->harga }}</p>
                                        <img src="{{ asset('storage/gambar_sampah/' . $sampah->gambar) }}"
                                            alt="{{ $sampah->nama_sampah }}" class="img-fluid">
                                    </div>
                                    <div class="modal-footer">
                                        <!-- Tombol Edit Data -->
                                        <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $sampah->id }}">
                                            Edit
                                        </a>
                                        <!-- End Tombol Edit Data -->

                                        <!-- Tombol "Hitung Total Sampah" -->
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#hitungTotalSampahModal"
                                            data-sampah="{{ json_encode($sampah) }}"
                                            onclick="prepareHitungTotalSampah(this)">
                                            Hitung Total Sampah
                                        </button>
                                        <!-- End Tombol "Hitung Total Sampah" -->

                                        <!-- Tombol Hapus -->
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>
                                        <!-- End Tombol Hapus -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal Detail -->

                        <!-- Modal Edit -->
                        <div class="modal fade" id="editModal{{ $sampah->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="editModalLabel{{ $sampah->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel{{ $sampah->id }}">
                                            Edit Data Sampah - {{ $sampah->nama_sampah }}
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form edit data sampah -->
                                        <form action="{{ route('sampah.update', $sampah->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="oldPhoto" value="{{ $sampah->gambar }}">
                                            <div class="form-group">
                                                <label for="nama_sampah">Nama Sampah</label>
                                                <input type="text" class="form-control" id="nama_sampah"
                                                    name="nama_sampah" value="{{ $sampah->nama_sampah }}">
                                            </div>
                                            <div class="mb-3">
                                                <div class="form-group">
                                                    <label type="text" id="jenis_sampah" class="mt-3">Jenis
                                                        Sampah</label>
                                                </div>
                                                <div class="form-group">
                                                    <select name="jenis_sampah" class="form-select"
                                                        aria-label="Default select example" required>
                                                        <option selected>{{ $sampah->jenis_sampah }}</option>
                                                        <option value="Kertas">Kertas</option>
                                                        <option value="Plastik">Plastik</option>
                                                        <option value="Logam">Logam</option>
                                                        <option value="Kaca">Kaca</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="jumlah">Jumlah</label>
                                                <input type="text" class="form-control" id="jumlah" name="jumlah"
                                                    value="{{ $sampah->jumlah }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="harga">Harga</label>
                                                <input type="text" class="form-control" id="harga" name="harga"
                                                    value="{{ $sampah->harga }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="gambar">Gambar</label>
                                                <input type="file" name="gambar" class="form-control"
                                                    id="gambar">

                                                <img src="{{ asset('storage/gambar_sampah/' . $sampah->gambar) }}"
                                                    id="img-view" width="100px" class="mt-3">
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal Edit -->

                        <!-- Modal Hapus -->
                        <div class="modal fade" id="hapusModal{{ $sampah->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="hapusModalLabel{{ $sampah->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="hapusModalLabel{{ $sampah->id }}">Hapus Data Sampah
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin menghapus data sampah ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <form action="{{ route('sampah.destroy', $sampah->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal Hapus -->

                        <!-- Modal Hitung Total Sampah -->
                        <div class="modal fade" id="hitungTotalSampahModal" tabindex="-1" role="dialog"
                            aria-labelledby="hitungTotalSampahModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="hitungTotalSampahModalLabel">Perhitungan Total Sampah
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="text-center">
                                            <img src="{{ asset('storage/gambar_sampah/' . $sampah->gambar) }}"
                                                alt="{{ $sampah->nama_sampah }}" class="img-fluid mb-2" width="100">
                                            <p>Nama Sampah: <span id="namaSampahDetail"></span></p>
                                            <p>Jenis Sampah: <span id="jenisSampahDetail"></span></p>
                                        </div>

                                        <!-- Form untuk menginput jumlah sampah -->
                                        <form id="hitungTotalSampahForm">
                                            <div class="mb-3">
                                                <label for="jumlahSampah">Jumlah Sampah</label>
                                                <input type="number" class="form-control" id="jumlahSampah"
                                                    name="jumlahSampah" required>
                                            </div>
                                        </form>

                                        <!-- Hasil perhitungan total sampah akan ditampilkan di sini -->
                                        <div id="totalSampahResult" class="mt-3"></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>
                                        <button type="button" class="btn btn-success"
                                            onclick="hitungTotalSampah()">Hitung</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal Hitung Total Sampah -->
                    @endforeach
                </div>
                <!-- End List Data Sampah -->

            </div>
        </div>
    </div>

    <script>
        const buttons = document.querySelectorAll('.btn-info[data-filter]');

        buttons.forEach(button => {
            button.addEventListener('click', () => {
                const filterValue = button.getAttribute('data-filter');
                const sampahItems = document.querySelectorAll('.col-md-3');

                sampahItems.forEach(item => {
                    const jenisSampah = item.querySelector('.card-text').textContent;
                    const sampahContainer = document.getElementById('sampahContainer');

                    if (filterValue === 'all' || filterValue === jenisSampah) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });

        const editButtons = document.querySelectorAll('.btn-secondary[data-bs-toggle="modal"]');
        editButtons.forEach(button => {
            button.addEventListener('click', () => {
                const targetModalId = button.getAttribute('data-bs-target');
                const targetModal = document.querySelector(targetModalId);
                new bootstrap.Modal(targetModal).show();
            });
        });

        $("#gambar").change(function() {
            previewImage(this);
        });

        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#img-view').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function prepareHitungTotalSampah(button) {
            const jumlahSampahInput = document.getElementById('jumlahSampah');
            const totalSampahResult = document.getElementById('totalSampahResult');
            const namaSampahDetail = document.getElementById('namaSampahDetail');
            const jenisSampahDetail = document.getElementById('jenisSampahDetail');

            const sampahData = JSON.parse(button.getAttribute('data-sampah'));

            const jumlahSampah = parseInt(jumlahSampahInput.value);
            const hargaSampah = parseFloat(sampahData.harga);

            if (!isNaN(jumlahSampah)) {
                const total = jumlahSampah * hargaSampah;
                totalSampahResult.innerHTML = `Total Sampah: Rp. ${total.toFixed(2)}`;
                namaSampahDetail.textContent = sampahData.nama_sampah;
                jenisSampahDetail.textContent = sampahData.jenis_sampah;
            } else {
                totalSampahResult.innerHTML = '';
                namaSampahDetail.textContent = '';
                jenisSampahDetail.textContent = '';
            }
        }
    </script>
@endsection
