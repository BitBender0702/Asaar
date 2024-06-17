<div>

 <div>
 <div class="col-12">
 @php $locale = session()->get('locale'); @endphp
 <span >
 <h4 style="color: green;font-size:24px;font-weight:600">{{ $date }}</h4>
 
 </span>
 <div clas="catPag" style="display:flex;flex-wrap: wrap; margin-left:10%">
 
 <div class="bs-multiselect longMulti">
 <select id="ville" multiple="multiple" size="3" data-placeholder="Catégorie"
 selectAllPlaceholder="Sélectionner tous" searchable="{{ __('search') }}">
 @foreach ($categories as $categorie)
 @switch($locale)
 @case('fr')
 <option value="{{ $categorie->id }}" selected> {{ $categorie->name }}
 </option>
 
 @break

 @case('ar')
 
 <option value="{{ $categorie->id }}" selected> {{ $categorie->arabic_name }}
 </option>
 
 @break

 @case('en')
 <option value="{{ $categorie->id }}" selected> {{ $categorie->english_name }}
 </option>
 
 @break

 @default
 
 <option value="{{ $categorie->id }}" selected> {{ $categorie->name }}
 </option>
 
 @endswitch
 @endforeach
 </select>
 </div>
 <div class="bs-multiselect longMulti" style="margin-right:5%">
 <select id="prod" data-placeholder="{{ __('produit') }}"
 searchable="{{ __('search') }}">
 @foreach ($productsByCategorie as $productsByCategory)
 @switch($locale)
 @case('fr')
 <option value="{{ $productsByCategory->id }}" selected>
 {{ $productsByCategory->name }}
 </option>
 
 @break

 @case('ar')
 
 @if ($productsByCategory->arabic_name != null)
 <option value="{{ $productsByCategory->id }}" selected>
 {{ $productsByCategory->arabic_name }}
 </option>
 @else
 <option value="{{ $productsByCategory->id }}" selected>
 {{ $productsByCategory->name }}
 </option>
 @endIf
 
 @break

 @case('en')
 @if ($productsByCategory->english_name != null)
 <option value="{{ $productsByCategory->id }}" selected>
 {{ $productsByCategory->english_name }}
 </option>
 @else
 <option value="{{ $productsByCategory->id }}" selected>
 {{ $productsByCategory->name }}
 </option>
 @endif
 @break

 @default
 
 <option value="{{ $productsByCategory->id }}" selected>
 {{ $productsByCategory->name }}
 </option>
 
 @endswitch
 @endforeach
 </select>
 </div>

 <div class="grosDetail">
 <div class="bs-select">
 <select id="grosDetail" data-placeholder="Gros/Détail" searchable="{{ __('search') }}">
 @foreach($marches as $marche)
 @if($marche->id == 2)
 <option value="{{$marche->id}}" selected> {{ __($marche->name) }}
 </option>
 @else
 <option value="{{$marche->id}}"> {{ __($marche->name) }}
 </option>
 @endif
 
 @endforeach
 
 </select>
 </div>

 </div>
 <div class="period">
 <div class="bs-select">
 <select id="other" data-placeholder="Période" selectAllPlaceholder="Sélectionner tous"
 searchable="{{ __('search') }}">
 <option value="- 7 days" > 7 {{ __('jours') }}
 </option>
 <option value="- 1 month"> 1 {{ __('mois') }}
 </option>
 <option value="- 2 months"> 2 {{ __('mois') }}
 </option>
 <option value="- 3 months"> 3 {{ __('mois') }} </option>
 <option value="- 6 months"> 6 {{ __('mois') }} </option>
 <option value="- 1 year"> 1 {{ __('ans') }} </option>
 <option value="- 2 years"> 2 {{ __('ans') }} </option>
 </select>
 </div>

 </div>
 <!-- .latest-news-wiget -->
 </div>
 <div id='chartjsLegend' class='chartjsLegend'></div>
 <div class="chartAreaWrapper">
 <canvas id="myChart"></canvas>
 </div>
 </div>
 <div style="z-index: 10000;display:none" class="loading-container">
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
 <?php $locale = session()->get('locale'); ?>
<script>
        var locale = "<?php echo $locale; ?>";
        $(document).ready(function() {
            var GradientBgPlugin = {
                beforeDraw: function(chartInstance) {
                    const ctx = chartInstance.chart.ctx;
                    const canvas = chartInstance.chart.canvas;
                    const chartArea = chartInstance.chartArea;
                    // Chart background
                    var gradientBack = canvas.getContext("2d").createLinearGradient(0, 0, 0, 250);
                    gradientBack.addColorStop(0, "rgba(255, 255,255,0)");
                    gradientBack.addColorStop(0.4, "rgba(255, 255,255,0.1)");
                    gradientBack.addColorStop(1, "rgba(0, 0, 0, 0.2)");
                    ctx.fillStyle = gradientBack;
                    ctx.fillRect(chartArea.left, chartArea.bottom,
                        chartArea.right - chartArea.left, chartArea.top - chartArea.bottom);
                }
            };
            function getChart() {
                var period = $("#other").val();
                console.log(period);
                $(".loading-container").css('display', 'inline-block');
                $.ajax({
                    url: "/getNationalPrice/" + $('#prod').val() + "/" + period + "/" +
                        $("#grosDetail").val(),
                    method: "GET",
                    success: function(data) {
                        $(".loading-container").css('display', 'none');
                        console.log(data);
                        var player = [];
                        var score = [];
                        var jsonData = JSON.parse(data);
                        var unit = "";
                        if (jsonData.length > 0) {
                            if (locale == 'ar') {
                                if (jsonData[0]['unite_ar'] != "") {
                                    unit = ' / ' + jsonData[0]['unite_ar'];
                                }
                            } else if (locale == 'fr') {
                                if (jsonData[0]['unite_fr'] != "") {
                                    unit = ' / ' + jsonData[0]['unite_fr'];
                                }
                            } else {
                                if (jsonData[0]['unite_eng'] != "") {
                                    unit = ' / ' + jsonData[0]['unite_eng'];
                                }
                            }
                        }
                        for (var i in jsonData) {
                            player.push(jsonData[i]['date']);
                            score.push(jsonData[i]['moyen'].toFixed(2));
                        }
                        var config = {
                            type: 'line',
                            data: {
                                labels: player,
                                datasets: [{
                                    label: " {{ __('prix') }}" + unit,
                                    borderColor: 'rgba(40, 178, 154, 1)',
                                    data: score,
                                    fill: false,
                                }]
                            },
                            options: {
                                maintainAspectRatio: false,
                                responsive: true,
                                title: {
                                    display: true,
                                    text: ' {{ __('prix') }}'
                                },
                                tooltips: {
                                    mode: 'index',
                                    intersect: false,
                                },
                                hover: {
                                    mode: 'nearest',
                                    intersect: true
                                },
                                scales: {
                                    xAxes: [{
                                        display: true,
                                        scaleLabel: {
                                            display: true,
                                            labelString: ' {{ __('date') }}'
                                        }
                                    }],
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        },
                                        display: true,
                                        scaleLabel: {
                                            display: true,
                                            labelString: ' {{ __('prix') }}'
                                        }
                                    }]
                                },
                                plugins: {
                                    datalabels: {
                                        display: false,
                                    },
                                    filler: {
                                        propagate: false
                                    },
                                    'samples-filler-analyser': {
                                        target: 'chart-analyser'
                                    }
                                }
                            },
                            // Insert the custom plugin
                            plugins: [GradientBgPlugin],
                        };
                        line.destroy();
                        var ctx = document.getElementById('myChart');
                        line = new Chart(ctx, config);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }
            $('#prod').on('change', function() {
                getChart();
            })
            $('#other').on('change', function() {
              
                getChart();
            })
            $('#grosDetail').on('change', function() {
               
                getChart();
            })
            $('#ville').on('change', function() {
                $('#prod').empty();
                $('#prod').append(`<option value="0" disabled selected>{{ __('chargement') }}</option>`);
                $('#prod').multiselect("rebuild");
                $.ajax({
                    type: 'GET',
                    dataType: "JSON",
                    processData: false,
                    contentType: false,
                    url: "/getProductsFromCat/" + $('#ville').val(),
                    success: function(response) {
                        var newData = JSON.stringify(response)
                        var response = JSON.parse(newData);
                        console.log(response);
                        $('#prod').empty();
                        response.forEach(element => {
                            switch (locale) {
                                case 'fr':
                                    $('#prod').append(new Option(element['name'],
                                        element[
                                            'id']));
                                    break;
                                case 'ar':
                                    if (element['arabic_name'] != "") {
                                        $('#prod').append(new Option(element[
                                                'arabic_name'],
                                            element[
                                                'id']));
                                    } else {
                                        $('#prod').append(new Option(element['name'],
                                            element[
                                                'id']));
                                    }
                                    break;
                                case 'en':
                                    if (element['arabic_name'] != "") {
                                        $('#prod').append(new Option(element[
                                                'english_name'],
                                            element[
                                                'id']));
                                    } else {
                                        $('#prod').append(new Option(element['name'],
                                            element[
                                                'id']));
                                    }
                                    break;
                                default:
                                    $('#prod').append(new Option(element['name'],
                                        element[
                                            'id']));
                            }
                            $('#prod').multiselect("rebuild");
                            getChart();
                        });
                    },
                    error: function(data) {
                        $('#prod').empty();
                        $('#prod').append(`<option value="0" disabled selected></option>`);
                        console.log(data);
                        $('#prod').multiselect("rebuild");
                    }
                });
            });
					$('#prod').val('147').prop('selected',true);

        });
		
    </script>