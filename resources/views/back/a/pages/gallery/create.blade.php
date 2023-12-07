@extends('back.a.layouts.app')
@push('after-style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropzone@5.9.2/dist/dropzone.css"
    integrity="sha256-6X2vamB3vs1zAJefAme/aHhUeJl13mYKs3VKpIGmcV4=" crossorigin="anonymous">
@endpush
@section('content')
<div class="content">
    <div class="container-fluid">
        {{ Breadcrumbs::render('gallery') }}
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="green">
                        <i class="material-icons">collections</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Form Tambah Data</h4>

                        {{Form::open(['route' => 'gallery.store','method' => 'post', 'files' => 'true', ''])}}
                        <div class="form-group">
                            <label class="control-label">Tanggal Upload</label>
                            {{Form::text('upload_date', null,['class' => 'form-control datepicker'])}}
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">Deskripsi</label>
                            {{Form::text('description', null,['class' => 'form-control'])}}
                        </div>
                        <!-- Example of a form that Dropzone can take over -->
                        <div class="dropzone" id="my-awesome-dropzone"></div>
                        <div class="d-flex text-right">
                            <a href="{{ route('gallery.index') }}" class="btn btn-default btn-fill">Cancel</a>
                            <button type="submit" class="btn btn-success btn-fill">Insert</button>
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
<script src="https://cdn.jsdelivr.net/npm/dropzone@5.9.2/dist/dropzone.js"
    integrity="sha256-IXyEnLo8FpsoOLrRzJlVYymqpY29qqsMHUD2Ah/ttwQ=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function () {
        demo.initFormExtendedDatetimepickers();
    });
</script>
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
                var files =
                    {!! json_encode($project -> document)!!
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