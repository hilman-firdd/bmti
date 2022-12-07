<?php

namespace App\Http\Controllers;

use App\Models\PMandiri;
use Illuminate\Http\Request;

class PMandiriController extends Controller
{
    public function index(){
        $data = PMandiri::all();

        return view('admin.pelMandiri.index', compact('data'));
    }
    public function create(){
        $data = PMandiri::all();
        return view('admin.pelMandiri.create', compact('data'));
    }
    public function store(Request $request)
    {
        $data = PMandiri::create([
            'nama_pelatihan' => $request->nama_pelatihan,
        ]);
        return redirect('/pelatihan-mandiri');
    }
    public function edit($id)
    {
        $data = PMandiri::find($id);
        return view('admin.pelMandiri.edit', compact(['data']));
    }
    public function update(Request $request, $id){
       
        $data = PMandiri::find($id);
        $data->update([
            'nama_pelatihan' => $request->nama_pelatihan,
        ]);
        return redirect('/pelatihan-mandiri');
    }
    public function delete($id){
        $data = PMandiri::find($id);
        $data->delete();

        return redirect('/pelatihan-mandiri');
    }
}
