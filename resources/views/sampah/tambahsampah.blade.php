@extends('layout.template')

@section('container')
    <div class="pagetitle">
        <h1>Tambah Data Sampah</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item active">Tambah Data Sampah</li>
            </ol>
        </nav>
    </div>

    <div class="pagetitle">
        <div class="card">
            <div class="card-body mt-2">

                <form action="/aksitambah" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 mt-3">
                        <label for="nama_sampah">Nama Sampah</label>
                        <input type="text" name="nama_sampah" class="form-control" id="nama_sampah"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="jenis_sampah">Jenis Sampah</label>
                        </div>
                        <div class="form-group">
                            <select name="jenis_sampah" class="form-select" aria-label="Default select example">
                                <option selected>-- Pilih --</option>
                                <option value="Kertas">Kertas</option>
                                <option value="Plastik">Plastik</option>
                                <option value="Logam">Logam</option>                                
                                <option value="Kaca">Kaca</option>                                
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1">Harga</label>
                        <input type="number" name="harga" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>                    
                    <div class="mb-3">
                        <label for="gambar">Gambar</label>
                        <input type="file" name="gambar" class="form-control" id="gambar">
                        <img src="" id="img-view" width="100px" class="mt-3">
                    </div>
                    <button type="submit" class="btn btn-success mt-3"><i class="bi bi-save2"></i> Simpan</button>
                    <a type="button" href="/batal" class="btn btn-info mt-3">Batal</a>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewImage() {
            var input = document.getElementById('gambar');
            var imgView = document.getElementById('img-view');
            var reader = new FileReader();
    
            reader.onload = function(e) {
                imgView.src = e.target.result;
            };
    
            reader.readAsDataURL(input.files[0]);
        }
    
        // Panggil previewImage saat gambar dipilih
        document.getElementById('gambar').addEventListener('change', previewImage);
    </script>
    
@endsection