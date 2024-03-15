<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksidetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    // protected $table = 'transaksidetails';
    // protected $primarykey = 'id';
    // protected $fillable = ['transaksi_id', 'barang_id', 'nama_barang', 'qty', 'subtotal'];
}
