@if ($paginator->hasPages())
<style scoped>
a.disabled {
    pointer-events: none;
    color: #ccc;
}
</style>
<div class="row">
    <div class="col-12">
        <div class="user-pagination">
            <div class="d-flex justify-content-sm-end justify-content-end mt-1 mb-30">
                <nav class="atbd-page">
                    <ul class="atbd-pagination d-flex">
                        <li class="atbd-pagination__item">
                            {{-- Previous Page Link --}}
                            @if ($paginator->onFirstPage())
                            <a href="" class="atbd-pagination__link pagination-control disabled" aria-disabled="true"
                                aria-label="@lang('pagination.previous')">
                                <span class="la la-angle-left" aria-hidden="true"></span>
                            </a>
                            @else
                            <a class="atbd-pagination__link" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                                aria-label="@lang('pagination.previous')">
                                <span class="page-number">&lsaquo;</span>
                            </a>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($elements as $element)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))

                            <a class="atbd-pagination__link" aria-disabled="true"><span
                                    class="page-number">{{ $element }}</span></a>
                            @endif

                            {{-- Array Of Links --}}
                            @if (is_array($element))
                            @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                            <a class="atbd-pagination__link active" aria-current="page"><span
                                    class="page-number">{{ $page }}</span></a>
                            @else

                            <a href="{{ $url }}" class="atbd-pagination__link"><span
                                    class="page-number">{{ $page }}</span></a>
                            @endif
                            @endforeach
                            @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($paginator->hasMorePages())
                            <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"
                                class="atbd-pagination__link"><span class="page-number">&rsaquo;</span></a>
                            @else
                            <a class="atbd-pagination__link disabled" aria-disabled="true"
                                aria-label="@lang('pagination.next')"><span class="page-number"
                                    aria-hidden="true">&rsaquo;</span></a>
                            @endif
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- End of Pagination-->
        </div>
    </div>
</div>
@endif