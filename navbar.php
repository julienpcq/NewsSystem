<div class="offset col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <div class="navbar text-center">
    <a href="index.php"><h1>News System</h1></a>
    <?php
    if(isset($_SESSION['pseudo']))
    {
      echo "Bonjour " . $_SESSION['pseudo'] . " - ";
    }

    if(isset($_SESSION['pseudo']))
    {
      echo "<a href=\"logout.php\">Se déconnecter</a> ";
      echo "<a href=\"profile.php\">Mon profil</a>";

    }
      else
    {
      echo "<a href=\"login.php\">Se connecter</a> ";
      echo "<a href=\"signup.php\">S'inscrire</a>";
    }
    if(isset($_SESSION['pseudo']))
    {
      if(isset($_SESSION['groupe_id']))
        {
          //print_r($_SESSION['groupe_id']);
          echo " <a href=\"admin/admin.php\">Administration</a>";

        }
    }
    ?>
  </div>
</div>
