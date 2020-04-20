<?php include_once 'config/init.php'; ?>

<?php
$decksCls = new Decks;
$formatCls = new Formats;

//decks Listing template
$template = new Template('templates/decklists-by-format.php');

$template->allFormats = $formatCls->getAllFormats();

//get format id  
$parts = parse_url($_SERVER['REQUEST_URI']);
if (isset($parts['path'])) {
   $params = explode('/', $parts['path']);
   $selectedFormatId = $params[4];
   $template->formatName = $params[3];
}

if($selectedFormatId){
    //show decklists of format requested
    $template->requestedDecks = $decksCls->getDecklistsByFormat($selectedFormatId);
}



echo $template;