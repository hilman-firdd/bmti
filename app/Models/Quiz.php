<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = 't_quiz';
    protected $primaryKey = 'id';
    protected $connection = 'mysql';
    protected $guarded =[];
    public function topikQuiz(){
        return $this->hasMany('App\Models\TopikQuiz');
    }
    
    public function pertanyaan(){
        return $this->hasMany('App\Models\Pertanyaan');
    }
}
