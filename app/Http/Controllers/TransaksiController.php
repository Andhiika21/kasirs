<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Transaksidetail;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Laporan;

class TransaksiController extends Controller
{
    public function index(){

        $data = [

            'transaksi' => Transaksi::paginate(10)
        ];


    }


    public function create(){


        $data = [
            'total' => 0,
            'tanggal' => date('Y-m-d'),
            'nama_pelanggan' => '-',
            'alamat' => '-',
            'tlp' => '-',
            'dibayar' => 0,
            'kembalian' => 0

        ];

        $transaksi = Transaksi::create($data);


        $datalaporan = Laporan::all()->last();
        $tanggallp = $datalaporan->tanggal;
        $date = date('Y-m-d');

        // $ymd = $datalaporan['tanggal']->'y-m-d';



        if( $tanggallp == $date ){

            $dl = [
                'tanggal' => date('y-m-d'),
                'pemasukan' => $datalaporan->pemasukan
            ];


        $datalaporan->update($dl);
        } else{

            $dl = [
                'tanggal' => date('y-m-d'),
                'pemasukan' => 0
            ];

            Laporan::create($dl);
        }

        return redirect('transaksi/' . $transaksi->id. '/edit');

    }


    public function edit($id)
    {

        $barang = Barang::get();

        $barang_id = request('id');
        $b_detail = Barang::find($barang_id);

        $transaksidetail = Transaksidetail::whereTransaksiId($id)->get();
        $transaksidetailid = Transaksidetail::all();


        $qty = request('qty');




        $subtotal = 0;
        if($b_detail){
            $subtotal = $qty * $b_detail->harga;
        }




        $transaksi = Transaksi::find($id);

        $dibayar = request('dibayar');
        $kembalian = $dibayar - $transaksi->total;




        $data = [
            'barang' => $barang,
            'b_detail' => $b_detail,
            'qty' => $qty,
            'subtotal' => $subtotal,
            'transaksidetail'=> $transaksidetail,
            'transaksi' => $transaksi,
            'kembalian' => $kembalian,
            'transaksidetailid' =>  $transaksidetailid

        ];
        return view('transaksi.create', $data);
    }

    public function destroy(string $id){

        Transaksi::destroy($id);
        return redirect('/datatransaksi')->with('success', 'data berhasil dihapus');
    }


    public function datatransaksi(){

        $datatransaksi = Transaksi::all();

        $data = [
            'datatransaksi' => $datatransaksi
        ];


        return view('datatransaksi', $data);
    }



}
