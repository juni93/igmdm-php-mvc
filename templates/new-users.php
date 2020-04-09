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
        <h2 class="m-4">Crea nuovo utente</h2>
        <form class="m-4 needs-validation" method="POST" enctype="multipart/form-data" action="<?php echo BASE_PATH; ?>/new-user" novalidate>
            <div class="form-group">
                    <label class="font-weight-bold">Nick Name <span><small>(serve per il login)</small></span></label>
                    <input type="text" class="form-control" name="new_nick_user" required>
                    
            </div>
            <div class="form-group">
                    <label class="font-weight-bold">Password <span><small>(minimo 6 caratteri)</small></span></label>
                    <input type="text" class="form-control" name="new_user_pwd" required>
            </div>
            <div class="form-group pt-4">
                <input type="submit" name="new_user_submit" value="Submit" class="btn btn-primary">
            </div>
        </form>

</div><!-- /.container -->

<?php include 'inc/footer.php'; ?>