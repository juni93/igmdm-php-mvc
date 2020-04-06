<?php include_once 'config/init.php'; ?>

<?php
$articlesCls = new Articles;
$formatCls = new Formats;

//$selectedArticleId = isset($_GET['articleId']) ? $_GET['articleId'] : null;
$parts = parse_url($_SERVER['REQUEST_URI']);
/* echo "<pre>";
    print_r($_SERVER);
echo "</pre>";  */
if (isset($parts['path'])) {
   $params = explode('/', $parts['path']);
   $selectedArticleId = $params[3];
}


//create article page template
$template = new Template('templates/article-edit.php');

//show requested article
$template->singleArticle = $articlesCls->getArticlebyId($selectedArticleId);

//show all formats for navbar
$template->allFormats = $formatCls->getAllFormats();



echo $template;