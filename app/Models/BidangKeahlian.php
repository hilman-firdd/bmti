<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidangKeahlian extends Model
{
    use HasFactory;

    protected $table = 'm_bidang_keahlian';
    protected $fillable = ['nama', 'deskripsi'];

    public $timestamps = false;
}
