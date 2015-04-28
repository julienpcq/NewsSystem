<?php
session_start();
require 'config/config.php';

if (isset($_POST) && isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['groupe_id']))
  {
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    {
      $pseudo = stripslashes(trim($_POST['pseudo']));
      $email = stripslashes(trim($_POST['email']));
      $password = sha1($_POST['password']);
      $groupe_id = $_POST['groupe_id'];

      $user_exists = $bdd->query("SELECT * FROM members WHERE pseudo='{$_POST['pseudo']}'");
      $count_rows = $user_exists->rowCount();
      if ($count_rows == O) {
        $insert_member = $bdd->exec("INSERT INTO members(pseudo, email, password, groupe_id) VALUES ('$pseudo','$email','$password','$groupe_id')");
        die ('Inscription terminée, vous pouvez vous <a href="login.php">connecter</a>');

        }else echo '<script>alert ("Ce pseudo est déjà utilisé");</script>';
    }else echo "Format d'e-mail invalide";
}
?>

<html>
<head>
  <title>Inscription</title>
  <?php include 'head.php'; ?>
</head>
<body>
<?php include('navbar.php'); ?>
  <form method="post" action="signup.php">
    <input type="text" name="pseudo" placeholder="Pseudo" value="<?php echo $_POST['pseudo']; ?>">
    <input type="email" name="email" placeholder="john@doe.com" value="<?php echo $_POST['email']; ?>">
    <input type="password" name="password" palceholder="Mot de passe" value="<?php echo $_POST['password']; ?>">
    <input type="hidden" name="groupe_id" value="1">
    <input type="submit" value="Envoyer">
  </form>

</body>
</html>