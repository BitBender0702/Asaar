<div>
    <div>
        @php $locale = session()->get('locale'); @endphp
 
        <table class="table table-bordered table-striped table-sm" id="product">
            <thead>
                <tr>
                    <th style="text-transform:uppercase">
 
                        @switch($locale)
                            @case('fr')
                                {{ $name->name }}
                            @break
 
                            @case('ar')
                                {{ $name->arabic_name }}
                            @break
 
                            @case('en')
                                {{ $name->english_name }}
                            @break
 
                            @default
                                {{ $name->name }}
                        @endswitch
 
 
                    </th>
                    @foreach ($regions as $region)
                        @switch($locale)
                            @case('fr')
                                <th class="region">{{ $region->name }} </th>
                            @break
 
                            @case('ar')
                                <th class="region">{{ $region->arab_name }} </th>
                            @break
 
                            @case('en')
                                <th class="region">{{ $region->english_name }} </th>
                            @break
 
                            @default
                                <th class="region">{{ $region->name }} </th>
                        @endswitch
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($fruits as $fruit)
                    <tr>
                        @switch($locale)
                            @case('fr')
                                <th>{{ $fruit->name }}
                                    @if ($fruit->unite_fr != '')
                                        / ({{ $fruit->unite_fr }})
                                    @endif
                                </th>
                            @break
 
                            @case('ar')
                                @if ($fruit->arabic_name)
                                    <th>{{ $fruit->arabic_name }}
                                        @if ($fruit->unite_ar != '')
                                            / ({{ $fruit->unite_ar }})
                                        @endif
                                    </th>
                                @else
                                    <th>{{ $fruit->name }}
                                        @if ($fruit->unite_ar != '')
                                            / ({{ $fruit->unite_ar }})
                                        @endif
                                    </th>
                                @endif
                            @break
 
                            @case('en')
                                @if ($fruit->english_name)
                                    <th>{{ $fruit->english_name }}
                                        @if ($fruit->unite_eng != '')
                                            / ({{ $fruit->unite_eng }})
                                        @endif
                                    </th>
                                @else
                                    <th>{{ $fruit->name }}
                                        @if ($fruit->unite_eng != '')
                                            / ({{ $fruit->unite_eng }})
                                        @endif
                                    </th>
                                @endif
                            @break
 
                            @default
                                <th>{{ $fruit->name }}
                                    @if ($fruit->unite_fr != '')
                                        / ({{ $fruit->unite_fr }})
                                    @endif
                                </th>
                        @endswitch
 
                        @foreach ($regions as $region)
                            <td class="priceRegion">
                                @foreach ($fruit->quantity_group_list as $quantity_group)
                                    @foreach (array_slice(explode(',', $quantity_group), 0, $regions->count()) as $moyen)
                                        @if ($quantity_group != NULL)
                                            @if ($region->id == explode(';', $moyen)[1])
                                                {{ sprintf('%.2f', explode(';', $moyen)[0]) }}
                                            
                                            @break;
                                        
                                            @endif
                                        @else
                                            @continue;
                                        @endif
                                    @endforeach
                                @endforeach
                        </td>
                    @endforeach
 
                </tr>
            @endforeach
            
        </tbody>
    </table>
    <div class="clearfix" style="width: 95%;padding-left:5%;padding-right:5%;margin-top:10px">
        <div class="hint-text col-8">{{ __('page') }} <b>{{ $fruits->currentPage() }}</b> <span>
                {{ __('of') }} <span>
                    <b>{{ $fruits->lastPage() }}</b></div>
 
        <div class="d-flex pb-0 pt-2 border  justify-content-center">
            {{ $fruits->links('vendor.pagination.custom-pagination') }}
        </div>
    </div>
</div>
<div wire:loading style="z-index: 10000;" class="loading-container">
    <div class="loader">
        <div class="side"></div>
        <div class="side"></div>
        <div class="side"></div>
        <div class="side"></div>
        <div class="side"></div>
        <div class="side"></div>
        <div class="side"></div>
        <div class="side"></div>
    </div>
</div>
@push('customscript')
    <script>
        $(document).ready(function() {
            $('tr').filter(':has(td:empty)').remove();
        });
        Livewire.on('postAdded', function() {
                $('tr').filter(':has(td:empty)').remove();
                console.log('loaded');
            });
    </script>
@endpush
 
</div>