<?php
function check_username() {
  require 'config/config.php';
  $user_exists = $bdd->query("SELECT * FROM members WHERE pseudo='{$_GET['pseudo']}'");
  $count_rows = $user_exists->rowCount();
  if ($count_rows==1) {
    echo "<title>Profil | ".$_GET['pseudo']."</title>";
  }else{
    header('Location:index.php');
  }
};
?>