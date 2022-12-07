<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKegiatan extends Model
{
    use HasFactory;

    protected $fillable = ['nama_jenis_kegiatan', 'kode_jenis_kegiatan'];
    protected $table = 'm_jenis_kegiatan';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
