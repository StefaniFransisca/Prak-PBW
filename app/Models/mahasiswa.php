<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mhs373';
    protected $fillable = [
        'nim', 'nama', 'gender', 'jurusan', 'bidang_minat'
    ];
}
