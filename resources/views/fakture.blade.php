


@extends('layouts.mainfakture')


<div style="max-width: 400px" class="justify-content-center m-3 border border-dark">
   <div class="d-flex justify-content-center mt-2">
    <div class="w-50 mt-1 text-center">
        <h4><b>Fakture</b></h4>
    </div>
    <div class=" w-50 text-center mt-2">
        <h6>PT. Anugrah Jaya</h6>
    </div>
   </div>
   <hr class="border border-dark border-2 opacity-0">

   <div class="d-flex">
    <div class="w-50 ms-2">
        <h6><b>Kepada :</b></h6>
        <h6>{{ $transaksi->nama_pelanggan }}</h6>

        <h6><b>Alamat :</b></h6>
        <h6>{{ $transaksi->alamat }}</h6>
    </div>

    <div class="w-50 text-end me-2">
        <h6><b>Tanggal :</b></h6>
        <h6>{{ $transaksi->tanggal }}</h6>

        <h6><b>Tlp :</b></h6>
        <h6>{{ $transaksi->tlp }}</h6>
    </div>
   </div>

   <div class="mt-3 mx-2">
    <table class="text-center table">
        <thead class="table">
            <tr>
                <th>No</th>
                <th>Barang</th>
                <th>harga</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </tr>
        </thead>

        <tbody class="table table-secondary">
 

            @foreach ($transaksidetail as $item)
                       <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ number_format($item->harga) }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ number_format($item->qty * $item->harga) }}</td>
                        <td>{{ $item->nama_pelanggan }}</td>
                    </tr>
                       @endforeach
        </tbody>
    </table>
   </div>

   <hr class="border border-dark border-2 opacity-0">

    <div class=" mx-4 text-end" style="">
        <h6 class="mx-3"><b>Total: {{ number_format( $transaksi->total) }}</b></h6>
    </div>
    <div class=" mx-4 text-end" style="">
        <h6 class="mx-3"><b>Dibayar: {{ number_format($transaksi->dibayar)  }}</b></h6>
    </div>
    <div class=" mx-4 text-end" style="">
        <h6 class="mx-3"><b>Kembalian: {{ number_format($transaksi->kembalian) }}</b></h6>
    </div>

</div>