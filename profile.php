<?php
session_start();
if(isset($_SESSION['pseudo']))
{
?>
<html>
<head>
  <?php include 'head.php'; ?>
  <title>Mon profil | <?php echo $_SESSION['pseudo']; ?></title>
</head>
<body>

  <?php include ('navbar.php'); ?>

  <p><a href="index.php">Retour à l'accueil</a></p>

 <br/>
 <br/>
 <a href="logout.php">Se déconnecter</a>
 <br/>
 <a href="update_profile.php">Modifier mes informations</a>
 <br/>
 <a href="desinscrire.php">Me désinscrire du site</a>
<?php
}
else
{
  header('Location:login.php');
}
?>


</body>
</html>
