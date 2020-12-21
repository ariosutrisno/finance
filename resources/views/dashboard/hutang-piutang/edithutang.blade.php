<input type="hidden" value="{{ $hutang->idx_hutang }}" name="idx_hutang" id="id_data">
<input type="hidden" value="{{ $hutang->user_id }}" name="user_id">
<input type="hidden" value="1" name="idx_kategori">
<input type="hidden" value="{{ $hutang->hutang_nominal }}" name="hutang_nominal_lama">
<div class="form-group">
    <label for="client" class="col-form-label">Client :</label>
    <input type="hidden" name="idx_hutang" value="{{ $hutang->idx_hutang }}" id="idx_hutang">
    <input type="txt" class="form-control" id="client" name="hutang_client" value="{{ $hutang->hutang_client}}">
</div>
<div class="form-group">
    <label for="tgl" class="col-form-label">Tanggal :</label>
    <input type="date" class="form-control" id="tanggal" name="hutang_tanggal"value="{{ $hutang->hutang_tanggal,Carbon\Carbon::now()->format('Y-m-d') }}"></input>
    <input type='checkbox' class="mt-3" data-toggle='collapse' data-target='#tempo'> Jatuh Tempo</input>

</div>
<div id='tempo' class='collapse div1'>
    <div class="form-group">
        <label for="tempo" class="col-form-label">Jatuh Tempo :</label>
        <input type="date" class="form-control" id="tempo" name="hutang_jatuh"value="{{ $hutang->hutang_jatuh,Carbon\Carbon::now()->format('Y-m-d') }}"></input>
    </div>
</div>
<div class="form-group">
    <label for="deskripsi" class="col-form-label">Deskripsi :</label>
    <textarea class="form-control" id="deskripsi" name="hutang_deskripsi" value="{{ $hutang->hutang_deskripsi }}">{{ $hutang->hutang_deskripsi }}</textarea>
</div>
<div class="form-group">
    <label for="nominal" class="col-form-label">Nominal :</label>
    <input type="text" placeholder="0" class="form-control" onkeyup="changevalue()"
    id="rupiah"  value="{{ $hutang->hutang_nominal }}" name="hutang_nominal">
    <input type="text" keyup="changevalue()" placeholder="0" class="form-control"
    id="rupiah" value="{{ $hutang->hutang_nominal }}" hidden readonly>
</div>
{{-- CATAT SEBAGAI PEMASUKAN --}}
<div class="form-group">
    <label>Catat sebagai Pemasukan di Buku Kas ?</label>
    <select class="custom-select col-sm-3" style="color: black" id="selectON" name="selectedBuku"
        onchange="onSelect()">
        <option value="0">Tidak</option>
        <option value="1">Ya</option>
    </select>
    {{-- END --}}
</div>
<div id="pemasukan" style="display: none;">
    <div class="form-group">
        <label for="nominal" class="col-form-label">Buku Kas :</label>
            <Select class="form-control"  name="idx_buku_kas">
                <option value="">Pilih Buku Kas</option>
            @foreach ($tbl_buku_kas as $buku_kas)
                <option value="{{ $buku_kas->idx_buku_kas }}">{{ ucwords($buku_kas->buku_nama) }}</option>
            @endforeach
            </Select>
    </div>
    <div class="form-group">
        <label for="nominal" class="col-form-label">Kategori</label>
        <Select class="form-control" name="idx_sub_kategori">
            <option value="">---</option>
            @foreach ($model_sub_kategori as $kat)
            @if ($kat->idx_kategori == 1)
                <option value="{{ $kat->idx_sub_kat }}">{{ $kat->sub_nama }}</option>
            @endif
            @endforeach
        </Select>
    </div>
</div>
<script>
/* FUNGSI COLLAPSE CATATAN PEMASUKAN HUTANG */
function onSelect() {
    var kategori = document.getElementById("selectON");
    var option_data = kategori.options[kategori.selectedIndex].value;
    if (option_data == '0') {
        var label = document.getElementById("pemasukan").setAttribute("style", "display: none;");
    } else {
        var label = document.getElementById("pemasukan").setAttribute("style", "display: block;");
    }
}

</script>