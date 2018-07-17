jQuery(document).ready(function($) {
    actionsList("show", 1, true);
});

$('.show-actions').on('click', function(){
    actionsList("show", 1, true);
});

$(document).on('click', '#actions-table-prev', function(event){
    event.preventDefault();
    console.log('Prev');
    var pageNum = $('#action-table-page-num').text();
    --pageNum;
    actionsList("show", pageNum);
    return false;
});

$(document).on('click', '#actions-table-next', function(event){
    event.preventDefault();
    console.log('Next');
    var pageNum = $('#action-table-page-num').text();
    ++pageNum;
    console.log(pageNum);
    actionsList("show", pageNum);
    return false;
});

//Page jobs_strategy - delete user script data from table
function actionsList(operationType, pageNum = 1, onload = false) {
    var _token = $("input[name='_token']").val();
    var user_id = Spark.userId;
    // var id = id;

    $.ajax
    ({
        type:'post',
        url:'/get_actions_list',
        data:{
            _token:_token,
            user_id:user_id,
            // id:id
        },
        success:function(data) {

            switch (operationType) {
                case "show":
                    var html = '';
                    console.log('inshow');
                    if (typeof data.tableBody[pageNum] !== 'undefined') {
                        html = data.tableStart;
                        $.each(data.tableBody[pageNum], function(index, value) {
                            html += '' + value;
                        }); 
                        html += '' + data.tableEnd;
                        if (onload) {
                            $('#user_startegy_data').html(html);
                            $('span#action-table-page-num').text(pageNum);
                        } else {
                            $('#user_startegy_data').fadeOut('fast', function() {
                                $('#user_startegy_data').html(html);
                                $('span#action-table-page-num').text(pageNum);
                                $('#user_startegy_data').fadeIn('fast');
                            });
                        }                        
                    }

                    /**
                     * @todo : if cant show page than show prev page or nothing ..
                     */

                    if (data.tableBody == false && data.tableEnd == false) {
                        html += '' + data.tableStart;
                        $('#user_startegy_data').html(html);
                    }

                    break;
                
                default:
                    // statements_def
                    break;
            }
        },
        error:function(data) {
            console.log('Error: ');
            console.log(data);
        },
        done:function(data) {
            console.log('Done');
            console.log(data);
        },
    });
}