<?php
session_start();
require 'config/config.php';

if(isset($_POST['submit']))
{
  $pseudo = mysql_real_escape_string(htmlspecialchars(trim($_POST['pseudo'])));
  if (empty($pseudo))
  {
    echo "Veuillez compléter ce champs.";
  }
  else
  {
    $bdd->query("UPDATE members SET pseudo = '$pseudo' WHERE pseudo = '{$_SESSION['pseudo']}'");
    header("Location:logout.php");
  }
}
?>

<?php
if (isset($_POST['subpass']))
{
  $o_password = $_POST['o_password'];
  $n_password = $_POST['n_password'];
  $r_password = $_POST['r_password'];

  $o_password = sha1($o_password);

  $query = $bdd->query("SELECT * FROM members WHERE pseudo = '{$_SESSION['pseudo']}' AND password = '$o_password'")
  or die(mysql_error());
  $rows = $query->rowCount($query);

  if(empty($o_password))
  {
    echo "Veuillez saisir votre ancien mot de passe.";
  }
  else if($n_password != $r_password)
  {
    echo "Vos nouveaux mots de passe sont différents.";
  }
  else if($rows == 0)
  {
    echo "L'ancien mot de passe est incorrect.";
  }
  else
  {
    $n_password = sha1($n_password);
    $bdd->query("UPDATE members SET password = '$n_password' WHERE pseudo = '{$_SESSION['pseudo']}'");
    echo "Votre mot de passe a été changé";
  }
}
?>

<html>
<head>
  <title><?php echo $_SESSION['pseudo']; ?> | Modification des infos</title>
  <?php include 'head.php'; ?>
</head>
<body>
 <form method="post" action="update_profile.php">
  <p>Votre nouveau pseudo</p>
  <input type="text" name="pseudo" placeholder="<?php echo $_SESSION['pseudo']; ?>">
  <br/>
  <input type="submit" name="submit" value="Actualiser">
</form>

<hr/>

<form method="post">
  <p>Ancien mot de passe</p>
  <input type="password" name="o_password" >
  <br/>
  <p>Nouveau mot de passe</p>
  <input type="password" name="n_password">
  <br/>
  <p>Répéter nouveau mot de passe</p>
  <input type="password" name="r_password">
  <br/>
  <input type="submit" name="subpass" value="Changer mot de passe">
</form>

</body>
</html>

