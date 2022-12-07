<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PerusahaanMitra;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PerusahaanMitraController extends Controller
{
    public function index()
    {   
        $data = PerusahaanMitra::all();
        return view('admin.perusahaanMitra.index', compact('data'));
    }
    public function create()
    {
        $data = PerusahaanMitra::all();
        return view('admin.perusahaanMitra.create', compact('data'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_perusahaan' => 'required|string',
            'gambar_logo' => 'required|image',
            'urutan' => 'required|numeric|unique:m_perusahaan_mitra'
        ]);

        $image = $request->file('gambar_logo');
        $imageName = "";
        if($image) {
            $imageName = time()."_".$image->getClientOriginalName();
        }

        $data = PerusahaanMitra::create([
            'nama_perusahaan' => $request->nama_perusahaan,
            'gambar_logo' => $imageName,
            'urutan' => $request->urutan,
        ]);

        if($image) {
            $image->move(public_path('images/perusahaan-mitra'), $imageName);
        }
        // dd($data);
        return redirect('/admin/perusahaan-mitra')->with('message', 'Data Berhasil Disimpan');
    }
    public function edit($id)
    {
        $data = PerusahaanMitra::find($id);
        return view('admin.perusahaanMitra.edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_perusahaan' => 'required|string',
            'urutan' => 'required|numeric'
        ]);
        $image = $request->file('gambar_logo_new');
        $imageName = $request->gambar_logo_old;
        if($image) {
            $imageName = time()."_".$image->getClientOriginalName();
            $image->move(public_path('images/perusahaan-mitra'), $imageName);

            File::delete('images/perusahaan-mitra/'.$request->gambar_logo_old);
        }

        $data = PerusahaanMitra::find($id);
        $data->update([
            'nama_perusahaan' => $request->nama_perusahaan,
            'gambar_logo' => $imageName,
            'urutan' => $request->urutan,
        ]);

        return redirect('/admin/perusahaan-mitra')->with('message', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        $data = PerusahaanMitra::find($id);
        $data->delete();
        File::delete('images/perusahaan-mitra/'.$data->gambar_logo);

        return redirect('/admin/perusahaan-mitra')->with('message', 'Data Berhasil Dihapus');
    }
}