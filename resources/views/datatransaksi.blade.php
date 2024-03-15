@extends('layouts.main')

<div class="row d-flex" style="max-height: 100px;">

@include('layouts.nav')
@include('layouts.sidebar')

<div class="col-8" style="max-height: 90vh; margin-top:100px;">
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h3>Data Transaksi</h3>
                <hr>
            </div>
            <div>

                <div class="d-flex">


                {{-- <form action="{{ route('search') }}" method="get" class="w-75">
                    <div class="input-group w-25">
                        <input type="search" name="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                        <button type="submit" class="btn btn-primary" data-mdb-ripple-init>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                              </svg>
                            <i class="fas fa-search"></i>
                          </button>
                      </div>
                </form>
                </div> --}}

                @if (Session::has('success'))
                <div class="alert alert-success  mt-1" role="alert" id="myDIV">
                    {{ Session::get('success') }}
                    <button type="button" onclick="myFunction()">
                        <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                @endif
            </div>
        </div>
        <div class="card-body overflow-auto" style="max-height: 75vh;">

            <table class="table text-center">
                <thead class=" table-dark">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Pelanggan</th>
                        <th>Alamat</th>
                        <th>Tlp</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                @foreach ($datatransaksi as $item)
                <tbody>

                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->nama_pelanggan }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->tlp }}</td>
                    <td>{{ $item->total }}</td>
                    <td>
                       <div class="d-flex justify-content-center">
                        <a href="{{ url('/fakture/'.$item->id.'/edit') }}" class="btn btn-primary me-1" style="height: 39px;">Print</a>


                        <form action="/transaksi/{{ $item->id }}" method="post" class="ms-1">
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

<script>
    function myFunction() {
      var x = document.getElementById("myDIV");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }
    </script>
