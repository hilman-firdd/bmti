<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    use HasFactory;

    protected $table = 't_testimoni';
    protected $primaryKey = 'id';
    protected $connection = 'mysql';
    protected $guarded =[];

}
