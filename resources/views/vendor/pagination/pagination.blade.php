@if ($paginator->hasPages())
    {{-- <div class="pagenation">
        <a class="pagenation_not" href="">前へ</a>
        <a class="@if($field === $fields['IT']) pagenation_select_it @else pagenation_select_design @endif" href="">1</a>
        <a href="">2</a>
        <a href="">3</a>
        <a class="pagenation_dotted">...</a>
        <a href="">7</a>
        <a class="pagenation_not" href="">次へ</a>
    </div> --}}
    <div class="pagination">
        @if ($paginator->onFirstPage())
            <a class="pagination_not">前へ</a>
        @else
            <a class="" href="{{ $paginator->previousPageUrl() }}">前へ</a>
        @endif

        @if(!$paginator->hasMorePages())
            <a href="{{ $paginator->url($paginator->currentPage() - 2) }}">{{ $paginator->currentPage() - 2 }}</a>
        @endif

        @if(!$paginator->onFirstPage())
            <a href="{{ $paginator->previousPageUrl() }}">{{ $paginator->currentPage() - 1 }}</a>
        @endif

        @if($paginator->hasMorePages())
            <a class="pagination_select_it">{{ $paginator->currentPage() }}</a>

            @if($paginator->currentPage() + 1 !== $paginator->lastpage())
                <a href="{{ $paginator->nextPageUrl() }}">{{ $paginator->currentPage() + 1 }}</a>
            @endif
        @endif
        
        <a class="pagination_dotted">...</a>
        <a {{ $paginator->hasMorePages() ? '' : 'class=pagination_select_it' }} href={{ $paginator->url($paginator->lastPage()) }}>{{ $paginator->lastPage() }}</a>
        
        {{-- @foreach ($elements as $element)
            @if (is_string($element))
                <a class="pagination_dotted">...</a>
            @endif

            @if (is_array$element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="pagination_select_it" href="{{ $url }}">{{ $page }}</a>
                    @else
                        <a class="" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach --}}

        @if ($paginator->hasMorePages())
            <a class="" href="{{ $paginator->nextPageUrl() }}">次へ</a>
        @else
            <a class="pagination_not">次へ</a>
        @endif
    </div>
@endif
