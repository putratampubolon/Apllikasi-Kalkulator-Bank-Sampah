@extends('layout.template')

@section('container')
    <div class="pagetitle">
        <h1>Tambah Data User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item active">Tambah Data User</li>
            </ol>
        </nav>
    </div>

    <form action="{{ route ('aksi_tambah') }}" method="POST">
        @csrf
        <div class="mb-3 mt-3">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
        </div>
        <div class="mb-3 mt-3">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-select" aria-label="Default select example" required>
                <option>-- Pilih --</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>                
            </select>
        </div>        
        <div class="mb-3">
            <label for="floatingInput">Email</label>
            <input type="email" class="form-control" name="email" id="floatingInput"
                placeholder="name@example.com" required>
            @error('email')
                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class="">
            <label for="floatingPassword">Password</label>
            <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password"
                required>
        </div>
        <div class="mb-3 mt-3">
            <label for="role">Role</label>
            <select name="role" class="form-select" aria-label="Default select example" required>
                <option>-- Pilih --</option>
                <option value="Admin">Admin</option>
                <option value="Pengguna">Pengguna</option>                
            </select>
        </div>
        <button type="submit" class="btn btn-success mt-3"><i class="bi bi-save2"></i> Simpan</button>
        <a type="button" href="/batall" class="btn btn-info mt-3">Batal</a>
    </form>
@endsection
