@extends('back.a.layouts.app')
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
                    <h4 class="card-title">Stacked Form</h4>
                    {{Form::open(['route' => 'news.store','method' => 'post', 'files' => 'true', ''])}}
                    <div class="col text-center">
                        <!-- <legend>Regular Image</legend> -->
                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                            <div class="fileinput-new thumbnail">
                                <img src="{{ asset('assets/back/assets/img/image_placeholder.jpg') }}" alt="...">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            <div>
                                <span class="btn btn-success btn-round btn-file">
                                    <span class="fileinput-new">Select image</span>
                                    <span class="fileinput-exists">Change</span>
                                    {{Form::file('photo', null,['class' => 'form-control'])}}
                                </span>

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
                    <div class="form-group label-floating">
                        <label class="control-label">Title</label>
                        {{Form::text('title', null,['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        <label class="control-label">Date</label>
                        {{Form::text('date', null,['class' => 'form-control datepicker'])}}
                    </div>
                    <div class="form-group label-floating is-focused">
                        <label class="control-label">Description</label>
                        {{Form::textarea('description', null,['class' => 'my-editor form-control','id'=>'my-editor'])}}
                    </div>
                    <div class="d-flex text-right">
                        <a href="{{ url('news') }}" class="btn btn-default btn-fill">Cancel</a>
                        <button type="submit" class="btn btn-success btn-fill">Insert</button>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('after-script')
<script type="text/javascript">
    $(document).ready(function () {
        demo.initFormExtendedDatetimepickers();
    });
</script>
<!-- ck editor -->
<script src="{{asset('assets/back/assets/ckeditor/ckeditor.js')}}"></script>
<script>
    var konten = document.getElementById("my-editor");
    var options = {
        filebrowserImageBrowseUrl: '/file-manager/ckeditor',

    };
    CKEDITOR.replace(konten, options);
    CKEDITOR.config.allowedContent = true;
</script>
<!-- end ck editor -->
@endpush