
<div class="container-fluid up-footer mb-3" style="background-color: #66499D;">
    <div class="row justify-content-between p-5">

        <div class="col-md-2 gapper">
            <div class="inner inner-border d-flex gap-4 align-items-center">
            <i class="fa fa-truck"></i>
            <div class="info-cont align-items-center">
                <span>Fast Delivary</span>
                <p>All Over Bangladesh</p>
            </div>
            </div>
        </div>



        <div class="col-md-2 gapper">
            <div class="inner inner-border d-flex gap-4 align-items-center">
                <i class="fa-solid fa-money-bill"></i>
            <div class="info-cont align-items-center">
                <span>Cash on Delivery</span>
                <p>All over Bangladesh</p>
            </div>
            </div>
        </div>



        <div class="col-md-2 gapper">
            <div class="inner inner-border d-flex gap-4 align-items-center">
            <i class="fa fa-gift"></i>
            <div class="info-cont align-items-center">
                <span>Free Gift Box</span>
                <p>& gift note</p>
            </div>
            </div>
        </div>



        <div class="col-md-2 gapper">
            <div class="inner inner-border d-flex gap-4 align-items-center">
                <i class="fa-solid fa-phone"></i>
            <div class="info-cont align-items-center">
                <span>Contact Us</span>
                <p>01898592360</p>
            </div>
            </div>
        </div>



        <div class="col-md-1 gapper">
            <div class="inner d-flex gap-4 align-items-center">
            <i class="fa fa-diamond"></i>
            <div class="info-cont align-items-center">
                <span>Loyalty</span>
                <p>Rewarded</p>
            </div>
            </div>
        </div>


    </div>
    </div>

<footer class="footer bg-black">
    <div class="container pt-5">


    <div class="row g-0 justify-content-center text-white">


        <div class="col-md-3 for-mobile-footer">
            <h3>Company</h3>
            <ul>
                <li><a href="{{ route('about.us') }}">About Us</a></li>
                <li><a href="/products/all">Our Brands</a></li>
                <li><a href="/career">Careers</a></li>
            </ul>


        </div>

        <div class="col-md-3 for-mobile-footer">
            <h3>Help Center</h3>

            <ul>
                <li><a href="{{ route('faq') }}">FAQ</a></li>
                <li><a href="{{ route('contact.us') }}">Support Center</a></li>
                <li><a href="#">Payment Security</a></li>
            </ul>
        </div>

        <div class="col-md-3 for-mobile-footer">
            <h3>Terms & Conditions</h3>

            <ul>
                <li><a href="{{ route('terms.conditions') }}">Terms & Conditions</a></li>
                <li><a href="{{ route('privacy.policy') }}">Privacy Policy</a></li>
                <li><a href="{{ route('refund.policy') }}">Refund Policy</a></li>
                <li><a href="#">Store Locator</a></li>
            </ul>
        </div>

        <div class="col-md-3">

            <div class="single-widget newsletter-widget">
                <h3 class="widget-title">{{ __('Newsletter Sign Up') }}</h3>
                <p class="newsletter-text">
                    Sing Up for get latest news and update
                </p>
                <div class="newsletter-form mb-40">
                    <form id="subscribe_form" name="subscribe_form" method="POST">
                        @csrf
                        <div class="form-group d-flex">
                            <input type="email" class="form-control subscribe" id="subscribe" name="subscribe"
                                placeholder="{{ __('Enter Your Email') }}" required />
                            <button type="button"
                                class="subscribe-btn subscribe_btn">{{ __('Subscribe') }}</button>
                        </div>
                        <div class="for-desktop-contact d-flex gap-4 mt-5">
                            <p class="contact"><i class="fa-solid fa-phone"></i> {{ $allsettings['call_us'] }}</p>
                            <p class="contact"><i class="fa-solid fa-envelope"></i> {{ $allsettings['email'] }}</p>
                        </div>

                        <div class="for-mobile-contact d-none mt-5">
                        <p class="contact"><i class="fa-solid fa-phone"></i> {{ $allsettings['call_us'] }}</p>
                        <p class="contact"><i class="fa-solid fa-envelope"></i> {{ $allsettings['email'] }}</p>
                    </div>


                        <ul class="social-media d-flex gap-3">
                            @if (getSocialLink()->Facebook)
                                <li class="social-media-item">
                                    <a target="_blank" class="social-media-link" href="{{ getSocialLink()->Facebook }}">
                                        <i class="fab fa-facebook-f"></i></a>
                                </li>
                            @endif
                            @if (getSocialLink()->Twitter)
                                <li class="social-media-item">
                                    <a target="_blank" class="social-media-link" href="{{ getSocialLink()->Twitter }}">
                                        <i class="fab fa-twitter"></i></a>
                                </li>
                            @endif
                            @if (getSocialLink()->Linkedin)
                                <li class="social-media-item">
                                    <a target="_blank" class="social-media-link"
                                        href="{{ getSocialLink()->Linkedin }}">
                                        <i class="fab fa-linkedin-in"></i></a>
                                </li>
                            @endif
                            @if (getSocialLink()->Instagram)
                                <li class="social-media-item">
                                    <a target="_blank" class="social-media-link"
                                        href="{{ getSocialLink()->Instagram }}">
                                        <i class="fab fa-instagram"></i></a>
                                </li>
                            @endif
                        </ul>
                    </form>
                </div>
            </div>
        </div>

    </div>


    <div class="copyright row g-0 mt-4">

<div class="col-md-6 m-auto">

    <p class="text-white copiright" style="margin: 0;">{{ $allsettings['footer_title'] }} | Developed By <a style="color: #26CD59;" href="https://eksoftwares.com" target="_blank">EK Softwares</a></p>
</div>




<div class="col-md-6">

    <div class="payment-methood" style="text-align: end;">

       <img src="{{asset('frontend/assets/images/payments.png')}}" width="366px"  alt="Payment Gateway">



     </div>



</div>


    </div>


</div>



@if($allsettings['news_letter_status'] == 1)
<div id="whatsapp" class="d-flex gap-2 whatsapp-hidden" style="position: fixed; z-index: 2147483647; justify-content: end;">
    <div class="bg-white rounded text-black" id="message" style="font-size: small !important; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
        <div class="message-box" id="hidemessage" style="position: absolute; top: -13px; left: -4px;">
            <i class="fa-solid fa-xmark"></i>
        </div>
        {{ $allsettings['popupmessage'] }}
    </div>
    <a class="contact-links-main" style="width: 65px !important;" target="_blank" href="{{ $allsettings['news_letter_title'] }}">
        <img class="profile-image-contact" style="border-radius: 50%;" src="{{ asset(IMG_FOOTER_PATH . $allsettings['news_letter_img']) }}" alt="Support">
    </a>
</div>
@endif




</footer>
