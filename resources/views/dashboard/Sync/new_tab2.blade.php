<?php
    use App\Http\Controllers\JobsController;
?>

<div id="evPanel4" class="tab-pane fade">

<fieldset class="cross-sharing-fieldset">

    <div class="form-group" >
        <div class="col-md-12">
            <legend class="cross-sharing-legend">Edit group</legend>
        </div>    
        <div class="cross-sharing-content">
            <label class="custom-form-label" for="name-2">From groups</label>
            <form>
                <select id="alter3" name="alter3">
                    <option value=" "></option>
                    @php
                        $i=0;
                    @endphp
                    @foreach($group_names as $name)
                        <option id ="alter_option{{$i++}}" class="alter_option" value="{{ $name }}">{{ $name }} </option>
                    @endforeach
                </select>
                <input type="button" value="Select" class="cs_send" onclick="send2_006()">
                <input type="button" value="Delete" class="cs_send" onclick="cs_delete_007()">
                <input type="text" id="cs_group_rename">
                <input type="button" value="Rename" class="cs_send" onclick="rename_008()">
            </form>

            <label class="custom-form-label" for="name-2">From social list</label>
            <form>
                <select id="choice_social3">
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
                    <button type="button" onclick="Add_to_group(del4,alter_json3)" class="cs_button"> >> </button>
                    <select id="Select_from_db4" name="Select_from_db4" class="cs_selected" multiple>
                        {{--@php $i=0; @endphp--}}
                        {{--@foreach($data as $dat)--}}
                        {{--<option id ="option_from_db_2_{{$i++}}" class="option_from_db_2_" value="{{ $dat }}">{{ $dat }} </option>--}}
                        {{--@endforeach--}}
                    </select>
                </div>
                <div id="cs_div_2">
                    <label class="custom-form-label" for="name-2">To</label>
                    <button type="button" onclick="delete_from_group(alter_json3,del4,del4,(options2))" class="cs_button"> << </button>
                    <select id="alter_json3" name="alter_json3" class="cs_selected" multiple></select>
                </div>
            </form>
            <form>
                <button type="button" onclick="parsing2()" class="cs_button cross-button-margn">Edit group</button>
            </form>
        </div>
    </div>
</fieldset>

</div>




<script>

    var form = document.forms[0];

    var select_to_group = document.getElementById("select_to_group");
    var del4 = document.getElementById("Select_from_db4");
    var alter_json3 = document.getElementById("alter_json3");
    var choice_social3 = document.getElementById("choice_social3");


    var select2 = form.elements.Select_from_db4;

    var options2 = 'option_from_db_2_' ;

    //hide all options
    function hidden(selects) {
        for (var i = 0; i < selects.options.length; i++) {
            var option = selects.options[i];
            option.style.display = "none";
        }
    }
    // get all options again
    function get_again3() {
        var choice_socials = $("#choice_social3 option:selected").val();

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

                    $(del4.options).remove();


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

                        if (choice_social3.value == "Twitter")
                        {
                            if (dat[i].indexOf("Twitter") != -1)
                            {
                                $(del4).append($("<option></option>").attr("value",dat[i]).text(dat[i]));
                                $(del4.options).show();
                                //console.log(dat[i]);
                            }
                        }
                        if (choice_social3.value == "FaceBook")
                        {
                            if (dat[i].indexOf("FaceBook") != -1)
                            {
                                $(del4).append($("<option></option>").attr("value",dat[i]).text(dat[i]));
                                $(del4.options).show();
                                //console.log(dat[i]);
                            }
                        }
                        if (choice_social3.value == "Instagram")
                        {
                            if (dat[i].indexOf("Instagram") != -1)
                            {
                                $(del4).append($("<option></option>").attr("value",dat[i]).text(dat[i]));
                                $(del4.options).show();
                                //console.log(dat[i]);
                            }
                        }
                        if (choice_social3.value == "LinkedIn")
                        {
                            if (dat[i].indexOf("LinkedIn") != -1)
                            {
                                $(del4).append($("<option></option>").attr("value",dat[i]).text(dat[i]));
                                $(del4.options).show();
                                //console.log(dat[i]);
                            }
                        }
                        if (choice_social3.value == "Google")
                        {
                            if (dat[i].indexOf("Google") != -1)
                            {
                                $(del4).append($("<option></option>").attr("value",dat[i]).text(dat[i]));
                                $(del4.options).show();
                                //console.log(dat[i]);
                            }
                        }
                    }

                })
                .always(function(data) {
                    console.log("complete");
                })

            $("select option").text(function (i, t) {
                return t.replace('\\\\Name', '');
            });
        }
    }

    // hidden(del4);

    choice_social3.addEventListener("change",function () {
        get_again3();
//        hidden(del4);
        for (var i = 0; i < del4.options.length; i++) {
            var option = del4.options[i];
            // enable options
            if(choice_social3.value == "Twitter"){
                if(!option.value.indexOf("Twitter")){
                    option.style.display = "block";
                }
            }
            if(choice_social3.value == "FaceBook"){
                if(!option.value.indexOf("FaceBook")){
                    option.style.display = "block";
                }
            }
            if(choice_social3.value == "Instagram"){
                if(!option.value.indexOf("Instagram")){
                    option.style.display = "block";
                }
            }
            if(choice_social3.value == "LinkedIn"){
                if(!option.value.indexOf("LinkedIn")){
                    option.style.display = "block";
                }
            }
            if(choice_social3.value == "Google"){
                if(!option.value.indexOf("Google")){
                    option.style.display = "block";
                }
            }
        }

        $("select option").text(function (i, t) {
            return t.replace('\\\\Name', '');
        });
    });

    // add to group
    function Add_to_group(selects,select_to_groups) {
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
        sortSelect($("#alter_json3"), 'text', 'asc');
        var usedNames = {};
        $("select[name='alter_json3'] > option").each(function () {
            if(usedNames[this.text]) {
                $(this).remove();
            } else {
                usedNames[this.text] = this.value;
            }
        });

        $("select option").text(function (i, t) {
            return t.replace('\\\\Name', '');
        });ы
    }

    /*
     * There we are delete and sort selected
     */

    function delete_from_group(selects,Select_from_db,dels,ids) {
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
        $("select[name='Select_from_db4'] > option").each(function () {
            if(usedNames[this.text]) {
                $(this).remove();
            } else {
                usedNames[this.text] = this.value;
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

    //rename
    
    function rename() {
        var name = $("#alter3").val();
        var rename = $("#cs_group_rename").val();

        $.ajax({
            url: '/cross-sharing-rename',
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'html',
            data: {cs_name: name, cs_rename:rename}
        })
            .done(function(data) {
                console.log("success");
            })
            .fail(function(data) {
                console.log("error");
            })
            .success(function(data) {
                console.log(data);
                location.reload();
            })
            .always(function(data) {
                console.log("complete");
            })
        $("select option").text(function (i, t) {
            return t.replace('\\\\Name', '');
        });
    }

    //delete group

    function cs_delete_007() {
        var name = $("#alter3").val();

        $.ajax({
            url: '/cross-sharing-cs_delete_007',
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'html',
            data: {cs_name: name}
        })
            .done(function(data) {
                console.log("success");
            })
            .fail(function(data) {
                console.log("error");
            })
            .success(function(data) {
                console.log(data);
                if(data != ""){
                    var x = document.getElementById("alter3").selectedIndex;
                    var y = document.getElementById("alter3").options;
                    y[x].remove(y[x].this);
                }
            })
            .always(function(data) {
                console.log("complete");
            })
        $("select option").text(function (i, t) {
            return t.replace('\\\\Name', '');
        });
    }

    //parsing our put and send

    function parsing2() {
        var json_key = [];
        for (var i = 0; i < alter_json3.options.length; i++) {
            var options = alter_json3.options[i];

            /*
             * Here parsing option value;
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
        var group_name = $("#alter3").val();

        /*
         * send file to db
         */

        $.ajax({
            url: '/cross-sharing-edit_to_groups',
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'html',
            data: {param1: JSON.stringify(json_key),group_name:group_name}
        })
            .done(function(data) {
                console.log("success");
            })
            .fail(function(data) {
                console.log("error");
                console.log(data);
            })
            .success(function(data) {
                $("#alter3").append($("<option></option>").attr("value",data).text(group_name));
                //$("#alter_json").append($("<option></option>").attr("value",data).text(JSON.stringify(json_key)));
                var $options = $("#select_to_group > option").clone();
                $('#alter_json3').append($options);
                $('#alter_json3').append($options);
                // then we do reload
                location.reload();
            })
            .always(function(data) {
                console.log("complete");
            })
    }
    //end parsing and send

    function send2_006(){
        var alter = $("#alter3 option:selected").val();

        if(alter != "") {
            //console.log(alter);
            $.ajax({
                url: '/cross-sharing-edit_groups',
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'html',
                data: {alters: alter}
            })
                .done(function(data) {
                    console.log("success");
                })
                .fail(function(data) {
                    console.log("error");
                    console.log(data);
                })
                .success(function(data) {
                    console.log(data);
                    // delete options from select
                    while (alter_json3.firstChild) {
                        alter_json3.removeChild(alter_json3.firstChild);
                    }

                    var json2 = JSON.parse(data);

                    // visible all options in select
                    for(var k = 0; k < del4.length; k++){
                        del4[k].style.visibility = "visible";
                        del4[k].style.display = "block";
                    }
                    // create options and hidden
                    for (var i = 0; i < json2.length; i++) {
                        var counter = json2[i];
                        if(counter.key != "Twitter"){
                            counter = counter.key + "\\\\Name: " + counter.name + " ID: " + counter.id;
                        }
                        else if(counter.key == "Twitter"){
                            counter = counter.key + "\\\\Name: " + counter.name;
                        }
                        //create table from select1
                        var x = document.createElement("OPTION");
                        x.setAttribute("value", counter);
                        x.setAttribute("id", "option_from_db_4_"+i);
                        var t = document.createTextNode(counter);
                        x.appendChild(t);
                        document.getElementById("alter_json3").appendChild(x);
                        // hidden options if founded
                        for(var j = 0; j < del4.length; j++){
                            if(del4[j].value == counter)
                            {
                                del4[j].style.visibility = "hidden";
                                del4[j].style.display = "none";
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

</script>

