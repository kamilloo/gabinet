@extends('layouts.front')

@section('content')
    <!-- Inner welcome -->
    <section class="beautypress-inner-welocme-section beautypress-bg" style="background-image: url(img/inner-section-bg.jpg);">
        <div class="beautypress-black-overlay"></div>
        <div class="container">
            <div class="beautypress-inner-welcome-content">
                <img src="img/inner-welcome-icon.png" alt="">
                <h1 class="color-white">Cennik</h1>
                <p class="color-white"></p>
            </div><!-- .beautypress-inner-welcome-content END -->
            <div class="beautypress-inner-welcome-footer-content">
                <ul class="beautypress-breadcrumb">
                    <li><a href="{{ route('welcome') }}">Strona główna</a></li>
                    <li><a href="">Cennik</a></li>
                </ul>
            </div><!-- .beautypress-inner-welcome-footer-content END -->
        </div>
    </section><!-- .beautypress-inner-welocme-section END -->
    <!-- Inner welcome end -->

    <!-- Pricing table -->
    <section class="beautypress-pricing-table-section section-padding">
        <div class="container">
            @include('partials.pricing')
        </div>
    </section><!-- .beautypress-pricing-table-section END -->
    <!-- Pricing table -->

@endsection
