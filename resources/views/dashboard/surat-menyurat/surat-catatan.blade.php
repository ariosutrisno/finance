@extends('layouts.homepage.app')
@section('title', 'Catatan')
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
                                            <span class="h1 text-cyan"><strong> Catatan </strong></span>
                                            <br><span>buat gambar eksport dan berikan kepada orang lain</span></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <li style="list-style-type: none;">
                                        <button class="btn float-right"><i data-feather="file-text"></i></button><br>
                                    </li>
                                    <li style="list-style-type: none;">
                                        <span class="text-danger">Jumlah </span></li>
                                    <li style="list-style-type: none;"><span class="h2"><strong> 1
                                                Catatan</strong></span></li>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body" style="min-height: 500px !important;">
                            <div class="row">
                                <div class="col-md-3 ">
                                    <div class="card ml-3  bg-warning" style="min-height: 180px;" data-toggle="modal"
                                        data-target="#exampleModal" id="OnSelectCatatan" onclick="cobain()">
                                        <div class="card-body text-justify">
                                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quo impedit sit
                                            quam,

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card ml-3  bg-warning" style="min-height: 180px;">
                                        <div class="card-body ">
                                            <center>
                                                <a href=""><img src="img/add-2.png" class="mt-4" alt=""></a>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- MODAL CATATAN/NOTE --}}
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="card ml-3  bg-warning" style="min-height: 180px;">
                                <div class="card-body text-justify">
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quo impedit sit
                                    quam,
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger mr-1" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-success" name="submit"
                                        value="{{ old('dompet_simpan') }}" name="submit">Simpan</button>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
        <script>
            $(document).ready(function() {
                function openNote() {

                }
            });

        </script>
    @endsection
