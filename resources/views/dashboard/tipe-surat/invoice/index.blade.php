@extends('layouts.homepage.app')
@section('title', 'Invoice Letter')
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
                                        <span class="h1 text-cyan"><strong> Invoice</strong></span>
                                        <br><span>buat invoice, eksport dan berikan kepada orang lain</span></div>
                                </div>
                            </div>
                            <div class="col-md-4">

                                {{-- <li style="list-style-type: none;">
                                    <span class="text-danger">Jumlah </span></li>
                                @if (count($data) !== 0)
                                <li style="list-style-type: none;"><span class="h2"><strong> {{ count($data)}}
                                Surat</strong></span></li>
                                @else
                                <li style="list-style-type: none;"><span class="h2"><strong> Tidak Ada
                                            Surat</strong></span></li>
                                @endif --}}
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
                                <a class="btn tombol btn-primary" style="width:50%" href="{{route('invoice-create')}}"
                                    role="button">Create</a>
                            </div>
                            <div class="col-md-8 ">

                                <div class="row float-right ">
                                    <form class="float-right">
                                        <div class="form-row float right">
                                            <div id="mol" class="form-group col-md-6">
                                                <input
                                                    class="form-control customize-input custom-shadow custom-radius border-0 bg-white"
                                                    type="search" placeholder="Search" aria-label="Search" id="search"/>
                                                <!-- <i class="form-control-icon text-left" data-feather="search"></i> -->
                                            </div>
                                            <div id="mol" class="form-group col-md-6">
                                                <button type="button"
                                                    class=" form-group col-md-12 tombol btn btn-primary bg-alan"
                                                    style="width:100%" onclick="myFunction(event);">Cari</button>
                                            </div>
                                    </form>
                                </div>

                            </div>
                        </div>



                    </div>
                    <div class="container bg-white p-3 mb-5" style="height: 100%;">
                        {{-- <div class="filter-space">
                            <a class="btn btn-primary" href="{{route('offeringcreate')}}" role="button">Create</a>
                    </div> --}}
                    {{-- {{dd($quotation)}} --}}
                    <div class="table-responsive mt-4 mb-5 ">
                        @if (count($invoice) !== 0)
                        <table class="table  table-bordered table-sm" id="coba">
                            <thead>
                                <tr class="text-center" id="tr">
                                    <th>No</th>
                                    <th>Nama Surat</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Jatuh Tempo</th>
                                    <th>Jumlah Pembayaran</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php $i = 0; ?>
                            @foreach($invoice as $datas)
                            <tbody >
                                <tr class="table-primary" >
                                    <th scope="row" class="text-center ">{{ ++$i }}</i></th>
                                    <td class="text-center">{{ ucwords($datas->perihal)}}</td>
                                    <td class="text-center">{{ \Carbon\Carbon::parse($datas->tanggal_invoice)->locale('id')->isoformat('DD MMMM Y') }}</td>
                                    <td class="text-center">{{ \Carbon\Carbon::parse($datas->jatuh_tempo_invoice)->locale('id')->isoformat('DD MMMM Y') }}</td>
                                    <td class="text-center">Rp @currency($datas->jumlah_tagihan)</td>
                                    <td class="text-center">

                                        <a href="{{url('/invoice/' . $datas->idx_invoice . '/edit')}}"
                                            class="ml-auto mr-1"><img src="img/edit.png"></a>
                                        <a href="{{url('/invoice/' .$datas->idx_invoice. '/delete/' )}}"
                                            class="mr-auto ml-1"><img src="img/delete-button.png"></a>
                                        <a href="{{url('/invoice/' .$datas->idx_invoice. '/print/' )}}"
                                            class="mr-auto ml-1"><img src="img/export.png"></a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                        @else
                        tidak ada data
                        @endif
                            {{ $invoice->render() }}
                    </div>
                    <div class="float-right">

                        {{-- {{$quotation->links()}} --}}
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