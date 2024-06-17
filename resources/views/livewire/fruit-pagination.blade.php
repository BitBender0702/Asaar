<div>
    <div>
        @php $locale = session()->get('locale'); @endphp

        <table class="table table-bordered table-striped table-sm">
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
                @foreach ($fruits as $fruit)
                    <tr>
                        @switch($locale)
                            @case('fr')
                                <td>{{ $fruit->name }}</td>
                            @break

                            @case('ar')
							@if($fruit->arabic_name=='')
								<td>{{ $fruit->name }}</td>
							
							@else
                                <td>{{ $fruit->arabic_name }}</td>
							@endif
                            @break

                            @case('en')
							@if($fruit->english_name=='')
								<td>{{ $fruit->name }}</td>
							
							@else
                                <td>{{ $fruit->english_name }}</td>
							@endif
                              
                            @break

                            @default
                                <td>{{ $fruit->name }}</td>
                        @endswitch

                        @foreach($regions as $region)
                        <td>
                     
                         @foreach( array_slice(explode(',', $fruit->quantity_group), 0,5) as $moyen)
                         @if($region->id==explode(';', $moyen)[1])
                         
                              {{ round(explode(';', $moyen)[0],2) }}   
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
</div>
