@extends('layouts.homepage.app')
@section('title', 'Kategori Surat')
@section('container')
    @include('layouts.homepage.css&js.cssdashboard')
    @include('layouts.homepage.css&js.css')
    @include('layouts.homepage.css&js.csstag')
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
                <div class="container h-100">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-sm-1 mt-1">
                                            <img src="img/Page-1.png" alt="Hutang">
                                        </div>
                                        <div class="col-sm-10 ml-3">
                                            <span class="h1 text-cyan"><strong> Kategori Surat </strong></span>
                                            <br><span>edit data perusahaan</span></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <li style="list-style-type: none;">
                                        <button class="btn float-right"><i data-feather="file-text"></i></button><br>
                                    </li>
                                    <li style="list-style-type: none;">
                                        <span class="text-danger">Jumlah </span></li>
                                    <li style="list-style-type: none;"><span class="h2"><strong> 2
                                                Kategori </strong></span></li>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body" style="min-height: 500px !important;">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card ">
                                        <div class="card-body  p-2">
                                            <div class="card-title text-danger">
                                                Pengeluaran
                                            </div>
                                            @if (!empty($isi_kategori))
                                                @foreach ($isi_kategori as $kategori)
                                                    @if ($kategori->idx_kategori == 2)
                                                        <input type="hidden" value="2" name="idx_kategori">
                                                        <li style="list-style-type: none; border-bottom: solid 1px; padding: 1px ;"
                                                            id="tampil">
                                                            {{ $kategori->sub_nama }}
                                                            <span class="float-right">
                                                                <a href="{{ '/kategori-surat/hapus/' . $kategori->idx_sub_kat }}"
                                                                    class="ml-auto mr-1"><img src="img/quit.png"
                                                                        style="max-width: 18px !important; max-height: 18px !important;">
                                                                </a>
                                                                {{-- EDIT KATEGORI
                                                                --}}
                                                                <a href="#" data-id="{{ $kategori->idx_sub_kat }}"
                                                                    data-target="#edit-kategori"
                                                                    class="mr-auto ml-1 btn_sub_kategori"
                                                                    data-toggle="modal"><img src="img/Page-5.png"
                                                                        style="max-width: 18px!important; max-height: 18px !important;">
                                                                </a>
                                                            </span>
                                                        </li>
                                                    @endif
                                                @endforeach
                                                <div class="text-center mt-2">
                                                    <a type="button" class="btn-pengeluaran" data-toggle="modal"
                                                        data-target="#pengeluaran" data-id="">
                                                        <i class="icon-plus"></i> <span>Tambah Kategori</span></a>
                                                </div>
                                            @else
                                                <p>Data Kosong</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body p-2 ">
                                            <div class="card-title text-primary">
                                                Pemasukan
                                            </div>
                                            @if (!empty($isi_kategori))
                                                @foreach ($isi_kategori as $kategori)
                                                    @if ($kategori->idx_kategori == '1')
                                                        <input type="hidden" value="1" name="idx_kategori">
                                                        <li
                                                            style="list-style-type: none; border-bottom: solid 1px; padding: 1px ;">
                                                            {{ $kategori->sub_nama }}
                                                            <span class="float-right">
                                                                <a href="{{ '/kategori-surat/hapus/' . $kategori->idx_sub_kat }}"
                                                                    class="ml-auto mr-1 "><img src="img/quit.png"
                                                                        style="max-width: 18px !important; max-height: 18px !important;">
                                                                </a>
                                                                {{-- EDIT KATEGORI
                                                                --}}
                                                                <a href="#" data-id="{{ $kategori->idx_sub_kat }}"
                                                                    data-target="#edit-kategori"
                                                                    class="mr-auto ml-1 btn_sub_kategori"
                                                                    data-toggle="modal"><img src="img/Page-5.png"
                                                                        style="max-width: 18px!important; max-height: 18px !important;">
                                                                </a>
                                                            </span>
                                                        </li>
                                                    @endif
                                                @endforeach
                                                <div class="text-center mt-2">
                                                    <a type="button" data-toggle="modal" class="btn-pemasukan"
                                                        data-target="#pemasukan">
                                                        <i class="icon-plus"></i> <span>Tambah Kategori</span></a>
                                                </div>
                                            @else
                                                <p>data kosong</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>

        </div>
        <!-- Modal -->
        {{-- pengeluaran --}}
        <div class="modal fade" id="pengeluaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori Pengeluaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('jenis_kategori') }}" method="GET" id="form-pengeluaran">
                        @csrf
                        <input type="hidden" value="{{ $user_id }}" name="user_id">
                        <div class="modal-body">
                            <input type="hidden" value="2" name="idx_kategori">
                            <input type="text" class="form-control" name="kategori" id="id_pengeluaran" />

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger mr-1" data-dismiss="modal">batal</button>
                            <button type="button" class="btn btn-success btn-simpanpengeluaran" id="submit"
                                value="Submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- kategori pemasukan --}}
        <div class="modal fade" id="pemasukan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori Pemasukan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('jenis_kategori') }}" method="GET" id="form-pemasukan">
                        @csrf
                        <input type="hidden" value="{{ $user_id }}" name="user_id">
                        <div class="modal-body">
                            <input type="hidden" value="1" name="idx_kategori">
                            <input type="text" class="form-control" name="kategori" />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger mr-1" data-dismiss="modal">batal</button>
                            <button type="button" class="btn btn-success btn-simpanpemasukan">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- MODAL EDIT KATEGORI PENGELUARAN & PEMASUKAN --}}
        <div class="modal fade" id="edit-kategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('kategori') }}" method="POST" id="form_edit_kategori">
                        @csrf
                        <div class="modal-body">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger mr-1" data-dismiss="modal">batal</button>
                            <button type="button" class="btn btn-success btn-updatekategori">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        /*INPUTAN JQERY TAG*/
        $('input[name="kategori"]').amsifySuggestags();
        $('input[name="kategori"]').amsifySuggestags();
        /*
         *simpan kategori pengeluaran
         */
        $(document).ready(function() {
            // Add kategori
            $('.btn-simpanpengeluaran').on('click', function() {
                let form_data = $('#form-pengeluaran').serialize();
                console.log(form_data)
                $.ajax({
                    type: "POST",
                    url: "/kategori-surat",
                    data: form_data,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        console.log(data)
                        $('#pengeluaran').load('hide')
                        window.location.assign("/kategori-surat")
                    },
                    error: function(error) {
                        console.log(error)
                    }
                });
            });

        });
        /*
         *simpan kategori pemasukan
         */
        $(document).ready(function() {
            // Add kategori
            $('.btn-simpanpemasukan').on('click', function() {
                let form_data = $('#form-pemasukan').serialize();
                console.log(form_data)
                $.ajax({
                    type: "POST",
                    url: "/kategori-surat",
                    data: form_data,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        console.log(data)
                        $('#pemasukan').load('hide')
                        window.location.assign("/kategori-surat")
                    },
                    error: function(error) {
                        console.log(error)
                    }
                });
            });

        });
        /*
         *Edit kategori pengeluaran & pemasukan
         */
        $('.btn_sub_kategori').on('click', function() {
            console.log($(this).data('id'))
            let id = $(this).data('id')
            $.ajax({
                url: `/kategori-surat/${id}/edit`,
                method: "GET",
                success: function(data) {
                    console.log(data)
                    $('#edit-kategori').find('.modal-body').html(data)
                    $('#edit-kategori').modal('show')
                },
                error: function(error) {
                    console.log(error)
                }
            })
        })
        /* Update Inputan Kategori*/
        $('.btn-updatekategori').on('click', function() {
            let id = $('#form_edit_kategori').find('#idx_sub_kat').val()
            let formData = $('#form_edit_kategori').serialize()
            console.log(formData)
            $.ajax({
                url: `/kategori-surat/${id}`,
                method: "POST",
                data: formData,
                success: function(data) {
                    $('#form_edit_kategori').modal('hide')
                    window.location.assign(`/kategori-surat`)
                },
                error: function(error) {
                    console.log(error)
                }
            })
        })

    </script>
@endsection
