@extends('back.a.layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        {{ Breadcrumbs::render('agenda') }}
        <div class="row">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="green">
                    <i class="material-icons">date_range</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Form Tambah Data</h4>
                    {{Form::open(['route' => 'event.store','method' => 'post', 'files' => 'true', ''])}}
                    <div class="form-group label-floating">
                        <label class="control-label">Event Name</label>
                        {{Form::text('title', null,['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        <label class="control-label">Event Date</label>
                        {{Form::text('date', null,['class' => 'form-control datepicker'])}}
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">Event Location</label>
                        {{Form::text('location', null,['class' => 'form-control'])}}
                    </div>
                    <div class="d-flex text-right">
                        <a href="{{ route('event.index') }}" class="btn btn-default btn-fill">Cancel</a>
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
<!-- end tiny mce editor -->
@endpush