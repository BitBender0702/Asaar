<div>
    <div>
        @php $locale = session()->get('locale'); @endphp

        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th style="text-transform:uppercase">{{ __('viandeOeuf') }}</th>
                    @foreach ($regions as $region)
                        @switch($locale)
                            @case('fr')
                                <th>{{ $region->name }} </th>
                            @break

                            @case('ar')
                                <th>{{ $region->arab_name }} </th>
                            @break

                            @case('en')
                                <th>{{ $region->english_name }} </th>
                            @break

                            @default
                                <th>{{ $region->name }} </th>
                        @endswitch
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($voeufs as $voeuf)
                    <tr>
                        @switch($locale)
                            @case('fr')
                                <td>{{ $voeuf->name }}</td>
                            @break

                            @case('ar')
                                <td>{{ $voeuf->arabic_name }}</td>
                            @break

                            @case('en')
                                <td>{{ $voeuf->english_name }}</td>
                            @break

                            @default
                                <td>{{ $voeuf->name }}</td>
                        @endswitch

                        @foreach($regions as $region)
                        <td>
                         @foreach( array_slice(explode(',', $voeuf->quantity_group), 0,5) as $moyen)
                         @if($region->id==explode(';', $moyen)[1])
                              {{ explode(';', $moyen)[0] }}   
                              @break; 
                          @else
                             @continue;                     
                          @endif
                         
                      @endforeach
                        </td>
     
                        @endforeach

                    </tr>
                @endforeach
            </tbody>

        </table>
        <div class="clearfix" style="width: 95%;padding-left:5%;padding-right:5%;margin-top:10px">
            <div class="hint-text col-8">{{ __('page') }} <b>{{ $voeufs->currentPage() }}</b> <span>
                    {{ __('of') }} <span> <b>{{ $voeufs->lastPage() }}</b></div>

            <div class="d-flex pb-0 pt-2 border  justify-content-center">
                {{ $voeufs->links('vendor.pagination.custom-pagination') }}
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
</div>
