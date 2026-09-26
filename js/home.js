(function () {
  

  document.addEventListener('DOMContentLoaded', function () {
    

  const authorsSwiper = new Swiper('.authors_carousel .swiper', {
    direction: 'horizontal',
    loop: false,
    slidesPerView: 'auto',
    spaceBetween: 36,
    autoplay: false,
    pagination: {
      el: '.authors_carousel .swiper-pagination',
      clickable: true,
    },
    breakpoints: {
      0: {
        spaceBetween: 16,
      },
      520: {
        spaceBetween: 20,
      },
      768: {
        spaceBetween: 36,
      },
    },
  });

  const featuredSwiper = new Swiper('.posts_featured__swiper', {
    direction: 'horizontal',
    loop: true,
    centeredSlides: true,
    slidesPerView: 'auto',
    spaceBetween: 24,
    initialSlide: 0,
    autoplay: false,
    pagination: {
      el: '.posts_featured__swiper .swiper-pagination',
      clickable: true,
    },
    breakpoints: {
      0: {
        spaceBetween: 16,
      },
      768: {
        spaceBetween: 24,
      },
    },
  });

  const librarySwiper = new Swiper('.library-slider-section__swiper', {
    direction: 'horizontal',
    loop: false,
    slidesPerView: 'auto',
    spaceBetween: 24,
    autoplay: false,
    pagination: {
      el: '.library-slider-section__swiper .swiper-pagination',
      clickable: true,
    },
  });

  const sceneSwiper = new Swiper('.scene-slider-section__swiper', {
    direction: 'horizontal',
    loop: false,
    slidesPerView: 'auto',
    spaceBetween: 24,
    autoplay: false,
    pagination: {
      el: '.scene-slider-section__swiper .swiper-pagination',
      clickable: true,
    },
  });

  const mediaLiteracySwiper = new Swiper('.media-literacy-slider-section__swiper', {
    direction: 'horizontal',
    loop: false,
    slidesPerView: 'auto',
    spaceBetween: 24,
    autoplay: false,
    pagination: {
      el: '.media-literacy-slider-section__swiper .swiper-pagination',
      clickable: true,
    },
  });

  })
})();
