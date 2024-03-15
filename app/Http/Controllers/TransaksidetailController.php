<?php

namespace App\Http\Controllers;

use App\Models\Transaksidetail;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Barang;
use App\Models\Laporan;

class TransaksidetailController extends Controller
{
    public function create(Request $request){
            
        // dd($request->all());

        
        $tanggal = $request->tanggal;
        $barang_id = $request->barang_id;
        $transaksi_id = $request->transaksi_id;
     

        $td = Transaksidetail::whereBarangId($barang_id)->whereTransaksiId($transaksi_id)->first();

        $transaksi = Transaksi::find($transaksi_id);
     

        if($td == null) {
            $data = [
            
                'barang_id' => $barang_id,
                'nama_barang' => $request->nama_barang,
                'transaksi_id' => $transaksi_id,
                'harga' => $request->harga,
                'qty' => $request->qty,
                'subtotal' => $request->subtotal
            ];
            Transaksidetail::create($data);

            $dt = [
                'total' => $request->qty * $request->harga + $transaksi->total,

            ];
            $transaksi->update($dt);



            

            $barang = Barang::find($barang_id);
        
            $kurangi = $barang->stock - $request->qty;

            $barang->update(['stock' => $kurangi]);

            
        } else{
            $data = [
                'qty' => $td->qty + $request->qty,
                'subtotal' => $request->subtotal + $td->subtotal,
            ];
            $td->update($data);
            $dt = [
                'total' => $request->qty * $request->harga + $transaksi->total,
            ];
            $transaksi->update($dt);

            $barang = Barang::find($barang_id);
        
            $kurangi = $barang->stock - $request->qty;

            $barang->update(['stock' => $kurangi]);
           
        }
        $datalaporan = Laporan::all()->last();

        $dl = [
            'tanggal' => date('y-m-d'),
            'pemasukan' => $datalaporan->pemasukan + $transaksi->total,
            'keuntungan' => $datalaporan->keuntungan + $transaksi->total,
        ];
        

    $datalaporan->update($dl);

    
        return redirect('/transaksi/' . $transaksi_id . '/edit');
    }


    function delete(){

        $id = request('id');
        $td = Transaksidetail::find($id);

        $transaksi = Transaksi::find($td->transaksi_id);
        $data = [
            'total' => $transaksi->total - $td->subtotal
        ];
        $transaksi->update($data);
        $td->delete();
        return redirect()->back();
    }

   
    public function kirim(Request $request){

        
        $barang_id = $request->barang_id;
        $transaksi_id = $request->transaksi_id;

        $td = Transaksidetail::whereBarangId($barang_id)->whereTransaksiId($transaksi_id)->first();

        $transaksi = Transaksi::find($transaksi_id);


        $dt = [
            'dibayar' => $request->dibayar,
            'total' => $request->qty * $request->harga + $transaksi->total,
            'kembalian' => $request->dibayar - $transaksi->total,
            'nama_pelanggan' => $request->nama_pelanggan,
            'alamat' => $request->alamat,
            'tlp' => $request->tlp,
        ];
        $transaksi->update($dt);


    
        return redirect('/fakture/'.$transaksi->id.'/edit');
    }
}
