<div>
    <div>
        @php $locale = session()->get('locale'); @endphp

        <div style="display: inline; width:100%">
            <div class="dropdown show">
                <a role="button" class="btn  dropdown-toggle" style="background-color: transparent !important;"
                    href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    <span class="category"> {{ $categoryName }}</span>


                    <span class="glyphicon glyphicon-menu-down"></span>

                </a>

                <ul class="dropdown-menu drop" aria-labelledby="dropdownMenuLink" id="category">

                    @foreach ($categories as $category)
                        @switch($locale)
                            @case('fr')
                                <li value="{{ $category->id }}"> <a role="button">{{ $category->name }}</a>
                                </li>
                            @break

                            @case('ar')
                                <li value="{{ $category->id }}"> <a role="button">{{ $category->arabic_name }}</a>
                                </li>
                            @break

                            @case('en')
                                <li value="{{ $category->id }}"> <a role="button">{{ $category->english_name }}</a>
                                </li>
                            @break

                            @default
                                <li value="{{ $category->id }}"> <a role="button">{{ $category->name }}</a>
                                </li>
                        @endswitch
                    @endforeach

                </ul>
            </div>
            
           
            <div class="dropdown show" id="prod">
                <a role="button" class="btn  dropdown-toggle" style="background-color: transparent !important;"
                    href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">

                    <span class="prod"> {{ $prodName }}</span>


                    <span class="glyphicon glyphicon-menu-down"></span>

                </a>

                <ul class="dropdown-menu drop" aria-labelledby="dropdownMenuLink" id="prood">

                    @foreach ($allProds as $prod)
                        @switch($locale)
                            @case('fr')
                                <li value="{{ $prod->id }}"> <a role="button"
                                        href='./{{ $prod->id }}'>{{ $prod->name }}</a>
                                </li>
                            @break

                            @case('ar')
                                @if ($prod->arabic_name != '')
                                    <li value="{{ $prod->id }}"> <a role="button"
                                            href='./{{ $prod->id }}'>{{ $prod->arabic_name }}</a>
                                    </li>
                                @else
                                    <li value="{{ $prod->id }}"> <a role="button"
                                            href='./{{ $prod->id }}'>{{ $prod->name }}</a>
                                    </li>
                                @endif
                            @break

                            @case('en')
                                @if ($prod->english_name != '')
                                    <li value="{{ $prod->id }}"> <a role="button"
                                            href='./{{ $prod->id }}'>{{ $prod->english_name }}</a>
                                    </li>
                                @else
                                    <li value="{{ $prod->id }}"> <a role="button"
                                            href='./{{ $prod->id }}'>{{ $prod->name }}</a>
                                    </li>
                                @endif
                            @break

                            @default
                                <li value="{{ $prod->id }}"> <a role="button"
                                        href='./{{ $prod->id }}'>{{ $prod->name }}</a>
                                </li>
                        @endswitch
                    @endforeach
                </ul>
            </div>

            <div class="dropdown show">
                <a role="button" class="btn  dropdown-toggle" style="background-color: transparent !important;"
                    href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    @if ($regionName == null)
                        <span class="region">{{ __('region') }}</span>
                    @else
                        <span class="region">{{ $regionName }}</span>
                    @endif
                    <span class="glyphicon glyphicon-menu-down"></span>

                </a>

                <ul class="dropdown-menu drop" id="region" aria-labelledby="dropdownMenuLink">
                    @foreach ($regions as $region)
                        @switch($locale)
                            @case('fr')
                                <li value={{ $region->id }}>
                                    <a type="button"
                                        wire:click.prevent='updateRegion("{{ $region->id }}","{{ $region->name }}")'>{{ $region->name }}</a>
                                </li>
                            @break

                            @case('ar')
                                <li value={{ $region->id }}>
                                    <a type="button"
                                        wire:click.prevent='updateRegion("{{ $region->id }}","{{ $region->arab_name }}")'>{{ $region->arab_name }}</a>
                                </li>
                            @break

                            @case('en')
                                <li value={{ $region->id }}>
                                    <a type="button"
                                        wire:click.prevent='updateRegion("{{ $region->id }}","{{ $region->english_name }}")'>{{ $region->english_name }}</a>
                                </li>
                            @break

                            @default
                                <li value={{ $region->id }}>
                                    <a type="button"
                                        wire:click.prevent='updateRegion("{{ $region->id }}","{{ $region->name }}")'>{{ $region->name }}</a>
                                </li>
                        @endswitch
                    @endforeach

                </ul>
            </div>
            <div class="dropdown show">
                <a role="button" class="btn dropdown-toggle" style="background-color: transparent !important;"
                    href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    @if ($villeName == null)
                        <span class="ville">{{ __('ville') }}</span>
                    @else
                        <span class="ville">{{ $villeName }}</span>
                    @endif
                    <span class="glyphicon glyphicon-menu-down"></span>

                </a>

                <ul class="dropdown-menu drop" id="ville" aria-labelledby="dropdownMenuLink">
                    @foreach ($cities as $city)
                        @switch($locale)
                            @case('fr')
                                <li wire:click="submit" value="{{ $city->id }}"> <a role="button">{{ $city->name }}</a>
                                </li>
                            @break

                            @case('ar')
                                <li wire:click="submit" value="{{ $city->id }}"> <a
                                        role="button">{{ $city->arabic_name }}</a>
                                </li>
                            @break

                            @case('en')
                                <li wire:click="submit" value="{{ $city->id }}"> <a
                                        role="button">{{ $city->english_name }}</a>
                                </li>
                            @break

                            @default
                                <li wire:click="submit" value="{{ $city->id }}"> <a
                                        role="button">{{ $city->name }}</a>
                                </li>
                        @endswitch
                    @endforeach
                </ul>
            </div>
           

        </div>
        <div class="row col-12" style="display: inline;">
       
            <form autocomplete="off">
              
                <div class="flex-row d-flex col-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group" style="margin-top:15px;display:flex">
                                <div class="grosDetail col-md-4">
                                    <div class="bs-select">
                                        <select id="regiogro" data-placeholder="Gros/Détail" searchable="{{ __('search') }}" wire:model="idType" wire:change="updateIdProd" style="padding: 6px;">
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
                                
                                <div class="col-md-4">
                                    <input type="text" placeholder="{{ __('dateDeb') }}" name="daterange"
                                        class="form-control date-picker" id="date-picker" />
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" placeholder="{{ __('dateFin') }}" name="daterange"
                                        class="form-control date-picker-2" id="date date-picker-2" />
                                    <i class="fa fa-calendar"></i>
                                </div>
								@if($details->count() != 0)
                                <div class="download col-md-1" wire:click="export">
                                    <a> <i class='fas fa-file-download'></i>
                                    </a>
                                </div>
								@endif
                            </div>
                        </div>


                    </div>
                </div>

            </form>



        </div>

        <table style="margin-top: 0px !important;text-align:center" id="table"
            class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>{{ __('produit') }}</th>
                    <th>{{ __('region') }}</th>
                    
                    <th>{{ __('ville') }}</th>
                    <th>{{ __('distributeur') }}</th>
                    <th>{{ __('price') }} <i class="fa fa-sort  sortByPrice"></i>
                    </th>
                    <th>{{ __('date') }} <i class="fa fa-sort sortByDate"></i></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($details as $detail)
                    <tr>
                        <td>{{ $detail->product }}</td>
                        <td>{{ $detail->region }}</td>
                        <td>{{ $detail->city }}</td>
                        <td>{{ __($detail->type) }}</td>
                        <td>{{sprintf ("%.2f", $detail->moyen)}}</td>
                        <td>{{ $detail->date }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="clearfix" style="width: 95%;padding-left:5%;padding-right:5%;margin-top:10px">
            <div class="hint-text col-8">{{ __('page') }} <b>{{ $details->currentPage() }}</b> <span>
                    {{ __('of') }} <span>
                        <b>{{ $details->lastPage() }}</b></div>

            <div class="d-flex pb-0 pt-2 border  justify-content-center">
                {{ $details->links('vendor.pagination.custom-pagination') }}
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

@livewireScripts
<?php $locale = session()->get('locale'); ?>
<script>
    var locale = "<?php echo $locale; ?>";

    $(document).ready(function() {


        $("#ville").on('click', 'li', function(e) {

            @this.set('ville', $(this).val());
            @this.set('villeName', $(this).text());
            @this.updateIdProd();

        });
        $("#prod").on('click', 'li', function(e) {
            $(".prod:first-child").text($(this).text());
            $(".prod:first-child").val($(this).text());
            @this.set('idProd', $(this).val());
            @this.set('prodName', $(this).text());
            @this.updateIdProd();
            var self = $(this);
            console.log(@this.get('idCategory'));
            window.history.pushState({
                path: "../" + @this.get('idCategory') + "/" + self.val()
            }, '', "../" + @this.get('idCategory') + "/" + self.val());

            e.preventDefault();


        });
        $(".sortByPrice").on('click', function(e) {
            if (@this.get('descByPrice') == null || @this.get('descByPrice') == "asc") {
                @this.set('descByPrice', 'desc');
            } else {
                @this.set('descByPrice', 'asc');
            }

            @this.set('descByDate', null);

        });
        $(".sortByDate").on('click', function(e) {
            if (@this.get('descByDate') == null) {
                @this.set('descByDate', 'desc');
            } else if (@this.get('descByDate') == "desc") {
                @this.set('descByDate', 'asc');
            } else {
                @this.set('descByDate', 'desc');
            }

            @this.set('descByPrice', null);

        });
        $('#region li').on('click', function() {
            $(".region:first-child").text($(this).text());
            $(".region:first-child").val($(this).text());
            $('#ville li').empty();
            $(".ville").text("{{ __('chargement') }}");
            @this.set('villeName', null);
            @this.set('ville', null);
            @this.updateIdProd();

            $.ajax({
                type: 'GET',
                dataType: "JSON",
                processData: false,
                contentType: false,

                url: "/getVilleByRegion/" + $(this).val(),
                success: function(response) {

                    var newData = JSON.stringify(response)
                    var response = JSON.parse(newData);
                    console.log(response);
                    $('#ville').empty();
                    response.forEach(element => {
                        console.log('here');
                        switch (locale) {
                            case 'fr':
                                $('#ville').append("<li value='" + element['id'] +
                                    "'><a role='button' >" + element['name'] +
                                    "</a></li>");
                                break;
                            case 'en':
                                $('#ville').append("<li value='" + element['id'] +
                                    "'><a role='button' >" + element[
                                        'english_name'] +
                                    "</a></li>");
                                break;
                            case 'ar':
                                $('#ville').append("<li value='" + element['id'] +
                                    "'><a role='button' >" + element[
                                        'arabic_name'] +
                                    "</a></li>");
                                break;
                            default:
                                $('#ville').append("<li value='" + element['id'] +
                                    "'><a role='button' >" + element['name'] +
                                    "</a></li>");
                        }


                    });
                    return false;
                }
            });
        });
        $('#category li').on('click', function() {
            @this.set('categoryName', $(this).text());
            @this.set('idCategory', $(this).val());


            $('#prood li').empty();
            $(".prod").text("{{ __('chargement') }}");

            $.ajax({
                type: 'GET',
                dataType: "JSON",
                processData: false,
                contentType: false,

                url: "/getProductsFromCat/" + $(this).val(),
                success: function(response) {

                    var newData = JSON.stringify(response)
                    var response = JSON.parse(newData);
                    console.log(response);
                    $('#prood').empty();
                    response.forEach(element => {
                        console.log(element);
                        switch (locale) {
                            case 'fr':
                                $('#prood').append("<li value='" + element['id'] +
                                    "'><a role='button' href='" + element[
                                        'id'] +
                                    "'>" + element['name'] +
                                    "</a></li>");
                                break;
                            case 'en':
                                $('#prood').append("<li value='" + element['id'] +
                                    "'><a role='button' href='" + element[
                                        'id'] +
                                    "'>" + element['english_name'] +
                                    "</a></li>");

                                break;
                            case 'ar':
                                $('#prood').append("<li value='" + element['id'] +
                                    "'><a role='button' href='" + element[
                                        'id'] +
                                    "'>" + element['arabic_name'] +
                                    "</a></li>");

                                break;
                            default:
                                $('#prood').append("<li value='" + element['id'] +
                                    "'><a role='button' href='" + element[
                                        'id'] +
                                    "'>" + element['name'] +
                                    "</a></li>");

                        }
                        //set the first product as default using the first element of the array
                        @this.set('idProd', response[0]['id']);
                        @this.set('prodName', response[0]['name']);
                        @this.updateIdProd();
                        $(".prod:first-child").text(response[0]['name']);
                        $(".prod:first-child").val(response[0]['id']);


                    });
                    return false;
                }
            });
        });

    });
    var autoupdate = false;
    var months;
    var days;
    switch (locale) {
        case 'fr':
            days = [
                "Dim",
                "Lun",
                "Mar",
                "Mer",
                "Jeu",
                "Ven",
                "Sam"
            ];
            months = [
                "Janvier",
                "Fevrier",
                "Mars",
                "Avril",
                "Mai",
                "Juin",
                "Juillet",
                "Août",
                "Septembre",
                "Octobre",
                "Novembre",
                "Décembre"
            ];
            break;
        case 'en':
            days = [
                "Sun",
                "Mon",
                "Tue",
                "Wed",
                "Thu",
                "Fri",
                "Sat"
            ];
            months = [
                "January",
                "February",
                "March",
                "April",
                "May",
                "June",
                "July",
                "August",
                "September",
                "October",
                "November",
                "Décember"
            ];
            break;
        case 'ar':
            days = [
                "الأحد",
                "الاثنين",
                "الثلاثاء",
                "الأربعاء",
                "الخميس",
                "الجمعة",
                "السبت"
            ];
            months = [
                "يناير",
                "فبراير",
                "مارس",
                "أبريل",
                "ماي",
                "يونيو",
                "يوليوز",
                "غشت",
                "شتنبر",
                "أكتوبر",
                "نونبر",
                "دجنبر"
            ];
            break;
        default:
            days = [
                "Dim",
                "Lun",
                "Mar",
                "Mer",
                "Jeu",
                "Ven",
                "Sam"
            ];
            months = [
                "Janvier",
                "Fevrier",
                "Mars",
                "Avril",
                "Mai",
                "Juin",
                "Juillet",
                "Août",
                "Septembre",
                "Octobre",
                "Novembre",
                "Décembre"
            ];
    }

    function date1() {

        $('.date-picker').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minDate: new Date(2018,0,1),
			maxDate: new Date(),
            autoApply: true,
            autoUpdateInput: autoupdate,
            "locale": {
                "format": "YYYY-MM-DD",
                "separator": " - ",
                "applyLabel": "Appliquer",
                "cancelLabel": "Annuler",
                "fromLabel": "De",
                "toLabel": "à",
                "customRangeLabel": "Custom",
                "daysOfWeek": days,

                "monthNames": months,
            },
        }, function(chosen_date) {
            $('.date-picker').val(chosen_date.format('YYYY-MM-DD'));
        });
    };
    date1();

    $('.date-picker-2').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
		maxDate: new Date(),
        autoApply: true,
        autoUpdateInput: false,
        "locale": {
            "format": "YYYY-MM-DD",
            "applyLabel": "Appliquer",
            "cancelLabel": "Annuler",
            "fromLabel": "De",
            "toLabel": "à",
            "customRangeLabel": "Custom",
            "daysOfWeek": days,
            "monthNames": months,
        },
    }, function(chosen_date) {
        $('.date-picker-2').val(chosen_date.format('YYYY-MM-DD'));

    });

    $('.date-picker').on('apply.daterangepicker', function(ev, picker) {
        if ($('.date-picker').val().length == 0) {
            autoupdate = true;
            console.log('true');
            date1();
        };
        var departpicker = $('.date-picker').val();
        $('.date-picker-2').daterangepicker({
            minDate: departpicker,
            singleDatePicker: true,
            showDropdowns: true,
            autoApply: true,
            "locale": {
                "format": "YYYY-MM-DD",
                "separator": " - ",
                "applyLabel": "Appliquer",
                "cancelLabel": "Annuler",
                "fromLabel": "De",
                "toLabel": "à",
                "customRangeLabel": "Custom",
                "daysOfWeek": days,

                "monthNames": months,
            },
        });

        var drp = $('.date-picker-2').data('daterangepicker');
        drp.setStartDate(departpicker);

        drp.setEndDate(departpicker);
        @this.set('startDate', $('.date-picker').val());
        @this.set('endDate', $('.date-picker-2').val());
        @this.updateIdProd();


    });
    $('.date-picker-2').on('change', function(ev, picker) {
        @this.set('startDate', $('.date-picker').val());
        @this.set('endDate', $('.date-picker-2').val());
        @this.updateIdProd();
    });
    $('.date-picker').on('change', function(ev, picker) {
        @this.set('startDate', $('.date-picker').val());
        @this.set('endDate', $('.date-picker-2').val());
        @this.updateIdProd();
    });

</script>
