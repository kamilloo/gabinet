@extends('layouts.front')

@section('content')
    <!-- Inner welcome -->
    <section class="beautypress-inner-welocme-section beautypress-bg parallax-bg" data-parallax="scroll" data-image-src="img/contact_header_bg.jpg">
        <div class="beautypress-black-overlay"></div>
        <div class="container">
            <div class="beautypress-inner-welcome-content">
                <img src="img/inner-welcome-icon.png" alt="">
                <h1 class="color-white">kontakt</h1>
                <p class="color-white">Zapraszamy do kontaktu telefonicznego, mailowego lub wizyty osobistej.</p>
            </div><!-- .beautypress-inner-welcome-content END -->
            <div class="beautypress-inner-welcome-footer-content">
                <ul class="beautypress-breadcrumb">
                    <li><a href="{{ route('welcome') }}">strona główna</a></li>
                    <li><a href="{{ route('contact') }}">kontakt</a></li>
                </ul>
            </div><!-- .beautypress-inner-welcome-footer-content END -->
        </div>
    </section><!-- .beautypress-inner-welocme-section END -->
    <!-- Inner welcome end -->

    <!-- Contact us form section -->
    <section class="beautypress-contact-us-section">
        <div class="container">
            <div class="beautypress-contact-wraper beautypress-version-2">
                @include('partials.contact')
            </div><!-- .beautypress-contact-wraper END -->
        </div>
    </section><!-- .beautypress-contact-us-section END -->
    <!-- Contact us form section end -->

    <!-- Maps -->
    <div id="beautypress_maps"></div>
    <!-- Maps end -->

    <!-- partner section -->
    <section class="beautypress-partner-section section-padding">
        <div class="container">
            @include('partials.partners')
        </div>
    </section><!-- .beautypress-partner-section END -->
    <!-- partner section end -->

@endsection
