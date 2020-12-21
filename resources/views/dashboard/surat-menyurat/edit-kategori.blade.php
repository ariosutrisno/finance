<input type="hidden" value="{{ $edit_kategori->idx_sub_kat }}" name="idx_sub_kat" id="idx_sub_kat">
<input type="hidden" value="{{ $edit_kategori->idx_kategori }}" name="idx_kategori">
<input type="text" class="form-control" name="kategori" value="{{ $edit_kategori->sub_nama }}" />
<script>
    // TAG INPUT JQUERY
    $('input[name="kategori"]').amsifySuggestags();
    $('input[name="kategori"]').amsifySuggestags();

</script>
