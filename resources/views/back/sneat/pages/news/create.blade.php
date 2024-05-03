@extends('back.sneat.layouts.app')
@push('after-style')
<link rel="stylesheet" href="{{ asset('assets/back/sneat/assets/css/dropzone.min.css') }}">
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
            <h4 class="card-title">Form Tambah Data</h4>
            <div class="card-content">
                {{Form::open(['route' => 'news.store','method' => 'post', 'files' => 'true', ''])}}
                @include('back.sneat.pages.news.form')
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>
<!-- / Content -->

@endsection