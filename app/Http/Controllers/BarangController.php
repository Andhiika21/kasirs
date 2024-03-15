<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(){

        
        $barang = Barang::all();
        return view('barang.index')->with('barang', $barang);
    }


    public function create(){
        return view('barang.create');
    }


    public function store(Request $request){
       
        // dd($request->all());
        $validatedData = $request->validate([
            'nama_barang' => 'required',
            'harga' => 'required',
            'stock' => 'required'
        ]);


        Barang::create($validatedData);
        return redirect('barang/create')->with('success', 'Data berhasil ditambahkan');
    }


    public function edit(string $id){

        $barang = Barang::find($id);
        return view('barang.edit')->with('barang', $barang);
    }


    public function update(Request $request, string $id){

        $barang = Barang::find($id);
        // $input = $request->all();

        $data = [
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stock' => $request->stock,

        ];
        

        

        $barang->update($data);
        return redirect('barang')->with('success', 'data berhasil diubah');
    }


    public function destroy(string $id){

        Barang::destroy($id);
        return redirect('/barang')->with('success', 'data berhasil dihapus');
    }


    public function search(Request $request){

        $keywoard = $request->search;

        $results = Barang::where('nama_barang', 'like', '%' . $keywoard . '%')->get();
        return view('result', [
            'keyword' => $keywoard,
            'items' => $results
        ]);
    }


    public function transaksi(){

   
        $barang = Barang::all();
        
        
        return view('transaksi')->with('barang', $barang);
    }

    public function transaksipost(string $id){


        $bb = Barang::find(2);
        return view('transaksi')->with('bb', $bb);
    }
}
