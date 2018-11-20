@extends('layouts.front')

@section('content')
<!-- Inner welcome -->
<section class="beautypress-inner-welocme-section beautypress-bg parallax-bg" data-parallax="scroll" data-image-src="img/inner-section-bg.jpg">
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
        @include('partials.portfolio')
    </div>
</div><!-- .beautypress-photo-gallery-section END -->
<!-- Photo gallery -->

@endsection
