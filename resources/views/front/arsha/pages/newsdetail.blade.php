@extends('front.arsha.layouts.app')
@section('content')
<main id="main">
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>News</li>
            </ol>
            <h2>{{ $data->title }}</h2>

        </div>
    </section>
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="card mb-3">
                        <x-carousel :jjj='$data' />
                        <div class="card-body">
                            <h5 class="card-title text-center">
                                {{ $data->title }}
                            </h5>
                            <div class="row">
                                <div class="col">
                                    <p class="card-text"><small class="text-muted"><i class="bi bi-person"></i><a
                                                href="{{ url('/news-author', $data->upload_by) }}" class="text-muted">
                                                {{
                                                $data->upload_by }}</a> <i class="bi bi-clock"></i> <time>{{
                                                \Carbon\Carbon::parse( $data->date )->format('l') }}, {{
                                                \Carbon\Carbon::parse( $data->date
                                                )->toFormattedDateString() }}</time> <i class="bi bi-eye"></i> {{
                                            views($data)->count(); }}</small>
                                    </p>
                                </div>
                                <div class="col">
                                    <div class="d-flex justify-content-end">
                                        {!! Share::currentPage()->facebook()->twitter()->whatsapp(); !!}
                                    </div>
                                </div>
                            </div>
                            <p class="card-text">
                                {!! $data->description !!}
                            </p>
                            <hr>
                            @if($file->count() != 0)
                            <h6 class="text-center">File Attachments</h6>
                            @foreach($file as $ff)
                            <a href="{{ asset('storage/news/') }}/{{ $ff->file_name}}" target="_blank">
                                {{ $ff->file_name }}
                            </a>
                            <br>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="portfolio-info">
                        <h3>Search</h3>
                        <div class="sidebar-item search-form mb-3">
                            {{Form::open(['route' => 'news.search','method' => 'get', ''])}}
                            {{Form::text('kolomcari', null,['class' => 'form-control mb-3',
                            'placeholder' => 'Title Post'])}}
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary mt-1"><i class="bi bi-search"></i></button>
                            </div>
                            {{Form::close()}}
                        </div>

                        <x-category h3='sidebar-title' div='sidebar-item categories' />

                        <h3 class="mt-3">Recent Posts</h3>
                        @foreach($news as $n)
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4 d-flex justify-content-center p-1">
                                    @if(file_exists(public_path('storage/'.$n->path)))
                                    <img src="{{ asset('storage/') }}/{{ $n->path}}"
                                        class="img-fluid rounded-start rounded-end">
                                    @else
                                    <img src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid">
                                    @endif
                                </div>
                                <div class="col-md-8" style="text-align: center;">
                                    <h5 class="card-title"><a href="{{ url('/news-detail', $n->slug) }}">
                                            {{ \Illuminate\Support\Str::limit($n->title, 50, $end='...') }}
                                        </a></h5>
                                    <p class="card-text"><small class="text-muted"><time datetime="2020-01-01">{{
                                                \Carbon\Carbon::parse( $n->date
                                                )->toFormattedDateString() }}</time></small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
@push('after-script')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
<script src="{{ asset('js/share.js') }}"></script>
@endpush