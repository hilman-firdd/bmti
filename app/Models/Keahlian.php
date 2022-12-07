<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keahlian extends Model
{
    protected $table = 't_jenis_keahlian';
    protected $primaryKey = 'id';
    protected $connection = 'mysql';
    protected $guarded =[];
}
