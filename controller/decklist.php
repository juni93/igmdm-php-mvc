<?php include_once 'config/init.php'; ?>

<?php
$decksCls = new Decks;
$formatCls = new Formats;
$apiCls = new Api;

//single article view template
$template = new Template('templates/decklist-page.php');
$template->allFormats = $formatCls->getAllFormats();

$template->standards = $apiCls->getStandardData();
$template->pioneers = $apiCls->getPioneerData();
$template->moderns = $apiCls->getModernData();
$template->paupers = $apiCls->getPauperData();
$template->legacys = $apiCls->getLegacyData();


$parts = parse_url($_SERVER['REQUEST_URI']);
if (isset($parts['path'])) {
   $params = explode('/', $parts['path']);
   $selectedDecklistId = $params[3];
}

//show requested article
$template->singleDecklist = $decksCls->getDecklistbyId($selectedDecklistId);
echo $template;
