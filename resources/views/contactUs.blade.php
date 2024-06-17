@extends('shared')
@section('contenu')
    <div id="breadcrumb">
        <div class="container">
            <div role="navigation" aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs" itemprop="breadcrumb">
                <ul class="trail-items" itemscope="" itemtype="https://schema.org/BreadcrumbList">
                    <meta name="numberOfItems" content="2">
                    <meta name="itemListOrder" content="Ascending">
                    <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem"
                        class="trail-item trail-begin"><a href="../" rel="home"
                            itemprop="item"><span itemprop="name">{{ __('accueil') }}</span></a>
                        <meta itemprop="position" content="1">
                    </li>
                    <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem"
                        class="trail-item trail-end"><span itemprop="item"><span itemprop="name">{{ __('contactUs') }}</span></span>
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



                        <article id="post-10" class="post-10 page type-page status-publish hentry">
                            <header class="entry-header">
                                <h1 class="entry-title" style="    color: #2ba48c;
                                font-family: 'Philosopher', sans-serif;
                                font-weight: normal;
                                font-size: 25px;
}
                                ">{{ __('contactUs') }}</h1>
                            </header><!-- .entry-header -->

                            <div class="entry-content">
                                <div role="form" class="wpcf7" id="wpcf7-f26-p10-o1" lang="en-US" dir="ltr">
                                    <div class="screen-reader-response">
                                        <p role="status" aria-live="polite" aria-atomic="true"></p>
                                        <ul></ul>
                                    </div>
                                    <form 
                                        class="wpcf7-form init" data-status="init" action="{{ route('contact_admin') }}" method="post">
                                        @csrf
                                        <div style="display: none;">
                                            <input type="hidden" name="_wpcf7" value="26">
                                            <input type="hidden" name="_wpcf7_version" value="5.5.6">
                                            <input type="hidden" name="_wpcf7_locale" value="en_US">
                                            <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f26-p10-o1">
                                            <input type="hidden" name="_wpcf7_container_post" value="10">
                                            <input type="hidden" name="_wpcf7_posted_data_hash" value="">
                                        </div>
                                        <p >{{__('nom')}}<br>
                                            <span class="wpcf7-form-control-wrap your-name"><input type="text"
                                                    name="nom" value="" size="40"
                                                    class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                                     aria-invalid="false" required></span>
                                        </p>
                                        <p>{{__('tonEmail')}}<br>
                                            <span class="wpcf7-form-control-wrap your-email"><input type="email"
                                                    name="email" value="" size="40"
                                                    class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email"
                                                    aria-invalid="false" required></span>
                                        </p>
                                        <p >{{__('sujet')}}<br>
                                            <span class="wpcf7-form-control-wrap your-subject"><input type="text"
                                                    name="sujet" value="" size="40"
                                                    class="wpcf7-form-control wpcf7-text" aria-invalid="false" required></span>
                                        </p>
                                        <p>{{__('message')}}<br>
                                            <span class="wpcf7-form-control-wrap your-message"><textarea name="message"
                                                    cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea"
                                                    aria-invalid="false" required></textarea></span>
                                        </p>
                                        <p><input type="submit" value="{{__('envoyer')}}"
                                                class="wpcf7-form-control has-spinner wpcf7-submit"><span
                                                class="wpcf7-spinner"></span></p>
                                        <div class="wpcf7-response-output" aria-hidden="true"></div>
                                    </form>
                                </div>
                            </div><!-- .entry-content -->

                            <footer class="entry-footer">
                            </footer><!-- .entry-footer -->
                        </article><!-- #post-## -->




                    </main><!-- #main -->
                </div><!-- #primary -->

                <div id="sidebar-primary" class="widget-area sidebar" role="complementary">
                    {{-- <aside id="trade-line-social-3" class="widget trade_line_widget_social">
                        <div class="search-box-wrap">
                            <form role="search" method="get" class="search-form"
                                action="/detail/{{$prod->id_category}}/{{$prod->id}}">
                                <label>
                                    <span class="screen-reader-text">"{{__('search')}}"</span>
                                    <input type="search" class="search-field" placeholder="{{__('search')}}" value="" name="s"
                                        title="{{__('search')}}">
                                </label>
                                <input type="submit" class="search-submit" value="{{__('lancer')}}">
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
