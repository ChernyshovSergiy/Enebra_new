var user = {

		follow : function( id , element)
		{


			$.ajax({

						url 		: '/account/follow/' + id,

						method 		: 'POST',

						dataType	: 'JSON',

						success		: function( obj )
						{ 

							$('#follower-' + id ).children('.subscr-button').addClass('hidden');

							$('#follower-' + id + ' ').children('.unsubscr-button').removeClass('hidden');
						}

					}) ;

			return false;

		},

		unfollow : function( id , element)
		{


			$.ajax({

						url 		: '/account/unfollow/' + id,

						method 		: 'POST',

						dataType	: 'JSON',

						success		: function( obj )
						{ 

							$('#follower-' + id ).children('.subscr-button').removeClass('hidden');

							$('#follower-' + id + ' ').children('.unsubscr-button').addClass('hidden');
						}

					}) ;

			return false;

		},

		edit    : function ( event ) {



            loader.show();

            $.ajax({

                url 		: '/account/edit',

				data 		: create_request( $('.edit-account-field' ) ),

                method 		: 'POST',

                dataType	: 'JSON',

                success		: function( obj )
                {


                    loader.hide();

                    toastr.clear();

                    toastr.success( obj )  ;


                },

				error 		: function ( obj ) { loader.hide(); create_messages( obj )	}

            }) ;
        }


};
