<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kompetensi extends Model
{
    protected $table = 'm_kompetensi_keahlian';
    protected $primaryKey = 'id';
    protected $connection = 'mysql';
    protected $guarded =[];
}
