<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    // Nama tabel di database (huruf kecil)
    protected $table = 'pelanggan';

    // Kolom yang dapat diisi
    protected $fillable = [
        'nama',
        'alamat',
        'telepon',
        'aktif'
    ];
}
