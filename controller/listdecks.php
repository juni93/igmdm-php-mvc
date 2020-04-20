<?php include_once 'config/init.php'; ?>

<?php
$decksCls = new Decks;
$formatCls = new Formats;

//Article Listing template
$template = new Template('templates/decks-listing.php');

$template->allFormats = $formatCls->getAllFormats();


$template->requestedDecks = $decksCls->getAllDecklists();




echo $template;