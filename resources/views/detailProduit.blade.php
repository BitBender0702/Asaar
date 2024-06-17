@extends('shared')

@section('contenu')
    <style>
        .btn {
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }

        .download {
            margin-top: 0.8%;
            margin-left: 8%;
            margin-right: 8%;
        }

        .date {

            border: 1px solid #CFD8DC !important;
            border-radius: 4px !important;
            box-sizing: border-box;
            background-color: transparent !important;
            color: #000 !important;
            font-size: 16px !important;
            letter-spacing: 1px;
            position: relative
        }

        .date:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #2ba48c !important;
            outline-width: 0
        }

        .fa-calendar {
            position: absolute;
            top: 10px;
            left: 80%;
            font-size: 15px;
            color: #2ba48c;
            z-index: 2
        }

        [dir="rtl"] .fa-calendar {
            right: 80%;
			left:0% !important;
        }

        .fa-file-download {
            font-size: 25px;
            color: #2ba48c;
        }

        .fa-file-download:hover {
            font-size: 28px;
            color: #2ba48c;
            cursor: pointer;
        }

        #fa-1 {
            margin-top: 2px;
            left: calc(100% - 55%)
        }

        #fa-2 {
            margin-top: 2px;
            left: calc(100% - 5%);
        }

        .form-control-placeholder {
            position: absolute;
            padding: 12px 2px 0 2px;
            opacity: 0.5
        }

        #end-p {
            left: calc(50% + 4px)
        }

        .form-control:focus+.form-control-placeholder,
        .form-control:valid+.form-control-placeholder {
            font-size: 95%;
            top: 10px;
            transform: translate3d(0, -100%, 0);
            opacity: 1
        }

        ::placeholder {
            color: #BDBDBD;
            opacity: 1
        }

        :-ms-input-placeholder {
            color: #BDBDBD
        }

        ::-ms-input-placeholder {
            color: #BDBDBD
        }

        button:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            outline-width: 0
        }

        .datepicker {
            background-color: #fff;
            border-radius: 0 !important;
            padding: 0 !important;
            text-align: center
        }

        .datepicker-dropdown {
            top: 65% !important;
            left: calc(34% - 8.5%) !important;
            border-right: #2ba48c;
            border-left: #2ba48c
        }

        .datepicker-dropdown.datepicker-orient-left:before {
            left: calc(50% - 6px) !important
        }

        .datepicker-dropdown.datepicker-orient-left:after {
            left: calc(50% - 5px) !important;
            border-bottom-color: #2ba48c
        }

        .datepicker-dropdown.datepicker-orient-right:after {
            border-bottom-color: #2ba48c
        }

        .datepicker table tr td.today,
        span.focused {
            border-radius: 50% !important;
            background-image: linear-gradient(#FFF3E0, #FFE0B2)
        }

        thead tr:nth-child(2) {
            background-color: #2ba48c !important
        }

        thead tr:nth-child(3) th {
            font-weight: bold !important;
            padding: 20px 10px !important;
            color: #BDBDBD !important
        }

        tbody tr td {
            padding: 10px !important
        }

        tfoot tr:nth-child(2) th {
            padding: 10px !important;
            border-top: 1px solid #CFD8DC !important
        }

        .cw {
            font-size: 14px !important;
            background-color: #E8EAF6 !important;
            border-radius: 0px !important;
            padding: 0px 20px !important;
            margin-right: 10px solid #fff !important
        }

        .old,
        .day,
        .new {
            width: 40px !important;
            height: 40px !important;
            border-radius: 0px !important
        }

        .day.old,
        .day.new {
            color: #E0E0E0 !important
        }

        .day.old:hover,
        .day.new:hover {
            border-radius: 50% !important
        }

        .input-group {
            display: flex;
        }

        .old-day:hover,
        .day:hover,
        .new-day:hover,
        .month:hover,
        .year:hover,
        .decade:hover,
        .century:hover {
            border-radius: 50% !important;
            background-color: #eee
        }

        /* .active {
                                                border-radius: 50% !important;
                                                background-image: linear-gradient(#2ba48e, #2ba48c) !important;
                                                color: #fff !important
                                            } */

        .range-start,
        .range-end {
            border-radius: 50% !important;
            background-image: linear-gradient(#2ba48e, #2ba48c) !important
        }

        .range {
            background-color: #E3F2FD !important
        }

        .prev,
        .next,
        .datepicker-switch {
            border-radius: 0 !important;
            padding: 10px 10px 10px 10px !important;
            font-size: 18px;
            opacity: 0.7;
            color: #fff
        }

        .prev:hover,
        .next:hover,
        .datepicker-switch:hover {
            background-color: inherit !important;
            opacity: 1
        }

        @media screen and (max-width: 726px) {
            .datepicker-dropdown.datepicker-orient-right:before {
                right: calc(50% - 6px)
            }

            .datepicker-dropdown.datepicker-orient-right:after {
                right: calc(50% - 5px)
            }
        }

        .grosDetail {
            padding-left: 0% !important;
            background-color: transparent !important;
            border-radius: 5px !important;
            height: 34px !important;
        }

        [dir="rtl"] .grosDetail {
            padding-right: 0% !important;
            background-color: transparent !important;
            border-radius: 5px !important;
            height: 34px !important;
        }

        .form-group {
            margin-bottom: 0px !important;
        }
    </style>
    <div>
        <div id="breadcrumb">
            <div class="container">
                <div role="navigation" aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs" itemprop="breadcrumb">
                    <ul class="trail-items" itemscope="" itemtype="https://schema.org/BreadcrumbList">
                        <meta name="numberOfItems" content="2">
                        <meta name="itemListOrder" content="Ascending">
                        <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem"
                            class="trail-item trail-begin"><a href="../../../" rel="home" itemprop="item"><span
                                    itemprop="name">{{ __('accueil') }}</span></a>
                            <meta itemprop="position" content="1">
                        </li>
                        <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem"
                            class="trail-item trail-end"><span itemprop="item"><span
                                    itemprop="name">{{ __('evolution') }}</span></span>
                            <meta itemprop="position" content="2">
                        </li>
                    </ul>
                </div>
            </div><!-- .container -->
        </div>
        <div id="content" class="site-content">
            <div class="container">
                <div class="inner-wrapper" style="display: inherit !important">

                    <div id="primary" class="content-area">
                        <main id="main" class="site-main" role="main">



                            <article id="post-11" class="post-11 page type-page status-publish has-post-thumbnail hentry">
                                <header class="entry-header">
                                    <h1 class="entry-title"
                                        style="    color: #2ba48c;
                                                                        font-family: 'Philosopher', sans-serif;
                                                                        font-weight: normal;
                                                                        font-size: 25px;
                                        }
                                                                        ">
                                        {{ __('evolution') }}</h1>
                                </header><!-- .entry-header -->

                                @livewire('evolution-pagination', ['idProd' => $id, 'region' => null, 'ville' => null, 'startDate' => null, 'endDate' => null, 'regionName' => null, 'villeName' => null, 'prodName' => 'Tomate', 'descByPrice' => null, 'descByDate' => null, 'idCategory' => $idCategory, 'categoryName' => 'Légumes', 'idType' => 2])

                            </article><!-- #post-## -->




                        </main><!-- #main -->
                    </div><!-- #primary -->
                    <div id="sidebar-primary" class="widget-area sidebar" role="complementary">
                        <aside id="archives-2" class="widget widget_archive">
                            <h2 class="widget-title">{{ __('quick') }}</h2>
                            <ul>
                                <li><a href="../../../">{{ __('accueil') }}</a></li>
                                <li><a href="/aboutUs">{{ __('apropos') }}</a></li>
                                <li><a href="/contactUs">{{ __('contactUs') }}</a></li>

                            </ul>
                        </aside>
                    </div><!-- #sidebar-primary -->
                </div><!-- .inner-wrapper -->
            </div><!-- .container -->
        </div>
    </div>
@endsection
