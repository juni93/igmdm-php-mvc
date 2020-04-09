<?php 
    $robots = "index,follow";
    $pageTitle = "Giocatore medio di - Magic the Gathering, Articoli, Mazzi, Strategia e tornei"; 
    $pageDesc = "magic: the gathering arena decks, metagame, archetype, standard, pioneer, modern, mtgo prices, prices, speculation, speculators, trends";
    $pageType = "website";
    $ogTitle = "Giocatore medio di magic - Magic the Gathering Articoli, Mazzi, e Strategia";
    $ogDesc = "Giocatore medio di magic - Magic the Gathering Articoli, Mazzi, e Strategia";
    $pageImage = ABSOLUTE_PATH . "resources/logos/igmdm.svg";
    $pageUrl = "https://igmdm.com/" ;
    include 'inc/header.php'; 
?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="col-md-12 p-1">
				<h1 class="sr-only">Giocatore medio - Magic the Gathering Articoli, Mazzi, e Strategia</h1>
                <iframe src="https://player.twitch.tv/?channel=ilgiocatoremediodimagic" frameborder="0" allowfullscreen="true" scrolling="no" height="378"></iframe>
            </div>
            <div class="row no-gutters" itemscope itemtype="http://schema.org/NewsArticle">
                <?php foreach($hpArticles as $hpArticle): ?>
                <?php $description = substr($hpArticle->desc_arti, 0, 30); ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="center-block mx-auto" itemprop="image" itemscope itemtype="http://schema.org/ImageObject">
                            <meta itemprop="height" content="3">
                            <meta itemprop="width" content="3">
                            <meta itemprop="url" content="<?php echo ABSOLUTE_PATH; ?>images/articles/thumbnails/<?php echo $hpArticle->preimage_arti; ?>">
                            <img class="card-img-top img-fluid rounded-circle" style="max-width: 120px; max-height:120px"  src="<?php echo ABSOLUTE_PATH; ?>images/articles/thumbnails/<?php echo $hpArticle->preimage_arti; ?>" alt="<?php echo $hpArticle->name_arti; ?>">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h2 class="card-title h2 small font-weight-bold" itemprop="headline"> <?php echo $hpArticle->name_arti; ?> </h2>
                            <p class="card-text small" itemprop="description"><?php echo substr(strip_tags($hpArticle->desc_arti), 0, 100); ?></p>
                            <span class="sr-only" itemprop="datePublished" content="<?php echo $hpArticle->date_arti; ?>"><?php echo $hpArticle->date_arti; ?></span>
                            <a class="btn btn-outline-primary btn-sm align-self-end mt-auto" type="submit" href="<?php echo BASE_PATH; ?>/article/<?php echo $hpArticle->id_arti; ?>/<?php echo $hpArticle->url_arti; ?>" >
                               <span class="small">Leggi...</span>
                            </a>
                        </div>
                        <div class="card-footer small">
                            <a href="<?php echo BASE_PATH; ?>/articles-by-format/<?php echo $hpArticle->name_frmt; ?>/<?php echo $hpArticle->frmt_arti; ?>"><span class="badge badge-primary float-left"><?php echo $hpArticle->name_frmt; ?></span></a>
                            <!--<span class="float-left"><?php echo $hpArticle->date_arti; ?></span>-->
                            <a href="<?php echo BASE_PATH; ?>/articles-by-user/<?php echo $hpArticle->user_arti; ?>"><span class="badge badge-primary float-right" itemprop="author"><?php echo $hpArticle->name_user; ?></span></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            
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