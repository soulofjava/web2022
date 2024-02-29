@extends('back.layouts.app')
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">Pengguna</a>
            </li>
            <li class="breadcrumb-item active">Data</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            @if ($message = Session::get('success'))
            <div id="elementId" hidden>{{ $message }}</div>
            @endif
            <h4 class="card-title">Form Tambah Data</h4>
            <div class="card-content">
                {{Form::model($data, ['route' => ['myprofile.update', $data->id],'method' => 'put', 'files' =>
                'true', ''])}}

                @role('superadmin')
                <div class="form-group label-floating is-focused">
                    <label class="control-label">Role</label>
                    {{ Form::select('role', $role, $user_role, ['class' => 'form-control',
                    'placeholder' => 'Select Role']); }}
                </div>
                <div class="form-group label-floating is-focused">
                    <label class="control-label">Permission</label>
                    {{ Form::select('permission', $permission, null, ['class' => 'form-control',
                    'placeholder' => 'Select Permission']); }}
                </div>
                @endrole

                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        @if($data->profile_photo_path)
                        <img src="{{ asset('storage') }}/{{ $data->profile_photo_path }}" alt="profile picture">
                        @else
                        <img src="{{ asset('assets/back/sneat/assets/img/avatars/1.png') }}" alt="user-avatar"
                            class="d-block rounded" height="100" width="100" id="uploadedAvatar">
                        @endif
                        <div class="button-wrapper">
                            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                <span class="d-none d-sm-block">Upload new photo</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input name="profile_photo_path" type="file" id="upload" class="account-file-input"
                                    hidden="" accept="image/png, image/jpeg">
                            </label>
                            <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                <i class="bx bx-reset d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Reset</span>
                            </button>

                            <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="form-group col-sm-12 col-md-6">
                        <label for="defaultFormControlInput" class="form-label">Nama</label>
                        {{Form::text('name', null, ['class' => 'form-control',
                        'placeholder' => 'Jono'])}}
                    </div>
                    @error('name')
                    <div id="defaultFormControlHelp" class="form-text" style="color: red;">
                        {{ $message }}
                    </div>
                    @enderror

                    <div class="form-group col-sm-12 col-md-6">
                        <label for="defaultFormControlInput" class="form-label">Nomor Telp</label>
                        {{Form::text('user_phone', null, ['class' =>
                        'form-control','placeholder' => '0286'])}}
                    </div>
                    @error('user_phone')
                    <div id="defaultFormControlHelp" class="form-text" style="color: red;">
                        {{ $message }}
                    </div>
                    @enderror

                    <div class="form-group col-sm-12 col-md-6">
                        <label for="defaultFormControlInput" class="form-label">Email</label>
                        {{Form::text('email', null, ['class' =>
                        'form-control','placeholder' => 'admin@admin.com'])}}
                    </div>
                    @error('email')
                    <div id="defaultFormControlHelp" class="form-text" style="color: red;">
                        {{ $message }}
                    </div>
                    @enderror

                    <div class="form-group col-sm-12 col-md-6">
                        <label for="defaultFormControlInput" class="form-label">Sandi Lama</label>
                        {{Form::password('current_password', ['class' =>
                        'form-control','placeholder' => '********'])}}
                    </div>
                    @error('current_password')
                    <div id="defaultFormControlHelp" class="form-text" style="color: red;">
                        {{ $message }}
                    </div>
                    @enderror

                    <div class="form-group col-sm-12 col-md-6">
                        <label for="defaultFormControlInput" class="form-label">Sandi Baru</label>
                        {{Form::password('new_password', ['class' =>
                        'form-control','placeholder' => '********'])}}
                    </div>
                    @error('new_password')
                    <div id="defaultFormControlHelp" class="form-text" style="color: red;">
                        {{ $message }}
                    </div>
                    @enderror

                    <div class="form-group col-sm-12 col-md-6">
                        <label for="defaultFormControlInput" class="form-label">Konfirmasi Sandi Baru</label>
                        {{Form::password('new_confirm_password', ['class' =>
                        'form-control','placeholder' => '********'])}}
                    </div>
                    @error('new_confirm_password')
                    <div id="defaultFormControlHelp" class="form-text" style="color: red;">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

                <div class="mt-3">
                    <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>
<!-- / Content -->
@endsection
@push('after-script')
<script>
    $(document).ready(function () {
        if ($('#elementId').length > 0) {
            const pesan = document.getElementById('elementId').innerText;
            console.log(pesan);
            Swal.fire(
                'OK!',
                'Data berhasil disimpan.',
                'success'
            )
        }
    });
</script>
@endpush