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

                <div class="row">

                    <div class="form-group jip col-6">
                        <label for="defaultFormControlInput" class="form-label">Menu</label>
                        @if($data->id <= 45) {{ Form::select('menu_parent', $root, $data->menu_parent,
                            ['class' => 'cari form-control', 'disabled' => 'disabled','placeholder' => 'Silahkan
                            Pilih']) }}
                            @else
                            {{ Form::select('menu_parent', $root, $data->menu_parent,
                            ['class' => 'cari form-control','placeholder' => 'Silahkan Pilih']) }}
                            @endif
                    </div>
                    @error('menu_parent')
                    <div id="defaultFormControlHelp" class="form-text" style="color: red;">
                        Tidak Boleh Kosong
                    </div>
                    @enderror

                    <div class="form-group col-6">
                        <label for="defaultFormControlInput" class="form-label">Nama Sub Menu</label>
                        @if($data->id <= 45) {{Form::text('menu_name', null,['class'=> 'form-control',
                            'id' => 'title', 'disabled' => 'disabled','placeholder' => 'Masukkan Nama Sub Menu'])}}
                            @else
                            {{Form::text('menu_name', null,['class' => 'form-control', 'id' => 'title','placeholder' =>
                            'Masukkan Nama Sub Menu'])}}
                            @endif
                    </div>
                    @error('menu_name')
                    <div id="defaultFormControlHelp" class="form-text" style="color: red;">
                        Tidak Boleh Kosong
                    </div>
                    @enderror

                    <div class="form-group col-6">
                        <label for="defaultFormControlInput" class="form-label">Jenis Informasi Publik</label>
                        {{Form::select('kategori', get_code_group('INFORMASI_ST'), null, ['class' =>
                        'form-control','placeholder' => 'Silahkan Pilih'])}}
                    </div>

                    <div class="form-group jip col-12">
                        <label for="defaultFormControlInput" class="form-label">Konten / Isi</label>
                        {{Form::textarea('content', null,['class' => 'my-editor form-control','id'=>'my-editor'])}}
                    </div>
                    @error('content')
                    <div id="defaultFormControlHelp" class="form-text" style="color: red;">
                        Tidak Boleh Kosong
                    </div>
                    @enderror

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
    $(".select2").select2();
</script>

<!-- ck editor -->
<script src="{{asset('assets/back/material/ckeditor/ckeditor.js')}}"></script>
<script>
    var konten = document.getElementById("my-editor");
    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
    CKEDITOR.replace(konten, options);
    CKEDITOR.config.allowedContent = true;
</script>
<!-- end ck editor -->
@endpush
