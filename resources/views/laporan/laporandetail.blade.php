@extends('layouts.main')


<div class="row d-flex" style="max-height: 100px;">

    @include('layouts.nav')
@include('layouts.sidebar')


<div class="col-8" style="max-height: 90vh; margin-top:100px;">
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h3>Data Detail Laporan</h3>
                <hr>
            </div>
            <div>


                @if (Session::has('success'))
                <div class="alert alert-success mt-3" role="alert">
                    {{ Session::get('success') }}
                  </div>
                @endif
            </div>
        </div>
        <div class="card-body overflow-auto" style="max-height: 75vh;">

            <table class="table text-center">
                <thead class=" table-dark">
                    <tr>
                        <th>No</th>
                        <th>tanggal</th>
                        <th>Nama Pelanggan</th>
                        <th>Alamat</th>
                        <th>Tlp</th>
                        <th>Total</th>
                    </tr>
                </thead>
                @foreach ($transaksi as $item)
                <tbody>

                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->nama_pelanggan }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->tlp }}</td>
                    <td>{{ $item->total }}</td>

                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
</div>
