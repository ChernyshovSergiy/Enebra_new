$( document ).ready(function() {
    

 $('[data-toggle="tooltip"]').tooltip();

            var sideslider = $('[data-toggle=collapse-side]');
            var sel = sideslider.attr('data-target');
            var sel2 = sideslider.attr('data-target-2');
            sideslider.click(function(event){
                $(sel).toggleClass('in');
                $(sel2).toggleClass('out');
            });


    $('.active_part.disabled input, .active_part.disabled select, .active_part.disabled button').attr('disabled', true);

    $('.addperson').click(function(){
        $(this).parent().find('.add_form').show();
    });
    $('.close_form').click(function(){
        $(this).closest(".add_form").hide();
    });

    $('.show_block_chron').click(function(){
        $(this).parent().find('.chron_form').show();
    });
    $('.chron_form_close').click(function(){
        $(this).closest(".chron_form").hide();
    });

    $('.show_block').click(function(){
        $(this).parent().find('.add_form').show();

    });

    $('.choose_potrebn input[type=radio]').click(function () {
        $('.choose_potrebn input[type=radio]:not(:checked)').closest('.form-group').removeClass("active");
        $('.choose_potrebn input[type=radio]:checked').closest('.form-group').addClass("active");
    });
    $('.choose_potrebn input[type=radio]:checked').closest('.form-group').addClass("active");


    $(".scroll_block").jScrollPane({
        verticalDragMinHeight: 60,
        verticalDragMaxHeight: 60
    });


    tinymce.init({
        selector: '.user_textarea',
        height: 360,
        plugins: [
            'advlist autolink lists link image charmap print preview placeholder anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code'
        ],
        toolbar: 'bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent blockquote | removeformat | image media',

        placeholder_attrs: { style: {position: 'absolute', top:'5px', left:0, color: '#99999C', padding: '1%', width:'98%', overflow: 'hidden', 'white-space': 'pre-wrap'} },
        theme_advanced_buttons3_add : "preview",
        plugin_preview_width : "500",
        plugin_preview_height : "600",
        statusbar: false,
        menubar:false
    });





    var total = $('.cr_questions').find('.item').length;
    var currentIndex = $('div.active').index() + 1;
    $('#slidetext').html(currentIndex + '/'  + total);

// This triggers after each slide change
    $('.carousel').on('slid.bs.carousel', function () {
        currentIndex = $('div.active').index() + 1;

        // Now display this wherever you want
        var text = currentIndex + '/' + total;
        $('#slidetext').html(text);
    });






    tinymce.init({
        selector: '.create_page',
        height: 360,
        plugins: [
            'advlist autolink lists link image charmap print preview placeholder anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste textcolor code'
        ],
        toolbar: 'undo redo | styleselect | bold italic underline | forecolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent blockquote | removeformat | image media',

        placeholder_attrs: { style: {position: 'absolute', top:'5px', left:0, color: '#99999C', padding: '1%', width:'98%', overflow: 'hidden', 'white-space': 'pre-wrap'} },
        theme_advanced_buttons3_add : "preview",
        plugin_preview_width : "500",
        plugin_preview_height : "600",
        statusbar: false,
        menubar:false
    });


    $('.headdrop .dropdown-menu').bind('click', function (e) { e.stopPropagation() })

    var messbl = $('.messanger')
    $('.new_message').click(function(){
        messbl.slideDown();
    });

    $('.close_messanger').click(function(){
        messbl.slideUp();
    });

    $( ".votes_block select, .uspage_cont select" ).selectmenu({});


    $('.blcharr').click(function(){
        $(this).toggleClass('collapsed');
        $(this).parent().find('.block-collapse').slideToggle();
    });
 


});




function create_request( fields )
{

    var data = new Object();

    for(var i = 0; i < fields.length ; i++ )
        data[fields[i].name] = fields[i].value

    return data;
}

