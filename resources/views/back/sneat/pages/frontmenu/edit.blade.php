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
                <a href="#">Menu</a>
            </li>
            <li class="breadcrumb-item active">Data</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Form Tambah Data</h4>
            <div class="card-content">
                {{Form::model($data, ['route' => ['frontmenu.update', $data->id],'method' => 'put', 'files' =>
                'true', ''])}}
                @include('back.sneat.pages.frontmenu.form')
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>
<!-- / Content -->

@endsection
@push('after-script')
<script>
    $(document).ready(function () {
        let a = document.getElementById('bbb').value;
        console.log(a);
        if (a == 1) {
            $(".konten").hide();
            $(".jip").hide();
            $(".url").show();
        }

        $("#hideButton").click(function () {
            if ($(this).is(":checked")) {
                $(".konten").hide();
                $(".jip").hide();
                $(".url").show();
            } else {
                $(".konten").show();
                $(".jip").show();
                $(".url").hide();
            }
        });

    });

    $(".select2").select2();
</script>

<!-- ck editor -->
<script src="{{asset('assets/back/material/ckeditor/ckeditor.js')}}"></script>
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