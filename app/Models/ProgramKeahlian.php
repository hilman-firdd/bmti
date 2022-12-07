<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramKeahlian extends Model
{
    use HasFactory;

    protected $table = 'm_program_keahlian';
    protected $fillable = ['nama','bidang_keahlian_id','deskripsi'];

    public $timestamps = false;
}
