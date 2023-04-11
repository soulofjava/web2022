@extends('front.pesonafm.layouts.app')
@section('content')
<div class="flex flex-col h-screen">
    <div class="flex-grow">
        <div class="container mx-auto py-1">

            <div class="mt-10">
                <a class="bg-red-500 px-10 py-2 w-20 h-30  text-white text-center rounded-lg"
                    href="{{ url('/') }}">Back</a>
            </div>

            <!-- ======= Buaper Section ======= -->
            <section id="buaper" class="portfolio">
                <div class="container px-3 py-2 mx-auto lg:pt-24 lg:px-32">
                    <div class="flex flex-wrap m-1 md:m-2">
                        @foreach($buaper as $b)
                        <div class="flex flex-wrap w-1/3">
                            <div class="w-full p-1 md:p-2">
                                <div class="max-w-sm rounded overflow-hidden shadow-lg ">
                                    <iframe class="w-full aspect-video md:aspect-square"
                                        src="{{ str_replace('watch?v=', 'embed/', $b->video )}}"
                                        allowfullscreen="allowfullscreen"></iframe>
                                    <div class="px-6 py-4 ">
                                        <div class="font-bold text-xl mb-2">{{ $b->deskripsi }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="row mt-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                        {{ $buaper->links('pagination::tailwind') }}
                    </div>
                </div>
            </section>
            <!-- End Buaper Section -->
            
        </div>
    </div>
    @endsection
    @push('after-script')
    @endpush