@extends('front.appway.layouts.app')
@section('content')
<!-- preloader -->
<div class="preloader"></div>
<!-- preloader -->

<!-- page-title -->
<section class="page-title" style="background-image: url('/assets/front/appway/images/background/pagetitle-bg.png');">

    <div class="anim-icons">
        <div class="icon icon-1"><img src="{{ asset('assets/front/appway/images/icons/anim-icon-17.png') }}" alt="">
        </div>
        <div class="icon icon-2 rotate-me"><img src="{{ asset('assets/front/appway/images/icons/anim-icon-18.png') }}"
                alt=""></div>
        <div class="icon icon-3 rotate-me"><img src="{{ asset('assets/front/appway/images/icons/anim-icon-19.png') }}"
                alt=""></div>
        <div class="icon icon-4"></div>
    </div>
    <div class="container">
        <div class="content-box clearfix">
            <div class="title-box pull-left">
                <h1>Buku Tamu</h1>
                <!-- <p>Reach out to the world’s most reliable IT services.</p> -->
            </div>
            <!-- <ul class="bread-crumb pull-right">
                <li>Blog Details</li>
                <li><a href="/">Home</a></li>
            </ul> -->
        </div>
    </div>
</section>
<!-- page-title end -->
<div class="blog-area full-blog blog-standard full-blog default-padding">
    <div class="container">
        <div class="blog-items">
            <div class="row">
                <div class="col">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="card-content">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <div class="form-group">
                                            <button type="button" data-toggle="modal" data-target="#exampleModal"
                                                class="theme-btn-two">Add Guest</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Guest</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            {{Form::open(['url' => 'guest','method' => 'post', 'files'
                                            => 'true', ''])}}
                                            <div class="modal-body">

                                                <div class="form-group label-floating">
                                                    <label class="control-label">Nama</label>
                                                    {{Form::text('name', null,['class' => 'form-control'])}}
                                                </div>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Instansi</label>
                                                    {{Form::text('instansi', null,['class' => 'form-control'])}}
                                                </div>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Keperluan</label>
                                                    {{Form::text('keperluan', null,['class' => 'form-control'])}}
                                                </div>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Jumlah</label>
                                                    {{Form::number('jumlah', null,['class' => 'form-control'])}}
                                                </div>
                                                @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="theme-btn-one close"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="theme-btn-two">Save</button>
                                            </div>
                                            {{Form::close()}}
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal -->
                                <table id="datatables" class="table table-striped" cellspacing="0" width="100%"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tanggal</th>
                                            <th>Nama</th>
                                            <th>Instansi</th>
                                            <th>Keperluan</th>
                                            <th>Jumlah Tamu</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('after-script')
<script type="text/javascript">
    $('#datatables').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        responsive: true,
        processing: true,
        serverSide: true,
        lengthChange: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records",
        },
        columns: [
            { data: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'tgl' },
            { data: 'name', name: 'name' },
            { data: 'instansi', name: 'instansi' },
            { data: 'keperluan', name: 'keperluan' },
            { data: 'jumlah', name: 'jumlah' },
        ]

    });
        // var table = $('#datatables').DataTable();
        // $('.card .material-datatables label').addClass('form-group');
</script>
@endpush