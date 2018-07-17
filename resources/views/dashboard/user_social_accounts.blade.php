<!--
 * Account page where user can manage his twitter accounts
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
                        <div class="panel panel-default">
                            <div class="panel-heading">Social accounts</div>

                            <div class="panel-body">
                                <!-- Tabs navigation -->
                                <ul class="nav nav-tabs" id="myTabEvents">
                                    <li class="<?php if($_GET["account"] == "twitter") echo "active"?>">
                                        <a class="tabnav btn btn-block btn-social btn-twitter" onclick="window.history.replaceState(null, null, 'user_social_accounts?account=twitter')" data-toggle="tab" href="#evPanel1">
                                            <span class="fa fa-twitter"></span>
                                            Twitter
                                        </a>
                                    </li>
                                    <li class="<?php if($_GET["account"] == "facebook") echo "active"?>">
                                        <a class="tabnav btn btn-block btn-social btn-facebook" data-toggle="tab" onclick="window.history.replaceState(null, null, 'user_social_accounts?account=facebook')" href="#evPanel2">
                                            <span class="fa fa-facebook"></span>Facebook
                                        </a>
                                    </li>
                                    <li class= "<?php if($_GET["account"] == "linkedin") echo "active"?>">
                                        <a class="tabnav btn btn-block btn-social btn-linkedin" onclick="window.history.replaceState(null, null, 'user_social_accounts?account=linkedin')" data-toggle="tab" data-toggle="tab" href="#evPanel3">
                                            <span class="fa fa-linkedin"></span>LinkedIn
                                        </a>
                                    </li>

                                    {{-- <li class= "< ? php if($_GET["account"] == "instagram") echo "hide" ? >">  --}}
                                        {{-- <a class="tabnav btn btn-block btn-social btn-instagram" onclick="window.history.replaceState(null, null, 'user_social_accounts?account=instagram')" data-toggle="tab" data-toggle="tab" href="#evPanel4"> --}}
                                            {{-- <span class="fa fa-instagram"></span>Instagram --}}
                                        {{-- </a> --}}
                                    {{-- </li> --}}
                                    
                                    <li class= "<?php if($_GET["account"] == "google") echo "active"?>">
                                        <a class="tabnav btn btn-block btn-social btn-google" onclick="window.history.replaceState(null, null, 'user_social_accounts?account=google')" data-toggle="tab" data-toggle="tab" href="#evPanel5">
                                            <span class="fa fa-google"></span>Google+
                                        </a>
                                    </li>
                                </ul>

                                <!-- Start tabs panel -->
                                <div class="tab-content" id="myTabContent">
                                    <!-- Twitter tub N1 -->
                                    @include('dashboard.Account_social_tabs.twitter_tab')

                                    <!-- Facebook tub N2 -->
                                    @include('dashboard.Account_social_tabs.facebook_tab')

                                    <!-- Linkedin tub N3 -->
                                    @include('dashboard.Account_social_tabs.linkedin_tab')

                                    <!-- Instagram tub N4 -->
                                    {{-- @include('dashboard.Account_social_tabs.instagram_tab') --}}

                                    <!-- Google tub N4 -->
                                    @include('dashboard.Account_social_tabs.google_tab')
                                </div>

                            </div>
                        </div>

                        {{--Delete if no more need--}}
                        {{--<!-- Modal to add twitter accounts -->--}}
                        {{--<div class="modal fade" id="add_user_twitter_accounts" tabindex="-1" role="dialog" aria-labelledby="add_user_twitter_accounts_label">--}}
                            {{--<div class="modal-dialog" role="document">--}}
                                {{--<div class="modal-content">--}}
                                    {{--<!-- Modal Header -->--}}
                                    {{--<div class="modal-header">--}}
                                        {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
                                        {{--<h4 class="modal-title" id="add_user_twitter_accounts_label">Wellcome</h4>--}}
                                    {{--</div>--}}
                                    {{--<!-- Modal Body -->--}}
                                    {{--<form class="form-horizontal" role="form">--}}
                                        {{--<div class="modal-body">--}}
                                            {{--<!-- Twitter login -->--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label for="user_twitter_login" class="col-md-4 control-label">Twitter login @</label>--}}
                                                {{--<div class="col-md-6">--}}
                                                    {{--<input type="text" class="form-control" name="user_twitter_login" placeholder="Type your twitter login wihout @" required>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<!-- Twitter access token -->--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label for="twitter_access_token" class="col-md-4 control-label">Twitter access token</label>--}}
                                                {{--<div class="col-sm-6">--}}
                                                    {{--<input type="text" class="form-control" name="twitter_access_token" placeholder="Your twitter access token" required>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<!-- Twitter access token secret -->--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label for="twitter_access_token_secret" class="col-md-4 control-label">Twitter access token secret</label>--}}
                                                {{--<div class="col-sm-6">--}}
                                                    {{--<input type="text" class="form-control" name="twitter_access_token_secret"  placeholder="Your twitter access token secret" required>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<!-- Modal Actions -->--}}
                                        {{--<div class="modal-footer">--}}
                                            {{--<input type="hidden" name="id_user" value="{{ Auth::user()->id }}">--}}
                                            {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                                            {{--<button type="button" class="btn btn-primary" onclick="add_twitter_account()">Save account</button>--}}
                                            {{--<input type="hidden" name="_token" value="{{ Session::token() }}">--}}
                                        {{--</div>--}}
                                    {{--</form>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<!-- Modal to Edit twitter account -->--}}
                        {{--<div class="modal fade" id="edit_twitter_account" tabindex="-1" role="dialog" aria-labelledby="edit_twitter_account">--}}

                        {{--</div>--}}

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

    </div>
</div>
@endsection