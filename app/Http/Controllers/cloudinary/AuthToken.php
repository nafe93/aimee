<!DOCTYPE html>
<html lang="en">
<head>
  <meta id="bb-bootstrap" data-current-user="{&quot;username&quot;: &quot;VVebDevel&quot;, &quot;displayName&quot;: &quot;Maks Glebov&quot;, &quot;uuid&quot;: &quot;{0cb3f3ef-9830-4c76-8626-7da922507cff}&quot;, &quot;firstName&quot;: &quot;Maks Glebov&quot;, &quot;hasPremium&quot;: true, &quot;lastName&quot;: &quot;&quot;, &quot;avatarUrl&quot;: &quot;https://bitbucket.org/account/VVebDevel/avatar/32/?ts=1493812574&quot;, &quot;isTeam&quot;: false, &quot;isSshEnabled&quot;: false, &quot;isKbdShortcutsEnabled&quot;: true, &quot;id&quot;: 8325053, &quot;isAuthenticated&quot;: true}"
data-atlassian-id="557058:9703eccd-6e07-453d-aae3-cd10aea6d71e" />
  
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta charset="utf-8">
  <title>
  crazyhare86 / aimee_debug 
  / source  / app / Http / Controllers / cloudinary / AuthToken.php
 &mdash; Bitbucket
</title>
  <script type="text/javascript">window.NREUM||(NREUM={}),__nr_require=function(e,n,t){function r(t){if(!n[t]){var o=n[t]={exports:{}};e[t][0].call(o.exports,function(n){var o=e[t][1][n];return r(o||n)},o,o.exports)}return n[t].exports}if("function"==typeof __nr_require)return __nr_require;for(var o=0;o<t.length;o++)r(t[o]);return r}({1:[function(e,n,t){function r(){}function o(e,n,t){return function(){return i(e,[c.now()].concat(u(arguments)),n?null:this,t),n?void 0:this}}var i=e("handle"),a=e(2),u=e(3),f=e("ee").get("tracer"),c=e("loader"),s=NREUM;"undefined"==typeof window.newrelic&&(newrelic=s);var p=["setPageViewName","setCustomAttribute","setErrorHandler","finished","addToTrace","inlineHit","addRelease"],d="api-",l=d+"ixn-";a(p,function(e,n){s[n]=o(d+n,!0,"api")}),s.addPageAction=o(d+"addPageAction",!0),s.setCurrentRouteName=o(d+"routeName",!0),n.exports=newrelic,s.interaction=function(){return(new r).get()};var m=r.prototype={createTracer:function(e,n){var t={},r=this,o="function"==typeof n;return i(l+"tracer",[c.now(),e,t],r),function(){if(f.emit((o?"":"no-")+"fn-start",[c.now(),r,o],t),o)try{return n.apply(this,arguments)}finally{f.emit("fn-end",[c.now()],t)}}}};a("setName,setAttribute,save,ignore,onEnd,getContext,end,get".split(","),function(e,n){m[n]=o(l+n)}),newrelic.noticeError=function(e){"string"==typeof e&&(e=new Error(e)),i("err",[e,c.now()])}},{}],2:[function(e,n,t){function r(e,n){var t=[],r="",i=0;for(r in e)o.call(e,r)&&(t[i]=n(r,e[r]),i+=1);return t}var o=Object.prototype.hasOwnProperty;n.exports=r},{}],3:[function(e,n,t){function r(e,n,t){n||(n=0),"undefined"==typeof t&&(t=e?e.length:0);for(var r=-1,o=t-n||0,i=Array(o<0?0:o);++r<o;)i[r]=e[n+r];return i}n.exports=r},{}],4:[function(e,n,t){n.exports={exists:"undefined"!=typeof window.performance&&window.performance.timing&&"undefined"!=typeof window.performance.timing.navigationStart}},{}],ee:[function(e,n,t){function r(){}function o(e){function n(e){return e&&e instanceof r?e:e?f(e,u,i):i()}function t(t,r,o,i){if(!d.aborted||i){e&&e(t,r,o);for(var a=n(o),u=m(t),f=u.length,c=0;c<f;c++)u[c].apply(a,r);var p=s[y[t]];return p&&p.push([b,t,r,a]),a}}function l(e,n){v[e]=m(e).concat(n)}function m(e){return v[e]||[]}function w(e){return p[e]=p[e]||o(t)}function g(e,n){c(e,function(e,t){n=n||"feature",y[t]=n,n in s||(s[n]=[])})}var v={},y={},b={on:l,emit:t,get:w,listeners:m,context:n,buffer:g,abort:a,aborted:!1};return b}function i(){return new r}function a(){(s.api||s.feature)&&(d.aborted=!0,s=d.backlog={})}var u="nr@context",f=e("gos"),c=e(2),s={},p={},d=n.exports=o();d.backlog=s},{}],gos:[function(e,n,t){function r(e,n,t){if(o.call(e,n))return e[n];var r=t();if(Object.defineProperty&&Object.keys)try{return Object.defineProperty(e,n,{value:r,writable:!0,enumerable:!1}),r}catch(i){}return e[n]=r,r}var o=Object.prototype.hasOwnProperty;n.exports=r},{}],handle:[function(e,n,t){function r(e,n,t,r){o.buffer([e],r),o.emit(e,n,t)}var o=e("ee").get("handle");n.exports=r,r.ee=o},{}],id:[function(e,n,t){function r(e){var n=typeof e;return!e||"object"!==n&&"function"!==n?-1:e===window?0:a(e,i,function(){return o++})}var o=1,i="nr@id",a=e("gos");n.exports=r},{}],loader:[function(e,n,t){function r(){if(!x++){var e=h.info=NREUM.info,n=d.getElementsByTagName("script")[0];if(setTimeout(s.abort,3e4),!(e&&e.licenseKey&&e.applicationID&&n))return s.abort();c(y,function(n,t){e[n]||(e[n]=t)}),f("mark",["onload",a()+h.offset],null,"api");var t=d.createElement("script");t.src="https://"+e.agent,n.parentNode.insertBefore(t,n)}}function o(){"complete"===d.readyState&&i()}function i(){f("mark",["domContent",a()+h.offset],null,"api")}function a(){return E.exists&&performance.now?Math.round(performance.now()):(u=Math.max((new Date).getTime(),u))-h.offset}var u=(new Date).getTime(),f=e("handle"),c=e(2),s=e("ee"),p=window,d=p.document,l="addEventListener",m="attachEvent",w=p.XMLHttpRequest,g=w&&w.prototype;NREUM.o={ST:setTimeout,CT:clearTimeout,XHR:w,REQ:p.Request,EV:p.Event,PR:p.Promise,MO:p.MutationObserver};var v=""+location,y={beacon:"bam.nr-data.net",errorBeacon:"bam.nr-data.net",agent:"js-agent.newrelic.com/nr-1026.min.js"},b=w&&g&&g[l]&&!/CriOS/.test(navigator.userAgent),h=n.exports={offset:u,now:a,origin:v,features:{},xhrWrappable:b};e(1),d[l]?(d[l]("DOMContentLoaded",i,!1),p[l]("load",r,!1)):(d[m]("onreadystatechange",o),p[m]("onload",r)),f("mark",["firstbyte",u],null,"api");var x=0,E=e(4)},{}]},{},["loader"]);</script>
  


<meta id="bb-canon-url" name="bb-canon-url" content="https://bitbucket.org">
<meta name="bb-api-canon-url" content="https://api.bitbucket.org">
<meta name="apitoken" content="{&quot;token&quot;: &quot;viA6Wee8UNTVuyAgoKhI2AXkXfuRQzbIwGl5TLZl3p_oPZYCZw0-sysjRa_dBMq-g_yQT8pP6GWATzBw5TnPIrjTT0Iubg==&quot;, &quot;connectionId&quot;: 619065, &quot;expiration&quot;: 1493813334.822341}">

<meta name="bb-commit-hash" content="1c299938c525">
<meta name="bb-app-node" content="app-163">
<meta name="bb-view-name" content="bitbucket.apps.repo2.views.filebrowse">
<meta name="ignore-whitespace" content="False">
<meta name="tab-size" content="None">
<meta name="locale" content="en">

<meta name="application-name" content="Bitbucket">
<meta name="apple-mobile-web-app-title" content="Bitbucket">
<meta name="theme-color" content="#205081">
<meta name="msapplication-TileColor" content="#205081">
<meta name="msapplication-TileImage" content="https://d301sr5gafysq2.cloudfront.net/1c299938c525/img/logos/bitbucket/white-256.png">
<link rel="apple-touch-icon" sizes="192x192" type="image/png" href="https://d301sr5gafysq2.cloudfront.net/1c299938c525/img/bitbucket_avatar/192/bitbucket.png">
<link rel="icon" sizes="192x192" type="image/png" href="https://d301sr5gafysq2.cloudfront.net/1c299938c525/img/bitbucket_avatar/192/bitbucket.png">
<link rel="icon" sizes="16x16 32x32" type="image/x-icon" href="/favicon.ico">
<link rel="search" type="application/opensearchdescription+xml" href="/opensearch.xml" title="Bitbucket">
  <meta name="description" content="">
  
  
    
  



  <link rel="stylesheet" href="https://d301sr5gafysq2.cloudfront.net/1c299938c525/css/entry/vendor.css" />
<link rel="stylesheet" href="https://d301sr5gafysq2.cloudfront.net/1c299938c525/css/entry/app.css" />




  
  <script src="https://d301sr5gafysq2.cloudfront.net/1c299938c525/dist/webpack/early.js"></script>
  
  
    <link href="/crazyhare86/aimee_debug/rss?token=5743b58101f2ab6ff3a12e1f26f7bea6" rel="alternate nofollow" type="application/rss+xml" title="RSS feed for aimee_debug" />

</head>
<body class="production aui-page-sidebar aui-sidebar-expanded"
    data-static-url="https://d301sr5gafysq2.cloudfront.net/1c299938c525/"
data-base-url="https://bitbucket.org"
data-no-avatar-image="https://d301sr5gafysq2.cloudfront.net/1c299938c525/img/default_avatar/user_blue.svg"
data-current-user="{&quot;username&quot;: &quot;VVebDevel&quot;, &quot;displayName&quot;: &quot;Maks Glebov&quot;, &quot;uuid&quot;: &quot;{0cb3f3ef-9830-4c76-8626-7da922507cff}&quot;, &quot;firstName&quot;: &quot;Maks Glebov&quot;, &quot;hasPremium&quot;: true, &quot;lastName&quot;: &quot;&quot;, &quot;avatarUrl&quot;: &quot;https://bitbucket.org/account/VVebDevel/avatar/32/?ts=1493812574&quot;, &quot;isTeam&quot;: false, &quot;isSshEnabled&quot;: false, &quot;isKbdShortcutsEnabled&quot;: true, &quot;id&quot;: 8325053, &quot;isAuthenticated&quot;: true}"
data-atlassian-id="{&quot;loginStatusUrl&quot;: &quot;https://id.atlassian.com/profile/rest/profile&quot;}"
data-settings="{&quot;MENTIONS_MIN_QUERY_LENGTH&quot;: 3}"

data-current-repo="{&quot;scm&quot;: &quot;git&quot;, &quot;readOnly&quot;: false, &quot;mainbranch&quot;: {&quot;name&quot;: &quot;master&quot;}, &quot;language&quot;: &quot;&quot;, &quot;owner&quot;: {&quot;username&quot;: &quot;crazyhare86&quot;, &quot;uuid&quot;: &quot;146fbec4-0bd6-4b26-858e-7c10166fffc9&quot;, &quot;isTeam&quot;: false}, &quot;fullslug&quot;: &quot;crazyhare86/aimee_debug&quot;, &quot;slug&quot;: &quot;aimee_debug&quot;, &quot;id&quot;: 22438671, &quot;pygmentsLanguage&quot;: null}"
data-current-cset="0b821ab99a1ba2bbea61af849a1c88d39986036a"





data-browser-monitoring="true"
data-switch-create-pullrequest-commit-status="true"




data-notifications="null">
<div id="page">
  
    
    <div id="wrapper">
      
  


      
        <header id="header" role="banner" data-module="header/tracking">
          
  


          <nav class="aui-header aui-dropdown2-trigger-group" role="navigation">
            <div class="aui-header-inner">
              <div class="aui-header-primary">
                
  
  <div class="aui-header-before">
    <button class="app-switcher-trigger aui-dropdown2-trigger aui-dropdown2-trigger-arrowless" aria-controls="app-switcher" aria-haspopup="true" tabindex="0"
    
        data-nav-links-count="0"
    
    >
      <span class="aui-icon aui-icon-small aui-iconfont-appswitcher">Linked applications</span>
    </button>
    
      <nav id="app-switcher" class="aui-dropdown2 aui-style-default">
        <div class="aui-dropdown2-section blank-slate">
          <h2>Connect Bitbucket with other great Atlassian products:</h2>
          <dl>
            <dt class="jira">JIRA</dt>
            <dd>Project and issue tracking</dd>
            <dt class="confluence">Confluence</dt>
            <dd>Collaboration and content sharing</dd>
            <dt class="bamboo">Bamboo</dt>
            <dd>Continuous integration</dd>
          </dl>
          <ul>
            <li>
              <a href="https://www.atlassian.com/ondemand/signup/?product=jira-software.ondemand&utm_source=bitbucket&utm_medium=button&utm_campaign=app_switcher&utm_content=trial_button"
                 class="aui-button aui-button-primary" target="_blank" id="ondemand-trial" data-ct="bitbucket.header.app.switcher.dropdown.trial.click">Free trial</a>
            </li>
            <li>
              <a href="https://www.atlassian.com/software?utm_source=bitbucket&utm_medium=button&utm_campaign=app_switcher&utm_content=learn_more_button#cloud-products"
                 class="aui-button" target="_blank" id="ondemand-learn-more" data-ct="bitbucket.header.app.switcher.dropdown.learnmore.click">Learn more</a>
            </li>
          </ul>
        </div>
      </nav>
    
  </div>


                
                  <h1 class="aui-header-logo aui-header-logo-bitbucket "
                      id="logo" data-ct="bitbucket.header.logo.click">
                    <a href="/">
                      <span class="aui-header-logo-device">Bitbucket</span>
                    </a>
                  </h1>
                
                
  

    
    
  

    
    
  
<ul class="aui-nav">
  
    <li>
      
    
    
  
      <a class="aui-dropdown2-trigger" href="#teams-dropdown" id="teams-dropdown-trigger"
          data-module="header/teams-dropdown"
          aria-owns="teams-dropdown" aria-haspopup="true">
        Teams
        <span class="aui-icon-dropdown"></span>
      </a>
      <div id="teams-dropdown" class="aui-dropdown2 aui-style-default">
        <div class="aui-dropdown2-section nav-dropdown--blank-state">
          <p>
            Effective collaboration starts with teams and projects.
          </p>
          <ul>
            <li>
              <a class="aui-button aui-button-link nav-dropdown--blank-state--cta nav-dropdown--blank-state--link" id="create-team-blank-slate"
                  data-ct="bitbucket.header.team.dropdown.create.click" data-ct-data='{"empty": true}'
                  href="/account/create-team/?team_source=menu_blank"
                  >Create a team</a>
            </li>
          </ul>
        </div>
      </div>
    </li>
    <li>
      
    
    
  
      <a class="aui-dropdown2-trigger" href="#teams-dropdown" id="projects-dropdown-trigger"
          data-module="header/projects-dropdown"
          aria-owns="projects-dropdown" aria-haspopup="true">
        Projects
        <span class="aui-icon-dropdown"></span>
      </a>
      <div id="projects-dropdown" class="aui-dropdown2 aui-style-default">
        <div class="aui-dropdown2-section nav-dropdown--blank-state">
          <p>
            
              Get a team, get projects, get organized.
            
          </p>
          <ul>
            <li>
              <a class="aui-button aui-button-link nav-dropdown--blank-state--cta nav-dropdown--blank-state--link" id="projects-create-team-blank-slate"
                  href="/account/create-team/?team_source=menu_blank"
                  >Create a team</a>
            </li>
          </ul>
        </div>
      </div>
    </li>
    <li>
      <a class="aui-dropdown2-trigger" id="repositories-dropdown-trigger"
          aria-owns="repo-dropdown" aria-haspopup="true" href="/repo/mine">
        Repositories
        <span class="aui-icon-dropdown"></span>
      </a>
      <nav id="repo-dropdown" class="aui-dropdown2 aui-style-default">
        <div id="repo-dropdown-recent" data-module="header/recent-repos"></div>
        <div class="aui-dropdown2-section">
          <ul>
            <li>
              <a href="/repo/create" class="new-repository" id="create-repo-link" data-ct="bitbucket.header.repository.dropdown.create.click">
                Create repository
              </a>
            </li>
            <li>
              <a href="/repo/import" class="import-repository" id="import-repo-link" data-ct="bitbucket.header.repository.dropdown.import.click">
                Import repository
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </li>
    <li>
      <a class="aui-dropdown2-trigger" id="snippets-dropdown-trigger"
        aria-owns="nav-recent-snippets" aria-haspopup="true" href="/dashboard/snippets">
        Snippets
        <span class="aui-icon-dropdown"></span>
      </a>
      <nav id="nav-recent-snippets" class="aui-dropdown2 aui-style-default">
        <div id="snippet-dropdown-recent" class="aui-dropdown2-section"
            data-module="snippets/recent-list"></div>
        <div class="aui-dropdown2-section">
          <ul>
            <li>
              <a href="/snippets/new" data-ct="bitbucket.header.snippets.dropdown.create.click">
                Create snippet
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </li>
  
</ul>

              </div>
              <div class="aui-header-secondary">
                
  

<ul role="menu" class="aui-nav">
  
  <li>
    <form action="/repo/all" method="get" class="aui-quicksearch">
      <label for="search-query" class="assistive">owner/repository</label>
      <input id="search-query" class="bb-repo-typeahead" type="text"
             placeholder="Find a repository&hellip;" name="name" autocomplete="off"
             data-bb-typeahead-focus="false">
    </form>
  </li>
  <li>
    <a id="help-menu-link" class="aui-nav-link" href="#"
        aria-controls="help-menu-dialog"
        data-aui-trigger>
      <span id="help-menu-icon" class="aui-icon aui-icon-small aui-iconfont-help"></span>
    </a>
  </li>
  
  
    <li>
      <a class="aui-dropdown2-trigger aui-dropdown2-trigger-arrowless"
         aria-owns="user-dropdown" aria-haspopup="true" data-container="#header .aui-header-inner"
         href="/VVebDevel/" title="VVebDevel" id="user-dropdown-trigger">
        <div class="aui-avatar aui-avatar-small">
            <div class="aui-avatar-inner">
                <img src="https://d301sr5gafysq2.cloudfront.net/1c299938c525/img/default_avatar/user_blue.svg" class="deferred-image" data-src-url="https://bitbucket.org/account/VVebDevel/avatar/32/?ts=1493812574" data-src-url-2x="https://bitbucket.org/account/VVebDevel/avatar/64/?ts=1493812574" alt="Logged in as VVebDevel" height="24" width="24">
            </div>
        </div>
      </a>
      <nav id="user-dropdown" class="aui-dropdown2 aui-style-default" aria-hidden="true">
        <div class="aui-dropdown2-section">
          <div class="aid-profile">
            <div class="aui-avatar aui-avatar-large">
              <div class="aui-avatar-inner">

                
                  
                

                <a class="aid-profile--change-avatar hoverable" target="_blank" href="https://id.atlassian.com/profile/profile.action#edit-avatar">
                  <span class="hoverable--overlay">
                    <span class="aui-icon aui-icon-large aid-profile--avatar-icon"></span>
                  </span>
                  <img src="https://d301sr5gafysq2.cloudfront.net/1c299938c525/img/default_avatar/user_blue.svg" class="deferred-image" data-src-url="https://bitbucket.org/account/VVebDevel/avatar/48/?ts=1493812574" data-src-url-2x="https://bitbucket.org/account/VVebDevel/avatar/96/?ts=1493812574" height="48" width="48">
                </a>
            </div>
          </div>
          <div class="aid-profile--info">
            <div class="aid-profile--name">
              Maks Glebov
            </div>
            <div class="aid-profile--email">
              severin2891@gmail.com
            </div>
          </div>
        </div>
          
            <ul>
              <li>
                <a href="https://id.atlassian.com/profile" id="account-link" target="_blank" data-ct="bitbucket.navbar.dropdown.manage_aid_account.click">Manage Atlassian account</a>
              </li>
            </ul>
          
        </div>
        <div class="aui-dropdown2-section">
          <ul>
            <li>
              <a href="/VVebDevel/" id="profile-link">View profile</a>
            </li>
            <li>
              <a href="/account/user/VVebDevel/" id="account-link" data-ct="bitbucket.navbar.dropdown.manage_account.click">Bitbucket settings</a>
            </li>
            <li>
              <a href="/account/user/VVebDevel/addon-directory" id="account-addons" data-ct="bitbucket.navbar.dropdown.addons.click">Integrations</a>
            </li>
          </ul>
        </div>
        <div class="aui-dropdown2-section">
          <ul>
            <li>
              
                <a href="https://id.atlassian.com/logout?continue=https%3A%2F%2Fbitbucket.org%2Faccount%2Fsignout%2F" id="log-out-link">Log out</a>
              
            </li>
          </ul>
        </div>
      </nav>
    </li>
    
      <li id="nps-survey-container"></li>
    
  
</ul>

              </div>
            </div>
          </nav>
        </header>
      

      

      
  

<div id="account-warning" data-module="header/account-warning"
  data-unconfirmed-addresses="false"
  data-no-addresses="false"
  
></div>



      
  
<header id="aui-message-bar">
  
</header>


    <div id="content" role="main">
      
        
  
    <div class="aui-sidebar repo-sidebar"
    data-module="repo/sidebar"
  >
  <div class="aui-sidebar-wrapper">
    <div class="aui-sidebar-body">
      <header class="aui-page-header">
        <div class="aui-page-header-inner">
          <div class="aui-page-header-image">
            <a href="/crazyhare86/aimee_debug" id="repo-avatar-link" class="repo-link">
              <span class="aui-avatar aui-avatar-large aui-avatar-project">
                <span class="aui-avatar-inner">
                  <img src="https://d301sr5gafysq2.cloudfront.net/1c299938c525/img/repo-avatars/default.svg" alt="">
                </span>
              </span>
            </a>
          </div>
          <div class="aui-page-header-main">
            <h1>
              
                <span class="aui-icon aui-icon-small aui-iconfont-locked"></span>
              
              <a href="/crazyhare86/aimee_debug" title="aimee_debug" class="entity-name">aimee_debug</a>
            </h1>
          </div>
        </div>
      </header>
      <nav class="aui-navgroup aui-navgroup-vertical">
        <div class="aui-navgroup-inner">
          
            
              <div class="aui-sidebar-group aui-sidebar-group-actions repository-actions forks-enabled can-create">
                <div class="aui-nav-heading">
                  <strong>Actions</strong>
                </div>
                <ul id="repo-actions" class="aui-nav">
                  
                  
                    <li>
                      <a id="repo-clone-button" class="aui-nav-item "
                        href="#clone"
                        data-ct="bitbucket.sidebar.actions.click"
                        data-ct-data="{&quot;label&quot;: &quot;repository.clone&quot;}"
                        data-module="components/clone/clone-dialog"
                        target="_self">
                        
                          <span class="aui-icon aui-icon-large icon-clone"></span>
                        
                        <span class="aui-nav-item-label">Clone</span>
                      </a>
                    </li>
                  
                    <li>
                      <a id="repo-create-branch-link" class="aui-nav-item create-branch-button"
                        href="/crazyhare86/aimee_debug/branch"
                        data-ct="bitbucket.sidebar.actions.click"
                        data-ct-data="{&quot;label&quot;: &quot;repository.create_branch&quot;}"
                        data-module="repo/create-branch"
                        target="_self">
                        
                          <span class="aui-icon aui-icon-large icon-create-branch"></span>
                        
                        <span class="aui-nav-item-label">Create branch</span>
                      </a>
                    </li>
                  
                    <li>
                      <a id="repo-create-pull-request-link" class="aui-nav-item "
                        href="/crazyhare86/aimee_debug/pull-requests/new"
                        data-ct="bitbucket.sidebar.actions.click"
                        data-ct-data="{&quot;label&quot;: &quot;create_pullrequest&quot;}"
                        
                        target="_self">
                        
                          <span class="aui-icon aui-icon-large icon-create-pull-request"></span>
                        
                        <span class="aui-nav-item-label">Create pull request</span>
                      </a>
                    </li>
                  
                    <li>
                      <a id="repo-compare-link" class="aui-nav-item "
                        href="/crazyhare86/aimee_debug/branches/compare"
                        data-ct="bitbucket.sidebar.actions.click"
                        data-ct-data="{&quot;label&quot;: &quot;repository.compare&quot;}"
                        
                        target="_self">
                        
                          <span class="aui-icon aui-icon-large aui-icon-small aui-iconfont-devtools-compare"></span>
                        
                        <span class="aui-nav-item-label">Compare</span>
                      </a>
                    </li>
                  
                    <li>
                      <a id="repo-fork-link" class="aui-nav-item "
                        href="/crazyhare86/aimee_debug/fork"
                        data-ct="bitbucket.sidebar.actions.click"
                        data-ct-data="{&quot;label&quot;: &quot;repository.fork&quot;}"
                        
                        target="_self">
                        
                          <span class="aui-icon aui-icon-large icon-fork"></span>
                        
                        <span class="aui-nav-item-label">Fork</span>
                      </a>
                    </li>
                  
                </ul>
              </div>
          
          <div class="aui-sidebar-group aui-sidebar-group-tier-one repository-sections">
            <div class="aui-nav-heading">
              <strong>Navigation</strong>
            </div>
            <ul class="aui-nav">
              
              
                <li>
                  <a id="repo-overview-link" class="aui-nav-item "
                    href="/crazyhare86/aimee_debug/overview"
                    data-ct="bitbucket.sidebar.navigation.click"
                    data-ct-data="{&quot;label&quot;: &quot;repository.overview&quot;}"
                    
                    target="_self"
                    >
                    
                    
                      <span class="aui-icon aui-icon-large icon-overview"></span>
                    
                    <span class="aui-nav-item-label">
                      Overview
                      
                      
                    </span>
                  </a>
                </li>
              
                <li class="aui-nav-selected">
                  <a id="repo-source-link" class="aui-nav-item "
                    href="/crazyhare86/aimee_debug/src"
                    data-ct="bitbucket.sidebar.navigation.click"
                    data-ct-data="{&quot;label&quot;: &quot;repository.source&quot;}"
                    
                    target="_self"
                    >
                    
                    
                      <span class="aui-icon aui-icon-large icon-source"></span>
                    
                    <span class="aui-nav-item-label">
                      Source
                      
                      
                    </span>
                  </a>
                </li>
              
                <li>
                  <a id="repo-commits-link" class="aui-nav-item "
                    href="/crazyhare86/aimee_debug/commits/"
                    data-ct="bitbucket.sidebar.navigation.click"
                    data-ct-data="{&quot;label&quot;: &quot;repository.commits&quot;}"
                    
                    target="_self"
                    >
                    
                    
                      <span class="aui-icon aui-icon-large icon-commits"></span>
                    
                    <span class="aui-nav-item-label">
                      Commits
                      
                      
                    </span>
                  </a>
                </li>
              
                <li>
                  <a id="repo-branches-link" class="aui-nav-item "
                    href="/crazyhare86/aimee_debug/branches/"
                    data-ct="bitbucket.sidebar.navigation.click"
                    data-ct-data="{&quot;label&quot;: &quot;repository.branches&quot;}"
                    
                    target="_self"
                    >
                    
                    
                      <span class="aui-icon aui-icon-large icon-branches"></span>
                    
                    <span class="aui-nav-item-label">
                      Branches
                      
                      
                    </span>
                  </a>
                </li>
              
                <li>
                  <a id="repo-pullrequests-link" class="aui-nav-item "
                    href="/crazyhare86/aimee_debug/pull-requests/"
                    data-ct="bitbucket.sidebar.navigation.click"
                    data-ct-data="{&quot;label&quot;: &quot;repository.pullrequests&quot;}"
                    
                    target="_self"
                    >
                    
                    
                      <span class="aui-icon aui-icon-large icon-pull-requests"></span>
                    
                    <span class="aui-nav-item-label">
                      Pull requests
                      
                      
                    </span>
                  </a>
                </li>
              
                <li>
                  <a id="repopage-qLXdo-add-on-link" class="aui-nav-item aui-nav-item add-on-menu-item"
                    href="/crazyhare86/aimee_debug/addon/pipelines/home"
                    data-ct="bitbucket.sidebar.navigation.click"
                    data-ct-data="{&quot;addon_key&quot;: &quot;pipelines&quot;, &quot;module_key&quot;: &quot;home&quot;, &quot;label&quot;: &quot;user.addon&quot;}"
                    
                    target="_self"
                    >
                    
                    
                      <span class="aui-icon aui-icon-large aui-iconfont-build"></span>
                    
                    <span class="aui-nav-item-label">
                      Pipelines
                      
                      
                        
                          <span class="aui-lozenge aui-lozenge-current">New</span>
                        
                      
                    </span>
                  </a>
                </li>
              
                <li>
                  <a id="repo-downloads-link" class="aui-nav-item "
                    href="/crazyhare86/aimee_debug/downloads/"
                    data-ct="bitbucket.sidebar.navigation.click"
                    data-ct-data="{&quot;label&quot;: &quot;repository.downloads&quot;}"
                    
                    target="_self"
                    >
                    
                    
                      <span class="aui-icon aui-icon-large icon-downloads"></span>
                    
                    <span class="aui-nav-item-label">
                      Downloads
                      
                      
                    </span>
                  </a>
                </li>
              
            </ul>
          </div>
          <div class="aui-sidebar-group aui-sidebar-group-tier-one repository-settings">
            <div class="aui-nav-heading">
              <strong class="assistive">Settings</strong>
            </div>
            <ul class="aui-nav">
              
              
            </ul>
          </div>
          
        </div>
      </nav>
    </div>
    <div class="aui-sidebar-footer">
      <a class="aui-sidebar-toggle aui-sidebar-footer-tipsy aui-button aui-button-subtle"><span class="aui-icon"></span></a>
    </div>
  </div>
  

<div id="repo-clone-dialog" class="clone-dialog hidden">
  





  

<div class="clone-url" data-module="components/clone/url-dropdown" data-owner="146fbec4-0bd6-4b26-858e-7c10166fffc9"
     data-location-context="header"
     data-fetch-url="https://VVebDevel@bitbucket.org/crazyhare86/aimee_debug.git"
     data-push-url="https://VVebDevel@bitbucket.org/crazyhare86/aimee_debug.git"
     
     
     
     >
  <div class="aui-buttons">
    
    <button class="aui-button aui-dropdown2-trigger protocol-trigger"
            data-command-prefix="git clone"
            data-primary-https="https://VVebDevel@bitbucket.org/crazyhare86/aimee_debug.git"
            data-primary-ssh="git@bitbucket.org:crazyhare86/aimee_debug.git"
            aria-controls="protocols-list-header">
      <span class="dropdown-text">HTTPS</span>
    </button>
    <aui-dropdown-menu id="protocols-list-header" data-aui-alignment="bottom left">
      <aui-section id="protocols-list-section" class="aui-list-truncate">
        <aui-item-radio class="item-link https" checked>HTTPS</aui-item-radio>
        
          <aui-item-radio class="item-link ssh">SSH</aui-item-radio>
        
      </aui-section>
    </aui-dropdown-menu>
    <input type="text" readonly="readonly" class="clone-url-input"
           value="git clone https://VVebDevel@bitbucket.org/crazyhare86/aimee_debug.git">
  </div>
  
</div>

  <div class="learn-more">
    <p>Need help cloning? Learn how to
         <a href="https://confluence.atlassian.com/x/4whODQ" target="_blank">clone a repository</a>.
    </p>
  </div>
  
  <div class="sourcetree-callout clone-in-sourcetree"
  data-module="components/clone/clone-in-sourcetree"
  data-https-url="https://VVebDevel@bitbucket.org/crazyhare86/aimee_debug.git"
  data-ssh-url="ssh://git@bitbucket.org/crazyhare86/aimee_debug.git">

  <div>
    <button class="aui-button aui-button-primary">
      
        Clone in SourceTree
      
    </button>
  </div>

  <p class="windows-text">
    
      <a href="http://www.sourcetreeapp.com/?utm_source=internal&amp;utm_medium=link&amp;utm_campaign=clone_repo_win" target="_blank">Atlassian SourceTree</a>
      is a free Git and Mercurial client for Windows.
    
  </p>
  <p class="mac-text">
    
      <a href="http://www.sourcetreeapp.com/?utm_source=internal&amp;utm_medium=link&amp;utm_campaign=clone_repo_mac" target="_blank">Atlassian SourceTree</a>
      is a free Git and Mercurial client for Mac.
    
  </p>
</div>
</div>
</div>
  

        
  <div class="aui-page-panel ">
    <div class="hidden">
  
  </div>
    <div class="aui-page-panel-inner">
      <div id="repo-content" class="aui-page-panel-content"
          data-module="repo/index"
          
          >
        
          
            <ol class="aui-nav aui-nav-breadcrumbs">
              <li>
  <a href="/crazyhare86/">Sergei Zaitsev</a>
</li>

<li>
  <a href="/crazyhare86/aimee_debug">aimee_debug</a>
</li>
              
            </ol>
          
          <div class="aui-group repo-page-header">
            <div class="aui-item section-title">
              <h1>Source</h1>
            </div>
            <div class="aui-item page-actions">
              
            </div>
          </div>
        
        
  <div id="source-container" class="maskable" data-module="repo/source/index">
    



<header id="source-path">
  
    <div class="labels labels-csv">
      <div class="aui-buttons">
        <button data-branches-tags-url="/api/1.0/repositories/crazyhare86/aimee_debug/branches-tags"
                data-module="components/branch-dialog"
                class="aui-button branch-dialog-trigger" title="Nafanail">
          
            
              <span class="aui-icon aui-icon-small aui-iconfont-devtools-branch">Branch</span>
            
            <span class="name">Nafanail</span>
          
          <span class="aui-icon-dropdown"></span>
        </button>
        <button class="aui-button" id="checkout-branch-button"
                title="Check out this branch">
          <span class="aui-icon aui-icon-small aui-iconfont-devtools-clone">Check out branch</span>
          <span class="aui-icon-dropdown"></span>
        </button>
      </div>
      
    
    
  
    </div>
  
  
    <div class="secondary-actions">
      <div class="aui-buttons">
        
          <a href="/crazyhare86/aimee_debug/src/0b821ab99a1b/app/Http/Controllers/cloudinary/AuthToken.php?at=Nafanail"
            class="aui-button pjax-trigger" aria-pressed="true">
            Source
          </a>
          <a href="/crazyhare86/aimee_debug/diff/app/Http/Controllers/cloudinary/AuthToken.php?diff2=0b821ab99a1b&at=Nafanail"
            class="aui-button pjax-trigger"
            title="Diff to previous change">
            Diff
          </a>
          <a href="/crazyhare86/aimee_debug/history-node/0b821ab99a1b/app/Http/Controllers/cloudinary/AuthToken.php?at=Nafanail"
            class="aui-button pjax-trigger">
            History
          </a>
        
      </div>
    </div>
  
  <h1>
    
      
        <a href="/crazyhare86/aimee_debug/src/0b821ab99a1b?at=Nafanail"
          class="pjax-trigger root" title="crazyhare86/aimee_debug at 0b821ab99a1b">aimee_debug</a> /
      
      
        
          
            <a href="/crazyhare86/aimee_debug/src/0b821ab99a1b/app/?at=Nafanail"
              class="pjax-trigger directory-name">app</a> /
          
        
      
        
          
            <a href="/crazyhare86/aimee_debug/src/0b821ab99a1b/app/Http/?at=Nafanail"
              class="pjax-trigger directory-name">Http</a> /
          
        
      
        
          
            <a href="/crazyhare86/aimee_debug/src/0b821ab99a1b/app/Http/Controllers/?at=Nafanail"
              class="pjax-trigger directory-name">Controllers</a> /
          
        
      
        
          
            <a href="/crazyhare86/aimee_debug/src/0b821ab99a1b/app/Http/Controllers/cloudinary/?at=Nafanail"
              class="pjax-trigger directory-name">cloudinary</a> /
          
        
      
        
          
            <span class="file-name">AuthToken.php</span>
          
        
      
    
  </h1>
  
    
    
  
  <div class="clearfix"></div>
</header>


  
    
  

  <div id="editor-container" class="maskable"
       data-module="repo/source/editor"
       data-owner="crazyhare86"
       data-slug="aimee_debug"
       data-is-writer="true"
       data-has-push-access="true"
       data-hash="0b821ab99a1ba2bbea61af849a1c88d39986036a"
       data-branch="Nafanail"
       data-path="app/Http/Controllers/cloudinary/AuthToken.php"
       data-source-url="/api/internal/repositories/crazyhare86/aimee_debug/src/0b821ab99a1ba2bbea61af849a1c88d39986036a/app/Http/Controllers/cloudinary/AuthToken.php">
    <div id="source-view" class="file-source-container" data-module="repo/source/view-file" data-is-lfs="false">
      <div class="toolbar">
        <div class="primary">
          <div class="aui-buttons">
            
              <button id="file-history-trigger" class="aui-button aui-button-light changeset-info"
                      data-changeset="0b821ab99a1ba2bbea61af849a1c88d39986036a"
                      data-path="app/Http/Controllers/cloudinary/AuthToken.php"
                      data-current="0b821ab99a1ba2bbea61af849a1c88d39986036a">
                 

  <div class="aui-avatar aui-avatar-xsmall">
    <div class="aui-avatar-inner">
      <img src="https://d301sr5gafysq2.cloudfront.net/1c299938c525/img/default_avatar/user_blue.svg">
    </div>
  </div>
  <span class="changeset-hash">0b821ab</span>
  <time datetime="2017-05-03T10:12:23+00:00" class="timestamp"></time>
  <span class="aui-icon-dropdown"></span>

              </button>
            
          </div>
          
          <a href="/crazyhare86/aimee_debug/full-commit/0b821ab99a1b/app/Http/Controllers/cloudinary/AuthToken.php" id="full-commit-link"
             title="View full commit 0b821ab">Full commit</a>
        </div>
        <div class="secondary">
          
          <div class="aui-buttons">
            
              <a href="/crazyhare86/aimee_debug/annotate/0b821ab99a1ba2bbea61af849a1c88d39986036a/app/Http/Controllers/cloudinary/AuthToken.php?at=Nafanail"
                 class="aui-button aui-button-light pjax-trigger">Blame</a>
              
            
            <a href="/crazyhare86/aimee_debug/raw/0b821ab99a1ba2bbea61af849a1c88d39986036a/app/Http/Controllers/cloudinary/AuthToken.php" class="aui-button aui-button-light">Raw</a>
          </div>
          
            <div class="aui-buttons">
              
              <button id="file-edit-button" class="edit-button aui-button aui-button-light aui-button-split-main"
                  >
                Edit
                
              </button>
              <button id="file-more-actions-button" class="aui-button aui-button-light aui-dropdown2-trigger aui-button-split-more" aria-owns="split-container-dropdown" aria-haspopup="true"
                  >
                More file actions
              </button>
            </div>
            <div id="split-container-dropdown" class="aui-dropdown2 aui-style-default" data-container="#editor-container">
              <ul class="aui-list-truncate">
                <li><a href="#" data-module="repo/source/rename-file" class="rename-link">Rename</a></li>
                <li><a href="#" data-module="repo/source/delete-file" class="delete-link">Delete</a></li>
              </ul>
            </div>
          
        </div>

        <div id="fileview-dropdown"
            class="aui-dropdown2 aui-style-default"
            data-fileview-container="#fileview-container"
            
            
            data-fileview-button="#fileview-trigger"
            data-module="connect/fileview">
          <div class="aui-dropdown2-section">
            <ul>
              <li>
                <a class="aui-dropdown2-radio aui-dropdown2-checked"
                    data-fileview-id="-1"
                    data-fileview-loaded="true"
                    data-fileview-target="#fileview-original"
                    data-fileview-connection-key=""
                    data-fileview-module-key="file-view-default">
                  Default File Viewer
                </a>
              </li>
              
            </ul>
          </div>
        </div>

        <div class="clearfix"></div>
      </div>
      <div id="fileview-container">
        <div id="fileview-original"
            class="fileview"
            data-module="repo/source/highlight-lines"
            data-fileview-loaded="true">
          


  
    <div class="file-source">
      <table class="codehilite highlighttable"><tr><td class="linenos"><div class="linenodiv"><pre><a href="#AuthToken.php-1"> 1</a>
<a href="#AuthToken.php-2"> 2</a>
<a href="#AuthToken.php-3"> 3</a>
<a href="#AuthToken.php-4"> 4</a>
<a href="#AuthToken.php-5"> 5</a>
<a href="#AuthToken.php-6"> 6</a>
<a href="#AuthToken.php-7"> 7</a>
<a href="#AuthToken.php-8"> 8</a>
<a href="#AuthToken.php-9"> 9</a>
<a href="#AuthToken.php-10">10</a>
<a href="#AuthToken.php-11">11</a>
<a href="#AuthToken.php-12">12</a>
<a href="#AuthToken.php-13">13</a>
<a href="#AuthToken.php-14">14</a>
<a href="#AuthToken.php-15">15</a>
<a href="#AuthToken.php-16">16</a>
<a href="#AuthToken.php-17">17</a>
<a href="#AuthToken.php-18">18</a>
<a href="#AuthToken.php-19">19</a>
<a href="#AuthToken.php-20">20</a>
<a href="#AuthToken.php-21">21</a>
<a href="#AuthToken.php-22">22</a>
<a href="#AuthToken.php-23">23</a>
<a href="#AuthToken.php-24">24</a>
<a href="#AuthToken.php-25">25</a>
<a href="#AuthToken.php-26">26</a>
<a href="#AuthToken.php-27">27</a>
<a href="#AuthToken.php-28">28</a>
<a href="#AuthToken.php-29">29</a>
<a href="#AuthToken.php-30">30</a>
<a href="#AuthToken.php-31">31</a>
<a href="#AuthToken.php-32">32</a>
<a href="#AuthToken.php-33">33</a>
<a href="#AuthToken.php-34">34</a>
<a href="#AuthToken.php-35">35</a>
<a href="#AuthToken.php-36">36</a>
<a href="#AuthToken.php-37">37</a>
<a href="#AuthToken.php-38">38</a>
<a href="#AuthToken.php-39">39</a>
<a href="#AuthToken.php-40">40</a>
<a href="#AuthToken.php-41">41</a>
<a href="#AuthToken.php-42">42</a>
<a href="#AuthToken.php-43">43</a>
<a href="#AuthToken.php-44">44</a>
<a href="#AuthToken.php-45">45</a>
<a href="#AuthToken.php-46">46</a>
<a href="#AuthToken.php-47">47</a>
<a href="#AuthToken.php-48">48</a>
<a href="#AuthToken.php-49">49</a>
<a href="#AuthToken.php-50">50</a>
<a href="#AuthToken.php-51">51</a>
<a href="#AuthToken.php-52">52</a>
<a href="#AuthToken.php-53">53</a>
<a href="#AuthToken.php-54">54</a>
<a href="#AuthToken.php-55">55</a>
<a href="#AuthToken.php-56">56</a>
<a href="#AuthToken.php-57">57</a>
<a href="#AuthToken.php-58">58</a>
<a href="#AuthToken.php-59">59</a>
<a href="#AuthToken.php-60">60</a>
<a href="#AuthToken.php-61">61</a>
<a href="#AuthToken.php-62">62</a>
<a href="#AuthToken.php-63">63</a>
<a href="#AuthToken.php-64">64</a>
<a href="#AuthToken.php-65">65</a>
<a href="#AuthToken.php-66">66</a>
<a href="#AuthToken.php-67">67</a>
<a href="#AuthToken.php-68">68</a>
<a href="#AuthToken.php-69">69</a>
<a href="#AuthToken.php-70">70</a>
<a href="#AuthToken.php-71">71</a>
<a href="#AuthToken.php-72">72</a></pre></div></td><td class="code"><div class="codehilite highlight"><pre><span></span><a name="AuthToken.php-1"></a><span class="cp">&lt;?php</span>
<a name="AuthToken.php-2"></a>
<a name="AuthToken.php-3"></a><span class="k">namespace</span> <span class="nx">Cloudinary</span><span class="p">;</span>
<a name="AuthToken.php-4"></a>
<a name="AuthToken.php-5"></a>
<a name="AuthToken.php-6"></a><span class="k">class</span> <span class="nc">AuthToken</span> <span class="p">{</span>
<a name="AuthToken.php-7"></a>
<a name="AuthToken.php-8"></a>	<span class="sd">/**</span>
<a name="AuthToken.php-9"></a><span class="sd">	 *  Generate an authorization token.</span>
<a name="AuthToken.php-10"></a><span class="sd">	 *  Options:</span>
<a name="AuthToken.php-11"></a><span class="sd">	 *      string key - the secret key required to sign the token</span>
<a name="AuthToken.php-12"></a><span class="sd">	 *      string ip - the IP address of the client</span>
<a name="AuthToken.php-13"></a><span class="sd">	 *      number start_time - the start time of the token in seconds from epoch</span>
<a name="AuthToken.php-14"></a><span class="sd">	 *      string expiration - the expiration time of the token in seconds from epoch</span>
<a name="AuthToken.php-15"></a><span class="sd">	 *      string duration - the duration of the token (from start_time)</span>
<a name="AuthToken.php-16"></a><span class="sd">	 *      string acl - the ACL for the token</span>
<a name="AuthToken.php-17"></a><span class="sd">	 *      string url - the URL to authentication in case of a URL token</span>
<a name="AuthToken.php-18"></a><span class="sd">	 *</span>
<a name="AuthToken.php-19"></a><span class="sd">	 * @param array $options token configuration</span>
<a name="AuthToken.php-20"></a><span class="sd">	 *</span>
<a name="AuthToken.php-21"></a><span class="sd">	 * @return string the authorization token</span>
<a name="AuthToken.php-22"></a><span class="sd">	 * @throws Error if both expiration and duration were not provided</span>
<a name="AuthToken.php-23"></a><span class="sd">	 */</span>
<a name="AuthToken.php-24"></a>	<span class="k">public</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">generate</span><span class="p">(</span><span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">()){</span>
<a name="AuthToken.php-25"></a>		<span class="nv">$key</span> <span class="o">=</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;key&quot;</span><span class="p">);</span>
<a name="AuthToken.php-26"></a>		<span class="k">if</span><span class="p">(</span><span class="o">!</span><span class="nb">isset</span><span class="p">(</span><span class="nv">$key</span><span class="p">))</span> <span class="k">throw</span> <span class="k">new</span> <span class="nx">\Cloudinary\Error</span><span class="p">(</span><span class="s2">&quot;Missing authentication token key configuration&quot;</span><span class="p">);</span>
<a name="AuthToken.php-27"></a>		<span class="nv">$name</span> <span class="o">=</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;token_name&quot;</span><span class="p">,</span> <span class="s2">&quot;__cld_token__&quot;</span><span class="p">);</span>
<a name="AuthToken.php-28"></a>		<span class="nv">$start</span> <span class="o">=</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;start_time&quot;</span><span class="p">);</span>
<a name="AuthToken.php-29"></a>		<span class="nv">$expiration</span> <span class="o">=</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;expiration&quot;</span><span class="p">);</span>
<a name="AuthToken.php-30"></a>		<span class="nv">$ip</span> <span class="o">=</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;ip&quot;</span><span class="p">);</span>
<a name="AuthToken.php-31"></a>		<span class="nv">$acl</span> <span class="o">=</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;acl&quot;</span><span class="p">);</span>
<a name="AuthToken.php-32"></a>		<span class="nv">$url</span> <span class="o">=</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;url&quot;</span><span class="p">);</span>
<a name="AuthToken.php-33"></a>		<span class="nv">$duration</span>  <span class="o">=</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;duration&quot;</span><span class="p">);</span>
<a name="AuthToken.php-34"></a>
<a name="AuthToken.php-35"></a>		<span class="k">if</span><span class="p">(</span><span class="o">!</span><span class="nb">strcasecmp</span><span class="p">(</span><span class="nv">$start</span><span class="p">,</span> <span class="s2">&quot;now&quot;</span><span class="p">))</span> <span class="p">{</span>
<a name="AuthToken.php-36"></a>			<span class="nv">$start</span> <span class="o">=</span> <span class="nb">time</span><span class="p">();</span>
<a name="AuthToken.php-37"></a>		<span class="p">}</span> <span class="k">elseif</span> <span class="p">(</span><span class="nb">is_numeric</span><span class="p">(</span><span class="nv">$start</span><span class="p">))</span> <span class="p">{</span>
<a name="AuthToken.php-38"></a>			<span class="nv">$start</span> <span class="o">=</span> <span class="mi">0</span> <span class="o">+</span> <span class="nv">$start</span><span class="p">;</span>
<a name="AuthToken.php-39"></a>		<span class="p">}</span>
<a name="AuthToken.php-40"></a>		<span class="k">if</span><span class="p">(</span><span class="o">!</span><span class="nb">isset</span><span class="p">(</span><span class="nv">$expiration</span><span class="p">)){</span>
<a name="AuthToken.php-41"></a>			<span class="k">if</span><span class="p">(</span><span class="nb">isset</span><span class="p">(</span><span class="nv">$duration</span><span class="p">)){</span>
<a name="AuthToken.php-42"></a>				<span class="nv">$expiration</span> <span class="o">=</span> <span class="p">(</span><span class="nb">isset</span><span class="p">(</span><span class="nv">$start</span><span class="p">)</span> <span class="o">?</span> <span class="nv">$start</span> <span class="o">:</span> <span class="nb">time</span><span class="p">())</span> <span class="o">+</span> <span class="nv">$duration</span><span class="p">;</span>
<a name="AuthToken.php-43"></a>			<span class="p">}</span> <span class="k">else</span> <span class="p">{</span>
<a name="AuthToken.php-44"></a>				<span class="k">throw</span> <span class="k">new</span> <span class="nx">\Cloudinary\Error</span><span class="p">(</span><span class="s2">&quot;Must provide &#39;expiration&#39; or &#39;duration&#39;.&quot;</span><span class="p">);</span>
<a name="AuthToken.php-45"></a>			<span class="p">}</span>
<a name="AuthToken.php-46"></a>		<span class="p">}</span>
<a name="AuthToken.php-47"></a>		<span class="nv">$token</span> <span class="o">=</span> <span class="k">array</span><span class="p">();</span>
<a name="AuthToken.php-48"></a>		<span class="k">if</span><span class="p">(</span><span class="nb">isset</span><span class="p">(</span><span class="nv">$ip</span><span class="p">))</span> <span class="nb">array_push</span><span class="p">(</span><span class="nv">$token</span><span class="p">,</span> <span class="s2">&quot;ip=</span><span class="si">$ip</span><span class="s2">&quot;</span><span class="p">);</span>
<a name="AuthToken.php-49"></a>		<span class="k">if</span><span class="p">(</span><span class="nb">isset</span><span class="p">(</span><span class="nv">$start</span><span class="p">))</span> <span class="nb">array_push</span><span class="p">(</span><span class="nv">$token</span><span class="p">,</span> <span class="s2">&quot;st=</span><span class="si">$start</span><span class="s2">&quot;</span><span class="p">);</span>
<a name="AuthToken.php-50"></a>		<span class="nb">array_push</span><span class="p">(</span><span class="nv">$token</span><span class="p">,</span> <span class="s2">&quot;exp=</span><span class="si">$expiration</span><span class="s2">&quot;</span><span class="p">);</span>
<a name="AuthToken.php-51"></a>		<span class="k">if</span><span class="p">(</span><span class="nb">isset</span><span class="p">(</span><span class="nv">$acl</span><span class="p">))</span> <span class="nb">array_push</span><span class="p">(</span><span class="nv">$token</span><span class="p">,</span> <span class="s2">&quot;acl=&quot;</span> <span class="o">.</span> <span class="nx">self</span><span class="o">::</span><span class="na">escape_to_lower</span><span class="p">(</span><span class="nv">$acl</span><span class="p">));</span>
<a name="AuthToken.php-52"></a>		<span class="nv">$to_sign</span> <span class="o">=</span> <span class="nv">$token</span><span class="p">;</span>
<a name="AuthToken.php-53"></a>		<span class="k">if</span><span class="p">(</span><span class="nb">isset</span><span class="p">(</span><span class="nv">$url</span><span class="p">))</span> <span class="nb">array_push</span><span class="p">(</span><span class="nv">$to_sign</span><span class="p">,</span> <span class="s2">&quot;url=&quot;</span> <span class="o">.</span> <span class="nx">self</span><span class="o">::</span><span class="na">escape_to_lower</span><span class="p">(</span><span class="nv">$url</span><span class="p">));</span>
<a name="AuthToken.php-54"></a>		<span class="nv">$auth</span> <span class="o">=</span> <span class="nx">self</span><span class="o">::</span><span class="na">digest</span><span class="p">(</span><span class="nb">join</span><span class="p">(</span><span class="s2">&quot;~&quot;</span><span class="p">,</span> <span class="nv">$to_sign</span><span class="p">),</span> <span class="nv">$key</span><span class="p">);</span>
<a name="AuthToken.php-55"></a>		<span class="nb">array_push</span><span class="p">(</span><span class="nv">$token</span><span class="p">,</span> <span class="s2">&quot;hmac=</span><span class="si">$auth</span><span class="s2">&quot;</span><span class="p">);</span>
<a name="AuthToken.php-56"></a>		<span class="k">return</span> <span class="s2">&quot;</span><span class="si">$name</span><span class="s2">=&quot;</span> <span class="o">.</span> <span class="nb">join</span><span class="p">(</span><span class="s2">&quot;~&quot;</span><span class="p">,</span> <span class="nv">$token</span><span class="p">);</span>
<a name="AuthToken.php-57"></a>	<span class="p">}</span>
<a name="AuthToken.php-58"></a>
<a name="AuthToken.php-59"></a>	<span class="k">private</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">digest</span><span class="p">(</span><span class="nv">$message</span><span class="p">,</span> <span class="nv">$key</span> <span class="o">=</span> <span class="k">NULL</span><span class="p">)</span> <span class="p">{</span>
<a name="AuthToken.php-60"></a>		<span class="k">if</span><span class="p">(</span><span class="o">!</span><span class="nb">isset</span><span class="p">(</span><span class="nv">$key</span><span class="p">))</span> <span class="nv">$key</span> <span class="o">=</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">config_get</span><span class="p">(</span><span class="s2">&quot;akamai_key&quot;</span><span class="p">);</span>
<a name="AuthToken.php-61"></a>		<span class="nv">$bin_key</span> <span class="o">=</span> <span class="nb">pack</span><span class="p">(</span><span class="s2">&quot;H*&quot;</span><span class="p">,</span> <span class="nv">$key</span><span class="p">);</span>
<a name="AuthToken.php-62"></a>		<span class="k">return</span> <span class="nb">hash_hmac</span><span class="p">(</span> <span class="s2">&quot;sha256&quot;</span><span class="p">,</span> <span class="nv">$message</span><span class="p">,</span> <span class="nv">$bin_key</span><span class="p">);</span>
<a name="AuthToken.php-63"></a>	<span class="p">}</span>
<a name="AuthToken.php-64"></a>
<a name="AuthToken.php-65"></a>	<span class="k">private</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">escape_to_lower</span><span class="p">(</span><span class="nv">$url</span><span class="p">)</span> <span class="p">{</span>
<a name="AuthToken.php-66"></a>		<span class="nv">$escaped_url</span> <span class="o">=</span> <span class="nb">rawurlencode</span><span class="p">(</span> <span class="nv">$url</span> <span class="p">);</span>
<a name="AuthToken.php-67"></a>		<span class="nv">$escaped_url</span> <span class="o">=</span> <span class="nb">preg_replace_callback</span><span class="p">(</span><span class="s2">&quot;/(%..)/&quot;</span><span class="p">,</span> <span class="k">function</span><span class="p">(</span><span class="nv">$match</span><span class="p">)</span> <span class="p">{</span>
<a name="AuthToken.php-68"></a>			<span class="k">return</span> <span class="nb">strtolower</span><span class="p">(</span><span class="nv">$match</span><span class="p">[</span><span class="mi">1</span><span class="p">]);</span>
<a name="AuthToken.php-69"></a>		<span class="p">},</span> <span class="nv">$escaped_url</span><span class="p">);</span>
<a name="AuthToken.php-70"></a>		<span class="k">return</span> <span class="nv">$escaped_url</span><span class="p">;</span>
<a name="AuthToken.php-71"></a>	<span class="p">}</span>
<a name="AuthToken.php-72"></a><span class="p">}</span>
</pre></div>
</td></tr></table>
    </div>
  


        </div>
        
      </div>
    </div>
  </div>
  
  <div data-module="source/set-changeset" data-hash="0b821ab99a1ba2bbea61af849a1c88d39986036a"></div>



  
    
    
    
  
  

  </div>

        
        
        
          
    
    
  
        
      </div>
    </div>
  </div>

      </div>
    </div>
  

  
    
      <footer id="footer" role="contentinfo" data-module="components/footer">
        <section class="footer-body">
          
  <ul>
  <li>
    <a class="support-ga" target="_blank"
       data-support-gaq-page="Blog"
       href="http://blog.bitbucket.org">Blog</a>
  </li>
  <li>
    <a class="support-ga" target="_blank"
       data-support-gaq-page="Home"
       href="/support">Support</a>
  </li>
  <li>
    <a class="support-ga"
       data-support-gaq-page="PlansPricing"
       href="/plans">Plans &amp; pricing</a>
  </li>
  <li>
    <a class="support-ga" target="_blank"
       data-support-gaq-page="DocumentationHome"
       href="//confluence.atlassian.com/display/BITBUCKET">Documentation</a>
  </li>
  <li>
    <a class="support-ga" target="_blank"
       data-support-gaq-page="DocumentationAPI"
       href="https://developer.atlassian.com/bitbucket/api/2/reference/">API</a>
  </li>
  <li>
    <a class="support-ga" target="_blank"
       data-support-gaq-page="SiteStatus"
       href="https://status.bitbucket.org/">Site status</a>
  </li>
  <li>
    <a class="support-ga" id="meta-info"
       data-support-gaq-page="MetaInfo"
       href="#">Version info</a>
  </li>
  <li>
    <a class="support-ga" target="_blank"
       data-support-gaq-page="EndUserAgreement"
       href="//www.atlassian.com/legal/customer-agreement?utm_source=bitbucket&amp;utm_medium=link&amp;utm_campaign=footer">Terms of service</a>
  </li>
  <li>
    <a class="support-ga" target="_blank"
       data-support-gaq-page="PrivacyPolicy"
       href="//www.atlassian.com/legal/privacy-policy">Privacy policy</a>
  </li>
</ul>
<div id="meta-info-content" style="display: none;">
  <ul>
    
      <li><a href="/account/user/VVebDevel/" class="view-language-link">English</a></li>
    
    <li>
      <a class="support-ga" target="_blank"
         data-support-gaq-page="GitDocumentation"
         href="http://git-scm.com/">Git 2.7.4.1.g5468f9e</a>
    </li>
    <li>
      <a class="support-ga" target="_blank"
         data-support-gaq-page="HgDocumentation"
         href="https://www.mercurial-scm.org">Mercurial 4.1</a>
    </li>
    <li>
      <a class="support-ga" target="_blank"
         data-support-gaq-page="DjangoDocumentation"
         href="https://www.djangoproject.com/">Django 1.9.12</a>
    </li>
    <li>
      <a class="support-ga" target="_blank"
         data-support-gaq-page="PythonDocumentation"
         href="http://www.python.org/">Python 2.7.3</a>
    </li>
    <li>
      <a class="support-ga" target="_blank"
         data-support-gaq-page="DeployedVersion"
         data-media-hex="1c299938c525"
         href="#">1c299938c525 / 1c299938c525 @ app-163</a>
    </li>
    <li>
      <a class="support-ga" target="_blank"
         data-support-gaq-page="StorageRegion"
         href="#">Region production</a>
    </li>
  </ul>
</div>
<ul class="atlassian-links">
  <li>
    <a id="atlassian-jira-link" target="_blank"
       title="Track everything – bugs, tasks, deadlines, code – and pull reports to stay informed."
       href="https://www.atlassian.com/software/jira/bitbucket-integration?utm_source=bitbucket&amp;utm_medium=link&amp;utm_campaign=bitbucket_footer">JIRA Software</a>
  </li>
  <li>
    <a id="atlassian-confluence-link" target="_blank"
       title="Content Creation, Collaboration & Knowledge Sharing for Teams."
       href="http://www.atlassian.com/software/confluence/overview/team-collaboration-software?utm_source=bitbucket&amp;utm_medium=link&amp;utm_campaign=bitbucket_footer">Confluence</a>
  </li>
  <li>
    <a id="atlassian-bamboo-link" target="_blank"
       title="Continuous integration and deployment, release management."
       href="http://www.atlassian.com/software/bamboo?utm_source=bitbucket&amp;utm_medium=link&amp;utm_campaign=bitbucket_footer">Bamboo</a>
  </li>
  <li>
    <a id="atlassian-sourcetree-link" target="_blank"
       title="A free Git and Mercurial desktop client for Mac or Windows."
       href="http://www.sourcetreeapp.com/?utm_source=bitbucket&amp;utm_medium=link&amp;utm_campaign=bitbucket_footer">SourceTree</a>
  </li>
  <li>
    <a id="atlassian-hipchat-link" target="_blank"
       title="Group chat and IM built for teams."
       href="http://www.hipchat.com/?utm_source=bitbucket&amp;utm_medium=link&amp;utm_campaign=bitbucket_footer">HipChat</a>
  </li>
</ul>
<div id="footer-logo">
  <a target="_blank"
     title="Bitbucket is developed by Atlassian in Austin, San Francisco, and Sydney."
     href="http://www.atlassian.com?utm_source=bitbucket&amp;utm_medium=logo&amp;utm_campaign=bitbucket_footer">Atlassian</a>
</div>

        </section>
      </footer>
    
  
</div>



  

<div data-module="components/mentions/index">
  
    
    
  
  
    
    
  
  
    
    
  
</div>
<div data-module="components/typeahead/emoji/index">
  
    
    
  
</div>

<div data-module="components/repo-typeahead/index">
  
    
    
  
</div>

    
    
  

    
    
  

    
    
  

    
    
  


  


    
    
  

    
    
  


  
    
    
  
  
    
    
  
  
    
    
  
  
    
    
  
  
    
    
  
  
    
    
  
  
    
    
  


  
  
  <aui-inline-dialog
    id="help-menu-dialog"
    data-aui-alignment="bottom right"

    
    data-aui-alignment-static="true"
    data-module="header/help-menu"
    responds-to="toggle"
    aria-hidden="true">

  <div id="help-menu-section">
    <h1 class="help-menu-heading">Help</h1>

    <form id="help-menu-search-form" class="aui" target="_blank" method="get"
        action="https://support.atlassian.com/customer/search">
      <span id="help-menu-search-icon" class="aui-icon aui-icon-large aui-iconfont-search"></span>
      <input id="help-menu-search-form-input" name="q" class="text" type="text" placeholder="Ask a question">
    </form>

    <ul id="help-menu-links">
      <li>
        <a class="support-ga" data-support-gaq-page="DocumentationHome"
            href="https://confluence.atlassian.com/x/bgozDQ" target="_blank">
          Online help
        </a>
      </li>
      <li>
        <a class="support-ga" data-support-gaq-page="GitTutorials"
            href="https://www.atlassian.com/git?utm_source=bitbucket&amp;utm_medium=link&amp;utm_campaign=help_dropdown&amp;utm_content=learn_git"
            target="_blank">
          Learn Git
        </a>
      </li>
      <li>
        <a id="keyboard-shortcuts-link"
           href="#">Keyboard shortcuts</a>
      </li>
      <li>
        <a class="support-ga" data-support-gaq-page="DocumentationTutorials"
            href="https://confluence.atlassian.com/x/Q4sFLQ" target="_blank">
          Bitbucket tutorials
        </a>
      </li>
      <li>
        <a class="support-ga" data-support-gaq-page="SiteStatus"
            href="https://status.bitbucket.org/" target="_blank">
          Site status
        </a>
      </li>
      <li>
        <a class="support-ga" data-support-gaq-page="Home" href="/support">
          Support
        </a>
      </li>
    </ul>
  </div>
</aui-inline-dialog>
  


  <div class="omnibar" data-module="components/omnibar/index">
    <form class="omnibar-form aui"></form>
  </div>
  
    
    
  
  
    
    
  
  
    
    
  
  
    
    
  





  

  <div class="_mustache-templates">
    
      <script id="repo-dropdown-template" type="text/html">
        


[[#hasViewed]]
  <div class="aui-dropdown2-section">
    <strong class="viewed">Recently viewed</strong>
    <ul>
      [[#viewed]]
        <li class="[[#is_private]]private[[/is_private]][[^is_private]]public[[/is_private]] repository">
          <a href="[[url]]" title="[[owner]][[#project]] / [[project]][[/project]] / [[name]]" class="aui-icon-container recently-viewed repo-link"
              data-ct="bitbucket.header.repository.dropdown.repository.click" data-ct-data='{"type": "recently-viewed"}'>
            <span class="aui-avatar aui-avatar-xsmall aui-avatar-project">
              <span class="aui-avatar-inner">
                <img src="[[{avatar}]]">
              </span>
            </span>
            <span class="dropdown-path">
              <span class="dropdown-path-part">[[#project]][[project]][[/project]][[^project]][[owner]][[/project]]</span>
              <span class="dropdown-path-separator">/</span>
              <span class="dropdown-path-part dropdown-path-part--primary">[[name]]</span>
            </span>
          </a>
        </li>
      [[/viewed]]
    </ul>
  </div>
[[/hasViewed]]
[[#hasUpdated]]
  <div class="aui-dropdown2-section">
    <strong class="updated">Recently updated</strong>
    <ul>
      [[#updated]]
      <li class="[[#is_private]]private[[/is_private]][[^is_private]]public[[/is_private]] repository">
        <a href="[[url]]" title="[[owner]][[#project]] / [[project]][[/project]] / [[name]]" class="aui-icon-container recently-updated repo-link"
           data-ct="bitbucket.header.repository.dropdown.repository.click" data-ct-data='{"type": "recently-updated"}'>
          <span class="aui-avatar aui-avatar-xsmall aui-avatar-project">
            <span class="aui-avatar-inner">
              <img src="[[{avatar}]]">
            </span>
          </span>
          <span class="dropdown-path">
            <span class="dropdown-path-part">[[#project]][[project]][[/project]][[^project]][[owner]][[/project]]</span>
            <span class="dropdown-path-separator">/</span>
            <span class="dropdown-path-part dropdown-path-part--primary">[[name]]</span>
          </span>
        </a>
      </li>
      [[/updated]]
    </ul>
  </div>
[[/hasUpdated]]

      </script>
    
      <script id="snippet-dropdown-template" type="text/html">
        <div class="aui-dropdown2-section">
  <strong>[[sectionTitle]]</strong>
  <ul class="aui-list-truncate">
    [[#snippets]]
      <li>
        <a href="[[links.html.href]]">[[owner.display_name]] / [[name]]</a>
      </li>
    [[/snippets]]
  </ul>
</div>

      </script>
    
      <script id="team-dropdown-template" type="text/html">
        

<div class="aui-dropdown2-section primary">
  <ul class="aui-list-truncate">
    [[#teams]]
      <li>
        <a href="/[[username]]/" class="aui-icon-container team-link" data-ct="bitbucket.header.team.dropdown.team.click">
          <span class="aui-avatar aui-avatar-xsmall">
            <span class="aui-avatar-inner">
              <img src="[[avatar]]">
            </span>
          </span>
          [[display_name]]
        </a>
      </li>
    [[/teams]]
  </ul>
</div>

<div class="aui-dropdown2-section">
  <ul>
    <li>
      <a href="/account/create-team/?team_source=header"
          id="create-team-link" data-ct="bitbucket.header.team.dropdown.create.click" data-ct-data='{"empty": false}'>Create team</a>
    </li>
  </ul>
</div>

      </script>
    
      <script id="projects-dropdown-template" type="text/html">
        

[[#hasProjects]]
  <div class="aui-dropdown2-section">
    <strong>Recently viewed</strong>
    <ul class="aui-list-truncate">
      [[#projects]]
        <li>
          <a href="/account/user/[[owner.username]]/projects/[[key]]" class="aui-icon-container project-link">
            <span class="aui-avatar aui-avatar-xsmall aui-avatar-project">
              <span class="aui-avatar-inner">
                <img src="[[links.avatar.href]]">
              </span>
            </span>
            [[name]]
          </a>
        </li>
      [[/projects]]
    </ul>
  </div>
[[/hasProjects]]

[[#isAdmin]]
  <div class="aui-dropdown2-section">
    <ul>
      <li>
        <a href="/account/projects/create"
            id="create-project-link">Create project</a>
      </li>
    </ul>
  </div>
[[/isAdmin]]

      </script>
    
      <script id="branch-checkout-template" type="text/html">
        

<div id="checkout-branch-contents">
  <div class="command-line">
    <p>
      Check out this branch on your local machine to begin working on it.
    </p>
    <input type="text" class="checkout-command" readonly="readonly"
        
           value="git fetch && git checkout [[branchName]]"
        
        >
  </div>
  
    <div class="sourcetree-callout clone-in-sourcetree"
  data-module="components/clone/clone-in-sourcetree"
  data-https-url="https://VVebDevel@bitbucket.org/crazyhare86/aimee_debug.git"
  data-ssh-url="ssh://git@bitbucket.org/crazyhare86/aimee_debug.git">

  <div>
    <button class="aui-button aui-button-primary">
      
        Check out in SourceTree
      
    </button>
  </div>

  <p class="windows-text">
    
      <a href="http://www.sourcetreeapp.com/?utm_source=internal&amp;utm_medium=link&amp;utm_campaign=clone_repo_win" target="_blank">Atlassian SourceTree</a>
      is a free Git and Mercurial client for Windows.
    
  </p>
  <p class="mac-text">
    
      <a href="http://www.sourcetreeapp.com/?utm_source=internal&amp;utm_medium=link&amp;utm_campaign=clone_repo_mac" target="_blank">Atlassian SourceTree</a>
      is a free Git and Mercurial client for Mac.
    
  </p>
</div>
  
</div>

      </script>
    
      <script id="branch-dialog-template" type="text/html">
        

<div class="tabbed-filter-widget branch-dialog">
  <div class="tabbed-filter">
    <input placeholder="Filter branches" class="filter-box" autosave="branch-dropdown-22438671" type="text">
    [[^ignoreTags]]
      <div class="aui-tabs horizontal-tabs aui-tabs-disabled filter-tabs">
        <ul class="tabs-menu">
          <li class="menu-item active-tab"><a href="#branches">Branches</a></li>
          <li class="menu-item"><a href="#tags">Tags</a></li>
        </ul>
      </div>
    [[/ignoreTags]]
  </div>
  
    <div class="tab-pane active-pane" id="branches" data-filter-placeholder="Filter branches">
      <ol class="filter-list">
        <li class="empty-msg">No matching branches</li>
        [[#branches]]
          
            [[#hasMultipleHeads]]
              [[#heads]]
                <li class="comprev filter-item">
                  <a class="pjax-trigger filter-item-link" href="/crazyhare86/aimee_debug/src/[[changeset]]/app/Http/Controllers/cloudinary/AuthToken.php?at=[[safeName]]"
                     title="[[name]]">
                    [[name]] ([[shortChangeset]])
                  </a>
                </li>
              [[/heads]]
            [[/hasMultipleHeads]]
            [[^hasMultipleHeads]]
              <li class="comprev filter-item">
                <a class="pjax-trigger filter-item-link" href="/crazyhare86/aimee_debug/src/[[changeset]]/app/Http/Controllers/cloudinary/AuthToken.php?at=[[safeName]]" title="[[name]]">
                  [[name]]
                </a>
              </li>
            [[/hasMultipleHeads]]
          
        [[/branches]]
      </ol>
    </div>
    <div class="tab-pane" id="tags" data-filter-placeholder="Filter tags">
      <ol class="filter-list">
        <li class="empty-msg">No matching tags</li>
        [[#tags]]
          <li class="comprev filter-item">
            <a class="pjax-trigger filter-item-link" href="/crazyhare86/aimee_debug/src/[[changeset]]/app/Http/Controllers/cloudinary/AuthToken.php?at=[[safeName]]" title="[[name]]">
              [[name]]
            </a>
          </li>
        [[/tags]]
      </ol>
    </div>
  
</div>

      </script>
    
      <script id="image-upload-template" type="text/html">
        

<form id="upload-image" method="POST"
    
      action="/xhr/crazyhare86/aimee_debug/image-upload/"
    >
  <input type='hidden' name='csrfmiddlewaretoken' value='NWLBAsJzhYcRlEMwAyZRIjTm1VcazScA' />

  <div class="drop-target">
    <p class="centered">Drag image here</p>
  </div>

  
  <div>
    <button class="aui-button click-target">Select an image</button>
    <input name="file" type="file" class="hidden file-target"
           accept="image/jpeg, image/gif, image/png" />
    <input type="submit" class="hidden">
  </div>
</form>


      </script>
    
      <script id="mention-result" type="text/html">
        
<span class="mention-result">
  <span class="aui-avatar aui-avatar-small mention-result--avatar">
    <span class="aui-avatar-inner">
      <img src="[[avatar_url]]">
    </span>
  </span>
  [[#display_name]]
    <span class="display-name mention-result--display-name">[[&display_name]]</span> <small class="username mention-result--username">[[&username]]</small>
  [[/display_name]]
  [[^display_name]]
    <span class="username mention-result--username">[[&username]]</span>
  [[/display_name]]
  [[#is_teammate]][[^is_team]]
    <span class="aui-lozenge aui-lozenge-complete aui-lozenge-subtle mention-result--lozenge">teammate</span>
  [[/is_team]][[/is_teammate]]
</span>
      </script>
    
      <script id="mention-call-to-action" type="text/html">
        
[[^query]]
<li class="bb-typeahead-item">Begin typing to search for a user</li>
[[/query]]
[[#query]]
<li class="bb-typeahead-item">Continue typing to search for a user</li>
[[/query]]

      </script>
    
      <script id="mention-no-results" type="text/html">
        
[[^searching]]
<li class="bb-typeahead-item">Found no matching users for <em>[[query]]</em>.</li>
[[/searching]]
[[#searching]]
<li class="bb-typeahead-item bb-typeahead-searching">Searching for <em>[[query]]</em>.</li>
[[/searching]]

      </script>
    
      <script id="emoji-result" type="text/html">
        
<div class="aui-avatar aui-avatar-small">
  <div class="aui-avatar-inner">
    <img src="[[src]]">
  </div>
</div>
<span class="name">[[&name]]</span>

      </script>
    
      <script id="repo-typeahead-result" type="text/html">
        <span class="aui-avatar aui-avatar-project aui-avatar-xsmall">
  <span class="aui-avatar-inner">
    <img src="[[avatar]]">
  </span>
</span>
<span class="owner">[[&owner]]</span>/<span class="slug">[[&slug]]</span>

      </script>
    
      <script id="share-form-template" type="text/html">
        

<div class="error aui-message hidden">
  <span class="aui-icon icon-error"></span>
  <div class="message"></div>
</div>
<form class="aui">
  <table class="widget bb-list aui">
    <thead>
    <tr class="assistive">
      <th class="user">User</th>
      <th class="role">Role</th>
      <th class="actions">Actions</th>
    </tr>
    </thead>
    <tbody>
      <tr class="form">
        <td colspan="2">
          <input type="text" class="text bb-user-typeahead user-or-email"
                 placeholder="Username or email address"
                 autocomplete="off"
                 data-bb-typeahead-focus="false"
                 [[#disabled]]disabled[[/disabled]]>
        </td>
        <td class="actions">
          <button type="submit" class="aui-button aui-button-light" disabled>Add</button>
        </td>
      </tr>
    </tbody>
  </table>
</form>

      </script>
    
      <script id="share-detail-template" type="text/html">
        

[[#username]]
<td class="user
    [[#hasCustomGroups]]custom-groups[[/hasCustomGroups]]"
    [[#error]]data-error="[[error]]"[[/error]]>
  <div title="[[displayName]]">
    <a href="/[[username]]/" class="user">
      <span class="aui-avatar aui-avatar-xsmall">
        <span class="aui-avatar-inner">
          <img src="[[avatar]]">
        </span>
      </span>
      <span>[[displayName]]</span>
    </a>
  </div>
</td>
[[/username]]
[[^username]]
<td class="email
    [[#hasCustomGroups]]custom-groups[[/hasCustomGroups]]"
    [[#error]]data-error="[[error]]"[[/error]]>
  <div title="[[email]]">
    <span class="aui-icon aui-icon-small aui-iconfont-email"></span>
    [[email]]
  </div>
</td>
[[/username]]
<td class="role
    [[#hasCustomGroups]]custom-groups[[/hasCustomGroups]]">
  <div>
    [[#group]]
      [[#hasCustomGroups]]
        <select class="group [[#noGroupChoices]]hidden[[/noGroupChoices]]">
          [[#groups]]
            <option value="[[slug]]"
                [[#isSelected]]selected[[/isSelected]]>
              [[name]]
            </option>
          [[/groups]]
        </select>
      [[/hasCustomGroups]]
      [[^hasCustomGroups]]
      <label>
        <input type="checkbox" class="admin"
            [[#isAdmin]]checked[[/isAdmin]]>
        Administrator
      </label>
      [[/hasCustomGroups]]
    [[/group]]
    [[^group]]
      <ul>
        <li class="permission aui-lozenge aui-lozenge-complete
            [[^read]]aui-lozenge-subtle[[/read]]"
            data-permission="read">
          read
        </li>
        <li class="permission aui-lozenge aui-lozenge-complete
            [[^write]]aui-lozenge-subtle[[/write]]"
            data-permission="write">
          write
        </li>
        <li class="permission aui-lozenge aui-lozenge-complete
            [[^admin]]aui-lozenge-subtle[[/admin]]"
            data-permission="admin">
          admin
        </li>
      </ul>
    [[/group]]
  </div>
</td>
<td class="actions
    [[#hasCustomGroups]]custom-groups[[/hasCustomGroups]]">
  <div>
    <a href="#" class="delete">
      <span class="aui-icon aui-icon-small aui-iconfont-remove">Delete</span>
    </a>
  </div>
</td>

      </script>
    
      <script id="share-team-template" type="text/html">
        

<div class="clearfix">
  <span class="team-avatar-container">
    <span class="aui-avatar aui-avatar-medium">
      <span class="aui-avatar-inner">
        <img src="[[avatar]]">
      </span>
    </span>
  </span>
  <span class="team-name-container">
    [[display_name]]
  </span>
</div>
<p class="helptext">
  
    Existing users are granted access to this team immediately.
    New users will be sent an invitation.
  
</p>
<div class="share-form"></div>

      </script>
    
      <script id="scope-list-template" type="text/html">
        <ul class="scope-list">
  [[#scopes]]
    <li class="scope-list--item">
      <span class="scope-list--icon aui-icon aui-icon-small [[icon]]"></span>
      <span class="scope-list--description">[[description]]</span>
    </li>
  [[/scopes]]
</ul>

      </script>
    
      <script id="source-changeset" type="text/html">
        

<a href="/crazyhare86/aimee_debug/src/[[raw_node]]/[[path]]?at=Nafanail"
    class="[[#selected]]highlight[[/selected]]"
    data-hash="[[node]]">
  [[#author.username]]
    <span class="aui-avatar aui-avatar-xsmall">
      <span class="aui-avatar-inner">
        <img src="[[author.avatar]]">
      </span>
    </span>
    <span class="author" title="[[raw_author]]">[[author.display_name]]</span>
  [[/author.username]]
  [[^author.username]]
    <span class="aui-avatar aui-avatar-xsmall">
      <span class="aui-avatar-inner">
        <img src="https://d301sr5gafysq2.cloudfront.net/1c299938c525/img/default_avatar/user_blue.svg">
      </span>
    </span>
    <span class="author unmapped" title="[[raw_author]]">[[author]]</span>
  [[/author.username]]
  <time datetime="[[utctimestamp]]" data-title="true">[[utctimestamp]]</time>
  <span class="message">[[message]]</span>
</a>

      </script>
    
      <script id="embed-template" type="text/html">
        

<form class="aui inline-dialog-embed-dialog">
  <label for="embed-code-[[dialogId]]">Embed this source in another page:</label>
  <input type="text" readonly="true" value="&lt;script src=&quot;[[url]]&quot;&gt;&lt;/script&gt;" id="embed-code-[[dialogId]]" class="embed-code">
</form>

      </script>
    
      <script id="edit-form-template" type="text/html">
        


<form class="bb-content-container online-edit-form aui"
      data-repository="[[owner]]/[[slug]]"
      data-destination-repository="[[destinationOwner]]/[[destinationSlug]]"
      data-local-id="[[localID]]"
      [[#isWriter]]data-is-writer="true"[[/isWriter]]
      [[#hasPushAccess]]data-has-push-access="true"[[/hasPushAccess]]
      [[#isPullRequest]]data-is-pull-request="true"[[/isPullRequest]]
      [[#hideCreatePullRequest]]data-hide-create-pull-request="true"[[/hideCreatePullRequest]]
      data-hash="[[hash]]"
      data-branch="[[branch]]"
      data-path="[[path]]"
      data-is-create="[[isCreate]]"
      data-preview-url="/xhr/[[owner]]/[[slug]]/preview/[[hash]]/[[encodedPath]]"
      data-preview-error="We had trouble generating your preview."
      data-unsaved-changes-error="Your changes will be lost. Are you sure you want to leave?">
  <div class="bb-content-container-header">
    <div class="bb-content-container-header-primary">
      <h2 class="bb-content-container-heading">
        [[#isCreate]]
          [[#branch]]
            
              Creating <span class="edit-path">[[path]]</span> on branch: <strong>[[branch]]</strong>
            
          [[/branch]]
          [[^branch]]
            [[#path]]
              
                Creating <span class="edit-path">[[path]]</span>
              
            [[/path]]
            [[^path]]
              
                Creating <span class="edit-path">unnamed file</span>
              
            [[/path]]
          [[/branch]]
        [[/isCreate]]
        [[^isCreate]]
          
            Editing <span class="edit-path">[[path]]</span> on branch: <strong>[[branch]]</strong>
          
        [[/isCreate]]
      </h2>
    </div>
    <div class="bb-content-container-header-secondary">
      <div class="hunk-nav aui-buttons">
        <button class="prev-hunk-button aui-button aui-button-light"
            disabled="disabled" aria-disabled="true"
            title="Previous change">
          <span class="aui-icon aui-icon-small aui-iconfont-up">Previous change</span>
        </button>
        <button class="next-hunk-button aui-button aui-button-light"
            disabled="disabled" aria-disabled="true"
            title="Next change">
          <span class="aui-icon aui-icon-small aui-iconfont-down">Next change</span>
        </button>
      </div>
    </div>
  </div>
  <div class="bb-content-container-body has-header has-footer file-editor">
    <textarea id="id_source"></textarea>
  </div>
  <div class="preview-pane"></div>
  <div class="bb-content-container-footer">
    <div class="bb-content-container-footer-primary">
      <div id="syntax-mode" class="bb-content-container-item field">
        <label for="id_syntax-mode" class="online-edit-form--label">Syntax mode:</label>
        <select id="id_syntax-mode">
          [[#syntaxes]]
            <option value="[[#mime]][[mime]][[/mime]][[^mime]][[mode]][[/mime]]">[[name]]</option>
          [[/syntaxes]]
        </select>
      </div>
      <div id="indent-mode" class="bb-content-container-item field">
        <label for="id_indent-mode" class="online-edit-form--label">Indent mode:</label>
        <select id="id_indent-mode">
          <option value="tabs">Tabs</option>
          <option value="spaces">Spaces</option>
        </select>
      </div>
      <div id="indent-size" class="bb-content-container-item field">
        <label for="id_indent-size" class="online-edit-form--label">Indent size:</label>
        <select id="id_indent-size">
          <option value="2">2</option>
          <option value="4">4</option>
          <option value="8">8</option>
        </select>
      </div>
      <div id="wrap-mode" class="bb-content-container-item field">
        <label for="id_wrap-mode" class="online-edit-form--label">Line wrap:</label>
        <select id="id_wrap-mode">
          <option value="">Off</option>
          <option value="soft">On</option>
        </select>
      </div>
    </div>
    <div class="bb-content-container-footer-secondary">
      [[^isCreate]]
        <button class="preview-button aui-button aui-button-light"
                disabled="disabled" aria-disabled="true"
                data-preview-label="View diff"
                data-edit-label="Edit file">View diff</button>
      [[/isCreate]]
      <button class="save-button aui-button aui-button-primary"
              disabled="disabled" aria-disabled="true">Commit</button>
      [[^isCreate]]
        <a class="aui-button aui-button-link cancel-link" href="#">Cancel</a>
      [[/isCreate]]
    </div>
  </div>
</form>

      </script>
    
      <script id="commit-form-template" type="text/html">
        

<form class="aui commit-form"
      data-title="Commit changes"
      [[#isDelete]]
        data-default-message="[[filename]] deleted online with Bitbucket"
      [[/isDelete]]
      [[#isCreate]]
        data-default-message="[[filename]] created online with Bitbucket"
      [[/isCreate]]
      [[^isDelete]]
        [[^isCreate]]
          data-default-message="[[filename]] edited online with Bitbucket"
        [[/isCreate]]
      [[/isDelete]]
      data-fork-error="We had trouble creating your fork."
      data-commit-error="We had trouble committing your changes."
      data-pull-request-error="We had trouble creating your pull request."
      data-update-error="We had trouble updating your pull request."
      data-branch-conflict-error="A branch with that name already exists."
      data-forking-message="Forking repository"
      data-committing-message="Committing changes"
      data-merging-message="Branching and merging changes"
      data-creating-pr-message="Creating pull request"
      data-updating-pr-message="Updating pull request"
      data-cta-label="Commit"
      data-cancel-label="Cancel">
  [[#isDelete]]
    <div class="aui-message info">
      <span class="aui-icon icon-info"></span>
      <span class="message">
        
          Committing this change will delete [[filename]] from your repository.
        
      </span>
    </div>
  [[/isDelete]]
  <div class="aui-message error hidden">
    <span class="aui-icon icon-error"></span>
    <span class="message"></span>
  </div>
  [[^isWriter]]
    <div class="aui-message info">
      <span class="aui-icon icon-info"></span>
      <p class="title">
        
          You don't have write access to this repository.
        
      </p>
      <span class="message">
        
          We'll create a fork for your changes and submit a
          pull request back to this repository.
        
      </span>
    </div>
  [[/isWriter]]
  [[#isRename]]
    <div class="field-group">
      <label for="id_path">New path</label>
      <input type="text" id="id_path" class="text" value="[[path]]"/>
    </div>
  [[/isRename]]
  <div class="field-group">
    <label for="id_message">Commit message</label>
    <textarea id="id_message" class="long-field textarea"></textarea>
  </div>
  [[^isPullRequest]]
    [[#isWriter]]
      <fieldset class="group">
        <div class="checkbox">
          [[#hasPushAccess]]
            [[^hideCreatePullRequest]]
              <input id="id_create-pullrequest" class="checkbox" type="checkbox">
              <label for="id_create-pullrequest">Create a pull request for this change</label>
            [[/hideCreatePullRequest]]
          [[/hasPushAccess]]
          [[^hasPushAccess]]
            <input id="id_create-pullrequest" class="checkbox" type="checkbox" checked="checked" aria-disabled="true" disabled="true">
            <label for="id_create-pullrequest" title="Branch restrictions do not allow you to update this branch.">Create a pull request for this change</label>
          [[/hasPushAccess]]
        </div>
      </fieldset>
      <div id="pr-fields">
        <div id="branch-name-group" class="field-group">
          <label for="id_branch-name">Branch name</label>
          <input type="text" id="id_branch-name" class="text long-field">
        </div>
        

<div class="field-group" id="id_reviewers_group">
  <label for="reviewers">Reviewers</label>

  
  <input id="reviewers" name="reviewers" type="hidden"
          value=""
          data-mention-url="/xhr/mentions/repositories/:dest_username/:dest_slug"
          data-reviewers="[]"
          data-suggested="[]"
          data-locked="[]">

  <div class="error"></div>
  <div class="suggested-reviewers"></div>

</div>

      </div>
    [[/isWriter]]
  [[/isPullRequest]]
  <button type="submit" id="id_submit">Commit</button>
</form>

      </script>
    
      <script id="merge-message-template" type="text/html">
        Merged [[hash]] into [[branch]]

[[message]]

      </script>
    
      <script id="commit-merge-error-template" type="text/html">
        



  We had trouble merging your changes. We stored them on the <strong>[[branch]]</strong> branch, so feel free to
  <a href="/[[owner]]/[[slug]]/full-commit/[[hash]]/[[path]]?at=[[encodedBranch]]">view them</a> or
  <a href="#" class="create-pull-request-link">create a pull request</a>.


      </script>
    
      <script id="selected-reviewer-template" type="text/html">
        <div class="aui-avatar aui-avatar-xsmall">
  <div class="aui-avatar-inner">
    <img src="[[avatar_url]]">
  </div>
</div>
[[display_name]]

      </script>
    
      <script id="suggested-reviewer-template" type="text/html">
        <button class="aui-button aui-button-link" type="button" tabindex="-1">[[display_name]]</button>

      </script>
    
      <script id="suggested-reviewers-template" type="text/html">
        

<span class="suggested-reviewer-list-label">Recent:</span>
<ul class="suggested-reviewer-list unstyled-list"></ul>

      </script>
    
      <script id="omnibar-form-template" type="text/html">
        <div class="omnibar-input-container">
  <input class="omnibar-input" type="text" [[#placeholder]]placeholder="[[placeholder]]"[[/placeholder]]>
</div>
<ul class="omnibar-result-group-list"></ul>

      </script>
    
      <script id="omnibar-blank-slate-template" type="text/html">
        

<div class="omnibar-blank-slate">No results found</div>

      </script>
    
      <script id="omnibar-result-group-list-item-template" type="text/html">
        <div class="omnibar-result-group-header clearfix">
  <h2 class="omnibar-result-group-label" title="[[label]]">[[label]]</h2>
  <span class="omnibar-result-group-context" title="[[context]]">[[context]]</span>
</div>
<ul class="omnibar-result-list unstyled-list"></ul>

      </script>
    
      <script id="omnibar-result-list-item-template" type="text/html">
        [[#url]]
  <a href="[[&url]]" class="omnibar-result-label">[[&label]]</a>
[[/url]]
[[^url]]
  <span class="omnibar-result-label">[[&label]]</span>
[[/url]]
[[#context]]
  <span class="omnibar-result-context">[[context]]</span>
[[/context]]

      </script>
    
  </div>




  
  


<script src="https://d301sr5gafysq2.cloudfront.net/1c299938c525/jsi18n/en/djangojs.js"></script>
<script src="https://d301sr5gafysq2.cloudfront.net/1c299938c525/dist/webpack/vendor.js"></script>
<script src="https://d301sr5gafysq2.cloudfront.net/1c299938c525/dist/webpack/app.js"></script>


<script async src="https://www.google-analytics.com/analytics.js"></script>

<script type="text/javascript">window.NREUM||(NREUM={});NREUM.info={"beacon":"bam.nr-data.net","queueTime":0,"licenseKey":"a2cef8c3d3","agent":"","transactionName":"Z11RZxdWW0cEVkYLDV4XdUYLVEFdClsdAAtEWkZQDlJBGgRFQhFMQl1DXFcZQ10AQkFYBFlUVlEXWEJHAA==","applicationID":"1841284","errorBeacon":"bam.nr-data.net","applicationTime":288}</script>
</body>
</html>