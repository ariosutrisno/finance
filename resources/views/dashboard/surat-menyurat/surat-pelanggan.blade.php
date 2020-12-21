@extends('layouts.homepage.app')
@section('title', 'Daftar Pelanggan')
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
                                            <span class="h1 text-cyan"><strong>Daftar Pelanggan</strong></span>
                                            <br><span>buat gambar eksport dan berikan kepada orang lain</span></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <li style="list-style-type: none;">
                                        <button class="btn float-right"><i data-feather="file-text"></i></button><br>
                                    </li>
                                    <li style="list-style-type: none;">
                                        <span class="text-danger">Jumlah </span></li>
                                    <li style="list-style-type: none;"><span class="h2"><strong>
                                                Pelanggan</strong></span></li>

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
                                            <option value="">Semua Perusahaan</option>
                                            <option value="">Perusahaan A</option>
                                            <option value="">Perusahan B</option>
                                        </select> </li>
                                    <li class="nav-item d-none d-md-block mr-1 mt-2"><select
                                            class="custom-select form-control bg-white custom-radius custom-shadow border-0">
                                            <option value="">Semua Alamat</option>
                                            <option value="">Alamat A</option>
                                            <option value="">Alamat B</option>
                                        </select> </li>
                                </ul>
                                <ul class="navbar-nav float-right navbar-right ml-auto">
                                    <!-- ============================================================== -->
                                    <!-- Search -->

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
                                                <th>No</th>
                                                <th>Nama Pelanggan</th>
                                                <th>Tanggal</th>
                                                <th>Alamat</th>
                                                <th>Perusahaan</th>
                                                <th>Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @foreach ($daftarpelanggan as $pelanggan)
                                                <tr class="table-primary">
                                                    <th scope="row" class="text-center ">{{ $loop->iteration }}</i></th>
                                                    <td class="text-center">{{ $pelanggan->pelanggan_nama }}</td>
                                                    <td class="text-center">
                                                        {{ \Carbon\Carbon::parse($pelanggan->pelanggan_tanggal)->locale('id')->isoformat('d MMMM Y') }}
                                                    </td>
                                                    <td class="text-center">{{ $pelanggan->pelanggan_alamat }}</td>
                                                    <td class="text-center">{{ $pelanggan->pelanggan_perusahaan }}</td>
                                                    <td class="text-center">
                                                        <a href="#" class="ml-auto mr-1"><img src="img/quit.png"
                                                                style="max-width: 48px !important; max-height: 48px !important;"></a>
                                                        <a href="#" class="mr-auto ml-1"><img src="img/Page-5.png"
                                                                style="max-width: 28px !important; max-height: 28px !important;"></a>
                                                    </td>
                                                </tr>
                                            @endforeach --}}
                                        </tbody>
                                    </table>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
