@extends('front.layouts.master')
@section('title', isset($title) ? $title : 'Home')
@section('description', isset($description) ? $description : '')
@section('keywords', isset($keywords) ? $keywords : '')
@section('content')

    <!-- Thankyou Page area start here  -->
    <section class="thankyou-page-area section-top pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-6">
                    <div class="thankyou-content text-center">
                        <img src="{{asset('frontend/assets/images/thankyou-img.png')}}" alt="img">
                        <p class="mt-5 text-black">{{__('ধন্যবাদ আপনার অর্ডারটি গ্রহন করা হয়েছে। অল্প সময়ের মধ্যে আমাদের প্রতিনিধি আপনাকে কল করবে।')}}</p>
                        <a href="{{route('all.product')}}" class="primary-btn">{{__('View our products again')}}</a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Thankyou Page area end here  -->
@endsection

