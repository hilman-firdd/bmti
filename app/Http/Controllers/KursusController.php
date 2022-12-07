<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Topik;
use App\Models\Konten;
use App\Models\Kursus;
use App\Models\TopikQuiz;
use App\Models\Pertanyaan;
use App\Models\JenisKursus;
use App\Models\TopikKonten;
use Illuminate\Http\Request;
use App\Models\KategoriKursus;
use App\Models\KelompokKeahlian;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class KursusController extends Controller
{
    public function index()
    {
        $data = DB::table('t_kursus')->select('t_kursus.*', 'm_kelompok_keahlian.nama as kategori_kursus')
            ->join('m_kelompok_keahlian', 'm_kelompok_keahlian.id', '=', 't_kursus.kelompok_keahlian_id')
            ->get();
        return view('admin.kursus.index', compact('data'));
    }

    public function create()
    {
        $jenis_kursus = JenisKursus::all();
        $kategori_kursus = KelompokKeahlian::all();
        return view('admin.kursus.create', compact(['jenis_kursus', 'kategori_kursus']));
    }

    public function createTopik($kursusId)
    {
        $kursus = DB::table('t_kursus')->where('id', $kursusId)->first();
        $topik = DB::table('t_topik')->where('kursus_id', $kursusId)->get();

        return view('admin.kursus.topik', compact('kursus', 'topik'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kelompok_keahlian_id' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image'
        ]);

        $image = $request->file('gambar');
        $imageName = $image->getClientOriginalName();
        $data = Kursus::create([
            'kelompok_keahlian_id' => $request->kelompok_keahlian_id,
            'angkatan' => $request->angkatan,
            'author' => auth()->user()->name,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $imageName,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date
        ]);
        if ($request->file('gambar')) {
            $image->move(public_path('images/pelatihan/'), $imageName);
        }

        return redirect()->route('pelatihan.topik', [$data->id])->with('message', 'Data Berhasil Disimpan');
    }

    public function manageTopik($pelatihanId)
    {
        $idTopik = $pelatihanId;
        $topiks  = Topik::where('kursus_id', $pelatihanId)->get();
        $pelatihan = Kursus::where('id',$pelatihanId)->first();

        $topikQuiz = DB::table('t_topik')->select('t_quiz.id as quiz_id', 't_quiz.judul', 't_topik_quiz.topik_id')
            ->join('t_topik_quiz', 't_topik_quiz.topik_id', '=', 't_topik.id')
            ->join('t_quiz', 't_quiz.id','=','t_topik_quiz.quiz_id')
            ->where('t_topik.kursus_id', $pelatihanId)
            ->get();
        $konten = DB::table('t_topik')
            ->join('t_topik_konten', 't_topik.id', '=', 't_topik_konten.topik_id')
            ->join('t_konten', 't_konten.id', '=', 't_topik_konten.konten_id')
            ->where('kursus_id', $pelatihanId)
            ->get();
        // $topiksById  = Topik::where('kursus_id', $pelatihanId)->where->idget();
        // dd($topiks->judul);

        return view('admin.kursus.manage_topik', compact('topiks','idTopik', 'pelatihan', 'topikQuiz', 'konten'));
    }

    public function simpanTopik($pelatihanId, Request $request)
    {
        $data = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);
        $data = Topik::create([
            'kursus_id' => $pelatihanId,
            'judul' => $request->judul,
            'materi' => $request->deskripsi
        ]);
        return redirect()->back();
    }

    public function updateTopik($topik, Request $request){
        $updateTopik = Topik::find($request->id);
        $updateTopik->judul = $request->judul;
        $updateTopik->materi = $request->materi;
        $updateTopik->update();
        return redirect()->back();
    }

    public function editTopik($topikId, Request $request){
        $data = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambarBanner' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = Kursus::find($topikId);
        $path = public_path().'/images/pelatihan/'.$data->gambar;
        $file = $request->file('gambarBanner');
        $fileName = time()."_".$file->getClientOriginalName();
        if($file) {
            if(File::exists($path)){
                unlink($path);
            }
            $file->move(public_path('images/pelatihan'), $fileName);
        }
        $data->judul = $request->judul;
        $data->deskripsi = $request->deskripsi;
        $data->gambar = $fileName;
        $data->start_date = $request->tanggalMulai;
        $data->end_date = $request->tanggalBerakhir;
        $data->status_aktif = $request->statusAktif;
        $data->status_publish = $request->statusPublish;
        $data->update();

        return redirect()->back();
    }

    public function buatKonten($pelatihanId, $topikId)
    {
        $pelatihan = Kursus::where('id', $pelatihanId)->first();
        $kelId = $pelatihan->kelompok_keahlian_id;
        $quizes = Quiz::where('kelompok_keahlian_id', $kelId)->get();

        $feedback = Quiz::where('kelompok_keahlian_id', $kelId)->where('tipe_quiz', 2)->get();
        return view('admin.kursus.konten', compact('pelatihanId', 'topikId', 'quizes','feedback'));
    }

    public function simpanKontenPembelajaran(Request $request)
    {
        $file = $request->file('file');
        $fileName = "";
        if($file) {
            $fileName = time()."_".$file->getClientOriginalName();
            $file->move(public_path('files/file_konten'), $fileName);
        }

        $konten = Konten::create([
            'judul' => $request->judul,
            'materi' => $request->materi,
            'file' => $fileName 
        ]);

        TopikKonten::create([
            'topik_id' => $request->topikId,
            'konten_id' => $konten->id
        ]);

        return redirect()->route('pelatihan.topik', [$request->pelatihanId]);
    }

    public function simpanKontenQuiz(Request $request)
    {

        $quizeOptions = $request->quizOptions;
        foreach ($quizeOptions as $questId) {
            TopikQuiz::create([
                'quiz_id' => $questId,
                'topik_id' => $request->topik_id,
                'durasi' => $request->waktu,
                'nilai_minimal' => $request->nilaiMinimal,
                'mandatori' => 1,
                'dapat_diulang' => 1,
                'final_test' => 1,
            ]);
        }

        return redirect()->route('pelatihan.topik', [$request->pelatihan_id]);
    }

    public function edit($id)
    {
        $data = Kursus::find($id);
        $jenis_kursus = JenisKursus::all();
        $kategori_kursus = KategoriKursus::all();
        return view('admin.kursus.edit', compact(['data', 'jenis_kursus', 'kategori_kursus']));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kelompok_keahlian_id' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image'
        ]);
        
        $image = $request->file('gambar');
        $imageName = $image->getClientOriginalName();
        $data = Kursus::find($id);
        $data->update([
            'jenis_kursus_id' => $request->jenis_kursus_id,
            'kategori_kursus_id' => $request->kategori_kursus_id,
            'author_id' => auth()->user()->id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $imageName
        ]);
        if ($request->file('gambar')) {
            $image->move(public_path('images/pelatihan/'), $imageName);
        }

        return redirect('/admin/pelatihan');
    }
    public function delete(Request $request)
    {
        $data = Topik::find($request->id);
        $data->delete();

        return response()->json([
            'success'=> true
        ]);
    }

    // API service unutk ajax di front end

    public function getDataPelatihanById($id){
        $data = Kursus::find($id);
        return response()->json($data);
    }
}