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
                    <h4 class="card-title">Form Edit Flipbook</h4>
                    {{ Form::model($data, ['route' => ['upload.update', $data->id], 'method' => 'put', 'files' =>
                    'true', '']) }}
                    <div class="col text-center">
                        <!-- <legend>Regular Image</legend> -->
                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                            <div class="fileinput-new thumbnail">
                                @if(Storage::get('uploads/'.$data->path_pdf))
                                <img src="{{ route('helper.show-picture', ['path' => 'uploads/'.$data->path_pdf]) }}">
                                @else
                                <img src="{{ asset('assets/back/assets/img/image_placeholder.jpg') }}">
                                @endif
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            <div>
                                <span class="btn btn-success btn-round btn-file">
                                    <span class="fileinput-new">Select Document</span>
                                    <span class="fileinput-exists">Change</span>
                                    <!-- <input type="file" name="photo" /> -->
                                    {{ Form::file('path_pdf', null, ['class' => 'form-control']) }}
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
                        {!! Form::select('id_kategori', $select, null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label class="control-label">Name</label>
                        {{ Form::text('name', $data->name, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        <label class="control-label">Judul</label>
                        {{ Form::text('judul', $data->judul, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        <label class="control-label">Status</label>
                        {{-- {{Form::text('name', null,['class' => 'form-control'])}} --}}
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="publish"
                                id="flexRadioDefault1" @if($data->status == 'publish') checked @endif>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Publish
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="unpublish"
                                id="flexRadioDefault2" @if($data->status == 'unpublish') checked @endif>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Unpublish
                            </label>
                        </div>
                    </div>
                    <div class="d-flex text-right">
                        <a href="{{ route('upload.index') }}" class="btn btn-default btn-fill">Cancel</a>
                        <button type="submit" class="btn btn-success btn-fill">Update</button>
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