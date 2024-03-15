<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use App\Models\Laporan;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengeluaran = Pengeluaran::all();
        return view('pengeluaran.index')->with('pengeluaran', $pengeluaran);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengeluaran.create');

       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          // dd($request->all());
          $validatedData = $request->validate([
            'tanggal' => 'required',
            'nama_pengeluaran' => 'required',
            'harga' => 'required',
        ]);

        Pengeluaran::create($validatedData);


        $pengeluaran = Pengeluaran::all()->last();
        $datalaporan = Laporan::all()->last();

        $dl = [
            
            'pengeluaran' => $datalaporan->pengeluaran + $pengeluaran->harga,
            'keuntungan' => $datalaporan->keuntungan - $pengeluaran->harga
        ];
        

    $datalaporan->update($dl);
        return redirect('pengeluaran')->with('success', 'Data berhasil ditambahkan');
    }


    public function edit(string $id){

        $pengeluaran = Pengeluaran::find($id);
        return view('pengeluaran.edit')->with('pengeluaran', $pengeluaran);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        $pengeluaran = Pengeluaran::find($id);
        // $input = $request->all();

        $data = [
            'tanggal' => $request->tanggal,
            'nama_pengeluaran' => $request->nama_pengeluaran,
            'harga' => $request->harga . 0 . 0 . 0,

        ];
        

        

        $pengeluaran->update($data);
        return redirect('pengeluaran')->with('success', 'data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pengeluaran::destroy($id);
        return redirect('/pengeluaran')->with('success', 'data berhasil dihapus');
    }
}
