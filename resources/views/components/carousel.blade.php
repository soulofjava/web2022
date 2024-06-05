<div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
        @forelse($jjj->gambar as $gambar)
        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
            <img loading="lazy" src="{{ route('helper.show-picture', ['path' => $gambar->path]) }}" class="d-block w-100"
                alt="{{ $gambar->file_name }}" style="width: 416px; height: 312px; object-fit: cover;">
        </div>
        @empty
        <div class="carousel-item active">
            <img loading="lazy" src="{{ asset('img/soulofjava.jpg') }}" class="d-block w-100" alt="soul of java">
        </div>
        @endforelse
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>