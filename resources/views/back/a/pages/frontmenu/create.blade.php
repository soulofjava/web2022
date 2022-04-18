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
                        <h4 class="card-title">Stacked Form</h4>
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
                        <div class="form-group label-floating">
                            <label class="control-label">Position Order</label>
                            {{Form::text('position_order', null,['class' => 'form-control'])}}
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">Menu Name</label>
                            {{Form::text('menu', null,['class' => 'form-control', 'id' => 'title'])}}
                        </div>
                        <!-- <div class="form-group label-floating">
                            <label class="control-label">Menu Url</label>
                            {{Form::text('menu_url', null,['class' => 'form-control', 'id' => 'slug'])}}
                        </div> -->
                        <div class="form-group label-floating">
                            <label class="control-label">Content</label>
                            {{Form::textarea('content', null,['class' => 'my-editor form-control'])}}
                        </div>
                        <div class="d-flex text-right">
                            <a href="{{ url('frontmenu') }}" class="btn btn-default btn-fill">Cancel</a>
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
<!-- <script>
    const title = document.getElementById('title');
    const slug = document.getElementById('slug');
    title.addEventListener('change', function () {
        fetch('/menu/checkSlug?menu=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });
</script> -->
<script src="https://cdn.tiny.cloud/1/ntnf44xuwietuzyond0qbg8p2e6eqo90pzbi04o4j1jzeiqk/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>
<script>
    var editor_config = {
        path_absolute: "/",
        selector: 'textarea.my-editor',
        relative_urls: false,
        plugins: [
            "advlist autolink autosave lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table directionality",
            "emoticons template paste textpattern"
        ],
        toolbar: "restoredraft insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        file_picker_callback: function (callback, value, meta) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
            if (meta.filetype == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.openUrl({
                url: cmsURL,
                title: 'Filemanager',
                width: x * 0.8,
                height: y * 0.8,
                resizable: "yes",
                close_previous: "no",
                onMessage: (api, message) => {
                    callback(message.content);
                }
            });
        }
    };

    tinymce.init(editor_config);
</script>
@endpush