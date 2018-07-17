<?php
    use App\Http\Controllers\JobsController;

?>



<div id="evPanel2" class="tab-pane fade">
    <!-- Содержимое панели 2 -->
    <div class="col-md-12">
	    <legend class="cross-sharing-legend">Content synchronization</legend>
		<form name="form">

		    <select id="db_content" name="db_content" class="cs_selected cs_div_2" multiple style="height: 400px;">
                @php $i=0; @endphp
                @foreach($data as $dat)
                    <option id ="option_from_db_content{{$i++}}" class="option_from_db_content" value="{{ $dat }}">{{ $dat }} </option>
                @endforeach
            </select>


            <button type="button" class="cs-button sync-to-right glyphicon glyphicon-arrow-up" onclick="delete_from_group_552(select_from,db_content,db_content,'option_from_db_content')">
            </button>

            <button type="button" class="cs-button sync-to-right glyphicon glyphicon-arrow-up" onclick="delete_from_group_552(select_to,db_content,db_content,'option_from_db_content')">
            </button>

            <button type="button" class="cs-button sync-to-right glyphicon glyphicon-arrow-down" onclick="Add_to_group_551(db_content, select_from)">
            </button>

            <button type="button" class="cs-button sync-to-right glyphicon glyphicon-arrow-down" onclick="Add_to_group_551(db_content, select_to)">
            </button>



            <select id="Select_from_db_content" name="Select_from_db_content" class="cs_selected cs_div_1 clear-b" multiple style="height: 400px;">
		    </select>

            <select id="select_to_group_content" name="select_to_group_content" class="cs_selected cs_div_2" multiple style="height: 400px;">
            </select>
			
			<label for="sync_total_repeat">Synchronization total repeat: </label>
		   	<input type="text" name="sync_total_repeat" id="sync_total_repeat" value="1" placeholder="how many times to repeat this script">
		   	
		    <label for="run_shedule_infinitely">Run shedule infinitely?</label>
			<input type="checkbox" id="run_shedule_infinitely" name="run_shedule_infinitely" value="Run Shedule infinitely">

			<label for="sync_total_repeat">Synchronization duration per step: </label>
		   	<!-- maks_2: todo: rename 'step length' -->
		   	<input type="text" name="sync_steps_time" id="sync_steps_time" value="5:10" placeholder="hours:minutes">
		    
		</form>

    

        <button type="button" class="cs-button sync-to-right glyphicon glyphicon-arrow-right" onclick="Add_to_group_551(del_content,select_to_group_content)"></button>
        <button type="button" class="cs-button sync-to-left  glyphicon glyphicon-arrow-left" onclick="delete_from_group_552(select_to_group_content,del_content,del_content,'option_from_db_content')"></button>

    
	</div>
    
    <div class="start-sync cross-button-margn col-md-12">
        <button type="button" class="sync-button sync-center" onclick="save_user_sync()">Synchronize</button>

        <!-- Modal Start here-->
        <div class="modal fade bs-example-modal-sm" id="myPleaseWait" tabindex="-1"
             role="dialog" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            <span class="glyphicon glyphicon-time"></span> Running actions...
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div class="progress">
                            <div class="progress-bar progress-bar-info progress-bar-striped active"
                                 style="width: 100%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal ends Here -->

        <pre id="out">
            
        </pre>
    </div>
		    
</div>




<script>

        $("select option").text(function (i, t) {
            return t.replace('\\\\Name', '');
        });

        jQuery(document).ready(function($) {

            
            
        });

        var form = document.forms[0];

        var select_to_group_content = document.getElementById("select_to_group_content");
        var del_content = document.getElementById("Select_from_db_content");
        constant(del_content);

        var select = form.elements.Select_from_db_content;
        var delet = form.elements.select_to_group_content;

        var select_from = document.getElementById("Select_from_db_content");
        var select_to = document.getElementById("select_to_group_content");

        var db_content = document.getElementById("db_content");
        var all_selects = form.elements.db_content;
        
        //constant
        function constant(selects) {
            for (var i = 0; i < selects.options.length; i++) {
                var option = selects.options[i];
                if (option.value == "Twitter" || option.value == "FaceBook" || option.value == "Group" ||
                    option.value == "LinkedIn" || option.value == "Google" || option.value == "Instagram") {
                    option.disabled = true;
                    option.style.textAlign = "right";
                }
            }
        }

        // console.log(Add_to_group_551(select,select_to_group_content));

        // add to group
        function Add_to_group_551(selects,select_to_groups) {
            //get length of all selected elements
            var count = [];
            for (var i = 0; i < selects.options.length; i++) {
                var option = selects.options[i];
                if(option.selected == true){
                    count.push(option);
                }
            }
            // add all selected elements to group
            for(var j =0; j < count.length; j++) {
                var options = document.createElement("option");
                options = count[j];
                if(count[j].text == "group"){
                    count[j].text ="group";
                }else{
                    count[j].text = count[j].value;
                }
                select_to_groups.add(options);
                //console.log(options.index);
                count.sort();
            }
            //sort

            sortSelect(select_to_groups, 'text', 'asc');

            $("select option").text(function (i, t) {
                return t.replace('\\\\Name', '');
            });
        }

        /*
        * There we are delete and sort selected
        */

        function delete_from_group_552(selects,Select_from_db,dels,ids) {
            //get length of all selected elements
            var count = [];
            for (var i = 0; i < selects.options.length; i++) {
                var option = selects.options[i];
                if(option.selected == true){
                    count.push(option);
                }
            }
            // add all selected elements to group
            for(var j =0; j < count.length; j++) {
                var options = document.createElement("option");
                options = count[j];
                if(count[j].text == "group"){
                    count[j].text ="group";
                }else{
                    count[j].text = count[j].value;
                }
                dels.add(options);
                count.sort();
            }
            //sort
            sortSelect(Select_from_db, 'text', 'asc');
            //dels.addEventListener("load change",hide(dels,ids));
            $("select option").text(function (i, t) {
                return t.replace('\\\\Name', '');
            });
        }

        // sort selected
        var sortSelect = function (select, attr, order) {
            if(attr === 'text'){
                if(order === 'asc'){
                    $(select).html($(select).children('option').sort(function (x, y) {
                        return $(x).val().toUpperCase() < $(y).val().toUpperCase() ? -1 : 1;
                    }));
                    $(select).get(0).selectedIndex = 0;
                    //e.preventDefault();
                }// end asc
                if(order === 'desc'){
                    $(select).html($(select).children('option').sort(function (y, x) {
                        return $(x).val().toUpperCase() < $(y).val().toUpperCase() ? -1 : 1;
                    }));
                    $(select).get(0).selectedIndex = 0;
                    //e.preventDefault();
                }// end desc
            }
        };

        //parsing our put and send      


        

        // -------------
        // Add_to_group_551(db_content, select_from);
        // Add_to_group_551(db_content, select_to);
        // delete_from_group_552(select_from, db_content, db_content, 'option_from_db_content');
        // delete_from_group_552(select_to, db_content, db_content, 'option_from_db_content');
        // -----------

        /*function add_to_group_551 (selects, to_group) {
            var count = [];
            for (var i = 0; i < selects.options.length; i++) {
                var option = selects.options[i];
                if(option.selected == true){
                    count.push(option);
                }
            }
            for(var j =0; j < count.length; j++) {
                var options = document.createElement("option");
                options = count[j];
                if(count[j].text == "group"){
                    count[j].text ="group";
                }else{
                    count[j].text = count[j].value;
                }
                to_group.add(options);
                //console.log(options.index);
                count.sort();
            }

            sortSelect(to_group, 'text', 'asc');
        }

        function delete_from_group_552 (selects) {
            // body... 
        }*/

    </script>
