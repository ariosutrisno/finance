@extends('layouts.homepage.app')
@section('title', 'MultiUser')
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
                                                <img src="img/Page-1.png" alt="Hutang">
                                            </div>
                                            <div class="col-sm-10 ml-4">
                                                <span class="h1 text-cyan"><strong> Multi User </strong></span>
                                                <br><span>Jano</span></div>
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


                        <!-- Kategori -->

                        <div class="container">
                            <div class="row">
                                <div class="card col-md-12">
                                    <div class="card-body mb-5">
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Incidunt sit
                                            itaque, id obcaecati beatae suscipit ad aperiam aspernatur harum molestias
                                            eum voluptas totam laboriosam voluptatum rerum quo velit neque sapiente?

                                        </p>
                                        <h4 class="text-dark"><strong> Manager</strong></h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur
                                            voluptatibus necessitatibus non, nemo laudantium possimus. Iusto aspernatur
                                            facilis adipisci delectus animi velit, consectetur explicabo quibusdam
                                            vitae, distinctio veniam unde magni.</p>
                                        <h4 class="text-dark"><strong> Supervisor</strong></h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam cupiditate esse
                                            explicabo neque dignissimos. Odit aperiam quo dicta laudantium, itaque vero,
                                            eveniet illum eligendi, ratione perspiciatis rem similique fuga alias?</p>
                                        <h4 class="text-dark"><strong>Writer</strong></h4>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, ducimus.
                                            Alias maiores ut pariatur quaerat cupiditate. Architecto porro ratione
                                            consequuntur, quia illum enim minima tenetur! Non facilis assumenda nesciunt
                                            inventore.
                                        </p>
                                        <h4 class="text-dark"><strong> Read Only</strong></h4>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo culpa ab
                                            tempore pariatur laudantium dignissimos omnis ipsam harum neque quos,
                                            voluptas, obcaecati deleniti voluptates nisi reprehenderit possimus sunt
                                            soluta tenetur!
                                        </p>
                                        <h4 class="text-dark"><strong> Custom</strong></h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem accusamus
                                            ratione nostrum, dignissimos dicta architecto! Dicta aliquam tempora sit
                                            nam. Voluptate ut dolores, qui maiores fuga voluptatem cupiditate obcaecati
                                            accusantium?</p>

                                        <p class="text-purple mt-5"><a href="#" class="text-purple mt-5 "><strong> Baca
                                                    tutorial
                                                    >> </strong></a></p>

                                        <p class="text-dark mb-5"><strong class="mb-5">Daftar Pengguna</strong></p>
                                        <p>
                                        </p>

                                        <!-- <div class="card     col-md-5">
                                                <div class="card-body bg-light rounded">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <img src="img/man-1.png" alt="">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class=" card-title ml-5">
                                                                <span class="akun">Username</span>
                                                                <p class="text-dark">Custom</p>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="card-footer text-muted">
                                                    2 days ago
                                                </div>
                                            </div> -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="card rounded border-dark"
                                                    style="min-height: 180px; max-height: 200px;">
                                                    <div class="card-body bg-transparent">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <img src="img/man-1.png" alt="">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <p class=" card-title ml-5 akun">Username</p>
                                                                <p class="card-text ml-5">Custom</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-muted"
                                                        style="max-height: 40px !important;">
                                                        <div class=" text-right">
                                                            <a href="" class="text-right text-danger">Hapus</a> <a href=""
                                                                class="text-right text-purpel ml-3">Edit</a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="card bg-light rounded border-dark"
                                                    style="min-height: 180px; max-height: 180px;">
                                                    <div class=" card-body">
                                                        <center><a href="">
                                                                <img src="img//add-2.png"
                                                                    style="max-height: 48px; max-width: 48px;" class="mt-3"
                                                                    alt="">
                                                                <p class="mt-3"><strong>Tambah Baru</strong></p>
                                                            </a></center>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- End Kategori -->
                            </div>


                        </div>


                    </div>

                </div>
            </div>
        </div>

    @endsection
