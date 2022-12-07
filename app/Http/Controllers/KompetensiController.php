<?php

namespace App\Http\Controllers;

use App\Models\Kompetensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KompetensiController extends Controller
{
    public function index(){
        $data = Kompetensi::all();

        return view('admin.galeria.kompetensi.index', compact('data'));
    }

    public function create(){
        $data = Kompetensi::all();
        return view('admin.galeria.kompetensi.create', compact('data'));
    }

    public function store(Request $request)
    {
        $file = $request->file('gambar_banner');
        $fileName = "";

        $validatedData = $request->validate([
            'nama_kompetensi' => 'required',
            'deskripsi' => 'required',
            'gambar_banner' => 'required|image'
        ]);

        if($file){
            $fileName = time()."_".$file->getClientOriginalName();
        }

        Kompetensi::create([
            'nama_kompetensi' => $request->nama_kompetensi,
            'kode' => $request->kode,
            'deskripsi' => $request->deskripsi,
            'gambar_banner' => $fileName,
        ]);

        if($file){
            $file->move(public_path('images/galeria/'), $fileName);
        }
        return redirect('/admin/kompetensi')->with('message', 'Data Berhasil Disimpan');
       
    }

    public function edit($id){
        $data = Kompetensi::find($id);
        return view('admin.galeria.kompetensi.edit', compact(['data']));
    }

    public function update(Request $request, $id){

        $file = $request->file('gambar_banner_new');
        $fileName = $request->gambar_banner_old;

        $validatedData = $request->validate([
            'nama_kompetensi' => 'required',
            'deskripsi' => 'required'
        ]);

        if($file){
            $fileName = time()."_".$file->getClientOriginalName();
            $file->move(public_path('images/galeria/'), $fileName);

            File::delete('images/galeria/'.$request->gambar_banner_old);
        }

        $data = Kompetensi::find($id);
        $data->update([
            'nama_kompetensi' => $request->nama_kompetensi,
            'kode' => $request->kode,
            'deskripsi' => $request->deskripsi,
            'gambar_banner' => $fileName,
        ]);

        return redirect('/admin/kompetensi')->with('message', 'Data Berhasil Diubah');
    }

    public function delete($id){
        $data = Kompetensi::find($id);
        $data->delete();

        File::delete('images/galeria/'.$data->gambar_banner);

        return redirect('/admin/kompetensi')->with('message', 'Data Berhasil Dihapus');
    }
}