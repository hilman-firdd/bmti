<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerusahaanMitra extends Model
{
    protected $table = 'm_perusahaan_mitra';
    protected $primaryKey = 'id';
    protected $connection = 'mysql';
    protected $guarded =[];
}
