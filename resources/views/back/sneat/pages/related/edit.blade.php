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
                <a href="#">Link Terkait</a>
            </li>
            <li class="breadcrumb-item active">Data</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Form Tambah Data</h4>
            <div class="card-content">
                {{Form::model($data, ['route' => ['relatedlink.update', $data->id],'method' => 'put', 'files' => 'true',
                ''])}}
                @include('back.sneat.pages.related.form')
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>
<!-- / Content -->
@endsection