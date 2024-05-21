<div class="row">

    <div class="form-group col-sm-12 col-md-6">
        <label for="defaultFormControlInput" class="form-label">Foto</label>
        <div class="d-flex align-items-start align-items-sm-center gap-4">
            @if($data->path_foto ?? '')
            <img src="{{ route('helper.show-picture', ['path' => $data->path_foto]) }}" alt="user-avatar"
                class="d-block rounded" height="100" width="100" id="uploadedAvatar">
            @else
            <img src="{{ asset('assets/back/material/img/image_placeholder.jpg') }}" alt="user-avatar"
                class="d-block rounded" height="100" width="100" id="uploadedAvatar">
            @endif
            <div class="button-wrapper">
                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                    <span class="d-none d-sm-block">Upload new photo</span>
                    <i class="bx bx-upload d-block d-sm-none"></i>
                    <input type="file" id="upload" name="foto" class="account-file-input" hidden=""
                        accept="image/png, image/jpeg">
                </label>
                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                    <i class="bx bx-reset d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Reset</span>
                </button>

                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
            </div>
        </div>
        @error('foto')
        <div id="defaultFormControlHelp" class="form-text" style="color: red;">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group col-sm-12 col-md-6">
        <label for="defaultFormControlInput" class="form-label">Nama</label>
        {{Form::text('nama', null, ['class' => 'form-control'. ($errors->has('nama') ? ' is-invalid' :
        null),
        'placeholder' => 'Pangeran Diponegoro'])}}
        @error('nama')
        <div id="defaultFormControlHelp" class="form-text" style="color: red;">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group col-sm-12 col-md-6">
        <label for="defaultFormControlInput" class="form-label">Jabatan</label>
        {{Form::text('jabatan', null, ['class' =>
        'form-control' . ($errors->has('jabatan') ? ' is-invalid' : null),
        'placeholder' => 'Pahlawan RI'])}}
        @error('jabatan')
        <div id="defaultFormControlHelp" class="form-text" style="color: red;">
            {{ $message }}
        </div>
        @enderror
    </div>

</div>

<div class="mt-3">
    <a href="{{ route('personil.index') }}" class="btn btn-secondary">Kembali</a>
    <button type="submit" class="btn btn-primary">Simpan</button>
</div>