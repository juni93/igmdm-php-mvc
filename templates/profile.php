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

    <div class="row">

        <div class="col-md-12 mt-4">  
            <div class="row no-gutters">
                <div class="col-md-3">
                    <img src="<?php echo ABSOLUTE_PATH; ?>images/users/<?php echo $userDetails[0]->imag_user ?>" class="img-thumbnail" style="width: 200px; height:200px;">
                </div>
                <div class="col-md-9">
                    <h3>User Name : <?php echo $userDetails[0]->name_user ?></h3>
                    <h3>Nick Name : <?php echo $userDetails[0]->nick_user ?></h3> 
                    <p><h3>Descrizione :</h3><?php echo $userDetails[0]->desc_user ?></p>
                </div>
            </div>
            <hr>
            <div class="row">
                <a href="<?php echo BASE_PATH; ?>/edit-profile">
                    <button type="button" class="btn btn-primary">
                        Modifica Profilo
                    </button>
                </a>
            </div>
        </div><!-- /.main -->
        
    </div><!-- /.row -->

</div><!-- /.container -->

<?php include 'inc/footer.php'; ?>