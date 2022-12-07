<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelurahanController extends Controller
{
    public function index(){
        $data = DB::table('m_desa_kelurahan')
                ->join('m_kecamatan', 'm_desa_kelurahan.id_kecamatan', '=', 'm_kecamatan.id')
                ->select('m_desa_kelurahan.id', 'm_kecamatan.nama_kecamatan', 'm_desa_kelurahan.kode', 'm_desa_kelurahan.nama_desa_kelurahan')
                ->paginate(200);
        return view('admin.kelurahan.index', compact('data'));
    }
    public function create()
    {
        $data = Kecamatan::all();
        return view('admin.kelurahan.create', compact('data'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_kecamatan' => 'required',
            'kode' => 'required',
            'nama_desa_kelurahan' => 'required'
        ]);


        $data = Kelurahan::create([
            'id_kecamatan' => $request->id_kecamatan,
            'kode' => $request->kode,
            'nama_desa_kelurahan' => $request->nama_desa_kelurahan
        ]);

        return redirect('/admin/kelurahan')->with('message', 'Data Berhasil Disimpan');
    }
    public function edit($id)
    {
        $data = Kelurahan::find($id);
        $kecamatan = Kecamatan::all();
        return view('admin.kelurahan.edit', compact(['data', 'kecamatan']));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kode' => 'required',
            'nama_desa_kelurahan' => 'required'
        ]);

        $data = Kelurahan::find($id);
        $data->update([
            'kode' => $request->kode,
            'nama_desa_kelurahan' => $request->nama_desa_kelurahan
        ]);

        return redirect('/admin/kelurahan')->with('message', 'Data Berhasil Diubah');
    }
    // public function delete($id)
    // {
    //     $data = Kelurahan::find($id);
    //     $data->delete();

    //     return redirect('/admin/kelurahan')->with('message', 'Data Berhasil Dihapus');
    
    // }
}