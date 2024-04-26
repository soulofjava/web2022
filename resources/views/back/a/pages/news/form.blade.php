<div class="togglebutton" style="margin-bottom: 15px;">
    <label>
        Data DIP? <input name="datadip" type="checkbox" id="hideButton" {{ $data->dip ?? 0 ? 'checked' :
        '' }}>
    </label>
</div>

<div class="dropzone" id="my-awesome-dropzone"></div>

<div class="form-group label-floating jip" style="display: none;">
    <label class="control-label">Jenis Informasi Publik</label>
    {{Form::select('kategori', get_code_group('INFORMASI_ST'), null, ['class' =>
    'form-control','placeholder' => ''])}}
</div>

<div class="form-group label-floating dip" style="display: none;">
    <label class="control-label">Tahun Daftar Informasi Publik</label>
    {{Form::number('dip_tahun', null, ['class' =>
    'form-control','placeholder' => ''])}}
</div>

<div class="form-group label-floating">
    <label class="control-label">Judul Postingan</label>
    {{Form::text('title', null,['class' => 'form-control'])}}
</div>
@error('title')
<div class="error text-danger">Tidak Boleh Kosong</div>
@enderror

<div class="form-group">
    <label class="control-label">Tanggal</label>
    {{Form::text('date', null,['class' => 'form-control datepicker'])}}
</div>
@error('date')
<div class="error text-danger">Tidak Boleh Kosong</div>
@enderror

<div class="form-group">
    <label class="control-label">Kategori</label>
    {{Form::select('tag', $categori, $categorinya ?? [],['class' => 'form-control','placeholder' => 'Silahkan Pilih Kategori'])}}
</div>
@error('tag')
<div class="error text-danger">Tidak Boleh Kosong</div>
@enderror

<div class="form-group">
    <label class="control-label">Description</label>
    {{Form::textarea('description', null,['class' => 'form-control','id'=>'my-editor'])}}
</div>
@error('description')
<div class="error text-danger">Tidak Boleh Kosong</div>
@enderror

<div class="d-flex text-right">
    <a href="{{ route('news.index') }}" class="btn btn-default btn-fill">Batal</a>
    <button type="submit" class="btn btn-success btn-fill">Simpan</button>
</div>