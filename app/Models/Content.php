<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'm_content';
    protected $primaryKey = 'id';
    protected $connection = 'mysql';
    protected $guarded =[];
}
