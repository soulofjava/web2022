@extends('front.buildco.layouts.app')
@push('after-style')
@endpush
@section('content')
<!-- Start Breadcrumb 
    ============================================= -->
<div class="breadcrumb-area shadow dark bg-fixed text-center text-light"
    style="background-image: url(assets/img/2440x1578.png);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h1>POstingan Kami</h1>
                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}"><i class="fas fa-home"></i> Beranda</a></li>
                    <li><a href="{{ url('newsall') }}">Postingan</a></li>
                    <li class="active">Semua Postingan</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb -->

<!-- Start Blog
    ============================================= -->
<div class="blog-area full-blog blog-standard full-blog default-padding">
    <div class="container">
        <x-cari-news style='margin-top: 22px; margin-bottom: 22px; width:100%; background-color: #FF5E14;' />
        <div class="row">
            <div class="blog-items">
                <div class="blog-content col-md-10 col-md-offset-1">
                    @foreach($news as $n)
                    <!-- Single Item -->
                    <div class="single-item">
                        <div class="thumb">
                            <a href="{{ url('/news-detail', $n->slug) }}">
                                @if($n->attachment)
                                <img src="{{ $n->attachment }}" alt="thumbnail">
                                @elseif(count($n->gambar))
                                <x-carousel :jjj="$n" />
                                @else
                                <img src="{{ asset('img/soulofjava.jpg') }}" alt="soul of java">
                                @endif
                            </a>
                            <div class="author">
                                <div class="thumb">
                                    <img src="https://ui-avatars.com/api/?name= {{ $data->uploader->name ?? 'Admin' }}"
                                        alt="Author">
                                </div>
                                <div class="meta">
                                    <h5>{{ $n->uploader->name }}</h5>
                                    <span>{{ \Carbon\Carbon::parse($n->date)->format('l') }}, {{
                                        \Carbon\Carbon::parse( $n->date
                                        )->toFormattedDateString() }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="info">
                            <h3>
                                <a href="{{ url('/news-detail', $n->slug) }}">{{ $n->title }}</a>
                            </h3>
                            <p>
                                {{ \Illuminate\Support\Str::limit($n->title, 200,
                                $end='...') }}
                            </p>
                            <a href="{{ url('/news-detail', $n->slug) }}">Read More <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    @endforeach
                    <!-- Pagination -->
                    <div class="row">
                        <div class="col-md-12 pagi-area">
                            <nav aria-label="navigation">
                                <ul class="pagination">
                                    {{ $news->links('vendor.pagination.buildco') }}
                                    <!-- <li><a href="#"><i class="fas fa-arrow-left"></i></a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#"><i class="fas fa-arrow-right"></i></a></li> -->
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Blog -->
@endsection
@push('after-script')
@endpush