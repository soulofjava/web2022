@extends('front.atorn.layouts.app')
@section('content')
<!-- Page banner Area -->
<div class="page-banner bg-1">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-content">
                    <h2>Gallery</h2>
                    <ul>
                        <li><a href="{{ url('') }}">Home <i class="las la-angle-right"></i></a></li>
                        <li>All Photos From Our Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page banner Area -->

<!-- Attorney Area -->
<div class="attorney-area ptb-100">
    <div class="container">
        <div class="row">
            @foreach($gallery as $g)
            <div class="col-lg-4 col-sm-6" style="display: flex">
                <div class="attorney-card">
                    @if(Storage::get($g->path))
                    <a data-fancybox="gallery" href="{{ route('helper.show-picture', ['path' => $g->path]) }}"><img
                            src="{{ route('helper.show-picture', ['path' => $g->path]) }}" class="img-fluid"></a>
                    @else
                    <a data-fancybox="gallery" href="{{ asset('img/soulofjava.jpg') }}"><img
                            src="{{ asset('img/soulofjava.jpg') }}" class="img-fluid" alt="soulofjava"></a>
                    @endif
                    <div class="attorney-card-text">
                        <p>{{ $g->description }}</p>
                        <ul>
                            <li>
                                {!! Share::page(Request::getHttpHost(), $g->title)
                                ->facebook(); !!}
                            </li>
                            <li>
                                {!! Share::page(Request::getHttpHost(), $g->title)
                                ->twitter(); !!}
                            </li>
                            <li>
                                {!! Share::page(Request::getHttpHost(), $g->title)
                                ->whatsapp(); !!}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Pagination -->
        {{ $gallery->links('vendor.pagination.atorn') }}
    </div>
</div>
<!-- End Attorney Area -->
@endsection
@push('after-script')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
@endpush