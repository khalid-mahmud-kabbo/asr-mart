<!-- Js file  -->
<script src="{{ asset('frontend/assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/plugins.js') }}"></script>
<script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/main.js') }}"></script>
<script src="{{ asset('frontend/assets/js/front/custom.js') }}"></script>
<script src="{{ asset('frontend/assets/js/front/extra.js') }}"></script>
<script src="{{ asset('frontend/assets/js/front/sweat_aleart.js') }}"></script>
<script src="{{ asset('frontend/assets/js/common.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
{{-- toastr --}}
<script src="{{ asset('admin/js/toastr.min.js') }}"></script>

<script>
    // window.addEventListener('load', function() {
    //     setTimeout(function() {
    //         document.getElementById('whatsapp').classList.add('show');
    //     }, 5000); // 5000 milliseconds = 5 seconds
    // });




    document.querySelectorAll('.zoom-container').forEach(container => {
    const image = container.querySelector('.slide-image');

    // Function to handle the panning effect
    const handleMouseMove = (e) => {
        const { left, top, width, height } = container.getBoundingClientRect();
        const x = (e.clientX - left) / width * 100;
        const y = (e.clientY - top) / height * 100;
        image.style.transformOrigin = `${x}% ${y}%`;
    };

    // Function to reset the image
    const resetImage = () => {
        container.classList.remove('active');
        image.style.transformOrigin = 'center center';
        image.style.transform = 'scale(1)';
    };

    // Add event listeners
    container.addEventListener('mouseenter', () => {
        container.classList.add('active');
        image.style.transform = 'scale(2)'; // Zoom in
        container.addEventListener('mousemove', handleMouseMove);
    });

    container.addEventListener('mouseleave', () => {
        resetImage();
        container.removeEventListener('mousemove', handleMouseMove); // Stop listening to mousemove
    });
});


</script>

<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    @if (Session::has('success'))
        toastr.success("{{ session('success') }}");
    @endif
    @if (Session::has('error'))
        toastr.error("{{ session('error') }}");
    @endif
    @if (Session::has('info'))
        toastr.info("{{ session('info') }}");
    @endif
    @if (Session::has('warning'))
        toastr.warning("{{ session('warning') }}");
    @endif
</script>
@if (@$errors->any())
    <script>
        "use strict";
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    </script>
@endif
@if (env('APP_DEMO') == true)
    {{-- for sandbox sslcommerz --}}
    <script>
        (function(window, document) {
            var loader = function() {
                var script = document.createElement("script"),
                    tag = document.getElementsByTagName("script")[0];
                script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(
                    7);
                tag.parentNode.insertBefore(script, tag);
            };

            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload",
                loader);
        })(window, document);
    </script>
@else
    {{-- for live sslcommerz --}}
    <script>
        (function(window, document) {
            var loader = function() {
                var script = document.createElement("script"),
                    tag = document.getElementsByTagName("script")[0];
                script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36)
                    .substring(7);
                tag.parentNode.insertBefore(script, tag);
            };

            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload",
                loader);
        })(window, document);
    </script>
@endif
