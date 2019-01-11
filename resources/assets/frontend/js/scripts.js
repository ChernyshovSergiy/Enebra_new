$(document).ready(function(){


$.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });  

toastr.options = {

  closeButton : true,
  
  timeOut     : 7000,

  newestOnTop : false,
 
}

	//atctive menu start 
		if( $('.home a').attr('href') === window.location.href)
				$('.home').addClass('active')

		//active menu end

		$(document).scroll(function(){

			if($('body').scrollTop() > window.innerHeight)
					$('#go-to-top').fadeIn(400)
			else
					$('#go-to-top').fadeOut(400)

		});


  //////////////// participants 

  $('.check-form-group .filt-check input:checkbox').change(function(event){
      
      $('[name="' + this.getAttribute('name') + '"]').removeAttr('checked');

      this.setAttribute('checked', 'checked');

     var data =  create_participants_request( ) ;

  })


});

function create_participants_request()
{

          var data = { 
                          q           : $('.name-bock  [name=q]').val(),

                          country_id  : $('[name="country_id"]').val()

                      };

          var params = $('.check-form-group .filt-check input[checked="checked"]');

          for (var i = 0; i < params.length; i++)
              data[params[i].getAttribute('name')] = params[i].value ;

      send_filter_form( data ) ;

}


function send_filter_form( data )
{

        loader.show()
        $.ajax({

                url    : '/participants',

                method : 'POST',

                data   : data,

                success: function( obj ){

                      $('.participants-table .bottom tbody').html( obj )
                      loader.hide()
                },
                error  : function( obj ){
                  console.log( 'error' )
                }

              })


}
// function change_language( slug ){
//
// 	  loader.show()
//
//       $.ajax({
//
//           method  : 'POST',
//
//           url     : '/language',
//
//           data    : { slug  : slug},
//
//           dataType: 'JSON',
//
//           success : function( obj ){
//
//           		loader.hide();
//
//                 location.reload(true);
//           }
//
//       });
//
//       return false;
// }

function increment_term()
{
          $.ajax({

          method  : 'POST',

          url     : '/condition'

      }); 

}
 
function subscribe()
{ 
	loader.show()

    $.ajax({

            url     : '/subscribe',

            method  : 'POST',

            data    : { email   : $('[name="sub-email"]').val() },

            dataType: 'JSON',

            success : function( obj )
            {
				        loader.hide();
                
                toastr.clear();

                toastr.success( obj )  ; 

                $('[name="sub-email"]').val('')

            },

            error   : function( obj ) { loader.hide(); create_messages( obj ) }

           }) ;

}

function contacts()
{

        var data = {

                    name        : $('#input_name').val(),

                    email       : $('#input_email').val(),

                    message     : $('#input_message').val()
                    
                    }

        loader.show()

       $.ajax({

            url     : '/contact',

            method  : 'POST',

            data    : data,

            dataType: 'JSON',

            success : function( obj )
            {   
            	loader.hide();

                toastr.clear();

                toastr.success( obj )  ;  

                $('.contact-form-element').val('')

            },

            error   : function( obj ){ loader.hide(); create_messages( obj ) }

           }) ; 

}

function create_date( prefix )
{ 

    var data = {	
    				day 	: $('#' + prefix + 'day').val(),

    				month 	: $('#' + prefix + 'month').val(),

    				year 	: $('#' + prefix + 'year').val(),

    				text 	: $('#' + prefix + 'day option:first-child').text()
    		    };


    	$.ajax({

    			url 	: '/check/days', 

    			method 	: 'POST',

    			data 	: data,

    			dataType: 'JSON',

    			success : function ( obj )
    			{

    					var html = create_days( obj.days , data ) ;

    					$('#' + prefix + 'day').html( html ) ;



    			}

    			}) ;

}

function create_days( days, data )
{

	var html = "";

	for (var i = 0;  ( i < days + 1 ) ; i++){

		var select = '';

		if( i == data.day)
				select = "selected"; 


		if(i == 0 )
			html += '<option value="' + i + '" ' + select + ' >' + data.text  + '</option>' ;
		else
			html += '<option value="' + i + '" ' + select + '>' + i  + '</option>' ;

	}

	return html ;

}

function create_messages( obj )
{
    toastr.clear();

    var data  = JSON.parse( obj.responseText );

    for (value in data )  
            toastr.error( data[value] ) ;

}

var loader = {

  show : function (){$('.ajax-loader').removeClass('hidden'); },
  hide : function (){$('.ajax-loader').addClass('hidden'); }
}
