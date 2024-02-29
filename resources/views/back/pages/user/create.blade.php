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
            <h4 class="card-title">Form Tambah Data</h4>
            <div class="card-content">
                {{Form::open(['route' => 'user.store','method' => 'post', 'files' => 'true', ''])}}
                
                @role('superadmin')
                <div class="form-group label-floating is-focused">
                    <label class="control-label">Role</label>
                    {{ Form::select('role', $role, null, ['class' => 'form-control',
                    'placeholder' => 'Select Role']); }}
                </div>
                <div class="form-group label-floating is-focused">
                    <label class="control-label">Permission</label>
                    {{ Form::select('permission', $permission, null, ['class' => 'form-control',
                    'placeholder' => 'Select Permission']); }}
                </div>
                @endrole

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
                        <label for="defaultFormControlInput" class="form-label">Sandi</label>
                        {{Form::password('password', ['class' =>
                        'form-control','placeholder' => '********'])}}
                    </div>
                    @error('password')
                    <div id="defaultFormControlHelp" class="form-text" style="color: red;">
                        {{ $message }}
                    </div>
                    @enderror

                    <div class="form-group col-sm-12 col-md-6">
                        <label for="defaultFormControlInput" class="form-label">Konfirmasi Sandi</label>
                        {{Form::password('password_confirmation', ['class' =>
                        'form-control','placeholder' => '********'])}}
                    </div>
                    @error('password_confirmation')
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
