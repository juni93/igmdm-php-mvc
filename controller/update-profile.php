<?php include_once 'config/init.php'; ?>
<?php
$usersCls = new Users;

if(isset($_POST['update_profile'])){
    $data = array();
    $data['name_user'] = $_POST['name_user'];
    $data['nick_user'] = $_POST['nick_user'];
    $data['desc_user'] = $_POST['desc_user'];
    $data['imag_user'] = $_FILES['imag_user']['name'];
    

    if($usersCls->updateProfile($data, $_SESSION['id_user'])){
        redirect(BASE_PATH  . '/admin-area', 'Profilo è stato aggiornato', 'success');
    }else{
        redirect(BASE_PATH  . '/admin-area', 'Profilo non è stato aggiornato', 'error');
    }

}