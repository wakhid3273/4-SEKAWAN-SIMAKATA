@if($paginator->hasPages())
    <div class="pagination-wrap">
        <div class="pagination-info">
            Menampilkan {{ $paginator->firstItem() ?? 0 }}–{{ $paginator->lastItem() ?? 0 }} dari {{ $paginator->total() }} data
        </div>
        <div class="pagination-links">
            {{-- Previous Button --}}
            @if($paginator->onFirstPage())
                <span class="disabled">
                    <span class="material-icons-outlined" style="font-size: 14px; vertical-align: middle;">chevron_left</span>
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}">
                    <span class="material-icons-outlined" style="font-size: 14px; vertical-align: middle;">chevron_left</span>
                </a>
            @endif

            {{-- Page Numbers --}}
            @foreach($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if(is_string($element))
                    <span style="border: none; background: transparent; padding: 6px 4px;">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if(is_array($element))
                    @foreach($element as $page => $url)
                        @if($page == $paginator->currentPage())
                            <span aria-current="page">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Button --}}
            @if($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}">
                    <span class="material-icons-outlined" style="font-size: 14px; vertical-align: middle;">chevron_right</span>
                </a>
            @else
                <span class="disabled">
                    <span class="material-icons-outlined" style="font-size: 14px; vertical-align: middle;">chevron_right</span>
                </span>
            @endif
        </div>
    </div>

    <style>
        .pagination-wrap {
            padding: 16px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            width: 100%;
        }
        .pagination-info {
            font-size: 13px;
            color: #64748b;
        }
        .pagination-links {
            display: flex;
            gap: 6px;
            align-items: center;
        }
        .pagination-links a, .pagination-links span {
            padding: 6px 12px;
            border-radius: 7px;
            font-size: 13px;
            font-weight: 500;
            border: 1px solid #e2e8f0;
            color: #334155;
            background: #fff;
            transition: all 0.15s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            min-width: 36px;
            height: 36px;
        }
        .pagination-links a:hover {
            border-color: #1a5fb4;
            color: #1a5fb4;
        }
        .pagination-links span[aria-current="page"] {
            background: #1a5fb4;
            color: #fff;
            border-color: #1a5fb4;
        }
        .pagination-links .disabled {
            opacity: 0.5;
            cursor: not-allowed;
            background: #f8fafc;
        }
    </style>
@endif
