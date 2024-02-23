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
            <div class="item {{ $key == 0 ? 'active' : '' }}">
                <img src="{{ route('helper.show-picture', ['path' => $gambar->path]) }}" alt="{{ $gambar->file_name }}">
                <!-- <div class="carousel-caption">
                    <h3>Slide 1</h3>
                    <p>Some text for slide 1.</p>
                </div> -->
            </div>
            @empty

            @endforelse
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <i class="fa fa-arrow-left"></i>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <i class="fa fa-arrow-right"></i>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>