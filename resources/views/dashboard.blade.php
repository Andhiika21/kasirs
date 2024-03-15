@extends('layouts.main')

<div class="row d-flex" style="max-height: 100px;">

@include('layouts.nav')
@include('layouts.sidebar')



<div class="col-8" style="margin-top: 100px">
    <h1>Dashboard</h1>
    <div class="card">
        <div class="card-body p-3">

           <div class="d-flex justify-content-center">
            <div class="card border-5 m-4">
                <div class="ms-1 mt-3 text-center rounded-top d-flex" style="height: 70px; width: 310px; color: rgba(247, 134, 134, 1);">
                    <i class="bi bi-currency-dollar pt-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                            <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73z"/>
                        </svg>
                    </i>
                    <h3 class="pt-3"><b>Pemasukan Hari Ini</b></h3>
                </div>
                <div class=" text-center" style=" background-color:rgba(247, 134, 134, 1);">
                <h3 class="pt-2">Rp.{{ number_format($pemasukan) }}</h3>
                </div>
            </div>

            <div class="card border-5 ms-3  m-4">
                <div class="ms-1 mt-3 text-center rounded-top d-flex" style="height: 70px; width: 310px; color: rgba(150, 217, 255, 1);">
                    <i class="bi bi-box-seam-fill mt-3 ms-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="currentColor" class="bi bi-box-seam-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.01-.003.268-.108a.75.75 0 0 1 .558 0l.269.108.01.003zM10.404 2 4.25 4.461 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339L8 5.961 5.596 5l6.154-2.461z"/>
                        </svg>
                    </i>
                    <h3 class="pt-3 ms-4"><b>Data Barang</b></h3>
                </div>
                <div class=" text-center" style=" background-color:rgba(150, 217, 255, 1);">
                <h3 class="pt-2">Total : {{ $barang }}</h3>
                </div>
            </div>

            <div class="card border-5 ms-3  m-4">
                <div class="ms-1 mt-3 text-center rounded-top d-flex" style="height: 70px; width: 310px; color: rgba(147, 255, 196, 1);">
                    <i class="bi bi-cash-coin mt-2 ms-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="47" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8m5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0"/>
                            <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195z"/>
                            <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083q.088-.517.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1z"/>
                            <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 6 6 0 0 1 3.13-1.567"/>
                          </svg>
                    </i>
                    <h3 class="pt-3 ms-2"><b>Data Transaksi</b></h3>
                </div>
                <div class=" text-center" style=" background-color:rgba(147, 255, 196, 1);">
                <h3 class="pt-2">Total : {{ $transaksi }}</h3>
                </div>
            </div>

           </div>

            <div class="d-flex justify-content-center">
                <div class="card border-5 m-4">
                    <div class="ms-1 mt-3 text-center rounded-top d-flex" style="height: 70px; width: 310px; color: rgb(220, 227, 115);">
                        <i class="bi bi-currency-dollar pt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73z"/>
                            </svg>
                        </i>
                        <h3 class="pt-3"><b>Pengeluaran Hari Ini</b></h3>
                    </div>
                    <div class=" text-center" style=" background-color:rgb(220, 227, 115);">
                    <h3 class="pt-2">Rp.{{ number_format($pengeluaran) }}</h3>
                    </div>
                </div>

                <div class="card border-5 mt-4 m-4">
                    <div class="ms-1 mt-3 text-center rounded-top d-flex" style="height: 70px; width: 310px; color: rgba(202, 161, 255, 1);">
                        <i class="bi bi-file-earmark-text-fill ms-2 mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor" class="bi bi-file-earmark-text-fill" viewBox="0 0 16 16">
                                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z"/>
                            </svg>
                        </i>
                        <h3 class="pt-3 ms-4"><b>Data Laporan</b></h3>
                    </div>
                    <div class=" text-center" style=" background-color:rgba(202, 161, 255, 1);">
                    <h3 class="pt-2">Total : {{ $laporan }}</h3>
                    </div>
                </div>

                <div class="card border-5 ms-3 mt-4 m-4">
                    <div class="ms-1 mt-3 text-center rounded-top d-flex" style="height: 70px; width: 310px; color: rgba(255, 207, 85, 1);">
                        <i class="bi bi-people-fill ms-3 mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                            </svg>
                        </i>
                        <h3 class="pt-3 ms-4"><b>Data User</b></h3>
                    </div>
                    <div class=" text-center" style=" background-color:rgba(255, 207, 85, 1);">
                    <h3 class="pt-2">Total : {{ $user }}</h3>
                    </div>
                </div>
            </div>


            <div class="d-flex justify-content-center">
                <div class="card border-5 ms-3 mt-4 m-4">
                    <div class="ms-3 mt-3 text-center rounded-top d-flex" style="height: 70px; width: 370px; color: rgb(110, 244, 226);">
                        <i class="bi bi-currency-exchange">
                            <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="currentColor" class="bi bi-currency-exchange" viewBox="0 0 16 16">
                                <path d="M0 5a5 5 0 0 0 4.027 4.905 6.5 6.5 0 0 1 .544-2.073C3.695 7.536 3.132 6.864 3 5.91h-.5v-.426h.466V5.05q-.001-.07.004-.135H2.5v-.427h.511C3.236 3.24 4.213 2.5 5.681 2.5c.316 0 .59.031.819.085v.733a3.5 3.5 0 0 0-.815-.082c-.919 0-1.538.466-1.734 1.252h1.917v.427h-1.98q-.004.07-.003.147v.422h1.983v.427H3.93c.118.602.468 1.03 1.005 1.229a6.5 6.5 0 0 1 4.97-3.113A5.002 5.002 0 0 0 0 5m16 5.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0m-7.75 1.322c.069.835.746 1.485 1.964 1.562V14h.54v-.62c1.259-.086 1.996-.74 1.996-1.69 0-.865-.563-1.31-1.57-1.54l-.426-.1V8.374c.54.06.884.347.966.745h.948c-.07-.804-.779-1.433-1.914-1.502V7h-.54v.629c-1.076.103-1.808.732-1.808 1.622 0 .787.544 1.288 1.45 1.493l.358.085v1.78c-.554-.08-.92-.376-1.003-.787zm1.96-1.895c-.532-.12-.82-.364-.82-.732 0-.41.311-.719.824-.809v1.54h-.005zm.622 1.044c.645.145.943.38.943.796 0 .474-.37.8-1.02.86v-1.674z"/>
                              </svg>
                        </i>
                        <h3 class="pt-3 ms-4"><b>Keuntungan Hari ini</b></h3>
                    </div>
                    <div class=" text-center" style=" background-color:rgb(110, 244, 226);">
                    <h3 class="pt-2">Rp.{{ number_format($keuntungan) }}</h3>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</div>
