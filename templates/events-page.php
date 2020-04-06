<?php 
    $pageTitle = "Il giocatore medio di Magic è una persona bella"; 
    $pageDesc = "dove trovare articoli su decktech, (Standard, T2, Pioneer, Arena, Modern, Legacy, EDH, Commander), tornei (Arena Leagues, MTGO, Championship, Magicfest) e interviste ai streamers.";
    $pageType = "website";
    $pageImage = ABSOLUTE_PATH . "resources/logos/igmdm.svg";
    $pageUrl = "https://igmdm.com/events" ;
    include 'inc/header.php'; 
?>
<div class="container">

    <div class="row no-gutters">

        <div class="col-md-7">
            <?php foreach($events as $event): ?>
                <div class="jumbotron m-0">
                    <img src="<?php echo ABSOLUTE_PATH; ?>images/<?php echo $event->image_event; ?>" alt="" class="img-fluid">
                    <hr class="mt-4">
                    <h1 class="display-4"><?php echo $event->title_event; ?></h1>
                    <p class="lead clearfix">
                        <span class="float-right">Formato: <?php echo $event->name_frmt; ?></span>   
                        <span>Data: <?php echo $event->date_event; ?></span> 
                        <br>
                        <span>Ora: <?php echo $event->start_time_event; ?></span>
                    </p>
                    <p><strong>Conferma la partecipazione:</strong> <a href="<?php echo $event->fblink_event; ?>" target="_blank"> Partecipo </a></p>
                </div>
                <div class="row mt-1 px-3">
                    <p><strong>Quota Iscrizione:</strong> € <?php echo $event->price_event; ?></p>
                </div>
                <?php if(!empty($event->reduce_price_event)): ?>
                    <div class="row mt-1 px-3">
                        <p><strong>Quota Iscrizione Ridotta (leggere descrizione):</strong> € <?php echo $event->reduce_price_event; ?></p>
                    </div>
                <?php endif; ?>
                <div class="row mt-1 px-3">
                    <p><strong>Luogo:</strong> <?php echo $event->place_event; ?> </p>
                </div>
                <div class="row mt-1 px-3">
                    <p><strong>Premi:</strong> <?php echo $event->prize_event; ?></p>
                </div>
                <div class="row mt-1 px-3">
                    <p><strong>Premi:</strong> <?php echo $event->description_event; ?></p>
                </div>
                <hr class="pb-4">
            <?php endforeach; ?>
        </div><!-- /.main -->
        
        <?php include 'inc/sidebar.php'; ?>

    </div><!-- /.row -->

</div><!-- /.container -->

<?php include 'inc/footer.php'; ?>