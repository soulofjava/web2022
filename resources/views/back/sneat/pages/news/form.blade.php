<div class="row">
    <div class="togglebutton" style="margin-bottom: 15px;">
        <label class="form-check-label">
            Data DIP? <input type="checkbox" id="hideButton" name="datadip" class="form-check-input" {{ $data->dip ?? ''
            ? 'checked' : '' }}>
        </label>
    </div>
</div>

<div class="row mb-3">
    <div class="form-group">
        <!-- Example of a form that Dropzone can take over -->
        <div class="dropzone" id="my-awesome-dropzone"></div>
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-12 col-md-6">
        <label for="defaultFormControlInput" class="form-label">Jenis Informasi Publik</label>
        {{Form::select('kategori', get_code_group('INFORMASI_ST'), null, ['class' =>
        'form-control select2','placeholder' => 'Silahkan Pilih'])}}
    </div>

    <div class="form-group col-sm-12 col-md-6 mb-3">
        <label for="defaultFormControlInput" class="form-label">Tahun Daftar Informasi Publik</label>
        {{Form::number('dip_tahun', null, ['class' =>
        'form-control','placeholder' => 'Masukkan Tahun'])}}
    </div>
    <div class="form-group col-sm-12 col-md-12 mb-3">
        <label for="defaultFormControlInput" class="form-label">Kategori</label>
        {{Form::select('tag', $categori, $categorinya ?? [], ['class' => 'form-control select2',
        'placeholder' => 'Silahkan Pilih Kategori'])}}
        @error('tag')
        <div id="defaultFormControlHelp" class="form-text" style="color: red;">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group col-sm-12 col-md-12 mb-3">
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

<div class="row mb-3">
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

<div class="row mb-3">
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

<div class="row mt-3">
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
@push('after-script')
<script>
    $(document).ready(function () {

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
            } else {
                $(".dropzone").show();
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

<script type="text/javascript">
    var uploadedDocumentMap = {};
    let token = $("meta[name='csrf-token']").attr("content");

    Dropzone.autoDiscover = false;
    $(".dropzone").dropzone({

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
<!-- End DropZone -->

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