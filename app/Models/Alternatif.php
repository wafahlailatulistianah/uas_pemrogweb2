<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak sesuai dengan konvensi penamaan Laravel
    protected $table = 'alternatif'; // Ganti dengan nama tabel yang benar

    protected $fillable = ['merek', 'C1', 'C2', 'C3', 'C4', 'C5'];
}
