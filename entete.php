
<?php 
if(session_status()==PHP_SESSION_NONE)
{
	session_start();
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Fixed Top Navbar Example for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="djiby/css/bootstrap.css" rel="stylesheet">

    <link href="djiby/css/bootstrap.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="djiby/css/navbar-fixed-top.css" rel="stylesheet">

  
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
        
          <a class="navbar-brand" href="#">Membre</a>
        </div>
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
		<?php	if(isset($_SESSION['auth'])) :  ?>
		
            <li><a href="deconnecte.php">Deconnecter</a></li>
		<?php else : ?>
		
            <li><a href="register.php">Inscription</a></li>
            <li><a href="login.php">Connecter</a></li>
		<?php endif?>
			
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
<?php if(isset($_SESSION['flash'])): ?>
				 <?php foreach($_SESSION['flash'] as $type=> $message): ?>
				  <div class="alert alert-<?=$type; ?>">
					<?= $message ;?>
				  </div>
			   <?php endforeach; ?>
  <?php unset($_SESSION['flash']); ?>
  <?php endif; ?>

    </div> <!-- /container -->
  
  </body>
</html>
