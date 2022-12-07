<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use App\Models\Peserta;
use Illuminate\Http\Request;
use App\Models\KursusPeserta;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->role_id == 1) {
            return view('admin.dashboard.admin');
        }

        elseif (auth()->user()->role_id == 2) {
            $jmlPerusahaan = DB::table('m_perusahaan_mitra')
                        ->select('nama_perusahaan')
                        ->count();
            $jmlSeluruhSiswa = DB::table('t_data_jumlah_siswa_kejuruan')
                        ->sum('jumlah');
            $jmlGuruTng = DB::table('t_data_jumlah_guru_dan_tenaga_kependidikan')
                        ->sum('jumlah');
            $jmlRasio = DB::table('users')
                        ->join('m_peserta', 'users.id', 'm_peserta.user_id')
                        ->count();
            $rasioTotal = ((int)$jmlGuruTng / (int)$jmlRasio) * 0.1;
            $keikutsertaan = (int)$rasioTotal;
            $jmlGuru = (int)$jmlRasio;
            
            
            return view('admin.dashboard.eksekutif', compact('jmlPerusahaan', 'jmlSeluruhSiswa', 'jmlGuruTng', 'jmlGuru', 'keikutsertaan'));
        }

        elseif (auth()->user()->role_id == 3) {
            $pelatihan = Kursus::all()->count();
            $pelatihanT = KursusPeserta::where('tanggal_selesai', '!=', 'NULL')->count();
            $pelatihanS = KursusPeserta::all()->count();
            $pelatihanB = $pelatihanS-$pelatihanT;
            $pesertaP = KursusPeserta::all()->count();
            $pesertaU = Peserta::where('nuptk', '!=', 'NULL')->count();
            $pesertaS = Peserta::all()->count();
            $pesertaT = $pesertaS-$pesertaU;

            return view('admin.dashboard.penyelenggara', compact('pelatihan', 'pelatihanT', 'pelatihanB', 'pesertaP', 'pesertaU', 'pesertaT'));
        }

        elseif (auth()->user()->role_id == 4) {
            $id_peserta = DB::table('users')->where('id', auth()->user()->id)->first();
            return view('admin.dashboard.evaluator', compact('id_peserta'));
        }
        
        elseif (auth()->user()->role_id == 5) {
            $id_peserta = DB::table('m_peserta')->where('user_id', auth()->user()->id)->first();
            // dd($id_peserta);

            $data = DB::table('t_kursus_peserta')
                ->select('t_kursus.id', 'm_kelompok_keahlian.kode', 'm_kelompok_keahlian.nama', 't_kursus.judul')
                ->join('t_kursus', 't_kursus.id', '=', 't_kursus_peserta.kursus_id')
                ->join('m_kelompok_keahlian', 'm_kelompok_keahlian.id', '=', 't_kursus.kelompok_keahlian_id')
                ->where('t_kursus_peserta.peserta_id', $id_peserta->id)
                ->where('t_kursus_peserta.status', 0)->get();

            return view('admin.dashboard.peserta', compact('data', 'id_peserta',));
        }
        
        else{
            abort(404);
        }
    }
}
