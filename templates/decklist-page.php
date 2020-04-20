<?php 
    $robots = "index,follow";
    $pageTitle = $singleDecklist[0]->name_decks; 
    $pageDesc = substr(strip_tags(html_entity_decode($singleDecklist[0]->main_decks)), 0, 200) . " magic the gathering, gioco di carte, mtga pro, mtg arena deck, mtgtop8, magic arena, planeswaker";
    $pageType = "article";
    $ogDesc = substr(strip_tags(html_entity_decode($singleDecklist[0]->main_decks)), 0, 200);
    $ogTitle = $singleDecklist[0]->name_decks;
	$pageImage = ABSOLUTE_PATH . "images/decks/" . $singleDecklist[0]->image_decks;
	$pageUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ;
	include 'inc/header.php'; 
?>
<div class="container">

    <div class="row">

        <div class="col-md-7">  
            <h1 class="font-weight-bold"><?php echo $singleDecklist[0]->name_decks; ?></h1>
            <div class="clearfix">
                <div class="font-weight-bold float-left">
                    Autore <a href="<?php echo BASE_PATH; ?>/decklists-by-user/<?php echo $singleDecklist[0]->user_decks; ?>"><span class="badge badge-primary"><?php echo $singleDecklist[0]->name_user; ?></span></a> 
                    <br>il <?php echo $singleDecklist[0]->date_decks; ?>
                </div>
                <div class="font-weight-bold float-right text-uppercase mr-5">
                    <a href="<?php echo BASE_PATH; ?>/decklists-by-format/<?php echo $singleDecklist[0]->name_frmt; ?>/<?php echo $singleDecklist[0]->frmt_decks; ?>"><span class="badge badge-primary"><?php echo $singleDecklist[0]->name_frmt; ?></span></a>
                </div>
            </div>
			<div>
            <img src="<?php echo ABSOLUTE_PATH; ?>images/decks/<?php echo $singleDecklist[0]->image_decks; ?>" alt="<?php echo $singleDecklist[0]->name_decks; ?>" class="img-fluid">
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <h4>Main</h4>
                    <?php echo $singleDecklist[0]->main_decks; ?>
                </div>
                <div class="col-md-6">
                    <h4>Sideboard </h4>
                    <?php echo $singleDecklist[0]->side_decks; ?>
                </div>
            </div>
            
            
            <br>
                <div class="row clearfix">
                <div class="col float-left">
                    <a href="<?php echo BASE_PATH; ?>/home">
                        <button type="button" class="btn btn-primary">
                            Torna Indietro
                        </button>
                    </a>
                </div>
                <!-- <div class="col float-right">
                    <?php if(isset($_SESSION['id_user']) || isset($_SESSION['super_user']) && $singleDecklist[0]->user_decks == $_SESSION['id_user']): ?>
                        <a href="<?php echo BASE_PATH; ?>/edit-article/<?php echo $singleDecklist[0]->id_decks; ?>" class='btn btn-primary'>Edit</a>
                    <?php endif; ?>
                </div> -->
            
            </div>
            <br><br>
        </div><!-- /.main -->
        
        <?php include 'inc/sidebar.php'; ?>
        
    </div><!-- /.row -->

</div><!-- /.container -->

<?php include 'inc/footer.php'; ?>