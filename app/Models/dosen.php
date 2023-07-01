<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dosen extends Model
{
    use HasFactory;
    protected $fillable = ['nip', 'nama', 'matkul','alamat','foto'];
    protected $table = 'dosen';
    public $timestamps = false;
}
