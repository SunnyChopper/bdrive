// AOS
AOS.init({
  duration: 1000,
  once: true,
})

jQuery(document).ready(function($){
  'use strict';

  // Scrollax
  $.Scrollax();

  var templateUXSfMenu = function() {
    $( 'ul.sf-menu' ).superfish({
      speed: 'fast',
      speedOut: 'fast',
      autoArrows: false
    });
  }
  templateUXSfMenu();

  var templateUXWindowResize = function() {
    $(window).resize(function() {
      var w = $(window).width();
      if ( w > 700 ) {
        if ( $('#mobile-menu').hasClass('show') ) {
          $('.templateux-toggle-menu').trigger('click');
        }
      }
    });
  };
  templateUXWindowResize();
  
  var templateUXAnimsition = function() {
    $(".animsition").animsition();
  };
  templateUXAnimsition();
  
  var templateUXSmoothScoll = function() {
    // Smooth scroll
    var $root = $('html, body');
    $('a.js-smoothscroll[href^="#"]').click(function () {
      $root.animate({
          scrollTop: $( $.attr(this, 'href') ).offset().top - 40
      }, 500);

      return false;
    });
  };
  templateUXSmoothScoll();

  var templateUXCarousel = function() {
    $('.wide-slider').owlCarousel({
      loop:true,
      autoplay: false,
      margin:0,
      animateOut: 'fadeOut',
      animateIn: 'fadeIn',
      nav:true,
      autoplayHoverPause: false,
      items: 1,
      autoheight: true,
      navText : ["<span class='ion-android-arrow-dropleft'></span>","<span class='ion-android-arrow-dropright'></span>"],
      responsive:{
        0:{
          items:1,
          nav:true
        },
        600:{
          items:1,
          nav:true
        },
        1000:{
          items:1,
          nav:true
        }
      }
    });

    $('.wide-slider-testimonial').owlCarousel({
      loop:true,
      autoplay: true,
      margin:0,
      animateOut: 'fadeOut',
      animateIn: 'fadeIn',
      nav: false,
      autoplayHoverPause: false,
      items: 1,
      autoheight: true,
      navText : ["<span class='ion-android-arrow-dropleft'></span>","<span class='ion-android-arrow-dropright'></span>"],
      responsive:{
        0:{
          items:1,
          nav:false
        },
        600:{
          items:1,
          nav:false
        },
        1000:{
          items:1,
          nav:false
        }
      }
    });
  };
  templateUXCarousel();

  var templateUXHamburgerTrigger = function() {
    $('.templateux-toggle-menu').on('click', function(e){
      var $this = $(this);
      if ( $('#mobile-menu').hasClass('show') ) {
        $this.removeClass('is-active');
      } else {
        $this.addClass('is-active');
      }
      e.preventDefault();
    })
  };
  templateUXHamburgerTrigger();

  var templateUXMobileMenu = function() {
    var newCloneEl = $( '.templateux-menu' ).clone();
    newCloneEl.attr({
      'class': 'cloned-templateux-menu',
      'style' : 'display: none;',
    });
    setTimeout(function(){
      newCloneEl.attr({
        'style' : 'display: block;',
      });
    }, 400);
    newCloneEl.insertAfter( $('.templateux-navbar') );
    setTimeout(function() {
      newCloneEl.wrap('<div class="collapse" id="mobile-menu"><div class="container"></div></div>').parent();
      var counter = 0;
      
      $('.cloned-templateux-menu').find('ul').attr('style', '');      


      $('.cloned-templateux-menu a.sf-with-ul').each(function(){
      
        var $this = $(this);
        
        $this.closest('li').prepend('<span class="arrow-collapse">');

        $this.closest('li').find('.arrow-collapse').attr({
          'data-toggle' : 'collapse',
          'data-target' : '#collapseItem' + counter,
        });

        $this.next().attr({
          'class' : 'collapse',
          'id' : 'collapseItem' + counter,
        });

        counter++;

      });

    }, 300);

    $('body').on('click', '.arrow-collapse', function(e) {
      var $this = $(this);
      if ( $this.closest('li').find('.collapse').hasClass('show') ) {
        $this.removeClass('active');
      } else {
        $this.addClass('active');
      }
      e.preventDefault();  
      
    });
  }
  templateUXMobileMenu();


  var templateUXCounter = function() {
    
    $('#templateux-counter-section').waypoint( function( direction ) {

      if( direction === 'down' && !$(this.element).hasClass('templateux-animated') ) {

        var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',')
        $('.templateux-number').each(function(){
          var $this = $(this),
            num = $this.data('number');
            console.log(num);
          $this.animateNumber(
            {
              number: num,
              numberStep: comma_separator_number_step
            }, 7000
          );
        });
        
      }

    } , { offset: '95%' } );

  }
  templateUXCounter();
});

/* =================================
------------------------------------
  WebUni - Education Template
  Version: 1.0
 ------------------------------------ 
 ====================================*/


'use strict';


$(window).on('load', function() {
  /*------------------
    Preloder
  --------------------*/
  $(".loader").fadeOut(); 
  $("#preloder").delay(200).fadeOut("slow");


  /*------------------
    Gallery item
  --------------------*/
  if($('.course-items-area').length > 0 ) {
    var containerEl = document.querySelector('.course-items-area');
    var mixer = mixitup(containerEl);
  }

});

(function($) {

  /*------------------
    Navigation
  --------------------*/
  $('.nav-switch').on('click', function(event) {
    $('.main-menu').slideToggle(400);
    event.preventDefault();
  });


  /*------------------
    Background Set
  --------------------*/
  $('.set-bg').each(function() {
    var bg = $(this).data('setbg');
    console.log(bg);
    $(this).css('background-image', 'url(' + bg + ')');
  });


  /*------------------
    Realated courses
  --------------------*/
    $('.rc-slider').owlCarousel({
    autoplay:true,
    loop: true,
    nav:true,
    dots: false,
    margin: 30,
    navText: ['', '<i class="fa fa-angle-right"></i>'],
    responsive:{
      0:{
        items:1
      },
      576:{
        items:2
      },
      990:{
        items:3
      },
      1200:{
        items:4
      }
    }
  });


    /*------------------
    Accordions
  --------------------*/
  $('.panel-link').on('click', function (e) {
    $('.panel-link').removeClass('active');
    var $this = $(this);
    if (!$this.hasClass('active')) {
      $this.addClass('active');
    }
    e.preventDefault();
  });



  /*------------------
    Circle progress
  --------------------*/
  $('.circle-progress').each(function() {
    var cpvalue = $(this).data("cpvalue");
    var cpcolor = $(this).data("cpcolor");
    var cptitle = $(this).data("cptitle");
    var cpid  = $(this).data("cpid");

    $(this).append('<div class="'+ cpid +'"></div><div class="progress-info"><h2>'+ cpvalue +'%</h2><p>'+ cptitle +'</p></div>');

    if (cpvalue < 100) {

      $('.' + cpid).circleProgress({
        value: '0.' + cpvalue,
        size: 176,
        thickness: 9,
        fill: cpcolor,
        emptyFill: "rgba(0, 0, 0, 0)"
      });
    } else {
      $('.' + cpid).circleProgress({
        value: 1,
        size: 176,
        thickness: 9,
        fill: cpcolor,
        emptyFill: "rgba(0, 0, 0, 0)"
      });
    }

  });

})(jQuery);

