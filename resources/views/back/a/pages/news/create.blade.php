@extends('back.a.layouts.app')
@push('after-style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropzone@5.9.2/dist/dropzone.css"
    integrity="sha256-6X2vamB3vs1zAJefAme/aHhUeJl13mYKs3VKpIGmcV4=" crossorigin="anonymous">
@endpush
@section('content')
<main class="content-wrapper">
    <div class="mdc-card">
        <h6 class="card-title">Edit Postingan</h6>
        <div class="template-demo">
            <div class="row">
                <div class="card">
                    <div class="card-content">
                        {{Form::open(['route' => 'news.store','method' => 'post', 'files' => 'true', ''])}}

                        <div class="dropzone" id="my-awesome-dropzone"></div>

                        <div class="mdc-text-field mdc-text-field--outlined">
                            {{Form::text('title', null,['class' => 'mdc-text-field__input'])}}
                            <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label for="text-field-hero-input" class="mdc-floating-label">Judul</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
                        </div>
                        @if($errors->has('title'))
                        <p class="mdc-typography mdc-theme--secondary">Kolom harus diisi.</p>
                        @endif

                        <div class="mdc-text-field mdc-text-field--outlined mb-3">
                            {{Form::date('date', null,['class' => 'mdc-text-field__input'])}}
                            <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label for="text-field-hero-input" class="mdc-floating-label">Tanggal</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
                        </div>
                        @if($errors->has('date'))
                        <p class="mdc-typography mdc-theme--secondary">Kolom harus diisi.</p>
                        @endif

                        {{Form::textarea('description', null,['class' => 'my-editor
                        form-control','id'=>'my-editor'])}}
                        @if($errors->has('description'))
                        <p class="mdc-typography mdc-theme--secondary">Kolom harus diisi.</p>
                        @endif

                        <div class="text-right mt-3">
                            <a href="{{ route('news.index') }}"
                                class="mdc-button mdc-button--unelevated shaped-button filled-button--light mdc-ripple-upgraded">Batal</a>
                            <button type="submit"
                                class="mdc-button mdc-button--unelevated shaped-button mdc-ripple-upgraded">
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
@endpush