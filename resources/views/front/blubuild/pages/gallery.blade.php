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
                            <div class="shop-img w-100 position-relative overflow-hidden">
                                @if(Storage::get($g->path))
                                <img class="img-fluid w-100"
                                    src="{{ route('helper.show-picture', ['path' => $g->path]) }}" alt="{{ $g->name }}"
                                    style="height: 200px;">
                                <a data-fancybox="gallery"
                                    href="{{ route('helper.show-picture', ['path' => $g->path]) }}" title="">View
                                    Photo<i class="fas fa-eye"></i></a>
                                @else
                                <img class="img-fluid w-100" src="{{ asset('img/soulofjava.jpg') }}" alt="soulofjava"
                                    style="height: 200px;">
                                <a data-fancybox="gallery" href="{{ asset('img/soulofjava.jpg') }}" title="">View
                                    Photo<i class="fas fa-eye"></i></a>
                                @endif
                            </div>
                            <div class="shop-info w-100">
                                <h3 class="mb-0 text-center"><a>{{ $g->name}}</a></h3>
                                <!-- <div class="shop-info-bottom d-flex flex-wrap justify-content-between w-100">
                                    <span class="rate"><i class="far fa-star off"></i><i class="far fa-star off"></i><i
                                            class="far fa-star off"></i><i class="far fa-star off"></i><i
                                            class="far fa-star off"></i></span>
                                    <span class="price"><ins>$590.00</ins><del>$569.00</del></span>
                                </div> -->
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