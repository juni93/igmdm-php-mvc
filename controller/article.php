<?php include_once 'config/init.php'; ?>

<?php
$articlesCls = new Articles;
$formatCls = new Formats;
$apiCls = new Api;

//single article view template
$template = new Template('templates/article-page.php');
$template->allFormats = $formatCls->getAllFormats();

$template->tournaments = $apiCls->getTournamentDetails();


$parts = parse_url($_SERVER['REQUEST_URI']);
if (isset($parts['path'])) {
   $params = explode('/', $parts['path']);
   $selectedArticleId = $params[3];
}

//show requested article
$template->singleArticle = $articlesCls->getArticlebyId($selectedArticleId);
echo $template;
