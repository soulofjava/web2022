<div class="row">

    <div class="form-group col-sm-12 col-md-6">
        <label for="defaultFormControlInput" class="form-label">Nama Peminjam</label>
        {{Form::text('nama', null, ['class' => 'form-control'. ($errors->has('nama') ? ' is-invalid' :
        null),
        'placeholder' => 'Upacara Hardiknas','readonly'])}}
        @error('nama')
        <div id="defaultFormControlHelp" class="form-text" style="color: red;">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group col-sm-12 col-md-6">
        <label for="defaultFormControlInput" class="form-label">Instansi</label>
        {{Form::text('instansi', null, ['class' =>
        'form-control' . ($errors->has('instansi') ? ' is-invalid' : null),
        'placeholder' => 'Alun - Alun','readonly'])}}
        @error('instansi')
        <div id="defaultFormControlHelp" class="form-text" style="color: red;">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group col-sm-12 col-md-6">
        <label for="defaultFormControlInput" class="form-label">Jenis Acara</label>
        {{Form::text('acara', null, ['class' =>
        'form-control' . ($errors->has('acara') ? ' is-invalid' : null),
        'placeholder' => 'Alun - Alun','readonly'])}}
        @error('acara')
        <div id="defaultFormControlHelp" class="form-text" style="color: red;">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group col-sm-12 col-md-6">
        <label for="defaultFormControlInput" class="form-label">Nama Kegiatan</label>
        {{Form::text('kegiatan', null, ['class' =>
        'form-control' . ($errors->has('kegiatan') ? ' is-invalid' : null),
        'placeholder' => 'Alun - Alun','readonly'])}}
        @error('kegiatan')
        <div id="defaultFormControlHelp" class="form-text" style="color: red;">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group col-sm-12 col-md-6">
        <label for="defaultFormControlInput" class="form-label">Tanggal</label>
        {{Form::text('tanggal', null, ['class' =>
        'form-control' . ($errors->has('tanggal') ? ' is-invalid' : null),
        'placeholder' => 'Alun - Alun','readonly'])}}
        @error('tanggal')
        <div id="defaultFormControlHelp" class="form-text" style="color: red;">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group col-sm-12 col-md-6">
        <label for="defaultFormControlInput" class="form-label">Waktu</label>
        {{Form::text('waktu', null, ['class' =>
        'form-control' . ($errors->has('waktu') ? ' is-invalid' : null),
        'placeholder' => 'Alun - Alun','readonly'])}}
        @error('waktu')
        <div id="defaultFormControlHelp" class="form-text" style="color: red;">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group col-sm-12 col-md-6">
        <label for="defaultFormControlInput" class="form-label">Jumlah Peserta</label>
        {{Form::text('jumlah', null, ['class' =>
        'form-control' . ($errors->has('jumlah') ? ' is-invalid' : null),
        'placeholder' => 'Alun - Alun','readonly'])}}
        @error('jumlah')
        <div id="defaultFormControlHelp" class="form-text" style="color: red;">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group col-sm-12 col-md-6">
        <label for="defaultFormControlInput" class="form-label">Kontak Person</label>
        {{Form::text('kontak', null, ['class' =>
        'form-control' . ($errors->has('kontak') ? ' is-invalid' : null),
        'placeholder' => 'Alun - Alun','readonly'])}}
        @error('kontak')
        <div id="defaultFormControlHelp" class="form-text" style="color: red;">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group col-sm-12 col-md-6">
        <label for="defaultFormControlInput" class="form-label">Alamat Email</label>
        {{Form::text('email', null, ['class' =>
        'form-control' . ($errors->has('email') ? ' is-invalid' : null),
        'placeholder' => 'Alun - Alun','readonly'])}}
        @error('email')
        <div id="defaultFormControlHelp" class="form-text" style="color: red;">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group col-sm-12 col-md-6">
        <label for="defaultFormControlInput" class="form-label">Status Pengajuan</label>
        {{Form::select('status', get_code_group('STATUS_ST'), $data->status, ['class' => 'form-control'.
        ($errors->has('status') ? ' is-invalid' : null)])}}
        @error('status')
        <div id="defaultFormControlHelp" class="form-text" style="color: red;">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group col-sm-12 col-md-6">
        <label for="defaultFormControlInput" class="form-label">Catatan</label>
        {{Form::text('catatan', null, ['class' =>
        'form-control' . ($errors->has('catatan') ? ' is-invalid' : null),
        'placeholder' => 'Alun - Alun'])}}
        @error('catatan')
        <div id="defaultFormControlHelp" class="form-text" style="color: red;">
            {{ $message }}
        </div>
        @enderror
    </div>

</div>

<div class="mt-3">
    <a href="{{ route('pinjamtempat.index') }}" class="btn btn-secondary">Kembali</a>
    <button type="submit" class="btn btn-primary">Simpan</button>
</div>