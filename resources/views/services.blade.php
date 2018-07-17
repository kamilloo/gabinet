@extends('layouts.front')

@section('content')

    <!-- Inner welcome -->
    <section class="beautypress-inner-welocme-section beautypress-bg parallax-bg" data-parallax="scroll" data-image-src="img/service_bg.jpg">
        <div class="beautypress-black-overlay"></div>
        <div class="container">
            <div class="beautypress-inner-welcome-content">
                <img src="img/inner-welcome-icon.png" alt="">
                <h1 class="color-white">Our Services</h1>
                <p class="color-white">One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back.</p>
            </div><!-- .beautypress-inner-welcome-content END -->
            <div class="beautypress-inner-welcome-footer-content">
                <ul class="beautypress-breadcrumb">
                    <li><a href="{{ route('welcome') }}">Strona główna</a></li>
                    <li><a href="">Services</a></li>
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
                        <li class="active"><a href="#makeup" data-toggle="tab"><i class="xsicon icon-cosmetics"></i><span>makeup</span></a></li>
                        <li><a href="#facial" data-toggle="tab"><i class="xsicon icon-cream-3"></i><span>Facial</span></a></li>
                        <li><a href="#haircut" data-toggle="tab"><i class="xsicon icon-hair-cut"></i><span>Hair Cut</span></a></li>
                        <li><a href="#massage" data-toggle="tab"><i class="xsicon icon-massage"></i><span>massage</span></a></li>
                        <li><a href="#nail" data-toggle="tab"><i class="xsicon icon-nail"></i><span>Nail care</span></a></li>
                        <li><a href="#waxing" data-toggle="tab"><i class="xsicon icon-hair-removal"></i><span>waxing</span></a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="makeup">
                            <div class="tabbable">
                                <ul class="nav nav-tabs beautypress-side-nav">
                                    <li class="active"><a href="#mens_haircut" data-toggle="tab">Men's makeup</a></li>
                                    <li><a href="#women_makeup" data-toggle="tab">Women's makeup</a></li>
                                    <li><a href="#child_makeup" data-toggle="tab">Children's makeup</a></li>
                                    <li><a href="#teens_makeup" data-toggle="tab">Teen's makeup</a></li>
                                    <li><a href="#layer_makeup" data-toggle="tab">Layer makeup</a></li>
                                    <li><a href="#stylish_makeup" data-toggle="tab">Stylish makeup</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane beautypress-tab-content active" id="mens_makeup">
                                        <div class="beautypress-spilit-container">
                                            <div class="beautypress-tab-image">
                                                <img src="img/service-tab-img-1.jpg" alt="Image">
                                                <div class="beautypress-tab-image-content">
                                                    <span class="beautypress-iocn-btn full-round-btn bg-color-purple">$50</span>
                                                </div>
                                            </div>
                                            <div class="beautypress-tab-text-content">
                                                <h3>Men's makeup</h3>
                                                <p> It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>
                                                <p> A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there</p>
                                                <div class="beautypress-btn-wraper">
                                                    <a href="#" class="xs-btn round-btn box-shadow-btn bg-color-purple">get appointment <span></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- #mens_makeup END -->

                                    <div class="tab-pane beautypress-tab-content" id="women_makeup">
                                        <div class="beautypress-spilit-container">
                                            <div class="beautypress-tab-image">
                                                <img src="img/service-tab-img-2.jpg" alt="Image">
                                                <div class="beautypress-tab-image-content">
                                                    <span class="beautypress-iocn-btn full-round-btn bg-color-purple">$50</span>
                                                </div>
                                            </div>
                                            <div class="beautypress-tab-text-content">
                                                <h3>Women's makeup</h3>
                                                <p> It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>
                                                <p> A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there</p>
                                                <div class="beautypress-btn-wraper">
                                                    <a href="#" class="xs-btn round-btn box-shadow-btn bg-color-purple">get appointment <span></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- #women_makeup END -->

                                    <div class="tab-pane beautypress-tab-content" id="child_makeup">
                                        <div class="beautypress-spilit-container">
                                            <div class="beautypress-tab-image">
                                                <img src="img/service-tab-img-3.jpg" alt="Image">
                                                <div class="beautypress-tab-image-content">
                                                    <span class="beautypress-iocn-btn full-round-btn bg-color-purple">$50</span>
                                                </div>
                                            </div>
                                            <div class="beautypress-tab-text-content">
                                                <h3>Children's makeup</h3>
                                                <p> It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>
                                                <p> A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there</p>
                                                <div class="beautypress-btn-wraper">
                                                    <a href="#" class="xs-btn round-btn box-shadow-btn bg-color-purple">get appointment <span></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- #child_makeup END -->

                                    <div class="tab-pane beautypress-tab-content" id="teens_makeup">
                                        <div class="beautypress-spilit-container">
                                            <div class="beautypress-tab-image">
                                                <img src="img/service-tab-img-4.jpg" alt="Image">
                                                <div class="beautypress-tab-image-content">
                                                    <span class="beautypress-iocn-btn full-round-btn bg-color-purple">$50</span>
                                                </div>
                                            </div>
                                            <div class="beautypress-tab-text-content">
                                                <h3>Teen's makeup</h3>
                                                <p> It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>
                                                <p> A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there</p>
                                                <div class="beautypress-btn-wraper">
                                                    <a href="#" class="xs-btn round-btn box-shadow-btn bg-color-purple">get appointment <span></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- #teens_makeup END -->

                                    <div class="tab-pane beautypress-tab-content" id="layer_makeup">
                                        <div class="beautypress-spilit-container">
                                            <div class="beautypress-tab-image">
                                                <img src="img/service-tab-img-5.jpg" alt="Image">
                                                <div class="beautypress-tab-image-content">
                                                    <span class="beautypress-iocn-btn full-round-btn bg-color-purple">$50</span>
                                                </div>
                                            </div>
                                            <div class="beautypress-tab-text-content">
                                                <h3>Layer makeup</h3>
                                                <p> It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>
                                                <p> A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there</p>
                                                <div class="beautypress-btn-wraper">
                                                    <a href="#" class="xs-btn round-btn box-shadow-btn bg-color-purple">get appointment <span></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- #layer_makeup END -->

                                    <div class="tab-pane beautypress-tab-content" id="stylish_makeup">
                                        <div class="beautypress-spilit-container">
                                            <div class="beautypress-tab-image">
                                                <img src="img/service-tab-img-6.jpg" alt="Image">
                                                <div class="beautypress-tab-image-content">
                                                    <span class="beautypress-iocn-btn full-round-btn bg-color-purple">$50</span>
                                                </div>
                                            </div>
                                            <div class="beautypress-tab-text-content">
                                                <h3>Stylish makeup</h3>
                                                <p> It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>
                                                <p> A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there</p>
                                                <div class="beautypress-btn-wraper">
                                                    <a href="#" class="xs-btn round-btn box-shadow-btn bg-color-purple">get appointment <span></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- #stylish_makeup END -->
                                </div><!-- .tab-content END -->
                            </div>
                        </div><!-- #makeup END -->

                        <div class="tab-pane" id="facial">
                            <div class="tabbable tabs-left">
                                <ul class="nav nav-tabs beautypress-side-nav">
                                    <li class="active"><a href="#mens_facial" data-toggle="tab">Men's Facial</a></li>
                                    <li><a href="#women_facial" data-toggle="tab">Women's Facial</a></li>
                                    <li><a href="#child_facial" data-toggle="tab">Children's Facial</a></li>
                                    <li><a href="#teens_facial" data-toggle="tab">Teen's Facial</a></li>
                                    <li><a href="#layer_facial" data-toggle="tab">Layer Facial</a></li>
                                    <li><a href="#stylish_facial" data-toggle="tab">Stylish Facial</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane beautypress-tab-content active" id="mens_facial">
                                        <div class="beautypress-spilit-container">
                                            <div class="beautypress-tab-image">
                                                <img src="img/service-tab-img-1.jpg" alt="Image">
                                                <div class="beautypress-tab-image-content">
                                                    <span class="beautypress-iocn-btn full-round-btn bg-color-purple">$50</span>
                                                </div>
                                            </div>
                                            <div class="beautypress-tab-text-content">
                                                <h3>Men's Facial</h3>
                                                <p> It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>
                                                <p> A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there</p>
                                                <div class="beautypress-btn-wraper">
                                                    <a href="#" class="xs-btn round-btn box-shadow-btn bg-color-purple">get appointment <span></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- #mens_facial END -->

                                    <div class="tab-pane beautypress-tab-content" id="women_facial">
                                        <div class="beautypress-spilit-container">
                                            <div class="beautypress-tab-image">
                                                <img src="img/service-tab-img-2.jpg" alt="Image">
                                                <div class="beautypress-tab-image-content">
                                                    <span class="beautypress-iocn-btn full-round-btn bg-color-purple">$50</span>
                                                </div>
                                            </div>
                                            <div class="beautypress-tab-text-content">
                                                <h3>Women's Facial</h3>
                                                <p> It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>
                                                <p> A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there</p>
                                                <div class="beautypress-btn-wraper">
                                                    <a href="#" class="xs-btn round-btn box-shadow-btn bg-color-purple">get appointment <span></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- #women_facial END -->

                                    <div class="tab-pane beautypress-tab-content" id="child_facial">
                                        <div class="beautypress-spilit-container">
                                            <div class="beautypress-tab-image">
                                                <img src="img/service-tab-img-3.jpg" alt="Image">
                                                <div class="beautypress-tab-image-content">
                                                    <span class="beautypress-iocn-btn full-round-btn bg-color-purple">$50</span>
                                                </div>
                                            </div>
                                            <div class="beautypress-tab-text-content">
                                                <h3>Children's Facial</h3>
                                                <p> It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>
                                                <p> A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there</p>
                                                <div class="beautypress-btn-wraper">
                                                    <a href="#" class="xs-btn round-btn box-shadow-btn bg-color-purple">get appointment <span></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- #child_facial END -->

                                    <div class="tab-pane beautypress-tab-content" id="teens_facial">
                                        <div class="beautypress-spilit-container">
                                            <div class="beautypress-tab-image">
                                                <img src="img/service-tab-img-4.jpg" alt="Image">
                                                <div class="beautypress-tab-image-content">
                                                    <span class="beautypress-iocn-btn full-round-btn bg-color-purple">$50</span>
                                                </div>
                                            </div>
                                            <div class="beautypress-tab-text-content">
                                                <h3>Teen's Facial</h3>
                                                <p> It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>
                                                <p> A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there</p>
                                                <div class="beautypress-btn-wraper">
                                                    <a href="#" class="xs-btn round-btn box-shadow-btn bg-color-purple">get appointment <span></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- #teens_facial END -->

                                    <div class="tab-pane beautypress-tab-content" id="layer_facial">
                                        <div class="beautypress-spilit-container">
                                            <div class="beautypress-tab-image">
                                                <img src="img/service-tab-img-5.jpg" alt="Image">
                                                <div class="beautypress-tab-image-content">
                                                    <span class="beautypress-iocn-btn full-round-btn bg-color-purple">$50</span>
                                                </div>
                                            </div>
                                            <div class="beautypress-tab-text-content">
                                                <h3>Layer Facial</h3>
                                                <p> It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>
                                                <p> A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there</p>
                                                <div class="beautypress-btn-wraper">
                                                    <a href="#" class="xs-btn round-btn box-shadow-btn bg-color-purple">get appointment <span></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- #layer_facial END -->

                                    <div class="tab-pane beautypress-tab-content" id="stylish_facial">
                                        <div class="beautypress-spilit-container">
                                            <div class="beautypress-tab-image">
                                                <img src="img/service-tab-img-6.jpg" alt="Image">
                                                <div class="beautypress-tab-image-content">
                                                    <span class="beautypress-iocn-btn full-round-btn bg-color-purple">$50</span>
                                                </div>
                                            </div>
                                            <div class="beautypress-tab-text-content">
                                                <h3>Stylish Facial</h3>
                                                <p> It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>
                                                <p> A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there</p>
                                                <div class="beautypress-btn-wraper">
                                                    <a href="#" class="xs-btn round-btn box-shadow-btn bg-color-purple">get appointment <span></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- #stylish_facial END -->
                                </div>
                            </div>
                        </div><!-- #facial END -->

                        <div class="tab-pane" id="haircut">
                            <div class="tabbable">
                                <ul class="nav nav-tabs beautypress-side-nav">
                                    <li class="active"><a href="#mens_haircut111" data-toggle="tab">Men's Haircut</a></li>
                                    <li><a href="#women_haircut" data-toggle="tab">Women's Haircut</a></li>
                                    <li><a href="#child_haircut" data-toggle="tab">Children's Haircut</a></li>
                                    <li><a href="#teens_haircut" data-toggle="tab">Teen's Haircut</a></li>
                                    <li><a href="#layer_haircut" data-toggle="tab">Layer Haircut</a></li>
                                    <li><a href="#stylish_haircut" data-toggle="tab">Stylish Haircut</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane beautypress-tab-content active" id="mens_haircut">
                                        <div class="beautypress-spilit-container">
                                            <div class="beautypress-tab-image">
                                                <img src="img/service-tab-img-1.jpg" alt="Image">
                                                <div class="beautypress-tab-image-content">
                                                    <span class="beautypress-iocn-btn full-round-btn bg-color-purple">$50</span>
                                                </div>
                                            </div>
                                            <div class="beautypress-tab-text-content">
                                                <h3>Men's Haircut</h3>
                                                <p> It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>
                                                <p> A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there</p>
                                                <div class="beautypress-btn-wraper">
                                                    <a href="#" class="xs-btn round-btn box-shadow-btn bg-color-purple">get appointment <span></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- #mens_haircut END -->

                                    <div class="tab-pane beautypress-tab-content" id="women_haircut">
                                        <div class="beautypress-spilit-container">
                                            <div class="beautypress-tab-image">
                                                <img src="img/service-tab-img-2.jpg" alt="Image">
                                                <div class="beautypress-tab-image-content">
                                                    <span class="beautypress-iocn-btn full-round-btn bg-color-purple">$50</span>
                                                </div>
                                            </div>
                                            <div class="beautypress-tab-text-content">
                                                <h3>Women's Haircut</h3>
                                                <p> It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>
                                                <p> A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there</p>
                                                <div class="beautypress-btn-wraper">
                                                    <a href="#" class="xs-btn round-btn box-shadow-btn bg-color-purple">get appointment <span></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- #women_haircut END -->

                                    <div class="tab-pane beautypress-tab-content" id="child_haircut">
                                        <div class="beautypress-spilit-container">
                                            <div class="beautypress-tab-image">
                                                <img src="img/service-tab-img-3.jpg" alt="Image">
                                                <div class="beautypress-tab-image-content">
                                                    <span class="beautypress-iocn-btn full-round-btn bg-color-purple">$50</span>
                                                </div>
                                            </div>
                                            <div class="beautypress-tab-text-content">
                                                <h3>Children's Haircut</h3>
                                                <p> It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>
                                                <p> A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there</p>
                                                <div class="beautypress-btn-wraper">
                                                    <a href="#" class="xs-btn round-btn box-shadow-btn bg-color-purple">get appointment <span></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- #child_haircut END -->

                                    <div class="tab-pane beautypress-tab-content" id="teens_haircut">
                                        <div class="beautypress-spilit-container">
                                            <div class="beautypress-tab-image">
                                                <img src="img/service-tab-img-4.jpg" alt="Image">
                                                <div class="beautypress-tab-image-content">
                                                    <span class="beautypress-iocn-btn full-round-btn bg-color-purple">$50</span>
                                                </div>
                                            </div>
                                            <div class="beautypress-tab-text-content">
                                                <h3>Teen's Haircut</h3>
                                                <p> It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>
                                                <p> A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there</p>
                                                <div class="beautypress-btn-wraper">
                                                    <a href="#" class="xs-btn round-btn box-shadow-btn bg-color-purple">get appointment <span></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- #teens_haircut END -->

                                    <div class="tab-pane beautypress-tab-content" id="layer_haircut">
                                        <div class="beautypress-spilit-container">
                                            <div class="beautypress-tab-image">
                                                <img src="img/service-tab-img-5.jpg" alt="Image">
                                                <div class="beautypress-tab-image-content">
                                                    <span class="beautypress-iocn-btn full-round-btn bg-color-purple">$50</span>
                                                </div>
                                            </div>
                                            <div class="beautypress-tab-text-content">
                                                <h3>Layer Haircut</h3>
                                                <p> It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>
                                                <p> A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there</p>
                                                <div class="beautypress-btn-wraper">
                                                    <a href="#" class="xs-btn round-btn box-shadow-btn bg-color-purple">get appointment <span></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- #layer_haircut END -->

                                    <div class="tab-pane beautypress-tab-content" id="stylish_haircut">
                                        <div class="beautypress-spilit-container">
                                            <div class="beautypress-tab-image">
                                                <img src="img/service-tab-img-6.jpg" alt="Image">
                                                <div class="beautypress-tab-image-content">
                                                    <span class="beautypress-iocn-btn full-round-btn bg-color-purple">$50</span>
                                                </div>
                                            </div>
                                            <div class="beautypress-tab-text-content">
                                                <h3>Stylish Haircut</h3>
                                                <p> It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>
                                                <p> A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there</p>
                                                <div class="beautypress-btn-wraper">
                                                    <a href="#" class="xs-btn round-btn box-shadow-btn bg-color-purple">get appointment <span></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- #stylish_haircut END -->
                                </div>
                            </div>
                        </div><!-- #haircut END -->

                        <div class="tab-pane" id="massage">
                            <div class="tabbable">
                                <ul class="nav nav-tabs beautypress-side-nav">
                                    <li class="active"><a href="#mens_massage" data-toggle="tab">Men's massage</a></li>
                                    <li><a href="#women_massage" data-toggle="tab">Women's massage</a></li>
                                    <li><a href="#child_massage" data-toggle="tab">Children's massage</a></li>
                                    <li><a href="#teens_massage" data-toggle="tab">Teen's massage</a></li>
                                    <li><a href="#layer_massage" data-toggle="tab">Layer massage</a></li>
                                    <li><a href="#stylish_massage" data-toggle="tab">Stylish massage</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane beautypress-tab-content active" id="mens_massage">
                                        <div class="beautypress-spilit-container">
                                            <div class="beautypress-tab-image">
                                                <img src="img/service-tab-img-1.jpg" alt="Image">
                                                <div class="beautypress-tab-image-content">
                                                    <span class="beautypress-iocn-btn full-round-btn bg-color-purple">$50</span>
                                                </div>
                                            </div>
                                            <div class="beautypress-tab-text-content">
                                                <h3>Men's massage</h3>
                                                <p> It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>
                                                <p> A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there</p>
                                                <div class="beautypress-btn-wraper">
                                                    <a href="#" class="xs-btn round-btn box-shadow-btn bg-color-purple">get appointment <span></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- #mens_massage END -->

                                    <div class="tab-pane beautypress-tab-content" id="women_massage">
                                        <div class="beautypress-spilit-container">
                                            <div class="beautypress-tab-image">
                                                <img src="img/service-tab-img-2.jpg" alt="Image">
                                                <div class="beautypress-tab-image-content">
                                                    <span class="beautypress-iocn-btn full-round-btn bg-color-purple">$50</span>
                                                </div>
                                            </div>
                                            <div class="beautypress-tab-text-content">
                                                <h3>Women's massage</h3>
                                                <p> It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>
                                                <p> A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there</p>
                                                <div class="beautypress-btn-wraper">
                                                    <a href="#" class="xs-btn round-btn box-shadow-btn bg-color-purple">get appointment <span></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- #women_massage END -->

                                    <div class="tab-pane beautypress-tab-content" id="child_massage">
                                        <div class="beautypress-spilit-container">
                                            <div class="beautypress-tab-image">
                                                <img src="img/service-tab-img-3.jpg" alt="Image">
                                                <div class="beautypress-tab-image-content">
                                                    <span class="beautypress-iocn-btn full-round-btn bg-color-purple">$50</span>
                                                </div>
                                            </div>
                                            <div class="beautypress-tab-text-content">
                                                <h3>Children's massage</h3>
                                                <p> It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>
                                                <p> A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there</p>
                                                <div class="beautypress-btn-wraper">
                                                    <a href="#" class="xs-btn round-btn box-shadow-btn bg-color-purple">get appointment <span></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- #child_massage END -->

                                    <div class="tab-pane beautypress-tab-content" id="teens_massage">
                                        <div class="beautypress-spilit-container">
                                            <div class="beautypress-tab-image">
                                                <img src="img/service-tab-img-4.jpg" alt="Image">
                                                <div class="beautypress-tab-image-content">
                                                    <span class="beautypress-iocn-btn full-round-btn bg-color-purple">$50</span>
                                                </div>
                                            </div>
                                            <div class="beautypress-tab-text-content">
                                                <h3>Teen's massage</h3>
                                                <p> It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>
                                                <p> A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there</p>
                                                <div class="beautypress-btn-wraper">
                                                    <a href="#" class="xs-btn round-btn box-shadow-btn bg-color-purple">get appointment <span></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- #teens_massage END -->

                                    <div class="tab-pane beautypress-tab-content" id="layer_massage">
                                        <div class="beautypress-spilit-container">
                                            <div class="beautypress-tab-image">
                                                <img src="img/service-tab-img-5.jpg" alt="Image">
                                                <div class="beautypress-tab-image-content">
                                                    <span class="beautypress-iocn-btn full-round-btn bg-color-purple">$50</span>
                                                </div>
                                            </div>
                                            <div class="beautypress-tab-text-content">
                                                <h3>Layer massage</h3>
                                                <p> It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>
                                                <p> A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there</p>
                                                <div class="beautypress-btn-wraper">
                                                    <a href="#" class="xs-btn round-btn box-shadow-btn bg-color-purple">get appointment <span></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- #layer_massage END -->

                                    <div class="tab-pane beautypress-tab-content" id="stylish_massage">
                                        <div class="beautypress-spilit-container">
                                            <div class="beautypress-tab-image">
                                                <img src="img/service-tab-img-6.jpg" alt="Image">
                                                <div class="beautypress-tab-image-content">
                                                    <span class="beautypress-iocn-btn full-round-btn bg-color-purple">$50</span>
                                                </div>
                                            </div>
                                            <div class="beautypress-tab-text-content">
                                                <h3>Stylish massage</h3>
                                                <p> It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>
                                                <p> A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there</p>
                                                <div class="beautypress-btn-wraper">
                                                    <a href="#" class="xs-btn round-btn box-shadow-btn bg-color-purple">get appointment <span></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- #stylish_massage END -->
                                </div>
                            </div>
                        </div><!-- #massage END -->

                        <div class="tab-pane" id="nail">
                            <div class="tabbable">
                                <ul class="nav nav-tabs beautypress-side-nav">
                                    <li class="active"><a href="#mens_nail" data-toggle="tab">Men's Nail care</a></li>
                                    <li><a href="#women_nail" data-toggle="tab">Women's Nail care</a></li>
                                    <li><a href="#child_nail" data-toggle="tab">Children's Nail care</a></li>
                                    <li><a href="#teens_nail" data-toggle="tab">Teen's Nail care</a></li>
                                    <li><a href="#layer_nail" data-toggle="tab">Layer Nail care</a></li>
                                    <li><a href="#stylish_nail" data-toggle="tab">Stylish Nail care</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane beautypress-tab-content active" id="mens_nail">
                                        <div class="beautypress-spilit-container">
                                            <div class="beautypress-tab-image">
                                                <img src="img/service-tab-img-1.jpg" alt="Image">
                                                <div class="beautypress-tab-image-content">
                                                    <span class="beautypress-iocn-btn full-round-btn bg-color-purple">$50</span>
                                                </div>
                                            </div>
                                            <div class="beautypress-tab-text-content">
                                                <h3>Men's Nail care</h3>
                                                <p> It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>
                                                <p> A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there</p>
                                                <div class="beautypress-btn-wraper">
                                                    <a href="#" class="xs-btn round-btn box-shadow-btn bg-color-purple">get appointment <span></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- #mens_nail END -->

                                    <div class="tab-pane beautypress-tab-content" id="women_nail">
                                        <div class="beautypress-spilit-container">
                                            <div class="beautypress-tab-image">
                                                <img src="img/service-tab-img-2.jpg" alt="Image">
                                                <div class="beautypress-tab-image-content">
                                                    <span class="beautypress-iocn-btn full-round-btn bg-color-purple">$50</span>
                                                </div>
                                            </div>
                                            <div class="beautypress-tab-text-content">
                                                <h3>Women's Nail care</h3>
                                                <p> It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>
                                                <p> A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there</p>
                                                <div class="beautypress-btn-wraper">
                                                    <a href="#" class="xs-btn round-btn box-shadow-btn bg-color-purple">get appointment <span></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- #women_nail END -->

                                    <div class="tab-pane beautypress-tab-content" id="child_nail">
                                        <div class="beautypress-spilit-container">
                                            <div class="beautypress-tab-image">
                                                <img src="img/service-tab-img-3.jpg" alt="Image">
                                                <div class="beautypress-tab-image-content">
                                                    <span class="beautypress-iocn-btn full-round-btn bg-color-purple">$50</span>
                                                </div>
                                            </div>
                                            <div class="beautypress-tab-text-content">
                                                <h3>Children's Nail care</h3>
                                                <p> It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>
                                                <p> A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there</p>
                                                <div class="beautypress-btn-wraper">
                                                    <a href="#" class="xs-btn round-btn box-shadow-btn bg-color-purple">get appointment <span></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- #child_nail END -->

                                    <div class="tab-pane beautypress-tab-content" id="teens_nail">
                                        <div class="beautypress-spilit-container">
                                            <div class="beautypress-tab-image">
                                                <img src="img/service-tab-img-4.jpg" alt="Image">
                                                <div class="beautypress-tab-image-content">
                                                    <span class="beautypress-iocn-btn full-round-btn bg-color-purple">$50</span>
                                                </div>
                                            </div>
                                            <div class="beautypress-tab-text-content">
                                                <h3>Teen's Nail care</h3>
                                                <p> It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>
                                                <p> A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there</p>
                                                <div class="beautypress-btn-wraper">
                                                    <a href="#" class="xs-btn round-btn box-shadow-btn bg-color-purple">get appointment <span></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- #teens_nail END -->

                                    <div class="tab-pane beautypress-tab-content" id="layer_nail">
                                        <div class="beautypress-spilit-container">
                                            <div class="beautypress-tab-image">
                                                <img src="img/service-tab-img-5.jpg" alt="Image">
                                                <div class="beautypress-tab-image-content">
                                                    <span class="beautypress-iocn-btn full-round-btn bg-color-purple">$50</span>
                                                </div>
                                            </div>
                                            <div class="beautypress-tab-text-content">
                                                <h3>Layer Nail care</h3>
                                                <p> It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>
                                                <p> A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there</p>
                                                <div class="beautypress-btn-wraper">
                                                    <a href="#" class="xs-btn round-btn box-shadow-btn bg-color-purple">get appointment <span></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- #layer_nail END -->

                                    <div class="tab-pane beautypress-tab-content" id="stylish_nail">
                                        <div class="beautypress-spilit-container">
                                            <div class="beautypress-tab-image">
                                                <img src="img/service-tab-img-6.jpg" alt="Image">
                                                <div class="beautypress-tab-image-content">
                                                    <span class="beautypress-iocn-btn full-round-btn bg-color-purple">$50</span>
                                                </div>
                                            </div>
                                            <div class="beautypress-tab-text-content">
                                                <h3>Stylish Nail care</h3>
                                                <p> It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>
                                                <p> A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there</p>
                                                <div class="beautypress-btn-wraper">
                                                    <a href="#" class="xs-btn round-btn box-shadow-btn bg-color-purple">get appointment <span></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- #stylish_nail END -->
                                </div>
                            </div>
                        </div><!-- #nail END -->

                        <div class="tab-pane" id="waxing">
                            <div class="tabbable">
                                <ul class="nav nav-tabs beautypress-side-nav">
                                    <li class="active"><a href="#mens_waxing" data-toggle="tab">Men's waxing</a></li>
                                    <li><a href="#women_waxing" data-toggle="tab">Women's waxing</a></li>
                                    <li><a href="#child_waxing" data-toggle="tab">Children's waxing</a></li>
                                    <li><a href="#teens_waxing" data-toggle="tab">Teen's waxing</a></li>
                                    <li><a href="#layer_waxing" data-toggle="tab">Layer waxing</a></li>
                                    <li><a href="#stylish_waxing" data-toggle="tab">Stylish waxing</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane beautypress-tab-content active" id="mens_waxing">
                                        <div class="beautypress-spilit-container">
                                            <div class="beautypress-tab-image">
                                                <img src="img/service-tab-img-1.jpg" alt="Image">
                                                <div class="beautypress-tab-image-content">
                                                    <span class="beautypress-iocn-btn full-round-btn bg-color-purple">$50</span>
                                                </div>
                                            </div>
                                            <div class="beautypress-tab-text-content">
                                                <h3>Men's waxing</h3>
                                                <p> It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>
                                                <p> A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there</p>
                                                <div class="beautypress-btn-wraper">
                                                    <a href="#" class="xs-btn round-btn box-shadow-btn bg-color-purple">get appointment <span></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- #mens_waxing END -->

                                    <div class="tab-pane beautypress-tab-content" id="women_waxing">
                                        <div class="beautypress-spilit-container">
                                            <div class="beautypress-tab-image">
                                                <img src="img/service-tab-img-2.jpg" alt="Image">
                                                <div class="beautypress-tab-image-content">
                                                    <span class="beautypress-iocn-btn full-round-btn bg-color-purple">$50</span>
                                                </div>
                                            </div>
                                            <div class="beautypress-tab-text-content">
                                                <h3>Women's waxing</h3>
                                                <p> It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>
                                                <p> A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there</p>
                                                <div class="beautypress-btn-wraper">
                                                    <a href="#" class="xs-btn round-btn box-shadow-btn bg-color-purple">get appointment <span></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- #women_waxing END -->

                                    <div class="tab-pane beautypress-tab-content" id="child_waxing">
                                        <div class="beautypress-spilit-container">
                                            <div class="beautypress-tab-image">
                                                <img src="img/service-tab-img-3.jpg" alt="Image">
                                                <div class="beautypress-tab-image-content">
                                                    <span class="beautypress-iocn-btn full-round-btn bg-color-purple">$50</span>
                                                </div>
                                            </div>
                                            <div class="beautypress-tab-text-content">
                                                <h3>Children's waxing</h3>
                                                <p> It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>
                                                <p> A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there</p>
                                                <div class="beautypress-btn-wraper">
                                                    <a href="#" class="xs-btn round-btn box-shadow-btn bg-color-purple">get appointment <span></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- #child_waxing END -->

                                    <div class="tab-pane beautypress-tab-content" id="teens_waxing">
                                        <div class="beautypress-spilit-container">
                                            <div class="beautypress-tab-image">
                                                <img src="img/service-tab-img-4.jpg" alt="Image">
                                                <div class="beautypress-tab-image-content">
                                                    <span class="beautypress-iocn-btn full-round-btn bg-color-purple">$50</span>
                                                </div>
                                            </div>
                                            <div class="beautypress-tab-text-content">
                                                <h3>Teen's waxing</h3>
                                                <p> It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>
                                                <p> A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there</p>
                                                <div class="beautypress-btn-wraper">
                                                    <a href="#" class="xs-btn round-btn box-shadow-btn bg-color-purple">get appointment <span></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- #teens_waxing END -->

                                    <div class="tab-pane beautypress-tab-content" id="layer_waxing">
                                        <div class="beautypress-spilit-container">
                                            <div class="beautypress-tab-image">
                                                <img src="img/service-tab-img-5.jpg" alt="Image">
                                                <div class="beautypress-tab-image-content">
                                                    <span class="beautypress-iocn-btn full-round-btn bg-color-purple">$50</span>
                                                </div>
                                            </div>
                                            <div class="beautypress-tab-text-content">
                                                <h3>Layer waxing</h3>
                                                <p> It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>
                                                <p> A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there</p>
                                                <div class="beautypress-btn-wraper">
                                                    <a href="#" class="xs-btn round-btn box-shadow-btn bg-color-purple">get appointment <span></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- #layer_waxing END -->

                                    <div class="tab-pane beautypress-tab-content" id="stylish_waxing">
                                        <div class="beautypress-spilit-container">
                                            <div class="beautypress-tab-image">
                                                <img src="img/service-tab-img-6.jpg" alt="Image">
                                                <div class="beautypress-tab-image-content">
                                                    <span class="beautypress-iocn-btn full-round-btn bg-color-purple">$50</span>
                                                </div>
                                            </div>
                                            <div class="beautypress-tab-text-content">
                                                <h3>Stylish waxing</h3>
                                                <p> It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. </p>
                                                <p> A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there</p>
                                                <div class="beautypress-btn-wraper">
                                                    <a href="#" class="xs-btn round-btn box-shadow-btn bg-color-purple">get appointment <span></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- #stylish_waxing END -->
                                </div>
                            </div>
                        </div><!-- #waxing END -->
                    </div>
                </div><!-- .tabbable END -->
            </div><!-- .beautypress-tab END -->
        </div>
    </section><!-- .beautypress-service-section END -->
    <!-- Service section closed -->


@endsection
