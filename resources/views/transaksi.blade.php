@extends('layouts.main')

<div class="row d-flex">
    @include('layouts.sidebar')

    <div class="col-8 mt-5">
        <div class="row">
            <div class="col-4">
                <div class="p-3 bg-info rounded-1">
                    <form action="">
                        <div class="my-3">
                            <label for="" class="form-label">Nama Pelanggan</label>
                            <input type="text" name="" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Alamat</label>
                            <input type="text" name="" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Nomer</label>
                            <input type="text" name="" class="form-control">
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-4">
                <div class="p-3 bg-info rounded-1">
                    <form action="">
                        <div>
                            <label for="" class="form-label">Nama Barang</label>
                            <select name="" id="" class="form-select">
                                @foreach ($barang as $item)
                                <option value="">{{ $item->nama_barang }}</option>
                                @endforeach
                            </select>

                            <div class="d-flex mt-4 justify-content-around">
                                <label for="" class="form-label ms-1">QTY</label>
                                <label for="" class="form-label ms-1">Harga</label>
                                <label for="" class="form-label ms-1">Stock</label>
                            </div>

                            <div class="d-flex">
                                
                                <input type="number" class="form-control mx-1">
                                <input type="number" class="form-control mx-1" value="{{ $barang['nama_barang']->harga }}">
                                <input type="number" class="form-control mx-1">
                            </div>

                            <div>
                                <button class="btn btn-primary w-25 mt-3 ms-1"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0"/>
                                  </svg> ADD</button>
                               
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-4">
                <div class="p-3 bg-info rounded-1">
                    <h1 class="my-2">Total Harga:</h1>
                    <h1 class="my-2">0</h1>
                </div>
            </div>

            <div class="col-12 mt-5">
                <div class="p-3 bg-info rounded-1">
                    <form action="">
                        <table class="table text-center">
                            <thead class=" table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td>1</td>
                                <td>Barang</td>
                                <td>5000</td>
                                <td>2</td>
                                <td>10000</td>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>

            <div class="col-4 mt-5">
                <div class="p-3 bg-info rounded-1">
                    <div class="mb-2">
                        <label for="" class="form-label">Sub Total</label>
                        <input type="number" class="form-control">
                    </div>

                    <div class="mb-2">
                        <label for="" class="form-label">Discound</label>
                        <input type="text" class="form-control">
                    </div>

                    <div>
                        <label for="" class="form-label">Grand Total</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>



            <div class="col-4 mt-5">
                <div class="p-3 bg-info rounded-1">
                    <div class="mb-2">
                        <label for="" class="form-label">Tunai</label>
                        <input type="number" class="form-control">
                    </div>

                    <div>
                        <label for="" class="form-label">Kembali</label>
                        <input type="number" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>