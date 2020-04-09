<?php 
    $robots = "index,follow";
    $pageTitle = "Magic: the Gathering strategia, magic arena, magic online"; 
    $pageDesc = "Articoli e analisi su mtg " . $formatName . " tier list, metagame, decktech";
    $pageType = "articles listing";
    $pageImage = ABSOLUTE_PATH . "resources/logos/igmdm.svg";
    $ogDesc = "Articoli e analisi su " . $formatName . " tier list, metagame, decktech";
    $ogTitle = "Articoli su Magic: the Gathering";
    $pageUrl = "https://igmdm.com/articles" ;
    include 'inc/header.php'; 
 
?>

<div class="container">
    <div class="row">
    <h1 class="sr-only">Magic: the Gathering strategia, magic arena, magic online</h1>
        <?php foreach($requestedArticles as $article): ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img class="card-img-top img-fluid rounded-circle mx-auto" style="max-width: 120px; max-height:120px" src="<?php echo ABSOLUTE_PATH; ?>images/articles/thumbnails/<?php echo $article->preimage_arti; ?>" alt="<?php echo $article->name_arti; ?>">
                <div class="card-body d-flex flex-column">
                    <h2 class="card-title h2 small font-weight-bold" ><?php echo $article->name_arti; ?> </h2>
                    <p class="card-text small"><?php echo substr(strip_tags($article->desc_arti), 0, 100); ?> </p>
                    <a class="btn btn-outline-primary btn-sm align-self-end mt-auto" type="submit" href="<?php echo BASE_PATH; ?>/article/<?php echo $article->id_arti; ?>/<?php echo $article->url_arti; ?>" >
                        <span class="small">Leggi...</span>
                    </a>
                </div>
                <div class="card-footer small">
                    <a href="<?php echo BASE_PATH; ?>/articles-by-format/<?php echo $article->name_frmt; ?>/<?php echo $article->frmt_arti; ?>"><span class="badge badge-primary float-left"><small><?php echo $article->name_frmt; ?></small></span></a>
                    <!--<span class="float-left"><?php echo $article->date_arti; ?></span>-->
                    <a href="<?php echo BASE_PATH; ?>/articles-by-user/<?php echo $article->user_arti; ?>"><span class="badge badge-primary float-right"><small><?php echo $article->name_user; ?></small></span></a>
                </div>
            </div>
        </div><!-- /.blog-post -->
        <?php endforeach; ?>
    </div><!-- /.row -->
</div><!-- /.container -->

<?php include 'inc/footer.php'; ?>