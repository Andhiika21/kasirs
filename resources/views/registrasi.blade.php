@extends('layouts.main')

<div class="row d-flex" style="max-height: 100px;">
@include('layouts.nav')
@include('layouts.sidebar')


        <div class="col-4 offset-2" style="margin-top:100px;">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h3>Registrasi</h3>
                    </div>
                </div>

                <div class="card-body">
                    <form action="registrasi" method="post">

                        @csrf

                        @if (Session::has('success'))
                            
                            <div class="alert alert-success" role="alert">
                             {{ Session::get('success') }}
                            </div>
                          

                        @endif
                        <div class="mb-3">
                            <label for="name" class="form-label">Name :</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="masukan nama">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email :</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="masukan email">
                        </div>

                        <div class="mb-3">
                            <label for="passwrod" class="form-label">Password</label>
                            <input type="passwrod" name="passwrod" id="passwrod" class="form-control" placeholder="masukan password">
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="role_id" id="status" class="form-select">
                                <option>...</option>
                                <option value="1">Admin</option>
                                <option value="2">Pegawai</option>
                                <option value="3">kasir</option>
                            </select>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>