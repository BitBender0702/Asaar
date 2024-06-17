<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Asaar</title>
    <link rel="icon" href="{{ asset('/css/images/logoAsaar.png') }}" type="image/x-icon">
    <!-- Fonts -->
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    @livewireStyles

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sidr/2.2.1/jquery.sidr.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sidr/2.2.1/stylesheets/jquery.sidr.dark.min.css"
    
        rel="stylesheet" />

    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="stylesheet" id="mediaelement-css"
        href="https://themepalace.com/wp-includes/js/mediaelement/mediaelementplayer-legacy.min.css?ver=4.2.16"
        type="text/css" media="all">
    <link rel="stylesheet" id="wp-mediaelement-css"
        href="https://themepalace.com/wp-includes/js/mediaelement/wp-mediaelement.min.css?ver=5cf7f7af4acd59173ba4c57ab93260e7"
        type="text/css" media="all">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
    <script type="text/javascript" src="{{ asset('/js/custom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/custom.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/jetpack.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/jetpack.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/skip-link-focus-fix.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/skip-link-focus-fix.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.min.js">
    </script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/css/bootstrap-multiselect.css" />

    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *,
        :after,
        :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg,
        video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --bg-opacity: 1;
            background-color: #fff;
            background-color: rgba(255, 255, 255, var(--bg-opacity))
        }

        .bg-gray-100 {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity))
        }

        .border-gray-200 {
            --border-opacity: 1;
            border-color: #edf2f7;
            border-color: rgba(237, 242, 247, var(--border-opacity))
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .glyphicon-menu-down {
            margin-left: 5px;
            margin-right: 5px;
            margin-top: 5px;
        }

        .ml-1 {
            margin-left: .25rem;
            margin-right: .25rem;
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem;
            margin-right: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem;
            margin-right: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --text-opacity: 1;
            color: #edf2f7;
            color: rgba(237, 242, 247, var(--text-opacity))
        }

        .text-gray-300 {
            --text-opacity: 1;
            color: #e2e8f0;
            color: rgba(226, 232, 240, var(--text-opacity))
        }

        .text-gray-400 {
            --text-opacity: 1;
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--text-opacity))
        }

        .text-gray-500 {
            --text-opacity: 1;
            color: #a0aec0;
            color: rgba(160, 174, 192, var(--text-opacity))
        }

        .text-gray-600 {
            --text-opacity: 1;
            color: #718096;
            color: rgba(113, 128, 150, var(--text-opacity))
        }

        .text-gray-700 {
            --text-opacity: 1;
            color: #4a5568;
            color: rgba(74, 85, 104, var(--text-opacity))
        }

        .text-gray-900 {
            --text-opacity: 1;
            color: #1a202c;
            color: rgba(26, 32, 44, var(--text-opacity))
        }

        .underline {
            text-decoration: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr))
        }

        .inside-nave {
            width: 90%;
            margin-left: 5%;
            margin-right: 5%;
        }

        @media (min-width:640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width:768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width:1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme:dark) {
            .dark\:bg-gray-800 {
                --bg-opacity: 1;
                background-color: #2d3748;
                background-color: rgba(45, 55, 72, var(--bg-opacity))
            }

            .dark\:bg-gray-900 {
                --bg-opacity: 1;
                background-color: #1a202c;
                background-color: rgba(26, 32, 44, var(--bg-opacity))
            }

            .dark\:border-gray-700 {
                --border-opacity: 1;
                border-color: #4a5568;
                border-color: rgba(74, 85, 104, var(--border-opacity))
            }

            .dark\:text-white {
                --text-opacity: 1;
                color: #fff;
                color: rgba(255, 255, 255, var(--text-opacity))
            }

            .dark\:text-gray-400 {
                --text-opacity: 1;
                color: #cbd5e0;
                color: rgba(203, 213, 224, var(--text-opacity))
            }

            .dark\:text-gray-500 {
                --tw-text-opacity: 1;
                color: #6b7280;
                color: rgba(107, 114, 128, var(--tw-text-opacity))
            }
        }

    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        :root {
            /* Base font size */
            font-size: 10px;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }


        .heading {
            font-family: "Montserrat", Arial, sans-serif;
            font-size: 4rem;
            font-weight: 500;
            line-height: 1.5;
            text-align: center;
            padding: 3.5rem 0;
            color: #1a1a1a;
        }

        .heading span {
            display: block;
        }

        .gallery {
            text-align: center;
            display: flex;
            height: 520px;
            padding-top: 40px;
            /* Compensate for excess margin on outer gallery flex items */
            margin: -1rem -1rem;
        }

        .gallery-item {
            /* Minimum width of 24rem and grow to fit available space */
            /* Margin value should be half of grid-gap value as margins on flex items don't collapse */
            overflow: hidden;
        }

        .gallery-image {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 400ms ease-out;
        }

        .gallery-image:hover {}

        /*

The following rule will only run if your browser supports CSS grid.

Remove or comment-out the code block below to see how the browser will fall-back to flexbox styling.

*/

        @supports (display: grid) {
            .gallery {
                display: inline-flex;
                z-index: 1;
                grid-template-columns: repeat(auto-fit, minmax(24rem, 2fr));
            }

            .gallery,
            .gallery-item {
                margin: 0;
            }
        }

        .imageDiv {
            position: relative;
            width: 100%;
            padding-left: 2%;
            padding-right: 2%;
        }

        .textToBeOnTop {
            margin-left: 2%;
            margin-right: 2%;
            z-index: 2;
            margin-top: -15%;
            position: relative;
            margin-bottom: 5%;
        }


        .textSlider a {
            color: #fff
        }

        .descriptionCust {
            background-color: #dddddd;
            font-size: 15px;
            margin-bottom: 5px;
            padding: 20px;
            width: 40%;
            font-family: 'Philosopher', sans-serif !important;
            text-align: center;
        }

        .textSlider {
            background-color: #2ba48c;
            display: inline-block;
            /* font-size: 28px; */
            /* line-height: 1.2; */
            margin-bottom: 10px;
            padding: 5px 20px;
            font-weight: normal;
            line-height: 1.4;
            /* color: wheat; */
        }

        .widget-title {
            display: block;
            font-size: 1.5em;
            margin-block-start: 1.83em;
            margin-block-end: 0.83em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
        }

        .widget-title span {
            background-color: #2ba48c;
            color: #ffffff;
            display: inline-block;
            line-height: 1.5;
            margin-bottom: 20px;
            width: 15%;
            padding: 9px 25px;
            position: relative;
            text-align: center;
        }

        [dir="ltr"] .widget-title span::after {

            background-color: #ddd;
            content: "";
            height: 1px;
            position: absolute;
            top: 0;
            left: 100%;
            width: 550%;
            overflow-x: hidden;
            margin-left: 30px;
            margin-right: 30px;
            top: 46%;
        }

        [dir="rtl"] .widget-title span::before {

            background-color: #ddd;
            content: "";
            height: 1px;
            position: absolute;
            top: 0;
            width: 550%;
            overflow-x: hidden;
            right: 100%;
            margin-left: 30px;
            margin-right: 30px;
            top: 46%;
        }

        [dir="ltr"]  .period {
            display: flex;
            margin-left: 25%;
            margin-top: 0.1;
        }
        [dir="rtl"] .period{
            display: flex;
            margin-right: 25%;
            margin-top: 0.1;
        }
        .show {
            display: inline !important;

        }

        .show .btn {
            border: 0.5px solid #a0aec0 !important;
            border-radius: 0px !important;
            background-color: #e2e8f0 !important;
            width: 23%;
        }

        .dropdown-toggle::after {
            display: none;
        }

        .nav-pills>li.active>a,
        .nav-pills>li.active>a:focus,
        .nav-pills>li.active>a:hover {
            font-size: 16px;
            border-bottom: 2px solid #2ba48c;
            border-radius: 0px;
            background-color: transparent !important;
        }

        .nav-pills>li>a {
            color: #333333 !important;
            font-weight: bold;
            font-size: 14px;
        }


        .pagination {
            float: right !important;
            margin: 0 0 5px !important;
        }

        [dir="rtl"] .pagination {
            float: right;
        }

        .nav {
            padding-left: 0;
            display: flex;
            margin-bottom: 0;
            list-style: none;
        }



        .pagination li a {
            border: none !important;
            font-size: 95% !important;
            width: 30pX !important;
            height: 30px !important;
            color: #999 !important;
            margin: 0 3px !important;
            line-height: 30px !important;
            text-align: center !important;
            padding: 0 !important;
        }

        .pagination li a:hover {
            color: #666 !important;
        }

        .pagination li a {
            border: 1px solid #ccc !important;

        }

        .pagination li.active a {
            background: #2ba48c !important;
            color: white !important;
        }

        .pagination li.active a:hover {
            background: #2ba48c !important;
        }

        .pagination li.disabled i {
            color: #ccc !important;
        }

        .pagination li i {
            font-size: 16px !important;
            padding-top: 6px !important.
        }

        .hint-text {
            float: left;
            margin-top: 6px;
            font-size: 95%;
        }

        [dir="rtl"] .hint-text {
            float: right;
        }

        span.input-group-addon {
            display: none !important;
        }

        span.input-group-btn {
            display: none !important;
        }

        .calendar-table .table-condensed thead tr:nth-child(2) {
            background-color: transparent !important;
        }

        .daterangepicker td.active {
            background-color: #2ba48c !important;
        }

        .custom-logo-link {
            float: right;
        }

        .catPag {
            float: left;
        }

        [dir="rtl"] .catPag {
            float: right;
        }

        [dir="rtl"] .daterangepicker {
            direction: rtl;
        }

        .calendar-table {
            width: min-content;
        }

        .period {
            float: right;
        }

        [dir="rtl"] .period {
            float: left;
        }

        .download {
            float: right;
        }

        [dir="rtl"] .download {
            float: left;
        }

        .label {
            text-align: left;
        }

        [dir="rtl"] .label {
            text-align: right;
        }

        .wpcf7-form p {
            text-align: left;
        }

        [dir="rtl"] .wpcf7-form p {
            text-align: right;
        }

        [dir="rtl"] .multiselect-container>li>a>label.checkbox,
        .multiselect-container>li>a>label.radio {
            margin: 0;
            direction: ltr;
        }

        .input-group {
            position: relative;
            display: flex !important;
            border-collapse: separate;
        }

        .longMulti .open>.dropdown-menu {
            display: block;
            height: 250px;
            overflow-y: scroll;
        }

        .drop {
            height: 250px;
            overflow-y: scroll;
        }
        .moyen{
            font-size:18px;
        }
    </style>

</head>

<body class="antialiased" dir="{{ App::isLocale('ar') ? 'rtl' : 'ltr' }}">
    <a id="mobile-trigger" href="#mob-menu"><i class="fa fa-bars"></i></a>
    <div id="mob-menu">
        <ul id="menu-header-menu" class="menu">
            <li class="menu-item menu-item-type-post_type menu-item-object-page   page_item page-item-7  menu-item-22">
                <a href="/" aria-current="page">{{ __('accueil') }}</a>
            </li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-37"><a
                    href="/detail/{{$prod->id_category}}/{{$prod->id}}">{{ __('evolution') }}</a></li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-1814">
                <a href="/aboutUs">{{ __('apropos') }}</a>
            </li>

            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-36"><a
                    href="/contactUs">{{ __('contactUs') }}</a></li>

        </ul>


    </div>
    <header id="masthead" class="site-header" role="banner">
        <div class="site-branding">

            <a href="/" class="custom-logo-link" rel="home" aria-current="page" style="padding-top:20px;float:left"><img
                    width="150" height="150" src="{{ asset('/css/images/logoAsaar.png') }}"
                    class="custom-logo" alt="Trade Line Pro" sizes="(max-width: 150px) 100vw, 74px"></a>

            <div id="site-identity" style="padding-top:20px">
                <p class="site-description " style="width:40%">{{__('ministre')}}</p>
            </div><!-- #site-identity -->

        </div><!-- .site-branding -->
        <div class="right-head" style="direction: ltr">
            <a href="/" class="custom-logo-link" rel="home" aria-current="page" style="position: relative; margin-left: 10px;
            "><img width="120" height="120" src="{{ asset('/css/images/marocGen.png') }}"
                    class="custom-logo" alt="Trade Line Pro" sizes="(max-width: 150px) 100vw, 74px"></a>

            <div style="margin-top: 40px; display: inline-block;">
                {{-- <div class="search-box">
                    <a href="#" class="search-icon" target="_self"><i class="fa fa-search"></i></a>
                    <div class="search-box-wrap" style="display: none;">
                        <form role="search" method="get" class="search-form" action="/detail">
                            <label>
                                <span class="screen-reader-text">"{{ __('search') }}"</span>
                                <input type="search" class="search-field" placeholder="{{ __('search') }}" value=""
                                    name="s" title="{{ __('search') }}">
                            </label>
                            <input type="submit" class="search-submit" value="Lancer">
                        </form>
                    </div>

                </div> --}}


                <div class="social-links">
                    <div class="widget trade_line_widget_social">
                        <ul id="menu-social-menu" class="menu">
                         
                        </ul>
                    </div>

                </div>
            </div>

            <br />
            @php $locale = session()->get('locale'); @endphp
            <div class="dropdown">
                @switch($locale)
                    @case('fr')
                        <button class="btn dropdown-toggle" type="button" data-toggle="dropdown"
                            style="background-color: transparent;border-bottom:1px solid #333333;width:53%;border-radius:0px;">Français
                            <span class="caret"></span></button>
                    @break

                    @case('ar')
                        <button class="btn dropdown-toggle" type="button" data-toggle="dropdown"
                            style="background-color: transparent;border-bottom:1px solid #333333;width:53%;border-radius:0px;">العربية
                            <span class="caret"></span></button>
                    @break

                    @case('en')
                        <button class="btn dropdown-toggle" type="button" data-toggle="dropdown"
                            style="background-color: transparent;border-bottom:1px solid #333333;width:53%;border-radius:0px;">English
                            <span class="caret"></span></button>
                    @break

                    @default
                        <button class="btn dropdown-toggle" type="button" data-toggle="dropdown"
                            style="background-color: transparent;border-bottom:1px solid #333333;border-radius:0px;">Français
                            <span class="caret"></span></button>
                @endswitch

                <ul class="dropdown-menu">
                    <li> <a class="dropdown-item" href="../../lang/ar">العربية</a></li>
                    <li> <a class="dropdown-item" href="../../lang/fr">Français</a></li>
                    <li> <a class="dropdown-item" href="../../lang/en">English</a></li>
                </ul>
            </div>
        </div>

    </header>
    <div id="main-nav" class="clear-fix">
        <nav id="site-navigation" class="main-navigation" role="navigation">
            <div class="wrap-menu-content">
                <div class="menu-header-menu-container">
                    <ul id="primary-menu" class="menu">
                        <li
                            class="menu-item menu-item-type-post_type menu-item-object-page   page_item page-item-7  menu-item-22">
                            <a href="/" aria-current="page">{{ __('accueil') }}</a>
                        </li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-37"><a
                            href="/detail/{{$prod->id_category}}/{{$prod->id}}">{{ __('evolution') }}</a></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1814">
                            <a href="/aboutUs">{{ __('apropos') }}</a>
                        </li>

                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-36"><a
                                href="/contactUs">{{ __('contactUs') }}</a></li>

                    </ul>
                </div>
            </div><!-- .menu-content -->
        </nav><!-- #site-navigation -->
    </div> <!-- .container -->
    </div>
    @yield('contenu')

    <div id="footer-widgets">
        <div class="container">
            <div class="inner-wrapper" style="
            display: inherit;">
                <div class="footer-active-4 footer-widget-area">
                    <aside id="text-2" class="widget widget_text">
                        <h3 class="widget-title">{{ __('asaar') }}</h3>
                        <div class="textwidget" id="defAsaar"></div>
                    </aside>
                </div><!-- .footer-widget-area -->
                <div class="footer-active-4 footer-widget-area">
                    <aside id="trade-line-advanced-recent-posts-2"
                        class="widget trade_line_widget_advanced_recent_posts">
                        <h3 class="widget-title">{{ __('contact') }}</h3>

                        <div class="advanced-recent-posts-widget">


                            <div class="advanced-recent-posts-item">

                                <div class="advanced-recent-posts-text-wrap">
                                    <h3 class="advanced-recent-posts-title">
                                        <a style="color: #2ba48c">{{ __('telFax') }}</a>
                                    </h3><!-- .advanced-recent-posts-title -->

                                    <div class="advanced-recent-posts-meta">

                                        <span class="advanced-recent-posts-date" id="phone"></span>
                                        <!-- .advanced-recent-posts-date -->

                                    </div><!-- .advanced-recent-posts-meta -->

                                </div><!-- .advanced-recent-posts-text-wrap -->

                            </div><!-- .advanced-recent-posts-item .col-sm-3 -->


                            <div class="advanced-recent-posts-item">

                                <div class="advanced-recent-posts-text-wrap">
                                    <h3 class="advanced-recent-posts-title">
                                        <a style="color: #2ba48c">{{ __('email') }}</a>
                                    </h3><!-- .advanced-recent-posts-title -->

                                    <div class="advanced-recent-posts-meta">

                                        <span class="advanced-recent-posts-date" id="email"></span>
                                        <!-- .advanced-recent-posts-date -->

                                    </div><!-- .advanced-recent-posts-meta -->

                                </div><!-- .advanced-recent-posts-text-wrap -->

                            </div><!-- .advanced-recent-posts-item .col-sm-3 -->
                        </div><!-- .advanced-recent-posts-widget -->


                    </aside>
                </div><!-- .footer-widget-area -->
                <div class="footer-active-4 footer-widget-area">
                    <aside id="nav_menu-2" class="widget widget_nav_menu">
                        <h3 class="widget-title">{{ __('quick') }}</h3>
                        <div class="menu-footer-menu-container">
                            <ul id="menu-footer-menu" class="menul">
                                <li
                                    class="menu-item menu-item-type-post_type menu-item-object-page   page_item page-item-7  menu-item-22">
                                    <a href="/" aria-current="page">{{ __('accueil') }}</a>
                                </li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-37"><a
                                    href="/detail/{{$prod->id_category}}/{{$prod->id}}">{{ __('evolution') }}</a></li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1814">
                                    <a href="/aboutUs">{{ __('apropos') }}</a>
                                </li>

                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-36"><a
                                        href="/contactUs">{{ __('contactUs') }}</a></li>
                            </ul>
                        </div>
                    </aside>
                </div><!-- .footer-widget-area -->
                <div class="footer-active-4 footer-widget-area">
                    <aside id="trade-line-social-2" class="widget trade_line_widget_social">
                        <h3 class="widget-title">{{ __('social') }}</h3>
                        <ul id="menu-social-menu-1" class="menu">
  
                        </ul>
                    </aside>

                </div>
                <!-- .footer-widget-area -->
            </div><!-- .inner-wrapper -->
        </div><!-- .container -->

    </div>
    <footer id="colophon" class="site-footer" role="contentinfo">
        <div class="container">
            <div class="copyright">
                Copyright © 2022 <a href="/aboutUs">Asaar</a>. All rights reserved. </div><!-- .copyright -->
            <div class="site-info">
                | <a>Asaar</a> </div><!-- .site-info -->
        </div><!-- .container -->
    </footer>
    @livewireScripts

    <script>
        window.onscroll = function(ev) {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                window.livewire.emit('chart-pagination');
            }
        };
    </script>
    <?php $locale = session()->get('locale'); ?>
    <script type="module" async>
        var locale = "<?php echo $locale; ?>";
            $(document).ready(function() {
           
            $.ajax({
                url: "/getFooter",
                method: "GET",
                success: function(data) {

                    switch (locale) {
                                case 'fr':
                                $('#defAsaar').html(data['Asaar']);
                                    break;
                                case 'ar':
                                $('#defAsaar').html(data['Asaar_arabic']);
                                    break;
                                case 'en':
                                $('#defAsaar').html(data['Asaar_english']);
                                    break;
                                default:
                                $('#defAsaar').html(data['Asaar']);
                            }          
                            $('#phone').html(data['phone']);
                            $('#email').html(data['email']);   
                            if(data['facebook'] !=null){
                                $('.menu').append('<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-40"><a href='+data['facebook']+'><span class="screen-reader-text" id="facebook">facebook</span></a>')
                            } 
                            if(data['tweeter'] !=null){
                                $('.menu').append('<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-40"><a href='+data['tweeter']+'><span class="screen-reader-text" id="tweeter">tweeter</span></a>')
                            }   
                            if(data['youtube'] !=null){
                                $('.menu').append('<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-40"><a href='+data['youtube']+'><span class="screen-reader-text" id="youtube">youtube</span></a>')
                            }  
                            if(data['instagram'] !=null){
                                $('.menu').append('<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-40"><a href='+data['instagram']+'><span class="screen-reader-text" id="instagram">instagram</span></a>')
                            }
                            if(data['linkedIn'] !=null){
                                $('.menu').append('<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-40"><a href='+data['linkedIn']+'><span class="screen-reader-text" id="linkedIn">linkedIn</span></a>')
                            }
                },
                error: function(data) {
                  
                }


            });         
            

        });
        $('.responsive').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              dots: false
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
      });
      $(document).ready(function() {
  $('#media').carousel({
    pause: true,
    interval: false,
  });
});

          </script>


</body>

</html>
