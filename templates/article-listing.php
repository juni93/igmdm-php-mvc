<?php 
    $pageTitle = "Tutti gli articoli e interviste per Il giocatore medio di Magic è una persona bella"; 
    $pageDesc = "Tutti gli articoli del giocatore medio di Magic, dove trovare articoli su decktech, formati(Standard, T2, Pioneer, Arena, Modern, Legacy, EDH, Commander), tornei (Arena Leagues, MTGO, Championship, Magicfest) e interviste ai streamers.";
    $pageType = "articles listing";
    $pageImage = ABSOLUTE_PATH . "resources/logos/igmdm.svg";
    $pageUrl = "https://igmdm.com/articles" ;
    include 'inc/header.php'; 
 
?>

<div class="container">
    <div class="row m-auto">
        <div class="col">
            <div class="row d-inline-flex">
                <?php foreach($requestedArticles as $article): ?>
                <?php $description = substr($article->desc_arti, 0, 30); ?>
                <div class="mb-4 px-1">
                    <div class="card" style="max-height: 400px;">
                        <img src="<?php echo ABSOLUTE_PATH; ?>images/articles/<?php echo $article->preimage_arti; ?>" alt="<?php echo $article->name_arti; ?>" class="rounded-circle mx-auto" style="width: 200px; height:200px">
                        <h1 class="card-title p-2" style="width: 200px; height: 4em; font-size: 18px"> <?php echo $article->name_arti; ?> </h1>
                        <!--<p class="card-text p-1"> <?php  ?> </p>-->
                        <a href="<?php echo BASE_PATH; ?>/article/<?php echo $article->id_arti; ?>/<?php echo $article->url_arti; ?>" class='btn btn-outline-primary btn-sm' style="align-self: flex-end; margin: 2px;" type="submit"><small>Leggi...</small></a>
                        <div class='card-footer'>
                            <div class="text-muted clearfix text-uppercase">
                                <a href="<?php echo BASE_PATH; ?>/articles-by-format/<?php echo $article->name_frmt; ?>/<?php echo $article->frmt_arti; ?>"><span class="badge badge-primary float-left"><small><?php echo $article->name_frmt; ?></small></span></a>
                                <!--<span class="float-left"><?php echo $article->date_arti; ?></span>-->
                                <a href="<?php echo BASE_PATH; ?>/articles-by-user/<?php echo $article->user_arti; ?>"><span class="badge badge-primary float-right"><small><?php echo $article->name_user; ?></small></span></a>
                            </div>
                        </div>
                    </div>
                </div><!-- /.blog-post -->
                <?php endforeach; ?>
            </div>
            <nav>
        </div>
    </div><!-- /.row -->
</div><!-- /.container -->

<?php include 'inc/footer.php'; ?>