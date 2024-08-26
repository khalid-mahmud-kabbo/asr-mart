@extends('front.layouts.master')
@section('title', isset($title) ? $title : 'Home')
@section('description', isset($description) ? $description : '')
@section('keywords', isset($keywords) ? $keywords : '')

@section('content')

        @include('front.home.home')
@endsection



@if($allsettings['popup_status'] == 1)

@section('subscribe_pop_up_modal')
    @if (!session()->has('dontshoW'))
        <!-- Page Load Popup Modal End -->
        <div class="modal fade bd-example-modal-lg theme-modal" id="popUpModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body modal1 modal-bg">
                        <div class="row">
                            <div class="col-12">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>

                                    <a href="{{ $allsettings['popup_link']}}">
                                    <img src="{{ asset(IMG_ADVERTISE_PATH . $allsettings['popup_image']) }}"
                                        alt="img">
                                    </a>
                                        <form id="subscribe_form" name="subscribe_form" style="padding: 1rem; background: #000; color: #fff;">
                                            @csrf

                                            <div class="check_boxed_modal">
                                                <input type="checkbox" id="doNotShowModel" name="dontshowmodal"
                                                    value="dont_show">
                                                <label for="vehicle1">{{ __("Don't show this popup again") }}</label>
                                            </div>
                                        </form>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- Page Load Popup Modal End -->
    <div id="DoNotSubscribe" data-url="{{ route('do.not.subscribe') }}"></div>
    <div id="SubscribeStore" data-url="{{ route('admin.subscribe.store') }}"></div>
    @push('post_script')
        <script src="{{ asset('frontend/assets/js/pages/home.js') }}"></script>
    @endpush()
@endsection

@endif
