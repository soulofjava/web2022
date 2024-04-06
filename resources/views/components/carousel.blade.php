<<<<<<< HEAD
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
=======
<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
>>>>>>> 57cd9d6f8615469020dc8a6e5e8bddd03a11010e
    <div class="carousel-inner">
        @forelse($jjj->gambar as $gambar)

        @if($loop->iteration == 1)

        @if(Str::contains($gambar->path, 'https'))
        <div class="carousel-item active">
<<<<<<< HEAD
            <img src="{{ route('helper.show-picture', ['path' => $gambar->path]) }}" class="d-block w-100"
                alt="{{ $gambar->file_name }}">
        </div>
        @else
        <div class="carousel-item">
=======
            <img src="{{ $gambar->path }}" class="d-block w-100" alt="{{ $gambar->file_name }}">
        </div>
        @else
        <div class="carousel-item active">
>>>>>>> 57cd9d6f8615469020dc8a6e5e8bddd03a11010e
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
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>