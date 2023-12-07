@if ($paginator->hasPages())
<div aria-label="pagination-wrapper centred">
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <!-- pojok kiri -->
        <li aria-disabled="true" aria-label="@lang('pagination.previous')">
            <a aria-hidden="true">
                <i class="fas fa-angle-left"></i>
            </a>
        </li>
        @else
        <!-- pojok kiri ketika tidak di first page -->
        <li>
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                <i class="fas fa-angle-left"></i>
            </a>
        </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <!-- posisi saat ini -->
        <li aria-current="page">
            <a class="active">{{ $page }}</a>
        </li>
        @else
        <!-- button halaman lain -->
        <li>
            <a href="{{ $url }}">{{ $page }}</a>
        </li>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <!-- pojok kanan ketika tidak di last page -->
        <li>
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                <i class="fas fa-angle-right"></i>
            </a>
        </li>
        @else
        <!-- pojok kanan -->
        <li aria-disabled="true" aria-label="@lang('pagination.next')">
            <a aria-hidden="true">
                <i class="fas fa-angle-right"></i>
            </a>
        </li>
        @endif
    </ul>
</div>
@endif