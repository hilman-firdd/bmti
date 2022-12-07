<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PesertaController extends Controller
{
    public function index(){
        $data = Peserta::all();
        
        return view('admin.peserta.index', compact('data'));
    }
    // create store edit update delete
    public function create(){
        
        $desa_kelurahan = DB::table('m_desa_kelurahan')->get();
        $kecamatan = DB::table('m_kecamatan')->get();
        $kota_kab = DB::table('m_kota_kab')->get();
        $provinsi = DB::table('m_provinsi')->get();

        return view('admin.peserta.create', compact('desa_kelurahan', 'kecamatan', 'kota_kab', 'provinsi'));
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'nuptk' => 'required|numeric|digits:16',
            'nik' => 'required|numeric|digits:16',
            'nama_depan' => 'required',
            'nama_belakang' => 'required|string|min:8',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|before:today',
            'alamat' => 'required',
            'desa_kelurahan' => 'required',
            'kecamatan' => 'required',
            'kota_kab' => 'required',
            'provinsi' => 'required',
            'email' => 'required|string|email|unique:users',
            'no_telepon' => 'required|numeric|digits_between:9,13'

        ]);

        $data = Peserta::create([
            'nuptk' => $request->nuptk,
            'nik' => $request->nik,
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'desa_kelurahan' => $request->desa_kelurahan,
            'kecamatan' => $request->kecamatan,
            'kota_kab' => $request->kota_kab,
            'provinsi' => $request->provinsi,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon
        ]);

        return redirect('/admin/peserta')->with('message', 'Data Berhasil Disimpan');
    }
    public function edit($id){
        $data = Peserta::find($id);
        
        $desa_kelurahan = DB::table('m_desa_kelurahan')->get();
        $kecamatan = DB::table('m_kecamatan')->get();
        $kota_kab = DB::table('m_kota_kab')->get();
        $provinsi = DB::table('m_provinsi')->get();
        return view('admin.peserta.edit', compact('data', 'desa_kelurahan', 'kecamatan', 'kota_kab', 'provinsi'));
    }
    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'nuptk' => 'required|numeric|digits:16',
            'nik' => 'required|numeric|digits:16',
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'desa_kelurahan' => 'required',
            'kecamatan' => 'required',
            'kota_kab' => 'required',
            'provinsi' => 'required',
            'email' => 'required|string|email',
            'no_telepon' => 'required|numeric'

        ]);
        $data = Peserta::find($id);
        $data->update([
            'nuptk' => $request->nuptk,
            'nik' => $request->nik,
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'desa_kelurahan' => $request->desa_kelurahan,
            'kecamatan' => $request->kecamatan,
            'kota_kab' => $request->kota_kab,
            'provinsi' => $request->provinsi,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon
        ]);

        return redirect('/admin/peserta')->with('message', 'Data Berhasil Diubah');
    }
    public function delete($id){
        $data = Peserta::find($id);
        $data->delete();

        return redirect('/admin/peserta')->with('message', 'Data Berhasil Dihapus');
    }
    public function getDataAlamat(Request $request){
        $data = DB::table('m_desa_kelurahan')->select('m_desa_kelurahan.id as id_desa_kelurahan', 'm_desa_kelurahan.nama_desa_kelurahan as nama_desa_kelurahan', 'm_kecamatan.id as id_kecamatan', 'm_kecamatan.nama_kecamatan as nama_kecamatan', 'm_kota_kab.id as id_kota_kab', 'm_kota_kab.nama as nama_kota_kab', 'm_provinsi.id as id_provinsi', 'm_provinsi.nama as nama_provinsi')
        ->join('m_kecamatan', 'm_kecamatan.id', '=', 'm_desa_kelurahan.id_kecamatan')
        ->join('m_kota_kab', 'm_kota_kab.id', '=', 'm_kecamatan.id_kota_kabupaten')
        ->join('m_provinsi', 'm_provinsi.id', '=', 'm_kota_kab.provinsi_id')
        ->where('m_desa_kelurahan.id', '=', $request->search)
        ->get();
        return response()->json([
            'data' => $data,
        ]);
    }
    public function editProfil($id){
        $id_peserta = DB::table('m_peserta')->where('user_id', auth()->user()->id)->first();
        $data = Peserta::find($id);
        $dk = DB::table('m_desa_kelurahan')
        ->join('m_peserta', 'm_peserta.desa_kelurahan', '=', 'm_desa_kelurahan.id')
        ->select('m_desa_kelurahan.nama_desa_kelurahan as nama_desa_kelurahan', 'm_peserta.desa_kelurahan as id_desa_kelurahan')
        ->where('m_peserta.id', '=', $id)
        ->first();
        $k = DB::table('m_kecamatan')
        ->join('m_peserta', 'm_peserta.kecamatan', '=', 'm_kecamatan.id')
        ->select('m_kecamatan.nama_kecamatan as nama_kecamatan', 'm_peserta.kecamatan as id_kecamatan')
        ->where('m_peserta.id', '=', $id)
        ->first();
        $kk = DB::table('m_kota_kab')
        ->join('m_peserta', 'm_peserta.kota_kab', '=', 'm_kota_kab.id')
        ->select('m_kota_kab.nama as nama_kota_kab', 'm_peserta.kota_kab as id_kota_kab')
        ->where('m_peserta.id', '=', $id)
        ->first();
        $p = DB::table('m_provinsi')
        ->join('m_peserta', 'm_peserta.provinsi', '=', 'm_provinsi.id')
        ->select('m_provinsi.nama as nama_provinsi', 'm_peserta.provinsi as id_provinsi')
        ->where('m_peserta.id', '=', $id)
        ->first();
        $desa_kelurahan = DB::table('m_desa_kelurahan')->get();
        $kecamatan = DB::table('m_kecamatan')->get();
        $kota_kab = DB::table('m_kota_kab')->get();
        $provinsi = DB::table('m_provinsi')->get();
        return view('admin.dashboard.peserta.editProfil', compact(['data', 'id_peserta', 'desa_kelurahan', 'kecamatan', 'kota_kab', 'provinsi', 'dk', 'k', 'kk', 'p']));
    }
    public function updateProfil(Request $request, $id){
        $validatedData = $request->validate([
            // 'foto' => 'required|images',
            // 'nuptk' => 'required|numeric|digits:16',
            'nik' => 'required|numeric|digits:16',
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'desa_kelurahan' => 'required',
            'kecamatan' => 'required',
            'kota_kab' => 'required',
            'provinsi' => 'required',
            'email' => 'required|string|email',
            'no_telepon' => 'required|numeric'

        ]);

        $foto_new = $request->file('foto_new');
        $foto_old = $request->foto_old;

        if($foto_old != ""){
            if($foto_new){
            $foto_old = time()."_".$foto_new->getClientOriginalName();
            $foto_new->move(public_path('images/profil/'), $foto_old);
            File::delete('images/profil/'.$request->foto_old);
            }
        } else {
        if($foto_new){
            $foto_old = time()."_".$foto_new->getClientOriginalName();

            $foto_new->move(public_path('images/profil/'), $foto_old);
            }
        }


        
        $data = Peserta::find($id);
        $data->update([
            'foto' => $foto_old,
            'nuptk' => $request->nuptk,
            'nik' => $request->nik,
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'desa_kelurahan' => $request->desa_kelurahan,
            'kecamatan' => $request->kecamatan,
            'kota_kab' => $request->kota_kab,
            'provinsi' => $request->provinsi,
            'asal_sekolah' => $request->asal_sekolah,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon
        ]);
        // $id_peserta = DB::table('m_peserta')->where('user_id', auth()->user()->id)->first();

        return redirect('/dashboard')->with('message', 'Data Berhasil Diubah');       
    }
}