<?php include_once 'config/init.php'; ?>
<?php
$articlesCls = new Articles;
$parts = parse_url($_SERVER['REQUEST_URI']);
/* echo "<pre>";
    print_r($_SERVER);
echo "</pre>"; */
if (isset($parts['path'])) {
   $params = explode('/', $parts['path']);
   $selectedArticleId = $params[3];
}

if(isset($_POST['update_article'])){
    $data = array();
    $data['article_title'] = $_POST['article_title'];
    $data['artcile_format_id'] = $_POST['artcile_format'];
    $data['article_description'] = $_POST['article_description'];

    if($articlesCls->updateArticle($selectedArticleId, $data)){
        redirect(BASE_PATH  . '/admin-area', 'Articolo è stato aggiornato', 'success');
    }else{
        redirect(BASE_PATH  . '/admin-area', 'Articolo non è stato aggiornato', 'error');
    }

}