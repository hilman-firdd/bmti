<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    public function index(){
        $data = Provinsi::all();
        return view('admin.provinsi.index', compact('data'));
    }
    public function create()
    {
        return view('admin.provinsi.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode' => 'required|integer',
            'nama' => 'required'
        ]);


        $data = Provinsi::create([
            'kode' => $request->kode,
            'nama' => $request->nama
        ]);

        return redirect('/admin/provinsi')->with('message', 'Data Berhasil Disimpan');
    }
    public function edit($id)
    {
        $data = Provinsi::find($id);
        return view('admin.provinsi.edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kode' => 'required',
            'nama' => 'required'
        ]);

        $data = Provinsi::find($id);
        $data->update([
            'kode' => $request->kode,
            'nama' => $request->nama
        ]);

        return redirect('/admin/provinsi')->with('message', 'Data Berhasil Diubah');
    }
    // public function delete($id)
    // {
    //     $data = Provinsi::find($id);
    //     $data->delete();

    //     return redirect('/admin/provinsi')->with('message', 'Data Berhasil Dihapus');
    
    // }
}
