(function($) {
    "use strict";

    $(".tag_one").select2();
    $(".tag_two").select2();

    $('#discount').on('keyup', function () {
        var price = $('#price').val();
        var discount = $('#discount').val();
        var discount_price = (price * (100 - discount)) / 100;
        $('#discount_price').val(discount_price);
    })

    $('#discountpp').on('keyup', ()=>{
        const price = $('#price').val();
        const discountpp = $('#discountpp').val();
        const discount_price = (price - discountpp);
        $('#discount_price').val(discount_price);
    })


})(jQuery)
