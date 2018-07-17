

$("#run_shedule_infinitely").attr("checked", false);
/**
 * Parsing, saving and run user synchronization script
 * 
 * @return {[type]} [description]
 */
function save_user_sync() {

    $('#myPleaseWait').modal('show');

    /**
     *  All commented things copied from app.js save_user_scrypt() and may be helpful
     *
     *  @todo       But it better to remove this commented things
     */
    // var social_network_count = $('#jobs_select_social_network option:selected').length;
    // var social_network = [];
    // var script_parameters = [];
    // var script_name_parameters = [];
    // var source_network = [];
    // var source_accounts = [];
    // var source_network_count = $('#targetSocMedia option:selected').length;
    // var source_accounts_arr = $('#targetAccount option:selected').length;
    // var param_length = $('#add_script_parameters [id^=script_param_]').length;
    // console.log(param_length);

    /*console.log($('#add_script_parameters input'));
    for ( i = 0; i < social_network_count; i++ ){
        social_network[i] = $('#jobs_select_social_network option:selected').text();
    }*/
    /*for ( i = 0; i < source_network_count; i++ ){
        source_network[i] = $( "#targetSocMedia option:selected" ).text();
    }*/

    // Target account: 
    /*for ( i = 0; i < source_accounts_arr; i++ ){
        source_accounts[i] = $( "#targetAccount option:selected" ).text();
    }*/

    // console.log('Param length: ' + param_length);
    /*for ( i = 0; i < param_length; i++ ){
        script_name_parameters[i] = $('#script_label_param_'+i).text();
        script_parameters[i] = $('#script_param_'+i).val();
        console.log(script_name_parameters[i]);
        console.log(script_parameters[i]);
    }*/

    // $result['user_id'] = $user_id;

    // $result['user_account'] = $user_account_arr;

    // $result['target_accaunt'] = $user_target_account_arr;

    // $result['shedule_script_hours'] = $request['shedule_script_hours'];

    // $result['shedule_script_minutes'] = $request['shedule_script_minutes'];

    // $result['script_total_repeat'] = $request['script_total_repeat'];

    var _token = $("input[name='_token']").val();

    var user_id = Spark.userId;
    var user_account = [];
    var target_accaunt = [];
    var shedule_script_step_time = $("#sync_steps_time").val().split(":");
        var shedule_script_hours = shedule_script_step_time[0];
        var shedule_script_minutes = shedule_script_step_time[1];
    var script_total_repeat = $( "#sync_total_repeat").val();
    var run_shedule_infinitely = $("#run_shedule_infinitely");
    var script_name = 'Sync'; //$('#selectedScript option:selected').text();
    var check_shedule = 'on'; //$( "input[name='options_shedule']:checked" ).val();
    // var user_message = $('#summernote').val();
    // var time_shedule = $('#wizard_shedule_datepicker').val();
    

    if ($('#Select_from_db_content option').size() < 1) {
        var output = "<h5 class=\"text-danger\">Error: List of origin accounts is empty</h5>";
        $('#out').html(output);
        $('#myPleaseWait').modal('hide');

        return false;
    }
    if ($('#select_to_group_content option').size() < 1) {
        var output = "<h5 class=\"text-danger\">Error: List of target accounts is empty</h5>";
        $('#out').html(output);
        $('#myPleaseWait').modal('hide');

        return false;
    }
    

    $('#Select_from_db_content option').each(function(index, element){
        // if (($( this ).text().indexOf("\\") + $( this ).text().indexOf("Name:") + $( this ).text().indexOf("ID:")) >= 0) {
            user_account.push($( this ).text());
        // }
    });

    $('#select_to_group_content option').each(function(index, element){
        // if (($( this ).text().indexOf("\\") + $( this ).text().indexOf("Name:") + $( this ).text().indexOf("ID:")) >= 0) {
            target_accaunt.push($( this ).text());
        // }
    });

    var radiobtn = $( "input[name='run_shedule_infinitely']:checked" );
    if(radiobtn.val() == "infinitely") {
        script_total_repeat = -1;
    }

    var x = 1;   

    $.ajax({
        type:'post',
        url:'/save_user_sync',
        data:{
            user_id:user_id,
            // social_network:social_network,
            user_account:user_account,
            script_name:script_name,
            // user_message:user_message,
            check_shedule:check_shedule,
            // time_shedule:time_shedule,
            // source_network:source_network,
            // source_accounts:source_accounts,
            // script_name_parameters:script_name_parameters,
            // script_parameters:script_parameters,
            run_shedule_infinitely: run_shedule_infinitely.prop("checked"),
            shedule_script_hours:shedule_script_hours,
            shedule_script_minutes:shedule_script_minutes,
            script_total_repeat:script_total_repeat,
            shedule_script_step_time:shedule_script_step_time,
            target_accaunt:target_accaunt,
            _token:_token,
        },
        success:function(html) {
            $('#out').html(html);
            $('#myPleaseWait').modal('hide');

            console.log(html);
        },
        error:function(data, request, error) {
            console.log(error);
            $('#myPleaseWait').modal('hide');

        },
        done:function(data) {
            $('#myPleaseWait').modal('hide');

        }
    });
}
