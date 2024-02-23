@extends('front.medino.layouts.app')
@section('content')
    <!-- Banner Area Starts -->
    <section class="banner-area other-page">
        <div class="container">
            <div class="row header-judul">
                <div class="col-lg-12">
                    <h1>Postingan</h1>
                    <a href="{{ url('/') }}">Beranda</a> <span>|</span> <a href="#">Postingan</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area End -->

    <!--================Blog Area =================-->
    <section class="blog_area mt-3">
        <div class="container">
            <div class="row">
                <div class="col">

                    <x-cari-news />

                    @foreach ($news as $n)
                        <article class="row blog_item mt-3">
                            <div class="col-md-3">
                                <div class="blog_info text-right">
                                    <!-- <div class="post_tag">
                                        <a href="#">Food,</a>
                                        <a class="active" href="#">Technology,</a>
                                        <a href="#">Politics,</a>
                                        <a href="#">Lifestyle</a>
                                    </div> -->
                                    <ul class="blog_meta list">
                                        <li><a href="#">{{ $n->uploader->name }}<i class="fa fa-user-o"></i></a>
                                        </li>
                                        <li><a href="#">{{ \Carbon\Carbon::parse($n->date)->isoFormat('dddd, D MMMM
                                                                                Y') }}<i
                                                    class="fa fa-calendar-o"></i></a></li>
                                        <li><a href="#">{{ views($n)->count() }} Views<i class="fa fa-eye"></i></a>
                                        </li>
                                        <!-- <li><a href="#">06 Comments<i class="fa fa-comment-o"></i></a></li> -->
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="blog_post">
                                    @if ($n->gambarmuka)
                                        <img src="{{ route('helper.show-picture', ['path' => $n->gambarmuka->path]) }}"
                                            class="img-fluid" alt="{{ $n->gambarmuka->file_name }}">
                                    @else
                                        <img src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid" alt="soul of java">
                                    @endif
                                    <div class="blog_details">
                                        <a href="{{ url('/news-detail', $n->slug) }}">
                                            <h4>{{ \Illuminate\Support\Str::limit($n->title, 50, $end = '...') }}
                                            </h4>
                                        </a>
                                        <p>{!! \Illuminate\Support\Str::limit(strip_tags($n->description), 100, $end = '...') !!}</p>
                                        <a href="{{ url('/news-detail', $n->slug) }}" class="template-btn">Baca
                                            Lebih
                                            Lanjut</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach

                    {{ $news->onEachSide(5)->links('vendor.pagination.medino') }}
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->
@endsection
@push('after-script')
@endpush
