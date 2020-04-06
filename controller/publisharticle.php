<?php include_once 'config/init.php'; ?>

<?php
$articlesCls = new Articles;
$parts = parse_url($_SERVER['REQUEST_URI']);
if (isset($parts['path'])) {
   $params = explode('/', $parts['path']);
   $selectedArticleId = $params[3];
   if($articlesCls->publishArticle($selectedArticleId)){
    redirect(BASE_PATH  . '/admin-area', 'Articolo è stato pubblicato', 'success');
    }else{
        redirect(BASE_PATH  . '/admin-area', 'Articolo non è stato pubblicato', 'error');
    }
}

/* if(isset($_GET['articleId'])){
    $article_id = $_GET['articleId'];

    if($articlesCls->publishArticle($article_id)){
        redirect(BASE_PATH  . '/admin-area', 'Articolo è stato pubblicato', 'success');
    }else{
        redirect(BASE_PATH  . '/admin-area', 'Articolo non è stato pubblicato', 'error');
    }
}
 */