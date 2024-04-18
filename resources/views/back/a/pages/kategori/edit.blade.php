@extends('back.a.layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        {{ Breadcrumbs::render('kategori') }}
        <div class="row">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="green">
                    <i class="material-icons">categori</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Form Tambah Data</h4>
                    {{Form::model($data, ['route' => ['kategori.update', $data->id],'method' => 'put', ''])}}
                   
                    @include('back.a.pages.kategori.form')

                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection