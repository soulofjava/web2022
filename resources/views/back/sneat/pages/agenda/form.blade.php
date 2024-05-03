<div class="row">

    <div class="form-group col-sm-12 col-md-6">
        <label for="defaultFormControlInput" class="form-label">Nama Kegiatan</label>
        {{Form::text('title', null, ['class' => 'form-control'. ($errors->has('title') ? ' is-invalid' :
        null),
        'placeholder' => 'Upacara Hardiknas'])}}
        @error('title')
        <div id="defaultFormControlHelp" class="form-text" style="color: red;">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group col-sm-12 col-md-6">
        <label for="defaultFormControlInput" class="form-label">Lokasi Kegiatan</label>
        {{Form::text('location', null, ['class' =>
        'form-control' . ($errors->has('location') ? ' is-invalid' : null),
        'placeholder' => 'Alun - Alun'])}}
        @error('location')
        <div id="defaultFormControlHelp" class="form-text" style="color: red;">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group col-sm-12 col-md-6">
        <label for="defaultFormControlInput" class="form-label">Tanggal Kegiatan</label>
        {{Form::text('date', null, ['class' =>
        'form-control flatpickr-date' . ($errors->has('date') ? ' is-invalid' : null),
        'placeholder' => 'Pilih Tanggal'])}}
        @error('date')
        <div id="defaultFormControlHelp" class="form-text" style="color: red;">
            {{ $message }}
        </div>
        @enderror
    </div>

</div>

<div class="mt-3">
    <a href="{{ route('event.index') }}" class="btn btn-secondary">Kembali</a>
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