<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class SampahController extends Controller
{
    public function dashboard()
    {
        $labels = ['Sampah A', 'Sampah B', 'Sampah C'];
    $data = [10, 20, 15];

    return view('dashboard', compact('labels', 'data'));
    }
    public function index()
    {
        $dataSampah = Sampah::all();

        return view('sampah.sampah', compact('dataSampah'));
    }

    public function tambahsampah()
    {
        return view('sampah.tambahsampah');
    }

    public function aksitambah(Request $request)
    {
        $request->validate([
            'nama_sampah' => 'required',
            'jenis_sampah' => 'required',
            'harga' => 'required',
            'gambar' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $data = [
            'nama_sampah' => $request->input('nama_sampah'),
            'jenis_sampah' => $request->input('jenis_sampah'),
            'harga' => $request->input('harga'),
        ];

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            if ($file->isValid()) {
                $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/gambar_sampah/', $fileName);
                $data['gambar'] = $fileName;
            }
        }

        Sampah::create($data);
        Alert::success('Data Berhasil Ditambahkan', 'Success.');
        return redirect('/sampah');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_sampah' => 'required',
            'jenis_sampah' => 'required',
            // 'jumlah' => 'required|numeric|min:1',
            'harga' => 'required',
            'gambar' => 'nullable|file|image|mimes:png,jpg,jpeg',
        ]);

        $sampah = Sampah::findOrFail($id);

        $data = [
            'nama_sampah' => $request->input('nama_sampah'),
            'jenis_sampah' => $request->input('jenis_sampah'),
            // 'jumlah' => $request->input('jumlah'),
            'harga' => $request->input('harga'),
        ];

        if ($request->hasFile('gambar')) {
            // Menghapus gambar lama jika ada
            if ($sampah->gambar) {
                Storage::delete('public/gambar_sampah/' . $sampah->gambar);
            }

            $file = $request->file('gambar');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/gambar_sampah/', $fileName);
            $data['gambar'] = $fileName;
        }

        $sampah->update($data);
        Alert::success('Data Berhasil Diperbarui', 'Success.');
        return redirect('/sampah');
    }

    public function destroy($id)
    {
        $sampah = Sampah::findOrFail($id);

        // Menghapus gambar jika ada
        if ($sampah->gambar) {
            Storage::delete('public/gambar_sampah/' . $sampah->gambar);
        }

        $sampah->delete();
        Alert::success('Data Berhasil Dihapus', 'Success.');
        return redirect('/sampah');
    }
}
