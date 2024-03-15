<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    
    protected $table = 'barangs';
    protected $primarykey = 'id';
    protected $fillable = ['nama_barang', 'harga', 'stock'];


}
