<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisKegiatan;

class JenisKegiatanController extends Controller
{
    public function index()
    {
        $data = JenisKegiatan::all();
        return view('admin.JenisKegiatan.index', compact('data'));
    }
    public function create()
    {
        $data = JenisKegiatan::all();
        return view('admin.JenisKegiatan.create', compact('data'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_jenis_kegiatan' => 'required',
            'kode_jenis_kegiatan' => 'required'
        ]);
        $data = JenisKegiatan::create([
            'nama_jenis_kegiatan' => $request->nama_jenis_kegiatan,
            'kode_jenis_kegiatan' => $request->kode_jenis_kegiatan,
        ]);

        return redirect('/admin/jenis-kegiatan')->with('message', 'Data Berhasil Disimpan');
    }
    public function edit($id)
    {
        $data = JenisKegiatan::find($id);
        return view('admin.JenisKegiatan.edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_jenis_kegiatan' => 'required',
            'kode_jenis_kegiatan' => 'required'
        ]);
        $data = JenisKegiatan::find($id);
        $data->update([
            'nama_jenis_kegiatan' => $request->nama_jenis_kegiatan,
            'kode_jenis_kegiatan' => $request->kode_jenis_kegiatan,
        ]);

        return redirect('/admin/jenis-kegiatan')->with('message', 'Data Berhasil Diubah');
    }
    public function delete($id)
    {
        $data = JenisKegiatan::find($id);
        $data->delete();

        return redirect('/admin/jenis-kegiatan')->with('message', 'Data Berhasil Dihapus');
    }
}