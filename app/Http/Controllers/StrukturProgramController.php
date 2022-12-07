<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StrukturProgramController extends Controller
{
    public function index($pelatihanId){
        $data = DB::table('t_struktur_program')->where('kursus_id', $pelatihanId)->orderBy('kategori', 'desc')->get();
        return view('admin.kursus.struktur_program', compact('data', 'pelatihanId'));
    }

    public function simpan(Request $request){

        DB::table('t_struktur_program')->insert([
            'kursus_id' => $request->pelatihanId,
            'kategori' => $request->kategori,
            'materi' => $request->materi,
            'jam_pelajaran' => $request->jam_pelajaran
        ]);

        return redirect()->back()->with('message', 'Data Berhasil Disimpan');
    }
    public function edit($pelatihanId, $id){
        $data = DB::table('t_struktur_program')->where('id', $id)->first();
        return view('admin.kursus.struktur_program_edit', compact('data', 'pelatihanId', 'id'));
    }
    public function update(Request $request, $pelatihanId, $id){
        $validatedData = $request->validate([
            'kategori' => 'required|string',
            'materi' => 'required|string',
            'jam_pelajaran' => 'required'
        ]);

        $data = DB::table('t_struktur_program')->where('id', $id)->update([
        
            'kategori' => $request->kategori,
            'materi' => $request->materi,
            'jam_pelajaran' => $request->jam_pelajaran
        ]);

        return redirect()->route('pelatihan.strukturProgram', [$pelatihanId])->with('message', 'Data Berhasil Diubah');
    }
    public function delete($pelatihanId, $id){
        // $data = StrukturProgram::find($id);
        // $data->delete();
        $data = DB::table('t_struktur_program')->where('id', $id)->delete();
        return redirect()->back()->with('message', 'Data Berhasil Dihapus');
    }
}
 