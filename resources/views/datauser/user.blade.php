@extends('layout.template')

@section('container')
    <div class="pagetitle">
        <h1>Data User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item active">Data User</li>
            </ol>
        </nav>
    </div>
    <a href="/tambahuser" class="btn btn-primary btn-sm mb-3 custom-button"><i class="bi bi-folder-plus"></i> Tambah
        User</a>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead class="table-info">
                        <tr align="center">
                            <th scope="col">Name</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Email</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataUser as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->jenis_kelamin }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('edituser', ['id' => $user->id]) }}"
                                            class="btn btn-info btn-sm mx-1">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <a href="#" type="button" class="btn btn-danger btn-sm mx-1 hapus-user"
                                            data-id="{{ $user->id }}">
                                            <i class="ri-delete-bin-4-line"></i> Hapus
                                        </a>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const hapusButtons = document.querySelectorAll('.hapus-user');

                hapusButtons.forEach(button => {
                    button.addEventListener('click', function(event) {
                        event.preventDefault(); // Mencegah tindakan default dari tautan

                        const userId = this.getAttribute('data-id');

                        Swal.fire({
                            title: 'Konfirmasi Hapus',
                            text: 'Apakah Anda yakin ingin menghapus pengguna ini?',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Ya, Hapus',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Jika pengguna menyetujui, arahkan ke rute hapus
                                window.location = `/hapususer/${userId}`;
                            }
                        });
                    });
                });
            });
        </script>
    @endsection
