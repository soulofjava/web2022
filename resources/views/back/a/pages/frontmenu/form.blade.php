<div class="form-group label-floating">
    <label class="control-label">Menu Parent</label>
    {{ Form::select('menu_parent', $root, $data->menu_parent ?? '',
    ['class' => 'cari form-control']) }}
</div>
<div class="form-group label-floating">
    <label class="control-label">Menu Name</label>
    {{Form::text('menu_name', null,['class' => 'form-control', 'id' => 'title'])}}
</div>
<div class="form-group">
    <label class="control-label">Content</label>
    {{Form::textarea('content', null,['class' => 'my-editor form-control','id'=>'my-editor'])}}
</div>
<div class="d-flex text-right">
    <a href="{{ route('frontmenu.index') }}" class="btn btn-default btn-fill">Kembali</a>
    <button type="submit" class="btn btn-success btn-fill">Simpan</button>
</div>