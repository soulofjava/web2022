<div class="form-group label-floating">
    <label class="control-label">Nama Kegiatan</label>
    {{Form::text('title', null,['class' => 'form-control'])}}
</div>
<div class="form-group">
    <label class="control-label">Tanggal Kegiatan Date</label>
    {{Form::text('date', null,['class' => 'form-control datepicker'])}}
</div>
<div class="form-group label-floating">
    <label class="control-label">Lokasi Kegiatan</label>
    {{Form::text('location', null,['class' => 'form-control'])}}
</div>
<div class="d-flex text-right">
    <a href="{{ route('event.index') }}" class="btn btn-default btn-fill">Kembali</a>
    <button type="submit" class="btn btn-success btn-fill">Simpan</button>
</div>