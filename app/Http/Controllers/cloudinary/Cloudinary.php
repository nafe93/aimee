<!DOCTYPE html>
<html lang="en">
<head>
  <meta id="bb-bootstrap" data-current-user="{&quot;username&quot;: &quot;VVebDevel&quot;, &quot;displayName&quot;: &quot;Maks Glebov&quot;, &quot;uuid&quot;: &quot;{0cb3f3ef-9830-4c76-8626-7da922507cff}&quot;, &quot;firstName&quot;: &quot;Maks Glebov&quot;, &quot;hasPremium&quot;: true, &quot;lastName&quot;: &quot;&quot;, &quot;avatarUrl&quot;: &quot;https://bitbucket.org/account/VVebDevel/avatar/32/?ts=1493812574&quot;, &quot;isTeam&quot;: false, &quot;isSshEnabled&quot;: false, &quot;isKbdShortcutsEnabled&quot;: true, &quot;id&quot;: 8325053, &quot;isAuthenticated&quot;: true}"
data-atlassian-id="557058:9703eccd-6e07-453d-aae3-cd10aea6d71e" />
  
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta charset="utf-8">
  <title>
  crazyhare86 / aimee_debug 
  / source  / app / Http / Controllers / cloudinary / Cloudinary.php
 &mdash; Bitbucket
</title>
  <script type="text/javascript">window.NREUM||(NREUM={}),__nr_require=function(e,n,t){function r(t){if(!n[t]){var o=n[t]={exports:{}};e[t][0].call(o.exports,function(n){var o=e[t][1][n];return r(o||n)},o,o.exports)}return n[t].exports}if("function"==typeof __nr_require)return __nr_require;for(var o=0;o<t.length;o++)r(t[o]);return r}({1:[function(e,n,t){function r(){}function o(e,n,t){return function(){return i(e,[c.now()].concat(u(arguments)),n?null:this,t),n?void 0:this}}var i=e("handle"),a=e(2),u=e(3),f=e("ee").get("tracer"),c=e("loader"),s=NREUM;"undefined"==typeof window.newrelic&&(newrelic=s);var p=["setPageViewName","setCustomAttribute","setErrorHandler","finished","addToTrace","inlineHit","addRelease"],d="api-",l=d+"ixn-";a(p,function(e,n){s[n]=o(d+n,!0,"api")}),s.addPageAction=o(d+"addPageAction",!0),s.setCurrentRouteName=o(d+"routeName",!0),n.exports=newrelic,s.interaction=function(){return(new r).get()};var m=r.prototype={createTracer:function(e,n){var t={},r=this,o="function"==typeof n;return i(l+"tracer",[c.now(),e,t],r),function(){if(f.emit((o?"":"no-")+"fn-start",[c.now(),r,o],t),o)try{return n.apply(this,arguments)}finally{f.emit("fn-end",[c.now()],t)}}}};a("setName,setAttribute,save,ignore,onEnd,getContext,end,get".split(","),function(e,n){m[n]=o(l+n)}),newrelic.noticeError=function(e){"string"==typeof e&&(e=new Error(e)),i("err",[e,c.now()])}},{}],2:[function(e,n,t){function r(e,n){var t=[],r="",i=0;for(r in e)o.call(e,r)&&(t[i]=n(r,e[r]),i+=1);return t}var o=Object.prototype.hasOwnProperty;n.exports=r},{}],3:[function(e,n,t){function r(e,n,t){n||(n=0),"undefined"==typeof t&&(t=e?e.length:0);for(var r=-1,o=t-n||0,i=Array(o<0?0:o);++r<o;)i[r]=e[n+r];return i}n.exports=r},{}],4:[function(e,n,t){n.exports={exists:"undefined"!=typeof window.performance&&window.performance.timing&&"undefined"!=typeof window.performance.timing.navigationStart}},{}],ee:[function(e,n,t){function r(){}function o(e){function n(e){return e&&e instanceof r?e:e?f(e,u,i):i()}function t(t,r,o,i){if(!d.aborted||i){e&&e(t,r,o);for(var a=n(o),u=m(t),f=u.length,c=0;c<f;c++)u[c].apply(a,r);var p=s[y[t]];return p&&p.push([b,t,r,a]),a}}function l(e,n){v[e]=m(e).concat(n)}function m(e){return v[e]||[]}function w(e){return p[e]=p[e]||o(t)}function g(e,n){c(e,function(e,t){n=n||"feature",y[t]=n,n in s||(s[n]=[])})}var v={},y={},b={on:l,emit:t,get:w,listeners:m,context:n,buffer:g,abort:a,aborted:!1};return b}function i(){return new r}function a(){(s.api||s.feature)&&(d.aborted=!0,s=d.backlog={})}var u="nr@context",f=e("gos"),c=e(2),s={},p={},d=n.exports=o();d.backlog=s},{}],gos:[function(e,n,t){function r(e,n,t){if(o.call(e,n))return e[n];var r=t();if(Object.defineProperty&&Object.keys)try{return Object.defineProperty(e,n,{value:r,writable:!0,enumerable:!1}),r}catch(i){}return e[n]=r,r}var o=Object.prototype.hasOwnProperty;n.exports=r},{}],handle:[function(e,n,t){function r(e,n,t,r){o.buffer([e],r),o.emit(e,n,t)}var o=e("ee").get("handle");n.exports=r,r.ee=o},{}],id:[function(e,n,t){function r(e){var n=typeof e;return!e||"object"!==n&&"function"!==n?-1:e===window?0:a(e,i,function(){return o++})}var o=1,i="nr@id",a=e("gos");n.exports=r},{}],loader:[function(e,n,t){function r(){if(!x++){var e=h.info=NREUM.info,n=d.getElementsByTagName("script")[0];if(setTimeout(s.abort,3e4),!(e&&e.licenseKey&&e.applicationID&&n))return s.abort();c(y,function(n,t){e[n]||(e[n]=t)}),f("mark",["onload",a()+h.offset],null,"api");var t=d.createElement("script");t.src="https://"+e.agent,n.parentNode.insertBefore(t,n)}}function o(){"complete"===d.readyState&&i()}function i(){f("mark",["domContent",a()+h.offset],null,"api")}function a(){return E.exists&&performance.now?Math.round(performance.now()):(u=Math.max((new Date).getTime(),u))-h.offset}var u=(new Date).getTime(),f=e("handle"),c=e(2),s=e("ee"),p=window,d=p.document,l="addEventListener",m="attachEvent",w=p.XMLHttpRequest,g=w&&w.prototype;NREUM.o={ST:setTimeout,CT:clearTimeout,XHR:w,REQ:p.Request,EV:p.Event,PR:p.Promise,MO:p.MutationObserver};var v=""+location,y={beacon:"bam.nr-data.net",errorBeacon:"bam.nr-data.net",agent:"js-agent.newrelic.com/nr-1026.min.js"},b=w&&g&&g[l]&&!/CriOS/.test(navigator.userAgent),h=n.exports={offset:u,now:a,origin:v,features:{},xhrWrappable:b};e(1),d[l]?(d[l]("DOMContentLoaded",i,!1),p[l]("load",r,!1)):(d[m]("onreadystatechange",o),p[m]("onload",r)),f("mark",["firstbyte",u],null,"api");var x=0,E=e(4)},{}]},{},["loader"]);</script>
  


<meta id="bb-canon-url" name="bb-canon-url" content="https://bitbucket.org">
<meta name="bb-api-canon-url" content="https://api.bitbucket.org">
<meta name="apitoken" content="{&quot;token&quot;: &quot;JTXeEKKXgciCjwuE1PSY_5MMjOQBWOwc8MEXWAdwe33Z0XdVJsACM6Yhg3yl99ORO54AeRgWeTv4l0xThz5yxUDJZcnK&quot;, &quot;connectionId&quot;: 619065, &quot;expiration&quot;: 1493813338.896275}">

<meta name="bb-commit-hash" content="1c299938c525">
<meta name="bb-app-node" content="app-107">
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
        
          <a href="/crazyhare86/aimee_debug/src/0b821ab99a1b/app/Http/Controllers/cloudinary/Cloudinary.php?at=Nafanail"
            class="aui-button pjax-trigger" aria-pressed="true">
            Source
          </a>
          <a href="/crazyhare86/aimee_debug/diff/app/Http/Controllers/cloudinary/Cloudinary.php?diff2=0b821ab99a1b&at=Nafanail"
            class="aui-button pjax-trigger"
            title="Diff to previous change">
            Diff
          </a>
          <a href="/crazyhare86/aimee_debug/history-node/0b821ab99a1b/app/Http/Controllers/cloudinary/Cloudinary.php?at=Nafanail"
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
          
        
      
        
          
            <span class="file-name">Cloudinary.php</span>
          
        
      
    
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
       data-path="app/Http/Controllers/cloudinary/Cloudinary.php"
       data-source-url="/api/internal/repositories/crazyhare86/aimee_debug/src/0b821ab99a1ba2bbea61af849a1c88d39986036a/app/Http/Controllers/cloudinary/Cloudinary.php">
    <div id="source-view" class="file-source-container" data-module="repo/source/view-file" data-is-lfs="false">
      <div class="toolbar">
        <div class="primary">
          <div class="aui-buttons">
            
              <button id="file-history-trigger" class="aui-button aui-button-light changeset-info"
                      data-changeset="0b821ab99a1ba2bbea61af849a1c88d39986036a"
                      data-path="app/Http/Controllers/cloudinary/Cloudinary.php"
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
          
          <a href="/crazyhare86/aimee_debug/full-commit/0b821ab99a1b/app/Http/Controllers/cloudinary/Cloudinary.php" id="full-commit-link"
             title="View full commit 0b821ab">Full commit</a>
        </div>
        <div class="secondary">
          
          <div class="aui-buttons">
            
              <a href="/crazyhare86/aimee_debug/annotate/0b821ab99a1ba2bbea61af849a1c88d39986036a/app/Http/Controllers/cloudinary/Cloudinary.php?at=Nafanail"
                 class="aui-button aui-button-light pjax-trigger">Blame</a>
              
            
            <a href="/crazyhare86/aimee_debug/raw/0b821ab99a1ba2bbea61af849a1c88d39986036a/app/Http/Controllers/cloudinary/Cloudinary.php" class="aui-button aui-button-light">Raw</a>
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
      <table class="codehilite highlighttable"><tr><td class="linenos"><div class="linenodiv"><pre><a href="#Cloudinary.php-1">  1</a>
<a href="#Cloudinary.php-2">  2</a>
<a href="#Cloudinary.php-3">  3</a>
<a href="#Cloudinary.php-4">  4</a>
<a href="#Cloudinary.php-5">  5</a>
<a href="#Cloudinary.php-6">  6</a>
<a href="#Cloudinary.php-7">  7</a>
<a href="#Cloudinary.php-8">  8</a>
<a href="#Cloudinary.php-9">  9</a>
<a href="#Cloudinary.php-10"> 10</a>
<a href="#Cloudinary.php-11"> 11</a>
<a href="#Cloudinary.php-12"> 12</a>
<a href="#Cloudinary.php-13"> 13</a>
<a href="#Cloudinary.php-14"> 14</a>
<a href="#Cloudinary.php-15"> 15</a>
<a href="#Cloudinary.php-16"> 16</a>
<a href="#Cloudinary.php-17"> 17</a>
<a href="#Cloudinary.php-18"> 18</a>
<a href="#Cloudinary.php-19"> 19</a>
<a href="#Cloudinary.php-20"> 20</a>
<a href="#Cloudinary.php-21"> 21</a>
<a href="#Cloudinary.php-22"> 22</a>
<a href="#Cloudinary.php-23"> 23</a>
<a href="#Cloudinary.php-24"> 24</a>
<a href="#Cloudinary.php-25"> 25</a>
<a href="#Cloudinary.php-26"> 26</a>
<a href="#Cloudinary.php-27"> 27</a>
<a href="#Cloudinary.php-28"> 28</a>
<a href="#Cloudinary.php-29"> 29</a>
<a href="#Cloudinary.php-30"> 30</a>
<a href="#Cloudinary.php-31"> 31</a>
<a href="#Cloudinary.php-32"> 32</a>
<a href="#Cloudinary.php-33"> 33</a>
<a href="#Cloudinary.php-34"> 34</a>
<a href="#Cloudinary.php-35"> 35</a>
<a href="#Cloudinary.php-36"> 36</a>
<a href="#Cloudinary.php-37"> 37</a>
<a href="#Cloudinary.php-38"> 38</a>
<a href="#Cloudinary.php-39"> 39</a>
<a href="#Cloudinary.php-40"> 40</a>
<a href="#Cloudinary.php-41"> 41</a>
<a href="#Cloudinary.php-42"> 42</a>
<a href="#Cloudinary.php-43"> 43</a>
<a href="#Cloudinary.php-44"> 44</a>
<a href="#Cloudinary.php-45"> 45</a>
<a href="#Cloudinary.php-46"> 46</a>
<a href="#Cloudinary.php-47"> 47</a>
<a href="#Cloudinary.php-48"> 48</a>
<a href="#Cloudinary.php-49"> 49</a>
<a href="#Cloudinary.php-50"> 50</a>
<a href="#Cloudinary.php-51"> 51</a>
<a href="#Cloudinary.php-52"> 52</a>
<a href="#Cloudinary.php-53"> 53</a>
<a href="#Cloudinary.php-54"> 54</a>
<a href="#Cloudinary.php-55"> 55</a>
<a href="#Cloudinary.php-56"> 56</a>
<a href="#Cloudinary.php-57"> 57</a>
<a href="#Cloudinary.php-58"> 58</a>
<a href="#Cloudinary.php-59"> 59</a>
<a href="#Cloudinary.php-60"> 60</a>
<a href="#Cloudinary.php-61"> 61</a>
<a href="#Cloudinary.php-62"> 62</a>
<a href="#Cloudinary.php-63"> 63</a>
<a href="#Cloudinary.php-64"> 64</a>
<a href="#Cloudinary.php-65"> 65</a>
<a href="#Cloudinary.php-66"> 66</a>
<a href="#Cloudinary.php-67"> 67</a>
<a href="#Cloudinary.php-68"> 68</a>
<a href="#Cloudinary.php-69"> 69</a>
<a href="#Cloudinary.php-70"> 70</a>
<a href="#Cloudinary.php-71"> 71</a>
<a href="#Cloudinary.php-72"> 72</a>
<a href="#Cloudinary.php-73"> 73</a>
<a href="#Cloudinary.php-74"> 74</a>
<a href="#Cloudinary.php-75"> 75</a>
<a href="#Cloudinary.php-76"> 76</a>
<a href="#Cloudinary.php-77"> 77</a>
<a href="#Cloudinary.php-78"> 78</a>
<a href="#Cloudinary.php-79"> 79</a>
<a href="#Cloudinary.php-80"> 80</a>
<a href="#Cloudinary.php-81"> 81</a>
<a href="#Cloudinary.php-82"> 82</a>
<a href="#Cloudinary.php-83"> 83</a>
<a href="#Cloudinary.php-84"> 84</a>
<a href="#Cloudinary.php-85"> 85</a>
<a href="#Cloudinary.php-86"> 86</a>
<a href="#Cloudinary.php-87"> 87</a>
<a href="#Cloudinary.php-88"> 88</a>
<a href="#Cloudinary.php-89"> 89</a>
<a href="#Cloudinary.php-90"> 90</a>
<a href="#Cloudinary.php-91"> 91</a>
<a href="#Cloudinary.php-92"> 92</a>
<a href="#Cloudinary.php-93"> 93</a>
<a href="#Cloudinary.php-94"> 94</a>
<a href="#Cloudinary.php-95"> 95</a>
<a href="#Cloudinary.php-96"> 96</a>
<a href="#Cloudinary.php-97"> 97</a>
<a href="#Cloudinary.php-98"> 98</a>
<a href="#Cloudinary.php-99"> 99</a>
<a href="#Cloudinary.php-100">100</a>
<a href="#Cloudinary.php-101">101</a>
<a href="#Cloudinary.php-102">102</a>
<a href="#Cloudinary.php-103">103</a>
<a href="#Cloudinary.php-104">104</a>
<a href="#Cloudinary.php-105">105</a>
<a href="#Cloudinary.php-106">106</a>
<a href="#Cloudinary.php-107">107</a>
<a href="#Cloudinary.php-108">108</a>
<a href="#Cloudinary.php-109">109</a>
<a href="#Cloudinary.php-110">110</a>
<a href="#Cloudinary.php-111">111</a>
<a href="#Cloudinary.php-112">112</a>
<a href="#Cloudinary.php-113">113</a>
<a href="#Cloudinary.php-114">114</a>
<a href="#Cloudinary.php-115">115</a>
<a href="#Cloudinary.php-116">116</a>
<a href="#Cloudinary.php-117">117</a>
<a href="#Cloudinary.php-118">118</a>
<a href="#Cloudinary.php-119">119</a>
<a href="#Cloudinary.php-120">120</a>
<a href="#Cloudinary.php-121">121</a>
<a href="#Cloudinary.php-122">122</a>
<a href="#Cloudinary.php-123">123</a>
<a href="#Cloudinary.php-124">124</a>
<a href="#Cloudinary.php-125">125</a>
<a href="#Cloudinary.php-126">126</a>
<a href="#Cloudinary.php-127">127</a>
<a href="#Cloudinary.php-128">128</a>
<a href="#Cloudinary.php-129">129</a>
<a href="#Cloudinary.php-130">130</a>
<a href="#Cloudinary.php-131">131</a>
<a href="#Cloudinary.php-132">132</a>
<a href="#Cloudinary.php-133">133</a>
<a href="#Cloudinary.php-134">134</a>
<a href="#Cloudinary.php-135">135</a>
<a href="#Cloudinary.php-136">136</a>
<a href="#Cloudinary.php-137">137</a>
<a href="#Cloudinary.php-138">138</a>
<a href="#Cloudinary.php-139">139</a>
<a href="#Cloudinary.php-140">140</a>
<a href="#Cloudinary.php-141">141</a>
<a href="#Cloudinary.php-142">142</a>
<a href="#Cloudinary.php-143">143</a>
<a href="#Cloudinary.php-144">144</a>
<a href="#Cloudinary.php-145">145</a>
<a href="#Cloudinary.php-146">146</a>
<a href="#Cloudinary.php-147">147</a>
<a href="#Cloudinary.php-148">148</a>
<a href="#Cloudinary.php-149">149</a>
<a href="#Cloudinary.php-150">150</a>
<a href="#Cloudinary.php-151">151</a>
<a href="#Cloudinary.php-152">152</a>
<a href="#Cloudinary.php-153">153</a>
<a href="#Cloudinary.php-154">154</a>
<a href="#Cloudinary.php-155">155</a>
<a href="#Cloudinary.php-156">156</a>
<a href="#Cloudinary.php-157">157</a>
<a href="#Cloudinary.php-158">158</a>
<a href="#Cloudinary.php-159">159</a>
<a href="#Cloudinary.php-160">160</a>
<a href="#Cloudinary.php-161">161</a>
<a href="#Cloudinary.php-162">162</a>
<a href="#Cloudinary.php-163">163</a>
<a href="#Cloudinary.php-164">164</a>
<a href="#Cloudinary.php-165">165</a>
<a href="#Cloudinary.php-166">166</a>
<a href="#Cloudinary.php-167">167</a>
<a href="#Cloudinary.php-168">168</a>
<a href="#Cloudinary.php-169">169</a>
<a href="#Cloudinary.php-170">170</a>
<a href="#Cloudinary.php-171">171</a>
<a href="#Cloudinary.php-172">172</a>
<a href="#Cloudinary.php-173">173</a>
<a href="#Cloudinary.php-174">174</a>
<a href="#Cloudinary.php-175">175</a>
<a href="#Cloudinary.php-176">176</a>
<a href="#Cloudinary.php-177">177</a>
<a href="#Cloudinary.php-178">178</a>
<a href="#Cloudinary.php-179">179</a>
<a href="#Cloudinary.php-180">180</a>
<a href="#Cloudinary.php-181">181</a>
<a href="#Cloudinary.php-182">182</a>
<a href="#Cloudinary.php-183">183</a>
<a href="#Cloudinary.php-184">184</a>
<a href="#Cloudinary.php-185">185</a>
<a href="#Cloudinary.php-186">186</a>
<a href="#Cloudinary.php-187">187</a>
<a href="#Cloudinary.php-188">188</a>
<a href="#Cloudinary.php-189">189</a>
<a href="#Cloudinary.php-190">190</a>
<a href="#Cloudinary.php-191">191</a>
<a href="#Cloudinary.php-192">192</a>
<a href="#Cloudinary.php-193">193</a>
<a href="#Cloudinary.php-194">194</a>
<a href="#Cloudinary.php-195">195</a>
<a href="#Cloudinary.php-196">196</a>
<a href="#Cloudinary.php-197">197</a>
<a href="#Cloudinary.php-198">198</a>
<a href="#Cloudinary.php-199">199</a>
<a href="#Cloudinary.php-200">200</a>
<a href="#Cloudinary.php-201">201</a>
<a href="#Cloudinary.php-202">202</a>
<a href="#Cloudinary.php-203">203</a>
<a href="#Cloudinary.php-204">204</a>
<a href="#Cloudinary.php-205">205</a>
<a href="#Cloudinary.php-206">206</a>
<a href="#Cloudinary.php-207">207</a>
<a href="#Cloudinary.php-208">208</a>
<a href="#Cloudinary.php-209">209</a>
<a href="#Cloudinary.php-210">210</a>
<a href="#Cloudinary.php-211">211</a>
<a href="#Cloudinary.php-212">212</a>
<a href="#Cloudinary.php-213">213</a>
<a href="#Cloudinary.php-214">214</a>
<a href="#Cloudinary.php-215">215</a>
<a href="#Cloudinary.php-216">216</a>
<a href="#Cloudinary.php-217">217</a>
<a href="#Cloudinary.php-218">218</a>
<a href="#Cloudinary.php-219">219</a>
<a href="#Cloudinary.php-220">220</a>
<a href="#Cloudinary.php-221">221</a>
<a href="#Cloudinary.php-222">222</a>
<a href="#Cloudinary.php-223">223</a>
<a href="#Cloudinary.php-224">224</a>
<a href="#Cloudinary.php-225">225</a>
<a href="#Cloudinary.php-226">226</a>
<a href="#Cloudinary.php-227">227</a>
<a href="#Cloudinary.php-228">228</a>
<a href="#Cloudinary.php-229">229</a>
<a href="#Cloudinary.php-230">230</a>
<a href="#Cloudinary.php-231">231</a>
<a href="#Cloudinary.php-232">232</a>
<a href="#Cloudinary.php-233">233</a>
<a href="#Cloudinary.php-234">234</a>
<a href="#Cloudinary.php-235">235</a>
<a href="#Cloudinary.php-236">236</a>
<a href="#Cloudinary.php-237">237</a>
<a href="#Cloudinary.php-238">238</a>
<a href="#Cloudinary.php-239">239</a>
<a href="#Cloudinary.php-240">240</a>
<a href="#Cloudinary.php-241">241</a>
<a href="#Cloudinary.php-242">242</a>
<a href="#Cloudinary.php-243">243</a>
<a href="#Cloudinary.php-244">244</a>
<a href="#Cloudinary.php-245">245</a>
<a href="#Cloudinary.php-246">246</a>
<a href="#Cloudinary.php-247">247</a>
<a href="#Cloudinary.php-248">248</a>
<a href="#Cloudinary.php-249">249</a>
<a href="#Cloudinary.php-250">250</a>
<a href="#Cloudinary.php-251">251</a>
<a href="#Cloudinary.php-252">252</a>
<a href="#Cloudinary.php-253">253</a>
<a href="#Cloudinary.php-254">254</a>
<a href="#Cloudinary.php-255">255</a>
<a href="#Cloudinary.php-256">256</a>
<a href="#Cloudinary.php-257">257</a>
<a href="#Cloudinary.php-258">258</a>
<a href="#Cloudinary.php-259">259</a>
<a href="#Cloudinary.php-260">260</a>
<a href="#Cloudinary.php-261">261</a>
<a href="#Cloudinary.php-262">262</a>
<a href="#Cloudinary.php-263">263</a>
<a href="#Cloudinary.php-264">264</a>
<a href="#Cloudinary.php-265">265</a>
<a href="#Cloudinary.php-266">266</a>
<a href="#Cloudinary.php-267">267</a>
<a href="#Cloudinary.php-268">268</a>
<a href="#Cloudinary.php-269">269</a>
<a href="#Cloudinary.php-270">270</a>
<a href="#Cloudinary.php-271">271</a>
<a href="#Cloudinary.php-272">272</a>
<a href="#Cloudinary.php-273">273</a>
<a href="#Cloudinary.php-274">274</a>
<a href="#Cloudinary.php-275">275</a>
<a href="#Cloudinary.php-276">276</a>
<a href="#Cloudinary.php-277">277</a>
<a href="#Cloudinary.php-278">278</a>
<a href="#Cloudinary.php-279">279</a>
<a href="#Cloudinary.php-280">280</a>
<a href="#Cloudinary.php-281">281</a>
<a href="#Cloudinary.php-282">282</a>
<a href="#Cloudinary.php-283">283</a>
<a href="#Cloudinary.php-284">284</a>
<a href="#Cloudinary.php-285">285</a>
<a href="#Cloudinary.php-286">286</a>
<a href="#Cloudinary.php-287">287</a>
<a href="#Cloudinary.php-288">288</a>
<a href="#Cloudinary.php-289">289</a>
<a href="#Cloudinary.php-290">290</a>
<a href="#Cloudinary.php-291">291</a>
<a href="#Cloudinary.php-292">292</a>
<a href="#Cloudinary.php-293">293</a>
<a href="#Cloudinary.php-294">294</a>
<a href="#Cloudinary.php-295">295</a>
<a href="#Cloudinary.php-296">296</a>
<a href="#Cloudinary.php-297">297</a>
<a href="#Cloudinary.php-298">298</a>
<a href="#Cloudinary.php-299">299</a>
<a href="#Cloudinary.php-300">300</a>
<a href="#Cloudinary.php-301">301</a>
<a href="#Cloudinary.php-302">302</a>
<a href="#Cloudinary.php-303">303</a>
<a href="#Cloudinary.php-304">304</a>
<a href="#Cloudinary.php-305">305</a>
<a href="#Cloudinary.php-306">306</a>
<a href="#Cloudinary.php-307">307</a>
<a href="#Cloudinary.php-308">308</a>
<a href="#Cloudinary.php-309">309</a>
<a href="#Cloudinary.php-310">310</a>
<a href="#Cloudinary.php-311">311</a>
<a href="#Cloudinary.php-312">312</a>
<a href="#Cloudinary.php-313">313</a>
<a href="#Cloudinary.php-314">314</a>
<a href="#Cloudinary.php-315">315</a>
<a href="#Cloudinary.php-316">316</a>
<a href="#Cloudinary.php-317">317</a>
<a href="#Cloudinary.php-318">318</a>
<a href="#Cloudinary.php-319">319</a>
<a href="#Cloudinary.php-320">320</a>
<a href="#Cloudinary.php-321">321</a>
<a href="#Cloudinary.php-322">322</a>
<a href="#Cloudinary.php-323">323</a>
<a href="#Cloudinary.php-324">324</a>
<a href="#Cloudinary.php-325">325</a>
<a href="#Cloudinary.php-326">326</a>
<a href="#Cloudinary.php-327">327</a>
<a href="#Cloudinary.php-328">328</a>
<a href="#Cloudinary.php-329">329</a>
<a href="#Cloudinary.php-330">330</a>
<a href="#Cloudinary.php-331">331</a>
<a href="#Cloudinary.php-332">332</a>
<a href="#Cloudinary.php-333">333</a>
<a href="#Cloudinary.php-334">334</a>
<a href="#Cloudinary.php-335">335</a>
<a href="#Cloudinary.php-336">336</a>
<a href="#Cloudinary.php-337">337</a>
<a href="#Cloudinary.php-338">338</a>
<a href="#Cloudinary.php-339">339</a>
<a href="#Cloudinary.php-340">340</a>
<a href="#Cloudinary.php-341">341</a>
<a href="#Cloudinary.php-342">342</a>
<a href="#Cloudinary.php-343">343</a>
<a href="#Cloudinary.php-344">344</a>
<a href="#Cloudinary.php-345">345</a>
<a href="#Cloudinary.php-346">346</a>
<a href="#Cloudinary.php-347">347</a>
<a href="#Cloudinary.php-348">348</a>
<a href="#Cloudinary.php-349">349</a>
<a href="#Cloudinary.php-350">350</a>
<a href="#Cloudinary.php-351">351</a>
<a href="#Cloudinary.php-352">352</a>
<a href="#Cloudinary.php-353">353</a>
<a href="#Cloudinary.php-354">354</a>
<a href="#Cloudinary.php-355">355</a>
<a href="#Cloudinary.php-356">356</a>
<a href="#Cloudinary.php-357">357</a>
<a href="#Cloudinary.php-358">358</a>
<a href="#Cloudinary.php-359">359</a>
<a href="#Cloudinary.php-360">360</a>
<a href="#Cloudinary.php-361">361</a>
<a href="#Cloudinary.php-362">362</a>
<a href="#Cloudinary.php-363">363</a>
<a href="#Cloudinary.php-364">364</a>
<a href="#Cloudinary.php-365">365</a>
<a href="#Cloudinary.php-366">366</a>
<a href="#Cloudinary.php-367">367</a>
<a href="#Cloudinary.php-368">368</a>
<a href="#Cloudinary.php-369">369</a>
<a href="#Cloudinary.php-370">370</a>
<a href="#Cloudinary.php-371">371</a>
<a href="#Cloudinary.php-372">372</a>
<a href="#Cloudinary.php-373">373</a>
<a href="#Cloudinary.php-374">374</a>
<a href="#Cloudinary.php-375">375</a>
<a href="#Cloudinary.php-376">376</a>
<a href="#Cloudinary.php-377">377</a>
<a href="#Cloudinary.php-378">378</a>
<a href="#Cloudinary.php-379">379</a>
<a href="#Cloudinary.php-380">380</a>
<a href="#Cloudinary.php-381">381</a>
<a href="#Cloudinary.php-382">382</a>
<a href="#Cloudinary.php-383">383</a>
<a href="#Cloudinary.php-384">384</a>
<a href="#Cloudinary.php-385">385</a>
<a href="#Cloudinary.php-386">386</a>
<a href="#Cloudinary.php-387">387</a>
<a href="#Cloudinary.php-388">388</a>
<a href="#Cloudinary.php-389">389</a>
<a href="#Cloudinary.php-390">390</a>
<a href="#Cloudinary.php-391">391</a>
<a href="#Cloudinary.php-392">392</a>
<a href="#Cloudinary.php-393">393</a>
<a href="#Cloudinary.php-394">394</a>
<a href="#Cloudinary.php-395">395</a>
<a href="#Cloudinary.php-396">396</a>
<a href="#Cloudinary.php-397">397</a>
<a href="#Cloudinary.php-398">398</a>
<a href="#Cloudinary.php-399">399</a>
<a href="#Cloudinary.php-400">400</a>
<a href="#Cloudinary.php-401">401</a>
<a href="#Cloudinary.php-402">402</a>
<a href="#Cloudinary.php-403">403</a>
<a href="#Cloudinary.php-404">404</a>
<a href="#Cloudinary.php-405">405</a>
<a href="#Cloudinary.php-406">406</a>
<a href="#Cloudinary.php-407">407</a>
<a href="#Cloudinary.php-408">408</a>
<a href="#Cloudinary.php-409">409</a>
<a href="#Cloudinary.php-410">410</a>
<a href="#Cloudinary.php-411">411</a>
<a href="#Cloudinary.php-412">412</a>
<a href="#Cloudinary.php-413">413</a>
<a href="#Cloudinary.php-414">414</a>
<a href="#Cloudinary.php-415">415</a>
<a href="#Cloudinary.php-416">416</a>
<a href="#Cloudinary.php-417">417</a>
<a href="#Cloudinary.php-418">418</a>
<a href="#Cloudinary.php-419">419</a>
<a href="#Cloudinary.php-420">420</a>
<a href="#Cloudinary.php-421">421</a>
<a href="#Cloudinary.php-422">422</a>
<a href="#Cloudinary.php-423">423</a>
<a href="#Cloudinary.php-424">424</a>
<a href="#Cloudinary.php-425">425</a>
<a href="#Cloudinary.php-426">426</a>
<a href="#Cloudinary.php-427">427</a>
<a href="#Cloudinary.php-428">428</a>
<a href="#Cloudinary.php-429">429</a>
<a href="#Cloudinary.php-430">430</a>
<a href="#Cloudinary.php-431">431</a>
<a href="#Cloudinary.php-432">432</a>
<a href="#Cloudinary.php-433">433</a>
<a href="#Cloudinary.php-434">434</a>
<a href="#Cloudinary.php-435">435</a>
<a href="#Cloudinary.php-436">436</a>
<a href="#Cloudinary.php-437">437</a>
<a href="#Cloudinary.php-438">438</a>
<a href="#Cloudinary.php-439">439</a>
<a href="#Cloudinary.php-440">440</a>
<a href="#Cloudinary.php-441">441</a>
<a href="#Cloudinary.php-442">442</a>
<a href="#Cloudinary.php-443">443</a>
<a href="#Cloudinary.php-444">444</a>
<a href="#Cloudinary.php-445">445</a>
<a href="#Cloudinary.php-446">446</a>
<a href="#Cloudinary.php-447">447</a>
<a href="#Cloudinary.php-448">448</a>
<a href="#Cloudinary.php-449">449</a>
<a href="#Cloudinary.php-450">450</a>
<a href="#Cloudinary.php-451">451</a>
<a href="#Cloudinary.php-452">452</a>
<a href="#Cloudinary.php-453">453</a>
<a href="#Cloudinary.php-454">454</a>
<a href="#Cloudinary.php-455">455</a>
<a href="#Cloudinary.php-456">456</a>
<a href="#Cloudinary.php-457">457</a>
<a href="#Cloudinary.php-458">458</a>
<a href="#Cloudinary.php-459">459</a>
<a href="#Cloudinary.php-460">460</a>
<a href="#Cloudinary.php-461">461</a>
<a href="#Cloudinary.php-462">462</a>
<a href="#Cloudinary.php-463">463</a>
<a href="#Cloudinary.php-464">464</a>
<a href="#Cloudinary.php-465">465</a>
<a href="#Cloudinary.php-466">466</a>
<a href="#Cloudinary.php-467">467</a>
<a href="#Cloudinary.php-468">468</a>
<a href="#Cloudinary.php-469">469</a>
<a href="#Cloudinary.php-470">470</a>
<a href="#Cloudinary.php-471">471</a>
<a href="#Cloudinary.php-472">472</a>
<a href="#Cloudinary.php-473">473</a>
<a href="#Cloudinary.php-474">474</a>
<a href="#Cloudinary.php-475">475</a>
<a href="#Cloudinary.php-476">476</a>
<a href="#Cloudinary.php-477">477</a>
<a href="#Cloudinary.php-478">478</a>
<a href="#Cloudinary.php-479">479</a>
<a href="#Cloudinary.php-480">480</a>
<a href="#Cloudinary.php-481">481</a>
<a href="#Cloudinary.php-482">482</a>
<a href="#Cloudinary.php-483">483</a>
<a href="#Cloudinary.php-484">484</a>
<a href="#Cloudinary.php-485">485</a>
<a href="#Cloudinary.php-486">486</a>
<a href="#Cloudinary.php-487">487</a>
<a href="#Cloudinary.php-488">488</a>
<a href="#Cloudinary.php-489">489</a>
<a href="#Cloudinary.php-490">490</a>
<a href="#Cloudinary.php-491">491</a>
<a href="#Cloudinary.php-492">492</a>
<a href="#Cloudinary.php-493">493</a>
<a href="#Cloudinary.php-494">494</a>
<a href="#Cloudinary.php-495">495</a>
<a href="#Cloudinary.php-496">496</a>
<a href="#Cloudinary.php-497">497</a>
<a href="#Cloudinary.php-498">498</a>
<a href="#Cloudinary.php-499">499</a>
<a href="#Cloudinary.php-500">500</a>
<a href="#Cloudinary.php-501">501</a>
<a href="#Cloudinary.php-502">502</a>
<a href="#Cloudinary.php-503">503</a>
<a href="#Cloudinary.php-504">504</a>
<a href="#Cloudinary.php-505">505</a>
<a href="#Cloudinary.php-506">506</a>
<a href="#Cloudinary.php-507">507</a>
<a href="#Cloudinary.php-508">508</a>
<a href="#Cloudinary.php-509">509</a>
<a href="#Cloudinary.php-510">510</a>
<a href="#Cloudinary.php-511">511</a>
<a href="#Cloudinary.php-512">512</a>
<a href="#Cloudinary.php-513">513</a>
<a href="#Cloudinary.php-514">514</a>
<a href="#Cloudinary.php-515">515</a>
<a href="#Cloudinary.php-516">516</a>
<a href="#Cloudinary.php-517">517</a>
<a href="#Cloudinary.php-518">518</a>
<a href="#Cloudinary.php-519">519</a>
<a href="#Cloudinary.php-520">520</a>
<a href="#Cloudinary.php-521">521</a>
<a href="#Cloudinary.php-522">522</a>
<a href="#Cloudinary.php-523">523</a>
<a href="#Cloudinary.php-524">524</a>
<a href="#Cloudinary.php-525">525</a>
<a href="#Cloudinary.php-526">526</a>
<a href="#Cloudinary.php-527">527</a>
<a href="#Cloudinary.php-528">528</a>
<a href="#Cloudinary.php-529">529</a>
<a href="#Cloudinary.php-530">530</a>
<a href="#Cloudinary.php-531">531</a>
<a href="#Cloudinary.php-532">532</a>
<a href="#Cloudinary.php-533">533</a>
<a href="#Cloudinary.php-534">534</a>
<a href="#Cloudinary.php-535">535</a>
<a href="#Cloudinary.php-536">536</a>
<a href="#Cloudinary.php-537">537</a>
<a href="#Cloudinary.php-538">538</a>
<a href="#Cloudinary.php-539">539</a>
<a href="#Cloudinary.php-540">540</a>
<a href="#Cloudinary.php-541">541</a>
<a href="#Cloudinary.php-542">542</a>
<a href="#Cloudinary.php-543">543</a>
<a href="#Cloudinary.php-544">544</a>
<a href="#Cloudinary.php-545">545</a>
<a href="#Cloudinary.php-546">546</a>
<a href="#Cloudinary.php-547">547</a>
<a href="#Cloudinary.php-548">548</a>
<a href="#Cloudinary.php-549">549</a>
<a href="#Cloudinary.php-550">550</a>
<a href="#Cloudinary.php-551">551</a>
<a href="#Cloudinary.php-552">552</a>
<a href="#Cloudinary.php-553">553</a>
<a href="#Cloudinary.php-554">554</a>
<a href="#Cloudinary.php-555">555</a>
<a href="#Cloudinary.php-556">556</a>
<a href="#Cloudinary.php-557">557</a>
<a href="#Cloudinary.php-558">558</a>
<a href="#Cloudinary.php-559">559</a>
<a href="#Cloudinary.php-560">560</a>
<a href="#Cloudinary.php-561">561</a>
<a href="#Cloudinary.php-562">562</a>
<a href="#Cloudinary.php-563">563</a>
<a href="#Cloudinary.php-564">564</a>
<a href="#Cloudinary.php-565">565</a>
<a href="#Cloudinary.php-566">566</a>
<a href="#Cloudinary.php-567">567</a>
<a href="#Cloudinary.php-568">568</a>
<a href="#Cloudinary.php-569">569</a>
<a href="#Cloudinary.php-570">570</a>
<a href="#Cloudinary.php-571">571</a>
<a href="#Cloudinary.php-572">572</a>
<a href="#Cloudinary.php-573">573</a>
<a href="#Cloudinary.php-574">574</a>
<a href="#Cloudinary.php-575">575</a>
<a href="#Cloudinary.php-576">576</a>
<a href="#Cloudinary.php-577">577</a>
<a href="#Cloudinary.php-578">578</a>
<a href="#Cloudinary.php-579">579</a>
<a href="#Cloudinary.php-580">580</a>
<a href="#Cloudinary.php-581">581</a>
<a href="#Cloudinary.php-582">582</a>
<a href="#Cloudinary.php-583">583</a>
<a href="#Cloudinary.php-584">584</a>
<a href="#Cloudinary.php-585">585</a>
<a href="#Cloudinary.php-586">586</a>
<a href="#Cloudinary.php-587">587</a>
<a href="#Cloudinary.php-588">588</a>
<a href="#Cloudinary.php-589">589</a>
<a href="#Cloudinary.php-590">590</a>
<a href="#Cloudinary.php-591">591</a>
<a href="#Cloudinary.php-592">592</a>
<a href="#Cloudinary.php-593">593</a>
<a href="#Cloudinary.php-594">594</a>
<a href="#Cloudinary.php-595">595</a>
<a href="#Cloudinary.php-596">596</a>
<a href="#Cloudinary.php-597">597</a>
<a href="#Cloudinary.php-598">598</a>
<a href="#Cloudinary.php-599">599</a>
<a href="#Cloudinary.php-600">600</a>
<a href="#Cloudinary.php-601">601</a>
<a href="#Cloudinary.php-602">602</a>
<a href="#Cloudinary.php-603">603</a>
<a href="#Cloudinary.php-604">604</a>
<a href="#Cloudinary.php-605">605</a>
<a href="#Cloudinary.php-606">606</a>
<a href="#Cloudinary.php-607">607</a>
<a href="#Cloudinary.php-608">608</a>
<a href="#Cloudinary.php-609">609</a>
<a href="#Cloudinary.php-610">610</a>
<a href="#Cloudinary.php-611">611</a>
<a href="#Cloudinary.php-612">612</a>
<a href="#Cloudinary.php-613">613</a>
<a href="#Cloudinary.php-614">614</a>
<a href="#Cloudinary.php-615">615</a>
<a href="#Cloudinary.php-616">616</a>
<a href="#Cloudinary.php-617">617</a>
<a href="#Cloudinary.php-618">618</a>
<a href="#Cloudinary.php-619">619</a>
<a href="#Cloudinary.php-620">620</a>
<a href="#Cloudinary.php-621">621</a>
<a href="#Cloudinary.php-622">622</a>
<a href="#Cloudinary.php-623">623</a>
<a href="#Cloudinary.php-624">624</a>
<a href="#Cloudinary.php-625">625</a>
<a href="#Cloudinary.php-626">626</a>
<a href="#Cloudinary.php-627">627</a>
<a href="#Cloudinary.php-628">628</a>
<a href="#Cloudinary.php-629">629</a>
<a href="#Cloudinary.php-630">630</a>
<a href="#Cloudinary.php-631">631</a>
<a href="#Cloudinary.php-632">632</a>
<a href="#Cloudinary.php-633">633</a>
<a href="#Cloudinary.php-634">634</a>
<a href="#Cloudinary.php-635">635</a>
<a href="#Cloudinary.php-636">636</a>
<a href="#Cloudinary.php-637">637</a>
<a href="#Cloudinary.php-638">638</a>
<a href="#Cloudinary.php-639">639</a>
<a href="#Cloudinary.php-640">640</a>
<a href="#Cloudinary.php-641">641</a>
<a href="#Cloudinary.php-642">642</a>
<a href="#Cloudinary.php-643">643</a>
<a href="#Cloudinary.php-644">644</a>
<a href="#Cloudinary.php-645">645</a>
<a href="#Cloudinary.php-646">646</a>
<a href="#Cloudinary.php-647">647</a>
<a href="#Cloudinary.php-648">648</a>
<a href="#Cloudinary.php-649">649</a>
<a href="#Cloudinary.php-650">650</a>
<a href="#Cloudinary.php-651">651</a>
<a href="#Cloudinary.php-652">652</a>
<a href="#Cloudinary.php-653">653</a>
<a href="#Cloudinary.php-654">654</a>
<a href="#Cloudinary.php-655">655</a>
<a href="#Cloudinary.php-656">656</a>
<a href="#Cloudinary.php-657">657</a>
<a href="#Cloudinary.php-658">658</a>
<a href="#Cloudinary.php-659">659</a>
<a href="#Cloudinary.php-660">660</a>
<a href="#Cloudinary.php-661">661</a>
<a href="#Cloudinary.php-662">662</a>
<a href="#Cloudinary.php-663">663</a>
<a href="#Cloudinary.php-664">664</a>
<a href="#Cloudinary.php-665">665</a>
<a href="#Cloudinary.php-666">666</a>
<a href="#Cloudinary.php-667">667</a>
<a href="#Cloudinary.php-668">668</a>
<a href="#Cloudinary.php-669">669</a>
<a href="#Cloudinary.php-670">670</a>
<a href="#Cloudinary.php-671">671</a>
<a href="#Cloudinary.php-672">672</a>
<a href="#Cloudinary.php-673">673</a>
<a href="#Cloudinary.php-674">674</a>
<a href="#Cloudinary.php-675">675</a>
<a href="#Cloudinary.php-676">676</a>
<a href="#Cloudinary.php-677">677</a>
<a href="#Cloudinary.php-678">678</a>
<a href="#Cloudinary.php-679">679</a>
<a href="#Cloudinary.php-680">680</a>
<a href="#Cloudinary.php-681">681</a>
<a href="#Cloudinary.php-682">682</a>
<a href="#Cloudinary.php-683">683</a>
<a href="#Cloudinary.php-684">684</a>
<a href="#Cloudinary.php-685">685</a>
<a href="#Cloudinary.php-686">686</a>
<a href="#Cloudinary.php-687">687</a>
<a href="#Cloudinary.php-688">688</a>
<a href="#Cloudinary.php-689">689</a>
<a href="#Cloudinary.php-690">690</a>
<a href="#Cloudinary.php-691">691</a>
<a href="#Cloudinary.php-692">692</a>
<a href="#Cloudinary.php-693">693</a>
<a href="#Cloudinary.php-694">694</a>
<a href="#Cloudinary.php-695">695</a>
<a href="#Cloudinary.php-696">696</a>
<a href="#Cloudinary.php-697">697</a>
<a href="#Cloudinary.php-698">698</a>
<a href="#Cloudinary.php-699">699</a>
<a href="#Cloudinary.php-700">700</a>
<a href="#Cloudinary.php-701">701</a>
<a href="#Cloudinary.php-702">702</a>
<a href="#Cloudinary.php-703">703</a>
<a href="#Cloudinary.php-704">704</a>
<a href="#Cloudinary.php-705">705</a>
<a href="#Cloudinary.php-706">706</a>
<a href="#Cloudinary.php-707">707</a>
<a href="#Cloudinary.php-708">708</a>
<a href="#Cloudinary.php-709">709</a>
<a href="#Cloudinary.php-710">710</a>
<a href="#Cloudinary.php-711">711</a>
<a href="#Cloudinary.php-712">712</a>
<a href="#Cloudinary.php-713">713</a>
<a href="#Cloudinary.php-714">714</a>
<a href="#Cloudinary.php-715">715</a>
<a href="#Cloudinary.php-716">716</a>
<a href="#Cloudinary.php-717">717</a>
<a href="#Cloudinary.php-718">718</a>
<a href="#Cloudinary.php-719">719</a>
<a href="#Cloudinary.php-720">720</a>
<a href="#Cloudinary.php-721">721</a>
<a href="#Cloudinary.php-722">722</a>
<a href="#Cloudinary.php-723">723</a>
<a href="#Cloudinary.php-724">724</a>
<a href="#Cloudinary.php-725">725</a>
<a href="#Cloudinary.php-726">726</a>
<a href="#Cloudinary.php-727">727</a>
<a href="#Cloudinary.php-728">728</a>
<a href="#Cloudinary.php-729">729</a>
<a href="#Cloudinary.php-730">730</a>
<a href="#Cloudinary.php-731">731</a>
<a href="#Cloudinary.php-732">732</a>
<a href="#Cloudinary.php-733">733</a>
<a href="#Cloudinary.php-734">734</a>
<a href="#Cloudinary.php-735">735</a>
<a href="#Cloudinary.php-736">736</a>
<a href="#Cloudinary.php-737">737</a>
<a href="#Cloudinary.php-738">738</a>
<a href="#Cloudinary.php-739">739</a>
<a href="#Cloudinary.php-740">740</a>
<a href="#Cloudinary.php-741">741</a>
<a href="#Cloudinary.php-742">742</a>
<a href="#Cloudinary.php-743">743</a>
<a href="#Cloudinary.php-744">744</a>
<a href="#Cloudinary.php-745">745</a>
<a href="#Cloudinary.php-746">746</a>
<a href="#Cloudinary.php-747">747</a>
<a href="#Cloudinary.php-748">748</a>
<a href="#Cloudinary.php-749">749</a>
<a href="#Cloudinary.php-750">750</a>
<a href="#Cloudinary.php-751">751</a>
<a href="#Cloudinary.php-752">752</a>
<a href="#Cloudinary.php-753">753</a>
<a href="#Cloudinary.php-754">754</a>
<a href="#Cloudinary.php-755">755</a>
<a href="#Cloudinary.php-756">756</a>
<a href="#Cloudinary.php-757">757</a>
<a href="#Cloudinary.php-758">758</a>
<a href="#Cloudinary.php-759">759</a>
<a href="#Cloudinary.php-760">760</a>
<a href="#Cloudinary.php-761">761</a>
<a href="#Cloudinary.php-762">762</a>
<a href="#Cloudinary.php-763">763</a>
<a href="#Cloudinary.php-764">764</a>
<a href="#Cloudinary.php-765">765</a>
<a href="#Cloudinary.php-766">766</a>
<a href="#Cloudinary.php-767">767</a>
<a href="#Cloudinary.php-768">768</a>
<a href="#Cloudinary.php-769">769</a>
<a href="#Cloudinary.php-770">770</a>
<a href="#Cloudinary.php-771">771</a>
<a href="#Cloudinary.php-772">772</a>
<a href="#Cloudinary.php-773">773</a>
<a href="#Cloudinary.php-774">774</a>
<a href="#Cloudinary.php-775">775</a>
<a href="#Cloudinary.php-776">776</a>
<a href="#Cloudinary.php-777">777</a>
<a href="#Cloudinary.php-778">778</a>
<a href="#Cloudinary.php-779">779</a>
<a href="#Cloudinary.php-780">780</a>
<a href="#Cloudinary.php-781">781</a>
<a href="#Cloudinary.php-782">782</a>
<a href="#Cloudinary.php-783">783</a>
<a href="#Cloudinary.php-784">784</a>
<a href="#Cloudinary.php-785">785</a>
<a href="#Cloudinary.php-786">786</a>
<a href="#Cloudinary.php-787">787</a>
<a href="#Cloudinary.php-788">788</a>
<a href="#Cloudinary.php-789">789</a>
<a href="#Cloudinary.php-790">790</a>
<a href="#Cloudinary.php-791">791</a>
<a href="#Cloudinary.php-792">792</a>
<a href="#Cloudinary.php-793">793</a>
<a href="#Cloudinary.php-794">794</a>
<a href="#Cloudinary.php-795">795</a>
<a href="#Cloudinary.php-796">796</a>
<a href="#Cloudinary.php-797">797</a>
<a href="#Cloudinary.php-798">798</a>
<a href="#Cloudinary.php-799">799</a>
<a href="#Cloudinary.php-800">800</a>
<a href="#Cloudinary.php-801">801</a>
<a href="#Cloudinary.php-802">802</a>
<a href="#Cloudinary.php-803">803</a>
<a href="#Cloudinary.php-804">804</a>
<a href="#Cloudinary.php-805">805</a>
<a href="#Cloudinary.php-806">806</a>
<a href="#Cloudinary.php-807">807</a>
<a href="#Cloudinary.php-808">808</a>
<a href="#Cloudinary.php-809">809</a>
<a href="#Cloudinary.php-810">810</a>
<a href="#Cloudinary.php-811">811</a>
<a href="#Cloudinary.php-812">812</a>
<a href="#Cloudinary.php-813">813</a>
<a href="#Cloudinary.php-814">814</a>
<a href="#Cloudinary.php-815">815</a>
<a href="#Cloudinary.php-816">816</a>
<a href="#Cloudinary.php-817">817</a>
<a href="#Cloudinary.php-818">818</a>
<a href="#Cloudinary.php-819">819</a>
<a href="#Cloudinary.php-820">820</a>
<a href="#Cloudinary.php-821">821</a>
<a href="#Cloudinary.php-822">822</a>
<a href="#Cloudinary.php-823">823</a>
<a href="#Cloudinary.php-824">824</a>
<a href="#Cloudinary.php-825">825</a>
<a href="#Cloudinary.php-826">826</a>
<a href="#Cloudinary.php-827">827</a>
<a href="#Cloudinary.php-828">828</a>
<a href="#Cloudinary.php-829">829</a>
<a href="#Cloudinary.php-830">830</a>
<a href="#Cloudinary.php-831">831</a>
<a href="#Cloudinary.php-832">832</a>
<a href="#Cloudinary.php-833">833</a>
<a href="#Cloudinary.php-834">834</a>
<a href="#Cloudinary.php-835">835</a>
<a href="#Cloudinary.php-836">836</a>
<a href="#Cloudinary.php-837">837</a>
<a href="#Cloudinary.php-838">838</a>
<a href="#Cloudinary.php-839">839</a>
<a href="#Cloudinary.php-840">840</a>
<a href="#Cloudinary.php-841">841</a>
<a href="#Cloudinary.php-842">842</a>
<a href="#Cloudinary.php-843">843</a>
<a href="#Cloudinary.php-844">844</a>
<a href="#Cloudinary.php-845">845</a>
<a href="#Cloudinary.php-846">846</a>
<a href="#Cloudinary.php-847">847</a>
<a href="#Cloudinary.php-848">848</a>
<a href="#Cloudinary.php-849">849</a>
<a href="#Cloudinary.php-850">850</a>
<a href="#Cloudinary.php-851">851</a>
<a href="#Cloudinary.php-852">852</a>
<a href="#Cloudinary.php-853">853</a>
<a href="#Cloudinary.php-854">854</a>
<a href="#Cloudinary.php-855">855</a>
<a href="#Cloudinary.php-856">856</a>
<a href="#Cloudinary.php-857">857</a>
<a href="#Cloudinary.php-858">858</a>
<a href="#Cloudinary.php-859">859</a>
<a href="#Cloudinary.php-860">860</a>
<a href="#Cloudinary.php-861">861</a>
<a href="#Cloudinary.php-862">862</a>
<a href="#Cloudinary.php-863">863</a>
<a href="#Cloudinary.php-864">864</a>
<a href="#Cloudinary.php-865">865</a>
<a href="#Cloudinary.php-866">866</a>
<a href="#Cloudinary.php-867">867</a>
<a href="#Cloudinary.php-868">868</a>
<a href="#Cloudinary.php-869">869</a>
<a href="#Cloudinary.php-870">870</a>
<a href="#Cloudinary.php-871">871</a>
<a href="#Cloudinary.php-872">872</a>
<a href="#Cloudinary.php-873">873</a>
<a href="#Cloudinary.php-874">874</a>
<a href="#Cloudinary.php-875">875</a>
<a href="#Cloudinary.php-876">876</a>
<a href="#Cloudinary.php-877">877</a>
<a href="#Cloudinary.php-878">878</a>
<a href="#Cloudinary.php-879">879</a>
<a href="#Cloudinary.php-880">880</a>
<a href="#Cloudinary.php-881">881</a>
<a href="#Cloudinary.php-882">882</a>
<a href="#Cloudinary.php-883">883</a>
<a href="#Cloudinary.php-884">884</a>
<a href="#Cloudinary.php-885">885</a>
<a href="#Cloudinary.php-886">886</a>
<a href="#Cloudinary.php-887">887</a>
<a href="#Cloudinary.php-888">888</a>
<a href="#Cloudinary.php-889">889</a>
<a href="#Cloudinary.php-890">890</a>
<a href="#Cloudinary.php-891">891</a>
<a href="#Cloudinary.php-892">892</a>
<a href="#Cloudinary.php-893">893</a>
<a href="#Cloudinary.php-894">894</a>
<a href="#Cloudinary.php-895">895</a>
<a href="#Cloudinary.php-896">896</a>
<a href="#Cloudinary.php-897">897</a>
<a href="#Cloudinary.php-898">898</a>
<a href="#Cloudinary.php-899">899</a>
<a href="#Cloudinary.php-900">900</a>
<a href="#Cloudinary.php-901">901</a>
<a href="#Cloudinary.php-902">902</a>
<a href="#Cloudinary.php-903">903</a>
<a href="#Cloudinary.php-904">904</a>
<a href="#Cloudinary.php-905">905</a>
<a href="#Cloudinary.php-906">906</a>
<a href="#Cloudinary.php-907">907</a>
<a href="#Cloudinary.php-908">908</a>
<a href="#Cloudinary.php-909">909</a>
<a href="#Cloudinary.php-910">910</a>
<a href="#Cloudinary.php-911">911</a>
<a href="#Cloudinary.php-912">912</a>
<a href="#Cloudinary.php-913">913</a>
<a href="#Cloudinary.php-914">914</a>
<a href="#Cloudinary.php-915">915</a>
<a href="#Cloudinary.php-916">916</a>
<a href="#Cloudinary.php-917">917</a>
<a href="#Cloudinary.php-918">918</a>
<a href="#Cloudinary.php-919">919</a>
<a href="#Cloudinary.php-920">920</a>
<a href="#Cloudinary.php-921">921</a>
<a href="#Cloudinary.php-922">922</a>
<a href="#Cloudinary.php-923">923</a>
<a href="#Cloudinary.php-924">924</a>
<a href="#Cloudinary.php-925">925</a>
<a href="#Cloudinary.php-926">926</a>
<a href="#Cloudinary.php-927">927</a>
<a href="#Cloudinary.php-928">928</a>
<a href="#Cloudinary.php-929">929</a>
<a href="#Cloudinary.php-930">930</a>
<a href="#Cloudinary.php-931">931</a>
<a href="#Cloudinary.php-932">932</a>
<a href="#Cloudinary.php-933">933</a>
<a href="#Cloudinary.php-934">934</a>
<a href="#Cloudinary.php-935">935</a>
<a href="#Cloudinary.php-936">936</a>
<a href="#Cloudinary.php-937">937</a>
<a href="#Cloudinary.php-938">938</a>
<a href="#Cloudinary.php-939">939</a>
<a href="#Cloudinary.php-940">940</a>
<a href="#Cloudinary.php-941">941</a>
<a href="#Cloudinary.php-942">942</a>
<a href="#Cloudinary.php-943">943</a>
<a href="#Cloudinary.php-944">944</a>
<a href="#Cloudinary.php-945">945</a>
<a href="#Cloudinary.php-946">946</a>
<a href="#Cloudinary.php-947">947</a>
<a href="#Cloudinary.php-948">948</a>
<a href="#Cloudinary.php-949">949</a>
<a href="#Cloudinary.php-950">950</a>
<a href="#Cloudinary.php-951">951</a>
<a href="#Cloudinary.php-952">952</a>
<a href="#Cloudinary.php-953">953</a>
<a href="#Cloudinary.php-954">954</a>
<a href="#Cloudinary.php-955">955</a>
<a href="#Cloudinary.php-956">956</a>
<a href="#Cloudinary.php-957">957</a>
<a href="#Cloudinary.php-958">958</a>
<a href="#Cloudinary.php-959">959</a>
<a href="#Cloudinary.php-960">960</a>
<a href="#Cloudinary.php-961">961</a>
<a href="#Cloudinary.php-962">962</a>
<a href="#Cloudinary.php-963">963</a>
<a href="#Cloudinary.php-964">964</a>
<a href="#Cloudinary.php-965">965</a>
<a href="#Cloudinary.php-966">966</a>
<a href="#Cloudinary.php-967">967</a>
<a href="#Cloudinary.php-968">968</a>
<a href="#Cloudinary.php-969">969</a>
<a href="#Cloudinary.php-970">970</a>
<a href="#Cloudinary.php-971">971</a>
<a href="#Cloudinary.php-972">972</a>
<a href="#Cloudinary.php-973">973</a>
<a href="#Cloudinary.php-974">974</a>
<a href="#Cloudinary.php-975">975</a>
<a href="#Cloudinary.php-976">976</a>
<a href="#Cloudinary.php-977">977</a>
<a href="#Cloudinary.php-978">978</a>
<a href="#Cloudinary.php-979">979</a></pre></div></td><td class="code"><div class="codehilite highlight"><pre><span></span><a name="Cloudinary.php-1"></a><span class="cp">&lt;?php</span>
<a name="Cloudinary.php-2"></a><span class="k">require_once</span> <span class="s1">&#39;AuthToken.php&#39;</span><span class="p">;</span>
<a name="Cloudinary.php-3"></a>
<a name="Cloudinary.php-4"></a><span class="k">class</span> <span class="nc">Cloudinary</span> <span class="p">{</span>
<a name="Cloudinary.php-5"></a>
<a name="Cloudinary.php-6"></a>    <span class="k">const</span> <span class="no">CF_SHARED_CDN</span> <span class="o">=</span> <span class="s2">&quot;d3jpl91pxevbkh.cloudfront.net&quot;</span><span class="p">;</span>
<a name="Cloudinary.php-7"></a>    <span class="k">const</span> <span class="no">OLD_AKAMAI_SHARED_CDN</span> <span class="o">=</span> <span class="s2">&quot;cloudinary-a.akamaihd.net&quot;</span><span class="p">;</span>
<a name="Cloudinary.php-8"></a>    <span class="k">const</span> <span class="no">AKAMAI_SHARED_CDN</span> <span class="o">=</span> <span class="s2">&quot;res.cloudinary.com&quot;</span><span class="p">;</span>
<a name="Cloudinary.php-9"></a>    <span class="k">const</span> <span class="no">SHARED_CDN</span> <span class="o">=</span> <span class="s2">&quot;res.cloudinary.com&quot;</span><span class="p">;</span>
<a name="Cloudinary.php-10"></a>    <span class="k">const</span> <span class="no">BLANK</span> <span class="o">=</span> <span class="s2">&quot;data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7&quot;</span><span class="p">;</span>
<a name="Cloudinary.php-11"></a>    <span class="k">const</span> <span class="no">RANGE_VALUE_RE</span> <span class="o">=</span> <span class="s1">&#39;/^(?P&lt;value&gt;(\d+\.)?\d+)(?P&lt;modifier&gt;[%pP])?$/&#39;</span><span class="p">;</span>
<a name="Cloudinary.php-12"></a>    <span class="k">const</span> <span class="no">RANGE_RE</span> <span class="o">=</span> <span class="s1">&#39;/^(\d+\.)?\d+[%pP]?\.\.(\d+\.)?\d+[%pP]?$/&#39;</span><span class="p">;</span>
<a name="Cloudinary.php-13"></a>
<a name="Cloudinary.php-14"></a>    <span class="k">const</span> <span class="no">VERSION</span> <span class="o">=</span> <span class="s2">&quot;1.7.2&quot;</span><span class="p">;</span>
<a name="Cloudinary.php-15"></a>    <span class="sd">/** @internal Do not change this value */</span>
<a name="Cloudinary.php-16"></a>    <span class="k">const</span> <span class="no">USER_AGENT</span> <span class="o">=</span> <span class="s2">&quot;CloudinaryPHP/1.7.2&quot;</span><span class="p">;</span>
<a name="Cloudinary.php-17"></a>
<a name="Cloudinary.php-18"></a>    <span class="sd">/**</span>
<a name="Cloudinary.php-19"></a><span class="sd">     * Additional information to be passed with the USER_AGENT, e.g. &quot;CloudinaryMagento/1.0.1&quot;. This value is set in platform-specific</span>
<a name="Cloudinary.php-20"></a><span class="sd">     * implementations that use cloudinary_php.</span>
<a name="Cloudinary.php-21"></a><span class="sd">     *</span>
<a name="Cloudinary.php-22"></a><span class="sd">     * The format of the value should be &lt;ProductName&gt;/Version[ (comment)].</span>
<a name="Cloudinary.php-23"></a><span class="sd">     * @see http://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html#sec14.43</span>
<a name="Cloudinary.php-24"></a><span class="sd">     *</span>
<a name="Cloudinary.php-25"></a><span class="sd">     * &lt;b&gt;Do not set this value in application code!&lt;/b&gt;</span>
<a name="Cloudinary.php-26"></a><span class="sd">     *</span>
<a name="Cloudinary.php-27"></a><span class="sd">     * @var string</span>
<a name="Cloudinary.php-28"></a><span class="sd">     */</span>
<a name="Cloudinary.php-29"></a>    <span class="k">public</span> <span class="k">static</span> <span class="nv">$USER_PLATFORM</span> <span class="o">=</span> <span class="s2">&quot;&quot;</span><span class="p">;</span>
<a name="Cloudinary.php-30"></a>
<a name="Cloudinary.php-31"></a>    <span class="k">public</span> <span class="k">static</span> <span class="nv">$DEFAULT_RESPONSIVE_WIDTH_TRANSFORMATION</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;width&quot;</span><span class="o">=&gt;</span><span class="s2">&quot;auto&quot;</span><span class="p">,</span> <span class="s2">&quot;crop&quot;</span><span class="o">=&gt;</span><span class="s2">&quot;limit&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-32"></a>
<a name="Cloudinary.php-33"></a>    <span class="k">private</span> <span class="k">static</span> <span class="nv">$config</span> <span class="o">=</span> <span class="k">NULL</span><span class="p">;</span>
<a name="Cloudinary.php-34"></a>    <span class="k">public</span> <span class="k">static</span> <span class="nv">$JS_CONFIG_PARAMS</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;api_key&quot;</span><span class="p">,</span> <span class="s2">&quot;cloud_name&quot;</span><span class="p">,</span> <span class="s2">&quot;private_cdn&quot;</span><span class="p">,</span> <span class="s2">&quot;secure_distribution&quot;</span><span class="p">,</span> <span class="s2">&quot;cdn_subdomain&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-35"></a>
<a name="Cloudinary.php-36"></a>    <span class="sd">/**</span>
<a name="Cloudinary.php-37"></a><span class="sd">     * Provides the USER_AGENT string that is passed to the Cloudinary servers.</span>
<a name="Cloudinary.php-38"></a><span class="sd">     *</span>
<a name="Cloudinary.php-39"></a><span class="sd">     * Prepends {@link $USER_PLATFORM} if it is defined.</span>
<a name="Cloudinary.php-40"></a><span class="sd">     *</span>
<a name="Cloudinary.php-41"></a><span class="sd">     * @return string</span>
<a name="Cloudinary.php-42"></a><span class="sd">     */</span>
<a name="Cloudinary.php-43"></a>    <span class="k">public</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">userAgent</span><span class="p">()</span>
<a name="Cloudinary.php-44"></a>    <span class="p">{</span>
<a name="Cloudinary.php-45"></a>        <span class="k">if</span> <span class="p">(</span><span class="nx">self</span><span class="o">::</span><span class="nv">$USER_PLATFORM</span> <span class="o">==</span> <span class="s2">&quot;&quot;</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-46"></a>            <span class="k">return</span> <span class="nx">self</span><span class="o">::</span><span class="na">USER_AGENT</span><span class="p">;</span>
<a name="Cloudinary.php-47"></a>        <span class="p">}</span> <span class="k">else</span> <span class="p">{</span>
<a name="Cloudinary.php-48"></a>            <span class="k">return</span> <span class="nx">self</span><span class="o">::</span><span class="nv">$USER_PLATFORM</span> <span class="o">.</span> <span class="s2">&quot; &quot;</span> <span class="o">.</span> <span class="nx">self</span><span class="o">::</span><span class="na">USER_AGENT</span><span class="p">;</span>
<a name="Cloudinary.php-49"></a>        <span class="p">}</span>
<a name="Cloudinary.php-50"></a>    <span class="p">}</span>
<a name="Cloudinary.php-51"></a>
<a name="Cloudinary.php-52"></a>    <span class="k">public</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">is_not_null</span> <span class="p">(</span><span class="nv">$var</span><span class="p">)</span> <span class="p">{</span> <span class="k">return</span> <span class="o">!</span><span class="nb">is_null</span><span class="p">(</span><span class="nv">$var</span><span class="p">);}</span>
<a name="Cloudinary.php-53"></a>
<a name="Cloudinary.php-54"></a>    <span class="k">public</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">config</span><span class="p">(</span><span class="nv">$values</span> <span class="o">=</span> <span class="k">NULL</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-55"></a>        <span class="k">if</span> <span class="p">(</span><span class="nx">self</span><span class="o">::</span><span class="nv">$config</span> <span class="o">==</span> <span class="k">NULL</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-56"></a>            <span class="nx">self</span><span class="o">::</span><span class="na">reset_config</span><span class="p">();</span>
<a name="Cloudinary.php-57"></a>        <span class="p">}</span>
<a name="Cloudinary.php-58"></a>        <span class="k">if</span> <span class="p">(</span><span class="nv">$values</span> <span class="o">!=</span> <span class="k">NULL</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-59"></a>            <span class="nx">self</span><span class="o">::</span><span class="nv">$config</span> <span class="o">=</span> <span class="nb">array_merge</span><span class="p">(</span><span class="nx">self</span><span class="o">::</span><span class="nv">$config</span><span class="p">,</span> <span class="nv">$values</span><span class="p">);</span>
<a name="Cloudinary.php-60"></a>        <span class="p">}</span>
<a name="Cloudinary.php-61"></a>        <span class="k">return</span> <span class="nx">self</span><span class="o">::</span><span class="nv">$config</span><span class="p">;</span>
<a name="Cloudinary.php-62"></a>    <span class="p">}</span>
<a name="Cloudinary.php-63"></a>
<a name="Cloudinary.php-64"></a>    <span class="k">public</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">reset_config</span><span class="p">()</span> <span class="p">{</span>
<a name="Cloudinary.php-65"></a>        <span class="nx">self</span><span class="o">::</span><span class="na">config_from_url</span><span class="p">(</span><span class="nb">getenv</span><span class="p">(</span><span class="s2">&quot;CLOUDINARY_URL&quot;</span><span class="p">));</span>
<a name="Cloudinary.php-66"></a>    <span class="p">}</span>
<a name="Cloudinary.php-67"></a>
<a name="Cloudinary.php-68"></a>    <span class="k">public</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">config_from_url</span><span class="p">(</span><span class="nv">$cloudinary_url</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-69"></a>        <span class="nx">self</span><span class="o">::</span><span class="nv">$config</span> <span class="o">=</span> <span class="k">array</span><span class="p">();</span>
<a name="Cloudinary.php-70"></a>        <span class="k">if</span> <span class="p">(</span><span class="nv">$cloudinary_url</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-71"></a>            <span class="nv">$uri</span> <span class="o">=</span> <span class="nb">parse_url</span><span class="p">(</span><span class="nv">$cloudinary_url</span><span class="p">);</span>
<a name="Cloudinary.php-72"></a>            <span class="nv">$q_params</span> <span class="o">=</span> <span class="k">array</span><span class="p">();</span>
<a name="Cloudinary.php-73"></a>            <span class="k">if</span> <span class="p">(</span><span class="nb">isset</span><span class="p">(</span><span class="nv">$uri</span><span class="p">[</span><span class="s2">&quot;query&quot;</span><span class="p">]))</span> <span class="p">{</span>
<a name="Cloudinary.php-74"></a>                <span class="nb">parse_str</span><span class="p">(</span><span class="nv">$uri</span><span class="p">[</span><span class="s2">&quot;query&quot;</span><span class="p">],</span> <span class="nv">$q_params</span><span class="p">);</span>
<a name="Cloudinary.php-75"></a>            <span class="p">}</span>
<a name="Cloudinary.php-76"></a>            <span class="nv">$private_cdn</span> <span class="o">=</span> <span class="nb">isset</span><span class="p">(</span><span class="nv">$uri</span><span class="p">[</span><span class="s2">&quot;path&quot;</span><span class="p">])</span> <span class="o">&amp;&amp;</span> <span class="nv">$uri</span><span class="p">[</span><span class="s2">&quot;path&quot;</span><span class="p">]</span> <span class="o">!=</span> <span class="s2">&quot;/&quot;</span><span class="p">;</span>
<a name="Cloudinary.php-77"></a>            <span class="nv">$config</span> <span class="o">=</span> <span class="nb">array_merge</span><span class="p">(</span><span class="nv">$q_params</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span>
<a name="Cloudinary.php-78"></a>                            <span class="s2">&quot;cloud_name&quot;</span> <span class="o">=&gt;</span> <span class="nv">$uri</span><span class="p">[</span><span class="s2">&quot;host&quot;</span><span class="p">],</span>
<a name="Cloudinary.php-79"></a>                            <span class="s2">&quot;api_key&quot;</span> <span class="o">=&gt;</span> <span class="nv">$uri</span><span class="p">[</span><span class="s2">&quot;user&quot;</span><span class="p">],</span>
<a name="Cloudinary.php-80"></a>                            <span class="s2">&quot;api_secret&quot;</span> <span class="o">=&gt;</span> <span class="nv">$uri</span><span class="p">[</span><span class="s2">&quot;pass&quot;</span><span class="p">],</span>
<a name="Cloudinary.php-81"></a>                            <span class="s2">&quot;private_cdn&quot;</span> <span class="o">=&gt;</span> <span class="nv">$private_cdn</span><span class="p">));</span>
<a name="Cloudinary.php-82"></a>            <span class="k">if</span> <span class="p">(</span><span class="nv">$private_cdn</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-83"></a>                <span class="nv">$config</span><span class="p">[</span><span class="s2">&quot;secure_distribution&quot;</span><span class="p">]</span> <span class="o">=</span> <span class="nb">substr</span><span class="p">(</span><span class="nv">$uri</span><span class="p">[</span><span class="s2">&quot;path&quot;</span><span class="p">],</span> <span class="mi">1</span><span class="p">);</span>
<a name="Cloudinary.php-84"></a>            <span class="p">}</span>
<a name="Cloudinary.php-85"></a>            <span class="nx">self</span><span class="o">::</span><span class="nv">$config</span> <span class="o">=</span> <span class="nb">array_merge</span><span class="p">(</span><span class="nx">self</span><span class="o">::</span><span class="nv">$config</span><span class="p">,</span> <span class="nv">$config</span><span class="p">);</span>
<a name="Cloudinary.php-86"></a>        <span class="p">}</span>
<a name="Cloudinary.php-87"></a>    <span class="p">}</span>
<a name="Cloudinary.php-88"></a>
<a name="Cloudinary.php-89"></a>    <span class="k">public</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">config_get</span><span class="p">(</span><span class="nv">$option</span><span class="p">,</span> <span class="nv">$default</span><span class="o">=</span><span class="k">NULL</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-90"></a>        <span class="k">return</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nx">self</span><span class="o">::</span><span class="na">config</span><span class="p">(),</span> <span class="nv">$option</span><span class="p">,</span> <span class="nv">$default</span><span class="p">);</span>
<a name="Cloudinary.php-91"></a>    <span class="p">}</span>
<a name="Cloudinary.php-92"></a>
<a name="Cloudinary.php-93"></a>    <span class="k">public</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="nv">$option</span><span class="p">,</span> <span class="nv">$default</span><span class="o">=</span><span class="k">NULL</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-94"></a>        <span class="k">if</span> <span class="p">(</span><span class="nb">isset</span><span class="p">(</span><span class="nv">$options</span><span class="p">[</span><span class="nv">$option</span><span class="p">]))</span> <span class="p">{</span>
<a name="Cloudinary.php-95"></a>            <span class="k">return</span> <span class="nv">$options</span><span class="p">[</span><span class="nv">$option</span><span class="p">];</span>
<a name="Cloudinary.php-96"></a>        <span class="p">}</span> <span class="k">else</span> <span class="p">{</span>
<a name="Cloudinary.php-97"></a>            <span class="k">return</span> <span class="nv">$default</span><span class="p">;</span>
<a name="Cloudinary.php-98"></a>        <span class="p">}</span>
<a name="Cloudinary.php-99"></a>    <span class="p">}</span>
<a name="Cloudinary.php-100"></a>
<a name="Cloudinary.php-101"></a>    <span class="k">public</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">option_consume</span><span class="p">(</span><span class="o">&amp;</span><span class="nv">$options</span><span class="p">,</span> <span class="nv">$option</span><span class="p">,</span> <span class="nv">$default</span><span class="o">=</span><span class="k">NULL</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-102"></a>        <span class="k">if</span> <span class="p">(</span><span class="nb">isset</span><span class="p">(</span><span class="nv">$options</span><span class="p">[</span><span class="nv">$option</span><span class="p">]))</span> <span class="p">{</span>
<a name="Cloudinary.php-103"></a>            <span class="nv">$value</span> <span class="o">=</span> <span class="nv">$options</span><span class="p">[</span><span class="nv">$option</span><span class="p">];</span>
<a name="Cloudinary.php-104"></a>            <span class="nb">unset</span><span class="p">(</span><span class="nv">$options</span><span class="p">[</span><span class="nv">$option</span><span class="p">]);</span>
<a name="Cloudinary.php-105"></a>            <span class="k">return</span> <span class="nv">$value</span><span class="p">;</span>
<a name="Cloudinary.php-106"></a>        <span class="p">}</span> <span class="k">else</span> <span class="p">{</span>
<a name="Cloudinary.php-107"></a>            <span class="nb">unset</span><span class="p">(</span><span class="nv">$options</span><span class="p">[</span><span class="nv">$option</span><span class="p">]);</span>
<a name="Cloudinary.php-108"></a>            <span class="k">return</span> <span class="nv">$default</span><span class="p">;</span>
<a name="Cloudinary.php-109"></a>        <span class="p">}</span>
<a name="Cloudinary.php-110"></a>    <span class="p">}</span>
<a name="Cloudinary.php-111"></a>
<a name="Cloudinary.php-112"></a>    <span class="k">public</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">build_array</span><span class="p">(</span><span class="nv">$value</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-113"></a>        <span class="k">if</span> <span class="p">(</span><span class="nb">is_array</span><span class="p">(</span><span class="nv">$value</span><span class="p">)</span> <span class="o">&amp;&amp;</span> <span class="o">!</span><span class="nx">Cloudinary</span><span class="o">::</span><span class="na">is_assoc</span><span class="p">(</span><span class="nv">$value</span><span class="p">))</span> <span class="p">{</span>
<a name="Cloudinary.php-114"></a>            <span class="k">return</span> <span class="nv">$value</span><span class="p">;</span>
<a name="Cloudinary.php-115"></a>        <span class="p">}</span> <span class="k">else</span> <span class="k">if</span> <span class="p">(</span><span class="nv">$value</span> <span class="o">===</span> <span class="k">NULL</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-116"></a>            <span class="k">return</span> <span class="k">array</span><span class="p">();</span>
<a name="Cloudinary.php-117"></a>        <span class="p">}</span> <span class="k">else</span> <span class="p">{</span>
<a name="Cloudinary.php-118"></a>            <span class="k">return</span> <span class="k">array</span><span class="p">(</span><span class="nv">$value</span><span class="p">);</span>
<a name="Cloudinary.php-119"></a>        <span class="p">}</span>
<a name="Cloudinary.php-120"></a>    <span class="p">}</span>
<a name="Cloudinary.php-121"></a>
<a name="Cloudinary.php-122"></a>    <span class="k">public</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">encode_array</span><span class="p">(</span><span class="nv">$array</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-123"></a>      <span class="k">return</span> <span class="nb">implode</span><span class="p">(</span><span class="s2">&quot;,&quot;</span><span class="p">,</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">build_array</span><span class="p">(</span><span class="nv">$array</span><span class="p">));</span>
<a name="Cloudinary.php-124"></a>    <span class="p">}</span>
<a name="Cloudinary.php-125"></a>
<a name="Cloudinary.php-126"></a>    <span class="k">public</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">encode_double_array</span><span class="p">(</span><span class="nv">$array</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-127"></a>      <span class="nv">$array</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">build_array</span><span class="p">(</span><span class="nv">$array</span><span class="p">);</span>
<a name="Cloudinary.php-128"></a>      <span class="k">if</span> <span class="p">(</span><span class="nb">count</span><span class="p">(</span><span class="nv">$array</span><span class="p">)</span> <span class="o">&gt;</span> <span class="mi">0</span> <span class="o">&amp;&amp;</span> <span class="o">!</span><span class="nb">is_array</span><span class="p">(</span><span class="nv">$array</span><span class="p">[</span><span class="mi">0</span><span class="p">]))</span> <span class="p">{</span>
<a name="Cloudinary.php-129"></a>        <span class="k">return</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">encode_array</span><span class="p">(</span><span class="nv">$array</span><span class="p">);</span>
<a name="Cloudinary.php-130"></a>      <span class="p">}</span> <span class="k">else</span> <span class="p">{</span>
<a name="Cloudinary.php-131"></a>        <span class="nv">$array</span> <span class="o">=</span> <span class="nb">array_map</span><span class="p">(</span><span class="s1">&#39;Cloudinary::encode_array&#39;</span><span class="p">,</span> <span class="nv">$array</span><span class="p">);</span>
<a name="Cloudinary.php-132"></a>      <span class="p">}</span>
<a name="Cloudinary.php-133"></a>
<a name="Cloudinary.php-134"></a>      <span class="k">return</span> <span class="nb">implode</span><span class="p">(</span><span class="s2">&quot;|&quot;</span><span class="p">,</span> <span class="nv">$array</span><span class="p">);</span>
<a name="Cloudinary.php-135"></a>    <span class="p">}</span>
<a name="Cloudinary.php-136"></a>
<a name="Cloudinary.php-137"></a>    <span class="k">public</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">encode_assoc_array</span><span class="p">(</span><span class="nv">$array</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-138"></a>      <span class="k">if</span> <span class="p">(</span><span class="nx">Cloudinary</span><span class="o">::</span><span class="na">is_assoc</span><span class="p">(</span><span class="nv">$array</span><span class="p">)){</span>
<a name="Cloudinary.php-139"></a>        <span class="nv">$encoded</span> <span class="o">=</span> <span class="k">array</span><span class="p">();</span>
<a name="Cloudinary.php-140"></a>        <span class="k">foreach</span> <span class="p">(</span><span class="nv">$array</span> <span class="k">as</span> <span class="nv">$key</span> <span class="o">=&gt;</span> <span class="nv">$value</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-141"></a>          <span class="nv">$value</span> <span class="o">=</span> <span class="o">!</span><span class="k">empty</span><span class="p">(</span><span class="nv">$value</span><span class="p">)</span>
<a name="Cloudinary.php-142"></a>            <span class="o">?</span> <span class="nb">preg_replace</span><span class="p">(</span><span class="s1">&#39;/([\|=])/&#39;</span><span class="p">,</span> <span class="s1">&#39;\\\$1&#39;</span><span class="p">,</span> <span class="nv">$value</span><span class="p">)</span>
<a name="Cloudinary.php-143"></a>            <span class="o">:</span> <span class="nv">$value</span><span class="p">;</span>
<a name="Cloudinary.php-144"></a>
<a name="Cloudinary.php-145"></a>          <span class="nb">array_push</span><span class="p">(</span><span class="nv">$encoded</span><span class="p">,</span> <span class="nv">$key</span> <span class="o">.</span> <span class="s1">&#39;=&#39;</span> <span class="o">.</span> <span class="nv">$value</span><span class="p">);</span>
<a name="Cloudinary.php-146"></a>        <span class="p">}</span>
<a name="Cloudinary.php-147"></a>        <span class="k">return</span> <span class="nb">implode</span><span class="p">(</span><span class="s2">&quot;|&quot;</span><span class="p">,</span> <span class="nv">$encoded</span><span class="p">);</span>
<a name="Cloudinary.php-148"></a>      <span class="p">}</span> <span class="k">else</span> <span class="p">{</span>
<a name="Cloudinary.php-149"></a>        <span class="k">return</span> <span class="nv">$array</span><span class="p">;</span>
<a name="Cloudinary.php-150"></a>      <span class="p">}</span>
<a name="Cloudinary.php-151"></a>    <span class="p">}</span>
<a name="Cloudinary.php-152"></a>
<a name="Cloudinary.php-153"></a>    <span class="k">private</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">is_assoc</span><span class="p">(</span><span class="nv">$array</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-154"></a>      <span class="k">if</span> <span class="p">(</span><span class="o">!</span><span class="nb">is_array</span><span class="p">(</span><span class="nv">$array</span><span class="p">))</span> <span class="k">return</span> <span class="k">FALSE</span><span class="p">;</span>
<a name="Cloudinary.php-155"></a>      <span class="k">return</span> <span class="nv">$array</span> <span class="o">!=</span> <span class="nb">array_values</span><span class="p">(</span><span class="nv">$array</span><span class="p">);</span>
<a name="Cloudinary.php-156"></a>    <span class="p">}</span>
<a name="Cloudinary.php-157"></a>
<a name="Cloudinary.php-158"></a>    <span class="k">private</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">generate_base_transformation</span><span class="p">(</span><span class="nv">$base_transformation</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-159"></a>        <span class="nv">$options</span> <span class="o">=</span> <span class="nb">is_array</span><span class="p">(</span><span class="nv">$base_transformation</span><span class="p">)</span> <span class="o">?</span> <span class="nv">$base_transformation</span> <span class="o">:</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;transformation&quot;</span><span class="o">=&gt;</span><span class="nv">$base_transformation</span><span class="p">);</span>
<a name="Cloudinary.php-160"></a>        <span class="k">return</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">generate_transformation_string</span><span class="p">(</span><span class="nv">$options</span><span class="p">);</span>
<a name="Cloudinary.php-161"></a>    <span class="p">}</span>
<a name="Cloudinary.php-162"></a>
<a name="Cloudinary.php-163"></a>    <span class="c1">// Warning: $options are being destructively updated!</span>
<a name="Cloudinary.php-164"></a>    <span class="k">public</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">generate_transformation_string</span><span class="p">(</span><span class="o">&amp;</span><span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Cloudinary.php-165"></a>        <span class="nv">$generate_base_transformation</span> <span class="o">=</span> <span class="s2">&quot;Cloudinary::generate_base_transformation&quot;</span><span class="p">;</span>
<a name="Cloudinary.php-166"></a>        <span class="k">if</span> <span class="p">(</span><span class="nb">is_string</span><span class="p">(</span><span class="nv">$options</span><span class="p">))</span> <span class="p">{</span>
<a name="Cloudinary.php-167"></a>            <span class="k">return</span> <span class="nv">$options</span><span class="p">;</span>
<a name="Cloudinary.php-168"></a>        <span class="p">}</span>
<a name="Cloudinary.php-169"></a>        <span class="k">if</span> <span class="p">(</span><span class="nv">$options</span> <span class="o">==</span> <span class="nb">array_values</span><span class="p">(</span><span class="nv">$options</span><span class="p">))</span> <span class="p">{</span>
<a name="Cloudinary.php-170"></a>            <span class="k">return</span> <span class="nb">implode</span><span class="p">(</span><span class="s2">&quot;/&quot;</span><span class="p">,</span> <span class="nb">array_map</span><span class="p">(</span><span class="nv">$generate_base_transformation</span><span class="p">,</span> <span class="nv">$options</span><span class="p">));</span>
<a name="Cloudinary.php-171"></a>        <span class="p">}</span>
<a name="Cloudinary.php-172"></a>
<a name="Cloudinary.php-173"></a>        <span class="nv">$responsive_width</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;responsive_width&quot;</span><span class="p">,</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">config_get</span><span class="p">(</span><span class="s2">&quot;responsive_width&quot;</span><span class="p">));</span>
<a name="Cloudinary.php-174"></a>
<a name="Cloudinary.php-175"></a>        <span class="nv">$size</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;size&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-176"></a>        <span class="k">if</span> <span class="p">(</span><span class="nv">$size</span><span class="p">)</span> <span class="k">list</span><span class="p">(</span><span class="nv">$options</span><span class="p">[</span><span class="s2">&quot;width&quot;</span><span class="p">],</span> <span class="nv">$options</span><span class="p">[</span><span class="s2">&quot;height&quot;</span><span class="p">])</span> <span class="o">=</span> <span class="nb">preg_split</span><span class="p">(</span><span class="s2">&quot;/x/&quot;</span><span class="p">,</span> <span class="nv">$size</span><span class="p">);</span>
<a name="Cloudinary.php-177"></a>
<a name="Cloudinary.php-178"></a>        <span class="nv">$width</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;width&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-179"></a>        <span class="nv">$height</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;height&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-180"></a>
<a name="Cloudinary.php-181"></a>        <span class="nv">$has_layer</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;underlay&quot;</span><span class="p">)</span> <span class="o">||</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;overlay&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-182"></a>        <span class="nv">$angle</span> <span class="o">=</span> <span class="nb">implode</span><span class="p">(</span><span class="nx">Cloudinary</span><span class="o">::</span><span class="na">build_array</span><span class="p">(</span><span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;angle&quot;</span><span class="p">)),</span> <span class="s2">&quot;.&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-183"></a>        <span class="nv">$crop</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;crop&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-184"></a>
<a name="Cloudinary.php-185"></a>        <span class="nv">$no_html_sizes</span> <span class="o">=</span> <span class="nv">$has_layer</span> <span class="o">||</span> <span class="o">!</span><span class="k">empty</span><span class="p">(</span><span class="nv">$angle</span><span class="p">)</span> <span class="o">||</span> <span class="nv">$crop</span> <span class="o">==</span> <span class="s2">&quot;fit&quot;</span> <span class="o">||</span> <span class="nv">$crop</span> <span class="o">==</span> <span class="s2">&quot;limit&quot;</span> <span class="o">||</span> <span class="nv">$responsive_width</span><span class="p">;</span>
<a name="Cloudinary.php-186"></a>
<a name="Cloudinary.php-187"></a>        <span class="k">if</span> <span class="p">(</span><span class="nb">strlen</span><span class="p">(</span><span class="nv">$width</span><span class="p">)</span> <span class="o">==</span> <span class="mi">0</span> <span class="o">||</span> <span class="nv">$width</span> <span class="o">&amp;&amp;</span> <span class="p">(</span><span class="nb">substr</span><span class="p">(</span><span class="nv">$width</span><span class="p">,</span> <span class="mi">0</span><span class="p">,</span> <span class="mi">4</span><span class="p">)</span> <span class="o">==</span> <span class="s2">&quot;auto&quot;</span> <span class="o">||</span> <span class="nb">floatval</span><span class="p">(</span><span class="nv">$width</span><span class="p">)</span> <span class="o">&lt;</span> <span class="mi">1</span> <span class="o">||</span> <span class="nv">$no_html_sizes</span><span class="p">))</span> <span class="nb">unset</span><span class="p">(</span><span class="nv">$options</span><span class="p">[</span><span class="s2">&quot;width&quot;</span><span class="p">]);</span>
<a name="Cloudinary.php-188"></a>        <span class="k">if</span> <span class="p">(</span><span class="nb">strlen</span><span class="p">(</span><span class="nv">$height</span><span class="p">)</span> <span class="o">==</span> <span class="mi">0</span> <span class="o">||</span> <span class="nv">$height</span> <span class="o">&amp;&amp;</span> <span class="p">(</span><span class="nb">floatval</span><span class="p">(</span><span class="nv">$height</span><span class="p">)</span> <span class="o">&lt;</span> <span class="mi">1</span> <span class="o">||</span> <span class="nv">$no_html_sizes</span><span class="p">))</span> <span class="nb">unset</span><span class="p">(</span><span class="nv">$options</span><span class="p">[</span><span class="s2">&quot;height&quot;</span><span class="p">]);</span>
<a name="Cloudinary.php-189"></a>
<a name="Cloudinary.php-190"></a>        <span class="nv">$background</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;background&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-191"></a>        <span class="k">if</span> <span class="p">(</span><span class="nv">$background</span><span class="p">)</span> <span class="nv">$background</span> <span class="o">=</span> <span class="nb">preg_replace</span><span class="p">(</span><span class="s2">&quot;/^#/&quot;</span><span class="p">,</span> <span class="s1">&#39;rgb:&#39;</span><span class="p">,</span> <span class="nv">$background</span><span class="p">);</span>
<a name="Cloudinary.php-192"></a>        <span class="nv">$color</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;color&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-193"></a>        <span class="k">if</span> <span class="p">(</span><span class="nv">$color</span><span class="p">)</span> <span class="nv">$color</span> <span class="o">=</span> <span class="nb">preg_replace</span><span class="p">(</span><span class="s2">&quot;/^#/&quot;</span><span class="p">,</span> <span class="s1">&#39;rgb:&#39;</span><span class="p">,</span> <span class="nv">$color</span><span class="p">);</span>
<a name="Cloudinary.php-194"></a>
<a name="Cloudinary.php-195"></a>        <span class="nv">$base_transformations</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">build_array</span><span class="p">(</span><span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;transformation&quot;</span><span class="p">));</span>
<a name="Cloudinary.php-196"></a>        <span class="k">if</span> <span class="p">(</span><span class="nb">count</span><span class="p">(</span><span class="nb">array_filter</span><span class="p">(</span><span class="nv">$base_transformations</span><span class="p">,</span> <span class="s2">&quot;is_array&quot;</span><span class="p">))</span> <span class="o">&gt;</span> <span class="mi">0</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-197"></a>            <span class="nv">$base_transformations</span> <span class="o">=</span> <span class="nb">array_map</span><span class="p">(</span><span class="nv">$generate_base_transformation</span><span class="p">,</span> <span class="nv">$base_transformations</span><span class="p">);</span>
<a name="Cloudinary.php-198"></a>            <span class="nv">$named_transformation</span> <span class="o">=</span> <span class="s2">&quot;&quot;</span><span class="p">;</span>
<a name="Cloudinary.php-199"></a>        <span class="p">}</span> <span class="k">else</span> <span class="p">{</span>
<a name="Cloudinary.php-200"></a>            <span class="nv">$named_transformation</span> <span class="o">=</span> <span class="nb">implode</span><span class="p">(</span><span class="s2">&quot;.&quot;</span><span class="p">,</span> <span class="nv">$base_transformations</span><span class="p">);</span>
<a name="Cloudinary.php-201"></a>            <span class="nv">$base_transformations</span> <span class="o">=</span> <span class="k">array</span><span class="p">();</span>
<a name="Cloudinary.php-202"></a>        <span class="p">}</span>
<a name="Cloudinary.php-203"></a>
<a name="Cloudinary.php-204"></a>        <span class="nv">$effect</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;effect&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-205"></a>        <span class="k">if</span> <span class="p">(</span><span class="nb">is_array</span><span class="p">(</span><span class="nv">$effect</span><span class="p">))</span> <span class="nv">$effect</span> <span class="o">=</span> <span class="nb">implode</span><span class="p">(</span><span class="s2">&quot;:&quot;</span><span class="p">,</span> <span class="nv">$effect</span><span class="p">);</span>
<a name="Cloudinary.php-206"></a>
<a name="Cloudinary.php-207"></a>        <span class="nv">$border</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">process_border</span><span class="p">(</span><span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;border&quot;</span><span class="p">));</span>
<a name="Cloudinary.php-208"></a>
<a name="Cloudinary.php-209"></a>        <span class="nv">$flags</span> <span class="o">=</span> <span class="nb">implode</span><span class="p">(</span><span class="nx">Cloudinary</span><span class="o">::</span><span class="na">build_array</span><span class="p">(</span><span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;flags&quot;</span><span class="p">)),</span> <span class="s2">&quot;.&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-210"></a>        <span class="nv">$dpr</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;dpr&quot;</span><span class="p">,</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">config_get</span><span class="p">(</span><span class="s2">&quot;dpr&quot;</span><span class="p">));</span>
<a name="Cloudinary.php-211"></a>
<a name="Cloudinary.php-212"></a>        <span class="nv">$duration</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">norm_range_value</span><span class="p">(</span><span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;duration&quot;</span><span class="p">));</span>
<a name="Cloudinary.php-213"></a>        <span class="nv">$start_offset</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">norm_range_value</span><span class="p">(</span><span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;start_offset&quot;</span><span class="p">));</span>
<a name="Cloudinary.php-214"></a>        <span class="nv">$end_offset</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">norm_range_value</span><span class="p">(</span><span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;end_offset&quot;</span><span class="p">));</span>
<a name="Cloudinary.php-215"></a>        <span class="nv">$offset</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">split_range</span><span class="p">(</span><span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;offset&quot;</span><span class="p">));</span>
<a name="Cloudinary.php-216"></a>        <span class="k">if</span> <span class="p">(</span><span class="o">!</span><span class="k">empty</span><span class="p">(</span><span class="nv">$offset</span><span class="p">))</span> <span class="p">{</span>
<a name="Cloudinary.php-217"></a>            <span class="nv">$start_offset</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">norm_range_value</span><span class="p">(</span><span class="nv">$offset</span><span class="p">[</span><span class="mi">0</span><span class="p">]);</span>
<a name="Cloudinary.php-218"></a>            <span class="nv">$end_offset</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">norm_range_value</span><span class="p">(</span><span class="nv">$offset</span><span class="p">[</span><span class="mi">1</span><span class="p">]);</span>
<a name="Cloudinary.php-219"></a>        <span class="p">}</span>
<a name="Cloudinary.php-220"></a>
<a name="Cloudinary.php-221"></a>        <span class="nv">$video_codec</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">process_video_codec_param</span><span class="p">(</span><span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;video_codec&quot;</span><span class="p">));</span>
<a name="Cloudinary.php-222"></a>
<a name="Cloudinary.php-223"></a>        <span class="nv">$overlay</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">process_layer</span><span class="p">(</span><span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;overlay&quot;</span><span class="p">),</span> <span class="s2">&quot;overlay&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-224"></a>        <span class="nv">$underlay</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">process_layer</span><span class="p">(</span><span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;underlay&quot;</span><span class="p">),</span> <span class="s2">&quot;underlay&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-225"></a>        <span class="nv">$if</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">process_if</span><span class="p">(</span><span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;if&quot;</span><span class="p">));</span>
<a name="Cloudinary.php-226"></a>
<a name="Cloudinary.php-227"></a>        <span class="nv">$aspect_ratio</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;aspect_ratio&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-228"></a>        <span class="nv">$opacity</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;opacity&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-229"></a>        <span class="nv">$quality</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;quality&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-230"></a>        <span class="nv">$radius</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;radius&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-231"></a>        <span class="nv">$x</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;x&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-232"></a>        <span class="nv">$y</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;y&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-233"></a>        <span class="nv">$zoom</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;zoom&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-234"></a>
<a name="Cloudinary.php-235"></a>        <span class="nv">$params</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span>
<a name="Cloudinary.php-236"></a>          <span class="s2">&quot;a&quot;</span>   <span class="o">=&gt;</span> <span class="nx">self</span><span class="o">::</span><span class="na">normalize_expression</span><span class="p">(</span><span class="nv">$angle</span><span class="p">),</span>
<a name="Cloudinary.php-237"></a>          <span class="s2">&quot;ar&quot;</span>  <span class="o">=&gt;</span> <span class="nx">self</span><span class="o">::</span><span class="na">normalize_expression</span><span class="p">(</span><span class="nv">$aspect_ratio</span><span class="p">),</span>
<a name="Cloudinary.php-238"></a>          <span class="s2">&quot;b&quot;</span>   <span class="o">=&gt;</span> <span class="nv">$background</span><span class="p">,</span>
<a name="Cloudinary.php-239"></a>          <span class="s2">&quot;bo&quot;</span>  <span class="o">=&gt;</span> <span class="nv">$border</span><span class="p">,</span>
<a name="Cloudinary.php-240"></a>          <span class="s2">&quot;c&quot;</span>   <span class="o">=&gt;</span> <span class="nv">$crop</span><span class="p">,</span>
<a name="Cloudinary.php-241"></a>          <span class="s2">&quot;co&quot;</span>  <span class="o">=&gt;</span> <span class="nv">$color</span><span class="p">,</span>
<a name="Cloudinary.php-242"></a>          <span class="s2">&quot;dpr&quot;</span> <span class="o">=&gt;</span> <span class="nx">self</span><span class="o">::</span><span class="na">normalize_expression</span><span class="p">(</span><span class="nv">$dpr</span><span class="p">),</span>
<a name="Cloudinary.php-243"></a>          <span class="s2">&quot;du&quot;</span>  <span class="o">=&gt;</span> <span class="nv">$duration</span><span class="p">,</span>
<a name="Cloudinary.php-244"></a>          <span class="s2">&quot;e&quot;</span>   <span class="o">=&gt;</span> <span class="nx">self</span><span class="o">::</span><span class="na">normalize_expression</span><span class="p">(</span><span class="nv">$effect</span><span class="p">),</span>
<a name="Cloudinary.php-245"></a>          <span class="s2">&quot;eo&quot;</span>  <span class="o">=&gt;</span> <span class="nv">$end_offset</span><span class="p">,</span>
<a name="Cloudinary.php-246"></a>          <span class="s2">&quot;fl&quot;</span>  <span class="o">=&gt;</span> <span class="nv">$flags</span><span class="p">,</span>
<a name="Cloudinary.php-247"></a>          <span class="s2">&quot;h&quot;</span>   <span class="o">=&gt;</span> <span class="nx">self</span><span class="o">::</span><span class="na">normalize_expression</span><span class="p">(</span><span class="nv">$height</span><span class="p">),</span>
<a name="Cloudinary.php-248"></a>          <span class="s2">&quot;l&quot;</span>   <span class="o">=&gt;</span> <span class="nv">$overlay</span><span class="p">,</span>
<a name="Cloudinary.php-249"></a>          <span class="s2">&quot;o&quot;</span> <span class="o">=&gt;</span> <span class="nx">self</span><span class="o">::</span><span class="na">normalize_expression</span><span class="p">(</span><span class="nv">$opacity</span><span class="p">),</span>
<a name="Cloudinary.php-250"></a>          <span class="s2">&quot;q&quot;</span>  <span class="o">=&gt;</span> <span class="nx">self</span><span class="o">::</span><span class="na">normalize_expression</span><span class="p">(</span><span class="nv">$quality</span><span class="p">),</span>
<a name="Cloudinary.php-251"></a>          <span class="s2">&quot;r&quot;</span>  <span class="o">=&gt;</span> <span class="nx">self</span><span class="o">::</span><span class="na">normalize_expression</span><span class="p">(</span><span class="nv">$radius</span><span class="p">),</span>
<a name="Cloudinary.php-252"></a>          <span class="s2">&quot;so&quot;</span>  <span class="o">=&gt;</span> <span class="nv">$start_offset</span><span class="p">,</span>
<a name="Cloudinary.php-253"></a>          <span class="s2">&quot;t&quot;</span>   <span class="o">=&gt;</span> <span class="nv">$named_transformation</span><span class="p">,</span>
<a name="Cloudinary.php-254"></a>          <span class="s2">&quot;u&quot;</span>   <span class="o">=&gt;</span> <span class="nv">$underlay</span><span class="p">,</span>
<a name="Cloudinary.php-255"></a>          <span class="s2">&quot;vc&quot;</span>  <span class="o">=&gt;</span> <span class="nv">$video_codec</span><span class="p">,</span>
<a name="Cloudinary.php-256"></a>          <span class="s2">&quot;w&quot;</span>   <span class="o">=&gt;</span> <span class="nx">self</span><span class="o">::</span><span class="na">normalize_expression</span><span class="p">(</span><span class="nv">$width</span><span class="p">),</span>
<a name="Cloudinary.php-257"></a>          <span class="s2">&quot;x&quot;</span>  <span class="o">=&gt;</span> <span class="nx">self</span><span class="o">::</span><span class="na">normalize_expression</span><span class="p">(</span><span class="nv">$x</span><span class="p">),</span>
<a name="Cloudinary.php-258"></a>          <span class="s2">&quot;y&quot;</span>  <span class="o">=&gt;</span> <span class="nx">self</span><span class="o">::</span><span class="na">normalize_expression</span><span class="p">(</span><span class="nv">$y</span><span class="p">),</span>
<a name="Cloudinary.php-259"></a>          <span class="s2">&quot;z&quot;</span>  <span class="o">=&gt;</span> <span class="nx">self</span><span class="o">::</span><span class="na">normalize_expression</span><span class="p">(</span><span class="nv">$zoom</span><span class="p">),</span>
<a name="Cloudinary.php-260"></a>        <span class="p">);</span>
<a name="Cloudinary.php-261"></a>
<a name="Cloudinary.php-262"></a>        <span class="nv">$simple_params</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span>
<a name="Cloudinary.php-263"></a>            <span class="s2">&quot;ac&quot;</span> <span class="o">=&gt;</span> <span class="s2">&quot;audio_codec&quot;</span><span class="p">,</span>
<a name="Cloudinary.php-264"></a>            <span class="s2">&quot;af&quot;</span> <span class="o">=&gt;</span> <span class="s2">&quot;audio_frequency&quot;</span><span class="p">,</span>
<a name="Cloudinary.php-265"></a>            <span class="s2">&quot;br&quot;</span> <span class="o">=&gt;</span> <span class="s2">&quot;bit_rate&quot;</span><span class="p">,</span>
<a name="Cloudinary.php-266"></a>            <span class="s2">&quot;cs&quot;</span> <span class="o">=&gt;</span> <span class="s2">&quot;color_space&quot;</span><span class="p">,</span>
<a name="Cloudinary.php-267"></a>            <span class="s2">&quot;d&quot;</span>  <span class="o">=&gt;</span> <span class="s2">&quot;default_image&quot;</span><span class="p">,</span>
<a name="Cloudinary.php-268"></a>            <span class="s2">&quot;dl&quot;</span> <span class="o">=&gt;</span> <span class="s2">&quot;delay&quot;</span><span class="p">,</span>
<a name="Cloudinary.php-269"></a>            <span class="s2">&quot;dn&quot;</span> <span class="o">=&gt;</span> <span class="s2">&quot;density&quot;</span><span class="p">,</span>
<a name="Cloudinary.php-270"></a>            <span class="s2">&quot;f&quot;</span>  <span class="o">=&gt;</span> <span class="s2">&quot;fetch_format&quot;</span><span class="p">,</span>
<a name="Cloudinary.php-271"></a>            <span class="s2">&quot;g&quot;</span>  <span class="o">=&gt;</span> <span class="s2">&quot;gravity&quot;</span><span class="p">,</span>
<a name="Cloudinary.php-272"></a>            <span class="s2">&quot;p&quot;</span>  <span class="o">=&gt;</span> <span class="s2">&quot;prefix&quot;</span><span class="p">,</span>
<a name="Cloudinary.php-273"></a>            <span class="s2">&quot;pg&quot;</span> <span class="o">=&gt;</span> <span class="s2">&quot;page&quot;</span><span class="p">,</span>
<a name="Cloudinary.php-274"></a>            <span class="s2">&quot;vs&quot;</span> <span class="o">=&gt;</span> <span class="s2">&quot;video_sampling&quot;</span><span class="p">,</span>
<a name="Cloudinary.php-275"></a>        <span class="p">);</span>
<a name="Cloudinary.php-276"></a>
<a name="Cloudinary.php-277"></a>        <span class="k">foreach</span> <span class="p">(</span><span class="nv">$simple_params</span> <span class="k">as</span> <span class="nv">$param</span><span class="o">=&gt;</span><span class="nv">$option</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-278"></a>            <span class="nv">$params</span><span class="p">[</span><span class="nv">$param</span><span class="p">]</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="nv">$option</span><span class="p">);</span>
<a name="Cloudinary.php-279"></a>        <span class="p">}</span>
<a name="Cloudinary.php-280"></a>
<a name="Cloudinary.php-281"></a>        <span class="nv">$variables</span> <span class="o">=</span> <span class="o">!</span><span class="k">empty</span><span class="p">(</span><span class="nv">$options</span><span class="p">[</span><span class="s2">&quot;variables&quot;</span><span class="p">])</span> <span class="o">?</span> <span class="nv">$options</span><span class="p">[</span><span class="s2">&quot;variables&quot;</span><span class="p">]</span> <span class="o">:</span> <span class="p">[];</span>
<a name="Cloudinary.php-282"></a>
<a name="Cloudinary.php-283"></a>        <span class="nv">$var_params</span> <span class="o">=</span> <span class="p">[];</span>
<a name="Cloudinary.php-284"></a>        <span class="k">foreach</span><span class="p">(</span><span class="nv">$options</span> <span class="k">as</span> <span class="nv">$key</span> <span class="o">=&gt;</span> <span class="nv">$value</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-285"></a>          <span class="k">if</span> <span class="p">(</span><span class="nb">preg_match</span><span class="p">(</span><span class="s1">&#39;/^\$/&#39;</span><span class="p">,</span> <span class="nv">$key</span><span class="p">))</span> <span class="p">{</span>
<a name="Cloudinary.php-286"></a>            <span class="nv">$var_params</span><span class="p">[]</span> <span class="o">=</span> <span class="nv">$key</span> <span class="o">.</span> <span class="s1">&#39;_&#39;</span> <span class="o">.</span> <span class="nx">self</span><span class="o">::</span><span class="na">normalize_expression</span><span class="p">((</span><span class="nx">string</span><span class="p">)</span><span class="nv">$value</span><span class="p">);</span>
<a name="Cloudinary.php-287"></a>          <span class="p">}</span>
<a name="Cloudinary.php-288"></a>        <span class="p">}</span>
<a name="Cloudinary.php-289"></a>
<a name="Cloudinary.php-290"></a>        <span class="nb">sort</span><span class="p">(</span><span class="nv">$var_params</span><span class="p">);</span>
<a name="Cloudinary.php-291"></a>
<a name="Cloudinary.php-292"></a>        <span class="k">if</span> <span class="p">(</span><span class="o">!</span><span class="k">empty</span><span class="p">(</span><span class="nv">$variables</span><span class="p">))</span> <span class="p">{</span>
<a name="Cloudinary.php-293"></a>          <span class="k">foreach</span><span class="p">(</span><span class="nv">$variables</span> <span class="k">as</span> <span class="nv">$key</span> <span class="o">=&gt;</span> <span class="nv">$value</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-294"></a>            <span class="nv">$var_params</span><span class="p">[]</span> <span class="o">=</span> <span class="nv">$key</span> <span class="o">.</span> <span class="s1">&#39;_&#39;</span> <span class="o">.</span> <span class="nx">self</span><span class="o">::</span><span class="na">normalize_expression</span><span class="p">((</span><span class="nx">string</span><span class="p">)</span><span class="nv">$value</span><span class="p">);</span>
<a name="Cloudinary.php-295"></a>            <span class="p">}</span>
<a name="Cloudinary.php-296"></a>        <span class="p">}</span>
<a name="Cloudinary.php-297"></a>
<a name="Cloudinary.php-298"></a>        <span class="nv">$variables</span> <span class="o">=</span> <span class="nb">join</span><span class="p">(</span><span class="s1">&#39;,&#39;</span><span class="p">,</span> <span class="nv">$var_params</span><span class="p">);</span>
<a name="Cloudinary.php-299"></a>
<a name="Cloudinary.php-300"></a>
<a name="Cloudinary.php-301"></a>        <span class="nv">$param_filter</span> <span class="o">=</span> <span class="k">function</span><span class="p">(</span><span class="nv">$value</span><span class="p">)</span> <span class="p">{</span> <span class="k">return</span> <span class="nv">$value</span> <span class="o">===</span> <span class="mi">0</span> <span class="o">||</span> <span class="nv">$value</span> <span class="o">===</span> <span class="s1">&#39;0&#39;</span> <span class="o">||</span> <span class="nb">trim</span><span class="p">(</span><span class="nv">$value</span><span class="p">)</span> <span class="o">==</span> <span class="k">true</span><span class="p">;</span> <span class="p">};</span>
<a name="Cloudinary.php-302"></a>        <span class="nv">$params</span> <span class="o">=</span> <span class="nb">array_filter</span><span class="p">(</span><span class="nv">$params</span><span class="p">,</span> <span class="nv">$param_filter</span><span class="p">);</span>
<a name="Cloudinary.php-303"></a>        <span class="nb">ksort</span><span class="p">(</span><span class="nv">$params</span><span class="p">);</span>
<a name="Cloudinary.php-304"></a>        <span class="k">if</span> <span class="p">(</span><span class="nb">isset</span><span class="p">(</span><span class="nv">$if</span><span class="p">))</span> <span class="p">{</span>
<a name="Cloudinary.php-305"></a>            <span class="nv">$if</span> <span class="o">=</span> <span class="s1">&#39;if_&#39;</span> <span class="o">.</span> <span class="nv">$if</span><span class="p">;</span>
<a name="Cloudinary.php-306"></a>        <span class="p">}</span>
<a name="Cloudinary.php-307"></a>        <span class="nv">$join_pair</span> <span class="o">=</span> <span class="k">function</span><span class="p">(</span><span class="nv">$key</span><span class="p">,</span> <span class="nv">$value</span><span class="p">)</span> <span class="p">{</span> <span class="k">return</span> <span class="nv">$key</span> <span class="o">.</span> <span class="s2">&quot;_&quot;</span> <span class="o">.</span> <span class="nv">$value</span><span class="p">;</span> <span class="p">};</span>
<a name="Cloudinary.php-308"></a>        <span class="nv">$transformation</span> <span class="o">=</span> <span class="nb">implode</span><span class="p">(</span><span class="s2">&quot;,&quot;</span><span class="p">,</span> <span class="nb">array_map</span><span class="p">(</span><span class="nv">$join_pair</span><span class="p">,</span> <span class="nb">array_keys</span><span class="p">(</span><span class="nv">$params</span><span class="p">),</span> <span class="nb">array_values</span><span class="p">(</span><span class="nv">$params</span><span class="p">)));</span>
<a name="Cloudinary.php-309"></a>        <span class="nv">$raw_transformation</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;raw_transformation&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-310"></a>        <span class="nv">$transformation</span> <span class="o">=</span> <span class="nb">implode</span><span class="p">(</span><span class="s2">&quot;,&quot;</span><span class="p">,</span> <span class="nb">array_filter</span><span class="p">(</span><span class="k">array</span><span class="p">(</span><span class="nv">$if</span><span class="p">,</span> <span class="nv">$variables</span><span class="p">,</span> <span class="nv">$transformation</span><span class="p">,</span> <span class="nv">$raw_transformation</span><span class="p">)));</span>
<a name="Cloudinary.php-311"></a>        <span class="nb">array_push</span><span class="p">(</span><span class="nv">$base_transformations</span><span class="p">,</span> <span class="nv">$transformation</span><span class="p">);</span>
<a name="Cloudinary.php-312"></a>        <span class="k">if</span> <span class="p">(</span><span class="nv">$responsive_width</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-313"></a>            <span class="nv">$responsive_width_transformation</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">config_get</span><span class="p">(</span><span class="s2">&quot;responsive_width_transformation&quot;</span><span class="p">,</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="nv">$DEFAULT_RESPONSIVE_WIDTH_TRANSFORMATION</span><span class="p">);</span>
<a name="Cloudinary.php-314"></a>            <span class="nb">array_push</span><span class="p">(</span><span class="nv">$base_transformations</span><span class="p">,</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">generate_transformation_string</span><span class="p">(</span><span class="nv">$responsive_width_transformation</span><span class="p">));</span>
<a name="Cloudinary.php-315"></a>        <span class="p">}</span>
<a name="Cloudinary.php-316"></a>        <span class="k">if</span> <span class="p">(</span><span class="nb">substr</span><span class="p">(</span><span class="nv">$width</span><span class="p">,</span> <span class="mi">0</span><span class="p">,</span> <span class="mi">4</span><span class="p">)</span> <span class="o">==</span> <span class="s2">&quot;auto&quot;</span> <span class="o">||</span> <span class="nv">$responsive_width</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-317"></a>            <span class="nv">$options</span><span class="p">[</span><span class="s2">&quot;responsive&quot;</span><span class="p">]</span> <span class="o">=</span> <span class="k">true</span><span class="p">;</span>
<a name="Cloudinary.php-318"></a>        <span class="p">}</span>
<a name="Cloudinary.php-319"></a>        <span class="k">if</span> <span class="p">(</span><span class="nb">substr</span><span class="p">(</span><span class="nv">$dpr</span><span class="p">,</span> <span class="mi">0</span><span class="p">,</span> <span class="mi">4</span><span class="p">)</span> <span class="o">==</span> <span class="s2">&quot;auto&quot;</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-320"></a>            <span class="nv">$options</span><span class="p">[</span><span class="s2">&quot;hidpi&quot;</span><span class="p">]</span> <span class="o">=</span> <span class="k">true</span><span class="p">;</span>
<a name="Cloudinary.php-321"></a>        <span class="p">}</span>
<a name="Cloudinary.php-322"></a>        <span class="k">return</span> <span class="nb">implode</span><span class="p">(</span><span class="s2">&quot;/&quot;</span><span class="p">,</span> <span class="nb">array_filter</span><span class="p">(</span><span class="nv">$base_transformations</span><span class="p">));</span>
<a name="Cloudinary.php-323"></a>    <span class="p">}</span>
<a name="Cloudinary.php-324"></a>
<a name="Cloudinary.php-325"></a>    <span class="k">private</span> <span class="k">static</span> <span class="nv">$LAYER_KEYWORD_PARAMS</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span>
<a name="Cloudinary.php-326"></a>        <span class="s2">&quot;font_weight&quot;</span><span class="o">=&gt;</span><span class="s2">&quot;normal&quot;</span><span class="p">,</span> <span class="s2">&quot;font_style&quot;</span><span class="o">=&gt;</span><span class="s2">&quot;normal&quot;</span><span class="p">,</span> <span class="s2">&quot;text_decoration&quot;</span><span class="o">=&gt;</span><span class="s2">&quot;none&quot;</span><span class="p">,</span> <span class="s2">&quot;text_align&quot;</span><span class="o">=&gt;</span><span class="k">NULL</span><span class="p">,</span> <span class="s2">&quot;stroke&quot;</span><span class="o">=&gt;</span><span class="s2">&quot;none&quot;</span>
<a name="Cloudinary.php-327"></a>    <span class="p">);</span>
<a name="Cloudinary.php-328"></a>
<a name="Cloudinary.php-329"></a>    <span class="k">private</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">text_style</span><span class="p">(</span> <span class="nv">$layer</span><span class="p">,</span> <span class="nv">$layer_parameter</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-330"></a>        <span class="nv">$font_family</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$layer</span><span class="p">,</span> <span class="s2">&quot;font_family&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-331"></a>        <span class="nv">$font_size</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$layer</span><span class="p">,</span> <span class="s2">&quot;font_size&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-332"></a>        <span class="nv">$keywords</span> <span class="o">=</span> <span class="k">array</span><span class="p">();</span>
<a name="Cloudinary.php-333"></a>        <span class="k">foreach</span> <span class="p">(</span><span class="nx">Cloudinary</span><span class="o">::</span><span class="nv">$LAYER_KEYWORD_PARAMS</span> <span class="k">as</span> <span class="nv">$attr</span><span class="o">=&gt;</span><span class="nv">$default_value</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-334"></a>            <span class="nv">$attr_value</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$layer</span><span class="p">,</span> <span class="nv">$attr</span><span class="p">,</span> <span class="nv">$default_value</span><span class="p">);</span>
<a name="Cloudinary.php-335"></a>            <span class="k">if</span> <span class="p">(</span><span class="nv">$attr_value</span> <span class="o">!=</span> <span class="nv">$default_value</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-336"></a>                <span class="nb">array_push</span><span class="p">(</span><span class="nv">$keywords</span><span class="p">,</span> <span class="nv">$attr_value</span><span class="p">);</span>
<a name="Cloudinary.php-337"></a>            <span class="p">}</span>
<a name="Cloudinary.php-338"></a>        <span class="p">}</span>
<a name="Cloudinary.php-339"></a>        <span class="nv">$letter_spacing</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$layer</span><span class="p">,</span> <span class="s2">&quot;letter_spacing&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-340"></a>        <span class="k">if</span> <span class="p">(</span><span class="nv">$letter_spacing</span> <span class="o">!=</span> <span class="k">NULL</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-341"></a>            <span class="nb">array_push</span><span class="p">(</span><span class="nv">$keywords</span><span class="p">,</span> <span class="s2">&quot;letter_spacing_</span><span class="si">$letter_spacing</span><span class="s2">&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-342"></a>        <span class="p">}</span>
<a name="Cloudinary.php-343"></a>        <span class="nv">$line_spacing</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$layer</span><span class="p">,</span> <span class="s2">&quot;line_spacing&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-344"></a>        <span class="k">if</span> <span class="p">(</span><span class="nv">$line_spacing</span> <span class="o">!=</span> <span class="k">NULL</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-345"></a>            <span class="nb">array_push</span><span class="p">(</span><span class="nv">$keywords</span><span class="p">,</span> <span class="s2">&quot;line_spacing_</span><span class="si">$line_spacing</span><span class="s2">&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-346"></a>        <span class="p">}</span>
<a name="Cloudinary.php-347"></a>        <span class="nv">$has_text_options</span> <span class="o">=</span> <span class="nv">$font_size</span> <span class="o">!=</span> <span class="k">NULL</span> <span class="o">||</span> <span class="nv">$font_family</span> <span class="o">!=</span> <span class="k">NULL</span> <span class="o">||</span> <span class="o">!</span><span class="k">empty</span><span class="p">(</span><span class="nv">$keywords</span><span class="p">);</span>
<a name="Cloudinary.php-348"></a>        <span class="k">if</span> <span class="p">(</span><span class="o">!</span><span class="nv">$has_text_options</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-349"></a>            <span class="k">return</span> <span class="k">NULL</span><span class="p">;</span>
<a name="Cloudinary.php-350"></a>        <span class="p">}</span>
<a name="Cloudinary.php-351"></a>        <span class="k">if</span> <span class="p">(</span><span class="nv">$font_family</span> <span class="o">==</span> <span class="k">NULL</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-352"></a>            <span class="k">throw</span> <span class="k">new</span> <span class="nx">InvalidArgumentException</span><span class="p">(</span><span class="s2">&quot;Must supply font_family for text in </span><span class="si">$layer_parameter</span><span class="s2">&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-353"></a>        <span class="p">}</span>
<a name="Cloudinary.php-354"></a>        <span class="k">if</span> <span class="p">(</span><span class="nv">$font_size</span> <span class="o">==</span> <span class="k">NULL</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-355"></a>            <span class="k">throw</span> <span class="k">new</span> <span class="nx">InvalidArgumentException</span><span class="p">(</span><span class="s2">&quot;Must supply font_size for text in </span><span class="si">$layer_parameter</span><span class="s2">&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-356"></a>        <span class="p">}</span>
<a name="Cloudinary.php-357"></a>        <span class="nb">array_unshift</span><span class="p">(</span><span class="nv">$keywords</span><span class="p">,</span> <span class="nv">$font_size</span><span class="p">);</span>
<a name="Cloudinary.php-358"></a>        <span class="nb">array_unshift</span><span class="p">(</span><span class="nv">$keywords</span><span class="p">,</span> <span class="nv">$font_family</span><span class="p">);</span>
<a name="Cloudinary.php-359"></a>        <span class="k">return</span> <span class="nb">implode</span><span class="p">(</span><span class="s2">&quot;_&quot;</span><span class="p">,</span> <span class="nb">array_filter</span><span class="p">(</span><span class="nv">$keywords</span><span class="p">,</span> <span class="s1">&#39;Cloudinary::is_not_null&#39;</span><span class="p">));</span>
<a name="Cloudinary.php-360"></a>    <span class="p">}</span>
<a name="Cloudinary.php-361"></a>
<a name="Cloudinary.php-362"></a>    <span class="sd">/**</span>
<a name="Cloudinary.php-363"></a><span class="sd">     * Handle overlays.</span>
<a name="Cloudinary.php-364"></a><span class="sd">     * Overlay properties can came as array or as string.</span>
<a name="Cloudinary.php-365"></a><span class="sd">     * @param $layer</span>
<a name="Cloudinary.php-366"></a><span class="sd">     * @param $layer_parameter</span>
<a name="Cloudinary.php-367"></a><span class="sd">     * @return string</span>
<a name="Cloudinary.php-368"></a><span class="sd">     */</span>
<a name="Cloudinary.php-369"></a>    <span class="k">private</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">process_layer</span><span class="p">(</span><span class="nv">$layer</span><span class="p">,</span> <span class="nv">$layer_parameter</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-370"></a>       <span class="c1">// When overlay is array.</span>
<a name="Cloudinary.php-371"></a>       <span class="k">if</span> <span class="p">(</span><span class="nb">is_array</span><span class="p">(</span><span class="nv">$layer</span><span class="p">))</span> <span class="p">{</span>
<a name="Cloudinary.php-372"></a>            <span class="nv">$resource_type</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$layer</span><span class="p">,</span> <span class="s2">&quot;resource_type&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-373"></a>            <span class="nv">$type</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$layer</span><span class="p">,</span> <span class="s2">&quot;type&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-374"></a>            <span class="nv">$text</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$layer</span><span class="p">,</span> <span class="s2">&quot;text&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-375"></a>            <span class="nv">$fetch</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$layer</span><span class="p">,</span> <span class="s2">&quot;fetch&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-376"></a>            <span class="nv">$text_style</span> <span class="o">=</span> <span class="k">NULL</span><span class="p">;</span>
<a name="Cloudinary.php-377"></a>            <span class="nv">$public_id</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$layer</span><span class="p">,</span> <span class="s2">&quot;public_id&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-378"></a>            <span class="nv">$format</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$layer</span><span class="p">,</span> <span class="s2">&quot;format&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-379"></a>            <span class="nv">$components</span> <span class="o">=</span> <span class="k">array</span><span class="p">();</span>
<a name="Cloudinary.php-380"></a>
<a name="Cloudinary.php-381"></a>            <span class="k">if</span> <span class="p">(</span><span class="nv">$public_id</span> <span class="o">!=</span> <span class="k">NULL</span><span class="p">){</span>
<a name="Cloudinary.php-382"></a>                <span class="nv">$public_id</span> <span class="o">=</span> <span class="nb">str_replace</span><span class="p">(</span><span class="s2">&quot;/&quot;</span><span class="p">,</span> <span class="s2">&quot;:&quot;</span><span class="p">,</span> <span class="nv">$public_id</span><span class="p">);</span>
<a name="Cloudinary.php-383"></a>                <span class="k">if</span><span class="p">(</span><span class="nv">$format</span> <span class="o">!=</span> <span class="k">NULL</span><span class="p">)</span> <span class="nv">$public_id</span> <span class="o">=</span> <span class="nv">$public_id</span> <span class="o">.</span> <span class="s2">&quot;.&quot;</span> <span class="o">.</span> <span class="nv">$format</span><span class="p">;</span>
<a name="Cloudinary.php-384"></a>            <span class="p">}</span>
<a name="Cloudinary.php-385"></a>
<a name="Cloudinary.php-386"></a>           <span class="c1">// Fetch overlay.</span>
<a name="Cloudinary.php-387"></a>           <span class="k">if</span> <span class="p">(</span><span class="o">!</span><span class="k">empty</span><span class="p">(</span><span class="nv">$fetch</span><span class="p">)</span> <span class="o">||</span> <span class="nv">$resource_type</span> <span class="o">===</span> <span class="s2">&quot;fetch&quot;</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-388"></a>             <span class="nv">$public_id</span> <span class="o">=</span> <span class="k">NULL</span><span class="p">;</span>
<a name="Cloudinary.php-389"></a>             <span class="nv">$resource_type</span> <span class="o">=</span> <span class="s2">&quot;fetch&quot;</span><span class="p">;</span>
<a name="Cloudinary.php-390"></a>             <span class="nv">$fetch</span> <span class="o">=</span> <span class="nb">base64_encode</span><span class="p">(</span><span class="nv">$fetch</span><span class="p">);</span>
<a name="Cloudinary.php-391"></a>           <span class="p">}</span>
<a name="Cloudinary.php-392"></a>
<a name="Cloudinary.php-393"></a>           <span class="c1">// Text overlay.</span>
<a name="Cloudinary.php-394"></a>           <span class="k">elseif</span> <span class="p">(</span><span class="o">!</span><span class="k">empty</span><span class="p">(</span><span class="nv">$text</span><span class="p">)</span> <span class="o">||</span> <span class="nv">$resource_type</span> <span class="o">===</span> <span class="s2">&quot;text&quot;</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-395"></a>             <span class="nv">$resource_type</span> <span class="o">=</span> <span class="s2">&quot;text&quot;</span><span class="p">;</span>
<a name="Cloudinary.php-396"></a>             <span class="nv">$type</span> <span class="o">=</span> <span class="k">NULL</span><span class="p">;</span> <span class="c1">// type is ignored for text layers</span>
<a name="Cloudinary.php-397"></a>             <span class="nv">$text_style</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">text_style</span><span class="p">(</span><span class="nv">$layer</span><span class="p">,</span> <span class="nv">$layer_parameter</span><span class="p">);</span> <span class="c1">#FIXME duplicate</span>
<a name="Cloudinary.php-398"></a>             <span class="k">if</span> <span class="p">(</span><span class="nv">$text</span> <span class="o">!=</span> <span class="k">NULL</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-399"></a>               <span class="k">if</span> <span class="p">(</span><span class="o">!</span><span class="p">(</span><span class="nv">$public_id</span> <span class="o">!=</span> <span class="k">NULL</span> <span class="k">xor</span> <span class="nv">$text_style</span> <span class="o">!=</span> <span class="k">NULL</span><span class="p">))</span> <span class="p">{</span>
<a name="Cloudinary.php-400"></a>                 <span class="k">throw</span> <span class="k">new</span> <span class="nx">InvalidArgumentException</span><span class="p">(</span><span class="s2">&quot;Must supply either style parameters or a public_id when providing text parameter in a text </span><span class="si">$layer_parameter</span><span class="s2">&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-401"></a>               <span class="p">}</span>
<a name="Cloudinary.php-402"></a>               <span class="nv">$escaped</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">smart_escape</span><span class="p">(</span><span class="nv">$text</span><span class="p">);</span>
<a name="Cloudinary.php-403"></a>               <span class="nv">$escaped</span> <span class="o">=</span> <span class="nb">str_replace</span><span class="p">(</span><span class="s2">&quot;%2C&quot;</span><span class="p">,</span> <span class="s2">&quot;%252C&quot;</span><span class="p">,</span> <span class="nv">$escaped</span><span class="p">);</span>
<a name="Cloudinary.php-404"></a>               <span class="nv">$escaped</span> <span class="o">=</span> <span class="nb">str_replace</span><span class="p">(</span><span class="s2">&quot;/&quot;</span><span class="p">,</span> <span class="s2">&quot;%252F&quot;</span><span class="p">,</span> <span class="nv">$escaped</span><span class="p">);</span>
<a name="Cloudinary.php-405"></a>                 <span class="c1"># Don&#39;t encode interpolation expressions e.g. $(variable)</span>
<a name="Cloudinary.php-406"></a>                 <span class="nb">preg_match_all</span><span class="p">(</span><span class="s1">&#39;/\$\([a-zA-Z]\w+\)/&#39;</span><span class="p">,</span> <span class="nv">$text</span><span class="p">,</span> <span class="nv">$matches</span><span class="p">);</span>
<a name="Cloudinary.php-407"></a>                 <span class="k">foreach</span> <span class="p">(</span><span class="nv">$matches</span><span class="p">[</span><span class="mi">0</span><span class="p">]</span> <span class="k">as</span> <span class="nv">$match</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-408"></a>                     <span class="nv">$escaped_match</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">smart_escape</span><span class="p">(</span><span class="nv">$match</span><span class="p">);</span>
<a name="Cloudinary.php-409"></a>                     <span class="nv">$escaped</span> <span class="o">=</span> <span class="nb">str_replace</span><span class="p">(</span><span class="nv">$escaped_match</span><span class="p">,</span> <span class="nv">$match</span><span class="p">,</span> <span class="nv">$escaped</span><span class="p">);</span>
<a name="Cloudinary.php-410"></a>                 <span class="p">}</span>
<a name="Cloudinary.php-411"></a>
<a name="Cloudinary.php-412"></a>                 <span class="nv">$text</span> <span class="o">=</span> <span class="nv">$escaped</span><span class="p">;</span>
<a name="Cloudinary.php-413"></a>             <span class="p">}</span>
<a name="Cloudinary.php-414"></a>           <span class="p">}</span> <span class="k">else</span> <span class="p">{</span>
<a name="Cloudinary.php-415"></a>             <span class="k">if</span> <span class="p">(</span><span class="nv">$public_id</span> <span class="o">==</span> <span class="k">NULL</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-416"></a>               <span class="k">throw</span> <span class="k">new</span> <span class="nx">InvalidArgumentException</span><span class="p">(</span><span class="s2">&quot;Must supply public_id for </span><span class="si">$resource_type</span><span class="s2"> </span><span class="si">$layer_parameter</span><span class="s2">&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-417"></a>             <span class="p">}</span>
<a name="Cloudinary.php-418"></a>             <span class="k">if</span> <span class="p">(</span><span class="nv">$resource_type</span> <span class="o">==</span> <span class="s2">&quot;subtitles&quot;</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-419"></a>               <span class="nv">$text_style</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">text_style</span><span class="p">(</span><span class="nv">$layer</span><span class="p">,</span> <span class="nv">$layer_parameter</span><span class="p">);</span>
<a name="Cloudinary.php-420"></a>             <span class="p">}</span>
<a name="Cloudinary.php-421"></a>           <span class="p">}</span>
<a name="Cloudinary.php-422"></a>
<a name="Cloudinary.php-423"></a>            <span class="c1">// Build a components array.</span>
<a name="Cloudinary.php-424"></a>            <span class="k">if</span><span class="p">(</span><span class="nv">$resource_type</span> <span class="o">!=</span> <span class="s2">&quot;image&quot;</span><span class="p">)</span> <span class="nb">array_push</span><span class="p">(</span><span class="nv">$components</span><span class="p">,</span> <span class="nv">$resource_type</span><span class="p">);</span>
<a name="Cloudinary.php-425"></a>            <span class="k">if</span><span class="p">(</span><span class="nv">$type</span> <span class="o">!=</span> <span class="s2">&quot;upload&quot;</span><span class="p">)</span> <span class="nb">array_push</span><span class="p">(</span><span class="nv">$components</span><span class="p">,</span> <span class="nv">$type</span><span class="p">);</span>
<a name="Cloudinary.php-426"></a>            <span class="nb">array_push</span><span class="p">(</span><span class="nv">$components</span><span class="p">,</span> <span class="nv">$text_style</span><span class="p">);</span>
<a name="Cloudinary.php-427"></a>            <span class="nb">array_push</span><span class="p">(</span><span class="nv">$components</span><span class="p">,</span> <span class="nv">$public_id</span><span class="p">);</span>
<a name="Cloudinary.php-428"></a>            <span class="nb">array_push</span><span class="p">(</span><span class="nv">$components</span><span class="p">,</span> <span class="nv">$text</span><span class="p">);</span>
<a name="Cloudinary.php-429"></a>            <span class="nb">array_push</span><span class="p">(</span><span class="nv">$components</span><span class="p">,</span> <span class="nv">$fetch</span><span class="p">);</span>
<a name="Cloudinary.php-430"></a>
<a name="Cloudinary.php-431"></a>            <span class="c1">// Build a valid overlay string.</span>
<a name="Cloudinary.php-432"></a>            <span class="nv">$layer</span> <span class="o">=</span> <span class="nb">implode</span><span class="p">(</span><span class="s2">&quot;:&quot;</span><span class="p">,</span> <span class="nb">array_filter</span><span class="p">(</span><span class="nv">$components</span><span class="p">,</span> <span class="s1">&#39;Cloudinary::is_not_null&#39;</span><span class="p">));</span>
<a name="Cloudinary.php-433"></a>        <span class="p">}</span>
<a name="Cloudinary.php-434"></a>
<a name="Cloudinary.php-435"></a>        <span class="c1">// Handle fetch overlay from string definition.</span>
<a name="Cloudinary.php-436"></a>        <span class="k">elseif</span> <span class="p">(</span><span class="nb">substr</span><span class="p">(</span><span class="nv">$layer</span><span class="p">,</span> <span class="mi">0</span><span class="p">,</span> <span class="nb">strlen</span><span class="p">(</span><span class="s1">&#39;fetch:&#39;</span><span class="p">))</span> <span class="o">===</span> <span class="s1">&#39;fetch:&#39;</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-437"></a>          <span class="nv">$url</span> <span class="o">=</span> <span class="nb">substr</span><span class="p">(</span><span class="nv">$layer</span><span class="p">,</span> <span class="nb">strlen</span><span class="p">(</span><span class="s1">&#39;fetch:&#39;</span><span class="p">));</span>
<a name="Cloudinary.php-438"></a>          <span class="nv">$b64</span> <span class="o">=</span> <span class="nb">base64_encode</span><span class="p">(</span><span class="nv">$url</span><span class="p">);</span>
<a name="Cloudinary.php-439"></a>          <span class="nv">$layer</span> <span class="o">=</span> <span class="s1">&#39;fetch:&#39;</span> <span class="o">.</span> <span class="nv">$b64</span><span class="p">;</span>
<a name="Cloudinary.php-440"></a>        <span class="p">}</span>
<a name="Cloudinary.php-441"></a>
<a name="Cloudinary.php-442"></a>        <span class="k">return</span> <span class="nv">$layer</span><span class="p">;</span>
<a name="Cloudinary.php-443"></a>    <span class="p">}</span>
<a name="Cloudinary.php-444"></a>
<a name="Cloudinary.php-445"></a>    <span class="k">private</span> <span class="k">static</span> <span class="nv">$CONDITIONAL_OPERATORS</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span>
<a name="Cloudinary.php-446"></a>        <span class="s2">&quot;=&quot;</span> <span class="o">=&gt;</span> <span class="s1">&#39;eq&#39;</span><span class="p">,</span>
<a name="Cloudinary.php-447"></a>        <span class="s2">&quot;!=&quot;</span> <span class="o">=&gt;</span> <span class="s1">&#39;ne&#39;</span><span class="p">,</span>
<a name="Cloudinary.php-448"></a>        <span class="s2">&quot;&lt;&quot;</span> <span class="o">=&gt;</span> <span class="s1">&#39;lt&#39;</span><span class="p">,</span>
<a name="Cloudinary.php-449"></a>        <span class="s2">&quot;&gt;&quot;</span> <span class="o">=&gt;</span> <span class="s1">&#39;gt&#39;</span><span class="p">,</span>
<a name="Cloudinary.php-450"></a>        <span class="s2">&quot;&lt;=&quot;</span> <span class="o">=&gt;</span> <span class="s1">&#39;lte&#39;</span><span class="p">,</span>
<a name="Cloudinary.php-451"></a>        <span class="s2">&quot;&gt;=&quot;</span> <span class="o">=&gt;</span> <span class="s1">&#39;gte&#39;</span><span class="p">,</span>
<a name="Cloudinary.php-452"></a>        <span class="s2">&quot;&amp;&amp;&quot;</span> <span class="o">=&gt;</span> <span class="s1">&#39;and&#39;</span><span class="p">,</span>
<a name="Cloudinary.php-453"></a>        <span class="s2">&quot;||&quot;</span> <span class="o">=&gt;</span> <span class="s1">&#39;or&#39;</span><span class="p">,</span>
<a name="Cloudinary.php-454"></a>        <span class="s2">&quot;*&quot;</span> <span class="o">=&gt;</span> <span class="s1">&#39;mul&#39;</span><span class="p">,</span>
<a name="Cloudinary.php-455"></a>        <span class="s2">&quot;/&quot;</span> <span class="o">=&gt;</span> <span class="s1">&#39;div&#39;</span><span class="p">,</span>
<a name="Cloudinary.php-456"></a>        <span class="s2">&quot;+&quot;</span> <span class="o">=&gt;</span> <span class="s1">&#39;add&#39;</span><span class="p">,</span>
<a name="Cloudinary.php-457"></a>        <span class="s2">&quot;-&quot;</span> <span class="o">=&gt;</span> <span class="s1">&#39;sub&#39;</span>
<a name="Cloudinary.php-458"></a>    <span class="p">);</span>
<a name="Cloudinary.php-459"></a>    <span class="k">private</span> <span class="k">static</span> <span class="nv">$PREDEFINED_VARS</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span>
<a name="Cloudinary.php-460"></a>        <span class="s2">&quot;aspect_ratio&quot;</span> <span class="o">=&gt;</span> <span class="s2">&quot;ar&quot;</span><span class="p">,</span>
<a name="Cloudinary.php-461"></a>        <span class="s2">&quot;current_page&quot;</span> <span class="o">=&gt;</span> <span class="s2">&quot;cp&quot;</span><span class="p">,</span>
<a name="Cloudinary.php-462"></a>        <span class="s2">&quot;face_count&quot;</span> <span class="o">=&gt;</span> <span class="s2">&quot;fc&quot;</span><span class="p">,</span>
<a name="Cloudinary.php-463"></a>        <span class="s2">&quot;height&quot;</span> <span class="o">=&gt;</span> <span class="s2">&quot;h&quot;</span><span class="p">,</span>
<a name="Cloudinary.php-464"></a>        <span class="s2">&quot;initial_aspect_ratio&quot;</span> <span class="o">=&gt;</span> <span class="s2">&quot;iar&quot;</span><span class="p">,</span>
<a name="Cloudinary.php-465"></a>        <span class="s2">&quot;initial_height&quot;</span> <span class="o">=&gt;</span> <span class="s2">&quot;ih&quot;</span><span class="p">,</span>
<a name="Cloudinary.php-466"></a>        <span class="s2">&quot;initial_width&quot;</span> <span class="o">=&gt;</span> <span class="s2">&quot;iw&quot;</span><span class="p">,</span>
<a name="Cloudinary.php-467"></a>        <span class="s2">&quot;page_count&quot;</span> <span class="o">=&gt;</span> <span class="s2">&quot;pc&quot;</span><span class="p">,</span>
<a name="Cloudinary.php-468"></a>        <span class="s2">&quot;page_x&quot;</span> <span class="o">=&gt;</span> <span class="s2">&quot;px&quot;</span><span class="p">,</span>
<a name="Cloudinary.php-469"></a>        <span class="s2">&quot;page_y&quot;</span> <span class="o">=&gt;</span> <span class="s2">&quot;py&quot;</span><span class="p">,</span>
<a name="Cloudinary.php-470"></a>        <span class="s2">&quot;tags&quot;</span> <span class="o">=&gt;</span> <span class="s2">&quot;tags&quot;</span><span class="p">,</span>
<a name="Cloudinary.php-471"></a>        <span class="s2">&quot;width&quot;</span> <span class="o">=&gt;</span> <span class="s2">&quot;w&quot;</span>
<a name="Cloudinary.php-472"></a>    <span class="p">);</span>
<a name="Cloudinary.php-473"></a>
<a name="Cloudinary.php-474"></a>    <span class="k">private</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">translate_if</span><span class="p">(</span> <span class="nv">$source</span> <span class="p">)</span>
<a name="Cloudinary.php-475"></a>    <span class="p">{</span>
<a name="Cloudinary.php-476"></a>        <span class="k">if</span> <span class="p">(</span><span class="nb">isset</span><span class="p">(</span><span class="nx">self</span><span class="o">::</span><span class="nv">$CONDITIONAL_OPERATORS</span><span class="p">[</span><span class="nv">$source</span><span class="p">[</span><span class="mi">0</span><span class="p">]]))</span> <span class="p">{</span>
<a name="Cloudinary.php-477"></a>            <span class="k">return</span> <span class="nx">self</span><span class="o">::</span><span class="nv">$CONDITIONAL_OPERATORS</span><span class="p">[</span><span class="nv">$source</span><span class="p">[</span><span class="mi">0</span><span class="p">]];</span>
<a name="Cloudinary.php-478"></a>        <span class="p">}</span> <span class="k">elseif</span> <span class="p">(</span><span class="nb">isset</span><span class="p">(</span><span class="nx">self</span><span class="o">::</span><span class="nv">$PREDEFINED_VARS</span><span class="p">[</span><span class="nv">$source</span><span class="p">[</span><span class="mi">0</span><span class="p">]]))</span> <span class="p">{</span>
<a name="Cloudinary.php-479"></a>            <span class="k">return</span> <span class="nx">self</span><span class="o">::</span><span class="nv">$PREDEFINED_VARS</span><span class="p">[</span><span class="nv">$source</span><span class="p">[</span><span class="mi">0</span><span class="p">]];</span>
<a name="Cloudinary.php-480"></a>        <span class="p">}</span> <span class="k">else</span> <span class="p">{</span>
<a name="Cloudinary.php-481"></a>            <span class="k">return</span> <span class="nv">$source</span><span class="p">[</span><span class="mi">0</span><span class="p">];</span>
<a name="Cloudinary.php-482"></a>        <span class="p">}</span>
<a name="Cloudinary.php-483"></a>    <span class="p">}</span>
<a name="Cloudinary.php-484"></a>
<a name="Cloudinary.php-485"></a>    <span class="k">private</span> <span class="k">static</span> <span class="nv">$IF_REPLACE_RE</span><span class="p">;</span>
<a name="Cloudinary.php-486"></a>
<a name="Cloudinary.php-487"></a>    <span class="k">private</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">process_if</span><span class="p">(</span><span class="nv">$if</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-488"></a>        <span class="nv">$if</span> <span class="o">=</span> <span class="nx">self</span><span class="o">::</span><span class="na">normalize_expression</span><span class="p">(</span><span class="nv">$if</span><span class="p">);</span>
<a name="Cloudinary.php-489"></a>        <span class="k">return</span> <span class="nv">$if</span><span class="p">;</span>
<a name="Cloudinary.php-490"></a>    <span class="p">}</span>
<a name="Cloudinary.php-491"></a>
<a name="Cloudinary.php-492"></a>    <span class="k">private</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">normalize_expression</span><span class="p">(</span><span class="nv">$exp</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-493"></a>      <span class="k">if</span> <span class="p">(</span><span class="nb">is_float</span><span class="p">(</span><span class="nv">$exp</span><span class="p">))</span> <span class="p">{</span>
<a name="Cloudinary.php-494"></a>          <span class="k">return</span> <span class="nb">number_format</span><span class="p">(</span><span class="nv">$exp</span><span class="p">,</span> <span class="mi">1</span><span class="p">);</span>
<a name="Cloudinary.php-495"></a>      <span class="p">}</span>
<a name="Cloudinary.php-496"></a>      <span class="k">if</span> <span class="p">(</span><span class="nb">preg_match</span><span class="p">(</span><span class="s1">&#39;/^!.+!$/&#39;</span><span class="p">,</span> <span class="nv">$exp</span><span class="p">))</span> <span class="p">{</span>
<a name="Cloudinary.php-497"></a>        <span class="k">return</span> <span class="nv">$exp</span><span class="p">;</span>
<a name="Cloudinary.php-498"></a>      <span class="p">}</span> <span class="k">else</span> <span class="p">{</span>
<a name="Cloudinary.php-499"></a>        <span class="k">if</span> <span class="p">(</span><span class="k">empty</span><span class="p">(</span><span class="nx">self</span><span class="o">::</span><span class="nv">$IF_REPLACE_RE</span><span class="p">))</span> <span class="p">{</span>
<a name="Cloudinary.php-500"></a>          <span class="nx">self</span><span class="o">::</span><span class="nv">$IF_REPLACE_RE</span> <span class="o">=</span> <span class="s1">&#39;/((\|\||&gt;=|&lt;=|&amp;&amp;|!=|&gt;|=|&lt;|\/|\-|\+|\*)(?=[ _])|&#39;</span> <span class="o">.</span> <span class="nb">implode</span><span class="p">(</span><span class="s1">&#39;|&#39;</span><span class="p">,</span> <span class="nb">array_keys</span><span class="p">(</span><span class="nx">self</span><span class="o">::</span><span class="nv">$PREDEFINED_VARS</span><span class="p">))</span> <span class="o">.</span> <span class="s1">&#39;)/&#39;</span><span class="p">;</span>
<a name="Cloudinary.php-501"></a>        <span class="p">}</span>
<a name="Cloudinary.php-502"></a>        <span class="k">if</span> <span class="p">(</span><span class="nb">isset</span><span class="p">(</span><span class="nv">$exp</span><span class="p">))</span> <span class="p">{</span>
<a name="Cloudinary.php-503"></a>          <span class="nv">$exp</span> <span class="o">=</span> <span class="nb">preg_replace</span><span class="p">(</span><span class="s1">&#39;/[ _]+/&#39;</span><span class="p">,</span> <span class="s1">&#39;_&#39;</span><span class="p">,</span> <span class="nv">$exp</span><span class="p">);</span>
<a name="Cloudinary.php-504"></a>          <span class="nv">$exp</span> <span class="o">=</span> <span class="nb">preg_replace_callback</span><span class="p">(</span><span class="nx">self</span><span class="o">::</span><span class="nv">$IF_REPLACE_RE</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;Cloudinary&quot;</span><span class="p">,</span> <span class="s2">&quot;translate_if&quot;</span><span class="p">),</span> <span class="nv">$exp</span><span class="p">);</span>
<a name="Cloudinary.php-505"></a>        <span class="p">}</span>
<a name="Cloudinary.php-506"></a>        <span class="k">return</span> <span class="nv">$exp</span><span class="p">;</span>
<a name="Cloudinary.php-507"></a>      <span class="p">}</span>
<a name="Cloudinary.php-508"></a>
<a name="Cloudinary.php-509"></a>    <span class="p">}</span>
<a name="Cloudinary.php-510"></a>
<a name="Cloudinary.php-511"></a>    <span class="k">private</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">process_border</span><span class="p">(</span><span class="nv">$border</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-512"></a>        <span class="k">if</span> <span class="p">(</span><span class="nb">is_array</span><span class="p">(</span><span class="nv">$border</span><span class="p">))</span> <span class="p">{</span>
<a name="Cloudinary.php-513"></a>          <span class="nv">$border_width</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$border</span><span class="p">,</span> <span class="s2">&quot;width&quot;</span><span class="p">,</span> <span class="s2">&quot;2&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-514"></a>          <span class="nv">$border_color</span> <span class="o">=</span> <span class="nb">preg_replace</span><span class="p">(</span><span class="s2">&quot;/^#/&quot;</span><span class="p">,</span> <span class="s1">&#39;rgb:&#39;</span><span class="p">,</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$border</span><span class="p">,</span> <span class="s2">&quot;color&quot;</span><span class="p">,</span> <span class="s2">&quot;black&quot;</span><span class="p">));</span>
<a name="Cloudinary.php-515"></a>          <span class="nv">$border</span> <span class="o">=</span> <span class="nv">$border_width</span> <span class="o">.</span> <span class="s2">&quot;px_solid_&quot;</span> <span class="o">.</span> <span class="nv">$border_color</span><span class="p">;</span>
<a name="Cloudinary.php-516"></a>        <span class="p">}</span>
<a name="Cloudinary.php-517"></a>        <span class="k">return</span> <span class="nv">$border</span><span class="p">;</span>
<a name="Cloudinary.php-518"></a>    <span class="p">}</span>
<a name="Cloudinary.php-519"></a>
<a name="Cloudinary.php-520"></a>    <span class="k">private</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">split_range</span><span class="p">(</span><span class="nv">$range</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-521"></a>        <span class="k">if</span> <span class="p">(</span><span class="nb">is_array</span><span class="p">(</span><span class="nv">$range</span><span class="p">)</span> <span class="o">&amp;&amp;</span> <span class="nb">count</span><span class="p">(</span><span class="nv">$range</span><span class="p">)</span> <span class="o">&gt;=</span> <span class="mi">2</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-522"></a>            <span class="k">return</span> <span class="k">array</span><span class="p">(</span><span class="nv">$range</span><span class="p">[</span><span class="mi">0</span><span class="p">],</span> <span class="nb">end</span><span class="p">(</span><span class="nv">$range</span><span class="p">));</span>
<a name="Cloudinary.php-523"></a>        <span class="p">}</span> <span class="k">else</span> <span class="k">if</span> <span class="p">(</span><span class="nb">is_string</span><span class="p">(</span><span class="nv">$range</span><span class="p">)</span> <span class="o">&amp;&amp;</span> <span class="nb">preg_match</span><span class="p">(</span><span class="nx">Cloudinary</span><span class="o">::</span><span class="na">RANGE_RE</span><span class="p">,</span> <span class="nv">$range</span><span class="p">)</span> <span class="o">==</span> <span class="mi">1</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-524"></a>            <span class="k">return</span> <span class="nb">explode</span><span class="p">(</span><span class="s2">&quot;..&quot;</span><span class="p">,</span> <span class="nv">$range</span><span class="p">,</span> <span class="mi">2</span><span class="p">);</span>
<a name="Cloudinary.php-525"></a>        <span class="p">}</span> <span class="k">else</span> <span class="p">{</span>
<a name="Cloudinary.php-526"></a>            <span class="k">return</span> <span class="k">NULL</span><span class="p">;</span>
<a name="Cloudinary.php-527"></a>        <span class="p">}</span>
<a name="Cloudinary.php-528"></a>    <span class="p">}</span>
<a name="Cloudinary.php-529"></a>
<a name="Cloudinary.php-530"></a>    <span class="k">private</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">norm_range_value</span><span class="p">(</span><span class="nv">$value</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-531"></a>        <span class="k">if</span> <span class="p">(</span><span class="k">empty</span><span class="p">(</span><span class="nv">$value</span><span class="p">))</span> <span class="p">{</span>
<a name="Cloudinary.php-532"></a>          <span class="k">return</span> <span class="k">NULL</span><span class="p">;</span>
<a name="Cloudinary.php-533"></a>        <span class="p">}</span>
<a name="Cloudinary.php-534"></a>
<a name="Cloudinary.php-535"></a>        <span class="nb">preg_match</span><span class="p">(</span><span class="nx">Cloudinary</span><span class="o">::</span><span class="na">RANGE_VALUE_RE</span><span class="p">,</span> <span class="nv">$value</span><span class="p">,</span> <span class="nv">$matches</span><span class="p">);</span>
<a name="Cloudinary.php-536"></a>
<a name="Cloudinary.php-537"></a>        <span class="k">if</span> <span class="p">(</span><span class="k">empty</span><span class="p">(</span><span class="nv">$matches</span><span class="p">))</span> <span class="p">{</span>
<a name="Cloudinary.php-538"></a>          <span class="k">return</span> <span class="k">NULL</span><span class="p">;</span>
<a name="Cloudinary.php-539"></a>        <span class="p">}</span>
<a name="Cloudinary.php-540"></a>
<a name="Cloudinary.php-541"></a>        <span class="nv">$modifier</span> <span class="o">=</span> <span class="s1">&#39;&#39;</span><span class="p">;</span>
<a name="Cloudinary.php-542"></a>        <span class="k">if</span> <span class="p">(</span><span class="o">!</span><span class="k">empty</span><span class="p">(</span><span class="nv">$matches</span><span class="p">[</span><span class="s1">&#39;modifier&#39;</span><span class="p">]))</span> <span class="p">{</span>
<a name="Cloudinary.php-543"></a>          <span class="nv">$modifier</span> <span class="o">=</span> <span class="s1">&#39;p&#39;</span><span class="p">;</span>
<a name="Cloudinary.php-544"></a>        <span class="p">}</span>
<a name="Cloudinary.php-545"></a>        <span class="k">return</span> <span class="nv">$matches</span><span class="p">[</span><span class="s1">&#39;value&#39;</span><span class="p">]</span> <span class="o">.</span> <span class="nv">$modifier</span><span class="p">;</span>
<a name="Cloudinary.php-546"></a>    <span class="p">}</span>
<a name="Cloudinary.php-547"></a>
<a name="Cloudinary.php-548"></a>    <span class="k">private</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">process_video_codec_param</span><span class="p">(</span><span class="nv">$param</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-549"></a>        <span class="nv">$out_param</span> <span class="o">=</span> <span class="nv">$param</span><span class="p">;</span>
<a name="Cloudinary.php-550"></a>        <span class="k">if</span> <span class="p">(</span><span class="nb">is_array</span><span class="p">(</span><span class="nv">$out_param</span><span class="p">))</span> <span class="p">{</span>
<a name="Cloudinary.php-551"></a>          <span class="nv">$out_param</span> <span class="o">=</span> <span class="nv">$param</span><span class="p">[</span><span class="s1">&#39;codec&#39;</span><span class="p">];</span>
<a name="Cloudinary.php-552"></a>          <span class="k">if</span> <span class="p">(</span><span class="nb">array_key_exists</span><span class="p">(</span><span class="s1">&#39;profile&#39;</span><span class="p">,</span> <span class="nv">$param</span><span class="p">))</span> <span class="p">{</span>
<a name="Cloudinary.php-553"></a>              <span class="nv">$out_param</span> <span class="o">=</span> <span class="nv">$out_param</span> <span class="o">.</span> <span class="s1">&#39;:&#39;</span> <span class="o">.</span> <span class="nv">$param</span><span class="p">[</span><span class="s1">&#39;profile&#39;</span><span class="p">];</span>
<a name="Cloudinary.php-554"></a>              <span class="k">if</span> <span class="p">(</span><span class="nb">array_key_exists</span><span class="p">(</span><span class="s1">&#39;level&#39;</span><span class="p">,</span> <span class="nv">$param</span><span class="p">))</span> <span class="p">{</span>
<a name="Cloudinary.php-555"></a>                  <span class="nv">$out_param</span> <span class="o">=</span> <span class="nv">$out_param</span> <span class="o">.</span> <span class="s1">&#39;:&#39;</span> <span class="o">.</span> <span class="nv">$param</span><span class="p">[</span><span class="s1">&#39;level&#39;</span><span class="p">];</span>
<a name="Cloudinary.php-556"></a>              <span class="p">}</span>
<a name="Cloudinary.php-557"></a>          <span class="p">}</span>
<a name="Cloudinary.php-558"></a>        <span class="p">}</span>
<a name="Cloudinary.php-559"></a>        <span class="k">return</span> <span class="nv">$out_param</span><span class="p">;</span>
<a name="Cloudinary.php-560"></a>    <span class="p">}</span>
<a name="Cloudinary.php-561"></a>
<a name="Cloudinary.php-562"></a>    <span class="c1">// Warning: $options are being destructively updated!</span>
<a name="Cloudinary.php-563"></a>    <span class="k">public</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">cloudinary_url</span><span class="p">(</span><span class="nv">$source</span><span class="p">,</span> <span class="o">&amp;</span><span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Cloudinary.php-564"></a>        <span class="nv">$source</span> <span class="o">=</span> <span class="nx">self</span><span class="o">::</span><span class="na">check_cloudinary_field</span><span class="p">(</span><span class="nv">$source</span><span class="p">,</span> <span class="nv">$options</span><span class="p">);</span>
<a name="Cloudinary.php-565"></a>        <span class="nv">$type</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;type&quot;</span><span class="p">,</span> <span class="s2">&quot;upload&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-566"></a>
<a name="Cloudinary.php-567"></a>        <span class="k">if</span> <span class="p">(</span><span class="nv">$type</span> <span class="o">==</span> <span class="s2">&quot;fetch&quot;</span> <span class="o">&amp;&amp;</span> <span class="o">!</span><span class="nb">isset</span><span class="p">(</span><span class="nv">$options</span><span class="p">[</span><span class="s2">&quot;fetch_format&quot;</span><span class="p">]))</span> <span class="p">{</span>
<a name="Cloudinary.php-568"></a>            <span class="nv">$options</span><span class="p">[</span><span class="s2">&quot;fetch_format&quot;</span><span class="p">]</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;format&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-569"></a>        <span class="p">}</span>
<a name="Cloudinary.php-570"></a>        <span class="nv">$transformation</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">generate_transformation_string</span><span class="p">(</span><span class="nv">$options</span><span class="p">);</span>
<a name="Cloudinary.php-571"></a>
<a name="Cloudinary.php-572"></a>        <span class="nv">$resource_type</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;resource_type&quot;</span><span class="p">,</span> <span class="s2">&quot;image&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-573"></a>        <span class="nv">$version</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;version&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-574"></a>        <span class="nv">$format</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;format&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-575"></a>
<a name="Cloudinary.php-576"></a>        <span class="nv">$cloud_name</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;cloud_name&quot;</span><span class="p">,</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">config_get</span><span class="p">(</span><span class="s2">&quot;cloud_name&quot;</span><span class="p">));</span>
<a name="Cloudinary.php-577"></a>        <span class="k">if</span> <span class="p">(</span><span class="o">!</span><span class="nv">$cloud_name</span><span class="p">)</span> <span class="k">throw</span> <span class="k">new</span> <span class="nx">InvalidArgumentException</span><span class="p">(</span><span class="s2">&quot;Must supply cloud_name in tag or in configuration&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-578"></a>        <span class="nv">$secure</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;secure&quot;</span><span class="p">,</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">config_get</span><span class="p">(</span><span class="s2">&quot;secure&quot;</span><span class="p">));</span>
<a name="Cloudinary.php-579"></a>        <span class="nv">$private_cdn</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;private_cdn&quot;</span><span class="p">,</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">config_get</span><span class="p">(</span><span class="s2">&quot;private_cdn&quot;</span><span class="p">));</span>
<a name="Cloudinary.php-580"></a>        <span class="nv">$secure_distribution</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;secure_distribution&quot;</span><span class="p">,</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">config_get</span><span class="p">(</span><span class="s2">&quot;secure_distribution&quot;</span><span class="p">));</span>
<a name="Cloudinary.php-581"></a>        <span class="nv">$cdn_subdomain</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;cdn_subdomain&quot;</span><span class="p">,</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">config_get</span><span class="p">(</span><span class="s2">&quot;cdn_subdomain&quot;</span><span class="p">));</span>
<a name="Cloudinary.php-582"></a>        <span class="nv">$secure_cdn_subdomain</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;secure_cdn_subdomain&quot;</span><span class="p">,</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">config_get</span><span class="p">(</span><span class="s2">&quot;secure_cdn_subdomain&quot;</span><span class="p">));</span>
<a name="Cloudinary.php-583"></a>        <span class="nv">$cname</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;cname&quot;</span><span class="p">,</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">config_get</span><span class="p">(</span><span class="s2">&quot;cname&quot;</span><span class="p">));</span>
<a name="Cloudinary.php-584"></a>        <span class="nv">$shorten</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;shorten&quot;</span><span class="p">,</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">config_get</span><span class="p">(</span><span class="s2">&quot;shorten&quot;</span><span class="p">));</span>
<a name="Cloudinary.php-585"></a>        <span class="nv">$sign_url</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;sign_url&quot;</span><span class="p">,</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">config_get</span><span class="p">(</span><span class="s2">&quot;sign_url&quot;</span><span class="p">));</span>
<a name="Cloudinary.php-586"></a>        <span class="nv">$api_secret</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;api_secret&quot;</span><span class="p">,</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">config_get</span><span class="p">(</span><span class="s2">&quot;api_secret&quot;</span><span class="p">));</span>
<a name="Cloudinary.php-587"></a>        <span class="nv">$url_suffix</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;url_suffix&quot;</span><span class="p">,</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">config_get</span><span class="p">(</span><span class="s2">&quot;url_suffix&quot;</span><span class="p">));</span>
<a name="Cloudinary.php-588"></a>        <span class="nv">$use_root_path</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;use_root_path&quot;</span><span class="p">,</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">config_get</span><span class="p">(</span><span class="s2">&quot;use_root_path&quot;</span><span class="p">));</span>
<a name="Cloudinary.php-589"></a>        <span class="nv">$auth_token</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;auth_token&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-590"></a>        <span class="k">if</span> <span class="p">(</span><span class="nb">is_array</span><span class="p">(</span><span class="nv">$auth_token</span><span class="p">)</span> <span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-591"></a>        	<span class="nv">$auth_token</span> <span class="o">=</span> <span class="nb">array_merge</span><span class="p">(</span><span class="nx">self</span><span class="o">::</span><span class="na">config_get</span><span class="p">(</span><span class="s2">&quot;auth_token&quot;</span><span class="p">,</span> <span class="k">array</span><span class="p">()),</span> <span class="nv">$auth_token</span><span class="p">);</span>
<a name="Cloudinary.php-592"></a>        <span class="p">}</span> <span class="k">elseif</span> <span class="p">(</span><span class="nb">is_null</span><span class="p">(</span><span class="nv">$auth_token</span><span class="p">))</span> <span class="p">{</span>
<a name="Cloudinary.php-593"></a>        	<span class="nv">$auth_token</span> <span class="o">=</span> <span class="nx">self</span><span class="o">::</span><span class="na">config_get</span><span class="p">(</span><span class="s2">&quot;auth_token&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-594"></a>        <span class="p">}</span>
<a name="Cloudinary.php-595"></a>
<a name="Cloudinary.php-596"></a>        <span class="k">if</span> <span class="p">(</span><span class="o">!</span><span class="nv">$private_cdn</span> <span class="k">and</span> <span class="o">!</span><span class="k">empty</span><span class="p">(</span><span class="nv">$url_suffix</span><span class="p">))</span> <span class="p">{</span>
<a name="Cloudinary.php-597"></a>            <span class="k">throw</span> <span class="k">new</span> <span class="nx">InvalidArgumentException</span><span class="p">(</span><span class="s2">&quot;URL Suffix only supported in private CDN&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-598"></a>        <span class="p">}</span>
<a name="Cloudinary.php-599"></a>
<a name="Cloudinary.php-600"></a>        <span class="k">if</span> <span class="p">(</span><span class="o">!</span><span class="nv">$source</span><span class="p">)</span> <span class="k">return</span> <span class="nv">$source</span><span class="p">;</span>
<a name="Cloudinary.php-601"></a>
<a name="Cloudinary.php-602"></a>        <span class="k">if</span> <span class="p">(</span><span class="nb">preg_match</span><span class="p">(</span><span class="s2">&quot;/^https?:\//i&quot;</span><span class="p">,</span> <span class="nv">$source</span><span class="p">))</span> <span class="p">{</span>
<a name="Cloudinary.php-603"></a>          <span class="k">if</span> <span class="p">(</span><span class="nv">$type</span> <span class="o">==</span> <span class="s2">&quot;upload&quot;</span><span class="p">)</span> <span class="k">return</span> <span class="nv">$source</span><span class="p">;</span>
<a name="Cloudinary.php-604"></a>        <span class="p">}</span>
<a name="Cloudinary.php-605"></a>
<a name="Cloudinary.php-606"></a>        <span class="nv">$resource_type_and_type</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">finalize_resource_type</span><span class="p">(</span><span class="nv">$resource_type</span><span class="p">,</span> <span class="nv">$type</span><span class="p">,</span> <span class="nv">$url_suffix</span><span class="p">,</span> <span class="nv">$use_root_path</span><span class="p">,</span> <span class="nv">$shorten</span><span class="p">);</span>
<a name="Cloudinary.php-607"></a>        <span class="nv">$sources</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">finalize_source</span><span class="p">(</span><span class="nv">$source</span><span class="p">,</span> <span class="nv">$format</span><span class="p">,</span> <span class="nv">$url_suffix</span><span class="p">);</span>
<a name="Cloudinary.php-608"></a>        <span class="nv">$source</span> <span class="o">=</span> <span class="nv">$sources</span><span class="p">[</span><span class="s2">&quot;source&quot;</span><span class="p">];</span>
<a name="Cloudinary.php-609"></a>        <span class="nv">$source_to_sign</span> <span class="o">=</span> <span class="nv">$sources</span><span class="p">[</span><span class="s2">&quot;source_to_sign&quot;</span><span class="p">];</span>
<a name="Cloudinary.php-610"></a>
<a name="Cloudinary.php-611"></a>        <span class="k">if</span> <span class="p">(</span><span class="nb">strpos</span><span class="p">(</span><span class="nv">$source_to_sign</span><span class="p">,</span> <span class="s2">&quot;/&quot;</span><span class="p">)</span> <span class="o">&amp;&amp;</span> <span class="o">!</span><span class="nb">preg_match</span><span class="p">(</span><span class="s2">&quot;/^https?:\//&quot;</span><span class="p">,</span> <span class="nv">$source_to_sign</span><span class="p">)</span> <span class="o">&amp;&amp;</span> <span class="o">!</span><span class="nb">preg_match</span><span class="p">(</span><span class="s2">&quot;/^v[0-9]+/&quot;</span><span class="p">,</span> <span class="nv">$source_to_sign</span><span class="p">)</span> <span class="o">&amp;&amp;</span> <span class="k">empty</span><span class="p">(</span><span class="nv">$version</span><span class="p">))</span> <span class="p">{</span>
<a name="Cloudinary.php-612"></a>            <span class="nv">$version</span> <span class="o">=</span> <span class="s2">&quot;1&quot;</span><span class="p">;</span>
<a name="Cloudinary.php-613"></a>        <span class="p">}</span>
<a name="Cloudinary.php-614"></a>        <span class="nv">$version</span> <span class="o">=</span> <span class="nv">$version</span> <span class="o">?</span> <span class="s2">&quot;v&quot;</span> <span class="o">.</span> <span class="nv">$version</span> <span class="o">:</span> <span class="k">NULL</span><span class="p">;</span>
<a name="Cloudinary.php-615"></a>
<a name="Cloudinary.php-616"></a>        <span class="nv">$signature</span> <span class="o">=</span> <span class="k">NULL</span><span class="p">;</span>
<a name="Cloudinary.php-617"></a>        <span class="k">if</span> <span class="p">(</span><span class="nv">$sign_url</span> <span class="o">&amp;&amp;</span> <span class="o">!</span><span class="nv">$auth_token</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-618"></a>          <span class="nv">$to_sign</span> <span class="o">=</span> <span class="nb">implode</span><span class="p">(</span><span class="s2">&quot;/&quot;</span><span class="p">,</span> <span class="nb">array_filter</span><span class="p">(</span><span class="k">array</span><span class="p">(</span><span class="nv">$transformation</span><span class="p">,</span> <span class="nv">$source_to_sign</span><span class="p">)));</span>
<a name="Cloudinary.php-619"></a>          <span class="nv">$signature</span> <span class="o">=</span> <span class="nb">str_replace</span><span class="p">(</span><span class="k">array</span><span class="p">(</span><span class="s1">&#39;+&#39;</span><span class="p">,</span><span class="s1">&#39;/&#39;</span><span class="p">,</span><span class="s1">&#39;=&#39;</span><span class="p">),</span> <span class="k">array</span><span class="p">(</span><span class="s1">&#39;-&#39;</span><span class="p">,</span><span class="s1">&#39;_&#39;</span><span class="p">,</span><span class="s1">&#39;&#39;</span><span class="p">),</span> <span class="nb">base64_encode</span><span class="p">(</span><span class="nb">sha1</span><span class="p">(</span><span class="nv">$to_sign</span> <span class="o">.</span> <span class="nv">$api_secret</span><span class="p">,</span> <span class="k">TRUE</span><span class="p">)));</span>
<a name="Cloudinary.php-620"></a>          <span class="nv">$signature</span> <span class="o">=</span> <span class="s1">&#39;s--&#39;</span> <span class="o">.</span> <span class="nb">substr</span><span class="p">(</span><span class="nv">$signature</span><span class="p">,</span> <span class="mi">0</span><span class="p">,</span> <span class="mi">8</span><span class="p">)</span> <span class="o">.</span> <span class="s1">&#39;--&#39;</span><span class="p">;</span>
<a name="Cloudinary.php-621"></a>        <span class="p">}</span>
<a name="Cloudinary.php-622"></a>
<a name="Cloudinary.php-623"></a>        <span class="nv">$prefix</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">unsigned_download_url_prefix</span><span class="p">(</span><span class="nv">$source</span><span class="p">,</span> <span class="nv">$cloud_name</span><span class="p">,</span> <span class="nv">$private_cdn</span><span class="p">,</span> <span class="nv">$cdn_subdomain</span><span class="p">,</span> <span class="nv">$secure_cdn_subdomain</span><span class="p">,</span>
<a name="Cloudinary.php-624"></a>          <span class="nv">$cname</span><span class="p">,</span> <span class="nv">$secure</span><span class="p">,</span> <span class="nv">$secure_distribution</span><span class="p">);</span>
<a name="Cloudinary.php-625"></a>
<a name="Cloudinary.php-626"></a>	    <span class="nv">$source</span> <span class="o">=</span> <span class="nb">preg_replace</span><span class="p">(</span> <span class="s2">&quot;/([^:])\/+/&quot;</span><span class="p">,</span> <span class="s2">&quot;$1/&quot;</span><span class="p">,</span> <span class="nb">implode</span><span class="p">(</span> <span class="s2">&quot;/&quot;</span><span class="p">,</span> <span class="nb">array_filter</span><span class="p">(</span> <span class="k">array</span><span class="p">(</span>
<a name="Cloudinary.php-627"></a>		                                                                              <span class="nv">$prefix</span><span class="p">,</span>
<a name="Cloudinary.php-628"></a>		                                                                              <span class="nv">$resource_type_and_type</span><span class="p">,</span>
<a name="Cloudinary.php-629"></a>		                                                                              <span class="nv">$signature</span><span class="p">,</span>
<a name="Cloudinary.php-630"></a>		                                                                              <span class="nv">$transformation</span><span class="p">,</span>
<a name="Cloudinary.php-631"></a>		                                                                              <span class="nv">$version</span><span class="p">,</span>
<a name="Cloudinary.php-632"></a>		                                                                              <span class="nv">$source</span>
<a name="Cloudinary.php-633"></a>	                                                                              <span class="p">)</span> <span class="p">)</span> <span class="p">)</span> <span class="p">);</span>
<a name="Cloudinary.php-634"></a>
<a name="Cloudinary.php-635"></a>	    <span class="k">if</span><span class="p">(</span> <span class="nv">$sign_url</span> <span class="o">&amp;&amp;</span> <span class="nv">$auth_token</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-636"></a>	    	<span class="nv">$path</span> <span class="o">=</span> <span class="nb">parse_url</span><span class="p">(</span><span class="nv">$source</span><span class="p">,</span> <span class="nx">PHP_URL_PATH</span><span class="p">);</span>
<a name="Cloudinary.php-637"></a>	    	<span class="nv">$token</span> <span class="o">=</span> <span class="nx">\Cloudinary\AuthToken</span><span class="o">::</span><span class="na">generate</span><span class="p">(</span><span class="nb">array_merge</span><span class="p">(</span><span class="nv">$auth_token</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span> <span class="s2">&quot;url&quot;</span> <span class="o">=&gt;</span> <span class="nv">$path</span><span class="p">)));</span>
<a name="Cloudinary.php-638"></a>	    	<span class="nv">$source</span> <span class="o">=</span> <span class="nv">$source</span> <span class="o">.</span> <span class="s2">&quot;?&quot;</span> <span class="o">.</span> <span class="nv">$token</span><span class="p">;</span>
<a name="Cloudinary.php-639"></a>	    <span class="p">}</span>
<a name="Cloudinary.php-640"></a>	    <span class="k">return</span> <span class="nv">$source</span><span class="p">;</span>
<a name="Cloudinary.php-641"></a>    <span class="p">}</span>
<a name="Cloudinary.php-642"></a>
<a name="Cloudinary.php-643"></a>    <span class="k">private</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">finalize_source</span><span class="p">(</span><span class="nv">$source</span><span class="p">,</span> <span class="nv">$format</span><span class="p">,</span> <span class="nv">$url_suffix</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-644"></a>      <span class="nv">$source</span> <span class="o">=</span> <span class="nb">preg_replace</span><span class="p">(</span><span class="s1">&#39;/([^:])\/\//&#39;</span><span class="p">,</span> <span class="s1">&#39;$1/&#39;</span><span class="p">,</span> <span class="nv">$source</span><span class="p">);</span>
<a name="Cloudinary.php-645"></a>      <span class="k">if</span> <span class="p">(</span><span class="nb">preg_match</span><span class="p">(</span><span class="s1">&#39;/^https?:\//i&#39;</span><span class="p">,</span> <span class="nv">$source</span><span class="p">))</span> <span class="p">{</span>
<a name="Cloudinary.php-646"></a>        <span class="nv">$source</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">smart_escape</span><span class="p">(</span><span class="nv">$source</span><span class="p">);</span>
<a name="Cloudinary.php-647"></a>        <span class="nv">$source_to_sign</span> <span class="o">=</span> <span class="nv">$source</span><span class="p">;</span>
<a name="Cloudinary.php-648"></a>      <span class="p">}</span> <span class="k">else</span> <span class="p">{</span>
<a name="Cloudinary.php-649"></a>        <span class="nv">$source</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">smart_escape</span><span class="p">(</span><span class="nb">rawurldecode</span><span class="p">(</span><span class="nv">$source</span><span class="p">));</span>
<a name="Cloudinary.php-650"></a>        <span class="nv">$source_to_sign</span> <span class="o">=</span> <span class="nv">$source</span><span class="p">;</span>
<a name="Cloudinary.php-651"></a>        <span class="k">if</span> <span class="p">(</span><span class="o">!</span><span class="k">empty</span><span class="p">(</span><span class="nv">$url_suffix</span><span class="p">))</span> <span class="p">{</span>
<a name="Cloudinary.php-652"></a>          <span class="k">if</span> <span class="p">(</span><span class="nb">preg_match</span><span class="p">(</span><span class="s1">&#39;/[\.\/]/i&#39;</span><span class="p">,</span> <span class="nv">$url_suffix</span><span class="p">))</span> <span class="k">throw</span> <span class="k">new</span> <span class="nx">InvalidArgumentException</span><span class="p">(</span><span class="s2">&quot;url_suffix should not include . or /&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-653"></a>          <span class="nv">$source</span> <span class="o">=</span> <span class="nv">$source</span> <span class="o">.</span> <span class="s1">&#39;/&#39;</span> <span class="o">.</span> <span class="nv">$url_suffix</span><span class="p">;</span>
<a name="Cloudinary.php-654"></a>        <span class="p">}</span>
<a name="Cloudinary.php-655"></a>        <span class="k">if</span> <span class="p">(</span><span class="o">!</span><span class="k">empty</span><span class="p">(</span><span class="nv">$format</span><span class="p">))</span> <span class="p">{</span>
<a name="Cloudinary.php-656"></a>          <span class="nv">$source</span> <span class="o">=</span> <span class="nv">$source</span> <span class="o">.</span> <span class="s1">&#39;.&#39;</span> <span class="o">.</span> <span class="nv">$format</span> <span class="p">;</span>
<a name="Cloudinary.php-657"></a>          <span class="nv">$source_to_sign</span> <span class="o">=</span> <span class="nv">$source_to_sign</span> <span class="o">.</span> <span class="s1">&#39;.&#39;</span> <span class="o">.</span> <span class="nv">$format</span> <span class="p">;</span>
<a name="Cloudinary.php-658"></a>        <span class="p">}</span>
<a name="Cloudinary.php-659"></a>      <span class="p">}</span>
<a name="Cloudinary.php-660"></a>      <span class="k">return</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;source&quot;</span> <span class="o">=&gt;</span> <span class="nv">$source</span><span class="p">,</span> <span class="s2">&quot;source_to_sign&quot;</span> <span class="o">=&gt;</span> <span class="nv">$source_to_sign</span><span class="p">);</span>
<a name="Cloudinary.php-661"></a>    <span class="p">}</span>
<a name="Cloudinary.php-662"></a>
<a name="Cloudinary.php-663"></a>    <span class="k">private</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">finalize_resource_type</span><span class="p">(</span><span class="nv">$resource_type</span><span class="p">,</span> <span class="nv">$type</span><span class="p">,</span> <span class="nv">$url_suffix</span><span class="p">,</span> <span class="nv">$use_root_path</span><span class="p">,</span> <span class="nv">$shorten</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-664"></a>      <span class="k">if</span> <span class="p">(</span><span class="k">empty</span><span class="p">(</span><span class="nv">$type</span><span class="p">))</span> <span class="p">{</span>
<a name="Cloudinary.php-665"></a>        <span class="nv">$type</span> <span class="o">=</span> <span class="s2">&quot;upload&quot;</span><span class="p">;</span>
<a name="Cloudinary.php-666"></a>      <span class="p">}</span>
<a name="Cloudinary.php-667"></a>
<a name="Cloudinary.php-668"></a>      <span class="k">if</span> <span class="p">(</span><span class="o">!</span><span class="k">empty</span><span class="p">(</span><span class="nv">$url_suffix</span><span class="p">))</span> <span class="p">{</span>
<a name="Cloudinary.php-669"></a>        <span class="k">if</span> <span class="p">(</span><span class="nv">$resource_type</span> <span class="o">==</span> <span class="s2">&quot;image&quot;</span> <span class="o">&amp;&amp;</span> <span class="nv">$type</span> <span class="o">==</span> <span class="s2">&quot;upload&quot;</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-670"></a>          <span class="nv">$resource_type</span> <span class="o">=</span> <span class="s2">&quot;images&quot;</span><span class="p">;</span>
<a name="Cloudinary.php-671"></a>          <span class="nv">$type</span> <span class="o">=</span> <span class="k">NULL</span><span class="p">;</span>
<a name="Cloudinary.php-672"></a>        <span class="p">}</span> <span class="k">else</span> <span class="k">if</span> <span class="p">(</span><span class="nv">$resource_type</span> <span class="o">==</span> <span class="s2">&quot;image&quot;</span> <span class="o">&amp;&amp;</span> <span class="nv">$type</span> <span class="o">==</span> <span class="s2">&quot;private&quot;</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-673"></a>          <span class="nv">$resource_type</span> <span class="o">=</span> <span class="s2">&quot;private_images&quot;</span><span class="p">;</span>
<a name="Cloudinary.php-674"></a>          <span class="nv">$type</span> <span class="o">=</span> <span class="k">NULL</span><span class="p">;</span>
<a name="Cloudinary.php-675"></a>        <span class="p">}</span>  <span class="k">else</span> <span class="k">if</span> <span class="p">(</span><span class="nv">$resource_type</span> <span class="o">==</span> <span class="s2">&quot;raw&quot;</span> <span class="o">&amp;&amp;</span> <span class="nv">$type</span> <span class="o">==</span> <span class="s2">&quot;upload&quot;</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-676"></a>          <span class="nv">$resource_type</span> <span class="o">=</span> <span class="s2">&quot;files&quot;</span><span class="p">;</span>
<a name="Cloudinary.php-677"></a>          <span class="nv">$type</span> <span class="o">=</span> <span class="k">NULL</span><span class="p">;</span>
<a name="Cloudinary.php-678"></a>        <span class="p">}</span> <span class="k">else</span> <span class="p">{</span>
<a name="Cloudinary.php-679"></a>          <span class="k">throw</span> <span class="k">new</span> <span class="nx">InvalidArgumentException</span><span class="p">(</span><span class="s2">&quot;URL Suffix only supported for image/upload, image/private and raw/upload&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-680"></a>        <span class="p">}</span>
<a name="Cloudinary.php-681"></a>      <span class="p">}</span>
<a name="Cloudinary.php-682"></a>
<a name="Cloudinary.php-683"></a>      <span class="k">if</span> <span class="p">(</span><span class="nv">$use_root_path</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-684"></a>        <span class="k">if</span> <span class="p">((</span><span class="nv">$resource_type</span> <span class="o">==</span> <span class="s2">&quot;image&quot;</span> <span class="o">&amp;&amp;</span> <span class="nv">$type</span> <span class="o">==</span> <span class="s2">&quot;upload&quot;</span><span class="p">)</span> <span class="o">||</span> <span class="p">(</span><span class="nv">$resource_type</span> <span class="o">==</span> <span class="s2">&quot;images&quot;</span> <span class="o">&amp;&amp;</span> <span class="k">empty</span><span class="p">(</span><span class="nv">$type</span><span class="p">)))</span> <span class="p">{</span>
<a name="Cloudinary.php-685"></a>          <span class="nv">$resource_type</span> <span class="o">=</span> <span class="k">NULL</span><span class="p">;</span>
<a name="Cloudinary.php-686"></a>          <span class="nv">$type</span> <span class="o">=</span> <span class="k">NULL</span><span class="p">;</span>
<a name="Cloudinary.php-687"></a>        <span class="p">}</span> <span class="k">else</span> <span class="p">{</span>
<a name="Cloudinary.php-688"></a>          <span class="k">throw</span> <span class="k">new</span> <span class="nx">InvalidArgumentException</span><span class="p">(</span><span class="s2">&quot;Root path only supported for image/upload&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-689"></a>        <span class="p">}</span>
<a name="Cloudinary.php-690"></a>      <span class="p">}</span>
<a name="Cloudinary.php-691"></a>      <span class="k">if</span> <span class="p">(</span><span class="nv">$shorten</span> <span class="o">&amp;&amp;</span> <span class="nv">$resource_type</span> <span class="o">==</span> <span class="s2">&quot;image&quot;</span> <span class="o">&amp;&amp;</span> <span class="nv">$type</span> <span class="o">==</span> <span class="s2">&quot;upload&quot;</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-692"></a>        <span class="nv">$resource_type</span> <span class="o">=</span> <span class="s2">&quot;iu&quot;</span><span class="p">;</span>
<a name="Cloudinary.php-693"></a>        <span class="nv">$type</span> <span class="o">=</span> <span class="k">NULL</span><span class="p">;</span>
<a name="Cloudinary.php-694"></a>      <span class="p">}</span>
<a name="Cloudinary.php-695"></a>      <span class="nv">$out</span> <span class="o">=</span> <span class="s2">&quot;&quot;</span><span class="p">;</span>
<a name="Cloudinary.php-696"></a>      <span class="k">if</span> <span class="p">(</span><span class="o">!</span><span class="k">empty</span><span class="p">(</span><span class="nv">$resource_type</span><span class="p">))</span> <span class="p">{</span>
<a name="Cloudinary.php-697"></a>        <span class="nv">$out</span> <span class="o">=</span> <span class="nv">$resource_type</span><span class="p">;</span>
<a name="Cloudinary.php-698"></a>      <span class="p">}</span>
<a name="Cloudinary.php-699"></a>      <span class="k">if</span> <span class="p">(</span><span class="o">!</span><span class="k">empty</span><span class="p">(</span><span class="nv">$type</span><span class="p">))</span> <span class="p">{</span>
<a name="Cloudinary.php-700"></a>        <span class="nv">$out</span> <span class="o">=</span> <span class="nv">$out</span> <span class="o">.</span> <span class="s1">&#39;/&#39;</span> <span class="o">.</span> <span class="nv">$type</span><span class="p">;</span>
<a name="Cloudinary.php-701"></a>      <span class="p">}</span>
<a name="Cloudinary.php-702"></a>      <span class="k">return</span> <span class="nv">$out</span><span class="p">;</span>
<a name="Cloudinary.php-703"></a>    <span class="p">}</span>
<a name="Cloudinary.php-704"></a>
<a name="Cloudinary.php-705"></a>    <span class="c1">// cdn_subdomain and secure_cdn_subdomain</span>
<a name="Cloudinary.php-706"></a>    <span class="c1">// 1) Customers in shared distribution (e.g. res.cloudinary.com)</span>
<a name="Cloudinary.php-707"></a>    <span class="c1">//   if cdn_domain is true uses res-[1-5].cloudinary.com for both http and https. Setting secure_cdn_subdomain to false disables this for https.</span>
<a name="Cloudinary.php-708"></a>    <span class="c1">// 2) Customers with private cdn</span>
<a name="Cloudinary.php-709"></a>    <span class="c1">//   if cdn_domain is true uses cloudname-res-[1-5].cloudinary.com for http</span>
<a name="Cloudinary.php-710"></a>    <span class="c1">//   if secure_cdn_domain is true uses cloudname-res-[1-5].cloudinary.com for https (please contact support if you require this)</span>
<a name="Cloudinary.php-711"></a>    <span class="c1">// 3) Customers with cname</span>
<a name="Cloudinary.php-712"></a>    <span class="c1">//   if cdn_domain is true uses a[1-5].cname for http. For https, uses the same naming scheme as 1 for shared distribution and as 2 for private distribution.</span>
<a name="Cloudinary.php-713"></a>    <span class="k">private</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">unsigned_download_url_prefix</span><span class="p">(</span><span class="nv">$source</span><span class="p">,</span> <span class="nv">$cloud_name</span><span class="p">,</span> <span class="nv">$private_cdn</span><span class="p">,</span> <span class="nv">$cdn_subdomain</span><span class="p">,</span> <span class="nv">$secure_cdn_subdomain</span><span class="p">,</span> <span class="nv">$cname</span><span class="p">,</span> <span class="nv">$secure</span><span class="p">,</span> <span class="nv">$secure_distribution</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-714"></a>      <span class="nv">$shared_domain</span> <span class="o">=</span> <span class="o">!</span><span class="nv">$private_cdn</span><span class="p">;</span>
<a name="Cloudinary.php-715"></a>      <span class="nv">$prefix</span> <span class="o">=</span> <span class="k">NULL</span><span class="p">;</span>
<a name="Cloudinary.php-716"></a>      <span class="k">if</span> <span class="p">(</span><span class="nv">$secure</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-717"></a>        <span class="k">if</span> <span class="p">(</span><span class="k">empty</span><span class="p">(</span><span class="nv">$secure_distribution</span><span class="p">)</span> <span class="o">||</span> <span class="nv">$secure_distribution</span> <span class="o">==</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">OLD_AKAMAI_SHARED_CDN</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-718"></a>          <span class="nv">$secure_distribution</span> <span class="o">=</span> <span class="nv">$private_cdn</span> <span class="o">?</span> <span class="nv">$cloud_name</span> <span class="o">.</span> <span class="s1">&#39;-res.cloudinary.com&#39;</span> <span class="o">:</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">SHARED_CDN</span><span class="p">;</span>
<a name="Cloudinary.php-719"></a>        <span class="p">}</span>
<a name="Cloudinary.php-720"></a>
<a name="Cloudinary.php-721"></a>        <span class="k">if</span> <span class="p">(</span><span class="k">empty</span><span class="p">(</span><span class="nv">$shared_domain</span><span class="p">))</span> <span class="p">{</span>
<a name="Cloudinary.php-722"></a>          <span class="nv">$shared_domain</span> <span class="o">=</span> <span class="p">(</span><span class="nv">$secure_distribution</span> <span class="o">==</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">SHARED_CDN</span><span class="p">);</span>
<a name="Cloudinary.php-723"></a>        <span class="p">}</span>
<a name="Cloudinary.php-724"></a>
<a name="Cloudinary.php-725"></a>        <span class="k">if</span> <span class="p">(</span><span class="nb">is_null</span><span class="p">(</span><span class="nv">$secure_cdn_subdomain</span><span class="p">)</span> <span class="o">&amp;&amp;</span> <span class="nv">$shared_domain</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-726"></a>          <span class="nv">$secure_cdn_subdomain</span> <span class="o">=</span> <span class="nv">$cdn_subdomain</span> <span class="p">;</span>
<a name="Cloudinary.php-727"></a>        <span class="p">}</span>
<a name="Cloudinary.php-728"></a>
<a name="Cloudinary.php-729"></a>        <span class="k">if</span> <span class="p">(</span><span class="nv">$secure_cdn_subdomain</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-730"></a>          <span class="nv">$secure_distribution</span> <span class="o">=</span> <span class="nb">str_replace</span><span class="p">(</span><span class="s1">&#39;res.cloudinary.com&#39;</span><span class="p">,</span> <span class="s2">&quot;res-&quot;</span> <span class="o">.</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">domain_shard</span><span class="p">(</span><span class="nv">$source</span><span class="p">)</span> <span class="o">.</span> <span class="s2">&quot;.cloudinary.com&quot;</span><span class="p">,</span> <span class="nv">$secure_distribution</span><span class="p">);</span>
<a name="Cloudinary.php-731"></a>        <span class="p">}</span>
<a name="Cloudinary.php-732"></a>
<a name="Cloudinary.php-733"></a>        <span class="nv">$prefix</span> <span class="o">=</span> <span class="s2">&quot;https://&quot;</span> <span class="o">.</span> <span class="nv">$secure_distribution</span><span class="p">;</span>
<a name="Cloudinary.php-734"></a>      <span class="p">}</span> <span class="k">else</span> <span class="k">if</span> <span class="p">(</span><span class="nv">$cname</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-735"></a>        <span class="nv">$subdomain</span> <span class="o">=</span> <span class="nv">$cdn_subdomain</span> <span class="o">?</span> <span class="s2">&quot;a&quot;</span> <span class="o">.</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">domain_shard</span><span class="p">(</span><span class="nv">$source</span><span class="p">)</span> <span class="o">.</span> <span class="s1">&#39;.&#39;</span> <span class="o">:</span> <span class="s2">&quot;&quot;</span><span class="p">;</span>
<a name="Cloudinary.php-736"></a>        <span class="nv">$prefix</span> <span class="o">=</span> <span class="s2">&quot;http://&quot;</span> <span class="o">.</span> <span class="nv">$subdomain</span> <span class="o">.</span> <span class="nv">$cname</span><span class="p">;</span>
<a name="Cloudinary.php-737"></a>      <span class="p">}</span> <span class="k">else</span> <span class="p">{</span>
<a name="Cloudinary.php-738"></a>        <span class="nv">$host</span> <span class="o">=</span> <span class="nb">implode</span><span class="p">(</span><span class="k">array</span><span class="p">(</span><span class="nv">$private_cdn</span> <span class="o">?</span> <span class="nv">$cloud_name</span> <span class="o">.</span> <span class="s2">&quot;-&quot;</span> <span class="o">:</span> <span class="s2">&quot;&quot;</span><span class="p">,</span> <span class="s2">&quot;res&quot;</span><span class="p">,</span> <span class="nv">$cdn_subdomain</span> <span class="o">?</span> <span class="s2">&quot;-&quot;</span> <span class="o">.</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">domain_shard</span><span class="p">(</span><span class="nv">$source</span><span class="p">)</span> <span class="o">:</span> <span class="s2">&quot;&quot;</span><span class="p">,</span> <span class="s2">&quot;.cloudinary.com&quot;</span><span class="p">));</span>
<a name="Cloudinary.php-739"></a>        <span class="nv">$prefix</span> <span class="o">=</span> <span class="s2">&quot;http://&quot;</span> <span class="o">.</span> <span class="nv">$host</span><span class="p">;</span>
<a name="Cloudinary.php-740"></a>      <span class="p">}</span>
<a name="Cloudinary.php-741"></a>      <span class="k">if</span> <span class="p">(</span><span class="nv">$shared_domain</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-742"></a>        <span class="nv">$prefix</span> <span class="o">=</span> <span class="nv">$prefix</span> <span class="o">.</span> <span class="s1">&#39;/&#39;</span> <span class="o">.</span> <span class="nv">$cloud_name</span><span class="p">;</span>
<a name="Cloudinary.php-743"></a>      <span class="p">}</span>
<a name="Cloudinary.php-744"></a>      <span class="k">return</span> <span class="nv">$prefix</span><span class="p">;</span>
<a name="Cloudinary.php-745"></a>    <span class="p">}</span>
<a name="Cloudinary.php-746"></a>
<a name="Cloudinary.php-747"></a>    <span class="k">private</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">domain_shard</span><span class="p">(</span><span class="nv">$source</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-748"></a>        <span class="k">return</span> <span class="p">(((</span><span class="nb">crc32</span><span class="p">(</span><span class="nv">$source</span><span class="p">)</span> <span class="o">%</span> <span class="mi">5</span><span class="p">)</span> <span class="o">+</span> <span class="mi">5</span><span class="p">)</span> <span class="o">%</span> <span class="mi">5</span> <span class="o">+</span> <span class="mi">1</span><span class="p">);</span>
<a name="Cloudinary.php-749"></a>    <span class="p">}</span>
<a name="Cloudinary.php-750"></a>
<a name="Cloudinary.php-751"></a>    <span class="c1">// [&lt;resource_type&gt;/][&lt;image_type&gt;/][v&lt;version&gt;/]&lt;public_id&gt;[.&lt;format&gt;][#&lt;signature&gt;]</span>
<a name="Cloudinary.php-752"></a>    <span class="c1">// Warning: $options are being destructively updated!</span>
<a name="Cloudinary.php-753"></a>    <span class="k">public</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">check_cloudinary_field</span><span class="p">(</span><span class="nv">$source</span><span class="p">,</span> <span class="o">&amp;</span><span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Cloudinary.php-754"></a>        <span class="nv">$IDENTIFIER_RE</span> <span class="o">=</span> <span class="s2">&quot;~&quot;</span> <span class="o">.</span>
<a name="Cloudinary.php-755"></a>            <span class="s2">&quot;^(?:([^/]+)/)??(?:([^/]+)/)??(?:(?:v(</span><span class="se">\\</span><span class="s2">d+)/)(?:([^#]+)/)?)?&quot;</span> <span class="o">.</span>
<a name="Cloudinary.php-756"></a>            <span class="s2">&quot;([^#/]+?)(?:</span><span class="se">\\</span><span class="s2">.([^.#/]+))?(?:#([^/]+))?$&quot;</span> <span class="o">.</span>
<a name="Cloudinary.php-757"></a>            <span class="s2">&quot;~&quot;</span><span class="p">;</span>
<a name="Cloudinary.php-758"></a>        <span class="nv">$matches</span> <span class="o">=</span> <span class="k">array</span><span class="p">();</span>
<a name="Cloudinary.php-759"></a>        <span class="k">if</span> <span class="p">(</span><span class="o">!</span><span class="p">(</span><span class="nb">is_object</span><span class="p">(</span><span class="nv">$source</span><span class="p">)</span> <span class="o">&amp;&amp;</span> <span class="nb">method_exists</span><span class="p">(</span><span class="nv">$source</span><span class="p">,</span> <span class="s1">&#39;identifier&#39;</span><span class="p">)))</span> <span class="p">{</span>
<a name="Cloudinary.php-760"></a>            <span class="k">return</span> <span class="nv">$source</span><span class="p">;</span>
<a name="Cloudinary.php-761"></a>        <span class="p">}</span>
<a name="Cloudinary.php-762"></a>        <span class="nv">$identifier</span> <span class="o">=</span> <span class="nv">$source</span><span class="o">-&gt;</span><span class="na">identifier</span><span class="p">();</span>
<a name="Cloudinary.php-763"></a>        <span class="k">if</span> <span class="p">(</span><span class="o">!</span><span class="nv">$identifier</span> <span class="o">||</span> <span class="nb">strstr</span><span class="p">(</span><span class="s1">&#39;:&#39;</span><span class="p">,</span> <span class="nv">$identifier</span><span class="p">)</span> <span class="o">!==</span> <span class="k">false</span> <span class="o">||</span> <span class="o">!</span><span class="nb">preg_match</span><span class="p">(</span><span class="nv">$IDENTIFIER_RE</span><span class="p">,</span> <span class="nv">$identifier</span><span class="p">,</span> <span class="nv">$matches</span><span class="p">))</span> <span class="p">{</span>
<a name="Cloudinary.php-764"></a>            <span class="k">return</span> <span class="nv">$source</span><span class="p">;</span>
<a name="Cloudinary.php-765"></a>        <span class="p">}</span>
<a name="Cloudinary.php-766"></a>        <span class="nv">$optionNames</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span><span class="s1">&#39;resource_type&#39;</span><span class="p">,</span> <span class="s1">&#39;type&#39;</span><span class="p">,</span> <span class="s1">&#39;version&#39;</span><span class="p">,</span> <span class="s1">&#39;folder&#39;</span><span class="p">,</span> <span class="s1">&#39;public_id&#39;</span><span class="p">,</span> <span class="s1">&#39;format&#39;</span><span class="p">);</span>
<a name="Cloudinary.php-767"></a>        <span class="k">foreach</span> <span class="p">(</span><span class="nv">$optionNames</span> <span class="k">as</span> <span class="nv">$index</span> <span class="o">=&gt;</span> <span class="nv">$optionName</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-768"></a>            <span class="k">if</span> <span class="p">(</span><span class="o">@</span><span class="nv">$matches</span><span class="p">[</span><span class="nv">$index</span><span class="o">+</span><span class="mi">1</span><span class="p">])</span> <span class="p">{</span>
<a name="Cloudinary.php-769"></a>                <span class="nv">$options</span><span class="p">[</span><span class="nv">$optionName</span><span class="p">]</span> <span class="o">=</span> <span class="nv">$matches</span><span class="p">[</span><span class="nv">$index</span><span class="o">+</span><span class="mi">1</span><span class="p">];</span>
<a name="Cloudinary.php-770"></a>            <span class="p">}</span>
<a name="Cloudinary.php-771"></a>        <span class="p">}</span>
<a name="Cloudinary.php-772"></a>        <span class="k">return</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s1">&#39;public_id&#39;</span><span class="p">);</span>
<a name="Cloudinary.php-773"></a>    <span class="p">}</span>
<a name="Cloudinary.php-774"></a>
<a name="Cloudinary.php-775"></a>    <span class="c1">// Based on http://stackoverflow.com/a/1734255/526985</span>
<a name="Cloudinary.php-776"></a>    <span class="k">private</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">smart_escape</span><span class="p">(</span><span class="nv">$str</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-777"></a>        <span class="nv">$revert</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span><span class="s1">&#39;%21&#39;</span><span class="o">=&gt;</span><span class="s1">&#39;!&#39;</span><span class="p">,</span> <span class="s1">&#39;%2A&#39;</span><span class="o">=&gt;</span><span class="s1">&#39;*&#39;</span><span class="p">,</span> <span class="s1">&#39;%27&#39;</span><span class="o">=&gt;</span><span class="s2">&quot;&#39;&quot;</span><span class="p">,</span> <span class="s1">&#39;%3A&#39;</span><span class="o">=&gt;</span><span class="s1">&#39;:&#39;</span><span class="p">,</span> <span class="s1">&#39;%2F&#39;</span><span class="o">=&gt;</span><span class="s1">&#39;/&#39;</span><span class="p">);</span>
<a name="Cloudinary.php-778"></a>        <span class="k">return</span> <span class="nb">strtr</span><span class="p">(</span><span class="nb">rawurlencode</span><span class="p">(</span><span class="nv">$str</span><span class="p">),</span> <span class="nv">$revert</span><span class="p">);</span>
<a name="Cloudinary.php-779"></a>    <span class="p">}</span>
<a name="Cloudinary.php-780"></a>
<a name="Cloudinary.php-781"></a>    <span class="k">public</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">cloudinary_api_url</span><span class="p">(</span><span class="nv">$action</span> <span class="o">=</span> <span class="s1">&#39;upload&#39;</span><span class="p">,</span> <span class="nv">$options</span> <span class="o">=</span> <span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Cloudinary.php-782"></a>        <span class="nv">$cloudinary</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;upload_prefix&quot;</span><span class="p">,</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">config_get</span><span class="p">(</span><span class="s2">&quot;upload_prefix&quot;</span><span class="p">,</span> <span class="s2">&quot;https://api.cloudinary.com&quot;</span><span class="p">));</span>
<a name="Cloudinary.php-783"></a>        <span class="nv">$cloud_name</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;cloud_name&quot;</span><span class="p">,</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">config_get</span><span class="p">(</span><span class="s2">&quot;cloud_name&quot;</span><span class="p">));</span>
<a name="Cloudinary.php-784"></a>        <span class="k">if</span> <span class="p">(</span><span class="o">!</span><span class="nv">$cloud_name</span><span class="p">)</span> <span class="k">throw</span> <span class="k">new</span> <span class="nx">InvalidArgumentException</span><span class="p">(</span><span class="s2">&quot;Must supply cloud_name in options or in configuration&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-785"></a>        <span class="nv">$resource_type</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;resource_type&quot;</span><span class="p">,</span> <span class="s2">&quot;image&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-786"></a>        <span class="k">return</span> <span class="nb">implode</span><span class="p">(</span><span class="s2">&quot;/&quot;</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="nv">$cloudinary</span><span class="p">,</span> <span class="s2">&quot;v1_1&quot;</span><span class="p">,</span> <span class="nv">$cloud_name</span><span class="p">,</span> <span class="nv">$resource_type</span><span class="p">,</span> <span class="nv">$action</span><span class="p">));</span>
<a name="Cloudinary.php-787"></a>    <span class="p">}</span>
<a name="Cloudinary.php-788"></a>
<a name="Cloudinary.php-789"></a>    <span class="k">public</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">random_public_id</span><span class="p">()</span> <span class="p">{</span>
<a name="Cloudinary.php-790"></a>        <span class="k">return</span> <span class="nb">substr</span><span class="p">(</span><span class="nb">sha1</span><span class="p">(</span><span class="nb">uniqid</span><span class="p">(</span><span class="nx">Cloudinary</span><span class="o">::</span><span class="na">config_get</span><span class="p">(</span><span class="s2">&quot;api_secret&quot;</span><span class="p">,</span> <span class="s2">&quot;&quot;</span><span class="p">)</span> <span class="o">.</span> <span class="nb">mt_rand</span><span class="p">())),</span> <span class="mi">0</span><span class="p">,</span> <span class="mi">16</span><span class="p">);</span>
<a name="Cloudinary.php-791"></a>    <span class="p">}</span>
<a name="Cloudinary.php-792"></a>
<a name="Cloudinary.php-793"></a>    <span class="k">public</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">signed_preloaded_image</span><span class="p">(</span><span class="nv">$result</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-794"></a>        <span class="k">return</span> <span class="nv">$result</span><span class="p">[</span><span class="s2">&quot;resource_type&quot;</span><span class="p">]</span> <span class="o">.</span> <span class="s2">&quot;/upload/v&quot;</span> <span class="o">.</span> <span class="nv">$result</span><span class="p">[</span><span class="s2">&quot;version&quot;</span><span class="p">]</span> <span class="o">.</span> <span class="s2">&quot;/&quot;</span> <span class="o">.</span> <span class="nv">$result</span><span class="p">[</span><span class="s2">&quot;public_id&quot;</span><span class="p">]</span> <span class="o">.</span>
<a name="Cloudinary.php-795"></a>               <span class="p">(</span><span class="nb">isset</span><span class="p">(</span><span class="nv">$result</span><span class="p">[</span><span class="s2">&quot;format&quot;</span><span class="p">])</span> <span class="o">?</span> <span class="s2">&quot;.&quot;</span> <span class="o">.</span> <span class="nv">$result</span><span class="p">[</span><span class="s2">&quot;format&quot;</span><span class="p">]</span> <span class="o">:</span> <span class="s2">&quot;&quot;</span><span class="p">)</span> <span class="o">.</span> <span class="s2">&quot;#&quot;</span> <span class="o">.</span> <span class="nv">$result</span><span class="p">[</span><span class="s2">&quot;signature&quot;</span><span class="p">];</span>
<a name="Cloudinary.php-796"></a>    <span class="p">}</span>
<a name="Cloudinary.php-797"></a>
<a name="Cloudinary.php-798"></a>    <span class="c1"># Utility method that uses the deprecated ZIP download API.</span>
<a name="Cloudinary.php-799"></a>    <span class="c1"># @deprecated Replaced by {download_zip_url} that uses the more advanced and robust archive generation and download API</span>
<a name="Cloudinary.php-800"></a>    <span class="k">public</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">zip_download_url</span><span class="p">(</span><span class="nv">$tag</span><span class="p">,</span> <span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Cloudinary.php-801"></a>        <span class="nv">$params</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;timestamp&quot;</span><span class="o">=&gt;</span><span class="nb">time</span><span class="p">(),</span> <span class="s2">&quot;tag&quot;</span><span class="o">=&gt;</span><span class="nv">$tag</span><span class="p">,</span> <span class="s2">&quot;transformation&quot;</span> <span class="o">=&gt;</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">generate_transformation_string</span><span class="p">(</span><span class="nv">$options</span><span class="p">));</span>
<a name="Cloudinary.php-802"></a>        <span class="nv">$params</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">sign_request</span><span class="p">(</span><span class="nv">$params</span><span class="p">,</span> <span class="nv">$options</span><span class="p">);</span>
<a name="Cloudinary.php-803"></a>        <span class="k">return</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">cloudinary_api_url</span><span class="p">(</span><span class="s2">&quot;download_tag.zip&quot;</span><span class="p">,</span> <span class="nv">$options</span><span class="p">)</span> <span class="o">.</span> <span class="s2">&quot;?&quot;</span> <span class="o">.</span> <span class="nb">http_build_query</span><span class="p">(</span><span class="nv">$params</span><span class="p">);</span>
<a name="Cloudinary.php-804"></a>    <span class="p">}</span>
<a name="Cloudinary.php-805"></a>
<a name="Cloudinary.php-806"></a>
<a name="Cloudinary.php-807"></a>    <span class="c1"># Returns a URL that when invokes creates an archive and returns it.</span>
<a name="Cloudinary.php-808"></a>    <span class="c1"># @param options [Hash]</span>
<a name="Cloudinary.php-809"></a>    <span class="c1"># @option options [String] resource_type  The resource type of files to include in the archive. Must be one of image | video | raw</span>
<a name="Cloudinary.php-810"></a>    <span class="c1"># @option options [String] type (upload) The specific file type of resources upload|private|authenticated</span>
<a name="Cloudinary.php-811"></a>    <span class="c1"># @option options [String|Array] tags (nil) list of tags to include in the archive</span>
<a name="Cloudinary.php-812"></a>    <span class="c1"># @option options [String|Array&lt;String&gt;] public_ids (nil) list of public_ids to include in the archive</span>
<a name="Cloudinary.php-813"></a>    <span class="c1"># @option options [String|Array&lt;String&gt;] prefixes (nil) Optional list of prefixes of public IDs (e.g., folders).</span>
<a name="Cloudinary.php-814"></a>    <span class="c1"># @option options [String|Array&lt;String&gt;] transformations Optional list of transformations.</span>
<a name="Cloudinary.php-815"></a>    <span class="c1">#   The derived images of the given transformations are included in the archive. Using the string representation of</span>
<a name="Cloudinary.php-816"></a>    <span class="c1">#   multiple chained transformations as we use for the &#39;eager&#39; upload parameter.</span>
<a name="Cloudinary.php-817"></a>    <span class="c1"># @option options [String] mode (create) return the generated archive file or to store it as a raw resource and</span>
<a name="Cloudinary.php-818"></a>    <span class="c1">#   return a JSON with URLs for accessing the archive. Possible values download, create</span>
<a name="Cloudinary.php-819"></a>    <span class="c1"># @option options [String] target_format (zip)</span>
<a name="Cloudinary.php-820"></a>    <span class="c1"># @option options [String] target_public_id Optional public ID of the generated raw resource.</span>
<a name="Cloudinary.php-821"></a>    <span class="c1">#   Relevant only for the create mode. If not specified, random public ID is generated.</span>
<a name="Cloudinary.php-822"></a>    <span class="c1"># @option options [boolean] flatten_folders (false) If true, flatten public IDs with folders to be in the root of the archive.</span>
<a name="Cloudinary.php-823"></a>    <span class="c1">#   Add numeric counter to the file name in case of a name conflict.</span>
<a name="Cloudinary.php-824"></a>    <span class="c1"># @option options [boolean] flatten_transformations (false) If true, and multiple transformations are given,</span>
<a name="Cloudinary.php-825"></a>    <span class="c1">#   flatten the folder structure of derived images and store the transformation details on the file name instead.</span>
<a name="Cloudinary.php-826"></a>    <span class="c1"># @option options [boolean] use_original_filename Use the original file name of included images (if available) instead of the public ID.</span>
<a name="Cloudinary.php-827"></a>    <span class="c1"># @option options [boolean] async (false) If true, return immediately and perform the archive creation in the background.</span>
<a name="Cloudinary.php-828"></a>    <span class="c1">#   Relevant only for the create mode.</span>
<a name="Cloudinary.php-829"></a>    <span class="c1"># @option options [String] notification_url Optional URL to send an HTTP post request (webhook) when the archive creation is completed.</span>
<a name="Cloudinary.php-830"></a>    <span class="c1"># @option options [String|Array&lt;String] target_tags Optional array. Allows assigning one or more tag to the generated archive file (for later housekeeping via the admin API).</span>
<a name="Cloudinary.php-831"></a>    <span class="c1"># @option options [String] keep_derived (false) keep the derived images used for generating the archive</span>
<a name="Cloudinary.php-832"></a>    <span class="c1"># @return [String] archive url</span>
<a name="Cloudinary.php-833"></a>    <span class="k">public</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">download_archive_url</span><span class="p">(</span><span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Cloudinary.php-834"></a>        <span class="nv">$options</span><span class="p">[</span><span class="s2">&quot;mode&quot;</span><span class="p">]</span> <span class="o">=</span> <span class="s2">&quot;download&quot;</span><span class="p">;</span>
<a name="Cloudinary.php-835"></a>        <span class="nv">$params</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">build_archive_params</span><span class="p">(</span><span class="nv">$options</span><span class="p">);</span>
<a name="Cloudinary.php-836"></a>        <span class="nv">$params</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">sign_request</span><span class="p">(</span><span class="nv">$params</span><span class="p">,</span> <span class="nv">$options</span><span class="p">);</span>
<a name="Cloudinary.php-837"></a>        <span class="k">return</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">cloudinary_api_url</span><span class="p">(</span><span class="s2">&quot;generate_archive&quot;</span><span class="p">,</span> <span class="nv">$options</span><span class="p">)</span> <span class="o">.</span> <span class="s2">&quot;?&quot;</span> <span class="o">.</span> <span class="nb">preg_replace</span><span class="p">(</span><span class="s2">&quot;/%5B\d+%5D/&quot;</span><span class="p">,</span> <span class="s2">&quot;%5B%5D&quot;</span><span class="p">,</span> <span class="nb">http_build_query</span><span class="p">(</span><span class="nv">$params</span><span class="p">));</span>
<a name="Cloudinary.php-838"></a>    <span class="p">}</span>
<a name="Cloudinary.php-839"></a>
<a name="Cloudinary.php-840"></a>    <span class="c1"># Returns a URL that when invokes creates an zip archive and returns it.</span>
<a name="Cloudinary.php-841"></a>    <span class="c1"># @see download_archive_url</span>
<a name="Cloudinary.php-842"></a>    <span class="k">public</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">download_zip_url</span><span class="p">(</span><span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Cloudinary.php-843"></a>        <span class="nv">$options</span><span class="p">[</span><span class="s2">&quot;target_format&quot;</span><span class="p">]</span> <span class="o">=</span> <span class="s2">&quot;zip&quot;</span><span class="p">;</span>
<a name="Cloudinary.php-844"></a>        <span class="k">return</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">download_archive_url</span><span class="p">(</span><span class="nv">$options</span><span class="p">);</span>
<a name="Cloudinary.php-845"></a>    <span class="p">}</span>
<a name="Cloudinary.php-846"></a>
<a name="Cloudinary.php-847"></a>	<span class="sd">/**</span>
<a name="Cloudinary.php-848"></a><span class="sd">	 *  Generate an authorization token.</span>
<a name="Cloudinary.php-849"></a><span class="sd">	 *  Options:</span>
<a name="Cloudinary.php-850"></a><span class="sd">	 *      string key - the secret key required to sign the token</span>
<a name="Cloudinary.php-851"></a><span class="sd">	 *      string ip - the IP address of the client</span>
<a name="Cloudinary.php-852"></a><span class="sd">	 *      number start_time - the start time of the token in seconds from epoch</span>
<a name="Cloudinary.php-853"></a><span class="sd">	 *      string expiration - the expiration time of the token in seconds from epoch</span>
<a name="Cloudinary.php-854"></a><span class="sd">	 *      string duration - the duration of the token (from start_time)</span>
<a name="Cloudinary.php-855"></a><span class="sd">	 *      string acl - the ACL for the token</span>
<a name="Cloudinary.php-856"></a><span class="sd">	 *      string url - the URL to authentication in case of a URL token</span>
<a name="Cloudinary.php-857"></a><span class="sd">	 *</span>
<a name="Cloudinary.php-858"></a><span class="sd">	 * @param array $options token configuration, merge with the global configuration &quot;auth_token&quot;.</span>
<a name="Cloudinary.php-859"></a><span class="sd">	 * @return string the authorization token</span>
<a name="Cloudinary.php-860"></a><span class="sd">	 */</span>
<a name="Cloudinary.php-861"></a>    <span class="k">public</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">generate_auth_token</span><span class="p">(</span><span class="nv">$options</span><span class="p">){</span>
<a name="Cloudinary.php-862"></a>    	<span class="nv">$token_options</span> <span class="o">=</span> <span class="nb">array_merge</span><span class="p">(</span><span class="nx">self</span><span class="o">::</span><span class="na">config_get</span><span class="p">(</span><span class="s2">&quot;auth_token&quot;</span><span class="p">,</span> <span class="k">array</span><span class="p">()),</span> <span class="nv">$options</span><span class="p">);</span>
<a name="Cloudinary.php-863"></a>    	<span class="k">return</span> <span class="nx">\Cloudinary\AuthToken</span><span class="o">::</span><span class="na">generate</span><span class="p">(</span><span class="nv">$token_options</span><span class="p">);</span>
<a name="Cloudinary.php-864"></a>    <span class="p">}</span>
<a name="Cloudinary.php-865"></a>
<a name="Cloudinary.php-866"></a>    <span class="c1"># Returns a Hash of parameters used to create an archive</span>
<a name="Cloudinary.php-867"></a>    <span class="c1"># @param [Hash] options</span>
<a name="Cloudinary.php-868"></a>    <span class="c1"># @private</span>
<a name="Cloudinary.php-869"></a>    <span class="k">public</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">build_archive_params</span><span class="p">(</span><span class="o">&amp;</span><span class="nv">$options</span><span class="p">)</span>
<a name="Cloudinary.php-870"></a>    <span class="p">{</span>
<a name="Cloudinary.php-871"></a>        <span class="nv">$params</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span>
<a name="Cloudinary.php-872"></a>          <span class="s2">&quot;allow_missing&quot;</span>            <span class="o">=&gt;</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;allow_missing&quot;</span><span class="p">),</span>
<a name="Cloudinary.php-873"></a>          <span class="s2">&quot;async&quot;</span>                    <span class="o">=&gt;</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;async&quot;</span><span class="p">),</span>
<a name="Cloudinary.php-874"></a>          <span class="s2">&quot;expires_at&quot;</span>                <span class="o">=&gt;</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;expires_at&quot;</span><span class="p">),</span>
<a name="Cloudinary.php-875"></a>          <span class="s2">&quot;flatten_folders&quot;</span>          <span class="o">=&gt;</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;flatten_folders&quot;</span><span class="p">),</span>
<a name="Cloudinary.php-876"></a>          <span class="s2">&quot;flatten_transformations&quot;</span>  <span class="o">=&gt;</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;flatten_transformations&quot;</span><span class="p">),</span>
<a name="Cloudinary.php-877"></a>          <span class="s2">&quot;keep_derived&quot;</span>             <span class="o">=&gt;</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;keep_derived&quot;</span><span class="p">),</span>
<a name="Cloudinary.php-878"></a>          <span class="s2">&quot;mode&quot;</span>                     <span class="o">=&gt;</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;mode&quot;</span><span class="p">),</span>
<a name="Cloudinary.php-879"></a>          <span class="s2">&quot;notification_url&quot;</span>         <span class="o">=&gt;</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;notification_url&quot;</span><span class="p">),</span>
<a name="Cloudinary.php-880"></a>          <span class="s2">&quot;phash&quot;</span>                    <span class="o">=&gt;</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;phash&quot;</span><span class="p">),</span>
<a name="Cloudinary.php-881"></a>          <span class="s2">&quot;prefixes&quot;</span>                 <span class="o">=&gt;</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">build_array</span><span class="p">(</span><span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;prefixes&quot;</span><span class="p">)),</span>
<a name="Cloudinary.php-882"></a>          <span class="s2">&quot;public_ids&quot;</span>               <span class="o">=&gt;</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">build_array</span><span class="p">(</span><span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;public_ids&quot;</span><span class="p">)),</span>
<a name="Cloudinary.php-883"></a>          <span class="s2">&quot;skip_transformation_name&quot;</span> <span class="o">=&gt;</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;skip_transformation_name&quot;</span><span class="p">),</span>
<a name="Cloudinary.php-884"></a>          <span class="s2">&quot;tags&quot;</span>                     <span class="o">=&gt;</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">build_array</span><span class="p">(</span><span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;tags&quot;</span><span class="p">)),</span>
<a name="Cloudinary.php-885"></a>          <span class="s2">&quot;target_format&quot;</span>            <span class="o">=&gt;</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;target_format&quot;</span><span class="p">),</span>
<a name="Cloudinary.php-886"></a>          <span class="s2">&quot;target_public_id&quot;</span>         <span class="o">=&gt;</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;target_public_id&quot;</span><span class="p">),</span>
<a name="Cloudinary.php-887"></a>          <span class="s2">&quot;target_tags&quot;</span>              <span class="o">=&gt;</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">build_array</span><span class="p">(</span><span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;target_tags&quot;</span><span class="p">)),</span>
<a name="Cloudinary.php-888"></a>          <span class="s2">&quot;timestamp&quot;</span>                <span class="o">=&gt;</span> <span class="nb">time</span><span class="p">(),</span>
<a name="Cloudinary.php-889"></a>          <span class="s2">&quot;transformations&quot;</span>          <span class="o">=&gt;</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">build_eager</span><span class="p">(</span><span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;transformations&quot;</span><span class="p">)),</span>
<a name="Cloudinary.php-890"></a>          <span class="s2">&quot;type&quot;</span>                     <span class="o">=&gt;</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;type&quot;</span><span class="p">),</span>
<a name="Cloudinary.php-891"></a>          <span class="s2">&quot;use_original_filename&quot;</span>    <span class="o">=&gt;</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;use_original_filename&quot;</span><span class="p">),</span>
<a name="Cloudinary.php-892"></a>        <span class="p">);</span>
<a name="Cloudinary.php-893"></a>        <span class="nb">array_walk</span><span class="p">(</span><span class="nv">$params</span><span class="p">,</span> <span class="k">function</span> <span class="p">(</span><span class="o">&amp;</span><span class="nv">$value</span><span class="p">,</span> <span class="nv">$key</span><span class="p">){</span> <span class="nv">$value</span> <span class="o">=</span> <span class="p">(</span><span class="nb">is_bool</span><span class="p">(</span><span class="nv">$value</span><span class="p">)</span> <span class="o">?</span> <span class="p">(</span><span class="nv">$value</span> <span class="o">?</span> <span class="s2">&quot;1&quot;</span> <span class="o">:</span> <span class="s2">&quot;0&quot;</span><span class="p">)</span> <span class="o">:</span> <span class="nv">$value</span><span class="p">);});</span>
<a name="Cloudinary.php-894"></a>        <span class="k">return</span> <span class="nb">array_filter</span><span class="p">(</span><span class="nv">$params</span><span class="p">,</span><span class="k">function</span><span class="p">(</span><span class="nv">$v</span><span class="p">){</span> <span class="k">return</span> <span class="o">!</span><span class="nb">is_null</span><span class="p">(</span><span class="nv">$v</span><span class="p">)</span> <span class="o">&amp;&amp;</span> <span class="p">(</span><span class="nv">$v</span> <span class="o">!==</span> <span class="s2">&quot;&quot;</span> <span class="p">);});</span>
<a name="Cloudinary.php-895"></a>    <span class="p">}</span>
<a name="Cloudinary.php-896"></a>
<a name="Cloudinary.php-897"></a>    <span class="k">public</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">build_eager</span><span class="p">(</span><span class="nv">$transformations</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-898"></a>        <span class="nv">$eager</span> <span class="o">=</span> <span class="k">array</span><span class="p">();</span>
<a name="Cloudinary.php-899"></a>        <span class="k">foreach</span> <span class="p">(</span><span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">build_array</span><span class="p">(</span><span class="nv">$transformations</span><span class="p">)</span> <span class="k">as</span> <span class="nv">$trans</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-900"></a>            <span class="nv">$transformation</span> <span class="o">=</span> <span class="nv">$trans</span><span class="p">;</span>
<a name="Cloudinary.php-901"></a>            <span class="nv">$format</span> <span class="o">=</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_consume</span><span class="p">(</span><span class="nv">$transformation</span><span class="p">,</span> <span class="s2">&quot;format&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-902"></a>            <span class="nv">$single_eager</span> <span class="o">=</span> <span class="nb">implode</span><span class="p">(</span><span class="s2">&quot;/&quot;</span><span class="p">,</span> <span class="nb">array_filter</span><span class="p">(</span><span class="k">array</span><span class="p">(</span><span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">generate_transformation_string</span><span class="p">(</span><span class="nv">$transformation</span><span class="p">),</span> <span class="nv">$format</span><span class="p">)));</span>
<a name="Cloudinary.php-903"></a>            <span class="nb">array_push</span><span class="p">(</span><span class="nv">$eager</span><span class="p">,</span> <span class="nv">$single_eager</span><span class="p">);</span>
<a name="Cloudinary.php-904"></a>        <span class="p">}</span>
<a name="Cloudinary.php-905"></a>        <span class="k">return</span> <span class="nb">implode</span><span class="p">(</span><span class="s2">&quot;|&quot;</span><span class="p">,</span> <span class="nv">$eager</span><span class="p">);</span>
<a name="Cloudinary.php-906"></a>    <span class="p">}</span>
<a name="Cloudinary.php-907"></a>
<a name="Cloudinary.php-908"></a>    <span class="k">public</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">private_download_url</span><span class="p">(</span><span class="nv">$public_id</span><span class="p">,</span> <span class="nv">$format</span><span class="p">,</span> <span class="nv">$options</span> <span class="o">=</span> <span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Cloudinary.php-909"></a>        <span class="nv">$cloudinary_params</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">sign_request</span><span class="p">(</span><span class="k">array</span><span class="p">(</span>
<a name="Cloudinary.php-910"></a>          <span class="s2">&quot;timestamp&quot;</span>  <span class="o">=&gt;</span> <span class="nb">time</span><span class="p">(),</span>
<a name="Cloudinary.php-911"></a>          <span class="s2">&quot;public_id&quot;</span>  <span class="o">=&gt;</span> <span class="nv">$public_id</span><span class="p">,</span>
<a name="Cloudinary.php-912"></a>          <span class="s2">&quot;format&quot;</span>     <span class="o">=&gt;</span> <span class="nv">$format</span><span class="p">,</span>
<a name="Cloudinary.php-913"></a>          <span class="s2">&quot;type&quot;</span>       <span class="o">=&gt;</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;type&quot;</span><span class="p">),</span>
<a name="Cloudinary.php-914"></a>          <span class="s2">&quot;attachment&quot;</span> <span class="o">=&gt;</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;attachment&quot;</span><span class="p">),</span>
<a name="Cloudinary.php-915"></a>          <span class="s2">&quot;expires_at&quot;</span> <span class="o">=&gt;</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;expires_at&quot;</span><span class="p">)</span>
<a name="Cloudinary.php-916"></a>        <span class="p">),</span> <span class="nv">$options</span><span class="p">);</span>
<a name="Cloudinary.php-917"></a>
<a name="Cloudinary.php-918"></a>        <span class="k">return</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">cloudinary_api_url</span><span class="p">(</span><span class="s2">&quot;download&quot;</span><span class="p">,</span> <span class="nv">$options</span><span class="p">)</span> <span class="o">.</span> <span class="s2">&quot;?&quot;</span> <span class="o">.</span> <span class="nb">http_build_query</span><span class="p">(</span><span class="nv">$cloudinary_params</span><span class="p">);</span>
<a name="Cloudinary.php-919"></a>    <span class="p">}</span>
<a name="Cloudinary.php-920"></a>
<a name="Cloudinary.php-921"></a>    <span class="k">public</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">sign_request</span><span class="p">(</span><span class="nv">$params</span><span class="p">,</span> <span class="o">&amp;</span><span class="nv">$options</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-922"></a>        <span class="nv">$api_key</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;api_key&quot;</span><span class="p">,</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">config_get</span><span class="p">(</span><span class="s2">&quot;api_key&quot;</span><span class="p">));</span>
<a name="Cloudinary.php-923"></a>        <span class="k">if</span> <span class="p">(</span><span class="o">!</span><span class="nv">$api_key</span><span class="p">)</span> <span class="k">throw</span> <span class="k">new</span> <span class="nx">\InvalidArgumentException</span><span class="p">(</span><span class="s2">&quot;Must supply api_key&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-924"></a>        <span class="nv">$api_secret</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;api_secret&quot;</span><span class="p">,</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">config_get</span><span class="p">(</span><span class="s2">&quot;api_secret&quot;</span><span class="p">));</span>
<a name="Cloudinary.php-925"></a>        <span class="k">if</span> <span class="p">(</span><span class="o">!</span><span class="nv">$api_secret</span><span class="p">)</span> <span class="k">throw</span> <span class="k">new</span> <span class="nx">\InvalidArgumentException</span><span class="p">(</span><span class="s2">&quot;Must supply api_secret&quot;</span><span class="p">);</span>
<a name="Cloudinary.php-926"></a>
<a name="Cloudinary.php-927"></a>        <span class="c1"># Remove blank parameters</span>
<a name="Cloudinary.php-928"></a>        <span class="nv">$params</span> <span class="o">=</span> <span class="nb">array_filter</span><span class="p">(</span><span class="nv">$params</span><span class="p">,</span> <span class="k">function</span><span class="p">(</span><span class="nv">$v</span><span class="p">){</span> <span class="k">return</span> <span class="nb">isset</span><span class="p">(</span><span class="nv">$v</span><span class="p">)</span> <span class="o">&amp;&amp;</span> <span class="nv">$v</span> <span class="o">!==</span> <span class="s2">&quot;&quot;</span><span class="p">;});</span>
<a name="Cloudinary.php-929"></a>
<a name="Cloudinary.php-930"></a>        <span class="nv">$params</span><span class="p">[</span><span class="s2">&quot;signature&quot;</span><span class="p">]</span> <span class="o">=</span> <span class="nx">Cloudinary</span><span class="o">::</span><span class="na">api_sign_request</span><span class="p">(</span><span class="nv">$params</span><span class="p">,</span> <span class="nv">$api_secret</span><span class="p">);</span>
<a name="Cloudinary.php-931"></a>        <span class="nv">$params</span><span class="p">[</span><span class="s2">&quot;api_key&quot;</span><span class="p">]</span> <span class="o">=</span> <span class="nv">$api_key</span><span class="p">;</span>
<a name="Cloudinary.php-932"></a>
<a name="Cloudinary.php-933"></a>        <span class="k">return</span> <span class="nv">$params</span><span class="p">;</span>
<a name="Cloudinary.php-934"></a>    <span class="p">}</span>
<a name="Cloudinary.php-935"></a>
<a name="Cloudinary.php-936"></a>    <span class="k">public</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">api_sign_request</span><span class="p">(</span><span class="nv">$params_to_sign</span><span class="p">,</span> <span class="nv">$api_secret</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-937"></a>        <span class="nv">$params</span> <span class="o">=</span> <span class="k">array</span><span class="p">();</span>
<a name="Cloudinary.php-938"></a>        <span class="k">foreach</span> <span class="p">(</span><span class="nv">$params_to_sign</span> <span class="k">as</span> <span class="nv">$param</span> <span class="o">=&gt;</span> <span class="nv">$value</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-939"></a>            <span class="k">if</span> <span class="p">(</span><span class="nb">isset</span><span class="p">(</span><span class="nv">$value</span><span class="p">)</span> <span class="o">&amp;&amp;</span> <span class="nv">$value</span> <span class="o">!==</span> <span class="s2">&quot;&quot;</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-940"></a>                <span class="k">if</span> <span class="p">(</span><span class="o">!</span><span class="nb">is_array</span><span class="p">(</span><span class="nv">$value</span><span class="p">))</span> <span class="p">{</span>
<a name="Cloudinary.php-941"></a>                    <span class="nv">$params</span><span class="p">[</span><span class="nv">$param</span><span class="p">]</span> <span class="o">=</span> <span class="nv">$value</span><span class="p">;</span>
<a name="Cloudinary.php-942"></a>                <span class="p">}</span> <span class="k">else</span> <span class="k">if</span> <span class="p">(</span><span class="nb">count</span><span class="p">(</span><span class="nv">$value</span><span class="p">)</span> <span class="o">&gt;</span> <span class="mi">0</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-943"></a>                    <span class="nv">$params</span><span class="p">[</span><span class="nv">$param</span><span class="p">]</span> <span class="o">=</span> <span class="nb">implode</span><span class="p">(</span><span class="s2">&quot;,&quot;</span><span class="p">,</span> <span class="nv">$value</span><span class="p">);</span>
<a name="Cloudinary.php-944"></a>                <span class="p">}</span>
<a name="Cloudinary.php-945"></a>            <span class="p">}</span>
<a name="Cloudinary.php-946"></a>        <span class="p">}</span>
<a name="Cloudinary.php-947"></a>        <span class="nb">ksort</span><span class="p">(</span><span class="nv">$params</span><span class="p">);</span>
<a name="Cloudinary.php-948"></a>	      <span class="nv">$join_pair</span> <span class="o">=</span> <span class="k">function</span><span class="p">(</span><span class="nv">$key</span><span class="p">,</span> <span class="nv">$value</span><span class="p">)</span> <span class="p">{</span> <span class="k">return</span> <span class="nv">$key</span> <span class="o">.</span> <span class="s2">&quot;=&quot;</span> <span class="o">.</span> <span class="nv">$value</span><span class="p">;</span> <span class="p">};</span>
<a name="Cloudinary.php-949"></a>        <span class="nv">$to_sign</span> <span class="o">=</span> <span class="nb">implode</span><span class="p">(</span><span class="s2">&quot;&amp;&quot;</span><span class="p">,</span> <span class="nb">array_map</span><span class="p">(</span><span class="nv">$join_pair</span><span class="p">,</span> <span class="nb">array_keys</span><span class="p">(</span><span class="nv">$params</span><span class="p">),</span> <span class="nb">array_values</span><span class="p">(</span><span class="nv">$params</span><span class="p">)));</span>
<a name="Cloudinary.php-950"></a>        <span class="k">return</span> <span class="nb">sha1</span><span class="p">(</span><span class="nv">$to_sign</span> <span class="o">.</span> <span class="nv">$api_secret</span><span class="p">);</span>
<a name="Cloudinary.php-951"></a>    <span class="p">}</span>
<a name="Cloudinary.php-952"></a>
<a name="Cloudinary.php-953"></a>    <span class="k">public</span> <span class="k">static</span> <span class="k">function</span> <span class="nf">html_attrs</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="nv">$only</span> <span class="o">=</span> <span class="k">NULL</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-954"></a>        <span class="nv">$attrs</span> <span class="o">=</span> <span class="k">array</span><span class="p">();</span>
<a name="Cloudinary.php-955"></a>        <span class="k">foreach</span><span class="p">(</span><span class="nv">$options</span> <span class="k">as</span> <span class="nv">$k</span> <span class="o">=&gt;</span> <span class="nv">$v</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-956"></a>          <span class="nv">$key</span> <span class="o">=</span> <span class="nv">$k</span><span class="p">;</span>
<a name="Cloudinary.php-957"></a>          <span class="nv">$value</span> <span class="o">=</span> <span class="nv">$v</span><span class="p">;</span>
<a name="Cloudinary.php-958"></a>          <span class="k">if</span> <span class="p">(</span><span class="nb">is_int</span><span class="p">(</span><span class="nv">$k</span><span class="p">))</span> <span class="p">{</span>
<a name="Cloudinary.php-959"></a>            <span class="nv">$key</span> <span class="o">=</span> <span class="nv">$v</span><span class="p">;</span>
<a name="Cloudinary.php-960"></a>            <span class="nv">$value</span> <span class="o">=</span> <span class="s2">&quot;&quot;</span><span class="p">;</span>
<a name="Cloudinary.php-961"></a>          <span class="p">}</span>
<a name="Cloudinary.php-962"></a>          <span class="k">if</span> <span class="p">(</span><span class="nb">is_array</span><span class="p">(</span><span class="nv">$only</span><span class="p">)</span> <span class="o">&amp;&amp;</span> <span class="nb">array_search</span><span class="p">(</span><span class="nv">$key</span><span class="p">,</span> <span class="nv">$only</span><span class="p">)</span> <span class="o">!==</span> <span class="k">FALSE</span> <span class="o">||</span> <span class="o">!</span><span class="nb">is_array</span><span class="p">(</span><span class="nv">$only</span><span class="p">))</span> <span class="p">{</span>
<a name="Cloudinary.php-963"></a>            <span class="nv">$attrs</span><span class="p">[</span><span class="nv">$key</span><span class="p">]</span> <span class="o">=</span> <span class="nv">$value</span><span class="p">;</span>
<a name="Cloudinary.php-964"></a>          <span class="p">}</span>
<a name="Cloudinary.php-965"></a>        <span class="p">}</span>
<a name="Cloudinary.php-966"></a>        <span class="nb">ksort</span><span class="p">(</span><span class="nv">$attrs</span><span class="p">);</span>
<a name="Cloudinary.php-967"></a>
<a name="Cloudinary.php-968"></a>        <span class="nv">$join_pair</span> <span class="o">=</span> <span class="k">function</span><span class="p">(</span><span class="nv">$key</span><span class="p">,</span> <span class="nv">$value</span><span class="p">)</span> <span class="p">{</span>
<a name="Cloudinary.php-969"></a>          <span class="nv">$out</span> <span class="o">=</span> <span class="nv">$key</span><span class="p">;</span>
<a name="Cloudinary.php-970"></a>          <span class="k">if</span> <span class="p">(</span><span class="o">!</span><span class="k">empty</span><span class="p">(</span><span class="nv">$value</span><span class="p">))</span> <span class="p">{</span>
<a name="Cloudinary.php-971"></a>            <span class="nv">$out</span> <span class="o">.=</span> <span class="s1">&#39;=\&#39;&#39;</span> <span class="o">.</span> <span class="nv">$value</span> <span class="o">.</span> <span class="s1">&#39;\&#39;&#39;</span><span class="p">;</span>
<a name="Cloudinary.php-972"></a>          <span class="p">}</span>
<a name="Cloudinary.php-973"></a>          <span class="k">return</span> <span class="nv">$out</span><span class="p">;</span>
<a name="Cloudinary.php-974"></a>        <span class="p">};</span>
<a name="Cloudinary.php-975"></a>        <span class="k">return</span> <span class="nb">implode</span><span class="p">(</span><span class="s2">&quot; &quot;</span><span class="p">,</span> <span class="nb">array_map</span><span class="p">(</span><span class="nv">$join_pair</span><span class="p">,</span> <span class="nb">array_keys</span><span class="p">(</span><span class="nv">$attrs</span><span class="p">),</span> <span class="nb">array_values</span><span class="p">(</span><span class="nv">$attrs</span><span class="p">)));</span>
<a name="Cloudinary.php-976"></a>    <span class="p">}</span>
<a name="Cloudinary.php-977"></a><span class="p">}</span>
<a name="Cloudinary.php-978"></a>
<a name="Cloudinary.php-979"></a><span class="k">require_once</span><span class="p">(</span><span class="nb">join</span><span class="p">(</span><span class="nx">DIRECTORY_SEPARATOR</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="nb">dirname</span><span class="p">(</span><span class="no">__FILE__</span><span class="p">),</span> <span class="s1">&#39;Helpers.php&#39;</span><span class="p">)));</span>
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
         href="#">1c299938c525 / 1c299938c525 @ app-107</a>
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
                  <a class="pjax-trigger filter-item-link" href="/crazyhare86/aimee_debug/src/[[changeset]]/app/Http/Controllers/cloudinary/Cloudinary.php?at=[[safeName]]"
                     title="[[name]]">
                    [[name]] ([[shortChangeset]])
                  </a>
                </li>
              [[/heads]]
            [[/hasMultipleHeads]]
            [[^hasMultipleHeads]]
              <li class="comprev filter-item">
                <a class="pjax-trigger filter-item-link" href="/crazyhare86/aimee_debug/src/[[changeset]]/app/Http/Controllers/cloudinary/Cloudinary.php?at=[[safeName]]" title="[[name]]">
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
            <a class="pjax-trigger filter-item-link" href="/crazyhare86/aimee_debug/src/[[changeset]]/app/Http/Controllers/cloudinary/Cloudinary.php?at=[[safeName]]" title="[[name]]">
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

<script type="text/javascript">window.NREUM||(NREUM={});NREUM.info={"beacon":"bam.nr-data.net","queueTime":0,"licenseKey":"a2cef8c3d3","agent":"","transactionName":"Z11RZxdWW0cEVkYLDV4XdUYLVEFdClsdAAtEWkZQDlJBGgRFQhFMQl1DXFcZQ10AQkFYBFlUVlEXWEJHAA==","applicationID":"1841284","errorBeacon":"bam.nr-data.net","applicationTime":337}</script>
</body>
</html>