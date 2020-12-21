@extends('layouts.homepage.app')
@section('title', 'Piutang')
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
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        @include('dashboard.sidebardashboard')
        <div class="page-wrapper">
            <div class="container-fluid">
                <!-- *************************************************************** -->
                <!-- Start First Cards -->
                <!-- *************************************************************** -->

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-sm-1 mt-1">
                                        <img src="img/Page-7.png" alt="Hutang">
                                    </div>
                                    <div class="col-sm-10 ml-3">
                                        <span class="h1 text-cyan"><strong> Piutang </strong></span>
                                        <br><span>Piutang yang ada dalam hidup ini</span></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <li style="list-style-type: none;">
                                    <button class="btn float-right"><i data-feather="file-text"></i></button><br>
                                </li>
                                <li style="list-style-type: none;">
                                    <span>Jumlah </span></li>
                                <li style="list-style-type: none;">
                                    <span class="h2">
                                        <strong>
                                            
                                            @if (count($piutang_data) !== 0)
                                                {{ $mata_uang->buku_mata_uang }} @currency($hitung) 
                                            @else
                                                <p>Tidak Ada Jumlah</p>
                                            @endif
                                        </strong>
                                    </span>
                                </li>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card overflow-hidden">
                    <div class="card-body border-bottom  shadow-lg p-3 bg-white rounded">
                        <nav class="navbar top-navbar float navbar-expand-md">
                            <ul class="navbar-nav float-left navbar-right mr-auto">
                                <li class="nav-item d-none d-sm-block mr-1 mt-2">
                                    <button class=" btn btn-sm bg-alan nav-link text-white tombol" style="width: 150px;"
                                        data-toggle="modal" data-target="#hutang"> Piutang
                                        Baru </button>
                                </li>
                            </ul>
                            <ul class="navbar-nav float-right navbar-right ml-auto">
                                <!-- ============================================================== -->
                                <!-- Search -->
                                <!-- ============================================================== -->
                                <li class=" d-none d-sm-block mr-1 mt-3">
                                    <a class="nav-link">
                                            <div class="customize-input">
                                                <input class="form-control custom-shadow custom-radius border-0 bg-white"
                                                    type="search" placeholder="Search" aria-label="Search"
                                                    id="Searchpiutang" />
                                            </div>
                                    </a>
                                </li>
                                {{-- <li class="nav-item d-none d-sm-block mr-1 mt-4">
                                    <select
                                        class="custom-select form-control bg-white custom-radius custom-shadow border-0" name="piutang" id="listpiutang">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                    </select>
                                </li> --}}

                                <li class="nav-item d-none d-sm-block mr-1 mt-4">
                                    <button class="nav-link bth btn-sm tombol text-white bg-alan" style="width: 125px;"
                                        type="submit" id="buttonpiutang" onclick="myFunction(event);">
                                        Cari
                                    </button>
                                </li>
                                
                            </ul>
                        </nav>
                    </div>
                    <div class="container bg-white p-3 mb-5" style="height: 100%;">
                        <div class="table-responsive mt-4 mb-5 ">
                            @if (count($piutang_data) !== 0)
                                <table class="table  table-bordered table-sm" id="coba">
                                    <thead>
                                        <tr class="text-center" id="tr">
                                            <th>Status</th>
                                            <th>Tanggal</th>
                                            <th>Client</th>
                                            <th>Deskripsi</th>
                                            <th>Nominal</th>
                                            <th>Detail</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody id="Table_piutang">
                                        @foreach ($piutang_data as $piutang)
                                            <tr class="table-danger">
                                                <th scope="row" class="text-center "><i data-feather="check"></i></th>
                                                <td class="text-center" id="getTd">
                                                    {{ \Carbon\Carbon::parse($piutang->piutang_tanggal)->locale('id')->isoformat('DD MMMM Y') }}
                                                </td>
                                                <td class="text-center"id="getTd">{{ ucwords($piutang->piutang_client) }}</td>
                                                <td class="text-center" id="getTd">{{ ucfirst($piutang->piutang_deskripsi) }}</td>
                                                <td class="text-right">{{ $mata_uang->buku_mata_uang }}
                                                    @currency($piutang->piutang_nominal) </td>
                                                <td class="text-center" id="getTd">
                                                    <a href="#" data-id="{{ $piutang->idx_piutang }}"
                                                        class="btn btn-success btn-sm btn-lihatpiutang"> Lihat Detail</a>
                                                </td>
                                                <td class="text-center" id="getTd">
                                                    @if (Auth::check())
                                                        {{ link_to('piutang/hapus/' . $piutang->idx_piutang, 'Hapus', ['class' => 'btn btn-danger btn-sm']) }}
                                                        <a href="#" data-id="{{ $piutang->idx_piutang }}"
                                                            class="btn btn-warning btn-sm btn-editpiutang"> Edit</a>
                                                        {!! Form::close() !!}
                                                </td>
                                        @endif
                                        </tr>
                            @endforeach
                            </tbody>
                            </table>
                        @else
                            <p>Tidak ada Aktifitas</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="hutang" tabindex="-1" role="dialog" aria-labelledby="pengeluaran" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="pengeluaran">Piutang Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('piutangPost') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $user_id }}" name="user_id">
                            <input type="hidden" value="2" name="idx_kategori">
                            <input type="hidden" value="{{ old('idx_piutang') }}" name="idx_piutang">
                            <div class="form-group">
                                <label for="client" class="col-form-label">Client :</label>
                                <input type="txt" class="form-control" id="client" name="piutang_client"
                                    value="{{ old('piutang_client') }}">
                            </div>

                            <div class="form-group">
                                <label for="tgl" class="col-form-label">Tanggal :</label>
                                <input type="date" class="form-control" id="tanggal" name="piutang_tanggal"
                                    value="{{ old('piutang_tanggal', Carbon\Carbon::now()->format('Y-m-d')) }}"></input>
                                <input type='checkbox' class="mt-3" data-toggle='collapse' data-target='#tempo'> Jatuh
                                Tempo</input>

                            </div>
                            <div id='tempo' class='collapse div1'>
                                <div class="form-group">
                                    <label for="tempo" class="col-form-label">Jatuh Tempo :</label>
                                    <input type="date" class="form-control" id="tempo" name="piutang_jatuh"
                                        value="{{ old('piutang_jatuh', Carbon\Carbon::now()->format('Y-m-d')) }}"></input>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi" class="col-form-label">Deskripsi :</label>
                                <textarea class="form-control" onKeyUp="changevalue()" id="deskripsi"
                                    name="piutang_deskripsi" value="{{ old('piutang_deskripsi') }}"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="nominal" class="col-form-label">Nominal :</label>
                                <input type="text" min="0" onKeyUp="changevalue()" placeholder="0" class="form-control"
                                    id="piutang_nominal" value="{{ old('piutang_nominal') }}"></input>
                                <input type="text" min="0" onKeyUp="changevalue()" class="form-control"
                                    id="piutang_nominal1" name="piutang_nominal" hidden readonly></input>
                            </div>
                            {{-- CATAT SEBAGAI PEMASUKAN --}}
                            <div class="form-group">
                                <label>Catat sebagai Pengeluaran di Buku Kas ?</label>
                                <select class="custom-select col-sm-3" style="color: black" id="ddselect" name="selectedBuku"
                                    onchange="onSelect()">
                                    <option value="0">Tidak</option>
                                    <option value="1">Ya</option>
                                </select>
                            </div>
                            {{-- END PEMASUKAN --}}
                            <div id="kategori" style="display: none;">
                                <div class="form-group">
                                    <label for="nominal" class="col-form-label">Buku Kas :</label>
                                    <Select class="form-control" value="{{ old('idx_buku_kas') }}" name="idx_buku_kas">
                                        <option>Pilih Buku Kas</option>
                                        @foreach ($tbl_buku_kas as $buku_kas)
                                            
                                            <option value="{{ $buku_kas->idx_buku_kas }}">{{ ucwords($buku_kas->buku_nama) }}</option>
                                        
                                        @endforeach
                                    </Select>
                                </div>

                                <div class="form-group">
                                    <label for="nominal" class="col-form-label">Kategori :</label>
                                    <Select class="form-control" name="idx_sub_kategori">
                                        <option>---</option>
                                        @foreach ($model_sub_kategori as $kat)
                                            @if ($kat->idx_kategori == 2)
                                                <option value="{{ $kat->idx_sub_kat }}">{{ $kat->sub_nama }}</option>
                                            @endif
                                        @endforeach
                                    </Select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger mr-1" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-success" name="submit" name="submit">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit -->
        <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true"
            id="modal-editpiutang">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="edit">Edit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('piutangPost') }}" method="POST" id="form_piutang">
                        @csrf
                        <div class="modal-body">

                        </div>
                        <div class="modal-footer">
                            <button type="submit" href="javascript:void(0)" class="btn btn-danger mr-1" data-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-success btn-updatepiutang" name="submit"
                                name="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end -->
        <!-- LIHAT DETAI PIUTANG -->
        <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="lihatpiutang" aria-hidden="true"
            id="modal-lihatpiutang">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="edit">LIHAT DETAIL PIUTANG </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('piutangPost') }}" method="POST" id="form-lihatpiutang">
                        @csrf
                        <div class="modal-body">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger mr-1" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- END -->
        <script>
            /* LIHAT DETAIL PIUTANG */
            $('.btn-lihatpiutang').on('click', function() {
                // console.log($(this).data('id'))
                let id = $(this).data('id')
                $.ajax({
                    url: `/piutang/${id}`,
                    method: "GET",
                    success: function(data) {
                        // console.log(data)
                        $('#modal-lihatpiutang').find('.modal-body').html(data)
                        $('#modal-lihatpiutang').modal('show')
                    },
                    error: function(error) {
                        console.log(error)
                    }
                })
            })

            /*============================ EDIT & UPDATE PIUTANG =============================================*/
            $('.btn-editpiutang').on('click', function() {
                console.log($(this).data('id'))
                let id = $(this).data('id')
                $.ajax({
                    url: `/piutang/${id}/edit`,
                    method: 'GET',
                    success: function(data) {
                        // console.log(data) 
                        $('#modal-editpiutang').find('.modal-body').html(data)
                        $('#modal-editpiutang').modal('show')
                    },
                    error: function(error) {
                        console.log(error)
                    }
                })
            })
            /*
             * Update Data hutang
             */
            $('.btn-updatepiutang').on('click', function() {
                // console.log($(this).data('id'))
                $('.btn-updatepiutang').attr("disabled", "true");
                let id = $('#form_piutang').find('#idx_piutang').val()
                let FormData = $('#form_piutang').serialize()
                console.log(FormData)
                $.ajax({
                    url: `/piutang/${id}`,
                    method: "PATCH",
                    data: FormData,
                    success: function(data) {
                        console.log(data)
                        window.location.assign('piutang');
                    },
                    error: function(error) {

                        console.log(error)
                    }
                });
            })
            /*============================ END EDIT PIUTANG =============================================*/


            var rupiah = document.getElementById('piutang_nominal');
            rupiah.addEventListener('keyup', function(e) {
                // tambahkan 'Rp.' pada saat form di ketik
                // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                rupiah.value = formatRupiah(this.value, ' ');
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
                var rupiah = document.getElementById('piutang_nominal').value;

                var rupiahchange = rupiah.split(".").join("").split("Rp").join("");

                document.getElementById('piutang_nominal1').value = rupiahchange;

            }

        </script>
        <script>
            /*COLLAPSE SELECT OPTION PIUTANG*/

            function onSelect() {
                var kategori = document.getElementById("ddselect");
                var option_data = kategori.options[kategori.selectedIndex].value;
                if (option_data == '0') {
                    var label = document.getElementById("kategori").setAttribute("style", "display: none;");
                } else {
                    var label = document.getElementById("kategori").setAttribute("style", "display: block;");
                }
            }
            /* END */

        </script>
        <script>
            /*=========================================== SEARCH ======================================*/
        function myFunction(e) {
        e.preventDefault();
        var input, filter, table, tr, td, cell, i, j;
        input = document.getElementById("Searchpiutang");
        filter = input.value.toUpperCase();
        console.log(filter)
        table = document.getElementById("coba");
        tr_table = document.getElementById("tr");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            // Hide the row initially.
            tr[i].style.display = "none";
            tr_table.style.display = "";
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
            /*=========================================== END SEARCH ======================================*/
            
            /*=========================================== SHOW ENTRIES ======================================*/
            $(document).ready(function() {
                function list_piutang_data(query = '') {
                    $.ajax({
                        url: "{{ route('listpiutang') }}",
                        method: 'POST',
                        data: {
                            list_jumlah: query,
                            "_token": "{{ csrf_token() }}",
                        },
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                            var dd;
                            for (let index = 0; index < data.length; index++) {
                                //Number
                                var number = data[index].piutang_nominal;
                                var	reverse = number.toString().split('').reverse().join(''),
                                ribuan 	= reverse.match(/\d{1,3}/g);
                                ribuan	= ribuan.join('.').split('').reverse().join('');
                                //tanggal

                                var date = new Date (data[index].piutang_tanggal);
                                const monthNames = ["January", "February", "March", "April", "May", "June",
                                "July", "August", "September", "October", "November", "December"
                                ];
                                console.log(date)
                                day = date.getDate();
                                month = monthNames[date.getMonth() + 1]
                                year = date.getFullYear();
                                var ddate = [day, month, year].join(' ')
                                //
                                
                                var str = data[index].piutang_client;
                                str = str.toLowerCase().replace(/\b[a-z]/g, function(letter) {
                                    return letter.toUpperCase();
                                });
                                // Uppercase Deskripsi
                                var strs = data[index].piutang_deskripsi;
                                strs = strs.toLowerCase().replace(/\b[a-z]/g, function(letter) {
                                    return letter.toUpperCase();
                                });
                                dd +=
                                '<tr class="table-danger">'+
                                    '<th scope="row" class="text-center "><i data-feather="check"></i></th>'+
                                    '<td class="text-center">'+
                                        ddate +
                                    '</td>'+
                                    '<td class="text-center">'+
                                        str +
                                    '</td>'+
                                    '<td class="text-center">'+
                                        strs +
                                    '</td>'+
                                    '<td class="text-right">'+
                                        ribuan +
                                    '</td>'+
                                    '<td class="text-center">'+
                                        '<a href="#" data-id="'+ data[index].idx_piutang +'"'+
                                            'class="btn btn-success btn-sm btn-lihat">'+
                                            'Lihat Detail</a>'+
                                    '</td>'+
                                    '<td class="text-center">';
                                        if ('Auth::check()')
                                            {
                                        dd+=
                                                '{{ link_to("'+ piutang/hapus/ +'" .'+ data[index].idx_piutang +', "Hapus", ["class" => "btn btn-danger btn-sm"]) }} &nbsp'+
                                                /*EDIT*/ 
                                                '<a href="#" data-id="'+ data[index].idx_piutang +'"'+
                                                    'class="btn btn-warning btn-sm btn-editpengeluaran">Edit</a>';
                                            }
                                        dd+='</td>'+
                                '</tr>';
                            }
                            $('tbody').html(dd)
                        }
                    })
                }
                $(document).on('change','#listpiutang', function () {
                    var list_piutang = $('#listpiutang').val();
                    console.log(list_piutang)
                    setInterval(list_piutang_data(list_piutang),5000);
                });
                
            });
            /*=========================================== END SHOW ENTRIES ======================================*/

        </script>
        <script>
            $('#staticBackdrop').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
            })
            // $('#staticBackdrop').modal('show')
        </script>
    @endsection
