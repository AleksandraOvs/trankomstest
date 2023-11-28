const swiper = new Swiper('.hero-slider', {
    // Optional parameters
   // direction: 'vertical',
    loop: true,
    // autoplay: {
    //   delay: 5000,
    //   disableOnInteraction: false,
    // },
    effect: "fade",
    // If we need pagination
    pagination: {
      el: '.hero-slider__pagination',
      clickable: true,
    },
  
    // Navigation arrows
    navigation: {
      nextEl: '.hero-slider__button-next',
      prevEl: '.hero-slider__button-prev',
    },
   
  });

  const services_swiper = new Swiper('.services-slider', {
    //effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: 3,
    loop: true,
    // autoplay: {
    //   delay: 5000,
    //   disableOnInteraction: false,
    // },
    // coverflowEffect: {
    //   rotate: 50,
    //   stretch: 0,
    //   depth: 100,
    //   modifier: 1,
    //   slideShadows: true,
    // },
    navigation: {
      nextEl: '.services-slider__button-next',
      prevEl: '.services-slider__button-prev',
    },
   
  })