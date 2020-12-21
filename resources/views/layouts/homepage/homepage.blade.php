@extends('layouts.homepage.app')
@section('title', 'Welcome')
@section('container')
    @include('layouts.homepage.css&js.css')
    @include('layouts.homepage.navbarapp')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="lead text-white"><strong> Hallo Businessman!</strong></p>
                    <h1 class="display-4 text-white"><strong>Rencanakan Bisnis Anda.</strong> </h1>
                    <p class="text-white">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit ad cum totam
                        autem
                        pariatur non est dolor sed
                        recusandae, maxime, doloremque, hic minima tenetur numquam. Unde sapiente error ex eius!</p>
                    <p>
                        <a href=""><img src="img/app.png" style="max-width: 194px; max-height: 75px;" class="mt-2"
                                alt="nostrum"></a> <a href=""><img src="img/en_badge_web_generic-1.png" class="mt-2"
                                alt="nostrum">
                        </a>
                    </p>
                    <p class="lead mt-5">
                    @guest
                        <a class="btn mt-5  tombol bg-purpel btn-lg" href="{{ url('/register') }}" style="width: 30%;"
                            role="button">Register</a>
                    @else
                    <a class="btn mt-5  tombol bg-purpel btn-lg" href="{{ url('/dashboard') }}" style="width: 30%;"
                            role="button">Dashboard</a>
                    </p>
                    @endguest
                </div>
                <div class="col-md-6">
                    <center>
                        <img class="text-center" src="img/asset-alanfintech-1.png" style="max-height: 720px !important;"
                            alt="#"></center>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="row justify-content-center " style="margin-top: 80px; margin-bottom: 80px;">
            <h2>Bagaimana Cara Kerjanya?</h2>
            <div class="col-lg-10 info-panel" style="margin-top: 50px;">
                <div class="row">
                    <div class="col-lg">
                        <center>

                            <img src="img/Groupwl@2x.png" style="min-height: 60px; min-width: 60px;" alt="Test>.jpg"></img>

                        </center>
                        <p class="text-center mt-3"> Tulis Transaksi Keuangan</p>
                    </div>
                    <div class="col-lg">
                        <center>
                            <img src="img/Groupch@2x.png" style="min-height: 60px; min-width: 60px;" alt="Test>.jpg"></img>
                        </center>
                        <p class="text-center mt-3"> Lihat Record dan Satistik</p>
                    </div>
                    <div class="col-lg">
                        <center>
                            <img src="img/Groupdl@2x.png" style="min-height: 60px; min-width: 60px;" alt="Test>.jpg"></img>
                        </center>
                        <p class="text-center mt-3">Download Record</p>
                    </div>
                    <div class="col-lg">
                        <center>
                            <img src="img/Groupact@2x.png   " style="min-height: 60px; min-width: 60px;"
                                alt="Test>.jpg"></img></center>
                        <p class="text-center mt-3">Take an Action</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-coklat">
        <div class="container mt-5">
            <div class="row mt-5 ">
                <div class="col-lg-6">
                    <video width="480" class="mt-5 mb-5 pb-5 pt-5" height="450s" controls>
                        <source src="video.mp4" type="video/mp4" />
                        Browser Anda Tidak Mensupport HTML 5 Video
                    </video>
                </div>
                <div class="col-lg-6">
                    <div class="konten">
                        <h3 class="text-justify text-dark"><strong> Alan Finance </strong></h3>
                        <h1 class="text-justify text-dark"><strong>Apa Itu?</strong></h1>
                        <p class="text-justify text-dark"> Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                            Facilis
                            molestiae ratione sapiente. Debitis, ea ducimus rerum perspiciatis doloribus nihil
                            temporibus
                            molestiae ex, eaque iure aut fugiat alias et, magni rem?</p>


                        <a href=""><img src="img/app.png" style="max-width: 194px; max-height: 75px;" class="mt-2"
                                alt="nostrum"></a> <a href=""><img src="img/en_badge_web_generic-1.png" class="mt-2"
                                alt="nostrum"></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-light">
        <div class="row ">
            <div class="col-lg-4 mx-auto pt-5 ">
                <h2 class="text-center font-weight-bold">Features</h2>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci qui animi officiis et, itaque a
                dicta, molestias ex tenetur culpa sed, dignissimos cum reprehenderit maxime necessitatibus quo at
                excepturi voluptatibus?
            </div>
        </div>
        <div class="row" style="padding-right: 10%; padding-left: 10%;">
            <div class="col-lg-4 pt-5 ml-0">
                <li class="text-right pb-3" style="list-style: none;">
                    <h5>Catat Transaksi</h5>
                    <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid ex optio
                        nam, amet ullam alias
                        quasi tempora asperiores illum, at debitis voluptate mollitia suscipit corrupti doloribus magni
                        dolore natus voluptatibus.</p>
                </li>
                <li class="text-right pb-3" style="list-style: none;">
                    <h5>Record Transaksi</h5>
                    <p class="text-justify">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Expedita dolores
                        ipsam omnis nulla debitis
                        dolorem illo facere iusto mollitia voluptate blanditiis temporibus recusandae distinctio, earum
                        consequuntur magnam. Vel, esse maiores?</p>
                </li>
                <li class="text-right pb-3" style="list-style: none;">
                    <h5>Hutang Piutang</h5>
                    <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi quas et
                        debitis blanditiis esse
                        soluta harum exercitationem minus ex magni quo facere, est, libero aliquam porro incidunt,
                        labore
                        ipsa? Quam!</p>
                </li>
            </div>
            <div class="col-lg-4  mt-5 pb-5">
                <center><img src="img/asset-alanfintech.png" alt="" srcset=""></center>
            </div>
            <div class="col-lg-4 pt-5">
                <li class="text-left pb-3" style="list-style: none;">
                    <h5>Persedian</h5>
                    <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid ex optio
                        nam, amet ullam alias
                        quasi tempora asperiores illum, at debitis voluptate mollitia suscipit corrupti doloribus magni
                        dolore natus voluptatibus.</p>
                </li>
                <li class="text-left pb-3" style="list-style: none;">
                    <h5>Kontak Bisnis</h5>
                    <p class="text-justify"> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Expedita dolores
                        ipsam omnis nulla
                        debitis
                        dolorem illo facere iusto mollitia voluptate blanditiis temporibus recusandae distinctio, earum
                        consequuntur magnam. Vel, esse maiores?</p>
                </li>
                <li class="text-left pb-3" style="list-style: none;">
                    <h5>Patuh SAK EMKM</h5>
                    <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi quas et
                        debitis blanditiis esse
                        soluta harum exercitationem minus ex magni quo facere, est, libero aliquam porro incidunt,
                        labore
                        ipsa? Quam!</p>
                </li>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto pt-5 ">
                <center><img src="img/pin@2x.png" alt="">
                    <p class="pb-5 mt-4 mb-3">

                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci qui animi officiis et,
                        itaque
                        a
                        dicta, molestias ex tenetur culpa sed, dignissimos cum reprehenderit maxime necessitatibus
                        quo
                        at
                        excepturi voluptatibus?
                    </p>
                </center>
            </div>
        </div>
    </div>
    <div class="container-fluid bb h-100">

        <div class="row">
            <div class="col-lg-6">
                <img src="img/man-standing-on-stage-1.png" style="margin-top:50px;max-height: 400px; max-width: 720px;"
                    alt="" srcset="">
            </div>
            <div class="col-lg-6" style="margin-top: 90px;">
                <h5>Lorem Ipsum</h5>
                <h1><strong>Lorem Ipsum</strong></h1>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt fugit, eius alias placeat quis neque
                distinctio fugiat maiores voluptatum corrupti eaque, iure dolor aliquam dolorum officia ab ad
                possimus
                temporibus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, nihil quam. Assumenda
                repellat
                facere, nobis iusto, perferendis sequi porro totam velit ut consequuntur fugit magnam rem officia
                alias
                unde
                reiciendis?
            </div>
        </div>


    </div>
    
    
    <!-- Footer -->
    <footer class="page-footer font-small bg-secondary darken-3">

        <!-- Footer Elements -->
        <div class="container">

            <!-- Grid row-->
            <div class="row justify-content-center">
                <center>
                    <!-- Grid column -->
                    <div class="col-md-12 py-5 justify-content-center">
                        <div class="mb-5 flex-center justify-content-center">
                            <h1 class="font-weight-bold text-white pb-5">Alan Finance</h1>
                            <p class="pb-5">
                                <a href="" class="mt-5 ml-3 mr-3 text-white font-weight-bold  pb-5"> About</a>
                                <a href="" class="mt-5 ml-3 mr-3 text-white font-weight-bold  pb-5">Terms of
                                    Service</a>
                                <a href="" class="mt-5 ml-3 mr-3 text-white font-weight-bold  pb-5">Privacy
                                    Policy</a>
                                <a href="" class="mt-5 ml-3 mr-3 text-white font-weight-bold  pb-5">FAQ</a>
                                <a href="" class="mt-5 ml-3 mr-3 text-white font-weight-bold  pb-5">Sitemap</a>
                                <a href="" class="mt-5 ml-3 mr-3 text-white font-weight-bold    pb-5">Contact</a>
                            </p>
                            <!-- Facebook -->
                            <a href="" class="fb-ic">
                                <img src="img/facebook.png" class="jejer" alt="">
                            </a>
                            <!-- Twitter -->
                            <a href="" class="tw-ic">
                                <img src="img/instagram.png" class="jejer" alt="">
                            </a>

                            <!--Instagram-->
                            <a href="" class="ins-ic">
                                <img src="img/logo.png" class="jejer" alt="">
                            </a>

                            <!--Instagram-->
                            <a href="" class="ins-ic">
                                <img src="img/mail.png" class="jejer" alt="">
                            </a>
                            <!--Pinterest-->
                            <!-- Twitter -->
                            <a class="tw-ic">
                                <img src="img/twitter.png" class="jejer" alt="">
                            </a>
                        </div>


                    </div>
                </center>
                <!-- Grid column -->

            </div>
            <!-- Grid row-->

        </div>
        <!-- Footer Elements -->

        <!-- Copyright -->
        <div class="footer-copyright text-center text-light font-weight-bold py-3">Alan Finance © 2020 PT. Alan
            Creative
            - All Rights Reserved
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->

@endsection
