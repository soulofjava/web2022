@extends('back.a.layouts.app')
@push('after-style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropzone@5.9.2/dist/dropzone.css"
    integrity="sha256-6X2vamB3vs1zAJefAme/aHhUeJl13mYKs3VKpIGmcV4=" crossorigin="anonymous">
<style>
    .dz-image img {
        width: 100%;
        height: 100%;
    }
</style>
@endpush
@section('content')
<div class="content">
    <div class="container-fluid">
        {{ Breadcrumbs::render('news') }}
        <div class="row">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="green">
                    <i class="material-icons">event_note</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Form Edit News</h4>
                    {{Form::model($data, ['route' => ['news.update', $data->id],'method' => 'put', 'files' =>
                    'true', ''])}}

                    <input type="text" value="{{ $data->id }}" id="malika" hidden>
                    <input type="text" value="{{ $data->dip }}" id="bbb" hidden>

                    <div class="dropzone" id="my-awesome-dropzone"></div>

                    <div class="form-group">
                        <label class="control-label">Kategori</label>
                        {{Form::select('tag', $categori, null, ['class' => 'form-control
                        js-example-basic-multiple',
                        'name' => 'tag[]',
                        'multiple' => 'multiple',
                        ])}}
                        @error('tag') <span class="text-danger">Tidak boleh kosong</span> @enderror
                    </div>

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

                    <div class="form-group label-floating">
                        <label class="control-label">Description</label>
                        {{Form::textarea('description', null,['class' => 'form-control','id'=>'my-editor'])}}
                    </div>
                    @error('description')
                    <div class="error text-danger">Tidak Boleh Kosong</div>
                    @enderror

                    <div class="togglebutton" style="margin-bottom: 15px;">
                        <label>
                            Publish? {{ Form::checkbox('publish', '1', null, ['class' => '']) }}
                        </label>
                    </div>

                    <div class="d-flex text-right">
                        <a href="{{ route('news.index') }}" class="btn btn-default btn-fill">Cancel</a>
                        <button type="submit" class="btn btn-success btn-fill">Update</button>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('after-script')
<script src="https://cdn.jsdelivr.net/npm/dropzone@5.9.2/dist/dropzone.js"
    integrity="sha256-IXyEnLo8FpsoOLrRzJlVYymqpY29qqsMHUD2Ah/ttwQ=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function () {
        demo.initFormExtendedDatetimepickers();

        let a = document.getElementById('bbb').value;
        console.log(a);
        if (a == 1) {
            $(".dropzone").hide();
            $(".jip").show();
            $(".dip").show();
        }

        $("#hideButton").click(function () {
            if ($(this).is(":checked")) {
                $(".dropzone").hide();
                $(".jip").show();
                $(".dip").show();
            } else {
                $(".dropzone").show();
                $(".jip").hide();
                $(".dip").hide();
            }
        });
    });

    var uploadedDocumentMap = {};
    let token = $("meta[name='csrf-token']").attr("content");

    Dropzone.autoDiscover = false;
    $(".dropzone").dropzone({

        url: `{{ route('file_image.store') }}`,
        // maxFilesize: 2, // MB
        addRemoveLinks: true,
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        success: function (file, response) {
            $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
            uploadedDocumentMap[file.name] = response.name
            uploadedDocumentMap[file.path] = response.path
        },
        removedfile: function (file) {
            file.previewElement.remove()
            var name = '';
            var path = '';
            if (typeof file.file_name !== 'undefined') {
                name = file.file_name;
            } else {
                name = uploadedDocumentMap[file.name];
                path = uploadedDocumentMap[file.path];
            }

            // console.log(file.name);

            $('form').find('input[name="document[]"][value="' + name + '"]').remove();

            $.ajax({
                url: `/admin/file_image/${name}`,
                type: "DELETE",
                cache: false,
                data: {
                    "_token": token
                },
                success: function (response) {
                    console.log(response);
                }
            });
        },
        init: function () {
            myDropzone = this;
            let id_ku = document.getElementById('malika').value;

            this.on("removedfile", function (file) {
                alert("Delete this file?");
                $.ajax({
                    url: '/admin/file_image/' + file.name,
                    type: "DELETE",
                    data: {
                        "_token": token
                    },
                    // data: { 'filetodelete': file.name }
                });
            });

            $.ajax({
                url: `/admin/file_image/${id_ku}`,
                type: 'get',
                // data: { request: 'fetch' },
                dataType: 'json',
                success: function (response) {
                    $.each(response, function (key, value) {
                        var mockFile = { name: value.name, size: value.size };

                        myDropzone.emit("addedfile", mockFile);
                        myDropzone.emit("thumbnail", mockFile, value.path);
                        myDropzone.emit("complete", mockFile);

                    });

                }
            });

            @if (isset($project) && $project -> document)
                var files = {!! json_encode($project -> document)!!
        }
                    for(var i in files) {
        var file = files[i]
        this.options.addedfile.call(this, file)
        file.previewElement.classList.add('dz-complete')
        $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
    }
    @endif
            }
    });
</script>
<!-- ck editor -->
<script src="{{asset('assets/back/assets/ckeditor/ckeditor.js')}}"></script>
<script>
    var konten = document.getElementById("my-editor");
    var options = {
        filebrowserImageBrowseUrl: '/file-manager/ckeditor',

    };
    CKEDITOR.replace(konten, options);
    CKEDITOR.config.allowedContent = true;
</script>
<!-- end ck editor -->
@endpush