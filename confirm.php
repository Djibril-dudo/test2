
<?php 
require_once "fonction.php";?>
<?php 
$user_id=$_GET['id'];
$token=$_GET['token'];
require 'bd.php';
$req=$pdo->prepare('select *  from users where id=?');
$req->execute([$user_id]);
$user=$req->fetch();
session_start();
if($user && $user-> confirm_token==$token)
{

$pdo->prepare('update users set confirm_token=null, confirm_at=NOW() where id=?')-> execute([$user_id]);

	$_SESSION['flash']['success']="vous venez de valider le compte merci";
$_SESSION['auth']=$user;
header('location:compte.php');
}
else
{
	
	$_SESSION['flash']['danger']="ce lien n'est plus valide";
	header('location:login.php');
}
?>