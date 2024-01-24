@extends('back.layouts.app')
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
                {{Form::open(['route' => 'frontmenu.store','method' => 'post', 'files' => 'true', ''])}}

                <div class="row">
                    <div class="togglebutton" style="margin-bottom: 15px;">
                        <label class="form-check-label">
                            Hanya Link? <input type="checkbox" id="hideButton" name="acb" class="form-check-input">
                        </label>
                    </div>
                </div>

                <div class="row">

                    <div class="form-group col-sm-12 col-md-6">
                        <label for="defaultFormControlInput" class="form-label">Menu</label>
                        {{Form::select('menu_parent', $root, null, ['class' =>
                        'form-control select2'. ($errors->has('menu_parent') ? ' is-invalid' :
                        null),'placeholder' => 'Silahkan Pilih'])}}
                        @error('menu_parent')
                        <div id="defaultFormControlHelp" class="form-text" style="color: red;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group col-sm-12 col-md-6">
                        <label for="defaultFormControlInput" class="form-label">Nama Sub Menu</label>
                        {{Form::text('menu_name', null, ['class' => 'form-control'. ($errors->has('menu_name') ? '
                        is-invalid' :
                        null),
                        'placeholder' => 'Masukkan Nama Sub Menu'])}}
                        @error('menu_name')
                        <div id="defaultFormControlHelp" class="form-text" style="color: red;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group url col-sm-12 col-md-6" style="display: none;">
                        <label for="defaultFormControlInput" class="form-label">URL Menu</label>
                        {{Form::text('menu_url', null, ['class' => 'form-control'. ($errors->has('menu_url') ? '
                        is-invalid' :
                        null),
                        'placeholder' => 'Masukkan URL Menu'])}}
                        @error('menu_url')
                        <div id="defaultFormControlHelp" class="form-text" style="color: red;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group jip col-sm-12 col-md-6">
                        <label for="defaultFormControlInput" class="form-label">Jenis Informasi Publik</label>
                        {{Form::select('kategori', get_code_group('INFORMASI_ST'), null, ['class' =>
                        'form-control'. ($errors->has('name') ? ' is-invalid' :
                        null),'placeholder' => 'Silahkan Pilih'])}}
                    </div>

                    <div class="form-group konten col-12">
                        <label for="defaultFormControlInput" class="form-label">Konten / Isi</label>
                        {{Form::textarea('content', null,['class' => 'my-editor form-control'. ($errors->has('content')
                        ? '
                        is-invalid' :
                        null),'id'=>'my-editor'])}}
                        @error('content')
                        <div id="defaultFormControlHelp" class="form-text" style="color: red;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                </div>

                <div class="mt-3">
                    <a href="{{ route('frontmenu.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
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