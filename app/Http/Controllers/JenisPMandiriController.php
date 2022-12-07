<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\PMandiri;
use App\Models\JPMandiri;
use Illuminate\Http\Request;

class JenisPMandiriController extends Controller
{
    public function index(){
        $data = JPMandiri::all();

        return view('admin.jPelMandiri.index', compact('data'));
    }
    public function create(){
        $pMandiri = PMandiri::all();
        $content = Content::all();
        return view('admin.jPelMandiri.create', compact('pMandiri', 'content'));
    }
    public function store(Request $request)
    {
        $file = $request->file('gambar_banner');
        $fileName = $file->getClientOriginalName();

        $data = JPMandiri::create([
            'id_pelatihan' => $request->id_pelatihan,
            'id_content' => $request->id_content,
            'judul' => $request->judul,
            'gambar_banner' => $fileName,
        ]);
        if($request->file('file_content')) {
            $file->move(public_path('public/Image'), $fileName);
        }
        return redirect('/jenis-pelatihan-mandiri');
    }
    public function edit($id)
    {
        $data = JPMandiri::find($id);
        $pMandiri = PMandiri::all();
        $content = Content::all();
        return view('admin.jPelMandiri.edit', compact(['data', 'pMandiri', 'content']));
    }
    public function update(Request $request, $id){
        $file = $request->file('gambar_banner');
        $fileName = $file->getClientOriginalName();

        $data = JPMandiri::find($id);
        $data->update([
            'id_pelatihan' => $request->id_pelatihan,
            'id_content' => $request->id_content,
            'judul' => $request->judul,
            'gambar_banner' => $fileName,
        ]);
        if($request->file('file_content')) {
            $file->move(public_path('public/Image'), $fileName);
        }
        return redirect('/jenis-pelatihan-mandiri');
    }
    public function delete($id){
        $data = JPMandiri::find($id);
        $data->delete();

        return redirect('/keahlian');
    }
}
