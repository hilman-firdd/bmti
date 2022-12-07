<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelompokKeahlian extends Model
{
    use HasFactory;

    protected $table = 'm_kelompok_keahlian';
    protected $fillable = ['nama','kode','program_keahlian_id','deskripsi'];

    public $timestamps = false;
}
