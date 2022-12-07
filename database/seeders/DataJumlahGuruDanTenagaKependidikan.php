<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataJumlahGuruDanTenagaKependidikan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("t_data_jumlah_guru_dan_tenaga_kependidikan")->insert([
            ['provinsi'=> 'Jawa Barat', 'jumlah'=> 463],
            ['provinsi'=> 'Jawa Timur', 'jumlah'=> 417],
            ['provinsi'=> 'Jawa Tengah', 'jumlah'=> 357],
            ['provinsi'=> 'Sumatera Utara', 'jumlah'=> 206],
            ['provinsi'=> 'Sulawesi Selatan', 'jumlah'=> 135],
            ['provinsi'=> 'Banten', 'jumlah'=> 119],
            ['provinsi'=> 'Sumatera Selatan', 'jumlah'=> 118],
            ['provinsi'=> 'Lampung', 'jumlah'=> 114],
            ['provinsi'=> 'Nusa Tenggara Timur', 'jumlah'=> 111],
            ['provinsi'=> 'Aceh', 'jumlah'=> 104],
            ['provinsi'=> 'Riau', 'jumlah'=> 100],
            ['provinsi'=> 'D.K.I. Jakarta', 'jumlah'=> 95],
            ['provinsi'=> 'Sumatera Barat', 'jumlah'=> 91],
            ['provinsi'=> 'Nusa Tenggara Barat', 'jumlah'=> 88],
            ['provinsi'=> 'Kalimantan Barat', 'jumlah'=> 69],
            ['provinsi'=> 'Kalimantan Selatan', 'jumlah'=> 58],
            ['provinsi'=> 'Jambi', 'jumlah'=> 56],
            ['provinsi'=> 'Kalimantan Timur', 'jumlah'=> 53],
            ['provinsi'=> 'Sulawesi Tenggara', 'jumlah'=> 53],
            ['provinsi'=> 'D.I. Yogyakarta', 'jumlah'=> 52],
            ['provinsi'=> 'Sulawesi Tengah', 'jumlah'=> 52],
            ['provinsi'=> 'Bali', 'jumlah'=> 51],
            ['provinsi'=> 'Kalimantan Tengah', 'jumlah'=> 48],
            ['provinsi'=> 'Sulawesi Utara', 'jumlah'=> 38],
            ['provinsi'=> 'Maluku', 'jumlah'=> 37],
            ['provinsi'=> 'Papua', 'jumlah'=> 37],
            ['provinsi'=> 'Bengkulu', 'jumlah'=> 35],
            ['provinsi'=> 'Kepulauan Riau', 'jumlah'=> 28],
            ['provinsi'=> 'Sulawesi Barat', 'jumlah'=> 27],
            ['provinsi'=> 'Maluku Utara', 'jumlah'=> 25],
            ['provinsi'=> 'Kepulauan Bangka Belitung', 'jumlah'=> 19],
            ['provinsi'=> 'Gorontalo', 'jumlah'=> 18],
            ['provinsi'=> 'Papua Barat', 'jumlah'=> 17],
            ['provinsi'=> 'Kalimantan Utara', 'jumlah'=> 13],
            ['provinsi'=> 'Luar Negeri', 'jumlah'=> 831],
        ]);
    }
}
