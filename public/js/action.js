jQuery(document).ready(function($) {

	

});


// maks_2: finish it
$(window).on('beforeunload', function(event) {
    if ($('#selectedScript option:selected').text() != "RSS Repost")
    	save_action_data_to_session();
});

$(document).on("focusout", ".panel-body:visible input", function(event) {
    if ($('#selectedScript option:selected').text() != "RSS Repost")
    	save_action_data_to_session();
});

// alert( document.cookie );


// calling in /app/Plugins/AutoRetweet:194
// <label class="btn btn-primary check_run_btn active btn-group" id="DiscriptionButton" onclick="close_popup();save_action_data_to_session();">;
function save_action_data_to_session() {
    // Adding to session:
    var form_data = [];
    var _token = $("input[name='_token']").val();
    var social_network = $('select#jobs_select_social_network option:selected').val();
    var script_name = $('#selectedScript option:selected').text();
    var user_account = $('#accounts_under_social_network option:selected').text()
    // var get_param_1 = $('#get_param_1 option:selected').val();

    $(".popup:visible .panel-body .row").each(function(index) {
        form_data.push( $(this).find("input").val() );
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': _token
        }
    });                
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': _token
        },
        dataType: 'json',
        async: true,
        // processData: false,
        // contentType: false,
        // cache: false,
        enctype: 'multipart/form-data',
        type:'post',
        url:'/save_action_user_params',
        data:{
            _token:_token,
            social_network:social_network,
            user_account:user_account,
            script_name:script_name,
            form_data:form_data,
        },
        success:function(content) {
            console.log("Saved Action session: ");
            console.log(content);
        },
        fail:function(content) {
            console.log('Fail: ');
            console.log(content);
        },

    });
}





function fill_action_form(script_name = 'RSS Repost') {

    // There are you can write a code for saving position of <option>
    // Only for first render the popup:
    if (script_name == 'RSS Repost') {
        fill_rss_form('keyword', render);
        return true;
    } 

    if (script_name == 'AutoRetweet' || script_name == 'DeleteOldTweets' || 
    	script_name == 'RetweetFromListByKeywords' || script_name == 'RetweetFromListByHashtags' 
    	|| script_name == 'AllPopularFromListRetweeter' || script_name == 'FavouriteTweetByContent') {

	    console.log('script_name:');
	    console.log(script_name);

	    var _token = $("input[name='_token']").val();
	    var script_name = $('#selectedScript option:selected').text();
	    var social_network = $('select#jobs_select_social_network option:selected').val();
	    var user_account = $('#accounts_under_social_network option:selected').text();

	    $.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': _token
	        }
	    });                
	    $.ajax({
	        headers: {
	            'X-CSRF-TOKEN': _token
	        },
	        dataType: 'json',
	        async: true,
	        // processData: false,
	        // contentType: false,
	        // cache: false,
	        enctype: 'multipart/form-data',
	        type:'post',
	        url:'/get_session_user_params',
	        data:{
	            _token:_token,
	            // info:'Maks Glebov session',
	            social_network:social_network,
	            user_account:user_account,
	            script_name:script_name,
	            // data:data,
	        },
	        success:function(data) {
	            console.log("Got session:");
	            console.log(data);

	            if (data.result && data.result.data) {

	                $(".popup:visible .panel-body .row").each(function(index) {
	                    $(this).find("input").val( '' );
	                    $(this).find("input").text = '';
	                    $(this).find("input").val( data.result.data[index] );
	                    $(this).find("input").text = data.result.data[index];
	                });
                    console.log('+ Forms filled');
	                
	            } else {

	                console.log('Action: data.result.data not found. Undefined');
	                
	            }
	        },
	        error:function(data) {
	        	console.log('Error');
	        	console.log(data);
	        },
	        complete:function(data) {
	            console.log("Completed");
	            // console.log(data);
	        }

	    });



    	return true;
    }

}



