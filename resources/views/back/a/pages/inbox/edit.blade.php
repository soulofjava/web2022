@extends('back.a.layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        {{ Breadcrumbs::render('inbox') }}
        <div class="row">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="green">
                    <i class="material-icons">event_note</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Form Edit News</h4>
                    {{Form::model($data, ['route' => ['inbox.update', $data->id],'method' => 'put', 'files' =>
                    'true', ''])}}
                    <div class="form-group label-floating">
                        <label class="control-label">Tanggal Pesan</label>
                        {{Form::text('date', old('date'),['class' => 'form-control','disabled' => 'disabled'])}}
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">Nama</label>
                        {{Form::text('name', old('name'),['class' => 'form-control','disabled' => 'disabled'])}}
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">No Telpn</label>
                        {{Form::text('phone', old('phone'),['class' => 'form-control','disabled' => 'disabled'])}}
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">Email</label>
                        {{Form::text('email', old('email'),['class' => 'form-control','disabled' => 'disabled'])}}
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">Pesan</label>
                        {{Form::text('message', old('message'),['class' => 'form-control','disabled' => 'disabled'])}}
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">Balasan</label>
                        {{Form::textarea('balasan', null,['class' => 'form-control','required'])}}
                        @if($errors->has('balasan'))
                        <div class="error text-danger">{{ $errors->first('balasan') }}</div>
                        @endif
                    </div>
                    <div class="d-flex text-right">
                        <a href="{{ route('inbox.index') }}" class="btn btn-default btn-fill">Cancel</a>
                        <button type="submit" class="btn btn-success btn-fill">Update</button>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection