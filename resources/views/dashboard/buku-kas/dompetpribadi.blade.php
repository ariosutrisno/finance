@extends('layouts.homepage.app')
@section('title', ucwords($dompet->buku_nama))
@section('container')
    @include('layouts.homepage.css&js.cssdashboard')
    @include('layouts.homepage.css&js.css')

    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-la yout="full">
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
                                            <img src="{{ asset('img/Page-1.png') }}" alt="buku">
                                        </div>
                                        <div class="col-sm-10 ml-3">
                                            <span class="h1 text-cyan"><strong>
                                                    {{ ucwords($dompet->buku_nama) }}
                                                </strong></span>
                                            <br><span>
                                                {{ ucfirst($dompet->buku_deskripsi) }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">

                                    <li style="list-style-type: none;">
                                        <span>Saldo </span>
                                    </li>

                                    <li style="list-style-type: none;">
                                        <span class="h2">
                                            <strong>
                                                {{ $dompet->buku_mata_uang }} @currency($hitung)
                                            </strong>
                                        </span>
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card overflow-hidden">
                        <div class="card-body border-bottom  shadow-sm p-3 bg-white rounded">
                            <!-- ============================================================== -->
                            <!-- Right side toggle and nav items -->
                            <!-- ============================================================== -->
                            <nav class="navbar top-navbar float navbar-expand-md">
                                <ul class="navbar-nav float-left navbar-left">
                                    <li class="nav-item d-none d-md-block mr-1 mt-2">
                                        <button class=" btn btn-sm bg-danger nav-link text-white tombol"
                                            style="width: 150px;" data-toggle="modal" data-target="#pengeluaran"> Catat
                                            pengeluaran </button>
                                    </li>
                                    <li class=" nav-item d-none d-md-block mr-1 mt-2">
                                        <button class="nav-link bth btn-sm tombol text-white bg-alan" style="width: 150px;"
                                            data-toggle="modal" data-target="#pemasukan"> Catat
                                            Pemasukan
                                        </button>
                                    </li>
                                </ul>
                                <ul class="navbar-nav float-right navbar-right ml-auto">
                                    <!-- ============================================================== -->
                                    <!-- Search -->
                                    <!-- ============================================================== -->
                                        <li class=" d-none d-md-block">
                                            <a class="nav-link" >
                                                {{-- SEARCH DATA --}}
                                                <form method="GET" action="{{ route('search_dompet') }}" id="form-pencarian">
                                                    <div class="customize-input">
                                                        <input
                                                            class="form-control custom-shadow custom-radius border-0 bg-white"
                                                            type="search" placeholder="Search" aria-label="Search"
                                                            id="searchdompet" name="cari"  onkeyup="myFunction();" />
                                                    </div>
                                                </form>
                                                {{-- END SEARCH DATA --}}
                                            </a>
                                        </li>
                                        {{-- SEARCH DATE RANGE --}}
                                        <form >
                                            <div class="input-daterange">
                                                <li class="nav-item d-none d-md-block mr-1 mt-2" id="datepiker">
                                                    <input type="date" onchange="myDate();" name="startDate" id="startDate" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" class=" form-control custom-shadow custom-radius border-0 bg-white"/>
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                                </li>
                                            </div>
                                        </form>
                                    {{-- END SEARCH DATE RANGE --}}
                                    {{-- ====================================== --}}
                                    {{-- PAGINATE DATA TABLE --}}
                                    {{-- <li class="nav-item d-none d-md-block mr-1 mt-2">
                                        <select class="custom-select form-control bg-white custom-radius custom-shadow border-0"
                                            id="list" name="list_data">
                                            <option class="active" value="5" onchange="filterSelection('all');">semua</option>
                                            <option class="filter" value="10" onchange="filterSelection('5');">5</option>
                                            <option class="filter" value="25" onchange="filterSelection('10');">10</option>
                                            <option class="filter" value="50" onchange="filterSelection('20');">20</option>
                                            <option class="filter" value="100" onchange="filterSelection('50');">50</option>
                                            <option class="filter" value="100" onchange="filterSelection('100');">100</option>
                                        </select>
                                    </li> --}}
                                    {{-- END PAGINATE DATA TABLE --}}
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="container bg-white p-3 mb-5" style="height: 100%;" id="search">
                        <div class="table-responsive mt-4 mb-5 ">
                            @if (count($dompet_table) !== 0)
                                <table class="table  table-bordered table-sm" id="data_users_reguler">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Tipe</th>
                                            <th>Tanggal</th>
                                            <th>Kategori</th>
                                            <th>Deskripsi</th>
                                            <th>Nominal</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody id="search1">
                                        @foreach ($dompet_table as $buku)
                                            @if ($buku->idx_kategori == '2' && '2')
                                                <tr class="table-danger">
                                                    <th scope="row" class="text-center "><i data-feather="arrow-up"></i>
                                                    </th>
                                                    <td class="text-center">
                                                        {{ \Carbon\Carbon::parse($buku->catatan_tgl)->locale('id')->isoformat('DD MMMM Y') }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ ucwords($buku->Model_Sub_Kategori->sub_nama) }}
                                                    </td>
                                                    <td class="text-center">{{ ucfirst($buku->catatan_keterangan) }}
                                                    </td>
                                                    <td class="text-right">{{ $buku->BuatBuku->buku_mata_uang }}
                                                        @currency($buku->catatan_jumlah) </td>
                                                    <td class="text-center">
                                                        @if (Auth::check())
                                                            {{ link_to('dompet-pribadi/hapus/' . $buku->idx_catatan_buku, 'Hapus', ['class' => 'btn btn-danger btn-sm']) }}
                                                            {{-- EDIT
                                                            --}}
                                                            <a href="#" data-id="{{ $buku->idx_catatan_buku }}"
                                                                class="btn btn-warning btn-sm btn-editpengeluaran">Edit</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @else
                                                <tr class="table-primary">
                                                    <th scope="row" class="text-center"><i data-feather="arrow-down"></i>
                                                    </th>
                                                    <td class="text-center">
                                                        {{ \Carbon\Carbon::parse($buku->catatan_tgl)->locale('id')->isoformat('DD MMMM Y') }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ ucwords($buku->Model_Sub_Kategori->sub_nama) }}
                                                    </td>
                                                    <td class="text-center">{{ ucfirst($buku->catatan_keterangan) }}
                                                    </td>
                                                    <td class="text-right">{{ $buku->BuatBuku->buku_mata_uang }}
                                                        @currency($buku->catatan_jumlah) </td>
                                                    <td class="text-center">
                                                        @if (Auth::check())
                                                            {{ link_to('dompet-pribadi/hapus/' . $buku->idx_catatan_buku, 'Hapus', ['class' => 'btn btn-danger btn-sm']) }}
                                                            <a href="#" data-id="{{ $buku->idx_catatan_buku }}"
                                                                class="btn btn-warning btn-sm btn-editpemasukan">
                                                                Edit</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>Tidak Ada Aktifitas</p>
                            @endif
                            {{ $dompet_table->render() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Pengeluaran -->
        <div class="modal fade" id="pengeluaran" tabindex="-1" role="dialog" aria-labelledby="pengeluaran"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="pengeluaran">Catatan Pengeluaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('dompet') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $id_dompet }}" name="idx_buku_kas">
                            <input type="hidden" value="2" name="idx_kategori">
                            <input type="hidden" value="{{ old('catatan_jumlah') }}" name="catatan_jumlah_lama">
                            <div class="form-group">
                                <label for="jam" class="col-form-label">Jam :</label>
                                <input type="time" class="form-control" id="jam" name="catatan_jam" value="{{ old(
                                        'catatan_jam',
                                        Carbon\Carbon::now('Asia/Jakarta')->locale('id')->format('H:i'),
                                    ) }}">
                            </div>
                            <div class="form-group">
                                <label for="tanggal" class="col-form-label">Tanggal :</label>
                                <input type="date" class="form-control" id="tanggal" name="catatan_tgl"
                                    value="{{ old('catatan_tgl', Carbon\Carbon::now()->format('Y-m-d')) }}"></input>
                            </div>

                            <div class="form-group">
                                <label for="rupiah" class="col-form-label">Nominal :</label>
                                <input type="text" min="0" onkeyup="changevalue()" placeholder="0" class="form-control"
                                    id="rupiah" name="catatan_jumlah" value="{{ old('catatan_jumlah') }}">
                                <input type="text" min="0" placeholder="0" class="form-control" id="rupiah1"
                                    name="catatan_jumlah" onkeyup="changevalue()" value="{{ old('catatan_jumlah') }}" hidden
                                    readonly>
                            </div>

                            <div class="form-group">
                                <label for="kategori" class="col-form-label">Kategori :</label>
                                <Select class="form-control" name="idx_sub_kategori">
                                    <option>---</option>
                                    @foreach ($model_sub_kategori as $kat)
                                        @if ($kat->idx_kategori == 2)
                                            <option value="{{ $kat->idx_sub_kat }}">{{ $kat->sub_nama }}</option>
                                        @endif
                                    @endforeach
                                </Select>
                            </div>
                            <div class="form-group">
                                <label for="keterangan" class="col-form-label">Keterangan :</label>
                                <textarea class="form-control" id="keterangan" name="catatan_keterangan"
                                    value="{{ old('catatan_keterangan') }}"></textarea>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger mr-1" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-success" name="submit"
                                    value="{{ old('dompet_simpan') }}" name="submit">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- END -->
        <!-- Modal Pemasukan -->
        <div class="modal fade" id="pemasukan" tabindex="-1" role="dialog" aria-labelledby="pemasukan" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="pengeluaran">Catatan Pemasukan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('dompet') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $id_dompet }}" name="idx_buku_kas">
                            <input type="hidden" value="1" name="idx_kategori">
                            <div class="form-group">
                                <label for="jam" class="col-form-label">Jam :</label>
                                <input type="time" class="form-control" id="jam" name="catatan_jam" value="{{ old(
                                        'catatan_jam',
                                        Carbon\Carbon::now('Asia/Jakarta')->locale('id')->format('H:i'),
                                    ) }}">
                            </div>
                            <div class="form-group">
                                <label for="tanggal" class="col-form-label">Tanggal :</label>
                                <input type="date" class="form-control" id="tanggal" name="catatan_tgl"
                                    value="{{ old('catatan_tgl', Carbon\Carbon::now()->format('Y-m-d')) }}"></input>
                            </div>

                            <div class="form-group">
                                <label for="rupiah2" class="col-form-label">Nominal :</label>
                                <input type="text" min="0" onkeyup="changevalue()" placeholder="0" class="form-control"
                                    id="rupiah2" name="catatan_jumlah" value="{{ old('catatan_jumlah') }}">
                                <input type=" text" min="0" onkeyup="changevalue()" placeholder="0" class="form-control"
                                    id="rupiah22" name="catatan_jumlah" value="{{ old('catatan_jumlah') }}" readonly hidden>
                            </div>

                            <div class="form-group">
                                <label for="kategori" class="col-form-label">Kategori :</label>
                                <Select class="form-control" name="idx_sub_kategori">
                                    <option>---</option>
                                    @foreach ($model_sub_kategori as $kat)
                                        @if ($kat->idx_kategori == 1)
                                            <option value="{{ $kat->idx_sub_kat }}">{{ $kat->sub_nama }}</option>
                                        @endif
                                    @endforeach
                                </Select>
                            </div>
                            <div class="form-group">
                                <label for="keterangan" class="col-form-label">Keterangan :</label>
                                <textarea class="form-control" id="keterangan" name="catatan_keterangan"
                                    value="{{ old('catatan_keterangan') }}"></textarea>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger mr-1" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-success" name="submit"
                                    value="{{ old('dompet_simpan') }}" name="submit">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <!-- Modal  Edit -->
        <!-- END PEMASUKAN EDIT -->

        <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="pemasukan" aria-hidden="true"
            id="modal-editpemasukan">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="pengeluaran">Catatan Pemasukan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('dompet') }}" method="POST" id="form-editpemasukan">
                        @csrf
                        <div class="modal-body">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger mr-1" data-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-success btn-updatepemasukan" name="submit"
                                value="{{ old('dompet_simpan') }}" name="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--  PENGELUARAN EDIT -->
        <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="pengeluaran" aria-hidden="true"
            id="modal-editpengeluaran">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="pengeluaran">Catatan Pengeluaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('dompet') }}" method="POST" id="form-editpengeluaran">
                        @csrf
                        <div class="modal-body">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger mr-1" data-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-success btn-updatepengeluaran" name="submit"
                                value="{{ old('dompet_simpan') }}" name="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- ENd -->
    </div>

    </div>

    <!-- Script JS -->



    <script type="text/javascript">
        /*========================================= EDIT & UPDATE PEMASUKAN ===============================*/
        $('.btn-editpemasukan').on('click', function() {
            console.log($(this).data('id'))
            let id = $(this).data('id')
            $.ajax({
                url: `/dompet-pribadi/${id}/editpemasukan`,
                method: "GET",
                success: function(data) {
                    // console.log(id)
                    $('#modal-editpemasukan').find('.modal-body').html(data)
                    $('#modal-editpemasukan').modal('show')
                },
                error: function(error) {

                    console.log(error)
                }
            });
        })

        $('.btn-updatepemasukan').on('click', function() {
            // console.log($(this).data('id'))
            $('.btn-updatepemasukan').attr("disabled", "true");
            let id = $('#form-editpemasukan').find('#id_catatan_buku').val()
            let id_pemasukan = $('#form-editpemasukan').find('#id_kas').val()
            let FormData = $('#form-editpemasukan').serialize()
            console.log(FormData)
            $.ajax({
                url: `/dompet-pribadi/${id}`,
                method: "PATCH",
                data: FormData,
                success: function(data) {
                    // console.log(id)
                    // $('#modal-editpemasukan').find('.modal-body').html(data)
                    window.location.assign(`${id_pemasukan}`);
                },
                error: function(error) {

                    console.log(error)
                }
            });
        })

        /*========================================= END EDIT PEMASUKAN ===============================*/

        /*========================================= EDIT PENGELUARAN ===============================*/
        $('.btn-editpengeluaran').on('click', function() {
            console.log($(this).data('id'))
            let id = $(this).data('id')
            $.ajax({
                url: `/dompet-pribadi/${id}/editpengeluaran`,
                method: "GET",
                success: function(data) {
                    // console.log(id)
                    $('#modal-editpengeluaran').find('.modal-body').html(data)
                    $('#modal-editpengeluaran').modal('show')
                },
                error: function(error) {

                    console.log(error)
                }
            });
        })

        $('.btn-updatepengeluaran').on('click', function() {
            // console.log($(this).data('id'))
            $('.btn-updatepengeluaran').attr("disabled", "true");
            let id = $('#form-editpengeluaran').find('#id_catatan_buku').val()
            let id_pengeluaran = $('#form-editpengeluaran').find('#id_kas').val()
            let FormData = $('#form-editpengeluaran').serialize()
            console.log(FormData)
            $.ajax({
                url: `/dompet-pribadi/${id}`,
                method: "PATCH",
                data: FormData,
                success: function(data) {
                    // console.log(id)
                    // $('#modal-editpemasukan').find('.modal-body').html(data)
                    window.location.assign(`${id_pengeluaran}`);
                },
                error: function(error) {
                    console.log(error)
                }
            });
        })
        

        /*========================================= END EDIT PENGELUARAN ===============================*/
        $(document).ready(function() {

            var CurrentUrl = document.URL;
            var CurrentUrlEnd = CurrentUrl.split('/').filter(Boolean).pop();
            console.log(CurrentUrl);
            console.log(CurrentUrlEnd);
            $("#buku sidebar-item").each(function() {
                var ThisUrl = $(this).attr('href');
                var ThisUrlEnd = ThisUrl.split('/').filter(Boolean).pop();

                if (ThisUrlEnd == CurrentUrlEnd) {
                    $(this).closest('sidebar-item').addClass('selected')
                }
            });

        });

        /*================================ NOMINAL ====================================*/
        var rupiah = document.getElementById('rupiah');
        rupiah.addEventListener('keyup', function(e) {
            console.log(this.value)
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, ' ');
        });
        var rupiah1 = document.getElementById('rupiah2');
        rupiah1.addEventListener('keyup', function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah1.value = formatRupiah(this.value, ' ');
        });

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? ' ' + rupiah : '');
        }

        function changevalue() {
            // var rupiah = document.getElementById('rupiah').value;
            // var rupiah1 = document.getElementById('rupiah1').value;
            // var rupiahchange = rupiah.split(".").join("").split("Rp").join("");

            var rupiah = document.getElementById('rupiah').value;
            var rupiahchange = rupiah.split(".").join("").split(" ").join("");
            document.getElementById('rupiah1').value = rupiahchange;

            var rupiah = document.getElementById('rupiah2').value;
            var rupiahchange = rupiah.split(".").join("").split(" ").join("");
            document.getElementById('rupiah22').value = rupiahchange;
            // var rupiah1change = rupiah1.split(".").join("").split("Rp").join("");
            // document.getElementById('rupia2').value = rupiahchange;
            // document.getElementById('rupiah22').value = rupiah1change;
        }
        /*================================ END NOMINAL ====================================*/
        /*================================ SEARCH ====================================*/
        function myFunction() {
            var input, filter, table, tr, td, cell, i, j;
                input = document.getElementById("searchdompet");
                filter = input.value.toUpperCase();
                table = document.getElementById("search1");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    // Hide the row initially.
                    tr[i].style.display = "none";
                    td = tr[i].getElementsByTagName("td");
                    for (var j = 0; j < td.length; j++) {
                    cell = tr[i].getElementsByTagName("td")[j];
                    if (cell) {
                        if (cell.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        break;
                        } 
                    }
                    }
                }
        }
        /*================================ END SEARCH ====================================*/
        /*================================ DATE RANGE ====================================*/
        function myDate() {
            var input, filter, table, tr, td, cell, i, j,date,bulan;
                bulan  = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
                input = document.getElementById("startDate");
                date = input.value.split('-');
                var tgl = date[2]
                var bln = date[1] - 1;
                var tahun = date[0]
                filter = tgl + ' ' + bulan[bln] + ' ' + tahun;
                console.log(filter)
                table = document.getElementById("search1");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    // Hide the row initially.
                    tr[i].style.display = "none";
                    td = tr[i].getElementsByTagName("td");
                    for (var j = 0; j < td.length; j++) {
                    cell = tr[i].getElementsByTagName("td")[j];
                    if (cell) {
                        if (cell.innerHTML.indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        break;
                        } 
                    }
                    }
                }
        }
        
        /*================================ END DATE RANGE ====================================*/
        /*================================ SHOW ENTRIES ====================================*/
        filterSelection("all")
            function filterSelection(c) {
            var x, i;
            x = document.getElementsByClassName("text-center");
            if (c == "all") c = "";
            // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
            for (i = 0; i < x.length; i++) {
                w3RemoveClass(x[i], "show");
                if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
            }
            }

            // Show filtered elements
            function w3AddClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                if (arr1.indexOf(arr2[i]) == -1) {
                element.className += " " + arr2[i];
                }
            }
            }

            // Hide elements that are not selected
            function w3RemoveClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                while (arr1.indexOf(arr2[i]) > -1) {
                arr1.splice(arr1.indexOf(arr2[i]), 1);
                }
            }
            element.className = arr1.join(" ");
            }

            // Add active class to the current control button (highlight it)
            var list = document.getElementById("list");
            var btns = list.getElementsByClassName("filter");
            for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
            }
        /*================================ END SHOW ENTRIES ====================================*/
        
    </script>
@endsection
