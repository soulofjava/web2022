@extends('back.sneat.layouts.app')
@push('after-style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropzone@5.9.2/dist/dropzone.css"
    integrity="sha256-6X2vamB3vs1zAJefAme/aHhUeJl13mYKs3VKpIGmcV4=" crossorigin="anonymous">
<style>
    .dz-image img {
        width: 100%;
        height: 100%;
    }
</style>
@endpush
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">Postingan</a>
            </li>
            <li class="breadcrumb-item active">Data</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Form Ubah Data</h4>
            <div class="card-content">
                {{Form::model($data, ['route' => ['news.update', $data->id],'method' => 'put', 'files' =>
                'true', ''])}}
                <input type="text" value="{{ $data->id }}" id="malika" hidden>
                <input type="text" value="{{ $data->dip }}" id="bbb" hidden>
                @include('back.sneat.pages.news.form')
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>
<!-- / Content -->

@endsection