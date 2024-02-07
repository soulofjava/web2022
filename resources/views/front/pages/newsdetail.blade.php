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
                    <div class="image mb-25 wow fadeInUp delay-0-2s">
                        <x-carousel :jjj='$data' />
                    </div>
                    <ul class="blog-standard-header wow fadeInUp delay-0-2s">
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
                            <a href="contact.html"><i class="fab fa-facebook-f"></i></a>
                            <a href="contact.html"><i class="fab fa-twitter"></i></a>
                            <a href="contact.html"><i class="fab fa-linkedin-in"></i></a>
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
                        <h4 class="widget-title">Recent Courses</h4>
                        <ul>
                            <li>
                                <div class="image">
                                    <img src="{{ asset('assets/front/images/widgets/course1.jpg') }}" alt="Course">
                                </div>
                                <div class="content">
                                    <h6><a href="course-details.html">How to Learn Basic Web (UI) Design</a></h6>
                                    <span>By <a href="#">Williams</a></span>
                                </div>
                            </li>
                            <li>
                                <div class="image">
                                    <img src="{{ asset('assets/front/images/widgets/course2.jpg') }}" alt="Course">
                                </div>
                                <div class="content">
                                    <h6><a href="course-details.html">How to Learn Basic Web Development</a></h6>
                                    <span>By <a href="#">Somalia</a></span>
                                </div>
                            </li>
                            <li>
                                <div class="image">
                                    <img src="{{ asset('assets/front/images/widgets/course3.jpg') }}" alt="Course">
                                </div>
                                <div class="content">
                                    <h6><a href="course-details.html">How to Learn Basic (SEO) Marketing </a></h6>
                                    <span>By <a href="#">Blanchard</a></span>
                                </div>
                            </li>
                            <li>
                                <div class="image">
                                    <img src="{{ asset('assets/front/images/widgets/course4.jpg') }}" alt="Course">
                                </div>
                                <div class="content">
                                    <h6><a href="course-details.html">Business Strategy Managements</a></h6>
                                    <span>By <a href="#">Johnson</a></span>
                                </div>
                            </li>
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