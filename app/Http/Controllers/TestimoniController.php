<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function index(){
        $data = Testimoni::all();

        return view('admin.dashboard.evaluator.testimoni.index', compact('data'));
    }
    public function create(){
        return view('admin.dashboard.evaluator.testimoni.create');
    }
    public function store(Request $request){
        $data = Testimoni::create([
            'nama' => $request->nama,
            'asal_sekolah' => $request->asal_sekolah,
            'nama_diklat' => $request->nama_diklat,
            'testimoni' => $request->testimoni,
            'created_by' => $request->created_by,
            'updated_by' => $request->updated_by
        ]);

        return redirect('/evaluator/testimoni');
    }
    public function edit($id){
        $data = Testimoni::find($id);
        return view('admin.dashboard.evaluator.testimoni.edit', compact(['data']));
    }
    public function update(Request $request, $id){
        $data = Testimoni::find($id);
        $data->update([
            'nama' => $request->nama,
            'asal_sekolah' => $request->asal_sekolah,
            'nama_diklat' => $request->nama_diklat,
            'testimoni' => $request->testimoni,
            'created_by' => $request->created_by,
            'updated_by' => $request->updated_by
        ]);

        return redirect('/evaluator/testimoni');
    }
    public function delete($id){
        $data = Testimoni::find($id);
        $data->delete();

        return redirect('/evaluator/testimoni');
    }
}
