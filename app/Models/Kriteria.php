<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $table = 'kriterias'; // Nama tabel di database

    protected $fillable = [
        'flag',
        'nama_kriteria',
        'bobot',
        'keterangan',
    ];
}
