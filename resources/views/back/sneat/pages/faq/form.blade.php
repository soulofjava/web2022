<div class="row">

    <div class="form-group col-sm-12 col-md-6">
        <label for="defaultFormControlInput" class="form-label">Pertanyaan</label>
        {{Form::text('pertanyaan', null, ['class' => 'form-control'. ($errors->has('pertanyaan') ? ' is-invalid' :
        null),
        'placeholder' => 'Dimana lokasi kantor Dinsos'])}}
        @error('pertanyaan')
        <div id="defaultFormControlHelp" class="form-text" style="color: red;">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group col-sm-12 col-md-6">
        <label for="defaultFormControlInput" class="form-label">Jawaban</label>
        {{Form::text('jawaban', null, ['class' => 'form-control'. ($errors->has('jawaban') ? ' is-invalid' :
        null),
        'placeholder' => 'Jalan Sabuk Alu'])}}
        @error('jawaban')
        <div id="defaultFormControlHelp" class="form-text" style="color: red;">
            {{ $message }}
        </div>
        @enderror
    </div>

</div>

<div class="mt-3">
    <a href="{{ route('faq.index') }}" class="btn btn-secondary">Kembali</a>
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