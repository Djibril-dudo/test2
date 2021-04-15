<?php  require_once('entete.php') ;?>

<?php 
if(!empty($_POST)&& !empty($_POST['users']) && !empty($_POST['password']))
{
require_once "fonction.php";
	require_once "bd.php";
	$req=$pdo->prepare('select * from users where (users= :users or mail= :users) and confirm_at is not null');
	$req->execute(['users'=>$_POST['users']]);
	$user=$req->fetch();
	if($_POST['password']==$user->password)
	{
		session_start();
	$_SESSION['auth']=$user;
	$_SESSION['flash']['success']="vous etes maintenant connecté";
	header('Location:compte.php');
	exit();
	}
	else
	{
		$_SESSION['flash']['danger']="identifiant ou mot de passe incorrect";
	}
}


?>
 <div class="container">
	<section  style="width:250px";>
	        <h2 class="form-signin-heading">Plateforme Connexion</h2>
<form method="POST" action="">
<div class="form-group">
    <label for="">Pseudo ou Mail</label>
    <input type="text", name="users" class="form-control" Maxlength=50 />
</div>

<div class="form-group">
    <label for="">Mot de passe</label>
    <input type="password", name="password" class="form-control"  />
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary"> Se connecter</button>
</div></div>
</form>
	</section>