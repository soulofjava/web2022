<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @forelse($jjj->gambar as $gambar)
        @if($loop->iteration == 1)
        <div class="carousel-item active">
            <img src="{{ asset('storage') }}/{{  $gambar->path }}" class="d-block w-100" alt="{{ $gambar->file_name }}">
        </div>
        @else
        <div class="carousel-item">
            <img src="{{ asset('storage') }}/{{  $gambar->path }}" class="d-block w-100" alt="{{ $gambar->file_name }}">
        </div>
        @endif
        @empty
        <div class="carousel-item active">
            <img src="{{ asset('img/soulofjava.jpg') }}" class="d-block w-100" alt="soul of java">
        </div>
        @endforelse
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>