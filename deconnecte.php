<?php session_start() ;

unset($_SESSION['auth']);
$_SESSION['flash']['success']="vous etes deconnecter";

header('location:login.php');
?>
