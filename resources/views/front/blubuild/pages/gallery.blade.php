@extends('front.blubuild.layouts.app')
@section('content')
<section>
    <div class="w-100 pt-170 pb-150 dark-layer3 opc7 position-relative">
        <div class="fixed-bg" style="background-image: url(assets/images/pagetop-bg.jpg);"></div>
        <div class="container">
            <div class="page-top-wrap w-100">
                <h1 class="mb-0">Gallery Page</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" title="">Home</a></li>
                    <li class="breadcrumb-item active">Gallery</li>
                </ol>
            </div>
            <!-- Page Top Wrap -->
        </div>
    </div>
</section>
<section>
    <div class="w-100 pt-100 pb-100 position-relative">
        <div class="container">
            <div class="shop-wrap w-100">
                <div class="row">
                    @foreach($gallery as $g)
                    <div class="col-md-4 col-sm-6 col-lg-3" style="display: flex;">
                        <div class="shop-box w-100">
                            @foreach($g->gambar as $pic)
                            @if($loop->iteration == 1)
                            <a data-fancybox="gallery-group-{{ $pic->id_news }}"
                                href="{{ asset('storage/') }}/{{ $pic->path }}" data-caption="{{ $g->description }}">
                                <img src="{{ asset('storage/') }}/{{ $pic->path }}" class="img-fluid"
                                    style="height: 250px;">
                            </a>
                            @else
                            <div style="display:none;">
                                <a data-fancybox="gallery-group-{{ $pic->id_news }}"
                                    href="{{ asset('storage/') }}/{{ $pic->path }}"
                                    data-caption="{{ $g->description }}">
                                    <img src="{{ asset('storage/') }}/{{ $pic->path }}" class="img-fluid">
                                </a>
                            </div>
                            @endif
                            @endforeach
                            <div class="shop-info w-100">
                                <h3 class="mb-0 text-center"><a>{{ $g->description }}</a></h3>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- Shop Wrap -->
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
                        {{ $gallery->links('vendor.pagination.atorn') }}
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
            <!-- Shop Filters Pagination Wrap -->
        </div>
    </div>
</section>
@endsection
@push('after-script')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
@endpush