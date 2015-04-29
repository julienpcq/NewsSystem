<?php
session_start();
require "../config/config.php";

if(!empty($_POST))
{
  extract($_POST);
  $edit = $bdd->prepare("UPDATE posts SET name= :name, image= :image, content= :content WHERE id = $id");
  $edit->execute(array(
    "name" => $name,
    "image" => $image,
    "content" => $content
    ));
  echo "Article modifié";

}
?>
<html>
<head>
  <title></title>
</head>
<body>
  <br>
<a href="admin.php">Retour à l'administration</a>
</body>
</html>


