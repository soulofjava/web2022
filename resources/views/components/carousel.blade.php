<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @forelse($jjj->gambar as $gambar)

        @if($loop->iteration == 1)
        <div class="carousel-item active">
            <img src="{{  url('storage/')}}/{{ $gambar->path }}" class="d-block w-100" alt="{{ $gambar->file_name }}">
        </div>
        @else
        <div class="carousel-item">
            <img src="{{ url('storage/')}}/{{ $gambar->path }}" class="d-block w-100" alt="{{ $gambar->file_name }}">
        </div>
        @empty
        <div class="carousel-item active">
            <img src="{{ asset('img/soulofjava.jpg') }}" class="d-block w-100" alt="soul of java">
        </div>
        @endforelse
    </div>
    <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </button>
</div>