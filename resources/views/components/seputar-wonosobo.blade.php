@if(App\Models\Component::where('slug', 'seputar-wonosobo')->where('active', '1')->first())
<section id="" class="">
    <div class="container" data-aos="">
        <header class="text-center">
            <h1>Seputar Wonosobo</h1>
            <!-- <p>Seputar Wonosobo</p> -->
        </header>
        <div class="row mt-4" style="margin-bottom: 22px;">
            @foreach($message as $art)
            <div class="col-lg-4 col-md-6 mb-3" style="display: flex">
                <div class="card">
                    <div class="">
                        <img src="https://diskominfo.wonosobokab.go.id/{{ $art['gambar_muka']['path'] }}{{ $art['gambar_muka']['file_name'] }}"
                            class="img-fluid" style="height: 320px;">
                    </div>
                    <span class="">
                        {{ \Carbon\Carbon::parse($art['created_at'])->format('l') }}, {{
                        \Carbon\Carbon::parse( $art['created_at']
                        )->toFormattedDateString() }}
                    </span>
                    <h3 class="">
                        {{ substr($art['judul_posting'],0,35) }}..
                    </h3>

                    <div class="d-flex flex-row-reverse">
                        <div class="p-2">
                            <a class="btn" style="background-color: #FF5E14; color: white;" target="_blank"
                                href="https://diskominfo.wonosobokab.go.id/detail/{{ $art['slug'] }}" class="">
                                <span>Read More</span><i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif