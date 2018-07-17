jQuery(document).ready(function($) {

	/**
	 * Aimee Tooltip   
	 */

	function showTooltip(type) {
	    
		var styles = {
	    	opacity : "1",
	    	visibility: "visible",
	    	display: "block"
	    };
	    $("span.aimee-tooltip"+type).css( styles );
	   
	}


	function hideTooltip(type) { 

    	var styles = {
	    	opacity : "0",
	    	visibility: "hidden"
	    };
	    $("span.aimee-tooltip"+type).css( styles );

    }

    


	/**********************************
	 * RSS-script tooltip events
	 */
	// $(document).on("focusin", "input.form-control", function(event) {
	$(document).on("focusin", "input.rss_url", function(event) {
		if (!$('input#rss-show-tooltips').is(':checked')) {
		    showTooltip(".rss-tooltip");
		}
	});

	$(document).on("focusout", "input.rss_url", function(event) {
    	hideTooltip(".rss-tooltip");
	});

	$(document).on("focusin", "select.rss-type", function(event) {
	    if (!$('input#rss-show-tooltips').is(':checked')) {
	    	showTooltip(".type-tooltip");
	    }
	});

	$(document).on("focusout", "select.rss-type", function(event) {
    	hideTooltip(".type-tooltip");
	});

	$(document).on("focusin", "input.rss-count", function(event) {
	    if (!$('input#rss-show-tooltips').is(':checked')) {
	    	showTooltip(".count-tooltip");
	    }
	});

	$(document).on("focusout", "input.rss-count", function(event) {
    	hideTooltip(".count-tooltip");
	});
	
	$(document).on("focusin", "input.rss-type-data", function(event) {
	    if (!$('input#rss-show-tooltips').is(':checked')) {
	    	showTooltip(".type-data-tooltip");
	    }
	});

	$(document).on("focusout", "input.rss-type-data", function(event) {
    	hideTooltip(".type-data-tooltip");
	});
	/**
	 * 
	 **********************************/


	/**********************************
	 * AutoRetweet tooltip events
	 */
	$(document).on("focusin", "input.autoretweet-keyword", function(event) {
		// if (!$('input#rss-show-tooltips').is(':checked')) {
		    showTooltip(".autoretweet-keyword-tooltip");
		// }
	});

	$(document).on("focusout", "input.autoretweet-keyword", function(event) {
    	hideTooltip(".autoretweet-keyword-tooltip");
	});
	/**
	 * 
	 **********************************/


	/**********************************
	 * DeleteOldTweets tooltip events
	 */
	$(document).on("focusin", "input.delete-old-tweets", function(event) {
		// if (!$('input#rss-show-tooltips').is(':checked')) {
		    showTooltip(".deleteOldTweets-date-tooltip");
		// }
	});

	$(document).on("focusout", "input.delete-old-tweets", function(event) {
    	hideTooltip(".deleteOldTweets-date-tooltip");
	});
	/**
	 * 
	 **********************************/


	/**********************************
	 * RetweetFromListByKeywords tooltip events
	 */
	$(document).on("focusin", "input.retweet-by-keywords-0", function(event) {
		// if (!$('input#rss-show-tooltips').is(':checked')) {
		    showTooltip(".retweet-from-list-tooltip-0");
		// }
	});

	$(document).on("focusout", "input.retweet-by-keywords-0", function(event) {
    	hideTooltip(".retweet-from-list-tooltip-0");
	});

	$(document).on("focusin", "input.retweet-by-keywords-1", function(event) {
		// if (!$('input#rss-show-tooltips').is(':checked')) {
		    showTooltip(".retweet-from-list-tooltip-1");
		// }
	});

	$(document).on("focusout", "input.retweet-by-keywords-1", function(event) {
    	hideTooltip(".retweet-from-list-tooltip-1");
	});
	/**
	 * 
	 **********************************/


	/**********************************
	 * RetweetFromListByHashtags tooltip events
	 */
	$(document).on("focusin", "input.retweet-by-hashtags-0", function(event) {
		// if (!$('input#rss-show-tooltips').is(':checked')) {
		    showTooltip(".retweet-by-hashtags-tooltip-0");
		// }
	});

	$(document).on("focusout", "input.retweet-by-hashtags-0", function(event) {
    	hideTooltip(".retweet-by-hashtags-tooltip-0");
	});

	$(document).on("focusin", "input.retweet-by-hashtags-1", function(event) {
		// if (!$('input#rss-show-tooltips').is(':checked')) {
		    showTooltip(".retweet-by-hashtags-tooltip-1");
		// }
	});

	$(document).on("focusout", "input.retweet-by-hashtags-1", function(event) {
    	hideTooltip(".retweet-by-hashtags-tooltip-1");
	});
	/**
	 * 
	 **********************************/


	/**********************************
	 * RetweetFromListByHashtags tooltip events
	 */
	$(document).on("focusin", "input.all-popular-input-0", function(event) {
		// if (!$('input#rss-show-tooltips').is(':checked')) {
		    showTooltip(".all-popular-tooltip-0");
		// }
	});

	$(document).on("focusout", "input.all-popular-input-0", function(event) {
    	hideTooltip(".all-popular-tooltip-0");
	});

	/**
	 * 
	 **********************************/


	/**********************************
	 * FavouriteTweetByContent tooltip events
	 */
	$(document).on("focusin", "input.fav-by-content-input-0", function(event) {
		// if (!$('input#rss-show-tooltips').is(':checked')) {
		    showTooltip(".fav-by-content-tooltip-0");
		// }
	});

	$(document).on("focusout", "input.fav-by-content-input-0", function(event) {
    	hideTooltip(".fav-by-content-tooltip-0");
	});

	/**
	 * 
	 **********************************/

	

	/** Some backuped code... */
	// $(document).on('mouseover', 'input.form-control', function() { showTooltip(); } );
	// $(document).on('mouseout', 'input.form-control', function() { setTimeout(hideTooltip, 1500); } );
	/*$.when(show_script_description).then(function( x ) {
    	alert('ok');
	    // showTooltip();
	    // $(document).on('click', '#DiscriptionButton', function() { setTimeout(showTooltip, 3000); } );
	});*/



});