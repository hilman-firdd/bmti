<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramKeahlian;
use App\Models\BidangKeahlian;
use Illuminate\Support\Facades\DB;

class ProgramKeahlianController extends Controller
{
    public function index(){
        $programKeahlian = DB::table('m_program_keahlian')->select('m_program_keahlian.*', 'm_bidang_keahlian.nama as bidang_keahlian')
                        ->join('m_bidang_keahlian','m_bidang_keahlian.id', '=','m_program_keahlian.bidang_keahlian_id')
                        ->get();
        return view('admin.ProgramKeahlian.index', compact('programKeahlian'));
    }

    // create store edit update delete
    public function create(){
        $bidangKeahlian = BidangKeahlian::all();
        return view('admin.ProgramKeahlian.create', compact('bidangKeahlian'));
    }
    public function store(Request $request){
        $programKeahlian = ProgramKeahlian::create([
            'bidang_keahlian_id' => $request->bidang_keahlian_id,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect('/admin/program-keahlian');
    }
    public function edit($id){
        $programKeahlian = ProgramKeahlian::find($id);
        $bidangKeahlian = BidangKeahlian::all();
        return view('admin.ProgramKeahlian.edit', compact('programKeahlian','bidangKeahlian'));
    }
    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'bidang_keahlian_id' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required'
        ]);

        $programKeahlian = ProgramKeahlian::find($id);
        $programKeahlian->update([
            'bidang_keahlian_id' => $request->bidang_keahlian_id,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/admin/program-keahlian')->with('message', 'Data Berhasil Diubah');
    }
    public function delete($id){
        $programKeahlian = ProgramKeahlian::find($id);
        $programKeahlian->delete();

        return redirect('/admin/program-keahlian');
    }
}
