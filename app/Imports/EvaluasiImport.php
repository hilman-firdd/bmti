<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\WithLimit;
use Maatwebsite\Excel\Concerns\WithStartRow;

class EvaluasiImport implements ToCollection, WithLimit, WithStartRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        // dd($collection);
        foreach ($collection as $row) {
            if (!empty($row[0])) {
                DB::table('t_evaluasi')->insert([
                    'program' => $row[0],
                    'jenis_kegiatan' => $row[1],
                    'nama_kegiatan' => $row[2],
                    'periode_awal' => $row[3],
                    'periode_akhir' => $row[4],
                    'pola' => $row[5],
                    'moda' => $row[6],
                    'pb' => $row[7],
                    'kelas_group' => $row[8],
                    'penanggung_jawab_kegiatan' => $row[9],
                    'peserta_dipanggil' => $row[10],
                    'peserta_hadir' => $row[11],
                    'peserta_tuntas' => $row[12],
                    'peserta_tidak_tuntas' => $row[13],
                    'tanggal_evaluasi' => $row[14],
                    'laporan' => $row[15]
                ]);
            }
        }
    }

    public function limit(): int
    {
        return 50; // only take 100 rows
    }

    public function startRow(): int
    {
        return 2;
    }
}
