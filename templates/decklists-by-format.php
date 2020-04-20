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
        <?php foreach($requestedDecks as $deck): ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img class="card-img-top img-fluid rounded-circle mx-auto" style="max-width: 120px; max-height:120px" src="<?php echo ABSOLUTE_PATH; ?>images/decks/thumbnails/<?php echo $deck->image_decks; ?>" alt="<?php echo $deck->name_decks; ?>">
                <div class="card-body d-flex flex-column">
                    <h2 class="card-title h2 small font-weight-bold" ><?php echo $deck->name_decks; ?> </h2>
                    <a class="btn btn-outline-primary btn-sm align-self-end mt-auto" type="submit" href="<?php echo BASE_PATH; ?>/decklist/<?php echo $deck->id_decks; ?>/<?php echo $deck->speakingtitle_decks; ?>" >
                        <span class="small">Continua...</span>
                    </a>
                </div>
                <div class="card-footer small">
                    <a href="<?php echo BASE_PATH; ?>/decklists-by-format/<?php echo $deck->name_frmt; ?>/<?php echo $deck->frmt_decks; ?>"><span class="badge badge-primary float-left"><small><?php echo $deck->name_frmt; ?></small></span></a>
                    <!--<span class="float-left"><?php echo $deck->date_decks; ?></span>-->
                    <a href="<?php echo BASE_PATH; ?>/decklists-by-user/<?php echo $deck->user_decks; ?>"><span class="badge badge-primary float-right"><small><?php echo $deck->name_user; ?></small></span></a>
                </div>
            </div>
        </div><!-- /.blog-post -->
        <?php endforeach; ?>
    </div><!-- /.row -->
</div><!-- /.container -->

<?php include 'inc/footer.php'; ?>