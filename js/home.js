(function () {
  

  document.addEventListener('DOMContentLoaded', function () {
    

  const swiper = new Swiper('.swiper', {
    direction: 'horizontal',
    loop: true,
    slidesPerView: 1,
    spaceBetween: 30,
    autoplay:true,
    centeredSlides:true,
    breakpoints:{
    380:{
        centeredSlides:false,
        slidesPerView:2,
    },
    550:{
        slidesPerView: 3,
    },    
    768: {
        slidesPerView: 4,
        spaceBetween: 30
      },
    1180:{
        slidesPerView: 6,
        spaceBetween: 30
    }
    },
  });



  })
})();
