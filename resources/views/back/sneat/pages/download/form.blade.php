<div class="row">
    <!-- Example of a form that Dropzone can take over -->
    <div class="dropzone" id="my-awesome-dropzone"></div>
</div>

<div class="row">
    <div class="form-group">
        <label for="defaultFormControlInput" class="form-label">Nama File</label>
        {{Form::text('judul', null,['class' => 'form-control',
        'placeholder'=>'Masukkan Nama File'])}}
    </div>
    @error('judul')
    <div id="defaultFormControlHelp" class="form-text" style="color: red;">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="mt-3">
    <a href="{{ route('download.index') }}" class="btn btn-secondary">Kembali</a>
    <button type="submit" class="btn btn-primary">Simpan</button>
</div>