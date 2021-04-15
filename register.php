<?php session_start(); ?>
<?php 
require_once "fonction.php";?>
<?php 
if(!empty($_POST))
{require_once "bd.php";
$errors=array();

if(empty($_POST['users']))

{ $errors['users']="vous n'avez pas remplir le champs";}
else
{
	$req=$pdo->prepare('select id from users where users=?');
	$req->execute([$_POST['users']]);
	$user=$req->fetch();
	if($user)
	{
		$errors['users']="pseudo existe deja";
	}
}

if(empty($_POST['mail']) || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))
{ $errors['email']="votre mail n'est pas valide";}
else
{
	$req=$pdo->prepare('select id from users where mail=?');
	$req->execute([$_POST['mail']]);
	$email=$req->fetch();
	if($email)
	{
		$errors['mail']="ce mail existe deja";
	}
}
if(empty($_POST['password'])|| $_POST['password']!=$_POST['passer'])
{
    $errors['password']="les mot de passe ne sont pas identique";
}



if(empty($errors))
{
	
	require_once "bd.php";	
$req= $pdo->prepare("insert into users set users=?,password=?,mail=?,confirm_token=?");
	// $password=password_hash($_POST['password'],PASSWORD_BCRYPT);
  $token=str_random(60);
  var_dump($token);
  $req->execute([$_POST['users'],$_POST['password'],$_POST['mail'],$token]);
	$user_id=$pdo->lastInsertId();
	mail($_POST['mail'], 'confirmation de votre compte'," Afin de valider votre compte sur ce lien\n\nhttp://localhost/PHP%20djiby/doc/confirm.php?id=user_id&token=$token");
	$_SESSION['flash']['success']="un lien de confirmation vous a ete envoyer pour valider votre compte";
	// header('location:login.php');
	
	exit();
	
}
	

}

?>
<?php  
require "entete.php";?>

 <?php if(!empty($errors)): ?>
     <div class="container">

<div class="alert alert-danger" style="width:400px">
	<p> vous n'avez pas remplir le formulaire correctement</p>
	<ul>
		<?php foreach($errors as $error):?>
			<li><?= $error; ?></li>
		<?php endforeach;?>
	</ul>
</div></div>

<?php endif; ?>

    <div class="container">
	<section  style="width:250px";>
	        <h2 class="form-signin-heading">Plateforme d'inscription</h2>
<form method="POST" action="">
<div class="form-group">
    <label for="">Pseudo</label>
    <input type="text", name="users" class="form-control" Maxlength=50 />
</div>
<div class="form-group">
    <label for="">Email</label>
    <input type="email", name="mail" class="form-control"  />
</div>
<div class="form-group">
    <label for="">Mot de passe</label>
    <input type="password", name="password" class="form-control"  />
</div>
<div class="form-group">
    <label for="">Confirmer mot de passe</label>
    <input type="password", name="passer" class="form-control"  />
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary"> S'inscrire</button>
</div></div>
</form>
	</section>
	
	<aside style="width:289px;float:right; background-color: yellow ";>
	
	<h2> Information du site </h2>
	<p> djibril diouf</p>
	
	<p> djibril diouf</p>
	<p> djibril diouf</p>
	<p> djibril diouf</p>
	<p> djibril diouf</p>
	<p> djibril diouf</p>
	<p> djibril diouf</p>
	<p> djibril diouf</p>
	<p> djibril diouf</p>
	<p> djibril diouf</p>
	</aside>
	