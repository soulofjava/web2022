<div class="row">

    <div class="form-group col-sm-12 col-md-6">
        <label for="defaultFormControlInput" class="form-label">Nama File</label>
        {{Form::text('judul', null, ['class' => 'form-control'. ($errors->has('judul') ? ' is-invalid' :
        null),
        'placeholder' => 'Materi Pelatihan 2024'])}}
        @error('judul')
        <div id="defaultFormControlHelp" class="form-text" style="color: red;">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group col-sm-12 col-md-6">
        <label for="defaultFormControlInput" class="form-label">File</label>
        {{ Form::file('file', ['class' => 'form-control' . ($errors->has('file') ? ' is-invalid' : ''), 'id' =>
        'formFile',
        'placeholder' => 'Pilih File']) }}
        @error('file')
        <div id="defaultFormControlHelp" class="form-text" style="color: red;">
            {{ $message }}
        </div>
        @enderror
    </div>

</div>

<div class="mt-3">
    <a href="{{ route('download.index') }}" class="btn btn-secondary">Kembali</a>
    <button type="submit" class="btn btn-primary">Simpan</button>
</div>
@push('after-script')
<script>

    var flatpickrDate = document.querySelector(".flatpickr-date");

    flatpickrDate.flatpickr({
        monthSelectorType: "static",
    });

</script>
@endpush