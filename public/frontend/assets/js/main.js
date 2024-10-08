(function ($) {
  "use strict";

    /*----------------------------
     Preloader
    ------------------------------ */
    $(window).on("load", function() {
      $("#status").fadeOut();
      $("#preloader")
        .delay(350)
        .fadeOut("slow");
    });

  /*-------------------------------------------
  Sticky Header
  --------------------------------------------- */
  $(window).on('scroll', function(){
    if( $(window).scrollTop()>80 ){
      $('#sticky').addClass('stick');
    } else {
      $('#sticky').removeClass('stick');
    }
  });

    /*-------------------------------------------
    Mobile Menu
    --------------------------------------------- */
    function mobile_menu_active() {
      /*Category Sub Menu Toggle*/
      $('.mobile-menu-area .main-menu').on('click', 'li a, .menu-expand', function (e) {
        var $this = $(this);
        if ($this.attr('href') === '#' || $this.hasClass('menu-expand')) {
          e.preventDefault();
          if ($this.siblings('ul:visible').length) {
            $this.parent('li').removeClass('active');
            $this.siblings('ul').slideUp();
            $this.parent('li').find('li').removeClass('active');
            $this.parent('li').find('ul:visible').slideUp();
          } else {
            $this.parent('li').addClass('active');
            $this.closest('li').siblings('li').removeClass('active').find('li').removeClass('active');
            $this.closest('li').siblings('li').find('ul:visible').slideUp();
            $this.siblings('ul').slideDown();
          }
        }
      });
    }
    mobile_menu_active();

    /*-------------------------------------------
    js scrollup
    --------------------------------------------- */
    $.scrollUp({
      scrollText: '<i class="fa fa-angle-up"></i>',
      easingType: 'linear',
      scrollSpeed: 500,
      animation: 'fade'
    });

    /*-------------------------------------------
    hero-slider active
    --------------------------------------------- */
    // $('.direction-ltr .hero-slider').slick({
    //   infinite: true,
    //   speed: 500,
    //   slidesToShow: 1,
    //   slidesToScroll: 1,
    //   autoplay: false,
    //   autoplaySpeed: 3000,
    //   dots: true,
    //   arrows: false,
    //   prevArrow: '<i class="slick-prev fas fa-angle-left"></i> ',
    //   nextArrow: '<i class="slick-next fas fa-angle-right"></i> ',
    // });
    // $('.direction-rtl .hero-slider').slick({
    //   infinite: true,
    //   speed: 500,
    //   slidesToShow: 1,
    //   slidesToScroll: 1,
    //   autoplay: false,
    //   autoplaySpeed: 3000,
    //   rtl: true,
    //   dots: true,
    //   arrows: false,
    //   prevArrow: '<i class="slick-prev fas fa-angle-left"></i> ',
    //   nextArrow: '<i class="slick-next fas fa-angle-right"></i> ',
    // });

    /*-------------------------------------------
    hero-banner-slide-v3 active
    --------------------------------------------- */
    // $('.hero-banner-slide-v3').slick({
    //   infinite: true,
    //   speed: 500,
    //   slidesToShow: 1,
    //   slidesToScroll: 1,
    //   autoplay: true,
    //   autoplaySpeed: 3000,
    //   dots: true,
    //   fade: true,
    //   arrows: false,
    //   prevArrow: '<i class="slick-prev fas fa-angle-left"></i> ',
    //   nextArrow: '<i class="slick-next fas fa-angle-right"></i> ',
    // });

    // /*-------------------------------------------
    // brads-slide active
    // --------------------------------------------- */
    // $('.direction-ltr .brads-slide').slick({
    //   infinite: true,
    //   speed: 500,
    //   slidesToShow: 6,
    //   slidesToScroll: 1,
    //   autoplay: true,
    //   autoplaySpeed: 3000,
    //   dots: false,
    //   arrows: false,
    //   prevArrow: '<i class="slick-prev fas fa-angle-left"></i> ',
    //   nextArrow: '<i class="slick-next fas fa-angle-right"></i> ',
    //   responsive: [
    //     {
    //       breakpoint: 1024,
    //       settings: {
    //         slidesToShow: 5,
    //         slidesToScroll: 3,
    //       }
    //     },
    //     {
    //       breakpoint: 600,
    //       settings: {
    //         slidesToShow: 4,
    //         slidesToScroll: 2
    //       }
    //     },
    //     {
    //       breakpoint: 480,
    //       settings: {
    //         slidesToShow: 3,
    //         slidesToScroll: 1
    //       }
    //     }
    //   ]
    // });
    // $('.direction-rtl .brads-slide').slick({
    //   infinite: true,
    //   speed: 500,
    //   slidesToShow: 6,
    //   slidesToScroll: 1,
    //   autoplay: true,
    //   autoplaySpeed: 3000,
    //   rtl: true,
    //   dots: false,
    //   arrows: false,
    //   prevArrow: '<i class="slick-prev fas fa-angle-left"></i> ',
    //   nextArrow: '<i class="slick-next fas fa-angle-right"></i> ',
    //   responsive: [
    //     {
    //       breakpoint: 1024,
    //       settings: {
    //         slidesToShow: 5,
    //         slidesToScroll: 3,
    //       }
    //     },
    //     {
    //       breakpoint: 600,
    //       settings: {
    //         slidesToShow: 4,
    //         slidesToScroll: 2
    //       }
    //     },
    //     {
    //       breakpoint: 480,
    //       settings: {
    //         slidesToShow: 3,
    //         slidesToScroll: 1
    //       }
    //     }
    //   ]
    // });







    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 10,
        autoplay: {
        delay: 7000,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },

      breakpoints: {
        // when window width is >= 576px
        320: {
          slidesPerView: 1,
        },
        576: {
          slidesPerView: 1,
        },
        // when window width is >= 768px
        768: {
          slidesPerView: 1,
        },
        // when window width is >= 992px
        992: {
          slidesPerView: 1,
        }
      }

    })

    var swiper = new Swiper(".brandSwiper", {
        slidesPerView: 8,
        spaceBetween: 40,
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        breakpoints: {
          // when window width is >= 576px
          320: {
            slidesPerView: 2,
          },
          576: {
            slidesPerView: 2,
          },
          // when window width is >= 768px
          768: {
            slidesPerView: 4,
          },
          // when window width is >= 992px
          992: {
            slidesPerView: 8,
          }
        }
      });


    var swiper = new Swiper(".CategorySwiper", {
        slidesPerView: 9,
      spaceBetween: 40,
      autoplay: {
        delay: 2000,
        disableOnInteraction: false,
      },

      breakpoints: {
        320: {
            slidesPerView: 2,
          },
        // when window width is >= 576px
        576: {
          slidesPerView: 2,
        },
        // when window width is >= 768px
        768: {
          slidesPerView: 4,
        },
        // when window width is >= 992px
        992: {
          slidesPerView: 9,
        }
      }

    });






    /*-------------------------------------------
    story-box-slide active
    --------------------------------------------- */
    $('.direction-ltr .story-box-slide').slick({
      infinite: true,
      speed: 500,
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 3000,
      rtl: false,
      dots: true,
      arrows: true,
      prevArrow: '<i class="slick-prev fas fa-angle-left"></i> ',
      nextArrow: '<i class="slick-next fas fa-angle-right"></i> ',
      responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });
    $('.direction-rtl .story-box-slide').slick({
      infinite: true,
      speed: 500,
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 3000,
      rtl:true,
      dots: true,
      arrows: true,
      prevArrow: '<i class="slick-prev fas fa-angle-left"></i> ',
      nextArrow: '<i class="slick-next fas fa-angle-right"></i> ',
      responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });

    /*-------------------------------------------
    blog-slide active
    --------------------------------------------- */
    $('.direction-ltr .blog-slide').slick({
      infinite: true,
      speed: 500,
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 3000,
      rtl: false,
      dots: true,
      arrows: true,
      prevArrow: '<i class="slick-prev fas fa-angle-left"></i> ',
      nextArrow: '<i class="slick-next fas fa-angle-right"></i> ',
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });
    $('.direction-rtl .blog-slide').slick({
      infinite: true,
      speed: 500,
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 3000,
      rtl: true,
      dots: true,
      arrows: true,
      prevArrow: '<i class="slick-prev fas fa-angle-left"></i> ',
      nextArrow: '<i class="slick-next fas fa-angle-right"></i> ',
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });

    /*-------------------------------------------
    testimonial-slide active
    --------------------------------------------- */
    $('.testimonial-image-slide').slick({
      infinite: true,
      speed: 500,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 3000,
      dots: false,
      arrows: false,
      fade: true,
      cssEase: 'linear',
      asNavFor: '.testimonail-slide',
    });
    $('.testimonail-slide').slick({
      infinite: true,
      speed: 500,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 3000,
      dots: true,
      arrows: false,
      fade: true,
      cssEase: 'linear',
      asNavFor: '.testimonial-image-slide',
    });

    /*-------------------------------------------
    recommend-product-slide active
    --------------------------------------------- */
    // Course Slider Owl Carousel Start
    $('#myTab a').on('shown.bs.tab', function () {
      destroy_owl($('.owl-carousel'));
      initialize_owl($('.owl-carousel'));
  })

  function initialize_owl(el) {
      $('.direction-ltr .recommend-product-slide').owlCarousel({
          items:4,
          loop: true,
          dots: false,
          autoWidth:true,
          lazyLoad: true,
          // lazyLoadEager: 4,
          // center:true,
          autoplay: false,
          margin: 15,
          rtl: false,
          nav: false,
          responsive: {
              0: {
                  items: 1,
              },
              480: {
                  items:1,
              },
              576: {
                  items:1,
              },
              768: {
                  items:2,
              },
              1200: {
                  items:4,
              }
          },
      });
      $('.direction-rtl .recommend-product-slide').owlCarousel({
          items:4,
          loop: true,
          dots: false,
          autoWidth:true,
          lazyLoad: true,
          // lazyLoadEager: 4,
          autoplay: false,
          margin: 15,
          rtl: true,
          nav: false,
          responsive: {
              0: {
                  items: 1,
              },
              480: {
                  items:1,
              },
              576: {
                  items:1,
              },
              768: {
                  items:2,
              },
              1200: {
                  items:4,
              }
          },
      });
  }

  initialize_owl();

  function destroy_owl(el) {
      el.trigger("destroy.owl.carousel");
      el.find('.owl-stage-outer').children(':eq(0)').unwrap();
  }
  // Course Slider Owl Carousel End
    /*-------------------------------------------
    testimonial-slide-two active
    --------------------------------------------- */
    $('.direction-ltr .testimonial-slide-two').slick({
      infinite: true,
      speed: 500,
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: false,
      autoplaySpeed: 3000,
      dots: false,
      arrows: true,
      rtl: false,
      prevArrow: '<i class="slick-prev flaticon-left-arrow-1"></i> ',
      nextArrow: '<i class="slick-next flaticon-right-arrow"></i> ',
      responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 481,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });

    $('.direction-rtl .testimonial-slide-two').slick({
      infinite: true,
      speed: 500,
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: false,
      autoplaySpeed: 3000,
      dots: false,
      arrows: true,
      rtl: true,
      prevArrow: '<i class="slick-prev flaticon-left-arrow-1"></i> ',
      nextArrow: '<i class="slick-next flaticon-right-arrow"></i> ',
      responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 481,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });

    /*-------------------------------------------
    testimonial-slide-v3 active
    --------------------------------------------- */
    $('.testimonial-slide-v3').slick({
      infinite: true,
      speed: 500,
      slidesToShow: 2,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 3000,
      dots: true,
      arrows: false,
      prevArrow: '<i class="slick-prev flaticon-left-arrow-1"></i> ',
      nextArrow: '<i class="slick-next flaticon-right-arrow"></i> ',
      responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 481,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });

    /*-------------------------------------------
    best-selling-product-silde active
    --------------------------------------------- */
    $('.best-selling-product-silde').slick({
      infinite: true,
      speed: 500,
      slidesToShow: 4,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 3000,
      dots: false,
      arrows: true,
      prevArrow: '<i class="slick-prev fas fa-angle-left"></i> ',
      nextArrow: '<i class="slick-next fas fa-angle-right"></i> ',
      responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 481,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });

    /*-------------------------------------------
      product-priview-slide active
    --------------------------------------------- */
    $('.product-priview-slide').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: false,
      arrows: false,
      fade: true,
      asNavFor: '.product-thumb-silide'
    });

    $('.product-thumb-silide').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      autoplay: false,
      asNavFor: '.product-priview-slide',
      dots: false,
      arrows: false,
      centerMode: false,
      focusOnSelect: true,
      vertical: true,
    });

    /*-------------------------------------------
      product-priview-slide-v2 active
    --------------------------------------------- */
    $('.product-priview-slide-v2').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: false,
      arrows: false,
      fade: true,
      asNavFor: '.product-thumb-silide-v2'
    });
    $('.product-thumb-silide-v2').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: false,
      asNavFor: '.product-priview-slide-v2',
      dots: false,
      arrows: false,
      focusOnSelect: true,
    });

    /*---------------------------------
    Language Switcher  active
    -----------------------------------*/
    $(".lang-switcher").on("click", function(e){
      // e.preventDefault();
      $(".lang-list").toggleClass("lang-list-open");
      $(".currency-list").removeClass("currency-list-open");
    });
    $(".lang-list li").each(function(){
        $(this).on("click", function(){
            var logoSrc = $(this).children(".flag").children("img").attr("src");
            var flagText = $(this).children("a").text() + '<span><i class="fas fa-angle-down"></i></span>';
            $(".lang-switcher > .flag img").attr("src", logoSrc);
            $(".lang-switcher > a").html(flagText);
        });
    });

    /*---------------------------------
    Language Switcher  active
    -----------------------------------*/
    $(".currency-switcher").on("click", function(e){
      // e.preventDefault();
      $(".currency-list").toggleClass("currency-list-open");
      $(".lang-list").removeClass("lang-list-open");
    });
    $(".currency-list li").each(function() {
        $(this).on("click", function(){
            var logoSrc = $(this).children(".flag").children("i").attr("class");
            var flagText = $(this).children("a").text() + '<span><i class="fas fa-angle-down"></i></span>';
            $(".currency-switcher > .flag i").attr("class", logoSrc);
            $(".currency-switcher > a").html(flagText);
        });
    });

    /*---------------------------------
    Account Switcher  active
    -----------------------------------*/
    $(".account-switcher").on("click", function(e){
      // e.preventDefault();
      $(".account-list").toggleClass("currency-list-open");
      $(".account-list").removeClass("lang-list-open");
    });
    /*---------------------------------
    magnificPopup active
    -----------------------------------*/
    $('.popup-image').magnificPopup({
      type: 'image',
      gallery:{
        enabled:true
      }
    });

    /*-------------------------------------------
    offer-product-time active
    --------------------------------------------- */
    $('#offer-product-time').countdown({
			date:'12/24/2020 23:59:59',// TODO Date format: 07/27/2017 17:00:00
			offset: +6, // TODO Your Timezone Offset
			day: 'Day',
			days: 'Days',
			hideOnComplete: true,
		});

    /*-------------------------------------------
    js counterUp
    --------------------------------------------- */
    $('.counter').counterUp({
      delay: 10,
      time: 1000
    });

    /*-------------------------------------------
    offer-product-time active
    --------------------------------------------- */
    $('.offer-product-time').countdown({
			date:'12/24/2021 23:59:59',// TODO Date format: 07/27/2017 17:00:00
			offset: +6, // TODO Your Timezone Offset
			day: 'Day',
			days: 'Days',
			hideOnComplete: true,
		});

    /*----------------------------
      Cart Plus Minus Button
    ------------------------------ */
    $(".qtybutton").on("click", function() {
      var $button = $(this);
      var oldValue = $button.parent().find("input").val();
      if ($button.text() === "+") {
          var newVal = parseFloat(oldValue) + 1;
      } else {
          // Don't allow decrementing below zero
          if (oldValue > 1) {
              var newVal = parseFloat(oldValue) - 1;
          } else {
              newVal = 1;
          }
      }
      $button.parent().find("input").val(newVal);
    });

    /*----------------------------
    checkout payment method active
    ------------------------------*/
    $('input[type="radio"]').on("click", function(){
      if($(this).attr("value")=="creditcard" || $(this).attr("value")=="bank" || $(this).attr("value")=="mobilebank" || $(this).attr("value")=="bank"){
        $(".card-infor-box").slideDown('slow');
      }
      else {
        $(".card-infor-box").slideUp('slow');
      }
    });4


    /*----------------------------
      footer widget dropdoen Button
    ------------------------------ */
    $(".single-widget .mobile-dropdown-title").on("click", function() {
      $('.single-widget .widget-menu').removeClass('show');
      $(this).siblings('.widget-menu').addClass('show');
    });

    /*----------------------------
      Offer Popup Modal
    ------------------------------ */
    $(window).on('load', function () {
      setTimeout(function () {
          $('#popUpModal').modal('show');
      }, 500);
    });

    /*----------------------------
      Product size change
    ------------------------------ */
    if($(".featured-productss-area, .featured-products-area-v2, .product-list, .product-single-right").length) {
      var singleProductGrid = $(".single-grid-product");


      var sizeAll = $(".size-switch");


        sizeAll.each(function() {
            var singleSize = $(".size-switch >  li");

            singleSize.on("click", function() {
                $(this).addClass("active");
                $(this).siblings().removeClass("active");
                $(this).parents(".col-lg-3").siblings().find(singleSize).removeClass("active");
            })
        })
  }
    /*----------------------------
      Product size change
    ------------------------------ */

}(jQuery));










$('.slide-image')
        // tile mouse actions
        .on('mouseover', function(){
          $(this).children('.slide-image__image').css({'transform': 'scale('+ $(this).attr('data-scale') +')'});
        })
        .on('mouseout', function(){
          $(this).children('.slide-image__image').css({'transform': 'scale(1)'});
        })
        .on('mousemove', function(e){
          $(this).children('.slide-image__image').css({'transform-origin': ((e.pageX - $(this).offset().left) / $(this).width()) * 100 + '% ' + ((e.pageY - $(this).offset().top) / $(this).height()) * 100 +'%'});
        })
        // tiles set up
        .each(function(){
          $(this)
            // add a image container
            .append('<div class="slide-image__image"></div>')
            // set up a background image for each tile based on data-image attribute
            .children('.slide-image__image').css({'background-image': 'url('+ $(this).attr('data-image') +')'});
        });

