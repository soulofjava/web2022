<div class="row">
    <div class="form-group col-sm-12 col-md-6">
        <label for="defaultFormControlInput" class="form-label">Kategori</label>
        {{Form::text('name', null, ['class' => 'form-control'. ($errors->has('name') ? '
        is-invalid' :
        null),
        'placeholder' => 'Masukkan Kategori'])}}
        @error('name')
        <div id="defaultFormControlHelp" class="form-text" style="color: red;">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="mt-3">
    <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
    <button type="submit" class="btn btn-primary">Simpan</button>
</div>