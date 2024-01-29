@extends('back.a.layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        {{ Breadcrumbs::render('music') }}
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="green">
                        <i class="material-icons">library_music</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Chart Music</h4>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        {{Form::open(['route' => 'music.store','method' => 'post', 'files' => 'true', ''])}}
                        <div class="form-group label-floating">
                            <label class="control-label">Ranking</label>
                            {{Form::number('ranking', null,['class' => 'form-control'])}}
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">Song</label>
                            {{Form::text('song', null,['class' => 'form-control'])}}
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">Artis</label>
                            {{Form::text('artist', null,['class' => 'form-control'])}}
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">Years</label>
                            {{Form::number('years', null,['class' => 'form-control'])}}
                        </div>
                        <div class="d-flex text-right">
                            <a href="{{ url('music') }}" class="btn btn-default btn-fill">Cancel</a>
                            <button type="submit" class="btn btn-success btn-fill">Insert</button>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection
@push('after-script')
@endpush