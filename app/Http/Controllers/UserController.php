<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index()
    {
        $dataUser = User::all();
        return view('datauser.user', compact('dataUser'));
    }
    public function tambahuser()
    {
        return view('datauser.tambahuser');
    }
    public function aksi_tambah(Request $request)
    {
        // Lakukan validasi data input dari form
        $validatedData = $request->validate([
            'name' => 'required|string',
            'role' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        // Simpan data ke dalam database
        $user = new User;
        $user->name = $validatedData['name'];
        $user->role = $validatedData['role'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->save();

        Alert::success('Data Berhasil Ditambahkan', 'Success.');
        return redirect('/user');
    }
    public function editUser($id)
    {
        // Mengambil data pengguna berdasarkan ID
        $user = User::find($id);

        // Tampilkan halaman edit dengan data pengguna
        return view('datauser.edituser', compact('user'));
    }

    public function aksi_edit(Request $request, $id)
    {
        // Lakukan validasi data input dari form
        $validatedData = $request->validate([
            'name' => 'required|string',
            'role' => 'required',
            'email' => 'required|email|unique:users,email,' . $id, // Mengabaikan validasi unik untuk email saat mengedit
            'password' => 'nullable|min:8', // Ubah ke 'nullable' agar tidak diwajibkan saat mengedit
        ]);

        // Mengambil data pengguna berdasarkan ID
        $user = User::find($id);

        // Mengupdate data pengguna dengan data yang diterima dari form
        $user->name = $validatedData['name'];
        $user->role = $validatedData['role'];
        $user->email = $validatedData['email'];

        // Jika password diisi, maka update password
        if ($validatedData['password']) {
            $user->password = bcrypt($validatedData['password']);
        }

        $user->save();

        Alert::success('Data Berhasil Diedit', 'Success.');
        return redirect('/user');
    }

    public function hapusUser($id)
    {
        // Temukan data user berdasarkan ID
        $user = User::find($id);

        if (!$user) {
            // Jika data user tidak ditemukan, tampilkan pesan error
            Alert::error('Error', 'Data User tidak ditemukan');
        } else {
            // Jika data user ditemukan, hapus data tersebut
            $user->delete();
            Alert::success('Sukses', 'Data User berhasil dihapus');
        }

        // Redirect ke halaman data user
        return redirect('/user');
    }
}
