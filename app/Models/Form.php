<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = [
      'nama_peminjam',
      'nama_barang',
      'jumlah_barang',
      'tanggal_pinjam',
      'tanggal_kembali'
    ];
    protected $table = 'form';
}
