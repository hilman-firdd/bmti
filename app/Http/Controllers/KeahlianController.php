<?php

namespace App\Http\Controllers;

use App\Models\Keahlian;
use App\Models\Kompetensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class KeahlianController extends Controller
{
    public function index(){
        $data = DB::table('t_jenis_keahlian')
                ->select('t_jenis_keahlian.*', 'm_kompetensi_keahlian.nama_kompetensi')
                ->join('m_kompetensi_keahlian', 'm_kompetensi_keahlian.id', '=', 't_jenis_keahlian.id_kompetensi')
                ->get();

        return view('admin.galeria.keahlian.index', compact('data'));
    }
    public function create(){
        $data = Kompetensi::all();
        return view('admin.galeria.keahlian.create', compact('data'));
    }
    public function store(Request $request)
    {
        $gambarBanner = "";
        $fileName = "";
        $videoName = "";

        $validatedData = $request->validate([
            'id_kompetensi' => 'required',
            'judul' => 'required',
            'materi' => 'required',
            'gambar_banner' => 'required|image',
            'author' => 'required',
        ]);

        $gambar = $request->file('gambar_banner');
        if($gambar){
            $gambarBanner = time()."_".$gambar->getClientOriginalName();

            $gambar->move(public_path('images/galeria/'), $gambarBanner);
        }

        $file = $request->file('file_content');

        if($file){
            $fileName = time()."_".$file->getClientOriginalName();

            $file->move(public_path('files/galeria/'), $fileName);
        }

        $video = $request->file('video_content');

        if($video){
            $videoName = time()."_".$video->getClientOriginalName();

            $video->move(public_path('videos/galeria/'), $videoName);
        }

        $data = Keahlian::create([
            'id_kompetensi' => $request->id_kompetensi,
            'judul' => $request->judul,
            'materi' => $request->materi,
            'gambar_banner' => $gambarBanner,
            'file_content' => $fileName,
            'video_content' => $videoName,
            'author' => $request->author,
        ]);

        return redirect('/admin/keahlian')->with('message', 'Data Berhasil Disimpan');
    }

    public function edit($id)
    {
        $keahlian = Keahlian::find($id);
        $kompetensi = Kompetensi::all();
        return view('admin.galeria.keahlian.edit', compact(['keahlian', 'kompetensi']));
    }

    public function update(Request $request, $id){

        $validatedData = $request->validate([
            'id_kompetensi' => 'required',
            'judul' => 'required',
            'materi' => 'required',
            // 'gambar_banner_new' => 'required|image',
            // 'file_content_new' => 'required|mimes:pdf',
            // 'video_content_new' => 'required|mimetypes:video/avi,video/mpeg,video/quicktime,video/mp4',
            'author' => 'required',
        ]);

        $gambar = $request->file('gambar_banner_new');
        $gambarBanner = $request->gambar_banner_old;

        if($gambar){
            $gambarBanner = time()."_".$gambar->getClientOriginalName();
            $gambar->move(public_path('images/galeria/'), $gambarBanner);
            File::delete('images/galeria/'.$request->gambar_banner_old);
        }

        $file = $request->file('file_content_new');
        $fileName = $request->file_content_old;

        if($file){
            $fileName = time()."_".$file->getClientOriginalName();
            $file->move(public_path('files/galeria/'), $fileName);
            File::delete('files/galeria/'.$request->file_content_old);
        }

        $video = $request->file('video_content_new');
        $videoName = $request->video_content_old;

        if($video){
            $videoName = time()."_".$video->getClientOriginalName();
            $video->move(public_path('videos/galeria/'), $videoName);
            File::delete('videos/galeria/'.$request->video_banner_old);
        }

        $data = Keahlian::find($id);
        $data->update([
            'id_kompetensi' => $request->id_kompetensi,
            'judul' => $request->judul,
            'materi' => $request->materi,
            'gambar_banner' => $gambarBanner,
            'file_content' => $fileName,
            'video_content' => $videoName,
            'author' => $request->author,
        ]);
        
        return redirect('/admin/data-keahlian')->with('message', 'Data Berhasil Diubah');
    }

    public function delete($id){
        $data = Keahlian::find($id);
        $data->delete();

        File::delete('images/galeria/'.$data->gambar_banner);
        File::delete('videos/galeria/'.$data->video_content);
        File::delete('files/galeria/'.$data->file_content);

        return redirect('/admin/keahlian')->with('message', 'Data Berhasil Dihapus');
    }
}