@extends('layouts.homepage.app')
@section('title', 'Surat Menyurat')
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
                <div class="container h">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-sm-1 mt-1">
                                            <img src="img/Page-1.png" alt="Hutang">
                                        </div>
                                        <div class="col-sm-10 ml-4">
                                            <span class="h1 text-cyan"><strong> Surat Menyurat </strong></span>
                                            <br><span>Buat dan kirim surat kesemuanya</span></div>
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


                    <!-- Surat Menyurat Item -->

                    <div class="container">
                        <div class="row">
                            <div class="card col-md-12">
                                <div class="card-body mb-5 " style="min-height: 500px !important;">

                                    <div class="row ">
                                        <div class="col-md-3 ">
                                            <div class="card bg-light">
                                                <div class="card-body text-center" style="min-height: 80px !important;">
                                                    <a href="{{ url('/invoice') }}"><img class="card-img-top mt-3 mb-3"
                                                            src="{{ asset('img/Page-1.png') }}"
                                                            style="max-height: 75px !important; max-width: 75px !important;"
                                                            alt="Card image cap">
                                                        <p class="mt-3"><strong>Invoice </strong>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card bg-light">
                                                <div class="card-body text-center" style="min-height: 80px !important;">
                                                    <a href="{{ url('/quotation') }}"><img
                                                            class="card-img-top mt-3 mb-3"
                                                            src="{{ asset('img/Page-1.png') }}"
                                                            style="max-height: 75px !important; max-width: 75px !important;"
                                                            alt="Card image cap">
                                                        <p class="mt-3"><strong>Quotation Letter</strong>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card bg-light ">
                                                <div class="card-body text-center" style="min-height: 80px !important;">
                                                    <a href="{{ url('/offering') }}"><img class="card-img-top mt-3 mb-3"
                                                            src="{{ asset('img/Page-1.png') }}"
                                                            style="max-height: 75px !important; max-width: 75px !important;"
                                                            alt="Card image cap">
                                                        <p class="mt-3"><strong>Offering Letter</strong>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card bg-light">

                                                <div class="card-body text-center" style="min-height: 80px !important;">
                                                    <a href="{{ route('daftarpelanggan') }}"><img
                                                            class="card-img-top mt-3 mb-3"
                                                            src="{{ asset('img/Page-7.png') }}"
                                                            style="max-height: 75px !important; max-width: 75px !important;"
                                                            alt="Card image cap">
                                                        <p class="mt-3"><strong>Daftar Pelanggan</strong>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>


                                        {{-- <div class="col-md-3">
                                            <div class="card bg-light">
                                                <div class="card-body text-center "
                                                    style="min-height: 80px  !important;">
                                                    <a href="{{ route('kategori') }}"><img
                                            class="card-img-top mt-3 mb-3" src="{{ asset('img/Page-5.png') }}"
                                            style="max-height: 75px !important; max-width: 75px !important;"
                                            alt="Card image cap">
                                        <p class="mt-3"><strong>Kategori</strong>
                                            </a>
                                    </div>
                                </div>

                            </div> --}}
                            {{-- <div class="col-md-3">
                                            <div class="card bg-light">

                                                <div class="card-body text-center"
                                                    style="min-height: 80px  !important;">
                                                    <a href="{{ route('catatan') }}"><img
                                class="card-img-top mt-3 mb-3" src="{{ asset('img/Page-5.png') }}"
                                style="max-height: 75px !important; max-width: 75px !important;" alt="Card image cap">
                            <p class="mt-3"><strong>Catatan</strong></p>
                            </a>
                        </div>
                    </div>
                    </center>
                </div> --}}

            </div>
        </div>
    </div>
</div> <!-- End Surat Menyurat -->
</div>

</div>


</div>

</div>
@endsection