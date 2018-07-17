<!--
 * Jobs strategy page
 * Dev: alex
 * Date: 20.11.16
 * Time: 13:31
-->

@extends('spark::layouts.app')


@section('content')



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
                                        <li class="active"><a class="tabnav btn btn-block btn-social btn-twitter show-actions" data-toggle="tab" href="#evPanel1"><span class="fa fa-user"></span>Actions</a></li>
                                        <li><a class="tabnav btn btn-block btn-social btn-facebook" data-toggle="tab" href="#evPanel2"><span class="fa fa-user"></span>New wizard</a></li>
                                        <li><a class="tabnav btn btn-block btn-social btn-linkedin" data-toggle="tab" href="#evPanel3"><span class="fa fa-user"></span>Manual</a></li>
                                    </ul>


                                    <div class="tab-content" id="myTabContent">
                                        <!-- Панель 1 -->
                                    @include('dashboard.Jobs.jobs_panel_1')
                                    <!-- Панель 2 -->
                                        <div id="evPanel2" class="tab-pane fade">
                                            <!-- Содержимое панели 2 -->
                                            <h3></h3>
                                            <form id="strategy-form" action="/post_tweet" method="post">
                                                <h3><span class="font-size">&nbsp;Source</span></h3>
                                                <fieldset class="source-fieldset">
                                                    {{-- <div class="col-md-12"> --}}
                                                        <legend class="actions-legend-next">Select source accounts</legend>
                                                    {{-- </div> --}}
                                                    <label class="label-description">Social network:</label>

                                                    <div class="accounts_select_block">
                                                        <select onclick="show_accounts_under_social_networks({{ Auth::User()->id }})" id="jobs_select_social_network" class="dropcontainer_2">
                                                            <option id="TextSize" value="Twitter">Twitter</option>
                                                            <option id="TextSize" value="Facebook">Facebook</option>
                                                            <option id="TextSize" value="LinkedIn">LinkedIn</option>
                                                            <option id="TextSize" value="Instagram">Instagram</option>
                                                            <option id="TextSize" value="Google">Google</option>
                                                        </select>
                                                    </div>

                                                    <p></p>
                                                    <label class="label-description">Account:</label>
                                                    <div class="accounts_select_block">
                                                        <select id="accounts_under_social_network" class="dropcontainer_2" name = "selAccTo" required>
                                                            @php
                                                                $twitterAccounts = new \App\User_twitter_accounts();
                                                                $twitterAccounts =  $twitterAccounts::getTwitterAccounts(Auth::User()->id);
                                                            @endphp
                                                            @foreach ($twitterAccounts as $twitterAccount)
                                                                <option style="font-size: 15pt;border-radius: 20px;">{{ $twitterAccount->user_twitter_login }} </option>
                                                            @endforeach

                                                        </select>

                                                        {{-- 
                                                            <div id="openModal" class="modalDialog"> 
                                                                <a href="#openModal">Открыть модальное окно</a>
                                                            </div> 
                                                        --}}

                                                    </div>

                                                    <script>
                                                        $(document).ready(function() {
                                                            $('#jobs_select_social_network').change(function() {
                                                                var vl = $('#jobs_select_social_network').val();
                                                                $("#targetSocMedia option[value=" + vl + "]").attr('selected', 'selected');
                                                            });
                                                    
                                                        })
                                                    
                                                    </script>
                                                </fieldset>
                                                <h3><span class="font-size">&nbsp;Actions</span></h3>
                                                
                                                <fieldset class="actions-fieldset" style="overflow-y: none;">

                                                    {{--  
                                                    <legend>Simple message</legend>
                                                    <label for="name-2">Enter your message *</label>
                                                    <div class="form-horizontal">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <!--   <textarea class="form-control" rows="3" placeholder="Hellow world at %curtime%" required></textarea> -->
                                                                <textarea id="summernote" name ="summer_note" placeholder="Hello Summernote"></textarea>
                                                                <script>
                                                                    $(document).ready(function() {
                                                                        $('#summernote').summernote();
                                                                    });
                                                                </script>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    --}}
                                                    
                                                    <legend class="actions-legend-next">Automation</legend>
                                                    <div class="row actions-content">
                                                        <div class="">

                                                            <div class="col-md-4">
                                                                <label class="label-description">Script type: </label>
                                                                <select onchange="" id="selectedScript" class="dropcontainer_2 actions-droplist" name = "selAccTo">
                                                                </select>
                                                            </div>

                                                            <div class="col-md-4">
                                                            </div>

                                                            <div class="col-md-4">
                                                            </div>

                                                        </div>


                                                    </div>
                                                    <center>
                                                        <div class="panel-body">
                                                            <div class="btn-group" data-toggle="buttons" id="BtnCenter">
                                                                <label class="btn btn-primary check_run_btn active btn-group center-button-style" id="DiscriptionButton" onclick="show_script_description()">
                                                                    <input type="radio" name="button" onclick="show_param()">Show options</input>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </center>

                                                    <BR/>

                                                    <div class="overlay" title="окно"></div>
                                                    <div class="popup" id="script_description_and_parameters">
                                                        <div class="close_window">x</div>
                                                        <p id="full_description">Here you can see the parameters</p>
                                                    </div>

                                                    <div class="row no-margin">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">Sheldue</div>
                                                            <div class="panel-body">
                                                                <div class = "col-md-3 btn-group-block actions-col-md">
                                                                    <div class="btn-group" data-toggle="buttons" id="checked_shedule">
                                                                        <label class="btn btn-primary check_run_btn active left-button-style">
                                                                            <input type="radio" name="options_shedule"  value="checked_run_once " checked="checked"> Run once
                                                                        </label>
                                                                        <label class="btn btn-primary check_run_btn left-button-style">
                                                                            <input type="radio" name="options_shedule" value="checked_shedule"> Shedule
                                                                        </label>
                                                                        <label class="btn btn-primary check_run_btn left-button-style">
                                                                            <input type="radio" name="options_shedule" value="infinitely"> Infinitely
                                                                        </label>
                                                                        {{-- <p>Mandatory</p>  --}}
                                                                    </div>
                                                                </div>
                                                                <div class = "col-md-9 wizard_shedule_datepicker actions-col-md">
                                                                    <div class="row">
                                                                        <input id="wizard_shedule_datepicker" class="datepicker" type="hidden" value="" name="wizard_shedule_datepicker" data-behavior="datepicker">
                                                                    </div>
                                                                    <br />
                                                                    <div class="row center-block repeats-block">
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
                                                                        <div class="inline col-md-4 center-block scriptTotalRepeatBlock">
                                                                            <legend for="scriptTotalRepeat">Repeat counter</legend>
                                                                            <input class="form-control" id="scriptTotalRepeat" type ="text" name="scriptTotalRepeat" placeholder="enter number here">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>

                                                <h3><span class="font-size">&nbsp;Terms of use</span></h3>
                                                <fieldset class="terms-block">


                                                	<img class="aimee_logo_1" src="{{URL::asset('/img/logo-1.png')}}" alt="Aimee Logo">
                                                    <h3 class="text-center">Upgrade to Awesome</h3>
                                                    {{-- <h4 class="text-center">Terms of Use</h4>
                                                    <div id="full_description">
                                                        <p>The following terms and conditions govern all use of the Aimee website ("the Website"). The Website is offered subject to your acceptance without modification of all of the terms and conditions contained herein and all other operating rules, policies (including, without limitation, Aimee's Privacy Policies) and procedures that may be published from time to time on this Site by Aimee (collectively, the "Agreement").</p>
                                                        <p>Please read this Agreement carefully before accessing or using the Website. By accessing or using any part of the web site, you agree to become bound by the terms and conditions of this agreement. If you do not agree to all the terms and conditions of this agreement, then you may not access the Website or use any services. If these terms and conditions are considered an offer by Aimee, acceptance is expressly limited to these terms. The Website is available only to individuals who are at least 13 years old.</p>
                                                        <p><b>1. Access to your Aimee Account</b></p>
                                                        <p>Subject to the terms and conditions of this Agreement, the Service is solely for User's personal use. As used herein, "User" includes Aimee's paying customers ("Customers"). This Agreement sets forth certain terms and conditions that apply to Customers, but not other Users. In the event any Customer-specific terms or conditions conflict with any of the terms or conditions that apply to Users generally, the Customer-specific terms/conditions shall control.</p>
                                                        <p>Aimee may change, suspend or discontinue the Services at any time, including the availability of any feature, database, or content. Aimee may also impose limits on certain features and services or restrict User's access to parts or all of the Services without notice or liability.</p>
                                                        <p>User certifies to Aimee that if User is an individual (i.e., not a corporation) User is at least 13 years of age. User also certifies that it is legally permitted to use the Service, and takes full responsibility for the selection and use of the the Service. This Agreement is void where prohibited by law, and the right to access the Service is revoked in such jurisdictions.</p>
                                                        <p>User shall be responsible for obtaining and maintaining any equipment or ancillary services needed to connect to, access the Service, including, without limitation, modems, hardware, software, and long distance or local telephone service. User shall be responsible for ensuring that such equipment or ancillary services are compatible with the Service.</p>
                                                        <p><b>2. Restrictions</b></p>
                                                        <p>User shall not, nor permit anyone else to, directly or indirectly: (i) reverse engineer, disassemble, decompile or otherwise attempt to discover the source code or underlying algorithms of all or any part of the Service (except that this restriction shall not apply to the limited extent restrictions on reverse engineering are prohibited by applicable local law); (ii) modify or create derivatives of any part of the Service; (iii) rent, lease, or use the Service for timesharing or service bureau purposes; or (iv) remove or obscure any proprietary notices on the Service. As between the parties, Company shall own all title, ownership rights, and intellectual property rights in and to the Service, and any copies or portions thereof.</p>
                                                        <p>User shall not use any "spider", "robot", "page-scrape" or other automatic device, program, algorithm or methodology, or any similar or equivalent manual process, to access, acquire, copy or monitor any portion of the Service or any Content, or in any way reproduce or circumvent the navigational structure or presentation of the Service or any Content, to obtain or attempt to obtain any materials, documents or information through any means not purposely made available through the Service. Aimee reserves the right to bar any such activity.</p>
                                                        <p>User shall not attempt to gain unauthorized access to any portion or feature of the Service, or any other systems or networks connected to the Service or to any Aimee server, or to any of the services offered on or through the Service, by hacking, password "mining", or any other illegitimate means.</p>
                                                        <p>User shall not probe, scan or test the vulnerability of the Service or any network connected to the Service, nor breach the security or authentication measures on the Service or any network connected to the Service.</p>
                                                        <p>User shall not take any action that imposes an unreasonable or disproportionately large load on the infrastructure of the Service or Aimee's systems or networks, or any systems or networks connected to the Service or to Aimee.</p>
                                                        <p>User shall not use any device, software or routine to interfere or attempt to interfere with the proper working of the Service or any transaction being conducted on the Service, or with any other person's use of the Service.</p>
                                                        <p>User shall not use the Service or any Content for any purpose that is unlawful or prohibited by this Agreement.</p>
                                                        <p><b>3. Fees and Payment</b></p>
                                                        <p>Optional premium paid services are available on the Website. By selecting a premium service you agree to pay Aimee the monthly or annual subscription fees indicated for that service. Payments will be charged on the day you sign up for a premium service and will cover the use of that service for a monthly or annual period as indicated. Premium service fees are not refundable.</p>
                                                        <p><b>4. Registration; Security</b></p>
                                                        <p>As a condition to using certain products and services of the Service, User may be required to register with Aimee and select a password. User shall provide Aimee with accurate, complete, and updated registration information. Failure to do so shall constitute a breach of this Agreement, which may result in immediate termination of User's account. Aimee reserves the right to refuse registration of, or cancel a Aimee User in its discretion. User shall be responsible for maintaining the confidentiality of User's Aimee password and other account information.</p>
                                                        <p><b>5. Termination</b></p>
                                                        <p>Aimee may terminate your access to all or any part of the Website at any time, with or without cause, with or without notice, effective immediately. If you wish to terminate this Agreement or your Aimee account (if you have one), you may simply discontinue using the Website. Notwithstanding the foregoing, if you have a paid account, such account can only be terminated by Aimee if you materially breach this Agreement and fail to cure such breach within thirty (30) days from Aimee's notice to you thereof; provided that, Aimee can terminate the Website immediately as part of a general shut down of our service. All provisions of this Agreement which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.</p>
                                                        <p><b>6. Content</b></p>
                                                        <p>User agrees that all content and materials (collectively, "Content") delivered via the Service or otherwise made available by Aimee at the Site are protected by copyrights, trademarks, service marks, patents, trade secrets or other proprietary rights and laws. Aimee does not support the distribution of pornographic content. Except as expressly authorized by Aimee in writing, User agrees not to sell, license, rent, modify, distribute, copy, reproduce, transmit, publicly display, publicly perform, publish, adapt, edit or create derivative works from such materials or content.</p>
                                                        <p><b>7. Changes</b></p>
                                                        <p>Aimee reserves the right, at its sole discretion, to modify or replace any part of this Agreement. It is your responsibility to check this Agreement periodically for changes. Your continued use of or access to the Website following the posting of any changes to this Agreement constitutes acceptance of those changes. Aimee may also, in the future, offer new services and/or features through the Website (including, the release of new tools and resources). Such new features and/or services shall be subject to the terms and conditions of this Agreement.</p>
                                                        <p><b>8. Warranties</b></p>
                                                        <p>If User is a Customer, Aimee makes the following warranty to Customer: Aimee shall use commercially reasonable efforts consistent with prevailing industry standards to provide the services in a professional and workmanlike manner that is free of defects. Customer's sole remedy, and Aimee's exclusive liability, for defects in the Service shall be for Aimee to use commercially reasonable efforts to promptly correct such defects.</p>
                                                        <p>Customer represents and warrants that: (i) with respect to all information it provides to Aimee (such as, Recipient Information), Customer has the full right and authority to make such provision and to allow Aimee to use such information to provide the Service (including, without limitation, for Aimee to provide such information to its data providers), (ii) none of the content (e.g. emails) transmitted, uploaded or otherwise distributed by it (or its partners or any third party) through use of the Service will infringe or otherwise conflict with the rights of any third party.</p>
                                                        <p><b>9. Warranty Disclaimer</b></p>
                                                        <p>The Website is provided "as is". Aimee and its suppliers and licensors hereby disclaim all warranties of any kind, express or implied, including, without limitation, the warranties of merchantability, fitness for a particular purpose and non-infringement. Neither Aimee nor its suppliers and licensors, makes any warranty that the Website will be error free or that access thereto will be continuous or uninterrupted. You understand that you download from, or otherwise obtain content or services through, the Website at your own discretion and risk.</p>
                                                        <p><b>10. Security</b></p>
                                                        <p>In no event will Aimee, or its suppliers or licensors, be liable with respect to any subject matter of this agreement under any contract, negligence, strict liability or other legal or equitable theory for: (i) any special, incidental or consequential damages; (ii) the cost of procurement or substitute products or services; (iii) for interruption of use or loss or corruption of data; or (iv) for any amounts that exceed the fees paid by you to Aimee under this agreement during the twelve (12) month period prior to the cause of action. Aimee shall have no liability for any failure or delay due to matters beyond their reasonable control. The foregoing shall not apply to the extent prohibited by applicable law.</p>
                                                        <p><b>11. General Representation and Warranty</b></p>
                                                        <p>You represent and warrant that (i) your use of the Website will be in strict accordance with the Aimee Privacy Policy, with this Agreement and with all applicable laws and regulations (including without limitation any local laws or regulations in your country, state, city, or other governmental area, regarding online conduct and acceptable content, and including all applicable laws regarding the transmission of technical data exported from the United Kingdom or the country in which you reside) and (ii) your use of the Website will not infringe or misappropriate the intellectual property rights of any third party.</p>
                                                        <p><b>12. Privacy</b></p>
                                                        <p>Aimee's current privacy policy is available at the Site (the "Privacy Policy"), which is incorporated by this reference. Aimee strongly recommends that you review the Privacy Policy closely.</p>
                                                        <p><b>13. Copyright</b></p>
                                                        <p>All content included on the Site, such as text, graphics, logos, button icons, images, audio clips, digital downloads, data compilations, and software, is the property of Aimee or its content suppliers and protected by United States and international copyright laws. The compilation of all content on the Site is the exclusive property of Aimee and protected by U.S. and international copyright laws. All software used on (or provided through) the Site is the property of Aimee or its software suppliers and protected by United States and international copyright laws.</p>
                                                        <p><b>14. Indemnification</b></p>
                                                        <p>You agree to indemnify and hold harmless Aimee, its contractors, and its licensors, and their respective directors, officers, employees and agents from and against any and all claims and expenses, including attorneys' fees, arising out of your use of the Website, including but not limited to out of your violation this Agreement.</p>
                                                    </div> --}}
													
													<div class="hidden">
	                                                    <legend>Select target for job result</legend>
	                                                    Social media:
	                                                    <select class="dropcontainer_2" disabled="disabled" id="targetSocMedia" onclick="show_accounts_under_social_networks_finish({{ Auth::User()->id }})">
	                                                        <option value="Twitter">Twitter</option>
	                                                        <option value="Facebook">Facebook</option>
	                                                    </select>
	                                                    <BR/>
	                                                    Account:
	                                                    <select  id="targetAccount" class="dropcontainer_2" disabled="disabled" required>
	                                                        @php
	                                                            $twitterAccounts = new \App\User_twitter_accounts();
	                                                            $twitterAccounts =  $twitterAccounts::getTwitterAccounts(Auth::User()->id);
	                                                        @endphp
	                                                        @foreach ($twitterAccounts as $twitterAccount)
	                                                            <option value="{{ $twitterAccount->user_twitter_login }}">{{ $twitterAccount->user_twitter_login }} </option>
	                                                        @endforeach

	                                                    </select>
                                                        
                                                    </div>

													<div class="hidden">
	                                                	<!-- <a href="{{action('ManageUserTwitterAccountsController@postTweetFromUser')}}" class = "btn btn-default btn-lg" role = "button">Tweet</a>-->

	                                                    <!--   <input type="submit" class="btn btn-info" value="Submit Button"> -->
	                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
	                                                    <p>You will use:</p>
	                                                    <div class="panel panel-default">

	                                                        <div class="panel-heading" id ="ScriptDescription"> </div>

	                                                    </div>
                                                    </div>
                                                </fieldset>
                                                <h3><span class="font-size">&nbsp;Finish</span></h3>
                                                <!-- Modal Start here-->
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
                                                                    <div class="progress-bar progress-bar-info
                    progress-bar-striped active"
                                                                         style="width: 100%">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal ends here -->
                                                <fieldset class="actions-fieldset">
                                                    <legend class="actions-legend-next">Terms and conditions</legend>
                                                    <div class="row">
                                                        {{-- <div class="col-md-3">
                                                        </div> --}}
                                                        <div class="col-md-5 btn-group schedule-btns" id ="finish_wizard_and_save_user_sript">
                                                            <label for="acceptTerms-2">
                                                                <input id="acceptTerms-2" name="acceptTerms" type="checkbox"> 
                                                                <span class="agreement-text">
                                                                    I agree with the <a id="open_terms_and_conds" onclick="show_terms_and_conditions()" href="#terms">Terms and conditions</a>.
                                                                </span>
                                                            </label>
                                                            <button id="wizardFinishButton" type="button" class="btn btn-primary check_run_btn active" onclick="save_user_script()" disabled>Finish</button>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-12 btn-group" >
                                                            <p>Output data:</p>
                                                            <pre id="test_output"></pre>
                                                        </div>
                                                    </div>

                                                </fieldset>
                                                
                                                <div class="overlay"></div>
                                                <div class="terms-popup" style="opacity: 0; visibility: hidden;" id="terms_and_conds">
                                                    {{-- <div class="close_window" onclick="close_terms_popup()">x</div> --}}
                                                    <img class="close_window" onclick="close_terms_popup()" src="{{URL::asset('/img/close_circle.png')}}" />
                                                    <img class="aimee_logo_1" src="{{URL::asset('/img/logo-1.png')}}" alt="Aimee Logo">
                                                    <h3 class="text-center">Upgrade to Awesome</h3>
                                                    <h4>Terms of Use</h4>
                                                    <div id="full_description">
                                                        <p>The fo   llowing terms and conditions govern all use of the Aimee website ("the Website"). The Website is offered subject to your acceptance without modification of all of the terms and conditions contained herein and all other operating rules, policies (including, without limitation, Aimee's Privacy Policies) and procedures that may be published from time to time on this Site by Aimee (collectively, the "Agreement").</p>

                                                        <p>Please read this Agreement carefully before accessing or using the Website. By accessing or using any part of the web site, you agree to become bound by the terms and conditions of this agreement. If you do not agree to all the terms and conditions of this agreement, then you may not access the Website or use any services. If these terms and conditions are considered an offer by Aimee, acceptance is expressly limited to these terms. The Website is available only to individuals who are at least 13 years old.</p>
                                                        
                                                        <p><b>1. Access to your Aimee Account</b></p>

                                                        <p>Subject to the terms and conditions of this Agreement, the Service is solely for User's personal use. As used herein, "User" includes Aimee's paying customers ("Customers"). This Agreement sets forth certain terms and conditions that apply to Customers, but not other Users. In the event any Customer-specific terms or conditions conflict with any of the terms or conditions that apply to Users generally, the Customer-specific terms/conditions shall control.</p>

                                                        <p>Aimee may change, suspend or discontinue the Services at any time, including the availability of any feature, database, or content. Aimee may also impose limits on certain features and services or restrict User's access to parts or all of the Services without notice or liability.</p>

                                                        <p>User certifies to Aimee that if User is an individual (i.e., not a corporation) User is at least 13 years of age. User also certifies that it is legally permitted to use the Service, and takes full responsibility for the selection and use of the the Service. This Agreement is void where prohibited by law, and the right to access the Service is revoked in such jurisdictions.</p>

                                                        <p>User shall be responsible for obtaining and maintaining any equipment or ancillary services needed to connect to, access the Service, including, without limitation, modems, hardware, software, and long distance or local telephone service. User shall be responsible for ensuring that such equipment or ancillary services are compatible with the Service.</p>

                                                        <p><b>2. Restrictions</b></p>

                                                        <p>User shall not, nor permit anyone else to, directly or indirectly: (i) reverse engineer, disassemble, decompile or otherwise attempt to discover the source code or underlying algorithms of all or any part of the Service (except that this restriction shall not apply to the limited extent restrictions on reverse engineering are prohibited by applicable local law); (ii) modify or create derivatives of any part of the Service; (iii) rent, lease, or use the Service for timesharing or service bureau purposes; or (iv) remove or obscure any proprietary notices on the Service. As between the parties, Company shall own all title, ownership rights, and intellectual property rights in and to the Service, and any copies or portions thereof.</p>

                                                        <p>User shall not use any "spider", "robot", "page-scrape" or other automatic device, program, algorithm or methodology, or any similar or equivalent manual process, to access, acquire, copy or monitor any portion of the Service or any Content, or in any way reproduce or circumvent the navigational structure or presentation of the Service or any Content, to obtain or attempt to obtain any materials, documents or information through any means not purposely made available through the Service. Aimee reserves the right to bar any such activity.</p>

                                                        <p>User shall not attempt to gain unauthorized access to any portion or feature of the Service, or any other systems or networks connected to the Service or to any Aimee server, or to any of the services offered on or through the Service, by hacking, password "mining", or any other illegitimate means.</p>

                                                        <p>User shall not probe, scan or test the vulnerability of the Service or any network connected to the Service, nor breach the security or authentication measures on the Service or any network connected to the Service.</p>

                                                        <p>User shall not take any action that imposes an unreasonable or disproportionately large load on the infrastructure of the Service or Aimee's systems or networks, or any systems or networks connected to the Service or to Aimee.</p>

                                                        <p>User shall not use any device, software or routine to interfere or attempt to interfere with the proper working of the Service or any transaction being conducted on the Service, or with any other person's use of the Service.</p>

                                                        <p>User shall not use the Service or any Content for any purpose that is unlawful or prohibited by this Agreement.</p>

                                                        <p><b>3. Fees and Payment</b></p>

                                                        <p>Optional premium paid services are available on the Website. By selecting a premium service you agree to pay Aimee the monthly or annual subscription fees indicated for that service. Payments will be charged on the day you sign up for a premium service and will cover the use of that service for a monthly or annual period as indicated. Premium service fees are not refundable.</p>

                                                        <p><b>4. Registration; Security</b></p>

                                                        <p>As a condition to using certain products and services of the Service, User may be required to register with Aimee and select a password. User shall provide Aimee with accurate, complete, and updated registration information. Failure to do so shall constitute a breach of this Agreement, which may result in immediate termination of User's account. Aimee reserves the right to refuse registration of, or cancel a Aimee User in its discretion. User shall be responsible for maintaining the confidentiality of User's Aimee password and other account information.</p>

                                                        <p><b>5. Termination</b></p>

                                                        <p>Aimee may terminate your access to all or any part of the Website at any time, with or without cause, with or without notice, effective immediately. If you wish to terminate this Agreement or your Aimee account (if you have one), you may simply discontinue using the Website. Notwithstanding the foregoing, if you have a paid account, such account can only be terminated by Aimee if you materially breach this Agreement and fail to cure such breach within thirty (30) days from Aimee's notice to you thereof; provided that, Aimee can terminate the Website immediately as part of a general shut down of our service. All provisions of this Agreement which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.</p>

                                                        <p><b>6. Content</b></p>

                                                        <p>User agrees that all content and materials (collectively, "Content") delivered via the Service or otherwise made available by Aimee at the Site are protected by copyrights, trademarks, service marks, patents, trade secrets or other proprietary rights and laws. Aimee does not support the distribution of pornographic content. Except as expressly authorized by Aimee in writing, User agrees not to sell, license, rent, modify, distribute, copy, reproduce, transmit, publicly display, publicly perform, publish, adapt, edit or create derivative works from such materials or content.</p>

                                                        <p><b>7. Changes</b></p>

                                                        <p>Aimee reserves the right, at its sole discretion, to modify or replace any part of this Agreement. It is your responsibility to check this Agreement periodically for changes. Your continued use of or access to the Website following the posting of any changes to this Agreement constitutes acceptance of those changes. Aimee may also, in the future, offer new services and/or features through the Website (including, the release of new tools and resources). Such new features and/or services shall be subject to the terms and conditions of this Agreement.</p>

                                                        <p><b>8. Warranties</b></p>

                                                        <p>If User is a Customer, Aimee makes the following warranty to Customer: Aimee shall use commercially reasonable efforts consistent with prevailing industry standards to provide the services in a professional and workmanlike manner that is free of defects. Customer's sole remedy, and Aimee's exclusive liability, for defects in the Service shall be for Aimee to use commercially reasonable efforts to promptly correct such defects.</p>

                                                        <p>Customer represents and warrants that: (i) with respect to all information it provides to Aimee (such as, Recipient Information), Customer has the full right and authority to make such provision and to allow Aimee to use such information to provide the Service (including, without limitation, for Aimee to provide such information to its data providers), (ii) none of the content (e.g. emails) transmitted, uploaded or otherwise distributed by it (or its partners or any third party) through use of the Service will infringe or otherwise conflict with the rights of any third party.</p>

                                                        <p><b>9. Warranty Disclaimer</b></p>

                                                        <p>The Website is provided "as is". Aimee and its suppliers and licensors hereby disclaim all warranties of any kind, express or implied, including, without limitation, the warranties of merchantability, fitness for a particular purpose and non-infringement. Neither Aimee nor its suppliers and licensors, makes any warranty that the Website will be error free or that access thereto will be continuous or uninterrupted. You understand that you download from, or otherwise obtain content or services through, the Website at your own discretion and risk.</p>

                                                        <p><b>10. Security</b></p>

                                                        <p>In no event will Aimee, or its suppliers or licensors, be liable with respect to any subject matter of this agreement under any contract, negligence, strict liability or other legal or equitable theory for: (i) any special, incidental or consequential damages; (ii) the cost of procurement or substitute products or services; (iii) for interruption of use or loss or corruption of data; or (iv) for any amounts that exceed the fees paid by you to Aimee under this agreement during the twelve (12) month period prior to the cause of action. Aimee shall have no liability for any failure or delay due to matters beyond their reasonable control. The foregoing shall not apply to the extent prohibited by applicable law.</p>

                                                        <p><b>11. General Representation and Warranty</b></p>

                                                        <p>You represent and warrant that (i) your use of the Website will be in strict accordance with the Aimee Privacy Policy, with this Agreement and with all applicable laws and regulations (including without limitation any local laws or regulations in your country, state, city, or other governmental area, regarding online conduct and acceptable content, and including all applicable laws regarding the transmission of technical data exported from the United Kingdom or the country in which you reside) and (ii) your use of the Website will not infringe or misappropriate the intellectual property rights of any third party.</p>

                                                        <p><b>12. Privacy</b></p>

                                                        <p>Aimee's current privacy policy is available at the Site (the "Privacy Policy"), which is incorporated by this reference. Aimee strongly recommends that you review the Privacy Policy closely.</p>

                                                        <p><b>13. Copyright</b></p>

                                                        <p>All content included on the Site, such as text, graphics, logos, button icons, images, audio clips, digital downloads, data compilations, and software, is the property of Aimee or its content suppliers and protected by United States and international copyright laws. The compilation of all content on the Site is the exclusive property of Aimee and protected by U.S. and international copyright laws. All software used on (or provided through) the Site is the property of Aimee or its software suppliers and protected by United States and international copyright laws.</p>

                                                        <p><b>14. Indemnification</b></p>

                                                        <p>You agree to indemnify and hold harmless Aimee, its contractors, and its licensors, and their respective directors, officers, employees and agents from and against any and all claims and expenses, including attorneys' fees, arising out of your use of the Website, including but not limited to out of your violation this Agreement.</p>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                        <!-- Панель 3 -->
                                        <div id="evPanel3" class="tab-pane fade">
                                            <!-- Содержимое панели 3 -->
                                            <h3 class="text-center">Manual</h3>
                                            {{-- <h3>LinkedIn accounts</h3> --}}
                                            {{-- <p>About LinkedIn.</p> --}}
                                        </div>

                                    </div>
                                    {{-- <p>Lorem ipsum</p> --}}

                                </div>
                            </div>
                            <!-- TABS -->


                            <!-- /TABS-->

                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <p class="copyright pull-right">
                        &copy; 2016 <a href="/home">Aimee</a>
                    </p>
                </div>
            </footer>
        
        {{-- <script type="text/javascript" src="js/rss.js"></script> --}}


        </div>
    </div>
    <input type="hidden" name="_token" value="{{ Session::token() }}">
@endsection
