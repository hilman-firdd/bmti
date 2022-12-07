<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $table = 'm_peserta';
    protected $primaryKey = 'id';
    protected $connection = 'mysql';
    protected $guarded =[];
    
    public function kursusPeserta(){
        return $this->hasMany('App\Models\KursusPeserta');
    }
}
