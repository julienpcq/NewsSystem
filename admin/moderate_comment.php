<?php
session_start();
require "../config/config.php";

if(!empty($_POST))
{
  extract($_POST);
  $_GET['content'] = $content;
  $content = "Ce commentaire a été modéré.";
  $id = $_GET['id'];
  $edit = $bdd->exec("UPDATE comments SET content='$content' WHERE id = '$id'");
}

?>