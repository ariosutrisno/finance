<input type="hidden" value="{{ $hutang->idx_hutang }}" name="idx_hutang" id="id_data">
<div class="form-group">
    <label for="client" class="col-form-label">Client :</label>
    <input type="hidden" name="idx_hutang" value="{{ $hutang->idx_hutang }}" id="idx_hutang">
    <input type="txt" class="form-control" id="client" name="hutang_client" value="{{ $hutang->hutang_client}}" readonly>
</div>
<div class="form-group">
    <label for="tgl" class="col-form-label">Tanggal :</label>
    <input type="date" class="form-control" id="tanggal" name="hutang_tanggal"value="{{ $hutang->hutang_tanggal,Carbon\Carbon::now()->format('Y-m-d') }}" readonly></input>
    <input type='checkbox' class="mt-3" data-toggle='collapse' data-target='#tempo'> Jatuh Tempo</input>

</div>
<div id='tempo' class='collapse div1'>
    <div class="form-group">
        <label for="tempo" class="col-form-label">Jatuh Tempo :</label>
        <input type="date" class="form-control" id="tempo" name="jatuh_tempo" value="{{ $hutang->hutang_jatuh,Carbon\Carbon::now()->format('Y-m-d') }}" readonly></input>
    </div>
</div>
<div class="form-group">
    <label for="deskripsi" class="col-form-label">Deskripsi :</label>
    <textarea class="form-control" onKeyUp="changevalue()" id="deskripsi" name="hutang_deskripsi" value="{{ $hutang->hutang_deskripsi }}" readonly>{{ $hutang->hutang_deskripsi }}</textarea>
</div>
<div class="form-group">
    <label for="nominal" class="col-form-label">Nominal :</label>
    <input type="text" min="0" onKeyUp="changevalue()" placeholder="0" class="form-control"
                                    id="hutang_Nominal" value="{{ $hutang->hutang_nominal }}" readonly></input>
    <input type="text" min="0" placeholder="0" class="form-control" id="hutang_Nominal1"
                                    name="hutang_nominal" value="{{ $hutang->hutang_nominal }}" hidden readonly></input>
</div>
