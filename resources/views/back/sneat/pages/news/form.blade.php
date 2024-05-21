<div class="row">
    <div class="togglebutton" style="margin-bottom: 15px;">
        <label class="form-check-label">
            Data DIP? <input type="checkbox" id="hideButton" name="datadip" class="form-check-input" {{ $data->dip ?? ''
            ?
            'checked' : '' }}>
        </label>
    </div>
</div>

<div class="row">
    <div class="form-group">
        <!-- Example of a form that Dropzone can take over -->
        <div class="dropzone" id="my-awesome-dropzone"></div>
    </div>
</div>

<div class="row">
    <div class="form-group col mt-1">
        <label for="defaultFormControlInput" class="form-label">Kategori</label>
        {{Form::select('tag', $kategorinya, null, ['class' =>
        'form-control select2'. ($errors->has('tag') ? ' is-invalid' :
        null),'placeholder' => 'Silahkan Pilih'])}}
        @error('tag')
        <div id="defaultFormControlHelp" class="form-text" style="color: red;">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="row">
    <div class="form-group jip col-lg-12 col-sm-12 col-md-6" style="display: none;">
        <label for="defaultFormControlInput" class="form-label">Jenis Informasi Publik</label>
        {{Form::select('kategori', get_code_group('INFORMASI_ST'), null, ['class' =>
        'form-control select2','placeholder' => 'Silahkan Pilih'])}}
    </div>

    <div class="form-group col-sm-12 col-md-6 dip" style="display: none;">
        <label for="defaultFormControlInput" class="form-label">Tahun Daftar Informasi Publik</label>
        {{Form::number('dip_tahun', null, ['class' =>
        'form-control','placeholder' => 'Masukkan Tahun'])}}
    </div>
    <div class="form-group col-sm-12 col-md-12">
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

<div class="row">
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

<div class="row">
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

<div class="row mt-2">
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