@extends('layouts.main')

<div class="row d-flex" style="max-height: 100px;">

    @include('layouts.nav')
    @include('layouts.sidebar')


    <div class="col-8 rounded-3" style="margin-top: 130px; height:80vh; background-color: rgba(27, 220, 213, 0.891);">
        <div class="container">
            <div class="d-flex justify-content-start my-2">
                <div class="w-100 mt-3 bg-danger rounded-pill">
                    <h1 class="text-center"><b>PT ANUGRAH JAYA</b></h1>
                </div>
            </div>
            
            <div class="">
                <img src="{{ asset('aa.jpg') }}" alt="foto tidak ada" class="img-fluid rounded-3">
            </div>
        </div>
    </div>

</div>