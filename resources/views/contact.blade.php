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
                <div class="row">
                    <div class="col-sm-12 col-lg-8 col-xl-8">
                        <div class="beautypress-contact-form">
                            <h2>Napisz do Nas</h2>
                            <form action="{{ route('contact') }}" method="POST" id="beautypress-contact">
                                {{ csrf_field() }}
                                <div class="beautypress-spilit-container">
                                    <div class="input-group">
                                        <input type="text" name="name" id="c_name" placeholder="Twoje imię">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    </div>
                                    <div class="input-group">
                                        <input type="email" name="email" id="c_email" placeholder="Twój email">
                                        <div class="input-group-addon"><i class="xsicon icon-envelope5"></i></div>
                                    </div>
                                </div><!-- .beautypress-spilit-container END -->
                                <div class="input-group">
                                    <input type="text" name="subject" id="c_subject" placeholder="Temat">
                                    <div class="input-group-addon">@</div>
                                </div>
                                <div class="input-group">
                                    <textarea name="massage" id="c_massage" cols="30" rows="10" placeholder="Treść..."></textarea>
                                    <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                                </div>
                                <input type="submit" value="Wyślij" id="c_submit">
                            </form><!-- #beautypress-contact END -->
                        </div><!-- .beautypress-contact-form END -->
                    </div>
                    <div class="col-sm-12 col-lg-4 col-xl-4">
                        <div class="beautypress-contact-details bg-color-purple">
                            <div class="beautypress-separetor-sub-heading beautypress-version-2">
                                <h2>Kontakt</h2>
                            </div><!-- .beautypress-separetor-sub-heading END -->
                            <ul class="beautypress-icon-with-text">
                                <li><i class="fa fa-map-marker"></i>ul. Mossego 2, Grodzisk Wlkp.</li>
                                <li><i class="xsicon icon-phone3"></i>+48 602 139 040</li>
                                <li><i class="xsicon icon-envelope5"></i>info.kosmetolog@gmail.com</li>
                                <li><i class="fa fa-facebook"></i>https://www.facebook.com/kosmetolog.wlkp/</li>
                            </ul><!-- .beautypress-icon-with-text END -->
                        </div><!-- .beautypress-contact-details END -->
                    </div>
                </div>
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
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xl-6 col-xl-6">
                    <div class="beautypress-partner-text-content">
                        <div class="beautypress-sub-heading beautypress-watermark-title">
                            <h2 data-title="Partnerzy">Partnerzy</h2>
                        </div><!-- .beautypress-sub-heading END -->
                        <p> A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame.</p>
                    </div><!-- .beautypress-partner-text-content END -->
                </div>
                <div class="col-md-12 col-sm-12 col-xl-6 col-lg-6">
                    <div class="beautypress-partner-wraper">
                        <ul class="beautypress-partner-list">
                            <li><img src="img/brands-1.png" alt=""></li>
                            <li><img src="img/brands-2.png" alt=""></li>
                            <li><img src="img/brands-3.png" alt=""></li>
                            <li><img src="img/brands-4.png" alt=""></li>
                            <li><img src="img/brands-5.png" alt=""></li>
                            <li><img src="img/brands-6.png" alt=""></li>
                        </ul><!-- .beautypress-partner-list END -->
                    </div><!-- .beautypress-partner-wraper END -->
                </div>
            </div>
        </div>
    </section><!-- .beautypress-partner-section END -->
    <!-- partner section end -->

@endsection
