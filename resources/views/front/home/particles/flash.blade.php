@php
$firstOffer = $offers->first();
$offerStartDate = $firstOffer->updated_at;
@endphp

@if($firstOffer->offerstatus == 1)

<div class="brands-wrapper flash brands" id="offer-section-mobile">
    <p class="mb-4 text-end"><a href="{{ $firstOffer->categorylink }}" style="color: #ee3c22;">See More</a></p>

    <div>
        <div class="col-lg-2 col-md-4 col-sm-6 date-counter-phone d-none">
            @if($firstOffer)
                <h2 class="mb-4" style="color: #ee3c22;">{{ $firstOffer->title }}</h2>
                <div class="d-flex justify-content-between">
                <div class="offer-image-home mb-4">
                    <img src="{{ asset(offerImageBanner() . ImageOfferNew()->offerbanner) }}" class="rounded" alt="{{ $firstOffer->title }}">
                </div>
                <div class="countdown-background">
                    <span id="cz-countdown-mobile" class="cz-countdown d-flex justify-content-center align-items-center flash-deal-countdown">
                        <span class="cz-countdown-days">
                            <span id="days-mobile" class="cz-countdown-value"></span>
                            <span class="cz-countdown-text">Days</span>
                        </span>
                        <span class="cz-countdown-value p-1">:</span>
                        <span class="cz-countdown-hours">
                            <span id="hours-mobile" class="cz-countdown-value"></span>
                            <span class="cz-countdown-text">Hrs</span>
                        </span>
                        <span class="cz-countdown-value p-1">:</span>
                        <span class="cz-countdown-minutes">
                            <span id="minutes-mobile" class="cz-countdown-value"></span>
                            <span class="cz-countdown-text">Min</span>
                        </span>
                        <span class="cz-countdown-value p-1">:</span>
                        <span class="cz-countdown-seconds">
                            <span id="seconds-mobile" class="cz-countdown-value"></span>
                            <span class="cz-countdown-text">Sec</span>
                        </span>
                    </span>
                    <div class="progress __progress mt-4">
                        <div id="flash-deal-progress-bar-mobile" class="progress-bar flash-deal-progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                </div>

            </div>





                <script>
                        const offerStartDate_mobile = new Date("{{ $offerStartDate }}").getTime();
                        const offerEndDate_mobile = new Date("{{ $firstOffer->enddate }}").getTime();
                        const countdownFunction_mobile = setInterval(() => {
                        const now_mobile = new Date().getTime();
                        const totalDuration_mobile = offerEndDate_mobile - offerStartDate_mobile;
                        const timeRemaining_mobile = offerEndDate_mobile - now_mobile;
                        const days_mobile = Math.floor(timeRemaining_mobile / (1000 * 60 * 60 * 24));
                        const hours_mobile = Math.floor((timeRemaining_mobile % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        const minutes_mobile = Math.floor((timeRemaining_mobile % (1000 * 60 * 60)) / (1000 * 60));
                        const seconds_mobile = Math.floor((timeRemaining_mobile % (1000 * 60)) / 1000);
                        document.getElementById("days-mobile").innerText = days_mobile;
                        document.getElementById("hours-mobile").innerText = hours_mobile;
                        document.getElementById("minutes-mobile").innerText = minutes_mobile;
                        document.getElementById("seconds-mobile").innerText = seconds_mobile;
                        const progressPercentage_mobile = ((totalDuration_mobile - timeRemaining_mobile) / totalDuration_mobile) * 100;
                        const progressBar_mobile = document.getElementById("flash-deal-progress-bar-mobile");
                        progressBar_mobile.style.width = progressPercentage_mobile + "%";
                        progressBar_mobile.setAttribute('aria-valuenow', progressPercentage_mobile.toFixed(2));
                        if (timeRemaining_mobile < 0) {
                            clearInterval(countdownFunction_mobile);
                            document.getElementById("cz-countdown-mobile").innerHTML = "EXPIRED";
                            progressBar_mobile.style.width = "100%";
                            document.getElementById("offer-section-mobile").style.display = "none";
                        }
                    }, 1000);
                </script>
            @endif
    </div>







        <div class="row mt-4 justify-content-between">
            <div class="col-lg-2 col-md-4 col-sm-6 date-counter">
            @if($firstOffer)
                <h2 class="mb-4" style="color: #ee3c22; font-size: 2.4rem;">{{ $firstOffer->title }}</h2>
                <div class="offer-image-home mb-4">
                    <img src="{{ asset(offerImageBanner() . ImageOfferNew()->offerbanner) }}" class="rounded" alt="{{ $firstOffer->title }}">
                </div>
                <div class="countdown-background">
                    <span id="cz-countdown" class="cz-countdown d-flex justify-content-center align-items-center flash-deal-countdown">
                        <span class="cz-countdown-days">
                            <span id="days" class="cz-countdown-value"></span>
                            <span class="cz-countdown-text">Days</span>
                        </span>
                        <span class="cz-countdown-value p-1">:</span>
                        <span class="cz-countdown-hours">
                            <span id="hours" class="cz-countdown-value"></span>
                            <span class="cz-countdown-text">Hrs</span>
                        </span>
                        <span class="cz-countdown-value p-1">:</span>
                        <span class="cz-countdown-minutes">
                            <span id="minutes" class="cz-countdown-value"></span>
                            <span class="cz-countdown-text">Min</span>
                        </span>
                        <span class="cz-countdown-value p-1">:</span>
                        <span class="cz-countdown-seconds">
                            <span id="seconds" class="cz-countdown-value"></span>
                            <span class="cz-countdown-text">Sec</span>
                        </span>
                    </span>
                    <div class="progress __progress mt-4">
                        <div id="flash-deal-progress-bar" class="progress-bar flash-deal-progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                </div>





                <script>
                        const offerStartDate = new Date("{{ $offerStartDate }}").getTime();
                        const offerEndDate = new Date("{{ $firstOffer->enddate }}").getTime();
                        const countdownFunction = setInterval(() => {
                        const now = new Date().getTime();
                        const totalDuration = offerEndDate - offerStartDate;
                        const timeRemaining = offerEndDate - now;
                        const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
                        const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
                        const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);
                        document.getElementById("days").innerText = days;
                        document.getElementById("hours").innerText = hours;
                        document.getElementById("minutes").innerText = minutes;
                        document.getElementById("seconds").innerText = seconds;
                        const progressPercentage = ((totalDuration - timeRemaining) / totalDuration) * 100;
                        const progressBar = document.getElementById("flash-deal-progress-bar");
                        progressBar.style.width = progressPercentage + "%";
                        progressBar.setAttribute('aria-valuenow', progressPercentage.toFixed(2));
                        if (timeRemaining < 0) {
                            clearInterval(countdownFunction);
                            document.getElementById("cz-countdown").innerHTML = "EXPIRED";
                            progressBar.style.width = "100%";
                            document.getElementById("offer-section").style.display = "none";
                        }
                    }, 1000);
                </script>
            @endif
    </div>



            @php
            $FlashSellingProducts = $products->filter(function ($item) {
                return $item->ItemTag == 1;
            })->take(4);
        @endphp

            @foreach ($FlashSellingProducts as $product)


            @if($product->Stock >0)




                <div class="col-lg-2 col-md-4 col-sm-6 product-item-flash">
                    <div class="single-grid-product bg-white p-2" style="border: 1px solid #ddd; border-radius:.5rem;">
                        <div class="product-top">
                            <a href="{{ route('single.product', $product->en_Product_Slug) }}"><img
                                    class="product-thumbnal"
                                    src="{{ asset(ProductImage() . $product->Primary_Image) }}"
                                    alt="{{ __('product') }}" /></a>
                            <div class="product-flags">
                                @if ($product->Discount > 0)
                                    <span class="product-flag discount">{{ __('-') }}{{ $product->Discount }} {{__('Sale')}}</span>
                                @endif
                            </div>
                            <ul class="prdouct-btn-wrapper">
                                <li class="single-product-btn">
                                    <a class="product-btn CompareList" data-id="{{ $product->id }}"
                                        title="{{ __('Add To Compare') }}"><i class="icon flaticon-bar-chart"></i></a>
                                </li>
                                <li class="single-product-btn">
                                    <a class="product-btn MyWishList" data-id="{{ $product->id }}"
                                        title="{{ __('Add To Wishlist') }}"><i class="icon flaticon-like"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="product-info text-center">
                            <input type="hidden" name="quantity" value="1" id="product_quantity">
                            <h4 class="product-name"><a class="product-link"
                                    href="{{ route('single.product', $product->en_Product_Slug) }}">{{ langConverter($product->en_Product_Name, $product->fr_Product_Name) }}</a>
                            </h4>
                            <!-- This is server side code. User can not modify it. -->

                            <div class="product-price d-flex gap-4">
                                <span class="price">{{ currencyConverter($product->Discount_Price) }}</span>
                                @if($product->Discount_Price <  $product->Price)
                                <span class="regular-price">{{ currencyConverter($product->Price) }}</span>
                                @endif
                            </div>
                            <div class="pricer d-flex">
                            {!! productReview($product->id) !!} <div>{{_('(')}} {{ productReviewerNumber($product->id) }} {{_(')')}}</div>
</div>

                        </div>
                    </div>


                </div>

                @else




<div class="col-lg-2 col-md-4 col-sm-6 product-item-flash">
    <div class="single-grid-product bg-white p-2" style="border: 1px solid #ddd; border-radius:.5rem; position: relative;">
        <!-- Stock Out Overlay -->
        <div class="stock-out-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 900; background: rgba(0,0,0,0.6); color: white; display: flex; align-items: center; justify-content: center; font-size: 2rem; border-radius: .5rem;">
            {{ __('Stock Out') }}
        </div>

        <div class="product-top">
            <a href="#">
                <img class="product-thumbnal" src="{{ asset(ProductImage() . $product->Primary_Image) }}" alt="{{ __('product') }}" />
            </a>
        </div>

        <div class="product-info text-center">
            <input type="hidden" name="quantity" value="1" id="product_quantity">
            <h4 class="product-name">
                <a class="product-link" href="#">
                    {{ langConverter($product->en_Product_Name, $product->fr_Product_Name) }}
                </a>
            </h4>

            <div class="product-price d-flex gap-4">
                <span class="price">{{ currencyConverter($product->Discount_Price) }}</span>
                @if($product->Discount_Price < $product->Price)
                    <span class="regular-price">{{ currencyConverter($product->Price) }}</span>
                @endif
            </div>

            <div class="pricer d-flex">
                {!! productReview($product->id) !!}
                <div>{{_('(')}} {{ productReviewerNumber($product->id) }} {{_(')')}}</div>
            </div>
        </div>
    </div>
</div>



                @endif








            @endforeach

        </div>
    </div>
    </div>

@endif
