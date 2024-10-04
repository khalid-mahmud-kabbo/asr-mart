    <section class="brands-wrapper brands">
        <div class="card__container">
            <h2 class="text-black mb-4">Categories</h2>
           <div class="card__content swiper CategorySwiper">
              <div class="swiper-wrapper">

                @foreach (Category_Des_Icon() as $item)
                 <article class="card__article swiper-slide">
                     <a href="{{ route('category.product', $item->id) }}" style="color: #000;">
                    <div class="card__data">
                    <div class="card_img_conteiner">
                       <img src="{{ asset(CategoryImage() . $item->categoryImage) }}" class="slider_img" />
                       </div>
                       <h4 class="card__description">
                        {{ langConverter($item->en_Category_Name, $item->fr_Category_Name) }}
                       </h4>
                    </div>
                    </a>
                 </article>
                 @endforeach
        </div>
     </section>
