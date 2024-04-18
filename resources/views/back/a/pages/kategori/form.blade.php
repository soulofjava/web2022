<div class="form-group label-floating">
    <label class="control-label">Nama Kategori</label>
    {{Form::text('name', null,['class' => 'form-control'])}}
</div>
@error('name')
<div class="error text-danger">Tidak Boleh Kosong</div>
@enderror

<div class="d-flex text-right">
    <a href="{{ route('kategori.index') }}" class="btn btn-default btn-fill">Batal</a>
    <button type="submit" class="btn btn-success btn-fill">Simpan</button>
</div>