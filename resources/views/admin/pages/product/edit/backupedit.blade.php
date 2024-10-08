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
                    <option value="{{ $it->name }}"
                        {{ $it->name == $product->ItemTag ? 'selected' : '' }}>
                        {{ $it->name }}</option>
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
        <div class="input__group mb-25 col-md-6 col-lg-4 col-xl-3">
            <label for="select2Multiple">{{ __('Product Color') }}</label>
            <select class="select2-multiple form-control tag_two" name="color[]"
                multiple="multiple">
                @foreach ($colors as $item)
                    <option value="{{ $item->id }}"
                        {{ colorSelected($product->id, $item->id) == 1 ? 'selected' : '' }}>
                        {{ $item->Name }}</option>
                @endforeach
            </select>
        </div>

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
            <label for="exampleInputEmail1">{{ __('Quantity') }}</label>
            <input type="text" class="form-control" id="qty" name="qty"
                value="{{ $product->Quantity }}">
        </div>
        <div class="input__group mb-25 col-md-6 col-lg-4 col-xl-3">
            <label for="exampleInputEmail1">{{ __('Price') }}</label>
            <input type="text" class="form-control" id="price" name="price"
                value="{{ $product->Price }}">
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
                value="{{ $product->Discount }}">
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
        <div class="input__group mb-25">
            <label for="exampleInputEmail1">{{ __('Primary Image') }}</label>
            <input type="file" class="form-control putImage1" name="primary_image"
                id="primary_image">
            <img class="admin_image"
                src="{{ asset(ProductImage() . $product->Primary_Image) }}"
                id="target1" />
        </div>
        <div class="input__group mb-25">
            <label for="exampleInputEmail1">{{ __('Image 2') }}</label>
            <input type="file" class="form-control putImage2" name="image_two"
                id="image_two">
            <img class="admin_image"
                src="{{ asset(ProductImage() . $product->Image2) }}"
                id="target2" />
        </div>
        <div class="input__group mb-25">
            <label for="exampleInputEmail1">{{ __('Image Gallery Image') }}</label>
            <input type="file" class="form-control putImage3" name="image_three"
                id="image_three">
            <img class="admin_image"
                src="{{ asset(ProductImage() . $product->Image3) }}"
                id="target3" />
        </div>
        <div class="input__group mb-25">
            <label for="exampleInputEmail1">{{ __('Image 3') }}</label>
            <input type="file" class="form-control putImage4" name="image_four"
                id="image_four">
            <img class="admin_image"
                src="{{ asset(ProductImage() . $product->Image4) }}"
                id="target4" />
        </div>
        <div class="input__group mb-25">
            <label for="exampleInputEmail1">{{ __('Image 4') }}</label>
            <input type="file" class="form-control putImage5" name="image_five"
                id="image_five">
            <img class="admin_image"
                src="{{ asset(ProductImage() . $product->Image5) }}"
                id="target5" />
        </div>
        </div>


        <div class="row form-vertical__item bg-style">
            <div class="header-title mb-4"><h5>Section setup</h5></div>
        <div class="input__group mb-25 col-md-6 col-lg-4 col-xl-3">
            <div class="custom-control custom-switch">
                <input type="checkbox" value="1"
                    {{ $product->Status == 1 ? 'checked' : '' }} name="status"
                    class="custom-control-input" id="customSwitch1">
                <label class="custom-control-label"
                    for="customSwitch1">{{ __('Status') }}</label>
            </div>
        </div>
        <div class="input__group mb-25 col-md-6 col-lg-4 col-xl-3">
            <div class="custom-control custom-switch">
                <input type="checkbox" value="1"
                    {{ $product->Featured_Product == 1 ? 'checked' : '' }}
                    name="feature" class="custom-control-input" id="customSwitch2">
                <label class="custom-control-label"
                    for="customSwitch2">{{ __('Featured Product') }}</label>
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
        <div class="input__group mb-25">
            <div class="custom-control custom-switch">
                <input type="checkbox" value="1"
                    {{ $product->On_Sale == 1 ? 'checked' : '' }} name="on_sale"
                    class="custom-control-input" id="customSwitch4">
                <label class="custom-control-label"
                    for="customSwitch4">{{ __('On Sale') }}</label>
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
        <div class="input__button">
            <button type="submit" class="btn btn-blue">{{ __('Update') }}</button>
        </div>
    </div>
</div>
