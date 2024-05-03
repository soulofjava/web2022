<input type="text" value="{{ $data->id ?? '' }}" id="malika" hidden>
<div class="dropzone" id="my-awesome-dropzone"></div>
<div class="form-group label-floating">
    <label class="control-label">Judul Postingan</label>
    {{Form::text('title', null,['class' => 'form-control'])}}
</div>
<div class="form-group">
    <label class="control-label">Tanggal</label>
    {{Form::text('date', null,['class' => 'form-control datepicker'])}}
</div>
<div class="form-group">
    <label class="control-label">Deskripsi</label>
    {{Form::textarea('description', null,['class' => 'my-editor form-control','id'=>'my-editor'])}}
</div>
<div class="d-flex text-right">
    <a href="{{ route('news.index') }}" class="btn btn-default btn-fill">Kembali</a>
    <button type="submit" class="btn btn-success btn-fill">Simpan</button>
</div>