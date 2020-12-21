<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./././css/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    {{-- css testing --}}
    <link rel="stylesheet" href="../../../css/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <title>Surat Invoice</title>


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
    header {
        position: fixed;
        top: -60px;
        left: 0px;
        right: 0px;
        height: 50px;
    }
    span.cls_004{
        font-family:Arial,serif;
        font-size:20px;
        color:rgb(0,0,0);
        font-weight:bold;
        font-style:normal;
        text-decoration: none
    }
    span.cls_005{
        font-family:Arial,serif;
        font-size:20px;
        color:rgb(0,0,0);
        font-weight:bold;
        font-style:normal;
        text-decoration: none
        }
    span.cls_020{
        font-family:Arial,serif;
        font-size:14px;
        color:rgb(0,0,0);
        font-weight:bold;
        font-style:normal;
        text-decoration: none
        }
    span.cls_006{
        font-family:Arial,serif;
        font-size:14px;
        color:rgb(0,0,0);
        font-weight:bold;
        font-style:normal;
        text-decoration: none
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
    span.cls_011{
        font-family:Arial,serif;
        font-size:12.1px;
        color:rgb(0,0,0);
        font-weight:normal;
        font-style:normal;
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
    span.cls_014{
        font-family:Arial,serif;
        font-size:10.9px;
        color:rgb(0,0,0);
        font-weight:normal;
        font-style:italic;
        text-decoration: none
        }
    span.cls_016{
        font-family:Arial,serif;
        font-size:12px;
        color:rgb(0,0,0);
        font-weight:bold;
        font-style:normal;
        text-decoration: none
        }
    span.cls_018{
        font-family:Arial,serif;
        font-size:16.8px;
        color:rgb(0,0,0);
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
        /** Extra personal styles **/
        /* background-color: #03a9f4; */
        /* color: white; */
        /* text-align: center;
        line-height: 35px; */
    }
    span.cls_008{
        font-family:Arial,serif;
        font-size:14px;
        color:rgb(255,0,0);
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
    span.cls_003{
        font-family:Times,serif;
        font-size:14px;
        color:rgb(0,0,0);
        font-weight:normal;
        font-style:normal;
        text-decoration: none
        }
    span.cls_014{
        font-family:Arial,serif;
        font-size:10.9px;
        color:rgb(0,0,0);
        font-weight:normal;
        font-style:italic;
        text-decoration: none
        }
    footer {
        position: fixed;
        bottom: -60px;
        left: 0px;
        right: 0px;
        height: 50px;

        /** Extra personal styles **/
        background-color: #03a9f4;
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
    
    
</style>
{{-- Header Testing --}}
<img src="./././img/Kop-Surat-Alan-2020.png" width="100%" />
<div class="content">
    <div class="container">
        <table class="table-borderless" style="border: none!important">
            <tr >
                <th colspan="4"><span class="cls_004">INVOICE</span></th>
                <th colspan="2" style="left:555px;"><span class="cls_005">Alamat Tagihan</span></th>
            </tr>
            <tr>
                <th><span class="cls_006">No. Invoice</span></th>
                <td><span class="cls_006">: </span><span class="cls_007">{{ $data->nomor_surat }}</span></td>
                <td></td>
                <td></td>
                <td><span class="cls_007">Nama</span></td>
                <td><span class="cls_007">: {{ ucwords($data->Daftar_Pelanggan[0]->pelanggan_nama) }}</span></td>
            </tr>
            <tr>
                <th><span class="cls_006">Tanggal Invoice</span></th>
                <td><span class="cls_006">: {{ \Carbon\Carbon::parse($data->tanggal_invoice)->locale('id')->isoformat('DD MMMM Y') }}</span></td>
                <td></td>
                <td></td>
                <td><span class="cls_007">Instansi</span></td>
                <td><span class="cls_007">: {{ ucwords($data->Daftar_Pelanggan[0]->perusahaan) }}</td>
            </tr>
            <tr>
                <th><span class="cls_006">Jatuh Tempo</span></th>
                <td><span class="cls_006">:</span><span class="cls_008"> </span><span class="cls_009">{{ \Carbon\Carbon::parse($data->jatuh_tempo_invoice)->locale('id')->isoformat('DD MMMM Y') }}</td>
                    <td></td>
                    <td></td>
                <td ><span class="cls_007">Alamat Instansi</span></td>
                <td><span class="cls_006">: </span><span class="cls_003">{{ ucwords($data->Daftar_pelanggan[0]->pelanggan_alamat) }}</span></td>
            </tr>
            <tr>
                <th><span class="cls_006">Perihal</span></th>
                <td><span class="cls_006">:</span><span class="cls_007"> {{ $data->perihal }}</span></td>
                <td></td>
                <td></td>
                <td ><span class="cls_007">Kontak</span></td>
                <td><span class="cls_006">:</span><span class="cls_007"> {{ $data->Daftar_Pelanggan[0]->pelanggan_telepon }}</span></td>
            </tr>
            <tr>
                <th><span class="cls_006">Status</span></th>
                <td><span class="cls_006">:</span><span class="cls_007"> </span><span class="cls_009">Unpaid</span></td>
                
                <td></td>
                <td></td>
            </tr>




        </table>


        {{-- Table --}}

        <table class="table table-bordered table-sm mt-3" id="POITable">
            <thead>
                <tr class="text-center text-dark">
                    <th><span class="cls_020">NO</span></th>
                    <th><span class="cls_020">NAMA PROJECT</span></th>
                    <th><span class="cls_020">BIAYA PROYEK</span></th>
                </tr>
            </thead>
            <tbody class="container1">
                <?= $i = 0; ?>
                @foreach ($data->item as $item)
                <tr class="table-white ">
                    <th class="text-center"><span class="cls_011">{{ ++$i }}</span></th>
                    <td class="text-left"><span class="cls_011">{{ucwords($item->nama_project)}}</span></td>
                    <td class="text-right gini"><span class="cls_011">Rp @currency($item->biaya_project)</span></td>
                </tr>
                @endforeach
                <?php
                    $c = $data->jumlah_tagihan;
                        $d = $c*0.1;
                        $e = $d+$c
                        ?>
                <tr>
                    <td style="border-left: 1px solid Transparent!important;border-bottom: 1px solid Transparent!important;border-right: 1px solid Transparent!important;"></td>
                    <td style="border-left: 1px solid Transparent!important;border-bottom: 1px solid Transparent!important;"
                        class="text-right pl-2"><span class="cls_011">Sub Total</span></td>
                    <td class="text-right gini"><span class="cls_011">Rp @currency($data->jumlah_tagihan)</span></td>
                </tr>
                <tr>
                    <td style="border-left: 1px solid Transparent!important;border-bottom: 1px solid Transparent!important;border-right: 1px solid Transparent!important;"></td>
                    <td style="border-left: 1px solid Transparent!important;border-bottom: 1px solid Transparent!important;"
                        class="text-right pl-2"><span class="cls_011">Total +PPN 10%</span></td>

                    <td class="text-right gini"><span class="cls_011">Rp @currency($e)</span></td>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered table-sm mt-3" id="POITable">
            <tbody class="container1">
                <tr>
                    <td style="border-left: 1px solid Transparent!important;border-bottom: 1px solid Transparent!important;border-right: 1px solid Transparent!important;border-top: 1px solid Transparent!important;"></td>
                    <td style="border-left: 1px solid Transparent!important;border-bottom: 1px solid Transparent!important;border-right: 1px solid Transparent!important;border-top: 1px solid Transparent!important;"
                        class="text-right pl-2"><span class="cls_011">DP</span></td>

                    <td class="text-right gini" style="border-left: 1px solid Transparent!important;border-bottom: 1px solid Transparent!important;border-right: 1px solid Transparent!important;border-top: 1px solid Transparent!important;"><span class="cls_011">Rp @currency($term[0]->Dp)</span></td>
                </tr>
                @foreach ($term as $terms)
                <tr>
                    <td style="border-left: 1px solid Transparent!important;border-bottom: 1px solid Transparent!important;border-right: 1px solid Transparent!important;"></td>
                        <td style="border-left: 1px solid Transparent!important;border-bottom: 1px solid Transparent!important;border-right: 1px solid Transparent!important;"
                            class="text-right pl-2"><span class="cls_011">Term {{ $terms->termin }}</span></td>

                        <td class="text-right gini" style="border-left: 1px solid Transparent!important;border-bottom: 1px solid Transparent!important;border-right: 1px solid Transparent!important;border-top: 1px solid Transparent!important;"><span class="cls_011">Rp @currency($terms->term )</span></td>
                    </tr>
                @endforeach
                <?php
                $c = $term1->term;
                    $d = $c * 0.1;
                    $e = $d + $c;
                ?>
                <tr>
                    <td style="border-left: 1px solid Transparent!important;border-bottom: 1px solid Transparent!important;border-right: 1px solid Transparent!important;"></td>
                        <td style="border-left: 1px solid Transparent!important;border-bottom: 1px solid Transparent!important;border-right: 1px solid Transparent!important;"
                            class="text-right pl-2"><span class="cls_011">Jumlah Tertagih</span></td>

                        <td class="text-right gini" style="border-left: 1px solid Transparent!important;border-bottom: 1px solid Transparent!important;border-right: 1px solid Transparent!important;border-top: 1px solid Transparent!important;"><span class="cls_011">Rp @currency($e)</span></td>
                </tr>
            </tbody>
        </table>
        

    <span class="cls_012">Catatan :</span><br>
    <span class="pr-4 cls_012">Pembayaran dilakukan secara transfer ke nomor rekening </span><span class="cls_013"> Bank Mandiri 161-00-03-700-27-0 atas nama</span>
    <span class="cls_013">PT Alan Mediatech Indonesia</span>

        <p class="text-right mt-5"><span class="cls_011"> Jakarta,
            {{ \Carbon\Carbon::parse($data->tanggal_invoice)->locale('id')->isoformat('DD MMMM Y') }}</span>
        </p>


        <p class="text-right font-weight-bold mb-3"><span class="cls_011">Chief Executive Officer</span></p>


        <p class="text-right font-weight-bold  mt-5"><span class="cls_011">Ahmad Alimuddin, S.Kom</span></p>

    </div>
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