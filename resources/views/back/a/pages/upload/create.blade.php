@extends('back.a.layouts.app')
@section('content')
    <div class="content">
        <div class="container-fluid">
            {{ Breadcrumbs::render('upload') }}
            <div class="row">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="green">
                        <i class="material-icons">event_note</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Form Add Flipbook</h4>
                        {{ Form::open(['route' => 'upload.store', 'method' => 'post', 'files' => 'true', '']) }}
                        <div class="col text-center">
                            <!-- <legend>Regular Image</legend> -->
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <div class="fileinput-new thumbnail">
                                    <img src="{{ asset('assets/back/assets/img/image_placeholder.jpg') }}" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                <div>
                                    <span class="btn btn-success btn-round btn-file">
                                        <span class="fileinput-new">Select Document</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="path_pdf" class="form-controll"
                                            accept="application/pdf">
                                    </span>
                                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
                                        data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group label-floating mb-2">
                            <label class="control-label">Kategori Kelas</label>
                            {!! Form::select('id_kategori', $select, null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label">
                                <h4>Nama Guru</h4>
                            </label>
                            {{ Form::text('name', null, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            <label class="control-label">Judul</label>
                            {{ Form::text('judul', null, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            <label class="control-label">Status</label>
                            {{-- {{Form::text('name', null,['class' => 'form-control'])}} --}}
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="publish"
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Publish
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="unpublish"
                                    id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Unpublish
                                </label>
                            </div>
                        </div>
                        <div class="d-flex text-right">
                            <a href="{{ route('upload.index') }}" class="btn btn-default btn-fill">Cancel</a>
                            <button type="submit" class="btn btn-success btn-fill">Insert</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('after-script')
@endpush
