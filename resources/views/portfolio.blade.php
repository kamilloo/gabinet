@extends('layouts.front')

@section('content')
<!-- Inner welcome -->
<section class="beautypress-inner-welocme-section beautypress-bg parallax-bg" data-parallax="scroll" data-image-src="img/gallery.jpg">
    <div class="beautypress-black-overlay"></div>
    <div class="container">
        <div class="beautypress-inner-welcome-content">
            <img src="img/inner-welcome-icon.png" alt="">
            <h1 class="color-white">portfolio</h1>
            <p class="color-white">One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back.</p>
        </div><!-- .beautypress-inner-welcome-content END -->
        <div class="beautypress-inner-welcome-footer-content">
            <ul class="beautypress-breadcrumb">
                <li><a href="{{ route('welcome') }}">Strona główna</a></li>
                <li><a href="">portfolio</a></li>
            </ul>
        </div><!-- .beautypress-inner-welcome-footer-content END -->
    </div>
</section><!-- .beautypress-inner-welocme-section END -->
<!-- Inner welcome end -->


<!-- Photo gallery -->
<div class="beautypress-photo-gallery-section section-padding">
    <div class="container">
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
                
                @foreach($files as $file)
                    <div class="beautypress-photo-gallery-grid-item {{ $file->tagsToString() }}">
                        <div class="beautypress-single-photo-gallery">
                            <img src="{{ asset('storage/'.$file->path) }}" alt="">
                            <div class="beautypress-photo-gallery-content">
                                <a href="{{ asset('storage/'.$file->path) }}" class="beautypress-image-popup beautypress-iocn-btn full-round-btn bg-color-pink">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="#" class="beautypress-iocn-btn full-round-btn bg-color-purple">
                                    <i class="fa fa-link"></i>
                                </a>
                            </div><!-- .beautypress-photo-gallery-content END -->
                            <div class="beautypress-gallery-overlay"></div>
                        </div><!-- .beautypress-single-photo-gallery END -->
                    </div><!-- .beautypress-photo-gallery-grid-item END -->
                @endforeach
            </div><!-- .beautypress-photo-gallery-grid END -->
        </div>
    </div>
</div><!-- .beautypress-photo-gallery-section END -->
<!-- Photo gallery -->
@endsection
