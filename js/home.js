(function () {
  

  document.addEventListener('DOMContentLoaded', function () {
    

  const authorsSwiper = new Swiper('.authors_carousel .swiper', {
    direction: 'horizontal',
    loop: false,
    slidesPerView: 'auto',
    spaceBetween: 36,
    autoplay: false,
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

  const librarySwiper = new Swiper('.library-slider-section__swiper', {
    direction: 'horizontal',
    loop: false,
    slidesPerView: 'auto',
    spaceBetween: 24,
    autoplay: false,
  });

  const sceneSwiper = new Swiper('.scene-slider-section__swiper', {
    direction: 'horizontal',
    loop: false,
    slidesPerView: 'auto',
    spaceBetween: 24,
    autoplay: false,
  });

  })
})();
