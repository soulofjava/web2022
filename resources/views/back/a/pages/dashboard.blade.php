@extends('back.a.layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        {{ Breadcrumbs::render('dashboard') }}
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">collections</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Tips & Trick</p>
                        <h3 class="card-title">{{ $gallery_all }}</h3>
                    </div>
                    <div class="card-footer">
                        <!-- <div class="stats">
                            <i class="material-icons text-danger">warning</i>
                            <a href="#pablo">Get More Space...</a>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="rose">
                        <i class="material-icons">event_note</i>
                    </div>
                    <div class="card-content">
                        <p class="category">News</p>
                        <h3 class="card-title">{{ $news_all }}</h3>
                    </div>
                    <div class="card-footer">
                        <!-- <div class="stats">
                            <i class="material-icons">local_offer</i> Tracked from Google Analytics
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="green">
                        <i class="material-icons">trending_up</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Total Pengunjung</p>
                        <h3 class="card-title">{{ $counter_web }}</h3>
                    </div>
                    <div class="card-footer">
                        <!-- <div class="stats">
                            <i class="material-icons">local_offer</i> Tracked from Google Analytics
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="blue">
                        <i class="material-icons">trending_up</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Pengunjung Hari ini</p>
                        <h3 class="card-title">{{ $counterH }}</h3>
                    </div>
                    <div class="card-footer">
                        <!-- <div class="stats">
                            <i class="material-icons">local_offer</i> Tracked from Google Analytics
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="purple">
                        <i class="material-icons">trending_up</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Pengunjung Kemarin</p>
                        <h3 class="card-title">{{ $counterK }}</h3>
                    </div>
                    <div class="card-footer">
                        <!-- <div class="stats">
                            <i class="material-icons">local_offer</i> Tracked from Google Analytics
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="black">
                        <i class="material-icons">trending_up</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Pengunjung Minggu Ini</p>
                        <h3 class="card-title">{{ $counterM }}</h3>
                    </div>
                    <div class="card-footer">
                        <!-- <div class="stats">
                            <i class="material-icons">local_offer</i> Tracked from Google Analytics
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="red">
                        <i class="material-icons">trending_up</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Pengunjung Bulan Ini</p>
                        <h3 class="card-title">{{ $counterB }}</h3>
                    </div>
                    <div class="card-footer">
                        <!-- <div class="stats">
                            <i class="material-icons">local_offer</i> Tracked from Google Analytics
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('after-script')
@endpush