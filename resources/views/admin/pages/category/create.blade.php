@extends('admin.master', ['menu' => 'catbad', 'submenu' => 'category'])
@section('title', isset($title) ? $title : '')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>{{__('Add Category')}}</h2>
                    </div>
                </div>
                <div class="breadcrumb__content__right">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Home')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{__('Category')}}</li>
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
                                        <form enctype="multipart/form-data" method="POST" action="{{route('admin.category.store')}}">
                                            @csrf
                                            <div class="input__group mb-25">
                                                <label>{{ __('Category Name '.langString('en'))}}</label>
                                                <input type="text" id="en_category_name" name="en_category_name" value="{{ old('en_category_name') }}" placeholder="Name (English)">
                                            </div>
                                            <div class="input__group mb-25">
                                                <label>{{ __('Category Name '.langString('bn'))}}</label>
                                                <input type="text" id="fr_category_name" name="fr_category_name"  value="{{ old('fr_category_name') }}" placeholder="Name (Bangla)">
                                            </div>
                                            <div class="input__group mb-25">
                                                <label>{{ __('Category Image')}}</label>
                                                <input type="file" id="categoryImage" name="categoryImage" value="{{ old('categoryImage') }}">
                                            </div>

                                            <div class="input__button">
                                                <button type="submit" class="btn btn-blue">{{ __('Add')}}</button>
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

