@extends('layouts.front')

@section('content')
    <!-- Inner welcome -->
    <section class="beautypress-inner-welocme-section beautypress-bg parallax-bg" data-parallax="scroll" data-image-src="img/katarzyna_pietka.jpg">
        <div class="beautypress-black-overlay"></div>
        <div class="container">
            <div class="beautypress-inner-welcome-content">
                <img src="img/inner-welcome-icon.png" alt="">
                <h1 class="color-white">O Mnie</h1>
                <p class="color-white">Gabinet to moja miejsce powstałe z pasji i warty w ludzi.</p>
            </div><!-- .beautypress-inner-welcome-content END -->
            <div class="beautypress-inner-welcome-footer-content">
                <ul class="beautypress-breadcrumb">
                    <li><a href="{{ route('welcome') }}">Strona główna</a></li>
                    <li><a href="">O Mnie</a></li>
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
                            <h2>Wizja</h2>
                        </div><!-- . END -->
                        <p>To wyjątkowe miejsce mieszczące się w Grodzisku Wielkopolskim przy ulicy Mossego 2, którego głównym atutem jest miła i fachowa obsługa doświadczonego i odpowiednio przygotowanego personelu.
                        </p>
                        <p>Uwzględniając zmieniające sie trendy, nieustannie podnoszę swoje kwalifikacje i rozszerzam ofertę.</p>
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
            <div class="row pb-lg-4">
                @foreach($certificates as $certificate)
                @if($loop->index % 3 === 0)
                    </div>
                    <div class="row pb-lg-4">
                @endif
                <div class="col-md-12 col-sm-12 col-lg-4 col-xl-4">
                    <div class="beautypress-single-team">
                        <img src="{{ asset('storage/'.$certificate->path) }}" alt="">
                        {{--<div class="beautypress-team-content">--}}
                            {{--<div class="beautypress-team-person-details">--}}
{{--                                <h3>{{ $certificate->title }}</h3>--}}
{{--                                <h4>{{ $certificate->description }}</h4>--}}
                            {{--</div>--}}
                        {{--</div><!-- .beautypress-team-content END -->--}}
                    </div><!-- .beautypress-single-team END -->
                </div>
                @endforeach
            </div>
        </div>
    </section><!-- .beautypress-team-section END -->
    <!-- Team section -->

@endsection
