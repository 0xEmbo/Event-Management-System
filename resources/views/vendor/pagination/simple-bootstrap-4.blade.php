@if ($paginator->hasPages())
    <nav class="">
        @if ($paginator->onFirstPage())
            <a class="btn btn-lg search-btn disabled">Previous</a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-lg search-btn">Previous</a>
        @endif
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-lg search-btn">Next</a>
        @else
            <a class="btn btn-lg search-btn disabled">Next</a>
        @endif
    </nav>
@endif
