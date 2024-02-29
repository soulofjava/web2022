@extends('back.layouts.app')
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
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">Postingan</a>
            </li>
            <li class="breadcrumb-item active">Data</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Form Tambah Data</h4>
            <div class="card-content">
                {{Form::open(['route' => 'news.store','method' => 'post', 'files' => 'true', ''])}}

                <div class="row">
                    <div class="togglebutton" style="margin-bottom: 15px;">
                        <label class="form-check-label">
                            Data DIP? <input type="checkbox" id="hideButton" name="datadip" class="form-check-input">
                        </label>
                    </div>
                </div>

                <div class="row">
                    <!-- Example of a form that Dropzone can take over -->
                    <div class="dropzone" id="my-awesome-dropzone"></div>
                </div>

                <div class="row">
                    <div class="form-group jip col-sm-12 col-md-6" style="display: none;">
                        <label for="defaultFormControlInput" class="form-label">Jenis Informasi Publik</label>
                        {{Form::select('kategori', get_code_group('INFORMASI_ST'), null, ['class' =>
                        'form-control select2','placeholder' => 'Silahkan Pilih'])}}
                    </div>

                    <div class="form-group col-sm-12 col-md-6 dip" style="display: none;">
                        <label for="defaultFormControlInput" class="form-label">Tahun Daftar Informasi Publik</label>
                        {{Form::number('dip_tahun', null, ['class' =>
                        'form-control','placeholder' => 'Masukkan Tahun'])}}
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label for="defaultFormControlInput" class="form-label">Tanggal</label>
                        {{Form::text('date', null, ['class' => 'form-control flatpickr-date',
                        'placeholder' => 'Silahkan Pilih Tanggal'])}}
                        @error('date')
                        <div id="defaultFormControlHelp" class="form-text" style="color: red;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                </div>

                <div class="row">
                    <div class="form-group">
                        <label for="defaultFormControlInput" class="form-label">Judul Postingan</label>
                        {{Form::text('title', null,['class' => 'form-control',
                        'placeholder'=>'Masukkan Judul Postingan'])}}
                    </div>
                    @error('title')
                    <div id="defaultFormControlHelp" class="form-text" style="color: red;">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="row">
                    <div class="form-group label">
                        <label for="defaultFormControlInput" class="form-label">Deskripsi</label>
                        {{Form::textarea('content', null,['class' => 'my-editor form-control','id'=>'my-editor'])}}
                    </div>
                    @error('content')
                    <div id="defaultFormControlHelp" class="form-text" style="color: red;">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="row mt-2">
                    <div class="col col-sm-12 col-md-4">
                        <div class="form-group">
                            <div class="form-check form-switch">
                                {{Form::checkbox('komentar', '1', null,['class' => 'form-check-input',
                                'id'=>'flexSwitchCheckDefault'])}}
                                <label class="form-check-label" for="flexSwitchCheckDefault">
                                    Komentar
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col col-sm-12 col-md-4">
                        <div class="form-group">
                            <div class="form-check form-switch">
                                {{Form::checkbox('terbit', '1',null,['class' => 'form-check-input',
                                'id'=>'flexSwitchCheckDefault'])}}
                                <label class="form-check-label" for="flexSwitchCheckDefault">
                                    Publish
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col col-sm-12 col-md-4">
                        <div class="form-group">
                            <div class="form-check form-switch">
                                {{Form::checkbox('highlight', '1', null,['class' => 'form-check-input',
                                'id'=>'flexSwitchCheckDefault'])}}
                                <label class="form-check-label" for="flexSwitchCheckDefault">
                                    Highlight
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <a href="{{ route('news.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>
<!-- / Content -->

@endsection
@push('after-script')
<script>
    $(document).ready(function () {

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

    $(".select2").select2();

    var flatpickrDate = document.querySelector(".flatpickr-date");
    var flatpickrDate2 = document.querySelector(".flatpickr-date2");

    flatpickrDate.flatpickr({
        monthSelectorType: "static",
    });

    flatpickrDate2.flatpickr({
        monthSelectorType: "static",
    });
</script>

<!-- Start DropZone -->
<script src="https://cdn.jsdelivr.net/npm/dropzone@5.9.2/dist/dropzone.js"
    integrity="sha256-IXyEnLo8FpsoOLrRzJlVYymqpY29qqsMHUD2Ah/ttwQ=" crossorigin="anonymous"></script>

<script>
    var uploadedDocumentMap = {}
    let token = $("meta[name='csrf-token']").attr("content");
    Dropzone.options.myAwesomeDropzone = {

        url: `{{ route('file_image.store') }}`,
        acceptedFiles: 'image/*',
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
                success: function (response) {
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
        init: function () {
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
    }
</script>
<!-- End DropZone -->

<!-- ck editor -->
<script src="{{asset('assets/back/material/ckeditor/ckeditor.js')}}"></script>
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