@extends('back.a.layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        {{ Breadcrumbs::render('menu') }}
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="green">
                        <i class="material-icons">menu</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Form Edit Menu / Submenu</h4>
                        {{Form::model($data, ['route' => ['frontmenu.update', $data->id],'method' => 'put', 'files' =>
                        'true', ''])}}
                        <div class="form-group label-floating">
                            <label class="control-label">Menu Parent</label>
                            {{ Form::select('menu_parent', $root, $data->menu_parent,
                            ['class' => 'cari form-control']) }}
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">Menu Name</label>
                            {{Form::text('menu_name', null,['class' => 'form-control', 'id' => 'title'])}}
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">Content</label>
                            {{Form::textarea('content', null,['class' => 'my-editor form-control'])}}
                        </div>
                        <div class="d-flex text-right">
                            <a href="{{ route('frontmenu.index') }}" class="btn btn-default btn-fill">Cancel</a>
                            <button type="submit" class="btn btn-success btn-fill">Update</button>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('after-script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
    $('.cari').select2({
        placeholder: 'Cari...',
        ajax: {
            url: '/cari',
            dataType: 'json',
            delay: 250,
            option: 'selected',
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.menu_name,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });
</script>
<!-- ck editor -->
<script src="{{asset('assets/back/assets/ckeditor/ckeditor.js')}}"></script>
<script>
    var konten = document.getElementById("my-editor");
    var options = {
        filebrowserImageBrowseUrl: '/filemanager?type=Images',
        filebrowserImageUploadUrl: '/filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/filemanager?type=Files',
        filebrowserUploadUrl: '/filemanager/upload?type=Files&_token='
    };
    CKEDITOR.replace(konten, options);
    CKEDITOR.config.allowedContent = true;
</script>
<!-- end ck editor -->
@endpush