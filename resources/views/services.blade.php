@extends('layouts.front')

@section('content')

    <!-- Inner welcome -->
    <section class="beautypress-inner-welocme-section beautypress-bg parallax-bg" data-parallax="scroll" data-image-src="img/slider-3_img_1.jpg">
        <div class="beautypress-black-overlay"></div>
        <div class="container">
            <div class="beautypress-inner-welcome-content">
                <img src="img/logo_bez_tla.png" alt="Gabinet Kosmetyki Pielęgnacyjnej Katarzyna Piętka">
            </div><!-- .beautypress-inner-welcome-content END -->
            <div class="beautypress-inner-welcome-footer-content">
                <ul class="beautypress-breadcrumb">
                    <li><a href="{{ route('welcome') }}">Strona główna</a></li>
                    <li><a href="">Usługi</a></li>
                </ul>
            </div><!-- .beautypress-inner-welcome-footer-content END -->
        </div>
    </section><!-- .beautypress-inner-welocme-section END -->
    <!-- Inner welcome end -->
    <!-- Service section -->
    <section class="beautypress-service-section section-padding">
        <div class="container">
            @include('partials.services')
        </div>
    </section><!-- .beautypress-service-section END -->
    <!-- Service section closed -->



@endsection
