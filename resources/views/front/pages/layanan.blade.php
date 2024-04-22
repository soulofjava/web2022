@extends('front.layouts.app')
@section('content')
<!-- Coach Section Start -->
<section class="coach-section rel z-1 pt-120 rpt-90 pb-100 rpb-70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-md-8">
                <div class="section-title text-center mb-40">
                    <h2>Layanan Badan Kepegawaian Daerah Kabupaten Wonosobo</h2>
                </div>
            </div>
        </div>
        <ul class="coach-filter mb-35">
            <li data-filter="*" class="current">Show All</li>
            @foreach(App\Models\Kategori::orderBy('name', 'ASC')->get() as $kat)
            <li data-filter=".{{ Str::slug($kat->name, '_') }}">{{ Str::title($kat->name) }}</li>
            @endforeach
        </ul>
        <div class="row coach-active justify-content-center">
            @foreach(App\Models\News::whereNotNull('tag')->where('terbit', 1)->latest('date')->get() as $iu)
            <div class="col-lg-3 col-md-6 item {{ Str::slug($iu->tag, '_') }}">
                <div class="coach-item wow fadeInUp delay-0-2s">
                    <div class="coach-image">
                        <a href="{{ url('/news-detail', $iu->slug) }}">
                            @if($iu->gambarmuka)
                            <img src="{{ route('helper.show-picture', ['path' => $iu->gambarmuka->path]) }}"
                                class="img-thumbnail" alt="{{ $iu->gambarmuka->file_name }}"
                                style="object-fit: cover; width: 270px; height: 148px">
                            @else
                            <img src="{{ asset('assets/bkdwonosobo.png') }}" alt="Course">
                            @endif
                        </a>
                        <!-- <img src="{{ asset('assets/front/images/coachs/coach1.jpg') }}" alt="Coach"> -->
                    </div>
                    <div class="coach-content" style="height: 175px;">
                        <!-- <span class="label">Basic Coach</span> -->
                        <h4><a href="{{ url('/news-detail', $iu->slug) }}">{{ Str::limit($iu->title, 40, '...') }}</a>
                        </h4>
                        <!-- <div class="ratting-price">
                            <div class="ratting">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span>(3k)</span>
                            </div>
                            <span class="price">256.95</span>
                        </div> -->
                        <!-- <ul class="coach-footer">
                            <li><i class="far fa-file-alt"></i><span>12 Lessions</span></li>
                            <li><i class="far fa-user"></i><span>seats</span></li>
                        </ul> -->
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Coach Section End -->
@endsection