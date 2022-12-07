<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konten extends Model
{
    protected $fillable = ['judul','materi','file'];

    protected $table = 't_konten';
    public function topik(){
        return $this->belongsTo('App\Models\Topik');
    }
}
