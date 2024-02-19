<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @forelse($jjj->gambar as $gambar)

        @if($loop->iteration == 1)

        @if(Str::contains($gambar->path, 'https'))
        <div class="carousel-item active">
            <img src="{{ $gambar->path }}" class="d-block w-100" alt="{{ $gambar->file_name }}">
        </div>
        @else
        <div class="carousel-item active">
            <img src="{{ route('helper.show-picture', ['path' => $gambar->path]) }}" class="d-block w-100"
                alt="{{ $gambar->file_name }}">
        </div>
        @endif
        @else
        @if(Str::contains($gambar->path, 'https'))
        <div class="carousel-item">
            <img src="{{ $gambar->path }}" class="d-block w-100" alt="{{ $gambar->file_name }}">
        </div>
        @else
        <div class="carousel-item">
            <img src="{{ route('helper.show-picture', ['path' => $gambar->path]) }}" class="d-block w-100" alt="{{ $gambar->file_name }}">
        </div>
        @endif

        @endif
        @empty
        <!-- <div class="carousel-item active">
            <img src="{{ asset('img/soulofjava.jpg') }}" class="d-block w-100" alt="soul of java">
        </div> -->
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