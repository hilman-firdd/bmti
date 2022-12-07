<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenyelenggaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDataDashboardPenyelenggara()
    {
        return response()->json([
            'data_diklat' => $this->getDataDiklat(),
            'data_peserta_diklat' => $this->getDataDiklatPerWilayah(),

        ]);
    }

    public function getDataDiklat()
    {
        $jumlahKelasDiklat = DB::connection('mysql2')->select("select count(*) as jumlah_kelas_diklat from namakelasdiklat");
        $collectionJumlahKelasDiklat = collect($jumlahKelasDiklat)->first();

        $kelasDiklat = DB::connection('mysql2')->select("select namakelasdiklat, grup_kelas_diklat, periodekelasdiklat, 
                                                        tanggalmulai, tanggalselesai from namakelasdiklat");
        $collectionKelasDiklat = collect($kelasDiklat);

        return response()->json([
            'jumlah_diklat' => $collectionJumlahKelasDiklat->jumlah_kelas_diklat,
            'data' => $collectionKelasDiklat,
        ]);
    }

    public function getDataDiklatPerWilayah()
    {
        $dataDiklatPerWilayah = DB::connection('mysql2')->select("
                                select p.propinsi, count(b.prop_id) jumlah_peserta from biodata2 b
                                inner join propinsi p on p.propinsi_id = b.prop_id 
                                group by b.prop_id, p.propinsi order by p.propinsi asc");
        $collectionDiklatPerWilayah = collect($dataDiklatPerWilayah);

        $dataGik = DB::connection('mysql2')->select("SELECT COUNT(nama_lengkap) AS jumlah_peserta FROM biodata2 WHERE nama_lengkap != 'NULL'");
        $collectionDataGik = collect($dataGik)->first();

        return response()->json([
            'jumlah_peserta' => $collectionDataGik->jumlah_peserta,
            'data' => $collectionDiklatPerWilayah,
        ]);
    }
}
