<?php

namespace App\Http\Controllers;

use App\Models\KotaKab;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KotaController extends Controller
{
    public function index(){
        $data = DB::table('m_kota_kab')
                ->join('m_provinsi', 'm_kota_kab.provinsi_id', '=', 'm_provinsi.id')
                ->select('m_kota_kab.id', 'm_provinsi.nama as nama_provinsi', 'm_kota_kab.kode', 'm_kota_kab.nama')
                ->get();
        return view('admin.kotaKab.index', compact('data'));
    }
    public function create()
    {
        $data = Provinsi::all();
        return view('admin.kotaKab.create', compact('data'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'provinsi_id' => 'required',
            'kode' => 'required',
            'nama' => 'required'
        ]);


        $data = KotaKab::create([
            'provinsi_id' => $request->provinsi_id,
            'kode' => $request->kode,
            'nama' => $request->nama
        ]);

        return redirect('/admin/kota')->with('message', 'Data Berhasil Disimpan');
    }
    public function edit($id)
    {
        $data = KotaKab::find($id);
        $provinsi = Provinsi::all();
        return view('admin.kotaKab.edit', compact(['data', 'provinsi']));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kode' => 'required',
            'nama' => 'required'
        ]);

        $data = KotaKab::find($id);
        $data->update([
            'kode' => $request->kode,
            'nama' => $request->nama
        ]);

        return redirect('/admin/kota')->with('message', 'Data Berhasil Diubah');
    }
    // public function delete($id)
    // {
    //     $data = KotaKab::find($id);
    //     $data->delete();

    //     return redirect('/admin/kota')->with('message', 'Data Berhasil Dihapus');
    
    // }
}
