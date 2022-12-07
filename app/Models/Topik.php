<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topik extends Model
{
    protected $table = 't_topik';
    protected $primaryKey = 'id';
    protected $connection = 'mysql';
    protected $guarded =[];
    public function konten(){
        return $this->hasMany('App\Models\Konten');
    }

    public function topikQuiz(){
        return $this->hasMany('App\Models\TopikQuiz');
    }

}
