<?php
    use App\Http\Controllers\JobsController;

?>


<div id="evPanel3" class="tab-pane fade">

<fieldset class="cross-sharing-fieldset">
    <div class="form-group" >
        <div class="col-md-12">
            <legend class="cross-sharing-legend">Create group</legend>
        </div>
        <div class="cross-sharing-content">
			<label class="custom-form-label" for="name-2">Group name</label>
			<input type="text" id="cs_group_name">

			<label class="custom-form-label" for="name-2">From social list</label>
			<form>
				<select id="choice_social2">
					<option>  </option>
					<option> Twitter </option>
					<option> FaceBook </option>
					<option> Instagram </option>
					<option> LinkedIn </option>
					<option> Google </option>
				</select>
			</form>

			<form class ="cs_form">
				<div id="cs_div_1">
					<label class="custom-form-label" for="name-2">From account</label>
					<button type="button" onclick="Add_to_group_003(del3,alter_json2)" class="cs_button"> >> </button>
					<select id="Select_from_db3" name="Select_from_db3" class="cs_selected" multiple>
						{{--@php $i=0; @endphp--}}
						{{--@foreach($data as $dat)--}}
							{{--<option id ="option_from_db_2_{{$i++}}" class="option_from_db_2_" value="{{ $dat }}">{{ $dat }} </option>--}}
						{{--@endforeach--}}
					</select>
				</div>
				<div id="cs_div_2">
					<label class="custom-form-label" for="name-2">To</label>
					<button type="button" onclick="delete_from_group_004(alter_json2,del3,del3,(options2))" class="cs_button"> << </button>
					<select id="alter_json2" name="alter_json2" class="cs_selected" multiple></select>
				</div>
			</form>
			<form>
				<button type="button" onclick="parsing_005()" class="cs_button cross-button-margn">Create group</button>
			</form>

        </div>
	</div>
</fieldset>


</div>




<script>

    var form = document.forms[0];

    var select_to_group = document.getElementById("select_to_group");
    var del3 = document.getElementById("Select_from_db3");
    var alter_json2 = document.getElementById("alter_json2");
    var choice_social2 = document.getElementById("choice_social2");

    var select = form.elements.Select_from_db;

    var options2 = 'option_from_db_2_';

    

    //hide all options
	function hidden(selects) {
        for (var i = 0; i < selects.options.length; i++) {
            var option = selects.options[i];
            option.style.display = "none";
        }

        $("select option").text(function (i, t) {
            return t.replace('\\\\Name', '');
        });
    }
    // get all options again
	function get_again2() {
        var choice_socials = $("#choice_social2 option:selected").val();

		if(choice_socials != "") {
            //console.log(alter);
            $.ajax({
                url: '/cross-sharing-get_all',
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'html',
                data: {social: choice_socials}
            })
                .done(function(data) {
                    console.log("success");
                })
                .fail(function(data) {
                    console.log("error");
                    console.log(data);
                })
                .success(function(data) {

                    var d = data.replace("[","");
                    d = d.replace("]","");
                    dat = d.split(',');

                    $(del3.options).remove();


                    for(var i = 0; i <dat.length ; i++){

                        dat[i] = dat[i].replace("\\\\","");
                        dat[i] = dat[i].replace(new RegExp("\"", 'g'), '');

                        if(dat[i].indexOf("}") !== -1){
                            dat[i] = dat[i].replace("}","");
                        }
                        if(dat[i].indexOf("{") !== -1) {
                            dat[i] = dat[i].replace("{","");
                        }
                        if(dat[i].indexOf("Twitter") !== -1){
                            //dat[i] = dat[i].substring(dat[i].indexOf(":") + 1);
                            dat[i] = dat[i].substring(dat[i].indexOf("Twitter"));
                        }
                        if(dat[i].indexOf("FaceBook") !== -1){
                            dat[i] = dat[i].substring(dat[i].indexOf("FaceBook"));
                        }
                        if(dat[i].indexOf("Instagram") !== -1){
                            dat[i] = dat[i].substring(dat[i].indexOf("Instagram"));
                        }
                        if(dat[i].indexOf("LinkedIn") !== -1){
                            dat[i] = dat[i].substring(dat[i].indexOf("LinkedIn"));
                        }
                        if(dat[i].indexOf("Google") !== -1) {
                            dat[i] = dat[i].substring(dat[i].indexOf("Google"));
                        }

                        if (choice_social2.value == "Twitter")
                        {
                            if (dat[i].indexOf("Twitter") != -1)
                            {
                                $(del3).append($("<option></option>").attr("value",dat[i]).text(dat[i]));
                                $(del3.options).show();
                                //console.log(dat[i]);
                            }
                        }
                        if (choice_social2.value == "FaceBook")
                        {
                            if (dat[i].indexOf("FaceBook") != -1)
                            {
                                $(del3).append($("<option></option>").attr("value",dat[i]).text(dat[i]));
								$(del3.options).show();
                                //console.log(dat[i]);
                            }
                        }
                        if (choice_social2.value == "Instagram")
                        {
                            if (dat[i].indexOf("Instagram") != -1)
                            {
                                $(del3).append($("<option></option>").attr("value",dat[i]).text(dat[i]));
                                $(del3.options).show();
                                //console.log(dat[i]);
                            }
                        }
                        if (choice_social2.value == "LinkedIn")
                        {
                            if (dat[i].indexOf("LinkedIn") != -1)
                            {
                                $(del3).append($("<option></option>").attr("value",dat[i]).text(dat[i]));
                                $(del3.options).show();
                                //console.log(dat[i]);
                            }
                        }
                        if (choice_social2.value == "Google")
                        {
                            if (dat[i].indexOf("Google") != -1)
                            {
                                $(del3).append($("<option></option>").attr("value",dat[i]).text(dat[i]));
                                $(del3.options).show();
                                //console.log(dat[i]);
                            }
                        }
                    }

                })
                .always(function(data) {
                    console.log("complete");
                })
        }

        $("select option").text(function (i, t) {
            return t.replace('\\\\Name', '');
        });
    }


    choice_social2.addEventListener("change",function () {
        get_again2();
        for (var i = 0; i < del3.options.length; i++) {
            var option = del3.options[i];
            // enable options
            if(choice_social2.value == "Twitter"){
                if(!option.value.indexOf("Twitter")){
                    option.style.display = "block";
                }
            }
            if(choice_social2.value == "FaceBook"){
                if(!option.value.indexOf("FaceBook")){
                    option.style.display = "block";
                }
            }
            if(choice_social2.value == "Instagram"){
                if(!option.value.indexOf("Instagram")){
                    option.style.display = "block";
                }
            }
			if(choice_social2.value == "LinkedIn"){
                if(!option.value.indexOf("LinkedIn")){
                    option.style.display = "block";
                }
            }
            if(choice_social2.value == "Google"){
                if(!option.value.indexOf("Google")){
                    option.style.display = "block";
                }
            }
            $("select option").text(function (i, t) {
                return t.replace('\\\\Name', '');
            });
        }

    });

    // add to group
    function Add_to_group_003(selects,select_to_groups) {
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
        sortSelect($("#alter_json2"), 'text', 'asc');
        var usedNames = {};
        $("select[name='alter_json2'] > option").each(function () {
            if(usedNames[this.text]) {
                $(this).remove();
            } else {
                // usedNames[this.text] = this.value;
                usedNames[this.text] = this.value.replace('\\\\Name', '');
            }
        });

        $("select option").text(function (i, t) {
            return t.replace('\\\\Name', '');
        });
    }

	/*
	 * There we are delete and sort selected
	 */

    function delete_from_group_004(selects,Select_from_db,dels,ids) {
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
            if(option.value.indexOf("Group") != -1){
                option.remove(option.selectedIndex);
            }
            else{
                dels.add(options);
			}
            count.sort();
        }

        //sort
        sortSelect(Select_from_db, 'text', 'asc');
        var usedNames = {};
        $("select[name='Select_from_db3'] > option").each(function () {
            if(usedNames[this.text]) {
                $(this).remove();
            } else {
                // this.value.replace('\\\\Name', '');
                usedNames[this.text] = this.value.replace('\\\\Name', '');
            }
        });

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

        $("select option").text(function (i, t) {
            return t.replace('\\\\Name', '');
        });
    };

    //parsing_005 our put and send

    function parsing_005() {
        var json_key = [];
        for (var i = 0; i < alter_json2.options.length; i++) {
            var options = alter_json2.options[i];

			/*
			 * Here parsing_005 option value;
			 */
            // get key value
            var str_key = options.value.split("\\\\");
            var buff_key = str_key[0];

            //delete name from str
            var str = options.value.split("Name: ");
            var string_buff = str[1];
            //console.log(string_buff);

            // get name value
            var name_buff = string_buff.substring(0, string_buff.indexOf(' ID'));
            if (buff_key == 'Twitter') {
                name_buff = string_buff;
            }

            // get id value
            var id = string_buff.split("ID: ");
            var id_buff = id[1];
            id = id_buff;

            //add and convert array to json
            json_key.push({"key": buff_key, "name": name_buff, "id": id_buff});
        }
        console.log(JSON.stringify(json_key));
        var cs_group_name = $("#cs_group_name").val();

		/*
		 * send file to db
		 */

        $.ajax({
            url: '/cross-sharing-creat_group',
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'html',
            data: {param1: JSON.stringify(json_key),group_name:cs_group_name}
        })
            .done(function(data) {
                console.log("success");
            })
            .fail(function(data) {
                console.log("error");
                console.log(data);
            })
            .success(function(data) {
                $("#alter").append($("<option></option>").attr("value",data).text(cs_group_name));
                //$("#alter_json2").append($("<option></option>").attr("value",data).text(JSON.stringify(json_key)));
                var $options = $("#select_to_group > option").clone();
                $('#alter_json2').append($options);
                $('#alter_json2').append($options);
                location.reload();
                // then we do reload
            })
            .always(function(data) {
                console.log("complete");
            })
        $("select option").text(function (i, t) {
            return t.replace('\\\\Name', '');
        });
    }

</script>

