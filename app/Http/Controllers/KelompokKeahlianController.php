<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramKeahlian;
use App\Models\KelompokKeahlian;
use Illuminate\Support\Facades\DB;

class KelompokKeahlianController extends Controller
{
    public function index(){
        $kelompokKeahlian = DB::table('m_kelompok_keahlian')->select('m_kelompok_keahlian.*','m_program_keahlian.nama as program_keahlian')
                            ->join('m_program_keahlian', 'm_program_keahlian.id','=','m_kelompok_keahlian.program_keahlian_id')
                            ->get();
        return view('admin.KelompokKeahlian.index', compact('kelompokKeahlian'));
    }
    
    // create store edit update delete
    public function create(){
        $programKeahlian = ProgramKeahlian::all();
        return view('admin.KelompokKeahlian.create', compact('programKeahlian'));
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'program_keahlian_id' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required'
        ]);
        $kelompokKeahlian = KelompokKeahlian::create([
            'program_keahlian_id' => $request->program_keahlian_id,
            'kode' => $request->kode,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect('/admin/kelompok-keahlian')->with('message', 'Data Berhasil Disimpan');
    }
    public function edit($id){
        $kelompokKeahlian = KelompokKeahlian::find($id);
        $programKeahlian = ProgramKeahlian::all();
        return view('admin.KelompokKeahlian.edit', compact('kelompokKeahlian','programKeahlian'));
    }
    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'program_keahlian_id' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required'
        ]);
        $kelompokKeahlian = KelompokKeahlian::find($id);
        $kelompokKeahlian->update([
            'program_keahlian_id' => $request->program_keahlian_id,
            'nama' => $request->nama,
            'kode' => $request->kode,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect('/admin/kelompok-keahlian')->with('message', 'Data Berhasil Diubah');
    }
    public function delete($id){
        $kelompokKeahlian = KelompokKeahlian::find($id);
        $kelompokKeahlian->delete();

        return redirect('/admin/kelompok-keahlian')->with('message', 'Data Berhasil Dihapus');
    }
}