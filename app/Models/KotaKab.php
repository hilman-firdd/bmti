<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KotaKab extends Model
{
    protected $table = "m_kota_kab";
    protected $guarded = [];

    public function provinsi(){
        return $this->belongsTo('App\Models\Provinsi');
    }

    public function kecamatan()
    {
        return $this->hasMany('App\Models\Kecamatan');
    }
}
