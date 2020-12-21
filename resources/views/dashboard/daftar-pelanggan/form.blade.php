<div class="form-row">
    <div id="mol" class="form-group col-md-6">
        <label for="inputAddress">Nama</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="" name="tgl_mulai"
            value="{{ old('tgl_mulai') }}"></input>
    </div>
    <div id="tanggal_selesai" class="form-group col-md-6">
        <label for="inputAddress">Perusahaan</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="" name="tgl_selesai"
            value="{{ old('tgl_selesai') }}"></input>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputAddress">Tanggal Daftar</label>
        <input type="time" class="form-control" id="inputAddress" placeholder="" name="jam_mulai_kerja"
            value="{{ old('jam_mulai_kerja') }}"></input>
    </div>
    <div class="form-group col-md-6">
        <label for="inputAddress">Alamat</label>
        <input type="time" class="form-control" id="inputAddress" placeholder="" name="jam_selesai_kerja"
            value="{{ old('jam_selesai_kerja') }}"></input>
    </div>
</div>