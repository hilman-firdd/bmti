<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class EvaluatorController extends Controller
{
    public function editProfil($id){
        $id_peserta = DB::table('users')->where('id', auth()->user()->id)->first();
        $data = User::find($id);
        
        return view('admin.dashboard.evaluator.profile.editProfil', compact(['data', 'id_peserta']));
    }
    public function updateProfil(Request $request, $id){
        $validatedData = $request->validate([
            'foto' => 'images',
            'nama' => 'required',
        ]);

        $gambar = $request->file('foto_new');
        $gambarBanner = $request->foto_old;

        if($gambar){
            $gambarBanner = time()."_".$gambar->getClientOriginalName();
            $gambar->move(public_path('images/profil/'), $gambarBanner);
            File::delete('images/profil/'.$request->foto_old);
        }
        // dd($gambarBanner);
        $data = User::find($id);
        $data->update([
            'name' => $request->nama,
            'foto' => $gambarBanner
        ]);
        return redirect('/dashboard')->with('message', 'Data Berhasil Diubah');       
    }
}
