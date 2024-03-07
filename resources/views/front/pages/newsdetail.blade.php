@extends('front.layouts.app')
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center"
        style="background-image: url('assets/front/assets/img/breadcrumbs-bg.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

            <!-- <h2>Blog Details</h2> -->
            <ol>
                <li><a href="{{ url('/') }}">Beranda</a></li>
                <li>Postingan</li>
            </ol>

        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-5">

                <div class="{{ ($data->dip == 1) ? 'col-lg-12' : 'col-lg-8' }}">

                    <article class="blog-details">

                        <div class="post-img">
                            <x-carousel :jjj='$data' />
                        </div>

                        <h2 class="title">{{ $data->title }}</h2>

                        <div class="meta-top">
                            <div class="row">
                                <div class="col">
                                    <ul>
                                        <li class="flex align-items-center">
                                            <i class="bi bi-person"></i>
                                            <a href="#">
                                                {{ $data->uploader->name }}
                                            </a>
                                        </li>
                                        <li class="flex align-items-center">
                                            <i class="bi bi-clock"></i>
                                            <a href="#">
                                                <time datetime="2020-01-01">
                                                    {{ \Carbon\Carbon::parse($data->date)->format('l') }},
                                                    {{ \Carbon\Carbon::parse( $data->date)->toFormattedDateString() }}
                                                </time>
                                            </a>
                                        </li>
                                        <li class="flex align-items-center">
                                            <i class="bi bi-eye"></i>
                                            <a href="#">
                                                {{ views($data)->count(); }} Views
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-2">
                                    <div class="d-flex flex-row-reverse">
                                        {!! Share::currentPage()->facebook()->twitter()->whatsapp(); !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End meta top -->

                        <div class="content" style="width: max-content;">
                            {!! $data->content !!}
                        </div>
                        <!-- End post content -->

                        <!-- <div class="meta-bottom">
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
                        <!-- End meta bottom -->

                    </article>
                    <!-- End blog post -->

                    <!-- <div class="post-author d-flex align-items-center">
                        <img src="{{ asset('assets/front/assets/img/blog/blog-author.jpg') }}"
                            class="rounded-circle flex-shrink-0" alt="">
                        <div>
                            <h4>Jane Smith</h4>
                            <div class="social-links">
                                <a href="https://twitters.com/#"><i class="bi bi-twitter"></i></a>
                                <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                                <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                            </div>
                            <p>
                                Itaque quidem optio quia voluptatibus dolorem dolor. Modi eum sed possimus accusantium.
                                Quas repellat
                                voluptatem officia numquam sint aspernatur voluptas. Esse et accusantium ut unde
                                voluptas.
                            </p>
                        </div>
                    </div> -->
                    <!-- End post author -->

                    @if($data->komentar)
                    <!-- Start blog comments -->
                    <div class="comments">

                        <h4 class="comments-count">{{ App\Models\Comment::where('news_id', $data->id)->count() }}
                            Comments
                        </h4>

                        @foreach(App\Models\Comment::where('news_id', $data->id)->get() as $com)
                        <div id="comment-1" class="comment">
                            <div class="d-flex">
                                <div class="comment-img">
                                    <img src="https://ui-avatars.com/api/?name={{ $com->name }}" alt="">
                                </div>
                                <div>
                                    <h5>
                                        <a href="">{{ $com->name }}</a>
                                    </h5>
                                    <time datetime="2020-01-01">
                                        {{ \Carbon\Carbon::parse($com->created_at)->toFormattedDateString() }}
                                    </time>
                                    <p>
                                        {{ $com->comments }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <div class="reply-form">

                            <h4>Leave a Reply</h4>
                            <p>Your email address will not be published. Required fields are marked * </p>
                            {{Form::open(['route' => 'komentar','method' => 'post', ''])}}
                            {{Form::hidden('id', $data->id)}}
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    {{Form::text('name', null, ['class' => 'form-control',
                                    'placeholder' => 'Your Name*'])}}
                                    @error('name')
                                    <div id="defaultFormControlHelp" class="form-text" style="color: red;">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    {{Form::text('email', null, ['class' => 'form-control',
                                    'placeholder' => 'Your Email*'])}}
                                    @error('email')
                                    <div id="defaultFormControlHelp" class="form-text" style="color: red;">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col form-group">
                                    {{Form::textarea('comments', null, ['class' => 'form-control',
                                    'placeholder' => 'Your Comment*'])}}
                                    @error('comments')
                                    <div id="defaultFormControlHelp" class="form-text" style="color: red;">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col form-group">
                                    <div class="col-sm-12 col-md-12 captcha text-center mb-3">
                                        <span>{!! captcha_img() !!}</span>
                                        <!-- <button type="button" class="btn btn-danger" class="reload" id="reload">
                                            &#x21bb;
                                        </button> -->
                                    </div>
                                    <div class="col-sm-12 col-md-12 mb-3">
                                        {{Form::number('captcha', null,['class' => 'form-control',
                                        'placeholder' => 'Enter Captcha Result',
                                        'required'])}}
                                        @error('captcha')
                                        <div id="defaultFormControlHelp" class="form-text" style="color: red;">
                                            Captcha Salah
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Post Comment</button>

                            {{Form::close()}}

                        </div>

                    </div>
                    <!-- End blog comments -->
                    @endif

                </div>

                <div class="{{ ($data->dip == 1) ? 'col-lg-0' : 'col-lg-4' }}">

                    <div class="sidebar">

                        <div class="sidebar-item search-form">
                            <h3 class="sidebar-title">Cari</h3>
                            {{Form::open(['route' => 'news.search','method' => 'get', '','class' => 'mt-3'])}}
                            {{Form::text('kolomcari', null,['class' => 'form-control',
                            'placeholder' => 'Judul Postingan'])}}
                            <button type="submit"><i class="bi bi-search"></i></button>
                            {{Form::close()}}
                        </div>
                        <!-- End sidebar search formn-->

                        <!-- <div class="sidebar-item categories">
                            <h3 class="sidebar-title">Categories</h3>
                            <ul class="mt-3">
                                <li><a href="#">General <span>(25)</span></a></li>
                                <li><a href="#">Lifestyle <span>(12)</span></a></li>
                                <li><a href="#">Travel <span>(5)</span></a></li>
                                <li><a href="#">Design <span>(22)</span></a></li>
                                <li><a href="#">Creative <span>(8)</span></a></li>
                                <li><a href="#">Educaion <span>(14)</span></a></li>
                            </ul>
                        </div> -->
                        <!-- End sidebar categories-->

                        <div class="sidebar-item recent-posts">
                            <h3 class="sidebar-title">Recent Posts</h3>

                            <div class="mt-3">
                                @foreach($news as $n)
                                <div class="post-item mt-3">
                                    @if($n->gambarmuka)
                                    @if(Str::contains($n->gambarmuka, 'https'))
                                    <img src="{{  $n->gambarmuka->path }}" class="img-fluid"
                                        alt="{{ $n->gambarmuka->file_name }}">
                                    @else
                                    <img src="{{ route('helper.show-picture', ['path' => $n->gambarmuka->path]) }}"
                                        class="img-fluid" alt="{{ $n->gambarmuka->file_name }}">
                                    @endif
                                    @else
                                    <img src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid" alt="soul of java">
                                    @endif

                                    <div>
                                        <h4>
                                            <a href="{{ url('/news-detail', $n->slug) }}">
                                                {{ \Illuminate\Support\Str::limit($n->title, 50, $end='...')
                                                }}
                                            </a>
                                        </h4>
                                        <time datetime="2020-01-01">
                                            {{ \Carbon\Carbon::parse( $n->date)->toFormattedDateString() }}
                                        </time>
                                    </div>
                                </div>
                                <!-- End recent post item-->
                                @endforeach
                            </div>

                        </div>
                        <!-- End sidebar recent posts-->

                        <!-- <div class="sidebar-item tags">
                            <h3 class="sidebar-title">Tags</h3>
                            <ul class="mt-3">
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
                    <!-- End Blog Sidebar -->

                </div>
            </div>

        </div>
    </section>
    <!-- End Blog Details Section -->

</main>
<!-- End #main -->
@endsection
@push('after-script')
<script>
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });
</script>
@endpush