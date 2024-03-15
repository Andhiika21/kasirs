@extends('layouts.main')


<div class="row d-flex" style="max-height: 100px;">

@include('layouts.nav')
@include('layouts.sidebar')

<div class="col-5 offset-2 d-flex align-items-center h-25" style="margin-top: 150px">
    <div class="card" style="width: 100vh;">
        <div class="card-header">
            <div class="card-title">
                <h3>Edit Data Pengeluaran</h3>
            </div>
        </div>
        <div class="card-body">

            <form action="{{ url('pengeluaran/' .$pengeluaran->id) }}" method="post">
                @method('PATCH')
                @csrf

                <div class="mt-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $pengeluaran->tanggal }}">
                </div>

                <div class="mt-3">
                    <label for="nama_pengeluaran" class="form-label">Nama Pengeluaran</label>
                    <input type="text" name="nama_pengeluaran" id="nama_pengeluaran" class="form-control" value="{{ $pengeluaran->nama_pengeluaran }}">
                </div>
                <div class="mt-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" name="harga" id="harga" min="0" step="any" class="form-control" value="{{ number_format($pengeluaran->harga) }}">
                </div>
                
                <div class="mt-3">
                    <button class="btn btn-primary">KIRIM</button>
                    {{-- <input type="submit" value="save" class="btn btn-primary"> --}}
                </div>
            </form>
        </div>
    </div>
</div>

</div>