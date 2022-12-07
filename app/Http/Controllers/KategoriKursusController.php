<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriKursus;

class KategoriKursusController extends Controller
{
    public function index()
    {
        $data = KategoriKursus::all();
        return view('admin.kategoriKursus.index', compact('data'));
    }
    public function create()
    {
        $data = KategoriKursus::all();
        return view('admin.kategoriKursus.create', compact('data'));
    }
    public function store(Request $request)
    {
        $data = KategoriKursus::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
        ]);

        return redirect('/admin/kategori-kursus');
    }
    public function edit($id)
    {
        $data = KategoriKursus::find($id);
        return view('admin.kategoriKursus.edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $data = kategoriKursus::find($id);
        $data->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
        ]);

        return redirect('/admin/kategori-kursus');
    }
    public function delete($id)
    {
        $data = KategoriKursus::find($id);
        $data->delete();

        return redirect('/admin/kategori-kursus');
    
    }
}