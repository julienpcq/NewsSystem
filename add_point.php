<?php
session_start();
require 'config.php';
extract($_POST);
$name = $_SESSION['pseudo'];

if(isset($_SESSION['pseudo']))
{
  $check_vote = $bdd->query("SELECT id FROM points WHERE (id_post = '{$_GET['id']}' && id_member = '$name')");
  $count = $check_vote->rowCount();
  if ($count == 0)
  {
    $add_1_pt=$bdd->exec("UPDATE posts SET points = points + 1 WHERE id = {$_GET['id']}");
    $add_user_vote=$bdd->exec("INSERT INTO points(id_post,id_member) VALUES ('{$_GET['id']}','$name')");
    header('Location:index.php');
    }
    else
    {
      ?>
      <script>

      alert("Un seul vote par article!");
      window.location="index.php"

      </script>
      <?php
    }
}
?>



