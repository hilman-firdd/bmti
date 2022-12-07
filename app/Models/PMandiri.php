<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PMandiri extends Model
{
    protected $table = 'm_pelatihan_mandiri';
    protected $primaryKey = 'id';
    protected $connection = 'mysql';
    protected $guarded =[];
}
