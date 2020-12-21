@extends('layouts.homepage.app')
@section('title', 'Pengaturan Surat')
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
                                            <span class="h1 text-cyan"><strong> Pengaturan </strong></span>
                                            <br><span>edit data perusahaan</span></div>
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

                    <div class="card">
                        <div class="card-body">

                            <div>
                                <div class="container ml-5 pl-5 pb-5 mb-5 mr-5 pl-5">

                                    <div class="form-group row">
                                        <div class="col-2">
                                            <button type="button"
                                                class="tombol mt-5 mb-auto btn btn-md  bg-purpel note-btn-block col-form-label">Upload
                                                Foto</button>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="text-center">
                                                <img src="img/user.png" class="rounded"
                                                    style="height:84px;max-width:84px;">
                                            </div>
                                            <br>
                                            <input type="file" name="foto" id="foto">
                                            <br><br>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-2 col-form-label">Alamat Kantor</label>

                                        <div class="col-sm-4 row">

                                            <input type="text" class="form-control bg-light " id="alamat"
                                                placeholder="Jl. Pejuang"> </input> <br> <br>
                                            <input type="text" class="form-control bg-light " id="alamat"
                                                placeholder="Bekasi"></input>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-2 col-form-label">Phone</label>

                                        <div class="col-sm-4 row">

                                            <input type="text" class="form-control bg-light " id="alamat"
                                                placeholder="+62 8123321123"> </input>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-2 col-form-label">E-Mail</label>

                                        <div class="col-sm-4 row">

                                            <input type="email" class="form-control bg-light " id="alamat"
                                                placeholder="mul@alan.co.id"> </input>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-2 col-form-label">Website</label>

                                        <div class="col-sm-4 row">

                                            <input type="email" class="form-control bg-light " id="alamat"
                                                placeholder="wahmulyadi.my.id"> </input>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>

        @endsection  