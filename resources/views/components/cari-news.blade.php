<div>
    <div class="row">
        <div class="col ">
            {{Form::open(['route' => 'news.search','method' => 'get', ''])}}
            {{Form::text('kolomcari', null,['class' => 'form-control mb-3 text-center',
            'placeholder' => 'Masukkan Judul Postingan'])}}
            <button type="submit" class="btn btn-primary" style="width: 100%;">Cari
                Postingan <i class="bi bi-search"></i></button>
            {{Form::close()}}
        </div>
    </div>
</div>