<div class="brands-wrapper new-arrivals mt-5">
    <div class="arrivals">
        <div class="row g-0">
            @php
            $latestOffer = $offers->where('offerstatus', 1)->sortByDesc('created_at')->first();
            @endphp

            @if($latestOffer)



            <div class="col-md-3 deal-of-the-day-wrapper">
                <div class="deal-of-the-day p-4" style="width: 80%; height: 100%;">
                    <h3 class="text-center text-black">{{ $latestOffer->title }}</h3>

                    <div class="deal-container bg-white rounded mt-4">
                        <div class="product-card p-3 text-center">



                            @foreach ($products->where('ItemTag', 2)->sortByDesc('created_at') as $item)


                            <a href="{{ route('single.product', $item->en_Product_Slug) }}" title="{{ __('Buy Now') }}">
                                <img src="{{ asset(ProductImage() . $item->Primary_Image) }}" alt="{{ __('product') }}" style="height: 210px; border: 1px solid #ddd; border-radius: .5rem;">
                                <h3 class="product-name new-arrival-product text-center" style="margin-top: 9px; margin-bottom: 16px;">
                                    <a class="product-link" href="{{ route('single.product', $item->en_Product_Slug) }}">{{ langConverter($item->en_Product_Name, $item->fr_Product_Name) }}</a>
                                </h3>
                                <h4 class="text-black price" style="font-size: large;">{{ currencyConverter($item->Discount_Price) }}</h4>
                                <a style="margin-top: 20px !important;" href="{{ route('single.product', $item->en_Product_Slug) }}" title="{{ __('Buy Now') }}" class="add-cart addCart buynow rounded mt-3" data-id="{{ $item->id }}">{{ __('Buy Now') }}</a>
                            </a>
                            @endforeach





                        </div>
                    </div>
                </div>
            </div>



            @endif

<div class="col-md-9">


    <h2 class="text-black" style="margin-left: 2rem;">New Arrivals</h2>

            <div class="d-flex gap-5 flex-wrap mt-4 justify-content-end">





                @php
                $newArrivalProducts = $new_arrivals
            @endphp



@foreach ($newArrivalProducts as $item)

@php
$totalOrders = \App\Models\Admin\OrderDetails::where('product_id', $item->id)->count();
$isOutOfStock = $totalOrders >= $item->Stock;
@endphp

@if(!$isOutOfStock)

        <a href="{{ route('single.product', $item->en_Product_Slug) }}" class="card" style="width: 30rem; border-radius: .5rem; height:105px !important; overflow:hidden !important;">
            <div class="card-wrapper d-flex gap-2 m-auto">
                <div class="p-image p-3">
                    <img class="card-img-top" style="height: 100%; overflow:hidden; border-radius: 1rem;" src="{{ asset(ProductImage() . $item->Primary_Image) }}" alt="{{ __('product') }}">
                </div>
                <div class="card-body">
                    <h3 class="card-title text-black">{{ langConverter($item->en_Product_Name, $item->fr_Product_Name) }}</h3>
                    <div class="product-price mt-3">
                        <h4 class="price text-black">{{ currencyConverter($item->Discount_Price) }}</h4>
                    </div>
                </div>
            </div>
        </a>

    @else
        <!-- Out of Stock Product -->
        <div class="card out-of-stock-card" style="width: 30rem; border-radius: .5rem; height:105px !important; overflow:hidden !important; position: relative;">
            <!-- Stock Out Overlay -->
            <div class="stock-out-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.6); color: white; display: flex; align-items: center; justify-content: center; font-size: 2rem; border-radius: .5rem;">
                {{ __('Stock Out') }}
            </div>

            <div class="card-wrapper d-flex gap-2 m-auto">
                <div class="p-image p-3">
                    <img class="card-img-top" style="height: 100%; overflow:hidden; border-radius: 1rem;" src="{{ asset(ProductImage() . $item->Primary_Image) }}" alt="{{ __('product') }}">
                </div>
                <div class="card-body">
                    <h3 class="card-title text-black">{{ langConverter($item->en_Product_Name, $item->fr_Product_Name) }}</h3>
                    <div class="product-price mt-3">
                        <h4 class="price text-black">{{ currencyConverter($item->Discount_Price) }}</h4>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endforeach

            </div>







<div class="best-selling bg-white rounded mt-5">
            <h2 class="text-black mt-3" style="margin-left: 2rem;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#FFD43B" d="M400 0L176 0c-26.5 0-48.1 21.8-47.1 48.2c.2 5.3 .4 10.6 .7 15.8L24 64C10.7 64 0 74.7 0 88c0 92.6 33.5 157 78.5 200.7c44.3 43.1 98.3 64.8 138.1 75.8c23.4 6.5 39.4 26 39.4 45.6c0 20.9-17 37.9-37.9 37.9L192 448c-17.7 0-32 14.3-32 32s14.3 32 32 32l192 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-26.1 0C337 448 320 431 320 410.1c0-19.6 15.9-39.2 39.4-45.6c39.9-11 93.9-32.7 138.2-75.8C542.5 245 576 180.6 576 88c0-13.3-10.7-24-24-24L446.4 64c.3-5.2 .5-10.4 .7-15.8C448.1 21.8 426.5 0 400 0zM48.9 112l84.4 0c9.1 90.1 29.2 150.3 51.9 190.6c-24.9-11-50.8-26.5-73.2-48.3c-32-31.1-58-76-63-142.3zM464.1 254.3c-22.4 21.8-48.3 37.3-73.2 48.3c22.7-40.3 42.8-100.5 51.9-190.6l84.4 0c-5.1 66.3-31.1 111.2-63 142.3z"/></svg> Best Selling</h2>
            <div class="d-flex gap-5 flex-wrap mt-4 justify-content-end">

                @php
    $BestSellingProducts = $best_sellings
@endphp

                @foreach ($BestSellingProducts as $item)


                @php
                $totalOrders = \App\Models\Admin\OrderDetails::where('product_id', $item->id)->count();
                $isOutOfStock = $totalOrders >= $item->Stock;
            @endphp

            @if(!$isOutOfStock)

                <a href="{{ route('single.product', $item->en_Product_Slug) }}" class="card" style="width: 30rem; border-radius: .5rem; height:105px !important; overflow:hidden !important;">
                    <div class="card-wrapper d-flex gap-2 m-auto">
                    <div class="p-image p-3">
                    <img class="card-img-top" style="height: 100%; overflow:hidden; border-radius: 1rem;" src="{{ asset(ProductImage() . $item->Primary_Image) }}" alt="{{ __('product') }}">
                </div>
                    <div class="card-body">
                      <h3 class="card-title text-black">{{ langConverter($item->en_Product_Name, $item->fr_Product_Name) }}</h3>
                      {{-- <div class="d-flex gap-2">
                        {!! productReview($item->id) !!}
                        </div> --}}

                        <div class="d-flex gap-2">
                            {!! productReview($item->id) !!}
                            <div>{{_('(')}} {{ productReviewerNumber($item->id) }} {{_(')')}}</div>
                        </div>

                      <div class="product-price mt-3">
                        <h4 class="price text-black">{{ currencyConverter($item->Discount_Price) }}</h4>
                    </div>
                    </div>
                </div>
                </a>

                @else

                <div class="card out-of-stock-card" style="width: 30rem; border-radius: .5rem; height:105px !important; overflow:hidden !important; position: relative;">
                    <!-- Stock Out Overlay -->
                    <div class="stock-out-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.6); color: white; display: flex; align-items: center; justify-content: center; font-size: 2rem; border-radius: .5rem;">
                        {{ __('Stock Out') }}
                    </div>

                    <div class="card-wrapper d-flex gap-2 m-auto">
                        <div class="p-image p-3">
                            <img class="card-img-top" style="height: 100%; overflow:hidden; border-radius: 1rem;" src="{{ asset(ProductImage() . $item->Primary_Image) }}" alt="{{ __('product') }}">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title text-black">{{ langConverter($item->en_Product_Name, $item->fr_Product_Name) }}</h3>
                            <div class="product-price mt-3">
                                <h4 class="price text-black">{{ currencyConverter($item->Discount_Price) }}</h4>
                            </div>
                        </div>
                    </div>
                </div>

                @endif




                @endforeach

            </div>
        </div>

</div>




        </div>
    </div>
</div>
