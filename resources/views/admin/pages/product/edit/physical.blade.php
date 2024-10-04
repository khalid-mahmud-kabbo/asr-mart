@extends('admin.master', ['menu' => 'products', 'submenu' => 'product'])
@section('title', isset($title) ? $title : '')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>{{ __('Edit Product') }}</h2>
                    </div>
                </div>
                <div class="breadcrumb__content__right">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Home') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Product') }}</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="gallery__area bg-style">
                <div class="gallery__content">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">
                            <form enctype="multipart/form-data" method="POST" action="{{ route('admin.product.update') }}">
                                @csrf


                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">English</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Bangla</button>
                                </div>


                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">



                                        <div class="col-md-12">
                                            <div>
                                                <div class="item-top mb-30">
                                                    <h2>{{ langString('en', false) . ':' }}</h2>
                                                </div>
                                                <input type="hidden" name="product_type" value="{{ PRODUCT_PHYSICAL }}">
                                                <input type="hidden" name="id" value="{{ $product->id }}">




                                                <div class="input__group mb-25">
                                                    <label for="exampleInputEmail1">{{ __('Product Name') }}</label>
                                                    <input type="text" class="form-control" id="en_product_name"
                                                        name="en_product_name" value="{{ $product->en_Product_Name }}"
                                                        placeholder="{{ __('Name') }}">
                                                </div>
                                                <div class="input__group mb-25">
                                                    <label for="exampleInputEmail1">{{ __('About') }}</label>
                                                    <textarea name="en_about" id="en_about" class="form-control">{!! $product->en_About !!}</textarea>
                                                </div>

                                                <div class="input__group mb-25">
                                                    <label for="exampleInputEmail1">{{ __('Description') }}</label>
                                                    <textarea name="en_description" id="summernote" class="form-control">{!! $product->en_Description !!}</textarea>
                                                </div>







                                                <div class="row form-vertical__item bg-style">
                                                    <div class="header-title mb-4"><h5>General setup</h5></div>

                                                <div class="input__group mb-25 col-md-6 col-lg-4 col-xl-3">
                                                    <label for="exampleInputEmail1">{{ __('Brand Name') }}</label>
                                                    <select class="form-control" id="en_brand_name" name="en_brand_name">
                                                        <option value="">{{ __('---SELECT A BRAND---') }}</option>
                                                        @foreach (Brnad() as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ $item->id == $product->Brand_Id ? 'selected' : '' }}>
                                                                {{ $item->en_BrandName }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>


                                                <div class="input__group mb-25 col-md-6 col-lg-4 col-xl-3">
                                                    <label for="exampleInputEmail1">{{ __('Category Name') }}</label>
                                                    <select class="form-control" id="en_category_name" name="en_category_name">
                                                        <option value="">{{ __('---SELECT A CATEGORY---') }}</option>
                                                        @foreach (Category() as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ $item->id == $product->Category_Id ? 'selected' : '' }}>
                                                                {{ $item->en_Category_Name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="input__group mb-25 col-md-6 col-lg-4 col-xl-3">
                                                    <label for="exampleInputEmail1">{{ __('Offer Section') }}</label>
                                                    <select class="form-control" id="item_teg" name="item_teg">
                                                        <option>{{ __('---Select item---') }}</option>
                                                        @foreach ($offers as $it)
                                                            <option value="{{ $it->id }}"
                                                                {{ $it->title == $product->ItemTag ? 'selected' : '' }}>
                                                                {{ $it->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="input__group mb-25 col-md-6 col-lg-4 col-xl-3 d-none">
                                                    <label for="select2Multiple">{{ __('Product Tag') }}</label>
                                                    <select class="select2-multiple form-control tag_two" name="product_tag[]"
                                                        multiple="multiple">
                                                        <option value="">{{ __('---SELECT A PRODUCT TAG---') }}</option>
                                                        @foreach ($offers as $tag)
                                                            <option value="{{ $tag->title }}"
                                                                {{ selectProductTag($tag->title, $product->id) }}>
                                                                {{ $tag->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>



                                                <style>
                                                    .color-box {
                                                        display: inline-block;
                                                        width: 20px;
                                                        height: 20px;
                                                        margin-right: 8px;
                                                        border: 1px solid #ddd;
                                                        border-radius: 3px;
                                                    }

                                                </style>






                                                <div class="input__group mb-25 col-md-6 col-lg-4 col-xl-3">
                                                    <label for="select2Multiple">{{ __('Product Color') }}</label>
                                                    <select class="select2-multiple form-control tag_two" name="color[]"
                                                        multiple="multiple">
                                                        @foreach ($colors as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ colorSelected($product->id, $item->id) == 1 ? 'selected' : '' }} data-color="{{ $item->ColorCode }}">
                                                                {{ $item->Name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>



                                                <script>
                                                    $(document).ready(function() {
                                                        function formatState(state) {
                                                            if (!state.id) {
                                                                return state.text;
                                                            }
                                                            var color = $(state.element).data('color');
                                                            var $state = $(
                                                                '<span class="color-box" style="background-color: ' + color + ';"></span> ' + state.text
                                                            );
                                                            return $state;
                                                        }

                                                        $('.select2-multiple').select2({
                                                            templateResult: formatState,
                                                            templateSelection: formatState
                                                        });
                                                    });
                                                    </script>








                                                <div class="input__group mb-25 col-md-6 col-lg-4 col-xl-3">
                                                    <label for="select2Multiple">{{ __('Product Size') }}</label>
                                                    <select class="select2-multiple form-control tag_one" name="size[]"
                                                        multiple="multiple">
                                                        @foreach ($sizes as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ sizeSelected($product->id, $item->id) == 1 ? 'selected' : '' }}>
                                                                {{ $item->Size }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>



                                                <div class="input__group mb-25 col-md-6 col-lg-4 col-xl-3">
                                                    <label for="exampleInputEmail1">{{ __('Stock') }}</label>
                                                    <input type="text" class="form-control" id="stock" name="stock"
                                                        value="{{ $product->Stock }}">
                                                </div>

                                                <div class="input__group mb-25 col-md-6 col-lg-4 col-xl-3">
                                                    <label for="purchesprice">{{ __('Purchase Price') }}</label>
                                                    <input type="text" class="form-control" id="purchesprice"
                                                        name="purchesprice" value="{{ $product->Purchesprice}}" >

                                                </div>


                                                <div class="input__group mb-25 col-md-6 col-lg-4 col-xl-3">
                                                    <label for="exampleInputEmail1">{{ __('Price') }}</label>
                                                    <input type="text" class="form-control" id="price" name="price"
                                                        value="{{ $product->Price }}">
                                                </div>





                                                <div class="input__group mb-25 col-md-6 col-lg-4 col-xl-3">
                                                    <label for="unit">{{ __('Unit') }}</label>

                                                    <select class="js-example-basic-multiple form-control" name="unit">
                                                        <option value="kg">
                        kg</option>
                                                        <option value="pc">
                        pc</option>
                                                        <option value="gms">
                        gms</option>
                                                        <option value="ltrs">
                        ltrs</option>
                                                        <option value="pair">
                        pair</option>
                                                        <option value="oz">
                        oz</option>
                                                        <option value="lb">
                        lb</option>
                                                </select>
                                                    @error('price')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>







                                                <div class="input__group mb-25 col-md-6 col-lg-4 col-xl-3">
                                                    <label
                                                        for="exampleInputEmail1">{{ __('Discount (in Percentage)') }}</label>
                                                    <input type="text" class="form-control" id="discount" name="discount"
                                                        value="{{ $product->Discount }}">
                                                </div>
                                                <div class="input__group mb-25 col-md-6 col-lg-4 col-xl-3">
                                                    <label
                                                        for="exampleInputEmail1">{{ __('Discount (in Amount)') }}</label>
                                                    <input type="text" class="form-control" id="discountpp" name="discountpp"
                                                        value="{{ $product->discountpp }}">
                                                </div>
                                                <div class="input__group mb-25 col-md-6 col-lg-4 col-xl-3">
                                                    <label for="exampleInputEmail1">{{ __('Discount Price') }}</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $product->Discount_Price }}" id="discount_price"
                                                        name="discount_price" readonly>
                                                </div>


                                            </div>



                                            <div class="row form-vertical__item bg-style">
                                                <div class="header-title mb-4"><h5>Image setup</h5></div>
                                                <div class="input__group mb-25 col-md-6 col-lg-4 col-xl-3">
                                                    <label for="exampleInputEmail1">{{ __('Primary Image') }}</label>
                                                    <input type="file" class="form-control putImage1" name="primary_image"
                                                        id="primary_image" value="{{ ProductImage() . $product->Primary_Image }}">
                                                    <img class="admin_image"
                                                        src="{{ asset(ProductImage() . $product->Primary_Image) }}"
                                                        id="target1" />
                                                </div>
                                                <div class="input__group mb-25 col-md-6 col-lg-4 col-xl-3">
                                                    <label for="exampleInputEmail1">{{ __('Image 2') }}</label>
                                                    <input type="file" class="form-control putImage2" name="image_two"
                                                        id="image_two" value="{{ ProductImage() . $product->Image2 }}">
                                                    <img class="admin_image"
                                                        src="{{ asset(ProductImage() . $product->Image2) }}"
                                                        id="target2" />
                                                </div>
                                                <div class="input__group mb-25 col-md-6 col-lg-4 col-xl-3">
                                                    <label for="exampleInputEmail1">{{ __('Image3') }}</label>
                                                    <input type="file" class="form-control putImage3" name="image_three"
                                                        id="image_three" value="{{ ProductImage() . $product->Image3 }}">
                                                    <img class="admin_image"
                                                        src="{{ asset(ProductImage() . $product->Image3) }}"
                                                        id="target3" />
                                                </div>
                                                <div class="input__group mb-25 col-md-6 col-lg-4 col-xl-3">
                                                    <label for="exampleInputEmail1">{{ __('Image 4') }}</label>
                                                    <input type="file" class="form-control putImage4" name="image_four"
                                                        id="image_four" value="{{ ProductImage() . $product->Image4 }}">
                                                    <img class="admin_image"
                                                        src="{{ asset(ProductImage() . $product->Image4) }}"
                                                        id="target4" />
                                                </div>
                                                <div class="input__group mb-25 col-md-6 col-lg-4 col-xl-3">
                                                    <label for="exampleInputEmail1">{{ __('Image 5') }}</label>
                                                    <input type="file" class="form-control putImage5" name="image_five"
                                                        id="image_five" value="{{ ProductImage() . $product->Image5 }}">
                                                    <img class="admin_image"
                                                        src="{{ asset(ProductImage() . $product->Image5) }}"
                                                        id="target5" />
                                                </div>
                                                </div>


                                                <div class="row form-vertical__item bg-style">
                                                    <div class="header-title mb-4"><h5>Product Showing Section</h5></div>
                                                <div class="input__group mb-25 col-md-6 col-lg-4 col-xl-3">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" value="1"
                                                            {{ $product->Status == 1 ? 'checked' : '' }} name="status"
                                                            class="custom-control-input" id="customSwitch1">
                                                        <label class="custom-control-label"
                                                            for="customSwitch1">{{ __('Activate Product') }}</label>
                                                    </div>
                                                </div>
                                                <div class="input__group mb-25 col-md-6 col-lg-4 col-xl-3">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" value="1"
                                                            {{ $product->Featured_Product == 1 ? 'checked' : '' }}
                                                            name="feature" class="custom-control-input" id="customSwitch2">
                                                        <label class="custom-control-label"
                                                            for="customSwitch2">{{ __('Just For You') }}</label>
                                                    </div>
                                                </div>
                                                <div class="input__group mb-25 col-md-6 col-lg-4 col-xl-3">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" value="1"
                                                            {{ $product->Best_Selling == 1 ? 'checked' : '' }}
                                                            name="best_sale" class="custom-control-input" id="customSwitch3">
                                                        <label class="custom-control-label"
                                                            for="customSwitch3 col-md-6 col-lg-4 col-xl-3">{{ __('Best Selling') }}</label>
                                                    </div>
                                                </div>

                                                <div class="input__group mb-25 col-md-6 col-lg-4 col-xl-3">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" value="1"
                                                            {{ $product->New_Arrival == 1 ? 'checked' : '' }}
                                                            name="on_arrival" class="custom-control-input"
                                                            id="customSwitch5">
                                                        <label class="custom-control-label"
                                                            for="customSwitch5">{{ __('New Arrival') }}</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        </div>
                                        </div>












                                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                            <div class="row form-vertical__item bg-style">
                                                <div class="col-md-12">
                                                    <div>
                                            <div class="item-top mb-30">
                                                <h2>{{ langString('bn', false) . ':' }}</h2>
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Product Name') }}</label>
                                                <input type="text" class="form-control" id="fr_product_name"
                                                    value="{{ $product->fr_Product_Name }}" name="fr_product_name">
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('About') }}</label>
                                                <textarea name="fr_about" id="fr_about" class="form-control">{!! $product->fr_About !!}</textarea>
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Description') }}</label>
                                                <textarea name="fr_description" id="summernote4" class="form-control">{!! $product->fr_Description !!}</textarea>
                                            </div>
                                            <div class="input__group mb-25 d-none">
                                                <label for="exampleInputEmail1">{{ __('ShippingReturn') }}</label>
                                                <textarea name="fr_shippingreturn" id="summernote5" class="form-control">{!! $product->fr_ShippingReturn !!}</textarea>
                                            </div>
                                            <div class="input__group mb-25 d-none">
                                                <label for="exampleInputEmail1">{{ __('AdditionalInformation') }}</label>
                                                <textarea name="fr_additionalinformation" id="summernote6" class="form-control">{!! $product->fr_AdditionalInformation !!}</textarea>
                                            </div>

                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="input__button">
                                    <button type="submit" class="btn btn-blue">{{ __('Update') }}</button>
                                </div>
                            </form>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('post_scripts')
    <script src="{{ asset('backend/js/admin/products/physical-edit.js') }}"></script>
    <script>
        "use strict";
        $(document).ready(function() {
            $("#summernote").summernote({
                placeholder: 'Description',
                height: 300
            });
            $('.dropdown-toggle').dropdown();
        });

        $(document).ready(function() {
            $("#summernote2").summernote({
                placeholder: 'Shipping Return',
                height: 300
            });
            $('.dropdown-toggle').dropdown();
        });
        $(document).ready(function() {
            $("#summernote3").summernote({
                placeholder: 'Additional Information',
                height: 300
            });
            $('.dropdown-toggle').dropdown();
        });
        $(document).ready(function() {
            $("#summernote4").summernote({
                placeholder: 'Description',
                height: 300
            });
            $('.dropdown-toggle').dropdown();
        });

        $(document).ready(function() {
            $("#summernote5").summernote({
                placeholder: 'Shipping Return',
                height: 300
            });
            $('.dropdown-toggle').dropdown();
        });
        $(document).ready(function() {
            $("#summernote6").summernote({
                placeholder: 'Additional Information',
                height: 300
            });
            $('.dropdown-toggle').dropdown();
        });
    </script>
@endpush
