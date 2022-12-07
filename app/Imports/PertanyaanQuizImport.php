<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\WithLimit;
use Maatwebsite\Excel\Concerns\WithStartRow;

class PertanyaanQuizImport implements ToCollection, WithLimit, WithStartRow
{
    
    private $quizId;
    public function __construct($quizId)
    {
        $this->quizId = $quizId;
    }

    public function collection(Collection $collection)
    {
        // dd($collection);
        foreach ($collection as $row) {
            if (!empty($row[0])) {
                DB::table('m_pertanyaan')->insert([
                    'quiz_id' => $this->quizId,
                    'pertanyaan' => $row[0],
                    'pilihan_a' => $row[1],
                    'pilihan_b' => $row[2],
                    'pilihan_c' => $row[3],
                    'pilihan_d' => $row[4],
                    'jawaban' => $row[5],
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
        return 3;
    }
}
