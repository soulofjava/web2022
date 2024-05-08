@if ($paginator->hasPages())
<div class="pagination-weapper text-center">
    <ul class="pagination clearfix">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <a class="" aria-hidden="true"><i class="fas fa-angle-left"></i>
            </a>
        </li>
        @else
        <li class="">
            <a class="" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                aria-label="@lang('pagination.previous')"><i class="fas fa-angle-left"></i></a>
        </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li class="" aria-disabled="true"><span class="">{{ $element }}</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="" aria-current="page"><a class="active">{{ $page }}</a></li>
        @else
        <li class=""><a class="" href="{{ $url }}">{{ $page }}</a></li>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li class="">
            <a class="" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i
                    class="fas fa-angle-right"></i></a>
        </li>
        @else
        <li class="" aria-disabled="true" aria-label="@lang('pagination.next')">
            <a class="" aria-hidden="true"><i class="fas fa-angle-right"></i></a>
        </li>
        @endif
    </ul>
</div>
@endif