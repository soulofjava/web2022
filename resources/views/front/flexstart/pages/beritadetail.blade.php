@extends('front.flexstart.layouts.app')
@section('content')
<main id="main">
    <section class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('newsall') }}">News</a></li>
                <li>{{ $berita['judul_posting'] }}</li>
            </ol>
        </div>
    </section>
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-8 entries">
                    <article class="entry entry-single">
                        <div class="d-flex justify-content-center">
                            <div class="entry-img">
                                <img src="https://diskominfo.wonosobokab.go.id/{{ $berita['gambar_muka']['path'] }}{{ $berita['gambar_muka']['file_name'] }}"
                                    class="img-fluid">
                            </div>
                        </div>
                        <h2 class="entry-title">
                            <a href="#">{{ $berita['judul_posting'] }}</a>
                        </h2>
                        <div class="row">
                            <div class="col-xl-9 col-md-9 col-sm-9">
                                <div class="entry-meta">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                href="#">Admin</a></li>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                href="#"><time>{{
                                                    \Carbon\Carbon::parse($berita['created_at'])->format('l')
                                                    }}, {{
                                                    \Carbon\Carbon::parse( $berita['created_at']
                                                    )->toFormattedDateString() }}</time></a></li>
                                        <li class="d-flex align-items-center"><i class="bi bi-eye"></i> {{
                                            $berita['views'] }}</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-3 col-sm-3">
                                <div class="d-flex justify-content-end">
                                    {!! Share::page(Request::getHttpHost(), $berita['judul_posting'])
                                    ->facebook()
                                    ->twitter()
                                    ->whatsapp(); !!}
                                </div>
                            </div>
                        </div>
                        <div class="entry-content">
                            {!! $berita['isi_posting'] !!}
                        </div>
                    </article>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar">
                        <h3 class="sidebar-title">Search</h3>
                        <div class="sidebar-item search-form">
                            {{Form::open(['route' => 'news.search','method' => 'get', ''])}}
                            {{Form::text('kolomcari', null,['class' => 'form-control', 'placeholder' => 'Title Post'])}}
                            <button type="submit"><i class="bi bi-search"></i></button>
                            {{Form::close()}}
                        </div>
                        <h3 class="sidebar-title">Recent Posts</h3>
                        <div class="sidebar-item recent-posts">
                            @foreach($news as $n)
                            <div class="post-item clearfix">
                                @if(file_exists(public_path('storage/'.$n->path)))
                                <img src="{{ asset('storage/') }}/{{ $n->path}}">
                                @else
                                <img src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid">
                                @endif
                                <h4><a href="{{ url('/news-detail', $n->slug) }}">
                                        {{ \Illuminate\Support\Str::limit($n->title, 50, $end='...') }}
                                    </a></h4>
                                <time datetime="2020-01-01">{{
                                    \Carbon\Carbon::parse( $n->date
                                    )->toFormattedDateString() }}</time>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
@push('after-script')
@endpush