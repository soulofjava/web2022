@extends('front.blubuild.layouts.app')
@section('content')
<section>
    <div class="w-100 pt-170 pb-150 dark-layer3 opc7 position-relative">
        <div class="fixed-bg" style="background-image: url(assets/images/pagetop-bg.jpg);"></div>
        <div class="container">
            <div class="page-top-wrap w-100">
                <h1 class="mb-0">All News From Our Blog</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" title="">Home</a></li>
                    <li class="breadcrumb-item active">News</li>
                </ol>
            </div><!-- Page Top Wrap -->
        </div>
    </div>
</section>
<section>
    <div class="w-100 pt-100 pb-50 position-relative">
        <div class="container">
            <div class="row mb-5" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12 d-flex justify-content-around">
                    <a class="thm-btn thm-bg" href="{{ url('/newsall') }}">Show
                        All</a>
                    <a class="thm-btn thm-bg" href="{{ url('newscategory') }}/KATEGORI_NEWS_4">Berita</a>
                    <a class="thm-btn thm-bg" href="{{ url('newscategory') }}/KATEGORI_NEWS_1">Dokumentasi</a>
                    <a class="thm-btn thm-bg" href="{{ url('newscategory') }}/KATEGORI_NEWS_3">Notulensi</a>
                    <a class="thm-btn thm-bg" href="{{ url('newscategory') }}/KATEGORI_NEWS_2">Press
                        Release</a>
                    <a class="thm-btn thm-bg" href="{{ url('newscategory') }}/KATEGORI_NEWS_0">Sambutan</a>
                </div>
            </div>
            <div class="blog-wrap w-100">
                <div class="row justify-content-center">
                    @foreach($news as $n)
                    <div class="col-md-6 col-sm-6 col-lg-4" style="display: flex;">
                        <div class="post-box w-100 text-center">
                            <div class="post-img overflow-hidden w-100">
                                @if(file_exists(public_path('storage/'.$n->path)))
                                <a href="{{ url('/news-detail', $n->slug) }}"><img class="img-fluid w-100"
                                        src="{{ asset('storage/') }}/{{ $n->path}}" alt="{{ $n->photo }}"
                                        style="height: 250px;"></a>
                                @else
                                <a href="{{ url('/news-detail', $n->slug) }}"><img class="img-fluid w-100"
                                        src="{{ asset('img/soulofjava.jpg') }}" alt="soul of java"
                                        style="height: 250px;"></a>
                                @endif
                            </div>
                            <div class="post-info w-100">
                                <h3 class="mb-0"><a href="{{ url('/news-detail', $n->slug) }}" title="">{{
                                        \Illuminate\Support\Str::limit($n->title,
                                        50, $end='...') }}</a></h3>
                                <!-- <p class="mb-0">There are many variations of passages of Lorem Ipsum available.</p> -->
                                <div class="post-info-bottom d-flex flex-wrap w-100">
                                    <span class="d-inline-block"><i class="far fa-user"></i><a
                                            href="{{ url('/news-author', $n->upload_by) }}">{{ $n->upload_by
                                            }}</a></span>
                                    <ul class="post-meta mb-0 list-unstyled d-inline-flex">
                                        <li><i class="far fa-calendar-alt"></i>{{
                                            \Carbon\Carbon::parse($n->date)->format('l') }}, {{
                                            \Carbon\Carbon::parse( $n->date
                                            )->toFormattedDateString() }}</li>
                                        <!-- <li><i class="fas fa-comment-dots"></i>12</li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- Blog Wrap -->
            <div class="shop-filters-pagination-wrap mt-50 d-flex flex-wrap justify-content-between w-100">
                <div class="shop-filters d-inline-flex align-items-center">
                    <!-- <div class="filter-inner">
                                    <span>View as:</span>
                                    <a href="javascript:void(0);" title=""><i class="fas fa-th-large"></i></a>
                                    <a href="javascript:void(0);" title=""><i class="fas fa-th-list"></i></a>
                                </div>
                                <div class="filter-inner">
                                    <span>Sort by:</span>
                                    <div class="slc-wrp">
                                        <select>
                                            <option>Most Recent</option>
                                            <option>Recent</option>
                                            <option>Old</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="filter-inner">
                                    <span>Show:</span>
                                    <div class="slc-wrp">
                                        <select>
                                            <option>11</option>
                                            <option>22</option>
                                            <option>33</option>
                                        </select>
                                    </div>
                                </div> -->
                </div>
                <div class="pagination-wrap">
                    <ul class="pagination">
                        <!-- Pagination -->
                        {{ $news->links('vendor.pagination.atorn') }}
                        <!-- <li class="page-item"><a class="page-link" href="javascript:void(0);" title=""><i
                                                class="fas fa-angle-left"></i></a></li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);" title="">1</a></li>
                                    <li class="page-item active"><a class="page-link" href="javascript:void(0);" title="">2</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);" title="">3</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);" title=""><i
                                                class="fas fa-angle-right"></i></a></li> -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('after-script')
@endpush