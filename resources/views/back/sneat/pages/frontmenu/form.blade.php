<div class="row">
    <div class="togglebutton" style="margin-bottom: 15px;">
        <label class="form-check-label">
            <input type="text" value="{{ $data->link ?? '' }}" id="bbb" hidden>
            Hanya Link? <input type="checkbox" id="hideButton" name="acb" class="form-check-input" {{ $data->link ?? '' ?
            'checked' : '' }}>
        </label>
    </div>
</div>

<div class="row">

    <div class="form-group col-sm-12 col-md-6">
        <label for="defaultFormControlInput" class="form-label">Menu</label>
        {{Form::select('menu_parent', $root, null, ['class' =>
        'form-control select2'. ($errors->has('menu_parent') ? ' is-invalid' :
        null),'placeholder' => 'Silahkan Pilih'])}}
        @error('menu_parent')
        <div id="defaultFormControlHelp" class="form-text" style="color: red;">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group col-sm-12 col-md-6">
        <label for="defaultFormControlInput" class="form-label">Nama Sub Menu</label>
        {{Form::text('menu_name', null, ['class' => 'form-control'. ($errors->has('menu_name') ? '
        is-invalid' :
        null),
        'placeholder' => 'Masukkan Nama Sub Menu'])}}
        @error('menu_name')
        <div id="defaultFormControlHelp" class="form-text" style="color: red;">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group url col-sm-12 col-md-6" style="display: none;">
        <label for="defaultFormControlInput" class="form-label">URL Menu</label>
        {{Form::text('menu_url', null, ['class' => 'form-control'. ($errors->has('menu_url') ? '
        is-invalid' :
        null),
        'placeholder' => 'Masukkan URL Menu'])}}
        @error('menu_url')
        <div id="defaultFormControlHelp" class="form-text" style="color: red;">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group jip col-sm-12 col-md-6">
        <label for="defaultFormControlInput" class="form-label">Jenis Informasi Publik</label>
        {{Form::select('kategori', get_code_group('INFORMASI_ST'), null, ['class' =>
        'form-control'. ($errors->has('name') ? ' is-invalid' :
        null),'placeholder' => 'Silahkan Pilih'])}}
    </div>

    <div class="form-group konten col-12">
        <label for="defaultFormControlInput" class="form-label">Konten / Isi</label>
        {{Form::textarea('content', null,['class' => 'my-editor form-control'. ($errors->has('content')
        ? '
        is-invalid' :
        null),'id'=>'my-editor'])}}
        @error('content')
        <div id="defaultFormControlHelp" class="form-text" style="color: red;">
            {{ $message }}
        </div>
        @enderror
    </div>

</div>

<div class="mt-3">
    <a href="{{ route('frontmenu.index') }}" class="btn btn-secondary">Kembali</a>
    <button type="submit" class="btn btn-primary">Simpan</button>
</div>