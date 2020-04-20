<?php include_once 'config/init.php'; ?>

<?php
$decksCls = new Decks;
$formatCls = new Formats;

if(isset($_POST['submit_decklist'])){
    $data = array();
    $data['decklist_title'] = $_POST['decklist_title'];
    $data['decklist_format_id'] = $_POST['decklist_format'];
    $data['decklist_main'] = $_POST['decklist_main'];
    $data['decklist_side'] = $_POST['decklist_side'];
    $data['decklist_image_name'] = $_FILES['name_imag']['name'];

    if($decksCls->createDecklist($data)){
        redirect(BASE_PATH  . '/admin-area', 'Decklist è stato salvato', 'success');
    }else{
        redirect(BASE_PATH  . '/admin-area', 'Decklist non è stato salvato', 'error');
    }
}

//create article page template
$template = new Template('templates/deck-create.php');
$template->allFormats = $formatCls->getAllFormats();



echo $template;