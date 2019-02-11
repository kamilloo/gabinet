<!-- Photo gallery -->
        <div class="beautypress-photo-gallery-wraper">
            <div class="beautypress-portfolio-nav portfolio-menu">
                <ul id="filters" class="option-set clearfix" data-option-key="filter">
                    <li><a href="#" data-option-value="*" class="selected">All item</a></li>
                    @foreach($tags as $tag)
                    <li><a href="#" data-option-value=".{{ $tag->name }}">{{ $tag->name }}</a></li>
                    @endforeach
                </ul>
            </div>


            <div class="beautypress-photo-gallery-grid">
                
                @foreach($portfolio as $file)
                    <div class="beautypress-photo-gallery-grid-item {{ $file->tagsToString() }}">
                        <div class="beautypress-single-photo-gallery">
                            <img src="{{ asset('storage/'.$file->path) }}" alt="">
                            <div class="beautypress-photo-gallery-content">
                                <a href="{{ asset('storage/'.$file->path) }}" class="beautypress-image-popup beautypress-iocn-btn full-round-btn bg-color-pink">
                                    <i class="fa fa-eye"></i>
                                </a>
                                {{--<a href="#" class="beautypress-iocn-btn full-round-btn bg-color-purple">--}}
                                    {{--<i class="fa fa-link"></i>--}}
                                {{--</a>--}}
                            </div><!-- .beautypress-photo-gallery-content END -->
                            <div class="beautypress-gallery-overlay"></div>
                        </div><!-- .beautypress-single-photo-gallery END -->
                    </div><!-- .beautypress-photo-gallery-grid-item END -->
                @endforeach
            </div><!-- .beautypress-photo-gallery-grid END -->
        </div>
<!-- Photo gallery -->
