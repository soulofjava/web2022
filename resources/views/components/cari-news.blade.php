<div class="row">
    <div class="col">
        {{Form::open(['route' => 'news.search','method' => 'get', ''])}}
        {{Form::text('kolomcari', null,['class' => 'form-control mb-3 text-center',
        'placeholder' => 'Masukkan Judul Postingan / 2021-12-31'])}}
        <button type="submit" class="btn btn-block btn-primary mt-1" style="{{ $style }}">Cari Postingan <i
                class="bi bi-search"></i></button>
        {{Form::close()}}
    </div>
</div>