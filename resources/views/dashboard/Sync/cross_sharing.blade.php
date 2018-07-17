{{ csrf_field() }}


<div id="warning" >
    <div class="modal-dialog">
        <div class="modal-content" id="warning2">

            <div id="close"></div>
            <div id="warninghead"></div>
            <hr id="lines"/>

            <div id="warningbody">
                {{--<!-- First -->--}}
                {{--<div class="byPointsRight">--}}
                    {{--<p>Points : </p>--}}
                    {{--<input id="points" type="text"/>--}}
                {{--</div>--}}
                {{--<div class="byPointsLeft">--}}
                    {{--<p style="margin-right: 10px; float: left">Cost : </p>--}}
                    {{--<p id="pointCost"></p>--}}
                {{--</div>--}}
                {{--<hr/>--}}
                {{--<!-- Second -->--}}
                {{--<div id="leftPoints" class="btn-group btn-group-vertical" data-toggle="buttons">--}}
                    {{--<label class="btn">--}}
                        {{--<input type="radio" id="gender1_1" name='gender1' ><i class="fa fa-circle-o fa-2x"></i><i class="fa fa-dot-circle-o fa-2x"></i> <span>  50 Points </span>--}}
                    {{--</label>--}}
                    {{--<label class="btn">--}}
                        {{--<input type="radio" id="gender1_2" name='gender1'><i class="fa fa-circle-o fa-2x"></i><i class="fa fa-dot-circle-o fa-2x"></i><span> 100 Points</span>--}}
                    {{--</label>--}}
                    {{--<label class="btn">--}}
                        {{--<input type="radio" id="gender1_3" name='gender1'><i class="fa fa-circle-o fa-2x"></i><i class="fa fa-dot-circle-o fa-2x"></i><span> 200 points</span>--}}
                    {{--</label>--}}
                {{--</div>--}}

                <script src="https://js.stripe.com/v3/"></script>
                <form action="../buy_points" method="post"  id="payment-form">
                    <div class="group">
                        <label>
                            <span>Name</span>
                            <input name="cardholder-name" class="field" placeholder="Jane Doe" />
                        </label>
                        <label>
                            <span>Phone</span>
                            <input class="field" placeholder="(123) 456-7890" type="tel" />
                        </label>
                        <label id="label_points" >
                            <span>Points</span>
                            <input value="4000" onkeyup="justNumber()" placeholder="500" class="field" id="points" />
                        </label>
                    </div>
                    <div class="group">
                        <label>
                            <span>Card</span>
                            <div id="card-element" class="field"></div>
                        </label>
                    </div>
                    <button type="submit" id="buy">Pay</button>
                    <div class="outcome">
                        <div class="error" role="alert"></div>
                        <div class="success">
                            Success!  <span class="token"></span>
                        </div>
                        {{--<div><span id="timer_inp">3</span></div>--}}
                    </div>
                </form>
                {{--Your Stripe token is--}}










                <!--button-->
                {{--<div id="check_1_1" class="btn-group btn-group" data-toggle="buttons">--}}
                    {{--<label class="btn">--}}
                        {{--<input id="gender2btn" type="checkbox"><i class="fa fa-square-o fa-2x"></i><i class="fa fa-check-square-o fa-2x"></i>--}}
                        {{--<span id="gender2" style="position: relative; top: -2px">I agree with the conditions</span>--}}
                    {{--</label>--}}
                    {{--<label class="btn active" id="pointsBtn">--}}
                    {{--<input id="pointBtn" type="button" value="buy" style="color: #000; width: 100px; position: relative; top: -5px; float: right;" />--}}
                    {{--</label>--}}
                {{--</div>--}}
            </div>
        </div>

        <!-- Modal Actions -->
        {{--<div class="modal-footer border-none">--}}
            {{--<button id="pointBtn" type="button" class="btn btn-primary" @click.prevent="sendSupportRequest" :disabled="supportForm.busy">--}}
                {{--<i class="fa fa-btn fa-paper-plane"></i>Buy--}}
            {{--</button>--}}
        {{--</div>--}}
    </div>
</div>

<script>



    var stripe = Stripe('{{app(App\Http\Controllers\buyController::class)->views()}}');
    var elements = stripe.elements();

    var card = elements.create('card', {
        style: {
            base: {
                iconColor: '#666EE8',
                color: '#31325F',
                lineHeight: '40px',
                fontWeight: 300,
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSize: '15px',

                '::placeholder': {
                    color: '#CFD7E0',
                },
            },
        }
    });
    card.mount('#card-element');

    function setOutcome(result) {
        var successElement = document.querySelector('.success');
        var errorElement = document.querySelector('.error');
        successElement.classList.remove('visible');
        errorElement.classList.remove('visible');

        if (result.token) {
            // Use the token to create a charge or a customer
            // https://stripe.com/docs/charges
            successElement.querySelector('.token').textContent = result.token.id;
            successElement.classList.add('visible');
            // post('../buy_points/', {stripeToken: result.token.id, _token: $('meta[name="csrf-token"]').attr('content')});

            var _token_ = result.token.id;
            var price = $('#buy').text().split('$')[1];


            $.ajax({
                url: '/buy_points',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
                },
                dataType: 'text',
                data: {stripeToken:_token_ , price: price, boat_value:"4000"}
            })
                .done(function(data) {
                    console.log("success");

                    //document.location.href = "billing";
                    setTimeout(function() {
                        document.getElementById('warning').style.visibility = 'hidden';
                        $("#warningText").remove();
                        $("#TEXTPOINTS").remove();
                    }, 3000);

                })
                .fail(function(data, request, error) {
                    console.log(error);
                })
                .success(function(data) {
                    console.log(data);
                })
                .always(function(data) {
                    console.log("complete");
                })



        } else if (result.error) {
            errorElement.textContent = result.error.message;
            errorElement.classList.add('visible');
        }
    }

    card.on('change', function(event) {
        setOutcome(event);
    });

    document.querySelector('form').addEventListener('submit', function(e) {
        e.preventDefault();
        var form = document.querySelector('form');
        var extraDetails = {
            name: form.querySelector('input[name=cardholder-name]').value
        };
        stripe.createToken(card, extraDetails).then(setOutcome);
    });

    function myfuction() {
        var sel = document.getElementById("tests");
        var val = sel.options[sel.selectedIndex].value;
        if(val == 1000){
            document.getElementById('buy').textContent = "Pay $10";
            document.getElementById('label_points').style.display = "none";
        }
        if(val == 2000){
            document.getElementById('buy').textContent = "Pay $20";
            document.getElementById('label_points').style.display = "none";
        }
        if(val == 3000){
            document.getElementById('buy').textContent = "Pay $30";
            document.getElementById('label_points').style.display = "none";
        }
        if(val == 4000){
            document.getElementById('label_points').style.display = "block";
            document.getElementById('label_points').style.left = "0px";
        }
    }

    function justNumber() {
        var input = document.getElementById("points");
        input.value = input.value.replace(/[^\d,]/g, '');
        document.getElementById('buy').textContent = "Pay " + "$" +($("#points").val())/2;
    }

</script>

<style>

    /** {*/
        /*font-family: "Helvetica Neue", Helvetica;*/
        /*font-size: 15px;*/
        /*font-variant: normal;*/
        /*padding: 0;*/
        /*margin: 0;*/
    /*}*/


    #payment-form {
        width: 480px;
        margin: 15px auto;
    }

    .group {
        background: white;
        box-shadow: 0 7px 14px 0 rgba(49,49,93,0.10),
        0 3px 6px 0 rgba(0,0,0,0.08);
        border-radius: 4px;
        margin-bottom: 20px;
    }

    .group label {
        position: relative;
        color: #8898AA;
        font-weight: 300;
        height: 40px;
        line-height: 40px;
        margin-left: 20px;
        display: block;
    }

    .group label:not(:last-child) {
        border-bottom: 1px solid #F0F5FA;
    }

    label > span {
        width: 20%;
        text-align: right;
        float: left;
    }

    .field {
        background: transparent;
        font-weight: 300;
        border: 0;
        color: #31325F;
        outline: none;
        padding-right: 10px;
        padding-left: 10px;
        cursor: text;
        width: 70%;
        height: 40px;
        float: right;
    }

    .field::-webkit-input-placeholder { color: #CFD7E0; }
    .field::-moz-placeholder { color: #CFD7E0; }
    .field:-ms-input-placeholder { color: #CFD7E0; }

    /*button {*/
        /*float: left;*/
        /*display: block;*/
        /*background: #666EE8;*/
        /*color: white;*/
        /*box-shadow: 0 7px 14px 0 rgba(49,49,93,0.10),*/
        /*0 3px 6px 0 rgba(0,0,0,0.08);*/
        /*border-radius: 4px;*/
        /*border: 0;*/
        /*margin-top: 20px;*/
        /*font-size: 15px;*/
        /*font-weight: 400;*/
        /*width: 100%;*/
        /*height: 40px;*/
        /*line-height: 38px;*/
        /*outline: none;*/
    /*}*/

    button:focus {
        background: #555ABF;
    }

    button:active {
        background: #43458B;
    }

    .outcome {
        float: left;
        width: 100%;
        padding-top: 8px;
        min-height: 24px;
        text-align: center;
    }

    .success, .error {
        display: none;
        font-size: 13px;
    }

    .success.visible, .error.visible {
        display: inline;
    }

    .error {
        color: #E4584C;
    }

    .success {
        color: #666EE8;
    }

    .success .token {
        font-weight: 500;
        font-size: 13px;
    }

    #buy{
        width:100%;
    }
</style>

{{--CrossSharing code--}}

<script>

    var close = document.getElementById('close');
    var myNode = document.getElementById('warning');

    $(document).ready(function(){
        $(document).bind('keydown', function(e) {
            if (e.which == 27)
            {
                document.getElementById('warning').style.visibility = 'hidden';
                $("#warningText").remove();
                $("#TEXTPOINTS").remove();
            }
        });
    });

    close.onclick = function () {
        document.getElementById('warning').style.visibility = 'hidden';
//        while (myNode.lastChild.id !== 'close' )
//        {
//            myNode.removeChild(myNode.lastChild);
//        }
        $("#warningText").remove();
        $("#TEXTPOINTS").remove();
    };
    $("#points").on('change',function () {
        $("#pointCost").text(($("#points").val())/2 + "$");
    });

    $("#points").change(function () {
        $("#gender1_1").prop('checked', false );
        $("#gender1_2").prop('checked', false );
        $("#gender1_3").prop('checked', false );
    });

    $("#pointBtn").on("click",function ()
    {
        if($("#gender1_1").is(':checked') && $("#gender2btn").is(':checked'))
        {
            var cost = 10;
            alert(cost);
            $("#gender2").css("color","#5d8ef4");
        }else if($("#gender1_2").is(':checked') && $("#gender2btn").is(':checked'))
        {
            var cost = 20;
            alert(cost);
            $("#gender2").css("color","#5d8ef4");
        }
        else if($("#gender1_3").is(':checked') && $("#gender2btn").is(':checked'))
        {
            var cost = 30;
            alert(cost);
            $("#gender2").css("color","#5d8ef4");
        }
        else if($("#points").change() && $("#gender2btn").is(':checked'))
        {
            var cost = $("#pointCost").text();
            cost = cost.replace('$','');
            alert((cost));
            $("#gender2").css("color","#5d8ef4");
        }
        else if(!($("#gender2btn").is(':checked')))
        {
            $("#gender2").css("color","red");
        }
    });
</script>

{{----}}
{{----}}
{{----}}

<div class="modal fade bs-example-modal-sm" id="myPleaseWait" tabindex="-1"
     role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                        <span class="glyphicon glyphicon-time">
                        </span> Running actions...
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


<div id="evPanel1" class="tab-pane fade in active">

    <fieldset style="">
        <div class="col-md-12">
            <legend class="cross-sharing-legend">Cross-sharing</legend>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <label class="custom-form-label" for="cs_title">Title</label>
                <input type="text" id="cs_title">
                <label class="custom-form-label" for="summernote">Content</label>
                <!--   <textarea class="form-control" rows="3" placeholder="Hellow world at %curtime%" required></textarea> -->
                <p class="limit pull-right" style="color: #888; margin-right: 5px; font-style: italic;">Twitter can only accept 140 characters</p>
                <textarea id="summernote" class="summernote" name ="summer_note" placeholder="Hello Summernote"></textarea>
                <script>
                    $(document).ready(function() {
                        $('#summernote').summernote({
                            width: "100%",
                            height: "200px",
                            callbacks:  {
                                onKeyup: function(e) {
                                    var limit = 140;
                                    var num = htmlspecialchars_decode($('.summernote').summernote('code').replace(/(<([^>]+)>)/ig,"")).length;
                                    // var key = e.keyCode;
                                    if (num < limit) {
                                        $('.limit').html('Characters: '+num+' of '+limit).css('color', '#888888');
                                    } else {
                                        // $('.limit').html('Characters : '+num+' of '+limit + '. Twitter will not accept it').css('color', '#4bb6cc');
                                        $('.limit').html('Characters: '+num+' of '+limit + " (Twitter will not accept it)").css('color', '#4bb6cc');
                                    }
                                },
                                onKeydown: function(e) {
                                    var limit = 140;
                                    var num = htmlspecialchars_decode($('.summernote').summernote('code').replace(/(<([^>]+)>)/ig,"")).length;
                                    // var key = e.keyCode;
                                    if (num < limit) {
                                        $('.limit').html('Characters: '+num+' of '+limit).css('color', '#888888');
                                    } else {
                                        // $('.limit').html('Characters : '+num+' of '+limit + '. Twitter will not accept it').css('color', '#4bb6cc');
                                        $('.limit').html('Characters: '+num+' of '+limit + " (Twitter will not accept it)").css('color', '#4bb6cc');
                                    }
                                }
                            },
                        });
                    });
                </script>
            </div>
        </div>

        <div class="form-group" >
            <div class="col-md-12">
                <label for="name-2">Images</label>
                <input style="display: none; visibility: hidden;" type="file" id="files" name="files[]" value="Select" />
                <button type="button" class="cs_img" id="cs_img" onclick="$('#files').trigger('click');">Select media file</button>
                {{--<button type="button" class="cs_img" id="cs_img_del" onclick="cs_remove_img()">Remove media file</button>--}}
                <button type="button" class="cs_img" id="cs_img_del" onclick="cs_remove_all_img()">Remove all media files</button>
                <input type="checkbox" style="" id="single_post" onclick="single()">
                <label for="name-2" id="lab_single">POST AS SINGLE FOR FACEBOOK</label>
                <output id="list"></output>
                {{-- <input type="checkbox" style="" id="cs_enable_schedule" onclick="cs_enable_schedule()">
                <label for="name-2" id="lab_single">ENABLE SCHEDULE</label> --}}
            </div>
        </div>

        <div class="form-group" >
            <div class="col-md-12">
                <br/>
                <label class="custom-form-label" for="name-2">From groups</label>
                <form>
                    <select id="alter" name="alter">
                        <option value=" "></option>
                        @php
                            $i=0;
                        @endphp
                        @foreach($group_names as $name)
                            <option id ="alter_option{{$i++}}" class="alter_option" value="{{ $name }}">{{ $name }} </option>
                        @endforeach
                    </select>
                    <input type="button" value="ADD" class="cs_send" onclick="send()">
                </form>

                <label class="custom-form-label" for="name-2">From social list</label>
                <form>
                    <select id="choice_social">
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
                        <button type="button" onclick="Add_to_group_2(del2,alter_json)" class="cs_button"> >> </button>
                        <select id="Select_from_db2" name="Select_from_db2" class="cs_selected" multiple>
                            {{--@php $i=0; @endphp--}}
                            {{--@foreach($data as $dat)--}}
                            {{--<option id ="option_from_db_2_{{$i++}}" class="option_from_db_2_" value="{{ $dat }}">{{ $dat }} </option>--}}
                            {{--@endforeach--}}
                        </select>
                    </div>
                    <div id="cs_div_2">
                        <label class="custom-form-label" for="name-2">To</label>
                        <button type="button" onclick="delete_from_group_02(alter_json,del2,del2,(options2))" class="cs_button"> << </button>
                        <select id="alter_json" name="alter_json" class="cs_selected" multiple></select>
                    </div>
                </form>

                <div class="form-group">
                    <input type="checkbox" style="" id="cs_enable_schedule" onclick="cs_enable_schedule()">
                    <label for="name-2" id="lab_single">ENABLE SCHEDULE</label>
                </div>

                <form>
                    <button type="button" onclick="sendNow()" class="cs_button cross-button-margn" id="cs_sendNow">Cross-sharing</button>
                </form>

            </div>
        </div>


        {{--start time--}}

        <div class="col-md-12" id="cs_Schedule">
            <div class="panel panel-default">
                <div class="panel-heading">Schedule</div>
                <div class="panel-body">
                    <div class = "col-md-3">
                        <div class="btn-group" data-toggle="buttons" id="checked_shedule">
                            <label class="btn btn-primary check_run_btn active">
                                <input type="radio" name="options_shedule"  value="checked_run_once" checked="checked" onchange="SendAtTime()"> Run once
                            </label>
                            <label class="btn btn-primary check_run_btn">
                                <input type="radio" name="options_shedule" value="checked_shedule"> Schedule
                            </label>
                            <label class="btn btn-primary check_run_btn">
                                <input type="radio" name="options_shedule" value="infinitely"> Infinitely
                            </label>
                        </div>
                    </div>
                    <div class = "col-md-6 wizard_shedule_datepicker">
                        <div class="row">
                            <input id="wizard_shedule_datepicker" class="datepicker" type="hidden" value="" name="wizard_shedule_datepicker" data-behavior="datepicker">
                        </div>
                        <br />
                        <div class="row">
                            <div class="inline col-md-4">
                                <legend>Interval hours</legend>
                                <select class="form-control" id="sheduleScriptHours">
                                    @for ($i = 0; $i<24; $i++)
                                        <option>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="inline col-md-4">
                                <legend>Intreval minutes</legend>
                                <select class="form-control" id="sheduleScriptMinutes">
                                    @for ($i = 0; $i<60; $i++)
                                        <option>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="inline col-md-4">
                                <legend for="scriptTotalRepeat">Repeat counter</legend>
                                <input id="scriptTotalRepeat" type ="text" name="scriptTotalRepeat" placeholder="enter number here">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--end of time--}}

    </fieldset>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.0/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.0/jquery-confirm.min.js"></script>

<script>

    function getCount(parent, getChildrensChildren){
        var relevantChildren = 0;
        var children = parent.childNodes.length;
        for(var i=0; i < children; i++){
            if(parent.childNodes[i].nodeType != 3){
                if(getChildrensChildren)
                    relevantChildren += getCount(parent.childNodes[i],true);
                relevantChildren++;
            }
        }
        return relevantChildren;
    }

    var images_twitter = [];
    var images = [];
    var videos = [];
    var xxx;
    function handleFileSelect(evt) {
        var files = evt.target.files; // FileList object

        // Loop through the FileList and render image files as thumbnails.
        for (var i = 0, f; f = files[i]; i++)
        {
            // max upload
            var x = document.getElementById("list");
            if (i > 4) {
            console.log("You select more than 5 media files");
            continue;
            }
            if (x.childNodes.length > 9) {
            console.log(xxx);
            xxx = x.childNodes.length;
            continue;
            }
            var reader = new FileReader();

            /*
            *   Images
            */

            // Only process image files.
            if (f.type.match('image.*'))
            {
                if (f.size < 5242880)
                {
                    // Closure to capture the file information.
                    reader.onload = (function (theFile)
                    {
                        return function (e)
                        {
                            // Render thumbnail.
                            //'<div class ="media_delete"' , '>','<','/div>'
                            var span = document.createElement('span');
                            span.innerHTML = ['<div class ="media_delete"' , '>',
                                '<img onclick="cs_remove_this_img()" class="thumb" src="', e.target.result,
                                '" title="', escape(theFile.name), '"/>','<','/div>'].join('');
                            document.getElementById('list').insertBefore(span, null);
                            //for All
                            var buff_src = e.target.result;
                            images.push(buff_src);
                            //for Twitter
                            var buff_src_twitter = e.target.result;
                            buff_src_twitter = buff_src_twitter.split(',');
                            //console.log(buff_src_twitter[1]);
                            images_twitter.push(buff_src_twitter[1]);
                        };
                    })(f);
                    // Read in the image file as a data URL.
                    reader.readAsDataURL(f);
                }
                else {
                    console.log("Image should not be more than 5 megabytes");
                }
            }

            /*
            *   Video
            */

            // Only process image Video.
            if (f.type.match('video.*'))
            {
                if (f.size < 52428800)
                {
                    // Closure to capture the file information.
                    reader.onload = (function (theFile)
                    {
                        return function (e)
                        {
                            // Render thumbnail.
                            var span = document.createElement('span');
                            span.innerHTML = [
                                '<div class ="media_delete"' , '>',
                                '<video onclick="cs_remove_this_img()" style="float:left;" ' +
                                'width="100" height="100" controls class="thumb" src="', e.target.result,
                                '" title="', escape(theFile.name), '"/>' +
                                '<source type="video/mp4" src="', e.target.result,'"/>',
                                '<div','/>'].join('');
                            document.getElementById('list').insertBefore(span, null);
                            //for All
                            var buff_src = e.target.result;
                            videos.push(buff_src);
                        };
                    })(f);
                    // Read in the image file as a data URL.
                    reader.readAsDataURL(f);
                }
                else {
                    console.log("Video should not be more than 50 megabytes");
                }
            }
        }
        //console.log(videos);
    }

    document.getElementById('files').addEventListener('change', handleFileSelect, false);

    function single() {
        if($('#single_post').is(':checked')){
            var keys = 1;
        }
        else{
            keys = 0;
        }
        return keys;
    }
    $('#cs_Schedule').hide();
    function cs_enable_schedule() {
        if($('#cs_enable_schedule').is(':checked')){
            $('#cs_Schedule').fadeIn("slow");
            $('#cs_sendNow').attr('disabled','true');
        }
        else{
            $('#cs_Schedule').fadeOut("slow");
            $('#cs_sendNow').removeAttr('disabled');
        }
    }

    Array.prototype.remove = function() {
        var what, a = arguments, L = a.length, ax;
        while (L && this.length) {
            what = a[--L];
            while ((ax = this.indexOf(what)) !== -1) {
                this.splice(ax, 1);
            }
        }
        return this;
    };

    function cs_remove_this_img(){
        $(function(){ //make sure your DOM is ready
            $(".thumb").click(function(){ // bind click on every div that has the class box
                $(this).fadeOut(10, function(){ $(this).remove() }); //remove the clicked element from the dom
                var remove = $(this).context.src;
                var remove_twitter = $(this).context.src;
                remove_twitter = remove_twitter.split(',');
                images.remove(remove);
                videos.remove(remove);
                images_twitter.remove(remove_twitter[1]);
                $(".media_delete").click(function(){ // bind click on every div that has the class box
                    $(this).fadeOut(25, function(){ $(this).remove() }); //remove the clicked element from the dom
                });
            });
        });
//        console.log(video);
//        console.log(images);
    }

//    function cs_remove_img(){
//        var div = $('#list').find(".media_delete");
//        var img = $('#list').find(".thumb");
//        div[0] = div[0].remove();
//        img[0] = img[0].remove();thumb_video
//        images_twitter.splice(0,1);
//        images.splice(0, 1);
//    }

    function cs_remove_all_img() {
        $('#list').empty(".thumb"); //this is to remove all
        images =[];
        images_twitter = [];
        videos = [];
    }
</script>

<script>

    var form = document.forms[0];

    var select_to_group = document.getElementById("select_to_group");
    var del = document.getElementById("Select_from_db");
    var del2 = document.getElementById("Select_from_db2");
    var alter_json = document.getElementById("alter_json");
    var choice_social = document.getElementById("choice_social");

    var select = form.elements.Select_from_db;
    var select2 = form.elements.Select_from_db2;
    var delet = form.elements.select_to_group;

    var options2 = 'option_from_db_2_' ;
    var options3 = 'option_from_db_3_' ;

    //hide all options
    function hidden(selects) {
        for (var i = 0; i < selects.options.length; i++) {
            var option = selects.options[i];
            option.style.display = "none";
        }
    }
    // get all options again
    function get_again() {
        var choice_socials = $("#choice_social option:selected").val();

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

                    $(del2.options).remove();

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
                        if(dat[i].indexOf("Google") !== -1){
                            dat[i] = dat[i].substring(dat[i].indexOf("Google"));
                        }


                        if (choice_social.value == "Twitter")
                        {
                            if (dat[i].indexOf("Twitter") != -1)
                            {
                                $(del2).append($("<option></option>").attr("value",dat[i]).text(dat[i]));
                                $(del2.options).show();
                                //console.log(dat[i]);
                            }
                        }
                        if (choice_social.value == "FaceBook")
                        {
                            if (dat[i].indexOf("FaceBook") != -1)
                            {
                                $(del2).append($("<option></option>").attr("value",dat[i]).text(dat[i]));
                                $(del2.options).show();
                                //console.log(dat[i]);
                            }
                        }
                        if (choice_social.value == "Instagram")
                        {
                            if (dat[i].indexOf("Instagram") != -1)
                            {
                                $(del2).append($("<option></option>").attr("value",dat[i]).text(dat[i]));
                                $(del2.options).show();
                                //console.log(dat[i]);
                            }
                        }
                        if (choice_social.value == "LinkedIn")
                        {
                            if (dat[i].indexOf("LinkedIn") != -1)
                            {
                                $(del2).append($("<option></option>").attr("value",dat[i]).text(dat[i]));
                                $(del2.options).show();
                                //console.log(dat[i]);
                            }
                        }
                        if (choice_social.value == "Google")
                        {
                            if (dat[i].indexOf("Google") != -1)
                            {
                                $(del2).append($("<option></option>").attr("value",dat[i]).text(dat[i]));
                                $(del2.options).show();
                                //console.log(dat[i]);
                            }
                        }
                        $("select option").text(function (i, t) {
                            return t.replace('\\\\Name', '');
                        });
                    }

                })
                .always(function(data) {
                    console.log("complete");
                })
        }
    }

    // hidden(del2);

    choice_social.addEventListener("change",function () {
        get_again();
//        hidden(del2);
        for (var i = 0; i < del2.options.length; i++) {
            var option = del2.options[i];
            // enable options
            if(choice_social.value == "Twitter"){
                if(!option.value.indexOf("Twitter")){
                    option.style.display = "block";
                }
            }
            if(choice_social.value == "FaceBook"){
                if(!option.value.indexOf("FaceBook")){
                    option.style.display = "block";
                }
            }
            if(choice_social.value == "Instagram"){
                if(!option.value.indexOf("Instagram")){
                    option.style.display = "block";
                }
            }
            if(choice_social.value == "LinkedIn"){
                if(!option.value.indexOf("LinkedIn")){
                    option.style.display = "block";
                }
            }
            if(choice_social.value == "Google"){
                if(!option.value.indexOf("Google")){
                    option.style.display = "block";
                }
            }
        }
    });

    // add to group
    function Add_to_group_2(selects,select_to_groups) {
        //get length of all selected elements

//        console.log(selects);
//        console.log(select_to_groups);
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
        sortSelect($("#alter_json"), 'text', 'asc');
        var usedNames = {};
        $("select[name='alter_json'] > option").each(function () {
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

    /*
     * There we are delete and sort selected
     */

    function delete_from_group_02(selects,Select_from_db,dels,ids) {
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
        $("select[name='Select_from_db2'] > option").each(function () {
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

                    var x = document.createElement("OPTION");
                    x.setAttribute("value", "Group\\\\"+data);
                    var t = document.createTextNode("Group\\\\"+data);
                    x.appendChild(t);
                    document.getElementById("alter_json").appendChild(x);

                    var usedNames = {};
                    $("select[name='alter_json'] > option").each(function () {
                        if(usedNames[this.text]) {
                            $(this).remove();
                        } else {
                            usedNames[this.text] = this.value;
                        }
                    });

                })
                .always(function(data) {
                    console.log("complete");
                })
        }
    }

    function sendNow() {
        $('#myPleaseWait').modal('show');
        //var content = $("#summernote").val();
        var content =  $('#summernote').summernote('code');
        console.log(content);


        var json_key = [];
        for (var i = 0; i < alter_json.options.length; i++) {
            var options = alter_json.options[i];

            /*
             * Here parsing option value;
             */

            // get key value
            var str_key = options.value.split("\\\\");
            var buff_key = str_key[0];
            buff_key = buff_key.replace(/\n|\r/g,'');

            //delete name from str
            var str = options.value.split("Name: ");
            var string_buff = str[1];

            var name_buff;
            if(buff_key != "Group") {
                // get name value
                name_buff = string_buff.substring(0, string_buff.indexOf(' ID'));
                if (buff_key == 'Twitter') {
                    name_buff = string_buff;
                }
            }
            else if(buff_key == "Group"){
                str_key = str_key[1].replace(/\n|\r/g,'');
                name_buff = str_key;
            }

            var id_buff;
            if(buff_key != "Group") {
                // get id value
                var id = string_buff.split("ID: ");
                id_buff = id[1];
                id = id_buff;
            }
            else if(buff_key == "Group"){
                id_buff = null;
            }
            //add and convert array to json
            json_key.push({"key": buff_key, "name": name_buff, "id": id_buff});
        }
        //console.log(JSON.stringify(json_key));

        var CrossSharingNow = JSON.stringify(json_key);
        var _title = $("#cs_title").val();
        console.log(CrossSharingNow);
        $.ajax({
            url: '/cross-sharing-crossSharingNow',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
            },
            dataType: 'text',
            data: {cs_title: _title ,CrossSharingNow: CrossSharingNow, cs_content:content, img_data_twitter : images_twitter, img_data: images, key:single(), videos:videos }
        })
            .done(function(data) {
                console.log("success");
                $('#myPleaseWait').modal('hide');
            })
            .fail(function(data, request, error) {
                console.log(error);
                $('#myPleaseWait').modal('hide');
            })
            .success(function(data) {
                console.log(data.trim());
                if(data.includes("You do not have enough points") == true)
                {
                    if(!($("#warningText").length))
                    {
                        var numb = data.match(/\d+$/)[0];

                        // change button id buy on load
                        $("#buy").ready(function () {
                            document.getElementById('buy').textContent = "Pay" + "$" + numb/2 ;
                        });

                        document.getElementById('warning').style.visibility = 'visible ';
                        var para = document.createElement("H6");
                        para.style.color = "#000";
                        para.style.margin = "15px";
                        para.style.textAlign = "center";
                        para.setAttribute('id','warningText');
                        var t = document.createTextNode("You do not have enough points." + " -" + numb);
                        para.appendChild(t);

                        var points = document.createElement("H1");
                        points.style.color = "#000";
                        points.setAttribute('id','TEXTPOINTS');
                        var tt = document.createTextNode("");//document.createTextNode("-"+numb);
                        points.appendChild(tt);
                        document.getElementById("warninghead").appendChild(para);
                        document.getElementById("warninghead").appendChild(points);

                        document.getElementById('points').value = numb;
                        document.getElementById('pointCost').innerHTML  = numb/2 + "$";
                    }
                }
                else if(data.includes("Something went wrong") ==true)
                {
                    $.dialog({
                        title: 'Warning',
                        content: 'Oops, something went wrong. '
                    });
                }
                if (data == "End of life LinkedIn tokenSent successfully")
                {
                    window.location = "/authLinkedin";
                }
                $('#myPleaseWait').modal('hide');
            })
            .always(function(data) {
                console.log("complete");
            })

    }

</script>
{{--Send by time--}}
<script>

    /*
    * content -> string
    * TimeSend -> string
    * CrossSharingNow -> json
    * */

    function SendAtTime(){
        var dataSend = document.getElementsByClassName("day active")[0].getAttribute("data-day");
        var hoursSend = document.getElementsByClassName("timepicker-hour")[0].innerHTML;
        var minutesSend = document.getElementsByClassName("timepicker-minute")[0].innerHTML;
        var TimeSend;

        var scriptHour = $("#sheduleScriptHours").val();
        var scriptMinutes =$("#sheduleScriptMinutes").val();

        var content =  $('#summernote').summernote('code');
        var repeat = $("#scriptTotalRepeat").val();
        var json_key = [];

        if(repeat.length == 0 || repeat == "0"){
            TimeSend = dataSend+ " " +hoursSend + ":" + minutesSend;
        }
        else{
            TimeSend = scriptHour + ":" + scriptMinutes;
        }

        for (var i = 0; i < alter_json.options.length; i++) {
            var options = alter_json.options[i];

            /*
             * Here parsing option value;
             */

            // get key value
            var str_key = options.value.split("\\\\");
            var buff_key = str_key[0];
            buff_key = buff_key.replace(/\n|\r/g,'');

            //delete name from str
            var str = options.value.split("Name: ");
            var string_buff = str[1];

            var name_buff;
            if(buff_key != "Group") {
                // get name value
                name_buff = string_buff.substring(0, string_buff.indexOf(' ID'));
                if (buff_key == 'Twitter') {
                    name_buff = string_buff;
                }
            }
            else if(buff_key == "Group"){
                str_key = str_key[1].replace(/\n|\r/g,'');
                name_buff = str_key;
            }

            var id_buff;
            if(buff_key != "Group") {
                // get id value
                var id = string_buff.split("ID: ");
                id_buff = id[1];
                id = id_buff;
            }
            else if(buff_key == "Group"){
                id_buff = null;
            }
            //add and convert array to json
            json_key.push({"key": buff_key, "name": name_buff, "id": id_buff});
        }
        var CrossSharingNow = JSON.stringify(json_key);
        /*
         * Send to saveToDB
         */

        $.ajax({
            url: '/cross-sharing-saveToDB',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
            },
            dataType: 'text',
            data: {Time:TimeSend , cs_content:content, cross_sharing_to:CrossSharingNow, cs_repeat:repeat, cs_images: images, cs_twitter_images: images_twitter}
        })
            .done(function(data) {
                console.log("success");
            })
            .fail(function(data, request, error) {
                console.log(error);
            })
            .success(function(data) {
                console.log(data);
            })
            .always(function(data) {
                console.log("complete");
            })


    }

</script>
