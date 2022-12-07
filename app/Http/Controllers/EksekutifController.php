<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EksekutifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDataDashboardEksekutif()
    {
        return response()->json([
            'data_siswa_kejuruan' => $this->getDataSiswaKejuruan(),
            'data_tenaga_kependidikan' => $this->getDataGuruDanTenagaKependidikan(),
            'data_mitra_perusahaan' => $this->getDataMitraPerusahaan()
        ]);
    }

    public function getDataSiswaKejuruan()
    {
        $dataJumlah = DB::table('t_data_jumlah_siswa_kejuruan')->sum('jumlah');
        $dataPerProvinsi = DB::table('t_data_jumlah_siswa_kejuruan')->get();
        
        return response()->json([
            'jumlah_siswa' => $dataJumlah,
            'data' => $dataPerProvinsi
        ]);
    }

    public function getDataGuruDanTenagaKependidikan(){
        $dataGik = DB::connection('mysql2')->select("SELECT COUNT(nama_lengkap) AS jumlah_guru FROM biodata2 WHERE nama_lengkap != 'NULL'");
        $data_collection = collect($dataGik)->first();
        $dataJumlah = DB::table('t_data_jumlah_guru_dan_tenaga_kependidikan')->sum('jumlah');
        $dataGuru = DB::table('t_data_jumlah_guru_dan_tenaga_kependidikan')->get();
        return response()->json([
            'jumlahGurudanTenagaPendidikan' => $dataJumlah,
            'jumlahGuruGk' => $data_collection->jumlah_guru,
            'data' => $dataGuru,
        ]);   
    }

    public function getDataMitraPerusahaan(){
        $jumlahMitra = DB::table('m_perusahaan_mitra')->count();
        $dataMitra =  DB::table('m_perusahaan_mitra')->select('nama_perusahaan','gambar_logo')->get();
        return response()->json([
            'jumlah_mitra_perusahaan' => $jumlahMitra,
            'data' => $dataMitra
        ]);
    }

    
}
