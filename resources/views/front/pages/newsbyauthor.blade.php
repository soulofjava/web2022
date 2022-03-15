@extends('front.layouts.app')
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <!-- <ol>
                <li><a href="#">Home</a></li>
                <li>Blog</li>
            </ol> -->
            <h2>{{ $hasil }}</h2>

        </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-8 entries">
                    @foreach($data as $author)
                    <article class="entry">

                        <div class="entry-img">
                            <img src="{{ asset('storage/') }}/{{ $author->path}}" class="img-fluid" alt="">
                        </div>

                        <h2 class="entry-title">
                            <a href="{{ url('/news-detail', $author->id) }}">{{ $author->title }}</a>
                        </h2>

                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                        href="{{ url('/news-author', $author->upload_by) }}">{{
                                        $author->upload_by }}</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time>{{
                                            \Carbon\Carbon::parse( $author->date )->format('l') }}, {{
                                            \Carbon\Carbon::parse( $author->date
                                            )->toFormattedDateString() }}</time></a></li>
                            </ul>
                        </div>

                        <div class="entry-content">
                            <p>
                                Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi
                                praesentium.
                                Aliquam et
                                laboriosam eius aut nostrum quidem aliquid dicta.
                                Et eveniet enim. Qui velit est ea dolorem doloremque deleniti aperiam unde soluta. Est
                                cum
                                et quod
                                quos aut ut et sit sunt. Voluptate porro consequatur assumenda perferendis dolore.
                            </p>
                            <div class="read-more">
                                <a href="{{ url('/news-detail', $author->id) }}">Read More</a>
                            </div>
                        </div>

                    </article>
                    <!-- End blog entry -->
                    @endforeach

                    <div class="row" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-lg-12 d-flex justify-content-center">
                            {!! $data->render() !!}
                        </div>
                    </div>

                </div><!-- End blog entries list -->

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

                        <!-- <h3 class="sidebar-title">Categories</h3>
                        <div class="sidebar-item categories">
                            <ul>
                                <li><a href="#">General <span>(25)</span></a></li>
                                <li><a href="#">Lifestyle <span>(12)</span></a></li>
                                <li><a href="#">Travel <span>(5)</span></a></li>
                                <li><a href="#">Design <span>(22)</span></a></li>
                                <li><a href="#">Creative <span>(8)</span></a></li>
                                <li><a href="#">Educaion <span>(14)</span></a></li>
                            </ul>
                        </div> -->
                        <!-- End sidebar categories-->

                        <h3 class="sidebar-title">Recent Posts</h3>
                        <div class="sidebar-item recent-posts">
                            @foreach($news as $n)
                            <div class="post-item clearfix">
                                <img src="{{ asset('storage/') }}/{{ $n->path}}" alt="">
                                <h4><a href="{{ url('/news-detail', $n->id) }}">{{ $n->title }}</a></h4>
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

                    </div><!-- End sidebar -->

                </div><!-- End blog sidebar -->

            </div>

        </div>
    </section><!-- End Blog Section -->

</main>
@endsection
@push('after-script')
@endpush