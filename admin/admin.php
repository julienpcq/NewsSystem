<?php
session_start();

require "../config/config.php";
$all_posts = $bdd->query("SELECT * FROM posts ORDER BY id DESC LIMIT 20");
while ($data = $all_posts->fetch())
{
  echo "N° " . $data['id'] . " - " . $data['name'] .
  " - <a href=\"delete_post.php?id={$data['id']}\">Supprimer</a>
  - <a href=\"edit_post.php?id={$data['id']}\">Modifier</a><br>";
}

?>

