<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramKegiatan extends Model
{
    use HasFactory;

    protected $fillable = ['nama_kegiatan','jenis_kegiatan_id', 'kode_kegiatan'];
    protected $table = 'm_program_kegiatan';

    public $timestamps = false;
}
