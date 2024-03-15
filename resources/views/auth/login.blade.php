@extends('layouts.main')

@section('contents')
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card" style="width: 40rem; height:30rem;">

            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card-body rounded-1" style="background-color: rgb(0, 161, 183)">
              <div class="text-center my-4">
                <h1 class=""><b>LOGIN KASIR</b></h1>
              </div>
                <form method="post" action="/">
                    @csrf
                    <div class="mb-4">
                      <label for="email" class="form-label"><h4>Email</h4></label>
                      <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukan Email" style="height: 60px">
                      @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="mb-4">
                      <label for="password" class="form-label"><h4>Password</h4></label>
                      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Masukan Password" style="height: 60px">
                      @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                    
                    <div class="d-grid">
                      <button type="submit" class="btn btn-primary"><h3><b>LOGIN</b></h3></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection