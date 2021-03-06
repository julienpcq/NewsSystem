<?php

session_start();

if (isset($_POST['submit']))
{
  $pseudo = htmlspecialchars(trim($_POST['pseudo']));
  $password = htmlspecialchars(trim($_POST['password']));

  if(empty($pseudo))
  {
    echo "Veuillez saisir votre pseudo.<br/>";
  }
  else if(empty($password))
  {
    echo "Veuillez saisir votre mot de passe.";
  }
  else
  {
    require "config/config.php";
    $password = sha1($password);
    $login = $bdd->query("SELECT * FROM members WHERE pseudo='$pseudo' AND password='$password'");
    $count = $login->rowCount();

    if($count == 1)
    {
      $_SESSION['pseudo'] = $pseudo;
      $find_role_id = $bdd->query("SELECT * FROM members WHERE pseudo='$pseudo'");
      $_SESSION['groupe_id'] = $find_role_id->fetch(PDO::FETCH_ASSOC);
      //var_dump($_SESSION['groupe_id']);
      header('Location:index.php');
    }
    else
    {
      echo "Nom d'utilisateur ou mot de passe incorrect";
    }
  }
}
?>

<html>
<head>
  <title>Connexion</title>
  <?php include 'head.php'; ?>
</head>
<body>
<?php include('navbar.php'); ?>
<h1>Connexion</h1>
<form method="post" action="login.php">
<p>Votre pseudo :</p>
<input type="text" name="pseudo">
<p>Votre mot de passe :</p>
<input type="password" name="password">
<br/><br/>
<input type="hidden" name="groupe">
<input type="submit" name="submit" value="Se connecter">
</form>
<a href="signup.php">Je n'ai pas encore de compte</a>
</body>
</html>

