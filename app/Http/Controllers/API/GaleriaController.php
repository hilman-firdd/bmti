<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kompetensi;
use App\Models\Keahlian;

class GaleriaController extends Controller
{
    public function getKategoriKeahlian()
    {
        $data = Kompetensi::all();
        return response()->json([
            'data' => $data,
        ]);
    }

    public function getKategoriKeahlianById($id)
    {
        $data = Kompetensi::find($id);
        return response()->json([
            'data' => $data,
        ]);
    }

    public function getKompetensiKeahlian()
    {
        $data = Keahlian::all();
        return response()->json([
            'data' => $data,
        ]);
    }

    public function getKompetensiKeahlianFilterById($id)
    {
        $data = Keahlian::find($id);
        return response()->json([
            'data' => $data,
        ]);
    }

    public function getKompetensiKeahlianFilterByKategori($kategori)
    {
        $data = Keahlian::where('id_kompetensi',$kategori)->get();
        return response()->json([
            'data' => $data,
        ]);
    }
}
