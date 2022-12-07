<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kursus extends Model
{
    protected $table = 't_kursus';
    protected $primaryKey = 'id';
    protected $connection = 'mysql';
    protected $guarded =[];
    public function topik(){
        return $this->hasMany('App\Models\Topik');
    }
    
    public function kursusPeserta(){
        return $this->hasMany('App\Models\KategoriKursus');
    }
    
    public function jenisKursus(){
        return $this->belongsTo('App\Models\JenisKursus');
    }

    public function kategoriKursus(){
        return $this->belongsTo('App\Models\KategoriKursus');
    }


}
