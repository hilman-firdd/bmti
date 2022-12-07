<?php

namespace App\Http\Controllers;

use App\Models\KotaKab;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KecamatanController extends Controller
{
    public function index(){
        $data = DB::table('m_kecamatan')
                ->join('m_kota_kab', 'm_kecamatan.id_kota_kabupaten', '=', 'm_kota_kab.id')
                ->select('m_kecamatan.id', 'm_kota_kab.nama', 'm_kecamatan.kode', 'm_kecamatan.nama_kecamatan')
                ->get();
        return view('admin.kecamatan.index', compact('data'));
    }
    public function create()
    {
        $data = KotaKab::all();
        return view('admin.kecamatan.create', compact('data'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kota_kab_id' => 'required',
            'kode' => 'required',
            'nama' => 'required'
        ]);


        $data = Kecamatan::create([
            'id_kota_kabupaten' => $request->kota_kab_id,
            'kode' => $request->kode,
            'nama_kecamatan' => $request->nama
        ]);

        return redirect('/admin/kecamatan')->with('message', 'Data Berhasil Disimpan');
    }
    public function edit($id)
    {
        $data = Kecamatan::find($id);
        $k = DB::table('m_kecamatan')
        ->join('m_kota_kab', 'm_kecamatan.id_kota_kabupaten', '=', 'm_kota_kab.id')
        ->select('m_kecamatan.*', 'm_kota_kab.nama as nama_kabupaten')
        ->where('m_kecamatan.id', '=', $id)
        ->first();
        $kota_kab = KotaKab::all();
        return view('admin.kecamatan.edit', compact(['data', 'kota_kab', 'k']));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kode' => 'required',
            'nama' => 'required'
        ]);

        $data = Kecamatan::find($id);
        $data->update([
            'kode' => $request->kode,
            'nama_kecamatan' => $request->nama,
        ]);

        return redirect('/admin/kecamatan')->with('message', 'Data Berhasil Diubah');
    }
    public function delete($id)
    {
        $data = Kecamatan::find($id);
        $data->delete();

        return redirect('/admin/kecamatan')->with('message', 'Data Berhasil Dihapus');
    
    }
}
