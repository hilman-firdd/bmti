<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EvaluasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('t_kursus_peserta')
                ->select('t_kursus_peserta.*', 'm_peserta.nama_depan', 't_kursus.judul','m_kelompok_keahlian.nama', 't_kursus_peserta.status')
                ->join('m_peserta', 'm_peserta.id', '=', 't_kursus_peserta.peserta_id')
                ->join('t_kursus', 't_kursus.id', '=', 't_kursus_peserta.kursus_id')
                ->join('m_kelompok_keahlian', 'm_kelompok_keahlian.id', '=', 't_kursus.kelompok_keahlian_id')
                ->where('t_kursus_peserta.status', 1)
                ->get();
        return view('admin.dashboard.evaluator.evaluasiSertifikat.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('t_kursus_peserta')
                ->select('t_kursus_peserta.*', 'm_peserta.nama_depan', 't_kursus.judul','t_kursus.gambar','m_kelompok_keahlian.nama')
                ->join('m_peserta', 'm_peserta.id', '=', 't_kursus_peserta.peserta_id')
                ->join('t_kursus', 't_kursus.id', '=', 't_kursus_peserta.kursus_id')
                ->join('m_kelompok_keahlian', 'm_kelompok_keahlian.id', '=', 't_kursus.kelompok_keahlian_id')
                ->where('t_kursus_peserta.id', $id)
                ->first();  

        return view('admin.dashboard.evaluator.evaluasiSertifikat.detailSertifikatPeserta', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
