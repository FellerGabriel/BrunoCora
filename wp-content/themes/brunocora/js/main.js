
jQuery(document).ready(function($){
 
    $(".menu a").on('click', function(event) {
      if($(".home").length){
        if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;      

            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 1000, function(){                        
                window.location.hash = hash;
            });
        } 
      }else{
        location = "http://bruno.localhost/" + this.hash;
      }
  });

  $(".icon_menu_mobile").on("click", function(){
    $('.menu_mobile').css("left", 0);
    $("html").css("overflow", "hidden")
  })
  
  $(".close_menu, .menu_mobile ul li a").on("click", function(){
    $('.menu_mobile').css("left", "-100%" );
    $("html").css("overflow", "auto")
  })

  $(".categorias-mobile").on("click", function(){
    $('.blog_sidebar').css("left", 0);
    $("html").css("overflow", "hidden")
  })
  
  $(".close_categoria").on("click", function(){
    $('.blog_sidebar').css("left", "-100%" );
    $("html").css("overflow", "auto")
  })
  

  $(document).on('click', 'a[href^="#"]', function (event) {
    event.preventDefault();

    $('html, body').animate({
        scrollTop: $($.attr(this, 'href')).offset().top
    }, 500);
});
    $('.entenda_desktop .colsultoria').slick({
        dots: true,
        infinite: true,
        speed: 500,
        fade: true,
        prevArrow: false,
        nextArrow: '<div class="seta next seta_consultoria"></div>',
        cssEase: 'linear',
      });

      $('.entenda_mobile .colsultoria').slick({
        dots: true,
        infinite: true,
        speed: 500,
        fade: true,
        prevArrow: false,
        nextArrow: false,
        cssEase: 'linear'
      });

      jQuery('.depoimentos').slick({        
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        speed: 500,
        prevArrow: '<div class="seta seta_depoimentos prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>',
        nextArrow: '<div class="seta seta_depoimentos next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>',
        responsive: [
            {
              breakpoint: 1200,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                dots: false
              }
            },
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
          ]
      });
      $(window).resize(function(e){
      if(window.innerWidth < 1024) {
        jQuery('.entenda_itens').slick({        
          infinite: true,
          slidesToShow: 3,
          slidesToScroll: 3,
          speed: 500,
          prevArrow: '<div class="seta seta_depoimentos prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>',
          nextArrow: '<div class="seta seta_depoimentos next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>',
          responsive: [
              {
                breakpoint: 1200,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 1,
                  infinite: true,
                  dots: false
                }
              },
              {
                breakpoint: 1024,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 2
                }
              },
              {
                breakpoint: 600,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
                }
              }
            ]
        });
      } 

     
      });

      if(window.innerWidth < 768) {
        jQuery('.instagram_footer .fotos_instagram').slick({        
          infinite: true,
          slidesToShow: 3,
          slidesToScroll: 3,
          speed: 500,
          prevArrow: false,
          nextArrow: false,
          autoplay: 5000
        });
      } 


      $(".perguntas_container").on("click", function(){
            var aberto = jQuery(this).hasClass("ativo");
            if(!aberto){
                $(".perguntas_container").removeClass("ativo");
                $(".perguntas_container .resposta").slideUp("500");
                $(this).addClass("ativo");
                $(".resposta", this).slideDown("500");        
            }else{
                $(".perguntas_container").removeClass("ativo");
                $(".perguntas_container .resposta").slideUp("500");
            }
      })
});

function abreVideo(id){
    var floater = jQuery('.floater_video');
    if(floater.length >= 1){
        jQuery('body').css('overflow', 'hidden');

        floater.fadeIn();
        floater.find('.cont').html('<iframe width="100%" height="100%" src="https://www.youtube.com/embed/'+ id +'/?autoplay=1" frameborder="0" allowfullscreen></iframe>');
    }
}
function fechaVideo(){
    var floater = jQuery('.floater_video');
    if(floater.length >= 1){
        jQuery('body').css('overflow', 'auto');
        floater.fadeOut();

        setTimeout(function(){
            floater.find('.cont').html('');
        }, 300);
    }
}