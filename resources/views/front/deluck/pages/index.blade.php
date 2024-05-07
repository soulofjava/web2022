@extends('front.deluck.layouts.app')
@section('content')
<!-- Start Banner 
    ============================================= -->
<div class="banner-area auto-height title-uppercase small-first text-light text-center">
    <div id="bootcarousel" class="carousel inc-top-heading slide carousel-fade animate_text" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner carousel-zoom">
            @foreach(App\Models\News::with('gambarmuka')->where('terbit', 1)->where('highlight', 1)->latest('date')->take(3)->get() as $hl)
            <div class="item {{ $loop->first ? 'active' : '' }}">
                @if($hl->gambarmuka)
                <div class="slider-thumb bg-cover"
                    style="background-image: url('{{ route('helper.show-picture', ['path' => $hl->gambarmuka->path]) }}');">
                </div>
                @else
                <div class="slider-thumb bg-cover" style="background-image: url('img/soulofjava.jpg');">
                </div>
                @endif
                <div class="box-table">
                    <div class="box-cell shadow dark">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="content">
                                        <!-- <h3 data-animation="animated slideInDown">Kecamatan Kejajar</h3> -->
                                        <h1 data-animation="animated slideInDown">
                                            {{ $hl->title }}
                                        </h1>
                                        <a data-animation="animated slideInUp" class="btn btn-light border btn-md"
                                            href="{{ url('/news-detail', $hl->slug) }}">Lihat Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- End Wrapper for slides -->

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#bootcarousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#bootcarousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<!-- End Banner -->
<!-- Start Blog Area 
    ============================================= -->
<!-- <div class="blog-area default-padding bottom-less">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="site-heading text-center">
                    <h2>Latest News</h2>
                    <span class="devider"></span>
                    <p>
                        While mirth large of on front. Ye he greater related adapted proceed entered an. Through it
                        examine express promise no. Past add size game cold girl off how old
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="blog-items">
                <div class="col-md-6 single-item">
                    <div class="item">
                        <div class="thumb">
                            <a href="#"><img src="{{ asset ('img/soulofjava.jpg')}}" alt="Thumb"></a>
                        </div>
                        <div class="info">
                            <div class="date">
                                <h4>12 Nov, 2019</h4>
                            </div>
                            <h4>
                                <a href="#">delivered applauded affection out Peculiar trifling</a>
                            </h4>
                            <div class="meta">
                                <ul>
                                    <li>
                                        <a href="#"><i class="fas fa-user"></i> Admin</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fas fa-comments"></i> 23 Comments</a>
                                    </li>
                                </ul>
                            </div>
                            <p>
                                families believed if no elegance interest surprise an. It abode wrong miles an so delay
                                plate. She relation own put outlived may disposed
                            </p>
                            <a class="btn btn-theme border btn-md" href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 single-item">
                    <div class="item">
                        <div class="thumb">
                            <a href="#"><img src="{{ asset('img/soulofjava.jpg') }}" alt="Thumb"></a>
                        </div>
                        <div class="info">
                            <div class="date">
                                <h4>16 Apr, 2019</h4>
                            </div>
                            <h4>
                                <a href="#">Peculiar trifling absolute and wandered</a>
                            </h4>
                            <div class="meta">
                                <ul>
                                    <li>
                                        <a href="#"><i class="fas fa-user"></i> Admin</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fas fa-comments"></i> 32 Comments</a>
                                    </li>
                                </ul>
                            </div>
                            <p>
                                families believed if no elegance interest surprise an. It abode wrong miles an so delay
                                plate. She relation own put outlived may disposed
                            </p>
                            <a class="btn btn-theme border btn-md" href="#">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- End Blog Area -->
<!-- Start About
    ============================================= -->
<!-- <div class="about-area default-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-4 thumb">
                <img src="{{ asset('master/deluck/img/jajar.png') }}" alt="Thumb">
            </div>
            <div class="col-md-8 tabs-items">
                <div class="row">

                    <div class="tab-navs col-md-4">
                        <ul class="nav nav-pills">
                                <li class="active">
                                    <a data-toggle="tab" href="#tab1" aria-expanded="true">
                                        <i class="flaticon-story"></i> Our Story
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab2" aria-expanded="false">
                                        <i class="flaticon-shield"></i> Audit & Assurance
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab3" aria-expanded="false">
                                        <i class="flaticon-support-1"></i> 24/7 Live Support
                                    </a>
                                </li>
                            </ul>
                    </div>

                    <div class="tab-content-box col-md-8">
                        <div class="tab-content tab-content-info">
                            <div id="tab1" class="tab-pane fade active in">
                                <div class="info title">
                                    <h4>Has been working since 2000</h4>
                                    <h2>We Have 35+ Years Of Experiance In Standard Professional Services</h2>
                                    <p>
                                        However venture pursuit he am mr cordial. Forming musical am hearing studied be
                                        luckily. Ourselves for determine attending how led gentleman sincerity. Valley
                                        afford uneasy joy she thrown though bed set.
                                    </p>
                                    <p>
                                        Friendship so considered remarkably be to sentiments. Offered mention greater
                                        fifteen one promise because nor. Why denoting speaking fat indulged saw dwelling
                                        raillery.
                                    </p>
                                    <a class="btn btn-theme border btn-md" href="#">Read More</a>
                                </div>
                            </div>

                            <div id="tab2" class="tab-pane fade">
                                <div class="info title">
                                    <h3>We offer creative business</h3>
                                    <p>
                                        Calling nothing end fertile for venture way boy. Esteem spirit temper too say
                                        adieus who direct esteem. It esteems luckily mr or picture placing drawing no.
                                        Apartments frequently or motionless.
                                    </p>
                                    <p>
                                        Proposal its disposed eat advanced marriage sociable. Drawings led greatest add
                                        subjects endeavor gay remember. Principles one yet assistance you met
                                        impossible.
                                    </p>
                                    <ul>
                                        <li><i class="fas fa-check-circle"></i> Professional Workers</li>
                                        <li><i class="fas fa-check-circle"></i> Consumer satisfaction</li>
                                        <li><i class="fas fa-check-circle"></i> Transport & Logistics</li>
                                        <li><i class="fas fa-check-circle"></i> Financial Services</li>
                                        <li><i class="fas fa-check-circle"></i> Energy Environment</li>
                                        <li><i class="fas fa-check-circle"></i> Business Services </li>
                                    </ul>
                                </div>
                            </div>

                            <div id="tab3" class="tab-pane fade">
                                <div class="info title">
                                    <h3>Ask your question to us</h3>
                                    <p>
                                        Calling nothing end fertile for venture way boy. Esteem spirit temper too say
                                        adieus who direct esteem. It esteems luckily mr or picture placing drawing no.
                                        Apartments frequently or motionless on reasonable projecting expression. Way mrs
                                        end gave tall walk fact bed. Friendship so considered remarkably be to
                                        sentiments.
                                    </p>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td>Email</td>
                                                    <td>info@example.com</td>
                                                </tr>
                                                <tr>
                                                    <td>Phone</td>
                                                    <td>+123 456 7890</td>
                                                </tr>
                                                <tr>
                                                    <td>PO Box</td>
                                                    <td>1622 Colins Street West</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- End About -->

@endsection