@extends('front.boxass.layouts.app')
@push('after-style')
@endpush
@section('content')
<main id="main">

    <!-- Start Breadcrumb
        ============================================= -->
    <div class="breadcrumb-area shadow bg-fixed text-center padding-xl text-light" style="background-color: #F4F7FB;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <!-- <h1>Blog Single</h1> -->
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="#">postingan</a></li>
                        <li><a href="#">{{ $hasil }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Blog
    ============================================= -->
    <div class="blog-area full-width bg-gray default-padding">
        <div class="container">
            <x-cari-news style='margin-top: 22px; width:100%;' />
            <div class="row" style="margin-top: 25px;">
                <div class="blog-items">
                    @forelse($data as $n)
                    <!-- Single Item -->
                    <div class="col-lg-4 col-md-4 col-sm-6 equal-height">
                        <div class="item">
                            <div class="thumb">
                                <a href="#">
                                    @forelse($n->gambar as $gambar)
                                    @if($loop->iteration == 1)
                                    <img src="{{ asset('storage/') }}/{{  $gambar->path }}" class="img-fluid"
                                        alt="{{ $gambar->file_name }}">
                                    @endif
                                    @empty
                                    <img src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid" alt="soul of java">
                                    @endforelse
                                </a>
                            </div>
                            <div class="info">
                                <div class="content">
                                    <div class="date">
                                        {{ \Carbon\Carbon::parse($n->date)->format('l') }}, {{
                                        \Carbon\Carbon::parse( $n->date
                                        )->toFormattedDateString() }}
                                    </div>
                                    <h4>
                                        <a href="#">{{ \Illuminate\Support\Str::limit($n->title, 50,
                                            $end='...') }}</a>
                                    </h4>
                                    <a href="{{ url('/news-detail', $n->slug) }}">lebih detail <i
                                            class="fas fa-angle-right"></i></a>
                                </div>
                                <div class="meta">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <img src="https://ui-avatars.com/api/?name= {{ $n->uploader->name ?? 'Admin' }}"
                                                    alt="Author">
                                                <span> {{ $n->uploader->name ?? 'Admin' }}</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fas fa-comments"></i>
                                                <span>05</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fas fa-eye"></i>
                                                <span>{{
                                                    views($n)->count(); }}</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    @empty
                    <div class="text-center">
                        Data Tidak Ditemukan
                    </div>
                    @endforelse
                    <div class="col-lg-12 col-md-12 pagi-area">
                        <nav aria-label="navigation">
                            <ul class="pagination">
                                {{ $data->withQueryString()->links('vendor.pagination.boxass') }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog -->

</main>
@endsection
@push('after-script')
@endpush