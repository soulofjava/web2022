<div class="row">
    <div class="form-group">
        <label for="defaultFormControlInput" class="form-label">Nama Kategori</label>
        {{Form::text('name', null,['class' => 'form-control',
        'placeholder'=>'Masukkan Nama Kategori'])}}
    </div>
    @error('name')
    <div id="defaultFormControlHelp" class="form-text" style="color: red;">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="mt-3">
    <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
    <button type="submit" class="btn btn-primary">Simpan</button>
</div>