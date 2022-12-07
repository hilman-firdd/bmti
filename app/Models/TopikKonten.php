<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopikKonten extends Model
{
    protected $fillable = ['topik_id', 'konten_id'];
    protected $table = 't_topik_konten';
    use HasFactory;
}
