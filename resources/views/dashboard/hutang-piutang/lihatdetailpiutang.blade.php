<input type="hidden" value="{{ $piutang->idx_piutang}}" name="idx_piutang" id="idx_piutang">
<div class="form-group">
    <label for="client" class="col-form-label">Client :</label>
    <input type="txt" class="form-control" id="client" name="piutang_client" value="{{ $piutang->piutang_client}}" readonly>
</div>
<div class="form-group">
    <label for="tgl" class="col-form-label">Tanggal :</label>
    <input type="date" class="form-control" id="tanggal" name="piutang_tanggal"value="{{ $piutang->piutang_tanggal,Carbon\Carbon::now()->format('Y-m-d') }}" readonly></input>
    <input type='checkbox' class="mt-3" data-toggle='collapse' data-target='#tempo'> Jatuh Tempo</input>

</div>
<div id='tempo' class='collapse div1'>
    <div class="form-group">
        <label for="tempo" class="col-form-label">Jatuh Tempo :</label>
        <input type="date" class="form-control" id="tempo" name="piutang_jatuh" value="{{ $piutang->piutang_jatuh,Carbon\Carbon::now()->format('Y-m-d') }}" readonly></input>
    </div>
</div>
<div class="form-group">
    <label for="deskripsi" class="col-form-label">Deskripsi :</label>
    <textarea class="form-control" onKeyUp="changevalue()" id="deskripsi" name="piutang_deskripsi" value="{{ $piutang->piutang_deskripsi }}" readonly>{{ $piutang->piutang_deskripsi }}</textarea>
</div>
<div class="form-group">
    <label for="nominal" class="col-form-label">Nominal :</label>
    <input type="text" min="0" onKeyUp="changevalue()" placeholder="0" class="form-control" id="piutang_nominal" value="{{ $piutang->piutang_nominal }}" readonly></input>
    <input type="text" min="0" placeholder="0" class="form-control" id="piutang_Nominal1" name="piutang_nominal" value="{{ $piutang->piutang_nominal }}" hidden readonly></input>
</div>