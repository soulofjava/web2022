@extends('templates.back.main')
@section('container')
@include('templates.back.sidebar')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="green">
                        <i class="material-icons">menu</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Stacked Form</h4>
                        {{Form::open(['route' => 'gallery.store','method' => 'post', 'files' => 'true', ''])}}
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
                                        <input type="file" name="photo" />
                                    </span>
                                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
                                        data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">Description</label>
                            {{Form::text('description', null,['class' => 'form-control'])}}
                        </div>
                        <!-- <div class="form-group label-floating">
                            <label class="control-label">Photo</label>
                            {{Form::file('foto', null,['class' => 'form-control'])}}
                        </div> -->
                        <div class="text-right">
                            <button type="submit" class="btn btn-success btn-fill">Insert</button>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="container-fluid">
        <p class="copyright pull-right">
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script>
            <a href="http://www.creative-tim.com/">Creative Tim</a>, made with love for a better web
        </p>
    </div>
</footer>
</div>
</div>
@endsection
@push('javascript')
@endpush