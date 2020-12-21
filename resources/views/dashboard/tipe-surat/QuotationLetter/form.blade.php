<div class="form-row" >
    <div class="form-group col-md-6">
        <label for="inputAddress">No Surat</label>
        <input id="txt1" type="text" class="form-control" id="inputAddress" placeholder="" value="{{ $nomor_surat }}" name="nomor_surat"
            readonly>
    </div>
    <div class="form-group col-md-6">
        <label for="perihal">Perihal</label>
        <input id="txt1" type="text" class="form-control" id="perihal" placeholder="" name="perihal"></input>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="nama">Nama Pelanggan</label>
        {{-- <input type="text" class="form-control" id="nama" placeholder="Nama" name="name"> --}}
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
        <input type="email" class="form-control" id="email" placeholder="email" name="email" >
        
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="perusahaan">Perusahaan</label>
        <input type="text" class="form-control" id="perusahaan" placeholder="Perusahaan" name="perusahaan"></input>
    </div>
    <div class="form-group col-md-6">
        <label for="telepon">Telepon</label>
        <input type="text" class="form-control" id="telepon" placeholder="Telepon" name="telepon"></input>
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
<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <label for="catatan">Catatan :</label>
            <textarea class="form-control" name="catatan"> </textarea>
        </div>
    </div>
    <div class="col-md-4s">
        <div class="form-group col-md-12 font-weight-bold"><label for="subtotal font-weight-bold">Subtotal</label>
            <input type="text" class="form-control  subtotal" id="subtotal" placeholder="Subtotal" name="subtotal"
                readonly></input>
        </div>
        <div class="form-group col-md-12 font-weight-bold ">
            <label for="total font-weight-bold">Total +
                PPN 10%
            </label>
            <input type="text" readonly class="form-control total" id="total" placeholder="Total" name="total"></input>
        </div>
    </div>
</div>
