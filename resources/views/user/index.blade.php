@extends('layouts.main')



<div class="row d-flex" style="max-height: 100px;">

@include('layouts.nav')

@include('layouts.sidebar')


<div class="col-8" style="max-height: 90vh; margin-top:100px;">
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h3>Data User</h3>
                <hr>
            </div>
            <div>

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
                        <th>Nama</th>
                        <th>email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                @foreach ($user as $item)
                <tbody>

                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                       <div class="d-flex justify-content-center">
                        <a href="{{ url('/barang/'.$item->id.'/edit') }}" class="btn btn-warning me-1" style="height: 39px;">Edit</a>


                        <form action="/user/{{ $item->id }}" method="post" class="ms-1">
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
