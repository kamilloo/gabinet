@extends('layouts.front')

@section('content')
    <!-- Inner welcome -->
    <section class="beautypress-inner-welocme-section beautypress-bg" style="background-image: url(img/inner-section-bg.jpg);">
        <div class="beautypress-black-overlay"></div>
        <div class="container">
            <div class="beautypress-inner-welcome-content">
                <img src="img/inner-welcome-icon.png" alt="">
                <h1 class="color-white">Our Pricing</h1>
                <p class="color-white">One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back.</p>
            </div><!-- .beautypress-inner-welcome-content END -->
            <div class="beautypress-inner-welcome-footer-content">
                <ul class="beautypress-breadcrumb">
                    <li><a href="{{ route('welcome') }}">Strona główna</a></li>
                    <li><a href="">Pricing</a></li>
                </ul>
            </div><!-- .beautypress-inner-welcome-footer-content END -->
        </div>
    </section><!-- .beautypress-inner-welocme-section END -->
    <!-- Inner welcome end -->


    <!-- Pricing table -->
    <section class="beautypress-pricing-table-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-4 col-xl-4">
                    <div class="beautypress-single-pricing-table beautypress-version-4">
                        <div class="beautypress-pricing-header">
                            <img src="img/pricing-1-v4.jpg" alt="">
                            <div class="beautypress-pricing-header-content">
                                <div class="beautypress-pricing-title">
                                    <h2>Hair Cut</h2>
                                </div>
                                <div class="beautypress-pricing-price">
                                    <h4>Starting from</h4>
                                    <h5 class="color-chocolate"><span>$</span>50</h5>
                                </div>
                            </div>
                        </div><!-- .beautypress-pricing-header END -->
                        <div class="beautypress-pricing-footer">
                            <ul class="beautypress-both-side-list beautypress-version-3">
                                <li>Teen's haircut<span>$45</span></li>
                                <li>Men's haircut<span>$42</span></li>
                                <li>Children's haircut<span>$56</span></li>
                                <li>Women's haircut<span>$76</span></li>
                            </ul>

                            <div class="beautypress-btn-wraper">
                                <a href="#" class="xs-btn round-btn box-shadow-btn bg-color-cyan">Appointment Now <span></span></a>
                            </div>
                        </div><!-- .beautypress-pricing-footer END -->
                    </div><!-- .beautypress-single-pricing-table END -->
                </div>
                <div class="col-md-12 col-sm-12 col-lg-4 col-xl-4">
                    <div class="beautypress-single-pricing-table beautypress-version-4">
                        <div class="beautypress-pricing-header">
                            <img src="img/pricing-2-v4.jpg" alt="">
                            <div class="beautypress-pricing-header-content">
                                <div class="beautypress-pricing-title">
                                    <h2>Makeup</h2>
                                </div>
                                <div class="beautypress-pricing-price">
                                    <h4>Starting from</h4>
                                    <h5 class="color-chocolate"><span>$</span>50</h5>
                                </div>
                            </div>
                        </div><!-- .beautypress-pricing-header END -->
                        <div class="beautypress-pricing-footer">
                            <ul class="beautypress-both-side-list beautypress-version-3">
                                <li>Just eyes<span>$45</span></li>
                                <li>Bridal trail<span>$42</span></li>
                                <li>Regular makeup<span>$56</span></li>
                                <li>Quick fix makeup<span>$76</span></li>
                            </ul>

                            <div class="beautypress-btn-wraper">
                                <a href="#" class="xs-btn round-btn box-shadow-btn bg-chocolate">Appointment Now <span></span></a>
                            </div>
                        </div><!-- .beautypress-pricing-footer END -->
                    </div><!-- .beautypress-single-pricing-table END -->
                </div>
                <div class="col-md-12 col-sm-12 col-lg-4 col-xl-4">
                    <div class="beautypress-single-pricing-table beautypress-version-4">
                        <div class="beautypress-pricing-header">
                            <img src="img/pricing-3-v4.jpg" alt="">
                            <div class="beautypress-pricing-header-content">
                                <div class="beautypress-pricing-title">
                                    <h2>Hair Color</h2>
                                </div>
                                <div class="beautypress-pricing-price">
                                    <h4>Starting from</h4>
                                    <h5 class="color-chocolate"><span>$</span>50</h5>
                                </div>
                            </div>
                        </div><!-- .beautypress-pricing-header END -->
                        <div class="beautypress-pricing-footer">
                            <ul class="beautypress-both-side-list beautypress-version-3">
                                <li>Just eyes<span>$45</span></li>
                                <li>Bridal trail<span>$42</span></li>
                                <li>Regular makeup<span>$56</span></li>
                                <li>Quick fix makeup<span>$76</span></li>
                            </ul>

                            <div class="beautypress-btn-wraper">
                                <a href="#" class="xs-btn round-btn box-shadow-btn bg-color-cyan">Appointment Now <span></span></a>
                            </div>
                        </div><!-- .beautypress-pricing-footer END -->
                    </div><!-- .beautypress-single-pricing-table END -->
                </div>
            </div>
        </div>
    </section><!-- .beautypress-pricing-table-section END -->
    <!-- Pricing table -->

@endsection
