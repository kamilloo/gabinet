@extends('layouts.front')

@section('content')

    <!-- Inner welcome -->
    <section class="beautypress-inner-welocme-section beautypress-bg parallax-bg" data-parallax="scroll" data-image-src="img/service_bg.jpg">
        <div class="beautypress-black-overlay"></div>
        <div class="container">
            <div class="beautypress-inner-welcome-content">
                <img src="img/inner-welcome-icon.png" alt="">
                <h1 class="color-white">Nasze usługi</h1>
                <p class="color-white">One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back.</p>
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
            <div class="beautypress-tab">
                <div class="tabbable">
                    <ul class="nav nav-tabs beautypress-top-nav">
                        @foreach($categories as $category)
                        <li class="@if($loop->first) active @endif"><a href="#{{ str_slug($category->name) }}" data-toggle="tab"><i class="xsicon {{ $category->icon }}"></i>{!!  $category->toHtml() !!}</a></li>
                        @endforeach
                    </ul>
                    <div class="tab-content">
                    @foreach($categories as $category)
                        <div class="tab-pane @if($loop->first) active @endif" id="{{ str_slug($category->name) }}">
                            <div class="tabbable">
                                <ul class="nav nav-tabs beautypress-side-nav">
                                    @foreach($category->services as $service)
                                    <li class="@if($loop->first) active @endif"><a href="#{{ str_slug($service->title) }}" data-toggle="tab">{{ $service->title }}</a></li>
                                    @endforeach
                                </ul>
                                <div class="tab-content">
                                    @foreach($category->services as $service)
                                    <div class="tab-pane beautypress-tab-content @if($loop->first) active @endif" id="{{ str_slug($service->title) }}">
                                        <div class="beautypress-spilit-container">
                                            <div class="beautypress-tab-image">
                                                <img src="{{ asset('storage/'.$service->path) }}" alt="Image">
                                                <div class="beautypress-tab-image-content">
                                                    <span class="beautypress-iocn-btn full-round-btn bg-color-purple">$50</span>
                                                </div>
                                            </div>
                                            <div class="beautypress-tab-text-content">
                                                {!! $service->description !!}
                                                <div class="beautypress-btn-wraper">
                                                    <a href="{{ route('contact') }}" class="xs-btn round-btn box-shadow-btn bg-color-purple">get appointment <span></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- #mens_makeup END -->
                                    @endforeach
                                </div><!-- .tab-content END -->
                            </div>
                        </div><!-- #makeup END -->
                    @endforeach
                    </div>
                </div><!-- .tabbable END -->
            </div><!-- .beautypress-tab END -->
        </div>
    </section><!-- .beautypress-service-section END -->
    <!-- Service section closed -->


@endsection
