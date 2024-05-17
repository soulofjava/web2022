@extends('back.sneat.layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-8 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Welcome Back {{ Auth::user()->name }}! 🎉</h5>
                            <p class="mb-4">
                                @php
                                $hariLabels = [''];
                                $totalPengunjung = [];

                                foreach ($statPengPerHari as $hari => $jumlahPengunjung) {
                                $hariLabels[] = $hari;
                                $totalPengunjung[] = $jumlahPengunjung;
                                }
                                @endphp

                                <!-- You have done <span class="fw-bold">72%</span> more sales today.
                                Check your new badge in
                                your profile. -->
                            </p>

                            <!-- <a href="javascript:;" class="btn btn-sm btn-outline-primary">View
                                Badges</a> -->
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="{{ asset('assets/back/sneat/assets/img/illustrations/man-with-laptop-light.png') }}"
                                height="140" alt="View Badge User"
                                data-app-dark-img="illustrations/man-with-laptop-dark.png') }}"
                                data-app-light-img="illustrations/man-with-laptop-light.png') }}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
            <div class="card">
                <div class="card-body px-0">
                    <div class="tab-content p-0">
                        <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
                            <!-- <div class="d-flex p-4 pt-3">
                                <div class="avatar flex-shrink-0 me-3">
                                    <img src="{{ asset('assets/back/sneat/assets/img/icons/unicons/wallet.png') }}"
                                        alt="User" />
                                </div>
                                <div>
                                    <small class="text-muted d-block">Statistik Pengunjung Harian</small>
                                    <div class="d-flex align-items-center">
                                        <h6 class="mb-0 me-1">$459.10</h6>
                                        <small class="text-success fw-semibold">
                                            <i class="bx bx-chevron-up"></i>
                                            42.9%
                                        </small>
                                    </div>
                                </div>
                            </div> -->
                            <div id="incomeChart2"></div>
                            <div class="d-flex justify-content-center pt-4 gap-2">
                                <!-- <div class="flex-shrink-0">
                                    <div id="expensesOfWeek"></div>
                                </div> -->
                                <div>
                                    <p class="mb-n1 mt-1">Statistik Pengunjung Harian</p>
                                    <!-- <small class="text-muted">$39 less than last week</small> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
            <div class="row">
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <!-- <div class="card-title d-flex align-items-start justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <img src="{{ asset('assets/back/sneat/assets/img/icons/unicons/chart-success.png') }}"
                                                            alt="chart success" class="rounded" />
                                                    </div>
                                                    <div class="dropdown">
                                                        <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                                            <a class="dropdown-item" href="javascript:void(0);">View
                                                                More</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                        </div>
                                                    </div>
                                                </div> -->
                            <span class="fw-semibold d-block mb-1">Total Pengunjung</span>
                            <h3 class="card-title mb-2">{{ $counter_web }}</h3>
                            <!-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>
                                                    +72.80%</small> -->
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <!-- <div class="card-title d-flex align-items-start justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <img src="{{ asset('assets/back/sneat/assets/img/icons/unicons/wallet-info.png') }}"
                                                            alt="Credit Card" class="rounded" />
                                                    </div>
                                                    <div class="dropdown">
                                                        <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                                            <a class="dropdown-item" href="javascript:void(0);">View
                                                                More</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                        </div>
                                                    </div>
                                                </div> -->
                            <span>Total Postingan</span>
                            <h3 class="card-title text-nowrap mb-1">{{ $news_all }}</h3>
                            <!-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>
                                                    +28.42%</small> -->
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <!-- <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="{{ asset('assets/back/sneat/assets/img/icons/unicons/paypal.png') }}"
                                        alt="Credit Card" class="rounded" />
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                        <a class="dropdown-item" href="javascript:void(0);">View
                                            More</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div> -->
                            <span class="d-block mb-1">Total Agenda</span>
                            <h3 class="card-title text-nowrap mb-2">{{ $agenda }}</h3>
                            <!-- <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i>
                                -14.82%</small> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            </div>
        </div>
    </div>
</div>
@endsection
@push('after-script')
<script>
    let cardColor, headingColor, axisColor, shadeColor, borderColor;

    cardColor = config.colors.white;
    headingColor = config.colors.headingColor;
    axisColor = config.colors.axisColor;
    borderColor = config.colors.borderColor;

    const incomeChartEl = document.querySelector('#incomeChart2');
    const incomeChartConfig = {
        series: [
            {
                data: {!! json_encode($totalPengunjung) !!},
                name: 'Pengunjung' // Nama dataset
            }
        ],
    chart: {
        height: 215,
            parentHeightOffset: 0,
                parentWidthOffset: 0,
                    toolbar: {
            show: false
        },
        type: 'area'
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        width: 2,
            curve: 'smooth'
    },
    legend: {
        show: false
    },
    markers: {
        size: 6,
            colors: 'transparent',
                strokeColors: 'transparent',
                    strokeWidth: 4,
                        discrete: [
                            {
                                fillColor: config.colors.white,
                                seriesIndex: 0,
                                dataPointIndex: {!! count($totalPengunjung) - 1 !!}, // Penanda untuk poin terakhir
                                strokeColor: config.colors.primary,
                                strokeWidth: 2,
                                size: 6,
                                radius: 8
                            }
                        ],
                            hover: {
            size: 7
        }
    },
    colors: [config.colors.primary],
        fill: {
        type: 'gradient',
            gradient: {
            shade: shadeColor,
                shadeIntensity: 0.6,
                    opacityFrom: 0.5,
                        opacityTo: 0.25,
                            stops: [0, 95, 100]
        }
    },
    grid: {
        borderColor: borderColor,
            strokeDashArray: 3,
                padding: {
            top: -20,
                bottom: -8,
                    left: -10,
                        right: 8
        }
    },
    xaxis: {
        categories: {!! json_encode($hariLabels) !!},
        axisBorder: {
            show: false
        },
        axisTicks: {
            show: false
        },
        labels: {
            show: true,
                style: {
                fontSize: '13px',
                    colors: axisColor
            }
        }
    },
    yaxis: {
        labels: {
            show: false
        },
        min: 0,
            max: 500,
                tickAmount: 4
    },
    
    };
    if (typeof incomeChartEl !== undefined && incomeChartEl !== null) {
        const incomeChart = new ApexCharts(incomeChartEl, incomeChartConfig);
        incomeChart.render();
    }
</script>
@endpush