@push('after-style')
<style>
    .mal {
        -moz-box-sizing: border-box;
        height: 82px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
@endpush
<div class="row mt-3">
    <div class="col-sm-12 col-lg-2 mt-1">
        <a class="{{ $btn }} mal" style="background: {{ $bc }}; color: {{ $tc }};" href="{{ url('/newsall') }}">
            <button style="background: none; color: white !important;">Show
                All</button>
        </a>
    </div>
    <div class="col-sm-12 col-lg-2 mt-1">
        <a class="{{ $btn }} mal" style="background: {{ $bc }}; color: {{ $tc }};"
            href="{{ url('newscategory') }}/KATEGORI_NEWS_4">
            <button style="background: none; color: white !important;">Berita</button></a>
    </div>
    <div class="col-sm-12 col-lg-2 mt-1">
        <a class="{{ $btn }} mal" style="background: {{ $bc }}; color: {{ $tc }};"
            href="{{ url('newscategory') }}/KATEGORI_NEWS_1">
            <button style="background: none; color: white !important;">Dokumentasi</button></a>
        </a>
    </div>
    <div class="col-sm-12 col-lg-2 mt-1">
        <a class="{{ $btn }} mal" style="background: {{ $bc }}; color: {{ $tc }};"
            href="{{ url('newscategory') }}/KATEGORI_NEWS_3">
            <button style="background: none; color: white !important;">Notulensi</button></a>
    </div>
    <div class="col-sm-12 col-lg-2 mt-1">
        <a class="{{ $btn }} mal" style="background: {{ $bc }}; color: {{ $tc }};"
            href="{{ url('newscategory') }}/KATEGORI_NEWS_2">
            <button style="background: none; color: white !important;">Press Release</button>
        </a>
    </div>
    <div class="col-sm-12 col-lg-2 mt-1">
        <a class="{{ $btn }} mal" style="background: {{ $bc }}; color: {{ $tc }};"
            href="{{ url('newscategory') }}/KATEGORI_NEWS_0">
            <button style="background: none; color: white !important;">Sambutan</button></a>
    </div>
</div>