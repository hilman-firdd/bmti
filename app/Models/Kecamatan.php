<?php

namespace App\Models;

use App\Models\Kelurahan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kecamatan extends Model
{
    use HasFactory;
    protected $table = "m_kecamatan";
    protected $guarded = [];

    public function kelurahan()
    {
        return $this->hasMany(Kelurahan::class);
    }

    public function kotakab()
    {
        return $this->belongsTo('App\Models\KotaKab');
    }
}
