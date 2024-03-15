<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksidetail;
use App\Models\Transaksi;
use App\Models\Barang;

class FaktureController extends Controller
{
    public function index(){

        
        $barang = Transaksidetail::all();
        return view('barang.index')->with('barang', $barang);
    }


    public function edit($id){

        $tt = Transaksidetail::whereTransaksiId($id)->first();
        $transaksi = Transaksi::find($id);
        $transaksidetail = Transaksidetail::whereTransaksiId($id)->get();
        $barang_id = request('id');
        
        $b_detail = Barang::find($barang_id);

      
    

        

        $data = [
            'transaksidetail'=> $transaksidetail,
            'transaksi' => $transaksi,
            'b_detail' => $b_detail,
            'tt' => $tt
            
        ];
        // $transaksidetail = Transaksidetail::find($id);
        return view('fakture', $data);
    }
}
