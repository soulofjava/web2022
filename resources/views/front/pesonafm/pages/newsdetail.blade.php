@extends('front.pesonafm.layouts.app')
@section('content')
<div class="flex flex-col h-screen">
    <div class="flex-grow">
        <div class="container mx-auto py-1">

            <!-- ======= Start Judul ======= -->
            <a href="{{url('/')}}">
                <h1 class="text-4xl lg:text-8xl font-bold text-center my-10"><span
                        class="bg-gradient-to-r from-blue-500 to-teal-400 bg-clip-text text-transparent">Breaking
                        News
                        Pesona</span>
                </h1>
            </a>
            <!-- ======= End Judul ======= -->

            <div class="mt-10">
                <a class="bg-red-500 px-10 py-2 w-20 h-30  text-white text-center rounded-lg"
                    href="{{ url('/newsall') }}">Back</a>
            </div>

            <section
                class="max-w-7xl flex flex-col mx-auto justify-center shadow-xl items-center px-3 py-2 rounded-lg mb-8">
                <p class="text-3xl text-white px-4 py-8 text-center stroke-gray-500 font-bold sm:text-4xl sm:pt-18">
                    {{ $data->title }}
                </p>
                <p class="text-center">
                    <img class="max-w-lg h-auto rounded-lg" src="{{ route('helper.show-picture', ['path' => $data->path]) }}">
                </p>
                <br>
                <div class="w-full px-3 py-5 inset-5 bg-white opacity-95 text-justify rounded-lg">
                    <div class="flex justify-end mb-8">
                        <div class="text-black text-bold">
                            {{
                            \Carbon\Carbon::parse( $data->date )->format('l') }}, {{
                            \Carbon\Carbon::parse( $data->date
                            )->toFormattedDateString() }}
                        </div>
                    </div>
                    <hr>
                    <article class=" text-black font-serif">
                        {!! $data->description !!}
                    </article>
                    <hr>
                    <div class="flex justify-between mt-8">
                        <div class="text-black">Dilihat : {{
                            views($data)->count(); }} kali.</div>
                        <div class="text-black">
                            {!! Share::currentPage()->facebook()->twitter()->whatsapp(); !!}
                        </div>
                    </div>
                </div>
            </section>

            <div class="grid">
                <div class="mb-5 lg:invisible">
                    <div class="text-center mb-2">© 2023 DISKOMINFO by Isa Maulana Tantra</div>
                </div>
            </div>

            <x-ayo-promo />

        </div>
    </div>
    @endsection
    @push('after-script')
    @endpush
