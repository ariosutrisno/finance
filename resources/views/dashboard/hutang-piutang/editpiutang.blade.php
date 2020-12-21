<input type="hidden" value="{{ $piutang->idx_piutang}}" name="idx_piutang" id="idx_piutang">
<input type="hidden" value="{{ $piutang->user_id }}" name="user_id">
<input type="hidden" value="2" name="idx_kategori">
<input type="hidden" value="{{ $piutang->piutang_nominal }}" name="piutang_nominal_lama">
<div class="form-group">
    <label for="client" class="col-form-label">Client :</label>
    <input type="txt" class="form-control" id="client" name="piutang_client" value="{{ $piutang->piutang_client}}">
</div>
<div class="form-group">
    <label for="tgl" class="col-form-label">Tanggal :</label>
    <input type="date" class="form-control" id="tanggal" name="piutang_tanggal"value="{{ $piutang->piutang_tanggal,Carbon\Carbon::now()->format('Y-m-d') }}"></input>
    <input type='checkbox' class="mt-3" data-toggle='collapse' data-target='#tempo'> Jatuh Tempo</input>

</div>
<div id='tempo' class='collapse div1'>
    <div class="form-group">
        <label for="tempo" class="col-form-label">Jatuh Tempo :</label>
        <input type="date" class="form-control" id="tempo" name="piutang_jatuh" value="{{ $piutang->piutang_jatuh,Carbon\Carbon::now()->format('Y-m-d') }}"></input>
    </div>
</div>
<div class="form-group">
    <label for="deskripsi" class="col-form-label">Deskripsi :</label>
    <textarea class="form-control" onKeyUp="changevalue()" id="deskripsi" name="piutang_deskripsi" value="{{ $piutang->piutang_deskripsi }}">{{ $piutang->piutang_deskripsi }}</textarea>
</div>

<div class="form-group">
    <label for="nominal" class="col-form-label">Nominal :</label>
    {{-- <input type="text" class="form-control" id="piutang1" onkeyup="changevalue()" value="{{ $piutang->piutang_nominal }}" name="piutang_nominal"> --}}
    <input type="text" class="form-control" name="piutang_nominal" id="piutang2" value="{{ $piutang->piutang_nominal }}" >
</div>

{{-- CATAT SEBAGAI PENGELUARAN --}}
<div class="form-group">
    <label>Catat sebagai Pengeluaran di Buku Kas ?</label>
    <select class="custom-select col-sm-3" style="color: black" id="selectON" onchange="onSelect();" name="selectedBuku">
        <option value="0">Tidak</option>
        <option value="1">Ya</option>
    </select>
</div>
{{-- END --}}

<div id="pengeluaran1" style="display: none;" >
    <div class="form-group">
        <label for="nominal" class="col-form-label">Buku Kas :</label>
            <Select class="form-control"  name="idx_buku_kas">
                <option value="">Pilih Buku Kas</option>
            @foreach ($tbl_buku_kas as $buku_kas)
            <option value="{{ $buku_kas->idx_buku_kas }}">{{ ucwords($buku_kas->buku_nama) }}</ option>
            @endforeach
            </Select>
    </div>

    <div class="form-group">
        <label for="nominal" class="col-form-label">Kategori</label>
        <Select class="form-control" name="idx_sub_kategori">
            <option value="">---</option>
            @foreach ($model_sub_kategori as $kat)
                <option value="{{ $kat->idx_sub_kat }}">{{ $kat->sub_nama }}</option>
                
            @endforeach
        </Select>
    </div>
</div>
<script>
/* FUNGSI COLLAPSE CATATAN  PENGELUARAN PIUTANG */
function onSelect() {
    var kategori = document.getElementById("selectON");
    var option_data = kategori.options[kategori.selectedIndex].value;
    if (option_data == '0') {
        var label = document.getElementById("pengeluaran1").setAttribute("style", "display: none;");
    } else {
        var label = document.getElementById("pengeluaran1").setAttribute("style", "display: block;");
    }
}
/* END */

// var rupiah = document.getElementById('piutang1');
//         rupiah.addEventListener('keyup', function(e) {
//             // tambahkan 'Rp.' pada saat form di ketik
//             // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
//             rupiah.value = formatRupiah(this.value, ' ');
//         });

//         /* Fungsi formatRupiah */
//         function formatRupiah(angka, prefix) {
//             var number_string = angka.replace(/[^,\d]/g, '').toString(),
//                 split = number_string.split(','),
//                 sisa = split[0].length % 3,
//                 rupiah = split[0].substr(0, sisa),
//                 ribuan = split[0].substr(sisa).match(/\d{3}/gi);

//             // tambahkan titik jika yang di input sudah menjadi angka ribuan
//             if (ribuan) {
//                 separator = sisa ? '.' : '';
//                 rupiah += separator + ribuan.join('.');
//             }

//             rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
//             return prefix == undefined ? rupiah : (rupiah ? ' ' + rupiah : '');
//         }

//         function changevalue() {
//             var rupiah = document.getElementById('piutang1').value;
//             var rupiahchange = rupiah.split(".").join("").split(" ").join("");
//             document.getElementById('piutang2').value = rupiahchange;

//         }
    
</script>