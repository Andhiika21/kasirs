@extends('layouts.main')

<div class="row d-flex" style="max-height: 100px;">
    @include('layouts.nav')
@include('layouts.sidebar')


<div class="col-8" style="margin-top: 100px;">

    <div class="row">
        <div class="col-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title text-center">
                        <h4>Data Barang</h4>
                    </div>
                </div>

                <div class="card-body p-4">

                    <div class="mb-3">
                        <form method="GET">
                            <label for="id_barang" class="form-label">Pilih Barang</label>
                        <div class="d-flex">
                            <select name="id" id="id_barang" class="form-control" required>
                                <option value="" required>{{ isset($b_detail) ? $b_detail->nama_barang : '--Pilih Barang--' }}</option>
                                @foreach ($barang as $item)
                                <option value="{{ $item->id }}" required>{{ $item->nama_barang }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary">Pilih</button>
                        </div>
                        </form>
                    </div>
        <form action="/transaksi/detail/create" method="POST">
            @csrf

            <input type="hidden" name="transaksi_id" value="{{ Request::segment(2) }}" required>
            <input type="hidden" name="barang_id" value="{{ isset($b_detail) ? $b_detail->id : '' }}" required>
            <input type="hidden" name="nama_barang" value="{{ isset($b_detail) ? $b_detail->nama_barang : '' }}" required>
            <input type="hidden" name="harga" value="{{ isset($b_detail) ? $b_detail->harga : '' }}" required>
            <input type="hidden" name="subtotal" value='0' required>

                     <div class="mb-3">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input type="text" disabled class="form-control" name="nama_barang" value="{{ isset($b_detail) ? $b_detail->nama_barang : '' }}" required>
                    </div>

                     <div class="d-flex justify-content-around me-2">
                        <label for="harga" class="form-label me-5" required>Harga Satuan</label>

                        <label for="qty" class="form-label me-4" required>QTY</label>

                    </div>

                    <div class="mb-3 d-flex ">
                        <input type="text" disabled class="form-control mx-1" name="harga" value="{{ isset($b_detail) ? number_format($b_detail->harga) : ''}}" required>
                        <input type="number" class="form-control text-center mx-1" name="qty" id="qty" value="{{ request('qty') }}" required>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-cart-plus-fill">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0"/>
                            </svg>
                        </i>ADD</button>
                    </div>

                </div>
            </div>
        </div>
    </form>

    <div class="col-3">
        <div class="card">
            <div class="card-header text-center">
                <div class="card-title"><h4>Pelanggan</h4></div>
            </div>
            <form action="/transaksi/detail/kirim" method="POST">
                @csrf
            <div class="card-body">
                <div class="mb-3">
                    <label for="tanggal" class="form-labe;">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $transaksi->tanggal }}">
                </div>

                <div class="mb-3">
                    <label for="nama_pelanggan" class="form-labe;">Nama Pelanggan</label>
                    <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control" value="{{ $transaksi->nama_pelanggan }}">
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-labe;">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $transaksi->alamat }}">
                </div>

                <div class="mb-3">
                    <label for="tlp" class="form-labe;">Tlp</label>
                    <input type="text" name="tlp" id="tlp" class="form-control" value="{{ $transaksi->tlp }}">
                </div>
            </div>

        </div>
    </div>

    <div class="col-6">
        <div class="card">
            <div class="card-body" style="height: 205px;">
                <h1>Total</h1>
                <h1>Rp {{ number_format($transaksi->total) }}</h1>
            </div>
        </div>
    </div>

    <div class="col-12 mt-3">

        <div class="card">
            <div class="card-header">
                <div class="card-title text-center">
                    <h4>Keranjang Belanja</h4>
                </div>
            </div>

            <div class="card-body">
                <table class="table text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama barang</th>
                            <th>Harga</th>
                            <th>QTY</th>
                            <th>Subtotal</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>

                       @foreach ($transaksidetail as $item)
                       <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ number_format($item->harga) }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ number_format($item->harga * $item->qty) }}</td>
                        <td class="">
                            <a href="/transaksi/detail/delete?id={{ $item->id }}" class="btn btn-danger">
                                <i class="bi bi-trash3-fill">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                    </svg>
                                </i>
                            </a>
                        </td>
                    </tr>
                       @endforeach
                    </tbody>
                </table>


                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                            <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
                        </svg>
                    </i>
                    Proses Transaksi
                </button>

            </div>
        </div>

    </div>






    <div class="col-4 mt-3">
        <div class="card">
            <div class="card-body">



                    <input type="hidden" name="transaksi_id" value="{{ Request::segment(2) }}">
                <div class="mb-2">
                    <label for="total" class="form-label">Total</label>
                    <input type="text" name="total" id="total" class="form-control" value="{{ number_format($transaksi->total) }}" disabled>
                </div>

                <div class="mb-2">
                    <label for="dibayar" class="form-label">Dibayar</label>
                    <input type="text" name="dibayar" id="dibayar" class="form-control" value="{{ number_format(request('dibayar')) }}">
                </div>
            </form>

            </div>
        </div>
    </div>
    </div>

</div>

</div>





