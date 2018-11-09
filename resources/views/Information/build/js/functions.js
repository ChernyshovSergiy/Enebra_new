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
        
     /* if ($(window).width() > 820 ) { 
    $('img-block.main').backstretch('img/bg.png'); 
      
} */
           // $('img-block.main').backstretch('img/bg.png'); 
            
	if ($(window).width() > 820 ) { 		
			$(".img-block.main").vegas({
    slides: [
        { src: "img/bg.png" },
        { src: "img/bgblock.png" },
        { src: "img/fourth.png" },
        { src: "img/intro.png" }
    ]
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

////
   

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

////
 
 
 
    
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

$('.accord-block .collapse').on('shown.bs.collapse', function(){
$(this).parent().find(".close-acc").removeClass("close-acc").addClass("open-acc");
}).on('hidden.bs.collapse', function(){
$(this).parent().find(".open-acc").removeClass("open-acc").addClass("close-acc");
});

 $('[data-toggle="tooltip"]').tooltip(); 
$('.block-download-file').jScrollPane();




$( "#datepicker" ).datepicker();

 $( ".news select, .downloads select" ).selectmenu();
    
    
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

$(function () {
    $.getJSON('https://www.highcharts.com/samples/data/jsonp.php?filename=usdeur.json&callback=?', function (data) {

        $('#container').highcharts({
            chart: {
                zoomType: 'x'
            },
            title: {
                text: 'Members of the project'
            },
            subtitle: {
                text: document.ontouchstart === undefined ?
                        'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
            },
            xAxis: {
                type: 'datetime'
            },
            yAxis: {
                title: {
                    text: 'Exchange rate'
                }
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                area: {
                    fillColor: {
                        linearGradient: {
                            x1: 0,
                            y1: 0,
                            x2: 0,
                            y2: 1
                        },
                        stops: [
                            [0, Highcharts.getOptions().colors[0]],
                            [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                        ]
                    },
                    marker: {
                        radius: 2
                    },
                    lineWidth: 1,
                    states: {
                        hover: {
                            lineWidth: 1
                        }
                    },
                    threshold: null
                }
            },

            series: [{
                type: 'area',
                name: 'member',
                data: data
            }]
        });
    });
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



        function initMap() {

  var map = new google.maps.Map(document.getElementById('pageMap'), {

    zoom: 3,
    
    scrollwheel: false,
    
    navigationControl: false,
    
    mapTypeControl: false,
    
    scaleControl: false,
    
    disableDefaultUI: true,
    
    zoomControl: true,
    
    zoomControlOptions: {
    
        position: google.maps.ControlPosition.TOP_LEFT,

    
    }, 
    
    draggable: true,
    
    center: {lat: 13.768275, lng: 0.521120}
  
  });

 
 map.addListener('click', function(e) {

var dt = JSON.stringify(e) ;

dt = JSON.parse( dt )

var data = {

            key     : "AIzaSyDuobmu5uxO3e-AsgdFVa2LoDA32fPagks",

            latlng  : dt.latLng.lat + "," + dt.latLng.lng,

            language: 'en',

            result_type : 'country'



}

$.ajax({

    method : 'GET',

    url          : 'https://maps.googleapis.com/maps/api/geocode/json',

    data         : data,

    success: function( obj )
    {

            console.log(obj.results[0].address_components[0].short_name)
            console.log(obj.results[0].place_id)

            //alert( obj.results[0].formatted_address)


    }
})


  });


var styles = [
    {
        "featureType": "all",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "saturation": 36
            },
            {
                "color": "#000000"
            },
            {
                "lightness": 40
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#000000"
            },
            {
                "lightness": 16
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 20
            },
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 17
            },
            {
                "weight": 1.2
            },
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "labels.text",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "administrative.country",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "administrative.country",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#828282"
            }
        ]
    },
    {
        "featureType": "administrative.country",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#939393"
            }
        ]
    },
    {
        "featureType": "administrative.country",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "administrative.province",
        "elementType": "geometry",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "administrative.province",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "administrative.province",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "administrative.province",
        "elementType": "labels.text",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "administrative.land_parcel",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 20
            }
        ]
    },
    {
        "featureType": "landscape.natural",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#565656"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 21
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 17
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 29
            },
            {
                "weight": 0.2
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 18
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 16
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 19
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#2a2a2a"
            },
            {
                "lightness": 17
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#2a2a2a"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#bfbfbf"
            }
        ]
    }
]                       ;

map.setOptions({styles: styles});




}

initMap() 






});