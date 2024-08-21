<div class="brands-wrapper">
    <div class="brands">
        <div class="d-flex justify-content-between">
            <div>

                @php
    $firstOffer = $offers->first(); // Get the first offer
@endphp

@if($firstOffer)
    <h2 class="text-black mb-4">{{ $firstOffer->title }}</h2>
@endif


        <div class="countdown-background">
            <span class="cz-countdown d-flex justify-content-center align-items-center flash-deal-countdown" data-countdown="08/20/2024 23:59:00 ">
                <span class="cz-countdown-days">
                    <span class="cz-countdown-value">4</span>
                    <span class="cz-countdown-text">Days</span>
                </span>
                <span class="cz-countdown-value p-1">:</span>
                <span class="cz-countdown-hours">
                    <span class="cz-countdown-value">23</span>
                    <span class="cz-countdown-text">Hrs</span>
                </span>
                <span class="cz-countdown-value p-1">:</span>
                <span class="cz-countdown-minutes">
                    <span class="cz-countdown-value">33</span>
                    <span class="cz-countdown-text">Min</span>
                </span>
                <span class="cz-countdown-value p-1">:</span>
                <span class="cz-countdown-seconds">
                    <span class="cz-countdown-value">55</span>
                    <span class="cz-countdown-text">Sec</span>
                </span>
            </span>
        </div>
    </div>


        <a href="/product/all" class="text-black">See All</a>
    </div>
        <div class="row mt-4">


            @php
            $FlashSellingProducts = $products->filter(function ($item) {
                return $item->ItemTag == 1;
            })->take(5);
        @endphp

            @foreach ($FlashSellingProducts as $product)
                <div class="col-lg-2 col-md-4 col-sm-6 product-item">
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
<div class="d-flex gap-2">
    <a href="{{ route('single.product', $product->en_Product_Slug) }}" title="{{ __('Buy Now') }}" class="add-cart addCart buynow rounded"
        data-id="{{ $product->id }}">{{ __('Buy Now') }}</a>

    <a href="javascript:void(0)" title="{{ __('Add To Cart') }}" stroke='#FCA610'  class="add-cart addCart addedtocart rounded"
        data-id="{{ $product->id }}">{{ __('Add To Cart') }}</a>

</div>
                        </div>
                    </div>


                </div>

            @endforeach
        </div>
    </div>
    </div>
