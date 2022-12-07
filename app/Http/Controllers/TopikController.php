<?php

namespace App\Http\Controllers;

use App\Models\Topik;
use App\Models\Kursus;
use Illuminate\Http\Request;

class TopikController extends Controller
{
    public function index(){
        $data = Topik::all();
        return view('admin.topik.index', compact('data'));
    }
    public function create()
    {
        $kursus = Kursus::all();
        return view('admin.topik.create', compact('kursus'));
    }
    public function store(Request $request)
    {
        $data = Topik::create([
            'kursus_id' => $request->kursus_id,
            'judul' => $request->judul,
            'materi' => $request->materi,
            'status' => $request->status
        ]);
        return redirect('/admin/topik');
    }
    public function edit($id)
    {
        $data = Topik::find($id);
        $kursus = Kursus::all();
        return view('admin.topik.edit', compact(['data','kursus']));
    }
    public function update(Request $request, $id)
    {
        $data = Topik::find($id);
        $data->update([
            'judul' => $request->judul,
            'materi' => $request->materi
        ]);
       
        return redirect('/admin/topik');
    }
    public function delete($id)
    {
        $data = Topik::find($id);
        $data->delete();

        return redirect('/admin/topik');
    
    }

    public function getDataTopikById($id){
        $data = Topik::find($id);
        return response()->json($data);
    }
}