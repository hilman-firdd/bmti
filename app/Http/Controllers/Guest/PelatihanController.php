<?php

namespace App\Http\Controllers\Guest;

use App\Models\Quiz;
use App\Models\Topik;
use App\Models\Kursus;
use App\Models\Peserta;
use Barryvdh\DomPDF\PDF;
use App\Models\Testimoni;
use App\Models\TopikQuiz;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use App\Models\KursusPeserta;
use PhpOffice\PhpWord\PhpWord;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use PhpOffice\PhpWord\Element\Table;
use PhpOffice\PhpWord\TemplateProcessor;
use App\Models\LogEnrolledPesertaPelatihan;

class PelatihanController extends Controller
{
    public function index()
    {
        $data = DB::table('t_kursus')->select('t_kursus.*', 'm_kelompok_keahlian.nama as kategori_kursus')
            ->join('m_kelompok_keahlian', 'm_kelompok_keahlian.id', '=', 't_kursus.kelompok_keahlian_id')
            ->get();

        return view('guest.pelatihan.index', compact('data'));
    }

    public function getDetailPelatihan($id)
    {
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

        return view('guest.pelatihan.pelatihan_by_kategori', compact('topiks', 'pelatihan', 'topikQuiz', 'konten', 'data'));
    }

    public function getTopikPembelajaran($pelatihanId, $topikId)
    {
        if (auth()->user() == null) {
            return redirect('/login');
        };

        $pelatihan = DB::table('t_kursus')
            ->select('t_kursus.*', 'm_kelompok_keahlian.nama as kategori_kursus')
            ->join('m_kelompok_keahlian', 'm_kelompok_keahlian.id', '=', 't_kursus.kelompok_keahlian_id')
            ->first();

        $topiks  = Topik::where('kursus_id', $pelatihanId)->get();
        $pelatihan = Kursus::where('id', $pelatihanId)->first();

        $singleTopik = Topik::where('id', $topikId)->first();

        $topikQuiz = DB::table('t_topik')
            ->select('t_quiz.id as quiz_id', 't_quiz.judul', 't_topik_quiz.topik_id', 't_peserta_quiz.status')
            ->join('t_topik_quiz', 't_topik_quiz.topik_id', '=', 't_topik.id')
            ->join('t_quiz', 't_quiz.id', '=', 't_topik_quiz.quiz_id')
            ->leftJoin('t_peserta_quiz', 't_peserta_quiz.topik_id', '=', 't_topik_quiz.topik_id')
            ->where('t_topik.kursus_id', $pelatihanId)
            ->get();

        $konten = DB::table('t_topik')
            ->select('t_topik_konten.topik_id', 't_konten.id', 't_konten.judul', 't_peserta_konten.status')
            ->join('t_topik_konten', 't_topik.id', '=', 't_topik_konten.topik_id')
            ->join('t_konten', 't_konten.id', '=', 't_topik_konten.konten_id')
            ->leftJoin('t_peserta_konten', 't_peserta_konten.topik_id', '=', 't_topik_konten.topik_id')
            ->where('t_topik.kursus_id', $pelatihanId)
            ->get();

        $totalTopik = DB::table('t_topik')
        ->select('t_quiz.id as quiz_id', 't_quiz.judul', 't_topik_quiz.topik_id', 't_peserta_quiz.status')
        ->join('t_topik_quiz', 't_topik_quiz.topik_id', '=', 't_topik.id')
        ->join('t_quiz', 't_quiz.id', '=', 't_topik_quiz.quiz_id')
        ->leftJoin('t_peserta_quiz', 't_peserta_quiz.topik_id', '=', 't_topik_quiz.topik_id')
        ->where('t_topik.kursus_id', $pelatihanId)
        ->where('t_peserta_quiz.status', 1)
        ->count();

        $totalKonten = DB::table('t_topik')
        ->select('t_topik_konten.topik_id', 't_konten.id', 't_konten.judul', 't_peserta_konten.status')
        ->join('t_topik_konten', 't_topik.id', '=', 't_topik_konten.topik_id')
        ->join('t_konten', 't_konten.id', '=', 't_topik_konten.konten_id')
        ->leftJoin('t_peserta_konten', 't_peserta_konten.topik_id', '=', 't_topik_konten.topik_id')
        ->where('t_topik.kursus_id', $pelatihanId)
        ->where('t_peserta_konten.status', 1)
        ->count();

        $totalTopikelse = DB::table('t_topik')
        ->select('t_quiz.id as quiz_id', 't_quiz.judul', 't_topik_quiz.topik_id', 't_peserta_quiz.status')
        ->join('t_topik_quiz', 't_topik_quiz.topik_id', '=', 't_topik.id')
        ->join('t_quiz', 't_quiz.id', '=', 't_topik_quiz.quiz_id')
        ->leftJoin('t_peserta_quiz', 't_peserta_quiz.topik_id', '=', 't_topik_quiz.topik_id')
        ->where('t_topik.kursus_id', $pelatihanId)
        ->where('t_peserta_quiz.status', 0)
        ->count();

        $totalKontenelse = DB::table('t_topik')
        ->select('t_topik_konten.topik_id', 't_konten.id', 't_konten.judul', 't_peserta_konten.status')
        ->join('t_topik_konten', 't_topik.id', '=', 't_topik_konten.topik_id')
        ->join('t_konten', 't_konten.id', '=', 't_topik_konten.konten_id')
        ->leftJoin('t_peserta_konten', 't_peserta_konten.topik_id', '=', 't_topik_konten.topik_id')
        ->where('t_topik.kursus_id', $pelatihanId)
        ->where('t_peserta_konten.status', 0)
        ->count();
        
        $sumDonut = $totalTopik + $totalKonten;
        $elseDonut =  $totalTopikelse + $totalKontenelse;

        $sumDonutR = $totalTopik + $totalKonten;
        $elseDonutR =  $totalTopikelse + $totalKontenelse;

        return view('pembelajaran.index', compact('pelatihan', 'topiks', 'topikQuiz', 'konten', 'pelatihanId', 'topikId', 'singleTopik','sumDonut','elseDonut','sumDonutR','elseDonutR'));
    }

    public function getKontenPembelajaran($pelatihanId, $topikId, $kontenId)
    {

        if (auth()->user() == null) {
            return redirect('/login');
        };

        $pelatihan = DB::table('t_kursus')
            ->select('t_kursus.*', 'm_kelompok_keahlian.nama as kategori_kursus')
            ->join('m_kelompok_keahlian', 'm_kelompok_keahlian.id', '=', 't_kursus.kelompok_keahlian_id')
            ->first();

        $topiks  = Topik::where('kursus_id', $pelatihanId)->get();
        $pelatihan = Kursus::where('id', $pelatihanId)->first();

        $topikQuiz = DB::table('t_topik')
            ->select('t_quiz.id as quiz_id', 't_quiz.judul', 't_topik_quiz.topik_id', 't_peserta_quiz.status')
            ->join('t_topik_quiz', 't_topik_quiz.topik_id', '=', 't_topik.id')
            ->join('t_quiz', 't_quiz.id', '=', 't_topik_quiz.quiz_id')
            ->leftJoin('t_peserta_quiz', 't_peserta_quiz.topik_id', '=', 't_topik_quiz.topik_id')
            ->where('t_topik.kursus_id', $pelatihanId)
            ->get();

            // dd($topikQuiz);

        $konten = DB::table('t_topik')
            ->select('t_topik_konten.topik_id', 't_konten.id', 't_konten.judul', 't_peserta_konten.status')
            ->join('t_topik_konten', 't_topik.id', '=', 't_topik_konten.topik_id')
            ->join('t_konten', 't_konten.id', '=', 't_topik_konten.konten_id')
            ->leftJoin('t_peserta_konten', 't_peserta_konten.topik_id', '=', 't_topik_konten.topik_id')
            ->where('t_topik.kursus_id', $pelatihanId)
            ->get();

        $data = DB::table('t_kursus')
            ->select('t_konten.*', 't_topik.id as topik_id')
            ->join('t_topik', 't_kursus.id', '=', 't_topik.kursus_id')
            ->join('t_topik_konten', 't_topik.id', '=', 't_topik_konten.topik_id')
            ->join('t_konten', 't_konten.id', '=', 't_topik_konten.konten_id')
            ->where('t_topik_konten.topik_id', $topikId)
            ->where('t_topik_konten.konten_id', $kontenId)
            ->first();

            $totalTopik = DB::table('t_topik')
            ->select('t_quiz.id as quiz_id', 't_quiz.judul', 't_topik_quiz.topik_id', 't_peserta_quiz.status')
            ->join('t_topik_quiz', 't_topik_quiz.topik_id', '=', 't_topik.id')
            ->join('t_quiz', 't_quiz.id', '=', 't_topik_quiz.quiz_id')
            ->leftJoin('t_peserta_quiz', 't_peserta_quiz.topik_id', '=', 't_topik_quiz.topik_id')
            ->where('t_topik.kursus_id', $pelatihanId)
            ->where('t_peserta_quiz.status', 1)
            ->count();
    
            $totalKonten = DB::table('t_topik')
            ->select('t_topik_konten.topik_id', 't_konten.id', 't_konten.judul', 't_peserta_konten.status')
            ->join('t_topik_konten', 't_topik.id', '=', 't_topik_konten.topik_id')
            ->join('t_konten', 't_konten.id', '=', 't_topik_konten.konten_id')
            ->leftJoin('t_peserta_konten', 't_peserta_konten.topik_id', '=', 't_topik_konten.topik_id')
            ->where('t_topik.kursus_id', $pelatihanId)
            ->where('t_peserta_konten.status', 1)
            ->count();
    
            $totalTopikelse = DB::table('t_topik')
            ->select('t_quiz.id as quiz_id', 't_quiz.judul', 't_topik_quiz.topik_id', 't_peserta_quiz.status')
            ->join('t_topik_quiz', 't_topik_quiz.topik_id', '=', 't_topik.id')
            ->join('t_quiz', 't_quiz.id', '=', 't_topik_quiz.quiz_id')
            ->leftJoin('t_peserta_quiz', 't_peserta_quiz.topik_id', '=', 't_topik_quiz.topik_id')
            ->where('t_topik.kursus_id', $pelatihanId)
            ->where('t_peserta_quiz.status', 0)
            ->count();
    
            $totalKontenelse = DB::table('t_topik')
            ->select('t_topik_konten.topik_id', 't_konten.id', 't_konten.judul', 't_peserta_konten.status')
            ->join('t_topik_konten', 't_topik.id', '=', 't_topik_konten.topik_id')
            ->join('t_konten', 't_konten.id', '=', 't_topik_konten.konten_id')
            ->leftJoin('t_peserta_konten', 't_peserta_konten.topik_id', '=', 't_topik_konten.topik_id')
            ->where('t_topik.kursus_id', $pelatihanId)
            ->where('t_peserta_konten.status', 0)
            ->count();
            
            $sumDonut = $totalTopik + $totalKonten;
            $elseDonut =  $totalTopikelse + $totalKontenelse;

            $sumDonutR = $totalTopik + $totalKonten;
            $elseDonutR =  $totalTopikelse + $totalKontenelse;

        $cekKontenSelesai = $this->cekKontenSelesai($pelatihanId, $topikId, $kontenId);

        // dd($konten);

        return view('pembelajaran.konten', compact('pelatihan', 'topiks', 'topikQuiz', 'konten', 'data', 'pelatihanId', 'topikId', 'cekKontenSelesai', 'kontenId','sumDonut', 'elseDonut','sumDonutR','elseDonutR'));
    }

    public function getQuizPembelajaran($pelatihanId, $topikId, $quizId)
    {

        if (auth()->user() == null) {
            return redirect('/login');
        };

        $data = DB::table('t_kursus')->select('t_kursus.*', 'm_kelompok_keahlian.nama as kategori_kursus')
            ->join('m_kelompok_keahlian', 'm_kelompok_keahlian.id', '=', 't_kursus.kelompok_keahlian_id')
            ->get();

        $pelatihan = DB::table('t_kursus')
            ->select('t_kursus.*', 'm_kelompok_keahlian.nama as kategori_kursus')
            ->join('m_kelompok_keahlian', 'm_kelompok_keahlian.id', '=', 't_kursus.kelompok_keahlian_id')
            ->first();

        $topiks  = Topik::where('kursus_id', $pelatihanId)->get();
        $pelatihan = Kursus::where('id', $pelatihanId)->first();
        $dataQuiz = DB::table('t_quiz')->where('id', $quizId)->first();
        $configurasiQuiz = DB::table('t_topik_quiz')->where('topik_id', $topikId)->where('quiz_id', $quizId)->first();

        $topikQuiz = DB::table('t_topik')
            ->select('t_quiz.id as quiz_id', 't_quiz.judul', 't_topik_quiz.topik_id', 't_peserta_quiz.status')
            ->join('t_topik_quiz', 't_topik_quiz.topik_id', '=', 't_topik.id')
            ->join('t_quiz', 't_quiz.id', '=', 't_topik_quiz.quiz_id')
            ->leftJoin('t_peserta_quiz', 't_peserta_quiz.topik_id', '=', 't_topik_quiz.topik_id')
            ->where('t_topik.kursus_id', $pelatihanId)
            ->get();

        //dd($topikQuiz);

        $konten = DB::table('t_topik')
            ->select('t_topik_konten.topik_id', 't_konten.id', 't_konten.judul', 't_peserta_konten.status')
            ->join('t_topik_konten', 't_topik.id', '=', 't_topik_konten.topik_id')
            ->join('t_konten', 't_konten.id', '=', 't_topik_konten.konten_id')
            ->leftJoin('t_peserta_konten', 't_peserta_konten.topik_id', '=', 't_topik_konten.topik_id')
            ->where('t_topik.kursus_id', $pelatihanId)
            ->get();
        
            $totalTopik = DB::table('t_topik')
            ->select('t_quiz.id as quiz_id', 't_quiz.judul', 't_topik_quiz.topik_id', 't_peserta_quiz.status')
            ->join('t_topik_quiz', 't_topik_quiz.topik_id', '=', 't_topik.id')
            ->join('t_quiz', 't_quiz.id', '=', 't_topik_quiz.quiz_id')
            ->leftJoin('t_peserta_quiz', 't_peserta_quiz.topik_id', '=', 't_topik_quiz.topik_id')
            ->where('t_topik.kursus_id', $pelatihanId)
            ->where('t_peserta_quiz.status', 1)
            ->count();
    
            $totalKonten = DB::table('t_topik')
            ->select('t_topik_konten.topik_id', 't_konten.id', 't_konten.judul', 't_peserta_konten.status')
            ->join('t_topik_konten', 't_topik.id', '=', 't_topik_konten.topik_id')
            ->join('t_konten', 't_konten.id', '=', 't_topik_konten.konten_id')
            ->leftJoin('t_peserta_konten', 't_peserta_konten.topik_id', '=', 't_topik_konten.topik_id')
            ->where('t_topik.kursus_id', $pelatihanId)
            ->where('t_peserta_konten.status', 1)
            ->count();
    
            $totalTopikelse = DB::table('t_topik')
            ->select('t_quiz.id as quiz_id', 't_quiz.judul', 't_topik_quiz.topik_id', 't_peserta_quiz.status')
            ->join('t_topik_quiz', 't_topik_quiz.topik_id', '=', 't_topik.id')
            ->join('t_quiz', 't_quiz.id', '=', 't_topik_quiz.quiz_id')
            ->leftJoin('t_peserta_quiz', 't_peserta_quiz.topik_id', '=', 't_topik_quiz.topik_id')
            ->where('t_topik.kursus_id', $pelatihanId)
            ->where('t_peserta_quiz.status', 0)
            ->count();
    
            $totalKontenelse = DB::table('t_topik')
            ->select('t_topik_konten.topik_id', 't_konten.id', 't_konten.judul', 't_peserta_konten.status')
            ->join('t_topik_konten', 't_topik.id', '=', 't_topik_konten.topik_id')
            ->join('t_konten', 't_konten.id', '=', 't_topik_konten.konten_id')
            ->leftJoin('t_peserta_konten', 't_peserta_konten.topik_id', '=', 't_topik_konten.topik_id')
            ->where('t_topik.kursus_id', $pelatihanId)
            ->where('t_peserta_konten.status', 0)
            ->count();
            
            $sumDonut = $totalTopik + $totalKonten;
            $elseDonut =  $totalTopikelse + $totalKontenelse;

            $sumDonutR = $totalTopik + $totalKonten;
            $elseDonutR =  $totalTopikelse + $totalKontenelse;

        $quiz = Quiz::find($topikId);
        $pertanyaan = Pertanyaan::where('quiz_id', $quizId)->get();
        return view('pembelajaran.quiz', compact('pertanyaan', 'pelatihan', 'topiks', 'topikQuiz', 'konten', 'data', 'pelatihanId', 'topikId', 'quizId', 'dataQuiz', 'configurasiQuiz','sumDonut','elseDonut','sumDonutR','elseDonutR'));
    }

    public function getHasilQuizPembelajaran($pelatihanId, $topikId, $quizId)
    {

        if (auth()->user() == null) {
            return redirect('/login');
        };

        $data = DB::table('t_kursus')->select('t_kursus.*', 'm_kelompok_keahlian.nama as kategori_kursus')
            ->join('m_kelompok_keahlian', 'm_kelompok_keahlian.id', '=', 't_kursus.kelompok_keahlian_id')
            ->get();

        $pelatihan = DB::table('t_kursus')
            ->select('t_kursus.*', 'm_kelompok_keahlian.nama as kategori_kursus')
            ->join('m_kelompok_keahlian', 'm_kelompok_keahlian.id', '=', 't_kursus.kelompok_keahlian_id')
            ->first();

        $topiks  = Topik::where('kursus_id', $pelatihanId)->get();
        $pelatihan = Kursus::where('id', $pelatihanId)->first();
        $dataQuiz = DB::table('t_quiz')->where('id', $quizId)->first();
        $configurasiQuiz = DB::table('t_topik_quiz')->where('topik_id', $topikId)->where('quiz_id', $quizId)->first();

        $topikQuiz = DB::table('t_topik')
            ->select('t_quiz.id as quiz_id', 't_quiz.judul', 't_topik_quiz.topik_id', 't_peserta_quiz.status')
            ->join('t_topik_quiz', 't_topik_quiz.topik_id', '=', 't_topik.id')
            ->join('t_quiz', 't_quiz.id', '=', 't_topik_quiz.quiz_id')
            ->leftJoin('t_peserta_quiz', 't_peserta_quiz.topik_id', '=', 't_topik_quiz.topik_id')
            ->where('t_topik.kursus_id', $pelatihanId)
            ->get();

        $konten = DB::table('t_topik')
            ->select('t_topik_konten.topik_id', 't_konten.id', 't_konten.judul', 't_peserta_konten.status')
            ->join('t_topik_konten', 't_topik.id', '=', 't_topik_konten.topik_id')
            ->join('t_konten', 't_konten.id', '=', 't_topik_konten.konten_id')
            ->leftJoin('t_peserta_konten', 't_peserta_konten.topik_id', '=', 't_topik_konten.topik_id')
            ->where('t_topik.kursus_id', $pelatihanId)
            ->get();

            $totalTopik = DB::table('t_topik')
            ->select('t_quiz.id as quiz_id', 't_quiz.judul', 't_topik_quiz.topik_id', 't_peserta_quiz.status')
            ->join('t_topik_quiz', 't_topik_quiz.topik_id', '=', 't_topik.id')
            ->join('t_quiz', 't_quiz.id', '=', 't_topik_quiz.quiz_id')
            ->leftJoin('t_peserta_quiz', 't_peserta_quiz.topik_id', '=', 't_topik_quiz.topik_id')
            ->where('t_topik.kursus_id', $pelatihanId)
            ->where('t_peserta_quiz.status', 1)
            ->count();
    
            $totalKonten = DB::table('t_topik')
            ->select('t_topik_konten.topik_id', 't_konten.id', 't_konten.judul', 't_peserta_konten.status')
            ->join('t_topik_konten', 't_topik.id', '=', 't_topik_konten.topik_id')
            ->join('t_konten', 't_konten.id', '=', 't_topik_konten.konten_id')
            ->leftJoin('t_peserta_konten', 't_peserta_konten.topik_id', '=', 't_topik_konten.topik_id')
            ->where('t_topik.kursus_id', $pelatihanId)
            ->where('t_peserta_konten.status', 1)
            ->count();
    
            $totalTopikelse = DB::table('t_topik')
            ->select('t_quiz.id as quiz_id', 't_quiz.judul', 't_topik_quiz.topik_id', 't_peserta_quiz.status')
            ->join('t_topik_quiz', 't_topik_quiz.topik_id', '=', 't_topik.id')
            ->join('t_quiz', 't_quiz.id', '=', 't_topik_quiz.quiz_id')
            ->leftJoin('t_peserta_quiz', 't_peserta_quiz.topik_id', '=', 't_topik_quiz.topik_id')
            ->where('t_topik.kursus_id', $pelatihanId)
            ->where('t_peserta_quiz.status', 0)
            ->count();
    
            $totalKontenelse = DB::table('t_topik')
            ->select('t_topik_konten.topik_id', 't_konten.id', 't_konten.judul', 't_peserta_konten.status')
            ->join('t_topik_konten', 't_topik.id', '=', 't_topik_konten.topik_id')
            ->join('t_konten', 't_konten.id', '=', 't_topik_konten.konten_id')
            ->leftJoin('t_peserta_konten', 't_peserta_konten.topik_id', '=', 't_topik_konten.topik_id')
            ->where('t_topik.kursus_id', $pelatihanId)
            ->where('t_peserta_konten.status', 0)
            ->count();
            
            $sumDonut = $totalTopik + $totalKonten;
            $elseDonut =  $totalTopikelse + $totalKontenelse;

            $sumDonutR = $totalTopik + $totalKonten;
            $elseDonutR =  $totalTopikelse + $totalKontenelse;

        $quiz = Quiz::find($topikId);
        $pertanyaan = Pertanyaan::where('quiz_id', $quizId)->get();
        return view('pembelajaran.quiz', compact('pertanyaan', 'pelatihan', 'topiks', 'topikQuiz', 'konten', 'data', 'pelatihanId', 'topikId', 'quizId', 'dataQuiz', 'configurasiQuiz', 'sumDonut', 'elseDonut','sumDonutR','elseDonutR'));
    }

    public function tandaiKontenSelesai($pelatihanId, $topikId, $kontenId)
    {
        $userdata = DB::table('users')
            ->select('m_peserta.id')
            ->join('m_peserta', 'm_peserta.user_id', '=', 'users.id')
            ->where('users.id', auth()->user()->id)
            ->first();


        $kursusPesertaData = KursusPeserta::where('peserta_id', $userdata->id)->first();

        $pesertaKonten = DB::table('t_peserta_konten')->select('konten_id')
            ->where('konten_id', $kontenId)
            ->get()->toArray();

        if($pesertaKonten) {
            DB::table('t_peserta_konten')->where('konten_id', $kontenId)->update([
                'kursus_peserta_id' => $kursusPesertaData->id,
                'topik_id' => $topikId,
                'konten_id' => $kontenId,
                'status' => 1,
                'tanggal_selesai' => now(),
            ]);
        }else{
            DB::table('t_peserta_konten')->insertOrIgnore([
                'kursus_peserta_id' => $kursusPesertaData->id,
                'topik_id' => $topikId,
                'konten_id' => $kontenId,
                'status' => 0,
                'tanggal_selesai' => now(),
            ]); 
        }

        return redirect()->back();
    }

    public function tandaiQuizSelesai($pelatihanId, $topikId, $quizId, Request $request)
    {
        $jawaban = $request->jawaban;

        $userdata = DB::table('users')
            ->select('m_peserta.id')
            ->join('m_peserta', 'm_peserta.user_id', '=', 'users.id')
            ->where('users.id', auth()->user()->id)
            ->first();

        $pertanyaanJawaban = DB::table('m_pertanyaan')->where('quiz_id', $quizId)->get();
        $totalSoal = DB::table('m_pertanyaan')->where('quiz_id', $quizId)->count();

        $kursusPesertaId = DB::table('t_kursus_peserta')->where('kursus_id', $pelatihanId)->where('peserta_id', $userdata->id)->first();
        $counterJawabanBenar = 0;

        // DB::table('t_peserta_quiz')->where('quiz_id', $quizId)->update([
        //     'kursus_peserta_id' => $kursusPesertaId->id,
        //     'topik_id' => $topikId,
        //     'quiz_id' => $quizId,
        //     'nilai_quiz' => 0,
        //     'status' => 1,
        //     'tanggal_selesai' => now(),
        // ]);
        
        $pesertaQuiz = DB::table('t_peserta_quiz')->select('quiz_id')
        ->where('quiz_id', $quizId)
        ->get()->toArray();
        if($pesertaQuiz) {
            DB::table('t_peserta_quiz')->where('quiz_id', $quizId)->update([
                'kursus_peserta_id' => $kursusPesertaId->id,
                'topik_id' => $topikId,
                'quiz_id' => $quizId,
                'nilai_quiz' => 0,
                'status' => 1,
                'tanggal_selesai' => now(),
            ]);
        }else{
            DB::table('t_peserta_quiz')->insertOrIgnore([
                'kursus_peserta_id' => $kursusPesertaId->id,
                'topik_id' => $topikId,
                'quiz_id' => $quizId,
                'nilai_quiz' => 0,
                'status' => 0,
                'tanggal_selesai' => now(),
            ]);
        }

        $pesertaQuizLastId = DB::table('t_peserta_quiz')->orderBy('id', 'DESC')->first();

        foreach ($jawaban as $key => $value) {
            $jawabanBenar = $value['benar'];

            foreach ($pertanyaanJawaban as $pj) {
                if ($pj->id == $key && $pj->jawaban == $jawabanBenar) {
                    $counterJawabanBenar++;
                }
            }

            DB::table('t_peserta_quiz_jawaban')->insert([
                'peserta_quiz_id' => $pesertaQuizLastId->id,
                'pertanyaan_id' => $key,
                'jawaban' => $jawabanBenar
            ]);
        }

        $bobotSoal = (100 / (int)$totalSoal);
        $nilaiAkhir = $bobotSoal * $counterJawabanBenar;

        // dd(round($nilaiAkhir, R));

        DB::table('t_peserta_quiz')->where('id', $pesertaQuizLastId->id)->update([
            'nilai_quiz' => round($nilaiAkhir, 2),
        ]);

        $data = DB::table('t_kursus')->select('t_kursus.*', 'm_kelompok_keahlian.nama as kategori_kursus')
            ->join('m_kelompok_keahlian', 'm_kelompok_keahlian.id', '=', 't_kursus.kelompok_keahlian_id')
            ->get();

        $pelatihan = DB::table('t_kursus')
            ->select('t_kursus.*', 'm_kelompok_keahlian.nama as kategori_kursus')
            ->join('m_kelompok_keahlian', 'm_kelompok_keahlian.id', '=', 't_kursus.kelompok_keahlian_id')
            ->first();

        $topiks  = Topik::where('kursus_id', $pelatihanId)->get();
        $pelatihan = Kursus::where('id', $pelatihanId)->first();
        $dataQuiz = DB::table('t_quiz')->where('id', $quizId)->first();
        $configurasiQuiz = DB::table('t_topik_quiz')->where('topik_id', $topikId)->where('quiz_id', $quizId)->first();

        $topikQuiz = DB::table('t_topik')
            ->select('t_quiz.id as quiz_id', 't_quiz.judul', 't_topik_quiz.topik_id', 't_peserta_quiz.status')
            ->join('t_topik_quiz', 't_topik_quiz.topik_id', '=', 't_topik.id')
            ->join('t_quiz', 't_quiz.id', '=', 't_topik_quiz.quiz_id')
            ->leftJoin('t_peserta_quiz', 't_peserta_quiz.topik_id', '=', 't_topik_quiz.topik_id')
            ->where('t_topik.kursus_id', $pelatihanId)
            ->get();

        $konten = DB::table('t_topik')
            ->select('t_topik_konten.topik_id', 't_konten.id', 't_konten.judul', 't_peserta_konten.status')
            ->join('t_topik_konten', 't_topik.id', '=', 't_topik_konten.topik_id')
            ->join('t_konten', 't_konten.id', '=', 't_topik_konten.konten_id')
            ->leftJoin('t_peserta_konten', 't_peserta_konten.topik_id', '=', 't_topik_konten.topik_id')
            ->where('t_topik.kursus_id', $pelatihanId)
            ->get();

            $totalTopik = DB::table('t_topik')
            ->select('t_quiz.id as quiz_id', 't_quiz.judul', 't_topik_quiz.topik_id', 't_peserta_quiz.status')
            ->join('t_topik_quiz', 't_topik_quiz.topik_id', '=', 't_topik.id')
            ->join('t_quiz', 't_quiz.id', '=', 't_topik_quiz.quiz_id')
            ->leftJoin('t_peserta_quiz', 't_peserta_quiz.topik_id', '=', 't_topik_quiz.topik_id')
            ->where('t_topik.kursus_id', $pelatihanId)
            ->where('t_peserta_quiz.status', 1)
            ->count();
    
            $totalKonten = DB::table('t_topik')
            ->select('t_topik_konten.topik_id', 't_konten.id', 't_konten.judul', 't_peserta_konten.status')
            ->join('t_topik_konten', 't_topik.id', '=', 't_topik_konten.topik_id')
            ->join('t_konten', 't_konten.id', '=', 't_topik_konten.konten_id')
            ->leftJoin('t_peserta_konten', 't_peserta_konten.topik_id', '=', 't_topik_konten.topik_id')
            ->where('t_topik.kursus_id', $pelatihanId)
            ->where('t_peserta_konten.status', 1)
            ->count();
    
            $totalTopikelse = DB::table('t_topik')
            ->select('t_quiz.id as quiz_id', 't_quiz.judul', 't_topik_quiz.topik_id', 't_peserta_quiz.status')
            ->join('t_topik_quiz', 't_topik_quiz.topik_id', '=', 't_topik.id')
            ->join('t_quiz', 't_quiz.id', '=', 't_topik_quiz.quiz_id')
            ->leftJoin('t_peserta_quiz', 't_peserta_quiz.topik_id', '=', 't_topik_quiz.topik_id')
            ->where('t_topik.kursus_id', $pelatihanId)
            ->where('t_peserta_quiz.status', 0)
            ->count();
    
            $totalKontenelse = DB::table('t_topik')
            ->select('t_topik_konten.topik_id', 't_konten.id', 't_konten.judul', 't_peserta_konten.status')
            ->join('t_topik_konten', 't_topik.id', '=', 't_topik_konten.topik_id')
            ->join('t_konten', 't_konten.id', '=', 't_topik_konten.konten_id')
            ->leftJoin('t_peserta_konten', 't_peserta_konten.topik_id', '=', 't_topik_konten.topik_id')
            ->where('t_topik.kursus_id', $pelatihanId)
            ->where('t_peserta_konten.status', 0)
            ->count();
            
            $sumDonut = $totalTopik + $totalKonten;
            $elseDonut =  $totalTopikelse + $totalKontenelse;

            $sumDonutR = $totalTopik + $totalKonten;
            $elseDonutR =  $totalTopikelse + $totalKontenelse;

        $quiz = Quiz::find($topikId);
        $pertanyaan = Pertanyaan::where('quiz_id', $quizId)->get();
        $peserta = Peserta::where('id',$kursusPesertaId->peserta_id)->first();

        // dd($kursusPesertaId->sertifikat_file_name);

        return view('pembelajaran.hasil-quiz', compact('peserta', 'totalSoal', 'counterJawabanBenar', 'pertanyaan', 'pelatihan', 'topiks', 'topikQuiz', 'konten', 'data', 'pelatihanId', 'topikId', 'quizId', 'dataQuiz', 'configurasiQuiz','nilaiAkhir', 'kursusPesertaId','sumDonut','elseDonut','sumDonutR','elseDonutR'));
    }

    public function submitTestimoni($pel, $topik, $quiz, Request $request){
        // dd($request);
        $testimoni = Testimoni::create([
            'nama' => $request->namaPeserta,
            'asal_sekolah' => $request->sekolahPeserta,
            'nama_diklat' => $request->pelatihanNama,
            'testimoni' => $request->testimoni,
            'created_by' => $request->namaPeserta,
            'updated_by' => $request->namaPeserta
        ]);
        $this->generateSertifikat($request->kursusPesertaId, $request->pelatihanId, $request->testimoni);

        return redirect()->route('pembelajaran.quiz.tandaiSelesaii', ['id' => $pel, 'topikId' => $topik, 'quizId' => $quiz]);
    }

    public function tandaiQuizSelesaii($pelatihanId, $topikId, $quizId, Request $request)
    {
        $jawaban = $request->jawaban;

        $userdata = DB::table('users')
            ->select('m_peserta.id')
            ->join('m_peserta', 'm_peserta.user_id', '=', 'users.id')
            ->where('users.id', auth()->user()->id)
            ->first();

        $pertanyaanJawaban = DB::table('m_pertanyaan')->where('quiz_id', $quizId)->get();
        $totalSoal = DB::table('m_pertanyaan')->where('quiz_id', $quizId)->count();

        $kursusPesertaId = DB::table('t_kursus_peserta')->where('kursus_id', $pelatihanId)->where('peserta_id', $userdata->id)->first();
        $counterJawabanBenar = 0;

        $pesertaQuizLastId = DB::table('t_peserta_quiz')->orderBy('id', 'DESC')->first();

        $bobotSoal = (100 / (int)$totalSoal);
        $nilaiAkhir = $bobotSoal * $counterJawabanBenar;

        $data = DB::table('t_kursus')->select('t_kursus.*', 'm_kelompok_keahlian.nama as kategori_kursus')
            ->join('m_kelompok_keahlian', 'm_kelompok_keahlian.id', '=', 't_kursus.kelompok_keahlian_id')
            ->get();

        $pelatihan = DB::table('t_kursus')
            ->select('t_kursus.*', 'm_kelompok_keahlian.nama as kategori_kursus')
            ->join('m_kelompok_keahlian', 'm_kelompok_keahlian.id', '=', 't_kursus.kelompok_keahlian_id')
            ->first();

        $topiks  = Topik::where('kursus_id', $pelatihanId)->get();
        $pelatihan = Kursus::where('id', $pelatihanId)->first();
        $dataQuiz = DB::table('t_quiz')->where('id', $quizId)->first();
        $configurasiQuiz = DB::table('t_topik_quiz')->where('topik_id', $topikId)->where('quiz_id', $quizId)->first();

        $topikQuiz = DB::table('t_topik')
            ->select('t_quiz.id as quiz_id', 't_quiz.judul', 't_topik_quiz.topik_id', 't_peserta_quiz.status')
            ->join('t_topik_quiz', 't_topik_quiz.topik_id', '=', 't_topik.id')
            ->join('t_quiz', 't_quiz.id', '=', 't_topik_quiz.quiz_id')
            ->leftJoin('t_peserta_quiz', 't_peserta_quiz.topik_id', '=', 't_topik_quiz.topik_id')
            ->where('t_topik.kursus_id', $pelatihanId)
            ->get();

        $konten = DB::table('t_topik')
            ->select('t_topik_konten.topik_id', 't_konten.id', 't_konten.judul', 't_peserta_konten.status')
            ->join('t_topik_konten', 't_topik.id', '=', 't_topik_konten.topik_id')
            ->join('t_konten', 't_konten.id', '=', 't_topik_konten.konten_id')
            ->leftJoin('t_peserta_konten', 't_peserta_konten.topik_id', '=', 't_topik_konten.topik_id')
            ->where('t_topik.kursus_id', $pelatihanId)
            ->get();

            $totalTopik = DB::table('t_topik')
            ->select('t_quiz.id as quiz_id', 't_quiz.judul', 't_topik_quiz.topik_id', 't_peserta_quiz.status')
            ->join('t_topik_quiz', 't_topik_quiz.topik_id', '=', 't_topik.id')
            ->join('t_quiz', 't_quiz.id', '=', 't_topik_quiz.quiz_id')
            ->leftJoin('t_peserta_quiz', 't_peserta_quiz.topik_id', '=', 't_topik_quiz.topik_id')
            ->where('t_topik.kursus_id', $pelatihanId)
            ->where('t_peserta_quiz.status', 1)
            ->count();
    
            $totalKonten = DB::table('t_topik')
            ->select('t_topik_konten.topik_id', 't_konten.id', 't_konten.judul', 't_peserta_konten.status')
            ->join('t_topik_konten', 't_topik.id', '=', 't_topik_konten.topik_id')
            ->join('t_konten', 't_konten.id', '=', 't_topik_konten.konten_id')
            ->leftJoin('t_peserta_konten', 't_peserta_konten.topik_id', '=', 't_topik_konten.topik_id')
            ->where('t_topik.kursus_id', $pelatihanId)
            ->where('t_peserta_konten.status', 1)
            ->count();
    
            $totalTopikelse = DB::table('t_topik')
            ->select('t_quiz.id as quiz_id', 't_quiz.judul', 't_topik_quiz.topik_id', 't_peserta_quiz.status')
            ->join('t_topik_quiz', 't_topik_quiz.topik_id', '=', 't_topik.id')
            ->join('t_quiz', 't_quiz.id', '=', 't_topik_quiz.quiz_id')
            ->leftJoin('t_peserta_quiz', 't_peserta_quiz.topik_id', '=', 't_topik_quiz.topik_id')
            ->where('t_topik.kursus_id', $pelatihanId)
            ->where('t_peserta_quiz.status', 0)
            ->count();
    
            $totalKontenelse = DB::table('t_topik')
            ->select('t_topik_konten.topik_id', 't_konten.id', 't_konten.judul', 't_peserta_konten.status')
            ->join('t_topik_konten', 't_topik.id', '=', 't_topik_konten.topik_id')
            ->join('t_konten', 't_konten.id', '=', 't_topik_konten.konten_id')
            ->leftJoin('t_peserta_konten', 't_peserta_konten.topik_id', '=', 't_topik_konten.topik_id')
            ->where('t_topik.kursus_id', $pelatihanId)
            ->where('t_peserta_konten.status', 0)
            ->count();
            
            $sumDonut = $totalTopik + $totalKonten;
            $elseDonut =  $totalTopikelse + $totalKontenelse;

            $sumDonutR = $totalTopik + $totalKonten;
            $elseDonutR =  $totalTopikelse + $totalKontenelse;

        $quiz = Quiz::find($topikId);
        $pertanyaan = Pertanyaan::where('quiz_id', $quizId)->get();
        $peserta = Peserta::where('id',$kursusPesertaId->peserta_id)->first();


        return view('pembelajaran.hasil-quiz', compact('peserta', 'totalSoal', 'counterJawabanBenar', 'pertanyaan', 'pelatihan', 'topiks', 'topikQuiz', 'konten', 'data', 'pelatihanId', 'topikId', 'quizId', 'dataQuiz', 'configurasiQuiz','nilaiAkhir', 'kursusPesertaId','sumDonut','elseDonut','sumDonutR','elseDonutR'));
    }


    public function cekKontenSelesai($pelatihanId, $topikId, $kontenId)
    {
        $userdata = DB::table('users')
            ->select('m_peserta.id')
            ->join('m_peserta', 'm_peserta.user_id', '=', 'users.id')
            ->where('users.id', auth()->user()->id)
            ->first();

        $kursusPesertaData = KursusPeserta::where('peserta_id', $userdata->id)->first();

        $data = DB::table('t_peserta_konten')->where('kursus_peserta_id', $kursusPesertaData->id)->where('topik_id', $topikId)->where('konten_id', $kontenId)->first();

        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function generateSertifikat($kursusPesertaId, $pelatihanId, $testimoni)
    {
        $infoPeserta = DB::table('t_kursus_peserta')
            ->join('m_peserta', 't_kursus_peserta.peserta_id', '=', 'm_peserta.id')
            ->join('t_kursus', 't_kursus.id', '=', 't_kursus_peserta.kursus_id')
            ->where('t_kursus_peserta.id', $kursusPesertaId)
            ->first();


        $noSertifikat = $this->generateNomorSertifikat($pelatihanId);

        $strukturProgram = DB::table('t_struktur_program')->where('kursus_id', $infoPeserta->kursus_id)->get()->toArray();

        // $file = public_path('files/templates/sertifikat.docx');
        // $tmpFile = public_path('files/sertifikat_peserta/'.$fileName.'.docx');
    
        $generateFile = $this->generateFileName($pelatihanId);
        $uniq = sha1(time());
        $fileName = strtolower($generateFile .'-'. $uniq);

        $data = [
            'nama' => $infoPeserta->nama_depan. " ". $infoPeserta->nama_belakang,
            'no_sertifikat' => $noSertifikat,
            'nuptk' => $infoPeserta->nuptk,
            'judul' => $infoPeserta->judul,
            'asal_sekolah' => 'SMK 1 Bandung',
            'kab_kota' => 'Bandung',
            'predikat' => 'A',
            'tanggal' => tanggal_indonesia($infoPeserta->tanggal_selesai, true),
            'qr_code' => public_path('files/sertifikat_peserta/'). $fileName.'.pdf'
        ];
        
        $dompdf = \PDF::loadView('layouts.sertifikat', $data);
        // return $pdf->download('sertifikat.pdf');
        
        // (Optional) Setup the paper size and orientation
        $path = public_path('files/sertifikat_peserta/');
        $fileName =  $fileName.".pdf";
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->stream();
        $dompdf->save($path . '/' . $fileName);

        DB::table('t_kursus_peserta')->where('id', $kursusPesertaId)->update([
            'status' => 1,
            'tanggal_selesai' => now(),
            'no_sertifikat' => $noSertifikat,
            'sertifikat_file_name' => $fileName,
            'sertifikat_url_path' => 'files/sertifikat_peserta/',
            'testimoni' => $testimoni,
        ]);


    }
    
    public function generateNomorSertifikat($pelatihanId){

        $kursus = DB::table('t_kursus')
                ->select('t_kursus.angkatan', 'm_kelompok_keahlian.kode')
                ->join('m_kelompok_keahlian', 'm_kelompok_keahlian.id','=','t_kursus.kelompok_keahlian_id')
                ->join('m_program_keahlian', 'm_program_keahlian.id','=','m_kelompok_keahlian.program_keahlian_id')
                ->where('t_kursus.id', $pelatihanId)
                ->first();
        
        $noSertifikat = "PP/B".$kursus->kode."/".$kursus->angkatan."/".date('Y');

        return $noSertifikat;
    }

    public function generateFileName($pelatihanId){

        $kursus = DB::table('t_kursus')
                ->select('t_kursus.angkatan', 'm_kelompok_keahlian.kode')
                ->join('m_kelompok_keahlian', 'm_kelompok_keahlian.id','=','t_kursus.kelompok_keahlian_id')
                ->join('m_program_keahlian', 'm_program_keahlian.id','=','m_kelompok_keahlian.program_keahlian_id')
                ->where('t_kursus.id', $pelatihanId)
                ->first();
        
        $noSertifikat = "PP-B".$kursus->kode."-".$kursus->angkatan."-".date('Y');

        return $noSertifikat;
    }
}