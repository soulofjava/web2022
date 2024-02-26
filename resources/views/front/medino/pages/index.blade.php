@extends('front.medino.layouts.app')
@section('content')
    <!-- Banner Area Starts -->
    <section class="banner-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <!-- <h1>Selamat Datang</h1> -->
                    <!-- <p>{{ $data_website->web_description }}</p> -->
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area End -->

    <!-- Department Area Starts -->
    <!-- <section class="department-area section-padding4">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-top text-center">
                        <h2>Popular department</h2>
                        <p>Green above he cattle god saw day multiply under fill in the cattle fowl a all, living, tree
                            word link available in the service for subdue fruit.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="department-slider owl-carousel">
                        <div class="single-slide">
                            <div class="slide-img">
                                <img src="{{ asset('assets/front/medino/images/department1.jpg') }}" alt=""
                                    class="img-fluid">
                                <div class="hover-state">
                                    <a href="#"><i class="fa fa-stethoscope"></i></a>
                                </div>
                            </div>
                            <div class="single-department item-padding text-center">
                                <h3>cardiac clinic</h3>
                                <p>Hath creeping subdue he fish gred face whose spirit that seasons today multiply
                                    female midst upon</p>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="slide-img">
                                <img src="{{ asset('assets/front/medino/images/department2.jpg') }}" alt=""
                                    class="img-fluid">
                                <div class="hover-state">
                                    <a href="departments.html"><i class="fa fa-stethoscope"></i></a>
                                </div>
                            </div>
                            <div class="single-department item-padding text-center">
                                <h3>plastic surgery</h3>
                                <p>Hath creeping subdue he fish gred face whose spirit that seasons today multiply
                                    female midst upon</p>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="slide-img">
                                <img src="{{ asset('assets/front/medino/images/department3.jpg') }}" alt=""
                                    class="img-fluid">
                                <div class="hover-state">
                                    <a href="departments.html"><i class="fa fa-stethoscope"></i></a>
                                </div>
                            </div>
                            <div class="single-department item-padding text-center">
                                <h3>dental clinic</h3>
                                <p>Hath creeping subdue he fish gred face whose spirit that seasons today multiply
                                    female midst upon</p>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="slide-img">
                                <img src="{{ asset('assets/front/medino/images/department1.jpg') }}" alt=""
                                    class="img-fluid">
                                <div class="hover-state">
                                    <a href="departments.html"><i class="fa fa-stethoscope"></i></a>
                                </div>
                            </div>
                            <div class="single-department item-padding text-center">
                                <h3>cardiac clinic</h3>
                                <p>Hath creeping subdue he fish gred face whose spirit that seasons today multiply
                                    female midst upon</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Department Area Starts -->

    <!-- Patient Area Starts -->
    <!-- <section class="patient-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-top text-center">
                        <h2>Patient are saying</h2>
                        <p>Green above he cattle god saw day multiply under fill in the cattle fowl a all, living, tree
                            word link available in the service for subdue fruit.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="single-patient mb-4">
                        <img src="{{ asset('assets/front/medino/images/patient1.png') }}" alt="">
                        <h3>daren jhonson</h3>
                        <h5>hp specialist</h5>
                        <p class="pt-3">Elementum libero hac leo integer. Risus hac road parturient feugiat. Litora
                            cursus hendrerit bib elit Tempus inceptos posuere metus.</p>
                    </div>
                    <div class="single-patient">
                        <img src="{{ asset('assets/front/medino/images/patient2.png') }}" alt="">
                        <h3>black heiden</h3>
                        <h5>hp specialist</h5>
                        <p class="pt-3">Elementum libero hac leo integer. Risus hac road parturient feugiat. Litora
                            cursus hendrerit bib elit Tempus inceptos posuere metus.</p>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 align-self-center">
                    <div class="appointment-form text-center mt-5 mt-lg-0">
                        <h3 class="mb-5">appointment now</h3>
                        <form action="#">
                            <div class="form-group">
                                <input type="text" placeholder="Your Name" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Your Name'" required>
                            </div>
                            <div class="form-group">
                                <input type="email" placeholder="Your Email" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Your Email'" required>
                            </div>
                            <div class="form-group">
                                <input type="text" id="datepicker" placeholder="Date" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Date'" required>
                            </div>
                            <div class="form-group">
                                <textarea name="message" cols="20" rows="7" placeholder="Message" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Message'" required></textarea>
                            </div>
                            <a href="#" class="template-btn">appointment now</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Patient Area Starts -->

    <!-- News Area Starts -->
    @if ($news->count() != 0)
        <section class="news-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="section-top text-center">
                            <h2>Postingan Terbaru Kami</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($news as $n)
                        <div class="card col-lg-4 col-md-6 mb-3">
                            <div class="single-news">
                                <div class="news-img">
                                    @if(Storage::get($n->gambarmuka->path))
                                        <img src="{{ route('helper.show-picture', ['path' => $n->gambarmuka->path]) }}"
                                            class="img-fluid" alt="{{ $n->gambarmuka->file_name }}"
                                            style="height: 350px;">
                                    @else
                                        <img src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid" alt="soul of java"
                                            style="height: 350px;">
                                    @endif
                                </div>
                                <div class="news-text">
                                    <div class="news-date">
                                        {{ \Carbon\Carbon::parse($n->date)->isoFormat('dddd, D MMMM Y') }}
                                    </div>
                                    <h3><a
                                            href="{{ url('/news-detail', $n->slug) }}">{{ \Illuminate\Support\Str::limit($n->title, 50, $end = '...') }}</a>
                                    </h3>
                                    <a href="{{ url('/news-detail', $n->slug) }}" class="news-btn">Baca Lebih lanjut <i
                                            class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        @if ($loop->iteration == 3)
                        @break
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endif
<!-- News Area Starts -->
<x-seputar-wonosobo :message='$berita' />
@endsection
