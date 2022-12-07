<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class TestimoniImport implements ToCollection, WithStartRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        // dd($collection);
        foreach ($collection as $row) {
            if (!empty($row[0])) {
                DB::table('t_testimoni')->insert([
                    'nama' => $row[0],
                    'asal_sekolah' => $row[1],
                    'nama_diklat' => $row[2],
                    'testimoni' => $row[3]
                ]);
            }
        }
    }

    public function startRow(): int
    {
        return 2;
    }
}
