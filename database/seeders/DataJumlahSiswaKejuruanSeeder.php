<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataJumlahSiswaKejuruanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("t_data_jumlah_siswa_kejuruan")->insert([
            ["provinsi" => "Jawa Barat","jumlah" => 1080103],
            ["provinsi" => "Jawa Timur","jumlah" => 76505],
            ["provinsi" => "Jawa Tengah","jumlah" => 781913],
            ["provinsi" => "Sumatera Utara","jumlah" => 311031],
            ["provinsi" => "Banten","jumlah" => 24689],
            ["provinsi" => "Sulawesi Selatan","jumlah" => 128926],
            ["provinsi" => "Sumatera Selatan","jumlah" => 123332],
            ["provinsi" => "Lampung","jumlah" => 149569],
            ["provinsi" => "D.K.I. Jakarta","jumlah" => 201078],
            ["provinsi" => "Nusa Tenggara Timur","jumlah" => 101791],
            ["provinsi" => "Riau","jumlah" => 104295],
            ["provinsi" => "Sumatera Barat","jumlah" => 90952],
            ["provinsi" => "Nusa Tenggara Barat","jumlah" => 8013],
            ["provinsi" => "Kalimantan Barat","jumlah" => 76327],
            ["provinsi" => "Aceh","jumlah" => 52862],
            ["provinsi" => "Bali","jumlah" => 91263],
            ["provinsi" => "Kalimantan Timur","jumlah" => 79328],
            ["provinsi" => "Papua","jumlah" => 35305],
            ["provinsi" => "Kalimantan Selatan","jumlah" => 56299],
            ["provinsi" => "Jambi","jumlah" => 52103],
            ["provinsi" => "D.I. Yogyakarta","jumlah" => 86208],
            ["provinsi" => "Sulawesi Tenggara","jumlah" => 36548],
            ["provinsi" => "Sulawesi Tengah","jumlah" => 44085],
            ["provinsi" => "Kalimantan Tengah","jumlah" => 34672],
            ["provinsi" => "Sulawesi Utara","jumlah" => 49755],
            ["provinsi" => "Maluku","jumlah" => 22233],
            ["provinsi" => "Kepulauan Riau","jumlah" => 34902],
            ["provinsi" => "Bengkulu","jumlah" => 31015],
            ["provinsi" => "Sulawesi Barat","jumlah" => 27299],
            ["provinsi" => "Maluku Utara","jumlah" => 18611],
            ["provinsi" => "Kepulauan Bangka Belitung","jumlah" => 25202],
            ["provinsi" => "Gorontalo","jumlah" => 1879],
            ["provinsi" => "Papua Barat","jumlah" => 16174],
            ["provinsi" => "Kalimantan Utara","jumlah" => 10268],
            ["provinsi" => "Luar Negeri","jumlah" => 169],
        ]);
        
    }
}
