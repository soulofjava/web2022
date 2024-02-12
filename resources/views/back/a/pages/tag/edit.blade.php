@extends('back.a.layouts.app')
@push('after-style')
@endpush
@section('content')
<div class="content">
    <div class="container-fluid">
        {{ Breadcrumbs::render('news') }}
        <div class="row">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="green">
                    <i class="material-icons">event_note</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Form Edit Data</h4>
                    {{Form::model($data, ['route' => ['tags.update', $data->id],'method' => 'put'])}}

                    <div class="form-group">
                        <label class="control-label">Nama Kategori</label>
                        {{Form::text('name', null,['class' => 'form-control'])}}
                    </div>
                    @error('name')
                    <div class="error text-danger">Tidak Boleh Kosong</div>
                    @enderror

                    <div class="d-flex text-right">
                        <a href="{{ route('tags.index') }}" class="btn btn-default btn-fill">Kembali</a>
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