jQuery(document).ready(function($) {

});


$(window).on('beforeunload', function(event) {
    
    save_rss_to_session();

});
    

    /**
     * [forminfo description]
     * @type {Object}
     * @todo  сделать возможность загрузки максимум 20-ти изображений
     */
    

    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    today = mm+'/'+dd+'/'+yyyy;

    /*if(dd<10) {
        dd='0'+dd
    } 

    if(mm<10) {
        mm='0'+mm
    } 

    today = mm+'/'+dd+'/'+yyyy;
    document.write(today);*/

    /**
     * Object for render 
     * @type {Object}
     */
    var render = new function() {

        // this.fill_it = param1;

        this.keyword = function(fill = true) {
            var data = [];

            $html = '<div class="col-md-4">';
            $html += "<label for='script_param_3' class='col-md-4 actions-control-label text-right'>Keyword</label>";
            $html += "<label style='display:none;' for='script_param_3' id='script_label_param_3' class='col-md-4 actions-control-label text-right'>type_data</label>";
            $html += '</div>';
            $html += '<div class="col-md-6">';
            $html += '<input type="text" id="script_param_3" class="form-control" name="script_param_3" placeholder="keyword" value="keyword" required>';
            $html += '</div>';
            $('#for-render').empty();
            $('#for-render').html($html);

            $('input#script_param_1').val( $('#script_param_1').val() );

            var rString = randomString(200);
            $('input#script_param_4').val(rString);

            if (fill) {

                // console.log('in -> fill = ' + fill);

                $("#script_param_0:visible").val('');
                $("#script_param_0:visible").text = '';
                $("#script_param_0:visible").val('http://feeds.feedburner.com/LinuxJournalWebmaster');
                $("#script_param_0:visible").text = 'http://feeds.feedburner.com/LinuxJournalWebmaster';

                $("#script_param_2:visible").val('');
                $("#script_param_2:visible").text = '';
                $("#script_param_2:visible").val('5');
                $("#script_param_2:visible").text = '5';

                // console.log('FILL IT');

            } else {
                
                // console.log('in -> fill = ' + fill);
                
                $("#script_param_0:visible").val('');
                $("#script_param_0:visible").text = '';

                $("#script_param_2:visible").val('');
                $("#script_param_2:visible").text = '';

            }
            // render.fill_it = true;

        };

        this.random = function(fill) {
            $html = '<div class="col-md-4">';
            $html += "<label for='script_param_3' class='col-md-4 actions-control-label text-right' value='type_data'>You have chosen a random type</label>";
            $html += "<label style='display:none;' for='script_param_3' id='script_label_param_3' class='col-md-4 actions-control-label text-right' value='type_data'>type_data</label>";
            $html += '</div>';
            $html += '<div class="col-md-6">';
                $html += '<input type="text" disabled id="script_param_3" class="form-control" name="script_param_3" value="random" required>';
            $html += '</div>';
            $('#for-render').empty();
            $('#for-render').html($html);

            $('input#script_param_1').val( $('#script_param_1').val() );

            var rString = randomString(200);
            $('input#script_param_4').val(rString);

            if (fill) {

                // console.log('in -> fill = ' + fill);

                $("#script_param_0:visible").val('');
                $("#script_param_0:visible").text = '';
                $("#script_param_0:visible").val('http://feeds.feedburner.com/LinuxJournalWebmaster');
                $("#script_param_0:visible").text = 'http://feeds.feedburner.com/LinuxJournalWebmaster';

                $("#script_param_2:visible").val('');
                $("#script_param_2:visible").text = '';
                $("#script_param_2:visible").val('5');
                $("#script_param_2:visible").text = '5';

                // console.log('FILL IT');


            } else {

                // console.log('in -> fill = ' + fill);
                
                $("#script_param_0:visible").val('');
                $("#script_param_0:visible").text = '';

                $("#script_param_2:visible").val('');
                $("#script_param_2:visible").text = '';

            }
            // render.fill_it = true;

        };

        this.calendar = function(fill) {
            $html = '<div class="col-md-4">';
            $html += "<label for='script_param_3' class='col-md-4 actions-control-label text-right' value='type_data'>Calendar</label>";
            $html += "<label style='display:none;' for='script_param_3' id='script_label_param_3' class='col-md-4 actions-control-label text-right'>type_data</label>";
            $html += '</div>';
            $html += '<div class="col-md-6">';
                $html += '<input type="text" id="script_param_3" class="form-control" name="script_param_3" placeholder="Please write in format: dd.mm.yyyy" value="'+ today + '" required>';
            $html += '</div>';
            $('#for-render').empty();
            $('#for-render').html($html);

            $('input#script_param_1').val( $('#script_param_1').val() );

            var rString = randomString(200);
            $('input#script_param_4').val(rString);

            if (fill) {

                // console.log('in -> fill = ' + fill);

                $("#script_param_0:visible").val('');
                $("#script_param_0:visible").text = '';
                $("#script_param_0:visible").val('http://feeds.feedburner.com/LinuxJournalWebmaster');
                $("#script_param_0:visible").text = 'http://feeds.feedburner.com/LinuxJournalWebmaster';

                $("#script_param_2:visible").val('');
                $("#script_param_2:visible").text = '';
                $("#script_param_2:visible").val('5');
                $("#script_param_2:visible").text = '5';

                // console.log('FILL IT');

            } else {

                // console.log('in -> fill = ' + fill);
                
                $("#script_param_0:visible").val('');
                $("#script_param_0:visible").text = '';

                $("#script_param_2:visible").val('');
                $("#script_param_2:visible").text = '';

            }
            // render.fill_it = true;
        };

        this.lastTime = function(fill) {
            $html = '<div class="col-md-4">';
            $html += "<label for='script_param_3' class='col-md-4 actions-control-label text-right'>For last date</label>";
            $html += "<label style='display:none;' for='script_param_3' id='script_label_param_3' class='col-md-4 actions-control-label text-right' value='type_data'>type_data</label>";
            $html += '</div>';
            $html += '<div class="col-md-6">';
                $html += '<input type="text" id="script_param_3" class="form-control" name="script_param_3" placeholder="Please write in format: dd.mm.yyyy" value="'+ today + '" required>';
            $html += '</div>';
            $('#for-render').empty();
            $('#for-render').html($html);

            $('input#script_param_1').val( $('#script_param_1').val() );

            var rString = randomString(200);
            $('input#script_param_4').val(rString);

            if (fill) {

                // console.log('in -> fill = ' + fill);

                $("#script_param_0:visible").val('');
                $("#script_param_0:visible").text = '';
                $("#script_param_0:visible").val('http://feeds.feedburner.com/LinuxJournalWebmaster');
                $("#script_param_0:visible").text = 'http://feeds.feedburner.com/LinuxJournalWebmaster';

                $("#script_param_2:visible").val('');
                $("#script_param_2:visible").text = '';
                $("#script_param_2:visible").val('5');
                $("#script_param_2:visible").text = '5';

                // console.log('FILL IT');


            } else {

                // console.log('in -> fill = ' + fill);
                
                $("#script_param_0:visible").val('');
                $("#script_param_0:visible").text = '';

                $("#script_param_2:visible").val('');
                $("#script_param_2:visible").text = '';

            }
            // render.fill_it = true;
        };


    }


    // maks_2: to continue here
    /*$(document).on('mousedown', 'select#script_param_1', function(event) {

        console.log('mousedown');
        console.log(this.value); // keyword
        // save_rss_to_session();

    });*/

    /**
     * [description]
     * @param  {[type]} event) {                                           console.log(this.value);                                if (this.value [description]
     * @return {[type]}        [description]
     */
    $(document).on('change', 'select#script_param_1', function(event) {
        
        // console.log(this.value);
        
        if (this.value == 'keyword') {
            fill_rss_form(this.value, render);
        }
        else if (this.value == 'random') {
            fill_rss_form(this.value, render);
        }
        else if (this.value == 'calendar') {
            fill_rss_form(this.value, render);
        }
        else if (this.value == 'lastTime') {
            fill_rss_form(this.value, render);
        }
        else {
            fill_rss_form('keyword', render);
        }

    });


    /**
     * [description]
     * @param  {[type]} event)    {                                                                                            var input [description]
     * @param  {[type]} enctype:  'multipart/form-data' [description]
     * @param  {[type]} complete: function(xhr,         textStatus    [description]
     * @return {[type]}           [description]
     */
    $(document).on('click', '#img_button', function(event) {
        // e.preventDefault();
       
        var input = document.getElementById('images-input');
        // console.log(input.files);

        var token = $('[name="_token"]').attr('value') || $('meta[name="csrf-token"]').attr('content');
        
        // return false;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': token
            }
        });                
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': token
            },
            url: '/jobs_strategy/save_images',
            type: 'POST',
            dataType: 'json',
            async: true,
            processData: false,
            contentType: false,
            cache: false,
            data: new FormData(this),
            enctype: 'multipart/form-data',
            complete: function(xhr, textStatus) {
                // console.log('complete');
                // console.log(xhr);
                // console.log(textStatus);
            },
            success: function(data, textStatus, xhr) {
                // console.log('success');
                // console.log(data);
                // console.log(textStatus);
                // console.log(xhr);
            },
            // timeout: 10000,
            error: function(xhr, textStatus, errorThrown) {
                // console.log('error');
                // console.log(textStatus);
                // console.log(xhr);
                // console.log(errorThrown);
            }
        });

    });




    
$(document).on("focusout", "input.rss_url", function(event) {
    check_rss();
    return false;
});


function check_rss() {

    var urlVal = $("[placeholder=\"RSS link\"]").val();
    var token = $('[name="_token"]').attr('value') || $('meta[name="csrf-token"]').attr('content');

    $('.form-img').removeClass('hidden success-png error-png').addClass('loader-gif');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        }
    });
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': token
        },
        url: '/jobs_strategy/check_rss',
        type: 'POST',
        // dataType: 'json',
        dataType: "json",
        // async: true,
        // processData: false,
        // contentType: "text",
        cache: false,
        // data: {url: "Hello"},
        data: { url: urlVal },
        // enctype: 'multipart/form-data',
        complete: function(xhr, textStatus) {
            // console.log('complete');
            // console.log(xhr);
            // console.log(textStatus);
        },
        success: function(data, textStatus, xhr) {
            console.log('Check Rss Success');
            if (data.result == true) {
                $('.form-img').removeClass('hidden loader-gif error-png').addClass('success-png');
            } else {
                $('.form-img').removeClass('hidden success-png loader-gif').addClass('error-png');
            }
            
        },
        // timeout: 10000,
        error: function(data) {
            // console.log('error');
            // console.log(data);
        }
    });
    
}



function save_rss_to_session() {
    // Adding to session:
    var form_data = [];
    var _token = $("input[name='_token']").val();
    var social_network = $('select#jobs_select_social_network option:selected').val();
    var script_name = $('#selectedScript option:selected').text();
    var user_account = $('#accounts_under_social_network option:selected').text()
    var script_param_1 = $('#script_param_1 option:selected').val();

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
        url:'/save_rss_user_params',
        data:{
            _token:_token,
            // info:'Maks Glebov session',
            rss_script_type:script_param_1,
            social_network:social_network,
            user_account:user_account,
            script_name:script_name,
            form_data:form_data,
        },
        success:function(content) {
            // console.log("Saving session: ");
            // console.log(content);
        },
        complete:function(content) {
            // console.log("Completed");
            // console.log(content);
        },
        fail:function(content) {
            // console.log('Fail');
            // console.log(content);
        },

    });
}



function fill_rss_form(script_type = false, render = false) {

    // Adding to session:
    // var data = [];
    var fill_it = true;
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
            // console.log("WebDevel got session:");
            // console.log(data);

            fill_it = true;
            // console.log('fill_it = true');

            /*if (data.result) {
                fill_it = false;
                console.log('fill_it = false');
            }*/

            // if (data.result) {

            // console.log('data.result:');
            // console.log(data.result);

                if (script_type) {
                    // console.log('scriptType = true');

                    switch (script_type) {
                        case 'keyword':
                            // console.log('It is keyword');

                            if (data.result.keyword != undefined) {
                                if (data.result.keyword.data[0]) {
                                    fill_it = false;
                                    // console.log('fill_it = false');
                                }
                            }

                            render.keyword(fill_it);

                            if (data.result.keyword != undefined && data.result.keyword.data != undefined) {
                                $(".popup:visible .panel-body .row").each(function(index) {
                                    // console.log('++keyword');
                                    $(this).find("input").val( '' );
                                    $(this).find("input").text = '';
                                    $(this).find("input").val( data.result.keyword.data[index] );
                                    $(this).find("input").text = data.result.keyword.data[index];
                                    // console.log('+ Forms filled');
                                }); 
                            }

                            break;

                        case 'random':
                            // console.log('It is random');

                            if (data.result.random != undefined) {
                                if (data.result.random.data[0]) {
                                    fill_it = false;
                                    // console.log('fill_it = false');
                                    // console.log('data.result.random:');
                                    // console.log(data.result.random);

                                }
                            }

                            render.random(fill_it);

                            if (data.result.random != undefined && data.result.random.data != undefined) {
                                $(".popup:visible .panel-body .row").each(function(index) {
                                    // console.log('++random');
                                    $(this).find("input").val( '' );
                                    $(this).find("input").text = '';
                                    $(this).find("input").val( data.result.random.data[index] );
                                    $(this).find("input").text = data.result.random.data[index];
                                    // console.log('+ Forms filled');
                                });  
                            }
                            
                            break;

                        case 'calendar':
                            // console.log('It is calendar');

                            if (data.result.calendar != undefined) {
                                if (data.result.calendar.data[0]) {
                                    fill_it = false;
                                    // console.log('fill_it = false');
                                }
                            }

                            render.calendar(fill_it);

                            if (data.result.calendar != undefined && data.result.calendar.data != undefined) {
                                $(".popup:visible .panel-body .row").each(function(index) {
                                    // console.log('++calendar');
                                    $(this).find("input").val( '' );
                                    $(this).find("input").text = '';
                                    $(this).find("input").val( data.result.calendar.data[index] );
                                    $(this).find("input").text = data.result.calendar.data[index];
                                    // console.log('+ Forms filled');
                                });
                            }
                            break;

                        case 'lastTime':
                            // console.log('It is lastTime:');
                            // console.log(data.result);

                            if (data.result.lastTime != undefined) {
                                if (data.result.lastTime.data[0]) {
                                    fill_it = false;
                                    // console.log('fill_it = false');
                                }
                            }

                            render.lastTime(fill_it);

                            if (data.result.lastTime != undefined && data.result.lastTime.data != undefined) {
                                $(".popup:visible .panel-body .row").each(function(index) {
                                    // console.log('++lastTime');
                                    $(this).find("input").val( '' );
                                    $(this).find("input").text = '';
                                    $(this).find("input").val( data.result.lastTime.data[index] );
                                    $(this).find("input").text = data.result.lastTime.data[index];
                                    // console.log('+ Forms filled');
                                });
                            }
                            break;

                        default:
                            // console.log('It is default');

                            // if (data.result.keyword != undefined) {
                                if (data.result.keyword.data[0]) {
                                    fill_it = false;
                                    // console.log('fill_it = false');
                                }
                            // }
                            
                            render.keyword(fill_it);

                            if (data.result.keyword != undefined && data.result.keyword.data != undefined) {
                                $(".popup:visible .panel-body .row").each(function(index) {
                                    // console.log('++default');
                                    $(this).find("input").val( '' );
                                    $(this).find("input").text = '';
                                    $(this).find("input").val( data.result.keyword.data[index] );
                                    $(this).find("input").text = data.result.keyword.data[index];
                                    // console.log('+ Forms filled');
                                });
                            }
                            break;

                    }
                    /*$(this).find("input").val( '' );
                    $(this).find("input").text = '';
                    $(this).find("input").val( data.result.data[index] );
                    $(this).find("input").text = data.result.data[index];
                    console.log('+ Forms filled');*/

                } else {

                    $(".popup:visible .panel-body .row").each(function(index) {
                        /*if ($(this).find("select")) {
                            $(this).find("select option").each(function(index, element){
                                if ($(element).value == data.data[index]) {
                                    $(element).attr("selected", "selected");
                                }
                            });
                        }*/
                        $(this).find("input").val( '' );
                        $(this).find("input").text = '';
                        $(this).find("input").val( data.result.data[index] );
                        $(this).find("input").text = data.result.data[index];
                        // console.log('+ Forms filled');
                    });

                }

            /*} else {

                console.log('Data not found. False returned');
                
            }*/
        },
        complete:function(data) {
            // console.log("Completed");
            // console.log(data);
        }

    });

}





$(document).on("focusout", ".rss-popup:visible input", function(event) {

    // One time is not enough for some reason
    save_rss_to_session();
    // save_rss_to_session();  

});


$(document).on("click", ".save_rss", function(event) {
    // $.when(save_rss_to_session()).then(close_popup, close_popup);
    save_rss_to_session();
    close_popup();
});

$(document).on('click', "select#script_param_1", function () {
    save_rss_to_session();
});



function remove_rss_session() {

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
        url:'/remove_rss_session',
        data:{
            _token:_token,
            // info:'Maks Glebov session',
            social_network:social_network,
            user_account:user_account,
            script_name:script_name,
            // data:data,
        },
        success:function(data) {
            console.log("Deleting session: ");
            console.log(data);
        },
        complete:function(data) {
            // console.log("Completed");
            // console.log(data);
        }

    });

}





