<div class="col-md-4">
<div class="d-flex"><h4><strong>Recenti Tornei</strong></h4></div>
    <div class="d-flex justify-content-center"><strong>Standard</strong></div>
    <ul class="list-group list-group-horizontal-sm small font-weight-bold">
        <li class="list-group-item col-sm-6 p-0">Torneo</li>
        <li class="list-group-item col-sm-2 p-0">Data</li>
        <li class="list-group-item col-sm-4 p-0">Vincitore</li>
    </ul>
    <?php foreach($tournaments as $tournament): ?>
        <?php $data_torneo = date_create($tournament->date_tournament); ?>
        <?php if($tournament->format_tournament == "standard"): ?>
            <ul class="list-group list-group-horizontal-sm small" style="border: 0px none transparent;">
                <li class="list-group-item col-sm-6 p-0" style="border-bottom: 1px solid;"><a href="<?php echo $tournament->url_tournament ?>" rel="nofollow"><?php echo substr($tournament->name_tournament, 0, 25) ?></a></li>
                <li class="list-group-item col-sm-2 p-0" style="border-bottom: 1px solid;"><?php echo date_format($data_torneo, 'd/m') ?></li>
                <li class="list-group-item col-sm-4 p-0" style="border-bottom: 1px solid;"><?php echo $tournament->win_deck_tournament ?></li>
            </ul>
        <?php endif; ?>
    <?php endforeach; ?>
    
    <div class="d-flex justify-content-center"><strong>Pioneer</strong></div>
    <ul class="list-group list-group-horizontal-sm small font-weight-bold">
        <li class="list-group-item col-sm-6 p-0">Torneo</li>
        <li class="list-group-item col-sm-2 p-0">Data</li>
        <li class="list-group-item col-sm-4 p-0">Vincitore</li>
    </ul>
    <?php foreach($tournaments as $tournament): ?>
        <?php $data_torneo = date_create($tournament->date_tournament); ?>
        <?php if($tournament->format_tournament == "pioneer"): ?>
            <ul class="list-group list-group-horizontal-sm small" style="border: 0px none transparent;">
                <li class="list-group-item col-sm-6 p-0" style="border-bottom: 1px solid;"><a href="<?php echo $tournament->url_tournament ?>" rel="nofollow"><?php echo substr($tournament->name_tournament, 0, 25) ?></a></li>
                <li class="list-group-item col-sm-2 p-0" style="border-bottom: 1px solid;"><?php echo date_format($data_torneo, 'd/m') ?></li>
                <li class="list-group-item col-sm-4 p-0" style="border-bottom: 1px solid;"><?php echo $tournament->win_deck_tournament ?></li>
            </ul>
        <?php endif; ?>
    <?php endforeach; ?>
    <div class="d-flex justify-content-center"><strong>Pauper</strong></div>
    <ul class="list-group list-group-horizontal-sm small font-weight-bold">
        <li class="list-group-item col-sm-6 p-0">Torneo</li>
        <li class="list-group-item col-sm-2 p-0">Data</li>
        <li class="list-group-item col-sm-4 p-0">Vincitore</li>
    </ul>
    <?php foreach($tournaments as $tournament): ?>
        <?php $data_torneo = date_create($tournament->date_tournament); ?>
        <?php if($tournament->format_tournament == "pauper"): ?>
            <ul class="list-group list-group-horizontal-sm small" style="border: 0px none transparent;">
                <li class="list-group-item col-sm-6 p-0" style="border-bottom: 1px solid;"><a href="<?php echo $tournament->url_tournament ?>" rel="nofollow"><?php echo substr($tournament->name_tournament, 0, 25) ?></a></li>
                <li class="list-group-item col-sm-2 p-0" style="border-bottom: 1px solid;"><?php echo date_format($data_torneo, 'd/m') ?></li>
                <li class="list-group-item col-sm-4 p-0" style="border-bottom: 1px solid;"><?php echo $tournament->win_deck_tournament ?></li>
            </ul>
        <?php endif; ?>
    <?php endforeach; ?>
    <div class="d-flex justify-content-center"><strong>Modern</strong></div>
    <ul class="list-group list-group-horizontal-sm small font-weight-bold">
        <li class="list-group-item col-sm-6 p-0">Torneo</li>
        <li class="list-group-item col-sm-2 p-0">Data</li>
        <li class="list-group-item col-sm-4 p-0">Vincitore</li>
    </ul>
    <?php foreach($tournaments as $tournament): ?>
        <?php $data_torneo = date_create($tournament->date_tournament); ?>
        <?php if($tournament->format_tournament == "modern"): ?>
            <ul class="list-group list-group-horizontal-sm small" style="border: 0px none transparent;">
                <li class="list-group-item col-sm-6 p-0" style="border-bottom: 1px solid;"><a href="<?php echo $tournament->url_tournament ?>" rel="nofollow"><?php echo substr($tournament->name_tournament, 0, 25) ?></a></li>
                <li class="list-group-item col-sm-2 p-0" style="border-bottom: 1px solid;"><?php echo date_format($data_torneo, 'd/m') ?></li>
                <li class="list-group-item col-sm-4 p-0" style="border-bottom: 1px solid;"><?php echo $tournament->win_deck_tournament ?></li>
            </ul>
        <?php endif; ?>
    <?php endforeach; ?>
    <div class="d-flex justify-content-center"><strong>Legacy</strong></div>
    <ul class="list-group list-group-horizontal-sm small font-weight-bold">
        <li class="list-group-item col-sm-6 p-0">Torneo</li>
        <li class="list-group-item col-sm-2 p-0">Data</li>
        <li class="list-group-item col-sm-4 p-0">Vincitore</li>
    </ul>
    <?php foreach($tournaments as $tournament): ?>
        <?php $data_torneo = date_create($tournament->date_tournament); ?>
        <?php if($tournament->format_tournament == "legacy"): ?>
            <ul class="list-group list-group-horizontal-sm small" style="border: 0px none transparent;">
                <li class="list-group-item col-sm-6 p-0" style="border-bottom: 1px solid;"><a href="<?php echo $tournament->url_tournament ?>" rel="nofollow"><?php echo substr($tournament->name_tournament, 0, 25) ?></a></li>
                <li class="list-group-item col-sm-2 p-0" style="border-bottom: 1px solid;"><?php echo date_format($data_torneo, 'd/m') ?></li>
                <li class="list-group-item col-sm-4 p-0" style="border-bottom: 1px solid;"><?php echo $tournament->win_deck_tournament ?></li>
            </ul>
        <?php endif; ?>
    <?php endforeach; ?>

    <div class="sidebar-module">
        
    </div>
    <div class="sidebar-module">
        
    </div>  
</div><!-- /.blog-sidebar -->