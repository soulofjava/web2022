@extends('front.pesonafm.layouts.app')
@section('content')
<div class="flex flex-col h-screen">
    <div class="flex-grow">
        <div class="container mx-auto py-1">

            <!-- ======= Start Judul ======= -->
            <a href="{{url('/')}}">
                <h1 class="font-bold text-4xl lg:text-8xl text-center my-10"><span
                        class="bg-gradient-to-r from-blue-500 to-teal-400 bg-clip-text text-transparent">Breaking
                        News
                        Pesona</span>
                </h1>
            </a>
            <!-- ======= End Judul ======= -->

            <!-- ======= Start Button Back and Search ======= -->
            <div class="flex justify-between mt-10">
                <div class="grid place-items-center">
                    <div>
                        <a class="bg-red-500 px-10 py-2 w-20 h-30 text-white text-center rounded-lg"
                            href="{{ url('/') }}">Back</a>
                    </div>
                </div>
                <div>
                    <div class="text-black">
                        {{Form::open(['route' => 'news.search','method' => 'get'])}}
                        {{Form::text('kolomcari', null,['class' => 'form-control rounded-lg text-center',
                        'placeholder' => 'Search Title Post'])}}
                        <button type="submit"></button>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
            <!-- ======= End Button Back and Search ======= -->

            <div class="container my-24 px-6 mx-auto">

                <!-- ======= Start News Section ======= -->
                <section class="mb-32">
                    <div class="flex flex-wrap m-1 md:m-2">
                        <div class="grid lg:grid-cols-2 xl:grid-cols-3 gap-4">
                            @foreach($news as $n)
                            <div class="flex flex-wrap hover:scale-125 focus:outline-none px-6 py-5">
                                <div class="w-full p-3 md:p-2">
                                    <div class="relative overflow-hidden bg-slate-800 shadow-lg rounded-lg"
                                        style="background-position: 50%;" data-mdb-ripple="true"
                                        data-mdb-ripple-color="light">
                                        <a href="{{ url('/news-detail', $n->slug) }}">
                                            @if(Storage::get($n->path))
                                            <img src="{{ route('helper.show-picture', ['path' => $n->path]) }}"
                                                class=" bg-blend-normal rounded-lg" alt="image" />
                                            @else
                                            <img src="{{ asset('assets/front/pesonafm/Radio Pesona 2 white bg (1).jpg') }}"
                                                class="img-fluid rounded-lg" alt="image" />
                                            @endif
                                            <div class="px-4 py-2 rounded-lg space-y-3">
                                                <p class="text-center text-white z-10" style="top: 50%; left: 50%;">
                                                    {{ \Carbon\Carbon::parse($n->date)->format('l') }},
                                                    {{
                                                    \Carbon\Carbon::parse( $n->date
                                                    )->toFormattedDateString() }}
                                                </p>
                                                <h3 class="text-center text-white font-bold">{{ $n->title }}
                                                </h3>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>
                <!-- End News Section -->

                <div class="row mt-3">
                    <div class="col-lg-12 d-flex justify-content-center">
                        {{ $news->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>

            <div class="grid">
                <div class="mb-5 lg:invisible">
                    <div class="text-center mb-2">© 2023 DISKOMINFO by Isa Maulana Tantra</div>
                </div>
            </div>

        </div>
    </div>
    @endsection
    @push('after-script')
    @endpush