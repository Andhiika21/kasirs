<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Models\PenjualanDetail;
use DataTables;


class PenjualanDetailController extends Controller
{
    public function index()
    {
        $produk = Barang::orderBy('nama_barang')->get();


       //cek apakah ada transaksi yang berjalan

       $id_penjualan = session('id_penjualan');
       return view('penjualan_detail.index', compact('produk', 'id_penjualan'));
    


    //   if ($id_penjualan = session('id_penjualan')) {
    //     return view('penjualan_detail.index', compact('barang', 'id_penjualan'));
    //   }
        
    }


    public function data($id)
    {
        $detail = PenjualanDetail::with('produk')
            ->where('id_penjualan', $id)
            ->get();

            // return $detail;

        $data = array();
        $total = 0;
        $total_item = 0;

        foreach ($detail as $item) {
            $row = array();
            $row['nama_barang'] = $item->produk['nama_barang'];
            $row['harga']  = 'Rp.'. number_format($item->harga);
            $row['jumlah']      = '<input type="number" class="form-control input-sm quantity" data-id="'. $item->id_penjualan_detail .'" value="'. $item->jumlah .'">';
            $row['diskon']      = $item->subtotal . '%';
            $row['subtotal']    = 'Rp. '. number_format($item->subtotal);
            $row['aksi']        = '<div class="btn-group">
                                    <button onclick="deleteData(`'. route('transaksi.destroy', $item->id_penjualan_detail) .'`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                                </div>';
            $data[] = $row;

            
            $total += $item->harga * $item->jumlah;
            $total_item += $item->jumlah;
        }
        $data[] = [
            'nama_barang' => '',
            'harga'  => '',
            'jumlah'      => '',
            'diskon'      => '',
            'subtotal'    => '',
            'aksi'        => '',
        ];

        // return datatables()
        // ->of($data)->addIndexColumn()
        // ->rawColumns(['aksi', 'nama_barang', 'jumlah'])
        // ->make(true);
    }

    public function loadForm($diskon, $total, $diterima)
    {
        $bayar = $total - ($diskon / 100 * $total);
        $kembali = ($diterima !=0) ? $diterima - $bayar : 0;
        $data = [
            'totalrp' => number_format($total),
            'bayar' => $bayar,
            'bayarrp' => number_format($bayar),
            'terbilang' => ucwords(' Rupiah'),
            'kembali' => number_format($kembali)
        ];

        return response()->json($data);
    }

    
}
