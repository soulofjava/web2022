@extends('back.a.layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        {{ Breadcrumbs::render('download') }}
        <div class="row">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="green">
                    <i class="material-icons">event_note</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Form Edit Data</h4>
                    {{Form::model($data, ['route' => ['download.update', $data->id],'method' => 'put', 'files' =>
                    'true', ''])}}

                    <div class="form-group">
                        <label class="control-label">Nama File</label>
                        {{Form::text('judul', null,['class' => 'form-control',
                        'placeholder'=>'Materi Bimtek 2023'])}}
                    </div>
                    @error('judul')
                    <div class="error text-danger">Tidak Boleh Kosong</div>
                    @enderror

                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file">
                        </div>
                    </div>
                    @error('file')
                    <div class="error text-danger">Tidak Boleh Kosong</div>
                    @enderror

                    <div class="d-flex text-right">
                        <a href="{{ route('download.index') }}" class="btn btn-default btn-fill">Kembali</a>
                        <button type="submit" class="btn btn-success btn-fill">Simpan</button>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('after-script')
@endpush
