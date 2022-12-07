<?php

namespace App\Http\Controllers;

use App\Models\KategoriKursus;
use App\Models\KelompokKeahlian;
use App\Models\Quiz;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PertanyaanQuizImport;

class PertanyaanController extends Controller
{
    public function index()
    {
        $kelKeahlian = KelompokKeahlian::all();
        $data = DB::table('m_pertanyaan')->select('m_pertanyaan.*', 'm_kelompok_keahlian.id as kelompok_keahlian_id', 'm_kelompok_keahlian.nama')
                ->join('m_kelompok_keahlian', 'm_kelompok_keahlian.id', '=', 'm_pertanyaan.kelompok_keahlian_id')
                ->get();
        return view('admin.pertanyaan.index', compact('data','kelKeahlian'));
    }
    public function create()
    {
        $kelKeahlian = KelompokKeahlian::all();
        return view('admin.pertanyaan.create', compact('kelKeahlian'));
    }
    public function store(Request $request)
    {
        $image = $request->file('gambar');
        $a = null;
        $b = null;
        $c = null;
        $d = null;
        $e = null;
        $f = null;
        $g = null;
        $h = null;
        $i = null;
        $j = null;
        $k = null;
        if($request->pilihan_a != null) {
            $a = $request->pilihan_a;
        }
        if($request->pilihan_b != null) {
            $b = $request->pilihan_b;
        }
        if($request->pilihan_c != null) {
            $c = $request->pilihan_c;
        }
        if($request->pilihan_d != null) {
            $d = $request->pilihan_d;
        }
        if($request->pilihan_e != null) {
            $e = $request->pilihan_e;
        }
        if($request->pilihan_f != null) {
            $f = $request->pilihan_f;
        }
        if($request->pilihan_g != null) {
            $g = $request->pilihan_g;
        }
        if($request->pilihan_h != null) {
            $h = $request->pilihan_h;
        }
        if($request->pilihan_i != null) {
            $i = $request->pilihan_i;
        }
        if($request->pilihan_j != null) {
            $j = $request->pilihan_j;
        }
        if($request->pilihan_k != null) {
            $k = $request->pilihan_k;
        }
        $imageName = "";
        if($image) {
            $imageName = $image->getClientOriginalName();
        }

        $data = Pertanyaan::create([
            'quiz_id' => $request->quiz_id,
            'pertanyaan' => $request->pertanyaan,
            'gambar' => $imageName,
            'pilihan_a' => $a,
            'pilihan_b' => $b,
            'pilihan_c' => $c,
            'pilihan_d' => $d,
            'pilihan_e' => $e,
            'pilihan_f' => $f,
            'pilihan_g' => $g,
            'pilihan_h' => $h,
            'pilihan_i' => $i,
            'pilihan_j' => $j,
            'pilihan_k' => $k,
            'jawaban' => $request->jawaban
        ]);
        if($request->file('gambar')) {
            $image->move(public_path('public/images'), $imageName);
        }

        return redirect()->route('quiz.edit', [$request->quiz_id]);
    }
    public function edit($id)
    {
        $data = Pertanyaan::find($id);
        $kelKeahlian = KelompokKeahlian::all();
        return view('admin.pertanyaan.edit', compact(['data', 'kelKeahlian']));
    }
    public function update(Request $request, $id)
    {
        $image = $request->file('gambar');
        $imageName = "";
        if($image) {
            $imageName = $image->getClientOriginalName();
        }

        $a = null;
        $b = null;
        $c = null;
        $d = null;
        $e = null;
        $f = null;
        $g = null;
        $h = null;
        $i = null;
        $j = null;
        $k = null;
        if($request->pilihan_a != null) {
            $a = $request->pilihan_a;
        }
        if($request->pilihan_b != null) {
            $b = $request->pilihan_b;
        }
        if($request->pilihan_c != null) {
            $c = $request->pilihan_c;
        }
        if($request->pilihan_d != null) {
            $d = $request->pilihan_d;
        }
        if($request->pilihan_e != null) {
            $e = $request->pilihan_e;
        }
        if($request->pilihan_f != null) {
            $f = $request->pilihan_f;
        }
        if($request->pilihan_g != null) {
            $g = $request->pilihan_g;
        }
        if($request->pilihan_h != null) {
            $h = $request->pilihan_h;
        }
        if($request->pilihan_i != null) {
            $i = $request->pilihan_i;
        }
        if($request->pilihan_j != null) {
            $j = $request->pilihan_j;
        }
        if($request->pilihan_k != null) {
            $k = $request->pilihan_k;
        }
        
        $jawab = '';
        if($request->pilihan == 'a') {
            $jawab = $request->pilihan_a;
        }elseif($request->pilihan == 'b') {
            $jawab = $request->pilihan_b;
        }elseif($request->pilihan == 'c'){
            $jawab = $request->pilihan_c;
        }elseif($request->pilihan == 'd'){
            $jawab = $request->pilihan_d;
        }elseif($request->pilihan == 'e'){
            $jawab = $request->pilihan_e;
        }elseif($request->pilihan == 'f'){
            $jawab = $request->pilihan_f;
        }elseif($request->pilihan == 'g'){
            $jawab = $request->pilihan_g;
        }elseif($request->pilihan == 'h'){
            $jawab = $request->pilihan_h;
        }elseif($request->pilihan == 'i'){
            $jawab = $request->pilihan_i;
        }elseif($request->pilihan == 'j'){
            $jawab = $request->pilihan_j;
        }elseif($request->pilihan == 'k'){
            $jawab = $request->pilihan_k;
        }

        $data = Pertanyaan::find($id);

        $data->update([
            'kelompok_keahlian_id' => $request->kelompok_keahlian_id,
            'pertanyaan' => $request->pertanyaan,
            'gambar' => $imageName,
            'pilihan_a' => $a == null ? '' : $a,
            'pilihan_b' => $b == null ? '' : $b,
            'pilihan_c' => $c == null ? '' : $c,
            'pilihan_d' => $d == null ? '' : $d,
            'pilihan_e' => $e == null ? '' : $e,
            'pilihan_f' => $f == null ? '' : $f,
            'pilihan_g' => $g == null ? '' : $g,
            'pilihan_h' => $h == null ? '' : $h,
            'pilihan_i' => $i == null ? '' : $i,
            'pilihan_j' => $j == null ? '' : $j,
            'pilihan_k' => $k == null ? '' : $k,
            'jawaban' => $jawab
        ]);
        if($request->file('gambar')) {
            $image->move(public_path('public/images'), $imageName);
        }

        return redirect()->back();
    }
    public function delete($id)
    {

        $data = Pertanyaan::find($id);
        $data->delete();

        return redirect()->back();
    
    }

    public function importPertanyaan(Request $request){

        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        $nama_file = rand().$file->getClientOriginalName();

        $file->move('file_import',$nama_file);
        Excel::import(new PertanyaanQuizImport($request->quizId), public_path('/file_import/'.$nama_file));

        return redirect()->back();
    }

    public function downloadTemplateSoal()
    {

        $file = public_path('files/templates/template-import-soal.xlsx');

        return response()->download($file);
    }

    public function getPertanyaanById(Request $request){

        $id = $request->search;
        $data = Pertanyaan::find($id);

        return response()->json($data);
    }
}