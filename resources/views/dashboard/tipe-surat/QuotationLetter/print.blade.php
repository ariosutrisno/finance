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
span.cls_006{
        font-family:Arial,serif;
        font-size:14px;
        color:rgb(0,0,0);
        font-weight:bold;
        font-style:normal;
        text-decoration: none
        }
    span.cls_007{
        font-family:Arial,serif;
        font-size:14px;color:rgb(0,0,0);
        font-weight:normal;
        font-style:normal;
        text-decoration: none
        }
    span.cls_009{
        font-family:Arial,serif;
        font-size:14px;
        color:rgb(255,0,0);
        font-weight:bold;
        font-style:normal;
        text-decoration: none
        }
    span.cls_013{
        font-family:Arial,serif;
        font-size:12px;
        color:rgb(0,0,0);
        font-weight:bold;
        text-decoration: none
        }
    span.cls_012{
        font-family:Arial,serif;
        font-size:12px;
        color:rgb(0,0,0);
        font-weight:normal;
        font-style:italic;
        text-decoration: none
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
        <table class="table-borderless" style="border: none!important">
            <tr>
                <th colspan="2"><span style="font-size: 20px">Quotation</span></th>
                <th colspan="2"><span style="font-size: 16px">Alamat Tagihan</span></th>
            </tr>
            <tr>    
                <th>No.Quotation</th>
                <td>: {{ $data->nomor_surat }}</td>

                <td>Nama</td>
                <td>: {{ $pelanggan->pelanggan_nama }}</td>
            </tr>
            <tr>
                <th>Tanggal Quotation</th>
                <td>: {{ \Carbon\Carbon::parse($data->tgl_quotation)->locale('id')->isoformat('DD MMMM Y') }}</td>

                <td>Instansi</td>
                <td>: {{ $pelanggan->perusahaan }}</td>
            </tr>
            <tr>
                <th>Jatuh Tempo</th>
                <td>: {{ \Carbon\Carbon::parse($data->tgl_jatuh_tempo )->locale('id')->isoformat('DD MMMM Y') }}</td>

                <td>Alamat Instansi</td>
                <td>: {{ $pelanggan->perusahaan }}</td>
            </tr>
            <tr>
                <th>Perihal</th>
                <td>: {{ $data->perihal }}</td>

                <td>Kontak</td>
                <td>: {{ $pelanggan->pelanggan_telepon }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td><span class="cls_006">:<span class="cls_009"> Unpaid</span></td>

                <td></td>
                <td></td>
            </tr>



        </table>




        {{-- Table --}}

        <table class="table  table-bordered table-sm mt-3" id="POITable">

            <thead class="bg-light">
                <tr class="text-center text-dark">
                    <th>Nama Proyek</th>
                    <th>Biaya Proyek</th>

                </tr>
            </thead>
            <tbody class="container1">
                @foreach ($data->item as $item)


                <tr class="table-white ">
                    <td class="text-left">{{ucwords($item->nama_project)}}
                    </td>
                    <td class="text-right gini">Rp @currency($item->biaya_project)</td>

                </tr>
                @endforeach
                <?php
                    $c = $data->jumlah_pembayaran;
                        $d = $c*0.1;
                        $e = $d+$c
                        ?>
                <tr>
                    <td style="border-left: 1px solid Transparent!important;border-bottom: 1px solid Transparent!important;"
                        class="text-right pl-2"><span class="font-weight-bold ml-3">Sub Total</span></td>
                    <td class="text-right gini">Rp @currency($data->jumlah_pembayaran)</td>


                </tr>
                <tr>
                    <td style="border-left: 1px solid Transparent!important;border-bottom: 1px solid Transparent!important;"
                        class="text-right pl-2"><span class="font-weight-bold ml-3">Total +PPN 10%</span></td>

                    <td class="text-right gini">Rp @currency($e)</td>
                </tr>
            </tbody>
        </table>

        <span class="cls_012">Catatan :</span><br>
        <span class="pr-4 cls_012">Pembayaran dilakukan secara transfer ke nomor rekening </span><span class="cls_013"> Bank Mandiri 161-00-03-700-27-0 atas nama</span>
        <span class="cls_013">PT Alan Mediatech Indonesia</span>

        <p class="text-right mt-5"> Jakarta,
            {{ \Carbon\Carbon::parse($data->created_at)->locale('id')->isoformat('DD MMMM Y') }}
        </p>


        <p class="text-right font-weight-bold">Chief Executive Officer</p>


        <p class="text-right font-weight-bold  mt-5">Ahmad Alimuddin, S.Kom</p>
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
{{-- <img src="../../../img/Kopsurat_footer_2020.jpg" alt="" width='100%' style="bottom:0"></footer> --}}