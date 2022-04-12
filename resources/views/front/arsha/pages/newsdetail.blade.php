@extends('front.arsha.layouts.app')
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <!-- <ol>
                <li><a href="index.html">Home</a></li>
                <li>Inner Page</li>
            </ol>
            <h2>Inner Page</h2> -->

        </div>
    </section>
    <!-- End Breadcrumbs -->

    <section id="portfolio-details" class="portfolio-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="card mb-3">
                        <img src="{{ asset('storage/') }}/{{ $data->path}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $data->title }}</h5>
                            <p class="card-text"><small class="text-muted"><i class="bi bi-person"></i><a
                                        href="{{ url('/news-author', $data->upload_by) }}" class="text-muted"> {{
                                        $data->upload_by }}</a> <i class="bi bi-clock"></i> <time>{{
                                        \Carbon\Carbon::parse( $data->date )->format('l') }}, {{
                                        \Carbon\Carbon::parse( $data->date
                                        )->toFormattedDateString() }}</time> <i class="bi bi-eye"></i> {{
                                    views($data)->count(); }}</small></p>
                            <p class="card-text">{!! $data->description !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="portfolio-info">
                        <h3>Search</h3>
                        <div class="sidebar-item search-form">
                            {{Form::open(['route' => 'news.search','method' => 'get', ''])}}
                            {{Form::text('kolomcari', null,['class' => 'form-control', 'placeholder' => 'Title Post'])}}
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary mt-1"><i class="bi bi-search"></i></button>
                            </div>
                            {{Form::close()}}
                        </div>
                        <h3 class="mt-3">Recent Posts</h3>
                        @foreach($news as $n)
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4 d-flex justify-content-center p-1">
                                    <img src="{{ asset('storage/') }}/{{ $n->path}}"
                                        class="img-fluid rounded-start rounded-end">
                                </div>
                                <div class="col-md-8" style="text-align: center;">
                                    <h5 class="card-title"><a href="{{ url('/news-detail', $n->id) }}">{{ $n->title
                                            }}</a></h5>
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
@endpush