@extends('layout.template')

@section('container')
    <div class="pagetitle">
        <h1>Edit Data User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item active">Edit Data User</li>
            </ol>
        </nav>
    </div>
    
    <form action="{{ route('aksi_edit', ['id' => $user->id]) }}" method="POST">
        @csrf
        <div class="mb-3 mt-3">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" value="{{ $user->name }}">
        </div>
        <div class="mb-3 mt-3">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-select" aria-label="Default select example">
                <option value="Laki-laki" {{ old('jenis_kelamin', $user->jenis_kelamin) === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('jenis_kelamin', $user->jenis_kelamin) === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>        
        <div class="mb-3">
            <label for="floatingInput">Email</label>
            <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com" value="{{ $user->email }}">
            @error('email')
                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class="">
            <label for="floatingPassword">Password</label>
            <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
        </div>
        <div class="mb-3 mt-3">
            <label for="role">Role</label>
            <select name="role" class="form-select" aria-label="Default select example">
                <option value="Admin" {{ old('role', $user->role) === 'Admin' ? 'selected' : '' }}>Admin</option>
                <option value="Pengguna" {{ old('role', $user->role) === 'Pengguna' ? 'selected' : '' }}>Pengguna</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success mt-3"><i class="bi bi-save2"></i> Simpan</button>
        <a type="button" href="/batal" class="btn btn-info mt-3">Batal</a>
    </form>
    
@endsection
