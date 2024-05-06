@extends('front.buspro.layout.app')

@section('content')
<!-- Start Banner 
    ============================================= -->
<div class="banner-area">
    <div id="bootcarousel" class="carousel inc-top-heading slide carousel-fade animate_text" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner text-light carousel-zoom">
            @foreach(App\Models\News::with('gambarmuka')->where('terbit', 1)->where('highlight', 1)->latest('date')->take(3)->get() as $hl)
            <div class="item {{ $loop->first ? 'active' : '' }}">
                @if($hl->gambarmuka)
                <div class="slider-thumb bg-cover"
                    style="background-image: url('{{ route('helper.show-picture', ['path' => $hl->gambarmuka->path]) }}');">
                </div>
                @else
                <div class="slider-thumb bg-cover" style="background-image: url('img/soulofjava.jpg');">
                </div>
                @endif
                <div class="box-table shadow dark">
                    <div class="box-cell">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="content">
                                        <h1 data-animation="animated slideInLeft">{{ $hl->title }}</h1>
                                        <a data-animation="animated slideInUp" class="btn btn-light border btn-md"
                                            href="{{ url('/news-detail', $hl->slug) }}">Lihat Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- End Wrapper for slides -->

        <!-- Left and right controls -->
        <a class="left carousel-control shadow" href="#bootcarousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control shadow" href="#bootcarousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<!-- End Banner -->
@endsection