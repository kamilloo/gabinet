@extends('layouts.front')

@section('content')
    <!-- Inner welcome -->
    <section class="beautypress-inner-welocme-section beautypress-bg parallax-bg" data-parallax="scroll" data-image-src="img/about_us.jpg">
        <div class="beautypress-black-overlay"></div>
        <div class="container">
            <div class="beautypress-inner-welcome-content">
                <img src="img/inner-welcome-icon.png" alt="">
                <h1 class="color-white">About Us</h1>
                <p class="color-white">One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back.</p>
            </div><!-- .beautypress-inner-welcome-content END -->
            <div class="beautypress-inner-welcome-footer-content">
                <ul class="beautypress-breadcrumb">
                    <li><a href="{{ route('welcome') }}">Strona główna</a></li>
                    <li><a href="">About Us</a></li>
                </ul>
            </div><!-- .beautypress-inner-welcome-footer-content END -->
        </div>
    </section><!-- .beautypress-inner-welocme-section END -->
    <!-- Inner welcome end -->

    <!-- Simple text with image version 2-->
    <section class="beautypress-simple-text-with-img-section beautypress-simple-text-with-img-section-v2 beautypress-no-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-6 col-xl-6">
                    <div class="beautypress-simple-img-wraper">
                        <img src="img/feature_img_1.png" alt="">
                    </div><!-- .beautypress-simple-img-wraper END -->
                </div>
                <div class="col-md-12 col-sm-12 col-xl-6 col-lg-6">
                    <div class="beautypress-simple-text beautypress-watermark-icon">
                        <div class="beautypress-separetor-sub-heading beautypress-no-separetor">
                            <h2>Our Vission</h2>
                        </div><!-- . END -->
                        <p>One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly.</p>
                        <div class="beautypress-btn-wraper">
                            <a href="#" class="xs-btn bg-color-purple round-btn box-shadow-btn">learn more <span></span></a>
                        </div>
                    </div><!-- . END -->
                </div>
            </div>
        </div>
    </section><!-- .beautypress-simple-text-with-img-section END -->
    <!-- Simple text with image end -->

    <!-- Team section -->
    <section class="beautypress-team-section beautypress-padding-bottom bg-color-gray beautypress-bg">
        <div class="container">
            <div class="beautypress-section-headinig">
                <h2>Certyfikaty</h2>
                <h3>Ciągły rozwój połączony z pasją</h3>
            </div>
            <div class="row">
                @foreach($certificates as $certificate)
                <div class="col-md-12 col-sm-12 col-lg-4 col-xl-4">
                    <div class="beautypress-single-team beautypress-purple-overlay">
                        <img src="{{ asset('storage/'.$certificate->path) }}" alt="">
                        <div class="beautypress-team-content">
                            <div class="beautypress-team-person-details">
                                <h3>{{ $certificate->title }}</h3>
                                <h4>{{ $certificate->description }}</h4>
                            </div>
                        </div><!-- .beautypress-team-content END -->
                    </div><!-- .beautypress-single-team END -->
                </div>
                @endforeach
                <div class="col-md-12 col-sm-12 col-lg-4 col-xl-4">
                    <div class="beautypress-single-team beautypress-pink-overlay">
                        <img src="img/team-2.jpg" alt="">
                        <div class="beautypress-team-content">
                            <div class="beautypress-team-person-details">
                                <h3>Rusana ranshaw</h3>
                                <h4>C. E. O</h4>
                            </div>
                            <div class="beautypress-team-person-socail-details">
                                <ul class="beautypress-social-list">
                                    <li><a href="" class="beautypress-facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="" class="beautypress-twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="" class="beautypress-pinterest"><i class="fa fa-pinterest-p"></i></a></li>
                                    <li><a href="" class="beautypress-dribbble"><i class="fa fa-dribbble"></i></a></li>
                                </ul><!-- .beautypress-social-list END -->
                            </div>
                        </div><!-- .beautypress-team-content END -->
                    </div><!-- .beautypress-single-team END -->
                </div>
                <div class="col-md-12 col-sm-12 col-lg-4 col-xl-4">
                    <div class="beautypress-single-team beautypress-sky-blue-overlay">
                        <img src="img/team-3.jpg" alt="">
                        <div class="beautypress-team-content">
                            <div class="beautypress-team-person-details">
                                <h3>Jennifar smith</h3>
                                <h4>Senior Specialist</h4>
                            </div>
                            <div class="beautypress-team-person-socail-details">
                                <ul class="beautypress-social-list">
                                    <li><a href="" class="beautypress-facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="" class="beautypress-twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="" class="beautypress-pinterest"><i class="fa fa-pinterest-p"></i></a></li>
                                    <li><a href="" class="beautypress-dribbble"><i class="fa fa-dribbble"></i></a></li>
                                </ul><!-- .beautypress-social-list END -->
                            </div>
                        </div><!-- .beautypress-team-content END -->
                    </div><!-- .beautypress-single-team END -->
                </div>
            </div>
        </div>
    </section><!-- .beautypress-team-section END -->
    <!-- Team section -->

@endsection
