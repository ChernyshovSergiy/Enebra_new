$( document ).ready(function() {
      
      
 if (navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Chrome') == -1) {
    var bg = jQuery(".main");
    jQuery(window).resize("resizeBackground");
    function resizeBackground() {
        bg.height(jQuery(window).height());
    }
    resizeBackground();
    
    $('.how_start, .subscribe .input-group-btn, .footer-contactus .btn, .sign-reg .btn').removeClass('hvr-radial-out').addClass('hover-safari');
    
 }
        
    //   if ($(window).width() > 820 ) {
    // $('.main').backstretch('/img/bg.png');

// }

    if ($(window).width() > 820 ) {
        $(".img-block.main").vegas({
            delay: 10000,
            timer: false,
            shuffle: true,
            firstTransition: 'fade',
            firstTransitionDuration: 7000,
            transitionDuration: 4000,
            animationDuration:5000,
            slides: [
                { src: "img/bgHd/bg.png" },
                { src: "img/bgHd/city2.jpg" },
                { src: "img/bgHd/nice.jpg" },
                { src: "img/bgHd/spinner.jpg" },
                { src: "img/bgHd/technology.jpg" },
                { src: "img/bgHd/nature3.jpg" },
                // { src: "img/bgHd/technology2.jpg" },
                // { src: "img/bgHd/nature2.jpg" },
                { src: "img/bgHd/city1.jpg" },
                // { src: "img/bgHd/pawn.jpg" },
                // { src: "img/bgHd/thinks1.jpg" },
                // { src: "img/bgHd/city3.jpg" },
                { src: "img/bgHd/technology1.jpg" },
                { src: "img/bgHd/city4.jpg" },
                // { src: "img/bgHd/road.jpg" },
                // { src: "img/bgHd/sea.jpg" },
                // { src: "img/bgHd/street.jpg" },
                { src: "img/bgHd/thinks.jpg" },
                // { src: "img/bgHd/nature.jpg" }
                // { src: "img/bgHd/thinks1.jpg" },
                // { src: "img/bgHd/town.jpg" }
            ],
            transition: [ 'fade', 'zoomOut', 'blur' ],
            overlay: '/js/overlays/05.png',
            animation: 'random'
        });
        $(".f-block").addClass("vegas_f_block");
        var bl1 = $(".img-block.main").height();
        var bl2 = $(".f-block.vegas_f_block").height();
        var bl3 = bl1/2 - bl2/2;
        $(".f-block.vegas_f_block").css("top", bl3);
    }

    $('.kwicks').kwicks({
                    maxSize : '65%',
                    behavior: 'menu'
           });
           
        $('.video-block').mouseenter(function(){   
            var bl =  $('.video-block');
            setTimeout(function(){   
                $(bl).find('.block-on-hover p').fadeIn("slow");
            }, 500); 
        }).mouseleave(function() {
             var bl =  $('.video-block');
            $(bl).find('.block-on-hover p').hide();
        });

//�������� :) ��� �����  ///
   

  if ($(window).width() > 820 ) { 
   $('.signbutton').click(function(){$('.signin').animate({right:0, opacity:"show"}, 1500); });
 
   $('.regbutton, .regb .btn').click(function(){
        $('.register').animate({right:0, opacity:"show"}, 1500);
        $('.signin').animate({right:-400, opacity:"hide"}, 1500);
    });

}else {
    $('li.lang a, .navbar-toggle').click(function(){
        $('.glyphicon-remove').trigger('click');
    });
     $('.sign-button').click(function(){$('.signin').animate({right:0, opacity:"show"}, 1500); });
     
     
     $('.regb .btn').click(function(){
       
        $('.register').animate({right:0, opacity:"show"}, 1500);
        $('.signin').animate({right:-400, opacity:"hide"}, 1500);
    });

} 

 
 
    
    $('.close-form').click(function(){
        $(this).parent().animate({right:-400, opacity:"hide"}, 1500);
   
   });

 if ($('.img-block').height() <= 800 ) {
    $(this).find('.register').addClass('medium');
 }

      
  $("#owl-example").owlCarousel({
    items:6,
    navigation:	true,
    responsive:	true,
    itemsTablet: [820,6],
    itemsMobile: [450,3] 
  });

  $(".faq-authors").owlCarousel({
    items:6,
    navigation:	true,
    responsive:	true,
    itemsTablet: [820,3],
    itemsMobile: [450,1] 
  });                        
                                  
$('.faq-accordion .owl-carousel .block-carousel img').on('click', function(){
    $('.faq-accordion .owl-carousel .block-carousel img.focus-img').removeClass('focus-img');
    $(this).addClass('focus-img');
});

$('.owl-carousel .block-carousel .img').on('click', function(){
    $(this).parent('.faq-authors').find('.img.focus-img').removeClass('focus-img');
    $(this).parent('.faq-authors').find('.img').addClass('focus-img');
});


                              
$('.faq-accordion .collapse').on('shown.bs.collapse', function(){
$(this).parent().find(".act-quest-r").removeClass("act-quest-r").addClass("act-quest-l");
}).on('hidden.bs.collapse', function(){
$(this).parent().find(".act-quest-l").removeClass("act-quest-l").addClass("act-quest-r");
});					           

$( "#datepicker" ).datepicker();

 $( ".news select, .resister_left select" ).selectmenu();
    
    
tinymce.init({
  selector: '.faqtextarea',
  height: 300,
  plugins: [
    'advlist autolink lists link image charmap print preview placeholder anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code'
  ],
  toolbar: 'bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent blockquote | removeformat',
  placeholder_attrs: { style: {position: 'absolute', top:'5px', left:0, color: '#99999C', padding: '1%', width:'98%', overflow: 'hidden', 'white-space': 'pre-wrap'} },
  statusbar: false,
  menubar:false
});
 
$('.full-partcipant').each(function(){  
      var highestBox = 0;
      $('.equal-blocks', this).each(function(){
        if($(this).height() > highestBox) {
          highestBox = $(this).height(); 
        }
      });  
      $('.equal-blocks',this).height(highestBox);                   
}); 



  $('.show_block').click(function(){
    $(this).closest('.resister_table').find('.resister_modal.active').removeClass('active');
    $(this).parent().find('.resister_modal').addClass('active');
  });
  $('.close_resister').click(function(){
    $(this).closest(".resister_modal").removeClass('active');
  });











});

function create_request( fields )
{

    var data = new Object();

    for(var i = 0; i < fields.length ; i++ )
        data[fields[i].name] = fields[i].value

    return data;
}

function scroll_to( id )
{
    $('html, body').animate({scrollTop: $('#' + id).offset().top});

    return false;

}

function scroll_to_top()
{
    $('.que-answ').animate({scrollTop: 0});

    return false;
}