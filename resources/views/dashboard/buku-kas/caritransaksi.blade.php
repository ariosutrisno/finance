@extends('layouts.homepage.app')
@section('title', 'Cari Transaksi')
@section('container')
    @include('layouts.homepage.css&js.cssdashboard')
    @include('layouts.homepage.css&js.css')


    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
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
                                            <span class="h1 text-cyan"><strong> Cari Transaksi </strong></span>
                                            <br><span>uang masuk dan keluar dalam hidup ini</span></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <li style="list-style-type: none;">
                                        <button class="btn float-right"><i data-feather="file-text"></i></button><br>
                                    </li>
                                    <li style="list-style-type: none;">
                                        <span>Saldo </span></li>
                                    <li style="list-style-type: none;"><span class="h2"><strong> Rp.
                                                {{-- {{ number_format($hitung) }}
                                                --}}
                                            </strong></span></li>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card overflow-hidden">
                    <div class="card-body border-bottom  shadow-lg p-3 bg-white rounded">
                        <nav class="navbar top-navbar float navbar-expand-md">
                            <ul class="navbar-nav float-right navbar-right ml-auto">
                                <!-- ============================================================== -->
                                <!-- Search -->
                                <!-- ============================================================== -->
                                <li class=" d-none d-sm-block">
                                    <a class="nav-link" href="javascript:void(0)">
                                        <form>
                                            <div class="customize-input">
                                                <input class="form-control custom-shadow custom-radius border-0 bg-white"
                                                    type="search" placeholder="Search" aria-label="Search" />
                                                <!-- <i class="form-control-icon text-left" data-feather="search"></i> -->
                                            </div>
                                        </form>
                                    </a>
                                </li>
                                <li class="nav-item d-none d-sm-block mr-1 mt-2">
                                    <select
                                        class="custom-select form-control bg-white custom-radius custom-shadow border-0">
                                        <option value="">Pengeluaran</option>
                                        <option value="">Pemasukan</option>
                                    </select>
                                </li>
                                <li class="nav-item d-none d-sm-block mr-1 mt-2">
                                    <select
                                        class="custom-select form-control bg-white custom-radius custom-shadow border-0">
                                        <option value="">Semua Kas</option>
                                        <option value="">Pemasukan</option>
                                    </select>
                                </li>
                                <li class="nav-item d-none d-sm-block mr-1 mt-2">
                                    <a class="nav-link bth btn-sm tombol text-white bg-alan " style="width: 125px;"
                                        href="javascript:void(0)">
                                        Cari

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
                                        <th>Tanggal</th>
                                        <th>Kategori</th>
                                        <th>Deskripsi</th>
                                        <th>Nominal</th>
                                        <th>Saldo</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($cari_transaksi as $transaksi) --}}


                                        <tr class="table-danger">
                                            {{-- <th scope="row" class="text-center "><i
                                                    data-feather="arrow-up"></i></th>
                                            <td class="text-center">
                                                {{ \Carbon\Carbon::parse($transaksi->transaksi_tanggal)->locale('id')->isoformat('d MMMM Y') }}
                                            </td>
                                            <td class="text-center">{{ $transaksi->transaksi_kategori }}</td>
                                            <td class="text-center">{{ $transaksi->transaksi_deskripsi }}</td>
                                            <td class="text-right">Rp. {{ number_format($transaksi->transaksi_nominal) }}
                                            </td>
                                            <td class="text-right">Rp. {{ number_format($transaksi->transaksi_kas) }}</td>
                                            <td class="text-center"> --}}
                                                {{-- @if (Auth::check())


                                                    {!! Form::open(['method' => 'DELETE']) !!}
                                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                                    {{ link_to('hutang/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}


                                                    {!! Form::close() !!}
                                                @endif --}}
                                            </td>
                                        </tr>
                                        {{-- @endforeach
                                    --}}
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    @endsection
