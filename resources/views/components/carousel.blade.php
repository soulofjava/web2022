<div>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            @foreach($jjj->gambar as $key => $item)
            <li data-target="#myCarousel" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
            @endforeach
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            @forelse($jjj->gambar as $key => $gambar)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <img loading="lazy" src="{{ route('helper.show-picture', ['path' => $gambar->path]) }}" class="d-block w-100"
                    alt="{{ $gambar->file_name }}">
                <!-- <div class="carousel-caption">
                        <h3>Slide 1</h3>
                        <p>Some text for slide 1.</p>
                    </div> -->
            </div>
            @empty
            @endforelse
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>