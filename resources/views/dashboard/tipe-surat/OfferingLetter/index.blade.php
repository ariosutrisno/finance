@extends('layouts.homepage.app')
@section('title', 'Offering Letter')
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
                                        <span class="h1 text-cyan"><strong> Offering Letter</strong></span>
                                        <br><span>buat surat, eksport dan berikan kepada orang lain</span></div>
                                </div>
                            </div>
                            <div class="col-md-4">

                                <li style="list-style-type: none;">
                                    <span class="text-danger">Jumlah </span></li>
                                @if (count($data) !== 0)
                                <li style="list-style-type: none;"><span class="h2"><strong> {{ count($data)}}
                                            Surat</strong></span></li>
                                @else
                                <li style="list-style-type: none;"><span class="h2"><strong> Tidak Ada
                                            Surat</strong></span></li>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card overflow-hidden">
                    <div class="card-body border-bottom  shadow-sm p-3 bg-white rounded">


                        <!-- ============================================================== -->
                        <!-- Right side toggle and nav items -->
                        <!-- ============================================================== -->


                        <div class="row p-3">
                            <div class="col-md-4">
                                <a class="btn tombol btn-primary" style="width:50%" href="{{route('offeringcreate')}}"
                                    role="button">Create</a>
                            </div>
                            <div class="col-md-8 ">

                                <div class="row float-right ">
                                    <form action="" class="float-right">
                                        <div class="form-row float right">
                                            <div id="mol" class="form-group col-md-6">
                                                <input
                                                    class="form-control customize-input custom-shadow custom-radius border-0 bg-white"
                                                    type="search" placeholder="Search" aria-label="Search" id="search" />
                                                <!-- <i class="form-control-icon text-left" data-feather="search"></i> -->
                                            </div>
                                            <div id="mol" class="form-group col-md-6">
                                                <button type="submit"
                                                    class=" form-group col-md-12 tombol btn btn-primary bg-alan"
                                                    style="width:100%" onclick="myFunction(event);">Cari</button>
                                            </div>

                                    </form>
                                </div>

                            </div>
                        </div>



                    </div>
                    <div class="container bg-white p-3 mb-5" style="height: 100%;">
                        {{-- {{-- <div class="filter-space"> --}}
                        {{-- <a class="btn btn-primary" href="{{route('offeringcreate')}}" role="button">Create</a> --}}
                    </div>
                    <div class="table-responsive mt-4 mb-5 ">
                        @if (count($data) !== 0)
                        <table class="table  table-bordered table-sm" id="coba">
                            <thead class="bg-info">
                                <tr class="text-center text-dark" id="tr">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Peruntukan</th>
                                    <th>Tanggal dibuat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach($data as $data)
                                @if($data->letter_peruntukan =="0")
                                <tr class="table-success">
                                    @else
                                <tr class="table-primary">
                                    @endif
                                    <th scope="row" class="text-center ">{{ ++$i }}</i></th>
                                    <td class="text-center">{{ $data->letter_nama}}</td>
                                    @if($data->letter_peruntukan =="1")
                                    <td class="text-center">Penerimaan Karyawan</td>
                                    @else
                                    <td class="text-center">Penerimaan Internship</td>
                                    @endif
                                    <td class="text-center">{{ \Carbon\Carbon::parse($data->created_at)->locale('id')->isoformat('DD MMMM Y') }}</td>
                                    <td class="text-center">

                                        <a href="{{url('/offering/' . $data->idx_offering_letter . '/edit')}}"
                                            class="ml-auto mr-1"><img src="img/edit.png"></a>
                                        <a href="{{url('/offering/' .$data->idx_offering_letter. '/delete/' )}}"
                                            class="mr-auto ml-1"><img src="img/delete-button.png"></a>
                                        <a href="{{url('/offering/' .$data->idx_offering_letter. '/print/' )}}"
                                            class="mr-auto ml-1"><img src="img/export.png"></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <p>Tidak ada data </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
</div>
<script>
    //search
    function myFunction(e) {
        e.preventDefault();
    var input, filter, table, tr, td, cell, i, j;
        input = document.getElementById("search");
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
    </script>
@endsection