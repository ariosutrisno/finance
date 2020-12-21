@extends('layouts.homepage.app')
@section('title', 'Dashboard')
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


                <div class="card-group">
                    <div class="card border-right  mr-2 ml-2">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <h3 class="text-muted font-weight-normal mb-0 w-100 text-truncate">
                                        Saldo
                                    </h3>
                                    <div class="dropdown mt-3">
                                        <a class="dropdown-toggle" href="#"  id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Buku Kas
                                            <i data-feather="chevron-down" class="svg-icon"></i></span>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="/dashboard">Semua Kas</a>
                                                @foreach ($kas as $sidebar)
                                                    @if ($sidebar->id)
                                                        <a class="dropdown-item" href="/dashboard/{{ $sidebar->idx_buku_kas }}">{{ ucwords($sidebar->buku_nama) }}</a>
                                                    @endif
                                                @endforeach
                                        </div>
                                    </div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium"><sup
                                                class="set-doller"></sup>{{ $mata_uang->buku_mata_uang }} @currency($buku_saldo)</h2>
                                        <span
                                            class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none">{{ $data_persen }}%</span>

                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">
                                    
                                        {{ $data }} % dari bulan
                                        lalu
                                    </h6>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card border-right mr-2 ml-2">
                        <div class="card-body  ">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <h3 class=" font-weight-normal text-purple mb-0 w-100 text-truncate">
                                        Pemasukan
                                    </h3>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mt-4 mb-1 font-weight-medium " style="margin-top:40px !important">
                                            <sup class="set-doller"></sup>
                                            {{ $mata_uang->buku_mata_uang }} @currency($saldo_pemasukan)
                                        </h2>
                                        <span
                                            class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-md-none d-lg-block" style="margin-top:40px !important">-18.33%</span>
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">
                                        dari bulan lalu
                                    </h6>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card border-right mr-2 ml-2">
                        <div class="card-body  ">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <h3 class=" font-weight-normal text-danger mb-0 w-100 text-truncate">
                                        Pengeluaran
                                    </h3>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mt-4 mb-1 font-weight-medium" style="margin-top:40px !important">
                                            <sup class="set-doller"></sup>
                                            {{ $mata_uang->buku_mata_uang }} @currency($saldo_pengeluaran)
                                        </h2>
                                        <span
                                            class="badge bg-danger font-12 text-white font-weight-medium badge-pill ml-2 d-md-none d-lg-block" style="margin-top:40px !important">-18.33%</span>
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">
                                        dari bulan lalu
                                    </h6>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    <h4 class="card-title mb-0">Earning Statistics</h4>

                                </div>
                                <div class="pl-4 mb-5">
                                    <!-- <div style="height: 315px;"></div> -->
                                    <canvas id="myChart" class="position-relative"></canvas>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="card-group">
                    <div class="card border-right mr-2 ml-2">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-left">
                                <h3 class="text-dark font-weight-normal mb-3 w-100 text-truncate">
                                    Income Records
                                </h3>
                            </div>
                                <li style="list-style-type: none;">
                                    
                                    <p class="text-alan">@currency('111111')</p>
                                </li>
                            
                        </div>
                    </div> --}}
                    {{-- <div class="card border-right mr-2 ml-2">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-left">
                                <h3 class="text-dark font-weight-normal mb-3 w-100 text-truncate">
                                    Outcome Records
                                </h3>
                            </div>
                        
                                <li style="list-style-type: none;">
                            
                                    <p class="text-alan"> @currency('111111') </p>
                                </li>
                        
                        </div>
                    </div> --}}

                    {{-- <div class="card border-right  mr-2 ml-2">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-left">
                                <h3 class="text-dark font-weight-normal mb-3 w-100 text-truncate">
                                    Activity History
                                </h3>

                            </div>
                            <li style="list-style-type: none;">Lorem ipsum dolor sit,
                                <p class="text-purple"> @currency('111111')</p>
                            </li>
                            <li style="list-style-type: none;">Lorem ipsum dolor sit,
                                <p class="text-purple">@currency('111111')</p>
                            </li>
                            <li style="list-style-type: none;">Lorem ipsum dolor sit,
                                <p class="text-purple"> @currency('111111')</p>
                            </li>
                            <li style="list-style-type: none;">Lorem ipsum dolor sit,
                                <p class="text-purple"> @currency('111111')</p>
                            </li>
                        </div>
                    </div> --}}

                </div>
            </div>

        </div>
    </div>
    <script>
        var ctx = document.getElementById('myChart');

        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?= $bulan ?>,
                datasets: [{
                        label: 'Pemasukan',
                        data: <?= $pemasukan?>,
                        backgroundColor: 'rgba(0, 0, 0, 0)',
                        borderColor: 'rgba(0, 0, 255)',
                    },
                    {
                        label: 'pengeluaran',
                        data: <?= $pengeluaran?>,
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

    </script>
    <script>
        
    </script>

@endsection
