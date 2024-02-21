@extends('back.sneat.layouts.app')
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">Kategori</a>
            </li>
            <li class="breadcrumb-item active">Data</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Form Ubah Data</h4>
            <div class="card-content">
                {{Form::model($data, ['route' => 'kategori.store','method' => 'post', ''])}}
                @include('back.sneat.pages.kategori.form')
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>
<!-- / Content -->
@endsection
@push('after-script')
@endpush