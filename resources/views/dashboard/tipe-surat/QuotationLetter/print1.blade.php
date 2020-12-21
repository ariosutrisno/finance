<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./././css/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    {{-- css testing --}}
    <link rel="stylesheet" href="../../../css/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <title>Surat Penerimaan</title>


</head>

<style>
    @page {
        size: a4 potrait;
        margin: 0;
        padding: 0;
        /* margin-top: 25px; */
        margin-bottom: 100px;
        /* // you can set margin and padding 0  */
    }

    .columnlabel {
        float: left;
        width: 20%;
        padding: 0;
        /* height: 300px; */
        /* Should be removed. Only for demonstration */
    }

    .columnvalue {
        float: left;
        width: 80%;
        padding: 0;
        /* height: 300px; */
        /* Should be removed. Only for demonstration */
    }

    .columncontent {
        float: left;
        width: 50%;
        padding: 0;
    }

    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    header {
        position: fixed;
        top: -60px;
        left: 0px;
        right: 0px;
        height: 50px;

        /** Extra personal styles **/
        /* background-color: #03a9f4; */
        /* color: white; */
        text-align: center;
        line-height: 35px;
    }

    footer {
        position: fixed;
        bottom: -60px;
        left: 0px;
        right: 0px;
        height: 50px;

        /** Extra personal styles **/
        /* background-color: #03a9f4; */
        /* color: white; */
        text-align: center;
        line-height: 35px;
    }

    html,
    body {
        height: 100%;
    }

    body {
        display: flex;
        flex-direction: column;
    }

    .content {
        flex: 1 0 auto;
    }

    .footer {
        flex-shrink: 0;
    }

    .grid-container {
        display: grid;
        grid-template-columns: auto auto;
        grid-gap: 10px;
        /* background-color: #2196F3; */
        padding: 20px;
    }

    .grid-container>div {
        /* background-color: rgba(255, 255, 255, 0.8); */
        /* text-align: center; */
        padding: 40px 0;
        /* font-size: 30px; */
    }

    .item1 {
        grid-row-start: 1;
        grid-row-end: 2;
    }
</style>
{{-- Header Testing --}}
{{-- <img src="../../../img/Kop-Surat-Alan-2020.png" width="100%" /> --}}


<img src="./././img/Kop-Surat-Alan-2020.png" width="100%" />
<div class="content">
    <div class="container">
        {{-- <div class="grid-container">
            <div class="item1"> --}}
        <div class="row">
            <div class="columncontent">

                <h1>Invoice</h1>
                <div class="row">
                    <div class="columnlabel">No. Invoice </div>
                    <div class="columnvalue">: 001/Alan-C/XI/2020</div>
                </div>
                <div class="row">
                    <div class="columnlabel">Tanggal Invoice</div>
                    <div class="columnvalue">: 01 September 2020</div>
                </div>
                <div class="row">
                    <div class="columnlabel">Jatuh Tempo</div>
                    <div class="columnvalue">: 07 September 2020</div>
                </div>
                <div class="row">
                    <div class="columnlabel">Perihal</div>
                    <div class="columnvalue">: Tagihan Pengembangan aplikasi Kruuu
                        berbasis web dan mobile</div>
                </div>

                <div class="row">
                    <div class="columnlabel">Status </div>
                    <div class="columnvalue">: Paid</div>
                </div>
            </div>
            {{-- </div> --}}
            {{-- <div class="item2"> --}}
            <div class="columncontent">
                <h5 style="padding-top:30px" class="font-weight-bold">Alamat Ditagih</h5>
                <div style="margin-top: -10px">
                    <div class="row">
                        <div class="columnlabel">Nama </div>
                        <div class="columnvalue">: Ario Sutrisno</div>
                    </div>
                    <div class="row">
                        <div class="columnlabel">Instansi</div>
                        <div class="columnvalue">: PT. Ario Maju Terus</div>
                    </div>
                    <div class="row">
                        <div class="columnlabel">Alamat</div>
                        <div class="columnvalue">: Jl.Kebangsaan Timur No.4 Lt.8, Jakarta Bagian Mana</div>
                    </div>
                    <div class="row">
                        <div class="columnlabel">Kontak</div>
                        <div class="columnvalue">:+62 896-1234-1233</div>
                    </div>

                </div>
            </div>
        </div>
        {{-- </div>
        </div> --}}
    </div>
</div>

<script src="./././css/src/assets/libs/popper/dist/umd/popper.min.js"></script>
<script src="./././css/src/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="./././css/src/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>

{{-- JS Testing --}}
{{-- <script src="../../../css/src/assets/libs/popper/dist/umd/popper.min.js"></script>
<script src="../../../css/src/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../../../css/src/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script> --}}



<footer>
    <img src="./././img/Kopsurat_footer_2020.jpg" alt="" width='100%' style="bottom:0"></footer>
{{-- FOoter testing --}}
<img src="../../../img/Kopsurat_footer_2020.jpg" alt="" width='100%' style="bottom:0"></footer>