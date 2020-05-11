@if ($paginator->hasPages())
    <div class="inline-flex items-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="rounded-l rounded-sm border border-gray-400 px-3 py-2 cursor-not-allowed no-underline">
                <i class="fas fa-chevron-left"></i>
            </span>
        @else
            <a
                class="rounded-l rounded-sm border-t border-b border-l border-gray-400 px-3 py-2 hover:bg-primary hover:text-white no-underline"
                href="{{ $paginator->previousPageUrl() }}"
                rel="prev"
            >
                <i class="fas fa-chevron-left"></i>
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="border-t border-b border-l border-gray-400 px-3 py-2 cursor-not-allowed no-underline">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="border-t border-b border-l border-gray-400 px-3 py-2 bg-primary text-white no-underline">{{ $page }}</span>
                    @else
                        <a class="border-t border-b border-l border-gray-400 px-3 py-2 hover:bg-primary hover:text-white no-underline" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="rounded-r rounded-sm border border-gray-400 px-3 py-2 hover:bg-primary hover:text-white no-underline" href="{{ $paginator->nextPageUrl() }}" rel="next">
                <i class="fas fa-chevron-right"></i>
            </a>
        @else
            <span class="rounded-r rounded-sm border border-gray-400 px-3 py-2 no-underline cursor-not-allowed">
                <i class="fas fa-chevron-right"></i>
            </span>
        @endif
    </div>
@endif
