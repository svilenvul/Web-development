<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
    <!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            @yield("title")
            @yield("description")            
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <link rel="stylesheet" href="/css/bootstrap.min.css">
            <style>
                body {
                    padding-top: 50px;
                    padding-bottom: 20px;
                }
            </style>
            <link rel="stylesheet" href="/css/main.css">
            <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
            <script src="/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        </head>
        <body>
            <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
            <header role="navigation">
                <nav>
                    <div class="nav-mobile ">
                        <strong id="nav-logo" ><a class="navbar-brand" href="/">CarRepair</a></strong>
                        <button type="button" id="nav-button" class="collapsed" data-toggle="collapse" data-target='#bs-navabar-collapse-1'>
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>    
                    </div>
                    <div class="nav-desktop" id="bs-navabar-collapse-1">
                        <ul class="list">
                            <li id="nav-text">Place where drivers meet workmans</li>                
                            <li>
                                {{Form::open(array('url'=>'/workman','method'=>"get",'role'=>'search'))}}
                                <div>
                                    {{Form::text('UserName',null,array('class'=>'search-query','placeholder'=>'Search'))}}
                                    {{Form::submit("GO")}}
                                </div>
                                {{Form::close()}}
                            </li>
                        </ul>

                        @if(Auth::check()) 
                        <ul id="float-right">
                            <li id="dropdown">
                                <a href="#" id="dropdown-btn" data-toggle="dropdown">Hello {{{Auth::user()->UserName}}} <span class="glyphicon glyphicon-cog"></span></a>
                                <ul id="dropdown-menu" role="menu">
                                    <li> 
                                        {{Form::open(array('url'=>'/logout','method'=>"post"))}}
                                        {{Form::submit("Log Out")}}
                                        {{Form::close()}}                                   </li> 
                                    <li><a href="/user/{{{Auth::user()->UserName}}}">My User</a></li>
                                    <li><a href="/workman/{{{Auth::user()->UserName}}}">My Workman</a></li>
                                </ul>
                            </li>
                        </ul>
                        @endif
                    </div>
                </nav>
            </header>

            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
            <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.1.min.js"><\/script>')</script>

            <script src="/js/vendor/bootstrap.min.js"></script>

            <script src="/js/plugins.js"></script>
            <script src="/js/main.js"></script>

            <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
            <script>
(function (b, o, i, l, e, r) {
    b.GoogleAnalyticsObject = l;
    b[l] || (b[l] =
            function () {
                (b[l].q = b[l].q || []).push(arguments)
            });
    b[l].l = +new Date;
    e = o.createElement(i);
    r = o.getElementsByTagName(i)[0];
    e.src = '//www.google-analytics.com/analytics.js';
    r.parentNode.insertBefore(e, r)
}(window, document, 'script', 'ga'));
ga('create', 'UA-XXXXX-X');
ga('send', 'pageview');
            </script>
            @yield("profile")
            @yield("cars")
            @yield("votes")        
            @yield("comments")
            @yield("latestComment")
            @yield("content")
            <script src="/js/functions.js">
            </script>
            <footer>
                <p>All rights reserved</p>
                <p>Made by Svilen Valkanov - 2014</p>
            </footer>    

        </body>
    </html>