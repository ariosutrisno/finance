@extends('layouts.homepage.app')
@section('title', 'Buat data pelanggan')
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
                                        <img src="../../img/Page-1.png" alt="images">
                                    </div>
                                    <div class="col-sm-10 ml-3">
                                        <span class="h1 text-cyan"><strong> Daftar Pelanggan </strong></span>
                                        <br><span>buat surat dan berikan kepada orang lain</span></div>
                                </div>
                            </div>
                            <div class="col-md-4">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('pelanggan-update') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Nama" name="name"
                                        value="{{$data->pelanggan_nama}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="email" name="email"
                                        value="{{$data->pelanggan_email}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="tlp">Telepon</label>
                                    <input type="text" class="form-control" id="tlp" placeholder="" name="telepon"
                                        value="{{$data->pelanggan_telepon}}"></input>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="perusahaana">Nama Perusahaan</label>
                                    <input type="text" class="form-control" id="perusahaana" placeholder=""
                                        name="perusahaan" value="{{$data->perusahaan}}"></input>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="perusahaan">Alamat Perusahaan</label>
                                    <textarea type="text" id="perusahaan" class="form-control"
                                        name="alamat">{{$data->pelanggan_alamat}}</textarea>
                                </div>
                            </div>
                            <input type="text" name="idx_pelanggan" value="{{$data->idx_pelanggan}}" hidden readonly>
                            <div class="float-md-right">
                                <a href="{{route('daftarpelanggan')}}" class="btn btn-danger  ml-5">Cancel</a>
                                <button type="submit" class="btn btn-primary ">Update</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div> <!-- Script JS -->
</div>
@endsection