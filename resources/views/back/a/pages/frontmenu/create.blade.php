@extends('back.a.layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        {{ Breadcrumbs::render('menufront') }}
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="green">
                        <i class="material-icons">menu</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Form Add Menu / Submenu</h4>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        {{Form::open(['route' => 'frontmenu.store','method' => 'post', 'files' => 'true', ''])}}

                        <div class="togglebutton" style="margin-bottom: 15px;">
                            <label>
                                Hanya Link? <input name="acb" type="checkbox" id="hideButton">
                            </label>
                        </div>

                        <div class="form-group label-floating">
                            <label class="control-label">Menu Parent</label>
                            {{ Form::select('menu_parent', $root, null,
                            ['class' => 'cari form-control']) }}
                        </div>

                        <div class="form-group label-floating">
                            <label class="control-label">Menu Name</label>
                            {{Form::text('menu_name', null,['class' => 'form-control', 'id' => 'title'])}}
                        </div>
                        @error('menu_name')
                        <div class="error text-danger">Tidak Boleh Kosong</div>
                        @enderror

                        <div class="form-group url label-floating" style="display: none;">
                            <label class="control-label">Alamat URL</label>
                            {{Form::text('menu_url', null,['class' => 'form-control'])}}
                        </div>
                        @error('menu_url')
                        <div class="error text-danger">Tidak Boleh Kosong</div>
                        @enderror

                        <div class="form-group jip label-floating">
                            <label class="control-label">Jenis Informasi Publik</label>
                            {{Form::select('kategori', get_code_group('INFORMASI_ST'), null, ['class' =>
                            'form-control','placeholder' => ''])}}
                        </div>
                        @error('kategori')
                        <div class="error text-danger">Tidak Boleh Kosong</div>
                        @enderror

                        <div class="form-group konten label">
                            <label class="control-label">Content</label>
                            {{Form::textarea('content', null,['class' => 'form-control','id'=>'my-editor'])}}
                        </div>

                        <div class="d-flex text-right">
                            <a href="{{ route('frontmenu.index') }}" class="btn btn-default btn-fill">Cancel</a>
                            <button type="submit" class="btn btn-success btn-fill">Insert</button>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
    var url = "{{ route('carimenu') }}";
    $('.cari').select2({
        placeholder: 'Cari...',
        ajax: {
            url: url,
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.menu_name,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });
</script>
<!-- ck editor -->
<script src="{{asset('assets/back/assets/ckeditor/ckeditor.js')}}"></script>
<script>
    var konten = document.getElementById("my-editor");
    var options = {
        filebrowserImageBrowseUrl: '/filemanager?type=Images',
        filebrowserImageUploadUrl: '/filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/filemanager?type=Files',
        filebrowserUploadUrl: '/filemanager/upload?type=Files&_token='
    };
    CKEDITOR.replace(konten, options);
    CKEDITOR.config.allowedContent = true;
</script>
<!-- end ck editor -->
@endpush
