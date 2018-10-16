var auth = {

	signin : function( fields )
	{
					loader.show();
					$.ajax({

							url 	: '/auth/signin',

							method 	: 'POST',

							data 	: create_request( $('.' + fields ) ),

            				dataType: 'JSON', 

            				success : function( obj ){ loader.hide(); location.reload(true) },

            				error   : function( obj ){ loader.hide(); create_messages( obj ) }
		})

	}, 

	signup : function ( fields )
	{
					loader.show();

					$.ajax({

							url 	: '/auth/signup',

							method 	: 'POST',

							data 	: create_request( $('.' + fields ) ),

            				dataType: 'JSON',

            				success : function( obj )
            				{   

                				loader.hide();
                				
                				toastr.clear();

                				toastr.success( obj )  ;

								setTimeout( function(){location.reload(true)}, 5000)

            				},

            				error   : function( obj ){ loader.hide(); create_messages( obj ) }
		})
	},

	logout  : function(){
					
					loader.show()
					$.ajax({

							url 	: '/auth/logout',

							method 	: 'POST',

							success : function(){ loader.hide(); location.reload(true) }
			})
}, 

	trigger_avatar 	: function(){ $('#file').trigger('click')},

	avatar  :  function () {

    var fileInp = document.getElementById('file') ;

    var preview = document.getElementById('preview');

    var formData = new FormData() ;

    var reader  = new FileReader();

  	reader.onloadend = function () {
    preview.src = reader.result;
  }

  if (fileInp.files[0]) {
  	reader.readAsDataURL(fileInp.files[0]) ;
  } else {
    preview.src = "";
  }

    xhr = new XMLHttpRequest(),
 
    progressBar = document.querySelector('progress') ;
 
  	xhr.open('POST', '/auth/avatar', false);

  	formData.append('file', fileInp.files[0], fileInp.files[0].name);

	formData.append("_token", $('meta[name="_token"]').attr('content'));

  	var filename  = $('[filename="' + fileInp.files[0].name + '"]');

  	xhr.upload.onprogress = loader.show();
  
  	xhr.upload.onload = loader.hide();

  	xhr.send(formData);
  	
  	toastr.success(  JSON.parse( xhr.responseText ) );

}


}


