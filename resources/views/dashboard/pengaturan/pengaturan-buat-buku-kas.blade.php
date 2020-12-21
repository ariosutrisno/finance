@extends('layouts.homepage.app')
@section('title', 'Buat Buku Kas')
@section('container')
    @include('layouts.homepage.css&js.cssdashboard')
    @include('layouts.homepage.css&js.css')
    @include('layouts.homepage.css&js.csslog')
    <div class="sidenav">
        <div class="login-main-text">
            <div class="text-center">
                <img src="img/Group 439.png" class="pb-4" alt="#">

                <h2>Lets Get You Set Up</h2>

                <p class="text-justify">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sapiente facere
                    tempora voluptatibus
                    laborum tenetur esse. Recusandae, est nobis. Nam et quod earum! Quae, quas? Facere sequi natus dicta
                    illo tempora!</p>

            </div>
        </div>
    </div>
    <div class="main">
        <div class="col-md-8 ml-auto mr-auto">
            <div class="login-form">

                <form action="{{ route('buku') }}" method="POST" class="mb-5" style="padding:10px">
                    @csrf
                    <input type="hidden" value="{{ $user }}" name="user">
                    {{-- <div class="form-group row">
                        <label for="waktu" class="col-sm-4 col-form-label">Zona Waktu</label>
                        <div class="col-sm-8">
                            <Select class="form-control" value="{{ old('buku_zonawaktu') }}" name="buku_zonawaktu">
                                <option value="">Pilih Zona Waktu</option>
                                <option value="Asia/Jakarta"> Waktu Indonesia Barat (WIB)
                                </option>
                                <option value="Asia/Makassar">Waktu Indonesia Tengah (WITA)</option>
                                <option value="Asia/Jayapura">Waktu Indonesia Timur (WIT)</option>
                                <option value="America/Cayman">United Kingdom/Cayman Islands</option>
                                <option value="Europe/London">United Kingdom/London</option>
                                <option value="America/Montserrat">United Kingdom/Montserrat</option>
                                <option value="America/Tortola">United Kingdom/Tortola</option>
                                <option value="America/Adak">United States/Adak</option>
                            </Select>
                        </div>
                    </div> --}}
                    <div class="form-group row">
                        <label for="buku" class="col-sm-4 col-form-label">Nama Buku Kas</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="buku" name="buku_nama"
                                value="{{ old('buku_nama') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="desc" class="col-sm-4 col-form-label">Deskripsi Buku Kas</label>
                        <div class="col-sm-8">
                            <textarea class="form-control " id="desc" name="buku_deskripsi"
                                value="{{ old('buku_deskripsi') }}"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="currency" class="col-sm-4 col-form-label">Mata Uang</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="currency" name="buku_mata_uang"
                                value="{{ old('buku_mata_uang') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="currency" class="col-sm-4 col-form-label">Saldo Awal</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="currency1" onkeyup="changevalue()">
                            <input type="text" class="form-control" name="buku_saldo" id="currency2"
                            value="{{ old('buku_saldo') }}" hidden>
                            <input type="text" class="form-control" name="buku_saldo_awal" id="currency3"
                            value="{{ old('buku_saldo_awal') }}" hidden>
                            
                        </div>
                    </div>
                    <center> <button type="submit" onclick="buat()" class="text-center tombol btn">Continue</button>
                    </center>
                </form>
            </div>
        </div>
    </div>




    <script>
        var rupiah = document.getElementById('currency1');
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
            var rupiah = document.getElementById('currency1').value;
            var rupiahchange = rupiah.split(".").join("").split(" ").join("");
            document.getElementById('currency2').value = rupiahchange;
            document.getElementById('currency3').value = rupiahchange;

        }

        function buat() {

            var buku = document.getElementById("buku").value;
            var currency = document.getElementById("currency").value;


            if (buku == '' || currency == '') {
                Swal.fire({
                    title: '<strong>Created Failed</u></strong>',
                    icon: 'error',
                    html: 'Please Insert the blank field',
                    showCloseButton: true,
                    focusConfirm: false,
                    confirmButtonText: ' Oke',
                })
            } else {
                Swal.fire({
                    title: '<strong>Created succesfully</strong>',
                    icon: 'success',
                    html: 'Congratulation, Book created succesfully',

                    focusConfirm: false,
                    confirmButtonText: ' Continue',


                }).then(function() {
                    // Redirect the user
                    window.location.href = "dompet-pribadi";
                    console.log('The Ok Button was clicked.');
                })
            }
        }

    </script>

@endsection
