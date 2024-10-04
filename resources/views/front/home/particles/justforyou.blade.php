<div class="brands-wrapper mt-5">
    <div class="brands">
        <h2 class="text-black mb-4">Just For You</h2>
        <div class="row justify-content-between" id="product-container">



            @php
            $JustForYouProducts = $featured_products;
            $productCount = count($JustForYouProducts);
            @endphp


            @foreach ($JustForYouProducts as $product)

            @php
                $totalOrders = \App\Models\Admin\OrderDetails::where('product_id', $product->id)->count();
                $isOutOfStock = $totalOrders >= $product->Stock;
            @endphp

            @if(!$isOutOfStock)

                <div class="col-lg-2 col-md-4 col-sm-6 product-item">
                    <div class="single-grid-product bg-white p-2" style="border: 1px solid #ddd; border-radius:.5rem;">
                        <div class="product-top">
                            <a href="{{ route('single.product', $product->en_Product_Slug) }}">
                                <img class="product-thumbnal" src="{{ asset(ProductImage() . $product->Primary_Image) }}" alt="{{ __('product') }}" />
                            </a>
                            <div class="product-flags">
                                @if ($product->Discount > 0)
                                    <span class="product-flag discount">{{ __('-') }}{{ $product->Discount }} {{__('Sale')}}</span>
                                @elseif ($product->discountpp > 0)
                                    <span class="product-flag discount">{{ __('-') }}{{ $product->discountpp }} {{__('Sale')}}</span>
                                @endif
                            </div>


                            <ul class="prdouct-btn-wrapper">
                                <li class="single-product-btn">
                                    <a class="product-btn CompareList" data-id="{{ $product->id }}" title="{{ __('Add To Compare') }}"><i class="icon flaticon-bar-chart"></i></a>
                                </li>
                                <li class="single-product-btn">
                                    <a class="product-btn MyWishList" data-id="{{ $product->id }}" title="{{ __('Add To Wishlist') }}"><i class="icon flaticon-like"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="product-info text-center">
                            <input type="hidden" name="quantity" value="1" id="product_quantity">
                            <h3 class="product-name">
                                <a class="product-link" href="{{ route('single.product', $product->en_Product_Slug) }}">{{ langConverter($product->en_Product_Name, $product->fr_Product_Name) }}</a>
                            </h3>
                             <div class="product-price d-flex gap-4">
                                <span class="price">{{ currencyConverter($product->Discount_Price) }}</span>
                                @if($product->Discount_Price <  $product->Price)
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
        @if($productCount >= 15)
            <div class="text-center">
                <a class="loadmore mb-5 mt-3" href="/product/all">Load More Products</a>
            </div>
        @endif
    </div>
</div>
