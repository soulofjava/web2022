<div class="row">
    <div class="col">
        {{Form::open(['route' => 'news.search','method' => 'get', ''])}}
        {{Form::text('kolomcari', null,['class' => 'form-control mb-3 text-center',
        'placeholder' => 'Masukkan Judul Postingan / 2021-12-31'])}}
        <div class="d-grid" style="margin-top: 5px;">
            <button type="submit" class="btn btn-primary mt-1" style="{{ $style }}">Cari Postingan <i
                    class="bi bi-search"></i></button>
        </div>
        {{Form::close()}}
    </div>
</div>