            <div class="row">
                @foreach($pricing as $file)
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
                            <i class="xsicon icon-nail"></i>

                            <div class="beautypress-btn-wraper">
                                <a href="{{ route('contact') }}" class="xs-btn round-btn box-shadow-btn bg-color-cyan">Umów się <span></span></a>
                            </div>
                        </div><!-- .beautypress-pricing-footer END -->
                    </div><!-- .beautypress-single-pricing-table END -->
                </div>
                @endforeach
            </div>
