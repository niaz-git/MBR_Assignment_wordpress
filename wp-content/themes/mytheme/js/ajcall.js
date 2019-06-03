jQuery(document).ready( function($) {

   // alert("sd");

   





   $('.posttype').click(function(){
    var checked = []

    $('.posttype:checked').each(function(){
        // alert($(this).val());
         checked.push($(this).val());

        });
        $('#bloglistselect').find('option').remove();

if(checked.length ==0){
    return;
}
   // var productID =2;


    $.ajax ({
        url: './admin-ajax.php',
        type: 'POST',
        dataType: 'JSON',
        data: {
            // the value of data.action is the part AFTER 'wp_ajax_' in
            // the add_action ('wp_ajax_xxx', 'yyy') in the PHP above
            action: 'call_Get_posts_by_type',
            // ANY other properties of data are passed to your_function()
            // in the PHP global $_REQUEST (or $_POST in this case)
            id : checked
            },
        success: function (resp) {
            if (resp.success) {
                // if you wanted to use the return value you set 
                // in your_function(), you would do so via
                // resp.data, but in this case I guess you don't
                // need it
               // alert("success");

               resp.data.forEach(function(item) {

                // do something with `item`
                $('#bloglistselect').append('<option value="'+item.ID+'"  style="padding:5px; border-bottom:1px dashed #dddddd">'+item.post_name+'</option>');

            });
                //$('#product-' + productID + ' .item-product-footer-vote-container').html ('Thanks for your vote!') ;
                }
            else {
                // this "error" case means the ajax call, itself, succeeded, but the function
                // called returned an error condition
                alert ('Error: ' + resp.data) ;
                }
            },
        error: function (xhr, ajaxOptions, thrownError) {
            // this error case means that the ajax call, itself, failed, e.g., a syntax error
            // in your_function()
            alert ('Request failed: ' + thrownError.message) ;
            },
        }) ;

    });


   //$("#posttype:checked").

   //var ajaxurl = "../ajax-load.php"

	/*$.ajax({
		url: "http://yourwebsite.com",
		success: function( data ) {
			alert( 'Your home page has ' + $(data).find('div').length + ' div elements.');
        },
        error: function(){			alert( 'Your home page hass'); }
    
	})*/

})