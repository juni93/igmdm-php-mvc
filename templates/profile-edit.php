<?php 
    $robots = "noindex,nofollow";
    $pageTitle = "Giocatore medio di magic - Magic the Gathering Articoli, Mazzi, e Strategia"; 
    $pageDesc = "magic: the gathering arena decks, metagame, archetype, standard, pioneer, modern, mtgo prices, prices, speculation, speculators, trends";
    $pageType = "website";
    $ogTitle = "Giocatore medio di magic - Magic the Gathering Articoli, Mazzi, e Strategia";
    $ogDesc = "Giocatore medio di magic - Magic the Gathering Articoli, Mazzi, e Strategia";
    $pageImage = ABSOLUTE_PATH . "resources/logos/igmdm.svg";
    $pageUrl = "https://igmdm.com/" ;
    include 'inc/header.php'; 
?>
<div class="container">
        <h2 class="m-4"> Modifica Profilo</h2>
        <form class="m-4" method="POST" enctype="multipart/form-data" action="<?php echo BASE_PATH; ?>/update-profile">
            
            <div class="form-group">
                <label class="font-weight-bold">Nome </label>
                <input type="text" class="form-control" name="name_user" value="<?php echo $userDetails[0]->name_user ?>">
            </div>
            <div class="form-group">
                <fieldset disabled="">
                    <label class="font-weight-bold">Nick</label>
                    <input type="text" class="form-control" name="nick_user" value="<?php echo $userDetails[0]->nick_user ?>">
                </fieldset>
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Carica Immagine <small  class="badge badge-warning">formati *.jpg | *.png | *.jpeg</small> </label>
                <input name='imag_user' class='form-control-file' type="file">
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Racconta su di te</label>
                <textarea type="text" class="form-control" name="desc_user" rows="8"><?php echo $userDetails[0]->desc_user ?></textarea>
            </div>
            <div class="form-group pt-4">
                <input type="submit" name="update_profile" value="Submit" class="form-control btn btn-primary">
                <!--<input id="submit-article" data-toggle="modal" data-target="confirm-article" type="button" class="form-control btn btn-primary" name="submit_article" value="Submit">-->
            </div>
        </form>

</div><!-- /.container -->

<?php include 'inc/footer.php'; ?>