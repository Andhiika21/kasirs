@extends('layouts.main')


<div class="row d-flex" style="max-height: 100px;">

@include('layouts.nav')
@include('layouts.sidebar')
    
   
<div class="col-8" style="max-height: 90vh; margin-top:100px;">
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h3>Data Barang</h3>
                <hr>
            </div>
            <div>
              
                <div class="d-flex">
                    <a href="barang/create" class="me-2"><button class="btn btn-primary">+ TAMBAH</button></a>

                <form action="" method="get" class="w-25">
                    <div class="input-group w-75">
                        <input type="search" name="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                        <button type="submit" class="btn btn-primary" data-mdb-ripple-init>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                              </svg>
                            <i class="fas fa-search"></i>
                          </button>
                      </div>
                </form>

                <h1 class="text-center">Hasil Pencarian Dari {{ $keyword }}</h1>
                
                </div>
                <a href="{{ url('/barang') }}" class="btn btn-info mx-auto">KEMBALI</a>

            </div>
        </div>
        <div class="card-body overflow-auto" style="max-height: 75vh;">

            <table class="table text-center">
                <thead class=" table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                @foreach ($items as $key => $item)
                <tbody>
                   
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ number_format($item->harga )}}</td>
                    <td>{{ $item->stock }}</td>
                    <td>
                       <div class="d-flex justify-content-center">
                        <a href="{{ url('/barang/'.$item->id.'/edit') }}" class="btn btn-warning me-1" style="height: 39px;">Edit</a>
                        

                        <form action="/barang/{{ $item->id }}" method="post" class="ms-1">
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