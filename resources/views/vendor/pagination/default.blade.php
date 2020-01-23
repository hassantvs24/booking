@if ($paginator->hasPages())
    <div class="pagination ul-li clearfix">
        <ul>
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item prev-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}">Prev</a>
                </li>
            @else
                <li class="page-item prev-item active">
                    <a class="page-link" href="#!">Prev</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item"><a class="page-link" href="#!">{{ $element }}</a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active"><a class="page-link" href="#!">{{ $page }}</a></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item next-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}">Next</a>
                </li>

            @else
                <li class="page-item active next-item">
                    <a class="page-link" href="#!">Next</a>
                </li>
            @endif
        </ul>
    </div>
@endif
