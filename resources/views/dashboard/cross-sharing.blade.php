@extends('spark::layouts.app')

@section('content')

    {{-- Money --}}
    @if(@$moneyEnd)
        {{-- <h2>Out of money</h2> --}}
    @else
        {{-- <h2>Has money</h2> --}}
    @endif

    <div class="wrapper">

        <!-- include left sidebar nav -->
        @include('dashboard.account-left-sidebar')

        <div class="main-panel">

            <!-- include top nav -->
            @include('dashboard.account-top-menu')

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Strategy content here -->
                            <div class="panel panel-default">
                                <div class="panel-heading">Startegy</div>

                                <div class="panel-body">
                                    <!-- Some text -->
                                    <ul class="nav nav-tabs" id="myTabEvents">
                                        <li class="active"><a class="tabnav btn btn-block btn-social btn-twitter" data-toggle="tab" href="#evPanel1"><span class="fa fa-user"></span>Cross-sharing</a></li>
                                        {{-- <li><a class="tabnav btn btn-block btn-social btn-facebook" data-toggle="tab" href="#evPanel2"><span class="fa fa-user"></span>Content synchronisation</a></li> --}}
                                        <li><a class="tabnav btn btn-block btn-social btn-linkedin" data-toggle="tab" href="#evPanel3"><span class="fa fa-user"></span>Create group</a></li>
                                        <li><a class="tabnav btn btn-block btn-social btn-linkedin" data-toggle="tab" href="#evPanel4"><span class="fa fa-user"></span>Edit group</a></li>
                                    </ul>


                                    <div class="tab-content" id="myTabContent">
                                    
                                        <!-- Panel 1 -->
                                        @include('dashboard.Sync.cross_sharing')
                                        <!-- Panel 2 -->
                                        {{-- @include('dashboard.Sync.content_sync') --}}
                                        <!-- Panel 3 -->
                                        @include('dashboard.Sync.new_tab')
                                        <!-- Panel 4 -->
                                        @include('dashboard.Sync.new_tab2')

                                    </div>
                                    

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <p class="copyright pull-right">
                        &copy; 2018 <a href="/home">Aimee</a>
                    </p>
                </div>
            </footer>
        
        {{-- <script type="text/javascript" src="js/rss.js"></script>'; --}}


        </div>
    </div>
    <input type="hidden" name="_token" value="{{ Session::token() }}">

    
    <!-- <script>
    
        var form = document.forms[0];
    
        var select_to_group = document.getElementById("select_to_group");
        var del = document.getElementById("Select_from_db");
        var del2 = document.getElementById("Select_from_db2");
        var alter_json = document.getElementById("alter_json");
    
        var select = form.elements.Select_from_db;
        var select2 = form.elements.Select_from_db2;
        var delet = form.elements.select_to_group;
    
        var options2 = 'option_from_db_2_' ;
        var options3 = 'option_from_db_3_' ;
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
    
        constant(select);
        constant(del2);
    
        // hide all before \\
    //    function hide(selects,option) {
    //        for(var k = 0 ; k< selects.options.length; k++) {
    //            var old_option = document.getElementById(option + k);
    //            var old_str = old_option.value.split("\\\\").pop();
    //            if(old_str != 'undefined'){
    //                old_option.text = old_str;
    //                //console.log(old_option.value);
    //            }
    //            else{
    //                old_option.text = old_str.value;
    //                //console.log(old_option.value);
    //            }
    //        }
    //    }
    
        // hide key in table
    
        //    del.addEventListener("load change",hide(select,"option_from_db"));
        //    del2.addEventListener("load change",hide(del2,"option_from_db_2_"));
    
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
    
            sortSelect(select_to_group, 'text', 'asc');
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
                dels.add(options);
                count.sort();
            }
            //sort
            sortSelect(Select_from_db, 'text', 'asc');
            //dels.addEventListener("load change",hide(dels,ids));
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
    
        function parsing() {
            var json_key = [];
            for (var i = 0; i < delet.options.length; i++) {
                var options = delet.options[i];
    
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
            var group_name = $("#group_name").val();
    
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
                    $("#alter").append($("<option></option>").attr("value",data).text(group_name));
                    //$("#alter_json").append($("<option></option>").attr("value",data).text(JSON.stringify(json_key)));
                    var $options = $("#select_to_group > option").clone();
                    $('#alter_json').append($options);
                    $('#alter_json').append($options);
                    // then we do reload
                })
                .always(function(data) {
                    console.log("complete");
                })
        }
        //end parsing and send
        
        function send(){
            var alter = $("#alter option:selected").val();
    
            if(alter != "") {
                //console.log(alter);
                $.ajax({
                    url: '/cross-sharing-select_groups',
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
                        while (alter_json.firstChild) {
                            alter_json.removeChild(alter_json.firstChild);
                        }
    
                        var json = JSON.parse(data);
    
                        // visible all options in select
                        for(var k = 0; k < del2.length; k++){
                            del2[k].style.visibility = "visible";
                            del2[k].style.display = "block";
                        }
                        // create options and hidden
                        for (var i = 0; i < json.length; i++) {
                            var counter = json[i];
                            counter = counter.key + "\\\\Name: " + counter.name + " ID: " + counter.id;
    
                            //create table from select1
                            var x = document.createElement("OPTION");
                            x.setAttribute("value", counter);
                            x.setAttribute("id", "option_from_db_3_"+i);
                            var t = document.createTextNode(counter);
                            x.appendChild(t);
                            document.getElementById("alter_json").appendChild(x);
                            // hidden options if founded
                            for(var j = 0; j < del2.length; j++){
                                if(del2[j].value == counter)
                                {
                                    del2[j].style.visibility = "hidden";
                                    del2[j].style.display = "none";
                                }
                            }
                        }
                    })
                    .always(function(data) {
                        console.log("complete");
                    })
            }
        }
    
    </script> -->





@endsection