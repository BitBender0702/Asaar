@if ($paginator->hasPages())
@if ($paginator->hasMorePages())
    <button class="scrollup" id="next" rel="next" wire:loading.attr="disabled"  wire:click="nextPage" role="button"
        data-slide="next" style="display: inline;margin-left: 10px; margin-right:10px"><i class="fa fa-angle-right"></i></button>
@else
    <button class="scrollup disabled" data-slide="next"
        style="display: inline;margin-left: 10px;margin-right: 10px;background-color:gray !important;">
        <i class="fa fa-angle-right"></i>
    </button>
@endif


@if ($paginator->onFirstPage())
    <button class="scrollup" data-slide="prev"  style="display: inline;background-color:gray !important;"><i
            class="fa fa-angle-left"></i></button>
@else
    <button class="scrollup disabled" id="prev" wire:loading.attr="disabled" wire:click="previousPage" rel="prev" role="button" data-slide="prev"
        style="display: inline;"><i class="fa fa-angle-left"></i></button>
@endif
@endif