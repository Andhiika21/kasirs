<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\Transaksi;
use App\Models\Barang;
use App\Models\User;

class LaporanController extends Controller
{
    public function index(){

        $laporan= Laporan::all();
        return view('laporan.index')->with('laporan', $laporan);
    }


    public function dashboard(){

        $datalaporan = Laporan::all()->last();
        $pemasukan = $datalaporan->pemasukan;
        $pengeluaran = $datalaporan->pengeluaran;
        $keuntungan = $datalaporan->keuntungan;
        $barang = Barang::all()->count();
        $transaksi = Transaksi::all()->count();
        $laporan = Laporan::all()->count();
        $user = User::all()->count();

        $data = [
            'pemasukan' => $pemasukan,
            'pengeluaran' => $pengeluaran,
            'barang' => $barang,
            'transaksi' => $transaksi,
            'laporan' => $laporan,
            'user' => $user,
            'keuntungan' => $keuntungan
        ];

        return view('dashboard', $data);
    }

    public function edit($id){

        $laporan = Laporan::find($id);
        $tanggal = $laporan->tanggal;
        $transaksi = Transaksi::whereTanggal($tanggal)->get();



        // $tt = Transaksidetail::whereTransaksiId($id)->first();
        // $transaksi = Transaksi::find($id);
        // $transaksidetail = Transaksidetail::whereTransaksiId($id)->get();
        // $barang_id = request('id');

        // $b_detail = Barang::find($barang_id);






        $data = [
            'laporan' => $laporan,
            'transaksi' => $transaksi

        ];
        // $transaksidetail = Transaksidetail::find($id);
        return view('laporan.laporandetail', $data);
    }

    
    public function destroy(string $id){

        Laporan::destroy($id);
        return redirect('/laporan')->with('success', 'data berhasil dihapus');
    }
}
