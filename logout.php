<?php
session_start();
session_destroy();
header('Location: logintrans.php');
setcookie('username','', time()-1500);
?>