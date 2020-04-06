<?php include_once 'config/init.php'; ?>

<?php
$articlesCls = new Articles;
$formatCls = new Formats;

//Article Listing template
$template = new Template('templates/article-listing.php');

$template->allFormats = $formatCls->getAllFormats();

//get user id
$parts = parse_url($_SERVER['REQUEST_URI']);
if (isset($parts['path'])) {
   $params = explode('/', $parts['path']);
   $selectedUserID = $params[3];
}

if($selectedUserID){
    //show articles of format requested
    $template->requestedArticles = $articlesCls->getArticlesByUser($selectedUserID);
}



echo $template;