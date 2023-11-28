jQuery(document).ready(function($)  {
    let width = $(window).width();
    let body = $('body');
    let menu = $('.header__bottom');

    $(document).on('click', '.js-toggle-menu', function () {
      $(this).toggleClass('_open');
      menu.toggleClass('_open');
      body.toggleClass('_fixed');
    });

    const headerFront = document.querySelector('.header__top');

  // Вверх и показ верхнего меню
    const headerChange = () => {
      const
        mainBlock = document.querySelector('body');

  
       window.addEventListener('scroll', () => {
         if (-mainBlock.getBoundingClientRect().top > 100) {
            headerFront.classList.add('header-scroll');
        
         } else {
            headerFront.classList.remove('header-scroll');
         }
       })
  
    }
    headerChange();


    function scrollTo(to, duration = 700) {
      const
        element = document.scrollingElement || document.documentElement,
        start = element.scrollTop,
        change = to - start,
        startDate = +new Date(),
        // t = current time
        // b = start value
        // c = change in value
        // d = duration
        easeInOutQuad = function (t, b, c, d) {
          t /= d / 2;
          if (t < 1) return c / 2 * t * t + b;
          t--;
          return -c / 2 * (t * (t - 2) - 1) + b;
        },
        animateScroll = function () {
          const currentDate = +new Date();
          const currentTime = currentDate - startDate;
          element.scrollTop = parseInt(easeInOutQuad(currentTime, start, change, duration));
          if (currentTime < duration) {
            requestAnimationFrame(animateScroll);
          }
          else {
            element.scrollTop = to;
          }
        };
      animateScroll();
    }

    const upArrow = document.querySelector('.arrow-up');
      
    upArrow.addEventListener('click', (e) => {
       e.preventDefault();
      // Вызываем функцию, первый аргумент - отступ, второй - скорость скролла, чем больше значение, тем медленнее скорость прокрутки
      scrollTo(0, 800);
    }); 
    
    // Вверх и показ верхнего меню
    const arrowUp = () => {
      const
        //fixedHeader = document.querySelector('.fixed-header'),
        mainBlock = document.querySelector('.site-container'),
        arrow = document.querySelector('.arrow-up');
    
      window.addEventListener('scroll', () => {
        if (-mainBlock.getBoundingClientRect().top > 300) {
          arrow.classList.add('show');
          //fixedHeader.classList.add('show')
    
        } else {
          arrow.classList.remove('show');
          //fixedHeader.classList.remove('show')
    
        }
      })
    
    }
    arrowUp();

    function onEntry(entry) {
      entry.forEach(change => {
        if (change.isIntersecting) {
          change.target.classList.add('element-show');
        }
      });
    }
    let options = { threshold: [0.5] };
    let observer = new IntersectionObserver(onEntry, options);
    let elements = document.querySelectorAll('.toright, .toleft');
    for (let elm of elements) {
      observer.observe(elm);
    }
})