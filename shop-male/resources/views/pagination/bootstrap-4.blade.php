@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="paginate-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="paginate-link" aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li class="paginate-item">
                    <a class="paginate-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="paginate-item disabled" aria-disabled="true"><span class="paginate-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="paginate-item active" aria-current="paginate"><span class="paginate-link">{{ $page }}</span></li>
                        @else
                            <li class="paginate-item"><a class="paginate-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="paginate-item">
                    <a class="paginate-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="paginate-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="paginate-link" aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
