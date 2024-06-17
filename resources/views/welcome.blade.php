<!-- Styles -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.min.css">
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick-theme.min.css">
<style>
    .carousel-inner {
        width: 100%;
        height: 500px;
    }

    .carousel-inner .item {
        width: 100%;
        height: 100%;
    }

    .gallery .gallery-item .gallery-image {
        height: 100% !important;
    }

    .item img {
        height: 100% !important;
    }

    .multiselect-container>li>a>label.checkbox,
    .multiselect-container>li>a>label.radio {
        margin: 0;
        height: 25px;
    }

    .previous {
        background-color: #2ba48c !important;
        border-color: #2ba48c !important;
        color: white !important;
        padding: 12px !important;
        border-radius: 10px !important;
    }

    .previous:hover {
        background-color: #2ba48c !important;
        border-color: #2ba48c !important;
        color: white !important;
        padding: 12px !important;
        border-radius: 10px !important;
    }
</style>

@extends('shared')

@section('contenu')
    <div class="imageDiv" style="margin-top:4%">

        <div id="myCarousel" class="carousel slide m-10" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <div class="gallery">
                        <div class="gallery-item">
                            <img class="gallery-image" src="css/images/carousel12.jpeg">
                            alt="fruits et légumes">
                        </div>
                        <div class="gallery-item">
                            <img class="gallery-image" src="css/images/chicken.jpg" alt="chicken">
                        </div>
                        <div class="gallery-item">
                            <img class="gallery-image" src="css/images/fraiseCarousel.jpeg" alt="fruits">
                        </div>

                        <div class="gallery-item">
                            <img class="gallery-image" src="css/images/cerealsCarousel.jpeg" alt="grain">
                        </div>
                        <div class="gallery-item">
                            <img class="gallery-image" src="css/images/vacheCarousel.jpeg" alt="boeuf">
                        </div>

                    </div>
                </div>

                <div class="item">
                    <div class="gallery">
                        <div class="gallery-item">
                            <img class="gallery-image" src="css/images/1.jpg" alt="fruits">

                        </div>
                        <div class="gallery-item">
                            <img class="gallery-image" src="css/images/2.jpg" alt="chicken">
                        </div>
                        <div class="gallery-item">
                            <img class="gallery-image" src="css/images/3.jpg" alt="fruits">
                        </div>

                        <div class="gallery-item">
                            <img class="gallery-image" src="css/images/4.jpg" alt="grain">
                        </div>
                        <div class="gallery-item">
                            <img class="gallery-image" src="css/images/5.jpg" alt="boeuf">
                        </div>

                    </div>
                </div>
                <div class="item">
                    <div class="gallery">
                        <div class="gallery-item">
                            <img class="gallery-image" src="css/images/farm.jpg" alt="farm">

                        </div>
                        <div class="gallery-item">
                            <img class="gallery-image" src="css/images/farming.jpg" alt="farm">
                        </div>
                        <div class="gallery-item">
                            <img class="gallery-image" src="css/images/oeuf.jpg" alt="oeuf">
                        </div>

                        <div class="gallery-item">
                            <img class="gallery-image" src="css/images/water.jpg" alt="watering">
                        </div>
                        <div class="gallery-item">
                            <img class="gallery-image" src="css/images/bee.jpg" alt="bee">
                        </div>

                    </div>
                </div>
            </div>

            <!-- Left and right controls -->

        </div>
        <div class="textToBeOnTop">
            <div class="cycle-caption">
                <h3 class="textSlider"><a>{{ __('bienvenu') }}</a></h3>
                <p class="descriptionCust">{{ __('description') }}</p>
            </div>
        </div>
    </div>
    <div id="main-app" style="width: 97%;padding: 20px 56px 0px 56px;">
        <aside id="trade-line-latest-news-3" class="widget trade_line_widget_latest_news">
            <h2 class="widget-title"><span>{{ __('dernierPrix') }}</span></h2>

            <!-- .latest-news-widget -->

            <section class="section-main pt-4 pb-4"
                style="
                                                                        width: 90%;
                                                                        margin-left: 5%; margin-right:5%">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        @livewire('caroussel-pagination')
                    </div>
                </div>
            </section>
        </aside>
        <aside id="trade-line-latest-news-5" class="widget trade_line_widget_latest_news">
            <h2 class="widget-title"><span>{{ __('historique') }}</span></h2>

            @livewire('chart-pagination')


        </aside>
        @php $locale = session()->get('locale'); @endphp

        <aside id="trade-line-latest-news-4" class="widget trade_line_widget_latest_news">
           
            @livewire('tab-categories')

        </aside>
    </div><!-- .container -->
    <div style="height: 100px"> </div>

    <script>
        $(document).ready(function() {
            $('.left').click(function() {
                $('#carousel-example').carousel('prev');
            });

            $('.right').click(function() {
                $('#carousel-example').carousel('next');
            });
            $('.myleft').click(function() {
                $('#myCarousel').carousel('prev');
            });

            $('.myright').click(function() {
                $('#myCarousel').carousel('next');
            });

            $('#ville').multiselect({
                includeSelectAllOption: true,
                selectAllText: "{{ __('tous') }}",
                buttonWidth: '150px',
                enableFiltering: true,
                enableCaseInsensitiveFiltering: true,
                filterPlaceholder: "{{ __('search') }}",
                allSelectedText: "{{ __('tous') }}",
                nSelectedText: "Selectionnés",
            });
            $('#region').multiselect({
                includeSelectAllOption: true,
                enableFiltering: true,
                selectAllText: "{{ __('tous') }}",
                buttonWidth: '150px',
                enableCaseInsensitiveFiltering: true,
                filterPlaceholder: "{{ __('search') }}",
                allSelectedText: "{{ __('tous') }}",
                nSelectedText: "Selectionnés",

            });
            $('#prod').multiselect({
                includeSelectAllOption: true,
                enableFiltering: true,
                enableCaseInsensitiveFiltering: true,
                selectAllText: "{{ __('tous') }}",
                buttonWidth: '150px',
                filterPlaceholder: "{{ __('search') }}",
                allSelectedText: "{{ __('tous') }}",
                nSelectedText: "Selectionnés",

            });
            $('#other').multiselect({
                includeSelectAllOption: true,
                enableFiltering: true,
                enableCaseInsensitiveFiltering: true,
                selectAllText: "{{ __('tous') }}",
                buttonWidth: '150px',
                enableCaseInsensitiveFiltering: true,
                filterPlaceholder: "{{ __('search') }}",
                allSelectedText: "{{ __('tous') }}",
                nSelectedText: "Selectionnés",
            });
            $('#grosDetail').multiselect({
                includeSelectAllOption: true,
                enableFiltering: true,
                enableCaseInsensitiveFiltering: true,
                selectAllText: "{{ __('tous') }}",
                buttonWidth: '150px',
                enableCaseInsensitiveFiltering: true,
                filterPlaceholder: "{{ __('search') }}",
                allSelectedText: "{{ __('tous') }}",
                nSelectedText: "Selectionnés",
            });

        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.min.js"></script>
@endsection
