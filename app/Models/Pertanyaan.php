<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table = 'm_pertanyaan';
    protected $primaryKey = 'id';
    protected $connection = 'mysql';
    protected $guarded =[];

    protected $fillable = ['quiz_id','pertanyaan','gambar','pilihan_a','pilihan_b','pilihan_c','pilihan_d','pilihan_e','pilihan_f','pilihan_g','pilihan_h','pilihan_i','pilihan_j','pilihan_k','jawaban'];
    public function quiz(){
        return $this->belongsTo('App\Models\Quiz');
    }
}
