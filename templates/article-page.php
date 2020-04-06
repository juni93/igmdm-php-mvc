<?php 
    $pageTitle = $singleArticle[0]->name_arti; 
    $pageDesc = substr(strip_tags($singleArticle[0]->desc_arti), 0, 500);
    $pageType = "article";
    $pageImage = ABSOLUTE_PATH . "images/articles/" . $singleArticle[0]->preimage_arti;
    $pageUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ;
    include 'inc/header.php'; 
?>

<div class="container">

    <div class="row">

        <div class="col-md-7">  
            <h2 class="font-weight-bold"><?php echo $singleArticle[0]->name_arti; ?></h2>
            <div class="clearfix">
                <div class="font-weight-bold float-left">
                    Autore <a href="<?php echo BASE_PATH; ?>/articles-by-user/<?php echo $singleArticle[0]->user_arti; ?>"><span class="badge badge-primary"><?php echo $singleArticle[0]->name_user; ?></span></a> 
                    <br>il <?php echo $singleArticle[0]->date_arti; ?>
                </div>
                <div class="font-weight-bold float-right text-uppercase mr-5">
                    <a href="<?php echo BASE_PATH; ?>/articles-by-format/<?php echo $singleArticle[0]->name_frmt; ?>/<?php echo $singleArticle[0]->frmt_arti; ?>"><span class="badge badge-primary"><?php echo $singleArticle[0]->name_frmt; ?></span></a>
                </div>
            </div>
            <div>
            <img src="<?php echo ABSOLUTE_PATH; ?>images/articles/<?php echo $singleArticle[0]->preimage_arti; ?>" alt="" class="img-fluid">
            </div>
            <hr>
            <div class="">
            <p class="my-5"><?php echo $singleArticle[0]->desc_arti; ?></p>
            </div>
            <br><br>
            <div class="row clearfix">
                <div class="col float-left">
                    <a href="<?php echo BASE_PATH; ?>/home">
                        <button type="button" class="btn btn-primary">
                            Torna Indietro
                        </button>
                    </a>
                </div>
                <div class="col float-right">
                    <?php if($singleArticle[0]->user_arti == $_SESSION['id_user'] || ($_SESSION['super_user'] == true)): ?>
                        <a href="<?php echo BASE_PATH; ?>/edit-article/<?php echo $singleArticle[0]->id_arti; ?>" class='btn btn-primary'>Edit</a>
                    <?php endif; ?>
                </div>
            
            </div>
                
            <br><br>

        </div><!-- /.main -->
        
        <?php include 'inc/sidebar.php'; ?>
        
    </div><!-- /.row -->

</div><!-- /.container -->

<?php include 'inc/footer.php'; ?>