<?php include_once 'config/init.php'; ?>

<?php
$usersCls = new Users;
$formatCls = new Formats;


$template = new Template('templates/new-users.php');
$template->allFormats = $formatCls->getAllFormats();

// Processing form data when form is submitted

if(isset($_POST['new_user_submit'])){
    $nick_user = $_POST['new_nick_user'];
    $password = $_POST['new_user_pwd'];
    if($usersCls->userNameExits($nick_user)){
        $_SESSION['message'] = $nick_user .' come nick name esiste già';
        $_SESSION['message_type'] = 'error';
        displayMessage();
    }elseif(strlen(trim($_POST["new_user_pwd"])) < 6){
        $_SESSION['message'] = 'Passsword deve essere minimo di 6 caratteri';
        $_SESSION['message_type'] = 'error';
        displayMessage();
    }elseif($usersCls->createNewUser($nick_user, $password)){
        redirect(BASE_PATH  . '/admin-area', 'Nuovo Utente è stato creato', 'success');
    }else{
        redirect(BASE_PATH  . '/admin-area', 'Username o Password Non corrette', 'error');
    }
    
    /* if($usersCls->createNewUser($nick_user, $password)){
        redirect('', 'Nuovo Utente è stato creato', 'success');
    }else{
        redirect('', 'Username o Password Non corrette', 'error');
    } */

}



echo $template;