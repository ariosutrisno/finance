@extends('layouts.homepage.app')
@section('title', 'Pengaturan Buku Kas')
@section('container')
    @include('layouts.homepage.css&js.cssdashboard')
    @include('layouts.homepage.css&js.css')


    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" <div
        id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        @include('dashboard.sidebardashboard')
        <div class="page-wrapper">
            <div class="container-fluid">
                <!-- *************************************************************** -->
                <!-- Start First Cards -->
                <!-- *************************************************************** -->
                <div class="container h-100">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <img src="img/Page-1.png" alt="Hutang">
                                        </div>
                                        <div class="col-md-10 ml-3">
                                            <span class="h1 text-cyan"><strong> Buku Kas </strong></span>
                                            <br><span>catatan yang ada dalam hidup ini</span></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <li style="list-style-type: none;">
                                        <button class="btn float-right"><i data-feather="file-text"></i></button><br>
                                    </li>
                                    <li style="list-style-type: none;">
                                        <span class="text-danger">Jumlah </span></li>
                                    <li style="list-style-type: none;"><span class="h2"><strong> 1
                                                Buku</strong></span></li>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body" style="min-height: 500px !important;">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card bg-light">

                                        <div class="card-body text-center" style="min-height: 80px  !important;">
                                            <a href="surat-catatan.html"><img class="card-img-top mt-3 mb-3"
                                                    src="img/Page-1.png"
                                                    style="max-height: 75px !important; max-width: 75px !important;"
                                                    alt="Card image cap">
                                                <p class="mt-3"><strong>Dompet Pribadi</strong></p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card bg-light">
                                        <div class="card-body text-center" style="min-height: 80px  !important;">
                                            <a href="{{ url('/pengaturan-bukuKas-tambah') }}"><img
                                                    class="card-img-top mt-3 mb-3" src="img/add-2.png"
                                                    style="max-height: 75px !important; max-width: 75px !important;"
                                                    alt="Card image cap">
                                                <p class="mt-3"><strong>Tambah Baru</strong></p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    @endsection
