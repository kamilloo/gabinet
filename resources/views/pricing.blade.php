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
                @foreach($files as $file)
                <div class="col-md-12 col-sm-12 col-lg-6 col-xl-6 beautypress-padding-bottom">
                    <div class="beautypress-single-pricing-table beautypress-version-4">
                        <div class="beautypress-pricing-header">
                            <img src="{{ asset('storage/'.$file->path) }}" alt="">
                            <div class="beautypress-pricing-header-content">
                                <div class="beautypress-pricing-title">
                                    <h2>{{ $file->name }}</h2>
                                </div>
                                <div class="beautypress-pricing-price">
                                    <h4>Ceny od</h4>
                                    <h5 class="color-chocolate">{{ $file->price_since }}<span> zł</span></h5>
                                </div>
                            </div>
                        </div><!-- .beautypress-pricing-header END -->
                        <div class="beautypress-pricing-footer">
                            <ul class="beautypress-both-side-list beautypress-version-3">
                                @foreach($file->items as $item)
                                <li>{{ $item->title }}<span>{{ $item->price }} zł</span></li>
                                <li>({{ $item->description }})</li>
                                @endforeach
                            </ul>

                            <div class="beautypress-btn-wraper">
                                <a href="{{ route('contact') }}" class="xs-btn round-btn box-shadow-btn bg-color-cyan">Appointment Now <span></span></a>
                            </div>
                        </div><!-- .beautypress-pricing-footer END -->
                    </div><!-- .beautypress-single-pricing-table END -->
                </div>
                @endforeach
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
