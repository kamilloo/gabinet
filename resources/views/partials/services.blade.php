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
                                                <img src="{{ Storage::url($service->filepath) }}" alt="Image">
                                                <div class="beautypress-tab-image-content">
                                                    <span class="beautypress-iocn-btn full-round-btn bg-color-purple">$50</span>
                                                </div>
                                            </div>
                                            <div class="beautypress-tab-text-content">
                                                {!! $service->description !!}
                                                <div class="beautypress-btn-wraper">
                                                    <a href="{{ route('contact') }}" class="xs-btn round-btn box-shadow-btn bg-color-purple">Umów się <span></span></a>
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
