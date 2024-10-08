@extends('front.layouts.master')
@section('title', isset($title) ? $title : 'Home')
@section('description', isset($description) ? $description : '')
@section('keywords', isset($keywords) ? $keywords : '')
@section('content')
    <!-- breadcrumb area start here  -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-wrap text-center">
                <h2 class="page-title">{{ langConverter($products->en_Product_Name, $products->fr_Product_Name) }}</h2>
                <ul class="breadcrumb-pages">
                    <li class="page-item"><a class="page-item-link" href="{{ route('front') }}">{{ __('Home') }}</a>
                    </li>
                    <li class="page-item">{{ __('Product Single Page') }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end here  -->

    <!-- product-single-area start here  -->
    <div class="product-single-area section-top">
        <div class="container">
            <div class="product-single-details">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product-single-left">
                            <div class="product-thumbnail-image">
                                <ul class="product-thumb-silide slider slider-nav">

                                    <li class="single-item"><img class="single-item-image"
                                            src="{{ asset(ProductImage() . $products->Primary_Image) }}"
                                            alt="{{ __('product') }}" /></li>
                                    @if ($products->Image4)
                                        <li class="single-item"><img class="single-item-image"
                                                src="{{ asset(ProductImage() . $products->Image4) }}"
                                                alt="{{ __('product') }}" />
                                        </li>
                                    @endif
                                    @if ($products->Image3)
                                        <li class="single-item"><img class="single-item-image"
                                                src="{{ asset(ProductImage() . $products->Image3) }}"
                                                alt="{{ __('product') }}" />
                                        </li>
                                    @endif
                                    @if ($products->Image5)
                                        <li class="single-item"><img class="single-item-image"
                                                src="{{ asset(ProductImage() . $products->Image5) }}"
                                                alt="{{ __('product') }}" /></li>
                                    @endif
                                    @if ($products->Image2)
                                        <li class="single-item"><img class="single-item-image"
                                                src="{{ asset(ProductImage() . $products->Image2) }}"
                                                alt="{{ __('product') }}" /></li>
                                    @endif
                                </ul>
                            </div>


                            <div class="product-slier-big-image">
                                <div class="product-priview-slide slider slider-for">
                                    <div class="single-slide zoom-container">
                                        <img class="slide-image"
                                             src="{{ asset(ProductImage() . $products->Primary_Image) }}"
                                             alt="{{ __('product') }}" />
                                    </div>
                                    @if ($products->Image4)
                                        <div class="single-slide zoom-container">
                                            <img class="slide-image" src="{{ asset(ProductImage() . $products->Image4) }}"
                                                 alt="{{ __('product') }}" />
                                        </div>
                                    @endif
                                    @if ($products->Image3)
                                        <div class="single-slide zoom-container">
                                            <img class="slide-image" src="{{ asset(ProductImage() . $products->Image3) }}"
                                                 alt="{{ __('product') }}" />
                                        </div>
                                    @endif
                                    @if ($products->Image5)
                                        <div class="single-slide zoom-container">
                                            <img class="slide-image" src="{{ asset(ProductImage() . $products->Image5) }}"
                                                 alt="{{ __('product') }}" />
                                        </div>
                                    @endif
                                    @if ($products->Image2)
                                        <div class="single-slide zoom-container">
                                            <img class="slide-image" src="{{ asset(ProductImage() . $products->Image2) }}"
                                                 alt="{{ __('product') }}" />
                                        </div>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-single-right">
                            <div class="product-info">
                                <h3 class="product-name">
                                    {{ langConverter($products->en_Product_Name, $products->fr_Product_Name) }}</h3>

                                    <div class="d-flex gap-4">
                                <div class="pricer d-flex gap-3">
                                    {!! productReview($products->id) !!}
                                    <div>{{_('(')}} {{ productReviewerNumber($products->id) }} {{_(')')}}</div>
                                </div>
|
                                <div class="pricer d-flex gap-3">
                                    {{-- Total Order: <span>{{ \App\Models\Admin\Order::count() }}</span> --}}
                                    Total Order: <span>{{ \App\Models\Admin\OrderDetails::where('Product_Id', $products->id)->count() }}</span>
                                </div>

                            </div>




                                <div class="product-price">
                                    @if (currencyConverter($products->Price) == currencyConverter($products->Discount_Price))
                                        <span class="price">{{ currencyConverter($products->Discount_Price) }}</span>
                                    @else
                                        <span class="price">{{ currencyConverter($products->Discount_Price) }}</span>
                                        <span class="regular-price">{{ currencyConverter($products->Price) }}</span>
                                    @endif
                                </div>

                                <p class="note-text">{{ langConverter($products->en_About, $products->fr_About) }}
                                </p>

                                <div class="product-color-area">
                                    <div class="variable-single-item color-switch">
                                        <div class="product-variable-color">
                                            @foreach ($products->colors as $color)
                                                <label>
                                                    <input type="hidden" name="colorId" value="{{ $color->id }}">
                                                    <input name="productColor" class="color-select" type="radio"
                                                        value="{{ $color->id }}">
                                                    <span style="background:{{ $color->ColorCode }};"></span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="product-size-area">
                                    <h4 class="size-title">{{ __('Type:') }} {{ productTypeText($products->id) }}
                                    </h4>
                                    <ul class="size-switch">
                                        @foreach ($products->sizes as $item)
                                            <input type="hidden" class="sizeValue" name="productSize"
                                                value="{{ $item->id }}">
                                            <li class="single-size activeSize" data-size="{{ $item->id }}">
                                                {{ $item->Size }}</li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="prdouct-btn-wrapper d-flex align-items-center">
                                    <div class="cart-plus-minus">
                                        <div class="dec qtybutton btn">-</div>
                                        <input class="cart-plus-minus-box" type="text" name="qtybutton"
                                            id="product_quantity" value="1" readonly />
                                        <div class="inc qtybutton btn">{{ __('+') }}</div>
                                    </div>
                                    <a class="product-btn MyWishList" data-id="{{ $products->id }}"
                                        title="{{ __('Add To Wishlist') }}"><i class="icon flaticon-like"></i></a>
                                    <a class="product-btn CompareList" data-id="{{ $products->id }}"
                                        title="{{ __('Add To Compare') }}"><i class="icon flaticon-bar-chart"></i></a>
                                </div>
                                <div class="product-bottom-button d-flex gap-3">
                                    <a href="javascript:void(0)" class="primary-btn buyNow"
                                        data-id="{{ $products->id }}">{{ __('Buy Now') }}</a>
                                    <a href="javascript:void(0)" title="{{ __('Add To Cart') }}"
                                        class="add-cart addCart" data-id="{{ $products->id }}">{{ __('Add To Cart') }}
                                        <i class="icon fas fa-plus-circle"></i></a>
                                </div>
                            </div>
                            <div class="product-right-bottom">
                                <ul class="features">
                                    <li class="single-feature"><img class="icon"
                                            src="{{ asset('frontend/assets/images/delivery-van-icon.svg') }}"
                                            alt="icon" /><strong
                                            class="feature-title">{{ __('Estimated Delivery:') }}</strong><span
                                            class="feature-text">{{ allsetting()['estimating_delivery'] }}</span></li>
                                    <li class="single-feature"><img class="icon"
                                            src="{{ asset('frontend/assets/images/shipping-return.svg') }}"
                                            alt="icon" /><strong
                                            class="feature-title">{{ __('Shipping Charge:') }}</strong><span
                                            class="feature-text">{{ __('On all orders over') }}
                                            {{ currencyConverter(allsetting()['shipping_charge']) }}</span>
                                    </li>
                                </ul>


                                <div class="share-area mt-30">
                                    <h3 class="share-title">{{ __('SHARE:') }}</h3>
                                    <ul class="social-media a2a_kit">
                                        <li class="media-item"><a class="media-link facebook a2a_button_facebook"
                                                href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a></li>
                                        <li class="media-item"><a class="media-link twitter a2a_button_twitter"
                                                href="javascript:void(0)"><i class="fab fa-twitter"></i></a></li>
                                        <li class="media-item"><a class="media-link linkedin a2a_button_linkedin"
                                                href="javascript:void(0)"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li class="media-item"><a class="media-link pinterest a2a_button_pinterest"
                                                href="javascript:void(0)"><i class="fab fa-pinterest-p"></i></a></li>
                                    </ul>
                                    <script async src="https://static.addtoany.com/menu/page.js"></script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-bottom-info mt-50">
                <div class="nav-tabs-menu">
                    <ul class="nav nav-tabs" id="ProductTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="Description-tab" data-bs-toggle="tab"
                                data-bs-target="#Description" type="button" role="tab" aria-controls="Description"
                                aria-selected="true">
                                {{ __('Description') }}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="Reviews-tab" data-bs-toggle="tab" data-bs-target="#Reviews"
                                type="button" role="tab" aria-controls="Reviews" aria-selected="false">
                                {{ __('Reviews') }}</button>
                        </li>
                    </ul>
                </div>

                <div class="tab-content" id="ProductTabContent">

                    <div class="tab-pane fade show active" id="Description" role="tabpanel"
                        aria-labelledby="Description-tab">
                        <div class="product-description">
                            {!! langConverter($products->en_Description, $products->fr_Description) !!}
                        </div>
                    </div>

                    <div class="tab-pane fade" id="Reviews" role="tabpanel" aria-labelledby="Reviews-tab">
                        <div class="product-reviews">
                            <div class="review-top">
                                <div class="review-top-left">
                                    <span class="review-point">{{ productReviewNumber($products->id) }}</span>
                                    <!-- This is server side code. User can not modify it. -->
                                    {!! productReview($products->id) !!}
                                    <span class="review-count">{{ productReviewerNumber($products->id) }}
                                        {{ __('Reviews') }}</span>
                                </div>
                            </div>

                            <div class="reviews-list">
                                @forelse($products->product_reviews as $review)
                                    <div class="single-review">

                                        <div class="reviewer mt-3">
                                            <div class="reviewer-wrap">
                                                <img class="reviewer-image"
                                                    src="{{ isset($review->user->image) ? asset(AdminProfilePicture() . $review->user->image) : Avatar::create($review->user->name)->toBase64() }}"
                                                    alt="reviewer-image" />
                                                <h4 class="reviewer-name">{{ $review->user->name }}</h4>
                                            </div>
                                        </div>

                                        <div class="review-middle">

                                            <!-- This is server side code. User can not modify it. -->
                                            {!! reviewRating($review->id) !!}


                                            <span
                                                class="remiew-time">{{ \Carbon\Carbon::parse($review->created_at)->diffForHumans() }}</span>
                                        </div>

                                        <p class="review-text">{{ $review->feedback }}</p>


                                        <img class="review-image mt-3 mb-3" src="{{ asset(ReviewImage() . $review->reviewimg) }}" alt="review-image" style="width: 130px; height: 130px;" />



                                    </div>
                                @empty
                                    <h1>{{ __('No Review Yet!') }}</h1>
                                @endforelse

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Shipping-Return" role="tabpanel"
                        aria-labelledby="Shipping-Return-tab">
                        <div class="shipping-return-area">
                            {!! langConverter($products->en_ShippingReturn, $products->fr_ShippingReturn) !!}
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Additional-Information" role="tabpanel"
                        aria-labelledby="Additional-Information-tab">
                        {!! langConverter($products->en_AdditionalInformation, $products->fr_AdditionalInformation) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product-single-area end here  -->

    <!-- Featured Products area start here  -->
    <div class="featured-productss-area section-top">
        <div class="container">
            <div class="section-header-area">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="sub-title">{{ __('Similar Products') }}</h3>
                        <h2 class="section-title">{{ __('Related Products') }}</h2>
                    </div>
                    <div class="col-md-6 align-self-end text-md-end">
                        <a href="{{ route('all.product') }}" class="see-btn">{{ __('See All') }}</a>
                    </div>
                </div>
            </div>


















        <div class="row">
            @forelse ($similar_product as $product)


            @php
            $totalOrders = \App\Models\Admin\OrderDetails::where('product_id', $product->id)->count();
            $isOutOfStock = $totalOrders >= $product->Stock;
        @endphp

        @if(!$isOutOfStock)



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
                            <h3 class="product-name"><a class="product-link"
                                    href="{{ route('single.product', $product->en_Product_Slug) }}">{{ langConverter($product->en_Product_Name, $product->fr_Product_Name) }}</a>
                            </h3>
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

                <div class="col-lg-2 col-md-4 col-sm-6 product-item">
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

                @empty
                <h1>{{ __('No related product found!') }}</h1>
            @endforelse


    </div>














    </div>
@endsection
