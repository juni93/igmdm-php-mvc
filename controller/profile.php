<?php include_once 'config/init.php'; ?>

<?php

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
    $usersCls = new Users;
    $formatCls = new Formats;
    
    //Profile Page
    $template = new Template('templates/profile.php');
    $template->allFormats = $formatCls->getAllFormats();
    
    $template->userDetails = $usersCls->getActiveUser($_SESSION['id_user']);


    echo $template;
}else{
    header('Location: ' . BASE_PATH . '/home');
}
