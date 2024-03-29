<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Barang;
use App\Models\PenjualanDetail;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    
    public function create()
    {
        $penjualan = new Penjualan();
        $penjualan->total_item = 0;
        $penjualan->total_harga = 0;
        $penjualan->diskon = 0;
        $penjualan->bayar = 0;
        $penjualan->diterima = 0;
        $penjualan->id_user = 1;
        $penjualan->save();

        session(['id_penjualan' => $penjualan->id_penjualan]);
        return redirect()->route('transaksi.index');
    }


}
