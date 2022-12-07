<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKursus extends Model
{
    protected $table = 'm_jenis_kursus';
    protected $primaryKey = 'id';
    protected $connection = 'mysql';
    protected $guarded =[];
    public function kursus(){
        return $this->hasMany('App\Models\Kursus');
    }
}
