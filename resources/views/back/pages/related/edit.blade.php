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
                <a href="#">Link Terkait</a>
            </li>
            <li class="breadcrumb-item active">Data</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Form Tambah Data</h4>
            <div class="card-content">
                {{Form::model($data, ['route' => ['relatedlink.update', $data->id],'method' => 'put', ''])}}

                <div class="row">

                    <div class="form-group col-sm-12 col-md-6">
                        <label for="defaultFormControlInput" class="form-label">Nama Link Terkait</label>
                        {{Form::text('name', null, ['class' => 'form-control'. ($errors->has('name') ? ' is-invalid' :
                        null),
                        'placeholder' => 'Masukkan Nama Link Terkait'])}}
                        @error('name')
                        <div id="defaultFormControlHelp" class="form-text" style="color: red;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group col-sm-12 col-md-6">
                        <label for="defaultFormControlInput" class="form-label">URL Link Terkait</label>
                        {{Form::text('url', null, ['class' =>
                        'form-control'. ($errors->has('url') ? ' is-invalid' :
                        null),'placeholder' => 'Masukkan URL Link Terkait'])}}
                        @error('url')
                        <div id="defaultFormControlHelp" class="form-text" style="color: red;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                </div>

                <div class="mt-3">
                    <a href="{{ route('relatedlink.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>
<!-- / Content -->
@endsection