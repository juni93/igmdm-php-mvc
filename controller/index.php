<?php include_once 'config/init.php'; ?>

<?php
$articlesCls = new Articles;
$formatCls = new Formats;
$apiCls = new Api;

//HomePage template
$template = new Template('templates/homepage.php');
$template->allFormats = $formatCls->getAllFormats();
$template->standards = $apiCls->getStandardData();
$template->pioneers = $apiCls->getPioneerData();
$template->moderns = $apiCls->getModernData();
$template->paupers = $apiCls->getPauperData();
$template->legacys = $apiCls->getLegacyData();

//show recent 6 articles in homepage
$template->hpArticles = $articlesCls->getHpArticles();


echo $template;
