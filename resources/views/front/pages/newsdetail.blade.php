@extends('front.layouts.app')
@section('content')
<!-- Page Banner Start -->
<section class="page-banner-area rel z-1 text-white text-center"
    style="background-image: url({{ asset('assets/front/images/banner.jpg') }});">
    <div class="container">
        <div class="banner-inner rpt-10">
            <h2 class="page-title wow fadeInUp delay-0-2s">Postingan</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb wow fadeInUp delay-0-4s">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">beranda</a></li>
                    <li class="breadcrumb-item active">Detail Postingan</li>
                </ol>
            </nav>
        </div>
    </div>
    <img class="circle-one" src="{{ asset('assets/front/images/shapes/circle-one.png') }}" alt="Circle">
    <img class="circle-two" src="{{ asset('assets/front/images/shapes/circle-two.png') }}" alt="Circle">
</section>
<!-- Page Banner End -->


<!-- Blog Details Start -->
<section class="blog-details-area py-130 rpy-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-details-wrap">
                    <!-- <div class="image mb-25 wow fadeInUp delay-0-2s"> -->
                    <!-- </div> -->
                    <x-carousel :jjj='$data' />
                    <ul class="blog-standard-header wow fadeInUp delay-0-2s mt-25">
                        <li><span class="name">{{ $data->uploader->name }}</span></li>
                        <li><i class="far fa-calendar-alt"></i> <a href="#">{{
                                \Carbon\Carbon::parse($data->date)->format('l') }},
                                {{ \Carbon\Carbon::parse( $data->date)->toFormattedDateString() }}</a></li>
                        <li><i class="far fa-eye"></i> <a href="#">{{ views($data)->count(); }} Views</a></li>
                    </ul>
                    <h3 class="title">{{ $data->title }}</h3>
                    {!! $data->content !!}
                    <div class="tag-share pt-10">
                        <div class="social-style-two">
                            <h6>Share :</h6>
                            {!! Share::currentPage()->facebook()->twitter()->whatsapp(); !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog-sidebar rmt-75">
                    <div class="widget widget-search wow fadeInUp delay-0-2s">
                        {{Form::open(['route' => 'global.search','method' => 'get', ''])}}
                        {{Form::text('kolomcari', null,['class' => '',
                        'placeholder' => 'Kata Pencarian','id'=>'textareaID1'])}}
                        <button type="submit"><i class="searchbutton fa fa-search"></i></button>
                        {{Form::close()}}
                    </div>
                    <div class="widget widget-recent-courses wow fadeInUp delay-0-2s">
                        <h4 class="widget-title">Postingan Terpopular</h4>
                        <ul>
                            @foreach($news as $item)
                            <li>
                                @if($item->gambarmuka)
                                <div class="image">
                                    <img src="{{ route('helper.show-picture', ['path' => $item->gambarmuka->path]) }}"
                                        alt="Course">
                                </div>
                                @else
                                <div class="image">
                                    <img src="{{ asset('assets/bkdwonosobo.png') }}"
                                        alt="Course">
                                </div>
                                @endif
                                <div class="content">
                                    <h6><a href="{{ url('/news-detail', $item->slug) }}">{{
                                            \Illuminate\Support\Str::limit($item->title, 50, $end='...') }}</a></h6>
                                    <span>By <a href="#">{{ $item->uploader->name ?? 'Admin'
                                            }}</a></span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details End -->
@endsection
@push('after-script')
@endpush