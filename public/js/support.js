$(document).ready(function() {
    $(".support-modal").click(function(event) {
        event.preventDefault();
        $("#modal-support").modal('show');
    });

    $("#cancel-send-to-suppot-btn").click(function(event) {
        // event.preventDefault();
        $("#modal-support").modal('hide');
    });

    /*$('#send-to-suppot-btn').click(function(event) {

    });*/
});

function sendMailToSupport()
{
	var email = $('#support-from').val();
	var subject = $('#support-subject').val();
	var text = $('#support-text').val();

	$.ajax({
		url: '/home/mail-to-support',
		type: 'POST',
		headers: {
            'X-CSRF-TOKEN': $('input[name=_token]').attr('value')
        },
		dataType: 'json',
		data: {
			email: email,
			subject: subject,
			text: text,
		},
		success: function(response) {
	        console.log(response);
	    },
		fail: function() {
			console.log("error");
		},
		always: function() {
			console.log("complete");
		}
	})

}




