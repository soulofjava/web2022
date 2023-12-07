@if ($paginator->hasPages())
<div class="blog-pagination">
    <ul class="justify-content-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <!-- pojok kiri -->
        <!-- <li>
            <a href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li> -->
        @else
        <!-- pojok kiri ketika tidak di first page -->
        <!-- <li>
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                aria-label="@lang('pagination.previous')">&laquo;</a>
        </li> -->
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <!-- posisi saat ini -->
        <li class="page-item active" aria-current="page"><a href="#">{{ $page }}</a></li>
        @else
        <!-- button halaman lain -->
        <li><a href="{{ $url }}">{{ $page }}</a></li>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <!-- pojok kanan ketika tidak di last page -->
        <!-- <li>
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&raquo;</a>
        </li> -->
        @else
        <!-- pojok kanan -->
        <!-- <li>
            <a href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li> -->
        @endif
    </ul>
</div>
@endif