<!DOCTYPE html>
<html lang="en">
<head>
  <meta id="bb-bootstrap" data-current-user="{&quot;username&quot;: &quot;VVebDevel&quot;, &quot;displayName&quot;: &quot;Maks Glebov&quot;, &quot;uuid&quot;: &quot;{0cb3f3ef-9830-4c76-8626-7da922507cff}&quot;, &quot;firstName&quot;: &quot;Maks Glebov&quot;, &quot;hasPremium&quot;: true, &quot;lastName&quot;: &quot;&quot;, &quot;avatarUrl&quot;: &quot;https://bitbucket.org/account/VVebDevel/avatar/32/?ts=1493812574&quot;, &quot;isTeam&quot;: false, &quot;isSshEnabled&quot;: false, &quot;isKbdShortcutsEnabled&quot;: true, &quot;id&quot;: 8325053, &quot;isAuthenticated&quot;: true}"
data-atlassian-id="557058:9703eccd-6e07-453d-aae3-cd10aea6d71e" />
  
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta charset="utf-8">
  <title>
  crazyhare86 / aimee_debug 
  / source  / app / Http / Controllers / cloudinary / Api.php
 &mdash; Bitbucket
</title>
  <script type="text/javascript">window.NREUM||(NREUM={}),__nr_require=function(e,n,t){function r(t){if(!n[t]){var o=n[t]={exports:{}};e[t][0].call(o.exports,function(n){var o=e[t][1][n];return r(o||n)},o,o.exports)}return n[t].exports}if("function"==typeof __nr_require)return __nr_require;for(var o=0;o<t.length;o++)r(t[o]);return r}({1:[function(e,n,t){function r(){}function o(e,n,t){return function(){return i(e,[c.now()].concat(u(arguments)),n?null:this,t),n?void 0:this}}var i=e("handle"),a=e(2),u=e(3),f=e("ee").get("tracer"),c=e("loader"),s=NREUM;"undefined"==typeof window.newrelic&&(newrelic=s);var p=["setPageViewName","setCustomAttribute","setErrorHandler","finished","addToTrace","inlineHit","addRelease"],d="api-",l=d+"ixn-";a(p,function(e,n){s[n]=o(d+n,!0,"api")}),s.addPageAction=o(d+"addPageAction",!0),s.setCurrentRouteName=o(d+"routeName",!0),n.exports=newrelic,s.interaction=function(){return(new r).get()};var m=r.prototype={createTracer:function(e,n){var t={},r=this,o="function"==typeof n;return i(l+"tracer",[c.now(),e,t],r),function(){if(f.emit((o?"":"no-")+"fn-start",[c.now(),r,o],t),o)try{return n.apply(this,arguments)}finally{f.emit("fn-end",[c.now()],t)}}}};a("setName,setAttribute,save,ignore,onEnd,getContext,end,get".split(","),function(e,n){m[n]=o(l+n)}),newrelic.noticeError=function(e){"string"==typeof e&&(e=new Error(e)),i("err",[e,c.now()])}},{}],2:[function(e,n,t){function r(e,n){var t=[],r="",i=0;for(r in e)o.call(e,r)&&(t[i]=n(r,e[r]),i+=1);return t}var o=Object.prototype.hasOwnProperty;n.exports=r},{}],3:[function(e,n,t){function r(e,n,t){n||(n=0),"undefined"==typeof t&&(t=e?e.length:0);for(var r=-1,o=t-n||0,i=Array(o<0?0:o);++r<o;)i[r]=e[n+r];return i}n.exports=r},{}],4:[function(e,n,t){n.exports={exists:"undefined"!=typeof window.performance&&window.performance.timing&&"undefined"!=typeof window.performance.timing.navigationStart}},{}],ee:[function(e,n,t){function r(){}function o(e){function n(e){return e&&e instanceof r?e:e?f(e,u,i):i()}function t(t,r,o,i){if(!d.aborted||i){e&&e(t,r,o);for(var a=n(o),u=m(t),f=u.length,c=0;c<f;c++)u[c].apply(a,r);var p=s[y[t]];return p&&p.push([b,t,r,a]),a}}function l(e,n){v[e]=m(e).concat(n)}function m(e){return v[e]||[]}function w(e){return p[e]=p[e]||o(t)}function g(e,n){c(e,function(e,t){n=n||"feature",y[t]=n,n in s||(s[n]=[])})}var v={},y={},b={on:l,emit:t,get:w,listeners:m,context:n,buffer:g,abort:a,aborted:!1};return b}function i(){return new r}function a(){(s.api||s.feature)&&(d.aborted=!0,s=d.backlog={})}var u="nr@context",f=e("gos"),c=e(2),s={},p={},d=n.exports=o();d.backlog=s},{}],gos:[function(e,n,t){function r(e,n,t){if(o.call(e,n))return e[n];var r=t();if(Object.defineProperty&&Object.keys)try{return Object.defineProperty(e,n,{value:r,writable:!0,enumerable:!1}),r}catch(i){}return e[n]=r,r}var o=Object.prototype.hasOwnProperty;n.exports=r},{}],handle:[function(e,n,t){function r(e,n,t,r){o.buffer([e],r),o.emit(e,n,t)}var o=e("ee").get("handle");n.exports=r,r.ee=o},{}],id:[function(e,n,t){function r(e){var n=typeof e;return!e||"object"!==n&&"function"!==n?-1:e===window?0:a(e,i,function(){return o++})}var o=1,i="nr@id",a=e("gos");n.exports=r},{}],loader:[function(e,n,t){function r(){if(!x++){var e=h.info=NREUM.info,n=d.getElementsByTagName("script")[0];if(setTimeout(s.abort,3e4),!(e&&e.licenseKey&&e.applicationID&&n))return s.abort();c(y,function(n,t){e[n]||(e[n]=t)}),f("mark",["onload",a()+h.offset],null,"api");var t=d.createElement("script");t.src="https://"+e.agent,n.parentNode.insertBefore(t,n)}}function o(){"complete"===d.readyState&&i()}function i(){f("mark",["domContent",a()+h.offset],null,"api")}function a(){return E.exists&&performance.now?Math.round(performance.now()):(u=Math.max((new Date).getTime(),u))-h.offset}var u=(new Date).getTime(),f=e("handle"),c=e(2),s=e("ee"),p=window,d=p.document,l="addEventListener",m="attachEvent",w=p.XMLHttpRequest,g=w&&w.prototype;NREUM.o={ST:setTimeout,CT:clearTimeout,XHR:w,REQ:p.Request,EV:p.Event,PR:p.Promise,MO:p.MutationObserver};var v=""+location,y={beacon:"bam.nr-data.net",errorBeacon:"bam.nr-data.net",agent:"js-agent.newrelic.com/nr-1026.min.js"},b=w&&g&&g[l]&&!/CriOS/.test(navigator.userAgent),h=n.exports={offset:u,now:a,origin:v,features:{},xhrWrappable:b};e(1),d[l]?(d[l]("DOMContentLoaded",i,!1),p[l]("load",r,!1)):(d[m]("onreadystatechange",o),p[m]("onload",r)),f("mark",["firstbyte",u],null,"api");var x=0,E=e(4)},{}]},{},["loader"]);</script>
  


<meta id="bb-canon-url" name="bb-canon-url" content="https://bitbucket.org">
<meta name="bb-api-canon-url" content="https://api.bitbucket.org">
<meta name="apitoken" content="{&quot;token&quot;: &quot;nLuSD0C2wKOl5m-pPIa9peec0GQeVOM-bcrJydUPDzWfqq5jBcBTNp_89XaqMl7vPZHikmdDuhM2orJwZ5rxVBLGiwHORg==&quot;, &quot;connectionId&quot;: 619065, &quot;expiration&quot;: 1493813285.776378}">

<meta name="bb-commit-hash" content="1c299938c525">
<meta name="bb-app-node" content="app-106">
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
        
          <a href="/crazyhare86/aimee_debug/src/0b821ab99a1b/app/Http/Controllers/cloudinary/Api.php?at=Nafanail"
            class="aui-button pjax-trigger" aria-pressed="true">
            Source
          </a>
          <a href="/crazyhare86/aimee_debug/diff/app/Http/Controllers/cloudinary/Api.php?diff2=0b821ab99a1b&at=Nafanail"
            class="aui-button pjax-trigger"
            title="Diff to previous change">
            Diff
          </a>
          <a href="/crazyhare86/aimee_debug/history-node/0b821ab99a1b/app/Http/Controllers/cloudinary/Api.php?at=Nafanail"
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
          
        
      
        
          
            <span class="file-name">Api.php</span>
          
        
      
    
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
       data-path="app/Http/Controllers/cloudinary/Api.php"
       data-source-url="/api/internal/repositories/crazyhare86/aimee_debug/src/0b821ab99a1ba2bbea61af849a1c88d39986036a/app/Http/Controllers/cloudinary/Api.php">
    <div id="source-view" class="file-source-container" data-module="repo/source/view-file" data-is-lfs="false">
      <div class="toolbar">
        <div class="primary">
          <div class="aui-buttons">
            
              <button id="file-history-trigger" class="aui-button aui-button-light changeset-info"
                      data-changeset="0b821ab99a1ba2bbea61af849a1c88d39986036a"
                      data-path="app/Http/Controllers/cloudinary/Api.php"
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
          
          <a href="/crazyhare86/aimee_debug/full-commit/0b821ab99a1b/app/Http/Controllers/cloudinary/Api.php" id="full-commit-link"
             title="View full commit 0b821ab">Full commit</a>
        </div>
        <div class="secondary">
          
          <div class="aui-buttons">
            
              <a href="/crazyhare86/aimee_debug/annotate/0b821ab99a1ba2bbea61af849a1c88d39986036a/app/Http/Controllers/cloudinary/Api.php?at=Nafanail"
                 class="aui-button aui-button-light pjax-trigger">Blame</a>
              
            
            <a href="/crazyhare86/aimee_debug/raw/0b821ab99a1ba2bbea61af849a1c88d39986036a/app/Http/Controllers/cloudinary/Api.php" class="aui-button aui-button-light">Raw</a>
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
      <table class="codehilite highlighttable"><tr><td class="linenos"><div class="linenodiv"><pre><a href="#Api.php-1">  1</a>
<a href="#Api.php-2">  2</a>
<a href="#Api.php-3">  3</a>
<a href="#Api.php-4">  4</a>
<a href="#Api.php-5">  5</a>
<a href="#Api.php-6">  6</a>
<a href="#Api.php-7">  7</a>
<a href="#Api.php-8">  8</a>
<a href="#Api.php-9">  9</a>
<a href="#Api.php-10"> 10</a>
<a href="#Api.php-11"> 11</a>
<a href="#Api.php-12"> 12</a>
<a href="#Api.php-13"> 13</a>
<a href="#Api.php-14"> 14</a>
<a href="#Api.php-15"> 15</a>
<a href="#Api.php-16"> 16</a>
<a href="#Api.php-17"> 17</a>
<a href="#Api.php-18"> 18</a>
<a href="#Api.php-19"> 19</a>
<a href="#Api.php-20"> 20</a>
<a href="#Api.php-21"> 21</a>
<a href="#Api.php-22"> 22</a>
<a href="#Api.php-23"> 23</a>
<a href="#Api.php-24"> 24</a>
<a href="#Api.php-25"> 25</a>
<a href="#Api.php-26"> 26</a>
<a href="#Api.php-27"> 27</a>
<a href="#Api.php-28"> 28</a>
<a href="#Api.php-29"> 29</a>
<a href="#Api.php-30"> 30</a>
<a href="#Api.php-31"> 31</a>
<a href="#Api.php-32"> 32</a>
<a href="#Api.php-33"> 33</a>
<a href="#Api.php-34"> 34</a>
<a href="#Api.php-35"> 35</a>
<a href="#Api.php-36"> 36</a>
<a href="#Api.php-37"> 37</a>
<a href="#Api.php-38"> 38</a>
<a href="#Api.php-39"> 39</a>
<a href="#Api.php-40"> 40</a>
<a href="#Api.php-41"> 41</a>
<a href="#Api.php-42"> 42</a>
<a href="#Api.php-43"> 43</a>
<a href="#Api.php-44"> 44</a>
<a href="#Api.php-45"> 45</a>
<a href="#Api.php-46"> 46</a>
<a href="#Api.php-47"> 47</a>
<a href="#Api.php-48"> 48</a>
<a href="#Api.php-49"> 49</a>
<a href="#Api.php-50"> 50</a>
<a href="#Api.php-51"> 51</a>
<a href="#Api.php-52"> 52</a>
<a href="#Api.php-53"> 53</a>
<a href="#Api.php-54"> 54</a>
<a href="#Api.php-55"> 55</a>
<a href="#Api.php-56"> 56</a>
<a href="#Api.php-57"> 57</a>
<a href="#Api.php-58"> 58</a>
<a href="#Api.php-59"> 59</a>
<a href="#Api.php-60"> 60</a>
<a href="#Api.php-61"> 61</a>
<a href="#Api.php-62"> 62</a>
<a href="#Api.php-63"> 63</a>
<a href="#Api.php-64"> 64</a>
<a href="#Api.php-65"> 65</a>
<a href="#Api.php-66"> 66</a>
<a href="#Api.php-67"> 67</a>
<a href="#Api.php-68"> 68</a>
<a href="#Api.php-69"> 69</a>
<a href="#Api.php-70"> 70</a>
<a href="#Api.php-71"> 71</a>
<a href="#Api.php-72"> 72</a>
<a href="#Api.php-73"> 73</a>
<a href="#Api.php-74"> 74</a>
<a href="#Api.php-75"> 75</a>
<a href="#Api.php-76"> 76</a>
<a href="#Api.php-77"> 77</a>
<a href="#Api.php-78"> 78</a>
<a href="#Api.php-79"> 79</a>
<a href="#Api.php-80"> 80</a>
<a href="#Api.php-81"> 81</a>
<a href="#Api.php-82"> 82</a>
<a href="#Api.php-83"> 83</a>
<a href="#Api.php-84"> 84</a>
<a href="#Api.php-85"> 85</a>
<a href="#Api.php-86"> 86</a>
<a href="#Api.php-87"> 87</a>
<a href="#Api.php-88"> 88</a>
<a href="#Api.php-89"> 89</a>
<a href="#Api.php-90"> 90</a>
<a href="#Api.php-91"> 91</a>
<a href="#Api.php-92"> 92</a>
<a href="#Api.php-93"> 93</a>
<a href="#Api.php-94"> 94</a>
<a href="#Api.php-95"> 95</a>
<a href="#Api.php-96"> 96</a>
<a href="#Api.php-97"> 97</a>
<a href="#Api.php-98"> 98</a>
<a href="#Api.php-99"> 99</a>
<a href="#Api.php-100">100</a>
<a href="#Api.php-101">101</a>
<a href="#Api.php-102">102</a>
<a href="#Api.php-103">103</a>
<a href="#Api.php-104">104</a>
<a href="#Api.php-105">105</a>
<a href="#Api.php-106">106</a>
<a href="#Api.php-107">107</a>
<a href="#Api.php-108">108</a>
<a href="#Api.php-109">109</a>
<a href="#Api.php-110">110</a>
<a href="#Api.php-111">111</a>
<a href="#Api.php-112">112</a>
<a href="#Api.php-113">113</a>
<a href="#Api.php-114">114</a>
<a href="#Api.php-115">115</a>
<a href="#Api.php-116">116</a>
<a href="#Api.php-117">117</a>
<a href="#Api.php-118">118</a>
<a href="#Api.php-119">119</a>
<a href="#Api.php-120">120</a>
<a href="#Api.php-121">121</a>
<a href="#Api.php-122">122</a>
<a href="#Api.php-123">123</a>
<a href="#Api.php-124">124</a>
<a href="#Api.php-125">125</a>
<a href="#Api.php-126">126</a>
<a href="#Api.php-127">127</a>
<a href="#Api.php-128">128</a>
<a href="#Api.php-129">129</a>
<a href="#Api.php-130">130</a>
<a href="#Api.php-131">131</a>
<a href="#Api.php-132">132</a>
<a href="#Api.php-133">133</a>
<a href="#Api.php-134">134</a>
<a href="#Api.php-135">135</a>
<a href="#Api.php-136">136</a>
<a href="#Api.php-137">137</a>
<a href="#Api.php-138">138</a>
<a href="#Api.php-139">139</a>
<a href="#Api.php-140">140</a>
<a href="#Api.php-141">141</a>
<a href="#Api.php-142">142</a>
<a href="#Api.php-143">143</a>
<a href="#Api.php-144">144</a>
<a href="#Api.php-145">145</a>
<a href="#Api.php-146">146</a>
<a href="#Api.php-147">147</a>
<a href="#Api.php-148">148</a>
<a href="#Api.php-149">149</a>
<a href="#Api.php-150">150</a>
<a href="#Api.php-151">151</a>
<a href="#Api.php-152">152</a>
<a href="#Api.php-153">153</a>
<a href="#Api.php-154">154</a>
<a href="#Api.php-155">155</a>
<a href="#Api.php-156">156</a>
<a href="#Api.php-157">157</a>
<a href="#Api.php-158">158</a>
<a href="#Api.php-159">159</a>
<a href="#Api.php-160">160</a>
<a href="#Api.php-161">161</a>
<a href="#Api.php-162">162</a>
<a href="#Api.php-163">163</a>
<a href="#Api.php-164">164</a>
<a href="#Api.php-165">165</a>
<a href="#Api.php-166">166</a>
<a href="#Api.php-167">167</a>
<a href="#Api.php-168">168</a>
<a href="#Api.php-169">169</a>
<a href="#Api.php-170">170</a>
<a href="#Api.php-171">171</a>
<a href="#Api.php-172">172</a>
<a href="#Api.php-173">173</a>
<a href="#Api.php-174">174</a>
<a href="#Api.php-175">175</a>
<a href="#Api.php-176">176</a>
<a href="#Api.php-177">177</a>
<a href="#Api.php-178">178</a>
<a href="#Api.php-179">179</a>
<a href="#Api.php-180">180</a>
<a href="#Api.php-181">181</a>
<a href="#Api.php-182">182</a>
<a href="#Api.php-183">183</a>
<a href="#Api.php-184">184</a>
<a href="#Api.php-185">185</a>
<a href="#Api.php-186">186</a>
<a href="#Api.php-187">187</a>
<a href="#Api.php-188">188</a>
<a href="#Api.php-189">189</a>
<a href="#Api.php-190">190</a>
<a href="#Api.php-191">191</a>
<a href="#Api.php-192">192</a>
<a href="#Api.php-193">193</a>
<a href="#Api.php-194">194</a>
<a href="#Api.php-195">195</a>
<a href="#Api.php-196">196</a>
<a href="#Api.php-197">197</a>
<a href="#Api.php-198">198</a>
<a href="#Api.php-199">199</a>
<a href="#Api.php-200">200</a>
<a href="#Api.php-201">201</a>
<a href="#Api.php-202">202</a>
<a href="#Api.php-203">203</a>
<a href="#Api.php-204">204</a>
<a href="#Api.php-205">205</a>
<a href="#Api.php-206">206</a>
<a href="#Api.php-207">207</a>
<a href="#Api.php-208">208</a>
<a href="#Api.php-209">209</a>
<a href="#Api.php-210">210</a>
<a href="#Api.php-211">211</a>
<a href="#Api.php-212">212</a>
<a href="#Api.php-213">213</a>
<a href="#Api.php-214">214</a>
<a href="#Api.php-215">215</a>
<a href="#Api.php-216">216</a>
<a href="#Api.php-217">217</a>
<a href="#Api.php-218">218</a>
<a href="#Api.php-219">219</a>
<a href="#Api.php-220">220</a>
<a href="#Api.php-221">221</a>
<a href="#Api.php-222">222</a>
<a href="#Api.php-223">223</a>
<a href="#Api.php-224">224</a>
<a href="#Api.php-225">225</a>
<a href="#Api.php-226">226</a>
<a href="#Api.php-227">227</a>
<a href="#Api.php-228">228</a>
<a href="#Api.php-229">229</a>
<a href="#Api.php-230">230</a>
<a href="#Api.php-231">231</a>
<a href="#Api.php-232">232</a>
<a href="#Api.php-233">233</a>
<a href="#Api.php-234">234</a>
<a href="#Api.php-235">235</a>
<a href="#Api.php-236">236</a>
<a href="#Api.php-237">237</a>
<a href="#Api.php-238">238</a>
<a href="#Api.php-239">239</a>
<a href="#Api.php-240">240</a>
<a href="#Api.php-241">241</a>
<a href="#Api.php-242">242</a>
<a href="#Api.php-243">243</a>
<a href="#Api.php-244">244</a>
<a href="#Api.php-245">245</a>
<a href="#Api.php-246">246</a>
<a href="#Api.php-247">247</a>
<a href="#Api.php-248">248</a>
<a href="#Api.php-249">249</a>
<a href="#Api.php-250">250</a>
<a href="#Api.php-251">251</a>
<a href="#Api.php-252">252</a>
<a href="#Api.php-253">253</a>
<a href="#Api.php-254">254</a>
<a href="#Api.php-255">255</a>
<a href="#Api.php-256">256</a>
<a href="#Api.php-257">257</a>
<a href="#Api.php-258">258</a>
<a href="#Api.php-259">259</a>
<a href="#Api.php-260">260</a>
<a href="#Api.php-261">261</a>
<a href="#Api.php-262">262</a>
<a href="#Api.php-263">263</a>
<a href="#Api.php-264">264</a>
<a href="#Api.php-265">265</a>
<a href="#Api.php-266">266</a>
<a href="#Api.php-267">267</a>
<a href="#Api.php-268">268</a>
<a href="#Api.php-269">269</a>
<a href="#Api.php-270">270</a>
<a href="#Api.php-271">271</a>
<a href="#Api.php-272">272</a>
<a href="#Api.php-273">273</a>
<a href="#Api.php-274">274</a>
<a href="#Api.php-275">275</a>
<a href="#Api.php-276">276</a>
<a href="#Api.php-277">277</a>
<a href="#Api.php-278">278</a>
<a href="#Api.php-279">279</a>
<a href="#Api.php-280">280</a>
<a href="#Api.php-281">281</a>
<a href="#Api.php-282">282</a>
<a href="#Api.php-283">283</a>
<a href="#Api.php-284">284</a>
<a href="#Api.php-285">285</a>
<a href="#Api.php-286">286</a>
<a href="#Api.php-287">287</a>
<a href="#Api.php-288">288</a>
<a href="#Api.php-289">289</a>
<a href="#Api.php-290">290</a>
<a href="#Api.php-291">291</a>
<a href="#Api.php-292">292</a>
<a href="#Api.php-293">293</a>
<a href="#Api.php-294">294</a>
<a href="#Api.php-295">295</a>
<a href="#Api.php-296">296</a>
<a href="#Api.php-297">297</a>
<a href="#Api.php-298">298</a>
<a href="#Api.php-299">299</a>
<a href="#Api.php-300">300</a>
<a href="#Api.php-301">301</a>
<a href="#Api.php-302">302</a>
<a href="#Api.php-303">303</a>
<a href="#Api.php-304">304</a>
<a href="#Api.php-305">305</a>
<a href="#Api.php-306">306</a>
<a href="#Api.php-307">307</a>
<a href="#Api.php-308">308</a>
<a href="#Api.php-309">309</a>
<a href="#Api.php-310">310</a>
<a href="#Api.php-311">311</a>
<a href="#Api.php-312">312</a>
<a href="#Api.php-313">313</a>
<a href="#Api.php-314">314</a>
<a href="#Api.php-315">315</a>
<a href="#Api.php-316">316</a>
<a href="#Api.php-317">317</a>
<a href="#Api.php-318">318</a>
<a href="#Api.php-319">319</a>
<a href="#Api.php-320">320</a>
<a href="#Api.php-321">321</a>
<a href="#Api.php-322">322</a>
<a href="#Api.php-323">323</a>
<a href="#Api.php-324">324</a>
<a href="#Api.php-325">325</a>
<a href="#Api.php-326">326</a>
<a href="#Api.php-327">327</a>
<a href="#Api.php-328">328</a>
<a href="#Api.php-329">329</a>
<a href="#Api.php-330">330</a>
<a href="#Api.php-331">331</a>
<a href="#Api.php-332">332</a>
<a href="#Api.php-333">333</a>
<a href="#Api.php-334">334</a>
<a href="#Api.php-335">335</a>
<a href="#Api.php-336">336</a>
<a href="#Api.php-337">337</a>
<a href="#Api.php-338">338</a>
<a href="#Api.php-339">339</a>
<a href="#Api.php-340">340</a>
<a href="#Api.php-341">341</a>
<a href="#Api.php-342">342</a>
<a href="#Api.php-343">343</a>
<a href="#Api.php-344">344</a>
<a href="#Api.php-345">345</a>
<a href="#Api.php-346">346</a>
<a href="#Api.php-347">347</a>
<a href="#Api.php-348">348</a>
<a href="#Api.php-349">349</a>
<a href="#Api.php-350">350</a>
<a href="#Api.php-351">351</a>
<a href="#Api.php-352">352</a>
<a href="#Api.php-353">353</a>
<a href="#Api.php-354">354</a>
<a href="#Api.php-355">355</a>
<a href="#Api.php-356">356</a>
<a href="#Api.php-357">357</a>
<a href="#Api.php-358">358</a>
<a href="#Api.php-359">359</a>
<a href="#Api.php-360">360</a>
<a href="#Api.php-361">361</a>
<a href="#Api.php-362">362</a>
<a href="#Api.php-363">363</a>
<a href="#Api.php-364">364</a>
<a href="#Api.php-365">365</a>
<a href="#Api.php-366">366</a>
<a href="#Api.php-367">367</a>
<a href="#Api.php-368">368</a>
<a href="#Api.php-369">369</a>
<a href="#Api.php-370">370</a>
<a href="#Api.php-371">371</a>
<a href="#Api.php-372">372</a>
<a href="#Api.php-373">373</a>
<a href="#Api.php-374">374</a>
<a href="#Api.php-375">375</a>
<a href="#Api.php-376">376</a>
<a href="#Api.php-377">377</a>
<a href="#Api.php-378">378</a>
<a href="#Api.php-379">379</a>
<a href="#Api.php-380">380</a>
<a href="#Api.php-381">381</a>
<a href="#Api.php-382">382</a>
<a href="#Api.php-383">383</a>
<a href="#Api.php-384">384</a>
<a href="#Api.php-385">385</a>
<a href="#Api.php-386">386</a>
<a href="#Api.php-387">387</a>
<a href="#Api.php-388">388</a>
<a href="#Api.php-389">389</a>
<a href="#Api.php-390">390</a>
<a href="#Api.php-391">391</a>
<a href="#Api.php-392">392</a>
<a href="#Api.php-393">393</a>
<a href="#Api.php-394">394</a>
<a href="#Api.php-395">395</a>
<a href="#Api.php-396">396</a>
<a href="#Api.php-397">397</a>
<a href="#Api.php-398">398</a>
<a href="#Api.php-399">399</a>
<a href="#Api.php-400">400</a>
<a href="#Api.php-401">401</a>
<a href="#Api.php-402">402</a>
<a href="#Api.php-403">403</a>
<a href="#Api.php-404">404</a>
<a href="#Api.php-405">405</a>
<a href="#Api.php-406">406</a>
<a href="#Api.php-407">407</a>
<a href="#Api.php-408">408</a>
<a href="#Api.php-409">409</a>
<a href="#Api.php-410">410</a>
<a href="#Api.php-411">411</a>
<a href="#Api.php-412">412</a>
<a href="#Api.php-413">413</a>
<a href="#Api.php-414">414</a>
<a href="#Api.php-415">415</a>
<a href="#Api.php-416">416</a>
<a href="#Api.php-417">417</a>
<a href="#Api.php-418">418</a>
<a href="#Api.php-419">419</a>
<a href="#Api.php-420">420</a>
<a href="#Api.php-421">421</a>
<a href="#Api.php-422">422</a>
<a href="#Api.php-423">423</a>
<a href="#Api.php-424">424</a>
<a href="#Api.php-425">425</a>
<a href="#Api.php-426">426</a>
<a href="#Api.php-427">427</a>
<a href="#Api.php-428">428</a>
<a href="#Api.php-429">429</a>
<a href="#Api.php-430">430</a>
<a href="#Api.php-431">431</a>
<a href="#Api.php-432">432</a>
<a href="#Api.php-433">433</a>
<a href="#Api.php-434">434</a>
<a href="#Api.php-435">435</a>
<a href="#Api.php-436">436</a>
<a href="#Api.php-437">437</a>
<a href="#Api.php-438">438</a>
<a href="#Api.php-439">439</a>
<a href="#Api.php-440">440</a></pre></div></td><td class="code"><div class="codehilite highlight"><pre><span></span><a name="Api.php-1"></a><span class="cp">&lt;?php</span>
<a name="Api.php-2"></a>
<a name="Api.php-3"></a>
<a name="Api.php-4"></a><span class="k">namespace</span> <span class="nx">Cloudinary\Api</span> <span class="p">{</span>
<a name="Api.php-5"></a>  <span class="k">class</span> <span class="nc">Error</span> <span class="k">extends</span> <span class="nx">\Exception</span> <span class="p">{}</span>
<a name="Api.php-6"></a>  <span class="k">class</span> <span class="nc">NotFound</span> <span class="k">extends</span> <span class="nx">Error</span> <span class="p">{}</span>
<a name="Api.php-7"></a>  <span class="k">class</span> <span class="nc">NotAllowed</span> <span class="k">extends</span> <span class="nx">Error</span> <span class="p">{}</span>
<a name="Api.php-8"></a>  <span class="k">class</span> <span class="nc">AlreadyExists</span> <span class="k">extends</span> <span class="nx">Error</span> <span class="p">{}</span>
<a name="Api.php-9"></a>  <span class="k">class</span> <span class="nc">RateLimited</span> <span class="k">extends</span> <span class="nx">Error</span> <span class="p">{}</span>
<a name="Api.php-10"></a>  <span class="k">class</span> <span class="nc">BadRequest</span> <span class="k">extends</span> <span class="nx">Error</span> <span class="p">{}</span>
<a name="Api.php-11"></a>  <span class="k">class</span> <span class="nc">GeneralError</span> <span class="k">extends</span> <span class="nx">Error</span> <span class="p">{}</span>
<a name="Api.php-12"></a>  <span class="k">class</span> <span class="nc">AuthorizationRequired</span> <span class="k">extends</span> <span class="nx">Error</span> <span class="p">{}</span> 
<a name="Api.php-13"></a>  <span class="k">class</span> <span class="nc">Response</span> <span class="k">extends</span> <span class="nx">\ArrayObject</span> <span class="p">{</span>
<a name="Api.php-14"></a>    <span class="k">function</span> <span class="fm">__construct</span><span class="p">(</span><span class="nv">$response</span><span class="p">)</span> <span class="p">{</span>        
<a name="Api.php-15"></a>        <span class="k">parent</span><span class="o">::</span><span class="na">__construct</span><span class="p">(</span><span class="nx">\Cloudinary\Api</span><span class="o">::</span><span class="na">parse_json_response</span><span class="p">(</span><span class="nv">$response</span><span class="p">));</span>
<a name="Api.php-16"></a>        <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">rate_limit_reset_at</span> <span class="o">=</span> <span class="nb">strtotime</span><span class="p">(</span><span class="nv">$response</span><span class="o">-&gt;</span><span class="na">headers</span><span class="p">[</span><span class="s2">&quot;X-FeatureRateLimit-Reset&quot;</span><span class="p">]);</span>
<a name="Api.php-17"></a>        <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">rate_limit_allowed</span> <span class="o">=</span> <span class="nb">intval</span><span class="p">(</span><span class="nv">$response</span><span class="o">-&gt;</span><span class="na">headers</span><span class="p">[</span><span class="s2">&quot;X-FeatureRateLimit-Limit&quot;</span><span class="p">]);</span>
<a name="Api.php-18"></a>        <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">rate_limit_remaining</span> <span class="o">=</span> <span class="nb">intval</span><span class="p">(</span><span class="nv">$response</span><span class="o">-&gt;</span><span class="na">headers</span><span class="p">[</span><span class="s2">&quot;X-FeatureRateLimit-Remaining&quot;</span><span class="p">]);</span>
<a name="Api.php-19"></a>    <span class="p">}</span>    
<a name="Api.php-20"></a>  <span class="p">}</span>  
<a name="Api.php-21"></a><span class="p">}</span>  
<a name="Api.php-22"></a>
<a name="Api.php-23"></a>
<a name="Api.php-24"></a><span class="k">namespace</span> <span class="nx">Cloudinary</span> <span class="p">{</span>
<a name="Api.php-25"></a>
<a name="Api.php-26"></a>
<a name="Api.php-27"></a><span class="k">class</span> <span class="nc">Api</span> <span class="p">{</span>
<a name="Api.php-28"></a>  <span class="k">static</span> <span class="nv">$CLOUDINARY_API_ERROR_CLASSES</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span>
<a name="Api.php-29"></a>    <span class="mi">400</span> <span class="o">=&gt;</span> <span class="s2">&quot;\Cloudinary\Api\BadRequest&quot;</span><span class="p">,</span>
<a name="Api.php-30"></a>    <span class="mi">401</span> <span class="o">=&gt;</span> <span class="s2">&quot;\Cloudinary\Api\AuthorizationRequired&quot;</span><span class="p">,</span>
<a name="Api.php-31"></a>    <span class="mi">403</span> <span class="o">=&gt;</span> <span class="s2">&quot;\Cloudinary\Api</span><span class="se">\N</span><span class="s2">otAllowed&quot;</span><span class="p">,</span>
<a name="Api.php-32"></a>    <span class="mi">404</span> <span class="o">=&gt;</span> <span class="s2">&quot;\Cloudinary\Api</span><span class="se">\N</span><span class="s2">otFound&quot;</span><span class="p">,</span>
<a name="Api.php-33"></a>    <span class="mi">409</span> <span class="o">=&gt;</span> <span class="s2">&quot;\Cloudinary\Api\AlreadyExists&quot;</span><span class="p">,</span>
<a name="Api.php-34"></a>    <span class="mi">420</span> <span class="o">=&gt;</span> <span class="s2">&quot;\Cloudinary\Api</span><span class="se">\R</span><span class="s2">ateLimited&quot;</span><span class="p">,</span>
<a name="Api.php-35"></a>    <span class="mi">500</span> <span class="o">=&gt;</span> <span class="s2">&quot;\Cloudinary\Api\GeneralError&quot;</span>
<a name="Api.php-36"></a>   <span class="p">);</span>
<a name="Api.php-37"></a>
<a name="Api.php-38"></a>  <span class="k">function</span> <span class="nf">ping</span><span class="p">(</span><span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Api.php-39"></a>    <span class="k">return</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">call_api</span><span class="p">(</span><span class="s2">&quot;get&quot;</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;ping&quot;</span><span class="p">),</span> <span class="k">array</span><span class="p">(),</span> <span class="nv">$options</span><span class="p">);</span>
<a name="Api.php-40"></a>  <span class="p">}</span>
<a name="Api.php-41"></a>
<a name="Api.php-42"></a>  <span class="k">function</span> <span class="nf">usage</span><span class="p">(</span><span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Api.php-43"></a>    <span class="k">return</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">call_api</span><span class="p">(</span><span class="s2">&quot;get&quot;</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;usage&quot;</span><span class="p">),</span> <span class="k">array</span><span class="p">(),</span> <span class="nv">$options</span><span class="p">);</span>
<a name="Api.php-44"></a>  <span class="p">}</span>
<a name="Api.php-45"></a>
<a name="Api.php-46"></a>  <span class="k">function</span> <span class="nf">resource_types</span><span class="p">(</span><span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Api.php-47"></a>    <span class="k">return</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">call_api</span><span class="p">(</span><span class="s2">&quot;get&quot;</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;resources&quot;</span><span class="p">),</span> <span class="k">array</span><span class="p">(),</span> <span class="nv">$options</span><span class="p">);</span>
<a name="Api.php-48"></a>  <span class="p">}</span>
<a name="Api.php-49"></a>
<a name="Api.php-50"></a>  <span class="k">function</span> <span class="nf">resources</span><span class="p">(</span><span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Api.php-51"></a>    <span class="nv">$resource_type</span> <span class="o">=</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;resource_type&quot;</span><span class="p">,</span> <span class="s2">&quot;image&quot;</span><span class="p">);</span>
<a name="Api.php-52"></a>    <span class="nv">$type</span> <span class="o">=</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;type&quot;</span><span class="p">);</span>
<a name="Api.php-53"></a>    <span class="nv">$uri</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;resources&quot;</span><span class="p">,</span> <span class="nv">$resource_type</span><span class="p">);</span>
<a name="Api.php-54"></a>    <span class="k">if</span> <span class="p">(</span><span class="nv">$type</span><span class="p">)</span> <span class="nb">array_push</span><span class="p">(</span><span class="nv">$uri</span><span class="p">,</span> <span class="nv">$type</span><span class="p">);</span>
<a name="Api.php-55"></a>    <span class="k">return</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">call_api</span><span class="p">(</span><span class="s2">&quot;get&quot;</span><span class="p">,</span> <span class="nv">$uri</span><span class="p">,</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">only</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;next_cursor&quot;</span><span class="p">,</span> <span class="s2">&quot;max_results&quot;</span><span class="p">,</span> <span class="s2">&quot;prefix&quot;</span><span class="p">,</span> <span class="s2">&quot;tags&quot;</span><span class="p">,</span> <span class="s2">&quot;context&quot;</span><span class="p">,</span> <span class="s2">&quot;moderations&quot;</span><span class="p">,</span> <span class="s2">&quot;direction&quot;</span><span class="p">,</span> <span class="s2">&quot;start_at&quot;</span><span class="p">)),</span> <span class="nv">$options</span><span class="p">);</span>    
<a name="Api.php-56"></a>  <span class="p">}</span>
<a name="Api.php-57"></a>  
<a name="Api.php-58"></a>  <span class="k">function</span> <span class="nf">resources_by_tag</span><span class="p">(</span><span class="nv">$tag</span><span class="p">,</span> <span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Api.php-59"></a>    <span class="nv">$resource_type</span> <span class="o">=</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;resource_type&quot;</span><span class="p">,</span> <span class="s2">&quot;image&quot;</span><span class="p">);</span>
<a name="Api.php-60"></a>    <span class="nv">$uri</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;resources&quot;</span><span class="p">,</span> <span class="nv">$resource_type</span><span class="p">,</span> <span class="s2">&quot;tags&quot;</span><span class="p">,</span> <span class="nv">$tag</span><span class="p">);</span>
<a name="Api.php-61"></a>    <span class="k">return</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">call_api</span><span class="p">(</span><span class="s2">&quot;get&quot;</span><span class="p">,</span> <span class="nv">$uri</span><span class="p">,</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">only</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;next_cursor&quot;</span><span class="p">,</span> <span class="s2">&quot;max_results&quot;</span><span class="p">,</span> <span class="s2">&quot;tags&quot;</span><span class="p">,</span> <span class="s2">&quot;context&quot;</span><span class="p">,</span> <span class="s2">&quot;moderations&quot;</span><span class="p">,</span> <span class="s2">&quot;direction&quot;</span><span class="p">)),</span> <span class="nv">$options</span><span class="p">);</span>    
<a name="Api.php-62"></a>  <span class="p">}</span>
<a name="Api.php-63"></a>
<a name="Api.php-64"></a>  <span class="k">function</span> <span class="nf">resources_by_moderation</span><span class="p">(</span><span class="nv">$kind</span><span class="p">,</span> <span class="nv">$status</span><span class="p">,</span> <span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Api.php-65"></a>    <span class="nv">$resource_type</span> <span class="o">=</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;resource_type&quot;</span><span class="p">,</span> <span class="s2">&quot;image&quot;</span><span class="p">);</span>
<a name="Api.php-66"></a>    <span class="nv">$uri</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;resources&quot;</span><span class="p">,</span> <span class="nv">$resource_type</span><span class="p">,</span> <span class="s2">&quot;moderations&quot;</span><span class="p">,</span> <span class="nv">$kind</span><span class="p">,</span> <span class="nv">$status</span><span class="p">);</span>
<a name="Api.php-67"></a>    <span class="k">return</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">call_api</span><span class="p">(</span><span class="s2">&quot;get&quot;</span><span class="p">,</span> <span class="nv">$uri</span><span class="p">,</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">only</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;next_cursor&quot;</span><span class="p">,</span> <span class="s2">&quot;max_results&quot;</span><span class="p">,</span> <span class="s2">&quot;tags&quot;</span><span class="p">,</span> <span class="s2">&quot;context&quot;</span><span class="p">,</span> <span class="s2">&quot;moderations&quot;</span><span class="p">,</span> <span class="s2">&quot;direction&quot;</span><span class="p">)),</span> <span class="nv">$options</span><span class="p">);</span>
<a name="Api.php-68"></a>  <span class="p">}</span>
<a name="Api.php-69"></a>  
<a name="Api.php-70"></a>  <span class="k">function</span> <span class="nf">resources_by_ids</span><span class="p">(</span><span class="nv">$public_ids</span><span class="p">,</span> <span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Api.php-71"></a>    <span class="nv">$resource_type</span> <span class="o">=</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;resource_type&quot;</span><span class="p">,</span> <span class="s2">&quot;image&quot;</span><span class="p">);</span>
<a name="Api.php-72"></a>    <span class="nv">$type</span> <span class="o">=</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;type&quot;</span><span class="p">,</span> <span class="s2">&quot;upload&quot;</span><span class="p">);</span>
<a name="Api.php-73"></a>    <span class="nv">$uri</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;resources&quot;</span><span class="p">,</span> <span class="nv">$resource_type</span><span class="p">,</span> <span class="nv">$type</span><span class="p">);</span>
<a name="Api.php-74"></a>    <span class="nv">$params</span> <span class="o">=</span> <span class="nb">array_merge</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;public_ids&quot;</span> <span class="o">=&gt;</span> <span class="nv">$public_ids</span><span class="p">));</span>
<a name="Api.php-75"></a>    <span class="k">return</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">call_api</span><span class="p">(</span><span class="s2">&quot;get&quot;</span><span class="p">,</span> <span class="nv">$uri</span><span class="p">,</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">only</span><span class="p">(</span><span class="nv">$params</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;public_ids&quot;</span><span class="p">,</span> <span class="s2">&quot;tags&quot;</span><span class="p">,</span> <span class="s2">&quot;moderations&quot;</span><span class="p">,</span> <span class="s2">&quot;context&quot;</span><span class="p">)),</span> <span class="nv">$options</span><span class="p">);</span>    
<a name="Api.php-76"></a>  <span class="p">}</span>
<a name="Api.php-77"></a>  
<a name="Api.php-78"></a>  <span class="k">function</span> <span class="nf">resource</span><span class="p">(</span><span class="nv">$public_id</span><span class="p">,</span> <span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Api.php-79"></a>    <span class="nv">$resource_type</span> <span class="o">=</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;resource_type&quot;</span><span class="p">,</span> <span class="s2">&quot;image&quot;</span><span class="p">);</span>
<a name="Api.php-80"></a>    <span class="nv">$type</span> <span class="o">=</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;type&quot;</span><span class="p">,</span> <span class="s2">&quot;upload&quot;</span><span class="p">);</span>
<a name="Api.php-81"></a>    <span class="nv">$uri</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;resources&quot;</span><span class="p">,</span> <span class="nv">$resource_type</span><span class="p">,</span> <span class="nv">$type</span><span class="p">,</span> <span class="nv">$public_id</span><span class="p">);</span>
<a name="Api.php-82"></a>    <span class="k">return</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">call_api</span><span class="p">(</span><span class="s2">&quot;get&quot;</span><span class="p">,</span> <span class="nv">$uri</span><span class="p">,</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">only</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;exif&quot;</span><span class="p">,</span> <span class="s2">&quot;colors&quot;</span><span class="p">,</span> <span class="s2">&quot;faces&quot;</span><span class="p">,</span> <span class="s2">&quot;image_metadata&quot;</span><span class="p">,</span> <span class="s2">&quot;phash&quot;</span><span class="p">,</span> <span class="s2">&quot;pages&quot;</span><span class="p">,</span> <span class="s2">&quot;coordinates&quot;</span><span class="p">,</span> <span class="s2">&quot;max_results&quot;</span><span class="p">)),</span> <span class="nv">$options</span><span class="p">);</span>      
<a name="Api.php-83"></a>  <span class="p">}</span>
<a name="Api.php-84"></a>
<a name="Api.php-85"></a>  <span class="k">function</span> <span class="nf">restore</span><span class="p">(</span><span class="nv">$public_ids</span><span class="p">,</span> <span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Api.php-86"></a>    <span class="nv">$resource_type</span> <span class="o">=</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;resource_type&quot;</span><span class="p">,</span> <span class="s2">&quot;image&quot;</span><span class="p">);</span>
<a name="Api.php-87"></a>    <span class="nv">$type</span> <span class="o">=</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;type&quot;</span><span class="p">,</span> <span class="s2">&quot;upload&quot;</span><span class="p">);</span>
<a name="Api.php-88"></a>    <span class="nv">$uri</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;resources&quot;</span><span class="p">,</span> <span class="nv">$resource_type</span><span class="p">,</span> <span class="nv">$type</span><span class="p">,</span> <span class="s2">&quot;restore&quot;</span><span class="p">);</span>
<a name="Api.php-89"></a>    <span class="nv">$params</span> <span class="o">=</span> <span class="nb">array_merge</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;public_ids&quot;</span> <span class="o">=&gt;</span> <span class="nv">$public_ids</span><span class="p">));</span>
<a name="Api.php-90"></a>    <span class="k">return</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">call_api</span><span class="p">(</span><span class="s2">&quot;post&quot;</span><span class="p">,</span> <span class="nv">$uri</span><span class="p">,</span> <span class="nv">$params</span><span class="p">,</span> <span class="nv">$options</span><span class="p">);</span>    
<a name="Api.php-91"></a>  <span class="p">}</span>
<a name="Api.php-92"></a>  
<a name="Api.php-93"></a>  <span class="k">function</span> <span class="nf">update</span><span class="p">(</span><span class="nv">$public_id</span><span class="p">,</span> <span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Api.php-94"></a>    <span class="nv">$resource_type</span> <span class="o">=</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;resource_type&quot;</span><span class="p">,</span> <span class="s2">&quot;image&quot;</span><span class="p">);</span>
<a name="Api.php-95"></a>    <span class="nv">$type</span> <span class="o">=</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;type&quot;</span><span class="p">,</span> <span class="s2">&quot;upload&quot;</span><span class="p">);</span>
<a name="Api.php-96"></a>    <span class="nv">$uri</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;resources&quot;</span><span class="p">,</span> <span class="nv">$resource_type</span><span class="p">,</span> <span class="nv">$type</span><span class="p">,</span> <span class="nv">$public_id</span><span class="p">);</span>
<a name="Api.php-97"></a>
<a name="Api.php-98"></a>    <span class="nv">$tags</span> <span class="o">=</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;tags&quot;</span><span class="p">);</span>
<a name="Api.php-99"></a>    <span class="nv">$context</span> <span class="o">=</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;context&quot;</span><span class="p">);</span>
<a name="Api.php-100"></a>    <span class="nv">$face_coordinates</span> <span class="o">=</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;face_coordinates&quot;</span><span class="p">);</span>
<a name="Api.php-101"></a>    <span class="nv">$custom_coordinates</span> <span class="o">=</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;custom_coordinates&quot;</span><span class="p">);</span>
<a name="Api.php-102"></a>    <span class="nv">$update_options</span> <span class="o">=</span> <span class="nb">array_merge</span><span class="p">(</span>
<a name="Api.php-103"></a>      <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">only</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;moderation_status&quot;</span><span class="p">,</span> <span class="s2">&quot;raw_convert&quot;</span><span class="p">,</span> <span class="s2">&quot;ocr&quot;</span><span class="p">,</span> <span class="s2">&quot;categorization&quot;</span><span class="p">,</span> <span class="s2">&quot;detection&quot;</span><span class="p">,</span> <span class="s2">&quot;similarity_search&quot;</span><span class="p">,</span> <span class="s2">&quot;auto_tagging&quot;</span><span class="p">,</span> <span class="s2">&quot;background_removal&quot;</span><span class="p">)),</span>
<a name="Api.php-104"></a>      <span class="k">array</span><span class="p">(</span>
<a name="Api.php-105"></a>        <span class="s2">&quot;tags&quot;</span> <span class="o">=&gt;</span> <span class="nv">$tags</span> <span class="o">?</span> <span class="nb">implode</span><span class="p">(</span><span class="s2">&quot;,&quot;</span><span class="p">,</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">build_array</span><span class="p">(</span><span class="nv">$tags</span><span class="p">))</span> <span class="o">:</span> <span class="nv">$tags</span><span class="p">,</span>
<a name="Api.php-106"></a>        <span class="s2">&quot;context&quot;</span> <span class="o">=&gt;</span> <span class="nv">$context</span> <span class="o">?</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">encode_assoc_array</span><span class="p">(</span><span class="nv">$context</span><span class="p">)</span> <span class="o">:</span> <span class="nv">$context</span><span class="p">,</span>
<a name="Api.php-107"></a>        <span class="s2">&quot;face_coordinates&quot;</span> <span class="o">=&gt;</span> <span class="nv">$face_coordinates</span> <span class="o">?</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">encode_double_array</span><span class="p">(</span><span class="nv">$face_coordinates</span><span class="p">)</span> <span class="o">:</span> <span class="nv">$face_coordinates</span><span class="p">,</span>
<a name="Api.php-108"></a>        <span class="s2">&quot;custom_coordinates&quot;</span> <span class="o">=&gt;</span> <span class="nv">$custom_coordinates</span> <span class="o">?</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">encode_double_array</span><span class="p">(</span><span class="nv">$custom_coordinates</span><span class="p">)</span> <span class="o">:</span> <span class="nv">$custom_coordinates</span><span class="p">,</span>
<a name="Api.php-109"></a>      <span class="p">)</span>
<a name="Api.php-110"></a>    <span class="p">);</span>
<a name="Api.php-111"></a>
<a name="Api.php-112"></a>    <span class="k">return</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">call_api</span><span class="p">(</span><span class="s2">&quot;post&quot;</span><span class="p">,</span> <span class="nv">$uri</span><span class="p">,</span> <span class="nv">$update_options</span><span class="p">,</span> <span class="nv">$options</span><span class="p">);</span>      
<a name="Api.php-113"></a>  <span class="p">}</span>
<a name="Api.php-114"></a>  
<a name="Api.php-115"></a>  <span class="k">function</span> <span class="nf">delete_resources</span><span class="p">(</span><span class="nv">$public_ids</span><span class="p">,</span> <span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Api.php-116"></a>    <span class="nv">$resource_type</span> <span class="o">=</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;resource_type&quot;</span><span class="p">,</span> <span class="s2">&quot;image&quot;</span><span class="p">);</span>
<a name="Api.php-117"></a>    <span class="nv">$type</span> <span class="o">=</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;type&quot;</span><span class="p">,</span> <span class="s2">&quot;upload&quot;</span><span class="p">);</span>
<a name="Api.php-118"></a>    <span class="nv">$uri</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;resources&quot;</span><span class="p">,</span> <span class="nv">$resource_type</span><span class="p">,</span> <span class="nv">$type</span><span class="p">);</span>
<a name="Api.php-119"></a>    <span class="k">return</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">call_api</span><span class="p">(</span><span class="s2">&quot;delete&quot;</span><span class="p">,</span> <span class="nv">$uri</span><span class="p">,</span> <span class="nb">array_merge</span><span class="p">(</span><span class="k">array</span><span class="p">(</span><span class="s2">&quot;public_ids&quot;</span><span class="o">=&gt;</span><span class="nv">$public_ids</span><span class="p">),</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">only</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;keep_original&quot;</span><span class="p">,</span> <span class="s2">&quot;invalidate&quot;</span><span class="p">,</span> <span class="s2">&quot;transformation&quot;</span><span class="p">))),</span> <span class="nv">$options</span><span class="p">);</span>
<a name="Api.php-120"></a>  <span class="p">}</span>
<a name="Api.php-121"></a>
<a name="Api.php-122"></a>  <span class="k">function</span> <span class="nf">delete_resources_by_prefix</span><span class="p">(</span><span class="nv">$prefix</span><span class="p">,</span> <span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Api.php-123"></a>    <span class="nv">$resource_type</span> <span class="o">=</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;resource_type&quot;</span><span class="p">,</span> <span class="s2">&quot;image&quot;</span><span class="p">);</span>
<a name="Api.php-124"></a>    <span class="nv">$type</span> <span class="o">=</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;type&quot;</span><span class="p">,</span> <span class="s2">&quot;upload&quot;</span><span class="p">);</span>
<a name="Api.php-125"></a>    <span class="nv">$uri</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;resources&quot;</span><span class="p">,</span> <span class="nv">$resource_type</span><span class="p">,</span> <span class="nv">$type</span><span class="p">);</span>
<a name="Api.php-126"></a>    <span class="k">return</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">call_api</span><span class="p">(</span><span class="s2">&quot;delete&quot;</span><span class="p">,</span> <span class="nv">$uri</span><span class="p">,</span> <span class="nb">array_merge</span><span class="p">(</span><span class="k">array</span><span class="p">(</span><span class="s2">&quot;prefix&quot;</span><span class="o">=&gt;</span><span class="nv">$prefix</span><span class="p">),</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">only</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;keep_original&quot;</span><span class="p">,</span> <span class="s2">&quot;next_cursor&quot;</span><span class="p">,</span> <span class="s2">&quot;invalidate&quot;</span><span class="p">))),</span> <span class="nv">$options</span><span class="p">);</span>      
<a name="Api.php-127"></a>  <span class="p">}</span>
<a name="Api.php-128"></a>  
<a name="Api.php-129"></a>  <span class="k">function</span> <span class="nf">delete_all_resources</span><span class="p">(</span><span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Api.php-130"></a>    <span class="nv">$resource_type</span> <span class="o">=</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;resource_type&quot;</span><span class="p">,</span> <span class="s2">&quot;image&quot;</span><span class="p">);</span>
<a name="Api.php-131"></a>    <span class="nv">$type</span> <span class="o">=</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;type&quot;</span><span class="p">,</span> <span class="s2">&quot;upload&quot;</span><span class="p">);</span>
<a name="Api.php-132"></a>    <span class="nv">$uri</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;resources&quot;</span><span class="p">,</span> <span class="nv">$resource_type</span><span class="p">,</span> <span class="nv">$type</span><span class="p">);</span>
<a name="Api.php-133"></a>    <span class="k">return</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">call_api</span><span class="p">(</span><span class="s2">&quot;delete&quot;</span><span class="p">,</span> <span class="nv">$uri</span><span class="p">,</span> <span class="nb">array_merge</span><span class="p">(</span><span class="k">array</span><span class="p">(</span><span class="s2">&quot;all&quot;</span><span class="o">=&gt;</span><span class="k">True</span><span class="p">),</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">only</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;keep_original&quot;</span><span class="p">,</span> <span class="s2">&quot;next_cursor&quot;</span><span class="p">,</span> <span class="s2">&quot;invalidate&quot;</span><span class="p">))),</span> <span class="nv">$options</span><span class="p">);</span>      
<a name="Api.php-134"></a>  <span class="p">}</span>  
<a name="Api.php-135"></a>  
<a name="Api.php-136"></a>  <span class="k">function</span> <span class="nf">delete_resources_by_tag</span><span class="p">(</span><span class="nv">$tag</span><span class="p">,</span> <span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Api.php-137"></a>    <span class="nv">$resource_type</span> <span class="o">=</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;resource_type&quot;</span><span class="p">,</span> <span class="s2">&quot;image&quot;</span><span class="p">);</span>
<a name="Api.php-138"></a>    <span class="nv">$uri</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;resources&quot;</span><span class="p">,</span> <span class="nv">$resource_type</span><span class="p">,</span> <span class="s2">&quot;tags&quot;</span><span class="p">,</span> <span class="nv">$tag</span><span class="p">);</span>
<a name="Api.php-139"></a>    <span class="k">return</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">call_api</span><span class="p">(</span><span class="s2">&quot;delete&quot;</span><span class="p">,</span> <span class="nv">$uri</span><span class="p">,</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">only</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;keep_original&quot;</span><span class="p">,</span> <span class="s2">&quot;next_cursor&quot;</span><span class="p">,</span> <span class="s2">&quot;invalidate&quot;</span><span class="p">)),</span> <span class="nv">$options</span><span class="p">);</span>    
<a name="Api.php-140"></a>  <span class="p">}</span>
<a name="Api.php-141"></a>  
<a name="Api.php-142"></a>  <span class="k">function</span> <span class="nf">delete_derived_resources</span><span class="p">(</span><span class="nv">$derived_resource_ids</span><span class="p">,</span> <span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Api.php-143"></a>    <span class="nv">$uri</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;derived_resources&quot;</span><span class="p">);</span>
<a name="Api.php-144"></a>    <span class="k">return</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">call_api</span><span class="p">(</span><span class="s2">&quot;delete&quot;</span><span class="p">,</span> <span class="nv">$uri</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;derived_resource_ids&quot;</span><span class="o">=&gt;</span><span class="nv">$derived_resource_ids</span><span class="p">),</span> <span class="nv">$options</span><span class="p">);</span>      
<a name="Api.php-145"></a>  <span class="p">}</span>
<a name="Api.php-146"></a>
<a name="Api.php-147"></a>  <span class="k">function</span> <span class="nf">tags</span><span class="p">(</span><span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Api.php-148"></a>    <span class="nv">$resource_type</span> <span class="o">=</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;resource_type&quot;</span><span class="p">,</span> <span class="s2">&quot;image&quot;</span><span class="p">);</span>
<a name="Api.php-149"></a>    <span class="nv">$uri</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;tags&quot;</span><span class="p">,</span> <span class="nv">$resource_type</span><span class="p">);</span>
<a name="Api.php-150"></a>    <span class="k">return</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">call_api</span><span class="p">(</span><span class="s2">&quot;get&quot;</span><span class="p">,</span> <span class="nv">$uri</span><span class="p">,</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">only</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;next_cursor&quot;</span><span class="p">,</span> <span class="s2">&quot;max_results&quot;</span><span class="p">,</span> <span class="s2">&quot;prefix&quot;</span><span class="p">)),</span> <span class="nv">$options</span><span class="p">);</span>
<a name="Api.php-151"></a>  <span class="p">}</span>
<a name="Api.php-152"></a>  
<a name="Api.php-153"></a>  <span class="k">function</span> <span class="nf">transformations</span><span class="p">(</span><span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Api.php-154"></a>    <span class="k">return</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">call_api</span><span class="p">(</span><span class="s2">&quot;get&quot;</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;transformations&quot;</span><span class="p">),</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">only</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;next_cursor&quot;</span><span class="p">,</span> <span class="s2">&quot;max_results&quot;</span><span class="p">)),</span> <span class="nv">$options</span><span class="p">);</span>    
<a name="Api.php-155"></a>  <span class="p">}</span>
<a name="Api.php-156"></a>  
<a name="Api.php-157"></a>  <span class="k">function</span> <span class="nf">transformation</span><span class="p">(</span><span class="nv">$transformation</span><span class="p">,</span> <span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Api.php-158"></a>    <span class="nv">$uri</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;transformations&quot;</span><span class="p">,</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">transformation_string</span><span class="p">(</span><span class="nv">$transformation</span><span class="p">));</span>
<a name="Api.php-159"></a>    <span class="k">return</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">call_api</span><span class="p">(</span><span class="s2">&quot;get&quot;</span><span class="p">,</span> <span class="nv">$uri</span><span class="p">,</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">only</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;next_cursor&quot;</span><span class="p">,</span> <span class="s2">&quot;max_results&quot;</span><span class="p">)),</span> <span class="nv">$options</span><span class="p">);</span>
<a name="Api.php-160"></a>  <span class="p">}</span>
<a name="Api.php-161"></a>  
<a name="Api.php-162"></a>  <span class="k">function</span> <span class="nf">delete_transformation</span><span class="p">(</span><span class="nv">$transformation</span><span class="p">,</span> <span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Api.php-163"></a>    <span class="nv">$uri</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;transformations&quot;</span><span class="p">,</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">transformation_string</span><span class="p">(</span><span class="nv">$transformation</span><span class="p">));</span>
<a name="Api.php-164"></a>    <span class="nv">$params</span> <span class="o">=</span> <span class="k">array</span><span class="p">();</span>
<a name="Api.php-165"></a>    <span class="k">if</span> <span class="p">(</span><span class="nb">isset</span><span class="p">(</span><span class="nv">$options</span><span class="p">[</span><span class="s2">&quot;invalidate&quot;</span><span class="p">]))</span> <span class="p">{</span>
<a name="Api.php-166"></a>      <span class="nv">$params</span><span class="p">[</span><span class="s2">&quot;invalidate&quot;</span><span class="p">]</span> <span class="o">=</span> <span class="nv">$options</span><span class="p">[</span><span class="s2">&quot;invalidate&quot;</span><span class="p">];</span>
<a name="Api.php-167"></a>    <span class="p">}</span>
<a name="Api.php-168"></a>    <span class="k">return</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">call_api</span><span class="p">(</span><span class="s2">&quot;delete&quot;</span><span class="p">,</span> <span class="nv">$uri</span><span class="p">,</span> <span class="nv">$params</span><span class="p">,</span> <span class="nv">$options</span><span class="p">);</span>
<a name="Api.php-169"></a>  <span class="p">}</span>
<a name="Api.php-170"></a>
<a name="Api.php-171"></a>  <span class="c1"># updates - currently only supported update is the &quot;allowed_for_strict&quot; boolean flag</span>
<a name="Api.php-172"></a>  <span class="k">function</span> <span class="nf">update_transformation</span><span class="p">(</span><span class="nv">$transformation</span><span class="p">,</span> <span class="nv">$updates</span><span class="o">=</span><span class="k">array</span><span class="p">(),</span> <span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Api.php-173"></a>    <span class="nv">$uri</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;transformations&quot;</span><span class="p">,</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">transformation_string</span><span class="p">(</span><span class="nv">$transformation</span><span class="p">));</span>
<a name="Api.php-174"></a>    <span class="nv">$params</span> <span class="o">=</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">only</span><span class="p">(</span><span class="nv">$updates</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;allowed_for_strict&quot;</span><span class="p">));</span>
<a name="Api.php-175"></a>    <span class="k">if</span> <span class="p">(</span><span class="nb">isset</span><span class="p">(</span><span class="nv">$updates</span><span class="p">[</span><span class="s2">&quot;unsafe_update&quot;</span><span class="p">]))</span> <span class="p">{</span>
<a name="Api.php-176"></a>      <span class="nv">$params</span><span class="p">[</span><span class="s2">&quot;unsafe_update&quot;</span><span class="p">]</span> <span class="o">=</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">transformation_string</span><span class="p">(</span><span class="nv">$updates</span><span class="p">[</span><span class="s2">&quot;unsafe_update&quot;</span><span class="p">]);</span>  
<a name="Api.php-177"></a>    <span class="p">}</span>
<a name="Api.php-178"></a>    <span class="k">return</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">call_api</span><span class="p">(</span><span class="s2">&quot;put&quot;</span><span class="p">,</span> <span class="nv">$uri</span><span class="p">,</span> <span class="nv">$params</span><span class="p">,</span> <span class="nv">$options</span><span class="p">);</span>    
<a name="Api.php-179"></a>  <span class="p">}</span>
<a name="Api.php-180"></a>  
<a name="Api.php-181"></a>  <span class="k">function</span> <span class="nf">create_transformation</span><span class="p">(</span><span class="nv">$name</span><span class="p">,</span> <span class="nv">$definition</span><span class="p">,</span> <span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Api.php-182"></a>    <span class="nv">$uri</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;transformations&quot;</span><span class="p">,</span> <span class="nv">$name</span><span class="p">);</span>
<a name="Api.php-183"></a>    <span class="k">return</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">call_api</span><span class="p">(</span><span class="s2">&quot;post&quot;</span><span class="p">,</span> <span class="nv">$uri</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;transformation&quot;</span><span class="o">=&gt;</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">transformation_string</span><span class="p">(</span><span class="nv">$definition</span><span class="p">)),</span> <span class="nv">$options</span><span class="p">);</span>    
<a name="Api.php-184"></a>  <span class="p">}</span>
<a name="Api.php-185"></a>  
<a name="Api.php-186"></a>  <span class="k">function</span> <span class="nf">upload_presets</span><span class="p">(</span><span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Api.php-187"></a>    <span class="k">return</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">call_api</span><span class="p">(</span><span class="s2">&quot;get&quot;</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;upload_presets&quot;</span><span class="p">),</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">only</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;next_cursor&quot;</span><span class="p">,</span> <span class="s2">&quot;max_results&quot;</span><span class="p">)),</span> <span class="nv">$options</span><span class="p">);</span>    
<a name="Api.php-188"></a>  <span class="p">}</span>
<a name="Api.php-189"></a>  
<a name="Api.php-190"></a>  <span class="k">function</span> <span class="nf">upload_preset</span><span class="p">(</span><span class="nv">$name</span><span class="p">,</span> <span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Api.php-191"></a>    <span class="nv">$uri</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;upload_presets&quot;</span><span class="p">,</span> <span class="nv">$name</span><span class="p">);</span>
<a name="Api.php-192"></a>    <span class="k">return</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">call_api</span><span class="p">(</span><span class="s2">&quot;get&quot;</span><span class="p">,</span> <span class="nv">$uri</span><span class="p">,</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">only</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;max_results&quot;</span><span class="p">)),</span> <span class="nv">$options</span><span class="p">);</span>    
<a name="Api.php-193"></a>  <span class="p">}</span>
<a name="Api.php-194"></a>  
<a name="Api.php-195"></a>  <span class="k">function</span> <span class="nf">delete_upload_preset</span><span class="p">(</span><span class="nv">$name</span><span class="p">,</span> <span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Api.php-196"></a>    <span class="nv">$uri</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;upload_presets&quot;</span><span class="p">,</span> <span class="nv">$name</span><span class="p">);</span>
<a name="Api.php-197"></a>    <span class="k">return</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">call_api</span><span class="p">(</span><span class="s2">&quot;delete&quot;</span><span class="p">,</span> <span class="nv">$uri</span><span class="p">,</span> <span class="k">array</span><span class="p">(),</span> <span class="nv">$options</span><span class="p">);</span>    
<a name="Api.php-198"></a>  <span class="p">}</span>
<a name="Api.php-199"></a>    
<a name="Api.php-200"></a>  <span class="k">function</span> <span class="nf">update_upload_preset</span><span class="p">(</span><span class="nv">$name</span><span class="p">,</span> <span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Api.php-201"></a>    <span class="nv">$uri</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;upload_presets&quot;</span><span class="p">,</span> <span class="nv">$name</span><span class="p">);</span>
<a name="Api.php-202"></a>    <span class="nv">$params</span> <span class="o">=</span> <span class="nx">\Cloudinary\Uploader</span><span class="o">::</span><span class="na">build_upload_params</span><span class="p">(</span><span class="nv">$options</span><span class="p">);</span>
<a name="Api.php-203"></a>    <span class="k">return</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">call_api</span><span class="p">(</span><span class="s2">&quot;put&quot;</span><span class="p">,</span> <span class="nv">$uri</span><span class="p">,</span> <span class="nb">array_merge</span><span class="p">(</span><span class="nv">$params</span><span class="p">,</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">only</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;unsigned&quot;</span><span class="p">,</span> <span class="s2">&quot;disallow_public_id&quot;</span><span class="p">))),</span> <span class="nv">$options</span><span class="p">);</span>    
<a name="Api.php-204"></a>  <span class="p">}</span>
<a name="Api.php-205"></a>  
<a name="Api.php-206"></a>  <span class="k">function</span> <span class="nf">create_upload_preset</span><span class="p">(</span><span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Api.php-207"></a>    <span class="nv">$params</span> <span class="o">=</span> <span class="nx">\Cloudinary\Uploader</span><span class="o">::</span><span class="na">build_upload_params</span><span class="p">(</span><span class="nv">$options</span><span class="p">);</span>
<a name="Api.php-208"></a>    <span class="k">return</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">call_api</span><span class="p">(</span><span class="s2">&quot;post&quot;</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;upload_presets&quot;</span><span class="p">),</span> <span class="nb">array_merge</span><span class="p">(</span><span class="nv">$params</span><span class="p">,</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">only</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;name&quot;</span><span class="p">,</span> <span class="s2">&quot;unsigned&quot;</span><span class="p">,</span> <span class="s2">&quot;disallow_public_id&quot;</span><span class="p">))),</span> <span class="nv">$options</span><span class="p">);</span>    
<a name="Api.php-209"></a>  <span class="p">}</span>
<a name="Api.php-210"></a>
<a name="Api.php-211"></a>  <span class="k">function</span> <span class="nf">root_folders</span><span class="p">(</span><span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Api.php-212"></a>    <span class="k">return</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">call_api</span><span class="p">(</span><span class="s2">&quot;get&quot;</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;folders&quot;</span><span class="p">),</span> <span class="k">array</span><span class="p">(),</span> <span class="nv">$options</span><span class="p">);</span>
<a name="Api.php-213"></a>  <span class="p">}</span>
<a name="Api.php-214"></a>
<a name="Api.php-215"></a>  <span class="k">function</span> <span class="nf">subfolders</span><span class="p">(</span><span class="nv">$of_folder_path</span><span class="p">,</span> <span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Api.php-216"></a>    <span class="k">return</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">call_api</span><span class="p">(</span><span class="s2">&quot;get&quot;</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;folders&quot;</span><span class="p">,</span> <span class="nv">$of_folder_path</span><span class="p">),</span> <span class="k">array</span><span class="p">(),</span> <span class="nv">$options</span><span class="p">);</span>
<a name="Api.php-217"></a>  <span class="p">}</span>
<a name="Api.php-218"></a>
<a name="Api.php-219"></a>  <span class="k">function</span> <span class="nf">upload_mappings</span><span class="p">(</span><span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Api.php-220"></a>    <span class="k">return</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">call_api</span><span class="p">(</span><span class="s2">&quot;get&quot;</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;upload_mappings&quot;</span><span class="p">),</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">only</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;next_cursor&quot;</span><span class="p">,</span> <span class="s2">&quot;max_results&quot;</span><span class="p">)),</span> <span class="nv">$options</span><span class="p">);</span>    
<a name="Api.php-221"></a>  <span class="p">}</span>
<a name="Api.php-222"></a>  
<a name="Api.php-223"></a>  <span class="k">function</span> <span class="nf">upload_mapping</span><span class="p">(</span><span class="nv">$name</span><span class="p">,</span> <span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Api.php-224"></a>    <span class="nv">$uri</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;upload_mappings&quot;</span><span class="p">);</span>
<a name="Api.php-225"></a>    <span class="nv">$params</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;folder&quot;</span><span class="o">=&gt;</span><span class="nv">$name</span><span class="p">);</span>
<a name="Api.php-226"></a>    <span class="k">return</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">call_api</span><span class="p">(</span><span class="s2">&quot;get&quot;</span><span class="p">,</span> <span class="nv">$uri</span><span class="p">,</span> <span class="nv">$params</span><span class="p">,</span> <span class="nv">$options</span><span class="p">);</span>    
<a name="Api.php-227"></a>  <span class="p">}</span>
<a name="Api.php-228"></a>  
<a name="Api.php-229"></a>  <span class="k">function</span> <span class="nf">delete_upload_mapping</span><span class="p">(</span><span class="nv">$name</span><span class="p">,</span> <span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Api.php-230"></a>    <span class="nv">$uri</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;upload_mappings&quot;</span><span class="p">);</span>
<a name="Api.php-231"></a>    <span class="nv">$params</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;folder&quot;</span><span class="o">=&gt;</span><span class="nv">$name</span><span class="p">);</span>
<a name="Api.php-232"></a>    <span class="k">return</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">call_api</span><span class="p">(</span><span class="s2">&quot;delete&quot;</span><span class="p">,</span> <span class="nv">$uri</span><span class="p">,</span> <span class="nv">$params</span><span class="p">,</span> <span class="nv">$options</span><span class="p">);</span>    
<a name="Api.php-233"></a>  <span class="p">}</span>
<a name="Api.php-234"></a>    
<a name="Api.php-235"></a>  <span class="k">function</span> <span class="nf">update_upload_mapping</span><span class="p">(</span><span class="nv">$name</span><span class="p">,</span> <span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Api.php-236"></a>    <span class="nv">$uri</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;upload_mappings&quot;</span><span class="p">);</span>
<a name="Api.php-237"></a>    <span class="nv">$params</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;folder&quot;</span><span class="o">=&gt;</span><span class="nv">$name</span><span class="p">);</span>
<a name="Api.php-238"></a>    <span class="k">return</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">call_api</span><span class="p">(</span><span class="s2">&quot;put&quot;</span><span class="p">,</span> <span class="nv">$uri</span><span class="p">,</span> <span class="nb">array_merge</span><span class="p">(</span><span class="nv">$params</span><span class="p">,</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">only</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;template&quot;</span><span class="p">))),</span> <span class="nv">$options</span><span class="p">);</span>    
<a name="Api.php-239"></a>  <span class="p">}</span>
<a name="Api.php-240"></a>  
<a name="Api.php-241"></a>  <span class="k">function</span> <span class="nf">create_upload_mapping</span><span class="p">(</span><span class="nv">$name</span><span class="p">,</span> <span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Api.php-242"></a>    <span class="nv">$uri</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;upload_mappings&quot;</span><span class="p">);</span>
<a name="Api.php-243"></a>    <span class="nv">$params</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;folder&quot;</span><span class="o">=&gt;</span><span class="nv">$name</span><span class="p">);</span>
<a name="Api.php-244"></a>    <span class="k">return</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">call_api</span><span class="p">(</span><span class="s2">&quot;post&quot;</span><span class="p">,</span> <span class="nv">$uri</span><span class="p">,</span> <span class="nb">array_merge</span><span class="p">(</span><span class="nv">$params</span><span class="p">,</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">only</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;template&quot;</span><span class="p">))),</span> <span class="nv">$options</span><span class="p">);</span>    
<a name="Api.php-245"></a>  <span class="p">}</span>
<a name="Api.php-246"></a>
<a name="Api.php-247"></a>  <span class="sd">/**</span>
<a name="Api.php-248"></a><span class="sd">   * List all streaming profiles associated with the current customer</span>
<a name="Api.php-249"></a><span class="sd">   * @param array $options options</span>
<a name="Api.php-250"></a><span class="sd">   * @return Api\Response An array with a &quot;data&quot; key for results</span>
<a name="Api.php-251"></a><span class="sd">   */</span>
<a name="Api.php-252"></a>  <span class="k">function</span> <span class="nf">list_streaming_profiles</span><span class="p">(</span><span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Api.php-253"></a>    <span class="k">return</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">call_api</span><span class="p">(</span><span class="s2">&quot;get&quot;</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;streaming_profiles&quot;</span><span class="p">),</span> <span class="k">array</span><span class="p">(),</span> <span class="nv">$options</span><span class="p">);</span>
<a name="Api.php-254"></a>  <span class="p">}</span>
<a name="Api.php-255"></a>
<a name="Api.php-256"></a>  <span class="sd">/**</span>
<a name="Api.php-257"></a><span class="sd">   * Get the information of a single streaming profile</span>
<a name="Api.php-258"></a><span class="sd">   * @param $name the name of the profile</span>
<a name="Api.php-259"></a><span class="sd">   * @param array $options other options</span>
<a name="Api.php-260"></a><span class="sd">   * @return Api\Response An array with a &quot;data&quot; key for results</span>
<a name="Api.php-261"></a><span class="sd">   */</span>
<a name="Api.php-262"></a>  <span class="k">function</span> <span class="nf">get_streaming_profile</span><span class="p">(</span><span class="nv">$name</span><span class="p">,</span> <span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Api.php-263"></a>    <span class="nv">$uri</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;streaming_profiles/&quot;</span> <span class="o">.</span> <span class="nv">$name</span><span class="p">);</span>
<a name="Api.php-264"></a>    <span class="k">return</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">call_api</span><span class="p">(</span><span class="s2">&quot;get&quot;</span><span class="p">,</span> <span class="nv">$uri</span><span class="p">,</span> <span class="k">array</span><span class="p">(),</span> <span class="nv">$options</span><span class="p">);</span>
<a name="Api.php-265"></a>  <span class="p">}</span>
<a name="Api.php-266"></a>
<a name="Api.php-267"></a>  <span class="sd">/**</span>
<a name="Api.php-268"></a><span class="sd">   * Delete a streaming profile information. Predefined profiles are restored to the default setting.</span>
<a name="Api.php-269"></a><span class="sd">   * @param $name the name of the streaming profile to delete</span>
<a name="Api.php-270"></a><span class="sd">   * @param array $options additional options</span>
<a name="Api.php-271"></a><span class="sd">   * @return Api\Response</span>
<a name="Api.php-272"></a><span class="sd">   */</span>
<a name="Api.php-273"></a>  <span class="k">function</span> <span class="nf">delete_streaming_profile</span><span class="p">(</span><span class="nv">$name</span><span class="p">,</span> <span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Api.php-274"></a>    <span class="nv">$uri</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;streaming_profiles/&quot;</span> <span class="o">.</span> <span class="nv">$name</span><span class="p">);</span>
<a name="Api.php-275"></a>    <span class="k">return</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">call_api</span><span class="p">(</span><span class="s2">&quot;delete&quot;</span><span class="p">,</span> <span class="nv">$uri</span><span class="p">,</span> <span class="k">array</span><span class="p">(),</span> <span class="nv">$options</span><span class="p">);</span>
<a name="Api.php-276"></a>  <span class="p">}</span>
<a name="Api.php-277"></a>
<a name="Api.php-278"></a>  <span class="sd">/**</span>
<a name="Api.php-279"></a><span class="sd">   * Update an existing streaming profile</span>
<a name="Api.php-280"></a><span class="sd">   * @param $name the name of the prodile</span>
<a name="Api.php-281"></a><span class="sd">   * @param array $options additional options</span>
<a name="Api.php-282"></a><span class="sd">   * @return Api\Response</span>
<a name="Api.php-283"></a><span class="sd">   */</span>
<a name="Api.php-284"></a>  <span class="k">function</span> <span class="nf">update_streaming_profile</span><span class="p">(</span><span class="nv">$name</span><span class="p">,</span> <span class="nv">$options</span><span class="o">=</span><span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Api.php-285"></a>    <span class="nv">$uri</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;streaming_profiles/&quot;</span> <span class="o">.</span> <span class="nv">$name</span><span class="p">);</span>
<a name="Api.php-286"></a>    <span class="nv">$params</span> <span class="o">=</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">prepare_streaming_profile_params</span><span class="p">(</span><span class="nv">$options</span><span class="p">);</span>
<a name="Api.php-287"></a>    <span class="k">return</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">call_api</span><span class="p">(</span><span class="s2">&quot;put&quot;</span><span class="p">,</span> <span class="nv">$uri</span><span class="p">,</span> <span class="nv">$params</span><span class="p">,</span> <span class="nv">$options</span><span class="p">);</span>
<a name="Api.php-288"></a>  <span class="p">}</span>
<a name="Api.php-289"></a>
<a name="Api.php-290"></a>  <span class="sd">/**</span>
<a name="Api.php-291"></a><span class="sd">   * Create a new streaming profile</span>
<a name="Api.php-292"></a><span class="sd">   * @param $name the name of the new profile. if the name is of a predefined profile, the profile will be modified.</span>
<a name="Api.php-293"></a><span class="sd">   * @param array $options additional options</span>
<a name="Api.php-294"></a><span class="sd">   * @return Api\Response</span>
<a name="Api.php-295"></a><span class="sd">   */</span>
<a name="Api.php-296"></a>  <span class="k">function</span> <span class="nf">create_streaming_profile</span><span class="p">(</span><span class="nv">$name</span><span class="p">,</span> <span class="nv">$options</span> <span class="o">=</span> <span class="k">array</span><span class="p">())</span> <span class="p">{</span>
<a name="Api.php-297"></a>    <span class="nv">$uri</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;streaming_profiles&quot;</span><span class="p">);</span>
<a name="Api.php-298"></a>    <span class="nv">$params</span> <span class="o">=</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">prepare_streaming_profile_params</span><span class="p">(</span><span class="nv">$options</span><span class="p">);</span>
<a name="Api.php-299"></a>    <span class="nv">$params</span><span class="p">[</span><span class="s2">&quot;name&quot;</span><span class="p">]</span> <span class="o">=</span> <span class="nv">$name</span><span class="p">;</span>
<a name="Api.php-300"></a>    <span class="k">return</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">call_api</span><span class="p">(</span><span class="s2">&quot;post&quot;</span><span class="p">,</span> <span class="nv">$uri</span><span class="p">,</span> <span class="nv">$params</span><span class="p">,</span> <span class="nv">$options</span><span class="p">);</span>
<a name="Api.php-301"></a>  <span class="p">}</span>
<a name="Api.php-302"></a>    
<a name="Api.php-303"></a>  <span class="k">function</span> <span class="nf">call_api</span><span class="p">(</span><span class="nv">$method</span><span class="p">,</span> <span class="nv">$uri</span><span class="p">,</span> <span class="nv">$params</span><span class="p">,</span> <span class="o">&amp;</span><span class="nv">$options</span><span class="p">)</span> <span class="p">{</span>
<a name="Api.php-304"></a>    <span class="nv">$prefix</span> <span class="o">=</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;upload_prefix&quot;</span><span class="p">,</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">config_get</span><span class="p">(</span><span class="s2">&quot;upload_prefix&quot;</span><span class="p">,</span> <span class="s2">&quot;https://api.cloudinary.com&quot;</span><span class="p">));</span>
<a name="Api.php-305"></a>    <span class="nv">$cloud_name</span> <span class="o">=</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;cloud_name&quot;</span><span class="p">,</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">config_get</span><span class="p">(</span><span class="s2">&quot;cloud_name&quot;</span><span class="p">));</span>
<a name="Api.php-306"></a>    <span class="k">if</span> <span class="p">(</span><span class="o">!</span><span class="nv">$cloud_name</span><span class="p">)</span> <span class="k">throw</span> <span class="k">new</span> <span class="nx">\InvalidArgumentException</span><span class="p">(</span><span class="s2">&quot;Must supply cloud_name&quot;</span><span class="p">);</span>
<a name="Api.php-307"></a>    <span class="nv">$api_key</span> <span class="o">=</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;api_key&quot;</span><span class="p">,</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">config_get</span><span class="p">(</span><span class="s2">&quot;api_key&quot;</span><span class="p">));</span>
<a name="Api.php-308"></a>    <span class="k">if</span> <span class="p">(</span><span class="o">!</span><span class="nv">$api_key</span><span class="p">)</span> <span class="k">throw</span> <span class="k">new</span> <span class="nx">\InvalidArgumentException</span><span class="p">(</span><span class="s2">&quot;Must supply api_key&quot;</span><span class="p">);</span>
<a name="Api.php-309"></a>    <span class="nv">$api_secret</span> <span class="o">=</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;api_secret&quot;</span><span class="p">,</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">config_get</span><span class="p">(</span><span class="s2">&quot;api_secret&quot;</span><span class="p">));</span>
<a name="Api.php-310"></a>    <span class="k">if</span> <span class="p">(</span><span class="o">!</span><span class="nv">$api_secret</span><span class="p">)</span> <span class="k">throw</span> <span class="k">new</span> <span class="nx">\InvalidArgumentException</span><span class="p">(</span><span class="s2">&quot;Must supply api_secret&quot;</span><span class="p">);</span>
<a name="Api.php-311"></a>    <span class="nv">$api_url</span> <span class="o">=</span> <span class="nb">implode</span><span class="p">(</span><span class="s2">&quot;/&quot;</span><span class="p">,</span> <span class="nb">array_merge</span><span class="p">(</span><span class="k">array</span><span class="p">(</span><span class="nv">$prefix</span><span class="p">,</span> <span class="s2">&quot;v1_1&quot;</span><span class="p">,</span> <span class="nv">$cloud_name</span><span class="p">),</span> <span class="nv">$uri</span><span class="p">));</span>
<a name="Api.php-312"></a>    <span class="nv">$params</span> <span class="o">=</span> <span class="nb">array_filter</span><span class="p">(</span><span class="nv">$params</span><span class="p">,</span><span class="k">function</span><span class="p">(</span><span class="nv">$v</span><span class="p">){</span> <span class="k">return</span> <span class="o">!</span><span class="nb">is_null</span><span class="p">(</span><span class="nv">$v</span><span class="p">)</span> <span class="o">&amp;&amp;</span> <span class="p">(</span><span class="nv">$v</span> <span class="o">!==</span> <span class="s2">&quot;&quot;</span> <span class="p">);});</span>
<a name="Api.php-313"></a>    <span class="k">if</span> <span class="p">(</span><span class="nv">$method</span> <span class="o">==</span> <span class="s2">&quot;get&quot;</span><span class="p">)</span>
<a name="Api.php-314"></a>    <span class="p">{</span>
<a name="Api.php-315"></a>        <span class="nv">$api_url</span> <span class="o">.=</span> <span class="s2">&quot;?&quot;</span> <span class="o">.</span> <span class="nb">preg_replace</span><span class="p">(</span><span class="s2">&quot;/%5B\d+%5D/&quot;</span><span class="p">,</span> <span class="s2">&quot;%5B%5D&quot;</span><span class="p">,</span> <span class="nb">http_build_query</span><span class="p">(</span><span class="nv">$params</span><span class="p">));</span>
<a name="Api.php-316"></a>
<a name="Api.php-317"></a>    <span class="p">}</span>
<a name="Api.php-318"></a>
<a name="Api.php-319"></a>    <span class="nv">$ch</span> <span class="o">=</span> <span class="nb">curl_init</span><span class="p">(</span><span class="nv">$api_url</span><span class="p">);</span>
<a name="Api.php-320"></a>
<a name="Api.php-321"></a>    <span class="k">if</span> <span class="p">(</span><span class="nv">$method</span> <span class="o">!=</span> <span class="s2">&quot;get&quot;</span><span class="p">)</span>
<a name="Api.php-322"></a>    <span class="p">{</span>
<a name="Api.php-323"></a>        <span class="nv">$post_params</span> <span class="o">=</span> <span class="k">array</span><span class="p">();</span>
<a name="Api.php-324"></a>        <span class="k">foreach</span> <span class="p">(</span><span class="nv">$params</span> <span class="k">as</span> <span class="nv">$key</span> <span class="o">=&gt;</span> <span class="nv">$value</span><span class="p">)</span> <span class="p">{</span>
<a name="Api.php-325"></a>            <span class="k">if</span> <span class="p">(</span><span class="nb">is_array</span><span class="p">(</span><span class="nv">$value</span><span class="p">))</span> <span class="p">{</span>
<a name="Api.php-326"></a>                <span class="nv">$i</span> <span class="o">=</span> <span class="mi">0</span><span class="p">;</span>
<a name="Api.php-327"></a>                <span class="k">foreach</span> <span class="p">(</span><span class="nv">$value</span> <span class="k">as</span> <span class="nv">$item</span><span class="p">)</span> <span class="p">{</span>
<a name="Api.php-328"></a>                    <span class="nv">$post_params</span><span class="p">[</span><span class="nv">$key</span> <span class="o">.</span> <span class="s2">&quot;[</span><span class="si">$i</span><span class="s2">]&quot;</span><span class="p">]</span> <span class="o">=</span> <span class="nv">$item</span><span class="p">;</span>
<a name="Api.php-329"></a>                    <span class="nv">$i</span><span class="o">++</span><span class="p">;</span>
<a name="Api.php-330"></a>                <span class="p">}</span>
<a name="Api.php-331"></a>            <span class="p">}</span> <span class="k">else</span> <span class="p">{</span>
<a name="Api.php-332"></a>                <span class="nv">$post_params</span><span class="p">[</span><span class="nv">$key</span><span class="p">]</span> <span class="o">=</span> <span class="nv">$value</span><span class="p">;</span>
<a name="Api.php-333"></a>            <span class="p">}</span>
<a name="Api.php-334"></a>        <span class="p">}</span>
<a name="Api.php-335"></a>        <span class="nb">curl_setopt</span><span class="p">(</span><span class="nv">$ch</span><span class="p">,</span> <span class="nx">CURLOPT_POSTFIELDS</span><span class="p">,</span> <span class="nv">$post_params</span><span class="p">);</span>
<a name="Api.php-336"></a>
<a name="Api.php-337"></a>    <span class="p">}</span>
<a name="Api.php-338"></a>    <span class="nb">curl_setopt</span><span class="p">(</span><span class="nv">$ch</span><span class="p">,</span> <span class="nx">CURLOPT_HEADER</span><span class="p">,</span> <span class="mi">1</span><span class="p">);</span>
<a name="Api.php-339"></a>    <span class="nb">curl_setopt</span><span class="p">(</span><span class="nv">$ch</span><span class="p">,</span> <span class="nx">CURLOPT_CUSTOMREQUEST</span><span class="p">,</span> <span class="nb">strtoupper</span><span class="p">(</span><span class="nv">$method</span><span class="p">));</span>
<a name="Api.php-340"></a>    <span class="nb">curl_setopt</span><span class="p">(</span><span class="nv">$ch</span><span class="p">,</span> <span class="nx">CURLOPT_RETURNTRANSFER</span><span class="p">,</span> <span class="mi">1</span><span class="p">);</span>
<a name="Api.php-341"></a>    <span class="nb">curl_setopt</span><span class="p">(</span><span class="nv">$ch</span><span class="p">,</span> <span class="nx">CURLOPT_TIMEOUT</span><span class="p">,</span> <span class="mi">60</span><span class="p">);</span>
<a name="Api.php-342"></a>    <span class="nb">curl_setopt</span><span class="p">(</span><span class="nv">$ch</span><span class="p">,</span> <span class="nx">CURLOPT_HTTPAUTH</span><span class="p">,</span> <span class="nx">CURLAUTH_BASIC</span><span class="p">);</span>
<a name="Api.php-343"></a>    <span class="nb">curl_setopt</span><span class="p">(</span><span class="nv">$ch</span><span class="p">,</span> <span class="nx">CURLOPT_USERPWD</span><span class="p">,</span> <span class="s2">&quot;</span><span class="si">{</span><span class="nv">$api_key</span><span class="si">}</span><span class="s2">:</span><span class="si">{</span><span class="nv">$api_secret</span><span class="si">}</span><span class="s2">&quot;</span><span class="p">);</span>
<a name="Api.php-344"></a>    <span class="nb">curl_setopt</span><span class="p">(</span><span class="nv">$ch</span><span class="p">,</span> <span class="nx">CURLOPT_CAINFO</span><span class="p">,</span><span class="nb">realpath</span><span class="p">(</span><span class="nb">dirname</span><span class="p">(</span><span class="no">__FILE__</span><span class="p">))</span><span class="o">.</span><span class="nx">DIRECTORY_SEPARATOR</span><span class="o">.</span><span class="s2">&quot;cacert.pem&quot;</span><span class="p">);</span>
<a name="Api.php-345"></a>    <span class="nb">curl_setopt</span><span class="p">(</span><span class="nv">$ch</span><span class="p">,</span> <span class="nx">CURLOPT_USERAGENT</span><span class="p">,</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">userAgent</span><span class="p">());</span>
<a name="Api.php-346"></a>    <span class="nb">curl_setopt</span><span class="p">(</span><span class="nv">$ch</span><span class="p">,</span> <span class="nx">CURLOPT_PROXY</span><span class="p">,</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="s2">&quot;api_proxy&quot;</span><span class="p">,</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">config_get</span><span class="p">(</span><span class="s2">&quot;api_proxy&quot;</span><span class="p">)));</span>
<a name="Api.php-347"></a>    <span class="nv">$response</span> <span class="o">=</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">execute</span><span class="p">(</span><span class="nv">$ch</span><span class="p">);</span>
<a name="Api.php-348"></a>    <span class="nv">$curl_error</span> <span class="o">=</span> <span class="k">NULL</span><span class="p">;</span>
<a name="Api.php-349"></a>    <span class="k">if</span><span class="p">(</span><span class="nb">curl_errno</span><span class="p">(</span><span class="nv">$ch</span><span class="p">))</span>
<a name="Api.php-350"></a>    <span class="p">{</span>
<a name="Api.php-351"></a>        <span class="nv">$curl_error</span> <span class="o">=</span> <span class="nb">curl_error</span><span class="p">(</span><span class="nv">$ch</span><span class="p">);</span>
<a name="Api.php-352"></a>    <span class="p">}</span>
<a name="Api.php-353"></a>    <span class="nb">curl_close</span><span class="p">(</span><span class="nv">$ch</span><span class="p">);</span>
<a name="Api.php-354"></a>    <span class="k">if</span> <span class="p">(</span><span class="nv">$curl_error</span> <span class="o">!=</span> <span class="k">NULL</span><span class="p">)</span> <span class="p">{</span>
<a name="Api.php-355"></a>        <span class="k">throw</span> <span class="k">new</span> <span class="nx">\Cloudinary\Api\GeneralError</span><span class="p">(</span><span class="s2">&quot;Error in sending request to server - &quot;</span> <span class="o">.</span> <span class="nv">$curl_error</span><span class="p">);</span>
<a name="Api.php-356"></a>    <span class="p">}</span>
<a name="Api.php-357"></a>    <span class="k">if</span> <span class="p">(</span><span class="nv">$response</span><span class="o">-&gt;</span><span class="na">responseCode</span> <span class="o">==</span> <span class="mi">200</span><span class="p">)</span> <span class="p">{</span>
<a name="Api.php-358"></a>      <span class="k">return</span> <span class="k">new</span> <span class="nx">\Cloudinary\Api\Response</span><span class="p">(</span><span class="nv">$response</span><span class="p">);</span>
<a name="Api.php-359"></a>    <span class="p">}</span> <span class="k">else</span> <span class="p">{</span>
<a name="Api.php-360"></a>      <span class="nv">$exception_class</span> <span class="o">=</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">option_get</span><span class="p">(</span><span class="nx">self</span><span class="o">::</span><span class="nv">$CLOUDINARY_API_ERROR_CLASSES</span><span class="p">,</span> <span class="nv">$response</span><span class="o">-&gt;</span><span class="na">responseCode</span><span class="p">);</span>
<a name="Api.php-361"></a>      <span class="k">if</span> <span class="p">(</span><span class="o">!</span><span class="nv">$exception_class</span><span class="p">)</span> <span class="k">throw</span> <span class="k">new</span> <span class="nx">\Cloudinary\Api\GeneralError</span><span class="p">(</span><span class="s2">&quot;Server returned unexpected status code - </span><span class="si">{</span><span class="nv">$response</span><span class="o">-&gt;</span><span class="na">responseCode</span><span class="si">}</span><span class="s2"> - </span><span class="si">{</span><span class="nv">$response</span><span class="o">-&gt;</span><span class="na">body</span><span class="si">}</span><span class="s2">&quot;</span><span class="p">);</span>
<a name="Api.php-362"></a>      <span class="nv">$json</span> <span class="o">=</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">parse_json_response</span><span class="p">(</span><span class="nv">$response</span><span class="p">);</span>
<a name="Api.php-363"></a>      <span class="k">throw</span> <span class="k">new</span> <span class="nv">$exception_class</span><span class="p">(</span><span class="nv">$json</span><span class="p">[</span><span class="s2">&quot;error&quot;</span><span class="p">][</span><span class="s2">&quot;message&quot;</span><span class="p">]);</span>
<a name="Api.php-364"></a>    <span class="p">}</span>
<a name="Api.php-365"></a>  <span class="p">}</span>
<a name="Api.php-366"></a>  
<a name="Api.php-367"></a>  <span class="c1"># Based on http://snipplr.com/view/17242/</span>
<a name="Api.php-368"></a>  <span class="k">protected</span> <span class="k">function</span> <span class="nf">execute</span><span class="p">(</span><span class="nv">$ch</span><span class="p">)</span> <span class="p">{</span>
<a name="Api.php-369"></a>    <span class="nv">$string</span> <span class="o">=</span> <span class="nb">curl_exec</span><span class="p">(</span><span class="nv">$ch</span><span class="p">);</span>
<a name="Api.php-370"></a>    <span class="nv">$headers</span> <span class="o">=</span> <span class="k">array</span><span class="p">();</span>
<a name="Api.php-371"></a>    <span class="nv">$content</span> <span class="o">=</span> <span class="s1">&#39;&#39;</span><span class="p">;</span>
<a name="Api.php-372"></a>    <span class="nv">$str</span> <span class="o">=</span> <span class="nb">strtok</span><span class="p">(</span><span class="nv">$string</span><span class="p">,</span> <span class="s2">&quot;</span><span class="se">\n</span><span class="s2">&quot;</span><span class="p">);</span>
<a name="Api.php-373"></a>    <span class="nv">$h</span> <span class="o">=</span> <span class="k">null</span><span class="p">;</span>
<a name="Api.php-374"></a>    <span class="k">while</span> <span class="p">(</span><span class="nv">$str</span> <span class="o">!==</span> <span class="k">false</span><span class="p">)</span> <span class="p">{</span>
<a name="Api.php-375"></a>        <span class="k">if</span> <span class="p">(</span><span class="nv">$h</span> <span class="k">and</span> <span class="nb">trim</span><span class="p">(</span><span class="nv">$str</span><span class="p">)</span> <span class="o">===</span> <span class="s1">&#39;&#39;</span><span class="p">)</span> <span class="p">{</span>                
<a name="Api.php-376"></a>            <span class="nv">$h</span> <span class="o">=</span> <span class="k">false</span><span class="p">;</span>
<a name="Api.php-377"></a>            <span class="k">continue</span><span class="p">;</span>
<a name="Api.php-378"></a>        <span class="p">}</span>
<a name="Api.php-379"></a>        <span class="k">if</span> <span class="p">(</span><span class="nv">$h</span> <span class="o">!==</span> <span class="k">false</span> <span class="k">and</span> <span class="k">false</span> <span class="o">!==</span> <span class="nb">strpos</span><span class="p">(</span><span class="nv">$str</span><span class="p">,</span> <span class="s1">&#39;:&#39;</span><span class="p">))</span> <span class="p">{</span>
<a name="Api.php-380"></a>            <span class="nv">$h</span> <span class="o">=</span> <span class="k">true</span><span class="p">;</span>
<a name="Api.php-381"></a>            <span class="k">list</span><span class="p">(</span><span class="nv">$headername</span><span class="p">,</span> <span class="nv">$headervalue</span><span class="p">)</span> <span class="o">=</span> <span class="nb">explode</span><span class="p">(</span><span class="s1">&#39;:&#39;</span><span class="p">,</span> <span class="nb">trim</span><span class="p">(</span><span class="nv">$str</span><span class="p">),</span> <span class="mi">2</span><span class="p">);</span>
<a name="Api.php-382"></a>            <span class="nv">$headervalue</span> <span class="o">=</span> <span class="nb">ltrim</span><span class="p">(</span><span class="nv">$headervalue</span><span class="p">);</span>
<a name="Api.php-383"></a>            <span class="k">if</span> <span class="p">(</span><span class="nb">isset</span><span class="p">(</span><span class="nv">$headers</span><span class="p">[</span><span class="nv">$headername</span><span class="p">]))</span> 
<a name="Api.php-384"></a>                <span class="nv">$headers</span><span class="p">[</span><span class="nv">$headername</span><span class="p">]</span> <span class="o">.=</span> <span class="s1">&#39;,&#39;</span> <span class="o">.</span> <span class="nv">$headervalue</span><span class="p">;</span>
<a name="Api.php-385"></a>            <span class="k">else</span> 
<a name="Api.php-386"></a>                <span class="nv">$headers</span><span class="p">[</span><span class="nv">$headername</span><span class="p">]</span> <span class="o">=</span> <span class="nv">$headervalue</span><span class="p">;</span>
<a name="Api.php-387"></a>        <span class="p">}</span>
<a name="Api.php-388"></a>        <span class="k">if</span> <span class="p">(</span><span class="nv">$h</span> <span class="o">===</span> <span class="k">false</span><span class="p">)</span> <span class="p">{</span>
<a name="Api.php-389"></a>            <span class="nv">$content</span> <span class="o">.=</span> <span class="nv">$str</span><span class="o">.</span><span class="s2">&quot;</span><span class="se">\n</span><span class="s2">&quot;</span><span class="p">;</span>
<a name="Api.php-390"></a>        <span class="p">}</span>
<a name="Api.php-391"></a>        <span class="nv">$str</span> <span class="o">=</span> <span class="nb">strtok</span><span class="p">(</span><span class="s2">&quot;</span><span class="se">\n</span><span class="s2">&quot;</span><span class="p">);</span>
<a name="Api.php-392"></a>    <span class="p">}</span>
<a name="Api.php-393"></a>    <span class="nv">$result</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">\stdClass</span><span class="p">;</span>    
<a name="Api.php-394"></a>    <span class="nv">$result</span><span class="o">-&gt;</span><span class="na">headers</span> <span class="o">=</span> <span class="nv">$headers</span><span class="p">;</span>
<a name="Api.php-395"></a>    <span class="nv">$result</span><span class="o">-&gt;</span><span class="na">body</span> <span class="o">=</span> <span class="nb">trim</span><span class="p">(</span><span class="nv">$content</span><span class="p">);</span>
<a name="Api.php-396"></a>    <span class="nv">$result</span><span class="o">-&gt;</span><span class="na">responseCode</span> <span class="o">=</span> <span class="nb">curl_getinfo</span><span class="p">(</span><span class="nv">$ch</span><span class="p">,</span> <span class="nx">CURLINFO_HTTP_CODE</span><span class="p">);</span>
<a name="Api.php-397"></a>    <span class="k">return</span> <span class="nv">$result</span><span class="p">;</span>
<a name="Api.php-398"></a>  <span class="p">}</span>
<a name="Api.php-399"></a>  
<a name="Api.php-400"></a>  <span class="k">static</span> <span class="k">function</span> <span class="nf">parse_json_response</span><span class="p">(</span><span class="nv">$response</span><span class="p">)</span> <span class="p">{</span>
<a name="Api.php-401"></a>    <span class="nv">$result</span> <span class="o">=</span> <span class="nb">json_decode</span><span class="p">(</span><span class="nv">$response</span><span class="o">-&gt;</span><span class="na">body</span><span class="p">,</span> <span class="k">TRUE</span><span class="p">);</span>
<a name="Api.php-402"></a>    <span class="k">if</span> <span class="p">(</span><span class="nv">$result</span> <span class="o">==</span> <span class="k">NULL</span><span class="p">)</span> <span class="p">{</span>
<a name="Api.php-403"></a>      <span class="nv">$error</span> <span class="o">=</span> <span class="nb">json_last_error</span><span class="p">();</span>
<a name="Api.php-404"></a>      <span class="k">throw</span> <span class="k">new</span> <span class="nx">\Cloudinary\Api\GeneralError</span><span class="p">(</span><span class="s2">&quot;Error parsing server response (</span><span class="si">{</span><span class="nv">$response</span><span class="o">-&gt;</span><span class="na">responseCode</span><span class="si">}</span><span class="s2">) - </span><span class="si">{</span><span class="nv">$response</span><span class="o">-&gt;</span><span class="na">body</span><span class="si">}</span><span class="s2">. Got - </span><span class="si">{</span><span class="nv">$error</span><span class="si">}</span><span class="s2">&quot;</span><span class="p">);</span>
<a name="Api.php-405"></a>    <span class="p">}</span>
<a name="Api.php-406"></a>    <span class="k">return</span> <span class="nv">$result</span><span class="p">;</span> 
<a name="Api.php-407"></a>  <span class="p">}</span>
<a name="Api.php-408"></a>  
<a name="Api.php-409"></a>  <span class="k">protected</span> <span class="k">function</span> <span class="nf">only</span><span class="p">(</span><span class="o">&amp;</span><span class="nv">$hash</span><span class="p">,</span> <span class="nv">$keys</span><span class="p">)</span> <span class="p">{</span>
<a name="Api.php-410"></a>    <span class="nv">$result</span> <span class="o">=</span> <span class="k">array</span><span class="p">();</span>
<a name="Api.php-411"></a>    <span class="k">foreach</span> <span class="p">(</span><span class="nv">$keys</span> <span class="k">as</span> <span class="nv">$key</span><span class="p">)</span> <span class="p">{</span>
<a name="Api.php-412"></a>      <span class="k">if</span> <span class="p">(</span><span class="nb">isset</span><span class="p">(</span><span class="nv">$hash</span><span class="p">[</span><span class="nv">$key</span><span class="p">]))</span> <span class="nv">$result</span><span class="p">[</span><span class="nv">$key</span><span class="p">]</span> <span class="o">=</span> <span class="nv">$hash</span><span class="p">[</span><span class="nv">$key</span><span class="p">];</span>
<a name="Api.php-413"></a>    <span class="p">}</span>
<a name="Api.php-414"></a>    
<a name="Api.php-415"></a>    <span class="k">return</span> <span class="nv">$result</span><span class="p">;</span>
<a name="Api.php-416"></a>  <span class="p">}</span>
<a name="Api.php-417"></a>  
<a name="Api.php-418"></a>  <span class="k">protected</span> <span class="k">function</span> <span class="nf">transformation_string</span><span class="p">(</span><span class="nv">$transformation</span><span class="p">)</span> <span class="p">{</span>
<a name="Api.php-419"></a>    <span class="k">return</span> <span class="nb">is_string</span><span class="p">(</span><span class="nv">$transformation</span><span class="p">)</span> <span class="o">?</span> <span class="nv">$transformation</span> <span class="o">:</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">generate_transformation_string</span><span class="p">(</span><span class="nv">$transformation</span><span class="p">);</span>
<a name="Api.php-420"></a>  <span class="p">}</span>
<a name="Api.php-421"></a>
<a name="Api.php-422"></a>  <span class="sd">/**</span>
<a name="Api.php-423"></a><span class="sd">   * Prepare streaming profile parameters for API calls</span>
<a name="Api.php-424"></a><span class="sd">   * @param $options the options passed to the API</span>
<a name="Api.php-425"></a><span class="sd">   * @return array A single profile parameters</span>
<a name="Api.php-426"></a><span class="sd">   */</span>
<a name="Api.php-427"></a>  <span class="k">protected</span> <span class="k">function</span> <span class="nf">prepare_streaming_profile_params</span><span class="p">(</span><span class="nv">$options</span><span class="p">)</span> <span class="p">{</span>
<a name="Api.php-428"></a>    <span class="nv">$params</span> <span class="o">=</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">only</span><span class="p">(</span><span class="nv">$options</span><span class="p">,</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;display_name&quot;</span><span class="p">));</span>
<a name="Api.php-429"></a>    <span class="k">if</span> <span class="p">(</span><span class="nb">isset</span><span class="p">(</span><span class="nv">$options</span><span class="p">[</span><span class="s1">&#39;representations&#39;</span><span class="p">]))</span> <span class="p">{</span>
<a name="Api.php-430"></a>      <span class="nv">$array_map</span> <span class="o">=</span> <span class="nb">array_map</span><span class="p">(</span>
<a name="Api.php-431"></a>        <span class="k">function</span> <span class="p">(</span><span class="nv">$representation</span><span class="p">)</span> <span class="p">{</span>
<a name="Api.php-432"></a>          <span class="k">return</span> <span class="k">array</span><span class="p">(</span><span class="s2">&quot;transformation&quot;</span> <span class="o">=&gt;</span> <span class="nx">\Cloudinary</span><span class="o">::</span><span class="na">generate_transformation_string</span><span class="p">(</span><span class="nv">$representation</span><span class="p">));</span>
<a name="Api.php-433"></a>        <span class="p">},</span> <span class="nv">$options</span><span class="p">[</span><span class="s1">&#39;representations&#39;</span><span class="p">]);</span>
<a name="Api.php-434"></a>      <span class="nv">$params</span><span class="p">[</span><span class="s2">&quot;representations&quot;</span><span class="p">]</span> <span class="o">=</span> <span class="nb">json_encode</span><span class="p">(</span><span class="nv">$array_map</span><span class="p">);</span>
<a name="Api.php-435"></a>    <span class="p">}</span>
<a name="Api.php-436"></a>    <span class="k">return</span> <span class="nv">$params</span><span class="p">;</span>
<a name="Api.php-437"></a>  <span class="p">}</span>
<a name="Api.php-438"></a><span class="p">}</span>
<a name="Api.php-439"></a>
<a name="Api.php-440"></a><span class="p">}</span>
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
         href="#">1c299938c525 / 1c299938c525 @ app-106</a>
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
                  <a class="pjax-trigger filter-item-link" href="/crazyhare86/aimee_debug/src/[[changeset]]/app/Http/Controllers/cloudinary/Api.php?at=[[safeName]]"
                     title="[[name]]">
                    [[name]] ([[shortChangeset]])
                  </a>
                </li>
              [[/heads]]
            [[/hasMultipleHeads]]
            [[^hasMultipleHeads]]
              <li class="comprev filter-item">
                <a class="pjax-trigger filter-item-link" href="/crazyhare86/aimee_debug/src/[[changeset]]/app/Http/Controllers/cloudinary/Api.php?at=[[safeName]]" title="[[name]]">
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
            <a class="pjax-trigger filter-item-link" href="/crazyhare86/aimee_debug/src/[[changeset]]/app/Http/Controllers/cloudinary/Api.php?at=[[safeName]]" title="[[name]]">
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

<script type="text/javascript">window.NREUM||(NREUM={});NREUM.info={"beacon":"bam.nr-data.net","queueTime":0,"licenseKey":"a2cef8c3d3","agent":"","transactionName":"Z11RZxdWW0cEVkYLDV4XdUYLVEFdClsdAAtEWkZQDlJBGgRFQhFMQl1DXFcZQ10AQkFYBFlUVlEXWEJHAA==","applicationID":"1841284","errorBeacon":"bam.nr-data.net","applicationTime":361}</script>
</body>
</html>