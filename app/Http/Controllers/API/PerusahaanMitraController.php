<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PerusahaanMitra;

class PerusahaanMitraController extends Controller
{
    public function getDataPerusahaanMitra()
    { 
        $data = PerusahaanMitra::all();
        return response()->json([
            'data' => $data,
        ]);
    }
}