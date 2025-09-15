<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'nama_barang',
        'status_barang',
        'gambar_barang',
        'jumlah_barang',
    ];
}
