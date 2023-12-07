<div>
    <div>
        @foreach ($foto->gambar as $item)
        <a data-fancybox="gallery" href="{{ asset('storage/') }}/{{  $item->path }}"><img
                src="{{ asset('storage/') }}/{{  $item->path }}" width="100%" class="img-fluid"></a>
        <br>
        @if(!$loop->last)
        <hr style="border: 5px dashed  grey;
  border-radius: 5px;">
        @endif
        <br>
        @endforeach
    </div>
</div>
@push ('after-script')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
@endpush