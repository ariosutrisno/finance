<input type="hidden" value="{{ $data_dompet->idx_buku_kas }}" name="idx_buku_kas" id="id_kas">
<input type="hidden" value="{{ $data_dompet->idx_catatan_buku }}" name="idx_kas" id="id_catatan_buku">
<input type="hidden" value="{{ $data_dompet->idx_kategori }}" name="idx_kategori">
<input type="hidden" value="{{ $data_dompet->catatan_jumlah  }}" name="catatan_jumlah_lama">
<div class="form-group">
    <label for="jam" class="col-form-label">Jam :</label>
    <input type="time" class="form-control" id="jam" name="catatan_jam" value="{{ 
        $data_dompet->catatan_jam,
        Carbon\Carbon::now('Asia/Jakarta')->locale('id')->format('H:i') }}">
</div>
<div class="form-group">
    <label for="tanggal" class="col-form-label">Tanggal :</label>
    <input type="date" class="form-control" id="tanggal" name="catatan_tgl"
        value="{{ $data_dompet->catatan_tgl, Carbon\Carbon::now()->format('Y-m-d') }}"></input>
</div>


<div class="form-group">
    <label for="rupiah" class="col-form-label">Nominal :</label>
    <input type="text" min="0" placeholder="0" class="form-control" id="rupiah" value="{{ $data_dompet->catatan_jumlah  }}" name="catatan_jumlah">
</div>

</div>
    <div class="form-group">
        <label for="kategori" class="col-form-label">Kategori :</label>
        <input type="hidden" value="{{ $data_dompet->idx_kategori }}" name="idx_kategori">
        <Select class="form-control" name="idx_sub_kategori">
            <option value="{{ $data_dompet->idx_sub_kategori }}">---</option>
            @foreach ($model_sub_kategori as $kat)
                @if ($kat->idx_kategori)
                    <option value="{{ $kat->idx_sub_kat }}">{{ $kat->sub_nama }}</option>
                @endif
            @endforeach
        </Select>
    </div>
    <div class="form-group">
        <label for="keterangan" class="col-form-label">Keterangan :</label>
        <textarea class="form-control" id="Keterangan" name="catatan_keterangan"
            value="{{ $data_dompet->catatan_keterangan }}">{{ $data_dompet->catatan_keterangan }}</textarea>
    </div>
    <script>
        /*================================ NOMINAL ====================================*/
        var rupiah = document.getElementById('rupiah');
		rupiah.addEventListener('keyup', function(e){
            console.log(this.value)
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value, ' ');
		});
 
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? ' ' + rupiah : '');
		}
        /*================================ END NOMINAL ====================================*/
    </script>
