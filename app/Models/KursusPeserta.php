<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KursusPeserta extends Model
{
    protected $table = 't_kursus_peserta';
    public function peserta(){
        return $this->belongsTo('App\Models\Peserta');
    }
}
