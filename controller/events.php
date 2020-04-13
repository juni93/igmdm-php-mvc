<?php include_once 'config/init.php'; ?>

<?php
$eventsCls = new Events;
$formatCls = new Formats;
$apiCls = new Api;


//single article view template
$template = new Template('templates/events-page.php');

$template->standards = $apiCls->getStandardData();
$template->pioneers = $apiCls->getPioneerData();
$template->moderns = $apiCls->getModernData();
$template->paupers = $apiCls->getPauperData();
$template->legacys = $apiCls->getLegacyData();
//show all events
$template->events = $eventsCls->getAllEvents();
//for formats in header navbar
$template->allFormats = $formatCls->getAllFormats();

echo $template;