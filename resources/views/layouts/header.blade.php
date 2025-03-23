<?php
$class = "class = 'menu_item current_page_item'";
error_reporting(~E_NOTICE);
$page = '';
?>
<!DOCTYPE html>
<!--[if lte IE 8]><html class="ie8 no-js" lang="en-US"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en-US"><![endif]-->
<!--[if !(IE)]><!-->
<html class="not-ie no-js" lang="en-US"><!--<![endif]-->


<head>
    <!-- Basic Page Needs
      ================================================== -->
    <meta charset="utf-8" />
    <title>Burean National de la CEDEAO</title>
    <meta name="description" content="Burean National de la CEDEAO">
    <meta name="author" content="LEVEL - SI">

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon" />

    <!-- Google Web Fonts
    ================================================== -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:700,500,400%7cCourgette%7cRoboto:400,500,700%7CIndie+Flower:regular%7COswald:300,regular,700&amp;subset=latin%2Clatin-ext' rel='stylesheet' type='text/css'>

    <!-- Theme CSS
    ================================================== -->
    <link rel="stylesheet" href="{{asset('assets/css/normalize.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/layout.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/bnc.css')}}" />

    <!-- Vendor CSS
    ================================================== -->
    <link rel="stylesheet" href="{{asset('assets/css/vendor.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/fontello.css')}}" />

    <!-- Modernizr
    ================================================== -->
    <script src="{{asset('assets/js/vendor/jquery.modernizr.js')}}"></script>
</head>

<body class="animated">

    <div id="wrapper">

        <nav id="mobile-advanced" class="mobile-advanced" aria-label=""></nav>

        <header id="header" class="header type-4">

            <div class="row">
                <div class="ban" style="text-align: center">
                    <img src="{{asset('assets/images/blog/ban.jpg')}}" alt="">
                </div>
                <div class="header-middle">
                    <div class="row">
                        <div class="large-12 columns">
                            <div class="header-middle-entry">
                                <div class="account">
                                    <ul>
                                        <li data-login="loginDialog"></li>
                                        <li data-account="accountDialog"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ .row-->

                    <div class="container flash">
                        <div class="flash-news-container">
                            <img src="https://bureaunationalcedeao-ci.org/assets/images/flash1.png" alt="flash news image" class="flash-news-icon">
                            <x-flashinfo></x-flashinfo>
                        </div>
                    </div>

                </div>
            </div>
            <!--/ .header-middle-->



            <div class="header-bottom">
                <div class="row">
                    <div class="large-12 columns">
                        <nav id="navigation" class="navigation top-bar" data-topbar aria-label>
                            <div class="menu-primary-menu-container">
                                <ul id="menu-primary-menu" class="menu">
                                    <li <?= ($page === 'accueil') ? $class : "" ?>>
                                        <a href="/">Accueil</a>
                                    </li>
                                    <li <?= ($page === 'bureau' || $page === 'planStatégique') ? $class : "" ?>>
                                        <a href="#">Missions</a>
                                        <ul class="sub-menu">
                                            <li <?= ($page === 'bureau') ? $class : "" ?>>
                                                <a href="/bureau">Le Bureau</a>
                                            </li>
                                            <li <?= ($page === 'planStrategique') ? $class : "" ?>>
                                                <a href="/planStrategique">Le plan Stratégique</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li <?= ($page === 'services') ? $class : "services" ?>><a href="/services">Services</a>
                                    </li>
                                    <li <?= ($page === 'projects') ? $class : "projects" ?>>
                                        <a href="/projects">Projets</a>
                                    </li>
                                    <li <?= ($page === 'cedeao') ? $class : "cedeao" ?>>
                                        <a href="/commission">La Commision</a>
                                    </li>
                                    <li <?= ($page === 'documentation' || $page === 'albums' || $page === 'textCommunautaires' || $page === 'donneesEconomique' || $page === 'statistiques') ? $class : "archives" ?>>
                                        <a href="#">Documentations</a>
                                        <ul class="sub-menu">
                                            <li <?= ($page === 'traites') ? $class : "" ?>>
                                                <a href="/documents/traite">Traités</a>
                                            </li>
                                            <li <?= ($page === 'journaux') ? $class : "" ?>>
                                                <a href="/documents/journaux">Journaux officiels</a>
                                            </li>
                                            <li <?= ($page === 'communiques') ? $class : "" ?>>
                                                <a href="/documents/communiques">Communiqués</a>
                                            </li>
                                            <li <?= ($page === 'textes') ? $class : "" ?>>
                                                <a href="/documents/texte/juridique">Textes juridiques</a>
                                            </li>
                                            <li <?= ($page === 'politique') ? $class : "" ?>>
                                                <a href="/documents/politique">Politique</a>
                                            </li>
                                            <li <?= ($page === 'reglements') ? $class : "" ?>>
                                                <a href="/documents/reglements">Règlements</a>
                                            </li>
                                        </ul>
                                    </li>
                                    </li>
                                    <li <?= ($page === 'albums') ? $class : "" ?>>
                                        <a href="/albums">Galerie</a>
                                    </li>
                                    <li <?= ($page === 'contact') ? $class : "" ?>>
                                        <a href="/contact">Contact</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="search-form-nav">
                                <form method="get" action="#">
                                    <fieldset>
                                        <legend></legend>
                                        <input placeholder="Recherche" type="text" name="s" autocomplete="off" value="" class="advanced_search" />
                                        <button type="submit" class="submit-search">Recherche...</button>
                                    </fieldset>
                                </form>
                            </div>

                        </nav>
                        <!--/ .navigation-->
                    </div>
                </div>
                <!--/ .row-->

            </div>
            <!--/ .header-bottom-->
        </header>
        <!--/ #header-->

        @yield('content')

        <!-- - - - - - - -  END HEADER  - - - - - - - -->

        @include('layouts.footer')

    