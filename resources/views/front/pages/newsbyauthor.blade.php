@extends('front.layouts.app')
@section('content')
<!-- Blog Standard Start -->
<section class="blog-standard-area py-130 rpt-95 rpb-100" style="height: 100vh; overflow-y: auto;">
    <div class="container">
        <div class="row">
            <div class="col">
                <x-cari-news />
                <div class="blog-standard-wrap">
                    @foreach($data ?? [] as $author)
                    <div class="blog-standard-item wow fadeInUp delay-0-2s">
                        @if($author->gambarmuka)
                        <img src="{{ route('helper.show-picture', ['path' => $author->gambarmuka->path]) }}"
                            class="img-fluid" alt="{{ $author->gambarmuka->file_name }}">
                        @else
                        <div class="image">
                            <img src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid" alt="soul of java">
                        </div>
                        @endif
                        <div class="blog-standard-content mt-25">
                            <div class="author">
                                <img src="https://ui-avatars.com/api/?name={{ $author->uploader->name ??
                                            'Admin' }}" alt="Author">
                            </div>
                            <div class="content">
                                <ul class="blog-standard-header">
                                    <li><span class="name">{{ $author->uploader->name ??
                                            'Admin' }}</span></li>
                                    <li><i class="far fa-calendar-alt"></i> <a
                                            href="{{ url('/news-detail', $author->slug) }}">{{
                                            \Carbon\Carbon::parse($author->date)->isoFormat('dddd, D MMMM
                                            Y')
                                            }}</a></li>
                                    <li><i class="far fa-eye"></i> <a href="{{ url('/news-detail', $author->slug) }}">{{
                                            views($author)->count(); }} Views</a>
                                    </li>
                                </ul>
                                <h3><a href="{{ url('/news-detail', $author->slug) }}">{{
                                        \Illuminate\Support\Str::limit($author->title, 50,
                                        $end='...') }}</a></h3>
                                <p>{!! \Illuminate\Support\Str::limit($author->content, 200,
                                    $end='...') !!}</p>
                                <a href="{{ url('/news-detail', $author->slug) }}" class="theme-btn style-two">Baca
                                    Selengkapnya<i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {!! $data->withQueryString()->links('vendor.pagination.boxass') !!}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Standard End -->
@endsection
@push('after-script')
@endpush
