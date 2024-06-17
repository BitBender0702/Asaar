<div>
    @php $locale = session()->get('locale'); @endphp

    <h2 class="widget-title"><span>{{ __('prixRegional') }}</span></h2>
    <div class="grosDetail" style="width:25%">
        <div class="bs-select">
            <select id="regio" data-placeholder="Gros/Détail" searchable="{{ __('search') }}" wire:model="idType">
                @foreach ($marches as $marche)
                    @if ($marche->id == 2)
                        <option value="{{ $marche->id }}" selected> {{ __($marche->name) }}
                        </option>
                    @else
                        <option value="{{ $marche->id }}"> {{ __($marche->name) }}
                        </option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    <br />
    <br />
    <ul class="nav nav-pills" style="border-bottom: 1px solid #ddd;">
        @foreach ($categories as $categorie)
            @switch($locale)
                @case('fr')
                    @if ($loop->index == 0)
                        <li class="active"><a class="nav-link" data-toggle="pill"
                                href="#{{ $categorie->id }}">{{ $categorie->name }}</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill"
                                href="#{{ $categorie->id }}">{{ $categorie->name }}</a>
                        </li>
                    @endif
                @break

                @case('ar')
                    @if ($loop->index == 0)
                        <li class="active"> <a class="nav-link" data-toggle="pill"
                                href="#{{ $categorie->id }}">{{ $categorie->arabic_name }}</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill"
                                href="#{{ $categorie->id }}">{{ $categorie->arabic_name }}</a>
                        </li>
                    @endif
                @break

                @case('en')
                    @if ($loop->index == 0)
                        <li class="active"> <a class="nav-link" data-toggle="pill"
                                href="#{{ $categorie->id }}">{{ $categorie->english_name }}</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill"
                                href="#{{ $categorie->id }}">{{ $categorie->english_name }}</a>
                        </li>
                    @endif
                @break

                @default
                    @if ($loop->index == 0)
                        <li class="active"><a class="nav-link" data-toggle="pill"
                                href="#{{ $categorie->id }}">{{ $categorie->name }}</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill"
                                href="#{{ $categorie->id }}">{{ $categorie->name }}</a>
                        </li>
                    @endif
            @endswitch
        @endforeach

    </ul>
    <div class="tab-content" style="padding-top:20px;">
        @foreach ($categories as $categorie)
            @if ($loop->index == 0)
                <div id="{{ $categorie->id }}" class="tab-pane fade in active">
                    <div class="inside-nave">
                        @livewire('product-pagination', ['categorie' => $categorie->id, 'idType' => $idType], key("$categorie->id"))
                    </div>
                </div>
            @else
                <div id="{{ $categorie->id }}" class="tab-pane fade">
                    <div class="inside-nave">
                        @livewire('product-pagination', ['categorie' => $categorie->id, 'idType' => $idType], key("$categorie->id"))
                    </div>
                </div>
            @endif
        @endforeach

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
