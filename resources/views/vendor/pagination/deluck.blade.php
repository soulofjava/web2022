@if ($paginator->hasPages())
<div class="col-lg-12 col-md-12">
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <!-- pojok kiri -->
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <i class="fas fa-long-arrow-alt-left"></i>
            </a>
        </li>
        @else
        <!-- pojok kiri ketika tidak di first page -->
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                aria-label="@lang('pagination.previous')"><i class="fas fa-long-arrow-alt-left"></i></a>
        </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li class="disabled" aria-disabled="true">{{ $element }}</li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <!-- posisi saat ini -->
        <li class="active" aria-current="page"><a class="page-link" href="#">{{ $page }}</a></li>
        @else
        <!-- button halaman lain -->
        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <!-- pojok kanan ketika tidak di last page -->
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"
                aria-label="@lang('pagination.next')"><i class="fas fa-long-arrow-alt-right"></i></a>
        </li>
        @else
        <!-- pojok kanan -->
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <i class="fas fa-long-arrow-alt-right"></i>
            </a>
        </li>
        @endif
    </ul>
</div>
@endif