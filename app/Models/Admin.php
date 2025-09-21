<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
      'nama_barang',
      'jumlah_barang',
      'status_barang',
      'image'
    ];
    protected $table = 'admin';
}
