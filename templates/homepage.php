<?php 
    $pageTitle = "Il giocatore medio di Magic è una persona bella"; 
    $pageDesc = "Homepage del giocatore medio di Magic, dove trovare articoli su decktech, (Standard, T2, Pioneer, Arena, Modern, Legacy, EDH, Commander), tornei (Arena Leagues, MTGO, Championship, Magicfest) e interviste ai streamers.";
    $pageType = "website";
    $pageImage = ABSOLUTE_PATH . "resources/logos/igmdm.svg";
    $pageUrl = "https://www.igmdm.com/" ;
    include 'inc/header.php'; 
?>

<div class="container">

    <div class="row no-gutters">
       
        <div class="col-md-7">
            <div class="col-md-12 p-1">
                <iframe src="https://player.twitch.tv/?channel=ilgiocatoremediodimagic" height="378"></iframe>
            </div>
            <div class="row d-inline-flex no-gutters card-row">
                <?php foreach($hpArticles as $hpArticle): ?>
                <?php $description = substr($hpArticle->desc_arti, 0, 30); ?>
                <div class="mb-4 px-1">
                    <div class="card" style="max-height: 300px;">
                        <img src="<?php echo ABSOLUTE_PATH; ?>images/articles/<?php echo $hpArticle->preimage_arti; ?>" alt="" class="rounded-circle mx-auto card-image" style="width: 120px; height:120px">
                        <h1 class="card-title p-2" style="width: 200px; height: 4em; font-size: 18px"> <?php echo $hpArticle->name_arti; ?> </h1>
                        <!--<p class="card-text p-1"> <?php  ?> </p>-->
                        <a href="<?php echo BASE_PATH; ?>/article/<?php echo $hpArticle->id_arti; ?>/<?php echo $hpArticle->url_arti; ?>" class='btn btn-outline-primary btn-sm' style="align-self: flex-end; margin: 2px;" type="submit"><small>Leggi...</small></a>
                        <div class='card-footer'>
                            <div class="text-muted clearfix text-uppercase">
                                <a href="<?php echo BASE_PATH; ?>/articles-by-format/<?php echo $hpArticle->name_frmt; ?>/<?php echo $hpArticle->frmt_arti; ?>"><span class="badge badge-primary float-left badge-format"><small><?php echo $hpArticle->name_frmt; ?></small></span></a>
                                <!--<span class="float-left"><?php echo $hpArticle->date_arti; ?></span>-->
                                <a href="<?php echo BASE_PATH; ?>/articles-by-user/<?php echo $hpArticle->user_arti; ?>"><span class="badge badge-primary float-right badge-user"><small><?php echo $hpArticle->name_user; ?></small></span></a>
                            </div>
                        </div>
                    </div>
                </div><!-- /.blog-post -->
                <?php endforeach; ?>
            </div>
            <nav>
            <?php if($_SERVER['QUERY_STRING'] != ""): ?>
                <br><br>
                <a href="<?php echo BASE_PATH; ?>/home">
                    <button type="button" class="btn btn-primary">
                        Torna Indietro
                    </button>
                </a>
                <br><br>
            <?php endif; ?>
            

        </div><!-- /-main -->

        <?php include 'inc/sidebar.php'; ?>

    </div><!-- /.row -->

</div><!-- /.container -->
 
     


<?php include 'inc/footer.php'; ?>