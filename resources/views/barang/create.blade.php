@extends('layouts.main')


<div class="row d-flex" style="max-height: 100px;">
    @include('layouts.nav')
@include('layouts.sidebar')

<div class="col-5 offset-2 d-flex align-items-center" style="margin-bottom:130px;">
    <div class="card" style="width: 100vh;">
        <div class="card-header">
            <div class="card-title">
                <h3>Input Data Barang</h3>
            </div>
        </div>
        <div class="card-body">

            <form action="{{ url('/barang') }}" method="post">
                @csrf

                @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                  </div>
                @endif

                <div class="mt-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" name="nama_barang" id="nama_barang" class="form-control">
                </div>
                <div class="mt-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" name="harga" id="harga" min="0" value="0" step="any" class="form-control">
                </div>
                <div class="mt-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" name="stock" id="stock" min="0" value="0" class="form-control">
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
