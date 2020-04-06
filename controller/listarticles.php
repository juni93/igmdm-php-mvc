<?php include_once 'config/init.php'; ?>

<?php
$articlesCls = new Articles;
$formatCls = new Formats;

//Article Listing template
$template = new Template('templates/article-listing.php');

$template->allFormats = $formatCls->getAllFormats();


$template->requestedArticles = $articlesCls->getAllArticles();




echo $template;