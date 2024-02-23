@extends('back.material.layouts.app')
@push('after-style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropzone@5.9.2/dist/dropzone.css"
        integrity="sha256-6X2vamB3vs1zAJefAme/aHhUeJl13mYKs3VKpIGmcV4=" crossorigin="anonymous">
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
                        <h4 class="card-title">Form Tambah Data</h4>
                        {{ Form::open(['route' => 'news.store', 'method' => 'post', 'files' => 'true', '']) }}
                        <div class="togglebutton" style="margin-bottom: 15px;">
                            <label>
                                Data DIP? <input name="datadip" type="checkbox" id="hideButton">
                            </label>
                        </div>
                        <!-- Example of a form that Dropzone can take over -->
                        <div class="dropzone" id="my-awesome-dropzone"></div>

                        <div class="form-group label-floating jip" style="display: none;">
                            <label class="control-label">Jenis Informasi Publik</label>
                            {{ Form::select('kategori', get_code_group('INFORMASI_ST'), null, [
                                'class' => 'form-control',
                                'placeholder' => '',
                            ]) }}
                        </div>
                        <div class="form-group label-floating dip" style="display: none;">
                            <label class="control-label">Tahun Daftar Informasi Publik</label>
                            {{ Form::number('dip_tahun', null, ['class' => 'form-control', 'placeholder' => '']) }}
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">Judul Postingan</label>
                            {{ Form::text('title', null, ['class' => 'form-control']) }}
                        </div>
                        @error('title')
                            <div class="error text-danger">Tidak Boleh Kosong</div>
                        @enderror
                        <div class="form-group">
                            <label class="control-label">Tanggal</label>
                            {{ Form::text('date', null, ['class' => 'form-control datepicker']) }}
                        </div>
                        @error('date')
                            <div class="error text-danger">Tidak Boleh Kosong</div>
                        @enderror
                        <div class="form-group label">
                            <label class="control-label">Deskripsi</label>
                            {{ Form::textarea('description', null, ['class' => 'my-editor form-control', 'id' => 'my-editor']) }}
                        </div>
                        @error('description')
                            <div class="error text-danger">Tidak Boleh Kosong</div>
                        @enderror
                        <div class="d-flex text-right">
                            <a href="{{ route('news.index') }}" class="btn btn-default btn-fill">Kembali</a>
                            <button type="submit" class="btn btn-success btn-fill">Simpan</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('after-script')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();

            $("#hideButton").click(function() {
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
    </script>
    <script src="https://cdn.jsdelivr.net/npm/dropzone@5.9.2/dist/dropzone.js"
        integrity="sha256-IXyEnLo8FpsoOLrRzJlVYymqpY29qqsMHUD2Ah/ttwQ=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            demo.initFormExtendedDatetimepickers();
        });
    </script>

    <!-- ck editor -->
    <script src="{{ asset('assets/back/material/ckeditor/ckeditor.js') }}"></script>
    <script>
        var konten = document.getElementById("my-editor");
        var options = {
            filebrowserImageBrowseUrl: '/file-manager/ckeditor',

        };
        CKEDITOR.replace(konten, options);
        CKEDITOR.config.allowedContent = true;
    </script>
    <!-- end ck editor -->

    <script>
        var uploadedDocumentMap = {}
        let token = $("meta[name='csrf-token']").attr("content");
        Dropzone.options.myAwesomeDropzone = {

            url: `{{ route('file_image.store') }}`,
            // maxFilesize: 2, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(file, response) {
                $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
                uploadedDocumentMap[file.name] = response.name
                uploadedDocumentMap[file.path] = response.path
            },
            removedfile: function(file) {
                file.previewElement.remove()
                var name = ''
                var path = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedDocumentMap[file.name]
                    path = uploadedDocumentMap[file.path]
                }
                $('form').find('input[name="document[]"][value="' + name + '"]').remove();

                // alert(name);
                console.log(path);
                console.log(name);
                $.ajax({
                    url: `/admin/file_image/${name}`,
                    type: "DELETE",
                    cache: false,
                    data: {
                        "_token": token
                    },
                    success: function(response) {
                        console.log(response);
                        //show success message
                        // Swal.fire({
                        //     type: 'success',
                        //     icon: 'success',
                        //     title: `${response.message}`,
                        //     showConfirmButton: false,
                        //     timer: 3000
                        // });

                        //remove post on table
                        // $(`#index_${post_id}`).remove();
                    }
                });
            },
            init: function() {
                @if (isset($project) && $project->document)
                    var files = {
                        !!json_encode($project - > document) !!
                    }
                    for (var i in files) {
                        var file = files[i]
                        this.options.addedfile.call(this, file)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
                    }
                @endif
            }
        }
    </script>
@endpush
