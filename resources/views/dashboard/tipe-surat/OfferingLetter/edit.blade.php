@extends('layouts.homepage.app')
@section('title', 'Offeing Letter')
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
                                        <img src="{{ asset('img/Page-1.png')}}" alt="Hutang">
                                    </div>
                                    <div class="col-sm-10 ml-3">
                                        <span class="h1 text-cyan"><strong> Offering Letter </strong></span>
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

                        <form action="{{ route('offeringupdate') }}" method="POST">
                            @csrf
                            @if ($data->letter_peruntukan == '0')
                                <div class="form-row" id="hiddenNosurat">
                                    <div class="form-group col-md-12">
                                        <label for="inputAddress">No Surat</label>
                                        <input id="txt1" type="text" class="form-control" id="inputAddress" placeholder=""
                                            name="nosurat" value="{{$data->nomor_surat}}" readonly></input>
                                    </div>
                                </div>
                            @else

                            @endif

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Nama" name="name"
                                        value="{{$data->letter_nama}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="email" name="email"
                                        value="{{$data->letter_email}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">Telepon</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St"
                                        name="telepon" value="{{$data->letter_telepon}}"></input>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">Address</label>
                                    <textarea type="text" class="form-control" id="inputAddress"
                                        placeholder="1234 Main St" name="address">{{$data->letter_alamat}}</textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputAddress">Peruntukan</label>
                                    @if ($data->letter_peruntukan == '0')
                                    <input type="text" class="form-control" id="inputAddress" placeholder=""
                                        value="Internship" readonly></input>
                                    <input type="text" class="form-control" id="inputAddress" placeholder=""
                                        name="letter_peruntukan" value="0" readonly hidden></input>
                                    @else
                                    <input type="text" class="form-control" id="inputAddress" placeholder=""
                                        value="Penerimaan Karyawan" readonly></input>
                                    <input type="text" class="form-control" id="inputAddress" placeholder=""
                                        name="letter_peruntukan" value="1" readonly hidden></input>
                                    @endif

                                </div>


                            </div>
                            <div class="form-row">
                                <div id="mol" class="form-group col-md-12">
                                    <label for="inputAddress">Tanggal Lamar</label>
                                    <input type="date" class="form-control" id="inputAddress" placeholder=""
                                        name="tgl_lamar" value="{{$data->letter_tanggal_lamar}}"></input>
                                </div>
                            </div>
                            <div class="form-row">
                                @if ($data->letter_peruntukan == '0')
                                <div id="mol" class="form-group col-md-6">
                                    <label for="inputAddress">Tanggal Mulai</label>
                                    <input type="date" class="form-control" id="inputAddress" placeholder=""
                                        name="tgl_mulai" value="{{$data->letter_tanggal_mulai}}"></input>
                                </div>

                                <div id="tanggal_selesai" class="form-group col-md-6">
                                    <label for="inputAddress">Tanggal Selesai</label>
                                    <input type="date" class="form-control" id="inputAddress" placeholder=""
                                        name="tgl_selesai" value="{{$data->letter_tanggal_selesai}}"></input>
                                </div>
                                @else
                                <div id="mol" class="form-group col-md-12">
                                    <label for="inputAddress">Tanggal Mulai</label>
                                    <input type="date" class="form-control" id="inputAddress" placeholder=""
                                        name="tgl_mulai" value="{{$data->letter_tanggal_mulai}}"></input>
                                </div>
                                @endif

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">Jam Mulai</label>
                                    <input type="time" class="form-control" id="inputAddress" placeholder=""
                                        name="jam_mulai_kerja" value="{{$data->letter_jam_mulai}}"></input>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">Jam Selesai</label>
                                    <input type="time" class="form-control" id="inputAddress" placeholder=""
                                        name="jam_selesai_kerja" value="{{$data->letter_jam_selesai}}"></input>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    @if ($data->letter_peruntukan == '0')
                                    <label id="narahubung" for="inputAddress">Nama Pembimbing</label>
                                    @else
                                    <label id="narahubung" for="inputAddress">Narahubung</label>
                                    @endif

                                    <input type="text" class="form-control" id="inputAddress" placeholder=""
                                        name="narahubung" value="{{$data->letter_narahubung}}"></input>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">Telepon</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder=""
                                        name="telepon_pembimbing" value="{{$data->letter_telepon_pembimbing}}"></input>
                                </div>
                            </div>
                            <input name="idx_offering_letter" value="{{$data->idx_offering_letter}}" hidden>
                            <div class="float-md-right">
                                <a href="{{route('offering')}}" class="btn btn-danger  ml-5">Cancel</a>
                                <button type="submit" class="btn btn-primary ">Update</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div> <!-- Script JS -->
    {{--  --}}
</div>
@endsection