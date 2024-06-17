 @php $locale = session()->get('locale'); @endphp
 <div>

 <div class="owl-carousel owl-theme">
     @foreach ($products->toArray() as $product)
         <div class="item">
             <div class="latest-news-item">
                 <div class="latest-news-wrapper">
                     <div class="latest-news-thumb">

                         <img src="{{ $product->path_image }}" class="aligncenter wp-post-image" alt=""
                             loading="lazy" sizes="(max-width: 1024px) 100vw, 1024px">
                     </div><!-- .latest-news-thumb -->
                     <div class="latest-news-text-wrap">
                         <h3 class="latest-news-title">
                             @switch($locale)
                                 @case('fr')
                                     <a title="News Title goes here" class="product" data-id="{{ $product->id }}"
                                         data-idcat="{{ $product->id_category }}" data-idtype="{{ $product->type_id }}">{{ $product->name }}</a>
                                 @break

                                 @case('ar')
                                     <a title="News Title goes here" class="product" data-id="{{ $product->id }}"
                                         data-idcat="{{ $product->id_category }}" data-idtype="{{ $product->type_id }}">{{ $product->arabic_name }}</a>
                                 @break

                                 @case('en')
                                     <a title="News Title goes here" class="product" data-id="{{ $product->id }}"
                                         data-idcat="{{ $product->id_category }}" data-idtype="{{ $product->type_id }}">{{ $product->english_name }}</a>
                                 @break

                                 @default
                                     <a title="News Title goes here" class="product" data-id="{{ $product->id }}"
                                         data-idcat="{{ $product->id_category }}" data-idtype="{{ $product->type_id }}">{{ $product->name }}</a>
                                 @break
                             @endswitch
                         </h3><!-- .latest-news-title -->

                         <div class="latest-news-meta">

                                <span>{{ number_format($product->moyen,2,'.','') }} {{ __('dhByKg') }} 
                                    @switch($locale)
                                        @case('fr')
                                           @if ($product->unite_fr != '')   
                                            
                                            @endif
                                        @break

                                        @case('ar')
                                             @if ($product->unite_ar != '')
                                             
                                            @endif
                                        @break

                                        @case('en')
                                            @if ($product->unite_eng != '')
                                            
                                            @endif
                                        @break

                                        @default
                                            @if ($product->unite_fr != '')
                                            
                                            @endif
                                    @endswitch
                                </span>

                                 <!-- .latest-news-date -->
                             </div><!-- .latest-news-meta -->
                         
                        <br/>
                         <div class="latest-news-read-more">
                             <p style="color:{{ $product->pourcentage < -5  ? 'green' : ( ( $product->pourcentage >=-5 && $product->pourcentage < 5 ) ? 'gray':'red' ) }} ">{{ sprintf ("%.2f", $product->pourcentage)  }}%</p>
                         </div>
                         <!-- .latest-news-read-more -->
                     </div><!-- .latest-news-text-wrap -->
                 </div>
             </div>
         </div>
     @endforeach

 </div>
 </div>
<script type="text/javascript">
     $(document).ready(function() {
         $('.owl-carousel').owlCarousel({
             loop: true,
             nav: false,
             autoplay: true,
             autoplayTimeout: 2000,
             slideSpeed: 500,
             autoplayHoverPause: true,
             rtl: $("body").attr("dir") == 'rtl',
             responsive: {
                 0: {
                     items: 1
                 },
                 600: {
                     items: 2
                 },
                 1000: {
                     items: 4
                 }
             }
         })
     })
 </script>
 <script type="text/javascript">
     var line;
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
     $(document).ready(function() {
         //  //get first product of products
         var firstProduct = $('.owl-carousel .item:first-child .product');
         var idProduct = firstProduct.attr('data-id');
         var idCategory = firstProduct.attr('data-idcat');
         var idtype = firstProduct.attr('data-idtype');
         //get first product of products
         console.log(idtype);
         $("#other option[value='- 2 months']").prop("selected", true);
         $("#other").multiselect("refresh");
         $("#grosDetail option:selected").prop("selected", false);
         $("#grosDetail option[value=" + idtype + "]").prop("selected", true);
         $("#grosDetail").multiselect("refresh");
         $("#prod option:selected").prop("selected", false);
         $("#prod option[value=" + idProduct + "]").prop("selected", true);
         $('#prods').multiselect("rebuild");
         $.ajax({
             url: "/getNationalPrice/" + idProduct + "/ - 2 months/" + idtype,
             method: "GET",
             success: function(data) {
                 console.log(JSON.parse(data));
                 var player = [];
                 var score = [];
                 var jsonData = JSON.parse(data);
                 var unit= "";
                        if(jsonData.length > 0){
                            if(locale=='ar'){
                            if(jsonData[0]['unite_ar']!=""){
                                unit = ' / '+ jsonData[0]['unite_ar'];
                            }
                        }
                        else if(locale=='fr'){
                            if(jsonData[0]['unite_fr']!=""){
                                unit = ' / '+ jsonData[0]['unite_fr'];
                            }
                        }
                        else{
                            if(jsonData[0]['unite_eng']!=""){
                                unit = ' / '+ jsonData[0]['unite_eng'];
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
                             label: " {{ __('prix') }} " + unit,
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
                 // Destroys a specific chart instance
                 var ctx = document.getElementById('myChart');
                 line = new Chart(ctx, config);
             },
             error: function(data) {
                 $(".loading-container").css('display', 'none');
                 console.log(data);
             }
         });
     });
     function goToByScroll(id) {
         // Remove "link" from the ID
         id = id.replace("link", "");
         // Scroll
         $('html,body').animate({
             scrollTop: $("#" + id).offset().top
         }, {
             duration: 5000,
             easing: "linear",
         });
     }
     $('.product').click(function() {
         $("#ville").val($(this).data('idcat'));
         $("#ville").multiselect("refresh");
         console.log($(this).data('idtype'));
         $valProd = $(this).data('id');
         $("#other option:selected").prop("selected", false);
         $("#other option[value='- 2 months']")
             .prop("selected", true);
         $("#other").multiselect("refresh");
         $("#grosDetail option:selected").prop("selected", false);
         $("#grosDetail option[value=" + $(this).data('idtype') + "]")
             .prop("selected", true);
         $("#grosDetail").multiselect("refresh");
         $('#prod').empty();
         $('#prod').append(`<option value="0" disabled selected>{{ __('chargement') }}</option>`);
         $('#prod').multiselect("rebuild");
         $.ajax({
             type: 'GET',
             dataType: "JSON",
             processData: false,
             contentType: false,
             url: "/getProductsFromCat/" + $(this).data('idcat'),
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
                 });
                 console.log($valProd);
                 $('#prod').val($valProd);
                 $("#prod").multiselect("rebuild");
             },
             error: function(data) {
                 $('#prod').empty();
                 $('#prod').append(`<option value="0" disabled selected></option>`);
                 console.log(data);
                 $('#prod').multiselect("rebuild");
             }
         });
         goToByScroll('trade-line-latest-news-5');
         $.ajax({
             url: "/getNationalPrice/" + $(this).data('id') + "/ - 2 months/" + $(this).data('idtype'),
             method: "GET",
             success: function(data) {
                 $(".loading-container").css('display', 'none');
                 console.log(data);
                 var player = [];
                 var score = [];
                 var jsonData = JSON.parse(data);
                 var unit= "";
                        if(jsonData.length > 0){
                            if(locale=='ar'){
                            if(jsonData[0]['unite_ar']!=""){
                                unit = ' / '+ jsonData[0]['unite_ar'];
                            }
                        }
                        else if(locale=='fr'){
                            if(jsonData[0]['unite_fr']!=""){
                                unit = ' / '+ jsonData[0]['unite_fr'];
                            }
                        }
                        else{
                            if(jsonData[0]['unite_eng']!=""){
                                unit = ' / '+ jsonData[0]['unite_eng'];
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
                             label: " {{ __('prix') }} " + unit,
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
                     plugins: [GradientBgPlugin],
                 };
                 line.destroy();
                 var ctx = document.getElementById('myChart');
                 line = new Chart(ctx, config);
             },
             error: function(data) {
                 $(".loading-container").css('display', 'none');
                 console.log(data);
             }
         });
     });
 </script>