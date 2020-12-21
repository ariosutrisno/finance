@extends('layouts.homepage.app')
@section('title', 'Dompet Pribadi')
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
                                            <img src="img/Page-1.png" alt="Hutang">
                                        </div>
                                        <div class="col-sm-10 ml-3">
                                            <span class="h1 text-cyan"><strong> Dompet Pribadi </strong></span>
                                            <br><span>uang masuk dan keluar dalam hidup ini</span></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <li style="list-style-type: none;">
                                        <button class="btn float-right"><i data-feather="edit"></i></button><br>
                                    </li>
                                    <li style="list-style-type: none;">
                                        <span>Saldo </span>
                                    </li>

                                    <li style="list-style-type: none;">
                                        <span class="h2">
                                            <strong> Rp. {{ $hitung }} </strong>
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
                                    <li class="nav-item d-none d-md-block mr-1 mt-2"> <input type="month" name="startDate"
                                            id="date-picker"
                                            class=" form-control custom-shadow custom-radius border-0 bg-white" /><span
                                            class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </li>
                                    <!-- <input type="date" /> -->
                                    <li class="nav-item d-none d-md-block mr-1 mt-2"><select
                                            class="custom-select form-control bg-white custom-radius custom-shadow border-0"
                                            id="data_users_reguler">
                                            <option value="">Semua</option>
                                            <option value="2">2</option>
                                            <option value="5">5</option>
                                            <option value="8">8</option>
                                        </select>
                                    </li>

                                </ul>
                                <ul class="navbar-nav float-right navbar-right ml-auto">
                                    <!-- ============================================================== -->
                                    <!-- Search -->
                                    <!-- ============================================================== -->
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
                                    <li class=" d-none d-md-block">
                                        <a class="nav-link" href="javascript:void(0)">
                                            <form>
                                                <div class="customize-input">
                                                    <input
                                                        class="form-control custom-shadow custom-radius border-0 bg-white"
                                                        type="search" placeholder="Search" aria-label="Search"
                                                        id="data_users_reguler" />
                                                    <!-- <i class="form-control-icon text-left" data-feather="search"></i> -->
                                                </div>
                                            </form>
                                        </a>
                                    </li>
                                </ul>
                            </nav>

                        </div>

                    </div>
                    <div class="container bg-white p-3 mb-5" style="height: 100%;">
                        <div class="table-responsive mt-4 mb-5 ">
                            @if (!empty($dompetPribadi))
                                <table class="table  table-bordered table-sm" id="data_users_reguler">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Tipe</th>
                                            <th>Tanggal</th>
                                            <th>Kategori</th>
                                            <th>Deskripsi</th>
                                            <th>Nominal</th>
                                            <th>Saldo</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dompetPribadi as $dompet)
                                            @if ($dompet->dompet_kategori == 'Pengeluaran' && 'pengeluaran')
                                                <tr class="table-danger">
                                                    <th scope="row" class="text-center "><i data-feather="arrow-up"></i>
                                                    </th>
                                                    <td class="text-center">
                                                        {{ \Carbon\Carbon::parse($dompet->dompet_tanggal)->locale('id')->isoformat('DD MMMM Y') }}
                                                    </td>
                                                    <td class="text-center">{{ $dompet->dompet_kategori }}</td>
                                                    <td class="text-center">{{ $dompet->dompet_deskripsi }}</td>
                                                    <td class="text-right">{{ $dompet->dompet_nominal }}</td>
                                                    <td class="text-right">{{ $dompet->dompet_saldo }}</td>
                                                    <td> </td>
                                                </tr>
                                            @else
                                                <tr class="table-primary">
                                                    <th scope="row" class="text-center "><i data-feather="arrow-down"></i>
                                                    </th>
                                                    <td class="text-center">
                                                        {{ \Carbon\Carbon::parse($dompet->dompet_tanggal)->locale('id')->isoformat('DD MMMM Y') }}
                                                    </td>
                                                    <td class="text-center">{{ $dompet->dompet_kategori }}</td>
                                                    <td class="text-center">{{ $dompet->dompet_deskripsi }}</td>
                                                    <td class="text-right">{{ $dompet->dompet_nominal }}</td>
                                                    <td class="text-right">{{ $dompet->dompet_saldo }}</td>
                                                    <td> </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>tidak ada data</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>


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
                        <form action="{{ route('store.dompet') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="jam" class="col-form-label">Jam :</label>
                                <input type="time" class="form-control" id="jam" name="dompet_jam"
                                    value="{{ old('dompet_jam') }}">
                            </div>
                            <div class="form-group">
                                <label for="tanggal" class="col-form-label">Tanggal :</label>
                                <input type="date" class="form-control" id="tanggal" name="dompet_tanggal"
                                    value="{{ old('dompet_tanggal') }}"></input>
                            </div>

                            <div class="form-group">
                                <label for="nominal" class="col-form-label">Nominal :</label>
                                <input type="number" min="0" placeholder="0" class="form-control" id="nominal"
                                    name="dompet_nominal" value="{{ old('dompet_nominal') }}"></input>
                            </div>

                            <div class="form-group">
                                <label for="kategori" class="col-form-label">Kategori :</label>
                                <input class="form-control" id="kategori" name="dompet_kategori"
                                    value="{{ $dompetPribadi->dompet_kategori = 'Pengeluaran' }}" placeholder="Pengeluaran"
                                    readonly></input>

                            </div>
                            <div class="form-group">
                                <label for="keterangan" class="col-form-label">Keterangan :</label>
                                <textarea class="form-control" id="Keterangan" name="dompet_deskripsi"
                                    value="{{ old('dompet_deskripsi') }}"></textarea>
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
        <!-- Modal Pengeluaran -->
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
                        <form action="{{ route('store.dompetpemasukan') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="jam" class="col-form-label">Jam:</label>
                                <input type="time" class="form-control" id="jam" name="dompet_jam"
                                    value="{{ old('dompet_jam') }}">
                            </div>
                            <div class="form-group">
                                <label for="tanggal" class="col-form-label">Tanggal:</label>
                                <input type="date" class="form-control" id="tanggal" name="dompet_tanggal"
                                    value="{{ old('dompet_tanggal') }}"></input>
                            </div>

                            <div class="form-group">
                                <label for="nominal" class="col-form-label">Nominal:</label>
                                <input type="number" min="0" placeholder="0" class="form-control" id="nominal"
                                    name="dompet_nominal" value="{{ old('dompet_nominal') }}"></input>
                            </div>

                            <div class="form-group">
                                <label for="kategori" class="col-form-label">Kategori :</label>
                                <input class="form-control" id="kategori" name="dompet_kategori" placeholder="Pemasukan"
                                    readonly value="{{ $dompetPribadi->dompet_kategori = 'Pemasukan' }}""></input>
                                                                    </div>
                                                                <div class=" form-group">
                                <label for="keterangan" class="col-form-label">Keterangan :</label>
                                <textarea class="form-control" id="Keterangan" name="dompet_deskripsi"
                                    value="{{ old('dompet_deskripsi') }}"></textarea>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger mr-1" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- ENd -->
    </div>

    </div>

    <!-- Script JS -->

    <script>
        $(function() {
            $("#datepicker").datepicker({
                format: "mm-yyyy",
                viewMode: "months",
                minViewMode: "months",
            });
        })
        $(document).ready(function() {
            $('#data_users_reguler').DataTable();
        });

    </script>
@endsection
