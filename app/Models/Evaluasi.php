<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluasi extends Model
{
    protected $table = 't_evaluasi';
    protected $primaryKey = 'id';
    protected $connection = 'mysql';
    protected $guarded =[];
}
