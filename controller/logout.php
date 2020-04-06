<?php include_once 'config/init.php'; ?>
<?php

session_start();

//unset all session variables
$_SESSION = array();

//destroy the session
session_destroy();

redirect(BASE_PATH  . '/admin-area', 'Logut Effettuato', 'success');
exit;
