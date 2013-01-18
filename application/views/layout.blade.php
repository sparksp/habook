<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>High Adventure</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        {{-- Place favicon.ico and apple-touch-icon.png in the root directory --}}
        {{ Asset::container('bootstrapper')->styles() }}
        {{ Asset::container('bootstrapper')->scripts() }}
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        {{-- Add your site or application content here --}}
        <header class="container">
            <div class="row">
                <div class="span2" id="logo"><a href=""><img src="img/logo.png" alt="High Adventure Logo" /></a></div>
                <div class="span8" id="masthead">
                    <h1 id="tag-line">High Adventure<br />
                        <small>15th - 17th March 2013</small>
                    </h1>
                    <ul class="inline" id="top-line">
                        <li><a href="">Home</a></li>
                        <li><a href="">About</a></li>
                        <li><a href="">Past Events</a></li>
                        <li><a href="">Galleries</a></li>
                        <li><a href="">Contact</a></li>
                    </ul>
                </div>
                <div class="span2" id="alt-logo"><img src="img/alt-logo.jpg" alt="Explorer Network" /></div>
            </div>
        </header>
        <hr id="divider" />
        <section id="content" role="main" class="container">
            <div class="row">
                <aside class="span3" role="sidebar">
                    <nav role="navigation" id="nav">
                        <ul id="main-list" class="nav nav-list">
                            <li><a href="">Home</a></li>
                            <li><a href="">About</a>
                                <ul>
                                    <li><a href="">How do we register?</a></li>
                                    <li><a href="">How much does it cost?</a></li>
                                    <li><a href="">Join the staff team</a></li>
                                    <li><a href="">Training and Equipment</a></li>
                                    <li><a href="">What are the Rules?</a></li>
                                    <li><a href="">Frequently Asked Questions</a></li>
                                    <li><a href="">Downloads</a></li>
                                </ul>
                            </li>
                            <li><a href="">Past Events</a>
                                <ul>
                                    <li><a href="">2012</a></li>
                                    <li><a href="">2011</a></li>
                                    <li><a href="">2010</a></li>
                                    <li><a href="">2009</a></li>
                                </ul>
                            </li>
                            <li><a href="">Galleries</a></li>
                            <li><a href="">Contact</a></li>
                            <li><a href="">Other Events</a></li>
                        </ul>
                    </nav>
                    <div class="pod">
                        <a href="http://womble.me.uk/"><img src="img/womble.png" /></a>
                    </div>
                </aside>

                {{-- Main Content Goes in Here --}}
                <section class="span9" id="content">
                    {{ $content }}
                </section>
                {{-- End Main Content --}}
            </div>
        </section>
        <footer class="container" role="footer">
            <div class="row">
                <p class="span12"><small>&copy;</small><a href="">Leicestershire Scout Council</a>. Made by <a href="">Phill Sparks</a>. Powered by <a href="">cPortals</a>.</p>
            </div>
        </footer>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.3.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <script>
            var _gaq=[['_setAccount','UA-25654757-1'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
