<?php

namespace App\Http\Controllers\Guest;

use App\Models\Visitor;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use App\Models\PerusahaanMitra;
use App\Http\Controllers\Controller;

class BerandaController extends Controller
{
    public function getData()
    {
        $pageOne = PerusahaanMitra::whereBetween('urutan', [1, 8])->orderBy('urutan', 'ASC')->get();
        $pageTwo = PerusahaanMitra::whereBetween('urutan', [9, 14])->orderBy('urutan', 'ASC')->get();

        $testimoni = Testimoni::all();
        $jumlahVisitor = Visitor::count();
        return view('guest.beranda', compact('pageOne','pageTwo','testimoni','jumlahVisitor'));
    }

    public function getTestimoni()
    {
    }
}
