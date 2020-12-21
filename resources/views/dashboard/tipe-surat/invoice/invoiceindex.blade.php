@extends('layouts.homepage.app')
@section('title', 'Invoice')
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
                                            <img src="img/bill.png" alt="Hutang">
                                        </div>
                                        <div class="col-sm-10 ml-3">
                                            <span class="h1 text-cyan"><strong> E-Invoice </strong></span>
                                            <br><span>buat gambar eksport dan berikan kepada orang lain</span></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row p-5">
                                    <div class="col-md-3"> <img src="img/Manchester_City_FC_badge.png"
                                            style="height:84px;max-width:84px;" alt="#">
                                    </div>

                                    <div class="col-md-9">
                                        <span class="title">Perumahan AABBCC
                                            <br>Depok, Jawa Barat
                                            <br>+628899102030
                                            <br>Jano@jano.com
                                            <br>www.jano.com
                                        </span>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 p-5">
                                <div class="text-center text-danger mb-3">
                                    <strong> Invoice Data</strong>
                                </div>
                                <form action="">
                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-4 col-form-label text-right   ">Invoice
                                            No</label>

                                        <div class="col-sm-8 row">

                                            <input type="text" class="form-control bg-light " id="alamat"
                                                placeholder="16/234/2444"> </input>

                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label for="alamat" class="col-sm-4 col-form-label text-right">Tanggal
                                            Invoice</label>

                                        <div class="col-sm-8 row">

                                            <input type="text" class="form-control  " id="alamat"
                                                placeholder="+62 8123321123"> </input>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-4 col-form-label text-right">Jatuh
                                            Tempo</label>

                                        <div class="col-sm-8 row">

                                            <input type="text" class="form-control  " id="alamat"
                                                placeholder="+62 8123321123"> </input>

                                        </div>
                                    </div>
                                </form>
                                <!-- Ditagih -->
                                <div class="text-center text-danger mb-3">
                                    <strong> Ditagih Kepada</strong>
                                </div>
                                <form action="">
                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-4 col-form-label text-right   ">Nama
                                            Pelanggan</label>

                                        <div class="col-sm-8 row">

                                            <input type="text" class="form-control " id="alamat" placeholder="Bondan S">
                                            </input>

                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label for="alamat" class="col-sm-4 col-form-label text-right">Addres Line
                                            1</label>

                                        <div class="col-sm-8 row">

                                            <input type="text" class="form-control" id="alamat"
                                                placeholder="Kebangsaan Timur 4"> </input>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-4 col-form-label text-right">Addres Line
                                            2</label>

                                        <div class="col-sm-8 row">

                                            <input type="text" class="form-control  " id="alamat"
                                                placeholder="Bekasi, Jawa Barat"> </input>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card overflow-hidden">
                        <div class="card-body border-bottom  shadow-lg p-3 bg-white rounded">
                            <nav class="navbar top-navbar float navbar-expand-md">
                                <ul class="navbar-nav float-right navbar-right ml-auto">
                                    <!-- ============================================================== -->
                                    <!-- Search -->
                                    <!-- ============================================================== -->


                                    <li class="nav-item d-none d-sm-block mr-1 mt-2">
                                        <select
                                            class="custom-select form-control bg-white custom-radius custom-shadow border-0">
                                            <option value=""></option>
                                            <option value=""></option>
                                        </select>
                                    </li>

                                </ul>
                            </nav>
                        </div>



                        <div class="container bg-white p-3 mb-5" style="height: 100%;">

                            <div class="table-responsive mt-4 mb-5 ">
                                <div class="container bg-light">
                                    <table id="tbl_invoice" class="table  table-bordered table-sm">
                                        <thead>
                                            <tr class="text-center">
                                                <th>ID</th>
                                                <th>Deskripsi</th>
                                                <th>Harga Satuan</th>
                                                <th>Jumlah</th>
                                                <th>Total</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="table-white">
                                                <th class="text-center ">1</th>
                                                <td class="text-center">Barang</td>
                                                <td class="text-center">Rp.150000</td>
                                                <td class="text-right">1</td>
                                                <td class="text-right">Rp.150000</td>

                                            </tr>

                                        </tbody>
                                    </table>


                                    <center>
                                        <button onclick="addRowButton('tbl_invoice')"><img src="img/add-2.png"
                                                style="max-width: 32px!important; max-height: 32px !important;"></button>
                                        <!-- <a href="#" class="mr-auto ml-1"></a> -->
                                    </center>
                                    <div class="row">
                                        <div class="col-md-4  ml-auto mt-5">
                                            <form>
                                                <div class="form-group row">
                                                    <label for="sub" class="col-sm-6 col-form-label text-right"><strong>
                                                            Sub
                                                            Total</strong></label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control broder" id="sub">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="sudah_bayar"
                                                        class="col-sm-6 col-form-label text-right"><strong> Sudah
                                                            Dibayar</strong></label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control broder" id="sudah_bayar">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="diskon"
                                                        class="col-sm-6 col-form-label text-right"><strong>
                                                            Diskon</strong></label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control broder" id="diskon">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="pajak"
                                                        class="col-sm-6 col-form-label text-right"><strong>
                                                            Pajak</strong></label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control broder" id="pajak">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="ongkir"
                                                        class="col-sm-6 col-form-label text-right"><strong> Ongkos
                                                            Kirim</strong></label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control broder " id="ongkir">
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-5">
                                                    <label for="total"
                                                        class="col-sm-6 col-form-label text-right"><strong>
                                                            Total</strong></label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control broder bg-merahmuda"
                                                            id="total">
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="catatan"><strong>Catatan</strong></label>
                                    <textarea class="form-control " id="catatan"></textarea>
                                </div>
                                <div class="col-md-9">
                                    <h5 for="catatan"><strong>Stempel</strong></h5>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="option1">
                                        <label class="form-check-label" for="inlineCheckbox1">Lunas</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                            value="option2">
                                        <label class="form-check-label" for="inlineCheckbox2">Segera</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="option1">
                                        <label class="form-check-label" for="inlineCheckbox1">Jatuh Tempo</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                            value="option2">
                                        <label class="form-check-label" for="inlineCheckbox2">Final</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="option1">
                                        <label class="form-check-label" for="inlineCheckbox1">Dikirim</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                            value="option2">
                                        <label class="form-check-label" for="inlineCheckbox2">Disetujui</label>
                                    </div>

                                </div>
                            </div>

                            <!-- Button  -->
                            <div class="text-center mt-5">
                                <button type="button" class="btn mr-4  mb-2 btn-lg bg-purpel tbml">Download</button>
                                <button type="button" class="btn mr-4 mb-2 btn-lg bg-purpel tbml">Email</button>
                                <button type="button" class="btn mr-4 mb-2 btn-lg tbml bg-alan">Simpan</button>
                                <button type="button" class="btn mr-4  mb-2 btn-danger btn-lg tbml ">Reset</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div> <!-- Script JS -->
        <script>
            function addRowButton(tbl_invoice) {

                var table = document.getElementById(tbl_invoice);

                var rowCount = table.rows.length;
                var row = table.insertRow(rowCount);

                var colCount = table.rows[0].cells.length;

                for (var i = 0; i < colCount; i++) {

                    var newcell = row.insertCell(i);

                    newcell.innerHTML = table.rows[0].cells[i].innerHTML;
                    
                    switch (newcell.childNodes[1].type) {
                        case "text":
                            newcell.childNodes[1].value = "";
                            break;
                        case "checkbox":
                            newcell.childNodes[0].checked = false;
                            break;
                        case "select-one":
                            newcell.childNodes[0].selectedIndex = 0;
                            break;
                    }
                }
            }
        </script>
        
    @endsection
