<!DOCTYPE html>
<html lang="it">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-162440694-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-162440694-1');
		</script>
		<script data-ad-client="ca-pub-2830876886388383" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

		<meta name="google-site-verification" content="DtWh-05Ynl5fuM7OGf0x7DslPxG-ucc1mErlubxZyus" />
        <meta charset="utf-8">
		<meta name="robots" content="<?php echo $robots; ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link rel="icon" href="<?php echo ABSOLUTE_PATH; ?>resources/logos/favicon.ico" />
        <title><?php echo $pageTitle ?></title>
        <meta name="description" content="<?php echo $pageDesc ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta property="og:type" content="<?php echo $pageType ?>">
        <meta property="og:title" content="<?php echo $ogTitle ?>">
        <meta property="og:image" content="<?php echo $pageImage; ?>">
        <meta property="og:description" content="<?php echo $ogDesc; ?>">
        <meta property="og:locale" content="it_IT">
        <meta property="og:site_name" content="Il giocatore medio di Magic è una persona bella">
        <meta property="og:url" content="<?php echo $pageUrl; ?>">

        <!--CDN CSS BOOTSTRAP-->
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
         -->
        <link rel="preload" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" as="style" onload="this.rel='stylesheet'">
        <!--FONT AWESOME-->
        <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" as="style" onload="this.rel='stylesheet'">

        <!--BootStrap Template United-->
        <link rel="preload" href="<?php echo ABSOLUTE_PATH; ?>resources/css/bootstrap-bootswatch-united.css" as="style" onload="this.rel='stylesheet'">

        <!--Custom CSS-->
        <link rel="preload" href="<?php echo ABSOLUTE_PATH; ?>resources/css/styles.css" as="style" onload="this.rel='stylesheet'">

        <!--CSS sheet for text Editor with mtgcard tags-->
        <link href="<?php echo ABSOLUTE_PATH; ?>resources/summernote/summernote-bs4.css" rel="preload" as="style" onload="this.rel='stylesheet'">

        <!--CSS sheet for datepicker-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="preload" as="style" onload="this.rel='stylesheet'">
    
        
    </head>
    <body >
        <nav class="navbar navbar-expand-lg  navbar-light" style="background-color: #ffa500;">
            <a class="navbar-brand" href="<?php echo BASE_PATH; ?>/home">
                <img src="<?php echo ABSOLUTE_PATH; ?>resources/logos/igmdm.svg" width="50" height="50" class="d-inline-block pb-2" alt="IGMDM">
                IGMDM
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" title="Home - IGMDM Magic the Gathering" href="<?php echo BASE_PATH; ?>/">Home</a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle" id="articoli" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Articoli</a>
                            <div class="dropdown-menu" aria-labelledby="articoli">
                                <a class="dropdown-item" title="Articoli su Magic the Gathering (Online, Arena e Tornei )" href="<?php echo BASE_PATH; ?>/articles">Tutti gli Articoli</a>
                                <?php foreach($allFormats as $format): ?>
                                <a class="dropdown-item" title="Articoli su <?php echo $format->name_frmt; ?> Magic the Gathering" href="<?php echo BASE_PATH; ?>/articles-by-format/<?php echo $format->name_frmt; ?>/<?php echo $format->id_frmt; ?>"><?php echo $format->name_frmt; ?></a>
                                <?php endforeach; ?>
                            </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" title="Eventi Magic the Gathering organizzati da IGMDM" href="<?php echo BASE_PATH; ?>/events">Eventi</a>
                    </li>
                    <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                        <li class="nav-item">
                            <a class="nav-link" rel="nofollow" title="Scrivi nuovo articolo" href="<?php echo BASE_PATH; ?>/new-article">Nuovo Articolo</a>
                        </li>
                        <?php if(isset($_SESSION['super_user']) && $_SESSION['super_user'] === '1' ) : ?>
                            <li class="nav-item">
                                <a class="nav-link" rel="nofollow" title="Crea nuovo evento" href="<?php echo BASE_PATH; ?>/new-event">Nuovo Evento</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" rel="nofollow" title="Crea nuovo utente" href="<?php echo BASE_PATH; ?>/create-new-users">Nuovo utente</a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item">
                                <a class="nav-link" rel="nofollow" title="Modifica Profilo" href="<?php echo BASE_PATH; ?>/profile">Profilo</a>
                            </li>
                    <?php endif; ?>
                    
                </ul>
            </div>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </nav>
        <div class="container">
            <div class="col">
                <div class="clearfix">
                    <div class="float-right mt-1 mr-3">
                        <a title="Pagina Facebook" href="https://www.facebook.com/Ilgiocatoremediodimagic/" class="text-decoration-none">
                            <img src ="<?php echo ABSOLUTE_PATH; ?>resources/logos/facebook.svg" class="p-2" width="50" height="50" alt="Facebook Page">
                        </a>
                        <!-- <a href="#" class="text-decoration-none">
                            <img src ="resources/logos/twitter.svg" class="p-2" width="40px" height="40px" alt="Twitter Page">
                        </a> -->
                        <a title="Pagina Instagram" href="https://www.instagram.com/ilgiocatoremediodimagic/" class="text-decoration-none">
                            <img src ="<?php echo ABSOLUTE_PATH; ?>resources/logos/instagram.svg" class="p-2" width="50" height="50" alt="Instagram Page">
                        </a>
                        <!--<a href="#" class="text-decoration-none">
                            <img src ="resources/logos/discord.svg" class="p-2" width="40px" height="40px" alt="Discord Channel">
                        </a>-->
                        <a title="Canale Twitch" href="https://www.twitch.tv/ilgiocatoremediodimagic" class="text-decoration-none">
                            <img src ="<?php echo ABSOLUTE_PATH; ?>resources/logos/twitch.svg" class="p-2" width="50" height="50" alt="Twitch Channel">
                        </a>
                        <a title="Canale Telegram" href="https://t.me/joinchat/GILshRGvVAlJrOHUTTSfmg" class="text-decoration-none">
                            <img src ="<?php echo ABSOLUTE_PATH; ?>resources/logos/telegram.svg" class="p-2" width="50" height="50" alt="Telegram Group">
                        </a>
                       <!--  <a href="#" class="text-decoration-none">
                            <img src ="resources/logos/youtube.svg" class="p-2" width="50px" height="50px" alt="Youtube Channel">
                        </a> -->
                    </div>
                </div>
            </div>
        </div>
        <?php displayMessage(); ?>