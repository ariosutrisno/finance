@extends('layouts.homepage.app')
@section('title', 'Laporan Kas Harian')
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
                                            <img src="{{ asset('img/Page-1.png') }}" alt="Hutang">
                                        </div>
                                        <div class="col-sm-10 ml-3">
                                            <span class="h2 text-danger"><strong> Laporan Kas Harian
                                                </strong></span>
                                            <br><span>uang masuk dan keluar dalam hidup ini</span></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <li style="list-style-type: none;">
                                        <button class="btn float-right"><i data-feather="edit"></i></button><br>
                                    </li>
                                    <li style="list-style-type: none;">
                                        <span class="text-danger">Saldo </span></li>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card overflow-hidden">
                        <div class="card-body border-bottom  shadow-lg p-3 bg-white rounded">
                            <nav class="navbar top-navbar float navbar-expand-md">
                                <ul class="navbar-nav float-left navbar-left">
                                    <li class="nav-item d-none d-md-block mr-1 mt-2">
                                        <select class="custom-select form-control bg-white custom-radius custom-shadow border-0" id="myselect">
                                            <option value="laporanSemuaKas" data-url="{{ route('harian') }}" selected>Laporan Harian</option>
                                            <option value="laporanBulanan" data-url="{{ route('bulanan') }}" >Laporan Bulanan</option>
                                            <option value="laporanTahunan" data-url="{{ route('tahunan') }}">Laporan Tahunan</option>
                                        </select>
                                    </li>
                                </ul>
                                <ul class="navbar-nav float-right navbar-right ml-auto">
                                    <!-- ============================================================== -->
                                    <!-- Search -->
                                    <!-- ============================================================== -->
                                    
                                    <li class="nav-item d-none d-sm-block mr-1 mt-2">
                                        <input type="date"
                                            class="form-control bg-white custom-radius custom-shadow border-0" name="tgl"
                                            id="tgl"
                                            value="{{ old('dompet_tanggal', Carbon\Carbon::now()->format('Y-m-d')) }}" />
                                    </li>
                                    <li class="nav-item d-none d-sm-block mr-1 mt-2">
                                        <select class="custom-select form-control bg-white custom-radius custom-shadow border-0" id="select">
                                            @if (count($filter) !== 0)
                                            <option>Pilih Kas</option>
                                                <option data-url="/laporan-kas/harian">Semua Kas</option>
                                                @foreach ($filter as $item)
                                                    @if ($item->idx_buku_kas)
                                                        <option value="{{ $item->idx_buku_kas }}" data-url="/laporan-kas/harian/{{ $item->idx_buku_kas }}">{{ $item->buku_nama }}</option>
                                                    @endif
                                                @endforeach
                                            @else
                                                <p>tidak ada aktifitas</p>
                                            @endif
                                        </select>
                                    </li>
                                    {{-- <li class="nav-item d-none d-sm-block mr-1 mt-2">
                                        <a class="nav-link bth btn-sm tombol text-white bg-alan" href="javascript:void(0)"
                                            style="width: 125px;">
                                            Cari
                                        </a>
                                    </li> --}}
                                </ul>
                            </nav>
                        </div>



                        <div class="container bg-white p-3 mb-5" style="height: 100%;">

                            <div class="table-responsive mt-4 mb-5 ">
                                @if (count($kas_harian) !== 0)
                                    <table class="table  table-bordered table-sm">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Status</th>
                                                <th>Tanggal</th>
                                                <th>Deskripsi</th>
                                                <th>Nominal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kas_harian as $buku)
                                                @if ($buku->idx_kategori == '2' && '2')
                                                    <tr class="table-danger">
                                                        <th scope="row" class="text-center "><i data-feather="arrow-up"></i>
                                                        </th>
                                                        <td class="text-center">
                                                            {{ \Carbon\Carbon::parse($buku->catatan_tgl)->locale('id')->isoformat('DD MMMM Y') }}
                                                        </td>
                                                        <td class="text-center">{{ ucfirst($buku->catatan_keterangan) }}
                                                        </td>
                                                        <td class="text-right">{{ $buku->BuatBuku->buku_mata_uang }}
                                                            @currency($buku->catatan_jumlah)
                                                        </td>
                                                        
                                                    </tr>
                                                @else
                                                    <tr class="table-primary">
                                                        <th scope="row" class="text-center"><i data-feather="arrow-down"></i>
                                                        </th>
                                                        <td class="text-center">
                                                            {{ \Carbon\Carbon::parse($buku->catatan_tgl)->locale('id')->isoformat('DD MMMM Y') }}
                                                        </td>
                                                        
                                                        <td class="text-center">{{ ucfirst($buku->catatan_keterangan) }}
                                                        </td>
                                                        <td class="text-right">{{ $buku->BuatBuku->buku_mata_uang }}
                                                            @currency($buku->catatan_jumlah) 
                                                        </td>
                                                    </tr>
                                                @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                    @else
                                    <p>Data Kosong</p>
                                @endif
                                {{ $kas_harian->render() }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center font-weight-bold">Statistik</h3>
                            <div class="pl-4 mb-5">
                                <canvas id="myChart" class="position-relative"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var ctx = document.getElementById('myChart').getContext("2d");;
        
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: <?= $day ?>,
                    datasets: [{
                            label: 'Pemasukan',
                            data: <?= $pemasukan ?>,
                            backgroundColor: 'rgba(0, 0, 0, 0)',
                            borderColor: 'rgba(0, 0, 255)',
                        
                        },
                        {
                            label: 'pengeluaran',
                            data: <?= $pengeluaran ?>,
                            backgroundColor: 'rgba(0, 0, 0, 0)',
                            borderColor: 'rgba(155, 0, 0, 1)',
                            
                        }
                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
            for (var i = 1; i <= myChart.data.datasets[0].data.length - 1; i++) {
                if (myChart.data.datasets[0].data[i - 1] === myChart.data.datasets[0].data[i]) {
                    console.log(myChart.data.datasets[0].data[i])
                    myChart.data.datasets[0].display = false;
                }
            }
    </script>
    <script>
        //filter
        const select = document.querySelector("#myselect");
            const options = document.querySelectorAll("#myselect option");
            // 1
            select.addEventListener("change", function() {
            const url = this.options[this.selectedIndex].dataset.url;
                if(url) {
                    location.href = url;
                }
            });
            
            // 2
            for(const option of options) {
                const url = option.dataset.url;
                if(location.href.includes(url)) {
                    option.setAttribute("selected", "");
                    break;
                }
            }
            $("#select").change(function() {
                var option = $(this).find('option:selected');
                window.location.href = option.data("url");
                });
    </script>
    
    @endsection
