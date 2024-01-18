@extends('front.herobiz.layouts.app')
@section('content')
<main id="main">
    <section class="breadcrumbs">
        <div class="container">
            <!-- <ol>
                <li><a href="index.html">Home</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li>Blog Single</li>
            </ol> -->
            <!-- <h2>Blog Single</h2> -->
        </div>
    </section>
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-8 entries">
                    <article class="entry entry-single">
                        <div class="entry-img">
                            <x-carousel :jjj='$data' />
                        </div>
                        <h2 class="entry-title m-1">
                            <a href="#">{{ $data->title }}</a>
                        </h2>
                        <div class="entry-meta m-1">
                            <li class="d-flex align-items-center">
                                <div class="col">
                                    <i class="bi bi-person"></i>
                                    <a href="{{ url('/news-author', $data->upload_by) }}" style="margin-right: 5px;">
                                        {{ $data->uploader->name }}
                                    </a>
                                    <i class="bi bi-clock"></i>
                                    <a style="margin-right: 5px;">
                                        {{
                                        \Carbon\Carbon::parse( $data->date )->format('l') }}, {{
                                        \Carbon\Carbon::parse( $data->date
                                        )->toFormattedDateString() }}
                                    </a>
                                    <i class="bi bi-eye"></i>
                                    {{ views($data)->count(); }}
                                </div>
                                <div class="col">
                                    <div class="d-flex justify-content-end">
                                        {!! Share::currentPage()->facebook()->twitter()->whatsapp(); !!}
                                    </div>
                                </div>
                            </li>
                        </div>
                        <div class="entry-content m-1">
                            {!! $data->description !!}
                            <hr>
                            @if($file->count() != 0)
                            <h6 class="text-center">File Attachments</h6>
                            @foreach($file as $ff)
                            <a href="{{ asset('storage/news/') }}/{{ $ff->file_name}}" target="_blank">
                                {{ $ff->file_name }}
                            </a>
                            <br>
                            @endforeach
                            @endif
                        </div>
                    </article>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar">
                        <h3 class="sidebar-title mb-3">Search</h3>
                        <div class="sidebar-item search-form mb-3">
                            {{Form::open(['route' => 'news.search','method' => 'get', ''])}}
                            {{Form::text('kolomcari', null,['class' => 'form-control', 'placeholder' => 'Title Post'])}}
                            <button type="submit"><i class="bi bi-search"></i></button>
                            {{Form::close()}}
                        </div>

                        <h3 class="sidebar-title mt-3">Recent Posts</h3>
                        <div class="sidebar-item recent-posts">
                            @foreach($news as $n)
                            <div class="post-item clearfix mt-3">
                                @if($n->gambarmuka)
                                <img src="{{ route('helper.show-picture', ['path' => $n->gambarmuka->path]) }}"
                                    style="min-width: 80px !important; min-height: 60px !important; max-width: 80px !important; max-height: 60px !important; object-fit: cover;">
                                @else
                                <img src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid"
                                    style="width: 80px; height: 60;">
                                @endif
                                <h4><a href="{{ url('/news-detail', $n->slug) }}">
                                        {{ \Illuminate\Support\Str::limit($n->title, 50, $end='...') }}
                                    </a></h4>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
@push('after-script')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
<script src="{{ asset('js/share.js') }}"></script>
@endpush