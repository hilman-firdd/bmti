<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Topik;
use App\Models\Kursus;
use App\Models\KursusPeserta;

class KursusPesertaController extends Controller
{
    public function katalogPelatihan()
    {
        $kelompokKeahlian = DB::table('m_kelompok_keahlian')->get();

        $data = DB::table('t_kursus')->select('t_kursus.*', 'm_kelompok_keahlian.nama as kategori_kursus')
            ->join('m_kelompok_keahlian', 'm_kelompok_keahlian.id', '=', 't_kursus.kelompok_keahlian_id')
            ->get();
            
        $id_peserta = DB::table('m_peserta')->where('user_id', auth()->user()->id)->first();

        return view('admin.dashboard.peserta.katalogPelatihan', compact('data', 'id_peserta', 'kelompokKeahlian'));
    }

    public function detailPelatihan($id)
    {
        $id_peserta = DB::table('m_peserta')->where('user_id', auth()->user()->id)->first();
        $checkEnroll = $this->checkEnroll($this->getIdPeserta(), $id);

        $data = DB::table('t_kursus')->select('t_kursus.*', 'm_kelompok_keahlian.nama as kategori_kursus')
            ->join('m_kelompok_keahlian', 'm_kelompok_keahlian.id', '=', 't_kursus.kelompok_keahlian_id')
            ->get();

        $pelatihan = DB::table('t_kursus')
            ->select('t_kursus.*', 'm_kelompok_keahlian.nama as kategori_kursus')
            ->join('m_kelompok_keahlian', 'm_kelompok_keahlian.id', '=', 't_kursus.kelompok_keahlian_id')
            ->first();

        $topiks  = Topik::where('kursus_id', $id)->get();
        $pelatihan = Kursus::where('id', $id)->first();

        $topikQuiz = DB::table('t_topik')->select('t_quiz.id as quiz_id', 't_quiz.judul', 't_topik_quiz.topik_id')
            ->join('t_topik_quiz', 't_topik_quiz.topik_id', '=', 't_topik.id')
            ->join('t_quiz', 't_quiz.id', '=', 't_topik_quiz.quiz_id')
            ->where('t_topik.kursus_id', $id)
            ->get();

        $konten = DB::table('t_topik')
            ->join('t_topik_konten', 't_topik.id', '=', 't_topik_konten.topik_id')
            ->join('t_konten', 't_konten.id', '=', 't_topik_konten.konten_id')
            ->where('kursus_id', $id)
            ->get();

        return view('admin.dashboard.peserta.detailPelatihan', compact('pelatihan', 'topiks', 'pelatihan', 'topikQuiz', 'konten', 'data','checkEnroll', 'id_peserta'));
    }

    public function enrollPelatihan($idPelatihan)
    {
        $userdata = DB::table('users')
            ->select('m_peserta.id')
            ->join('m_peserta', 'm_peserta.user_id', '=', 'users.id')
            ->where('users.id', auth()->user()->id)
            ->first();

        DB::table('t_kursus_peserta')->insert([
            'kursus_id' => $idPelatihan,
            'peserta_id' => $this->getIdPeserta(),
            'tanggal_mulai' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back();
    }

    public function enrolledPelatihan()
    {
        $id_peserta = DB::table('m_peserta')->where('user_id', auth()->user()->id)->first();
        $data = DB::table('t_kursus')->select('t_kursus.*', 'm_kelompok_keahlian.nama as kategori_kursus')
            ->join('m_kelompok_keahlian', 'm_kelompok_keahlian.id', '=', 't_kursus.kelompok_keahlian_id')
            ->join('t_kursus_peserta', 't_kursus_peserta.kursus_id','=','t_kursus.id')
            ->where('t_kursus_peserta.peserta_id', $this->getIdPeserta())
            ->get();

        return view('admin.dashboard.peserta.enrolledPelatihan', compact('data', 'id_peserta'));
    }

    public function checkEnroll($idPeserta, $idPelatihan)
    {
        $data = DB::table('t_kursus_peserta')->where('peserta_id', $idPeserta)->where('kursus_id', $idPelatihan)->first();

        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function getIdPeserta()
    {
        $userdata = DB::table('users')
            ->select('m_peserta.id')
            ->join('m_peserta', 'm_peserta.user_id', '=', 'users.id')
            ->where('users.id', auth()->user()->id)
            ->first();
        if($userdata){
            return $userdata->id;
        }else{
            return 0;
        }
        
    }

    //Search 

    public function getDataPelatihan(Request $request){

        $data = DB::table('t_kursus')->select('t_kursus.*', 'm_kelompok_keahlian.nama as kategori_kursus')
            ->join('m_kelompok_keahlian', 'm_kelompok_keahlian.id', '=', 't_kursus.kelompok_keahlian_id')
            ->where('t_kursus.judul', 'like', '%'.$request->search.'%')
            ->get();

        return response()->json([
            'data' => $data,
        ]); 
    }
}