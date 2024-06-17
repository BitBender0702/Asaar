@if ($paginator->hasPages())
<nav aria-label="Page navigation example">
    <ul class="pagination " style="display: flex !important">
        @if ($paginator->onFirstPage())
       
        @else
            <li class="page-item" style="display: inline-flex !important"><a role="button" class="page-link" wire:loading.attr="disabled" wire:click="previousPage"><</a></li>
        @endif
      
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="page-item disabled" style="display: inline-flex !important">{{ $element }}</li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active" style="display: inline-flex !important">
                            <a role="button" class="page-link" wire:loading.attr="disabled" wire:click="gotoPage({{$page}})">{{ $page }}</a>
                        </li>
                    @else
                        <li class="page-item" style="display: inline-flex !important">
                            <a role="button" class="page-link" wire:loading.attr="disabled"  wire:click="gotoPage({{$page}})">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach      
        @if ($paginator->hasMorePages())
            <li class="page-item" style="display: inline-flex !important">
                <a role="button" class="page-link" wire:click="nextPage" rel="next">></a>
            </li>
        @else 
    @endif
    </ul>
@endif