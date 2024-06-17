@extends('shared')
@section('contenu')
    <div id="breadcrumb">
        <div class="container">
            <div role="navigation" aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs" itemprop="breadcrumb">
                <ul class="trail-items" itemscope="" itemtype="https://schema.org/BreadcrumbList">
                    <meta name="numberOfItems" content="2">
                    <meta name="itemListOrder" content="Ascending">
                    <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem"
                        class="trail-item trail-begin"><a href="../" rel="home" itemprop="item"><span
                                itemprop="name">{{ __('accueil') }}</span></a>
                        <meta itemprop="position" content="1">
                    </li>
                    <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem"
                        class="trail-item trail-end"><span itemprop="item"><span
                                itemprop="name">{{ __('quisommes') }}</span></span>
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
                        <article id="post-9" class="post-9 page type-page status-publish has-post-thumbnail hentry">
                            <header class="entry-header">
                                <h1 class="entry-title"
                                    style="    color: #2ba48c;
                                font-family: 'Philosopher', sans-serif;
                                font-weight: normal;
                                font-size: 25px;}
                                ">
                                    {{ __('quisommes') }}</h1>
                            </header><!-- .entry-header -->
                            <div class="entry-content">
                                <img width="895" height="597"
                                    src="https://lebureaudecom.fr/wp-content/uploads/2017/02/produits-agricoles.png"
                                    class="aligncenter wp-post-image" alt=""
                                    sizes="(max-width: 895px) 100vw, 895px">
                                <p>{{ __('firstPart') }} </p>
                                <p>{{ __('secondPart') }}</p>
                            </div><!-- .entry-content -->
                            <footer class="entry-footer">
                            </footer><!-- .entry-footer -->
                        </article><!-- #post-## -->
                    </main><!-- #main -->
                </div><!-- #primary -->
                <div id="sidebar-primary" class="widget-area sidebar" role="complementary">
                    <aside id="trade-line-social-3" class="widget trade_line_widget_social">
                        <h2 class="widget-title">{{ __('social') }}</h2>
                        <ul id="menu-social-menu-2" class="menu">
                        </ul>
                    </aside>
                    {{-- <aside id="trade-line-social-3" class="widget trade_line_widget_social">
                        <div class="search-box-wrap">
                            <form role="search" method="get" class="search-form"
                                action="/detail/{{ $prod->id_category }}/{{ $prod->id }}">
                                <label>
                                    <span class="screen-reader-text">"{{ __('search') }}"</span>
                                    <input type="search" class="search-field" placeholder="{{ __('search') }}"
                                        value="" name="s" title="{{ __('search') }}">
                                </label>
                                <input type="submit" class="search-submit" value="{{ __('lancer') }}">
                            </form>
                        </div>
                    </aside> --}}
                    <aside id="archives-2" class="widget widget_archive">
                        <h2 class="widget-title">{{ __('quick') }}</h2>
                        <ul>
                            <li><a href="./">{{ __('accueil') }}</a></li>
                            <li><a href="/aboutUs">{{ __('apropos') }}</a></li>
                            <li><a href="/contactUs">{{ __('contactUs') }}</a></li>
                        </ul>
                    </aside>
                </div><!-- #sidebar-primary -->
            </div><!-- .inner-wrapper -->
        </div><!-- .container -->
    </div>
@endsection
