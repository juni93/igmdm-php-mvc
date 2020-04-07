<?php include_once 'config/init.php'; ?>

<?php
$articlesCls = new Articles;
$formatCls = new Formats;

if(isset($_POST['submit_article'])){
    $data = array();
    $data['article_title'] = $_POST['article_title'];
    $data['artcile_format_id'] = $_POST['artcile_format'];
    $data['article_description'] = $_POST['article_description'];
    $data['article_image_name'] = $_FILES['name_imag']['name'];

    if($articlesCls->createArticle($data)){
        redirect(BASE_PATH  . '/home', 'Articolo è stato salvato', 'success');
    }else{
        redirect(BASE_PATH  . '/home', 'Articolo non è stato salvato', 'error');
    }
}

//create article page template
$template = new Template('templates/article-create.php');
$template->allFormats = $formatCls->getAllFormats();



echo $template;