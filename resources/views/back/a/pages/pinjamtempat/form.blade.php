<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Nama Peminjam</label>
            {{Form::text('nama', null,['class' => 'form-control','readonly'])}}
        </div>
        @error('nama')
        <div class="error text-danger">Tidak Boleh Kosong</div>
        @enderror
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Instansi</label>
            {{Form::text('instansi', null,['class' => 'form-control','readonly'])}}
        </div>
        @error('instansi')
        <div class="error text-danger">Tidak Boleh Kosong</div>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Jenis Acara</label>
            {{Form::text('acara', null,['class' => 'form-control','readonly'])}}
        </div>
        @error('acara')
        <div class="error text-danger">Tidak Boleh Kosong</div>
        @enderror
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Nama Kegiatan</label>
            {{Form::text('kegiatan', null,['class' => 'form-control','readonly'])}}
        </div>
        @error('kegiatan')
        <div class="error text-danger">Tidak Boleh Kosong</div>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Tanggal</label>
            {{Form::text('tanggal', null,['class' => 'form-control','readonly'])}}
        </div>
        @error('tanggal')
        <div class="error text-danger">Tidak Boleh Kosong</div>
        @enderror
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Waktu</label>
            {{Form::text('waktu', null,['class' => 'form-control','readonly'])}}
        </div>
        @error('waktu')
        <div class="error text-danger">Tidak Boleh Kosong</div>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Jumlah Peserta</label>
            {{Form::text('jumlah', null,['class' => 'form-control','readonly'])}}
        </div>
        @error('jumlah')
        <div class="error text-danger">Tidak Boleh Kosong</div>
        @enderror
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Kontak Person</label>
            {{Form::text('kontak', null,['class' => 'form-control','readonly'])}}
        </div>
        @error('kontak')
        <div class="error text-danger">Tidak Boleh Kosong</div>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Alamat Email</label>
            {{Form::text('email', null,['class' => 'form-control','readonly'])}}
        </div>
        @error('email')
        <div class="error text-danger">Tidak Boleh Kosong</div>
        @enderror
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Status Pengajuan</label>
            {{Form::select('status', get_code_group('STATUS_ST'), $data->status, ['class' => 'form-control'])}}
        </div>
        @error('status')
        <div class="error text-danger">Tidak Boleh Kosong</div>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Catatan</label>
            {{Form::text('catatan', null, ['class' => 'form-control'])}}
        </div>
        @error('catatan')
        <div class="error text-danger">Tidak Boleh Kosong</div>
        @enderror
    </div>
</div>

<div class="row">
    <div class="d-flex text-right">
        <a href="{{ route('pinjamtempat.index') }}" class="btn btn-default btn-fill">Batal</a>
        <button type="submit" class="btn btn-success btn-fill">Simpan</button>
    </div>
</div>