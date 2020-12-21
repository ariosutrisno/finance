<div class="form-row" id="hiddenNosurat">
    <div class="form-group col-md-6">
        <label for="inputAddress">No Surat</label>
        <input id="txt1" type="text" class="form-control" id="inputAddress" placeholder="" name="nosurat" value="{{ $nomor_surat }}"
            readonly></input>
    </div>
    <div class="form-group col-md-6">
        <label for="perihal">Perihal</label>
        <input id="txt1" type="text" class="form-control" id="perihal" placeholder="" name="perihal"></input>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="nama">Nama Pelanggan</label>
        {{-- <input type="text" class="form-control" id="nama" placeholder="Nama" name="name" value="{{ old('name') }}"> --}}
        <select data-placeholder="Nama" data-allow-clear="1" class="form-control"  name="name"  id="nama" onchange="onSelect()">
            <option></option>
            @if (count($daftar_pelanggan) !== 0)
                @foreach ($daftar_pelanggan as $pelanggan)
                    <option value="{{ $pelanggan->idx_pelanggan }}">{{ $pelanggan->pelanggan_nama }}</option>
                @endforeach
            @else
                <p>Tidak ada nama</p>
            @endif
        </select>
    </div>
    <div class="form-group col-md-6">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" placeholder="email" name="email" value="{{ old('email') }}">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="perusahaan">Perusahaan</label>
        <input type="text" class="form-control" id="perusahaan" placeholder="Perusahaan" name="perusahaan"
            value="{{ old('telepon') }}"></input>
    </div>
    <div class="form-group col-md-6">
        <label for="telepon">Telepon</label>
        <input type="text" class="form-control" id="telepon" placeholder="Telepon" name="telepon"
            value="{{ old('telepon') }}"></input>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="dikirim">Tanggal Dikirim</label>
        <input type="date" class="form-control" id="dikirim" name="dikirim" </input> </div> <div
            class="form-group col-md-6">
        <label for="tempo">Tanggal Jatuh Tempo</label>
        <input type="date" class="form-control" id="tempo" name="tempo"></input>
    </div>
</div>
<div class="container-fluid" style="margin:0 !important;padding:0 !important;">
    <div class="table-responsive mt-4 mb-5 ">
        <table class="table  table-bordered table-sm" id="POITable">
            <thead class="bg-light">
                <tr class="text-center text-dark">
                    <th>Nama Proyek</th>
                    <th>Biaya Proyek</th>
                    <th>
                    </th>
                </tr>
            </thead>
            <tbody class="container1">

                <tr class="table-white ">
                    <td class="text-right"> <input type="text" class="form-control np" id="np" placeholder="Nama Proyek"
                            name="np[]"></input>
                    </td>
                    <td class="text-right gini"><input type="text" class="form-control cp" id="cp"
                            placeholder="Biaya Proyek" name="cp[]"></input></td>
                    <td class="text-center"><a href="#" class="delete  btn btn-danger tombol" style="display: none"
                            id="delete">Delete</a></td>
                </tr>

            </tbody>
        </table>
        <button class="add_form_field tombol btn bg-purple text-white">Add New Item &nbsp;
            <span style="font-size:16px; font-weight:bold;">+ </span>
        </button>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="kategori">Standar Pembayaran</label>
        <select class="form-control" id="kategori" name="sp">
            <option value="">Pilih Standar Pembayaran</option>
            <option value="standar">Standar</option>
            <option value="medium">Medium</option>
            <option value="high">High</option>
            <option value="excelent">Excelent</option>
        </select>
        {{-- <input type="text" class="form-control" id="kategori" placeholder="Perusahaan" name="sp"></input> --}}
    </div>
    <div class=" col-md-6">
        <div class="row ">
            <div class="form-group col-md-4 standar" style="display:block">
                {{-- <div class="coba">
                    <label for="Jt">Jumlah Termin</label>
                    <input type="number" min="0" class="form-control" id="Jt" name="jt"></input>
                </div> --}}
            </div>
            <div class="form-group  col-md-8 tambah" style="display:block">
                <label for="Term" class="col-sm-12 col-form-label"> </label>

                <div class="coba">
                    {{-- <div class="form-group row">
                        <label for="Term" class="col-sm-3   col-form-label">Term <span id="termin"></span></label>
                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control" id="inputtermin" value="">
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="catatan">Catatan :</label>
            <textarea class="form-control" name="catatan"> </textarea>
        </div>
    </div>
    <div class="col-md-6 mt-2 dd">

        <div class="hiddengg">

        </div>
        <div class="form-group row">
            <label for="dp" class="col-sm-4 col-form-label">Sub Total</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="subtotal" name="jumlah" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="dp" class="col-sm-4 col-form-label">Total</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="total" readonly>
            </div>
        </div>

    </div>

</div>