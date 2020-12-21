<div class="form-row">
    <div class="form-group col-md-12">
        <label for="inputAddress">Tanggal Lamar</label>
        <input type="date" class="form-control" id="inputAddress" placeholder="" name="tgl_lamar"
            value="{{ old('tgl_selesai') }}"></input>
    </div>
</div>
<div class="form-row">
    <div id="mol" class="form-group col-md-6">
        <label for="inputAddress">Tanggal Mulai</label>
        <input type="date" class="form-control" id="inputAddress" placeholder="" name="tgl_mulai"
            value="{{ old('tgl_mulai') }}"></input>
    </div>
    <div id="tanggal_selesai" class="form-group col-md-6">
        <label for="inputAddress">Tanggal Selesai</label>
        <input type="date" class="form-control" id="inputAddress" placeholder="" name="tgl_selesai"
            value="{{ old('tgl_selesai') }}"></input>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputAddress">Jam Mulai</label>
        <input type="time" class="form-control" id="inputAddress" placeholder="" name="jam_mulai_kerja"
            value="{{ old('jam_mulai_kerja') }}"></input>
    </div>
    <div class="form-group col-md-6">
        <label for="inputAddress">Jam Selesai</label>
        <input type="time" class="form-control" id="inputAddress" placeholder="" name="jam_selesai_kerja"
            value="{{ old('jam_selesai_kerja') }}"></input>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label id="narahubung" for="inputAddress"></label>
        <input type="text" class="form-control" id="inputAddress" placeholder="" name="narahubung"
            value="{{ old('narahubung') }}"></input>
    </div>
    <div class="form-group col-md-6">
        <label for="inputAddress">Telepon</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="" name="telepon_pembimbing"
            value="{{ old('telepon_pembimbing') }}"></input>
    </div>
</div>