@extends('layouts.homepage.app')
@section('title', 'Buat Surat')
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
                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-sm-1 mt-1">
                                            <img src="img/Page-1.png" alt="Hutang">
                                        </div>
                                        <div class="col-sm-10 ml-3">
                                            <span class="h1 text-cyan"><strong> Buat Surat </strong></span>
                                            <br><span>buat gambar eksport dan berikan kepada orang lain</span></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <li style="list-style-type: none;">
                                        <button class="btn float-right"><i data-feather="file-text"></i></button><br>
                                    </li>
                                    <li style="list-style-type: none;">
                                        <span class="text-danger">Jumlah </span></li>
                                    <li style="list-style-type: none;"><span class="h2"><strong> 89
                                                Surat</strong></span></li>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card overflow-hidden">
                        <div class="card-body border-bottom  shadow-sm p-3 bg-white rounded">


                            <!-- ============================================================== -->
                            <!-- Right side toggle and nav items -->
                            <!-- ============================================================== -->
                            <nav class="navbar top-navbar float navbar-expand-md">
                                <ul class="navbar-nav float-left navbar-left">
                                    <li class="nav-item d-none d-md-block mr-1 mt-2"> <span
                                            class="nav-link  text-dark ">Filter</span></li>
                                    <li class="nav-item d-none d-md-block mr-1 mt-2"><select
                                            class="custom-select form-control bg-white custom-radius custom-shadow border-0">
                                            <option value="">Semua Surat</option>
                                            <option value="">Invoice</option>
                                            <option value="">Quotation</option>
                                            <option value="">Officer Letter</option>
                                        </select> </li>
                                </ul>
                                <ul class="navbar-nav float-right navbar-right ml-auto">
                                    <!-- ============================================================== -->
                                    <!-- Search -->
                                    <li class="nav-item d-none d-md-block mr-1 mt-2">
                                        <button type="button" data-toggle="modal" data-target="#ModalBuat"
                                            class="nav-link bth btn-sm tombol text-white bg-purpel">Buat
                                            Surat</button>
                                        <!-- <a class="nav-link bth btn-sm tombol text-white bg-purpel"
                                            href="javascript:void(0)"> Buat Surat

                                        </a> -->
                                    </li>
                                    <li class=" d-none d-md-block">
                                        <a class="nav-link" href="javascript:void(0)">
                                            <form>
                                                <div class="customize-input">
                                                    <input
                                                        class="form-control custom-shadow custom-radius border-0 bg-white"
                                                        type="search" placeholder="Search" aria-label="Search" />
                                                    <!-- <i class="form-control-icon text-left" data-feather="search"></i> -->
                                                </div>
                                            </form>
                                        </a>
                                    </li>
                                </ul>
                            </nav>

                        </div>
                        <div class="container bg-white p-3 mb-5" style="height: 100%;">

                            <div class="table-responsive mt-4 mb-5 ">
                                <table class="table  table-bordered table-sm">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Tipe</th>
                                            <th>Judul Surat</th>
                                            <th>Tanggal</th>
                                            <th>Saldo</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="table-danger">
                                            <th scope="row" class="text-center ">Quotation</i></th>
                                            <td class="text-center">coba aja</td>
                                            <td class="text-center">12 Desember 2019</td>
                                            <td class="text-right">Rp.12000000</td>
                                            <td class="text-center">
                                                <a href="#" class="ml-auto mr-1"><img src="img/quit.png"
                                                        style="max-width: 48px !important; max-height: 48px !important;"></a>
                                                <a href="#" class="mr-auto ml-1"><img src="img/Page-5.png"
                                                        style="max-width: 28px !important; max-height: 28px !important;"></a>

                                                <!-- <a class="text-danger" href=""><i data-feather="trash"></i></a> <a
                                                    class="text-warning" href=""><i data-feather="edit"></i></a> <a
                                                    class="text-warning" href=""><i data-feather="file-text"></i></a> -->
                                            </td>
                                        </tr>
                                        <tr class="table-danger">
                                            <th scope="row" class="text-center ">Quotation</i></th>
                                            <td class="text-center">coba aja</td>
                                            <td class="text-center">12 Desember 2019</td>
                                            <td class="text-right">Rp.12000000</td>
                                            <td class="text-center">
                                                <a href="#" class="ml-auto mr-1"><img src="img/quit.png"
                                                        style="max-width: 48px !important; max-height: 48px !important;"></a>
                                                <a href="#" class="mr-auto ml-1"><img src="img/Page-5.png"
                                                        style="max-width: 28px !important; max-height: 28px !important;"></a>

                                                <!-- <a class="text-danger tex-center" href=""><i
                                                        data-feather="trash"></i></a> <a class="text-warning tex-center"
                                                    href=""><i data-feather="edit"></i></a>  -->
                                            </td>
                                        </tr>
                                        <tr class="table-primary">
                                            <th scope="row" class="text-center ">Invoice</i></th>
                                            <td class="text-center">coba aja</td>
                                            <td class="text-center">12 Desember 2019</td>
                                            <td class="text-right">Rp.12000000</td>
                                            <td class="text-center">
                                                <a href="#" class="ml-auto mr-1"><img src="img/quit.png"
                                                        style="max-width: 48px !important; max-height: 48px !important;"></a>
                                                <a href="#" class="mr-auto ml-1"><img src="img/Page-5.png"
                                                        style="max-width: 28px !important; max-height: 28px !important;"></a>

                                                <!-- <a class="text-danger tex-center" href=""><i
                                                        data-feather="trash"></i></a> <a class="text-warning tex-center"
                                                    href=""><i data-feather="edit"></i></a>  -->
                                            </td>
                                        </tr>
                                        <tr class="table-primary">
                                            <th scope="row" class="text-center ">Invoice</i></th>
                                            <td class="text-center">coba aja</td>
                                            <td class="text-center">12 Desember 2019</td>
                                            <td class="text-right">Rp.12000000</td>
                                            <td class="text-center">
                                                <a href="#" class="ml-auto mr-1"><img src="img/quit.png"
                                                        style="max-width: 48px !important; max-height: 48px !important;"></a>
                                                <a href="#" class="mr-auto ml-1"><img src="img/Page-5.png"
                                                        style="max-width: 28px !important; max-height: 28px !important;"></a>

                                                <!-- <a class="text-danger tex-center" href=""><i
                                                        data-feather="trash"></i></a> <a class="text-warning tex-center"
                                                    href=""><i data-feather="edit"></i></a>  -->
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <!-- Modal -->
        <!-- Modal -->
        <div class="modal fade rounded" id="ModalBuat" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered rounded" role="document">
                <div class="rounded modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Buat Surat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <H2 class="text-primary"><strong> Pilih Surat</strong></H2>
                            <div class="row d-flex justify-content-center ">
                                <div class="col-md-12 text-center">
                                    <center>
                                        <a href=""
                                            class="nav-link col-md-6 bth btn-sm tombol text-white bg-purpel mt-3 mb-3"><strong>
                                                Quotation</strong></a>
                                        <a href="{{ url('/invoice') }}"
                                            class="nav-link col-md-6 bth btn-sm tombol text-white bg-purpel mt-3 mb-3"><strong>
                                                Invoice</strong></a>
                                        <a href="{{ url('/offering') }}"
                                            class="nav-link col-md-6 bth btn-sm tombol text-white bg-purpel mt-3 mb-3"><strong>
                                                Offering Letter</strong></a>
                                        <a href=""
                                            class="nav-link col-md-6 bth btn-sm tombol text-white bg-purpel mt-3 mb-3"><strong>
                                                Surat Keterangan</strong></a>
                                        <a href=""
                                            class="nav-link col-md-6 bth btn-sm tombol text-white bg-purpel mt-3 mb-3"><strong>
                                                Surat Perintah</strong></a>

                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endsection
