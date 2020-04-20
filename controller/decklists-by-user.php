<?php include_once 'config/init.php'; ?>

<?php
$decksCls = new Decks;
$formatCls = new Formats;

//decks Listing template
$template = new Template('templates/decklists-by-user.php');

$template->allFormats = $formatCls->getAllFormats();

//get user id  
$parts = parse_url($_SERVER['REQUEST_URI']);
if (isset($parts['path'])) {
    $params = explode('/', $parts['path']);
    $selectedUserID = $params[3];
 }

if($selectedUserID){
    //show decklists of user requested
    $template->requestedDecks = $decksCls->getDecklistsByUser($selectedUserID);
}



echo $template;