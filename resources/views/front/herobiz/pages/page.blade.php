@extends('front.herobiz.layouts.app')
@section('content')
<main id="main">
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Page</li>
            </ol>
            <h2>{{ $data->menu_name }}</h2>

        </div>
    </section>
    <section class="inner-page">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="card-content">
                                {!! $data->content !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection
@push('after-script')
@endpush