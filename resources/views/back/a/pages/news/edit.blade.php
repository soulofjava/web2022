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
<main class="content-wrapper">
    <div class="mdc-card">
        <h6 class="card-title">Form Edit</h6>
        <div class="template-demo">
            <div class="row">
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card">
                    <div class="card-content">
                        {{Form::model($data, ['route' => ['news.update', $data->id],'method' => 'put', 'files' =>
                        'true', ''])}}

                        <input type="text" value="{{ $data->id }}" id="malika" hidden>

                        <div class="dropzone" id="my-awesome-dropzone"></div>

                        <div class="mdc-text-field mdc-text-field--outlined">
                            {{Form::text('title', null,['class' => 'mdc-text-field__input'])}}
                            <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch" style="">
                                    <label for="text-field-hero-input" class="mdc-floating-label" style="">Judul</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
                        </div>
                        
                        <div class="mdc-text-field mdc-text-field--outlined mb-3">
                            {{Form::date('date', null,['class' => 'mdc-text-field__input'])}}
                            <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch" style="">
                                    <label for="text-field-hero-input" class="mdc-floating-label" style="">Tanggal</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
                        </div>
                        {{Form::textarea('description', null,['class' => 'my-editor
                        form-control','id'=>'my-editor'])}}
                        <div class="mt-3">
                            <a href="{{ route('news.index') }}"
                                style="--mdc-ripple-fg-size: 41px; --mdc-ripple-fg-scale: 2.158690755272023; --mdc-ripple-fg-translate-start: 8.3828125px, -0.375px; --mdc-ripple-fg-translate-end: 14.3828125px, -2.5px;"
                                class="mdc-button mdc-button--unelevated shaped-button filled-button--light mdc-ripple-upgraded">Batal</a>
                            <button type="submit"
                                class="mdc-button mdc-button--unelevated shaped-button mdc-ripple-upgraded"
                                style="--mdc-ripple-fg-size: 57px; --mdc-ripple-fg-scale: 1.9677611127891828; --mdc-ripple-fg-translate-start: 22.6953125px, -16.828125px; --mdc-ripple-fg-translate-end: 19.3046875px, -10.5px;">
                                Ubah
                            </button>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@push('after-script')
<script src="https://cdn.jsdelivr.net/npm/dropzone@5.9.2/dist/dropzone.js"
    integrity="sha256-IXyEnLo8FpsoOLrRzJlVYymqpY29qqsMHUD2Ah/ttwQ=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function () {
        demo.initFormExtendedDatetimepickers();
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