<?php
/**
 * Left sidebar nav for user account
 * User: Fishouk.Alexey
 * Date: 21.11.2016
 * Time: 14:11
 */
?>
<div class="sidebar" data-color="aimee-primary" data-image="/img/sidebar-4.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->

    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="/home" class="simple-text">
                <img id="logo" src="/img/miniLogo.png" alt="Aimee Logotype">    
            </a>
        </div>

        <ul class="nav">
          <!--  <li class="{{ Request::is('accounts') ? 'active' : '' }}">
                <a href="/accounts">
                    <i class="pe-7s-speaker"></i>
                    <p>Accounts</p>
                </a>
            </li>-->
            @if (Auth::user()->subscribed('default', 'basic'))
                <li class="{{ Request::is('content') ? 'active' : '' }}">
                    <a href="/content">
                        <!-- <i class="pe-7s-chat"></i> -->
                        <i class="glyphicon glyphicon-comment"></i>
                        <p>Content</p>
                    </a>
                </li>
            @endif

            @if (Auth::user()->subscribed('default','3'))
                <li class="{{ Request::is('analytics') ? 'active' : '' }}">
                    <a href="/analytics">
                        <!-- <i class="pe-7s-display1"></i> -->
                        <i class="glyphicon glyphicon-stats"></i>
                        <p>Analytics</p>
                    </a>
                </li>
            @endif

            <li class="{{ Request::is('user') ? 'active' : '' }}">
                <a href="/user">
                    <i class="glyphicon glyphicon-user"></i>
                    <p>User Profile</p>
                </a>
            </li>
            <li class="{{ Request::is('user_social_accounts') ? 'active' : '' }}">
                <a href="/user_social_accounts?account=twitter">
                    <i class="fa fa-tags"></i>
                    <p>Social accounts</p>
                </a>
            </li>
            <li class="{{ Request::is('jobs_strategy') ? 'active' : '' }}">
                <a href="/jobs_strategy">
                    <i class="fa fa-suitcase"></i>
                    <p>Actions</p>
                </a>
            </li>
            <li class="{{ Request::is('cross_sharing') ? 'active' : '' }}">
                <a href="/cross-sharing">
                    <i class="glyphicon glyphicon-share-alt"></i>
                    <p>Cross-Sharing</p>
                </a>
            </li>
          {{-- <li class="{{ Request::is('tickets') ? 'active' : '' }}">
              <a href="/tickets">
                  <i class="fa fa-ticket"></i>
                  <p>Tickets</p>
              </a>
          </li> --}}
            <li class="{{ Request::is('security') ? 'active' : '' }}">
                <a href="/security">
                    <i class="glyphicon glyphicon-lock"></i>
                    <!-- <i class="pe-7s-lock"></i> -->
                    <p>Security</p>
                </a>
            </li>
            <li class="{{ Request::is('billing') ? 'active' : '' }}">
                <a href="/billing">
                    <i class="glyphicon glyphicon-usd"></i>
                    <!-- <i class="pe-7s-cash"></i> -->
                    <p>Billing</p>
                </a>
            </li>

            @if(Auth::check() && Auth::user()->AccountType == "3")
                <li class="{{ Request::is('analytics') ? 'active' : '' }}">
                    <a href="/analytics">
                        <!-- <i class="pe-7s-display1"></i> -->
                        <i class="glyphicon glyphicon-stats"></i>
                        <p>Analytics</p>
                    </a>
                </li>
            @endif

            {{-- <li class="{{ Request::is('notifications') ? 'active' : '' }}"> --}}
                {{-- <a href="/notifications"> --}}
                    {{-- <i class="glyphicon glyphicon-bell"></i> --}}
                    <!-- <i class="pe-7s-bell"></i> -->
                    {{-- <p>Notifications</p> --}}
                {{-- </a> --}}
            {{-- </li> --}}
            @if (! Auth::user()->subscribed('default', 'pro'))
                <li class="active-pro">
                    <a href="/billing">
                        <i class="glyphicon glyphicon-flash"></i>
                        <p>Upgrade to PRO</p>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>
