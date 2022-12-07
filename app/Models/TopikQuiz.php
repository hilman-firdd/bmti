<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopikQuiz extends Model
{
    protected $table = 't_topik_quiz';
    protected $primaryKey = 'id';
    protected $connection = 'mysql';
    protected $guarded =[];
    public function topik(){
        return $this->belongsTo('App\Models\Topik');
    }

    public function quiz(){
        return $this->belongsTo('App\Models\Quiz');
    }
}
