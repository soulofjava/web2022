@extends('front.flexstart.layouts.app')
@section('content')
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('newsall') }}">News</a></li>
                <li>{{ $data->title }}</li>
            </ol>
            <!-- <h2>Blog Single</h2> -->
        </div>
    </section>
    <!-- End Breadcrumbs -->
    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-8 entries">
                    <article class="entry entry-single">
                        <x-carousel :jjj='$data' />
                        <div class="d-flex justify-content-center">
                            <div class="entry-img">
                            </div>
                        </div>
                        <h2 class="entry-title">
                            <a href="#">{{ $data->title }}</a>
                        </h2>
                        <div class="row">
                            <div class="col-xl-9 col-md-9 col-sm-9">
                                <div class="entry-meta">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                href="{{ url('/news-author', $data->upload_by) }}">{{
                                                $data->upload_by }}</a></li>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                href="#"><time>{{
                                                    \Carbon\Carbon::parse( $data->date )->format('l') }}, {{
                                                    \Carbon\Carbon::parse( $data->date
                                                    )->toFormattedDateString() }}</time></a></li>
                                        <li class="d-flex align-items-center"><i class="bi bi-eye"></i> {{
                                            views($data)->count(); }}</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-3 col-sm-3">
                                <div class="d-flex justify-content-end">
                                    {!! Share::currentPage()->facebook()->twitter()->whatsapp(); !!}
                                </div>
                            </div>
                        </div>
                        <div class="entry-content">
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
                        <!-- <div class="entry-footer">
                            <i class="bi bi-folder"></i>
                            <ul class="cats">
                                <li><a href="#">Business</a></li>
                            </ul>

                            <i class="bi bi-tags"></i>
                            <ul class="tags">
                                <li><a href="#">Creative</a></li>
                                <li><a href="#">Tips</a></li>
                                <li><a href="#">Marketing</a></li>
                            </ul>
                        </div> -->

                    </article>
                    <!-- End blog entry -->

                    <!-- <div class="blog-author d-flex align-items-center">
                        <img src="{{ asset('front.flexstart/assets/img/blog/blog-author.jpg') }}"
                            class="rounded-circle float-left" alt="">
                        <div>
                            <h4>Jane Smith</h4>
                            <div class="social-links">
                                <a href="https://twitters.com/#"><i class="bi bi-twitter"></i></a>
                                <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                                <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                            </div>
                            <p>
                                Itaque quidem optio quia voluptatibus dolorem dolor. Modi eum sed possimus accusantium.
                                Quas repellat voluptatem officia numquam sint aspernatur voluptas. Esse et accusantium
                                ut unde voluptas.
                            </p>
                        </div>
                    </div> -->
                    <!-- End blog author bio -->

                </div>
                <!-- End blog entries list -->

                <div class="col-lg-4">

                    <div class="sidebar">

                        <h3 class="sidebar-title">Search</h3>
                        <div class="sidebar-item search-form">
                            {{Form::open(['route' => 'news.search','method' => 'get', ''])}}
                            {{Form::text('kolomcari', null,['class' => 'form-control', 'placeholder' => 'Title Post'])}}
                            <button type="submit"><i class="bi bi-search"></i></button>
                            {{Form::close()}}
                        </div>
                        <!-- End sidebar search formn-->

                        <x-category h3='sidebar-title' div='sidebar-item categories' />

                        <h3 class="sidebar-title">Recent Posts</h3>
                        <div class="sidebar-item recent-posts">
                            @foreach($news as $n)
                            <div class="post-item clearfix">
                                @forelse($n->gambar as $gambar)
                                @if($loop->iteration == 1)
                                <img src="{{ asset('storage/') }}/{{  $gambar->path }}" class="img-fluid"
                                    alt="{{ $gambar->file_name }}">
                                @endif
                                @empty
                                <img src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid" alt="soul of java">
                                @endforelse
                                <h4><a href="{{ url('/news-detail', $n->slug) }}">
                                        {{ \Illuminate\Support\Str::limit($n->title, 50, $end='...') }}
                                    </a></h4>
                                <time datetime="2020-01-01">{{
                                    \Carbon\Carbon::parse( $n->date
                                    )->toFormattedDateString() }}</time>
                            </div>
                            @endforeach
                        </div>
                        <!-- End sidebar recent posts-->

                        <!-- <h3 class="sidebar-title">Tags</h3>
                        <div class="sidebar-item tags">
                            <ul>
                                <li><a href="#">App</a></li>
                                <li><a href="#">IT</a></li>
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Mac</a></li>
                                <li><a href="#">Design</a></li>
                                <li><a href="#">Office</a></li>
                                <li><a href="#">Creative</a></li>
                                <li><a href="#">Studio</a></li>
                                <li><a href="#">Smart</a></li>
                                <li><a href="#">Tips</a></li>
                                <li><a href="#">Marketing</a></li>
                            </ul>
                        </div> -->
                        <!-- End sidebar tags-->

                    </div>
                    <!-- End sidebar -->

                </div>
                <!-- End blog sidebar -->

            </div>

        </div>
    </section>
    <!-- End Blog Single Section -->

</main>
@endsection
@push('after-script')
@endpush