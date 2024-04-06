<<<<<<< HEAD
<div class="container">
    <div class="row">
        <div class="col ">
            {{Form::open(['route' => 'news.search','method' => 'get', ''])}}
            {{Form::text('kolomcari', null,['class' => 'form-control mb-3 text-center',
            'placeholder' => 'Masukkan Judul Postingan'])}}
            <button type="submit" class="btn btn-primary" style="width: 100%;">Cari
                Postingan <i class="bi bi-search"></i></button>
            {{Form::close()}}
        </div>
=======
<div class="row">
    <div class="col">
        {{Form::open(['route' => 'news.search','method' => 'get', ''])}}
        {{Form::text('kolomcari', null,['class' => 'form-control mb-3 text-center',
        'placeholder' => 'Masukkan Judul Postingan / 2021-12-31'])}}
        <button type="submit" class="btn w-100 btn-warning mt-1">Cari Postingan <i class="bi bi-search"></i></button>
        {{Form::close()}}
>>>>>>> 57cd9d6f8615469020dc8a6e5e8bddd03a11010e
    </div>
</div>