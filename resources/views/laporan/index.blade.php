@extends('layouts.main')


<div class="row d-flex" style="max-height: 100px;">

    @include('layouts.nav')
@include('layouts.sidebar')


<div class="col-8" style="max-height: 90vh; margin-top:100px;">
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h3>Data Laporan</h3>
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
                        <th>pemasukan</th>
                        <th>Pengeluaran</th>
                        <th>Keuntungan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                @foreach ($laporan as $item)
                <tbody>

                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ number_format($item->pemasukan) }}</td>
                    <td>{{ number_format($item->pengeluaran) }}</td>
                    <td>{{ number_format($item->keuntungan) }}</td>
                    <td>
                       <div class="d-flex justify-content-center">
                        <a href="{{ url('/laporan/'.$item->id.'/edit') }}" class="btn btn-warning me-1" style="height: 39px;">Detail</a>


                        <form action="/laporan/{{ $item->id }}" method="post" class="ms-1">
                        @method('delete')
                        @csrf

                        <button onclick="return confirm('yakin ingin menghapus data ini')" class="btn btn-danger">Hapus</button>
                        </form>
                       </div>
                    </td>

                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
</div>
