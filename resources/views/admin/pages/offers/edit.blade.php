@extends('admin.master', ['menu' => 'products', 'submenu' => 'update'])
@section('title', isset($title) ? $title : '')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>{{ __('Edit Product Offer Section') }}</h2>
                    </div>
                </div>
                <div class="breadcrumb__content__right">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Home') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Product Section') }}</li>
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
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-vertical__item bg-style">
                                        <form enctype="multipart/form-data" method="POST"
                                            action="{{ route('admin.offers.update') }}">
                                            @csrf

                                            <input type="hidden" name="id" value="{{ $edit->id }}">
                                            <div class="input__group mb-25">
                                                <label for="size">{{ __('Section Title') }}</label>
                                                <input type="text" id="title" name="title" value="{{ $edit->title }}"
                                                    placeholder="{{ __('Section Title') }}">
                                            </div>
@if($edit->id == 1)

<div class="input__group mb-25">
    <label for="size">{{ __('Offer Banner (Optional)') }}</label>
    <input type="file" id="offerbanner" name="offerbanner">
    <div class="mt-4">
    @if(isset($edit->offerbanner))
        <img src="{{ asset(offerImageBanner() . ImageOfferNew()->offerbanner) }}" alt="banner" style="max-width: 30%; height: 100px;">
    @else
        <p>No banner uploaded</p>
    @endif
</div>
</div>
                                            <div class="input__group mb-25">
                                                <label for="size">{{ __('End Date') }}</label>
                                                <input type="date" id="enddate" name="enddate" value="{{ $edit->enddate }}">
                                            </div>
@endif


<div class="input__group mb-25">
    <label for="offerstatus">{{ __('Offer Status') }}</label>
    <select name="offerstatus" id="offerstatus"
        class="form-control">
        <option value="1"
            {{ $edit->offerstatus == '1' ? 'selected' : '' }}>
            {{ __('Show') }}</option>
        <option value="0"
            {{ $edit->offerstatus == '0' ? 'selected' : '' }}>
            {{ __('Hide') }}</option>
    </select>
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
            </div>
        </div>
    </div>
@endsection
