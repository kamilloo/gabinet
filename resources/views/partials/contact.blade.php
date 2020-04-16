
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
                                <li><i class="xsicon icon-envelope5"></i>pietka.kasia3@gmail.com</li>
                                <li><i class="fa fa-facebook"></i>https://www.facebook.com/kosmetolog.wlkp/</li>
                            </ul><!-- .beautypress-icon-with-text END -->
                        </div><!-- .beautypress-contact-details END -->
                    </div>
                </div>
