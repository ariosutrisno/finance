@extends('layouts.homepage.app')
@section('title', 'Akun')
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
                                                <img src="{{ asset('img/man-1.png') }}" alt="Hutang">
                                            </div>
                                            <div class="col-sm-10 ml-4">
                                                <span class="h1 text-cyan"><strong> Akun Saya </strong></span>
                                                <br><span>Bima Sakti</span></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <li style="list-style-type: none;">
                                            <button class="btn float-right"><i data-feather="file-text"></i></button><br>
                                        </li>


                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Akun Saya -->
                        <div class="container">
                            <div class="row">
                                <div class="card col-lg-12 mt-4">
                                    <div class="card-body">
                                        <form>
                                            <div class="row mt-4">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="nama_lengkap"
                                                            class="text-dark col-sm-5 col-form-label">Nama
                                                            Lengkap</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="bg-light form-control"
                                                                id="nama_lengkap" value="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="email"
                                                            class="text-dark col-sm-5 col-form-label">Email</label>
                                                        <div class="col-sm-7">
                                                            <input type="email" class="bg-light form-control" id="email"
                                                                value="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="telp"
                                                            class="col-sm-5 text-dark col-form-label">Telepon</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="bg-light form-control" id="Telpon">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="company"
                                                            class="col-sm-5 text-dark col-form-label">Company</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="bg-light form-control" id="company">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="alamat"
                                                            class="col-sm-5 text-dark col-form-label">Alamat</label>
                                                        <div class="col-sm-7">
                                                            <textarea class="form-control bg-light" id="alamat"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="provinsi"
                                                            class="col-sm-5 text-dark col-form-label">Provinsi</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="bg-light form-control" id="provinsi">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="kota"
                                                            class="text-dark col-sm-5 col-form-label">Kota</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="bg-light form-control" id="kota">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="jabatan"
                                                            class="text-dark col-sm-5 col-form-label">Jabatan</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="bg-light form-control" id="jabatan">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="penggunaan"
                                                            class="text-dark col-sm-5 col-form-label">Pengguanaan</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="bg-light form-control"
                                                                id="penggunaan">
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- Form Kanan -->
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label for="password"
                                                            class="text-dark col-sm-5 col-form-label">Password</label>
                                                        <div class="col-sm-7">
                                                            <input type="password" class="bg-light form-control"
                                                                id="password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="repassword"
                                                            class="text-dark col-sm-5 col-form-label">Ulangi
                                                            Password</label>
                                                        <div class="col-sm-7">
                                                            <input type="password" class="bg-light form-control"
                                                                id="repassword">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="bahasa"
                                                            class="text-dark col-sm-5 col-form-label">Bahasa</label>
                                                        <div class="col-sm-7">
                                                            <select class="form-control bg-light" id="bahasa">
                                                                <option value="">Indonesia</option>
                                                                <option value="">English</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="waktu" class="text-dark col-sm-5 col-form-label">Zona
                                                            Waktu</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="bg-light form-control" id="waktu">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="company" class="text-dark col-sm-5 col-form-label">Mata
                                                            Uang</label>
                                                        <div class="col-sm-2">
                                                            <input type="text" class="form-control bg-light" id="company">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="company"
                                                            class="text-dark col-sm-5 col-form-label">Penggunaan</label>
                                                        <div class="col-sm-7">
                                                            <span class="text-dark">: Pengguna Standar</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="company"
                                                            class="text-dark col-sm-5 col-form-label">Tanggal
                                                            Daftar</label>
                                                        <div class="col-sm-7">
                                                            <span class="text-dark">: 14 Januari 2020</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="company"
                                                            class="text-dark col-sm-5 col-form-label">Aktifitas
                                                            Terakhir</label>
                                                        <div class="col-sm-7">
                                                            <span class="text-dark">: 23 Febuari 2020</span>
                                                        </div>
                                                    </div>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Akun Saya -->
            </div>
        @endsection
