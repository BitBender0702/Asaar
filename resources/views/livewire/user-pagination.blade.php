 @php $locale = session()->get('locale'); @endphp
 {{-- <div class="row">
   <script type="text/javascript">
       $(document).ready(function() {
        console.log("here");
            var selectData = $( window ).width();
            var value;
                if(selectData>1200){
                    value=4;
                }
                else if(selectData<=1200 && selectData>1000){
                    value=3;
                }
                else if(selectData<=1000 && selectData>700){
                    value=2;
                }
                else{
                    value=1;
                }
                @this.set('pagination',value);
            $( window ).resize(function() {
                var selectData = $( window ).width();
                console.log(selectData);
            var value;
            if(selectData>1200){
                    value=4;
                }
                else if(selectData<=1200 && selectData>1000){
                    value=3;
                }
                else if(selectData<=1000 && selectData>700){
                    value=2;
                }
                else{
                    value=1;
                }

                console.log(value);
                @this.set('pagination',value);
                  });
});
    </script>
    <div id="carousel-example" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel slide media-carousel" id="media">

            <div class="carousel-inner" style="display: table">

                <?php 

    // query here
    // and you can return the result if you want to do some things cool ;)


                    
            foreach (array_chunk($products->toArray(), $pagination, true) as $column){ ?>
                <?php switch (array_search($column,array_chunk($products->toArray(),  $pagination, true))) {
                        case 0:
                        
                        ?>

                <div class="item active">
                    <?php break;
                    default:
                    
                    ?>
                    <div class="item">
                        <?php
                        break;
                        } ?>
                        <div class="row">
                            <?php foreach ($column as $product){ ?>
                            <div>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <div class="latest-news-item">
                                        <div class="latest-news-wrapper">
                                            <div class="latest-news-thumb">

                                                <img src="{{ $product->path_image }}"
                                                    class="aligncenter wp-post-image" alt="" loading="lazy"
                                                    sizes="(max-width: 1024px) 100vw, 1024px">
                                            </div><!-- .latest-news-thumb -->
                                            <div class="latest-news-text-wrap">
                                                <h3 class="latest-news-title">
                                                    @switch($locale)
                                                        @case('fr')
                                                            <a title="News Title goes here" class="product"
                                                                data-id="{{ $product->id }}"
                                                                data-idcat="{{ $product->id_category }}">{{ $product->name }}</a>
                                                        @break

                                                        @case('ar')
                                                            <a title="News Title goes here" class="product"
                                                                data-id="{{ $product->id }}"
                                                                data-idcat="{{ $product->id_category }}">{{ $product->arabic_name }}</a>
                                                        @break

                                                        @case('en')
                                                            <a title="News Title goes here" class="product"
                                                                data-id="{{ $product->id }}"
                                                                data-idcat="{{ $product->id_category }}">{{ $product->english_name }}</a>
                                                        @break

                                                        @default
                                                            <a title="News Title goes here" class="product"
                                                                data-id="{{ $product->id }}"
                                                                data-idcat="{{ $product->id_category }}">{{ $product->name }}</a>
                                                    @endswitch
                                                </h3><!-- .latest-news-title -->

                                                <div class="latest-news-meta">

                                                    <span class="moyen">{{ $product->moyen }} {{ __('dhByKg') }}</span>
                                                    <!-- .latest-news-date -->
                                                </div><!-- .latest-news-meta -->
                                                <div class="latest-news-read-more">
                                                    <p>{{ round($product->pourcentage, 2) }}%</p>
                                                </div>
                                                <!-- .latest-news-read-more -->
                                            </div><!-- .latest-news-text-wrap -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php } ?>

                </div>

            </div>
        </div>

    </div>


    --}}
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
                                         data-idcat="{{ $product->id_category }}">{{ $product->name }}</a>
                                 @break

                                 @case('ar')
                                     <a title="News Title goes here" class="product" data-id="{{ $product->id }}"
                                         data-idcat="{{ $product->id_category }}">{{ $product->arabic_name }}</a>
                                 @break

                                 @case('en')
                                     <a title="News Title goes here" class="product" data-id="{{ $product->id }}"
                                         data-idcat="{{ $product->id_category }}">{{ $product->english_name }}</a>
                                 @break

                                 @default
                                     <a title="News Title goes here" class="product" data-id="{{ $product->id }}"
                                         data-idcat="{{ $product->id_category }}">{{ $product->name }}</a>
                                 @break
                             @endswitch
                         </h3><!-- .latest-news-title -->

                         <div class="latest-news-meta">

                             <span class="moyen">{{ $product->moyen }} {{ __('dhByKg') }}</span>
                             <!-- .latest-news-date -->
                         </div><!-- .latest-news-meta -->
                         <div class="latest-news-read-more">
                             <p>{{ round($product->pourcentage, 2) }}%</p>
                         </div>
                         <!-- .latest-news-read-more -->
                     </div><!-- .latest-news-text-wrap -->
                 </div>
             </div>
         </div>
     @endforeach

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
         //get first product of products
    

       $("#other option[value='- 2 months']").prop("selected", true);
       $("#other").multiselect("refresh");

       $("#grosDetail option:selected").prop("selected", false);

       $("#grosDetail option[value='2']").prop("selected", true);
       $("#grosDetail").multiselect("refresh");

       $("#prod option:selected").prop("selected", false);

       $("#prod option[value="+idProduct+"]").prop("selected", true);

       $('#prods').multiselect("rebuild");
    
         
         $.ajax({
             url: "/getNationalPrice/" + idProduct + "/ - 2 months/2",
         
             method: "GET",
             success: function(data) {
                 console.log(JSON.parse(data));
                 var player = [];
                 var score = [];
                 var jsonData = JSON.parse(data);
                 for (var i in jsonData) {
                         player.push(jsonData[i]['date']);
                         score.push(jsonData[i]['moyen'].toFixed(2));
                 }

                 var config = {
                     type: 'line',

                     data: {
                         labels: player,
                         datasets: [{
                             label: " {{ __('prix') }}",
                             borderColor: 'rgba(40, 178, 154, 1)',
                             data: score,
                             fill: false,

                         }]
                     },
                     // options: {
                     //     maintainAspectRatio: false,

                     //     tooltips: {
                     //         enabled: true
                     //     },
                     //     elements: {
                     //         point: {
                     //             radius: 0
                     //         }
                     //     },
                     //     animation: {
                     //         duration: 0,
                     //         onComplete: function() {
                     //             // render the value of the chart above the bar
                     //             var ctx = this.chart.ctx;
                     //             ctx.font = Chart.helpers.fontString(0, 'normal', Chart
                     //                 .defaults.global.defaultFontFamily);
                     //             ctx.fillStyle = this.chart.config.options.defaultFontColor;
                     //             ctx.textAlign = 'center';
                     //             ctx.textBaseline = 'bottom';
                     //             this.data.datasets.forEach(function(dataset) {
                     //                 for (var i = 0; i < dataset.data.length; i++) {
                     //                     var model = dataset._meta[Object.keys(
                     //                         dataset._meta)[0]].data[i]._model;
                     //                     ctx.fillText(dataset.data[i], model.x, model
                     //                         .y - 5);
                     //                 }
                     //             });
                     //         }
                     //     },
                     //     responsive: true,
                     //     scales: {
                     //         yAxes: [{

                     //             display: true,
                     //             gridLines: {
                     //                 display: false
                     //             },
                     //             scaleLabel: {
                     //                 display: true,
                     //                 labelString: 'Prix'
                     //             },
                     //             ticks: {
                     //                 beginAtZero: true,
                     //                 suggestedMax: 7,
                     //                 stepSize: 10,

                     //             }
                     //         }],
                     //         xAxes: [{
                     //             offset: 100,
                     //             gridLines: {
                     //                 display: true,

                     //             },
                     //             ticks:{
                     //                     autoSkip: true,
                     //                    maxTicksLimit: 30
                     //                 }
                     //         }]
                     //     }
                     // },
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
             $valProd = $(this).data('id');
             $("#other option:selected").prop("selected", false);

             $("#other option[value='- 2 months']")
                 .prop("selected", true);
             $("#other").multiselect("refresh");

             $("#grosDetail option:selected").prop("selected", false);

             $("#grosDetail option[value='2']")
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
                 url: "/getNationalPrice/" + $(this).data('id') + "/ - 2 months/2",
                 method: "GET",

                 success: function(data) {
                     $(".loading-container").css('display', 'none');

                     console.log(data);
                     var player = [];
                     var score = [];
                     var jsonData = JSON.parse(data);
                     for (var i in jsonData) {

                         player.push(jsonData[i]['date']);
                         score.push(jsonData[i]['moyen'].toFixed(2));
                     }

                     var config = {
                         type: 'line',

                         data: {
                             labels: player,
                             datasets: [{
                                 label: " {{ __('prix') }}",
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
                        //  options: {
                        //      maintainAspectRatio: false,
                        //      tooltips: {
                        //          enabled: true
                        //      },
                        //      elements: {
                        //          point: {
                        //              radius: 0
                        //          }
                        //      },
                        //      animation: {
                        //          duration: 0,
                        //          onComplete: function() {
                        //              // render the value of the chart above the bar
                        //              var ctx = this.chart.ctx;
                        //              ctx.font = Chart.helpers.fontString(Chart
                        //                  .defaults.global.defaultFontSize,
                        //                  'normal', Chart
                        //                  .defaults.global.defaultFontFamily);
                        //              ctx.fillStyle = this.chart.config.options
                        //                  .defaultFontColor;
                        //              ctx.textAlign = 'center';
                        //              ctx.textBaseline = 'bottom';
                        //              this.data.datasets.forEach(function(dataset) {
                        //                  for (var i = 0; i < dataset.data
                        //                      .length; i++) {
                        //                      var model = dataset._meta[Object
                        //                              .keys(dataset._meta)[0]]
                        //                          .data[i]._model;
                        //                      ctx.fillText(dataset.data[i],
                        //                          model.x, model.y - 5);
                        //                  }
                        //              });
                        //          }
                        //      },
                        //      responsive: true,
                        //      scales: {
                        //          yAxes: [{
                        //              display: true,
                        //              gridLines: {
                        //                  display: false
                        //              },
                        //              scaleLabel: {
                        //                  display: true,
                        //                  labelString: 'Value'
                        //              },
                        //              ticks: {
                        //                  beginAtZero: true,
                        //                  suggestedMax: 7,
                        //                  stepSize : 5,
                        //              }
                        //          }],
                        //          xAxes: [{
                        //             offset: 100,
                        //              gridLines: {
                        //                  display: true
                        //              },
                        //              ticks: {
                        //                  autoSkip: true,
                        //                  maxTicksLimit: 30
                        //              }
                        //          }]
                        //      }
                        //  },
                         // Insert the custom plugin
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
