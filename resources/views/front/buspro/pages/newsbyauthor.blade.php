@extends('front.buspro.layout.app')

@section('content')
<!-- Start Breadcrumb 
    ============================================= -->
<div class="breadcrumb-area shadow dark bg-fixed text-center text-light"
    style="background-image: url(assets/img/2440x1578.png);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h1>{{ $hasil }}</h1>
                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}"><i class="fas fa-home"></i> Beranda</a></li>
                    <li><a href="{{ url('newsall') }}"> Semua Postingan</a></li>
                    <li class="active"> {{ $hasil }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb -->
<div class="blog-area default-padding bottom-less">
    <div class="container">
        <!-- <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="site-heading text-center">
                    <h2>Latest Blog</h2>
                    <p>
                        While mirth large of on front. Ye he greater related adapted proceed entered an. Through it
                        examine express promise no. Past add size game cold girl off how old
                    </p>
                </div>
            </div>
        </div> -->
        <div class="row">
            @foreach($data as $n)
            <!-- Single Item -->
            <div class="col-md-4 single-item" style="height: 450px;">
                <div class="item">
                    <div class="thumb">
                        <a href="{{ url('/news-detail', $n->slug) }}">
                            @if(Storage::get($n->gambarmuka->path ?? ''))
                            <img loading="lazy" src="{{ route('helper.show-picture', ['path' => $n->gambarmuka->path]) }}"
                                class="img-fluid" alt="{{ $n->gambarmuka->file_name }}"
                                style="background-size: cover; height: 240px; background-position: center; width: 100%;">
                            @else
                            <img loading="lazy" src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid" alt="soul of java"
                                style="background-size: cover; height: 240px; background-position: center; width: 100%;">
                            @endif
                        </a>
                        <!-- <span class="post-formats"><i class="fas fa-image"></i></span> -->
                    </div>
                    <div class="info" style="height: 210px;">
                        <!-- <div class="cats">
                            <a href="#">Business</a>
                            <a href="#">Assets</a>
                        </div> -->
                        <h4>
                            <a href="{{ url('/news-detail', $n->slug) }}">
                                {{ \Illuminate\Support\Str::limit($n->title, 50,
                                $end='...') }}
                            </a>
                        </h4>
                        {!!
                        \Illuminate\Support\Str::limit($n->description, 100,
                        $end='...') !!}
                        <div class="meta">
                            <ul>
                                <li><i class="fas fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($n->date)->format('l')
                                    }}, {{
                                    \Carbon\Carbon::parse( $n->date
                                    )->toFormattedDateString() }}</li>
                            </ul>
                            <a href="{{ url('/news-detail', $n->slug) }}">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Item -->
            @endforeach
            <!-- Pagination -->
            <div class="row">
                <div class="col-md-12 pagi-area">
                    <nav aria-label="navigation">
                        <ul class="pagination">
                            <!-- <li><a href="#"><i class="fas fa-angle-double-left"></i></a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#"><i class="fas fa-angle-double-right"></i></a></li> -->
                            {{ $data->withQueryString()->links('vendor.pagination.buspro') }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection