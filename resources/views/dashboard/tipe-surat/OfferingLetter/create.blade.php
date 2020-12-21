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
<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
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
                                        <span class="h1 text-cyan"><strong> Offering Letter </strong></span>
                                        <br><span>buat surat dan berikan kepada orang lain</span></div>
                                </div>
                            </div>
                            <div class="col-md-4">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('offeringpost') }}" method="POST">
                            @csrf
                            {{-- <input type="hidden" name="user_id" value="{{ $user_id }}"> --}}
                            <div class="form-row" id="hiddenNosurat" style="display:none;">
                                <div class="form-group col-md-12">
                                    <label for="inputAddress">No Surat</label>
                                    <input id="txt1" type="text" class="form-control" id="inputAddress" placeholder=""
                                        name="nosurat" value="{{ $nomor_surat }}" readonly></input>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Nama" name="name"
                                        value="{{ old('name') }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="email" name="email"
                                        value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">Telepon</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="Telepon"
                                        name="telepon" value="{{ old('telepon') }}"></input>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">Address</label>
                                    <textarea type="text" class="form-control" id="inputAddress"
                                        placeholder="Address" name="address"
                                        value="{{ old('address') }}"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="peruntukan">Peruntukan</label>
                                <select class="form-control" style="color: black" id="selectON" onchange="onSelect();"
                                    name="selectFungsi">
                                    <option selected>Silakan Pilih</option>
                                    <option value="0">Penerimaan Internship</option>
                                    <option value="1">Penerimaan Karyawan</option>
                                </select>
                            </div>
                            <div class="ShowOptionHidden" id="hiddenItems" style="display:none;">
                                @include('dashboard.tipe-surat.OfferingLetter.form')
                            </div>
                            <div class="float-md-right">
                                <a href="{{route('offering')}}" class="btn btn-danger  ml-5">Cancel</a>
                                <button type="submit" class="btn btn-primary ">Update</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div> <!-- Script JS -->
    <script>
        function onSelect() {
                var kategori = document.getElementById("selectON");
                var option_data = kategori.options[kategori.selectedIndex].value;
                if (option_data == '0') {
                    var label = document.getElementById("hiddenItems").setAttribute("style", "display: block;");
                    var label1 = document.getElementById("tanggal_selesai").setAttribute("style", "display: block;");
                    var label11 = document.getElementById("mol").setAttribute("class", "form-group col-md-6");
                    
                  
                    var label = document.getElementById("hiddenNosurat").setAttribute("style", "display: block;");
                    var label2 =document.getElementById("narahubung").innerHTML="Nama Pembimbing";
                } else if(option_data == '1'){
                    var label = document.getElementById("hiddenItems").setAttribute("style", "display: block;");
                    var label1 = document.getElementById("tanggal_selesai").setAttribute("style", "display: none;");
                    var label11 = document.getElementById("mol").setAttribute("class", "form-group col-md-12");
                    var label = document.getElementById("hiddenNosurat").setAttribute("style", "display: none;");
                    var label2 =document.getElementById("narahubung").innerHTML="Narahubung";
                    var label2 =document.getElementById("txt1").value="";
                }else{
                    var label1 = document.getElementById("hiddenItems").setAttribute("style", "display: none;");
                    var label = document.getElementById("offering1").setAttribute("style", "display: none;");
                    var label = document.getElementById("hiddenNosurat").setAttribute("style", "display: none;");
                }
            }
    </script>
</div>
@endsection