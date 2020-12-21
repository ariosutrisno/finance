@extends('layouts.homepage.app')
@section('title', 'Pengaturan Kategori')
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
                                        <div class="col-sm-1 mt-1">
                                            <img src="img/Page-5.png" alt="Hutang">
                                        </div>
                                        <div class="col-sm-10 ml-3">
                                            <span class="h1 text-cyan"><strong> Kategori Surat </strong></span>
                                            <br><span>edit data perusahaan</span></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <li style="list-style-type: none;">
                                        <button class="btn float-right"><i data-feather="file-text"></i></button><br>
                                    </li>
                                    <li style="list-style-type: none;">
                                        <span class="text-danger">Jumlah </span></li>
                                    <li style="list-style-type: none;"><span class="h2"><strong> 2
                                                Kategori </strong></span></li>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body" style="min-height: 500px !important;">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card ">
                                        <div class="card-body  p-2">
                                            <div class="card-title text-danger">
                                                Pengeluaran
                                            </div>
                                            <li style="list-style-type: none; border-bottom: solid 1px; padding: 1px ;">
                                                Invoice 1<span class="float-right"><a href="#" class="ml-auto mr-1"><img
                                                            src="img/quit.png"
                                                            style="max-width: 18px !important; max-height: 18px !important;"></a>
                                                    <a href="#" class="mr-auto ml-1"><img src="img/Page-5.png"
                                                            style="max-width: 18px!important; max-height: 18px !important;"></a></span>
                                            </li>
                                            <li style="list-style-type: none; border-bottom: solid 1px; padding: 1px ;">
                                                Invoice 2<span class="float-right"><a href="#" class="ml-auto mr-1"><img
                                                            src="img/quit.png"
                                                            style="max-width: 18px !important; max-height: 18px !important;"></a>
                                                    <a href="#" class="mr-auto ml-1"><img src="img/Page-5.png"
                                                            style="max-width: 18px!important; max-height: 18px !important;"></a></span>

                                            </li>
                                            <li style="list-style-type: none; border-bottom: solid 1px; padding: 1px ;">
                                                Invoice 3<span class="float-right"><a href="#" class="ml-auto mr-1"><img
                                                            src="img/quit.png"
                                                            style="max-width: 18px !important; max-height: 18px !important;"></a>
                                                    <a href="#" class="mr-auto ml-1"><img src="img/Page-5.png"
                                                            style="max-width: 18px!important; max-height: 18px !important;"></a></span>

                                            </li>
                                            <li style="list-style-type: none; border-bottom: solid 1px; padding: 1px ;">
                                                Invoice 4<span class="float-right"><a href="#" class="ml-auto mr-1"><img
                                                            src="img/quit.png"
                                                            style="max-width: 18px !important; max-height: 18px !important;"></a>
                                                    <a href="#" class="mr-auto ml-1"><img src="img/Page-5.png"
                                                            style="max-width: 18px!important; max-height: 18px !important;"></a></span>

                                            </li>
                                            <li style="list-style-type: none; border-bottom: solid 1px; padding: 1px ;">
                                                Invoice 5<span class="float-right"><a href="#" class="ml-auto mr-1"><img
                                                            src="img/quit.png"
                                                            style="max-width: 18px !important; max-height: 18px !important;"></a>
                                                    <a href="#" class="mr-auto ml-1"><img src="img/Page-5.png"
                                                            style="max-width: 18px!important; max-height: 18px !important;"></a></span>
                                            </li>
                                            <div class="text-center mt-2">
                                                <a href="">
                                                    <i class="icon-plus"></i> <span>Tambah Kategori</span></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body p-2 ">
                                            <div class="card-title text-primary">
                                                Pemasukan
                                            </div>
                                            <li style="list-style-type: none; border-bottom: solid 1px; padding: 1px ;">
                                                Invoice 1<span class="float-right"><a href="#" class="ml-auto mr-1"><img
                                                            src="img/quit.png"
                                                            style="max-width: 18px !important; max-height: 18px !important;"></a>
                                                    <a href="#" class="mr-auto ml-1"><img src="img/Page-5.png"
                                                            style="max-width: 18px!important; max-height: 18px !important;"></a></span>

                                            </li>
                                            <li style="list-style-type: none; border-bottom: solid 1px; padding: 1px ;">
                                                Invoice 2<span class="float-right"><a href="#" class="ml-auto mr-1"><img
                                                            src="img/quit.png"
                                                            style="max-width: 18px !important; max-height: 18px !important;"></a>
                                                    <a href="#" class="mr-auto ml-1"><img src="img/Page-5.png"
                                                            style="max-width: 18px!important; max-height: 18px !important;"></a></span>

                                            </li>
                                            <li style="list-style-type: none; border-bottom: solid 1px; padding: 1px ;">
                                                Invoice 3<span class="float-right"><a href="#" class="ml-auto mr-1"><img
                                                            src="img/quit.png"
                                                            style="max-width: 18px !important; max-height: 18px !important;"></a>
                                                    <a href="#" class="mr-auto ml-1"><img src="img/Page-5.png"
                                                            style="max-width: 18px!important; max-height: 18px !important;"></a></span>

                                            </li>
                                            <li style="list-style-type: none; border-bottom: solid 1px; padding: 1px ;">
                                                Invoice 4<span class="float-right"><a href="#" class="ml-auto mr-1"><img
                                                            src="img/quit.png"
                                                            style="max-width: 18px !important; max-height: 18px !important;"></a>
                                                    <a href="#" class="mr-auto ml-1"><img src="img/Page-5.png"
                                                            style="max-width: 18px!important; max-height: 18px !important;"></a></span>
                                            </li>
                                            <li style="list-style-type: none; border-bottom: solid 1px; padding: 1px ;">
                                                Invoice 5<span class="float-right"><a href="#" class="ml-auto mr-1"><img
                                                            src="img/quit.png"
                                                            style="max-width: 18px !important; max-height: 18px !important;"></a>
                                                    <a href="#" class="mr-auto ml-1"><img src="img/Page-5.png"
                                                            style="max-width: 18px!important; max-height: 18px !important;"></a></span>
                                            </li>
                                            <div class="text-center mt-2">
                                                <a href="">
                                                    <i class="icon-plus"></i> <span>Tambah Kategori</span></a></div>
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