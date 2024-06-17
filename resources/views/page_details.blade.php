<div class="carousel-inner">
    @php $locale = session()->get('locale'); @endphp
    <div class="item active">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-3 col-lg-3 mb-2">
                    <div class="latest-news-item">
                        <div class="latest-news-wrapper">
                            <div class="latest-news-thumb">

                                <img src="{{ $product->path_image }}" class="aligncenter wp-post-image" alt=""
                                    loading="lazy" sizes="(max-width: 1024px) 100vw, 1024px">
                            </div><!-- .latest-news-thumb -->
                            <div class="latest-news-text-wrap">
                                <h3 class="latest-news-title">
                                    <a title="News Title goes here">{{ $product->name }}</a>
                                </h3><!-- .latest-news-title -->

                                <div class="latest-news-meta">

                                    <span>{{ $product->moyen }} {{ __('dhByKg') }} 
                                        @switch($locale)
                                            @case('fr')
                                               @if ($product->unite_fr != '')   
                                                / {{ $product->unite_fr }}
                                                @endif
                                            @break

                                            @case('ar')
                                                 @if ($product->unite_ar != '')
                                                 / {{ $product -> unite_ar}}
                                                @endif
                                            @break

                                            @case('en')
                                                @if ($product->unite_eng != '')
                                                / {{ $product->unite_eng }}
                                                @endif
                                            @break

                                            @default
                                                @if ($product->unite_fr != '')
                                               / {{ $product->unite_fr }}
                                                @endif
                                        @endswitch
                                    </span>
                                    <!-- .latest-news-date -->
                                </div><!-- .latest-news-meta -->
                                <div class="latest-news-read-more">
                                    <p>{{ $product->pourcentage }}%</p>
                                </div>
                                <!-- .latest-news-read-more -->
                            </div><!-- .latest-news-text-wrap -->
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
    <span class="scrollup next" id="next" data-from="{{ $from + 1 }}" role="button" data-slide="next"
        style="display: inline;margin-left: 10px;"><i class="fa fa-angle-right"></i></span>
    <span class="scrollup prev" id="prev" data-from="{{ $from - 1 }}" role="button" data-slide="prev"
        style="display: inline;"><i class="fa fa-angle-left"></i></span>
</div>
<script>
    $(document).ready(function() {
        $(document).on('click', '.prev, .next', function() {
            $.ajax({
                // the route you're requesting should return view('page_details') with the required variables for that view
                url: '/route/as/defined/in/routes-file?from=' + $(this).attr('data-from'),
                type: 'get'
            }).done(response) {
                $('div#results').html(response);
            }
        });
    });
</script>