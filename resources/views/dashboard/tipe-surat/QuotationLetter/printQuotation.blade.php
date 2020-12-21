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

    /* .columnlabel {
        float: left;
        width: 20%;
        padding: 0;
       
    }

    .columnvalue {
        float: left;
        width: 80%;
        padding: 0;
     
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
    } */

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
    h1{
        font-weight: bold;
    }
    div{
        
    }
</style>
{{-- Header Testing --}}
{{-- <img src="../../../img/Kop-Surat-Alan-2020.png" width="100%" /> --}}


<img src="./././img/Kop-Surat-Alan-2020.png" width="100%" />
<h1>Quotation</h1>
<div>No.Quotation</div> <div> : {{$data->nomor_surat}}</div>
<div>Tanggal Dikirim</div> <div>: {{$data->tgl_quotation}}</div>
<div>Jatuh Tempo</div> <div> : {{$data->tgl_jatuh_tempo}}</div>
<div>Perihal</div> <div> : {{$data->perihal}}</div>
<div>Status</div> <div>Unpaid</div>
<div>Alamat Tagihan</div> <div></div>
<div>Nama</div> <div> : {{$pelanggan->pelanggan_nama}}</div>
<div>Instansi</div> <div> : {{$pelanggan->perusahaan}}</div>
<div>Alamat</div>   <div> : {{$pelanggan->pelanggan_alamat}}</div>
<div>Kontak</div>   <div> :{{$pelanggan->pelanggan_email}}</div> <br> {{$pelanggan->pelanggan_telepon}}

{{-- Table --}}


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
{{-- <img src="../../../img/Kopsurat_footer_2020.jpg" alt="" width='100%' style="bottom:0"></footer> --}}