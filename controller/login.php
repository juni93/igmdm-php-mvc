<?php include_once 'config/init.php'; ?>

<?php
$usersCls = new Users;
$articlesCls = new Articles;
$formatCls = new Formats;

//Login PAge
$template = new Template('templates/login-page.php');
$template->allFormats = $formatCls->getAllFormats();

if(isset($_POST['login-submit'])){
    $data = array();
    $data['username'] = $_POST['username'];
    $data['password'] = $_POST['password'];

    if($usersCls->userLogin($data)){
       $_SESSION['loggedin'] = true;
       $_SESSION['id_user'] = $usersCls->userLogin($data)[0]->id_user;
       $_SESSION['nick_user'] = $usersCls->userLogin($data)[0]->nick_user;
       $_SESSION['super_user'] = $usersCls->userLogin($data)[0]->super_user;
    }else{
        redirect(BASE_PATH  . '/admin-area', 'Username o Password Non corrette', 'error');
    }
   
}

$template->articlesToBeApproved = $articlesCls->getArticlesToBeApproved();

echo $template;