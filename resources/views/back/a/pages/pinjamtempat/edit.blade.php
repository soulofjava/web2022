@extends('back.a.layouts.app')
@push('after-style')
@endpush
@section('content')
<div class="content">
    <div class="container-fluid">
        {{ Breadcrumbs::render('pinjamtempat') }}
        <div class="row">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="green">
                    <i class="material-icons">room</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Form Edit Pinjam Tempat</h4>
                    {{Form::model($data, ['route' => ['pinjamtempat.update', $data->id],'method' => 'put', 'files' =>
                    'true', ''])}}
                    @include('back.a.pages.pinjamtempat.form')
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('after-script')
@endpush