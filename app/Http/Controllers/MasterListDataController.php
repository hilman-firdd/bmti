<?php

namespace App\Http\Controllers;

use App\Models\Evaluasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterListDataController extends Controller
{
    public function index(){
        $data = Evaluasi::all();
        $id_peserta = DB::table('m_peserta')->where('user_id', auth()->user()->id)->first();
        return view('admin.dashboard.evaluator.masterListData.index', compact('data', 'id_peserta'));
    }
    public function create(){
        return view('admin.dashboard.evaluator.masterListData.create');
    }
    public function store(Request $request){
        $data = Evaluasi::create([
            'program' => $request->program,
            'jenis_kegiatan' => $request->jenis_kegiatan,
            'nama_kegiatan' => $request->nama_kegiatan,
            'periode_awal' => $request->periode_awal,
            'periode_akhir' => $request->periode_akhir,
            'pola' => $request->pola,
            'moda' => $request->moda,
            'pb' => $request->pb,
            'kelas_group' => $request->kelas_group,
            'penanggung_jawab_kegiatan' => $request->penanggung_jawab_kegiatan,
            'peserta_dipanggil' => $request->peserta_dipanggil,
            'peserta_hadir' => $request->peserta_hadir,
            'peserta_tuntas' => $request->peserta_tuntas,
            'peserta_tidak_tuntas' => $request->peserta_tidak_tuntas,
            'tanggal_evaluasi' => $request->tanggal_evaluasi,
            'laporan' => $request->laporan
        ]);

        return redirect('/evaluator/master-list-data');
    }
    public function edit($id){
        $data = Evaluasi::find($id);
        return view('admin.dashboard.evaluator.masterListData.edit', compact(['data']));
    }
    public function update(Request $request, $id){
        $data = Evaluasi::find($id);
        $data->update([
            'program' => $request->program,
            'jenis_kegiatan' => $request->jenis_kegiatan,
            'nama_kegiatan' => $request->nama_kegiatan,
            'periode_awal' => $request->periode_awal,
            'periode_akhir' => $request->periode_akhir,
            'pola' => $request->pola,
            'moda' => $request->moda,
            'pb' => $request->pb,
            'kelas_group' => $request->kelas_group,
            'penanggung_jawab_kegiatan' => $request->penanggung_jawab_kegiatan,
            'peserta_dipanggil' => $request->peserta_dipanggil,
            'peserta_hadir' => $request->peserta_hadir,
            'peserta_tuntas' => $request->peserta_tuntas,
            'peserta_tidak_tuntas' => $request->peserta_tidak_tuntas,
            'tanggal_evaluasi' => $request->tanggal_evaluasi,
            'laporan' => $request->laporan
        ]);

        return redirect('/evaluator/master-list-data');
    }
    public function delete($id){
        $data = Evaluasi::find($id);
        $data->delete();

        return redirect('/evaluator/master-list-data');
    }
}
