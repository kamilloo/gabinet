@extends('layouts.front')

@section('content')

    <!-- welcome section -->
    <section class="beautypress-welcome-section beautypress-welcome-version-3 welcome-height-calc-minus">
        <div class="beautypress-welcome-slider-wraper">
            <div class="beautypress-welcome-slider owl-carousel">
                <div class="beautypress-welcome-slider-item beautypress-bg" style="background-image: url(img/slider-3_img_1.jpg);">
                    <div class="container">
                        <div class="beautypress-welcome-content-group">
                            <div class="beautypress-welcome-container">
                                <div class="beautypress-welcome-wraper">
                                    <h2 class="color-white">Pierwsze hasło</h2>
                                    <h3 class="color-white">Pierwszy podtytuł</h3>
                                    <p class="color-white">Pierwszy opis ale rzeczowy.</p>
                                    <div class="beautypress-btn-wraper">
                                        <a href="#" class="xs-btn bg-chocolate round-btn box-shadow-btn">Omów się <span></span></a>
                                        <a href="#" class="xs-btn bg-color-cyan round-btn box-shadow-btn">Czytaj więcej <span></span></a>
                                    </div>
                                </div>
                            </div><!-- .beautypress-welcome-container END -->
                        </div><!-- .beautypress-welcome-content-group END -->
                    </div>
                    <div class="beautypress-black-gradient-overlay"></div>
                </div><!-- .beautypress-welcome-slider-item END -->
                <div class="beautypress-welcome-slider-item beautypress-version-2 beautypress-bg" style="background-image: url(img/slider-3_img_2.jpg);">
                    <div class="container">
                        <div class="beautypress-welcome-content-group">
                            <div class="beautypress-welcome-container">
                                <div class="beautypress-welcome-wraper">
                                    <h2 class="color-white">Drugie hasło, może to być nowość</h2>
                                    <h3 class="color-white">Drugi podtytuł do hasłą</h3>
                                    <p class="color-white">Drugi krótki ale jakże ważny opis.</p>
                                    <div class="beautypress-btn-wraper">
                                        <a href="#" class="xs-btn bg-chocolate round-btn box-shadow-btn">Omów się <span></span></a>
                                        <a href="#" class="xs-btn bg-color-cyan round-btn box-shadow-btn">czytaj więcej <span></span></a>
                                    </div>
                                </div>
                            </div><!-- .beautypress-welcome-container END -->
                        </div><!-- .beautypress-welcome-content-group END -->
                    </div>
                    <div class="beautypress-black-gradient-overlay"></div>
                </div><!-- .beautypress-welcome-slider-item END -->
                <div class="beautypress-welcome-slider-item beautypress-version-3 beautypress-bg" style="background-image: url(img/slider-3_img_3.jpg);">
                    <div class="container">
                        <div class="beautypress-welcome-content-group">
                            <div class="beautypress-welcome-container">
                                <div class="beautypress-welcome-wraper">
                                    <h2 class="color-white">Trzeci tytuł</h2>
                                    <h3 class="color-white">trzecy podtytuł i równie ważny</h3>
                                    <p class="color-white">Trzeci opis też ważny.</p>
                                    <div class="beautypress-btn-wraper">
                                        <a href="#" class="xs-btn bg-chocolate round-btn box-shadow-btn">Omów się <span></span></a>
                                        <a href="#" class="xs-btn bg-color-cyan round-btn box-shadow-btn">czytaj więcej <span></span></a>
                                    </div>
                                </div>
                            </div><!-- .beautypress-welcome-container END -->
                        </div><!-- .beautypress-welcome-content-group END -->
                    </div>
                    <div class="beautypress-black-gradient-overlay"></div>
                </div><!-- .beautypress-welcome-slider-item END -->
            </div><!-- .beautypr/ess-welcome-slider END -->
        </div>
    </section><!-- .beautypress-welcome-section END -->
    <!-- welcome section -->
    <!-- Our features -->
    <section class="beautypress-our-features-section beautypress-padding-bottom">
        <div class="container">
            <div class="beautypress-section-headinig beautypress-version-2">
                <h2>Zapraszamy</h2>
                <h3>Nowości</h3>
                <img src="img/section-heading-separetor.png" alt="">
            </div>

            <div class="row">
                @foreach($services as $service)
                <div class="col-md-6 col-xl-4 col-lg-4">
                    <div class="beautypress-single-our-feature beautypress-black-gradient-overlay">
                        <img src="{{ asset('storage/'.$service->path) }}" alt="">
                        <div class="beautypress-our-features-content">
                            <h3>{{ $service->title }}</h3>
                            <div class="xs-btn-wraper">
                                <a href="{{ route('services') }}#{{ str_slug($service->title) }}" class="xs-btn round-btn box-shadow-btn bg-color-purple">czytaj więcej <span></span></a>
                            </div>
                        </div>
                    </div><!-- .beautypress-single-our-feature END -->
                </div>
                @endforeach
            </div>
        </div>
    </section><!-- .beautypress-our-features-section END -->
    <!-- Our features -->



    <!-- Simple text with image-->
    <section id="about" class="beautypress-simple-text-with-img-section bg-color-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xl-6 col-lg-6">
                    <div class="beautypress-simple-text beautypress-watermark-icon">
                        <div class="beautypress-separetor-sub-heading">
                            <h2>O Nas</h2>
                        </div><!-- . END -->
                        <p>To wyjątkowe miejsce mieszczące się w Grodzisku Wielkopolskim przy ulicy Mossego 2, którego głównym atutem jest miła i fachowa obsługa doświadczonego i odpowiednio przygotowanego personelu.</p>
                        <p>Oferta gabinetu obejmuje m.in. usługi kosmetyczne z zakresu kosmetyki twarzy oraz pielęgnacji dłoni i stóp, masaże , a także wizaż. Usługi kosmetyczne i zabiegi wykonuję stosując kosmetyki uznanych firm takich jak: Natinuel, Clarena, Bielenda, Gehwol.</p>
                        <p>Uwzględniając zmieniające sie trendy, nieustannie podnoszę swoje kwalifikacje i rozszerzam ofertę.</p>
                        <p>Serdecznie zapraszam.</p>

                        <div class="beautypress-btn-wraper">
                            <a href="{{ route('about') }}" class="xs-btn bg-color-cyan round-btn box-shadow-btn">learn more <span></span></a>
                        </div>
                    </div><!-- . END -->
                </div>
                <div class="col-md-12 col-sm-12 col-lg-6 col-xl-6">
                    <div class='twentytwenty-container beautypress-before-after'>
                        <img src="img/before-after-1.jpg" alt="">
                        <img src="img/before-after-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section><!-- .beautypress-simple-text-with-img-section END -->
    <!-- Simple text with image end -->


    <!-- Service section -->
    <section id="services" class="beautypress-service-section beautypress-version-2 beautypress-padding-bottom">
        <div class="container">
            <div class="beautypress-section-headinig beautypress-version-2">
                <h2>We are awesome</h2>
                <h3>Our Services</h3>
                <img src="img/section-heading-separetor.png" alt="">
            </div>
            @include('partials.services')
        </div>
    </section><!-- .beautypress-service-section END -->
    <!-- Service section closed -->


    <!-- booking section -->
    <section class="beautypress-booking-section beautypress-bg beautypress-version-2 beautypress-padding-bottom parallax-bg" data-parallax="scroll" data-image-src="img/get_appoinment.jpg">
        <div class="container">
            <div class="beautypress-section-headinig beautypress-version-2">
                <h2>We are awesome</h2>
                <h3>Get Appoinment</h3>
                <img src="img/section-heading-separetor.png" alt="">
            </div>
            @include('partials.contact')
        </div>
    </section><!-- .beautypress-booking-section END -->
    <!-- booking section end -->

    <!-- Photo gallery -->
    <section id="portfolio" class="beautypress-photo-gallery-section beautypress-version-2 beautypress-padding-bottom">
        <div class="container">
            <div class="beautypress-section-headinig beautypress-version-2">
                <h2>We are awesome</h2>
                <h3>Portfolio</h3>
                <img src="img/section-heading-separetor.png" alt="">
            </div>
            @include('partials.portfolio')
        </div>
    </section><!-- .beautypress-photo-gallery-section END -->
    <!-- Photo gallery -->
    @if(!empty($facebook_ratings))
    <!-- Testimonial Slider -->
    <section id="reviews" class="beautypress-testimonial-section beautypress-bg parallax-bg" data-parallax="scroll" data-image-src="img/testimonial-bg.jpg">
        <div class="container">
            <div class="beautypress-testimonial-slider owl-carousel">
                @foreach($facebook_ratings as $review)
                    @if(!empty($review->review_text))
                <div class="beautypress-single-testimonial">
                    <h2>Dodane dnia: {{ \Carbon\Carbon::parse($review->created_time)->format('d-m-Y') }}</h2>
                    <p>{{ $review->review_text }}</p>
                    <ul class="beautypress-rating">
                        @for($i = 0; $i< $review->rating; $i++)
                        <li><a href=""><i class="fa fa-star"></i></a></li>
                        @endfor
                        {{--<li><a href=""><i class="fa fa-star-half-full"></i></a></li>--}}
                    </ul><!-- .beautypress-rating END -->
                    <div class="beautypress-signature">
                        <img src="img/commentor-sign.png" alt="">
                    </div><!-- .beautypress-signature END -->
                </div><!-- .beautypress-single-testimonial END -->
                    @endif
                @endforeach
                {{--<div class="beautypress-single-testimonial">--}}
                    {{--<h2>Isabela</h2>--}}
                    {{--<p>The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. "What's happened to me?" he thought. "What's happened to me?" he thought.</p>--}}
                    {{--<ul class="beautypress-rating">--}}
                        {{--<li><a href=""><i class="fa fa-star"></i></a></li>--}}
                        {{--<li><a href=""><i class="fa fa-star"></i></a></li>--}}
                        {{--<li><a href=""><i class="fa fa-star"></i></a></li>--}}
                        {{--<li><a href=""><i class="fa fa-star"></i></a></li>--}}
                        {{--<li><a href=""><i class="fa fa-star-half-full"></i></a></li>--}}
                    {{--</ul><!-- .beautypress-rating END -->--}}
                    {{--<div class="beautypress-signature">--}}
                        {{--<img src="img/commentor-sign.png" alt="">--}}
                    {{--</div><!-- .beautypress-signature END -->--}}
                {{--</div><!-- .beautypress-single-testimonial END -->--}}
                {{--<div class="beautypress-single-testimonial">--}}
                    {{--<h2>Loren</h2>--}}
                    {{--<p>The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin.</p>--}}
                    {{--<ul class="beautypress-rating">--}}
                        {{--<li><a href=""><i class="fa fa-star"></i></a></li>--}}
                        {{--<li><a href=""><i class="fa fa-star"></i></a></li>--}}
                        {{--<li><a href=""><i class="fa fa-star"></i></a></li>--}}
                        {{--<li><a href=""><i class="fa fa-star"></i></a></li>--}}
                        {{--<li><a href=""><i class="fa fa-star-half-full"></i></a></li>--}}
                    {{--</ul><!-- .beautypress-rating END -->--}}
                    {{--<div class="beautypress-signature">--}}
                        {{--<img src="img/commentor-sign.png" alt="">--}}
                    {{--</div><!-- .beautypress-signature END -->--}}
                {{--</div><!-- .beautypress-single-testimonial END -->--}}
                {{--<div class="beautypress-single-testimonial">--}}
                    {{--<h2>Jenny Doe</h2>--}}
                    {{--<p>The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked</p>--}}
                    {{--<ul class="beautypress-rating">--}}
                        {{--<li><a href=""><i class="fa fa-star"></i></a></li>--}}
                        {{--<li><a href=""><i class="fa fa-star"></i></a></li>--}}
                        {{--<li><a href=""><i class="fa fa-star"></i></a></li>--}}
                        {{--<li><a href=""><i class="fa fa-star"></i></a></li>--}}
                        {{--<li><a href=""><i class="fa fa-star-half-full"></i></a></li>--}}
                    {{--</ul><!-- .beautypress-rating END -->--}}
                    {{--<div class="beautypress-signature">--}}
                        {{--<img src="img/commentor-sign.png" alt="">--}}
                    {{--</div><!-- .beautypress-signature END -->--}}
                {{--</div><!-- .beautypress-single-testimonial END -->--}}
            </div><!-- .beautypress-testimonial-slider END -->
        </div>
        <div class="beautypress-black-overlay light-overlay"></div>
    </section><!-- .beautypress-testimonial-section END -->
    <!-- Testimonial Slider -->
    @endif
    <!-- Pricing table -->
    <section id="pricing" class="beautypress-pricing-table-section beautypress-padding-bottom">
        <div class="container">
            <div class="beautypress-section-headinig beautypress-version-2">
                <h2>We are awesome</h2>
                <h3>Our Pricing</h3>
                <img src="img/section-heading-separetor.png" alt="">
            </div>
            @include('partials.pricing')
        </div>
    </section><!-- .beautypress-pricing-table-section END -->
    <!-- Pricing table -->

    <!-- partner section -->
    <section id="partners" class="beautypress-partner-section section-padding">
        <div class="container">
            @include('partials.partners')
        </div>
        <div class="beautypress-round-icons-bg" style="background-image: url(img/icons-bg.png);"></div>
    </section><!-- .beautypress-partner-section END -->
    <!-- partner section end -->
@endsection